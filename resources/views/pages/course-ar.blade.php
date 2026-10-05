@extends('layouts.site')

@use('App\Support\Catalog')
@php
    $title = Catalog::title($course, true);
    $duration = Catalog::duration($course['days'], true);
    $content = Catalog::content($course, true);
    $photo = Catalog::photo($course);
    $summary = Catalog::summary($course, true);
    $hasObjectives = $content && ($content['competencies'] || $content['objectives'] || $content['objectivesIntro']);
    $hasAudience = ! $content || $content['audience'];
    // An outline-only document has nothing for the Overview tab, so the page opens on the outline.
    $tabPhotos = config('course_tab_photos.'.$course['slug'], []);
    $tabPhoto = fn ($k) => ! empty($tabPhotos[$k]) && is_file(base_path($tabPhotos[$k])) ? asset($tabPhotos[$k]) : null;
    $hasOverview = ! $content || $photo || $content['overview'] || $content['methodology'] || ! empty($content['extra']);
@endphp

@section('page', 'course-ar')
@section('title', $title.' — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', $title.'، دورة مدتها '.$duration.' ضمن '.$course['catAr'].' في مركز كمبيوبيس للتدريب، أبوظبي.')
@section('og_image', $photo ?? '')

@section('content')
<div class="page active" id="pg-course-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ Catalog::url($course) }}" style="font-weight:700">EN</a>
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
      <a class="lang-btn" href="{{ Catalog::url($course) }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><a href="{{ route('courses-ar') }}">الدورات</a><span>/</span><a href="{{ route('courses-ar', ['go' => $course['cat']]) }}">{{ $course['catAr'] }}</a><span>/</span><b style="color:var(--navy)">{{ $title }}</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:12px;font-weight:800;letter-spacing:.02em;padding:5px 12px">{{ $course['catAr'] }}</span>
      <h1>{{ $title }}</h1>
      @if ($summary || ! $content)<p class="lead">{{ $summary ?? '[ملخص الدورة من مخطط دورات كمبيوبيس.]' }}</p>@endif
      <div class="hero-meta">
        <div><span>المدة</span><b>{{ $duration }}</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">2026 و2027</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>المدة</dt><dd>{{ $duration }}</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/971566893378">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs" role="tablist">
        @if ($hasOverview)<a href="#overview" data-tab="overview" class="active" role="tab">نظرة عامة</a>@endif
        @if ($hasObjectives || ! $content)<a href="#objectives" data-tab="objectives" role="tab">الأهداف</a>@endif
        <a href="#outline" data-tab="outline" @class(['active' => ! $hasOverview]) role="tab">محاور الدورة</a>
        @if ($hasAudience)<a href="#" data-scroll="attend-side">لمن هذه الدورة</a>@endif
      </div>

      @if ($hasOverview)
      <div class="tab-panel active" id="overview" role="tabpanel">
        @if ($photo)<img class="course-photo" src="{{ $photo }}" alt="{{ $title }}">@endif
        @if ($content)
        @if ($content['overview'])
        <h2>نبذة عن الدورة</h2>
        @foreach ($content['overview'] as $para)<p>{{ $para }}</p>@endforeach
        @endif
        @if ($content['methodology'])
        <h2>منهجية التدريب</h2>
        @foreach ($content['methodology'] as $para)<p>{{ $para }}</p>@endforeach
        @endif
        @foreach ($content['extra'] ?? [] as $section)
        <h2>{{ $section['title'] }}</h2>
        @php
            // Paragraphs and list items in document order: 'p' = next paragraph, 'i' = next list item.
            $blocks = [];
            $paras = $section['paras'];
            $items = $section['items'];
            foreach (str_split($section['order']) as $kind) {
                if ($kind === 'p') {
                    $blocks[] = ['p', array_shift($paras)];
                } elseif ($blocks && end($blocks)[0] === 'ul') {
                    $blocks[array_key_last($blocks)][1][] = array_shift($items);
                } else {
                    $blocks[] = ['ul', [array_shift($items)]];
                }
            }
        @endphp
        @foreach ($blocks as [$kind, $value])
          @if ($kind === 'p')<p>{{ $value }}</p>@else<ul class="outcomes">@foreach ($value as $item)<li>{{ $item }}</li>@endforeach</ul>@endif
        @endforeach
        @endforeach
        @else
        <h2>ماذا تغطي هذه الدورة</h2>
        <div class="placeholder-note">[وصف الدورة من مخطط دورات كمبيوبيس.]</div>
        @endif
      </div>
      @endif

      <div class="tab-panel" id="objectives" role="tabpanel">
        @if ($tabPhoto('objectives'))<img class="tab-photo" src="{{ $tabPhoto('objectives') }}" alt="{{ $title }}" loading="lazy">@endif
        @if ($content)
        @if ($content['competencies'])
        <h2>الكفاءات المستهدفة</h2>
        <ul class="outcomes">
          @foreach ($content['competencies'] as $item)<li>{{ $item }}</li>@endforeach
        </ul>
        @endif
        @if ($content['objectives'] || $content['objectivesIntro'])
        <h2>أهداف الدورة</h2>
        @foreach ($content['objectivesIntro'] as $para)<p>{{ $para }}</p>@endforeach
        <ul class="outcomes">
          @foreach ($content['objectives'] as $item)<li>{{ $item }}</li>@endforeach
        </ul>
        @endif
        @else
        <h2>بنهاية الدورة ستكون قادراً على</h2>
        <div class="placeholder-note">[مخرجات التعلّم من مخطط دورات كمبيوبيس.]</div>
        @endif
      </div>

      <div @class(['tab-panel', 'active' => ! $hasOverview]) id="outline" role="tabpanel">
        @if ($tabPhoto('outline'))<img class="tab-photo" src="{{ $tabPhoto('outline') }}" alt="{{ $title }}" loading="lazy">@endif
        <h2>محاور الدورة</h2>
        @if ($content)
        @foreach ($content['outline'] as $module)
          <div class="day"><div class="d">المحور {{ $loop->iteration }}</div><div><b>{{ $module['title'] }}</b>
            <ul class="module-items">
            @foreach ($module['items'] as $item)
              @if ($item['level'] === 0)
                @if (! $loop->first)</li>@endif
                <li>{{ $item['text'] }}
              @else
                @if ($loop->first || $module['items'][$loop->index - 1]['level'] === 0)<ul>@endif
                <li>{{ $item['text'] }}</li>
                @if ($loop->last || $module['items'][$loop->index + 1]['level'] === 0)</ul>@endif
              @endif
              @if ($loop->last)</li>@endif
            @endforeach
            </ul>
          </div></div>
        @endforeach
        @else
        @for ($day = 1; $day <= $course['days']; $day++)
          <div class="day"><div class="d">اليوم {{ $day }}</div><div><b>[موضوع اليوم {{ $day }}]</b><p>[تفاصيل الجلسة من مخطط الدورة.]</p></div></div>
        @endfor
        @endif
      </div>
    </div>
    <aside class="cs-side">
      @php
          $catCourses = Catalog::categories()[$course['cat']]['courses'] ?? [];
          $modules = $content ? count($content['outline'] ?? []) : 0;
          $wins = $content ? ($content['objectives'] ?: $content['competencies']) : [];
      @endphp
      <div class="cs-card">
        <h4>الدورة في لمحة</h4>
        <div class="cs-glance">
          <div><span>المدة</span><b>{{ $duration }}</b></div>
          @if ($modules)<div><span>الوحدات</span><b>{{ $modules }}</b></div>@else<div><span>الأيام</span><b>الاثنين–الجمعة</b></div>@endif
          <div><span>اللغة</span><b>العربية / الإنجليزية</b></div>
          <div><span>الأسلوب</span><b>حضوري</b></div>
          <div class="wide"><span>التوقيت</span><b>صباحاً أو مساءً · الاثنين–الجمعة</b></div>
        </div>
      </div>

      @if ($wins)
      <div class="cs-card">
        <h4>ستتمكّن من</h4>
        <ul class="cs-list">
          @foreach (array_slice($wins, 0, 3) as $item)<li>{{ $item }}</li>@endforeach
        </ul>
        @if ($hasObjectives && count($wins) > 3)<a class="cs-more" href="#objectives" data-open-tab="objectives">عرض الأهداف كاملة ({{ count($wins) }}) ←</a>@endif
      </div>
      @endif

      @if ($hasAudience)
      <div class="cs-card" id="attend-side">
        @if ($tabPhoto('audience'))<img class="cs-photo" src="{{ $tabPhoto('audience') }}" alt="{{ $title }}" loading="lazy">@endif
        <h4>لمن هذه الدورة</h4>
        @if ($content)
          <div class="cs-clamp">@foreach ($content['audience'] as $para)<p>{{ $para }}</p>@endforeach</div>
          <button type="button" class="cs-more cs-toggle" data-more="اقرأ المزيد ←" data-less="عرض أقل ↑">اقرأ المزيد ←</button>
        @else
        <div class="placeholder-note" style="margin-top:0">[الفئة المستهدفة من مخطط دورات كمبيوبيس.]</div>
        @endif
      </div>
      @endif

      <div class="cs-card cs-team">
        <h4>تدريب فريق؟</h4>
        <h3>نقدّم هذه الدورة في مقر مؤسستك</h3>
        <p>ننفّذها داخل مؤسستك في أنحاء الإمارات، في مواعيد تناسب سير عملك.</p>
        <a class="btn btn-gold" href="{{ route('corporate-ar') }}">اطلب عرض سعر ←</a>
      </div>

      @if (count($catCourses) > 1)
      <div class="cs-card">
        <h4>المزيد في {{ Catalog::category($course, true) }}</h4>
        <ul class="cs-rel">
          @foreach (Catalog::related($course, 4) as $other)
          <li><a href="{{ Catalog::url($other, true) }}">{{ Catalog::title($other, true) }}</a><small>{{ Catalog::duration($other['days'], true) }}</small></li>
          @endforeach
        </ul>
        <a class="cs-more" href="{{ route('courses-ar', ['go' => $course['cat']]) }}">عرض كل الدورات ({{ count($catCourses) }}) ←</a>
      </div>
      @endif

      <div class="cs-card">
        <h4>تحتاج مساعدة في الاختيار؟</h4>
        <p>تحدّث مع مستشار حول المستوى والتوقيت ومدى ملاءمة الدورة.</p>
        <div class="cs-help"><a class="wa" href="https://wa.me/971566893378">💬 واتساب</a><a href="tel:+97126771117">📞 اتصل بنا</a></div>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    @foreach (Catalog::related($course) as $other)
    <div class="rel-card"><div class="eyebrow">{{ $other['catAr'] }}</div><h3>{{ $other['ar'] }}</h3><p>{{ Catalog::duration($other['days'], true) }} · صباحي أو مسائي</p><a href="{{ Catalog::url($other, true) }}">تفاصيل الدورة ←</a></div>
    @endforeach
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/971566893378">واتساب</a></div>
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
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="{{ Catalog::url($course) }}">EN</a></span>
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
