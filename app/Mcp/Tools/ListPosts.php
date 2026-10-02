<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Post;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List blog posts, newest first, without their bodies (use get_post for one post). Filter by language, status or search text.')]
class ListPosts extends SiteTool
{
    protected string $name = 'list_posts';

    public function handle(Request $request): Response
    {
        $request->validate(['locale' => 'nullable|in:en,ar', 'status' => 'nullable|in:draft,published', 'page' => 'nullable|integer|min:1']);
        $query = Post::query()->latest('published_at')->latest('id');
        foreach (['locale', 'status'] as $field) {
            if ($value = $request->get($field)) {
                $query->where($field, $value);
            }
        }
        if ($search = trim((string) $request->get('search'))) {
            $query->where(fn ($q) => $q->where('title', 'like', "%{$search}%")->orWhere('slug', 'like', "%{$search}%"));
        }
        $page = $query->paginate(30, ['*'], 'page', $request->integer('page', 1));

        return $this->result([
            'total' => $page->total(),
            'page' => $page->currentPage(),
            'last_page' => $page->lastPage(),
            'posts' => collect($page->items())->map(fn ($p) => Data::post($p))->all(),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'locale' => $schema->string()->enum(['en', 'ar'])->description('Only English or only Arabic posts.'),
            'status' => $schema->string()->enum(['draft', 'published']),
            'search' => $schema->string()->description('Text to find in the title or slug.'),
            'page' => $schema->integer()->description('Page number, from 1 (30 posts per page).'),
        ];
    }
}
