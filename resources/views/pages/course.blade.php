@extends('layouts.site')

@use('App\Support\Catalog')
@php
    $title = Catalog::title($course);
    $duration = Catalog::duration($course['days']);
    $content = Catalog::content($course);
    $photo = Catalog::photo($course);
    $summary = Catalog::summary($course);
    $hasObjectives = $content && ($content['competencies'] || $content['objectives'] || $content['objectivesIntro']);
    $hasAudience = $content && $content['audience'];
    // An outline-only document has nothing for the Overview tab, so the page opens on the outline.
    $tabPhotos = config('course_tab_photos.'.$course['slug'], []);
    $tabPhoto = fn ($k) => ! empty($tabPhotos[$k]) && is_file(base_path($tabPhotos[$k])) ? asset($tabPhotos[$k]) : null;
    $hasOverview = ! $content || $photo || $content['overview'] || $content['methodology'] || ! empty($content['extra']);
@endphp

@section('page', 'course')
@section('title', $title.' — CompuBase Training Center, Abu Dhabi')
@section('description', $title.', a '.$duration.' course in '.$course['catEn'].' at CompuBase Training Center, Abu Dhabi.')
@section('og_image', $photo ?? '')

@section('content')
<div class="page active" id="pg-course" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ Catalog::url($course, true) }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        @include('partials.nav-courses', ['ar' => false])
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="{{ route('partners') }}">Partners</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ Catalog::url($course, true) }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact', ['course' => $course['slug']]) }}#contact-form">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

@include('partials.course-main', ['ar' => false])

<section class="related">
  <div class="container">
    <div class="h2">Learners who took {{ $title }} also considered</div>
    <div class="rel-grid">
      @foreach (Catalog::related($course) as $other)
      <div class="rel-card"><div class="eyebrow">{{ $other['catEn'] }}</div><h3>{{ $other['en'] }}</h3>
        <p>{{ Catalog::duration($other['days']) }} · Morning or evening</p>
        <a href="{{ Catalog::url($other) }}">Course details →</a></div>
      @endforeach
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <div class="h2">Registration is now open.</div>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, IT, cyber security and AI. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      @include('partials.footer-courses')
      <div><div class="h4">Contact</div>
        <p><b style="color:#fff">CompuBase Training Center</b><br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>Monday to Friday</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="{{ route('privacy') }}">Privacy notice</a><a href="{{ route('terms') }}">Terms and refunds</a><a href="{{ url('sitemap.xml') }}">Sitemap</a><a href="{{ Catalog::url($course, true) }}">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>

@include('partials.course-print', ['ar' => false])

</div>
@endsection
