@extends('layouts.site')

@section('page', 'home-ar')
@section('title', 'مركز كمبيوبيس للتدريب — دورات تدريبية احترافية في أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-home-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('home') }}" style="font-weight:700">EN</a>
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
        <li><a href="#" data-scroll="accreditation">الاعتمادات</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('contact-ar') }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('home') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<!-- HERO + SLIDER -->
<section class="hero-2col">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">مركز كمبيوبيس للتدريب · أبوظبي</div>
      <h1>احصل على مؤهلك المهني دون التوقف عن العمل.</h1>
      <p class="lead">دورات الشهادات المهنية والأمن السيبراني والذكاء الاصطناعي واللغات في أبوظبي — صباحاً أو مساءً خلال أيام الأسبوع، وبالعربية أو الإنجليزية، بإشراف كادرنا التدريبي.</p>
      <ul class="points">
        <li>12 دورة مجدولة في الشهادات المهنية وتقنية المعلومات واللغات</li>
        <li>حصص صفية من يومين إلى شهر كامل، من الاثنين إلى الجمعة</li>
        <li>تدريب داخلي متاح في مقر منشأتك في جميع أنحاء الإمارات</li>
      </ul>
      <div class="cta-row">
        <a class="btn btn-gold" href="{{ route('schedule-ar') }}">سجّل في الدفعة القادمة ←</a>
        <a class="btn btn-outline-light" href="https://wa.me/9710506399915">واتساب 050 6399915</a>
      </div>
    </div>
    <div class="hero-box hero-slider">
      <div class="hs-slide active"><img class="bg" src="https://picsum.photos/seed/compubase-class/900/700" alt="قاعة تدريب في كمبيوبيس أبوظبي"><div class="cap">حصص صفية من الاثنين إلى الجمعة — مجموعات صباحية ومسائية</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cert/900/700" alt="التحضير للشهادات المهنية"><div class="cap">التحضير لامتحانات إدارة المشاريع والتدقيق والمحاسبة مع كادرنا الداخلي</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cyber/900/700" alt="ورش الأمن السيبراني والذكاء الاصطناعي"><div class="cap">ورش عملية في الأمن السيبراني والاختراق الأخلاقي والذكاء الاصطناعي</div></div>
      <div class="hs-arrows"><button class="hs-prev" aria-label="السابق">›</button><button class="hs-next" aria-label="التالي">‹</button></div>
      <div class="hs-dots"></div>
    </div>
  </div>
</section>

<!-- COURSE FINDER -->
<div class="container">
  <div class="finder">
    <div class="eyebrow">البحث عن دورة</div>
    <h3>تحقّق من أقرب مقعد متاح</h3>
    <form onsubmit="event.preventDefault();scrollSec('schedule')">
      <div class="field"><label>الفئة</label>
        <select><option>جميع الفئات</option><option>الشهادات المهنية</option><option>تقنية المعلومات والأمن السيبراني</option><option>اللغات والمهارات المكتبية</option></select></div>
      <div class="field"><label>الدورة</label>
        <select><option>أي دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field"><label>التوقيت المفضل</label>
        <select><option>صباحي أو مسائي</option><option>صباحي</option><option>مسائي</option></select></div>
      <button class="btn btn-navy" type="submit">عرض المواعيد ←</button>
    </form>
  </div>
</div>

