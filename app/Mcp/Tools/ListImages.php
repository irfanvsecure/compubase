<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Media;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List uploaded images, newest first, with their URL, size and alt text. (The original course photos in images/courses/ are not listed; get_course shows a course\'s photo.)')]
class ListImages extends SiteTool
{
    protected string $name = 'list_images';

    public function handle(Request $request): Response
    {
        $query = Media::latest('id');
        if ($search = trim((string) $request->get('search'))) {
            $query->where(fn ($q) => $q->where('path', 'like', "%{$search}%")
                ->orWhere('alt_en', 'like', "%{$search}%")->orWhere('alt_ar', 'like', "%{$search}%"));
        }
        $page = $query->paginate(50, ['*'], 'page', max(1, $request->integer('page', 1)));

        return $this->result([
            'total' => $page->total(),
            'page' => $page->currentPage(),
            'last_page' => $page->lastPage(),
            'images' => collect($page->items())->map(fn ($m) => Data::media($m))->all(),
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'search' => $schema->string()->description('Text to find in the file name or alt text.'),
            'page' => $schema->integer()->description('Page number, from 1 (50 per page).'),
        ];
    }
}
