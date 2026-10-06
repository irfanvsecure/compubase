@extends('layouts.site')

@use('App\Support\Catalog')
@php
    // One course category: $slug, $ar.
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $categories = Catalog::categories();
    $category = $categories[$slug];
    $name = $ar ? $category['ar'] : $category['en'];
    $courses = array_values($category['courses']);
    $days = array_column($courses, 'days');
    $minDays = $days ? min($days) : 0;
    $maxDays = $days ? max($days) : 0;
    $groupNames = ['management' => $t('Management & Professional', 'الإدارة والتطوير المهني'), 'it' => $t('IT & Technology', 'تقنية المعلومات')];
    $groupName = $groupNames[$category['group']] ?? '';
    $slugs = array_keys($categories);
    $number = array_search($slug, $slugs) + 1;
    $siblings = array_filter($categories, fn ($c, $s) => $s !== $slug && $c['group'] === $category['group'], ARRAY_FILTER_USE_BOTH);
    $others = array_filter($categories, fn ($c) => $c['group'] !== $category['group']);
    $photos = array_slice(array_values(array_filter(array_map(fn ($c) => Catalog::photo($c), $courses))), 0, 3);
    $range = $minDays === $maxDays ? Catalog::duration($minDays, $ar) : ($ar ? 'من '.$minDays.' إلى '.Catalog::duration($maxDays, true) : $minDays.' to '.$maxDays.' days');
    $alt = Catalog::categoryUrl($slug, ! $ar);
    $initial = fn (string $title) => mb_strtoupper(mb_substr(preg_replace('/^(the|a|an)\s+/i', '', $title), 0, 1));
@endphp

@section('page', $ar ? 'category-ar' : 'category')
@section('title', $t($name.' Courses in Abu Dhabi — CompuBase Training Center', 'دورات '.$name.' في أبوظبي — مركز كمبيوبيس للتدريب'))
@if ($ar)@section('lang', 'ar')@endif
@section('description', $t(count($courses).' '.$name.' courses of '.$range.' at CompuBase Training Center, Abu Dhabi. Morning and evening classes, Monday to Friday.', count($courses).' دورة في '.$name.' مدتها '.$range.' في مركز كمبيوبيس للتدريب بأبوظبي. حصص صباحية ومسائية من الاثنين إلى الجمعة.'))
@if ($photos)@section('og_image', $photos[0])@endif

@section('content')
<div class="page active" id="pg-category" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $t('Home', 'الرئيسية') }}</a><span>/</span><a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $t('Courses', 'الدورات') }}</a><span>/</span><b style="color:var(--navy)">{{ $name }}</b></div></div>

<section class="cat-hero">
  <div class="container">
    <div class="cat-hero-text">
      <div class="eyebrow on-dark">{{ $groupName }} · {{ $t('Category', 'الفئة') }} {{ sprintf('%02d', $number) }}</div>
      <h1>{{ $name }}</h1>
      <p class="lead">{{ $category['group'] === 'it'
          ? $t('Hands-on classroom courses that build the technical skills UAE employers ask for — taught by practitioners at our Abu Dhabi campus, in morning or evening groups.', 'دورات صفّية تطبيقية تبني المهارات التقنية التي تطلبها جهات العمل في الإمارات — يقدّمها مدربون ممارسون في مقرّنا بأبوظبي، بمجموعات صباحية أو مسائية.')
          : $t('Practical classroom programmes for professionals and teams who want results they can use at work the next morning — at our Abu Dhabi campus, in morning or evening groups.', 'برامج صفّية عملية للمهنيين وفرق العمل الذين يريدون نتائج يطبّقونها في عملهم من اليوم التالي — في مقرّنا بأبوظبي، بمجموعات صباحية أو مسائية.') }}</p>
      <div class="cat-hero-actions">
        <a class="btn btn-gold" href="#cat-courses" data-scroll="cat-courses">{{ $t('Browse the '.count($courses).' courses', 'تصفّح الدورات ('.count($courses).')') }}</a>
        <a class="btn btn-outline-light" href="{{ route($ar ? 'corporate-ar' : 'corporate') }}">{{ $t('Train your team', 'درّب فريقك') }}</a>
      </div>
    </div>
    <div class="cat-mosaic n{{ count($photos) }}" aria-hidden="true">
      @forelse ($photos as $photo)
      <img src="{{ $photo }}" alt="" loading="{{ $loop->first ? 'eager' : 'lazy' }}">
      @empty
      <div class="cat-mosaic-mark">{{ $initial($category['en']) }}</div>
      @endforelse
      <div class="cat-badge"><b>{{ count($courses) }}</b><span>{{ $t('courses', 'دورة') }}</span></div>
    </div>
  </div>
