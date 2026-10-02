<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Course;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List or search courses (without their full documents; use get_course for one course). Filter by category slug and/or search text in the English or Arabic title or slug.')]
class ListCourses extends SiteTool
{
    protected string $name = 'list_courses';

    public function handle(Request $request): Response
    {
        $request->validate(['page' => 'nullable|integer|min:1', 'per_page' => 'nullable|integer|min:1|max:100']);
        $query = Course::with('categories')->orderBy('title_en');

        if ($category = $request->get('category')) {
            $query->whereHas('categories', fn ($q) => $q->where('slug', $category));
        }
        if ($search = trim((string) $request->get('search'))) {
            $query->where(fn ($q) => $q->where('title_en', 'like', "%{$search}%")
                ->orWhere('title_ar', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%"));
        }

        $page = $query->paginate($request->integer('per_page', 50), ['*'], 'page', $request->integer('page', 1));

        return $this->result([
            'total' => $page->total(),
            'page' => $page->currentPage(),
            'last_page' => $page->lastPage(),
            'courses' => collect($page->items())->map(fn ($c) => Data::course($c))->all(),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'category' => $schema->string()->description('Only courses in this category slug.'),
            'search' => $schema->string()->description('Text to find in the title (English or Arabic) or slug.'),
            'page' => $schema->integer()->description('Page number, from 1.'),
            'per_page' => $schema->integer()->description('Courses per page, up to 100. Default 50.'),
        ];
    }
}
