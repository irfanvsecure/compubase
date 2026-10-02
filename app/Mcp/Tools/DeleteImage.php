<?php

namespace App\Mcp\Tools;

use App\Models\Media;
use App\Support\Activity;
use App\Support\Images;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsDestructive;

#[IsDestructive]
#[Description('Delete an uploaded image: its URL stops working. Refuses while a course, post or page still uses it, unless force is true. restore_item brings it back.')]
class DeleteImage extends SiteTool
{
    protected string $name = 'delete_image';

    public function handle(Request $request): Response
    {
        $media = Media::find($request->integer('id'));
        if (! $media) {
            return $this->fail('No image with id '.$request->get('id').'.');
        }

        $uses = Images::usages($media);
        if ($uses && ! $request->boolean('force')) {
            return $this->fail('The image is still used by: '.implode('; ', $uses).'. Change those first, or call again with force: true (they will show a broken image).');
        }

        Images::trash($media);
        Activity::log('delete_image', "image:{$media->id}", "Deleted {$media->path}", ['was_used_by' => $uses]);

        return $this->result(['deleted' => $media->id, 'path' => $media->path, 'was_used_by' => $uses, 'restore_with' => ['tool' => 'restore_item', 'type' => 'image', 'key' => (string) $media->id]]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'id' => $schema->integer()->required(),
            'force' => $schema->boolean()->description('Delete even though something still uses the image.'),
        ];
    }
}
