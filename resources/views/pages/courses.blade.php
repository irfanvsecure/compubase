@extends('layouts.site')

@section('page', 'courses')
@section('title', 'All Courses — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-courses" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('courses-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></a>
    <nav class="main">
      <ul>
        @include('partials.nav-courses', ['ar' => false])
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="{{ route('partners') }}">Partners</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('courses-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">All courses</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Course catalogue</div>
  <h1>Every CompuBase course, by category.</h1><p class="lead">Every course runs Monday to Friday in Abu Dhabi, with morning and evening groups.</p></div>
</div></section>
@use('App\Support\Catalog')
<section class="section featured catalog" id="catalog" data-per-page="12" data-initial="{{ request('go') }}" data-clear="Clear search" data-days-short="Up to 3 days" data-days-week="4 – 5 days" data-days-long="More than a week"
  data-showing="Showing {from}–{to} of {total} courses"><div class="container">
  @include('partials.cat-filter', ['label' => 'Browse courses by category'])
  <p class="catalog-count" aria-live="polite"></p>
  <div class="course-grid">
  @foreach (Catalog::courses() as $course)
    @include('partials.course-card')
  @endforeach
  </div>
  <nav class="pager" aria-label="Course pages" hidden>
    <button type="button" class="pager-prev">← Previous</button>
    <span class="pager-pages"></span>
    <button type="button" class="pager-next">Next →</button>
  </nav>
  <p class="foot">Not sure which fits? Call an advisor on <a href="tel:+97126771117">02 677 1117</a></p>
</div></section>
<section class="closing"><div class="container">
  <div><h2>Registration is now open.</h2><p>Morning and evening classes are available.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('contact') }}">Register now</a><a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a></div>
</div></section><footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, IT, cyber security and AI. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      @include('partials.footer-courses')
      <div><h4>Contact</h4>
        <p><b style="color:#fff">CompuBase Training Center</b><br>[Full street address]<br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>Sunday to Thursday · [opening hours]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="{{ route('privacy') }}">Privacy notice</a><a href="{{ route('terms') }}">Terms and refunds</a><a href="{{ url('sitemap.xml') }}">Sitemap</a><a href="{{ route('courses-ar') }}">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>

</div>
@endsection