<!-- ACCREDITATION -->
<section class="accred" id="accreditation">
  <div class="container" style="text-align:center">
    <div class="eyebrow">معتمدون ومعترف بنا من</div>
    <div class="marks">
      <div class="mark">أكتفيت</div>
      <div class="mark">المجلس الثقافي البريطاني</div>
      <div class="mark">آيلتس</div>
      <div class="mark">الرخصة الدولية لقيادة الحاسوب</div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="section" id="courses">
  <div class="container">
    <div class="eyebrow">فئات الدورات</div>
    <h2>ثلاثة مسارات، اثنتا عشرة دورة، ومقرّ واحد في أبوظبي.</h2>
    <p style="max-width:720px">سواء كنت تستعد لامتحان مهني، أو تنقل فريقك إلى مجال الأمن السيبراني والذكاء الاصطناعي، أو تبني مهارات اللغة والأوفيس التي تتطلبها بيئة العمل الإماراتية — فكل دوراتنا مجدولة حول أسبوع عمل كامل.</p>
    <div class="cat-grid">
      <div class="cat">
        <div class="num">01 <small>4 دورات</small></div>
        <h3>الشهادات المهنية</h3>
        <p>تحضير مركّز على الامتحانات لاعتمادات الإدارة المالية والتدقيق وإدارة المشاريع. التوقيت المسائي يناسب الموظفين بدوام كامل.</p>
        <table>
          <tr><td>شهادة إدارة المشاريع الاحترافية</td><td>40 ساعة</td></tr>
          <tr><td>شهادة المدقق الداخلي المعتمد</td><td>40 ساعة</td></tr>
          <tr><td>شهادة المحاسب الإداري المعتمد</td><td>40 ساعة</td></tr>
          <tr><td>شهادة مدقق نظم المعلومات المعتمد</td><td>40 ساعة</td></tr>
        </table>
        <a class="link" href="#" data-scroll="featured">عرض دورات الشهادات ←</a>
      </div>
      <div class="cat">
        <div class="num">02 <small>4 دورات</small></div>
        <h3>تقنية المعلومات والأمن السيبراني</h3>
        <p>دورات قصيرة وعملية تنقل الفريق من مرحلة الوعي إلى مرحلة القدرة — من الاستخدام اليومي للذكاء الاصطناعي إلى الاختراق الأخلاقي التطبيقي.</p>
        <table>
          <tr><td>شهادة الاختراق الأخلاقي المعتمدة</td><td>40 ساعة</td></tr>
          <tr><td>أساسيات الأمن السيبراني</td><td>40 ساعة</td></tr>
          <tr><td>أساسيات الذكاء الاصطناعي</td><td>18 ساعة</td></tr>
          <tr><td>هندسة الأوامر النصية</td><td>12 ساعة</td></tr>
        </table>
        <a class="link" href="#" data-scroll="featured">عرض دورات التقنية والأمن ←</a>
      </div>
      <div class="cat">
        <div class="num">03 <small>4 دورات</small></div>
        <h3>اللغات والمهارات المكتبية</h3>
        <p>الأساس الذي تُبنى عليه كل المؤهلات الأخرى: مهارات اللغة الإنجليزية والعربية وبرامج الأوفيس التي تتوقعها أي جهة عمل من اليوم الأول.</p>
        <table>
          <tr><td>دورة اللغة الإنجليزية</td><td>40 ساعة</td></tr>
          <tr><td>دورة التحضير لامتحان الآيلتس</td><td>20 ساعة</td></tr>
          <tr><td>اللغة العربية لغير الناطقين بها</td><td>20 ساعة</td></tr>
          <tr><td>مايكروسوفت أوفيس وكوبايلوت</td><td>30 ساعة</td></tr>
        </table>
        <a class="link" href="#" data-scroll="featured">عرض دورات اللغات ←</a>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED -->
