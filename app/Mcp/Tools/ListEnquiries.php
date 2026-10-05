<?php

namespace App\Mcp\Tools;

use App\Models\Enquiry;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('List messages sent through the website forms (course enquiries, corporate proposal requests, calendar requests), newest first, with whether each was emailed.')]
class ListEnquiries extends SiteTool
{
    protected string $name = 'list_enquiries';

    public function schema(JsonSchema $schema): array
    {
        return [
            'type' => $schema->string()->enum(array_keys(Enquiry::TYPES))->description('Only this kind of form.'),
            'limit' => $schema->integer()->description('How many, newest first (default 30, max 200).'),
        ];
    }

    public function handle(Request $request): Response
    {
        $query = Enquiry::latest();
        if ($request->get('type')) {
            $query->where('type', $request->get('type'));
        }

        return $this->result([
            'total' => Enquiry::count(),
            'enquiries' => $query->limit(min(200, max(1, (int) ($request->get('limit') ?: 30))))->get()
                ->map(fn ($e) => $e->only(['id', 'type', 'locale', 'name', 'organisation', 'email', 'phone', 'course', 'timing', 'team_size', 'message', 'page']) + [
                    'received_at' => $e->created_at?->toIso8601String(),
                    'emailed_at' => $e->emailed_at?->toIso8601String(),
                ])->all(),
        ]);
    }
}
