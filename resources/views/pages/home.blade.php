@extends('layouts.site')

@section('page', 'home')
@section('title', 'Training Courses in the UAE | CompuBase Abu Dhabi')
@section('description', 'ACTVET-licensed Abu Dhabi institute with '.count(\App\Support\Catalog::courses()).' courses in leadership, IT, finance, safety, and project management across the UAE. Enroll today.')

@section('content')
<div class="page active" id="pg-home" lang="en">

<!-- 01 UTILITY BAR -->
<div class="utility">
  <div class="container">
    <div class="left">
      <span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span>
    </div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('home-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>

<!-- 02 HEADER -->
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
      <a class="lang-btn" href="{{ route('home-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<!-- ================= HOMEPAGE ================= -->
@use('App\Support\Catalog')
@php
    $courseCount = count(Catalog::courses());
    $catCount = count(Catalog::categories());
    $course = fn (string $slug) => url('course/'.$slug);
    $cat = fn (string $slug) => Catalog::categoryUrl($slug);
    $faqs = [
        ['Is CompuBase Training Centre licensed?', 'Yes. CompuBase Training Centre is licensed by ACTVET in Abu Dhabi under licence No. 725.'],
        ['How many courses does CompuBase offer?', "CompuBase offers {$courseCount} courses in {$catCount} categories, split between management and IT."],
        ['How long are CompuBase courses?', 'Most CompuBase courses run for three to five days. Each course page shows the exact number of days.'],
        ['Can I take a CompuBase course in Arabic?', 'Yes. CompuBase runs its courses in both Arabic and English, so you can choose the language you prefer when you enquire.'],
        ['Does CompuBase train company teams outside Abu Dhabi?', 'Yes. CompuBase trainers can deliver in-house sessions at client offices in Dubai and the other emirates.'],
        ['How do I book a course at CompuBase?', 'Call or WhatsApp CompuBase on +971 56 689 3378, or send the enquiry form on any course page. The team will confirm the next available date.'],
    ];
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $faqs),
    ];
    $arrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
@endphp
<link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ filemtime(base_path('css/home.css')) }}">
<div class="nx-progress" aria-hidden="true"><span></span></div>
<div id="page-home" class="nx">

<!-- HERO -->
<section class="nx-hero">
  <div class="nx-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="nx-grid-bg" aria-hidden="true"></div>
  <div class="container nx-hero-in">
    <div class="nx-hero-copy">
      <span class="nx-pill"><span class="nx-live-dot"></span>ACTVET licensed · Licence No. 725</span>
      <h1>Professional Training Courses in Abu Dhabi and <span class="nx-grad">Across the UAE</span></h1>
      <p class="nx-lead">CompuBase Training is an Abu Dhabi training institute licensed by ACTVET under licence No. 725. We offer {{ $courseCount }} courses in management and IT.</p>
      <div class="nx-cta">
        <a class="nx-btn nx-btn-gold" href="{{ route('courses') }}">Browse all {{ $courseCount }} courses {!! $arrow !!}</a>
        <a class="nx-btn nx-btn-glass" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp 056 689 3378</a>
      </div>
      <dl class="nx-hero-stats">
        <div><dt data-count="{{ $courseCount }}">{{ $courseCount }}</dt><dd>courses</dd></div>
        <div><dt data-count="{{ $catCount }}">{{ $catCount }}</dt><dd>categories</dd></div>
        <div><dt>EN·AR</dt><dd>languages</dd></div>
      </dl>
    </div>
    <div class="nx-collage" data-parallax>
      <figure class="nx-shot nx-shot-a"><img src="{{ url('uploads/2026/10/abu-dhabi-classroom-training-session-j5htjt.jpg') }}" alt="Trainer leading a classroom session at CompuBase Abu Dhabi"></figure>
      <figure class="nx-shot nx-shot-b"><img src="{{ url('uploads/2026/10/uae-cyber-security-ai-workshop-lab-ywxc18.jpg') }}" alt="Trainees in a hands-on cyber security and AI lab"></figure>
      <figure class="nx-shot nx-shot-c"><img src="{{ url('uploads/2026/10/abu-dhabi-evening-class-working-professionals-0jvbyg.jpg') }}" alt="Working professionals in an evening class in Abu Dhabi"></figure>
      <div class="nx-float nx-float-1"><span class="nx-float-ico">☀</span><div><b>Morning or evening</b><small>Pick the group that fits work</small></div></div>
      <div class="nx-float nx-float-2"><span class="nx-float-ico">✓</span><div><b>ACTVET No. 725</b><small>Licensed in Abu Dhabi</small></div></div>
    </div>
  </div>
