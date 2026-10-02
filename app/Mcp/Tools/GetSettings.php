<?php

namespace App\Mcp\Tools;

use App\Support\Settings;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('Show the site-wide settings: the default robots meta tag (whether search engines may index the site), robots.txt, Google Search Console verification and Google Analytics ID.')]
class GetSettings extends SiteTool
{
    protected string $name = 'get_settings';

    public function handle(Request $request): Response
    {
        return $this->result([
            'settings' => Settings::all(),
            'robots_txt_url' => url('robots.txt'),
            'sitemap_url' => url('sitemap.xml'),
        ]);
    }
}
