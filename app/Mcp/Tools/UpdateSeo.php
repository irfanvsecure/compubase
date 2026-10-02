<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\SeoMeta;
use App\Support\Activity;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Set the SEO of one page: title tag, meta description, keywords, social share image, robots and canonical URL. Only the fields you send change; an empty string returns that field to the page\'s default. Fields left empty fall back to what the page sets itself.')]
class UpdateSeo extends SiteTool
{
    protected string $name = 'update_seo';

    public const FIELDS = ['title', 'description', 'keywords', 'og_image', 'robots', 'canonical'];

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'path' => 'required|string|max:255',
            'title' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:1000',
            'keywords' => 'sometimes|nullable|string|max:500',
            'og_image' => 'sometimes|nullable|string|max:500',
            'robots' => ['sometimes', 'nullable', 'string', 'max:100', 'regex:/^[a-z\-, :0-9]*$/'],
            'canonical' => 'sometimes|nullable|url:http,https|max:255',
        ]);

        $path = Seo::path($data['path']);
        $fields = array_map(fn ($v) => ($v === null || trim($v) === '') ? null : trim($v), array_intersect_key($data, array_flip(self::FIELDS)));
        // An image on another site stays a URL; one on this site is checked and stored as a path.
        $image = $fields['og_image'] ?? null;
        if ($image !== null && (! preg_match('#^https?://#', $image) || str_starts_with($image, url('/')))) {
            $fields['og_image'] = Data::localImage($image);
        }

        $seo = SeoMeta::firstOrNew(['path' => $path])->fill($fields);
        if (collect($seo->only(self::FIELDS))->filter()->isEmpty()) {
            $seo->exists && $seo->delete();
            $result = ['path' => $path, 'override' => null, 'note' => 'No overrides left; the page uses its own defaults.'];
        } else {
            $seo->save();
            $result = ['path' => $path, 'override' => $seo->only(self::FIELDS)];
        }
        Activity::log('update_seo', "seo:{$path}", "Updated SEO of {$path}", $fields);

        return $this->result($result + ['url' => url($path)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'path' => $schema->string()->description('Page path such as "/", "/about", "/course/pmp", "/ar/blog/my-post", or its full URL. list_pages lists them.')->required(),
            'title' => $schema->string()->description('Title tag. Aim for 50-60 characters with the main keyword first.'),
            'description' => $schema->string()->description('Meta description. Aim for 120-155 characters.'),
            'keywords' => $schema->string()->description('Comma-separated keywords.'),
            'og_image' => $schema->string()->description('Image shown when the page is shared: a path/URL from upload_image or any https image URL.'),
            'robots' => $schema->string()->description('Robots meta for this page, e.g. "index, follow" or "noindex, nofollow". noindex pages are also left out of sitemap.xml.'),
            'canonical' => $schema->string()->description('Full canonical URL, when this page duplicates another.'),
        ];
    }
}
