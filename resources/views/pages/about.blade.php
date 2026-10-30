@extends('layouts.site')

@section('page', 'about')
@section('title', 'About Us — CompuBase Training Center, Abu Dhabi')

@section('content')
<div class="page active" id="pg-about" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:+97126771117">📞 02 677 1117</a>
      <a href="{{ route('about-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        @include('partials.nav-courses', ['ar' => false])
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="{{ route('partners') }}">Partners</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('about-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="{{ route('contact') }}">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="{{ route('home') }}">Home</a><span>/</span><b style="color:var(--navy)">About us</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Innovative Training Solutions</div>
  <h1>About CompuBase</h1>
  <p class="lead">Established in 1998 in Abu Dhabi, UAE, <b>CompuBase Training Center</b> is a professional training and development institution dedicated to empowering individuals and organizations through high-quality, industry-relevant learning solutions.</p>
  <p class="lead">With over 28 years of experience, CompuBase offers a diverse portfolio of training programs covering Information Technology, Artificial Intelligence, Business and Management, Professional Certifications, Leadership Development, and Languages.</p>
  <p class="lead">Combining experienced trainers, practical learning methodologies, and customized corporate training solutions, CompuBase helps professionals enhance their capabilities, advance their careers, and meet the evolving demands of today’s workplace.</p></div>
</div></section>
<section class="section"><div class="container">
  <div class="eyebrow">Who we are</div>
  <h2>Empowering People. Developing Skills. Driving Success.</h2>
  <div class="about-intro">
    <div>
  <div style="max-width:760px">
    <p>Founded in 1998 in Abu Dhabi, UAE, <b>CompuBase Training Center</b> is an established professional training and development institution committed to empowering individuals and organizations through knowledge, skills, and continuous learning.</p>
    <p>With more than 28 years of experience in the training industry, we have evolved alongside the changing demands of the professional world, delivering practical, relevant, and results-oriented learning experiences that help people grow and organizations thrive.</p>
    <p>Our diverse +500 courses training portfolio spans <b>Information Technology, Artificial Intelligence, Cybersecurity, Business and Management, Leadership Development, International Professional Certifications, and Language Training.</b> We serve individual learners, corporate teams, and government entities through structured training programs and customized learning solutions tailored to their specific objectives.</p>
    <p>At CompuBase, we believe that effective training goes beyond acquiring knowledge. It is about building confidence, developing practical capabilities, and transforming learning into measurable professional performance.</p>
    <p>By combining experienced instructors, industry-relevant content, and interactive training methodologies, we create learning experiences that bridge the gap between knowledge and real-world application.</p>
    <p><b>Our commitment is simple: to equip people with the skills they need today and the capabilities they need to succeed tomorrow.</b></p>
  </div>
    </div>
    <figure class="about-photo"><img src="{{ url('uploads/2026/10/abu-dhabi-skyline-training-hall-group-work-q4i42l.jpg') }}" alt="Professionals working in groups in a CompuBase training hall overlooking Abu Dhabi" loading="lazy"></figure>
  </div>
</div></section>
@include('partials.accreditation')
<section class="section why"><div class="container">
  <div class="eyebrow">Why learners choose us</div>
  <h2>Your Ambition. Our Expertise. Your Success.</h2>
  <div style="max-width:860px">
    <p>At <b>CompuBase Training Center</b>, we believe that the right learning experience can open doors to new opportunities. For over 28 years, we have helped learners build valuable skills, strengthen their confidence, and take meaningful steps toward their professional goals.</p>
    <p><b>Here’s what makes learning with us different:</b></p>
  </div>
  <div class="why-grid">
    <div class="why-item"><h3>1. Over 28 Years of Training Excellence</h3><p>Established in Abu Dhabi in 1998, we bring decades of experience in professional education, combining a strong training legacy with a commitment to continuous improvement and innovation.</p></div>
    <div class="why-item"><h3>2. Practical, Real-World Learning</h3><p>We believe learning should go beyond theory. Our programs emphasize hands-on activities, practical exercises, and workplace applications, helping you turn new knowledge into skills you can use with confidence.</p></div>
    <div class="why-item"><h3>3. Experienced, Industry-Focused Trainers</h3><p>Learn from knowledgeable professionals who bring practical expertise and real-world perspectives into the classroom, making complex concepts easier to understand and apply.</p></div>
    <div class="why-item"><h3>4. Skills That Move Your Career Forward</h3><p>Whether you’re starting your career, upgrading your expertise, exploring emerging technologies, or preparing for an international professional certification, our training programs are designed to support your professional growth.</p></div>
    <div class="why-item"><h3>5. An Engaging, Supportive Learning Environment</h3><p>We create interactive learning experiences that encourage participation, discussion, and collaboration. Our learner-focused approach helps you stay engaged, ask questions, and build confidence throughout your training journey.</p></div>
    <div class="why-item"><h3>6. Diverse Learning Opportunities</h3><p>From Artificial Intelligence and IT to Business, Leadership, Professional Certifications, and Languages, our wide range of programs helps you develop the capabilities needed to succeed in an ever-changing professional world.</p></div>
  </div>
  <div class="steps-photo"><img src="{{ url('uploads/2026/10/collaborative-workshop-sticky-notes-f1z3dh.jpg') }}" alt="Trainer guiding an interactive workshop with learners at CompuBase" loading="lazy"></div>
</div></section>
<section class="closing"><div class="container">
  <div><div class="h2">Invest in Skills. Unlock Opportunities.</div><p>Your next career milestone begins with the right knowledge, practical skills, and the confidence to move forward.</p></div>
  <div class="actions"><a class="btn btn-navy" href="{{ route('courses') }}">Discover Our Courses &rarr;</a></div>
</div></section>
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:15px">Classroom training in personal development, leadership and management, HR, finance, project and quality management, health and safety, IT, cyber security and AI. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      @include('partials.footer-courses')
      <div><div class="h4">Contact</div>
        <p><b style="color:#fff">CompuBase Training Center</b><br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:+97126771117">02 677 1117</a><br><a href="mailto:info@compubasetraining.ae">info@compubasetraining.ae</a><br>Monday to Friday</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="{{ route('privacy') }}">Privacy notice</a><a href="{{ route('terms') }}">Terms and refunds</a><a href="{{ url('sitemap.xml') }}">Sitemap</a><a href="{{ route('about-ar') }}">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:+97126771117">📞</a>
  <a class="btn btn-wa" href="https://wa.me/971566893378">@include('partials.wa-icon')WhatsApp</a>
  <a class="btn btn-navy" href="{{ route('contact') }}">Register</a>
</div>

</div>
@endsection
