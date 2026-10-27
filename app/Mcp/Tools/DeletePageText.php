<?php

namespace App\Mcp\Tools;

use App\Models\PageText;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Undo a text change saved with update_page_text, so the page shows its original text there again. Get the id from list_page_texts.')]
class DeletePageText extends SiteTool
{
    protected string $name = 'delete_page_text';

    public function handle(Request $request): Response
    {
        $text = PageText::find($request->integer('id'));
        if (! $text) {
            return $this->fail('No text change with id '.$request->get('id').'. Use list_page_texts.');
        }
        $text->delete();
        Activity::log('delete_page_text', "page:{$text->path}", "Undid a text change on {$text->path}", $text->only(['find', 'replace', 'link', 'is_html']));

        return $this->result(['deleted' => $text->id, 'path' => $text->path, 'restored_text' => $text->find]);
    }

    public function schema(JsonSchema $schema): array
    {
        return ['id' => $schema->integer()->description('Id of the change, from list_page_texts.')->required()];
    }
}
