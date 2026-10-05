@extends('layouts.site')

@php
    $t = fn ($en, $arText) => $ar ? $arText : $en;
    $privacy = $doc === 'privacy';
    $name = $privacy ? $t('Privacy notice', 'سياسة الخصوصية') : $t('Terms and refunds', 'الشروط والاسترداد');
    $email = 'info@compubasetraining.ae';
    // [heading, [paragraph, ...]] — written for CompuBase to review before launch.
    $sections = $privacy ? ($ar ? [
        ['من نحن', ['مركز كمبيوبيس للتدريب في أبوظبي هو المسؤول عن البيانات الشخصية التي تُرسل عبر هذا الموقع. للتواصل معنا بشأن بياناتك: '.$email.' أو 02 677 1117.']],
        ['البيانات التي نجمعها', ['عند تعبئة نموذج التسجيل أو الاستفسار أو طلب العرض أو طلب التقويم: الاسم، ورقم الجوال، والبريد الإلكتروني، واسم المنشأة، والدورة التي تهمك، والتوقيت المفضل، وحجم الفريق، وأي رسالة تكتبها.', 'كما نحفظ الصفحة التي أُرسل منها النموذج ووقت الإرسال.']],
        ['كيف نستخدمها', ['للرد على استفسارك، وترتيب تسجيلك أو العرض الخاص بمنشأتك، وإرسال تقويم الدورات إذا طلبته. لا نبيع بياناتك ولا نشاركها مع أي جهة لأغراض تسويقية.']],
        ['من يطّلع عليها', ['فريق كمبيوبيس الذي يتولى الاستفسارات والتسجيل فقط، ومزوّدو الخدمات التقنية الذين يستضيفون الموقع والبريد الإلكتروني نيابةً عنا.', 'عند التسجيل في امتحان لدى جهة مانحة (مثل بيرسون في يو إي أو آيلتس) نشارك معها البيانات التي يتطلبها الامتحان فقط، وبعلمك.']],
        ['ملفات تعريف الارتباط والإحصاءات', ['يستخدم الموقع ملفات تعريف الارتباط الضرورية لعمله وحماية النماذج. وإذا فُعّلت إحصاءات Google Analytics فإنها تجمع بيانات استخدام عامة لا تحدد هويتك.']],
        ['مدة الاحتفاظ', ['نحتفظ برسائل النماذج طالما احتجنا إليها للرد على استفسارك وإدارة تدريبك، ثم نحذفها.']],
        ['حقوقك', ['يمكنك أن تطلب نسخة من بياناتك أو تصحيحها أو حذفها في أي وقت بمراسلتنا على '.$email.'.']],
    ] : [
        ['Who we are', ['CompuBase Training Center in Abu Dhabi is responsible for the personal details sent through this website. To contact us about your data: '.$email.' or 02 677 1117.']],
        ['What we collect', ['When you fill in a registration, enquiry, proposal or calendar form: your name, mobile number, email address, organisation, the course you are interested in, your preferred timing, your team size and any message you write.', 'We also keep the page the form was sent from and the time it was sent.']],
        ['How we use it', ['To answer your enquiry, arrange your registration or your organisation\'s proposal, and send you the course calendar if you asked for it. We do not sell your details or share them with anyone for marketing.']],
        ['Who sees it', ['Only the CompuBase team that handles enquiries and registrations, and the technical providers that host the website and email for us.', 'When you register for an exam with an awarding body (for example Pearson VUE or IELTS), we share only the details that exam requires, and only with your knowledge.']],
        ['Cookies and analytics', ['The site uses the cookies it needs to work and to protect its forms. If Google Analytics is switched on, it collects general usage information that does not identify you.']],
        ['How long we keep it', ['We keep form messages for as long as we need them to answer your enquiry and manage your training, and then delete them.']],
        ['Your rights', ['You can ask for a copy of your details, or ask us to correct or delete them, at any time by writing to '.$email.'.']],
    ]) : ($ar ? [
        ['التسجيل', ['يُثبَّت مقعدك عند إكمال نموذج التسجيل وسداد الرسوم. ترسل لك كمبيوبيس تأكيداً مكتوباً يتضمن الدورة والمكان وتاريخ البدء والتوقيت اليومي.']],
        ['الرسوم', ['تُؤكَّد رسوم كل دورة كتابياً قبل التسجيل. رسوم الامتحانات لدى الجهات المانحة منفصلة وتُدفع مباشرة لتلك الجهات، ما لم يُذكر خلاف ذلك في تأكيدك.']],
        ['المواعيد والتغييرات', ['تُعقد الدورات من الاثنين إلى الجمعة في مقرّنا بأبوظبي بمجموعات صباحية أو مسائية. إذا اضطررنا إلى تغيير موعد أو تأجيل مجموعة نبلغك في أقرب وقت ونعرض عليك موعداً بديلاً.']],
        ['الإلغاء والاسترداد', ['تُذكر شروط الإلغاء والاسترداد الخاصة بدورتك في تأكيد التسجيل المكتوب. إذا أردت الإلغاء أو التأجيل فراسلنا على '.$email.' أو اتصل على 02 677 1117 في أقرب وقت ممكن.', 'إذا ألغت كمبيوبيس دورة ولم يناسبك الموعد البديل، تُعاد إليك الرسوم المدفوعة لتلك الدورة.']],
        ['الحضور والشهادات', ['تُمنح شهادة الإتمام من كمبيوبيس عند استيفاء متطلبات الحضور الخاصة بالدورة. الشهادات المهنية تمنحها الجهات المانحة وفق شروط امتحاناتها.']],
        ['التدريب المؤسسي', ['تُحدد شروط التدريب المؤسسي، بما فيها الرسوم والمواعيد والمكان، في العرض المكتوب المقدَّم لمنشأتك.']],
        ['التواصل', ['لأي سؤال حول هذه الشروط: '.$email.' أو 02 677 1117 أو واتساب 056 689 3378.']],
    ] : [
        ['Registration', ['Your seat is confirmed once you complete the registration form and settle the fee. CompuBase sends you a written confirmation with the course, the venue, the start date and the daily timings.']],
        ['Fees', ['The fee for each course is confirmed in writing before you register. Exam fees charged by awarding bodies are separate and paid to them directly, unless your confirmation says otherwise.']],
        ['Dates and changes', ['Courses run Monday to Friday at our Abu Dhabi centre, in morning or evening groups. If we have to move a date or postpone a group, we tell you as early as possible and offer you another date.']],
        ['Cancellations and refunds', ['The cancellation and refund terms for your course are set out in your written registration confirmation. If you need to cancel or postpone, write to '.$email.' or call 02 677 1117 as early as you can.', 'If CompuBase cancels a course and the alternative date does not suit you, the fee you paid for that course is refunded.']],
        ['Attendance and certificates', ['The CompuBase completion certificate is awarded when you meet the course\'s attendance requirements. Professional certifications are awarded by the awarding bodies under their own exam rules.']],
        ['Corporate training', ['Terms for corporate training, including fees, dates and venue, are set out in the written proposal for your organisation.']],
        ['Contact', ['Questions about these terms: '.$email.', 02 677 1117 or WhatsApp 056 689 3378.']],
    ]);
