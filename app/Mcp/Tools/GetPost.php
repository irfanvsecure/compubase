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
#[Description('Get one blog post with its full Markdown body, its public URL and a preview link that works even for drafts.')]
class GetPost extends SiteTool
{
    protected string $name = 'get_post';

    public function handle(Request $request): Response
    {
        $post = Post::find($request->integer('id'));

        return $post ? $this->result(Data::post($post, full: true)) : $this->fail('No post with id '.$request->get('id').'. Use list_posts.');
    }

    public function schema(JsonSchema $schema): array
    {
        return ['id' => $schema->integer()->description('Post id from list_posts.')->required()];
    }
}
