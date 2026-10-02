<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Support\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('catalog:import')->assertSuccessful();
    }

    public function test_every_main_page_renders(): void
    {
        foreach (['/', '/about', '/contact', '/courses', '/schedule', '/corporate', '/blog',
            '/ar', '/ar/about', '/ar/contact', '/ar/courses', '/ar/schedule', '/ar/corporate', '/ar/blog'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_course_pages_render_from_the_database(): void
    {
        $this->get('/course/emotional-intelligence')->assertOk()
            ->assertSee('Emotional Intelligence')
            ->assertSee('The intersection of emotions and reasoning in the workplace');
        $this->get('/ar/course/emotional-intelligence')->assertOk()->assertSee('الذكاء العاطفي');
        $this->get('/course/no-such-course')->assertNotFound();
    }

    public function test_seo_overrides_replace_the_page_defaults(): void
    {
        $this->get('/about')->assertSee('<meta name="robots" content="noindex, nofollow">', false);

        SeoMeta::create(['path' => '/about', 'title' => 'About CompuBase & Team', 'description' => 'Custom description', 'robots' => 'index, follow']);
        $this->get('/about')
            ->assertSee('<title>About CompuBase &amp; Team</title>', false)
            ->assertSee('<meta name="description" content="Custom description">', false)
            ->assertSee('<meta name="robots" content="index, follow">', false);

        Settings::set('robots', 'index, follow');
        $this->get('/contact')->assertSee('<meta name="robots" content="index, follow">', false);
    }

    public function test_page_titles_are_not_double_escaped(): void
    {
        $this->get('/course/emotional-intelligence')->assertSee('<title>Emotional Intelligence — CompuBase Training Center, Abu Dhabi</title>', false);
    }

    public function test_blog_shows_only_published_posts_and_previews_drafts(): void
    {
        $live = Post::create(['locale' => 'en', 'slug' => 'live-post', 'title' => 'Live post', 'body' => "## Hello\n\nText with <script>alert(1)</script>", 'status' => 'published', 'published_at' => now()->subDay()]);
        $draft = Post::create(['locale' => 'en', 'slug' => 'draft-post', 'title' => 'Draft post', 'body' => 'Draft', 'status' => 'draft']);
        Post::create(['locale' => 'ar', 'slug' => 'arabic-post', 'title' => 'مقال', 'body' => 'نص', 'status' => 'published', 'published_at' => now()->subDay()]);

        $this->get('/blog')->assertSee('Live post')->assertDontSee('Draft post')->assertDontSee('مقال');
        $this->get('/ar/blog')->assertSee('مقال');
        $this->get('/blog/live-post')->assertOk()->assertSee('<h2>Hello</h2>', false)->assertDontSee('<script>alert(1)</script>', false);
        $this->get('/blog/draft-post')->assertNotFound();
        $this->get(URL::temporarySignedRoute('blog.preview', now()->addHour(), ['post' => $draft->id]))->assertOk()->assertSee('Draft post');
        $this->get('/blog-preview/'.$draft->id)->assertForbidden();
        $this->assertTrue($live->isLive());
    }

    public function test_sitemap_and_robots(): void
    {
        SeoMeta::create(['path' => '/corporate', 'robots' => 'noindex']);

        $this->get('/sitemap.xml')->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee(url('/course/emotional-intelligence'))
            ->assertSee(url('/ar/course/emotional-intelligence'))
            ->assertDontSee(url('/corporate').'<', false);

        $this->get('/robots.txt')->assertOk()->assertSee('User-agent: *')->assertSee('Sitemap: '.url('sitemap.xml'));
    }

    public function test_old_wordpress_addresses_move_to_their_new_pages(): void
    {
        $this->get('/creative-thinking-and-innovation-techniques/')->assertStatus(301)->assertRedirect(url('/course/creative-thinking-and-innovation-techniques'));
        $this->get('/communication-business-writing-skills/')->assertStatus(301)->assertRedirect(url('/courses?go=communication-and-business-writing-skills'));
        $this->get('/shaping-the-future-for-a-strategic-foresight/')->assertStatus(301)->assertRedirect(url('/course/shaping-the-future-for-a-strategic-foresight'));
        $this->get('/happiness-positivity-in-workplace/')->assertStatus(301)->assertRedirect(url('/course/happiness-and-positivity-in-workplace'));

        foreach (['creative-thinking-and-innovation-techniques', 'shaping-the-future-for-a-strategic-foresight', 'happiness-and-positivity-in-workplace'] as $slug) {
            $this->get("/course/{$slug}")->assertOk();
        }
    }

    public function test_saved_redirects_replace_not_found(): void
    {
        Redirect::point('/course/old-name', '/course/emotional-intelligence');

        $this->get('/course/old-name')->assertRedirect(url('/course/emotional-intelligence'))->assertStatus(301);
        $this->get('/totally/unknown')->assertNotFound();
        $this->assertSame(1, Redirect::first()->hits);
    }
}
