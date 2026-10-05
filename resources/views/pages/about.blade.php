@extends('layouts.site')

@section('page', 'about')
@section('title', 'About Us — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-about" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('about-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
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
        <li><a href="{{ route('partners') }}">Partners</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('about-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">About us</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">About CompuBase</div>
  <h1>A training centre built around the working week.</h1><p class="lead">CompuBase Training Center runs from a single Abu Dhabi campus. Every course is taught in our own rooms, by our own faculty, on a timetable designed for people who cannot stop working to study.</p></div>
</div></section>
<section class="section"><div class="container">
  <div class="eyebrow">Who we are</div>
  <h2>Classroom training, done properly.</h2>
  <div class="about-intro">
    <div>
  <div style="max-width:760px">
@use('App\Support\Catalog')
    <p>CompuBase Training Center — Innovative Training Solutions — is a professional training institute in Abu Dhabi, United Arab Emirates. We deliver {{ count(Catalog::courses()) }} scheduled courses in {{ count(Catalog::categories()) }} categories of management and IT training, from personal development, leadership and finance to cyber security, cloud computing and artificial intelligence.</p>
    <p>Every programme runs Monday to Friday with a morning group and an evening group, taught in English or Arabic depending on the group. Courses range from a two-day workshop to a full month of tuition — and all of them happen in a real classroom, with an instructor who answers questions the moment they come up.</p>
    <p>[Add: founding year, licence details, and two or three sentences of the centre's own history — to be supplied by CompuBase before publication.]</p>
  </div>
  <div class="placeholder-note" style="max-width:760px">[History, founding year, and team details to be confirmed with the client before this page goes live.]</div>
    </div>
    <figure class="about-photo"><img src="{{ url('uploads/2026/10/iso-9001-foundation-pdca-training-ty23la.jpg') }}" alt="Trainer teaching a classroom group at CompuBase Training Center, Abu Dhabi" loading="lazy"></figure>
  </div>
</div></section>
<section class="accred"><div class="container" style="text-align:center">
  <div class="eyebrow">Accredited and recognised by</div>
  <div class="marks"><div class="mark">ACTVET</div><div class="mark">BRITISH COUNCIL</div><div class="mark">IELTS</div><div class="mark">ICDL</div></div>
</div></section>
<section class="section why"><div class="container">
  <div class="eyebrow">Why learners choose us</div>
  <h2>What makes CompuBase different.</h2>
  <div class="why-grid">
    <div class="why-item"><h3>Morning and evening groups</h3><p>The same syllabus, twice a day, so your shift pattern is not a reason to postpone a qualification.</p></div>
    <div class="why-item"><h3>Taught in Arabic or English</h3><p>Course material and instruction in the language your group works in.</p></div>
    <div class="why-item"><h3>Classroom, not a video library</h3><p>Small groups in a real room, where a question gets answered the moment it comes up.</p></div>
    <div class="why-item"><h3>Straight answers on fit</h3><p>If a course is not right for your level or your goal, an advisor will say so before you pay.</p></div>
  </div>
  <div class="steps-photo"><img src="{{ url('uploads/2026/10/certified-python-developer-aa7rim.jpg') }}" alt="Learners practising hands-on with their instructor in a CompuBase training room" loading="lazy"></div>
</div></section>
<section class="closing"><div class="container">
  <div><h2>Come and see the centre.</h2><p>CompuBase Training Center, Abu Dhabi. Call 02 677 1117 or WhatsApp 056 689 3378.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('contact') }}">Contact us</a><a class="btn btn-outline" href="{{ route('courses') }}">Browse courses</a></div>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ route('about-ar') }}">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-outline" href="https://wa.me/971566893378">WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>

</div>
@endsection
