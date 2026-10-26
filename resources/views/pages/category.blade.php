@extends('layouts.site')

@use('App\Support\Catalog')
@php
    // One course category: $slug, $ar. Written copy comes from resources/content/categories; without it the page uses generic copy.
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $rich = fn (string $text) => Catalog::richText($text, $ar);
    $categories = Catalog::categories();
    $category = $categories[$slug];
    $name = $ar ? $category['ar'] : $category['en'];
    $courses = array_values($category['courses']);
    $count = count($courses);
    $days = array_column($courses, 'days');
    $minDays = $days ? min($days) : 0;
    $maxDays = $days ? max($days) : 0;
    $groupNames = ['management' => $t('Management & Professional', 'الإدارة والتطوير المهني'), 'it' => $t('IT & Technology', 'تقنية المعلومات')];
    $groupName = $groupNames[$category['group']] ?? '';
    $slugs = array_keys($categories);
    $number = array_search($slug, $slugs) + 1;
    $siblings = array_filter($categories, fn ($c, $s) => $s !== $slug && $c['group'] === $category['group'], ARRAY_FILTER_USE_BOTH);
    $others = array_filter($categories, fn ($c) => $c['group'] !== $category['group']);
    $photos = array_slice(array_values(array_filter(array_map(fn ($c) => Catalog::photo($c), $courses))), 0, 3);
    $range = $minDays === $maxDays ? Catalog::duration($minDays, $ar) : ($ar ? 'من '.$minDays.' إلى '.Catalog::duration($maxDays, true) : $minDays.' to '.$maxDays.' days');
    $alt = Catalog::categoryUrl($slug, ! $ar);
    $initial = fn (string $title) => mb_strtoupper(mb_substr(preg_replace('/^(the|a|an)\s+/i', '', $title), 0, 1));
    $arrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>';

    $copy = Catalog::categoryContent($slug, $ar) ?? [];
    $intro = $copy['intro'] ?? [$category['group'] === 'it'
        ? $t('Hands-on classroom courses that build the technical skills UAE employers ask for — taught by practitioners at our Abu Dhabi campus, in morning or evening groups.', 'دورات صفّية تطبيقية تبني المهارات التقنية التي تطلبها جهات العمل في الإمارات — يقدّمها مدربون ممارسون في مقرّنا بأبوظبي، بمجموعات صباحية أو مسائية.')
        : $t('Practical classroom programmes for professionals and teams who want results they can use at work the next morning — at our Abu Dhabi campus, in morning or evening groups.', 'برامج صفّية عملية للمهنيين وفرق العمل الذين يريدون نتائج يطبّقونها في عملهم من اليوم التالي — في مقرّنا بأبوظبي، بمجموعات صباحية أو مسائية.')];
    $start = $copy['start'] ?? null;
    $chapters = $copy['sections'] ?? [];
    $choose = $copy['choose'] ?? null;
    $team = $copy['team'] ?? [
        'heading' => $t('Training a whole team in '.$category['en'].'?', 'تدريب فريق كامل في '.$category['ar'].'؟'),
        'text' => [$t('Tell us the size of your team and the outcomes you need. We will send a proposal with a tailored outline, dates and a group fee.', 'أخبرنا بحجم فريقك والنتائج التي تحتاجها، وسنرسل لك عرضاً يتضمّن مخططاً مخصصاً ومواعيد ورسوماً للمجموعة.')],
    ];
    $contact = $copy['contact'] ?? [
        'heading' => $t('Contact Us to Start Your Training', 'تواصل معنا لتبدأ تدريبك'),
        'text' => [$t('Call or WhatsApp +971 56 689 3378, or send us a message through the [[page:contact|contact page]]. Tell us which course you’re after and we’ll let you know when it next runs.', 'اتصل بنا أو راسلنا عبر واتساب على ‎+971 56 689 3378، أو أرسل إلينا رسالة عبر [[page:contact|صفحة التواصل]]. أخبرنا بالدورة التي تريدها، وسنخبرك بموعد انعقادها القادم.')],
    ];
    $faqs = $copy['faq'] ?? [
        [$t('How many courses are in this category?', 'كم عدد الدورات في هذه الفئة؟'), $t("There are {$count} courses in the CompuBase {$category['en']} category.", "تضم فئة {$category['ar']} في كمبيوبيس {$count} دورة.")],
        [$t('How long are the courses in this category?', 'كم تستغرق الدورات في هذه الفئة؟'), $t("Courses in this category run for {$range}, Monday to Friday, in a morning or an evening group.", "تمتد الدورات في هذه الفئة {$range}، من الاثنين إلى الجمعة، بمجموعة صباحية أو مسائية.")],
        [$t('Can a company book a private group?', 'هل يمكن للشركة حجز مجموعة خاصة؟'), $t('Yes. CompuBase can run any course in this category as private training at a company’s office anywhere in the UAE.', 'نعم. يمكن لكمبيوبيس تقديم أي دورة في هذه الفئة كتدريب خاص في مكتب الشركة في أي مكان بالإمارات.')],
        [$t('Can I take these courses in Arabic?', 'هل يمكنني حضور هذه الدورات بالعربية؟'), $t('Yes. CompuBase teaches these courses in Arabic and English.', 'نعم. تقدّم كمبيوبيس هذه الدورات بالعربية والإنجليزية.')],
    ];
    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'inLanguage' => $ar ? 'ar' : 'en',
        'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f[1]]], $faqs),
    ];
