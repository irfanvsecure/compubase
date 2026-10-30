@extends('layouts.site')

@section('page', 'home-ar')
@section('title', 'دورات تدريبية في الإمارات | كمبيوبيس أبوظبي')
@section('lang', 'ar')
@section('description', 'معهد تدريب في أبوظبي مرخّص من ACTVET يقدّم أكثر من 500 دورة في القيادة وتقنية المعلومات والمالية والسلامة وإدارة المشاريع في جميع أنحاء الإمارات. سجّل اليوم.')

@section('content')
<div class="page active" id="pg-home-ar" dir="rtl" lang="ar">

<!-- 01 UTILITY BAR -->
<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>أيام الأسبوع، من الاثنين إلى الجمعة</span><span>حصص صباحية ومسائية</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('home') }}" title="English version" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<!-- 02 HEADER -->
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home-ar') }}"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home-ar') }}">الرئيسية</a></li>
        @include('partials.nav-courses', ['ar' => true])
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

<!-- ================= HOMEPAGE ================= -->
@use('App\Support\Catalog')
@php
    $courseCount = count(Catalog::courses());
    $catCount = count(Catalog::categories());
    $course = fn (string $slug) => url('ar/course/'.$slug);
    $cat = fn (string $slug) => Catalog::categoryUrl($slug, true);
    $t = fn (string $slug) => Catalog::title(Catalog::find($slug), true);
    $faqs = [
        ['هل مركز كمبيوبيس للتدريب مرخّص؟', 'نعم. مركز كمبيوبيس للتدريب مرخّص من مؤسسة أبوظبي للتعليم والتدريب التقني والمهني (ACTVET) بترخيص رقم 725.'],
        ['كم تستغرق دورات كمبيوبيس؟', 'تمتد معظم دورات كمبيوبيس من ثلاثة إلى خمسة أيام، وتعرض صفحة كل دورة عدد أيامها بالضبط.'],
        ['هل يمكنني حضور دورة في كمبيوبيس باللغة العربية؟', 'نعم. يقدّم مركز كمبيوبيس دوراته بالعربية والإنجليزية، فتختار اللغة التي تفضّلها عند الاستفسار.'],
        ['هل يدرّب مركز كمبيوبيس فرق الشركات خارج أبوظبي؟', 'نعم. يمكن لمدرّبي كمبيوبيس تقديم جلسات داخلية في مكاتب العملاء في دبي وبقية الإمارات.'],
        ['كيف أحجز دورة في كمبيوبيس؟', 'اتصل بكمبيوبيس أو راسلنا عبر واتساب على ‎+971 56 689 3378، أو أرسل نموذج الاستفسار من صفحة أي دورة، وسيؤكّد لك الفريق أقرب موعد متاح.'],
    ];
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'inLanguage' => 'ar',
        'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $faqs),
    ];
    $arrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';
@endphp
<link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ filemtime(base_path('css/home.css')) }}">
<div class="nx-progress" aria-hidden="true"><span></span></div>
<div id="page-home" class="nx">

