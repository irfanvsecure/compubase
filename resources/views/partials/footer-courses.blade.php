{{-- The three course columns of the footer: the first course categories, then the site links. --}}
@php
    $ar = $ar ?? false;
    $links = [];
    foreach (array_slice(App\Support\Catalog::categories(), 0, 5, true) as $cat => $category) {
        $links[\App\Support\Catalog::categoryUrl($cat, $ar)] = $ar ? $category['ar'] : $category['en'];
    }
    $links[route($ar ? 'categories-ar' : 'categories')] = $ar ? 'جميع الفئات ←' : 'All categories →';
    $columns = [[$ar ? 'فئات الدورات' : 'Course categories', $links]];
    $columns[] = $ar
        ? ['استكشف', [route('courses-ar') => 'جميع الدورات', route('schedule-ar') => 'جدول الدورات', route('corporate-ar') => 'التدريب المؤسسي', route('blog-ar') => 'المدونة']]
        : ['Explore', [route('courses') => 'All courses', route('schedule') => 'Schedule', route('corporate') => 'Corporate training', route('blog') => 'Blog']];
    $columns[] = $ar
        ? ['عن المركز', [route('about-ar') => 'من نحن', route('contact-ar') => 'اتصل بنا', route('partners-ar') => 'شركاؤنا']]
        : ['Company', [route('about') => 'About', route('contact') => 'Contact', route('partners') => 'Partners']];
@endphp
@foreach (array_slice($columns, 0, 3) as [$heading, $links])
      <div><h4>{{ $heading }}</h4><ul>
        @foreach ($links as $href => $label)<li><a href="{{ $href }}">{{ $label }}</a></li>@endforeach
      </ul></div>
@endforeach
