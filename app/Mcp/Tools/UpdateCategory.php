<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Category;
use App\Models\Course;
use App\Support\Activity;
use App\Support\Catalog;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change a category: its names, group, position, slug, or its full ordered list of courses. Only the fields you send change.')]
class UpdateCategory extends SiteTool
{
    protected string $name = 'update_category';

    public function handle(Request $request): Response
    {
        $category = Category::where('slug', $request->get('slug'))->first();
        if (! $category) {
            return $this->fail('No category with slug "'.$request->get('slug').'". Use list_categories to see them.');
        }

        $data = $request->validate([
            'new_slug' => ['sometimes', 'string', 'max:100', self::SLUG_RULE, Rule::unique('categories', 'slug')->ignore($category->id)],
            'name_en' => 'sometimes|string|max:200',
            'name_ar' => 'sometimes|string|max:200',
            'group' => 'sometimes|in:management,it',
            'position' => 'sometimes|integer|min:1',
            'courses' => 'sometimes|array',
            'courses.*' => 'string|distinct',
        ]);

        $ids = [];
        if (isset($data['courses'])) {
            $found = Course::whereIn('slug', $data['courses'])->pluck('id', 'slug');
            $missing = array_diff($data['courses'], $found->keys()->all());
            if ($missing) {
                return $this->fail('Unknown course slugs: '.implode(', ', $missing));
            }
            foreach (array_values($data['courses']) as $i => $slug) {
                $ids[$found[$slug]] = ['position' => $i + 1];
            }
        }

        DB::transaction(function () use ($category, $data, $ids) {
            $fields = array_intersect_key($data, array_flip(['name_en', 'name_ar', 'group', 'position']));
            if (isset($data['new_slug'])) {
                $fields['slug'] = $data['new_slug'];
            }
            $category->fill($fields)->save();
            if (isset($data['courses'])) {
                $category->courses()->sync($ids);
            }
        });
        Catalog::flush();
        Activity::log('update_category', "category:{$category->slug}", "Updated category {$category->name_en}", $data);

        return $this->result(['updated' => Data::category($category->fresh())]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->description('Current slug of the category.')->required(),
            'new_slug' => $schema->string()->description('A new slug.')->pattern(self::SLUG),
            'name_en' => $schema->string()->description('English name.'),
            'name_ar' => $schema->string()->description('Arabic name.'),
            'group' => $schema->string()->enum(['management', 'it']),
            'position' => $schema->integer()->description('Place in the category order, 1 = first.'),
            'courses' => $schema->array()->items($schema->string())->description('The complete list of course slugs in this category, in display order. Replaces the current list.'),
        ];
    }
}