<!-- HERO -->
<section class="nx-hero">
  <div class="nx-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="nx-grid-bg" aria-hidden="true"></div>
  <div class="container nx-hero-in">
    <div class="nx-hero-copy">
      <span class="nx-pill"><span class="nx-live-dot"></span>مرخّص من ACTVET · ترخيص رقم 725</span>
      <h1>دورات تدريبية احترافية في أبوظبي و<span class="nx-grad">جميع أنحاء الإمارات</span></h1>
      <p class="nx-lead">مركز كمبيوبيس للتدريب معهد تدريب في أبوظبي مرخّص من مؤسسة أبوظبي للتعليم والتدريب التقني والمهني (ACTVET) بترخيص رقم 725. نقدّم أكثر من 500 دورة في الإدارة وتقنية المعلومات واللغات.</p>
      <div class="nx-cta">
        <a class="nx-btn nx-btn-gold" href="{{ route('courses-ar') }}">تصفّح جميع الدورات {!! $arrow !!}</a>
        <a class="nx-btn nx-btn-glass" href="https://wa.me/971566893378">@include('partials.wa-icon')واتساب 056 689 3378</a>
      </div>
      <dl class="nx-hero-stats">
        <div><dt data-count="500" data-prefix="+" dir="ltr">+500</dt><dd>دورة</dd></div>
        <div><dt data-count="{{ $catCount }}">{{ $catCount }}</dt><dd>فئة</dd></div>
        <div><dt dir="ltr">AR·EN</dt><dd>العربية والإنجليزية</dd></div>
      </dl>
    </div>
    <div class="nx-collage" data-parallax>
      <figure class="nx-shot nx-shot-a"><img src="{{ url('uploads/2026/10/trainer-presenting-to-professionals-abu-dhabi-zymcwu.jpg') }}" alt="مدرّب يقدّم عرضاً لمهنيين في قاعة كمبيوبيس المطلّة على أبوظبي"></figure>
      <figure class="nx-shot nx-shot-b"><img src="{{ url('uploads/2026/10/emirati-trainees-it-computer-lab-r0o03n.jpg') }}" alt="متدربون إماراتيون يعملون على الحواسيب في مختبر تقنية المعلومات بكمبيوبيس"></figure>
      <figure class="nx-shot nx-shot-c"><img src="{{ url('uploads/2026/10/emirati-professionals-group-discussion-laptops-yh21uf.jpg') }}" alt="مهنيون إماراتيون في نقاش ضمن مجموعة صغيرة"></figure>
      <div class="nx-float nx-float-1"><span class="nx-float-ico">☀</span><div><b>صباحاً أو مساءً</b><small>اختر المجموعة التي تناسب عملك</small></div></div>
      <div class="nx-float nx-float-2"><span class="nx-float-ico">✓</span><div><b>ACTVET رقم 725</b><small>مرخّص في أبوظبي</small></div></div>
    </div>
  </div>
</section>

<!-- COURSE FINDER -->
<div class="container nx-finder">
  @include('partials.course-finder', ['ar' => true])
</div>

<!-- ACCREDITATION -->
@include('partials.accreditation', ['ar' => true])

<!-- CATEGORIES -->
<section class="section nx-cats" id="courses">
  <div class="container">
    <div class="nx-head-row" data-reveal>
      <div><span class="nx-kicker">فئات الدورات</span><h2 class="nx-h2">أكثر من 500 دورة في {{ $catCount }} فئة.</h2></div>
      <a class="nx-btn nx-btn-dark" href="{{ route('categories-ar') }}">عرض جميع الفئات ({{ $catCount }}) {!! $arrow !!}</a>
    </div>
    <div class="cat-grid cat-grid-sm">
      @foreach (array_slice(Catalog::categories(), 0, 8, true) as $catSlug => $category)
      @php
          $catCourses = array_values($category['courses']);
          $photo = null;
          foreach ($catCourses as $c) {
              if ($photo = Catalog::photo($c)) {
                  break;
              }
          }
          $catMark = mb_strtoupper(mb_substr($category['en'], 0, 1));
      @endphp
      <a class="cat" href="{{ Catalog::categoryUrl($catSlug, true) }}" data-reveal>
        <div class="cat-photo">
          @if ($photo)<img src="{{ $photo }}" alt="" loading="lazy">@else<div class="cp-mark">{{ $catMark }}</div>@endif
          <span class="cat-photo-num">{{ sprintf('%02d', $loop->iteration) }}</span>
          <span class="cat-photo-count">{{ count($catCourses) }} دورة</span>
        </div>
        <div class="cat-body">
          <h3>{{ $category['ar'] }}</h3>
          <table>
            @foreach (array_slice($catCourses, 0, 3) as $c)
            <tr><td>{{ $c['ar'] }}</td><td>{{ Catalog::duration($c['days'], true) }}</td></tr>
            @endforeach
          </table>
          <span class="link">عرض جميع الدورات ({{ count($catCourses) }}) ←</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- PROGRAMMES: sticky visual + scrolling chapters -->
