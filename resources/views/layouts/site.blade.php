<!DOCTYPE html>
<html lang="@yield('lang', 'en')" @if (View::getSection('lang') === 'ar') dir="rtl" @endif>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'CompuBase Training Center — Professional Training Courses in Abu Dhabi')</title>
<meta name="description" content="@yield('description', 'CompuBase Training Center in Abu Dhabi. Professional certification, IT, and language courses.')">
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
</script>
<script src="{{ asset('js/compubase.js') }}?v={{ filemtime(base_path('js/compubase.js')) }}"></script>
</body>
</html>
