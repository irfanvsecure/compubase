@extends('layouts.site')

@use('App\Support\Catalog')
@php
    // Every course category, by group: $ar.
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $categories = Catalog::categories();
    $slugs = array_keys($categories);
    $groups = [
        'management' => [$t('Management & Professional', 'الإدارة والتطوير المهني'), $t('Leadership, HR, finance, projects, quality, customer service and the skills every professional team needs.', 'القيادة والموارد البشرية والمالية والمشاريع والجودة وخدمة العملاء، والمهارات التي يحتاجها كل فريق مهني.')],
        'it' => [$t('IT & Technology', 'تقنية المعلومات'), $t('Cyber security, AI, cloud, governance, infrastructure and the technical skills behind every modern organisation.', 'الأمن السيبراني والذكاء الاصطناعي والحوسبة السحابية والحوكمة والبنية التحتية، والمهارات التقنية وراء كل مؤسسة حديثة.')],
    ];
    $inGroup = fn ($group) => array_filter($categories, fn ($c) => $c['group'] === $group);
    $courseCount = count(Catalog::courses());
    $alt = route($ar ? 'categories' : 'categories-ar');
    $range = function (array $courses) use ($ar) {
        $days = array_column($courses, 'days');
        if (! $days) {
            return '';
        }

        return min($days) === max($days) ? Catalog::duration(min($days), $ar) : ($ar ? min($days).' – '.Catalog::duration(max($days), true) : min($days).' – '.max($days).' days');
    };
    $photo = function (array $courses) {
        foreach ($courses as $course) {
            if ($url = Catalog::photo($course)) {
                return $url;
            }
        }

        return null;
    };
@endphp

@section('page', $ar ? 'categories-ar' : 'categories')
@section('title', $t('All Course Categories — CompuBase Training Center, Abu Dhabi', 'جميع فئات الدورات — مركز كمبيوبيس للتدريب، أبوظبي'))
@if ($ar)@section('lang', 'ar')@endif
@section('description', $t(count($categories).' course categories and '.$courseCount.' courses at CompuBase Training Center, Abu Dhabi: management, leadership, HR, finance, project management, IT, cyber security and AI.', count($categories).' فئة و'.$courseCount.' دورة في مركز كمبيوبيس للتدريب بأبوظبي: الإدارة والقيادة والموارد البشرية والمالية وإدارة المشاريع وتقنية المعلومات والأمن السيبراني والذكاء الاصطناعي.'))

@section('content')
<div class="page active" id="pg-categories" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $t('Home', 'الرئيسية') }}</a><span>/</span><b style="color:var(--navy)">{{ $t('All categories', 'جميع الفئات') }}</b></div></div>

<section class="cat-hero cats-hero">
  <div class="container">
    <div class="cat-hero-text">
      <div class="eyebrow on-dark">{{ $t('Course categories', 'فئات الدورات') }}</div>
      <h1>{{ $t('Find the right category for you.', 'اختر الفئة المناسبة لك.') }}</h1>
      <p class="lead">{{ $t($courseCount.' classroom courses in '.count($categories).' categories — all at our Abu Dhabi campus, Monday to Friday, in morning or evening groups.', $courseCount.' دورة صفّية في '.count($categories).' فئة — جميعها في مقرّنا بأبوظبي، من الاثنين إلى الجمعة، بمجموعات صباحية أو مسائية.') }}</p>
    </div>
    <div class="cats-jump">
      @foreach ($groups as $group => [$name, $intro])
      <a href="#{{ $group }}" data-scroll="{{ $group }}"><b>{{ count($inGroup($group)) }}</b><span>{{ $name }}<small>{{ $t(array_sum(array_map(fn ($c) => count($c['courses']), $inGroup($group))).' courses', array_sum(array_map(fn ($c) => count($c['courses']), $inGroup($group))).' دورة') }}</small></span><i aria-hidden="true">{{ $ar ? '←' : '→' }}</i></a>
      @endforeach
      <a href="{{ route($ar ? 'courses-ar' : 'courses') }}"><b>{{ $courseCount }}</b><span>{{ $t('Every course, A to Z', 'كل الدورات في مكان واحد') }}<small>{{ $t('Search the full catalogue', 'ابحث في الكتالوج كاملاً') }}</small></span><i aria-hidden="true">{{ $ar ? '←' : '→' }}</i></a>
    </div>
  </div>
</section>

@foreach ($groups as $group => [$name, $intro])
<section class="section cats-group" id="{{ $group }}">
  <div class="container">
    <div class="cats-group-head">
      <div class="eyebrow">{{ sprintf('%02d', $loop->iteration) }} · {{ $t(count($inGroup($group)).' categories', count($inGroup($group)).' فئة') }}</div>
      <h2>{{ $name }}</h2>
      <p>{{ $intro }}</p>
    </div>
    <div class="cats-grid">
      @foreach ($inGroup($group) as $slug => $category)
      @php($courses = array_values($category['courses']))
      @php($img = $photo($courses))
      <a class="cats-card" href="{{ Catalog::categoryUrl($slug, $ar) }}">
        <div class="cats-photo">
          @if ($img)<img src="{{ $img }}" alt="" loading="lazy">@else<div class="cp-mark">{{ mb_strtoupper(mb_substr($category['en'], 0, 1)) }}</div>@endif
          <span class="cats-num">{{ sprintf('%02d', array_search($slug, $slugs) + 1) }}</span>
          <span class="cats-count">{{ $t(count($courses).' courses', count($courses).' دورة') }}</span>
        </div>
        <div class="cats-body">
          <h3>{{ $ar ? $category['ar'] : $category['en'] }}</h3>
          <ul>
            @foreach (array_slice($courses, 0, 3) as $course)
            <li>{{ Catalog::title($course, $ar) }}</li>
            @endforeach
          </ul>
          <div class="cp-foot"><span>{{ $range($courses) }}</span><b>{{ $t('Explore →', 'استكشف ←') }}</b></div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
@endforeach

@include('partials.site-footer')
</div>
@endsection