@endphp

@section('page', $ar ? 'category-ar' : 'category')
@section('title', $copy['title'] ?? $t($name.' Courses in Abu Dhabi — CompuBase Training Center', 'دورات '.$name.' في أبوظبي — مركز كمبيوبيس للتدريب'))
@if ($ar)@section('lang', 'ar')@endif
@section('description', $copy['description'] ?? $t($count.' '.$name.' courses of '.$range.' at CompuBase Training Center, Abu Dhabi. Morning and evening classes, Monday to Friday.', $count.' دورة في '.$name.' مدتها '.$range.' في مركز كمبيوبيس للتدريب بأبوظبي. حصص صباحية ومسائية من الاثنين إلى الجمعة.'))
@if ($photos)@section('og_image', $photos[0])@endif

@section('content')
<div class="page active" id="pg-category" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $t('Home', 'الرئيسية') }}</a><span>/</span><a href="{{ route($ar ? 'categories-ar' : 'categories') }}">{{ $t('Categories', 'الفئات') }}</a><span>/</span><b style="color:var(--navy)">{{ $name }}</b></div></div>

<link rel="stylesheet" href="{{ asset('css/home.css') }}?v={{ filemtime(base_path('css/home.css')) }}">
<link rel="stylesheet" href="{{ asset('css/category.css') }}?v={{ filemtime(base_path('css/category.css')) }}">
<div class="nx-progress" aria-hidden="true"><span></span></div>
<div class="nx cx">