</section>

<!-- COURSE FINDER -->
<div class="container nx-finder">
  @include('partials.course-finder')
</div>

<!-- ACCREDITATION -->
@include('partials.accreditation')

<!-- WHO COMES TO US -->
<section class="nx-sec nx-people">
  <div class="container nx-people-in">
    <div class="nx-people-head" data-reveal>
      <span class="nx-kicker">Who comes to us</span>
      <h2 class="nx-h2">People come to us for <em>all sorts of reasons.</em></h2>
      <p>We teach in English or Arabic, and you can pick a morning or evening group so work doesn’t suffer.</p>
      <div class="nx-toggles" aria-hidden="true">
        <span class="nx-toggle"><b class="on">EN</b><b>AR</b></span>
        <span class="nx-toggle"><b class="on">AM</b><b>PM</b></span>
      </div>
    </div>
    <div class="nx-chat">
      <div class="nx-bubble" data-reveal><span class="nx-avatar">S</span><p>A new supervisor wants to stop feeling lost in meetings.</p></div>
      <div class="nx-bubble nx-bubble-r" data-reveal><span class="nx-avatar">A</span><p>An accountant needs to brush up before an audit.</p></div>
      <div class="nx-bubble" data-reveal><span class="nx-avatar">HR</span><p>Sometimes an HR manager needs a whole team trained, and fast.</p></div>
    </div>
  </div>
</section>

