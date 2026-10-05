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
<script>
// The design is laid out for a 1400px-wide screen. On wider screens (or a zoomed-out browser) scale the whole
// page up by the same ratio, so it keeps the same proportions instead of shrinking into the middle.
(function(){var BASE=1400,MAX=2.5,root=document.documentElement;
function fit(){var w=window.innerWidth;root.style.zoom=w>BASE?Math.min(w/BASE,MAX).toFixed(4):''}
fit();addEventListener('resize',fit);})();
</script>
</head>
<body data-page="@yield('page', 'home')">
@yield('content')
<a class="wa-float" href="https://wa.me/971566893378" target="_blank" rel="noopener" aria-label="{{ View::getSection('lang') === 'ar' ? 'راسلنا على واتساب' : 'Chat with us on WhatsApp' }}"><svg viewBox="0 0 32 32" width="30" height="30" aria-hidden="true"><path fill="currentColor" d="M16.04 3C8.86 3 3.02 8.83 3.02 16c0 2.3.6 4.54 1.75 6.52L3 29l6.65-1.74A13 13 0 0 0 16.04 29C23.2 29 29.05 23.17 29.05 16S23.2 3 16.04 3Zm0 23.8c-1.96 0-3.88-.53-5.56-1.52l-.4-.24-3.95 1.03 1.05-3.84-.26-.4A10.76 10.76 0 0 1 5.26 16c0-5.95 4.84-10.78 10.78-10.78S26.82 10.05 26.82 16 21.98 26.8 16.04 26.8Zm5.92-8.07c-.32-.16-1.92-.95-2.22-1.06-.3-.11-.51-.16-.73.16-.22.32-.84 1.06-1.03 1.27-.19.22-.38.24-.7.08-.32-.16-1.37-.5-2.6-1.6-.96-.86-1.61-1.92-1.8-2.24-.19-.32-.02-.5.14-.66.15-.14.32-.38.48-.57.16-.19.22-.32.32-.54.11-.22.05-.4-.03-.57-.08-.16-.73-1.75-1-2.4-.26-.63-.53-.54-.73-.55h-.62c-.22 0-.57.08-.86.4-.3.32-1.13 1.1-1.13 2.7 0 1.58 1.16 3.12 1.32 3.33.16.22 2.28 3.48 5.53 4.88.77.33 1.37.53 1.84.68.77.25 1.48.21 2.03.13.62-.09 1.92-.78 2.19-1.54.27-.76.27-1.4.19-1.54-.08-.13-.3-.21-.62-.37Z"/></svg></a>
<script>
window.INITIAL_PAGE = document.body.dataset.page || 'home';
window.APP_BASE = @json(rtrim(url('/'), '/'));
window.COURSE_DATA = @json(View::getSection('page') === 'home' ? App\Support\Catalog::forScript() : []);
</script>
<script src="{{ asset('js/compubase.js') }}?v={{ filemtime(base_path('js/compubase.js')) }}"></script>
</body>
</html>
