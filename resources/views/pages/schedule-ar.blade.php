@extends('layouts.site')

@section('page', 'schedule-ar')
@section('title', 'جدول الدورات — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-schedule-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('schedule') }}" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home-ar') }}"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('courses-ar') }}">الدورات</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'corporate']) }}">التدريب المؤسسي</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'accreditation']) }}">الاعتمادات</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('contact-ar') }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('schedule') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>



<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">جدول الدورات</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
 <div><div class="eyebrow on-dark">الدفعات القادمة</div>
 <h1>جميع مواعيد البدء في جدول واحد.</h1>
 <p class="lead">دفعات مؤكدة في مقر أبوظبي لجميع الدورات. إن لم يناسبك موعد، أخبرنا بالأسبوع الذي تفضّله وسنضمّك إلى المجموعة التالية.</p></div>
</div></section>
@use('App\Support\Catalog')
<section class="section schedule catalog" id="catalog" data-per-page="10" data-initial="{{ request('go') }}"
  data-showing="عرض {from}–{to} من {total} دورة"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">جميع الدورات</div><h2>المجموعات المؤكدة القادمة.</h2></div>
  <a class="btn btn-outline" href="{{ route('contact-ar') }}">⤓ استلم التقويم بالبريد</a>
 </div>
 <nav class="filter-tabs cat-filter" aria-label="تصفّح الجدول حسب الفئة">
  <button type="button" class="active" data-cat="all">جميع الدورات · {{ count(Catalog::courses()) }}</button>
  @foreach (['management' => 'الدورات الإدارية', 'it' => 'دورات تقنية المعلومات'] as $group => $label)
  <span class="cat-group">{{ $label }}</span>
  @foreach (Catalog::categories() as $cat => $category)@if ($category['group'] === $group)<button type="button" data-cat="{{ $cat }}">{{ $category['ar'] }} · {{ count($category['courses']) }}</button>@endif @endforeach
  @endforeach
 </nav>
 <p class="catalog-count" aria-live="polite"></p>
 <div class="table-wrap">
  <table class="sched">
   <caption>من الاثنين إلى الجمعة · مقر أبوظبي</caption>
   <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
   <tbody>
@foreach (Catalog::courses() as $course)
<tr data-cats="{{ implode(' ', $course['cats']) }}"><td><b style="color:var(--navy)"><a href="{{ Catalog::url($course, true) }}" style="color:var(--navy)">{{ $course['ar'] }}</a></b></td><td>{{ $course['catAr'] }}</td><td>{{ Catalog::duration($course['days'], true) }}</td><td>صباحي أو مسائي</td><td>2026 و2027</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
@endforeach
   </tbody>
  </table>
 </div>
 <nav class="pager" aria-label="صفحات الجدول" hidden>
  <button type="button" class="pager-prev">→ السابق</button>
  <span class="pager-pages"></span>
  <button type="button" class="pager-next">التالي ←</button>
 </nav>
 <p class="sched-note">تُعقد جميع المجموعات من الاثنين إلى الجمعة في مقر أبوظبي. تُؤكَّد المواعيد لاحقاً — اتصل على <a href="tel:0506399915" style="font-weight:700;text-decoration:underline">050 6399915</a> لأقرب دفعة.</p>
</div></section>
<section class="closing"><div class="container">
 <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة.</p></div>
 <div class="actions"><a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
</div></section>
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:15px">تدريب صفّي في تطوير الذات، والقيادة والإدارة، والموارد البشرية، والمالية، وإدارة المشاريع والجودة، والصحة والسلامة، وتقنية المعلومات، والأمن السيبراني، والذكاء الاصطناعي. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      @include('partials.footer-courses', ['ar' => true])
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('courses') }}">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل</a>
</div>


</div>
@endsection