<!-- HERO -->
<section class="nx-hero cx-hero">
  <div class="nx-aurora" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="nx-grid-bg" aria-hidden="true"></div>
  <div class="container nx-hero-in">
    <div class="nx-hero-copy">
      <span class="nx-pill"><span class="nx-live-dot"></span>{{ $groupName }} · {{ $t('Category', 'الفئة') }} {{ sprintf('%02d', $number) }}</span>
      <h1>{{ $copy['h1'] ?? $t($name.' Courses in Abu Dhabi', 'دورات '.$name.' في أبوظبي') }}</h1>
      <p class="nx-lead">{!! $rich($intro[0]) !!}</p>
      <div class="nx-cta">
        <a class="nx-btn nx-btn-gold" href="#cat-courses" data-scroll="cat-courses">{{ $t('Browse the '.$count.' courses', 'تصفّح الدورات ('.$count.')') }} {!! $arrow !!}</a>
        <a class="nx-btn nx-btn-glass" href="https://wa.me/971566893378">@include('partials.wa-icon'){{ $t('WhatsApp 056 689 3378', 'واتساب 056 689 3378') }}</a>
      </div>
      <dl class="nx-hero-stats">
        <div><dt data-count="{{ $count }}">{{ $count }}</dt><dd>{{ $t('courses', 'دورة') }}</dd></div>
        <div><dt><span dir="ltr">{{ $minDays === $maxDays ? $minDays : $minDays.'–'.$maxDays }}</span></dt><dd>{{ $t('days per course', 'أيام لكل دورة') }}</dd></div>
        <div><dt>{{ $t('EN·AR', 'ع·EN') }}</dt><dd>{{ $t('languages', 'لغتان') }}</dd></div>
      </dl>
    </div>
    <div class="nx-collage" data-parallax>
      @forelse ($photos as $photo)
      <figure class="nx-shot nx-shot-{{ ['a', 'b', 'c'][$loop->index] }}"><img src="{{ $photo }}" alt="" loading="{{ $loop->first ? 'eager' : 'lazy' }}"></figure>
      @empty
      <figure class="nx-shot nx-shot-a cx-mark"><span>{{ $initial($category['en']) }}</span></figure>
      @endforelse
      <div class="nx-float nx-float-1"><span class="nx-float-ico">☀</span><div><b>{{ $t('Morning or evening', 'صباحاً أو مساءً') }}</b><small>{{ $t('Monday to Friday', 'من الاثنين إلى الجمعة') }}</small></div></div>
      <div class="nx-float nx-float-2"><span class="nx-float-ico">✓</span><div><b>{{ $t('ACTVET No. 725', 'ACTVET رقم 725') }}</b><small>{{ $t('Licensed in Abu Dhabi', 'مرخّص في أبوظبي') }}</small></div></div>
    </div>
  </div>
</section>

@if ($siblings)
<nav class="cat-switch" aria-label="{{ $t('Other categories in '.$groupName, 'فئات أخرى في '.$groupName) }}">
  <div class="container">
    <span class="cat-switch-label">{{ $groupName }}</span>
    <div class="cat-switch-row">
      @foreach ($categories as $s => $c)
        @continue($c['group'] !== $category['group'])
        <a href="{{ Catalog::categoryUrl($s, $ar) }}" @if ($s === $slug) class="on" aria-current="page" @endif>{{ $ar ? $c['ar'] : $c['en'] }} <span>{{ count($c['courses']) }}</span></a>
      @endforeach
    </div>
  </div>
</nav>
@endif

@if ($start || count($intro) > 1)
<!-- WHERE TO START -->
<section class="nx-sec cx-start">
  <div class="container cx-start-in">
    <div class="cx-start-copy" data-reveal>
      <span class="nx-kicker">{{ $t('Where to start', 'من أين تبدأ') }}</span>
      @if ($start)<h2 class="nx-h2">{{ $start['heading'] }}</h2>@endif
      @foreach (array_slice($intro, 1) as $line)
      <p class="cx-callout">{!! $rich($line) !!}</p>
      @endforeach
      @foreach ($start['text'] ?? [] as $line)
      <p>{!! $rich($line) !!}</p>
      @endforeach
    </div>
    @if (! empty($start['picks']))
    <div class="cx-picks">
      <div class="cx-picks-head"><span>{{ $t('Popular courses', 'دورات مطلوبة') }}</span><span>{{ $t('Days', 'الأيام') }}</span><span>{{ $t('Best for', 'الأنسب لـ') }}</span></div>
      @foreach ($start['picks'] as [$pickSlug, $pickTitle, $pickFor])
      @php($pick = Catalog::find($pickSlug))
      @continue(! $pick)
      <a class="cx-pick nx-spot" href="{{ Catalog::url($pick, $ar) }}" data-reveal>
        <span class="cx-pick-n">{{ sprintf('%02d', $loop->iteration) }}</span>
        <b>{{ $pickTitle }}</b>
        <span class="cx-pick-days">{{ Catalog::duration($pick['days'], $ar) }}</span>
        <small>{{ $pickFor }}</small>
      </a>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

