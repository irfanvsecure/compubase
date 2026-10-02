<?php

namespace App\Mcp\Tools;

use App\Models\Category;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsDestructive;

#[IsDestructive]
#[Description('Move a category to the trash; it disappears from the site. Courses in no other category disappear with it, so the tool refuses unless force is true. restore_item brings it back.')]
class DeleteCategory extends SiteTool
{
    protected string $name = 'delete_category';

    public function handle(Request $request): Response
    {
        $category = Category::where('slug', $request->get('slug'))->first();
        if (! $category) {
            return $this->fail('No category with slug "'.$request->get('slug').'".');
        }

        $only = $category->courses()->withCount('categories')->get()->where('categories_count', 1)->pluck('slug')->all();
        if ($only && ! $request->boolean('force')) {
            return $this->fail('These courses are only in this category and would disappear from the site: '.implode(', ', $only).'. Move them to another category first, or call again with force: true.');
        }

        $category->delete();
        Activity::log('delete_category', "category:{$category->slug}", "Deleted category {$category->name_en}", ['hidden_courses' => $only]);

        return $this->result(['deleted' => $category->slug, 'courses_now_hidden' => $only, 'restore_with' => ['tool' => 'restore_item', 'type' => 'category', 'key' => $category->slug]]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->required(),
            'force' => $schema->boolean()->description('Delete even if some courses would be left in no category.'),
        ];
    }
}
