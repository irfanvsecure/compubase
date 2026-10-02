{{-- Previous / next links under the blog list. --}}
@if ($paginator->hasPages())
<nav class="pager" aria-label="Blog pages">
  @if ($paginator->onFirstPage())<span></span>@else<a class="btn btn-outline" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ app()->getLocale() === 'ar' ? '→ السابق' : '← Previous' }}</a>@endif
  <span class="pager-pages">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
  @if ($paginator->hasMorePages())<a class="btn btn-outline" href="{{ $paginator->nextPageUrl() }}" rel="next">{{ app()->getLocale() === 'ar' ? 'التالي ←' : 'Next →' }}</a>@endif
</nav>
@endif