<!-- PROGRAMMES: sticky visual + scrolling chapters -->
<section class="nx-sec nx-story" id="programmes">
  <div class="container">
    <nav class="nx-story-nav" aria-label="Programme areas">
      <a href="#ch-management" class="on" data-i="0"><span>01</span>Management &amp; leadership</a>
      <a href="#ch-it" data-i="1"><span>02</span>IT, data &amp; security</a>
      <a href="#ch-finance" data-i="2"><span>03</span>Finance, projects &amp; safety</a>
    </nav>
    <div class="nx-story-grid">
      <div class="nx-stage" aria-hidden="true">
        <div class="nx-stage-card on" data-i="0">
          <img src="{{ url('uploads/2026/10/managing-self-leading-others-objectives-dk5drg.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>Management courses for</small><div class="nx-chips"><span>HR</span><span>Sales</span><span>Procurement</span><span>Quality</span></div></div>
        </div>
        <div class="nx-stage-card" data-i="1">
          <img src="{{ url('uploads/2026/10/artificial-intelligence-using-python-fgrzgk.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>Tracks</small><div class="nx-chips"><span>Cloud</span><span>Data</span><span>AI</span><span>Cyber</span></div></div>
        </div>
        <div class="nx-stage-card" data-i="2">
          <img src="{{ url('uploads/2026/10/agile-project-manager-sprint-planning-oy5dbc.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>Programmes</small><div class="nx-chips"><span>Finance</span><span>Projects</span><span>Safety</span></div></div>
        </div>
        <div class="nx-stage-count"><b>01</b>/03</div>
      </div>

      <div class="nx-chapters">
        <article class="nx-chapter" id="ch-management" data-i="0">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/managing-self-leading-others-objectives-dk5drg.jpg') }}" alt="Managing Self and Leading Others course at CompuBase" loading="lazy">
          <span class="nx-kicker">01 — Management &amp; leadership</span>
          <h2 class="nx-h2">Enrol in Management and Leadership Training</h2>
          <figure class="nx-quote">
            <figcaption>Here’s something we hear a lot.</figcaption>
            <blockquote>“I got promoted, and nobody told me how to manage people.”</blockquote>
          </figure>
          <p>That’s normal. It’s also exactly why our <a href="{{ $cat('leadership-and-management') }}">leadership courses in the UAE</a> exist. Programmes such as <a href="{{ $course('managing-self-and-leading-others') }}">Managing Self and Leading Others</a> deal with the awkward parts of the job, like giving honest feedback or settling a dispute between two colleagues.</p>
          <p>A business management course in the UAE gives you the bigger picture, showing how goals, plans and decisions connect across a company. We also run management courses in the UAE for HR, sales, procurement and quality staff, since a buyer and a recruiter don’t face the same problems. Have a look through our <a href="{{ $cat('leadership-and-management') }}">leadership and management programmes</a> to see what’s on offer.</p>
          <div class="nx-linkrow">
            <a href="{{ $cat('human-resources-management') }}">HR</a><a href="{{ $cat('sales-and-marketing') }}">Sales</a><a href="{{ $cat('procurement-and-supply-chain-management') }}">Procurement</a><a href="{{ $cat('quality-management') }}">Quality</a>
          </div>
          <a class="nx-btn nx-btn-dark" href="{{ $cat('leadership-and-management') }}">Explore leadership programmes {!! $arrow !!}</a>
        </article>

        <article class="nx-chapter" id="ch-it" data-i="1">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/artificial-intelligence-using-python-fgrzgk.jpg') }}" alt="Artificial Intelligence using Python course at CompuBase" loading="lazy">
          <span class="nx-kicker">02 — IT, data &amp; security</span>
          <h2 class="nx-h2">Book Your Seat on IT, Data and Security Courses</h2>
          <p>Our <a href="{{ route('categories') }}">IT courses in the UAE</a> span cloud computing, programming, IT service management and more. <a href="{{ $course('aws-certified-cloud-practitioner') }}">AWS Certified Cloud Practitioner</a> is one popular starting point.</p>
          <p>Data is where a lot of people want to grow right now. If reports and dashboards are part of your day, a data analyst course in the UAE builds that foundation. A data science course in the UAE goes further, with options like <a href="{{ $course('artificial-intelligence-using-python') }}">Artificial Intelligence using Python</a> and <a href="{{ $course('apache-pyspark-using-databricks') }}">Apache PySpark using Databricks</a>. You’ll find them all in our <a href="{{ $cat('ai-and-data-science') }}">AI and data science category</a>.</p>
          <p>Our security courses in the UAE come in two tracks.</p>
          <div class="nx-tracks">
            <a class="nx-track nx-spot" href="{{ $cat('cyber-security') }}">
              <span class="nx-ico"><svg viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg></span>
              <b>Cyber security</b>
              <span>Certification courses such as Certified Ethical Hacker (CEH) and CISM.</span>
            </a>
            <a class="nx-track nx-spot" href="{{ $cat('physical-security-management') }}">
              <span class="nx-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V8l7-5 7 5v13"/><path d="M10 21v-6h4v6"/></svg></span>
              <b>Physical security management</b>
              <span>For the people looking after buildings and sites.</span>
            </a>
          </div>
          <div class="nx-linkrow">
            <a href="{{ $course('certified-ethical-hacker-ceh-ec-council') }}">Certified Ethical Hacker (CEH)</a><a href="{{ $course('certified-information-security-manager-cism-isaca') }}">CISM</a><a href="{{ $cat('cloud-computing') }}">Cloud computing</a>
          </div>
        </article>

        <article class="nx-chapter" id="ch-finance" data-i="2">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/agile-project-manager-sprint-planning-oy5dbc.jpg') }}" alt="Agile project management training at CompuBase" loading="lazy">
          <span class="nx-kicker">03 — Finance, projects &amp; safety</span>
          <h2 class="nx-h2">Register for Finance, Project and Safety Programmes</h2>
          <div class="nx-stack">
            <div class="nx-stack-item">
              <h3>Finance isn’t only for accountants.</h3>
              <p>Our <a href="{{ $cat('accounting-and-finance') }}">finance courses in the UAE</a> include <a href="{{ $course('accounting-for-non-accountants') }}">Accounting for Non-Accountants</a>, which many managers take so they can read a budget without guessing.</p>
            </div>
            <div class="nx-stack-item">
              <h3>Projects rarely go wrong in one big moment.</h3>
              <p>They slip a little every week. Our <a href="{{ $cat('project-management') }}">project management courses in the UAE</a>, including <a href="{{ $course('agile-project-management') }}">Agile Project Management</a>, teach you how to set scope, build a realistic schedule and spot trouble early.</p>
            </div>
            <div class="nx-stack-item">
              <h3>Safety is different.</h3>
              <p>Get it wrong, and someone gets hurt. Our safety courses in the UAE, part of our <a href="{{ $cat('health-safety-and-environment') }}">health, safety and environment programmes</a>, include <a href="{{ $course('behavior-based-safety') }}">Behavior-Based Safety</a> and <a href="{{ $course('emergency-response-planning-crisis-management-for-hazardous-environments') }}">Emergency Response Planning</a> for supervisors and site teams.</p>
            </div>
          </div>
          <p class="nx-aside">If you’ve been searching for event management courses in the UAE, take a look at our <a href="{{ $cat('public-relations-and-media-training') }}">public relations and media training</a>. It covers the planning and messaging side of launches and public events.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="section nx-cats" id="courses">
  <div class="container">
    <div class="nx-head-row" data-reveal>
      <div><span class="nx-kicker">Course categories</span><h2 class="nx-h2">{{ $courseCount }} courses in {{ $catCount }} categories.</h2></div>
      <a class="nx-btn nx-btn-dark" href="{{ route('categories') }}">View all {{ $catCount }} categories {!! $arrow !!}</a>
    </div>
    <div class="cat-grid">
      @foreach (array_slice(Catalog::categories(), 0, 3, true) as $catSlug => $category)
      @php
          $catCourses = array_values($category['courses']);
          $photo = null;
          foreach ($catCourses as $c) {
              if ($photo = Catalog::photo($c)) {
                  break;
              }
          }
          $catMark = mb_strtoupper(mb_substr($category['en'], 0, 1));
      @endphp
      <a class="cat" href="{{ Catalog::categoryUrl($catSlug) }}" data-reveal>
        <div class="cat-photo">
          @if ($photo)<img src="{{ $photo }}" alt="" loading="lazy">@else<div class="cp-mark">{{ $catMark }}</div>@endif
          <span class="cat-photo-num">{{ sprintf('%02d', $loop->iteration) }}</span>
          <span class="cat-photo-count">{{ count($catCourses) }} courses</span>
        </div>
        <div class="cat-body">
          <h3>{{ $category['en'] }}</h3>
          <p>{{ count($catCourses) }} courses of {{ min(array_column($catCourses, 'days')) }} to {{ max(array_column($catCourses, 'days')) }} days, Monday to Friday at the Abu Dhabi centre.</p>
          <table>
            @foreach (array_slice($catCourses, 0, 4) as $c)
            <tr><td>{{ $c['en'] }}</td><td>{{ Catalog::duration($c['days']) }}</td></tr>
            @endforeach
          </table>
          <span class="link">View all {{ count($catCourses) }} courses →</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- FEATURED COURSES -->
