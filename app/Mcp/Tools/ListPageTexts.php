<?php

namespace App\Mcp\Tools;

use App\Models\PageText;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List the text changes saved with update_page_text, for one page or all of them. path "*" means a change shown on every page.')]
class ListPageTexts extends SiteTool
{
    protected string $name = 'list_page_texts';

    public function handle(Request $request): Response
    {
        $texts = PageText::orderBy('path')->orderBy('id');
        if ($request->get('path')) {
            $texts->whereIn('path', [Seo::path($request->get('path')), PageText::ALL_PAGES]);
        }

        return $this->result($texts->get()->map(fn ($t) => [
            'id' => $t->id,
            'path' => $t->path,
            'find' => $t->find,
            'replace' => $t->replace,
            'html' => $t->is_html,
            'updated_at' => $t->updated_at?->toIso8601String(),
        ])->all());
    }

    public function schema(JsonSchema $schema): array
    {
        return ['path' => $schema->string()->description('Only changes shown on this page, e.g. "/about".')];
    }
}
