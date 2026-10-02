<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Category;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Create a course category. It appears on the Courses and Schedule pages once it has courses; add courses with update_category, or with the categories field of create_course / update_course.')]
class CreateCategory extends SiteTool
{
    protected string $name = 'create_category';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'slug' => ['required', 'string', 'max:100', self::SLUG_RULE, 'unique:categories,slug'],
            'name_en' => 'required|string|max:200',
            'name_ar' => 'required|string|max:200',
            'group' => 'required|in:management,it',
            'position' => 'nullable|integer|min:1',
        ], ['slug.unique' => 'A category with this slug already exists (it may be in the trash: see list_trash).']);

        $data['position'] ??= (int) Category::max('position') + 1;
        $category = Category::create($data);
        Activity::log('create_category', "category:{$category->slug}", "Created category {$category->name_en}", $data);

        return $this->result(['created' => Data::category($category)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->description('URL-safe id: lower-case words joined by hyphens, e.g. "data-science".')->pattern(self::SLUG)->required(),
            'name_en' => $schema->string()->description('English name.')->required(),
            'name_ar' => $schema->string()->description('Arabic name.')->required(),
            'group' => $schema->string()->enum(['management', 'it'])->description('Which list the category is shown under: Management courses or IT courses.')->required(),
            'position' => $schema->integer()->description('Place in the category order, 1 = first. Defaults to last.'),
        ];
    }
}