<section class="section featured" id="featured">
  <div class="container">
    <div class="eyebrow">دورات هذه الدفعة</div>
    <h2>الدورات الأكثر طلباً لدى جهات العمل في أبوظبي.</h2>
    <p style="max-width:720px">تُعقد كل دورة من الاثنين إلى الجمعة في مقرّنا بأبوظبي، مع مجموعات صباحية ومسائية لتتمكن من التدرّب دون ترك عملك. تُخصّص المقاعد حسب أسبقية الاستفسار.</p>
    <div class="course-grid">
      <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة إدارة المشاريع الاحترافية</h3></div>
        <div class="body"><p>تغطية كاملة لمجالات امتحان إدارة المشاريع مع أسئلة تدريبية وساعات التواصل الخمس والثلاثين المطلوبة للتقديم.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة مدقق نظم المعلومات المعتمد</h3></div>
        <div class="body"><p>تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية المعتمدة، في مجموعة مسائية.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>شهادة الاختراق الأخلاقي المعتمدة</h3></div>
        <div class="body"><p>اختبر الأنظمة كما يفعل المهاجم، في مختبر خاضع للإشراف، واستعد لامتحان الشهادة المعتمدة.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الذكاء الاصطناعي</h3></div>
        <div class="body"><p>وظّف أدوات الذكاء الاصطناعي في مهام عملك اليومية — التقارير والصياغة والتحليل. لا حاجة للبرمجة.</p>
          <div class="meta"><div><span>المدة</span><b>3 أيام · 18 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة التحضير لامتحان الآيلتس</h3></div>
        <div class="body"><p>تدريب موقوت وتقنيات امتحان في الاستماع والقراءة والكتابة والمحادثة، مع تقييم لكل اختبار تجريبي.</p>
          <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">مهارات مكتبية</span><h3>مايكروسوفت أوفيس وكوبايلوت</h3></div>
        <div class="body"><p>إكسل وورد وباوربوينت وآوتلوك بمستوى احترافي، مع استخدام كوبايلوت طوال أيام الدورة.</p>
          <div class="meta"><div><span>المدة</span><b>أسبوع · 30 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="{{ route('contact-ar') }}">تفاصيل الدورة والرسوم ←</a></div></div>
    </div>
    <p class="foot">تصفّح الدورات الاثنتي عشرة كاملة أو اتصل بمستشار التدريب على <a href="tel:0506399915">050 6399915</a></p>
  </div>
</section>

<!-- SCHEDULE -->
<section class="section schedule" id="schedule">
  <div class="container">
    <div class="sched-head">
      <div>
        <div class="eyebrow">الدفعات القادمة</div>
        <h2>جميع مواعيد البدء في جدول واحد.</h2>
        <p style="max-width:640px">دفعات مؤكدة في مقر أبوظبي. إن لم يناسبك موعد، أخبرنا بالأسبوع الذي تفضّله وسنضمّك إلى المجموعة التالية.</p>
      </div>
      <a class="btn btn-outline" href="{{ route('contact-ar') }}">⤓ تحميل تقويم الدورات</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>المجموعات المؤكدة القادمة</caption>
        <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
        <tbody>
          <tr><td><b style="color:var(--navy)">شهادة إدارة المشاريع الاحترافية</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة الاختراق الأخلاقي المعتمدة</b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">أساسيات الأمن السيبراني</b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة المدقق الداخلي المعتمد</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة المحاسب الإداري المعتمد</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">دورة اللغة الإنجليزية</b></td><td>لغات</td><td>شهر · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">أساسيات الذكاء الاصطناعي</b></td><td>تقنية وأمن</td><td>3 أيام · 18 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">هندسة الأوامر النصية</b></td><td>تقنية وأمن</td><td>يومان · 12 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="{{ route('contact-ar') }}">سجّل</a></td></tr>
        </tbody>
      </table>
    </div>
    <p class="sched-note">يعرض الجدول 8 دورات من أصل 12. تُعقد جميع المجموعات من الاثنين إلى الجمعة في مقر أبوظبي.</p>
  </div>
</section>

<!-- FACTS -->
<section class="facts">
  <div class="container">
    <div class="fact"><b>12</b><p>دورة مجدولة في ثلاث فئات</p></div>
    <div class="fact"><b>2</b><p>توقيتان يومياً — مجموعات صباحية ومسائية</p></div>
    <div class="fact"><b>ع / إ</b><p>التدريس بالعربية أو الإنجليزية حسب الدورة</p></div>
    <div class="fact"><b>[X]</b><p>متدرّب تخرّج من مركزنا في أبوظبي — يُؤكَّد الرقم قبل النشر</p></div>
  </div>
</section>