<section class="nx-sec nx-story" id="programmes">
  <div class="container">
    <nav class="nx-story-nav" aria-label="مجالات البرامج">
      <a href="#ch-management" class="on" data-i="0"><span>01</span>الإدارة والقيادة</a>
      <a href="#ch-it" data-i="1"><span>02</span>تقنية المعلومات والبيانات والأمن</a>
      <a href="#ch-finance" data-i="2"><span>03</span>المالية والمشاريع والسلامة</a>
    </nav>
    <div class="nx-story-grid">
      <div class="nx-stage" aria-hidden="true">
        <div class="nx-stage-card on" data-i="0">
          <img src="{{ url('uploads/2026/10/women-leadership-team-coaching-session-wlsqz7.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>دورات الإدارة لـ</small><div class="nx-chips"><span>الموارد البشرية</span><span>المبيعات</span><span>المشتريات</span><span>الجودة</span></div></div>
        </div>
        <div class="nx-stage-card" data-i="1">
          <img src="{{ url('uploads/2026/10/artificial-intelligence-using-python-fgrzgk.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>المسارات</small><div class="nx-chips"><span>الحوسبة السحابية</span><span>البيانات</span><span>الذكاء الاصطناعي</span><span>الأمن السيبراني</span></div></div>
        </div>
        <div class="nx-stage-card" data-i="2">
          <img src="{{ url('uploads/2026/10/pmp-preparation-course-skyline-gaxznz.jpg') }}" alt="" loading="lazy">
          <div class="nx-stage-glass"><small>البرامج</small><div class="nx-chips"><span>المالية</span><span>المشاريع</span><span>السلامة</span></div></div>
        </div>
        <div class="nx-stage-count"><b>01</b>/03</div>
      </div>

      <div class="nx-chapters">
        <article class="nx-chapter" id="ch-management" data-i="0">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/women-leadership-team-coaching-session-wlsqz7.jpg') }}" alt="مهنيات في جلسة تدريب على القيادة في كمبيوبيس" loading="lazy">
          <span class="nx-kicker">01 — الإدارة والقيادة</span>
          <h2 class="nx-h2">سجّل في دورات الإدارة والقيادة</h2>
          <figure class="nx-quote">
            <figcaption>عبارة نسمعها كثيراً.</figcaption>
            <blockquote>«تمّت ترقيتي، ولم يخبرني أحد كيف أدير الناس.»</blockquote>
          </figure>
          <p>هذا أمر طبيعي، وهو بالضبط سبب وجود <a href="{{ $cat('leadership-and-management') }}">دورات القيادة في الإمارات</a> لدينا. فبرامج مثل <a href="{{ $course('managing-self-and-leading-others') }}">{{ $t('managing-self-and-leading-others') }}</a> تتناول الجوانب الصعبة من العمل، كتقديم ملاحظات صريحة أو حلّ خلاف بين زميلين.</p>
          <p>تمنحك دورة إدارة الأعمال في الإمارات الصورة الأشمل، إذ توضّح كيف ترتبط الأهداف والخطط والقرارات في أنحاء الشركة. كما نقدّم دورات إدارية في الإمارات لموظفي الموارد البشرية والمبيعات والمشتريات والجودة، فالمشتري ومسؤول التوظيف لا يواجهان المشكلات نفسها. اطّلع على <a href="{{ $cat('leadership-and-management') }}">برامج القيادة والإدارة</a> لدينا لترى ما نقدّمه.</p>
          <div class="nx-linkrow">
            <a href="{{ $cat('human-resources-management') }}">الموارد البشرية</a><a href="{{ $cat('sales-and-marketing') }}">المبيعات</a><a href="{{ $cat('procurement-and-supply-chain-management') }}">المشتريات</a><a href="{{ $cat('quality-management') }}">الجودة</a>
          </div>
          <a class="nx-btn nx-btn-dark" href="{{ $cat('leadership-and-management') }}">استكشف برامج القيادة {!! $arrow !!}</a>
        </article>

        <article class="nx-chapter" id="ch-it" data-i="1">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/artificial-intelligence-using-python-fgrzgk.jpg') }}" alt="دورة الذكاء الاصطناعي باستخدام Python في كمبيوبيس" loading="lazy">
          <span class="nx-kicker">02 — تقنية المعلومات والبيانات والأمن</span>
          <h2 class="nx-h2">احجز مقعدك في دورات تقنية المعلومات والبيانات والأمن</h2>
          <p>تشمل <a href="{{ route('categories-ar') }}">دورات تقنية المعلومات في الإمارات</a> لدينا الحوسبة السحابية والبرمجة وإدارة خدمات تقنية المعلومات وغيرها. وتُعدّ دورة <a href="{{ $course('aws-certified-cloud-practitioner') }}">{{ $t('aws-certified-cloud-practitioner') }}</a> نقطة انطلاق شائعة.</p>
          <p>البيانات هي المجال الذي يرغب كثيرون في التطوّر فيه الآن. فإن كانت التقارير ولوحات المعلومات جزءاً من يومك، فإن دورة محلل البيانات في الإمارات تبني لك هذا الأساس. أما دورة علم البيانات في الإمارات فتذهب أبعد من ذلك، مع خيارات مثل <a href="{{ $course('artificial-intelligence-using-python') }}">{{ $t('artificial-intelligence-using-python') }}</a> و<a href="{{ $course('apache-pyspark-using-databricks') }}">{{ $t('apache-pyspark-using-databricks') }}</a>. ستجدها جميعاً في <a href="{{ $cat('ai-and-data-science') }}">فئة الذكاء الاصطناعي وعلوم البيانات</a>.</p>
          <p>تأتي دورات الأمن في الإمارات لدينا في مسارين.</p>
          <div class="nx-tracks">
            <a class="nx-track nx-spot" href="{{ $cat('cyber-security') }}">
              <span class="nx-ico"><svg viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 4.5-3.4 8.3-8 9-4.6-.7-8-4.5-8-9V6l8-3z"/><path d="M9 12l2 2 4-4"/></svg></span>
              <b>الأمن السيبراني</b>
              <span>دورات شهادات مثل الهاكر الأخلاقي المعتمد (CEH) وشهادة CISM.</span>
            </a>
            <a class="nx-track nx-spot" href="{{ $cat('physical-security-management') }}">
              <span class="nx-ico"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V8l7-5 7 5v13"/><path d="M10 21v-6h4v6"/></svg></span>
              <b>إدارة الأمن المادي</b>
              <span>للمسؤولين عن حماية المباني والمواقع.</span>
            </a>
          </div>
          <div class="nx-linkrow">
            <a href="{{ $course('certified-ethical-hacker-ceh-ec-council') }}">الهاكر الأخلاقي المعتمد (CEH)</a><a href="{{ $course('certified-information-security-manager-cism-isaca') }}">CISM</a><a href="{{ $cat('cloud-computing') }}">الحوسبة السحابية</a>
          </div>
        </article>

        <article class="nx-chapter" id="ch-finance" data-i="2">
          <img class="nx-chapter-img" src="{{ url('uploads/2026/10/pmp-preparation-course-skyline-gaxznz.jpg') }}" alt="دورة التحضير لشهادة PMP في إحدى قاعات كمبيوبيس" loading="lazy">
          <span class="nx-kicker">03 — المالية والمشاريع والسلامة</span>
          <h2 class="nx-h2">سجّل في برامج المالية والمشاريع والسلامة</h2>
          <div class="nx-stack">
            <div class="nx-stack-item">
              <h3>المالية ليست للمحاسبين وحدهم.</h3>
              <p>تتضمّن <a href="{{ $cat('accounting-and-finance') }}">دورات المالية في الإمارات</a> لدينا دورة <a href="{{ $course('accounting-for-non-accountants') }}">{{ $t('accounting-for-non-accountants') }}</a>، التي يلتحق بها كثير من المديرين ليتمكّنوا من قراءة الميزانية دون تخمين.</p>
            </div>
            <div class="nx-stack-item">
              <h3>نادراً ما تتعثّر المشاريع في لحظة واحدة كبيرة.</h3>
              <p>بل تنزلق قليلاً كل أسبوع. تعلّمك <a href="{{ $cat('project-management') }}">دورات إدارة المشاريع في الإمارات</a> لدينا، ومنها <a href="{{ $course('agile-project-management') }}">{{ $t('agile-project-management') }}</a>، كيف تحدّد النطاق، وتبني جدولاً زمنياً واقعياً، وتكتشف المشكلات مبكراً.</p>
            </div>
            <div class="nx-stack-item">
              <h3>السلامة أمر مختلف.</h3>
              <p>أي خطأ فيها قد يؤدي إلى إصابة أحدهم. تتضمّن دورات السلامة في الإمارات لدينا، ضمن <a href="{{ $cat('health-safety-and-environment') }}">برامج الصحة والسلامة والبيئة</a>، دورتي <a href="{{ $course('behavior-based-safety') }}">{{ $t('behavior-based-safety') }}</a> و<a href="{{ $course('emergency-response-planning-crisis-management-for-hazardous-environments') }}">التخطيط للاستجابة في حالات الطوارئ</a> للمشرفين وفرق المواقع.</p>
            </div>
          </div>
          <p class="nx-aside">إن كنت تبحث عن دورات إدارة الفعاليات في الإمارات، فاطّلع على <a href="{{ $cat('public-relations-and-media-training') }}">دورات العلاقات العامة والإعلام</a> لدينا، فهي تغطي جوانب التخطيط والرسائل في عمليات الإطلاق والفعاليات العامة.</p>
        </article>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED COURSES -->
