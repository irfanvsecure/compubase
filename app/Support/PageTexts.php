<?php

namespace App\Support;

use App\Models\PageText;
use DOMDocument;
use DOMElement;
use DOMXPath;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * Text changes saved through the MCP server, applied to each page as it is sent.
 *
 * A plain-text change only touches the words visitors read: text between tags
 * (written as-is or HTML-escaped) and the same text inside JSON-LD, so FAQ
 * schema stays in step. It never touches tags, attributes or scripts. An HTML
 * change replaces raw markup anywhere in the page, e.g. to change a heading
 * level, a link or an image's alt text.
 */
class PageTexts
{
    /** Paths these changes never apply to: the MCP server, OAuth and sign-in. */
    private const SKIP = ['/mcp', '/oauth', '/.well-known', '/login', '/logout'];

    public static function appliesTo(string $path): bool
    {
        foreach (self::SKIP as $prefix) {
            if ($path === $prefix || str_starts_with($path, $prefix.'/')) {
                return false;
            }
        }

        return true;
    }

    /** Ids of changes left out while rendering, to see a page without them. */
    public static array $skip = [];

    /** The changes for one page: those for every page first, then the page's own, oldest first. */
    public static function for(string $path)
    {
        return PageText::whereIn('path', [PageText::ALL_PAGES, $path])->whereNotIn('id', self::$skip)
            ->orderByRaw('path = ? desc', [PageText::ALL_PAGES])->orderBy('id')->get();
    }

    /** Apply the changes to a page's HTML. */
    public static function apply(string $html, iterable $texts): string
    {
        foreach ($texts as $text) {
            $html = self::replace($html, $text->find, $text->replace, $text->is_html)[0];
        }

        return $html;
    }

    /**
     * Replace one text in a page's HTML.
     *
     * @return array{0: string, 1: int} the new HTML and how many places changed
     */
    public static function replace(string $html, string $find, string $replace, bool $isHtml = false): array
    {
        if ($find === '') {
            return [$html, 0];
        }
        if ($isHtml) {
            $count = substr_count($html, $find);

            return [str_replace($find, $replace, $html), $count];
        }

        $escaped = e($find);
        $json = fn (string $s) => substr(json_encode($s, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), 1, -1);
        $total = 0;
        $parts = preg_split('#(<script\b[^>]*>.*?</script>|<style\b[^>]*>.*?</style>|<!--.*?-->|<[^>]*>)#is', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($parts as $i => $part) {
            if ($i % 2 === 0) {
                // Text between tags. Blade escapes what it prints; text written into a view is as-is.
                $count = substr_count($part, $escaped);
                $part = str_replace($escaped, e($replace), $part);
                if ($escaped !== $find) {
                    $count += substr_count($part, $find);
                    $part = str_replace($find, e($replace), $part);
                }
            } elseif (preg_match('#^<script\b[^>]*application/ld\+json#i', $part)) {
                $count = substr_count($part, $json($find));
                $part = str_replace($json($find), $json($replace), $part);
            } else {
                continue;
            }
            $parts[$i] = $part;
            $total += $count;
        }

        return [implode('', $parts), $total];
    }

    /**
     * Render a page of this site without leaving the app, as a visitor would see it.
     *
     * @return array{0: int, 1: string} the status code and the HTML
     */
    public static function render(string $path): array
    {
        $app = app();
        $original = $app['request'];
        // Tell the request where the site lives, so a site in a subfolder still matches its routes.
        $script = rtrim(parse_url(url('/'), PHP_URL_PATH) ?? '', '/').'/index.php';
        $server = ['SCRIPT_NAME' => $script, 'PHP_SELF' => $script, 'SCRIPT_FILENAME' => public_path('index.php')];
        try {
            $response = $app->make(Kernel::class)->handle(Request::create(rtrim(url('/'), '/').'/'.ltrim($path, '/'), 'GET', [], [], [], $server));
        } finally {
            $app->instance('request', $original);
            Facade::clearResolvedInstance('request');
        }

        return [$response->getStatusCode(), (string) $response->getContent()];
    }

    /**
     * The readable parts of a page in order: headings, paragraphs, list items,
     * links, buttons, labels and image alt text, each with its tag and the area
     * of the page it sits in (header, main or footer).
     */
    public static function outline(string $html, int $limit = 400): array
    {
        $dom = new DOMDocument;
        @$dom->loadHTML('<?xml encoding="UTF-8">'.$html, LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new DOMXPath($dom);
        $query = '//body//*[self::h1 or self::h2 or self::h3 or self::h4 or self::h5 or self::h6 or self::p or self::li or self::a or self::button'
            .' or self::label or self::summary or self::dt or self::dd or self::th or self::td or self::figcaption or self::blockquote or self::img]';

        $items = [];
        $seen = [];
        foreach ($xpath->query($query) as $node) {
            /** @var DOMElement $node */
            $tag = strtolower($node->nodeName);
            $text = $tag === 'img' ? trim($node->getAttribute('alt')) : trim(preg_replace('/\s+/u', ' ', $node->textContent));
            if ($text === '' || ($tag !== 'img' && self::insideListed($node))) {
                continue;
            }
            $area = self::area($node);
            $key = $tag.'|'.$area.'|'.$text;
            if (isset($seen[$key])) {
                continue;
            }
            $seen[$key] = true;
            $items[] = ['tag' => $tag === 'img' ? 'img alt' : $tag, 'area' => $area, 'text' => mb_strimwidth($text, 0, 600, '…')];
            if (count($items) >= $limit) {
                break;
            }
        }

        return $items;
    }

    /** Snippets of raw HTML around each place the text appears, for HTML changes. */
    public static function snippets(string $html, string $search, int $max = 10): array
    {
        $snippets = [];
        foreach (array_unique([$search, e($search)]) as $needle) {
            $offset = 0;
            while (count($snippets) < $max && ($at = strpos($html, $needle, $offset)) !== false) {
                $start = max(0, $at - 200);
                $snippets[] = substr($html, $start, $at - $start + strlen($needle) + 200);
                $offset = $at + strlen($needle);
            }
        }

        return array_map(fn ($s) => mb_convert_encoding($s, 'UTF-8', 'UTF-8'), $snippets);
    }

    /** Whether a listed element (heading, paragraph…) already contains this one, so its text is shown there. */
    private static function insideListed(DOMElement $node): bool
    {
        for ($parent = $node->parentNode; $parent instanceof DOMElement; $parent = $parent->parentNode) {
            if (in_array(strtolower($parent->nodeName), ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'li', 'button', 'label', 'summary', 'dt', 'dd', 'th', 'td', 'figcaption', 'blockquote'], true)) {
                return true;
            }
        }

        return false;
    }

    private static function area(DOMElement $node): string
    {
        for ($parent = $node; $parent instanceof DOMElement; $parent = $parent->parentNode) {
            $name = strtolower($parent->nodeName);
            if ($name === 'header' || $name === 'footer') {
                return $name;
            }
        }

        return 'main';
    }
}
