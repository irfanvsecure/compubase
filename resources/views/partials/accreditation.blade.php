{{-- Home page band: a scrolling slider of every partner and accreditation logo, linking to the Partners page. $ar: Arabic. --}}
@php
    $ar = $ar ?? false;
    $partners = config('partners.partners');
@endphp
<section class="accred" id="accreditation">
  <div class="container">
    <div class="accred-head">
      <div>
        <div class="eyebrow">{{ $ar ? 'شركاؤنا واعتماداتنا' : 'Our partners and accreditations' }}</div>
        <h2>{{ $ar ? 'معتمدون من '.count($partners).' جهة عالمية ومحلية' : 'Accredited and authorised by '.count($partners).' leading names' }}</h2>
      </div>
      <a class="btn btn-outline" href="{{ route($ar ? 'partners-ar' : 'partners') }}">{{ $ar ? 'جميع الشركاء ←' : 'View all partners →' }}</a>
    </div>
  </div>
  <div class="logo-slider" aria-label="{{ $ar ? 'شعارات الشركاء' : 'Partner logos' }}">
    <div class="logo-track">
      @foreach ([false, true] as $copy)
      @foreach ($partners as $p)
      <a class="logo-item" href="{{ route($ar ? 'partners-ar' : 'partners') }}#{{ $p['group'] }}" @if ($copy) aria-hidden="true" tabindex="-1" @endif title="{{ $ar ? $p['ar'] : $p['en'] }}">
        <img src="{{ asset('images/partners/'.$p['slug'].'.png') }}" alt="{{ $copy ? '' : ($ar ? $p['ar'] : $p['en']) }}" loading="lazy">
      </a>
      @endforeach
      @endforeach
    </div>
  </div>
</section>
