 {{-- The "Courses" item of the main menu, with a panel listing every category by group. $ar: Arabic. --}}
@php
    $ar = $ar ?? false;
    $navCats = App\Support\Catalog::categories();
    $navGroups = $ar
        ? ['management' => 'الإدارة والتطوير المهني', 'it' => 'تقنية المعلومات', 'language' => 'دورات اللغات']
        : ['management' => 'Management & Professional', 'it' => 'IT & Technology', 'language' => 'Language Courses'];
    $groupIcons = [
        'management' => 'M4 8h16v11H4zM9 8V5h6v3',
        'it' => 'M4 5h16v11H4zM9 20h6M12 16v4',
        'language' => 'M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18zM3 12h18M12 3c3 3 3 15 0 18M12 3c-3 3-3 15 0 18',
    ];
    $groupCounts = [];
    foreach ($navGroups as $group => $_) {
        $groupCounts[$group] = count(array_filter($navCats, fn($c) => $c['group'] === $group));
    }
@endphp
<li class="nav-mega">
  <a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $ar ? 'الدورات' : 'Courses' }}</a>
  <button type="button" class="mega-toggle" aria-label="{{ $ar ? 'فئات الدورات' : 'Course categories' }}" aria-expanded="false" onclick="this.setAttribute('aria-expanded',this.parentNode.classList.toggle('open'))"><svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
  <div class="mega">
    <div class="container">
      @foreach ($navGroups as $group => $groupName)
      <div class="mega-group mega-group--{{ $group }}{{ $loop->first ? ' is-active' : '' }}">
        <div class="h4">
          <svg class="group-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="{{ $groupIcons[$group] }}" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          {{ $groupName }}
          <span class="group-count">{{ $groupCounts[$group] }}</span>
          <button type="button" class="mega-group-toggle" aria-label="{{ $groupName }}" aria-expanded="false" onclick="megaGroupClick(this)" onmouseenter="megaTab(this,90)" onmouseleave="clearTimeout(window.megaTabTimer)" onfocus="megaTab(this,0)"><svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        </div>
        <div class="mega-pane">
          <div class="mega-pane-head"><b>{{ $groupName }}</b><span>{{ $groupCounts[$group] }} {{ $ar ? 'فئة' : 'categories' }}</span></div>
          <ul class="category-list">
            @foreach ($navCats as $slug => $category)
              @continue($category['group'] !== $group)
              <li><a href="{{ App\Support\Catalog::categoryUrl($slug, $ar) }}">{{ $ar ? $category['ar'] : $category['en'] }} <span>{{ count($category['courses']) }}</span></a></li>
            @endforeach
          </ul>
        </div>
      </div>
      @endforeach
      <div class="mega-foot">
        <span>{{ $ar ? count($navCats).' فئة · '.count(App\Support\Catalog::courses()).' دورة' : count($navCats).' categories · '.count(App\Support\Catalog::courses()).' courses' }}</span>
        <span class="mega-links"><a href="{{ route($ar ? 'categories-ar' : 'categories') }}">{{ $ar ? 'جميع الفئات' : 'All categories' }}</a><a href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $ar ? 'تصفّح جميع الدورات ←' : 'Browse all courses →' }}</a></span>
      </div>
    </div>
  </div>
  <script>
    /* Desktop: hovering or focusing a group shows its categories. The short delay stops a tab
       switching when the mouse only crosses it on the way to a link. Drawer: tap opens the group. */
    window.megaTab = function (btn, delay) {
      if (window.matchMedia('(max-width:1240px)').matches) return;
      clearTimeout(window.megaTabTimer);
      window.megaTabTimer = setTimeout(function () {
        btn.closest('.mega').querySelectorAll('.mega-group').forEach(function (g) {
          g.classList.toggle('is-active', g === btn.closest('.mega-group'));
        });
      }, delay);
    };
    window.megaGroupClick = function (btn) {
      if (window.matchMedia('(max-width:1240px)').matches) {
        btn.setAttribute('aria-expanded', btn.closest('.mega-group').classList.toggle('open'));
      } else {
        window.megaTab(btn, 0);
      }
    };
  </script>
</li>