</section>

<div class="cat-stats">
  <div class="container">
    <div><span>{{ $t('Courses', 'عدد الدورات') }}</span><b>{{ count($courses) }}</b></div>
    <div><span>{{ $t('Duration', 'المدة') }}</span><b>{{ $range }}</b></div>
    <div><span>{{ $t('Timing', 'التوقيت') }}</span><b>{{ $t('Morning or evening', 'صباحي أو مسائي') }}</b></div>
    <div><span>{{ $t('Where', 'المكان') }}</span><b>{{ $t('Abu Dhabi campus', 'مقرّنا في أبوظبي') }}</b></div>
  </div>
</div>

@if ($siblings)
<nav class="cat-switch" aria-label="{{ $t('Other categories in '.$groupName, 'فئات أخرى في '.$groupName) }}">
  <div class="container">
    <span class="cat-switch-label">{{ $groupName }}</span>
    <div class="cat-switch-row">
      @foreach ($categories as $s => $c)
        @continue($c['group'] !== $category['group'])
        <a href="{{ Catalog::categoryUrl($s, $ar) }}" @if ($s === $slug) class="on" aria-current="page" @endif>{{ $ar ? $c['ar'] : $c['en'] }} <span>{{ count($c['courses']) }}</span></a>
      @endforeach
    </div>
  </div>
</nav>
@endif

<section class="section cat-courses" id="cat-courses" data-none="{{ $t('No course matches your search.', 'لا توجد دورة تطابق بحثك.') }}">
  <div class="container">
    <div class="cat-courses-head">
      <div>
        <div class="eyebrow">{{ $t('The courses', 'الدورات') }}</div>
        <h2>{{ $t('Choose your course', 'اختر دورتك') }}</h2>
      </div>
      <div class="cat-tools">
        <input type="search" class="cat-search" placeholder="{{ $t('Search '.count($courses).' courses…', 'ابحث في '.count($courses).' دورة…') }}" aria-label="{{ $t('Search the courses in this category', 'ابحث في دورات هذه الفئة') }}">
        <div class="cat-days" role="group" aria-label="{{ $t('Duration', 'المدة') }}">
          <button type="button" class="on" data-days="">{{ $t('Any length', 'كل المدد') }}</button>
          <button type="button" data-days="short">{{ $t('Up to 3 days', 'حتى 3 أيام') }}</button>
          <button type="button" data-days="week">{{ $t('4 – 5 days', '4 – 5 أيام') }}</button>
          <button type="button" data-days="long">{{ $t('More than a week', 'أكثر من أسبوع') }}</button>
        </div>
      </div>
    </div>
    <div class="cp-grid">
      @foreach ($courses as $course)
      @php($photo = Catalog::photo($course))
      <a class="cp-card" href="{{ Catalog::url($course, $ar) }}" data-title="{{ mb_strtolower($course['en'].' '.$course['ar']) }}" data-days="{{ $course['days'] }}">
        <div class="cp-photo">
          @if ($photo)<img src="{{ $photo }}" alt="" loading="lazy">@else<div class="cp-mark">{{ $initial($course['en']) }}</div>@endif
          <span class="cp-days">{{ Catalog::duration($course['days'], $ar) }}</span>
          <span class="cp-num">{{ sprintf('%02d', $loop->iteration) }}</span>
        </div>
        <div class="cp-body">
          <h3>{{ Catalog::title($course, $ar) }}</h3>
          <p>{{ Catalog::summary($course, $ar) ?? $t('Full course outline, dates and fees on the course page.', 'المخطط الكامل للدورة ومواعيدها ورسومها في صفحة الدورة.') }}</p>
          <div class="cp-foot"><span>{{ $t('Mon – Fri · Morning or evening', 'الاثنين – الجمعة · صباحي أو مسائي') }}</span><b>{{ $t('Details →', 'التفاصيل ←') }}</b></div>
        </div>
      </a>
      @endforeach
    </div>
    <p class="cat-empty" hidden></p>
  </div>
</section>

