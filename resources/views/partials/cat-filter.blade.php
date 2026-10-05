{{-- Category filter for the All Courses and Schedule lists: three group tabs, then a scrolling row of that group's categories. $ar: Arabic. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $categories = Catalog::categories();
    $groups = $ar
        ? ['management' => 'الإدارة والتطوير المهني', 'it' => 'تقنية المعلومات']
        : ['management' => 'Management & Professional', 'it' => 'IT & Technology'];
    $inGroup = fn (string $group) => count(array_filter(Catalog::courses(), fn ($course) => collect($course['cats'])->contains(fn ($cat) => ($categories[$cat]['group'] ?? null) === $group)));
@endphp
<nav class="feat-filter" aria-label="{{ $label }}">
  <div class="feat-groups">
    <button type="button" class="active" data-group="all">{{ $ar ? 'جميع الدورات' : 'All courses' }} <span>{{ count(Catalog::courses()) }}</span></button>
    @foreach ($groups as $group => $name)
    <button type="button" data-group="{{ $group }}">{{ $name }} <span>{{ $inGroup($group) }}</span></button>
    @endforeach
  </div>
  <div class="feat-rail" hidden>
    <button type="button" class="rail-arrow prev" aria-label="{{ $ar ? 'الفئات السابقة' : 'Scroll categories back' }}">&lsaquo;</button>
    <div class="feat-cats">
      @foreach ($categories as $cat => $category)
      <button type="button" data-cat="{{ $cat }}" data-g="{{ $category['group'] }}">{{ $ar ? $category['ar'] : $category['en'] }} <span>{{ count($category['courses']) }}</span></button>
      @endforeach
    </div>
    <button type="button" class="rail-arrow next" aria-label="{{ $ar ? 'الفئات التالية' : 'Scroll categories forward' }}">&rsaquo;</button>
  </div>
</nav>
