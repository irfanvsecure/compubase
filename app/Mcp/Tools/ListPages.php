<?php

namespace App\Mcp\Tools;

use App\Http\Controllers\SeoController;
use App\Models\SeoMeta;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List the public pages of the website (English and Arabic main pages, every course page, published blog posts) with their paths, and which have saved SEO overrides. Use a path with get_seo / update_seo.')]
class ListPages extends SiteTool
{
    protected string $name = 'list_pages';

    public function handle(Request $request): Response
    {
        $overrides = SeoMeta::pluck('path')->flip();
        $pages = collect(SeoController::pages())->map(fn ($page) => [
            'path' => $page['path'],
            'title' => $page['title'],
            'url' => url($page['path']),
            'has_seo_override' => isset($overrides[$page['path']]),
        ]);

        if ($search = mb_strtolower(trim((string) $request->get('search')))) {
            $pages = $pages->filter(fn ($p) => str_contains(mb_strtolower($p['path'].' '.$p['title']), $search));
        }
        if ($request->boolean('only_with_seo')) {
            $pages = $pages->where('has_seo_override', true);
        }

        $perPage = 100;
        $page = max(1, $request->integer('page', 1));

        return $this->result([
            'total' => $pages->count(),
            'page' => $page,
            'last_page' => max(1, (int) ceil($pages->count() / $perPage)),
            'pages' => $pages->values()->forPage($page, $perPage)->values()->all(),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'search' => $schema->string()->description('Text to find in the path or title.'),
            'only_with_seo' => $schema->boolean()->description('Only pages that have SEO overrides saved.'),
            'page' => $schema->integer()->description('Page number, from 1 (100 per page).'),
        ];
    }
}
