{{-- Home page course finder: search by name (with suggestions), narrow by category and duration, then open the course or the matching list on All Courses. $ar: Arabic. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $categories = Catalog::categories();
    $data = collect(Catalog::courses())
        ->sortBy(fn ($c) => Catalog::title($c, $ar), SORT_NATURAL | SORT_FLAG_CASE)
        ->map(fn ($c) => [
            't' => Catalog::title($c, $ar),
            's' => mb_strtolower($c['en'].' '.$c['ar']),
            'u' => Catalog::url($c, $ar),
            'c' => Catalog::category($c, $ar),
            'k' => $c['cats'],
            'd' => $c['days'],
            'l' => Catalog::duration($c['days'], $ar),
        ])->values();
    $popular = ['project-management', 'leadership-and-management', 'cyber-security', 'generative-ai', 'human-resources-management', 'accounting-and-finance'];
    $id = $ar ? 'Ar' : '';
@endphp
<div class="finder">
  <div class="finder-head">
    <div><div class="eyebrow">{{ $ar ? 'البحث عن دورة' : 'Course finder' }}</div>
      <h3>{{ $ar ? 'ابحث عن الدورة المناسبة لك' : 'Find the right course' }}</h3></div>
    <p class="finder-meta">{{ $ar ? count($data).' دورة في '.count($categories).' فئة' : count($data).' courses in '.count($categories).' categories' }}</p>
  </div>
  <form class="finder-form" action="{{ route($ar ? 'courses-ar' : 'courses') }}" method="get" autocomplete="off"
    data-show="{{ $ar ? 'عرض {n} دورة ←' : 'Show {n} courses →' }}" data-one="{{ $ar ? 'فتح الدورة ←' : 'Open the course →' }}" data-none="{{ $ar ? 'لا توجد نتائج' : 'No courses found' }}">
    <div class="field finder-q"><label for="finderQ{{ $id }}">{{ $ar ? 'اسم الدورة' : 'Course name' }}</label>
      <div class="finder-input">
        <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15Zm5.3-2.2L21 21"/></svg>
        <input id="finderQ{{ $id }}" name="q" type="search" placeholder="{{ $ar ? 'مثال: إدارة المشاريع، Excel، القيادة' : 'e.g. PMP, Excel, leadership' }}" role="combobox" aria-expanded="false" aria-controls="finderList{{ $id }}" aria-autocomplete="list">
      </div>
      <ul class="finder-suggest" id="finderList{{ $id }}" role="listbox" hidden></ul>
    </div>
    <div class="field"><label for="finderCat{{ $id }}">{{ $ar ? 'الفئة' : 'Category' }}</label>
      <select id="finderCat{{ $id }}" name="category">
        <option value="">{{ $ar ? 'جميع الفئات' : 'All categories' }}</option>
        @foreach ($ar ? ['management' => 'الإدارة والتطوير المهني', 'it' => 'تقنية المعلومات'] : ['management' => 'Management & Professional', 'it' => 'IT & Technology'] as $group => $label)
        <optgroup label="{{ $label }}">
          @foreach ($categories as $slug => $category)@if ($category['group'] === $group)<option value="{{ $slug }}">{{ $ar ? $category['ar'] : $category['en'] }} ({{ count($category['courses']) }})</option>@endif @endforeach
        </optgroup>
        @endforeach
      </select></div>
    <div class="field"><label for="finderDays{{ $id }}">{{ $ar ? 'المدة' : 'Duration' }}</label>
      <select id="finderDays{{ $id }}" name="days">
        <option value="">{{ $ar ? 'أي مدة' : 'Any length' }}</option>
        <option value="short">{{ $ar ? 'حتى 3 أيام' : 'Up to 3 days' }}</option>
        <option value="week">{{ $ar ? '4 – 5 أيام' : '4 – 5 days' }}</option>
        <option value="long">{{ $ar ? 'أكثر من أسبوع' : 'More than a week' }}</option>
      </select></div>
    <button class="btn btn-navy" type="submit">{{ $ar ? 'عرض '.count($data).' دورة ←' : 'Show '.count($data).' courses →' }}</button>
    <script type="application/json" class="finder-data">@json($data)</script>
  </form>
  <div class="finder-popular"><span>{{ $ar ? 'الأكثر طلباً:' : 'Popular:' }}</span>
    @foreach ($popular as $slug)@isset($categories[$slug])<a href="{{ route($ar ? 'courses-ar' : 'courses', ['category' => $slug]) }}">{{ $ar ? $categories[$slug]['ar'] : $categories[$slug]['en'] }}</a>@endisset @endforeach
  </div>
</div>
