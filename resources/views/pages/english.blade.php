@extends('layouts.site')

@section('page', 'english')
@section('title', 'English Language — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-english" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('english-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
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
      <a class="lang-btn" href="{{ route('english-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('courses') }}">Courses</a><span>/</span><a href="{{ route('courses') }}">Languages and office skills</a><span>/</span><b style="color:var(--navy)">English Language</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Languages</span>
      <h1>English Language</h1>
      
      <p class="lead">A month of general English tuition — speaking, writing, listening and reading — in a small classroom group, morning or evening.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>1 month · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#" data-scroll="covers" class="active">Overview</a>
        <a href="#" data-scroll="attend-side">Who should attend</a>
        <a href="#" data-scroll="daybyday">Day by day</a>
        <a href="#" data-scroll="trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Forty classroom hours over a month, building practical workplace English: everyday conversation, professional email and writing, listening comprehension and reading — with the group placed by level on day one.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Hold workplace conversations with confidence</li>
          <li>Write clear professional emails and messages</li>
          <li>Follow meetings, calls and spoken instructions</li>
          <li>Read and summarise work documents accurately</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Placement, speaking foundations and everyday vocabulary</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Workplace writing — email, messages and reports</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Listening and meetings practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Reading, review and consolidation</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Professionals building workplace English</li>
            <li>Residents preparing for study or a new role</li>
            <li>Teams whose working language is moving to English</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took English Language also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>IELTS Preparation</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="{{ route('ielts') }}">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>Arabic for Non-Arabic Speakers</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="{{ route('arabic') }}">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="{{ route('office') }}">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ route('english-ar') }}">AR</a></span>
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
