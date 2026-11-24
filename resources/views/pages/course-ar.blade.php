@extends('layouts.site')

@use('App\Support\Catalog')
@php
    $title = Catalog::title($course, true);
    $duration = Catalog::duration($course['days'], true);
    $content = Catalog::content($course, true);
    $photo = Catalog::photo($course);
    $summary = Catalog::summary($course, true);
    $hasObjectives = $content && ($content['competencies'] || $content['objectives'] || $content['objectivesIntro']);
    $hasAudience = $content && $content['audience'];
    // An outline-only document has nothing for the Overview tab, so the page opens on the outline.
    $tabPhotos = config('course_tab_photos.'.$course['slug'], []);
    $tabPhoto = fn ($k) => ! empty($tabPhotos[$k]) && is_file(base_path($tabPhotos[$k])) ? asset($tabPhotos[$k]) : null;
    $hasOverview = ! $content || $photo || $content['overview'] || $content['methodology'] || ! empty($content['extra']);
@endphp

@section('page', 'course-ar')
@section('title', $title.' — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', $title.'، دورة مدتها '.$duration.' ضمن '.$course['catAr'].' في مركز كمبيوبيس للتدريب، أبوظبي.')
@section('og_image', $photo ?? '')

@section('content')
<div class="page active" id="pg-course-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ Catalog::url($course) }}" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home-ar') }}"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home-ar') }}">الرئيسية</a></li>
        @include('partials.nav-courses', ['ar' => true])
        <li><a href="{{ route('corporate-ar') }}">التدريب المؤسسي</a></li>
        <li><a href="{{ route('partners-ar') }}">شركاؤنا</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('contact-ar') }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ Catalog::url($course) }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar', ['course' => $course['slug']]) }}#contact-form">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


@include('partials.course-main', ['ar' => true])

<section class="related">
  <div class="container">
    <div class="h2">من درسوا هذه الدورة اطّلعوا أيضاً على</div>
    <div class="rel-grid">
    @foreach (Catalog::related($course) as $other)
    <div class="rel-card"><div class="eyebrow">{{ $other['catAr'] }}</div><h3>{{ $other['ar'] }}</h3><p>{{ Catalog::duration($other['days'], true) }} · صباحي أو مسائي</p><a href="{{ Catalog::url($other, true) }}">تفاصيل الدورة ←</a></div>
    @endforeach
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><div class="h2">التسجيل مفتوح الآن.</div><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a><a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:15px">تدريب صفّي في تطوير الذات، والقيادة والإدارة، والموارد البشرية، والمالية، وإدارة المشاريع والجودة، والصحة والسلامة، وتقنية المعلومات، والأمن السيبراني، والذكاء الاصطناعي. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      @include('partials.footer-courses', ['ar' => true])
      <div><div class="h4">اتصل بنا</div>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>الاثنين – الجمعة</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="{{ route('privacy-ar') }}">سياسة الخصوصية</a><a href="{{ route('terms-ar') }}">الشروط والاسترداد</a><a href="{{ url('sitemap.xml') }}">خريطة الموقع</a><a href="{{ Catalog::url($course) }}">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')واتساب</a>
  <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل</a>
</div>

@include('partials.course-print', ['ar' => true])

</div>
@endsection
