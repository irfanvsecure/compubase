@extends('layouts.site')

@section('page', 'courses')
@section('title', 'All Courses — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-courses" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('courses-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
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
  <h1>Twelve courses. Three tracks. One campus.</h1><p class="lead">Certification, IT and cyber security, and language training — every course Monday to Friday in Abu Dhabi, with morning and evening groups.</p></div>
</div></section>
<section class="section featured"><div class="container">
  <div class="course-grid" style="grid-template-columns:repeat(3,1fr)">
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>PMP — Project Management Professional</h3></div>
    <div class="body"><p>Work through the PMP exam domains with practice questions and the 35 contact hours the application requires.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('pmp') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CIA — Certified Internal Auditor</h3></div>
    <div class="body"><p>Evening exam preparation covering the internal audit essentials, practice and knowledge domains of the CIA syllabus.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('cia') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CMA — Certified Management Accountant</h3></div>
    <div class="body"><p>Financial planning, analytics, and strategic financial management mapped to the two-part CMA examination.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('cma') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CISA — Information Systems Auditor</h3></div>
    <div class="body"><p>Audit, control and assurance of information systems, mapped to the current ISACA CISA job practice areas.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('cisa') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>EC-Council Certified Ethical Hacker</h3></div>
    <div class="body"><p>Probe systems the way an attacker would, in a supervised lab, and prepare for the EC-Council CEH examination.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('ceh') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>Cyber Security Essentials</h3></div>
    <div class="body"><p>A practical week that moves staff from awareness to capability — recognising, reporting and responding to threats.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('cyber') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>AI Essentials</h3></div>
    <div class="body"><p>Put AI tools to work on the tasks your role already involves — reporting, drafting, analysis. No coding required.</p>
      <div class="meta">
        <div><span>Duration</span><b>3 days · 18 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('ai') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>Prompt Engineering</h3></div>
    <div class="body"><p>Two focused days on getting consistently better output from AI tools — structure, context, iteration and evaluation.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 days · 12 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('prompt') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>English Language</h3></div>
    <div class="body"><p>A month of general English tuition across speaking, writing, listening and reading, in a small classroom group.</p>
      <div class="meta">
        <div><span>Duration</span><b>1 month · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('english') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>IELTS Preparation</h3></div>
    <div class="body"><p>Timed practice and exam technique across listening, reading, writing and speaking, with feedback on every mock.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('ielts') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>Arabic for Non-Arabic Speakers</h3></div>
    <div class="body"><p>Practical spoken and written Arabic for residents who want to work and live more confidently in the UAE.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('arabic') }}">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Office skills</span><h3>MS Office + Copilot</h3></div>
    <div class="body"><p>Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout the week.</p>
      <div class="meta">
        <div><span>Duration</span><b>1 week · 30 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ route('office') }}">Course details and fees →</a>
    </div>
  </div></div>
  <p class="foot">Not sure which fits? Call an advisor on <a href="tel:0506399915">050 6399915</a></p>
</div></section>
<section class="closing"><div class="container">
  <div><h2>Registration is now open.</h2><p>Morning and evening classes are available.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('contact') }}">Register now</a><a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a></div>
</div></section><footer class="site">
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