<!-- CORPORATE -->
<section class="section corporate" id="corporate">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">التدريب المؤسسي والداخلي</div>
      <h2>درّب فريقك كاملاً. في مقرّك أو مقرّنا.</h2>
      <p class="lead">يمكن تقديم أي دورة على هذا الموقع بشكل خاص لمنشأة واحدة، مع تكييف المحتوى وفق أنظمتكم وسياساتكم وقطاعكم. أخبرنا بالفريق والهدف، ونحن نبني الجدول حول سير عملكم.</p>
      <ul class="corp-points">
        <li><b>التدريب في مقرّكم في جميع أنحاء الإمارات</b><span>أو في مجموعة خاصة بمقرّنا في أبوظبي — أيهما يوفّر وقت فريقكم أكثر.</span></li>
        <li><b>محتوى مصمّم حسب أدواركم الوظيفية</b><span>حالات عملية وتمارين وأمثلة تُعاد صياغتها حول العمل الفعلي لموظفيكم.</span></li>
        <li><b>سجلات حضور وشهادات إتمام</b><span>وثائق جاهزة لإدارات الموارد البشرية والامتثال دون متابعة منكم.</span></li>
      </ul>
      <div class="corp-cta">
        <a class="btn btn-gold" href="https://wa.me/9710506399915">واتساب 050 6399915</a>
        <small>تسري أسعار المجموعات ابتداءً من [العدد] متدربين.</small>
      </div>
    </div>
    <div class="proposal">
      <h3>اطلب عرضاً تدريبياً</h3>
      <p class="sub">ستة حقول فقط. يردّ عليك مستشار التدريب بالمواعيد والصيغة وعرض سعر مكتوب.</p>
      <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
        <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
        <div class="field"><label>المنشأة</label><input placeholder="اسم الشركة" required></div>
        <div class="field"><label>البريد الإلكتروني للعمل</label><input type="email" placeholder="name@company.ae" required></div>
        <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
        <div class="field"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
        <div class="field"><label>حجم الفريق</label><select><option>اختر النطاق</option><option>2–5</option><option>6–15</option><option>16–30</option><option>أكثر من 30</option></select></div>
        <div class="field full"><label>ما الهدف الذي تسعون إليه؟ <span style="text-transform:none;font-weight:400">اختياري</span></label>
          <textarea placeholder="مثال: اثنا عشر موظفاً مالياً جاهزون لامتحان المحاسب الإداري قبل نهاية العام."></textarea></div>
        <div class="full"><button class="btn btn-navy" style="width:100%">اطلب العرض</button>
          <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
      </form>
    </div>
  </div>
</section>

<!-- STEPS -->
<section class="section">
  <div class="container">
    <div class="eyebrow">خطوات التسجيل</div>
    <h2>ثلاث خطوات تفصلك عن مقعدك.</h2>
    <div class="steps-grid">
      <div class="step"><div class="eyebrow">الخطوة 01</div><h3>اختر الدورة والتوقيت</h3><p>استخدم أداة البحث عن الدورات أو اتصل بنا. سنخبرك بصراحة إن كانت الدورة تناسب مستواك، وسنقترح غيرها إن لم تكن كذلك.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 02</div><h3>أكّد مقعدك</h3><p>أكمل نموذج التسجيل وسدّد الرسوم. تصلك رسالة تأكيد مكتوبة بالمكان وتاريخ البدء والتوقيت اليومي.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 03</div><h3>احضر واحصل على شهادتك</h3><p>تدرّب من الاثنين إلى الجمعة في مجموعتك، ثم استلم شهادة الإتمام من كمبيوبيس مع إرشادات الامتحان إن كانت الدورة تؤدي إليه.</p></div>
    </div>
    <div class="steps-photo"><div class="photo-frame">📷 &nbsp;مكان الصورة: قاعة التدريب في كمبيوبيس، أو مدرّب أثناء الحصة، أو الاستقبال في مقر أبوظبي.</div></div>
  </div>
</section>