<section class="section featured nx-featured" id="featured">
  <div class="container">
    <span class="nx-kicker">دورات هذه الدفعة</span>
    <div class="h2 nx-h2">الدورات التي تحجزها جهات العمل في أبوظبي الآن.</div>
    <div class="feat-filter">
      <div class="feat-groups" id="featGroups">
        <button type="button" class="active" data-g="all">جميع الدورات <span></span></button>
        <button type="button" data-g="management">الإدارة والمهارات المهنية <span></span></button>
        <button type="button" data-g="it">تقنية المعلومات والتكنولوجيا <span></span></button>
      </div>
      <div class="feat-rail" id="featRail" hidden>
        <button type="button" class="rail-arrow prev" aria-label="الفئات السابقة"><svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M15 5l-7 7 7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        <div class="feat-cats" id="filterTabs">
          @foreach (Catalog::categories() as $catSlug => $category)
          <button type="button" data-f="{{ $catSlug }}" data-g="{{ $category['group'] }}" data-name="{{ $category['ar'] }}">{{ $category['ar'] }} <span>{{ count($category['courses']) }}</span></button>
          @endforeach
        </div>
        <button type="button" class="rail-arrow next" aria-label="الفئات التالية"><svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M9 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
      </div>
    </div>
    <div class="course-grid" id="courseGrid"></div>
    <div class="feat-more" id="featMore"><a class="btn btn-outline" href="{{ route('courses-ar') }}">عرض جميع الدورات &larr;</a></div>
  </div>
