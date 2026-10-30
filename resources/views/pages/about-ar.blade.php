@extends('layouts.site')

@section('page', 'about-ar')
@section('title', 'من نحن — مركز كمبيوبيس للتدريب، أبوظبي')
@section('lang', 'ar')
@section('description', 'مركز كمبيوبيس للتدريب في أبوظبي. دورات الشهادات المهنية والأمن السيبراني واللغات.')

@section('content')
<div class="page active" id="pg-about-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('about') }}" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home-ar') }}"><img src="{{ asset('images/logo.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home-ar') }}">الرئيسية</a></li>
        @include('partials.nav-courses', ['ar' => true])
        <li><a href="{{ route('home-ar', ['go' => 'corporate']) }}">التدريب المؤسسي</a></li>
        <li><a href="{{ route('partners-ar') }}">شركاؤنا</a></li>
        <li><a href="{{ route('schedule-ar') }}">جدول الدورات</a></li>
        <li><a href="{{ route('about-ar') }}">من نحن</a></li>
        <li><a href="{{ route('home-ar', ['go' => 'contact']) }}">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('about') }}" lang="en">EN</a>
      <a class="btn btn-outline" href="{{ route('corporate-ar') }}">استفسر الآن</a>
      <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="{{ route('home-ar') }}">الرئيسية</a><span>/</span><b style="color:var(--navy)">من نحن</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">حلول تدريبية مبتكرة</div>
  <h1>عن كمبيوبيس</h1>
  <p class="lead">تأسّس <b>مركز كمبيوبيس للتدريب</b> عام 1998 في أبوظبي بدولة الإمارات العربية المتحدة، وهو مؤسسة متخصصة في التدريب والتطوير المهني، تكرّس جهودها لتمكين الأفراد والمؤسسات من خلال حلول تعليمية عالية الجودة ترتبط مباشرةً باحتياجات سوق العمل.</p>
  <p class="lead">وبخبرة تزيد على 28 عاماً، يقدّم المركز مجموعة متنوعة من البرامج التدريبية تشمل تقنية المعلومات، والذكاء الاصطناعي، وإدارة الأعمال، والشهادات المهنية، وتطوير القيادات، واللغات.</p>
  <p class="lead">ومن خلال الجمع بين مدرّبين ذوي خبرة، ومنهجيات تعلّم عملية، وحلول تدريب مؤسسي مصمّمة حسب الطلب، يساعد مركز كمبيوبيس المهنيين على تعزيز قدراتهم، والتقدّم في مسيرتهم المهنية، ومواكبة المتطلبات المتجدّدة لبيئة العمل اليوم.</p></div>
</div></section>

<section class="section"><div class="container">
  <div class="eyebrow">من نحن</div>
  <h2>نمكّن الأفراد. نطوّر المهارات. نصنع النجاح.</h2>
  <div class="about-intro">
    <div>
  <div style="max-width:760px">
    <p>تأسّس <b>مركز كمبيوبيس للتدريب</b> عام 1998 في أبوظبي بدولة الإمارات العربية المتحدة، وهو مؤسسة راسخة في مجال التدريب والتطوير المهني، تلتزم بتمكين الأفراد والمؤسسات من خلال المعرفة والمهارات والتعلّم المستمر.</p>
    <p>وعلى مدى أكثر من 28 عاماً في قطاع التدريب، تطوّرنا مع تغيّر متطلبات عالم العمل، فقدّمنا تجارب تعليمية عملية وهادفة تركّز على النتائج، تساعد الأفراد على النمو والمؤسسات على الازدهار.</p>
    <p>تضم محفظتنا التدريبية المتنوعة أكثر من 500 دورة في مجالات <b>تقنية المعلومات، والذكاء الاصطناعي، والأمن السيبراني، وإدارة الأعمال، وتطوير القيادات، والشهادات المهنية الدولية، وتعليم اللغات.</b> ونخدم المتدربين الأفراد وفرق الشركات والجهات الحكومية عبر برامج تدريبية منظّمة وحلول تعليمية مصمّمة وفق أهدافهم المحددة.</p>
    <p>نؤمن في كمبيوبيس بأن التدريب الفعّال لا يقتصر على اكتساب المعرفة، بل يقوم على بناء الثقة، وتنمية القدرات العملية، وتحويل التعلّم إلى أداء مهني يمكن قياسه.</p>
    <p>ومن خلال الجمع بين مدرّبين ذوي خبرة، ومحتوى مرتبط بواقع العمل، ومنهجيات تدريب تفاعلية، نصمّم تجارب تعليمية تسدّ الفجوة بين المعرفة وتطبيقها على أرض الواقع.</p>
    <p><b>التزامنا واضح: أن نزوّد الناس بالمهارات التي يحتاجونها اليوم، والقدرات التي تمكّنهم من النجاح غداً.</b></p>
  </div>
    </div>
    <figure class="about-photo"><img src="{{ url('uploads/2026/10/cb-abu-dhabi-skyline-training-hall-group-work.jpg') }}" alt="مهنيون يعملون في مجموعات داخل قاعة تدريب في كمبيوبيس مطلّة على أبوظبي" loading="lazy"></figure>
  </div>
