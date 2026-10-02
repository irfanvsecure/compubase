<?php

namespace App\Mcp\Tools;

use App\Models\SeoMeta;
use App\Support\Seo;
use DOMDocument;
use DOMXPath;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\Http;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;
use Throwable;

#[IsReadOnly]
#[Description('SEO check of one page: the overrides saved for it, plus what the live page actually shows (title, meta description, robots, canonical, headings, images without alt text, word count). Use before update_seo.')]
class GetSeo extends SiteTool
{
    protected string $name = 'get_seo';

    public function handle(Request $request): Response
    {
        $path = Seo::path((string) $request->get('path'));
        $override = SeoMeta::where('path', $path)->first();

        return $this->result([
            'path' => $path,
            'url' => url($path),
            'override' => $override?->only(['title', 'description', 'keywords', 'og_image', 'robots', 'canonical']),
            'live' => $request->boolean('live', true) ? $this->inspect(url($path)) : null,
        ]);
    }

    private function inspect(string $url): array
    {
        try {
            $response = Http::timeout(20)->withoutRedirecting()->get($url);
        } catch (Throwable $e) {
            return ['error' => 'Could not load the page: '.$e->getMessage()];
        }
        if (! $response->successful()) {
            return ['status' => $response->status(), 'redirects_to' => $response->header('Location') ?: null];
        }

        $dom = new DOMDocument;
        @$dom->loadHTML('<?xml encoding="UTF-8">'.$response->body(), LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new DOMXPath($dom);
        $meta = fn (string $query) => ($node = $xpath->query($query)->item(0)) ? trim($node->getAttribute('content') ?: $node->getAttribute('href')) : null;
        $title = trim((string) $xpath->query('//title')->item(0)?->textContent);
        $description = $meta('//meta[@name="description"]');
        $text = trim(preg_replace('/\s+/u', ' ', (string) $xpath->query('//main|//body')->item(0)?->textContent));

        return [
            'status' => $response->status(),
            'title' => $title,
            'title_length' => mb_strlen($title),
            'description' => $description,
            'description_length' => mb_strlen((string) $description),
            'robots' => $meta('//meta[@name="robots"]'),
            'canonical' => $meta('//link[@rel="canonical"]'),
            'og_image' => $meta('//meta[@property="og:image"]'),
            'h1' => array_map(fn ($n) => trim($n->textContent), iterator_to_array($xpath->query('//h1'))),
            'h2_count' => $xpath->query('//h2')->length,
            'images' => $xpath->query('//img')->length,
            'images_without_alt' => $xpath->query('//img[not(@alt) or normalize-space(@alt)=""]')->length,
            'word_count' => count(preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY)),
        ];
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'path' => $schema->string()->description('Page path such as "/", "/about", "/ar/course/pmp", or its full URL.')->required(),
            'live' => $schema->boolean()->description('Also load the live page and report what it shows. Default true.'),
        ];
    }
}
