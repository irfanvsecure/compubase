<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SeoMeta;
use App\Support\Catalog;
use App\Support\Settings;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    /** Every public page except those whose SEO settings say noindex. */
    public static function pages(): array
    {
        $pages = [];
        foreach (['', 'about', 'contact', 'courses', 'categories', 'schedule', 'corporate', 'partners', 'privacy', 'terms', 'blog'] as $page) {
            $pages[] = ['path' => '/'.$page, 'title' => ucfirst($page ?: 'home')];
            $pages[] = ['path' => '/ar'.($page ? '/'.$page : ''), 'title' => ucfirst($page ?: 'home').' (Arabic)'];
        }
        foreach (Catalog::categories() as $slug => $category) {
            $pages[] = ['path' => '/course-category/'.$slug, 'title' => $category['en']];
            $pages[] = ['path' => '/ar/course-category/'.$slug, 'title' => $category['ar']];
        }
        foreach (Catalog::courses() as $course) {
            $pages[] = ['path' => '/course/'.$course['slug'], 'title' => $course['en']];
            $pages[] = ['path' => '/ar/course/'.$course['slug'], 'title' => $course['ar']];
        }
        foreach (Post::published()->get(['locale', 'slug', 'title', 'updated_at']) as $post) {
            $pages[] = ['path' => ($post->locale === 'ar' ? '/ar' : '').'/blog/'.$post->slug, 'title' => $post->title, 'updated' => $post->updated_at];
        }

        return $pages;
    }

    public function sitemap(): Response
    {
        $hidden = SeoMeta::where('robots', 'like', '%noindex%')->pluck('path')->flip();
        $urls = array_filter(self::pages(), fn ($page) => ! isset($hidden[$page['path']]));

        return response()->view('sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $body = rtrim(Settings::get('robots_txt'))."\n\nSitemap: ".url('sitemap.xml')."\n";

        return response($body)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
