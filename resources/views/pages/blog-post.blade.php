@extends('layouts.site')

@section('page', $ar ? 'blog-ar' : 'blog')
@section('title', $post->title.($ar ? ' — مركز كمبيوبيس للتدريب' : ' — CompuBase Training Center'))
@if ($ar)@section('lang', 'ar')@endif
@section('description', $post->excerpt ?: Str::limit(strip_tags($post->html()), 155))
@section('og_type', 'article')
@if ($post->cover_image)@section('og_image', $post->cover_image)@endif
@if (! $post->isLive())@section('robots', 'noindex, nofollow')@endif

@section('content')
@php($alt = route($ar ? 'blog' : 'blog-ar'))
<div class="page active" id="pg-blog-post" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

@unless ($post->isLive())
<div class="placeholder-note" style="margin:0;text-align:center">{{ $ar ? 'معاينة: هذا المقال غير منشور.' : 'Preview: this article is not published.' }}</div>
@endunless

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $ar ? 'الرئيسية' : 'Home' }}</a><span>/</span><a href="{{ route($ar ? 'blog-ar' : 'blog') }}">{{ $ar ? 'المدونة' : 'Blog' }}</a><span>/</span><b style="color:var(--navy)">{{ $post->title }}</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">{{ ($post->published_at ?? $post->updated_at)->translatedFormat('j F Y') }}</div>
  <h1>{{ $post->title }}</h1>
  @if ($post->excerpt)<p class="lead">{{ $post->excerpt }}</p>@endif</div>
</div></section>

<section class="course-body">
  <div class="container">
    <article class="post-body">
      @if ($post->cover_image)<img class="course-photo" src="{{ asset($post->cover_image) }}" alt="{{ $post->title }}">@endif
      {!! $post->html() !!}
    </article>
    <aside>
      <div class="side-box">
        <h4>{{ $ar ? 'تصفّح الدورات' : 'Explore courses' }}</h4>
        <ul>
          @foreach (array_slice(App\Support\Catalog::categories(), 0, 8, true) as $cat => $category)
          <li><a href="{{ route($ar ? 'courses-ar' : 'courses', ['go' => $cat]) }}">{{ $ar ? $category['ar'] : $category['en'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="side-box calendar">
        <h4>{{ $ar ? 'سجّل الآن' : 'Register now' }}</h4>
        <h3>{{ $ar ? 'مجموعات صباحية ومسائية' : 'Morning and evening groups' }}</h3>
        <p>{{ $ar ? 'من الاثنين إلى الجمعة في أبوظبي.' : 'Monday to Friday in Abu Dhabi.' }}</p>
        <a class="btn btn-gold" href="{{ route($ar ? 'contact-ar' : 'contact') }}">{{ $ar ? 'تواصل معنا' : 'Contact us' }}</a>
      </div>
    </aside>
  </div>
</section>

@include('partials.site-footer')
</div>
@endsection
