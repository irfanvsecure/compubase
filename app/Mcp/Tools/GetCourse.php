<?php

namespace App\Mcp\Tools;

use App\Mcp\Data;
use App\Models\Course;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsReadOnly;

#[IsReadOnly]
#[Description('Get one course with everything about it, including its full English and Arabic course documents (overview, objectives, outline, audience).')]
class GetCourse extends SiteTool
{
    protected string $name = 'get_course';

    public function handle(Request $request): Response
    {
        $course = Course::with('categories')->where('slug', $request->get('slug'))->first();
        if (! $course) {
            return $this->fail('No course with slug "'.$request->get('slug').'". Use list_courses to search.');
        }

        return $this->result(Data::course($course, full: true));
    }

    public function schema(JsonSchema $schema): array
    {
        return ['slug' => $schema->string()->description('Course slug, e.g. "emotional-intelligence".')->required()];
    }
}
