<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;

#[Name('CompuBase Website')]
#[Version('1.1.0')]
#[Instructions(<<<'TEXT'
Manage the website of CompuBase Training Center, a training institute in Abu Dhabi. Every change goes live immediately.

The site is bilingual: each course has an English and an Arabic title, summary and course document, served at /course/{slug} and /ar/course/{slug}. When adding or changing course text, write both languages unless told otherwise; Arabic should be natural Modern Standard Arabic. Blog posts are written per language (/blog/{slug} or /ar/blog/{slug}).

Courses belong to one or more categories; categories belong to the "management" or "it" group. Read before you write: use get_course before update_course, and get_post before update_post, so you keep what is already there. Course documents (content_en / content_ar) are replaced as a whole.

Images: upload_image first (from a URL or base64), then use the returned path for a course photo, post cover or SEO image, or its markdown snippet inside a blog post.

Page text: every page's wording can be changed. Category pages (/course-category/{slug}) have structured copy — H1, intro, H2 sections, popular picks, FAQs (which drive the FAQPage schema) — read with get_category_content and changed with update_category_content, per language. Any other text on any page (home, about, contact, corporate, schedule, headings, buttons, header and footer lines) is read with get_page_text and changed with update_page_text: copy the current text exactly, and use html: true to change markup such as a heading level or an image alt, or all_pages: true for header and footer text. list_page_texts and delete_page_text show and undo those changes. Arabic pages are separate paths (/ar/...): change both languages unless told otherwise.

Internal links: in category copy and course documents write link markers — [[course-slug|text]], [[cat:category-slug|text]], [[post:post-slug|text]], [[page:contact|text]], [[/any/path|text]], [[#section-id|text]] or [[https://…|text]]. On any other page, update_page_text with link turns existing words into a link. get_page_text shows every link and where it points. Link Arabic pages to Arabic paths (/ar/...).

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
        Tools\GetCategoryContent::class,
        Tools\UpdateCategoryContent::class,
        Tools\GetPageText::class,
        Tools\UpdatePageText::class,
        Tools\ListPageTexts::class,
        Tools\DeletePageText::class,
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
