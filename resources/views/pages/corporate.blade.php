@extends('layouts.site')

@section('page', 'corporate')
@section('title', 'Corporate Training — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-corporate" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('corporate-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
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
      <a class="lang-btn" href="{{ route('corporate-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">Corporate training</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Corporate and in-house training</div>
  <h1>Train the whole team. At your office, or ours.</h1><p class="lead">Any course on this site can be delivered privately to a single organisation, adapted to your systems, your policies and your sector.</p></div>
</div></section>
<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start" id="corpGrid">
  <div>
    <div class="eyebrow">How it works</div>
    <h2>Built around your operations.</h2>
    <ul class="corp-points" style="margin-top:24px">
      <li style="color:var(--text)"><b style="color:var(--navy)">Delivered at your premises across the UAE</b><span style="color:#6b7688">Or in a private group at the Abu Dhabi centre, whichever costs your team less time.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Content mapped to your roles</b><span style="color:#6b7688">Case material, exercises and examples rewritten around the work your people actually do.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Attendance records and completion certificates</b><span style="color:#6b7688">Documentation your HR and compliance teams can file without chasing us for it.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Group rates</b><span style="color:#6b7688">From [N] delegates — confirm the threshold with an advisor.</span></li>
    </ul>
    <div class="steps-grid" style="margin-top:40px;grid-template-columns:1fr">
      <div class="step"><div class="eyebrow">Step 01</div><h3>Tell us the team and the outcome</h3><p>Six fields on the form — or one WhatsApp message.</p></div>
      <div class="step"><div class="eyebrow">Step 02</div><h3>Receive a written proposal</h3><p>Dates, format, venue and a quote, usually within [X] working days.</p></div>
      <div class="step"><div class="eyebrow">Step 03</div><h3>Train on your schedule</h3><p>Sessions timed around shifts, operations and business hours.</p></div>
    </div>
  </div>
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>Request a training proposal</h3>
    <p class="sub">Six fields. An advisor replies with dates, format and a written quote.</p>
    <form onsubmit="event.preventDefault();alert('Demo only — connect this form to your enquiry handler before launch.')">
      <div class="field"><label>Full name</label><input placeholder="Your name" required></div>
      <div class="field"><label>Organisation</label><input placeholder="Company name" required></div>
      <div class="field"><label>Work email</label><input type="email" placeholder="name@company.ae" required></div>
      <div class="field"><label>Mobile</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>Course of interest</label><select><option>Select a course</option><option>PMP — Project Management Professional</option><option>CIA — Certified Internal Auditor</option><option>CMA — Certified Management Accountant</option><option>CISA — Information Systems Auditor</option><option>EC-Council Certified Ethical Hacker</option><option>Cyber Security Essentials</option><option>AI Essentials</option><option>Prompt Engineering</option><option>English Language</option><option>IELTS Preparation</option><option>Arabic for Non-Arabic Speakers</option><option>MS Office + Copilot</option></select></div>
      <div class="field"><label>Team size</label><select><option>Select a range</option><option>2–5</option><option>6–15</option><option>16–30</option><option>30+</option></select></div>
      <div class="field full"><label>What outcome are you aiming for? <span style="text-transform:none;font-weight:400">Optional</span></label><textarea placeholder="For example: twelve finance staff ready to sit the CMA exam before the end of the year."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">Request the proposal</button>
      <p class="privacy">We use these details to answer your enquiry only. See the <a href="#">privacy notice</a>.</p></div>
    </form>
  </div>
</div></section>
<style>@media(max-width:1024px){#corpGrid{grid-template-columns:1fr!important}}</style>
<section class="closing"><div class="container">
  <div><h2>Faster by phone.</h2><p>WhatsApp 050 6399915 with the course name and team size — we take it from there.</p></div>
  <div class="actions"><a class="btn btn-navy" href="https://wa.me/9710506399915">WhatsApp us</a></div>
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
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">[info@compubase.ae]</a><br>Sunday to Thursday · [opening hours]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ route('corporate-ar') }}">AR</a></span>
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
