<?php

namespace App\Support;

use App\Models\Setting;

/** Site-wide settings that Claude can change, with their defaults. */
class Settings
{
    public const DEFAULTS = [
        // The robots meta tag on every page without its own. The site stays out of
        // search engines until this is set to "index, follow".
        'robots' => 'noindex, nofollow',
        // robots.txt; the sitemap line is added after it.
        'robots_txt' => "User-agent: *\nDisallow:",
        // Google Search Console verification code (the content of its meta tag).
        'google_site_verification' => '',
        // Google Analytics 4 measurement ID, e.g. G-ABC123XYZ.
        'google_analytics_id' => '',
    ];

    private static ?array $values = null;

    public static function all(): array
    {
        return self::$values ??= array_merge(self::DEFAULTS, Setting::pluck('value', 'key')->map(fn ($v) => (string) $v)->all());
    }

    public static function get(string $key): string
    {
        return self::all()[$key] ?? '';
    }

    public static function set(string $key, string $value): void
    {
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        self::flush();
    }

    /** Forget the loaded settings, so the next read sees the database. */
    public static function flush(): void
    {
        self::$values = null;
    }
}
