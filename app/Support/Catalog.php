<?php

namespace App\Support;

/**
 * Reads the course catalogue in config/courses.php and shapes it for the views.
 */
class Catalog
{
    /** Every category, each with its courses, in catalogue order. */
    public static function categories(): array
    {
        return config('courses', []);
    }

    /** Every course as a flat list, each carrying its category. */
    public static function courses(): array
    {
        $all = [];
        foreach (self::categories() as $cat => $category) {
            foreach ($category['courses'] as $slug => $course) {
                $all[] = $course + ['slug' => $slug, 'cat' => $cat, 'catEn' => $category['en'], 'catAr' => $category['ar']];
            }
        }

        return $all;
    }

    public static function find(string $cat, string $slug): ?array
    {
        foreach (self::courses() as $course) {
            if ($course['cat'] === $cat && $course['slug'] === $slug) {
                return $course;
            }
        }

        return null;
    }

    /**
     * The course outline taken from CompuBase's course document, or null when
     * no document has been supplied yet. Stored per category in resources/content,
     * with the Arabic translation in {category}.ar.json.
     */
    public static function content(array $course, bool $ar = false): ?array
    {
        static $loaded = [];
        $file = $course['cat'].($ar ? '.ar' : '');
        if (! array_key_exists($file, $loaded)) {
            $path = resource_path("content/{$file}.json");
            $loaded[$file] = is_file($path) ? json_decode(file_get_contents($path), true) : [];
        }

        return $loaded[$file][$course['slug']] ?? null;
    }

    /** URL of the course photo, or null when there is none. */
    public static function photo(array $course): ?string
    {
        return is_file(base_path("images/courses/{$course['slug']}.jpg")) ? asset("images/courses/{$course['slug']}.jpg") : null;
    }

    /** Up to $count other courses from the same category, following this one. */
    public static function related(array $course, int $count = 3): array
    {
        $siblings = array_values(array_filter(self::courses(), fn ($c) => $c['cat'] === $course['cat']));
        $at = array_search($course['slug'], array_column($siblings, 'slug'));
        $others = array_merge(array_slice($siblings, $at + 1), array_slice($siblings, 0, $at));

        return array_slice($others, 0, $count);
    }

    public static function url(array $course, bool $ar = false): string
    {
        return url(($ar ? 'ar/' : '').$course['cat'].'/'.$course['slug']);
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
            'cat' => $c['cat'],
            'catName' => self::category($c, $ar),
            'title' => self::title($c, $ar),
            'dur' => self::duration($c['days'], $ar),
            'url' => self::url($c, $ar),
        ], self::courses());
    }
}