<section class="cat-why">
  <div class="container">
    <div class="cat-why-head">
      <div class="eyebrow on-dark">{{ $t('Why learn with CompuBase', 'لماذا تتعلّم مع كمبيوبيس') }}</div>
      <h2>{{ $t('Built around a full working week.', 'مصمَّمة حول أسبوع العمل الكامل.') }}</h2>
    </div>
    <div class="cat-why-grid">
      <div><b>01</b><h3>{{ $t('Licensed in Abu Dhabi', 'مرخّص في أبوظبي') }}</h3><p>{{ $t('A training centre licensed by ACTVET, with official test centre and vendor partnerships.', 'مركز تدريب مرخّص من أكتفيت، مع شراكات رسمية لمراكز الاختبار ومزوّدي التقنية.') }}</p></div>
      <div><b>02</b><h3>{{ $t('Morning or evening', 'صباحاً أو مساءً') }}</h3><p>{{ $t('Every course runs Monday to Friday, with a morning group and an evening group to fit around work.', 'تُعقد كل دورة من الاثنين إلى الجمعة، بمجموعة صباحية وأخرى مسائية تناسب مواعيد عملك.') }}</p></div>
      <div><b>03</b><h3>{{ $t('Completion certificate', 'شهادة إتمام') }}</h3><p>{{ $t('Finish the course and collect your CompuBase completion certificate, with exam guidance where the course leads to one.', 'أكمل الدورة واستلم شهادة الإتمام من كمبيوبيس، مع إرشادات الامتحان حين تؤهّل الدورة له.') }}</p></div>
      <div><b>04</b><h3>{{ $t('In-house for teams', 'تدريب داخلي للفرق') }}</h3><p>{{ $t('Any course here can be delivered privately for your organisation, at our campus or yours.', 'يمكن تقديم أي دورة هنا بشكل خاص لمؤسستك، في مقرّنا أو في مقرّكم.') }}</p></div>
    </div>
  </div>
</section>

<section class="cat-team">
  <div class="container">
    <div>
      <div class="eyebrow">{{ $t('Corporate training', 'التدريب المؤسسي') }}</div>
      <h2>{{ $t('Training a whole team in '.$category['en'].'?', 'تدريب فريق كامل في '.$category['ar'].'؟') }}</h2>
      <p>{{ $t('Tell us the size of your team and the outcomes you need. We will send a proposal with a tailored outline, dates and a group fee.', 'أخبرنا بحجم فريقك والنتائج التي تحتاجها، وسنرسل لك عرضاً يتضمّن مخططاً مخصصاً ومواعيد ورسوماً للمجموعة.') }}</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route($ar ? 'corporate-ar' : 'corporate') }}">{{ $t('Request a proposal', 'اطلب عرضاً') }}</a>
      <a class="btn btn-outline" href="https://wa.me/971566893378">{{ $t('WhatsApp an advisor', 'راسل مستشاراً على واتساب') }}</a>
    </div>
  </div>
</section>

<section class="section cat-more">
  <div class="container">
    <div class="eyebrow">{{ $t('Keep exploring', 'واصل الاستكشاف') }}</div>
    <h2>{{ $t('More categories', 'فئات أخرى') }}</h2>
    @foreach (array_filter([$groupName => $siblings, ($groupNames[$category['group'] === 'it' ? 'management' : 'it'] ?? '') => $others]) as $heading => $list)
    <h3 class="cat-more-group">{{ $heading }}</h3>
    <div class="cat-more-grid">
      @foreach ($list as $s => $c)
      @php($cd = array_column($c['courses'], 'days'))
      <a class="cat-tile" href="{{ Catalog::categoryUrl($s, $ar) }}">
        <span class="n">{{ sprintf('%02d', array_search($s, $slugs) + 1) }}</span>
        <h4>{{ $ar ? $c['ar'] : $c['en'] }}</h4>
        <span class="m">{{ $t(count($c['courses']).' courses', count($c['courses']).' دورة') }}@if ($cd) · {{ min($cd) === max($cd) ? Catalog::duration(min($cd), $ar) : ($ar ? min($cd).' – '.Catalog::duration(max($cd), true) : min($cd).' – '.max($cd).' days') }}@endif</span>
        <span class="go" aria-hidden="true">{{ $ar ? '←' : '→' }}</span>
      </a>
      @endforeach
    </div>
    @endforeach
  </div>
</section>

@include('partials.site-footer')
</div>
@endsection
