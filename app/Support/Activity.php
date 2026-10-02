<?php

namespace App\Support;

use App\Models\ActivityLog;

/** Records each change made through the MCP server. */
class Activity
{
    public static function log(string $action, ?string $subject, string $summary, ?array $changes = null): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'subject' => $subject,
            'summary' => $summary,
            'changes' => $changes,
        ]);
    }
}
