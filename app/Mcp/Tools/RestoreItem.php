<?php

namespace App\Mcp\Tools;

use App\Models\Category;
use App\Models\Course;
use App\Models\Media;
use App\Models\Post;
use App\Support\Activity;
use App\Support\Images;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Bring back a deleted course, category, blog post or image from the trash (see list_trash).')]
class RestoreItem extends SiteTool
{
    protected string $name = 'restore_item';

    public function handle(Request $request): Response
    {
        $data = $request->validate(['type' => 'required|in:course,category,post,image', 'key' => 'required|string']);
        $key = $data['key'];

        $item = match ($data['type']) {
            'course' => Course::onlyTrashed()->where('slug', $key)->first(),
            'category' => Category::onlyTrashed()->where('slug', $key)->first(),
            'post' => Post::onlyTrashed()->find((int) $key),
            'image' => Media::onlyTrashed()->find((int) $key),
        };
        if (! $item) {
            return $this->fail("No deleted {$data['type']} \"{$key}\" in the trash. Use list_trash.");
        }

        $item instanceof Media ? Images::restore($item) : $item->restore();
        Activity::log('restore_item', "{$data['type']}:{$key}", "Restored {$data['type']} {$key}");

        return $this->result(['restored' => $data['type'], 'key' => $key]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'type' => $schema->string()->enum(['course', 'category', 'post', 'image'])->required(),
            'key' => $schema->string()->description('Slug for a course or category, id for a post or image, as list_trash shows.')->required(),
        ];
    }
}
