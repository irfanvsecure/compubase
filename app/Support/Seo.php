<?php

namespace App\Support;

use App\Models\SeoMeta;
use Illuminate\Support\Str;

/** Per-page SEO overrides, looked up by page path. */
class Seo
{
    /** The overrides for the page being shown, or null. */
    public static function current(): ?SeoMeta
    {
        return SeoMeta::where('path', self::path(request()->path()))->first();
    }

    /**
     * A page address in the form the overrides are stored under: a leading slash,
     * no trailing slash, no domain, query or fragment. Accepts a full URL too.
     */
    public static function path(string $address): string
    {
        $path = parse_url(trim($address), PHP_URL_PATH) ?? '';
        $base = rtrim(parse_url(url('/'), PHP_URL_PATH) ?? '', '/');
        if ($base !== '' && ($path === $base || Str::startsWith($path, $base.'/'))) {
            $path = substr($path, strlen($base));
        }

        return '/'.trim($path, '/');
    }
}
