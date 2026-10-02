<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Mcp\PostFields;
use App\Models\Post;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Write a new blog post in English (/blog/{slug}) or Arabic (/ar/blog/{slug}). It starts as a draft unless status is "published". Returns its URL and a preview link.')]
class CreatePost extends SiteTool
{
    protected string $name = 'create_post';

    public function handle(Request $request): Response
    {
        $locale = $request->get('locale', 'en');
        $data = $request->validate([
            'locale' => 'sometimes|in:en,ar',
            'slug' => ['sometimes', 'string', 'max:150', self::SLUG_RULE, Rule::unique('posts')->where('locale', $locale)],
        ] + PostFields::rules(required: true), ['slug.unique' => 'A post with this slug already exists in this language (it may be in the trash).']);

        $slug = $data['slug'] ?? Str::slug($data['title']);
        if ($slug === '' || Post::withTrashed()->where('locale', $locale)->where('slug', $slug)->exists()) {
            $slug = trim($slug.'-'.now()->format('ymdHis'), '-');
        }

        $post = PostFields::fill(new Post(['locale' => $locale, 'slug' => $slug, 'status' => 'draft', 'author_id' => auth()->id()]), $data);
        $post->save();
        Activity::log('create_post', "post:{$post->id}", "Created post {$post->title}", $data);

        return $this->result(['created' => Data::post($post)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'locale' => $schema->string()->enum(['en', 'ar'])->description('Language of the post. Default "en".'),
            'slug' => $schema->string()->description('URL-safe id in English letters, e.g. "how-to-pass-the-pmp-exam". Made from the title when left out; give one for Arabic posts.')->pattern(self::SLUG),
        ] + PostFields::schema($schema, required: true);
    }
}
