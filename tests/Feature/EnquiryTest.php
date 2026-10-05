<?php

namespace Tests\Feature;

use App\Mcp\Servers\CompubaseServer;
use App\Mcp\Tools\ListEnquiries;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnquiryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('catalog:import')->assertSuccessful();
    }

    public function test_every_form_page_posts_to_the_enquiry_handler(): void
    {
        foreach (['/' => 2, '/ar' => 2, '/contact' => 1, '/ar/contact' => 1, '/corporate' => 1, '/ar/corporate' => 1] as $path => $forms) {
            $html = $this->get($path)->assertOk()->getContent();
            $this->assertSame($forms, substr_count($html, 'action="'.route('enquiry').'"'), $path);
            $this->assertStringNotContainsString('Demo only', $html, $path);
            $this->assertStringNotContainsString('href="#"', $html, $path);
        }
    }

    public function test_an_enquiry_is_saved_and_emailed(): void
    {
        Mail::fake();
        $this->from('/contact')->post('/enquiry', [
            'type' => 'contact', 'locale' => 'en', 'name' => 'Sara Ali', 'phone' => '050 123 4567',
            'email' => 'sara@example.com', 'timing' => 'Evening', 'course' => 'Emotional Intelligence', 'message' => 'Next intake?',
        ])->assertRedirect(url('/contact').'#contact-form')->assertSessionHas('enquiry_sent', 'contact');

        $enquiry = Enquiry::sole();
        $this->assertSame('Sara Ali', $enquiry->name);
        $this->assertNotNull($enquiry->emailed_at);
        $this->get('/contact')->assertSee('your message has been sent');
    }

    public function test_required_fields_and_the_spam_trap(): void
    {
        $this->from('/corporate')->post('/enquiry', ['type' => 'proposal', 'email' => 'not-an-email'])
            ->assertSessionHasErrors(['name', 'organisation', 'phone', 'email']);
        $this->from('/')->post('/enquiry', ['type' => 'calendar', 'email' => 'boss@company.ae'])->assertSessionHasNoErrors();
        $this->from('/')->post('/enquiry', ['type' => 'contact', 'email' => 'bot@spam.test', 'website' => 'http://spam'])
            ->assertSessionHas('enquiry_sent');

        $this->assertSame(['calendar'], Enquiry::pluck('type')->all());
    }

    public function test_claude_can_list_enquiries(): void
    {
        Enquiry::create(['type' => 'proposal', 'name' => 'Omar', 'organisation' => 'ADNOC', 'email' => 'omar@example.com', 'phone' => '050']);
        CompubaseServer::actingAs(User::factory()->create())->tool(ListEnquiries::class, ['type' => 'proposal'])
            ->assertOk()->assertSee('ADNOC');
    }

    public function test_privacy_and_terms_pages(): void
    {
        foreach (['/privacy', '/terms', '/ar/privacy', '/ar/terms'] as $path) {
            $this->get($path)->assertOk()->assertSee('info@compubasetraining.ae');
        }
    }
}
