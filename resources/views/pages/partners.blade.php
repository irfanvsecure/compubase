@extends('layouts.site')

@section('page', $ar ? 'partners-ar' : 'partners')
@section('title', $ar ? 'شركاؤنا واعتماداتنا — مركز كمبيوبيس للتدريب، أبوظبي' : 'Our Partners and Accreditations — CompuBase Training Center, Abu Dhabi')
@if ($ar)@section('lang', 'ar')@endif
@section('description', $ar ? 'الاعتمادات ومراكز الاختبار الرسمية وشركاء التدريب المعتمدون لمركز كمبيوبيس للتدريب في أبوظبي: أكتفيت، آيلتس، بيرسون في يو إي، مايكروسوفت، AWS، إيساكا وغيرهم.' : 'Accreditations, official test centres and authorised training partners of CompuBase Training Center in Abu Dhabi: ACTVET, IELTS, Pearson VUE, Microsoft, AWS, ISACA and more.')

@section('content')
@php
    $alt = route($ar ? 'partners' : 'partners-ar');
    $groups = config('partners.groups');
    $partners = collect(config('partners.partners'));
    $size = fn ($slug) => @getimagesize(base_path("images/partners/{$slug}.png")) ?: [320, 160];
@endphp
<div class="page active" id="pg-partners" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $ar ? 'الرئيسية' : 'Home' }}</a><span>/</span><b style="color:var(--navy)">{{ $ar ? 'شركاؤنا' : 'Our partners' }}</b></div></div>

<section class="partners-hero">
  <div class="container">
    <div>
      <div class="eyebrow">{{ $ar ? 'شركاؤنا واعتماداتنا' : 'Our partners and accreditations' }}</div>
      <h1>{{ $ar ? 'معتمدون من '.$partners->count().' جهة عالمية ومحلية.' : 'Accredited and authorised by '.$partners->count().' leading names.' }}</h1>
      <p class="lead">{{ $ar ? 'من اعتماد أكتفيت في أبوظبي إلى مراكز الاختبار الرسمية وشركاء التدريب من كبرى شركات التقنية والأمن السيبراني — يحصل متدربونا على تدريب ومواد وامتحانات معترف بها.' : 'From our ACTVET licence in Abu Dhabi to official test centres and training partnerships with the biggest names in technology and cyber security — our learners get recognised training, materials and exams.' }}</p>
    </div>
    <div class="partners-stats">
      @foreach ($groups as $key => $group)
      <a href="#{{ $key }}"><b>{{ $partners->where('group', $key)->count() }}</b><span>{{ $ar ? $group['ar'] : $group['en'] }}</span></a>
      @endforeach
    </div>
  </div>
</section>

@foreach ($groups as $key => $group)
<section class="section partners-group" id="{{ $key }}">
  <div class="container">
    <div class="partners-group-head">
      <div class="eyebrow">{{ sprintf('%02d', $loop->iteration) }}</div>
      <h2>{{ $ar ? $group['ar'] : $group['en'] }}</h2>
      <p>{{ $ar ? $group['intro_ar'] : $group['intro_en'] }}</p>
    </div>
    <div class="partners-grid">
      @foreach ($partners->where('group', $key) as $p)
      @php([$w, $h] = $size($p['slug']))
      <article class="partner-card">
        <div class="partner-logo"><img src="{{ asset('images/partners/'.$p['slug'].'.png') }}" alt="{{ $ar ? $p['ar'] : $p['en'] }}" width="{{ $w }}" height="{{ $h }}" loading="lazy"></div>
        <div class="partner-body">
          <h3>{{ $ar ? $p['ar'] : $p['en'] }}</h3>
          @if ($p['badge_en'])<span class="partner-badge">{{ $ar ? $p['badge_ar'] : $p['badge_en'] }}</span>@endif
          <p>{{ $ar ? $p['desc_ar'] : $p['desc_en'] }}</p>
        </div>
      </article>
      @endforeach
    </div>
  </div>
</section>
@endforeach

@include('partials.site-footer')
</div>
@endsection
