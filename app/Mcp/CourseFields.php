<?php

namespace App\Mcp;

use App\Models\Category;
use App\Models\Course;
use App\Support\Catalog;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Validation\ValidationException;

/** The course fields create_course and update_course share: rules, schema and saving. */
class CourseFields
{
    public const CONTENT_HELP = 'The course document shown on the course page, in one language. An object with these lists, all optional: '
        .'overview (paragraphs), audience (paragraphs, "Who should attend"), methodology (paragraphs), competencies (bullet points), '
        .'objectivesIntro (paragraphs before the objectives, e.g. "By the end of the course, participants will be able to:"), objectives (bullet points), '
        .'outline (modules: [{"title": "Module title", "items": [{"level": 0, "text": "Topic"}, {"level": 1, "text": "Sub-topic of the topic above"}]}]). '
        .'Send the whole document: it replaces the current one. Send null to remove it. Read the current one with get_course first.';

    /** Validation rules; $required makes the fields create_course needs required. */
    public static function rules(bool $required): array
    {
        $need = $required ? 'required' : 'sometimes';
        $rules = [
            'title_en' => "{$need}|string|max:255",
            'title_ar' => "{$need}|string|max:255",
            'days' => "{$need}|integer|min:1|max:365",
            'categories' => "{$need}|array|min:1",
            'categories.*' => 'string|distinct',
            'summary_en' => 'sometimes|nullable|string|max:1000',
            'summary_ar' => 'sometimes|nullable|string|max:1000',
            'photo' => 'sometimes|nullable|string|max:500',
        ];
        foreach (['content_en', 'content_ar'] as $field) {
            $rules[$field] = 'sometimes|nullable|array';
            foreach (['overview', 'audience', 'methodology', 'competencies', 'objectivesIntro', 'objectives'] as $list) {
                $rules["{$field}.{$list}"] = 'sometimes|array';
                $rules["{$field}.{$list}.*"] = 'string';
            }
            $rules["{$field}.outline"] = 'sometimes|array';
            $rules["{$field}.outline.*.title"] = 'required|string';
            $rules["{$field}.outline.*.items"] = 'present|array';
            $rules["{$field}.outline.*.items.*.level"] = 'required|integer|in:0,1';
            $rules["{$field}.outline.*.items.*.text"] = 'required|string';
        }

        return $rules;
    }

    public static function schema(JsonSchema $schema, bool $required): array
    {
        $req = fn ($type) => $required ? $type->required() : $type;

        return [
            'title_en' => $req($schema->string()->description('English course title.')),
            'title_ar' => $req($schema->string()->description('Arabic course title.')),
            'days' => $req($schema->integer()->description('Course length in days.')),
            'categories' => $req($schema->array()->items($schema->string())->description('Slugs of every category the course belongs to (see list_categories). The course page names the earliest of them in category order. Replaces the current list.')),
            'summary_en' => $schema->string()->description('One-sentence English summary, shown on course cards and under the title.'),
            'summary_ar' => $schema->string()->description('One-sentence Arabic summary.'),
            'content_en' => $schema->object()->description(self::CONTENT_HELP),
            'content_ar' => $schema->object()->description('The Arabic course document, same shape as content_en.'),
            'photo' => $schema->string()->description('Course photo: a path or URL returned by upload_image (e.g. uploads/2026/10/pmp-ab12cd.jpg). Empty string removes the photo.'),
        ];
    }

    /** Fill and save the course from validated data, then set its categories if sent. */
    public static function save(Course $course, array $data): Course
    {
        $fields = array_intersect_key($data, array_flip(['title_en', 'title_ar', 'days', 'summary_en', 'summary_ar']));
        if (array_key_exists('photo', $data)) {
            $fields['photo'] = Data::localImage($data['photo']);
        }
        foreach (['content_en', 'content_ar'] as $field) {
            if (array_key_exists($field, $data)) {
                $fields[$field] = $data[$field] === null ? null : Catalog::normalizeContent($data[$field]);
            }
        }

        $categories = null;
        if (isset($data['categories'])) {
            $categories = Category::whereIn('slug', $data['categories'])->pluck('id', 'slug');
            $missing = array_diff($data['categories'], $categories->keys()->all());
            if ($missing) {
                throw ValidationException::withMessages(['categories' => 'Unknown category slugs: '.implode(', ', $missing).'. Use list_categories.']);
            }
        }

        $course->fill($fields)->save();

        if ($categories !== null) {
            // Keep the course's place in categories it stays in; it goes last in new ones.
            $current = $course->categories()->pluck('category_course.position', 'categories.id');
            $sync = [];
            foreach ($data['categories'] as $slug) {
                $id = $categories[$slug];
                $position = $current[$id] ?? (int) Category::find($id)->courses()->max('category_course.position') + 1;
                $sync[$id] = ['position' => $position];
            }
            $course->categories()->sync($sync);
        }
        Catalog::flush();

        return $course->fresh('categories');
    }
}
