<?php

namespace App\Mcp\Tools;

use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

/** Shared helpers for the website tools. */
abstract class SiteTool extends Tool
{
    /** Lower-case words joined by hyphens, as used in every slug on the site. */
    public const SLUG = '^[a-z0-9]+(-[a-z0-9]+)*$';

    public const SLUG_RULE = 'regex:/'.self::SLUG.'/';

    protected function result(array $data): Response
    {
        return Response::text(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }

    protected function fail(string $message): Response
    {
        return Response::error($message);
    }

    /** Only the given fields that the request actually sent. */
    protected function sent(Request $request, array $fields): array
    {
        return array_intersect_key($request->all(), array_flip($fields));
    }
}
