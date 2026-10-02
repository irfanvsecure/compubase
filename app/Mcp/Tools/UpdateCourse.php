<?php

namespace App\Mcp\Tools;

use App\Mcp\CourseFields;
use App\Mcp\Data;
use App\Models\Course;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Change a course. Only the fields you send change. A new slug moves the course pages to new addresses; the old addresses redirect (301) to the new ones and keep their SEO settings.')]
class UpdateCourse extends SiteTool
{
    protected string $name = 'update_course';

    public function handle(Request $request): Response
    {
        $course = Course::where('slug', $request->get('slug'))->first();
        if (! $course) {
            return $this->fail('No course with slug "'.$request->get('slug').'". Use list_courses to search.');
        }

        $data = $request->validate(
            ['new_slug' => ['sometimes', 'string', 'max:150', self::SLUG_RULE, Rule::unique('courses', 'slug')->ignore($course->id)]]
            + CourseFields::rules(required: false),
        );

        $old = $course->slug;
        $course = DB::transaction(function () use ($course, $data, $old) {
            if (isset($data['new_slug']) && $data['new_slug'] !== $old) {
                $course->slug = $data['new_slug'];
                foreach (['', '/ar'] as $prefix) {
                    Redirect::point("{$prefix}/course/{$old}", "{$prefix}/course/{$course->slug}");
                    SeoMeta::where('path', "{$prefix}/course/{$old}")->update(['path' => "{$prefix}/course/{$course->slug}"]);
                }
            }

            return CourseFields::save($course, $data);
        });
        Activity::log('update_course', "course:{$course->slug}", "Updated course {$course->title_en}", $data);

        return $this->result(['updated' => Data::course($course)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->description('Current slug of the course.')->required(),
            'new_slug' => $schema->string()->description('A new slug (changes the page address).')->pattern(self::SLUG),
        ] + CourseFields::schema($schema, required: false);
    }
}