</section>

<!-- WHO COMES TO US -->
<section class="nx-sec nx-people">
  <div class="container nx-people-in">
    <div class="nx-people-head" data-reveal>
      <span class="nx-kicker">من يأتي إلينا</span>
      <div class="h2 nx-h2">يأتينا الناس <em>لأسباب كثيرة ومختلفة.</em></div>
      <p>نُدرّس بالعربية أو الإنجليزية، ويمكنك اختيار مجموعة صباحية أو مسائية حتى لا يتأثر عملك.</p>
      <div class="nx-toggles" aria-hidden="true">
        <span class="nx-toggle"><b class="on">عربي</b><b>EN</b></span>
        <span class="nx-toggle"><b class="on">صباحاً</b><b>مساءً</b></span>
      </div>
    </div>
    <div class="nx-chat">
      <div class="nx-bubble" data-reveal><span class="nx-avatar">م</span><p>مشرف جديد يريد أن يتوقف عن الشعور بالضياع في الاجتماعات.</p></div>
      <div class="nx-bubble nx-bubble-r" data-reveal><span class="nx-avatar">ح</span><p>محاسب يحتاج إلى تحديث معارفه قبل التدقيق.</p></div>
      <div class="nx-bubble" data-reveal><span class="nx-avatar">HR</span><p>وأحياناً يحتاج مدير الموارد البشرية إلى تدريب فريق كامل، وبسرعة.</p></div>
    </div>
  </div>
