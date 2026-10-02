<?php

namespace App\Mcp\Tools;

use App\Mcp\CourseFields;
use App\Mcp\Data;
use App\Models\Course;
use App\Support\Activity;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Illuminate\Support\Facades\DB;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;

#[Description('Add a new course in English and Arabic. It gets a page at /course/{slug} and /ar/course/{slug} and is listed last in each of its categories.')]
class CreateCourse extends SiteTool
{
    protected string $name = 'create_course';

    public function handle(Request $request): Response
    {
        $data = $request->validate(
            ['slug' => ['required', 'string', 'max:150', self::SLUG_RULE, 'unique:courses,slug']] + CourseFields::rules(required: true),
            ['slug.unique' => 'A course with this slug already exists (it may be in the trash: see list_trash).'],
        );

        $course = DB::transaction(fn () => CourseFields::save(new Course(['slug' => $data['slug']]), $data));
        Activity::log('create_course', "course:{$course->slug}", "Created course {$course->title_en}", $data);

        return $this->result(['created' => Data::course($course)]);
    }

    public function schema(JsonSchema $schema): array
    {
        return ['slug' => $schema->string()->description('URL-safe id from the English title, e.g. "advanced-excel-skills".')->pattern(self::SLUG)->required()]
            + CourseFields::schema($schema, required: true);
    }
}
