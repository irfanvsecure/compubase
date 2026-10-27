<?php

namespace App\Mcp\Tools;

use App\Mcp\CategoryCopyFields;
use App\Models\CategoryCopy;
use App\Support\Catalog;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('Get the written copy of a category page (/course-category/{slug} or /ar/course-category/{slug}) in one language: title tag, meta description, H1, intro, "where to start" block with popular course picks, the H2 sections, team training block, "how to choose" block, FAQs and contact block. Use before update_category_content.')]
class GetCategoryContent extends SiteTool
{
    protected string $name = 'get_category_content';

    public function handle(Request $request): Response
    {
        $data = $request->validate(['slug' => 'required|string', 'lang' => 'sometimes|in:en,ar']);
        $slug = $data['slug'];
        $ar = ($data['lang'] ?? 'en') === 'ar';
        if (! isset(Catalog::categories()[$slug])) {
            return $this->fail('No category with slug "'.$slug.'". Use list_categories to see them.');
        }

        $saved = CategoryCopy::where(['slug' => $slug, 'locale' => $ar ? 'ar' : 'en'])->exists();
        $copy = Catalog::categoryContent($slug, $ar);

        return $this->result([
            'slug' => $slug,
            'lang' => $ar ? 'ar' : 'en',
            'url' => Catalog::categoryUrl($slug, $ar),
            'source' => $saved ? 'edited' : ($copy ? 'default' : 'none'),
            'note' => $copy ? null : 'This page has no written copy yet and shows generic text. update_category_content can add it.',
            'content' => CategoryCopyFields::present($copy),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->description('Category slug, e.g. "personal-development".')->required(),
            'lang' => $schema->string()->enum(['en', 'ar'])->description('Language of the page. Default en.'),
        ];
    }
}