<section class="section featured nx-featured" id="featured">
  <div class="container">
    <span class="nx-kicker">Featured this intake</span>
    <h2 class="nx-h2">The courses Abu Dhabi employers are booking now.</h2>
    <div class="feat-filter">
      <div class="feat-groups" id="featGroups">
        <button type="button" class="active" data-g="all">All courses <span></span></button>
        <button type="button" data-g="management">Management &amp; Professional <span></span></button>
        <button type="button" data-g="it">IT &amp; Technology <span></span></button>
      </div>
      <div class="feat-rail" id="featRail" hidden>
        <button type="button" class="rail-arrow prev" aria-label="Scroll categories back"><svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M15 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        <div class="feat-cats" id="filterTabs">
          @foreach (Catalog::categories() as $catSlug => $category)
          <button type="button" data-f="{{ $catSlug }}" data-g="{{ $category['group'] }}" data-name="{{ $category['en'] }}">{{ $category['en'] }} <span>{{ count($category['courses']) }}</span></button>
          @endforeach
        </div>
        <button type="button" class="rail-arrow next" aria-label="Scroll categories forward"><svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M9 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      </div>
    </div>
    <div class="course-grid" id="courseGrid"></div>
    <div class="feat-more" id="featMore"><a class="btn btn-outline" href="{{ route('courses') }}">View all courses &rarr;</a></div>
  </div>
</section>

