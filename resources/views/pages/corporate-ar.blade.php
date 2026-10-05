@extends('layouts.site')

@section('page', 'corporate-ar')
@section('title', 'التدريب المؤسسي — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-corporate-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('corporate') }}" style="font-weight:700">EN</a>
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
        <li><a href="{{ route('corporate-ar') }}">التدريب المؤسسي</a></li>
        <li><a href="{{ route('partners-ar') }}">شركاؤنا</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('contact-ar') }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('corporate') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">التدريب المؤسسي</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">التدريب المؤسسي والداخلي</div>
  <h1>درّب فريقك كاملاً. في مقرّك أو مقرّنا.</h1>
  <p class="lead">يمكن تقديم أي دورة على هذا الموقع بشكل خاص لمنشأة واحدة، مع تكييف المحتوى وفق أنظمتكم وسياساتكم وقطاعكم.</p></div>
</div></section>

<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start" id="corpGrid">
  <div>
    <div class="eyebrow">كيف نعمل</div>
    <h2>تدريب مبني حول سير عملكم.</h2>
    <ul class="corp-points" style="margin-top:24px">
      <li style="color:var(--text)"><b style="color:var(--navy)">التدريب في مقرّكم في جميع أنحاء الإمارات</b><span style="color:#6b7688">أو في مجموعة خاصة بمقرّنا في أبوظبي — أيهما يوفّر وقت فريقكم أكثر.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">محتوى مصمّم حسب أدواركم الوظيفية</b><span style="color:#6b7688">حالات عملية وتمارين وأمثلة تُعاد صياغتها حول العمل الفعلي لموظفيكم.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">سجلات حضور وشهادات إتمام</b><span style="color:#6b7688">وثائق جاهزة لإدارات الموارد البشرية والامتثال دون متابعة منكم.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">أسعار المجموعات</b><span style="color:#6b7688">ابتداءً من [العدد] متدربين — يؤكَّد الحد مع مستشار التدريب.</span></li>
    </ul>
    <div class="steps-grid" style="margin-top:40px;grid-template-columns:1fr">
      <div class="step"><div class="eyebrow">الخطوة 01</div><h3>أخبرنا بالفريق والهدف</h3><p>ستة حقول في النموذج — أو رسالة واحدة على واتساب.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 02</div><h3>استلم عرضاً مكتوباً</h3><p>المواعيد والصيغة والمكان وعرض السعر، عادةً خلال [عدد] أيام عمل.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 03</div><h3>تدرّبوا وفق جدولكم</h3><p>حصص موقّتة حول المناوبات والعمليات وساعات العمل.</p></div>
    </div>
  </div>
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>اطلب عرضاً تدريبياً</h3>
    <p class="sub">ستة حقول فقط. يردّ عليك مستشار التدريب بالمواعيد والصيغة وعرض سعر مكتوب.</p>
    @include('partials.enquiry-form', ['type' => 'proposal', 'ar' => true])
  </div>
</div></section>
<style>@media(max-width:1024px){#corpGrid{grid-template-columns:1fr!important}}</style>

<section class="closing"><div class="container">
  <div><h2>أسرع عبر الهاتف.</h2><p>راسلنا على واتساب 056 689 3378 باسم الدورة وحجم الفريق — ونتولى الباقي.</p></div>
  <div class="actions"><a class="btn btn-navy" href="https://wa.me/971566893378">راسلنا على واتساب</a></div>
</div></section>
<!-- FOOTER -->
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
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="{{ route('privacy-ar') }}">سياسة الخصوصية</a><a href="{{ route('terms-ar') }}">الشروط والاسترداد</a><a href="{{ url('sitemap.xml') }}">خريطة الموقع</a><a href="{{ route('corporate') }}">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-outline" href="https://wa.me/971566893378">واتساب</a>
  <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل</a>
</div>


</div>
@endsection
