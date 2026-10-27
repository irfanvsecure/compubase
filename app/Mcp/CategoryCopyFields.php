<?php

namespace App\Mcp;

use App\Support\Catalog;

/**
 * The copy of a category page as get_category_content and update_category_content
 * show it. The views read the stored shape (FAQ and picks as plain lists); the
 * tools use named fields so the copy is easy to read and write.
 */
class CategoryCopyFields
{
    /** Blocks with a heading and paragraphs. */
    public const BLOCKS = ['team', 'choose', 'contact'];

    public const FIELDS = ['title', 'description', 'h1', 'intro', 'start', 'sections', 'team', 'choose', 'faq', 'contact'];

    public const HELP = 'Text may link with markers: [[course-slug|link text]] to a course, [[cat:category-slug|text]] to a category, '
        .'[[page:contact|text]] or [[page:corporate|text]] to a main page. Plain text otherwise (no HTML or Markdown).';

    public static function rules(): array
    {
        return [
            'title' => 'sometimes|nullable|string|max:255',
            'description' => 'sometimes|nullable|string|max:1000',
            'h1' => 'sometimes|nullable|string|max:255',
            'intro' => 'sometimes|nullable|array',
            'intro.*' => 'string',
            'start' => 'sometimes|nullable|array',
            'start.heading' => 'sometimes|nullable|string|max:255',
            'start.text' => 'sometimes|array',
            'start.text.*' => 'string',
            'start.picks' => 'sometimes|array|max:12',
            'start.picks.*.course' => 'required|string',
            'start.picks.*.title' => 'required|string|max:255',
            'start.picks.*.best_for' => 'sometimes|nullable|string|max:255',
            'sections' => 'sometimes|nullable|array',
            'sections.*.heading' => 'required|string|max:255',
            'sections.*.text' => 'present|array',
            'sections.*.text.*' => 'string',
            'faq' => 'sometimes|nullable|array',
            'faq.*.question' => 'required|string|max:500',
            'faq.*.answer' => 'required|string|max:3000',
        ] + collect(self::BLOCKS)->flatMap(fn ($block) => [
            $block => 'sometimes|nullable|array',
            "{$block}.heading" => 'required_with:'.$block.'|string|max:255',
            "{$block}.text" => 'present_with:'.$block.'|array',
            "{$block}.text.*" => 'string',
        ])->all();
    }

    /** Stored copy → tool shape. */
    public static function present(?array $copy): array
    {
        $copy ??= [];
        if (isset($copy['start']['picks'])) {
            $copy['start']['picks'] = array_map(fn ($p) => ['course' => $p[0], 'title' => $p[1], 'best_for' => $p[2] ?? null], $copy['start']['picks']);
        }
        if (isset($copy['faq'])) {
            $copy['faq'] = array_map(fn ($f) => ['question' => $f[0], 'answer' => $f[1]], $copy['faq']);
        }

        return $copy;
    }

    /** Tool shape → stored copy. */
    public static function store(array $copy): array
    {
        if (isset($copy['start']['picks'])) {
            $copy['start']['picks'] = array_map(fn ($p) => [$p['course'], $p['title'], (string) ($p['best_for'] ?? '')], $copy['start']['picks']);
        }
        if (isset($copy['faq'])) {
            $copy['faq'] = array_map(fn ($f) => [$f['question'], $f['answer']], $copy['faq']);
        }

        return array_filter($copy, fn ($v) => $v !== null);
    }

    /** Course slugs the copy points at (picks and [[slug]] links) that do not exist. */
    public static function unknownCourses(array $copy): array
    {
        $slugs = array_column($copy['start']['picks'] ?? [], 'course');
        array_walk_recursive($copy, function ($value) use (&$slugs) {
            if (is_string($value) && preg_match_all('/\[\[([a-z0-9-]+)(?:\|[^\]]*)?\]\]/', $value, $m)) {
                array_push($slugs, ...$m[1]);
            }
        });

        return array_values(array_unique(array_filter($slugs, fn ($slug) => Catalog::find($slug) === null)));
    }
}
