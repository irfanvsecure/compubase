{{--
    Course page body, shared by course.blade.php and course-ar.blade.php.
    Hero card, action row, icon tabs (one panel at a time) and a sticky "Have a question?" card.
    Needs: $ar, $course, $title, $duration, $content, $photo, $summary,
           $hasObjectives, $hasAudience, $hasOverview, $tabPhoto.
--}}
@use('App\Support\Catalog')
@php
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $rich = fn ($text) => Catalog::richText($text, $ar);
    $catName = $ar ? $course['catAr'] : $course['catEn'];
    $catUrl = Catalog::categoryUrl($course['cat'], $ar);
    $contactUrl = route($ar ? 'contact-ar' : 'contact', ['course' => $course['slug']]).'#contact-form';
    $corporateUrl = route($ar ? 'corporate-ar' : 'corporate');
    $modules = $content ? count($content['outline'] ?? []) : 0;
    // "Why attend" in the hero: the course summary, or the first overview paragraph.
    $why = $summary ?: ($content['overview'][0] ?? null);
    $icon = fn ($d) => '<svg class="crs-ic" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">'.$d.'</svg>';
    $ic = [
        'overview' => '<path d="M4 19.5V4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5Z"/><path d="M8 7h8M8 11h6"/>',
        'objectives' => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>',
        'outline' => '<path d="M8 6h13M8 12h13M8 18h13"/><path d="M3 6h.01M3 12h.01M3 18h.01"/>',
        'audience' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'schedule' => '<rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>',
        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
        'pin' => '<path d="M12 22s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z"/><circle cx="12" cy="10" r="2.5"/>',
        'lang' => '<path d="M5 8h14M9 4v4M7 8c0 5 4 8 9 9M17 8c-1 4-4 7-9 9"/>',
        'class' => '<path d="M2 7l10-4 10 4-10 4L2 7Z"/><path d="M6 9v5c3 2.5 9 2.5 12 0V9"/>',
        'building' => '<rect x="4" y="2" width="16" height="20" rx="1"/><path d="M9 22v-4h6v4M8 6h.01M12 6h.01M16 6h.01M8 10h.01M12 10h.01M16 10h.01M8 14h.01M12 14h.01M16 14h.01"/>',
        'chat' => '<path d="M21 12a8 8 0 0 1-11.8 7L3 21l2-6.2A8 8 0 1 1 21 12Z"/>',
        'download' => '<path d="M12 3v12M7 10l5 5 5-5M5 21h14"/>',
        'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2Z"/>',
        'mail' => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>',
        'back' => '<path d="M19 12H5M12 19l-7-7 7-7"/>',
    ];
    $tabs = array_filter([
        'overview' => $hasOverview ? $t('Overview', 'نظرة عامة') : null,
        'objectives' => $hasObjectives ? $t('Objectives', 'الأهداف') : null,
        'outline' => $t('Course outline', 'محاور الدورة'),
        'audience' => $hasAudience ? $t('Who should attend', 'لمن هذه الدورة') : null,
        'schedule' => $t('Schedule & fees', 'المواعيد والرسوم'),
    ]);
    $first = array_key_first($tabs);
@endphp

<div class="crumbs crs-crumbs"><div class="container">
  <div><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $t('Home', 'الرئيسية') }}</a><span>/</span><a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $t('Courses', 'الدورات') }}</a><span>/</span><a href="{{ $catUrl }}">{{ $catName }}</a><span>/</span><b>{{ $title }}</b></div>
  <a class="crs-back" href="{{ $catUrl }}">{!! $icon($ic['back']) !!}{{ $t('Back to '.$catName, 'العودة إلى '.$catName) }}</a>
</div></div>

