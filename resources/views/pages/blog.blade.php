@extends('layouts.site')

@section('page', $ar ? 'blog-ar' : 'blog')
@section('title', $ar ? 'المدونة — مركز كمبيوبيس للتدريب، أبوظبي' : 'Blog — CompuBase Training Center, Abu Dhabi')
@if ($ar)@section('lang', 'ar')@endif
@section('description', $ar ? 'مقالات ونصائح في التدريب المهني والقيادة وتقنية المعلومات من مركز كمبيوبيس للتدريب في أبوظبي.' : 'Articles and advice on professional training, leadership and IT from CompuBase Training Center in Abu Dhabi.')

@section('content')
@php($alt = route($ar ? 'blog' : 'blog-ar'))
<div class="page active" id="pg-blog" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $ar ? 'الرئيسية' : 'Home' }}</a><span>/</span><b style="color:var(--navy)">{{ $ar ? 'المدونة' : 'Blog' }}</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">{{ $ar ? 'المدونة' : 'Blog' }}</div>
  <h1>{{ $ar ? 'مقالات ونصائح من كمبيوبيس.' : 'Articles and advice from CompuBase.' }}</h1></div>
</div></section>

<section class="section featured"><div class="container">
  @if ($posts->isEmpty())
  <p class="foot">{{ $ar ? 'لا توجد مقالات بعد.' : 'No articles yet.' }}</p>
  @else
  <div class="course-grid">
  @foreach ($posts as $post)
    <div class="course-card post-card">
      @if ($post->cover_image)<img class="post-cover" src="{{ asset($post->cover_image) }}" alt="" loading="lazy">@endif
      <div class="head"><span class="tag">{{ $post->published_at->translatedFormat('j M Y') }}</span><h3>{{ $post->title }}</h3></div>
      <div class="body"><p>{{ $post->excerpt }}</p>
        <a class="btn btn-outline" href="{{ $post->url() }}">{{ $ar ? 'اقرأ المقال ←' : 'Read the article →' }}</a></div>
    </div>
  @endforeach
  </div>
  {{ $posts->links('partials.blog-pager') }}
  @endif
</div></section>

@include('partials.site-footer')
</div>
@endsection