<!-- COURSES -->
<section class="section cat-courses" id="cat-courses" data-none="{{ $t('No course matches your search.', 'لا توجد دورة تطابق بحثك.') }}">
  <div class="container">
    <div class="cat-courses-head">
      <div>
        <span class="nx-kicker">{{ $t('The courses', 'الدورات') }}</span>
        <h2 class="nx-h2">{{ $t('Choose from '.$count.' courses', 'اختر من بين '.$count.' دورة') }}</h2>
      </div>
      <div class="cat-tools">
        <input type="search" class="cat-search" placeholder="{{ $t('Search '.$count.' courses…', 'ابحث في '.$count.' دورة…') }}" aria-label="{{ $t('Search the courses in this category', 'ابحث في دورات هذه الفئة') }}">
        <div class="cat-days" role="group" aria-label="{{ $t('Duration', 'المدة') }}">
          <button type="button" class="on" data-days="">{{ $t('Any length', 'كل المدد') }}</button>
          <button type="button" data-days="short">{{ $t('Up to 3 days', 'حتى 3 أيام') }}</button>
          <button type="button" data-days="week">{{ $t('4 – 5 days', '4 – 5 أيام') }}</button>
          <button type="button" data-days="long">{{ $t('More than a week', 'أكثر من أسبوع') }}</button>
        </div>
      </div>
    </div>
    <div class="cp-grid">
      @foreach ($courses as $course)
      @php($photo = Catalog::photo($course))
      <a class="cp-card" href="{{ Catalog::url($course, $ar) }}" data-title="{{ mb_strtolower($course['en'].' '.$course['ar']) }}" data-days="{{ $course['days'] }}">
        <div class="cp-photo">
          @if ($photo)<img src="{{ $photo }}" alt="" loading="lazy">@else<div class="cp-mark">{{ $initial($course['en']) }}</div>@endif
          <span class="cp-days">{{ Catalog::duration($course['days'], $ar) }}</span>
          <span class="cp-num">{{ sprintf('%02d', $loop->iteration) }}</span>
        </div>
        <div class="cp-body">
          <h3>{{ Catalog::title($course, $ar) }}</h3>
          @if ($sum = Catalog::summary($course, $ar))<p>{{ $sum }}</p>@endif
          <div class="cp-foot"><span>{{ $t('Mon – Fri · Morning or evening', 'الاثنين – الجمعة · صباحي أو مسائي') }}</span><b>{{ $t('Details →', 'التفاصيل ←') }}</b></div>
        </div>
      </a>
      @endforeach
    </div>
    <p class="cat-empty" hidden></p>
  </div>
</section>

@if ($chapters)
<!-- GUIDE: sticky nav + chapters -->
<section class="nx-sec nx-story cx-guide" id="guide">
  <div class="container">
    <nav class="nx-story-nav" aria-label="{{ $t('On this page', 'في هذه الصفحة') }}">
      @foreach ($chapters as $i => $chapter)
      <a href="#guide-{{ $i + 1 }}" @if ($loop->first) class="on" @endif data-i="{{ $i }}"><span>{{ sprintf('%02d', $i + 1) }}</span>{{ $chapter['heading'] }}</a>
      @endforeach
    </nav>
    <div class="nx-chapters cx-chapters">
      @foreach ($chapters as $i => $chapter)
      <article class="nx-chapter" id="guide-{{ $i + 1 }}" data-i="{{ $i }}">
        <span class="nx-kicker">{{ sprintf('%02d', $i + 1) }} — {{ $name }}</span>
        <h2 class="nx-h2">{{ $chapter['heading'] }}</h2>
        @foreach ($chapter['text'] as $line)
        <p>{!! $rich($line) !!}</p>
        @endforeach
      </article>
      @endforeach
    </div>
    @if ($choose)
    <div class="cx-choose" data-reveal>
      <div class="nx-aurora nx-aurora-soft" aria-hidden="true"><i></i><i></i><i></i></div>
      <span class="nx-kicker nx-kicker-light">{{ $t('Not sure yet?', 'لم تقرّر بعد؟') }}</span>
      <h2 class="nx-h2">{{ $choose['heading'] }}</h2>
      @foreach ($choose['text'] as $line)
      <p>{!! $rich($line) !!}</p>
      @endforeach
    </div>
    @endif
  </div>
