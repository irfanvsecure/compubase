{{-- The three course columns of the footer: one per category, with site links filling any spare column. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $columns = [];
    foreach (Catalog::categories() as $cat => $category) {
        $links = [];
        foreach (array_slice($category['courses'], 0, 4, true) as $slug => $course) {
            $links[Catalog::url($course + ['cat' => $cat, 'slug' => $slug], $ar)] = $ar ? $course['ar'] : $course['en'];
        }
        $columns[] = [$ar ? $category['ar'] : $category['en'], $links];
    }
    $columns[] = $ar
        ? ['استكشف', [route('courses-ar') => 'جميع الدورات', route('schedule-ar') => 'جدول الدورات', route('corporate-ar') => 'التدريب المؤسسي']]
        : ['Explore', [route('courses') => 'All courses', route('schedule') => 'Schedule', route('corporate') => 'Corporate training']];
    $columns[] = $ar
        ? ['عن المركز', [route('about-ar') => 'من نحن', route('contact-ar') => 'اتصل بنا', route('home-ar', ['go' => 'accreditation']) => 'الاعتمادات']]
        : ['Company', [route('about') => 'About', route('contact') => 'Contact', route('home', ['go' => 'accreditation']) => 'Accreditation']];
@endphp
@foreach (array_slice($columns, 0, 3) as [$heading, $links])
      <div><h4>{{ $heading }}</h4><ul>
        @foreach ($links as $href => $label)<li><a href="{{ $href }}">{{ $label }}</a></li>@endforeach
      </ul></div>
@endforeach
