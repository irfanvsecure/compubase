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
      <a href="tel:+97126771117">📞 02 677 1117</a>
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
        <li><a href="{{ route('partners-ar') }}">شركاؤنا</a></li>
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
        <a class="btn btn-outline-light" href="https://wa.me/971566893378">واتساب 056 689 3378</a>
      </div>
    </div>
    <div class="hero-box hero-slider">
      <div class="hs-slide active"><img class="bg" src="{{ url('uploads/2026/10/itil-4-foundation-service-value-class-eqmevv.jpg') }}" alt="مدرّب يقود حصة صفية مع مهنيين في مركز كمبيوبيس أبوظبي"><div class="cap">حصص صفية من الاثنين إلى الجمعة — مجموعات صباحية ومسائية</div></div>
      <div class="hs-slide"><img class="bg" src="{{ url('uploads/2026/10/prince2-project-board-plan-presentation-yjldrv.jpg') }}" alt="مهنيون يستعدون لامتحانات إدارة المشاريع والشهادات المهنية"><div class="cap">التحضير لامتحانات إدارة المشاريع والتدقيق والمحاسبة مع كادرنا الداخلي</div></div>
      <div class="hs-slide"><img class="bg" src="{{ url('uploads/2026/10/certified-cyber-security-specialist-ccss-isucq2.jpg') }}" alt="متدربون في مختبر عملي للأمن السيبراني مع مدرّب"><div class="cap">ورش عملية في الأمن السيبراني والاختراق الأخلاقي والذكاء الاصطناعي</div></div>
      <div class="hs-arrows"><button class="hs-prev" aria-label="السابق">›</button><button class="hs-next" aria-label="التالي">‹</button></div>
      <div class="hs-dots"></div>
    </div>
  </div>
</section>

<!-- COURSE FINDER -->
<div class="container">
  @include('partials.course-finder', ['ar' => true])
</div>

<!-- ACCREDITATION -->
@include('partials.accreditation', ['ar' => true])

<!-- CATEGORIES -->
<section class="section" id="courses">
  <div class="container">
    <div class="eyebrow">فئات الدورات</div>
    @use('App\Support\Catalog')
    <h2>{{ count(Catalog::courses()) }} دورة، ومقرّ واحد في أبوظبي.</h2>
    <p style="max-width:720px">سواء كنت تستعد لامتحان مهني، أو تنقل فريقك إلى مجال الأمن السيبراني والذكاء الاصطناعي، أو تبني مهارات اللغة والأوفيس التي تتطلبها بيئة العمل الإماراتية — فكل دوراتنا مجدولة حول أسبوع عمل كامل.</p>
    <div class="cat-grid">
      @foreach (array_slice(Catalog::categories(), 0, 3, true) as $cat => $category)
      <div class="cat">
        <div class="num">{{ sprintf('%02d', $loop->iteration) }} <small>{{ count($category['courses']) }} دورة</small></div>
        <h3>{{ $category['ar'] }}</h3>
        <p>{{ count($category['courses']) }} دورة، مدة كل منها من {{ min(array_column($category['courses'], 'days')) }} إلى {{ max(array_column($category['courses'], 'days')) }} أيام، من الاثنين إلى الجمعة في مقر أبوظبي.</p>
        <table>
          @foreach (array_slice($category['courses'], 0, 4) as $course)
          <tr><td>{{ $course['ar'] }}</td><td>{{ Catalog::duration($course['days'], true) }}</td></tr>
          @endforeach
        </table>
        <a class="link" href="{{ route('courses-ar', ['go' => $cat]) }}">عرض جميع الدورات ←</a>
      </div>
      @endforeach
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
      @foreach (array_slice(Catalog::courses(), 0, 6) as $course)
        @include('partials.course-card', ['ar' => true])
      @endforeach
    </div>
    <p class="foot"><a href="{{ route('courses-ar') }}">تصفّح جميع الدورات ({{ count(Catalog::courses()) }})</a> أو اتصل بمستشار التدريب على <a href="tel:+97126771117">02 677 1117</a></p>
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
          @foreach (array_slice(Catalog::courses(), 0, 8) as $course)
          <tr><td><b style="color:var(--navy)">{{ $course['ar'] }}</b></td><td>{{ $course['catAr'] }}</td><td>{{ Catalog::duration($course['days'], true) }}</td><td>صباحي أو مسائي</td><td>2026 و2027</td><td><a href="{{ Catalog::url($course, true) }}">سجّل</a></td></tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <p class="sched-note">يعرض الجدول {{ min(8, count(Catalog::courses())) }} دورات من أصل {{ count(Catalog::courses()) }}. تُعقد جميع المجموعات من الاثنين إلى الجمعة في مقر أبوظبي.</p>
  </div>
</section>

<!-- FACTS -->
<section class="facts">
  <div class="container">
    <div class="fact"><b>{{ count(Catalog::courses()) }}</b><p>دورة مجدولة في {{ count(Catalog::categories()) }} فئة</p></div>
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
        <a class="btn btn-gold" href="https://wa.me/971566893378">واتساب 056 689 3378</a>
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
    <div class="steps-photo"><img src="{{ url('uploads/2026/10/azure-fundamentals-cloud-concepts-class-bevdhj.jpg') }}" alt="مدرّب يشرح المفاهيم على السبورة لمتدربي كمبيوبيس" loading="lazy"></div>
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
          @foreach (array_slice(Catalog::courses(), 0, 6) as $course)
          <li><a href="{{ Catalog::url($course, true) }}">{{ $course['ar'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="side-box calendar">
        <h4>تقويم الدورات</h4>
        <h3>احصل على جميع مواعيد البدء في ملف واحد</h3>
        <p>جميع الدورات بمددها وتوقيتاتها في صفحة واحدة — مفيد عند طلب موافقة مديرك.</p>
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
      <a class="btn btn-outline" href="https://wa.me/971566893378">اسأل عبر واتساب</a>
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
      <p>مركز كمبيوبيس للتدريب، أبوظبي. اتصل على 02 677 1117 أو راسلنا على واتساب 056 689 3378.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route('schedule-ar') }}">سجّل الآن</a>
      <a class="btn btn-outline" href="tel:+97126771117">02 677 1117</a>
    </div>
  </div>
</section>

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
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ route('home') }}">EN</a></span>
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