</section>

<!-- SHORT COURSES AND FLEXIBLE LEARNING (bento) -->
<section class="nx-sec nx-flex" id="flexible">
  <div class="container">
    <div class="nx-center-head" data-reveal>
      <span class="nx-kicker">الدورات القصيرة والتعلّم المرن</span>
      <h2 class="nx-h2">سجّل في الدورات القصيرة والتعلّم المرن</h2>
    </div>
    <div class="nx-bento">
      <div class="nx-tile nx-tile-days nx-spot" data-reveal>
        <div class="nx-week" aria-hidden="true"><span>الاثنين</span><span>الثلاثاء</span><span>الأربعاء</span><span>الخميس</span><span>الجمعة</span></div>
        <div class="nx-bignum">3–5 <small>أيام</small></div>
        <p>معظم الناس لا يستطيعون التغيّب عن العمل لأسابيع. لذلك تمتد دوراتنا القصيرة في الإمارات عادةً من ثلاثة إلى خمسة أيام، فتتعلّم مهارة واحدة ثم تعود إلى مكتبك. ويعرض <a href="{{ route('courses-ar') }}">دليل الدورات الكامل</a> محتوى كل دورة ومدتها، لتقارن قبل أن تقرّر.</p>
      </div>
      <div class="nx-tile nx-tile-live nx-spot" data-reveal>
        <div class="nx-call" aria-hidden="true"><i></i><i></i><i></i><i></i><span class="nx-rec"><span class="nx-live-dot"></span>مباشر</span></div>
        <div class="h3">حصة افتراضية مباشرة</div>
        <p>نتلقّى أيضاً اتصالات حول الدورات عبر الإنترنت في الإمارات. إن كان فريقك موزّعاً على مكاتب مختلفة، فاسأل إن كان بالإمكان تقديم دورتك كحصة افتراضية مباشرة. وغالباً ما تكون المواد التقنية مثل <a href="{{ $cat('ai-and-data-science') }}">الذكاء الاصطناعي</a> و<a href="{{ $cat('cloud-computing') }}">الحوسبة السحابية</a> و<a href="{{ $cat('coding-and-programming') }}">البرمجة</a> أفضل الدورات عبر الإنترنت في الإمارات بهذه الصيغة، لأن العمل فيها يجري أصلاً على الشاشة.</p>
      </div>
      <div class="nx-tile nx-tile-cal" id="calendar" data-reveal>
        <span class="nx-kicker">تقويم الدورات</span>
        <div class="h3">احصل على جميع مواعيد البدء في ملف PDF</div>
        <p>جميع الدورات بمددها وتوقيتاتها في صفحة واحدة — مفيد عند طلب موافقة مديرك.</p>
        <div class="side-box calendar">@include('partials.enquiry-form', ['type' => 'calendar', 'ar' => true])</div>
      </div>
    </div>
  </div>
