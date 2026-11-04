<?php

namespace App\Console\Commands;

use App\Models\Course;
use App\Support\Catalog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Gives the courses listed in resources/content/photos-2026-11.json their new photos,
 * replacing images they shared with other courses. That file also records each photo's
 * source and licence. Only the listed courses change.
 */
class RefreshCoursePhotos extends Command
{
    protected $signature = 'catalog:refresh-photos {--dry-run : Report what would change without saving}';

    protected $description = 'Give the listed courses their new photos';

    public function handle(): int
    {
        $list = json_decode((string) file_get_contents(resource_path('content/photos-2026-11.json')), true);
        $changed = 0;
        $skipped = [];

        DB::transaction(function () use ($list, &$changed, &$skipped) {
            foreach ($list as $slug => $entry) {
                $course = Course::where('slug', $slug)->first();
                if (! $course || ! is_file(base_path($entry['photo']))) {
                    $skipped[] = "{$slug}: ".($course ? 'photo file missing' : 'no such course');

                    continue;
                }
                if ($course->photo === $entry['photo']) {
                    continue;
                }
                $changed++;
                if (! $this->option('dry-run')) {
                    $course->update(['photo' => $entry['photo']]);
                }
            }
        });

        Catalog::flush();
        $this->info(($this->option('dry-run') ? 'Would update ' : 'Updated ').$changed.' course photos.');
        foreach ($skipped as $line) {
            $this->warn("Skipped {$line}");
        }

        return self::SUCCESS;
    }
}
