<?php

namespace App\Mcp\Tools;

use App\Models\PageText;
use App\Support\PageTexts;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('Read the text of any page as visitors see it: every heading (h1-h6), paragraph, list item, link, button, label and image alt text in order, with the area it sits in (header, main, footer). Header and footer text is the same on every page. With search, also returns the raw HTML around that text, for HTML changes. Use before update_page_text.')]
class GetPageText extends SiteTool
{
    protected string $name = 'get_page_text';

    public function handle(Request $request): Response
    {
        $path = Seo::path((string) $request->get('path'));
        [$status, $html] = PageTexts::render($path);
        if ($status !== 200) {
            return $this->fail("The page {$path} answered with status {$status}. Use list_pages for valid paths.");
        }

        $search = (string) $request->get('search', '');
        $isCategory = preg_match('#^/(ar/)?course-category/([a-z0-9-]+)$#', $path, $m);
        $isCourse = preg_match('#^/(ar/)?course/([a-z0-9-]+)$#', $path, $c);

        return $this->result([
            'path' => $path,
            'url' => url($path),
            'tip' => $isCategory ? "The main copy of this page is easier to change with get_category_content / update_category_content (slug \"{$m[2]}\")."
                : ($isCourse ? "The course title, summary and document are changed with get_course / update_course (slug \"{$c[2]}\")." : null),
            'changes' => PageText::whereIn('path', [$path, PageText::ALL_PAGES])->orderBy('id')->get(['id', 'path', 'find', 'replace', 'is_html']),
            'html_around_search' => $search !== '' ? PageTexts::snippets($html, $search) : null,
            'text' => PageTexts::outline($html),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'path' => $schema->string()->description('Page path such as "/", "/about", "/ar/contact", "/course-category/personal-development", or its full URL. list_pages lists them.')->required(),
            'search' => $schema->string()->description('Text to find: returns the raw HTML around each place it appears.'),
        ];
    }
}
