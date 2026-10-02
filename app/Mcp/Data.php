<?php

namespace App\Mcp;

use App\Models\Category;
use App\Models\Course;
use App\Models\Media;
use App\Models\Post;
use App\Support\Catalog;
use App\Support\Images;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

/** How the MCP tools present the site's records, and read file references. */
class Data
{
    public static function category(Category $category): array
    {
        return [
            'slug' => $category->slug,
            'name_en' => $category->name_en,
            'name_ar' => $category->name_ar,
            'group' => $category->group,
            'position' => $category->position,
            'course_count' => $category->courses_count ?? $category->courses()->count(),
            'url' => route('courses', ['go' => $category->slug]),
        ];
    }

    public static function course(Course $course, bool $full = false): array
    {
        $data = [
            'slug' => $course->slug,
            'title_en' => $course->title_en,
            'title_ar' => $course->title_ar,
            'days' => $course->days,
            'summary_en' => $course->summary_en,
            'summary_ar' => $course->summary_ar,
            'categories' => $course->categories->sortBy('position')->pluck('slug')->values()->all(),
            'photo' => $course->photo,
            'photo_url' => $course->photo ? asset($course->photo) : null,
            'url_en' => url('course/'.$course->slug),
            'url_ar' => url('ar/course/'.$course->slug),
            'has_content_en' => $course->content_en !== null,
            'has_content_ar' => $course->content_ar !== null,
            'updated_at' => $course->updated_at?->toIso8601String(),
        ];
        if ($full) {
            $data['content_en'] = $course->content_en ? Catalog::normalizeContent($course->content_en) : null;
            $data['content_ar'] = $course->content_ar ? Catalog::normalizeContent($course->content_ar) : null;
        }

        return $data;
    }

    public static function post(Post $post, bool $full = false): array
    {
        $data = [
            'id' => $post->id,
            'locale' => $post->locale,
            'slug' => $post->slug,
            'title' => $post->title,
            'excerpt' => $post->excerpt,
            'status' => $post->status,
            'published_at' => $post->published_at?->toIso8601String(),
            'live' => $post->isLive(),
            'cover_image' => $post->cover_image,
            'url' => $post->url(),
            'preview_url' => URL::temporarySignedRoute('blog.preview', now()->addDays(7), ['post' => $post->id]),
            'updated_at' => $post->updated_at?->toIso8601String(),
        ];
        if ($full) {
            $data['body'] = $post->body;
        }

        return $data;
    }

    public static function media(Media $media): array
    {
        return [
            'id' => $media->id,
            'path' => $media->path,
            'url' => $media->url(),
            'markdown' => '!['.($media->alt_en ?? '').']('.$media->url().')',
            'mime' => $media->mime,
            'size_kb' => (int) round($media->size / 1024),
            'width' => $media->width,
            'height' => $media->height,
            'alt_en' => $media->alt_en,
            'alt_ar' => $media->alt_ar,
            'uploaded_at' => $media->created_at?->toIso8601String(),
        ];
    }

    /**
     * A reference to an image on this site (a path such as uploads/2026/10/a.jpg or
     * images/courses/x.jpg, or its full URL) as the path stored in the database.
     * An empty value means "no image".
     */
    public static function localImage(?string $value): ?string
    {
        $value = trim((string) $value);
        if ($value === '') {
            return null;
        }
        $root = rtrim(url('/'), '/').'/';
        if (str_starts_with($value, $root)) {
            $value = substr($value, strlen($root));
        }
        $value = ltrim(parse_url($value, PHP_URL_PATH) ?? '', '/');

        if (str_contains($value, '..') || ! preg_match('#^(uploads|images)/#', $value) || ! is_file(base_path($value))
            || ! isset(Images::TYPES[mime_content_type(base_path($value)) ?: ''])) {
            throw ValidationException::withMessages(['image' => "No image found at {$value}. Upload it with upload_image first and use the path it returns."]);
        }

        return $value;
    }
}
