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
 <p class="lead">دفعات مؤكدة في مقر أبوظبي للدورات الاثنتي عشرة كلها. إن لم يناسبك موعد، أخبرنا بالأسبوع الذي تفضّله وسنضمّك إلى المجموعة التالية.</p></div>
</div></section>
<section class="section schedule"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">الدورات الاثنتا عشرة</div><h2>المجموعات المؤكدة القادمة.</h2></div>
  <a class="btn btn-outline" href="{{ route('contact-ar') }}">⤓ استلم التقويم بالبريد</a>
 </div>
 <div class="table-wrap">
  <table class="sched">
   <caption>من الاثنين إلى الجمعة · مقر أبوظبي</caption>
   <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
   <tbody>
<tr><td><b style="color:var(--navy)"><a href="{{ route('pmp-ar') }}" style="color:var(--navy)">شهادة إدارة المشاريع الاحترافية</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cia-ar') }}" style="color:var(--navy)">شهادة المدقق الداخلي المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cma-ar') }}" style="color:var(--navy)">شهادة المحاسب الإداري المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cisa-ar') }}" style="color:var(--navy)">شهادة مدقق نظم المعلومات المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ceh-ar') }}" style="color:var(--navy)">شهادة الاختراق الأخلاقي المعتمدة</a></b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('cyber-ar') }}" style="color:var(--navy)">أساسيات الأمن السيبراني</a></b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ai-ar') }}" style="color:var(--navy)">أساسيات الذكاء الاصطناعي</a></b></td><td>تقنية وأمن</td><td>3 أيام · 18 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('prompt-ar') }}" style="color:var(--navy)">هندسة الأوامر النصية</a></b></td><td>تقنية وأمن</td><td>يومان · 12 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('english-ar') }}" style="color:var(--navy)">دورة اللغة الإنجليزية</a></b></td><td>لغات</td><td>شهر · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('ielts-ar') }}" style="color:var(--navy)">دورة التحضير لامتحان الآيلتس</a></b></td><td>لغات</td><td>أسبوعان · 20 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('arabic-ar') }}" style="color:var(--navy)">اللغة العربية لغير الناطقين بها</a></b></td><td>لغات</td><td>أسبوعان · 20 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="{{ route('office-ar') }}" style="color:var(--navy)">مايكروسوفت أوفيس وكوبايلوت</a></b></td><td>مهارات مكتبية</td><td>أسبوع · 30 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
   </tbody>
  </table>
 </div>
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
        <div class="foot-logo"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#" data-scroll="featured">إدارة المشاريع الاحترافية</a></li><li><a href="#" data-scroll="featured">المدقق الداخلي المعتمد</a></li><li><a href="#" data-scroll="featured">المحاسب الإداري المعتمد</a></li><li><a href="#" data-scroll="featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#" data-scroll="featured">الاختراق الأخلاقي</a></li><li><a href="#" data-scroll="featured">أساسيات الأمن السيبراني</a></li><li><a href="#" data-scroll="featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#" data-scroll="featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#" data-scroll="featured">اللغة الإنجليزية</a></li><li><a href="#" data-scroll="featured">التحضير للآيلتس</a></li><li><a href="#" data-scroll="featured">العربية لغير الناطقين بها</a></li><li><a href="#" data-scroll="featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
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
