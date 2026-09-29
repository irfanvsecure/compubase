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
    <a class="logo" href="{{ route('home') }}"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
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
 <p class="lead">Confirmed intakes at the Abu Dhabi centre for all 12 courses. If a date does not suit you, tell us your preferred week and we will place you in the next group.</p></div>
</div></section>
<section class="section schedule"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">All 12 courses</div><h2>Next confirmed groups.</h2></div>
  <a class="btn btn-outline" href="{{ route('contact') }}">⤓ Get the calendar by email</a>
 </div>
 <div class="table-wrap">
  <table class="sched">
   <caption>Monday to Friday · Abu Dhabi centre</caption>
   <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
   <tbody>
<tr><td><b style="color:var(--navy)"><a href="{{ route('pmp') }}" style="color:var(--navy)">PMP — Project Management Professional</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cia') }}" style="color:var(--navy)">CIA — Certified Internal Auditor</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cma') }}" style="color:var(--navy)">CMA — Certified Management Accountant</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cisa') }}" style="color:var(--navy)">CISA — Information Systems Auditor</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ceh') }}" style="color:var(--navy)">EC-Council Certified Ethical Hacker</a></b></td><td>IT and cyber</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cyber') }}" style="color:var(--navy)">Cyber Security Essentials</a></b></td><td>IT and cyber</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ai') }}" style="color:var(--navy)">AI Essentials</a></b></td><td>IT and cyber</td><td>3 days · 18 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('prompt') }}" style="color:var(--navy)">Prompt Engineering</a></b></td><td>IT and cyber</td><td>2 days · 12 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('english') }}" style="color:var(--navy)">English Language</a></b></td><td>Languages</td><td>1 month · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ielts') }}" style="color:var(--navy)">IELTS Preparation</a></b></td><td>Languages</td><td>2 weeks · 20 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('arabic') }}" style="color:var(--navy)">Arabic for Non-Arabic Speakers</a></b></td><td>Languages</td><td>2 weeks · 20 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('office') }}" style="color:var(--navy)">MS Office + Copilot</a></b></td><td>Office skills</td><td>1 week · 30 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="{{ route('contact') }}">Register</a></td></tr>
   </tbody>
  </table>
 </div>
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
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="{{ route('pmp') }}">PMP</a></li><li><a href="{{ route('cia') }}">CIA</a></li><li><a href="{{ route('cma') }}">CMA</a></li><li><a href="{{ route('cisa') }}">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="{{ route('ceh') }}">Ethical Hacking</a></li><li><a href="{{ route('cyber') }}">Cyber Security Essentials</a></li><li><a href="{{ route('ai') }}">AI Essentials</a></li><li><a href="{{ route('prompt') }}">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="{{ route('english') }}">English Language</a></li><li><a href="{{ route('ielts') }}">IELTS Preparation</a></li><li><a href="{{ route('arabic') }}">Arabic for Non-Arabic Speakers</a></li><li><a href="{{ route('office') }}">MS Office + Copilot</a></li>
      </ul></div>
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
