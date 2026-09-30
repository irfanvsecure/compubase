@extends('layouts.site')

@section('page', 'courses-ar')
@section('title', 'جميع الدورات — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-courses-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('courses') }}" style="font-weight:700">EN</a>
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
      <a class="lang-btn" href="{{ route('courses') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">جميع الدورات</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">دليل الدورات</div>
  <h1>اثنتا عشرة دورة. ثلاثة مسارات. مقرّ واحد.</h1>
  <p class="lead">الشهادات المهنية، وتقنية المعلومات والأمن السيبراني، وتدريب اللغات — كل دورة من الاثنين إلى الجمعة في أبوظبي، بمجموعات صباحية ومسائية.</p></div>
</div></section>

<section class="section featured"><div class="container">
  <div class="course-grid">
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة إدارة المشاريع الاحترافية</h3></div>
    <div class="body"><p>تغطية كاملة لمجالات امتحان إدارة المشاريع مع أسئلة تدريبية وساعات التواصل المطلوبة للتقديم.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة المدقق الداخلي المعتمد</h3></div>
    <div class="body"><p>تحضير مسائي يغطي أساسيات التدقيق الداخلي وممارسته والمعارف التي يختبرها الامتحان.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة المحاسب الإداري المعتمد</h3></div>
    <div class="body"><p>التخطيط المالي والتحليلات والإدارة المالية الاستراتيجية وفق جزأي الامتحان.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة مدقق نظم المعلومات المعتمد</h3></div>
    <div class="body"><p>تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية المعتمدة.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>شهادة الاختراق الأخلاقي المعتمدة</h3></div>
    <div class="body"><p>اختبر الأنظمة كما يفعل المهاجم، في مختبر خاضع للإشراف، واستعد لامتحان الشهادة.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الأمن السيبراني</h3></div>
    <div class="body"><p>أسبوع عملي ينقل الموظفين من الوعي الأمني إلى القدرة — رصد التهديدات والإبلاغ عنها والتعامل معها.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الذكاء الاصطناعي</h3></div>
    <div class="body"><p>وظّف أدوات الذكاء الاصطناعي في مهام عملك اليومية — التقارير والصياغة والتحليل. لا حاجة للبرمجة.</p>
      <div class="meta"><div><span>المدة</span><b>3 أيام · 18 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>هندسة الأوامر النصية</h3></div>
    <div class="body"><p>يومان مركّزان للحصول على نتائج أفضل من أدوات الذكاء الاصطناعي — البنية والسياق والتكرار والتقييم.</p>
      <div class="meta"><div><span>المدة</span><b>يومان · 12 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة اللغة الإنجليزية</h3></div>
    <div class="body"><p>شهر من دروس الإنجليزية العامة — محادثة وكتابة واستماع وقراءة — في مجموعة صفية صغيرة.</p>
      <div class="meta"><div><span>المدة</span><b>شهر · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة التحضير لامتحان الآيلتس</h3></div>
    <div class="body"><p>تدريب موقوت وتقنيات امتحان في المهارات الأربع، مع تقييم لكل اختبار تجريبي.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>اللغة العربية لغير الناطقين بها</h3></div>
    <div class="body"><p>عربية عملية محادثةً وكتابةً للمقيمين الراغبين في عمل وحياة أكثر ثقة في الإمارات.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">مهارات مكتبية</span><h3>مايكروسوفت أوفيس وكوبايلوت</h3></div>
    <div class="body"><p>إكسل وورد وباوربوينت وآوتلوك بمستوى احترافي، مع استخدام كوبايلوت طوال الدورة.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوع · 30 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
  </div>
  <p class="foot">لست متأكداً أي دورة تناسبك؟ اتصل بمستشار التدريب على <a href="tel:0506399915">050 6399915</a></p>
</div></section>

<section class="closing"><div class="container">
  <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:15px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
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
