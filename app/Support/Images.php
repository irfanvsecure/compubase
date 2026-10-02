<?php

namespace App\Support;

use App\Models\Course;
use App\Models\Media;
use App\Models\Post;
use App\Models\SeoMeta;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

/**
 * Uploaded images. Files live in uploads/{year}/{month}/ at the project root, which
 * git ignores so a deploy never removes them. A deleted image's file moves to
 * storage/app/trash/ and comes back when the image is restored.
 */
class Images
{
    public const TYPES = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif'];

    public const MAX_BYTES = 8 * 1024 * 1024;

    /** Download an image from a public http(s) URL. */
    public static function fromUrl(string $url, ?string $name = null): Media
    {
        if (! in_array(parse_url($url, PHP_URL_SCHEME), ['http', 'https'], true)) {
            throw ValidationException::withMessages(['image' => 'The image URL must start with http:// or https://.']);
        }
        self::assertPublicHost((string) parse_url($url, PHP_URL_HOST));

        $response = Http::timeout(30)->withOptions([
            'allow_redirects' => [
                'max' => 3,
                'protocols' => ['http', 'https'],
                'on_redirect' => fn ($request, $response, $uri) => self::assertPublicHost($uri->getHost()),
            ],
        ])->get($url);

        if (! $response->successful()) {
            throw ValidationException::withMessages(['image' => "The image URL answered with HTTP {$response->status()}."]);
        }

        return self::store($response->body(), $name ?? basename((string) parse_url($url, PHP_URL_PATH)));
    }

    /** Save an image sent as base64 (a data: URI prefix is allowed). */
    public static function fromBase64(string $data, ?string $name = null): Media
    {
        $bytes = base64_decode(preg_replace('#^data:[^,]*,#', '', trim($data)), true);
        if ($bytes === false) {
            throw ValidationException::withMessages(['image' => 'The image data is not valid base64.']);
        }

        return self::store($bytes, $name);
    }

    private static function store(string $bytes, ?string $name): Media
    {
        if (strlen($bytes) > self::MAX_BYTES) {
            throw ValidationException::withMessages(['image' => 'The image is larger than 8 MB.']);
        }
        $mime = (new \finfo(FILEINFO_MIME_TYPE))->buffer($bytes);
        $size = @getimagesizefromstring($bytes);
        if (! isset(self::TYPES[$mime]) || $size === false) {
            throw ValidationException::withMessages(['image' => 'Only JPEG, PNG, WebP and GIF images can be uploaded.']);
        }

        $stem = Str::slug(pathinfo((string) $name, PATHINFO_FILENAME)) ?: 'image';
        $path = 'uploads/'.now()->format('Y/m').'/'.Str::limit($stem, 60, '').'-'.Str::lower(Str::random(6)).'.'.self::TYPES[$mime];
        File::ensureDirectoryExists(dirname(base_path($path)));
        File::put(base_path($path), $bytes);

        return Media::create([
            'path' => $path,
            'original_name' => $name,
            'mime' => $mime,
            'size' => strlen($bytes),
            'width' => $size[0],
            'height' => $size[1],
        ]);
    }

    /** Where the site uses an image: "course:{slug}", "post:{id}", "seo:{path}". */
    public static function usages(Media $media): array
    {
        $url = $media->url();
        $uses = [];
        foreach (Course::where('photo', $media->path)->pluck('slug') as $slug) {
            $uses[] = "course photo: {$slug}";
        }
        foreach (Post::whereIn('cover_image', [$media->path, $url])->pluck('id') as $id) {
            $uses[] = "post cover: {$id}";
        }
        foreach (Post::where('body', 'like', '%'.$media->path.'%')->pluck('id') as $id) {
            $uses[] = "post body: {$id}";
        }
        foreach (SeoMeta::whereIn('og_image', [$media->path, $url])->pluck('path') as $path) {
            $uses[] = "seo image: {$path}";
        }

        return $uses;
    }

    public static function trash(Media $media): void
    {
        self::move(base_path($media->path), storage_path('app/trash/'.$media->path));
        $media->delete();
    }

    public static function restore(Media $media): void
    {
        self::move(storage_path('app/trash/'.$media->path), base_path($media->path));
        $media->restore();
    }

    private static function move(string $from, string $to): void
    {
        if (is_file($from)) {
            File::ensureDirectoryExists(dirname($to));
            File::move($from, $to);
        }
    }

    private static function assertPublicHost(string $host): void
    {
        $ips = filter_var($host, FILTER_VALIDATE_IP) ? [$host] : (gethostbynamel($host) ?: []);
        if ($ips === []) {
            throw ValidationException::withMessages(['image' => "The host {$host} could not be found."]);
        }
        foreach ($ips as $ip) {
            if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                throw ValidationException::withMessages(['image' => 'Images can only be downloaded from public addresses.']);
            }
        }
    }
}
