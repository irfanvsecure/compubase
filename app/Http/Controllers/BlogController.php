<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(string $locale = 'en'): View
    {
        app()->setLocale($locale);
        $posts = Post::published()->where('locale', $locale)->latest('published_at')->paginate(12);

        return view('pages.blog', ['posts' => $posts, 'ar' => $locale === 'ar']);
    }

    public function show(string $slug, string $locale = 'en'): View
    {
        $post = Post::published()->where('locale', $locale)->where('slug', $slug)->firstOrFail();

        return $this->render($post);
    }

    /** A draft or scheduled post, through the signed link the MCP server hands out. */
    public function preview(Post $post): View
    {
        return $this->render($post);
    }

    private function render(Post $post): View
    {
        app()->setLocale($post->locale);

        return view('pages.blog-post', ['post' => $post, 'ar' => $post->locale === 'ar']);
    }
}
