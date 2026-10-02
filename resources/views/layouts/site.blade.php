<!DOCTYPE html>
<html lang="@yield('lang', 'en')" @if (View::getSection('lang') === 'ar') dir="rtl" @endif>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@php
    // Each page sets its own title and description; SEO overrides saved for the page win.
    $seo = App\Support\Seo::current();
    $section = fn (string $name, string $default = '') => html_entity_decode(trim(View::yieldContent($name, $default)), ENT_QUOTES | ENT_HTML5);
    $metaTitle = $seo?->title ?: $section('title', 'CompuBase Training Center — Professional Training Courses in Abu Dhabi');
    $metaDescription = $seo?->description ?: $section('description', 'CompuBase Training Center in Abu Dhabi. Professional certification, IT, and language courses.');
    $metaImage = $seo?->og_image ?: $section('og_image') ?: asset('images/logo.png');
    $analyticsId = App\Support\Settings::get('google_analytics_id');
@endphp
<meta name="robots" content="{{ $seo?->robots ?: ($section('robots') ?: App\Support\Settings::get('robots')) }}">
<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
@if ($seo?->keywords)<meta name="keywords" content="{{ $seo->keywords }}">@endif
<link rel="canonical" href="{{ $seo?->canonical ?: url()->current() }}">
<meta property="og:type" content="{{ $section('og_type', 'website') }}">
<meta property="og:site_name" content="CompuBase Training Center">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ Str::startsWith($metaImage, ['http://', 'https://']) ? $metaImage : asset($metaImage) }}">
<meta name="twitter:card" content="summary_large_image">
@if ($verification = App\Support\Settings::get('google_site_verification'))<meta name="google-site-verification" content="{{ $verification }}">@endif
@if ($analyticsId)
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $analyticsId }}"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}gtag('js',new Date());gtag('config',@json($analyticsId));</script>
@endif
<link rel="icon" href="{{ asset('images/favicon.ico') }}" sizes="any">
<link rel="icon" type="image/png" href="{{ asset('images/favicon-32.png') }}" sizes="32x32">
<link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/compubase.css') }}?v={{ filemtime(base_path('css/compubase.css')) }}">
</head>
<body data-page="@yield('page', 'home')">
@yield('content')
<script>
window.INITIAL_PAGE = document.body.dataset.page || 'home';
window.APP_BASE = @json(rtrim(url('/'), '/'));
window.COURSE_DATA = @json(View::getSection('page') === 'home' ? App\Support\Catalog::forScript() : []);
</script>
<script src="{{ asset('js/compubase.js') }}?v={{ filemtime(base_path('js/compubase.js')) }}"></script>
</body>
</html>
