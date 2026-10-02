{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($urls as $page)
  <url><loc>{{ url($page['path']) }}</loc>@isset($page['updated'])<lastmod>{{ $page['updated']->toAtomString() }}</lastmod>@endisset</url>
@endforeach
</urlset>
