<?php

namespace App\Mcp\Tools;

use App\Models\Category;
use App\Models\Course;
use App\Models\Media;
use App\Models\Post;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List deleted courses, categories, blog posts and images that restore_item can bring back.')]
class ListTrash extends SiteTool
{
    protected string $name = 'list_trash';

    public function handle(Request $request): Response
    {
        $when = fn ($m) => $m->deleted_at->toIso8601String();

        return $this->result([
            'courses' => Course::onlyTrashed()->get()->map(fn ($m) => ['key' => $m->slug, 'title' => $m->title_en, 'deleted_at' => $when($m)]),
            'categories' => Category::onlyTrashed()->get()->map(fn ($m) => ['key' => $m->slug, 'title' => $m->name_en, 'deleted_at' => $when($m)]),
            'posts' => Post::onlyTrashed()->get()->map(fn ($m) => ['key' => (string) $m->id, 'title' => $m->title, 'deleted_at' => $when($m)]),
            'images' => Media::onlyTrashed()->get()->map(fn ($m) => ['key' => (string) $m->id, 'title' => $m->path, 'deleted_at' => $when($m)]),
        ]);
    }
}
