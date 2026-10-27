<?php

namespace App\Mcp\Tools;

use App\Models\PageText;
use App\Support\Activity;
use App\Support\PageTexts;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change any text on any page, or turn it into a link: a heading, paragraph, button, link text, list item or footer line. find must match the page exactly (copy it from get_page_text, keeping curly quotes ’ and dashes –); every place it appears on the page changes. '
    .'link adds an internal or external link: the first place the text appears outside an existing link becomes a link to that address (replace can be left out to keep the words). '
    .'Plain-text mode changes only visible text (and the same text in FAQ schema). html: true replaces raw HTML instead, to change a heading level (<h3>…</h3> → <h2>…</h2>), an image alt, or to remove or repoint an existing link (find \'<a href="…">words</a>\', replace \'words\'); copy find from get_page_text with search. '
    .'all_pages: true changes it on every page (header and footer). Sending the same find again updates that change; send it without link to drop the link again. For category pages prefer update_category_content; for course pages update_course (both take link markers).')]
class UpdatePageText extends SiteTool
{
    protected string $name = 'update_page_text';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'path' => 'required|string|max:255',
            'find' => 'required|string|max:5000',
            'replace' => 'required_without:link|nullable|string|max:20000',
            'link' => ['sometimes', 'nullable', 'string', 'max:500', 'regex:~^(/|#|https?://)\S*$~'],
            'html' => 'sometimes|boolean',
            'all_pages' => 'sometimes|boolean',
        ], ['link.regex' => 'link must be a path on this site ("/about", "/course/pmp#outline"), a #section-id, or a full https:// URL.']);
        $path = Seo::path($data['path']);
        $isHtml = (bool) ($data['html'] ?? false);
        $link = ($data['link'] ?? '') !== '' ? $data['link'] : null;
        $replace = array_key_exists('replace', $data) && $data['replace'] !== null ? $data['replace'] : ($link !== null ? $data['find'] : '');
        if (! PageTexts::appliesTo($path)) {
            return $this->fail("{$path} cannot be changed.");
        }
        if ($link !== null && $isHtml) {
            return $this->fail('link works on plain text. With html: true, write the <a href="…"> tag into replace yourself.');
        }
        // A link to this site by full URL is kept as a path, so it follows the site if its address changes.
        if ($link !== null && str_starts_with($link, url('/'))) {
            $link = Seo::path($link).(parse_url($link, PHP_URL_FRAGMENT) ? '#'.parse_url($link, PHP_URL_FRAGMENT) : '');
        }

        $target = ! empty($data['all_pages']) ? PageText::ALL_PAGES : $path;
        $existing = PageText::where('path', $target)->get()->first(fn ($t) => $t->find === $data['find'] && $t->is_html === $isHtml);

        // Check against the page as it would look without this change, so an existing change can be edited.
        PageTexts::$skip = $existing ? [$existing->id] : [];
        try {
            [$status, $html] = PageTexts::render($path);
        } finally {
            PageTexts::$skip = [];
        }
        if ($status !== 200) {
            return $this->fail("The page {$path} answered with status {$status}. Use list_pages for valid paths.");
        }
        [, $count, $linked] = PageTexts::replace($html, $data['find'], $replace, $isHtml, $link);
        if ($count === 0) {
            return $this->fail('"'.mb_strimwidth($data['find'], 0, 120, '…').'" is not on '.$path.($isHtml ? ' as raw HTML' : '')
                .'. Copy it exactly from get_page_text (watch curly quotes ’ and dashes –). Text split by a tag such as <b> needs html: true.');
        }
        if ($link !== null && ! $linked) {
            return $this->fail('"'.mb_strimwidth($data['find'], 0, 120, '…').'" is on '.$path.' only inside a link, button or label already. '
                .'To repoint an existing link use html: true (get_page_text with search shows its HTML).');
        }

        $warning = null;
        if ($link !== null && str_starts_with($link, '/')) {
            [$linkStatus] = PageTexts::render(strtok($link, '#'));
            $warning = $linkStatus === 200 ? null : "The link target {$link} answers with status {$linkStatus}: check the address.";
        }

        $text = $existing ?? new PageText(['path' => $target, 'find' => $data['find'], 'is_html' => $isHtml]);
        $before = $existing?->only(['replace', 'link']);
        $text->fill(['replace' => $replace, 'link' => $link])->save();
        Activity::log('update_page_text', "page:{$text->path}", ($link ? 'Linked' : 'Changed').' text on '.$text->path.': '.mb_strimwidth($data['find'], 0, 80, '…'),
            ['find' => $data['find'], 'replace' => $replace, 'link' => $link, 'before' => $before, 'html' => $isHtml]);

        return $this->result([
            'id' => $text->id,
            'path' => $text->path,
            'places_changed_on_this_page' => $count,
            'linked_to' => $link ? PageTexts::href($link) : null,
            'warning' => $warning,
            'url' => url($path),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'path' => $schema->string()->description('Page to change (and to check find against), e.g. "/", "/about", "/ar/contact". list_pages lists them.')->required(),
            'find' => $schema->string()->description('The exact current text (or raw HTML with html: true).')->required(),
            'replace' => $schema->string()->description('The new text (or HTML). Empty string removes it. With link it is the link text; leave it out to keep the words as they are.'),
            'link' => $schema->string()->description('Make the text a link: a path on this site ("/about", "/ar/course/pmp", "/blog/my-post", "/course/pmp#outline"), a #section-id, or a full https:// URL (opens in a new tab).'),
            'html' => $schema->boolean()->description('Treat find and replace as raw HTML. Default false.'),
            'all_pages' => $schema->boolean()->description('Apply on every page, e.g. for header or footer text. Default false.'),
        ];
    }
}
