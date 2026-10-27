<?php

namespace App\Mcp\Tools;

use App\Mcp\CategoryCopyFields;
use App\Models\CategoryCopy;
use App\Support\Activity;
use App\Support\Catalog;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change the written copy of a category page in one language. Only the fields you send change; each field you send replaces that whole part (e.g. sending faq replaces every FAQ, sending sections replaces every section). null removes a part. The FAQPage schema follows the FAQs. reset: true goes back to the copy the site shipped with. Read it with get_category_content first.')]
class UpdateCategoryContent extends SiteTool
{
    protected string $name = 'update_category_content';

    public function handle(Request $request): Response
    {
        $data = $request->validate(['slug' => 'required|string', 'lang' => 'sometimes|in:en,ar', 'reset' => 'sometimes|boolean'] + CategoryCopyFields::rules());
        $slug = $data['slug'];
        $locale = $data['lang'] ?? 'en';
        $ar = $locale === 'ar';
        if (! isset(Catalog::categories()[$slug])) {
            return $this->fail('No category with slug "'.$slug.'". Use list_categories to see them.');
        }

        $before = Catalog::categoryContent($slug, $ar);
        if (! empty($data['reset'])) {
            CategoryCopy::where(['slug' => $slug, 'locale' => $locale])->delete();
            Activity::log('update_category_content', "category:{$slug}:{$locale}", "Reset the copy of category {$slug} ({$locale})", ['before' => $before]);

            return $this->result(['slug' => $slug, 'lang' => $locale, 'url' => Catalog::categoryUrl($slug, $ar), 'content' => CategoryCopyFields::present(Catalog::categoryContent($slug, $ar))]);
        }

        $changes = array_intersect_key($data, array_flip(CategoryCopyFields::FIELDS));
        if (! $changes) {
            return $this->fail('Send at least one part to change: '.implode(', ', CategoryCopyFields::FIELDS).'.');
        }
        $copy = CategoryCopyFields::store(array_replace(CategoryCopyFields::present($before), $changes));
        CategoryCopy::updateOrCreate(['slug' => $slug, 'locale' => $locale], ['content' => $copy]);
        Activity::log('update_category_content', "category:{$slug}:{$locale}", "Updated the copy of category {$slug} ({$locale}): ".implode(', ', array_keys($changes)), ['changed' => $changes, 'before' => array_intersect_key($before ?? [], $changes)]);

        $unknown = CategoryCopyFields::unknownCourses(CategoryCopyFields::present($copy));

        return $this->result([
            'slug' => $slug,
            'lang' => $locale,
            'url' => Catalog::categoryUrl($slug, $ar),
            'changed' => array_keys($changes),
            'warning' => $unknown ? 'These course slugs do not exist, so their links show as plain text and their picks are hidden: '.implode(', ', $unknown) : null,
            'content' => CategoryCopyFields::present($copy),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        $block = fn (string $about) => $schema->object()->description($about.' {"heading": "…", "text": ["paragraph", …]}. '.CategoryCopyFields::HELP);

        return [
            'slug' => $schema->string()->description('Category slug, e.g. "personal-development".')->required(),
            'lang' => $schema->string()->enum(['en', 'ar'])->description('Language of the page. Default en.'),
            'title' => $schema->string()->description('Title tag (an update_seo title for the page still wins).'),
            'description' => $schema->string()->description('Meta description (an update_seo description still wins).'),
            'h1' => $schema->string()->description('The H1 heading.'),
            'intro' => $schema->array()->items($schema->string())->description('Paragraphs: the first is the hero text under the H1, the rest open the "where to start" block. '.CategoryCopyFields::HELP),
            'start' => $schema->object()->description('"Where to start" block: {"heading": "H2", "text": ["paragraph", …], "picks": [{"course": "course-slug", "title": "shown title", "best_for": "who it suits"}]}. '.CategoryCopyFields::HELP),
            'sections' => $schema->array()->items($schema->object())->description('The H2 sections in order: [{"heading": "H2", "text": ["paragraph", …]}]. '.CategoryCopyFields::HELP),
            'team' => $block('Team training block.'),
            'choose' => $block('"How to choose" block.'),
            'faq' => $schema->array()->items($schema->object())->description('Every FAQ in order: [{"question": "…", "answer": "…"}]. Plain text.'),
            'contact' => $block('Closing contact block.'),
            'reset' => $schema->boolean()->description('Drop all edits and go back to the copy the site shipped with.'),
        ];
    }
}
