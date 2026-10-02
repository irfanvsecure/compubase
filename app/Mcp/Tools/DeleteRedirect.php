<?php

namespace App\Mcp\Tools;

use App\Models\Redirect;
use App\Support\Activity;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsDestructive;

#[IsDestructive]
#[Description('Remove a redirect; the old address shows "not found" again.')]
class DeleteRedirect extends SiteTool
{
    protected string $name = 'delete_redirect';

    public function handle(Request $request): Response
    {
        $from = Seo::path((string) $request->get('from'));
        $redirect = Redirect::where('from_path', $from)->first();
        if (! $redirect) {
            return $this->fail("No redirect from {$from}. Use list_redirects.");
        }
        $redirect->delete();
        Activity::log('delete_redirect', "redirect:{$from}", "Removed redirect {$from} → {$redirect->to_path}");

        return $this->result(['deleted' => $from, 'was_pointing_to' => $redirect->to_path]);
    }

    public function schema(JsonSchema $schema): array
    {
        return ['from' => $schema->string()->description('The old path of the redirect.')->required()];
    }
}
