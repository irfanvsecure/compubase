@extends('layouts.site')

@section('page', 'about-ar')
@section('title', 'من نحن — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-about-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('about') }}" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home-ar') }}"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home-ar', ['go' => 'courses']) }}">الدورات</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'corporate']) }}">التدريب المؤسسي</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'accreditation']) }}">الاعتمادات</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'contact']) }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('about') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">من نحن</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">عن كمبيوبيس</div>
  <h1>مركز تدريب مصمّم حول أسبوع العمل.</h1>
  <p class="lead">يعمل مركز كمبيوبيس للتدريب من مقرّ واحد في أبوظبي. كل دورة تُدرَّس في قاعاتنا، بكادرنا التدريبي، وبجدول مصمّم لمن لا يستطيع التوقف عن العمل من أجل الدراسة.</p></div>
</div></section>

<section class="section"><div class="container">
  <div class="eyebrow">من نحن</div>
  <h2>تدريب صفّي، كما ينبغي أن يكون.</h2>
  <div style="max-width:760px">
    <p>مركز كمبيوبيس للتدريب — حلول تدريبية مبتكرة — معهد تدريب مهني في أبوظبي، الإمارات العربية المتحدة. نقدّم اثنتي عشرة دورة مجدولة في ثلاثة مسارات: الشهادات المهنية (إدارة المشاريع الاحترافية، المدقق الداخلي المعتمد، المحاسب الإداري المعتمد، مدقق نظم المعلومات المعتمد)، وتقنية المعلومات والأمن السيبراني (الاختراق الأخلاقي، أساسيات الأمن السيبراني، أساسيات الذكاء الاصطناعي، هندسة الأوامر النصية)، واللغات والمهارات المكتبية (الإنجليزية، الآيلتس، العربية لغير الناطقين بها، أوفيس مع كوبايلوت).</p>
    <p>يُعقد كل برنامج من الاثنين إلى الجمعة بمجموعة صباحية وأخرى مسائية، ويُدرَّس بالعربية أو الإنجليزية حسب المجموعة. تتراوح الدورات بين ورشة يومين وشهر كامل من الدروس — وكلها في قاعة حقيقية، مع مدرّب يجيب عن الأسئلة لحظة طرحها.</p>
    <p>[يُضاف هنا: سنة التأسيس، وتفاصيل الترخيص، وجملتان أو ثلاث من تاريخ المركز — تُزوَّد من كمبيوبيس قبل النشر.]</p>
  </div>
  <div class="placeholder-note" style="max-width:760px">[تفاصيل التاريخ وسنة التأسيس والفريق تُؤكَّد مع العميل قبل نشر هذه الصفحة.]</div>
</div></section>

<section class="accred"><div class="container" style="text-align:center">
  <div class="eyebrow">معتمدون ومعترف بنا من</div>
  <div class="marks"><div class="mark">أكتفيت</div><div class="mark">المجلس الثقافي البريطاني</div><div class="mark">آيلتس</div><div class="mark">الرخصة الدولية لقيادة الحاسوب</div></div>
</div></section>

<section class="section why"><div class="container">
  <div class="eyebrow">لماذا يختارنا المتدربون</div>
  <h2>ما الذي يميّز كمبيوبيس؟</h2>
  <div class="why-grid">
    <div class="why-item"><h3>مجموعات صباحية ومسائية</h3><p>المنهج نفسه مرتين يومياً، حتى لا يكون نظام مناوباتك سبباً لتأجيل مؤهلك.</p></div>
    <div class="why-item"><h3>التدريس بالعربية أو الإنجليزية</h3><p>المادة التدريبية والشرح باللغة التي يعمل بها فريقك.</p></div>
    <div class="why-item"><h3>قاعة حقيقية، لا مكتبة فيديو</h3><p>مجموعات صغيرة في قاعة فعلية، حيث يُجاب عن سؤالك لحظة طرحه.</p></div>
    <div class="why-item"><h3>إجابات صريحة حول الملاءمة</h3><p>إن لم تكن الدورة مناسبة لمستواك أو هدفك، سيخبرك المستشار بذلك قبل الدفع.</p></div>
  </div>
  <div class="steps-photo"><div class="photo-frame">📷 &nbsp;مكان الصورة: قاعات التدريب أو الكادر التدريبي أو الاستقبال في مقر أبوظبي.</div></div>
</div></section>

<section class="section"><div class="container">
  <div class="eyebrow">أرقامنا</div>
  <h2>لمحة سريعة.</h2>
  <div class="cat-grid">
    <div class="cat"><div class="num">12</div><h3>دورة مجدولة</h3><p>في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات والمهارات المكتبية.</p></div>
    <div class="cat"><div class="num">2</div><h3>توقيتان يومياً</h3><p>مجموعات صباحية ومسائية من الاثنين إلى الجمعة، لتتدرّب دون ترك عملك.</p></div>
    <div class="cat"><div class="num">[X]</div><h3>متدرّب</h3><p>تخرّجوا من مقرّنا في أبوظبي — يُؤكَّد الرقم قبل النشر.</p></div>
  </div>
</div></section>

<section class="closing"><div class="container">
  <div><h2>تفضّل بزيارة المركز.</h2><p>مركز كمبيوبيس للتدريب، أبوظبي. اتصل أو راسلنا على واتساب 050 6399915.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('home-ar', ['go' => 'contact']) }}">اتصل بنا</a><a class="btn btn-outline" href="{{ route('home-ar', ['go' => 'courses']) }}">تصفّح الدورات</a></div>
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
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('about') }}">EN</a></span>
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
