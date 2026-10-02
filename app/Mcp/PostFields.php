<?php

namespace App\Mcp;

use App\Models\Post;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Carbon;

/** The blog post fields create_post and update_post share. */
class PostFields
{
    public static function rules(bool $required): array
    {
        $need = $required ? 'required' : 'sometimes';

        return [
            'title' => "{$need}|string|max:255",
            'body' => "{$need}|string|max:200000",
            'excerpt' => 'sometimes|nullable|string|max:500',
            'cover_image' => 'sometimes|nullable|string|max:500',
            'status' => 'sometimes|in:draft,published',
            'published_at' => 'sometimes|nullable|date',
        ];
    }

    public static function schema(JsonSchema $schema, bool $required): array
    {
        $req = fn ($type) => $required ? $type->required() : $type;

        return [
            'title' => $req($schema->string()->description('Post title, also the page heading.')),
            'body' => $req($schema->string()->description('The article in Markdown: ## headings, lists, **bold**, [links](https://...), tables, and images as ![alt text](url from upload_image). Raw HTML is removed.')),
            'excerpt' => $schema->string()->description('One or two sentences shown on the blog list and used as the meta description. Recommended: 120-155 characters.'),
            'cover_image' => $schema->string()->description('Cover image: a path or URL returned by upload_image. Empty string removes it.'),
            'status' => $schema->string()->enum(['draft', 'published'])->description('"draft" keeps it hidden (preview_url still works); "published" shows it on the blog from published_at.'),
            'published_at' => $schema->string()->description('When it goes live, ISO 8601 (e.g. 2026-10-05T09:00:00+04:00). A future date schedules it. Defaults to now when publishing.'),
        ];
    }

    public static function fill(Post $post, array $data): Post
    {
        $post->fill(array_intersect_key($data, array_flip(['title', 'body', 'excerpt', 'status'])));
        if (array_key_exists('cover_image', $data)) {
            $post->cover_image = Data::localImage($data['cover_image']);
        }
        if (array_key_exists('published_at', $data)) {
            $post->published_at = $data['published_at'] ? Carbon::parse($data['published_at']) : null;
        }
        if ($post->status === 'published' && $post->published_at === null) {
            $post->published_at = now();
        }

        return $post;
    }
}
