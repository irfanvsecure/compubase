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

#[Description('Change any text on any page: a heading, paragraph, button, link text, list item or footer line. find must match the page exactly (copy it from get_page_text, keeping curly quotes ’ and dashes –); every place it appears on the page changes. Plain-text mode changes only visible text (and the same text in FAQ schema). html: true replaces raw HTML instead, to change a heading level (<h3>…</h3> → <h2>…</h2>), a link, or an image alt; copy find from get_page_text with search. all_pages: true changes it on every page (header and footer). Sending the same find again updates that change. For category pages prefer update_category_content; for course pages update_course.')]
class UpdatePageText extends SiteTool
{
    protected string $name = 'update_page_text';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'path' => 'required|string|max:255',
            'find' => 'required|string|max:5000',
            'replace' => 'present|nullable|string|max:20000',
            'html' => 'sometimes|boolean',
            'all_pages' => 'sometimes|boolean',
        ]);
        $path = Seo::path($data['path']);
        $isHtml = (bool) ($data['html'] ?? false);
        $replace = (string) ($data['replace'] ?? '');
        if (! PageTexts::appliesTo($path)) {
            return $this->fail("{$path} cannot be changed.");
        }

        $existing = PageText::where('path', ! empty($data['all_pages']) ? PageText::ALL_PAGES : $path)->get()
            ->first(fn ($t) => $t->find === $data['find'] && $t->is_html === $isHtml);

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
        [, $count] = PageTexts::replace($html, $data['find'], $replace, $isHtml);
        if ($count === 0) {
            return $this->fail('"'.mb_strimwidth($data['find'], 0, 120, '…').'" is not on '.$path.($isHtml ? ' as raw HTML' : '')
                .'. Copy it exactly from get_page_text (watch curly quotes ’ and dashes –). Text split by a tag such as <b> needs html: true.');
        }

        $text = $existing ?? new PageText(['path' => ! empty($data['all_pages']) ? PageText::ALL_PAGES : $path, 'find' => $data['find'], 'is_html' => $isHtml]);
        $before = $existing?->replace;
        $text->replace = $replace;
        $text->save();
        Activity::log('update_page_text', "page:{$text->path}", "Changed text on {$text->path}: ".mb_strimwidth($data['find'], 0, 80, '…'), ['find' => $data['find'], 'replace' => $replace, 'before' => $before, 'html' => $isHtml]);

        return $this->result([
            'id' => $text->id,
            'path' => $text->path,
            'places_changed_on_this_page' => $count,
            'url' => url($path),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'path' => $schema->string()->description('Page to change (and to check find against), e.g. "/", "/about", "/ar/contact". list_pages lists them.')->required(),
            'find' => $schema->string()->description('The exact current text (or raw HTML with html: true).')->required(),
            'replace' => $schema->string()->description('The new text (or HTML). Empty string removes it.')->required(),
            'html' => $schema->boolean()->description('Treat find and replace as raw HTML. Default false.'),
            'all_pages' => $schema->boolean()->description('Apply on every page, e.g. for header or footer text. Default false.'),
        ];
    }
}