</section>

<!-- INTAKE SCHEDULE -->
<section class="section schedule nx-schedule" id="schedule">
  <div class="container">
    <div class="sched-head">
      <div>
        <span class="nx-kicker">الدفعات القادمة</span>
        <div class="h2 nx-h2">جميع مواعيد البدء في جدول واحد.</div>
      </div>
      <a class="btn btn-outline" href="{{ route('home-ar', ['go' => 'calendar']) }}" data-scroll="calendar">⤓ تحميل تقويم الدورات</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>المجموعات المؤكدة القادمة</caption>
        <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
        <tbody id="schedBody"></tbody>
      </table>
    </div>
    <p class="sched-note">يعرض الجدول أقرب {{ min(8, $courseCount) }} دورات. <a href="{{ route('schedule-ar') }}" style="font-weight:700;text-decoration:underline">اطّلع على الجدول الكامل</a></p>
  </div>
</section>

<!-- CORPORATE -->
<section class="nx-sec nx-corp" id="corporate">
  <div class="nx-aurora nx-aurora-soft" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="container nx-corp-in">
    <div class="nx-corp-copy" data-reveal>
      <span class="nx-kicker nx-kicker-light">التدريب المؤسسي والداخلي</span>
      <h2 class="nx-h2">اطلب عرض سعر للتدريب المؤسسي الداخلي</h2>
      <p>تبيعك كثير من شركات التدريب المؤسسي في الإمارات باقة جاهزة. أما نحن فنفضّل أن نسمع أولاً ما الذي لا يسير على ما يرام في فريقك، ثم نبني الدورة حول ذلك. ويمكن لمدرّبينا الحضور إلى مكتبك في أبوظبي أو دبي أو أي إمارة أخرى.</p>
      <ol class="nx-timeline">
        <li data-reveal><span>1</span><div><b>الملخّص</b><p>املأ ملخّصاً قصيراً في <a href="{{ route('corporate-ar') }}">صفحة التدريب المؤسسي</a>.</p></div></li>
        <li data-reveal><span>2</span><div><b>العرض</b><p>نرسل إليك عرضاً يوضّح المحتوى والمدة والتكلفة.</p></div></li>
        <li data-reveal><span>3</span><div><b>المقارنة</b><p>وهذا يسهّل مقارنتنا بأفضل شركات التدريب الأخرى في الإمارات.</p></div></li>
      </ol>
    </div>
    <div class="nx-form-card proposal" data-reveal>
      <div class="h3">اطلب عرضاً تدريبياً</div>
      <p class="sub">أخبرنا عن فريقك، ونردّ عليك بالمحتوى والمدة والتكلفة.</p>
      @include('partials.enquiry-form', ['type' => 'proposal', 'ar' => true])
    </div>
  </div>
</section>

