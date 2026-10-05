<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;

#[Name('CompuBase Website')]
#[Version('1.0.0')]
#[Instructions(<<<'TEXT'
Manage the website of CompuBase Training Center, a training institute in Abu Dhabi. Every change goes live immediately.

The site is bilingual: each course has an English and an Arabic title, summary and course document, served at /course/{slug} and /ar/course/{slug}. When adding or changing course text, write both languages unless told otherwise; Arabic should be natural Modern Standard Arabic. Blog posts are written per language (/blog/{slug} or /ar/blog/{slug}).

Courses belong to one or more categories; categories belong to the "management" or "it" group. Read before you write: use get_course before update_course, and get_post before update_post, so you keep what is already there. Course documents (content_en / content_ar) are replaced as a whole.

Images: upload_image first (from a URL or base64), then use the returned path for a course photo, post cover or SEO image, or its markdown snippet inside a blog post.

SEO: list_pages gives every page path; get_seo shows what a page shows search engines now; update_seo overrides it. The whole site is hidden from search engines until the "robots" setting is "index, follow" (update_settings) — only change it when the owner asks.

Website forms (course enquiries, corporate proposal requests, calendar requests) are saved and emailed to the "enquiry_email" setting; list_enquiries shows them.

Deleting moves things to the trash (list_trash, restore_item). Confirm with the user before deleting anything. activity_log shows recent changes.
TEXT)]
class CompubaseServer extends Server
{
    /** List every tool in one page, so clients need not follow cursors. */
    public int $defaultPaginationLength = 50;

    protected array $tools = [
        Tools\ListCategories::class,
        Tools\CreateCategory::class,
        Tools\UpdateCategory::class,
        Tools\DeleteCategory::class,
        Tools\ListCourses::class,
        Tools\GetCourse::class,
        Tools\CreateCourse::class,
        Tools\UpdateCourse::class,
        Tools\DeleteCourse::class,
        Tools\ListPosts::class,
        Tools\GetPost::class,
        Tools\CreatePost::class,
        Tools\UpdatePost::class,
        Tools\DeletePost::class,
        Tools\ListImages::class,
        Tools\UploadImage::class,
        Tools\UpdateImage::class,
        Tools\DeleteImage::class,
        Tools\ListPages::class,
        Tools\GetSeo::class,
        Tools\UpdateSeo::class,
        Tools\ListRedirects::class,
        Tools\SaveRedirect::class,
        Tools\DeleteRedirect::class,
        Tools\GetSettings::class,
        Tools\UpdateSettings::class,
        Tools\ListTrash::class,
        Tools\RestoreItem::class,
        Tools\ActivityLog::class,
        Tools\ListEnquiries::class,
    ];
}
