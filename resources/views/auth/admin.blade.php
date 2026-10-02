{{-- Bare page for admin screens: sign-in and the OAuth approval. --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>@yield('title') — CompuBase</title>
<link rel="icon" href="{{ asset('images/favicon.ico') }}" sizes="any">
<link rel="stylesheet" href="{{ asset('css/compubase.css') }}?v={{ filemtime(base_path('css/compubase.css')) }}">
<style>
body{background:var(--paper);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:16px}
.admin-card{background:#fff;border:1px solid var(--line);border-top:4px solid var(--gold);width:100%;max-width:420px;padding:32px}
.admin-card img{width:160px;height:auto;display:block;margin:0 auto 20px}
.admin-card h1{font-size:24px;text-align:center;margin-bottom:8px}
.admin-card p{font-size:15px;text-align:center;color:#556;margin-bottom:20px}
.admin-card label{display:block;font-weight:700;font-size:14px;margin:14px 0 6px}
.admin-card input[type=email],.admin-card input[type=password]{width:100%;min-height:46px;border:1px solid var(--line);padding:0 12px;font:inherit}
.admin-card .remember{display:flex;gap:8px;align-items:center;font-weight:500}
.admin-card .btn{width:100%;margin-top:20px;cursor:pointer;border:0}
.admin-card .error{background:#fdecec;color:#a11;padding:10px 12px;font-size:14px;margin-bottom:12px}
.admin-card ul{margin:0 0 20px;padding:14px 18px;background:var(--paper);font-size:15px}
.admin-card ul li{list-style:disc;margin-inline-start:16px}
.admin-card .actions{display:flex;gap:10px}
.admin-card .actions form{flex:1}
</style>
</head>
<body>
<main class="admin-card">
  <img src="{{ asset('images/logo.png') }}" alt="CompuBase">
  @yield('content')
</main>
</body>
</html>