<!-- SHORT COURSES AND FLEXIBLE LEARNING (bento) -->
<section class="nx-sec nx-flex" id="flexible">
  <div class="container">
    <div class="nx-center-head" data-reveal>
      <span class="nx-kicker">Short courses &amp; flexible learning</span>
      <h2 class="nx-h2">Sign Up for Short Courses and Flexible Learning</h2>
    </div>
    <div class="nx-bento">
      <div class="nx-tile nx-tile-days nx-spot" data-reveal>
        <div class="nx-week" aria-hidden="true"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span></div>
        <div class="nx-bignum">3–5 <small>days</small></div>
        <p>Most people can’t take weeks off work. Our short courses in the UAE usually run for three to five days, so you learn one skill and get back to your desk. The <a href="{{ route('courses') }}">full course catalogue</a> lists every outline and its length, so you can compare before deciding.</p>
      </div>
      <div class="nx-tile nx-tile-live nx-spot" data-reveal>
        <div class="nx-call" aria-hidden="true"><i></i><i></i><i></i><i></i><span class="nx-rec"><span class="nx-live-dot"></span>Live</span></div>
        <h3>Live virtual class</h3>
        <p>We also get calls about online courses in the UAE. If your team sits in different offices, ask whether your course can run as a live virtual class. Technical subjects such as <a href="{{ $cat('ai-and-data-science') }}">AI</a>, <a href="{{ $cat('cloud-computing') }}">cloud</a> and <a href="{{ $cat('coding-and-programming') }}">programming</a> are often the best online courses in the UAE for this format, because the work already happens on a screen.</p>
      </div>
      <div class="nx-tile nx-tile-cal" id="calendar" data-reveal>
        <span class="nx-kicker">Course calendar</span>
        <h3>Get every start date as a PDF</h3>
        <p>Every course, with durations and timings, on one page — useful when you need approval from a manager.</p>
        <div class="side-box calendar">@include('partials.enquiry-form', ['type' => 'calendar'])</div>
      </div>
    </div>
  </div>
</section>

<!-- INTAKE SCHEDULE -->
<section class="section schedule nx-schedule" id="schedule">
  <div class="container">
    <div class="sched-head">
      <div>
        <span class="nx-kicker">Upcoming intakes</span>
        <h2 class="nx-h2">Every start date, in one table.</h2>
      </div>
      <a class="btn btn-outline" href="{{ route('home', ['go' => 'calendar']) }}" data-scroll="calendar">⤓ Download the course calendar</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>Next confirmed groups</caption>
        <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
        <tbody id="schedBody"></tbody>
      </table>
    </div>
    <p class="sched-note">Showing {{ min(8, $courseCount) }} of {{ $courseCount }} courses. <a href="{{ route('schedule') }}" style="font-weight:700;text-decoration:underline">See the full schedule</a></p>
  </div>
</section>

<!-- CORPORATE -->
<section class="nx-sec nx-corp" id="corporate">
  <div class="nx-aurora nx-aurora-soft" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="container nx-corp-in">
    <div class="nx-corp-copy" data-reveal>
      <span class="nx-kicker nx-kicker-light">Corporate and in-house training</span>
      <h2 class="nx-h2">Request a Quote for In-House Corporate Training</h2>
      <p>Lots of corporate training companies in the UAE will sell you a ready-made package. We’d rather hear what’s actually going wrong in your team first. Then we build the course around that. Our trainers can come to your office in Abu Dhabi, Dubai or any other emirate.</p>
      <ol class="nx-timeline">
        <li data-reveal><span>1</span><div><b>Brief</b><p>Fill in a short brief on our <a href="{{ route('corporate') }}">corporate training page</a>.</p></div></li>
        <li data-reveal><span>2</span><div><b>Proposal</b><p>We’ll send back a proposal showing content, duration and cost.</p></div></li>
        <li data-reveal><span>3</span><div><b>Compare</b><p>That makes it easy to compare us with other top training companies in the UAE.</p></div></li>
      </ol>
    </div>
    <div class="nx-form-card proposal" data-reveal>
      <h3>Request a training proposal</h3>
      <p class="sub">Tell us about your team. We reply with content, duration and cost.</p>
      @include('partials.enquiry-form', ['type' => 'proposal'])
    </div>
  </div>
</section>