</div></section>

@include('partials.accreditation', ['ar' => true])

<section class="section why"><div class="container">
  <div class="eyebrow">لماذا يختارنا المتدربون</div>
  <h2>طموحك. خبرتنا. نجاحك.</h2>
  <div style="max-width:860px">
    <p>نؤمن في <b>مركز كمبيوبيس للتدريب</b> بأن تجربة التعلّم المناسبة قادرة على فتح أبواب لفرص جديدة. وعلى مدى أكثر من 28 عاماً، ساعدنا المتدربين على اكتساب مهارات قيّمة، وتعزيز ثقتهم بأنفسهم، والتقدّم بخطوات حقيقية نحو أهدافهم المهنية.</p>
    <p><b>إليك ما يميّز التعلّم معنا:</b></p>
  </div>
  <div class="why-grid">
    <div class="why-item"><h3>1. أكثر من 28 عاماً من التميّز في التدريب</h3><p>منذ تأسيسنا في أبوظبي عام 1998، نقدّم عقوداً من الخبرة في التعليم المهني، تجمع بين إرث تدريبي راسخ والتزام دائم بالتطوير والابتكار.</p></div>
    <div class="why-item"><h3>2. تعلّم عملي مرتبط بالواقع</h3><p>نؤمن بأن التعلّم يجب أن يتجاوز النظريات، لذلك تركّز برامجنا على الأنشطة التطبيقية والتمارين العملية وتطبيقات بيئة العمل، لتحوّل معرفتك الجديدة إلى مهارات تستخدمها بثقة.</p></div>
    <div class="why-item"><h3>3. مدرّبون ذوو خبرة عملية في مجالاتهم</h3><p>تعلّم على يد مختصّين يحملون إلى القاعة خبرة عملية ورؤية واقعية، فيصبح فهم المفاهيم المعقّدة وتطبيقها أسهل.</p></div>
    <div class="why-item"><h3>4. مهارات تدفع مسيرتك المهنية إلى الأمام</h3><p>سواء كنت في بداية مسيرتك، أو تطوّر خبرتك، أو تستكشف التقنيات الحديثة، أو تستعد لشهادة مهنية دولية، فإن برامجنا مصمّمة لدعم نموّك المهني.</p></div>
    <div class="why-item"><h3>5. بيئة تعلّم تفاعلية وداعمة</h3><p>نصمّم تجارب تعلّم تفاعلية تشجّع على المشاركة والنقاش والتعاون، ويساعدك نهجنا المتمحور حول المتدرب على البقاء متفاعلاً، وطرح الأسئلة، وبناء ثقتك طوال رحلتك التدريبية.</p></div>
    <div class="why-item"><h3>6. فرص تعلّم متنوعة</h3><p>من الذكاء الاصطناعي وتقنية المعلومات إلى إدارة الأعمال والقيادة والشهادات المهنية واللغات، تساعدك برامجنا المتنوعة على تطوير القدرات اللازمة للنجاح في عالم مهني دائم التغيّر.</p></div>
  </div>
  <div class="steps-photo"><img src="{{ url('uploads/2026/10/cb-collaborative-workshop-sticky-notes.jpg') }}" alt="مدرّب يدير ورشة عمل تفاعلية مع المتدربين في كمبيوبيس" loading="lazy"></div>
</div></section>

<section class="closing"><div class="container">
  <div><div class="h2">استثمر في مهاراتك. اكتشف فرصاً جديدة.</div><p>تبدأ محطتك المهنية التالية بالمعرفة الصحيحة، والمهارات العملية، والثقة اللازمة للمضي قُدماً.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('courses-ar') }}">اكتشف دوراتنا &larr;</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="كمبيوبيس — حلول تدريبية مبتكرة" width="720" height="275"></div>
        <p style="font-size:15px">تدريب صفّي في تطوير الذات، والقيادة والإدارة، والموارد البشرية، والمالية، وإدارة المشاريع والجودة، والصحة والسلامة، وتقنية المعلومات، والأمن السيبراني، والذكاء الاصطناعي. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      @include('partials.footer-courses', ['ar' => true])
      <div><div class="h4">اتصل بنا</div>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>الاثنين – الجمعة</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="{{ route('privacy-ar') }}">سياسة الخصوصية</a><a href="{{ route('terms-ar') }}">الشروط والاسترداد</a><a href="{{ url('sitemap.xml') }}">خريطة الموقع</a><a href="{{ route('about') }}">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')واتساب</a>
  <a class="btn btn-navy" href="{{ route('contact-ar') }}">سجّل</a>
</div>


</div>
@endsection
