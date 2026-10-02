<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Course;
use App\Support\Catalog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Copies the original catalogue (config/courses.php, resources/content/{en,ar}/*.json
 * and images/courses/*.jpg) into the database. Courses and categories already in the
 * database are left alone, so running it again never undoes edits made since;
 * --force overwrites them with the original files.
 */
class ImportCatalog extends Command
{
    protected $signature = 'catalog:import {--force : Overwrite courses and categories that already exist}';

    protected $description = 'Import the original course catalogue into the database';

    public function handle(): int
    {
        $force = (bool) $this->option('force');
        $created = ['courses' => 0, 'categories' => 0];

        DB::transaction(function () use ($force, &$created) {
            foreach (config('courses.courses', []) as $slug => $data) {
                $course = Course::withTrashed()->firstOrNew(['slug' => $slug]);
                if ($course->exists && ! $force) {
                    continue;
                }
                $created['courses'] += $course->exists ? 0 : 1;
                $photo = "images/courses/{$slug}.jpg";
                $course->fill([
                    'title_en' => $data['en'],
                    'title_ar' => $data['ar'],
                    'days' => $data['days'],
                    'summary_en' => $data['summary']['en'] ?? null,
                    'summary_ar' => $data['summary']['ar'] ?? null,
                    'content_en' => $this->document('en', $slug),
                    'content_ar' => $this->document('ar', $slug),
                    'photo' => is_file(base_path($photo)) ? $photo : null,
                ])->save();
            }

            $ids = Course::withTrashed()->pluck('id', 'slug');
            $position = 0;
            foreach (config('courses.categories', []) as $slug => $data) {
                $position++;
                $category = Category::withTrashed()->firstOrNew(['slug' => $slug]);
                if ($category->exists && ! $force) {
                    continue;
                }
                $created['categories'] += $category->exists ? 0 : 1;
                $category->fill(['name_en' => $data['en'], 'name_ar' => $data['ar'], 'group' => $data['group'], 'position' => $position])->save();

                $courses = [];
                foreach (array_values($data['courses']) as $i => $courseSlug) {
                    $courses[$ids[$courseSlug]] = ['position' => $i + 1];
                }
                $category->courses()->sync($courses);
            }
        });

        Catalog::flush();
        $this->info("Imported {$created['courses']} new courses and {$created['categories']} new categories.");
        $this->line('Catalogue now holds '.Course::count().' courses in '.Category::count().' categories.');

        return self::SUCCESS;
    }

    private function document(string $lang, string $slug): ?array
    {
        $path = resource_path("content/{$lang}/{$slug}.json");

        return is_file($path) ? json_decode(file_get_contents($path), true) : null;
    }
}