<section class="crs">
  <div class="container">

    <div class="crs-hero">
      <div class="crs-thumb">
        @if ($photo)<img src="{{ $photo }}" alt="{{ $title }}" width="440" height="330">@else<span class="cp-mark">{{ mb_substr($title, 0, 1) }}</span>@endif
      </div>
      <div class="crs-intro">
        <a class="crs-cat" href="{{ $catUrl }}">{{ $catName }}</a>
        <h1>{{ $title }}</h1>
        @if ($why)
        <div class="crs-why">{{ $t('Why attend', 'لماذا تحضر هذه الدورة') }}</div>
        <p>{!! $rich($why) !!}</p>
        @endif
      </div>
      <dl class="crs-facts">
        <div>{!! $icon($ic['clock']) !!}<dt>{{ $t('Duration', 'المدة') }}</dt><dd>{{ $duration }}</dd></div>
        <div>{!! $icon($ic['schedule']) !!}<dt>{{ $t('Timing', 'التوقيت') }}</dt><dd>{{ $t('Morning or evening', 'صباحي أو مسائي') }}</dd></div>
        <div>{!! $icon($ic['class']) !!}<dt>{{ $t('Format', 'الأسلوب') }}</dt><dd>{{ $modules ? $t($modules.' modules · Classroom', $modules.' وحدات · حضوري') : $t('Classroom', 'حضوري') }}</dd></div>
        <div>{!! $icon($ic['lang']) !!}<dt>{{ $t('Language', 'اللغة') }}</dt><dd>{{ $t('English / Arabic', 'العربية / الإنجليزية') }}</dd></div>
      </dl>
    </div>

    <div class="crs-actions">
      <div class="crs-links">
        <a href="{{ $corporateUrl }}">{!! $icon($ic['building']) !!}{{ $t('Request an in-house proposal', 'اطلب عرضاً للتدريب في مؤسستك') }}</a>
        <a href="https://wa.me/971566893378" target="_blank" rel="noopener">{!! $icon($ic['chat']) !!}{{ $t('Quick enquiry', 'استفسار سريع') }}</a>
        <button type="button" data-print-outline>{!! $icon($ic['download']) !!}{{ $t('Download outline', 'تحميل مخطط الدورة') }}</button>
        <a href="tel:+97126771117">{!! $icon($ic['phone']) !!}{{ $t('Call us', 'اتصل بنا') }}</a>
      </div>
      <a class="btn btn-navy crs-register" href="{{ $contactUrl }}">{{ $t('Register now', 'سجّل الآن') }}</a>
    </div>

    <div class="crs-body">
      <div class="crs-main">
        <div class="tabs crs-tabs" role="tablist">
          @foreach ($tabs as $key => $label)
          <a href="#{{ $key }}" data-tab="{{ $key }}" @class(['active' => $key === $first]) role="tab" aria-selected="{{ $key === $first ? 'true' : 'false' }}">{!! $icon($ic[$key]) !!}<span>{{ $label }}</span></a>
          @endforeach
        </div>

        @if ($hasOverview)
        <div @class(['tab-panel', 'crs-panel', 'active' => $first === 'overview']) id="overview" role="tabpanel">
          @if ($content)
          @if ($content['overview'])
          <h2>{{ $t('Course overview', 'نبذة عن الدورة') }}</h2>
          @foreach ($content['overview'] as $para)<p>{!! $rich($para) !!}</p>@endforeach
          @endif
          @if ($content['methodology'])
          <h2>{{ $t('Training methodology', 'منهجية التدريب') }}</h2>
          @foreach ($content['methodology'] as $para)<p>{!! $rich($para) !!}</p>@endforeach
          @endif
          @foreach ($content['extra'] ?? [] as $section)
          <h2>{{ $ar ? $section['title'] : ucfirst(strtolower($section['title'])) }}</h2>
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
            @if ($kind === 'p')<p>{!! $rich($value) !!}</p>@else<ul class="outcomes">@foreach ($value as $item)<li>{!! $rich($item) !!}</li>@endforeach</ul>@endif
          @endforeach
          @endforeach
          @else
          <h2>{{ $t('Course overview', 'نبذة عن الدورة') }}</h2>
          <p>{{ $t('Contact us for the full course description, objectives and outline.', 'تواصل معنا للحصول على الوصف الكامل للدورة وأهدافها ومحاورها.') }}</p>
          @endif
        </div>
        @endif

        @if ($hasObjectives)
        <div class="tab-panel crs-panel" id="objectives" role="tabpanel">
          @if ($tabPhoto('objectives'))<img class="tab-photo" src="{{ $tabPhoto('objectives') }}" alt="{{ $title }}" loading="lazy">@endif
          @if ($content['objectives'] || $content['objectivesIntro'])
          <h2>{{ $t('Course objectives', 'أهداف الدورة') }}</h2>
          @foreach ($content['objectivesIntro'] as $para)<p>{!! $rich($para) !!}</p>@endforeach
          <ul class="outcomes">
            @foreach ($content['objectives'] as $item)<li>{!! $rich($item) !!}</li>@endforeach
          </ul>
          @endif
          @if ($content['competencies'])
          <h2>{{ $t('Target competencies', 'الكفاءات المستهدفة') }}</h2>
          <ul class="crs-chips">
            @foreach ($content['competencies'] as $item)<li>{!! $rich($item) !!}</li>@endforeach
          </ul>
          @endif
        </div>
        @endif

        <div @class(['tab-panel', 'crs-panel', 'active' => $first === 'outline']) id="outline" role="tabpanel">
          @if ($tabPhoto('outline'))<img class="tab-photo" src="{{ $tabPhoto('outline') }}" alt="{{ $title }}" loading="lazy">@endif
          <h2>{{ $t('Course outline', 'محاور الدورة') }}</h2>
          @if ($content && $content['outline'])
          @foreach ($content['outline'] as $module)
            <div class="day"><div class="d">{{ $t('Module', 'الوحدة') }} {{ $loop->iteration }}</div><div><b>{{ $module['title'] }}</b>
              <ul class="module-items">
              @foreach ($module['items'] as $item)
                @if ($item['level'] === 0)
                  @if (! $loop->first)</li>@endif
                  <li>{!! $rich($item['text']) !!}
                @else
                  @if ($loop->first || $module['items'][$loop->index - 1]['level'] === 0)<ul>@endif
                  <li>{!! $rich($item['text']) !!}</li>
                  @if ($loop->last || $module['items'][$loop->index + 1]['level'] === 0)</ul>@endif
                @endif
                @if ($loop->last)</li>@endif
              @endforeach
              </ul>
            </div></div>
          @endforeach
          @else
          <p>{{ $t('Contact us for the detailed day-by-day outline for this course.', 'تواصل معنا للحصول على المخطط التفصيلي لهذه الدورة.') }}</p>
          @endif
        </div>

        @if ($hasAudience)
        <div class="tab-panel crs-panel" id="audience" role="tabpanel">
          @if ($tabPhoto('audience'))<img class="tab-photo" src="{{ $tabPhoto('audience') }}" alt="{{ $title }}" loading="lazy">@endif
          <h2>{{ $t('Who should attend', 'لمن هذه الدورة') }}</h2>
          @foreach ($content['audience'] as $para)<p>{!! $rich($para) !!}</p>@endforeach
        </div>
        @endif

        <div @class(['tab-panel', 'crs-panel', 'active' => $first === 'schedule']) id="schedule" role="tabpanel">
          <h2>{{ $t('2026 & 2027 schedule and fees', 'مواعيد ورسوم 2026 و2027') }}</h2>
          <p>{{ $t('New groups start every month at our Abu Dhabi centre. Pick the timing that suits you and an advisor will confirm the next start date and fee.', 'تبدأ مجموعات جديدة كل شهر في مقرنا بأبوظبي. اختر التوقيت المناسب لك وسيؤكد لك المستشار موعد البدء القادم والرسوم.') }}</p>
          <div class="crs-sessions">
            @foreach ([[$t('Morning group', 'المجموعة الصباحية'), $t('Daytime classes', 'حصص نهارية')], [$t('Evening group', 'المجموعة المسائية'), $t('After-work classes', 'حصص بعد الدوام')]] as [$group, $note])
            <div class="crs-session">
              <div class="crs-fee"><span>{{ $t('Course fee', 'رسوم الدورة') }}</span><b>{{ $t('On request', 'عند الطلب') }}</b><small>{{ $t('per participant', 'للمشارك الواحد') }}</small></div>
              <div class="crs-session-info">
                <div class="h3">{{ $group }}</div>
                <ul>
                  <li>{!! $icon($ic['schedule']) !!}{{ $t('Monday to Friday', 'الاثنين إلى الجمعة') }} · {{ $note }}</li>
                  <li>{!! $icon($ic['clock']) !!}{{ $duration }}</li>
                  <li>{!! $icon($ic['lang']) !!}{{ $t('English / Arabic', 'العربية / الإنجليزية') }}</li>
                  <li>{!! $icon($ic['pin']) !!}{{ $t('CompuBase Training Center, Abu Dhabi', 'مركز كمبيوبيس للتدريب، أبوظبي') }}</li>
                </ul>
              </div>
              <a class="btn btn-gold" href="{{ $contactUrl }}">{{ $t('Register now', 'سجّل الآن') }}</a>
            </div>
            @endforeach
            <div class="crs-session crs-session-team">
              <div class="crs-session-info">
                <div class="h3">{{ $t('In-house for your team', 'داخل مؤسستك لفريقك') }}</div>
                <p>{{ $t('We run this course at your offices anywhere in the UAE, on dates that fit your operations.', 'ننفّذ هذه الدورة في مقر مؤسستك في أي مكان في الإمارات، في مواعيد تناسب سير عملك.') }}</p>
              </div>
              <a class="btn btn-outline-light" href="{{ $corporateUrl }}">{{ $t('Get an in-house quote', 'اطلب عرض سعر') }}</a>
            </div>
          </div>
          <p class="crs-note">{{ $t('Group and corporate rates are available.', 'تتوفر أسعار خاصة للمجموعات والشركات.') }} <a href="{{ route($ar ? 'terms-ar' : 'terms') }}">{{ $t('Terms and refunds', 'الشروط وسياسة الاسترداد') }}</a></p>
        </div>
      </div>

      <aside class="crs-ask">
        <div class="crs-ask-head">{{ $t('Have a question?', 'لديك سؤال؟') }}</div>
        <p>{{ $t('Our advisors will help you choose the right course, level and timing.', 'سيساعدك مستشارونا في اختيار الدورة والمستوى والتوقيت المناسب.') }}</p>
        <ul>
          <li><a href="tel:+97126771117">{!! $icon($ic['phone']) !!}<span dir="ltr">02 677 1117</span></a></li>
          <li><a href="https://wa.me/971566893378" target="_blank" rel="noopener">{!! $icon($ic['chat']) !!}<span dir="ltr">+971 56 689 3378</span></a></li>
          <li><a href="mailto:info@compubasetraining.ae">{!! $icon($ic['mail']) !!}<span>info@compubasetraining.ae</span></a></li>
        </ul>
        <a class="btn btn-wa" href="https://wa.me/971566893378" target="_blank" rel="noopener">@include('partials.wa-icon'){{ $t('Chat on WhatsApp', 'تحدث عبر واتساب') }}</a>
      </aside>
    </div>

  </div>
</section>
