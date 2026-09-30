@use('App\Support\Catalog')
@if ($ar ?? false)
  <div class="course-card"><div class="head"><span class="tag">{{ $course['catAr'] }}</span><h3>{{ $course['ar'] }}</h3></div>
    <div class="body"><p>[ملخص الدورة من مخطط دورات كمبيوبيس.]</p>
      <div class="meta"><div><span>المدة</span><b>{{ Catalog::duration($course['days'], true) }}</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="{{ Catalog::url($course, true) }}">تفاصيل الدورة والرسوم ←</a></div></div>
@else
  <div class="course-card">
    <div class="head"><span class="tag">{{ $course['catEn'] }}</span><h3>{{ $course['en'] }}</h3></div>
    <div class="body"><p>[Course summary from the CompuBase course outline.]</p>
      <div class="meta">
        <div><span>Duration</span><b>{{ Catalog::duration($course['days']) }}</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="{{ Catalog::url($course) }}">Course details and fees →</a>
    </div>
  </div>
@endif
