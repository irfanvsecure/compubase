<?php

namespace App\Mcp\Tools;

use App\Support\Activity;
use App\Support\Settings;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change site-wide settings. "robots" is the robots meta tag of every page without its own: the site is hidden from search engines ("noindex, nofollow") until it is set to "index, follow" — confirm with the owner before changing it. Only the settings you send change.')]
class UpdateSettings extends SiteTool
{
    protected string $name = 'update_settings';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'robots' => ['sometimes', 'string', 'max:100', 'regex:/^[a-z\-, :0-9]+$/'],
            'robots_txt' => 'sometimes|nullable|string|max:5000',
            'google_site_verification' => ['sometimes', 'nullable', 'string', 'max:100', 'regex:/^[A-Za-z0-9_\-]*$/'],
            'google_analytics_id' => ['sometimes', 'nullable', 'string', 'regex:/^(G-[A-Z0-9]{4,20})?$/'],
        ], ['google_analytics_id.regex' => 'The Google Analytics ID looks like G-ABC123XYZ.']);

        foreach ($data as $key => $value) {
            Settings::set($key, (string) $value);
        }
        Activity::log('update_settings', 'settings', 'Updated settings: '.implode(', ', array_keys($data)), $data);

        return $this->result(['settings' => Settings::all()]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'robots' => $schema->string()->description('"index, follow" lets search engines list the site; "noindex, nofollow" hides it.'),
            'robots_txt' => $schema->string()->description('Full robots.txt text. The Sitemap line is added automatically.'),
            'google_site_verification' => $schema->string()->description('The content value of Google Search Console\'s HTML-tag verification.'),
            'google_analytics_id' => $schema->string()->description('Google Analytics 4 measurement ID, e.g. G-ABC123XYZ. Empty string removes analytics.'),
        ];
    }
}
