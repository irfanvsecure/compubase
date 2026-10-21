{{-- Course card used on home + /courses (same photo layout as category pages). $ar: Arabic. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $photo = Catalog::photo($course);
    $title = Catalog::title($course, $ar);
    $mark = mb_strtoupper(mb_substr(preg_replace('/^(the|a|an)\s+/i', '', $course['en']), 0, 1));
    $n = isset($loop) ? sprintf('%02d', $loop->iteration) : null;
@endphp
<a class="cp-card course-card" href="{{ Catalog::url($course, $ar) }}"
   data-cats="{{ implode(' ', $course['cats']) }}"
   data-title="{{ mb_strtolower($course['en'].' '.$course['ar']) }}"
   data-days="{{ $course['days'] }}">
  <div class="cp-photo">
    @if ($photo)
      <img src="{{ $photo }}" alt="" loading="lazy">
    @else
      <div class="cp-mark">{{ $mark }}</div>
    @endif
    <span class="cp-days">{{ Catalog::duration($course['days'], $ar) }}</span>
    @if ($n)<span class="cp-num">{{ $n }}</span>@endif
  </div>
  <div class="cp-body">
    <h3>{{ $title }}</h3>
    <p>{{ Catalog::summary($course, $ar) ?? ($ar ? 'المخطط الكامل للدورة ومواعيدها ورسومها في صفحة الدورة.' : 'Full course outline, dates and fees on the course page.') }}</p>
    <div class="cp-foot">
      <span>{{ $ar ? 'الاثنين – الجمعة · صباحي أو مسائي' : 'Mon – Fri · Morning or evening' }}</span>
      <b>{{ $ar ? 'التفاصيل ←' : 'Details →' }}</b>
    </div>
  </div>
</a>
