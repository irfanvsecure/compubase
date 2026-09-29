<?php

namespace App\Support;

use Illuminate\Http\Response;

class SitePages
{
    public static function slugs(): array
    {
        return [
            'about', 'contact', 'courses', 'schedule', 'corporate',
            'pmp', 'cia', 'cma', 'cisa', 'ceh', 'cyber', 'ai', 'prompt',
            'english', 'ielts', 'arabic', 'office',
            'home-ar', 'about-ar', 'contact-ar', 'courses-ar', 'schedule-ar', 'corporate-ar',
            'pmp-ar', 'cia-ar', 'cma-ar', 'cisa-ar', 'ceh-ar', 'cyber-ar', 'ai-ar', 'prompt-ar',
            'english-ar', 'ielts-ar', 'arabic-ar', 'office-ar',
        ];
    }

    public static function response(string $page): Response
    {
        $html = view('site', ['initialPage' => $page])->render();
        $html = self::onlyPage($html, $page);
        $html = self::activate($html, $page);
        $html = self::applyTitle($html, $page);
        $html = self::rewriteLinks($html);

        return response($html);
    }

    private static function onlyPage(string $html, string $page): string
    {
        $kept = preg_replace_callback(
            '/<!-- ================ PAGE: ([a-z0-9-]+) ================ -->.*?(?=<!-- ================ PAGE: |<script>)/s',
            function (array $match) use ($page) {
                return $match[1] === $page ? $match[0] : '';
            },
            $html
        );

        return is_string($kept) ? $kept : $html;
    }

    private static function applyTitle(string $html, string $page): string
    {
        $titles = self::titles();
        $title = $titles[$page] ?? ($titles['home'] ?? 'CompuBase Training Center');
        $html = preg_replace(
            '/<title>.*?<\/title>/s',
            '<title>'.htmlspecialchars($title, ENT_QUOTES, 'UTF-8').'</title>',
            $html,
            1
        ) ?? $html;

        $description = str_ends_with($page, '-ar')
            ? 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.'
            : 'CompuBase Training Center in Abu Dhabi. Professional certification, IT, and language courses.';

        return preg_replace(
            '/<meta name="description" content="[^"]*">/',
            '<meta name="description" content="'.htmlspecialchars($description, ENT_QUOTES, 'UTF-8').'">',
            $html,
            1
        ) ?? $html;
    }

    private static function titles(): array
    {
        $js = file_get_contents(public_path('js/compubase.js'));
        if (! is_string($js) || ! preg_match('/const TITLES=(\{.*?\});/s', $js, $match)) {
            return [];
        }

        $titles = json_decode($match[1], true);

        return is_array($titles) ? $titles : [];
    }

    private static function activate(string $html, string $page): string
    {
        $id = preg_quote($page, '/');

        return preg_replace(
            '/class="page" id="pg-'.$id.'"/',
            'class="page active" id="pg-'.$page.'"',
            $html,
            1
        ) ?? $html;
    }

    private static function rewriteLinks(string $html): string
    {
        $root = rtrim(url('/'), '/');
        $known = array_merge(['home'], self::slugs());

        return preg_replace_callback('/href="#([^"]*)"/', function (array $match) use ($root, $known) {
            $hash = $match[1];
            if ($hash === '') {
                return $match[0];
            }

            $page = $hash;
            $section = '';
            if (str_contains($hash, '/')) {
                [$page, $section] = explode('/', $hash, 2);
            }

            if (! in_array($page, $known, true)) {
                return 'href="#" data-scroll="'.htmlspecialchars($hash, ENT_QUOTES, 'UTF-8').'"';
            }

            $path = $page === 'home' ? $root.'/' : $root.'/'.$page;
            if ($section !== '') {
                $path .= '?go='.rawurlencode($section);
            }

            return 'href="'.$path.'"';
        }, $html) ?? $html;
    }
}
