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
      <a href="tel:0506399915">📞 050 6399915</a>
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
        <li><a href="{{ route('home-ar', ['go' => 'accreditation']) }}">الاعتمادات</a></li>
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
    <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
      <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
      <div class="field"><label>المنشأة</label><input placeholder="اسم الشركة" required></div>
      <div class="field"><label>البريد الإلكتروني للعمل</label><input type="email" placeholder="name@company.ae" required></div>
      <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field"><label>حجم الفريق</label><select><option>اختر النطاق</option><option>2–5</option><option>6–15</option><option>16–30</option><option>أكثر من 30</option></select></div>
      <div class="field full"><label>ما الهدف الذي تسعون إليه؟ <span style="text-transform:none;font-weight:400">اختياري</span></label><textarea placeholder="مثال: اثنا عشر موظفاً مالياً جاهزون لامتحان المحاسب الإداري قبل نهاية العام."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">اطلب العرض</button>
      <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
    </form>
  </div>
</div></section>
<style>@media(max-width:1024px){#corpGrid{grid-template-columns:1fr!important}}</style>

<section class="closing"><div class="container">
  <div><h2>أسرع عبر الهاتف.</h2><p>راسلنا على واتساب 050 6399915 باسم الدورة وحجم الفريق — ونتولى الباقي.</p></div>
  <div class="actions"><a class="btn btn-navy" href="https://wa.me/9710506399915">راسلنا على واتساب</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
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
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('corporate') }}">EN</a></span>
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
