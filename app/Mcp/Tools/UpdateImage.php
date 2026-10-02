<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Media;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change the English or Arabic alt text of an uploaded image. To replace the picture itself, upload a new image and point the course, post or page at it.')]
class UpdateImage extends SiteTool
{
    protected string $name = 'update_image';

    public function handle(Request $request): Response
    {
        $media = Media::find($request->integer('id'));
        if (! $media) {
            return $this->fail('No image with id '.$request->get('id').'. Use list_images.');
        }
        $data = $request->validate(['alt_en' => 'sometimes|nullable|string|max:255', 'alt_ar' => 'sometimes|nullable|string|max:255']);
        $media->fill($data)->save();
        Activity::log('update_image', "image:{$media->id}", "Updated alt text of {$media->path}", $data);

        return $this->result(['updated' => Data::media($media)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->required(),
            'alt_en' => $schema->string(),
            'alt_ar' => $schema->string(),
        ];
    }
}