<!-- WHY -->
<section class="section why">
  <div class="container">
    <div class="eyebrow">لماذا كمبيوبيس</div>
    <h2>مركز تدريب مصمّم حول أسبوع العمل.</h2>
    <p style="max-width:700px">يعمل مركز كمبيوبيس للتدريب من مقرّ واحد في أبوظبي. كل دورة على هذا الموقع تُدرَّس في قاعاتنا، بكادرنا التدريبي، وبجدول مصمّم لمن لا يستطيع التوقف عن العمل من أجل الدراسة.</p>
    <div class="why-grid">
      <div class="why-item"><h3>مجموعات صباحية ومسائية</h3><p>المنهج نفسه مرتين يومياً، حتى لا يكون نظام مناوباتك سبباً لتأجيل مؤهلك.</p></div>
      <div class="why-item"><h3>التدريس بالعربية أو الإنجليزية</h3><p>المادة التدريبية والشرح باللغة التي يعمل بها فريقك.</p></div>
      <div class="why-item"><h3>قاعة حقيقية، لا مكتبة فيديو</h3><p>مجموعات صغيرة في قاعة فعلية، حيث يُجاب عن سؤالك لحظة طرحه.</p></div>
      <div class="why-item"><h3>إجابات صريحة حول الملاءمة</h3><p>إن لم تكن الدورة مناسبة لمستواك أو هدفك، سيخبرك المستشار بذلك قبل الدفع.</p></div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="section testi">
  <div class="container">
    <div class="eyebrow">من متدرّبينا</div>
    <h2>ماذا يقول المتدربون بعد الدورة؟</h2>
    <div class="placeholder-note">[تُستبدل الشهادات الثلاث بآراء حقيقية وموثّقة من متدرّبين سابقين، مع موافقة خطية قبل نشر الاسم أو جهة العمل.]</div>
    <div class="testi-grid">
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — أمر محدد غيّرته الدورة في طريقة عمله. جملتان أو ثلاث بكلماته.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — يُفضَّل من مجموعة مؤسسية يذكر كيف ناسب التدريب الداخلي سير عملهم.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — مرشّح لغات أو آيلتس صوت ثالث جيد يُظهر تنوّع المركز.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
    </div>
  </div>
</section>

