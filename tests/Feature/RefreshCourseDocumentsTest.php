<?php

namespace Tests\Feature;

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RefreshCourseDocumentsTest extends TestCase
{
    use RefreshDatabase;

    private function course(string $slug, array $contentAr): Course
    {
        return Course::updateOrCreate(['slug' => $slug], [
            'title_en' => $slug, 'title_ar' => $slug, 'days' => 3, 'content_ar' => $contentAr,
        ]);
    }

    public function test_listed_documents_load_from_their_files(): void
    {
        $course = $this->course('critical-thinking', ['overview' => ['old']]);

        $this->artisan('catalog:refresh-documents')->assertSuccessful();

        $file = json_decode(file_get_contents(resource_path('content/ar/critical-thinking.json')), true);
        $this->assertSame($file, $course->fresh()->content_ar);
        $this->assertNotEmpty($file['outline']);
    }

    public function test_a_document_with_links_added_on_the_site_is_kept(): void
    {
        $course = $this->course('critical-thinking', ['overview' => ['See [[cat:leadership|this]]']]);

        $this->artisan('catalog:refresh-documents')->assertSuccessful();

        $this->assertSame(['overview' => ['See [[cat:leadership|this]]']], $course->fresh()->content_ar);
    }

    public function test_dry_run_changes_nothing(): void
    {
        $course = $this->course('critical-thinking', ['overview' => ['old']]);

        $this->artisan('catalog:refresh-documents --dry-run')->assertSuccessful();

        $this->assertSame(['overview' => ['old']], $course->fresh()->content_ar);
    }
}
