<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Support\Catalog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Copies the course documents listed in resources/content/refresh-2026-11.json from their
 * JSON files into the database, which is what the course pages read. Only those documents
 * change. A document holding links added on the site ([[...]]) is skipped and reported,
 * so running this never removes them.
 */
class RefreshCourseDocuments extends Command
{
    protected $signature = 'catalog:refresh-documents {--dry-run : Report what would change without saving}';

    protected $description = 'Load the supplied course documents from their JSON files into the database';

    public function handle(): int
    {
        $list = json_decode((string) file_get_contents(resource_path('content/refresh-2026-11.json')), true);
        $changed = 0;
        $skipped = [];

        DB::transaction(function () use ($list, &$changed, &$skipped) {
            foreach (['ar' => 'content_ar', 'en' => 'content_en'] as $lang => $column) {
                foreach ($list[$lang] as $slug) {
                    $course = Course::where('slug', $slug)->first();
                    if (! $course) {
                        $skipped[] = "{$slug} ({$lang}): no such course";

                        continue;
                    }
                    if (str_contains((string) json_encode($course->{$column}), '[[')) {
                        $skipped[] = "{$slug} ({$lang}): has links added on the site";

                        continue;
                    }
                    $document = json_decode((string) file_get_contents(resource_path("content/{$lang}/{$slug}.json")), true);
                    if ($course->{$column} === $document) {
                        continue;
                    }
                    $changed++;
                    if (! $this->option('dry-run')) {
                        $course->update([$column => $document]);
                    }
                }
            }
        });

        Catalog::flush();
        $this->info(($this->option('dry-run') ? 'Would update ' : 'Updated ').$changed.' course documents.');
        foreach ($skipped as $line) {
            $this->warn("Skipped {$line}");
        }

        return self::SUCCESS;
    }
}