<!-- ABOUT / SEO CONTENT -->
<section class="section seo-content" id="about">
  <div class="container">
    <div>
      <div class="eyebrow">عن تدريبنا</div>
      <h1>دورات تدريبية احترافية في أبوظبي، مصمّمة لمن هم على رأس عملهم</h1>
      <p>مركز كمبيوبيس للتدريب هو مزوّد تدريب صفّي في أبوظبي يقدّم التحضير للشهادات المهنية، ودورات تقنية المعلومات والأمن السيبراني، وتدريب اللغتين الإنجليزية والعربية. يُعقد كل برنامج من الاثنين إلى الجمعة بمجموعة صباحية وأخرى مسائية، حتى لا يكلّفك المؤهل إجازتك السنوية.</p>
      <p>تتراوح الدورات بين ورشة يومين في هندسة الأوامر النصية وشهر كامل من دروس اللغة الإنجليزية. وأياً كان اختيارك، فأنت تتدرّب في قاعة مع مدرّب من كمبيوبيس، لا وحدك أمام مقاطع مسجّلة.</p>
      <h3>دورات الشهادات لمحترفي المالية والتدقيق والمشاريع</h3>
      <p>يغطي مسار الشهادات أربعة من أكثر الاعتمادات طلباً في الوصف الوظيفي الإماراتي: إدارة المشاريع الاحترافية لمديري المشاريع، والمدقق الداخلي المعتمد، والمحاسب الإداري المعتمد، ومدقق نظم المعلومات المعتمد. تمتد كل دورة أربعين ساعة صفّية خلال أسبوع عمل، مع مجموعات مسائية للموظفين بدوام كامل. تُدفع رسوم الامتحان مباشرة للجهة المانحة وليست ضمن رسوم الدورة.</p>
      <h3>تدريب الأمن السيبراني والذكاء الاصطناعي لفرق العمل الإماراتية</h3>
      <p>تُطالَب المنشآت في أبوظبي اليوم بإثبات وعيها الأمني واستخدامها المسؤول للذكاء الاصطناعي. ومسارنا التقني يلبّي الأمرين: أساسيات الأمن السيبراني للموظفين، والاختراق الأخلاقي للفرق التقنية، وورشتا أساسيات الذكاء الاصطناعي وهندسة الأوامر النصية القصيرتان لبقية الموظفين — قصيرتان عمداً لتُحجزا لقسم كامل دون تعطيل شهر من العمل.</p>
      <h3>الإنجليزية والعربية ومهارات الأوفيس</h3>
      <p>اللغة هي الأساس تحت كل مؤهل آخر على هذا الموقع. ندرّس الإنجليزية العامة على مدى شهر، والتحضير للآيلتس خلال أسبوعين لمن حجز موعد امتحانه، والعربية لغير الناطقين بها للمقيمين الراغبين في عمل وحياة أكثر ثقة في الإمارات. وإلى جانبها، تغطي دورة أوفيس مع كوبايلوت برامج إكسل وورد وباوربوينت وآوتلوك بمستوى مهني.</p>
      <h3>تدريب مؤسسي في جميع أنحاء الإمارات</h3>
      <p>يمكن تقديم أي دورة مذكورة هنا بشكل خاص لمنشأة واحدة، في مقرّكم أو في مجموعة مغلقة بمقرّنا في أبوظبي. اطلب عرضاً تدريبياً وسيوافيك مستشارنا بالمواعيد والصيغة وعرض سعر مكتوب.</p>
    </div>
    <aside>
      <div class="side-box">
        <h4>الدورات الأكثر طلباً</h4>
        <ul>
          <li><a href="#" data-scroll="featured">شهادة إدارة المشاريع الاحترافية</a></li>
          <li><a href="#" data-scroll="featured">شهادة الاختراق الأخلاقي</a></li>
          <li><a href="#" data-scroll="featured">شهادة مدقق نظم المعلومات</a></li>
          <li><a href="#" data-scroll="featured">التحضير لامتحان الآيلتس</a></li>
          <li><a href="#" data-scroll="featured">أوفيس مع كوبايلوت</a></li>
          <li><a href="#" data-scroll="featured">العربية لغير الناطقين بها</a></li>
        </ul>
      </div>
      <div class="side-box calendar">
        <h4>تقويم الدورات</h4>
        <h3>احصل على جميع مواعيد البدء في ملف واحد</h3>
        <p>الدورات الاثنتا عشرة بمددها وتوقيتاتها في صفحة واحدة — مفيد عند طلب موافقة مديرك.</p>
        <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بالبريد قبل الإطلاق.')">
          <input type="email" placeholder="name@company.ae" required>
          <button class="btn btn-gold">أرسلوا لي التقويم</button>
        </form>
      </div>
    </aside>
  </div>
</section>

<!-- FAQ -->
<section class="section faq">
  <div class="container">
    <div class="head-row">
      <div>
        <div class="eyebrow">أسئلة شائعة</div>
        <h2>قبل أن تسجّل.</h2>
        <p>إن لم تجد سؤالك هنا، سيجيبك مستشار التدريب مباشرة.</p>
      </div>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">اسأل عبر واتساب</a>
    </div>
    <details open>
      <summary>هل تُدرَّس الدورات بالإنجليزية أم بالعربية؟</summary>
      <div class="a">باللغتين. تعتمد لغة التدريس على المجموعة. أخبرنا بلغتك المفضلة عند الاستفسار وسنضمّك إلى مجموعة تُدرَّس بها.</div>
    </details>
    <details><summary>هل يمكنني الحضور مساءً إذا كنت أعمل بدوام كامل؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>أين يقع مركز التدريب وهل تتوفر مواقف سيارات؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>هل أحصل على شهادة، وهل رسوم الامتحان مشمولة؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>كم تبلغ رسوم الدورة وكيف أدفع؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>هل تدرّبون فريقنا في مكاتبنا؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
  </div>
</section>

<!-- CLOSING -->
<section class="closing" id="contact">
  <div class="container">
    <div>
      <h2>التسجيل مفتوح الآن. حصص صباحية ومسائية متاحة.</h2>
      <p>مركز كمبيوبيس للتدريب، أبوظبي. اتصل أو راسلنا على واتساب 050 6399915.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route('schedule-ar') }}">سجّل الآن</a>
      <a class="btn btn-outline" href="tel:0506399915">050 6399915</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
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
