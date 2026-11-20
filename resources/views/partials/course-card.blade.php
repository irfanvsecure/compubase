{{-- Course card: home, /courses and category pages. $ar: Arabic. The title link covers the whole card;
     "Enquire" sits above it and opens the contact form with this course chosen. Keep js/compubase.js renderGrid() in step. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $photo = Catalog::photo($course);
    $title = Catalog::title($course, $ar);
    $mark = mb_strtoupper(mb_substr(preg_replace('/^(the|a|an)\s+/i', '', $course['en']), 0, 1));
    $cat = empty($hideCat) ? Catalog::category($course, $ar) : null; // category pages: every card is the same category
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $enquire = url(($ar ? 'ar/' : '').'contact').'?course='.$course['slug'].'#contactGrid';
@endphp
<article class="cp-card course-card"
   data-cats="{{ implode(' ', $course['cats']) }}"
   data-title="{{ mb_strtolower($course['en'].' '.$course['ar']) }}"
   data-days="{{ $course['days'] }}">
  <div class="cp-photo">
    @if ($photo)
      <img src="{{ $photo }}" alt="" loading="lazy">
    @else
      <div class="cp-mark">{{ $mark }}</div>
    @endif
    @if ($cat)<span class="cp-cat">{{ $cat }}</span>@endif
    <span class="cp-days">@include('partials.card-icon', ['i' => 'clock']){{ Catalog::duration($course['days'], $ar) }}</span>
  </div>
  <div class="cp-body">
    <h3><a class="cp-link" href="{{ Catalog::url($course, $ar) }}">{{ $title }}</a></h3>
    @if ($sum = Catalog::summary($course, $ar))<p>{{ $sum }}</p>@endif
    <ul class="cp-meta">
      <li>@include('partials.card-icon', ['i' => 'calendar']){{ $t('Mon – Fri', 'الاثنين – الجمعة') }}</li>
      <li>@include('partials.card-icon', ['i' => 'sun']){{ $t('Morning or evening', 'صباحي أو مسائي') }}</li>
      <li>@include('partials.card-icon', ['i' => 'pin']){{ $t('Abu Dhabi or in-house', 'أبوظبي أو مؤسستك') }}</li>
      <li>@include('partials.card-icon', ['i' => 'award']){{ $t('Certificate', 'شهادة إتمام') }}</li>
    </ul>
    <div class="cp-actions">
      <span class="cp-btn cp-btn-ghost" aria-hidden="true">{{ $t('View course', 'عرض الدورة') }}</span>
      <a class="cp-btn cp-btn-gold" href="{{ $enquire }}">{{ $t('Enquire now', 'استفسر الآن') }}</a>
    </div>
  </div>
</article>