<!-- WHY COMPUBASE (bento) -->
<section class="nx-sec nx-why">
  <div class="container">
    <div class="nx-center-head" data-reveal>
      <span class="nx-kicker">Why CompuBase</span>
      <h2 class="nx-h2">Why Learners Choose CompuBase</h2>
      <p>You’ve got plenty of training institutes in the UAE to choose from. A few reasons people pick us:</p>
    </div>
    <div class="nx-bento nx-bento-why">
      <div class="nx-tile nx-tile-hero nx-spot" data-reveal>
        <div class="nx-bignum"><span data-count="{{ $courseCount }}">{{ $courseCount }}</span></div>
        <p>{{ $courseCount }} courses, from leadership and finance to cyber security and AI</p>
        <div class="nx-orbit" aria-hidden="true"><span>Leadership</span><span>Finance</span><span>Cyber</span><span>AI</span></div>
      </div>
      <div class="nx-tile nx-spot" data-reveal>
        <div class="nx-doc" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
        <p>A clear outline for every course, so you know what you’re paying for</p>
      </div>
      <div class="nx-tile nx-spot" data-reveal>
        <div class="nx-switch" aria-hidden="true"><span>Open class</span><span>Private</span></div>
        <p>Open classes for individuals, or private sessions for one company</p>
      </div>
      <div class="nx-tile nx-tile-wide nx-spot" data-reveal>
        <div class="nx-places" aria-hidden="true"><span>Abu Dhabi</span><span>Dubai</span><span>Sharjah</span><span>Ajman</span><span>Umm Al Quwain</span><span>Ras Al Khaimah</span><span>Fujairah</span></div>
        <p>Trainers who’ll travel to your site when that’s easier</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="nx-sec nx-faq">
  <div class="container nx-faq-in">
    <div class="nx-faq-side" data-reveal>
      <span class="nx-kicker">Common questions</span>
      <h2 class="nx-h2">Frequently Asked Questions</h2>
      <div class="nx-faq-card">
        <b>Still have a question?</b>
        <p>Call 02 677 1117 or message us on WhatsApp.</p>
        <a class="nx-btn nx-btn-gold" href="https://wa.me/971566893378">@include('partials.wa-icon')Ask on WhatsApp</a>
      </div>
    </div>
    <div class="nx-acc">
      @foreach ($faqs as [$q, $a])
      <details class="nx-acc-item" data-reveal @if ($loop->first) open @endif>
        <summary><span class="nx-acc-n">{{ sprintf('%02d', $loop->iteration) }}</span>{{ $q }}<i aria-hidden="true"></i></summary>
        <div class="nx-acc-body"><p>{{ $a }}</p></div>
      </details>
      @endforeach
    </div>
  </div>
  <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
</section>

<!-- CONTACT -->
<section class="nx-sec nx-end" id="contact">
  <div class="container">
    <div class="nx-end-card" data-reveal>
      <div class="nx-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
      <div class="nx-end-copy">
        <h2 class="nx-h2">Contact Us to Book Your Training</h2>
        <p>Got a question, or ready to book? Send us a message through the <a href="{{ route('contact') }}">contact page</a>. Tell us which course you’re after, how many people are coming, and when suits you. We’ll reply with the next available class.</p>
      </div>
      <div class="nx-end-actions">
        <a class="nx-btn nx-btn-gold" href="{{ route('contact') }}">Send us a message {!! $arrow !!}</a>
        <a class="nx-btn nx-btn-glass" href="tel:+97126771117">Call 02 677 1117</a>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('js/home.js') }}?v={{ filemtime(base_path('js/home.js')) }}" defer></script>
</div><!-- /page-home -->

<!-- 18 FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, IT, cyber security and AI. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      @include('partials.footer-courses')
      <div><h4>Contact</h4>
        <p><b style="color:#fff">CompuBase Training Center</b><br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>Sunday to Thursday</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="{{ route('privacy') }}">Privacy notice</a><a href="{{ route('terms') }}">Terms and refunds</a><a href="{{ url('sitemap.xml') }}">Sitemap</a><a href="{{ route('home-ar') }}">AR</a></span>
    </div>
  </div>
</footer>

<!-- Mobile fixed contact bar -->
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>


</div>
@endsection
