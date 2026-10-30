{{-- Branded downloadable course PDF (print). Cover + Overview→Outline. $ar: Arabic labels. --}}
@php
    $ar = $ar ?? false;
    $printTitle = $title;
    $printDuration = $duration;
    $printSummary = $summary ?? ($content['overview'][0] ?? null);
    $printCat = $ar ? ($course['catAr'] ?? $course['catEn']) : $course['catEn'];
    $printPhoto = $photo;
@endphp
<div class="course-print" aria-hidden="true">
  {{-- Cover (no repeating header/footer) --}}
  <section class="cp-cover">
    {{-- Solid navy as an <img> so Chrome still prints it when “Background graphics” is off --}}
    <img class="cp-cover-bg" src="{{ asset('images/print-cover-navy.png') }}" alt="" aria-hidden="true">
    <img class="cp-cover-logo" src="{{ asset('images/logo-light.png') }}" alt="CompuBase" width="280" height="107">
    <div class="cp-cover-main">
      <span class="cp-badge">{{ $printCat }}</span>
      <div class="cp-title">{{ $printTitle }}</div>
      @if ($printSummary)<p class="cp-lead">{!! \App\Support\Catalog::richText($printSummary, $ar) !!}</p>@endif
      <div class="cp-meta">
        <div><span>{{ $ar ? 'المدة' : 'Duration' }}</span><b>{{ $printDuration }}</b></div>
        <div><span>{{ $ar ? 'الأيام' : 'Days' }}</span><b>{{ $ar ? 'الاثنين – الجمعة' : 'Monday to Friday' }}</b></div>
        <div><span>{{ $ar ? 'التوقيت' : 'Timing' }}</span><b>{{ $ar ? 'صباحي أو مسائي' : 'Morning or evening' }}</b></div>
        <div><span>{{ $ar ? 'المكان' : 'Location' }}</span><b>{{ $ar ? 'مقر أبوظبي' : 'Abu Dhabi centre' }}</b></div>
      </div>
      @if ($printPhoto)
      <div class="cp-cover-photo"><img src="{{ $printPhoto }}" alt=""></div>
      @endif
    </div>
    <div class="cp-cover-foot">COMPUBASE TRAINING CENTER ABU DHABI</div>
  </section>

  {{-- Content pages: thead/tfoot repeat in print --}}
  <table class="cp-doc">
    <thead>
      <tr><td>
        <div class="cp-head">
          <img src="{{ asset('images/logo.png') }}" alt="CompuBase" width="200" height="76">
          <div class="cp-head-cat">
            <span class="cp-ribbon" aria-hidden="true"></span>
            <b>{{ $printCat }}{{ $ar ? '' : ' courses' }}</b>
          </div>
        </div>
      </td></tr>
    </thead>
    <tbody>
      <tr><td>
        <div class="cp-body">
          @if ($content)
            @if ($content['overview'])
              <div class="h2">{{ $ar ? 'نبذة عن الدورة' : 'Course overview' }}</div>
              @foreach ($content['overview'] as $para)<p>{!! \App\Support\Catalog::richText($para, $ar) !!}</p>@endforeach
            @endif
            @if ($content['methodology'])
              <div class="h2">{{ $ar ? 'منهجية التدريب' : 'Training methodology' }}</div>
              @foreach ($content['methodology'] as $para)<p>{!! \App\Support\Catalog::richText($para, $ar) !!}</p>@endforeach
            @endif
            @foreach ($content['extra'] ?? [] as $section)
              <div class="h2">{{ $ar ? $section['title'] : ucfirst(strtolower($section['title'])) }}</div>
              @php
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
                @if ($kind === 'p')<p>{!! \App\Support\Catalog::richText($value, $ar) !!}</p>
                @else<ul>@foreach ($value as $item)<li>{!! \App\Support\Catalog::richText($item, $ar) !!}</li>@endforeach</ul>@endif
              @endforeach
            @endforeach
            @if ($content['competencies'])
              <div class="h2">{{ $ar ? 'الكفاءات المستهدفة' : 'Target competencies' }}</div>
              <ul class="cp-checks">
                @foreach ($content['competencies'] as $item)<li>{!! \App\Support\Catalog::richText($item, $ar) !!}</li>@endforeach
              </ul>
            @endif
            @if ($content['objectives'] || $content['objectivesIntro'])
              <div class="h2">{{ $ar ? 'أهداف الدورة' : 'Course objectives' }}</div>
              @foreach ($content['objectivesIntro'] as $para)<p>{!! \App\Support\Catalog::richText($para, $ar) !!}</p>@endforeach
              <ul class="cp-checks">
                @foreach ($content['objectives'] as $item)<li>{!! \App\Support\Catalog::richText($item, $ar) !!}</li>@endforeach
              </ul>
            @endif
            @if ($content['outline'])
              <div class="h2">{{ $ar ? 'محاور الدورة' : 'Course outline' }}</div>
              @foreach ($content['outline'] as $module)
                <div class="cp-module">
                  <div class="h3">{{ $module['title'] }}</div>
                  <ul>
                  @foreach ($module['items'] as $item)
                    @if ($item['level'] === 0)
                      @if (! $loop->first)</li>@endif
                      <li>{!! \App\Support\Catalog::richText($item['text'], $ar) !!}
                    @else
                      @if ($loop->first || $module['items'][$loop->index - 1]['level'] === 0)<ul>@endif
                      <li>{!! \App\Support\Catalog::richText($item['text'], $ar) !!}</li>
                      @if ($loop->last || $module['items'][$loop->index + 1]['level'] === 0)</ul>@endif
                    @endif
                    @if ($loop->last)</li>@endif
                  @endforeach
                  </ul>
                </div>
              @endforeach
            @endif
          @elseif ($printSummary)
            <div class="h2">{{ $ar ? 'نبذة عن الدورة' : 'Course overview' }}</div>
            <p>{!! \App\Support\Catalog::richText($printSummary, $ar) !!}</p>
          @endif
        </div>
      </td></tr>
    </tbody>
    <tfoot>
      <tr><td>
        <div class="cp-foot">
          <span>www.compubasetraining.ae</span>
          <span class="cp-sep">·</span>
          <span>+971 2 677 1117</span>
        </div>
      </td></tr>
    </tfoot>
  </table>
</div>
