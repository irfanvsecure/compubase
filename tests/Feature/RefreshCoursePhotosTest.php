<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RefreshCoursePhotosTest extends TestCase
{
    use RefreshDatabase;

    private function course(string $slug): Course
    {
        return Course::updateOrCreate(['slug' => $slug], [
            'title_en' => $slug, 'title_ar' => $slug, 'days' => 3, 'photo' => 'images/courses/shared.jpg',
        ]);
    }

    public function test_listed_courses_get_their_new_photo_and_others_keep_theirs(): void
    {
        $listed = $this->course('agile-project-management');
        $other = $this->course('not-in-the-list');

        $this->artisan('catalog:refresh-photos')->assertSuccessful();

        $this->assertSame('images/courses/agile-project-management-v2.jpg', $listed->fresh()->photo);
        $this->assertFileExists(base_path($listed->fresh()->photo));
        $this->assertSame('images/courses/shared.jpg', $other->fresh()->photo);
    }

    public function test_dry_run_changes_nothing(): void
    {
        $listed = $this->course('agile-project-management');

        $this->artisan('catalog:refresh-photos --dry-run')->assertSuccessful();

        $this->assertSame('images/courses/shared.jpg', $listed->fresh()->photo);
    }
}