</section>
@endif

<!-- WHY (bento) -->
<section class="nx-sec nx-why cx-why">
  <div class="container">
    <div class="nx-center-head" data-reveal>
      <span class="nx-kicker">{{ $t('Why learn with CompuBase', 'لماذا تتعلّم مع كمبيوبيس') }}</span>
      <h2 class="nx-h2">{{ $t('Built around a full working week.', 'مصمَّمة حول أسبوع العمل الكامل.') }}</h2>
    </div>
    <div class="nx-bento nx-bento-why">
      <div class="nx-tile nx-spot" data-reveal><b class="cx-why-n">01</b><h3>{{ $t('Licensed in Abu Dhabi', 'مرخّص في أبوظبي') }}</h3><p>{{ $t('A training centre licensed by ACTVET, with official test centre and vendor partnerships.', 'مركز تدريب مرخّص من ACTVET، مع شراكات رسمية لمراكز الاختبار ومزوّدي التقنية.') }}</p></div>
      <div class="nx-tile nx-spot" data-reveal><b class="cx-why-n">02</b><h3>{{ $t('Morning or evening', 'صباحاً أو مساءً') }}</h3><p>{{ $t('Every course runs Monday to Friday, with a morning group and an evening group to fit around work.', 'تُعقد كل دورة من الاثنين إلى الجمعة، بمجموعة صباحية وأخرى مسائية تناسب مواعيد عملك.') }}</p></div>
      <div class="nx-tile nx-spot" data-reveal><b class="cx-why-n">03</b><h3>{{ $t('Completion certificate', 'شهادة إتمام') }}</h3><p>{{ $t('Finish the course and collect your CompuBase completion certificate, with exam guidance where the course leads to one.', 'أكمل الدورة واستلم شهادة الإتمام من كمبيوبيس، مع إرشادات الامتحان حين تؤهّل الدورة له.') }}</p></div>
      <div class="nx-tile nx-spot" data-reveal><b class="cx-why-n">04</b><h3>{{ $t('In-house for teams', 'تدريب داخلي للفرق') }}</h3><p>{{ $t('Any course here can be delivered privately for your organisation, at our campus or yours.', 'يمكن تقديم أي دورة هنا بشكل خاص لمؤسستك، في مقرّنا أو في مقرّكم.') }}</p></div>
    </div>
  </div>
</section>

