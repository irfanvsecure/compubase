<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Category;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List every course category in site order, with its English and Arabic name, group (management or it) and number of courses.')]
class ListCategories extends SiteTool
{
    protected string $name = 'list_categories';

    public function handle(Request $request): Response
    {
        $categories = Category::withCount('courses')->orderBy('position')->orderBy('id')->get();

        return $this->result(['categories' => $categories->map(fn ($c) => Data::category($c))->all()]);
    }
}
