@extends('layouts.site')

@section('page', 'contact-ar')
@section('title', 'اتصل بنا — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-contact-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('contact') }}" style="font-weight:700">EN</a>
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
        <li><a href="{{ route('contact-ar') }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('contact') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">اتصل بنا</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">التواصل والتسجيل</div>
  <h1>تحدّث إلى مستشار التدريب اليوم.</h1>
  <p class="lead">اتصل أو راسلنا على واتساب أو أرسل النموذج — يردّ عليك المستشار بالمواعيد المتاحة والتوقيتات والرسوم للدورة التي تهمّك.</p></div>
</div></section>

<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 380px;gap:56px;align-items:start" id="contactGrid">
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>نموذج التسجيل والاستفسار</h3>
    <p class="sub">أخبرنا بالدورة والتوقيت المفضل — نردّ عليك بموعد البدء القادم والرسوم.</p>
    <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
      <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
      <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>البريد الإلكتروني</label><input type="email" placeholder="name@email.com" required></div>
      <div class="field"><label>التوقيت المفضل</label><select><option>صباحي أو مسائي</option><option>صباحي</option><option>مسائي</option></select></div>
      <div class="field full"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field full"><label>رسالتك <span style="text-transform:none;font-weight:400">اختياري</span></label><textarea placeholder="أي شيء ينبغي أن نعرفه — مستواك، موعد امتحانك، حجم فريقك."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">أرسل الاستفسار</button>
      <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
    </form>
  </div>
  <aside>
    <div class="side-box">
      <h4>تواصل معنا مباشرة</h4>
      <p><b style="color:var(--navy)">الهاتف / واتساب</b><br><a href="tel:0506399915" style="color:var(--gold-ink);font-weight:700">050 6399915</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">البريد الإلكتروني</b><br><a href="mailto:info@compubase.ae">info@compubase.ae</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">العنوان</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
      <p style="margin-top:12px"><b style="color:var(--navy)">ساعات الدوام</b><br>الأحد – الخميس · [ساعات الدوام]</p>
      <a class="btn btn-gold" style="width:100%;margin-top:16px" href="https://wa.me/9710506399915">راسلنا على واتساب الآن</a>
    </div>
    <div class="side-box">
      <h4>خريطة الموقع</h4>
      <div class="trainer-photo" style="min-height:220px">📍 &nbsp;تُدرج خريطة جوجل هنا بعد تأكيد العنوان.</div>
    </div>
  </aside>
</div></section>
<style>@media(max-width:1024px){#contactGrid{grid-template-columns:1fr!important}}</style>

<section class="closing"><div class="container">
  <div><h2>تفضّل الاتصال مباشرة؟</h2><p>يجيب المستشار من الأحد إلى الخميس خلال ساعات الدوام.</p></div>
  <div class="actions"><a class="btn btn-navy" href="tel:0506399915">اتصل على 050 6399915</a></div>
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
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('contact') }}">EN</a></span>
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
