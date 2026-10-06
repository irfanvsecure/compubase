@extends('layouts.site')

@section('page', 'contact')
@section('title', 'Contact Us — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-contact" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('contact-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
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
      <a class="lang-btn" href="{{ route('contact-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">Contact</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Contact and registration</div>
  <h1>Talk to an advisor today.</h1><p class="lead">Call, WhatsApp or send the form — an advisor replies with available dates, timings and fees for the course you are interested in.</p></div>
</div></section>
<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 380px;gap:56px;align-items:start" id="contactGrid">
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>Registration and enquiry form</h3>
    <p class="sub">Tell us the course and your preferred timing — we reply with the next start date and the fee.</p>
    @include('partials.enquiry-form', ['type' => 'contact'])
  </div>
  <aside>
    <div class="side-box">
      <h4>Reach us directly</h4>
      <p><b style="color:var(--navy)">Phone</b><br><a href="tel:+97126771117" style="color:var(--gold-ink);font-weight:700">02 677 1117</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">WhatsApp</b><br><a href="https://wa.me/971566893378" style="color:var(--gold-ink);font-weight:700">056 689 3378</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Email</b><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Address</b><br>[Full street address]<br>Abu Dhabi, United Arab Emirates</p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Office hours</b><br>Sunday to Thursday · [opening hours]</p>
      <a class="btn btn-wa" style="width:100%;margin-top:16px" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp us now</a>
    </div>
    <div class="side-box">
      <h4>Location map</h4>
      <div class="trainer-photo" style="min-height:220px">📍 &nbsp;Google Maps embed goes here once the street address is confirmed.</div>
    </div>
  </aside>
</div></section>
<style>@media(max-width:1024px){#contactGrid{grid-template-columns:1fr!important}}</style>
<section class="closing"><div class="container">
  <div><h2>Prefer to just call?</h2><p>An advisor answers Sunday to Thursday during office hours.</p></div>
  <div class="actions"><a class="btn btn-navy" href="tel:+97126771117">Call 02 677 1117</a></div>
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
      <span><a href="{{ route('privacy') }}">Privacy notice</a><a href="{{ route('terms') }}">Terms and refunds</a><a href="{{ url('sitemap.xml') }}">Sitemap</a><a href="{{ route('contact-ar') }}">AR</a></span>
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
