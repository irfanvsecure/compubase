<?php

namespace App\Support;

/**
 * Reads the course catalogue in config/courses.php and shapes it for the views.
 *
 * Each course carries its slug, its main category (the first one that lists it)
 * and every category it belongs to. Inside a category listing, a course is
 * shown under that category instead.
 */
class Catalog
{
    /** Every category in catalogue order, each with its courses keyed by slug. */
    public static function categories(): array
    {
        static $categories = null;
        if ($categories === null) {
            $categories = [];
            foreach (config('courses.categories', []) as $cat => $category) {
                $courses = [];
                foreach ($category['courses'] as $slug) {
                    $courses[$slug] = self::shape($slug, $cat);
                }
                $categories[$cat] = ['courses' => $courses] + $category;
            }
        }

        return $categories;
    }

    /** Every course once, in catalogue order, under its main category. */
    public static function courses(): array
    {
        static $courses = null;
        if ($courses === null) {
            $courses = [];
            foreach (self::categories() as $category) {
                foreach ($category['courses'] as $slug => $course) {
                    $courses[$slug] ??= $course;
                }
            }
            $courses = array_values($courses);
        }

        return $courses;
    }

    public static function find(string $slug): ?array
    {
        foreach (self::courses() as $course) {
            if ($course['slug'] === $slug) {
                return $course;
            }
        }

        return null;
    }

    /** One course as the views use it, listed under category $cat. */
    private static function shape(string $slug, string $cat): array
    {
        $course = config("courses.courses.{$slug}");
        $category = config("courses.categories.{$cat}");
        $cats = [];
        foreach (config('courses.categories') as $key => $c) {
            if (in_array($slug, $c['courses'], true)) {
                $cats[] = $key;
            }
        }

        return $course + ['slug' => $slug, 'cat' => $cat, 'cats' => $cats, 'catEn' => $category['en'], 'catAr' => $category['ar']];
    }

    /**
     * The course outline taken from CompuBase's course document, or null when
     * no document has been supplied yet. Stored in resources/content/{en,ar}/{slug}.json.
     */
    public static function content(array $course, bool $ar = false): ?array
    {
        $path = resource_path('content/'.($ar ? 'ar' : 'en')."/{$course['slug']}.json");

        return is_file($path) ? json_decode(file_get_contents($path), true) : null;
    }

    /** First sentence of the course overview, or null when there is no document yet. */
    public static function summary(array $course, bool $ar = false): ?string
    {
        return $course['summary'][$ar ? 'ar' : 'en'] ?? null;
    }

    /** URL of the course photo, or null when there is none. */
    public static function photo(array $course): ?string
    {
        return is_file(base_path("images/courses/{$course['slug']}.jpg")) ? asset("images/courses/{$course['slug']}.jpg") : null;
    }

    /** Up to $count other courses from the same category, following this one. */
    public static function related(array $course, int $count = 3): array
    {
        $siblings = array_values(self::categories()[$course['cat']]['courses']);
        $at = array_search($course['slug'], array_column($siblings, 'slug'));
        $others = array_merge(array_slice($siblings, $at + 1), array_slice($siblings, 0, $at));

        return array_slice($others, 0, $count);
    }

    public static function url(array $course, bool $ar = false): string
    {
        return url(($ar ? 'ar/' : '').'course/'.$course['slug']);
    }

    public static function title(array $course, bool $ar = false): string
    {
        return $ar ? $course['ar'] : $course['en'];
    }

    public static function category(array $course, bool $ar = false): string
    {
        return $ar ? $course['catAr'] : $course['catEn'];
    }

    public static function duration(int $days, bool $ar = false): string
    {
        if (! $ar) {
            return $days.' '.($days === 1 ? 'day' : 'days');
        }

        return match (true) {
            $days === 1 => 'يوم واحد',
            $days === 2 => 'يومان',
            $days <= 10 => $days.' أيام',
            default => $days.' يوماً',
        };
    }

    /** The catalogue as the home page script needs it. */
    public static function forScript(bool $ar = false): array
    {
        return array_map(fn ($c) => [
            'cats' => $c['cats'],
            'catName' => self::category($c, $ar),
            'title' => self::title($c, $ar),
            'dur' => self::duration($c['days'], $ar),
            'summary' => self::summary($c, $ar),
            'url' => self::url($c, $ar),
        ], self::courses());
    }
}
