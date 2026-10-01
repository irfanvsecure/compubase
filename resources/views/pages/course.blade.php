@extends('layouts.site')

@use('App\Support\Catalog')
@php
    $title = Catalog::title($course);
    $duration = Catalog::duration($course['days']);
    $content = Catalog::content($course);
    $photo = Catalog::photo($course);
@endphp

@section('page', 'course')
@section('title', $title.' — CompuBase Training Center, Abu Dhabi')
@section('description', $title.', a '.$duration.' course in '.$course['catEn'].' at CompuBase Training Center, Abu Dhabi.')

@section('content')
<div class="page active" id="pg-course" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
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
        <li><a href="{{ route('courses') }}">Courses</a></li>
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="{{ route('home', ['go' => 'accreditation']) }}">Accreditation</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ Catalog::url($course, true) }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><a href="{{ route('courses') }}">Courses</a><span>/</span><a href="{{ route('courses', ['go' => $course['cat']]) }}">{{ $course['catEn'] }}</a><span>/</span><b style="color:var(--navy)">{{ $title }}</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:12px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">{{ $course['catEn'] }}</span>
      <h1>{{ $title }}</h1>
      <p class="lead">{{ $content ? preg_split('/(?<=\.)\s/', $content['overview'][0], 2)[0] : '[Course summary from the CompuBase course outline.]' }}</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>{{ $duration }}</b></div>
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
        <div><dt>Duration</dt><dd>{{ $duration }}</dd></div>
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
      <div class="tabs" role="tablist">
        <a href="#overview" data-tab="overview" class="active" role="tab">Overview</a>
        @if ($content)<a href="#objectives" data-tab="objectives" role="tab">Objectives</a>@endif
        <a href="#outline" data-tab="outline" role="tab">Course outline</a>
        <a href="#" data-scroll="attend-side">Who should attend</a>
      </div>

      <div class="tab-panel active" id="overview" role="tabpanel">
        @if ($photo)<img class="course-photo" src="{{ $photo }}" alt="{{ $title }}">@endif
        @if ($content)
        <h2>Course overview</h2>
        @foreach ($content['overview'] as $para)<p>{{ $para }}</p>@endforeach
        @if ($content['methodology'])
        <h2>Training methodology</h2>
        @foreach ($content['methodology'] as $para)<p>{{ $para }}</p>@endforeach
        @endif
        @foreach ($content['extra'] ?? [] as $section)
        <h2>{{ ucfirst(strtolower($section['title'])) }}</h2>
        @php
            // Paragraphs and list items in document order: 'p' = next paragraph, 'i' = next list item.
            $blocks = [];
            $paras = $section['paras'];
            $items = $section['items'];
            foreach (str_split($section['order']) as $kind) {
                if ($kind === 'p') {
                    $blocks[] = ['p', array_shift($paras)];
                } elseif ($blocks && end($blocks)[0] === 'ul') {
                    $blocks[array_key_last($blocks)][1][] = array_shift($items);
                } else {
                    $blocks[] = ['ul', [array_shift($items)]];
                }
            }
        @endphp
        @foreach ($blocks as [$kind, $value])
          @if ($kind === 'p')<p>{{ $value }}</p>@else<ul class="outcomes">@foreach ($value as $item)<li>{{ $item }}</li>@endforeach</ul>@endif
        @endforeach
        @endforeach
        @else
        <h2>What this course covers</h2>
        <div class="placeholder-note">[Course description from the CompuBase course outline.]</div>
        @endif
      </div>

      @if ($content)
      <div class="tab-panel" id="objectives" role="tabpanel">
        @if ($content['competencies'])
        <h2>Target competencies</h2>
        <ul class="outcomes">
          @foreach ($content['competencies'] as $item)<li>{{ $item }}</li>@endforeach
        </ul>
        @endif
        <h2>Course objectives</h2>
        @foreach ($content['objectivesIntro'] as $para)<p>{{ $para }}</p>@endforeach
        <ul class="outcomes">
          @foreach ($content['objectives'] as $item)<li>{{ $item }}</li>@endforeach
        </ul>
      </div>
      @endif

      <div class="tab-panel" id="outline" role="tabpanel">
        <h2>Course outline</h2>
        @if ($content)
        @foreach ($content['outline'] as $module)
          <div class="day"><div class="d">Module {{ $loop->iteration }}</div><div><b>{{ $module['title'] }}</b>
            <ul class="module-items">
            @foreach ($module['items'] as $item)
              @if ($item['level'] === 0)
                @if (! $loop->first)</li>@endif
                <li>{{ $item['text'] }}
              @else
                @if ($loop->first || $module['items'][$loop->index - 1]['level'] === 0)<ul>@endif
                <li>{{ $item['text'] }}</li>
                @if ($loop->last || $module['items'][$loop->index + 1]['level'] === 0)</ul>@endif
              @endif
              @if ($loop->last)</li>@endif
            @endforeach
            </ul>
          </div></div>
        @endforeach
        @else
        @for ($day = 1; $day <= $course['days']; $day++)
          <div class="day"><div class="d">Day {{ $day }}</div><div><b>[Day {{ $day }} topic]</b><p>[Session detail from the course outline.]</p></div></div>
        @endfor
        @endif
      </div>

    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        @if ($content)
          @foreach ($content['audience'] as $para)<p style="font-size:16px">{{ $para }}</p>@endforeach
        @else
        <div class="placeholder-note" style="margin-top:0">[Target audience from the CompuBase course outline.]</div>
        @endif
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took {{ $title }} also considered</h2>
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
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, and more. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ Catalog::url($course, true) }}">AR</a></span>
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
