<?php

namespace App\Support;

use App\Models\Category;
use App\Models\Course;

/**
 * Reads the course catalogue from the database and shapes it for the views.
 * The catalogue was first imported from config/courses.php and resources/content
 * (php artisan catalog:import); the database is now the source of truth.
 *
 * Each course carries its slug, its main category (the first one that lists it)
 * and every category it belongs to. Inside a category listing, a course is
 * shown under that category instead.
 */
class Catalog
{
    /** The sections of a course document, each a list. 'extra' is optional. */
    public const CONTENT_KEYS = ['overview', 'audience', 'methodology', 'competencies', 'objectivesIntro', 'objectives', 'outline'];

    /** Course columns the listings need; the documents are loaded one at a time. */
    private const LIST_COLUMNS = ['courses.id', 'courses.slug', 'courses.title_en', 'courses.title_ar', 'courses.days', 'courses.summary_en', 'courses.summary_ar', 'courses.photo'];

    private static ?array $categories = null;

    private static ?array $courses = null;

    /** Forget the loaded catalogue, so the next read sees the latest changes. */
    public static function flush(): void
    {
        self::$categories = null;
        self::$courses = null;
    }

    /** Every category in catalogue order, each with its courses keyed by slug. */
    public static function categories(): array
    {
        if (self::$categories !== null) {
            return self::$categories;
        }

        $rows = Category::query()->orderBy('position')->orderBy('id')
            ->with(['courses' => fn ($query) => $query->select(self::LIST_COLUMNS)])
            ->get();

        $cats = [];
        foreach ($rows as $category) {
            foreach ($category->courses as $course) {
                $cats[$course->slug][] = $category->slug;
            }
        }

        self::$categories = [];
        foreach ($rows as $category) {
            $courses = [];
            foreach ($category->courses as $course) {
                $courses[$course->slug] = self::shape($course, $category, $cats[$course->slug]);
            }
            self::$categories[$category->slug] = ['en' => $category->name_en, 'ar' => $category->name_ar, 'group' => $category->group, 'courses' => $courses];
        }

        return self::$categories;
    }

    /** Every course once, in catalogue order, under its main category. */
    public static function courses(): array
    {
        if (self::$courses === null) {
            $courses = [];
            foreach (self::categories() as $category) {
                foreach ($category['courses'] as $slug => $course) {
                    $courses[$slug] ??= $course;
                }
            }
            self::$courses = array_values($courses);
        }

        return self::$courses;
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

    /** One course as the views use it, listed under $category. */
    private static function shape(Course $course, Category $category, array $cats): array
    {
        return [
            'en' => $course->title_en,
            'ar' => $course->title_ar,
            'days' => $course->days,
            'summary' => ['en' => $course->summary_en, 'ar' => $course->summary_ar],
            'photo' => $course->photo,
            'slug' => $course->slug,
            'cat' => $category->slug,
            'cats' => $cats,
            'catEn' => $category->name_en,
            'catAr' => $category->name_ar,
        ];
    }

    /**
     * The course outline taken from CompuBase's course document, or null when
     * no document has been supplied yet.
     */
    public static function content(array $course, bool $ar = false): ?array
    {
        $content = Course::where('slug', $course['slug'])->value($ar ? 'content_ar' : 'content_en');

        return is_array($content) ? self::normalizeContent($content) : null;
    }

    /** A course document with every section the course page reads, missing ones empty. */
    public static function normalizeContent(array $content): array
    {
        foreach (self::CONTENT_KEYS as $key) {
            $content[$key] = array_values((array) ($content[$key] ?? []));
        }

        return $content;
    }

    /** First sentence of the course overview, or null when there is no document yet. */
    public static function summary(array $course, bool $ar = false): ?string
    {
        return $course['summary'][$ar ? 'ar' : 'en'] ?? null;
    }

    /** URL of the course photo, or null when there is none. */
    public static function photo(array $course): ?string
    {
        $photo = $course['photo'] ?? null;

        return $photo && is_file(base_path($photo)) ? asset($photo) : null;
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
