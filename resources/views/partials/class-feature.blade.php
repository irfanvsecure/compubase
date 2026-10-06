{{-- Home page, under the three enrolment steps: a classroom photo beside what a CompuBase class is like. $ar: Arabic. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $points = $ar ? [
        ['مدرّب في القاعة', 'تدريب صفّي حقيقي في مقرّنا بأبوظبي، حيث تُطرح الأسئلة وتُجاب في وقتها.'],
        ['تطبيق عملي', 'تمارين ودراسات حالة وأمثلة من بيئة العمل، لا عروض تقديمية فقط.'],
        ['بالعربية أو الإنجليزية', 'المادة والشرح باللغة التي تعمل بها مجموعتك.'],
        ['شهادة وإرشاد للامتحان', 'شهادة إتمام من كمبيوبيس، مع إرشادات الامتحان عندما تؤدي الدورة إلى شهادة مهنية.'],
    ] : [
        ['A trainer in the room', 'Real classroom training at our Abu Dhabi centre, where a question gets answered the moment it comes up.'],
        ['Practice, not slides', 'Exercises, case studies and workplace examples you can use on Monday.'],
        ['In English or Arabic', 'Material and instruction in the language your group works in.'],
        ['Certificate and exam guidance', 'A CompuBase completion certificate, plus exam guidance when the course leads to a certification.'],
    ];
@endphp
<div class="class-feature">
  <div class="class-photo">
    <img src="{{ url('uploads/2026/10/abu-dhabi-training-centre-course-advisor-l7e5n1.jpg') }}" alt="{{ $ar ? 'مستشارة الدورات في استقبال مركز كمبيوبيس بأبوظبي ترحّب بالمتدربين' : 'Course advisor welcoming learners at the CompuBase reception in Abu Dhabi' }}" width="1200" height="800" loading="lazy">
    <div class="class-badge"><b>{{ $ar ? 'الاثنين – الجمعة' : 'Monday – Friday' }}</b><span>{{ $ar ? 'مجموعات صباحية ومسائية' : 'Morning and evening groups' }}</span></div>
  </div>
  <div class="class-copy">
    <div class="eyebrow">{{ $ar ? 'داخل القاعة' : 'Inside the classroom' }}</div>
    <h3>{{ $ar ? 'هكذا يبدو يومك التدريبي في كمبيوبيس.' : 'What a day at CompuBase looks like.' }}</h3>
    <ul class="class-points">
      @foreach ($points as [$title, $text])
      <li><span class="tick" aria-hidden="true">✓</span><div><b>{{ $title }}</b><p>{{ $text }}</p></div></li>
      @endforeach
    </ul>
    <div class="class-stats">
      <div><b>{{ count(Catalog::courses()) }}</b><span>{{ $ar ? 'دورة' : 'courses' }}</span></div>
      <div><b>{{ count(Catalog::categories()) }}</b><span>{{ $ar ? 'فئة' : 'categories' }}</span></div>
      <div><b>2</b><span>{{ $ar ? 'مجموعتان يومياً' : 'groups a day' }}</span></div>
    </div>
    <div class="class-actions">
      <a class="btn btn-navy" href="{{ route($ar ? 'courses-ar' : 'courses') }}">{{ $ar ? 'تصفّح الدورات ←' : 'Browse the courses →' }}</a>
      <a class="btn btn-outline" href="https://wa.me/971566893378" target="_blank" rel="noopener">{{ $ar ? 'اسأل عبر واتساب' : 'Ask on WhatsApp' }}</a>
    </div>
  </div>
</div>
