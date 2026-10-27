<?php

namespace App\Http\Middleware;

use App\Support\PageTexts;
use App\Support\Seo;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

/** Shows the text changes saved through the MCP server (update_page_text) on each HTML page. */
class ApplyPageTexts
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $path = Seo::path($request->path());
        if (! $request->isMethod('GET') || $response->getStatusCode() !== 200 || ! PageTexts::appliesTo($path)
            || ! str_contains((string) $response->headers->get('Content-Type'), 'text/html')) {
            return $response;
        }

        try {
            $texts = PageTexts::for($path);
        } catch (Throwable) {
            return $response; // e.g. before the migration has run
        }
        if ($texts->isNotEmpty()) {
            $response->setContent(PageTexts::apply((string) $response->getContent(), $texts));
        }

        return $response;
    }
}
