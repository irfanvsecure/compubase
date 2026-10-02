<?php

namespace App\Mcp\Tools;

use App\Models\ActivityLog as Log;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('The latest changes made to the website through this connection: what changed, when and by which admin.')]
class ActivityLog extends SiteTool
{
    protected string $name = 'activity_log';

    public function handle(Request $request): Response
    {
        $limit = min(200, max(1, $request->integer('limit', 30)));

        return $this->result(['changes' => Log::with('user:id,email')->latest('id')->limit($limit)->get()->map(fn ($log) => [
            'at' => $log->created_at?->toIso8601String(),
            'by' => $log->user?->email,
            'action' => $log->action,
            'subject' => $log->subject,
            'summary' => $log->summary,
        ])]);
    }

    public function schema(JsonSchema $schema): array
    {
        return ['limit' => $schema->integer()->description('How many changes, newest first (default 30, max 200).')];
    }
}
