{{-- Home page band with the accreditation logos shown on compubasetraining.ae. $ar: Arabic. --}}
@php
    $ar = $ar ?? false;
    $marks = [
        ['actvet', 'ACTVET', 'أكتفيت', 'Abu Dhabi Centre for Technical and Vocational Education and Training', 'مركز أبوظبي للتعليم والتدريب التقني والمهني', 480, 194],
        ['british-council', 'British Council', 'المجلس الثقافي البريطاني', 'The UK’s international organisation for education and culture', 'المؤسسة البريطانية الدولية للتعليم والثقافة', 480, 235],
        ['ielts', 'IELTS', 'آيلتس', 'International English Language Testing System', 'النظام الدولي لاختبار اللغة الإنجليزية', 480, 181],
        ['icdl', 'ICDL', 'الرخصة الدولية لقيادة الحاسوب', 'International Certification of Digital Literacy', 'الشهادة الدولية للمهارات الرقمية', 480, 309],
    ];
@endphp
<section class="accred" id="accreditation">
  <div class="container">
    <div class="accred-head">
      <div class="eyebrow">{{ $ar ? 'الاعتمادات' : 'Accreditation' }}</div>
      <h2>{{ $ar ? 'معتمدون ومعترف بنا من' : 'Accredited and recognised by' }}</h2>
    </div>
    <div class="marks">
      @foreach ($marks as [$file, $en, $arName, $descEn, $descAr, $w, $h])
      <div class="mark">
        <div class="mark-logo mark-logo--{{ $file }}"><img src="{{ asset('images/accreditation/'.$file.'.png') }}" alt="{{ $ar ? $arName : $en }}" width="{{ $w }}" height="{{ $h }}" loading="lazy"></div>
        <b>{{ $ar ? $arName : $en }}</b>
        <span>{{ $ar ? $descAr : $descEn }}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>