@endphp

@section('page', $doc.($ar ? '-ar' : ''))
@section('title', $name.' — '.$t('CompuBase Training Center, Abu Dhabi', 'مركز كمبيوبيس للتدريب، أبوظبي'))
@if ($ar)@section('lang', 'ar')@endif
@section('description', $privacy ? $t('How CompuBase Training Center uses the details you send through its website forms.', 'كيف يستخدم مركز كمبيوبيس للتدريب البيانات التي ترسلها عبر نماذج الموقع.') : $t('Registration, fees, changes, cancellations and refunds at CompuBase Training Center.', 'التسجيل والرسوم والتغييرات والإلغاء والاسترداد في مركز كمبيوبيس للتدريب.'))

@section('content')
@php($alt = route($doc.($ar ? '' : '-ar')))
<div class="page active" id="pg-{{ $doc }}" @if ($ar) dir="rtl" lang="ar" @else lang="en" @endif>
@include('partials.site-header')

<div class="crumbs"><div class="container"><a href="{{ route($ar ? 'home-ar' : 'home') }}">{{ $t('Home', 'الرئيسية') }}</a><span>/</span><b style="color:var(--navy)">{{ $name }}</b></div></div>

<section class="section legal">
  <div class="container">
    <div class="legal-head">
      <div class="eyebrow">{{ $t('CompuBase Training Center', 'مركز كمبيوبيس للتدريب') }}</div>
      <h1>{{ $name }}</h1>
      <p>{{ $t('Last updated 5 October 2026.', 'آخر تحديث 5 أكتوبر 2026.') }}</p>
    </div>
    <div class="legal-body">
      @foreach ($sections as [$heading, $paras])
      <h2>{{ $loop->iteration }}. {{ $heading }}</h2>
      @foreach ($paras as $para)<p>{{ $para }}</p>@endforeach
      @endforeach
      <p class="legal-also">{{ $t('See also:', 'انظر أيضاً:') }}
        <a href="{{ route(($privacy ? 'terms' : 'privacy').($ar ? '-ar' : '')) }}">{{ $privacy ? $t('Terms and refunds', 'الشروط والاسترداد') : $t('Privacy notice', 'سياسة الخصوصية') }}</a> ·
        <a href="{{ route($ar ? 'contact-ar' : 'contact') }}">{{ $t('Contact us', 'اتصل بنا') }}</a></p>
    </div>
  </div>
</section>

@include('partials.site-footer')
</div>
@endsection
