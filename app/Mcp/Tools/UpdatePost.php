<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Mcp\PostFields;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Edit, publish, unpublish or reschedule a blog post. Only the fields you send change. A new slug on a published post redirects (301) the old address.')]
class UpdatePost extends SiteTool
{
    protected string $name = 'update_post';

    public function handle(Request $request): Response
    {
        $post = Post::find($request->integer('id'));
        if (! $post) {
            return $this->fail('No post with id '.$request->get('id').'. Use list_posts.');
        }

        $data = $request->validate([
            'slug' => ['sometimes', 'string', 'max:150', self::SLUG_RULE, Rule::unique('posts')->where('locale', $post->locale)->ignore($post->id)],
        ] + PostFields::rules(required: false));

        $prefix = $post->locale === 'ar' ? '/ar' : '';
        $oldPath = "{$prefix}/blog/{$post->slug}";
        $wasLive = $post->isLive();

        DB::transaction(function () use ($post, $data, $prefix, $oldPath, $wasLive) {
            PostFields::fill($post, $data);
            if (isset($data['slug']) && $data['slug'] !== $post->getOriginal('slug')) {
                $post->slug = $data['slug'];
                $newPath = "{$prefix}/blog/{$post->slug}";
                SeoMeta::where('path', $oldPath)->update(['path' => $newPath]);
                if ($wasLive) {
                    Redirect::point($oldPath, $newPath);
                }
            }
            $post->save();
        });
        Activity::log('update_post', "post:{$post->id}", "Updated post {$post->title}", $data);

        return $this->result(['updated' => Data::post($post)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->description('Post id from list_posts.')->required(),
            'slug' => $schema->string()->description('A new slug (changes the address).')->pattern(self::SLUG),
        ] + PostFields::schema($schema, required: false);
    }
}
