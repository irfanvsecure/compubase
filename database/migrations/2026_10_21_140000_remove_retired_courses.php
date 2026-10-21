<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/** Short-Hand Writing is no longer offered, and Microsoft Project is outdated. */
return new class extends Migration
{
    public function up(): void
    {
        $ids = DB::table('courses')->whereIn('slug', ['short-hand-writing', 'microsoft-project'])->pluck('id');
        if ($ids->isEmpty()) {
            return;
        }

        DB::table('category_course')->whereIn('course_id', $ids)->delete();
        DB::table('courses')->whereIn('id', $ids)->delete();
    }

    public function down(): void
    {
        // The catalogue file no longer defines these courses, so they are not restored.
    }
};