<!-- CORPORATE -->
<section class="nx-sec nx-corp" id="corporate">
  <div class="nx-aurora nx-aurora-soft" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="container nx-corp-in">
    <div class="nx-corp-copy" data-reveal>
      <span class="nx-kicker nx-kicker-light">{{ $t('Corporate training', 'التدريب المؤسسي') }}</span>
      <h2 class="nx-h2">{{ $team['heading'] }}</h2>
      @foreach ($team['text'] as $line)
      <p>{!! $rich($line) !!}</p>
      @endforeach
      <ol class="nx-timeline">
        <li data-reveal><span>1</span><div><b>{{ $t('Brief', 'الملخّص') }}</b><p>{{ $t('Tell us the team size and what needs to change.', 'أخبرنا بحجم الفريق وما الذي تريد تغييره.') }}</p></div></li>
        <li data-reveal><span>2</span><div><b>{{ $t('Proposal', 'العرض') }}</b><p>{{ $t('We send back content, days and cost.', 'نرسل إليك المحتوى وعدد الأيام والتكلفة.') }}</p></div></li>
        <li data-reveal><span>3</span><div><b>{{ $t('Training', 'التدريب') }}</b><p>{{ $t('At your office anywhere in the UAE, or at our Abu Dhabi campus.', 'في مكتبك في أي مكان بالإمارات، أو في مقرّنا بأبوظبي.') }}</p></div></li>
      </ol>
    </div>
    <div class="nx-form-card proposal" data-reveal>
      <h3>{{ $t('Request a training proposal', 'اطلب عرضاً تدريبياً') }}</h3>
      <p class="sub">{{ $t('Tell us about your team. We reply with content, duration and cost.', 'أخبرنا عن فريقك، ونردّ عليك بالمحتوى والمدة والتكلفة.') }}</p>
      @include('partials.enquiry-form', ['type' => 'proposal', 'ar' => $ar])
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="nx-sec nx-faq">
  <div class="container nx-faq-in">
    <div class="nx-faq-side" data-reveal>
      <span class="nx-kicker">{{ $t('Common questions', 'أسئلة شائعة') }}</span>
      <h2 class="nx-h2">{{ $t('Frequently Asked Questions', 'الأسئلة الشائعة') }}</h2>
      <div class="nx-faq-card">
        <b>{{ $t('Still have a question?', 'هل لديك سؤال آخر؟') }}</b>
        <p>{{ $t('Call 02 677 1117 or message us on WhatsApp.', 'اتصل على 02 677 1117 أو راسلنا عبر واتساب.') }}</p>
        <a class="nx-btn nx-btn-gold" href="https://wa.me/971566893378">@include('partials.wa-icon'){{ $t('Ask on WhatsApp', 'اسأل عبر واتساب') }}</a>
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
        <h2 class="nx-h2">{{ $contact['heading'] }}</h2>
        @foreach ($contact['text'] as $line)
        <p>{!! $rich($line) !!}</p>
        @endforeach
      </div>
      <div class="nx-end-actions">
        <a class="nx-btn nx-btn-gold" href="https://wa.me/971566893378">@include('partials.wa-icon'){{ $t('WhatsApp us', 'راسلنا عبر واتساب') }}</a>
        <a class="nx-btn nx-btn-glass" href="tel:+97126771117">{{ $t('Call 02 677 1117', 'اتصل على 02 677 1117') }}</a>
      </div>
    </div>
  </div>
</section>

<!-- MORE CATEGORIES -->
<section class="section cat-more">
  <div class="container">
    <span class="nx-kicker">{{ $t('Keep exploring', 'واصل الاستكشاف') }}</span>
    <div class="cat-more-top"><h2 class="nx-h2">{{ $t('More categories', 'فئات أخرى') }}</h2><a class="nx-btn nx-btn-dark" href="{{ route($ar ? 'categories-ar' : 'categories') }}">{{ $t('All categories', 'جميع الفئات') }} {!! $arrow !!}</a></div>
    @foreach (array_filter([$groupName => $siblings, ($groupNames[$category['group'] === 'it' ? 'management' : 'it'] ?? '') => $others]) as $heading => $list)
    <h3 class="cat-more-group">{{ $heading }}</h3>
    <div class="cat-more-grid">
      @foreach ($list as $s => $c)
      @php($cd = array_column($c['courses'], 'days'))
      <a class="cat-tile" href="{{ Catalog::categoryUrl($s, $ar) }}">
        <span class="n">{{ sprintf('%02d', array_search($s, $slugs) + 1) }}</span>
        <h4>{{ $ar ? $c['ar'] : $c['en'] }}</h4>
        <span class="m">{{ $t(count($c['courses']).' courses', count($c['courses']).' دورة') }}@if ($cd) · {{ min($cd) === max($cd) ? Catalog::duration(min($cd), $ar) : ($ar ? min($cd).' – '.Catalog::duration(max($cd), true) : min($cd).' – '.max($cd).' days') }}@endif</span>
        <span class="go" aria-hidden="true">{{ $ar ? '←' : '→' }}</span>
      </a>
      @endforeach
    </div>
    @endforeach
  </div>
</section>

<script src="{{ asset('js/home.js') }}?v={{ filemtime(base_path('js/home.js')) }}" defer></script>
</div><!-- /nx -->

@include('partials.site-footer')
</div>
@endsection
