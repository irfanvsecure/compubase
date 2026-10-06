{{-- The "Courses" item of the main menu, with a panel listing every category by group. $ar: Arabic. --}}
@php
    $ar = $ar ?? false;
    $navCats = App\Support\Catalog::categories();
    $navGroups = $ar
        ? ['management' => 'الإدارة والتطوير المهني', 'it' => 'تقنية المعلومات']
        : ['management' => 'Management & Professional', 'it' => 'IT & Technology'];
@endphp
<li class="nav-mega">
  <a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $ar ? 'الدورات' : 'Courses' }}</a>
  <button type="button" class="mega-toggle" aria-label="{{ $ar ? 'فئات الدورات' : 'Course categories' }}" onclick="this.parentNode.classList.toggle('open')"><svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
  <div class="mega">
    <div class="container">
      @foreach ($navGroups as $group => $groupName)
      <div class="mega-group">
        <h4>{{ $groupName }}</h4>
        <ul>
          @foreach ($navCats as $slug => $category)
            @continue($category['group'] !== $group)
            <li><a href="{{ App\Support\Catalog::categoryUrl($slug, $ar) }}">{{ $ar ? $category['ar'] : $category['en'] }} <span>{{ count($category['courses']) }}</span></a></li>
          @endforeach
        </ul>
      </div>
      @endforeach
      <div class="mega-foot">
        <span>{{ $ar ? count($navCats).' فئة · '.count(App\Support\Catalog::courses()).' دورة' : count($navCats).' categories · '.count(App\Support\Catalog::courses()).' courses' }}</span>
        <span class="mega-links"><a href="{{ route($ar ? 'categories-ar' : 'categories') }}">{{ $ar ? 'جميع الفئات' : 'All categories' }}</a><a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $ar ? 'تصفّح جميع الدورات ←' : 'Browse all courses →' }}</a></span>
      </div>
    </div>
  </div>
</li>
