<?php

namespace App\Mcp\Tools;

use App\Models\Post;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsDestructive;

#[IsDestructive]
#[Description('Move a blog post to the trash; it disappears from the blog. restore_item brings it back. To only hide it, use update_post with status "draft" instead.')]
class DeletePost extends SiteTool
{
    protected string $name = 'delete_post';

    public function handle(Request $request): Response
    {
        $post = Post::find($request->integer('id'));
        if (! $post) {
            return $this->fail('No post with id '.$request->get('id').'.');
        }

        $post->delete();
        Activity::log('delete_post', "post:{$post->id}", "Deleted post {$post->title}");

        return $this->result(['deleted' => $post->id, 'title' => $post->title, 'restore_with' => ['tool' => 'restore_item', 'type' => 'post', 'key' => (string) $post->id]]);
    }

    public function schema(JsonSchema $schema): array
    {
        return ['id' => $schema->integer()->required()];
    }
}