<!-- WHY COMPUBASE (bento) -->
<section class="nx-sec nx-why">
  <div class="container">
    <div class="nx-center-head" data-reveal>
      <span class="nx-kicker">لماذا كمبيوبيس</span>
      <h2 class="nx-h2">لماذا يختار المتدربون كمبيوبيس</h2>
      <p>أمامك الكثير من معاهد التدريب في الإمارات للاختيار بينها. وهذه بعض الأسباب التي تجعل الناس يختاروننا:</p>
    </div>
    <div class="nx-bento nx-bento-why">
      <div class="nx-tile nx-tile-hero nx-spot" data-reveal>
        <div class="nx-bignum"><span data-count="500" data-prefix="+" dir="ltr">+500</span></div>
        <p>أكثر من 500 دورة، من القيادة والمالية إلى الأمن السيبراني والذكاء الاصطناعي</p>
        <div class="nx-orbit" aria-hidden="true"><span>القيادة</span><span>المالية</span><span>الأمن السيبراني</span><span>الذكاء الاصطناعي</span></div>
      </div>
      <div class="nx-tile nx-spot" data-reveal>
        <div class="nx-doc" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
        <p>محتوى واضح لكل دورة، لتعرف ما الذي تدفع مقابله</p>
      </div>
      <div class="nx-tile nx-spot" data-reveal>
        <div class="nx-switch" aria-hidden="true"><span>حصة عامة</span><span>خاصة</span></div>
        <p>حصص عامة للأفراد، أو جلسات خاصة لشركة واحدة</p>
      </div>
      <div class="nx-tile nx-tile-wide nx-spot" data-reveal>
        <div class="nx-places" aria-hidden="true"><span>أبوظبي</span><span>دبي</span><span>الشارقة</span><span>عجمان</span><span>أم القيوين</span><span>رأس الخيمة</span><span>الفجيرة</span></div>
        <p>مدرّبون مستعدّون للانتقال إلى موقعك حين يكون ذلك أسهل</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="nx-sec nx-faq">
  <div class="container nx-faq-in">
    <div class="nx-faq-side" data-reveal>
      <span class="nx-kicker">أسئلة شائعة</span>
      <h2 class="nx-h2">الأسئلة الشائعة</h2>
      <div class="nx-faq-card">
        <b>هل لديك سؤال آخر؟</b>
        <p>اتصل على 02 677 1117 أو راسلنا عبر واتساب.</p>
        <a class="nx-btn nx-btn-gold" href="https://wa.me/971566893378">@include('partials.wa-icon')اسأل عبر واتساب</a>
      </div>
    </div>
    <div class="nx-acc">
      @foreach ($faqs as [$q, $a])
      <details class="nx-acc-item" data-reveal @if ($loop->first) open @endif>
        <summary><span class="nx-acc-n">{{ sprintf('%02d', $loop->iteration) }}</span>{{ $q }}<i aria-hidden="true"></i></summary>
        <div class="nx-acc-body"><p>{{ $a }}</p></div>
      </details>
      @endforeach
    </div>
  </div>
  <script type="application/ld+json">{!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
</section>

<!-- CONTACT -->
<section class="nx-sec nx-end" id="contact">
  <div class="container">
    <div class="nx-end-card" data-reveal>
      <div class="nx-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
      <div class="nx-end-copy">
        <h2 class="nx-h2">تواصل معنا لحجز تدريبك</h2>
        <p>لديك سؤال، أو مستعد للحجز؟ أرسل إلينا رسالة عبر <a href="{{ route('contact-ar') }}">صفحة التواصل</a>. أخبرنا بالدورة التي تريدها، وعدد المشاركين، والموعد الذي يناسبك، وسنردّ عليك بأقرب حصة متاحة.</p>
      </div>
      <div class="nx-end-actions">
        <a class="nx-btn nx-btn-gold" href="{{ route('contact-ar') }}">أرسل لنا رسالة {!! $arrow !!}</a>
        <a class="nx-btn nx-btn-glass" href="tel:+97126771117">اتصل على 02 677 1117</a>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('js/home.js') }}?v={{ filemtime(base_path('js/home.js')) }}" defer></script>
</div><!-- /page-home -->

<!-- 18 FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:15px">تدريب صفّي في تطوير الذات، والقيادة والإدارة، والموارد البشرية، والمالية، وإدارة المشاريع والجودة، والصحة والسلامة، وتقنية المعلومات، والأمن السيبراني، والذكاء الاصطناعي. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      @include('partials.footer-courses', ['ar' => true])
      <div><div class="h4">اتصل بنا</div>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>من الاثنين إلى الجمعة</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="{{ route('privacy-ar') }}">سياسة الخصوصية</a><a href="{{ route('terms-ar') }}">الشروط والاسترداد</a><a href="{{ url('sitemap.xml') }}">خريطة الموقع</a><a href="{{ route('home') }}">EN</a></span>
    </div>
  </div>
</footer>

<!-- Mobile fixed contact bar -->
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')واتساب</a>
  <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل</a>
</div>


</div>
@endsection
