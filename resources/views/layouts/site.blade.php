<!DOCTYPE html>
<html lang="{{ str_ends_with($initialPage ?? 'home', '-ar') ? 'ar' : 'en' }}" @if (str_ends_with($initialPage ?? 'home', '-ar')) dir="rtl" @endif>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CompuBase Training Center — Professional Training Courses in Abu Dhabi</title>
<meta name="description" content="CompuBase Training Center, Abu Dhabi — complete bilingual site in English and Arabic.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/compubase.css') }}?v={{ filemtime(base_path('css/compubase.css')) }}">
</head>
<body data-page="{{ $initialPage ?? 'home' }}">
@yield('content')
<script>
window.INITIAL_PAGE = document.body.dataset.page || 'home';
window.APP_BASE = @json(rtrim(url('/'), '/'));
</script>
<script src="{{ asset('js/compubase.js') }}"></script>
</body>
</html>
