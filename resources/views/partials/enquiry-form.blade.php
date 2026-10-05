{{-- A website form that is saved and emailed (EnquiryController). $type: contact, proposal or calendar; $ar: Arabic. --}}
@use('App\Support\Catalog')
@php
    $ar = $ar ?? false;
    $mine = old('type') === $type;
    $sent = session('enquiry_sent') === $type;
    $val = fn ($field, $default = '') => $mine ? old($field, $default) : $default;
    $chosen = $val('course', ($c = Catalog::courses()[request('course')] ?? null) ? $c['en'] : '');
    $courses = collect(Catalog::courses())->sortBy(fn ($c) => Catalog::title($c, $ar), SORT_NATURAL | SORT_FLAG_CASE);
    $t = fn ($en, $arText) => $ar ? $arText : $en;
@endphp
@if ($sent)
<div class="form-done" id="{{ $type }}-form" role="status">
  <b>{{ $t('Thank you — your message has been sent.', 'شكراً لك — تم إرسال رسالتك.') }}</b>
  <p>{{ $type === 'calendar'
      ? $t('An advisor will email you the course calendar shortly.', 'سيرسل لك أحد مستشارينا تقويم الدورات عبر البريد الإلكتروني قريباً.')
      : $t('An advisor will contact you within one working day. For a faster answer, WhatsApp us on 056 689 3378.', 'سيتواصل معك أحد مستشارينا خلال يوم عمل واحد. للرد الأسرع راسلنا على واتساب 056 689 3378.') }}</p>
</div>
@else
<form id="{{ $type }}-form" method="post" action="{{ route('enquiry') }}" @class(['calendar-form' => $type === 'calendar'])>
  @csrf
  <input type="hidden" name="type" value="{{ $type }}">
  <input type="hidden" name="locale" value="{{ $ar ? 'ar' : 'en' }}">
  <div class="hp" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div>
  @if ($mine && $errors->any())
  <div class="form-error full" role="alert">{{ $t('Please check the form: ', 'يرجى مراجعة النموذج: ') }}{{ $errors->first() }}</div>
  @endif
  @if ($type === 'calendar')
  <input type="email" name="email" value="{{ $val('email') }}" placeholder="name@company.ae" aria-label="{{ $t('Email', 'البريد الإلكتروني') }}" required>
  <button class="btn btn-gold" type="submit">{{ $t('Send me the calendar', 'أرسلوا لي التقويم') }}</button>
  @else
  <div class="field"><label>{{ $t('Full name', 'الاسم الكامل') }}</label><input name="name" value="{{ $val('name') }}" placeholder="{{ $t('Your name', 'اسمك') }}" autocomplete="name" required></div>
  @if ($type === 'proposal')
  <div class="field"><label>{{ $t('Organisation', 'المنشأة') }}</label><input name="organisation" value="{{ $val('organisation') }}" placeholder="{{ $t('Company name', 'اسم الشركة') }}" autocomplete="organization" required></div>
  <div class="field"><label>{{ $t('Work email', 'البريد الإلكتروني للعمل') }}</label><input type="email" name="email" value="{{ $val('email') }}" placeholder="name@company.ae" autocomplete="email" required></div>
  <div class="field"><label>{{ $t('Mobile', 'رقم الجوال') }}</label><input type="tel" name="phone" value="{{ $val('phone') }}" placeholder="05X XXX XXXX" autocomplete="tel" required></div>
  @else
  <div class="field"><label>{{ $t('Mobile', 'رقم الجوال') }}</label><input type="tel" name="phone" value="{{ $val('phone') }}" placeholder="05X XXX XXXX" autocomplete="tel" required></div>
  <div class="field"><label>{{ $t('Email', 'البريد الإلكتروني') }}</label><input type="email" name="email" value="{{ $val('email') }}" placeholder="name@email.com" autocomplete="email" required></div>
  <div class="field"><label>{{ $t('Preferred timing', 'التوقيت المفضل') }}</label><select name="timing">
    @foreach (['Morning or evening' => 'صباحي أو مسائي', 'Morning' => 'صباحي', 'Evening' => 'مسائي'] as $en => $arText)<option value="{{ $en }}" @selected($val('timing') === $en)>{{ $t($en, $arText) }}</option>@endforeach
  </select></div>
  @endif
  <div @class(['field', 'full' => $type === 'contact'])><label>{{ $t('Course of interest', 'الدورة المطلوبة') }}</label><select name="course">
    <option value="">{{ $t('Not sure yet — please advise', 'لم أحدد بعد — أرجو النصيحة') }}</option>
    @foreach ($courses as $course)<option value="{{ $course['en'] }}" @selected($chosen === $course['en'])>{{ Catalog::title($course, $ar) }}</option>@endforeach
  </select></div>
  @if ($type === 'proposal')
  <div class="field"><label>{{ $t('Team size', 'حجم الفريق') }}</label><select name="team_size">
    <option value="">{{ $t('Select a range', 'اختر النطاق') }}</option>
    @foreach (['2–5', '6–15', '16–30', '30+'] as $size)<option value="{{ $size }}" @selected($val('team_size') === $size)>{{ $size === '30+' && $ar ? 'أكثر من 30' : $size }}</option>@endforeach
  </select></div>
  <div class="field full"><label>{{ $t('What outcome are you aiming for?', 'ما الهدف الذي تسعون إليه؟') }} <span style="text-transform:none;font-weight:400">{{ $t('Optional', 'اختياري') }}</span></label><textarea name="message" placeholder="{{ $t('For example: twelve finance staff ready to sit the CMA exam before the end of the year.', 'مثال: اثنا عشر موظفاً مالياً جاهزون لامتحان المحاسب الإداري قبل نهاية العام.') }}">{{ $val('message') }}</textarea></div>
  @else
  <div class="field full"><label>{{ $t('Message', 'رسالتك') }} <span style="text-transform:none;font-weight:400">{{ $t('Optional', 'اختياري') }}</span></label><textarea name="message" placeholder="{{ $t('Anything we should know — your level, your exam date, your team size.', 'أي شيء ينبغي أن نعرفه — مستواك، موعد امتحانك، حجم فريقك.') }}">{{ $val('message') }}</textarea></div>
  @endif
  <div class="full"><button class="btn btn-navy" type="submit" style="width:100%">{{ $type === 'proposal' ? $t('Request the proposal', 'اطلب العرض') : $t('Send the enquiry', 'أرسل الاستفسار') }}</button>
    <p class="privacy">{{ $t('We use these details to answer your enquiry only. See the', 'نستخدم هذه البيانات للرد على استفسارك فقط. راجع') }} <a href="{{ route($ar ? 'privacy-ar' : 'privacy') }}">{{ $t('privacy notice', 'سياسة الخصوصية') }}</a>.</p></div>
  @endif
</form>
@endif
