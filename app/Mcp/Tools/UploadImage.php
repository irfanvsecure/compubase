<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Support\Activity;
use App\Support\Images;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Upload an image to the website from a public URL or from base64 data (JPEG, PNG, WebP or GIF, up to 8 MB). Returns its path and URL: use the path for a course photo, post cover or SEO image, and the markdown snippet inside a blog post.')]
class UploadImage extends SiteTool
{
    protected string $name = 'upload_image';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'url' => 'required_without:base64|nullable|string|max:2000',
            'base64' => 'required_without:url|nullable|string',
            'name' => 'nullable|string|max:150',
            'alt_en' => 'nullable|string|max:255',
            'alt_ar' => 'nullable|string|max:255',
        ]);

        $media = ! empty($data['url'])
            ? Images::fromUrl($data['url'], $data['name'] ?? null)
            : Images::fromBase64($data['base64'], $data['name'] ?? null);
        $media->fill(['alt_en' => $data['alt_en'] ?? null, 'alt_ar' => $data['alt_ar'] ?? null])->save();
        Activity::log('upload_image', "image:{$media->id}", "Uploaded {$media->path}", ['source' => $data['url'] ?? 'base64']);

        return $this->result(['uploaded' => Data::media($media)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'url' => $schema->string()->description('Public http(s) address of the image to download.'),
            'base64' => $schema->string()->description('The image file as base64 (a "data:image/...;base64," prefix is fine). Use when there is no URL.'),
            'name' => $schema->string()->description('File name to use, in English words, e.g. "pmp-classroom". Helps SEO.'),
            'alt_en' => $schema->string()->description('English alt text describing the image.'),
            'alt_ar' => $schema->string()->description('Arabic alt text.'),
        ];
    }
}
