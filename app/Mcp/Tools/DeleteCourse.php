<?php

namespace App\Mcp\Tools;

use App\Models\Course;
use App\Models\Redirect;
use App\Support\Activity;
use App\Support\Seo;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tools\Annotations\IsDestructive;

#[IsDestructive]
#[Description('Move a course to the trash: it disappears from every list and its pages stop working. restore_item brings it back with everything it had. Optionally redirect its old pages to another address.')]
class DeleteCourse extends SiteTool
{
    protected string $name = 'delete_course';

    public function handle(Request $request): Response
    {
        $course = Course::where('slug', $request->get('slug'))->first();
        if (! $course) {
            return $this->fail('No course with slug "'.$request->get('slug').'".');
        }

        $course->delete();
        $redirected = [];
        if ($to = trim((string) $request->get('redirect_to'))) {
            $external = preg_match('#^https?://#', $to) && ! str_starts_with($to, url('/'));
            $to = $external ? $to : Seo::path($to);
            $redirected[] = Redirect::point("/course/{$course->slug}", $to)->from_path;
            if (! $external) {
                $redirected[] = Redirect::point("/ar/course/{$course->slug}", rtrim('/ar'.$to, '/'))->from_path;
            }
        }
        Activity::log('delete_course', "course:{$course->slug}", "Deleted course {$course->title_en}", ['redirect_to' => $to ?: null]);

        return $this->result([
            'deleted' => $course->slug,
            'redirected' => $redirected,
            'restore_with' => ['tool' => 'restore_item', 'type' => 'course', 'key' => $course->slug],
        ]);
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'slug' => $schema->string()->required(),
            'redirect_to' => $schema->string()->description('Optional English path to send visitors of the old page to, e.g. "/courses" or "/course/another-course". The Arabic page goes to the same path under /ar.'),
        ];
    }
}
