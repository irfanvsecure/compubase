<?php

namespace App\Mcp\Tools;

use App\Models\Redirect;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List the saved redirects (old address → new address), with how often each was used.')]
class ListRedirects extends SiteTool
{
    protected string $name = 'list_redirects';

    public function handle(Request $request): Response
    {
        return $this->result(['redirects' => Redirect::orderBy('from_path')->get(['from_path', 'to_path', 'status_code', 'hits', 'updated_at'])->toArray()]);
    }
}
