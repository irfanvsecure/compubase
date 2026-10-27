<?php

namespace Tests\Feature;

use App\Mcp\Servers\CompubaseServer;
use App\Mcp\Tools;
use App\Models\ActivityLog;
use App\Models\Course;
use App\Models\Media;
use App\Models\PageText;
use App\Models\Post;
use App\Models\Redirect;
use App\Models\SeoMeta;
use App\Models\User;
use App\Support\Catalog;
use App\Support\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class McpServerTest extends TestCase
{
    use RefreshDatabase;

    /** A 1×1 PNG. */
    private const PNG = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==';

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('catalog:import')->assertSuccessful();
        $this->admin = User::factory()->create();
    }

    protected function tearDown(): void
    {
        foreach (Media::withTrashed()->get() as $media) {
            File::delete([base_path($media->path), storage_path('app/trash/'.$media->path)]);
        }
        parent::tearDown();
    }

    private function tool(string $tool, array $arguments = [])
    {
        return CompubaseServer::actingAs($this->admin)->tool($tool, $arguments);
    }

    public function test_the_endpoint_requires_an_oauth_token(): void
    {
        $this->postJson('/mcp', ['jsonrpc' => '2.0', 'id' => 1, 'method' => 'tools/list'])
            ->assertUnauthorized()
            ->assertHeader('WWW-Authenticate');

        $this->getJson('/.well-known/oauth-protected-resource/mcp')->assertOk()->assertJsonPath('resource', url('/mcp'));
        $this->getJson('/.well-known/oauth-authorization-server')->assertOk()
            ->assertJsonPath('authorization_endpoint', url('/oauth/authorize'))
            ->assertJsonPath('registration_endpoint', url('/oauth/register'));
    }

    public function test_claude_can_register_and_an_admin_sees_the_approval_screen(): void
    {
        $client = $this->postJson('/oauth/register', [
            'client_name' => 'Claude',
            'redirect_uris' => ['https://claude.ai/api/mcp/auth_callback'],
        ])->assertCreated()->json();

        $this->postJson('/oauth/register', ['client_name' => 'Evil', 'redirect_uris' => ['https://evil.example/cb']])
            ->assertStatus(400);

        $query = http_build_query([
            'client_id' => $client['client_id'],
            'redirect_uri' => 'https://claude.ai/api/mcp/auth_callback',
            'response_type' => 'code',
            'scope' => 'mcp:use',
            'state' => 'xyz',
            'code_challenge' => rtrim(strtr(base64_encode(hash('sha256', str_repeat('a', 64), true)), '+/', '-_'), '='),
            'code_challenge_method' => 'S256',
        ]);

        $this->get('/oauth/authorize?'.$query)->assertRedirect(route('login'));
        $this->actingAs($this->admin)->get('/oauth/authorize?'.$query)->assertOk()->assertSee('Allow Claude?')->assertSee($this->admin->email);
    }

    public function test_admins_can_sign_in(): void
    {
        $this->get('/login')->assertOk();
        $this->post('/login', ['email' => $this->admin->email, 'password' => 'wrong'])->assertSessionHasErrors('email');
        $this->post('/login', ['email' => $this->admin->email, 'password' => 'password'])->assertRedirect(route('home'));
        $this->assertAuthenticatedAs($this->admin);
    }

    public function test_it_lists_every_tool(): void
    {
        $tools = array_map(fn ($file) => 'App\\Mcp\\Tools\\'.basename($file, '.php'), glob(app_path('Mcp/Tools/*.php')));
        $tools = array_values(array_filter($tools, fn ($class) => $class !== Tools\SiteTool::class));

        CompubaseServer::actingAs($this->admin)->tools()->assertRegistered($tools);
    }

    public function test_courses_can_be_created_updated_renamed_deleted_and_restored(): void
    {
        $this->tool(Tools\CreateCourse::class, [
            'slug' => 'ai-for-managers',
            'title_en' => 'AI for Managers',
            'title_ar' => 'الذكاء الاصطناعي للمديرين',
            'days' => 2,
            'categories' => ['leadership-and-management', 'personal-development'],
            'summary_en' => 'Use AI tools to lead better.',
            'content_en' => ['overview' => ['Para one.'], 'outline' => [['title' => 'Basics', 'items' => [['level' => 0, 'text' => 'What AI is']]]]],
        ])->assertOk()->assertSee('ai-for-managers');

        $this->get('/course/ai-for-managers')->assertOk()->assertSee('AI for Managers')->assertSee('What AI is');
        $this->assertContains('ai-for-managers', array_keys(Catalog::categories()['personal-development']['courses']));

        $this->tool(Tools\UpdateCourse::class, ['slug' => 'ai-for-managers', 'days' => 3, 'new_slug' => 'ai-for-leaders', 'categories' => ['leadership-and-management']])
            ->assertOk()->assertSee('ai-for-leaders');
        $this->assertSame(3, Course::where('slug', 'ai-for-leaders')->value('days'));
        $this->get('/course/ai-for-managers')->assertRedirect(url('/course/ai-for-leaders'));
        $this->get('/ar/course/ai-for-managers')->assertRedirect(url('/ar/course/ai-for-leaders'));
        $this->assertNotContains('ai-for-leaders', array_keys(Catalog::categories()['personal-development']['courses']));

        $this->tool(Tools\GetCourse::class, ['slug' => 'ai-for-leaders'])->assertOk()->assertSee('Para one.');
        $this->tool(Tools\ListCourses::class, ['search' => 'leaders'])->assertOk()->assertSee('ai-for-leaders');

        $this->tool(Tools\DeleteCourse::class, ['slug' => 'ai-for-leaders'])->assertOk();
        $this->get('/course/ai-for-leaders')->assertNotFound();
        $this->tool(Tools\ListTrash::class)->assertOk()->assertSee('ai-for-leaders');
        $this->tool(Tools\RestoreItem::class, ['type' => 'course', 'key' => 'ai-for-leaders'])->assertOk();
        $this->get('/course/ai-for-leaders')->assertOk();

        $this->assertSame(
            ['create_course', 'update_course', 'delete_course', 'restore_item'],
            ActivityLog::where('user_id', $this->admin->id)->orderBy('id')->pluck('action')->all(),
        );
    }

    public function test_course_input_is_validated(): void
    {
        $this->tool(Tools\CreateCourse::class, ['slug' => 'Bad Slug', 'title_en' => 'x', 'title_ar' => 'x', 'days' => 1, 'categories' => ['customer-service']])
            ->assertHasErrors();
        $this->tool(Tools\CreateCourse::class, ['slug' => 'x', 'title_en' => 'x', 'title_ar' => 'x', 'days' => 1, 'categories' => ['nope']])
            ->assertHasErrors(['Unknown category slugs: nope']);
        $this->tool(Tools\UpdateCourse::class, ['slug' => 'emotional-intelligence', 'content_en' => ['outline' => [['items' => []]]]])
            ->assertHasErrors();
        $this->tool(Tools\UpdateCourse::class, ['slug' => 'emotional-intelligence', 'photo' => '../.env'])
            ->assertHasErrors();
        $this->tool(Tools\GetCourse::class, ['slug' => 'missing'])->assertHasErrors();
    }

    public function test_categories_can_be_managed(): void
    {
        $this->tool(Tools\CreateCategory::class, ['slug' => 'data-science', 'name_en' => 'Data Science', 'name_ar' => 'علم البيانات', 'group' => 'it'])->assertOk();
        $this->tool(Tools\UpdateCategory::class, ['slug' => 'data-science', 'courses' => ['emotional-intelligence', 'critical-thinking']])->assertOk();
        $this->assertSame(['emotional-intelligence', 'critical-thinking'], array_keys(Catalog::categories()['data-science']['courses']));
        $this->get('/courses')->assertSee('data-cat="data-science" data-g="it">Data Science <span>2</span>', false);

        $this->tool(Tools\CreateCategory::class, ['slug' => 'lonely', 'name_en' => 'Lonely', 'name_ar' => 'x', 'group' => 'it'])->assertOk();
        $this->tool(Tools\CreateCourse::class, ['slug' => 'only-here', 'title_en' => 'Only', 'title_ar' => 'x', 'days' => 1, 'categories' => ['lonely']])->assertOk();
        $this->tool(Tools\DeleteCategory::class, ['slug' => 'lonely'])->assertHasErrors();
        $this->tool(Tools\DeleteCategory::class, ['slug' => 'lonely', 'force' => true])->assertOk();
        $this->get('/course/only-here')->assertNotFound();
    }

    public function test_blog_posts_can_be_written_published_and_renamed(): void
    {
        $this->tool(Tools\CreatePost::class, ['title' => 'Five PMP Tips', 'body' => "## Tip one\n\nStudy.", 'excerpt' => 'Pass the PMP.'])
            ->assertOk()->assertSee('five-pmp-tips')->assertSee('preview_url');
        $post = Post::firstOrFail();
        $this->assertSame('draft', $post->status);
        $this->get('/blog/five-pmp-tips')->assertNotFound();

        $this->tool(Tools\UpdatePost::class, ['id' => $post->id, 'status' => 'published'])->assertOk();
        $this->get('/blog/five-pmp-tips')->assertOk()->assertSee('<h2>Tip one</h2>', false);

        $this->tool(Tools\UpdatePost::class, ['id' => $post->id, 'slug' => 'pmp-tips'])->assertOk();
        $this->get('/blog/five-pmp-tips')->assertRedirect(url('/blog/pmp-tips'));

        $this->tool(Tools\CreatePost::class, ['locale' => 'ar', 'slug' => 'pmp-ar', 'title' => 'نصائح', 'body' => 'نص', 'status' => 'published', 'published_at' => now()->addDay()->toIso8601String()])->assertOk();
        $this->get('/ar/blog/pmp-ar')->assertNotFound();

        $this->tool(Tools\ListPosts::class, ['locale' => 'ar'])->assertOk()->assertSee('pmp-ar')->assertDontSee('pmp-tips');
        $this->tool(Tools\DeletePost::class, ['id' => $post->id])->assertOk();
        $this->get('/blog/pmp-tips')->assertNotFound();
    }

    public function test_images_can_be_uploaded_used_and_deleted(): void
    {
        $this->tool(Tools\UploadImage::class, ['base64' => 'data:image/png;base64,'.self::PNG, 'name' => 'Class Room', 'alt_en' => 'A classroom'])
            ->assertOk()->assertSee('class-room');
        $media = Media::firstOrFail();
        $this->assertFileExists(base_path($media->path));
        $this->assertSame([1, 1], [$media->width, $media->height]);

        $this->tool(Tools\UploadImage::class, ['base64' => base64_encode('<?php echo 1;')])->assertHasErrors();
        $this->tool(Tools\UploadImage::class, ['url' => 'http://127.0.0.1/secret.png'])->assertHasErrors();

        $this->tool(Tools\UpdateCourse::class, ['slug' => 'emotional-intelligence', 'photo' => $media->url()])->assertOk();
        $this->assertSame($media->path, Course::where('slug', 'emotional-intelligence')->value('photo'));
        $this->get('/course/emotional-intelligence')->assertSee($media->path);

        $this->tool(Tools\DeleteImage::class, ['id' => $media->id])->assertHasErrors();
        $this->tool(Tools\UpdateCourse::class, ['slug' => 'emotional-intelligence', 'photo' => ''])->assertOk();
        $this->tool(Tools\DeleteImage::class, ['id' => $media->id])->assertOk();
        $this->assertFileDoesNotExist(base_path($media->path));

        $this->tool(Tools\RestoreItem::class, ['type' => 'image', 'key' => (string) $media->id])->assertOk();
        $this->assertFileExists(base_path($media->path));
    }

    public function test_seo_redirects_and_settings(): void
    {
        $this->tool(Tools\UpdateSeo::class, ['path' => url('/about'), 'title' => 'About us', 'description' => 'Who we are'])->assertOk();
        $this->assertSame('About us', SeoMeta::where('path', '/about')->value('title'));
        $this->get('/about')->assertSee('<title>About us</title>', false);
        $this->tool(Tools\GetSeo::class, ['path' => '/about', 'live' => false])->assertOk()->assertSee('Who we are');
        $this->tool(Tools\ListPages::class, ['only_with_seo' => true])->assertOk()->assertSee('/about');

        $this->tool(Tools\UpdateSeo::class, ['path' => '/about', 'title' => '', 'description' => ''])->assertOk();
        $this->assertNull(SeoMeta::where('path', '/about')->first());

        $this->tool(Tools\SaveRedirect::class, ['from' => '/old', 'to' => '/courses'])->assertOk();
        $this->get('/old')->assertRedirect(url('/courses'));
        $this->tool(Tools\DeleteRedirect::class, ['from' => '/old'])->assertOk();
        $this->assertSame(0, Redirect::count());

        $this->tool(Tools\UpdateSettings::class, ['robots' => 'index, follow', 'google_analytics_id' => 'G-TEST1234'])->assertOk();
        $this->assertSame('index, follow', Settings::get('robots'));
        $this->get('/')->assertSee('<meta name="robots" content="index, follow">', false)->assertSee('G-TEST1234');
        $this->tool(Tools\UpdateSettings::class, ['google_analytics_id' => '<script>'])->assertHasErrors();
    }

    public function test_category_copy_can_be_read_changed_and_reset(): void
    {
        $this->tool(Tools\GetCategoryContent::class, ['slug' => 'personal-development'])
            ->assertOk()->assertSee('"source": "default"', false)->assertSee('Who are these courses for?');

        $this->tool(Tools\UpdateCategoryContent::class, [
            'slug' => 'personal-development',
            'h1' => 'Personal Development Training in Abu Dhabi',
            'faq' => [['question' => 'Is there an exam?', 'answer' => 'No, there’s no exam.']],
        ])->assertOk()->assertSee('"changed"', false);

        $this->get('/course-category/personal-development')->assertOk()
            ->assertSee('Personal Development Training in Abu Dhabi')
            ->assertSee('"name":"Is there an exam?"', false)
            ->assertDontSee('Who are these courses for?')
            ->assertSee('Enroll in Courses That Fit Real Work');
        $this->get('/ar/course-category/personal-development')->assertOk()->assertSee('دورات تنمية المهارات الشخصية في أبوظبي');

        $this->tool(Tools\UpdateCategoryContent::class, ['slug' => 'personal-development', 'start' => ['heading' => 'Start here', 'text' => ['See [[no-such-course|this]].'], 'picks' => []]])
            ->assertOk()->assertSee('no-such-course');
        $this->tool(Tools\UpdateCategoryContent::class, ['slug' => 'personal-development', 'faq' => [['question' => 'Only a question']]])->assertHasErrors();
        $this->tool(Tools\UpdateCategoryContent::class, ['slug' => 'nope', 'h1' => 'x'])->assertHasErrors();

        $this->tool(Tools\UpdateCategoryContent::class, ['slug' => 'personal-development', 'reset' => true])->assertOk();
        $this->get('/course-category/personal-development')->assertSee('Who are these courses for?')->assertDontSee('Is there an exam?');
    }

    public function test_any_text_on_any_page_can_be_changed_and_undone(): void
    {
        $this->tool(Tools\GetPageText::class, ['path' => '/contact', 'search' => 'Prefer to just call?'])
            ->assertOk()->assertSee('Prefer to just call?')->assertSee('<h2>Prefer to just call?</h2>', false);

        $this->tool(Tools\UpdatePageText::class, ['path' => '/contact', 'find' => 'Prefer to just call?', 'replace' => 'Rather talk to someone?'])->assertOk();
        $this->get('/contact')->assertSee('Rather talk to someone?')->assertDontSee('Prefer to just call?');
        $this->get('/about')->assertDontSee('Rather talk to someone?');

        // Sending the same find again edits that change instead of adding another.
        $this->tool(Tools\UpdatePageText::class, ['path' => '/contact', 'find' => 'Prefer to just call?', 'replace' => 'Rather talk to us?'])->assertOk();
        $this->assertSame(1, PageText::count());
        $this->get('/contact')->assertSee('Rather talk to us?');

        $this->tool(Tools\UpdatePageText::class, ['path' => '/contact', 'find' => '<h2>Rather talk to us?</h2>', 'replace' => '<h3>Rather talk to us?</h3>', 'html' => true])->assertOk();
        $this->get('/contact')->assertSee('<h3>Rather talk to us?</h3>', false);

        $this->tool(Tools\UpdatePageText::class, ['path' => '/', 'find' => 'All rights reserved.', 'replace' => 'Every right reserved.', 'all_pages' => true])->assertOk();
        $this->get('/about')->assertSee('Every right reserved.');

        // Plain text never touches tags or attributes, and the text must be on the page.
        $this->tool(Tools\UpdatePageText::class, ['path' => '/contact', 'find' => 'nx-btn', 'replace' => 'x'])->assertHasErrors();
        $this->tool(Tools\UpdatePageText::class, ['path' => '/contact', 'find' => 'Not on this page', 'replace' => 'x'])->assertHasErrors();
        $this->tool(Tools\UpdatePageText::class, ['path' => '/mcp', 'find' => 'x', 'replace' => 'y'])->assertHasErrors();

        $this->assertSame($this->admin->id, ActivityLog::where('action', 'update_page_text')->latest('id')->value('user_id'));
        $this->tool(Tools\ListPageTexts::class, ['path' => '/contact'])->assertOk()->assertSee('Every right reserved.');
        foreach (PageText::all() as $text) {
            $this->tool(Tools\DeletePageText::class, ['id' => $text->id])->assertOk();
        }
        $this->get('/contact')->assertSee('Prefer to just call?')->assertSee('All rights reserved.');
    }

    public function test_internal_links_can_be_added_to_any_page(): void
    {
        $this->tool(Tools\CreatePost::class, ['title' => 'PMP Tips', 'slug' => 'pmp-tips', 'body' => 'Study.', 'status' => 'published'])->assertOk();

        // Category copy: every kind of marker, and markers that point nowhere stay plain text.
        $this->tool(Tools\UpdateCategoryContent::class, ['slug' => 'personal-development', 'intro' => [
            'See [[/about|who we are]], [[post:pmp-tips|our PMP tips]], [[cat:leadership-and-management|leadership]], [[#cat-courses|the list]], '
            .'[[https://actvet.gov.ae|ACTVET]], [[page:schedule|the calendar]], [[page:nope|a missing page]] and [[post:nope|a missing post]].',
        ]])->assertOk();
        $this->get('/course-category/personal-development')->assertOk()
            ->assertSee('<a href="'.url('/about').'">who we are</a>', false)
            ->assertSee('<a href="'.url('/blog/pmp-tips').'">our PMP tips</a>', false)
            ->assertSee('<a href="'.url('/course-category/leadership-and-management').'">leadership</a>', false)
            ->assertSee('<a href="#cat-courses">the list</a>', false)
            ->assertSee('<a href="https://actvet.gov.ae" target="_blank" rel="noopener">ACTVET</a>', false)
            ->assertSee('<a href="'.route('schedule').'">the calendar</a>', false)
            ->assertSee('a missing page and a missing post', false);

        // Course documents take the same markers.
        $this->tool(Tools\UpdateCourse::class, ['slug' => 'emotional-intelligence', 'content_en' => ['overview' => ['Questions? [[/contact|Contact us]].']]])->assertOk();
        $this->get('/course/emotional-intelligence')->assertSee('<a href="'.url('/contact').'">Contact us</a>', false);

        // Any other page: link existing words, once, never inside another link.
        $this->tool(Tools\UpdatePageText::class, ['path' => '/about', 'find' => 'working week', 'link' => '/schedule'])
            ->assertOk()->assertSee(url('/schedule'));
        $this->get('/about')->assertSee('<a href="'.url('/schedule').'">working week</a>', false);
        $this->tool(Tools\UpdatePageText::class, ['path' => '/about', 'find' => 'working week', 'link' => url('/courses').'#all'])->assertOk();
        $this->assertSame('/courses#all', PageText::value('link'));
        $this->tool(Tools\UpdatePageText::class, ['path' => '/about', 'find' => 'working week', 'link' => '/no-such-page'])->assertOk()->assertSee('status 404');
        $this->tool(Tools\UpdatePageText::class, ['path' => '/about', 'find' => 'info@compubasetraining.ae', 'link' => '/contact'])->assertHasErrors();
        $this->tool(Tools\UpdatePageText::class, ['path' => '/about', 'find' => 'working week', 'link' => 'javascript:alert(1)'])->assertHasErrors();
        $this->tool(Tools\GetPageText::class, ['path' => '/about'])->assertOk()->assertSee('"href": "'.url('/no-such-page').'"', false);

        $this->tool(Tools\DeletePageText::class, ['id' => PageText::value('id')])->assertOk();
        $this->get('/about')->assertDontSee('<a href="'.url('/no-such-page').'"', false);
    }
}
