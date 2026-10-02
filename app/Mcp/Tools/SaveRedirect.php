<?php

namespace App\Mcp\Tools;

use App\Models\Redirect;
use App\Support\Activity;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Send visitors of an address that no longer exists to another page (301 permanent by default). Only used for addresses that would otherwise show "not found".')]
class SaveRedirect extends SiteTool
{
    protected string $name = 'save_redirect';

    public function handle(Request $request): Response
    {
        $data = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'status_code' => 'sometimes|in:301,302',
        ]);
        $from = Seo::path($data['from']);
        $to = preg_match('#^https?://#', $data['to']) && ! str_starts_with($data['to'], url('/')) ? $data['to'] : Seo::path($data['to']);
        if ($from === $to) {
            return $this->fail('The redirect would point to itself.');
        }

        $redirect = Redirect::point($from, $to, (int) ($data['status_code'] ?? 301));
        Activity::log('save_redirect', "redirect:{$from}", "Redirect {$from} → {$to}", $data);

        return $this->result(['saved' => $redirect->only(['from_path', 'to_path', 'status_code']), 'test_url' => url($from)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'from' => $schema->string()->description('Old path, e.g. "/old-page".')->required(),
            'to' => $schema->string()->description('New path on this site ("/courses") or a full URL elsewhere.')->required(),
            'status_code' => $schema->integer()->enum([301, 302])->description('301 permanent (default) or 302 temporary.'),
        ];
    }
}
