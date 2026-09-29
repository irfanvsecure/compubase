@extends('layouts.site')

@section('page', 'cisa-ar')
@section('title', 'شهادة مدقق نظم المعلومات المعتمد — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-cisa-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('cisa') }}" style="font-weight:700">EN</a>
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
      <a class="lang-btn" href="{{ route('cisa') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><a href="{{ route('courses-ar') }}">الدورات</a><span>/</span><a href="{{ route('courses-ar') }}">الشهادات المهنية</a><span>/</span><b style="color:var(--navy)">شهادة مدقق نظم المعلومات المعتمد</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">شهادة مهنية</span>
      <h1>شهادة مدقق نظم المعلومات المعتمد</h1>
      <p class="lead">تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية الحالية، في مجموعة مسائية.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>أربعون ساعة صفّية مسائية عبر مجالات الممارسة الخمسة — عملية تدقيق نظم المعلومات، وحوكمة تقنية المعلومات، واقتناء النظم وتطويرها، والعمليات ومرونة الأعمال، وحماية أصول المعلومات — مع أسئلة بنمط الامتحان بعد كل مجال.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>تخطيط وتنفيذ تدقيق نظم معلومات قائم على المخاطر</li><li>تقييم ممارسات حوكمة تقنية المعلومات وإدارتها</li><li>تقييم تطوير النظم وعملياتها ومرونتها</li><li>الجلوس للامتحان بعد مراجعة كل مجال</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>مدققو تقنية المعلومات وأعضاء فرق التدقيق</li><li>موظفو الأمن والمخاطر المنتقلون إلى أدوار الضمان</li><li>المدققون الداخليون المتوسّعون نحو نظم المعلومات</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة المدقق الداخلي المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="{{ route('cia-ar') }}">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>شهادة الاختراق الأخلاقي المعتمدة</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="{{ route('ceh-ar') }}">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الأمن السيبراني</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="{{ route('cyber-ar') }}">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
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
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('home') }}">EN</a></span>
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
