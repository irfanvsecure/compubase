@extends('layouts.site')

@section('page', 'schedule')
@section('title', 'Course Schedule — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-schedule" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('schedule-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('courses') }}">Courses</a></li>
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="{{ route('home', ['go' => 'accreditation']) }}">Accreditation</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('schedule-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">Schedule</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
 <div><div class="eyebrow on-dark">Upcoming intakes</div>
 <h1>Every start date, in one table.</h1>
 <p class="lead">Confirmed intakes at the Abu Dhabi centre for every course. If a date does not suit you, tell us your preferred week and we will place you in the next group.</p></div>
</div></section>
@use('App\Support\Catalog')
<section class="section schedule catalog" id="catalog" data-per-page="10" data-initial="{{ request('go') }}"
  data-showing="Showing {from}–{to} of {total} courses"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">All courses</div><h2>Next confirmed groups.</h2></div>
  <a class="btn btn-outline" href="{{ route('contact') }}">⤓ Get the calendar by email</a>
 </div>
 <nav class="filter-tabs cat-filter" aria-label="Browse the schedule by category">
  <button type="button" class="active" data-cat="all">All courses · {{ count(Catalog::courses()) }}</button>
  @foreach (['management' => 'Management courses', 'it' => 'IT courses'] as $group => $label)
  <span class="cat-group">{{ $label }}</span>
  @foreach (Catalog::categories() as $cat => $category)@if ($category['group'] === $group)<button type="button" data-cat="{{ $cat }}">{{ $category['en'] }} · {{ count($category['courses']) }}</button>@endif @endforeach
  @endforeach
 </nav>
 <p class="catalog-count" aria-live="polite"></p>
 <div class="table-wrap">
  <table class="sched">
   <caption>Monday to Friday · Abu Dhabi centre</caption>
   <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
   <tbody>
@foreach (Catalog::courses() as $course)
<tr data-cats="{{ implode(' ', $course['cats']) }}"><td><b style="color:var(--navy)"><a href="{{ Catalog::url($course) }}" style="color:var(--navy)">{{ $course['en'] }}</a></b></td><td>{{ $course['catEn'] }}</td><td>{{ Catalog::duration($course['days']) }}</td><td>Morning or evening</td><td>2026 &amp; 2027</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
@endforeach
   </tbody>
  </table>
 </div>
 <nav class="pager" aria-label="Schedule pages" hidden>
  <button type="button" class="pager-prev">← Previous</button>
  <span class="pager-pages"></span>
  <button type="button" class="pager-next">Next →</button>
 </nav>
 <p class="sched-note">All groups run Monday to Friday at the Abu Dhabi centre. Start dates to be confirmed — call <a href="tel:0506399915" style="font-weight:700;text-decoration:underline">050 6399915</a> for the nearest intake.</p>
</div></section>
<section class="closing"><div class="container">
 <div><h2>Registration is now open.</h2><p>Morning and evening classes are available.</p></div>
 <div class="actions"><a class="btn btn-navy" href="{{ route('contact') }}">Register now</a><a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a></div>
</div></section>
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, IT, cyber security and AI. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      @include('partials.footer-courses')
      <div><h4>Contact</h4>
        <p><b style="color:#fff">CompuBase Training Center</b><br>[Full street address]<br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">[info@compubase.ae]</a><br>Sunday to Thursday · [opening hours]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ route('courses-ar') }}">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>

</div>
@endsection
