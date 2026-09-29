@extends('layouts.site')

@section('page', 'home')
@section('title', 'CompuBase Training Center — Professional Training Courses in Abu Dhabi')

@section('content')
<div class="page active" id="pg-home" lang="en">

<!-- 01 UTILITY BAR -->
<div class="utility">
  <div class="container">
    <div class="left">
      <span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span>
    </div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="{{ route('home-ar') }}" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>

<!-- 02 HEADER -->
<header class="site">
  <div class="container">
    <a class="logo" href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></a>
    <nav class="main">
      <ul>
        <li><a href="{{ route('courses') }}">Courses</a></li>
        <li><a href="{{ route('corporate') }}">Corporate training</a></li>
        <li><a href="#" data-scroll="accreditation">Accreditation</a></li>
        <li><a href="{{ route('schedule') }}">Schedule</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="{{ route('home-ar') }}" lang="ar">AR</a>
      <a class="btn btn-outline" href="{{ route('corporate') }}">Enquire</a>
      <a class="btn btn-navy" href="#" data-scroll="register">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<!-- ================= HOMEPAGE ================= -->
<div id="page-home">

<!-- 03 HERO -->
<section class="hero-2col">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">CompuBase Training Center · Abu Dhabi</div>
      <h1>Get qualified without taking time off work.</h1>
      <p class="lead">Certification, cyber security, AI and language training in Abu Dhabi — delivered weekday mornings or evenings, in English and Arabic, by our in-house faculty.</p>
      <ul class="points">
        <li>12 scheduled courses across certification, IT and languages</li>
        <li>Classroom sessions from 2 days to 1 month, Monday to Friday</li>
        <li>In-house delivery available at your premises across the UAE</li>
      </ul>
      <div class="cta-row">
        <a class="btn btn-gold" href="{{ route('schedule') }}">Register for the next intake →</a>
        <a class="btn btn-outline-light" href="https://wa.me/9710506399915">WhatsApp 050 6399915</a>
      </div>
    </div>
    <div class="hero-box hero-slider" >
      <div class="hs-slide active"><img class="bg" src="https://picsum.photos/seed/compubase-class/900/700" alt="Classroom training at CompuBase Abu Dhabi"><div class="cap">Classroom sessions, Monday to Friday — morning and evening groups</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cert/900/700" alt="Professional certification preparation"><div class="cap">PMP, CIA, CMA and CISA exam preparation with in-house faculty</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cyber/900/700" alt="Cyber security and AI workshops"><div class="cap">Hands-on cyber security, ethical hacking and AI workshops</div></div>
      <div class="hs-arrows"><button class="hs-prev" aria-label="Previous">‹</button><button class="hs-next" aria-label="Next">›</button></div>
      <div class="hs-dots"></div>
    </div>
  </div>
</section>

<!-- 04 COURSE FINDER -->
<div class="container">
  <div class="finder">
    <div class="eyebrow">Course finder</div>
    <h3>Check the next available seat</h3>
    <form onsubmit="event.preventDefault();scrollSec('schedule')">
      <div class="field"><label>Category</label>
        <select><option>All categories</option><option>Professional certifications</option><option>IT and cyber security</option><option>Languages and office skills</option></select></div>
      <div class="field"><label>Course</label>
        <select id="finderCourse"><option>Any course</option></select></div>
      <div class="field"><label>Preferred timing</label>
        <select><option>Morning or evening</option><option>Morning</option><option>Evening</option></select></div>
      <button class="btn btn-navy" type="submit">Show dates →</button>
    </form>
  </div>
</div>

<!-- 05 ACCREDITATION -->
<section class="accred" id="accreditation">
  <div class="container" style="text-align:center">
    <div class="eyebrow">Accredited and recognised by</div>
    <div class="marks">
      <div class="mark">ACTVET</div>
      <div class="mark">BRITISH COUNCIL</div>
      <div class="mark">IELTS</div>
      <div class="mark">ICDL</div>
    </div>
    <div class="placeholder-note">Placeholders for the four marks already shown on compubasetraining.ae. [Confirm whether PMI, ISACA, IIA, IMA and EC-Council partnerships may also be displayed.]</div>
  </div>
</section>

<!-- 06 CATEGORIES -->
<section class="section" id="courses">
  <div class="container">
    <div class="eyebrow">Course categories</div>
    <h2>Three routes, twelve courses, one campus in Abu Dhabi.</h2>
    <p style="max-width:720px">Whether you are sitting a professional exam, moving your team into cyber security and AI, or building the English, Arabic and Office skills the UAE workplace runs on — every CompuBase course is timetabled around a full working week.</p>
    <div class="cat-grid">
      <div class="cat">
        <div class="num">01 <small>4 COURSES</small></div>
        <h3>Professional certifications</h3>
                <p>Exam-focused preparation for finance, audit and project management credentials. Evening timings suit candidates already in full-time roles.</p>
        <table>
          <tr><td>PMP — Project Management</td><td>40 hrs</td></tr>
          <tr><td>CIA — Internal Auditor</td><td>40 hrs</td></tr>
          <tr><td>CMA — Management Accountant</td><td>40 hrs</td></tr>
          <tr><td>CISA — Information Systems Auditor</td><td>40 hrs</td></tr>
        </table>
        <a class="link" href="#" onclick="filterCat(event,'cert')">View certification courses →</a>
      </div>
      <div class="cat">
        <div class="num">02 <small>4 COURSES</small></div>
        <h3>IT and cyber security</h3>
                <p>Short, practical courses that move a team from awareness to capability — from everyday AI use through to hands-on ethical hacking.</p>
        <table>
          <tr><td>EC-Council Ethical Hacking</td><td>40 hrs</td></tr>
          <tr><td>Cyber Security Essentials</td><td>40 hrs</td></tr>
          <tr><td>AI Essentials</td><td>18 hrs</td></tr>
          <tr><td>Prompt Engineering</td><td>12 hrs</td></tr>
        </table>
        <a class="link" href="#" onclick="filterCat(event,'it')">View IT and cyber courses →</a>
      </div>
      <div class="cat">
        <div class="num">03 <small>4 COURSES</small></div>
        <h3>Languages and office skills</h3>
                <p>The groundwork behind every other qualification: the English, Arabic and Microsoft skills a UAE workplace expects from day one.</p>
        <table>
          <tr><td>English Language</td><td>40 hrs</td></tr>
          <tr><td>IELTS Preparation</td><td>20 hrs</td></tr>
          <tr><td>Arabic for Non-Arabic Speakers</td><td>20 hrs</td></tr>
          <tr><td>MS Office + Copilot</td><td>30 hrs</td></tr>
        </table>
        <a class="link" href="#" onclick="filterCat(event,'lang')">View language courses →</a>
      </div>
    </div>
  </div>
</section>

<!-- 07 FEATURED COURSES -->
<section class="section featured" id="featured">
  <div class="container">
    <div class="eyebrow">Featured this intake</div>
    <h2>The courses Abu Dhabi employers are booking now.</h2>
    <p style="max-width:720px">Each course runs Monday to Friday at our Abu Dhabi centre, with morning and evening groups so you can train around your job. Seats are allocated in the order enquiries are received.</p>
    <div class="filter-tabs" id="filterTabs">
      <button class="active" data-f="all">All courses</button>
      <button data-f="cert">Professional certifications · 4</button>
      <button data-f="it">IT and cyber security · 4</button>
      <button data-f="lang">Languages and office skills · 4</button>
    </div>
    <div class="course-grid" id="courseGrid"></div>
    <p class="foot">Browse all 12 courses or call an advisor on <a href="tel:0506399915">050 6399915</a></p>
  </div>
</section>

<!-- 08 INTAKE SCHEDULE -->
<section class="section schedule" id="schedule">
  <div class="container">
    <div class="sched-head">
      <div>
        <div class="eyebrow">Upcoming intakes</div>
        <h2>Every start date, in one table.</h2>
        <p style="max-width:640px">Confirmed intakes at the Abu Dhabi centre. If a date does not suit you, tell us your preferred week and we will place you in the next group.</p>
      </div>
      <a class="btn btn-outline" href="#" data-scroll="calendar">⤓ Download the course calendar</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>Next confirmed groups</caption>
        <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
        <tbody id="schedBody"></tbody>
      </table>
    </div>
    <p class="sched-note">Showing 8 of 12 courses. All groups run Monday to Friday at the Abu Dhabi centre. <a href="#" data-scroll="featured" style="font-weight:700;text-decoration:underline">See the full schedule</a></p>
  </div>
</section>

<!-- 09 FACTS BAND -->
<section class="facts">
  <div class="container">
    <div class="fact"><b>12</b><p>Scheduled courses across three categories</p></div>
    <div class="fact"><b>2</b><p>Daily timings — morning and evening groups</p></div>
    <div class="fact"><b>AR / EN</b><p>Delivery in Arabic or English, by course</p></div>
    <div class="fact"><b>[X]</b><p>Professionals trained in Abu Dhabi — confirm the figure before publishing</p></div>
  </div>
</section>

<!-- 10 CORPORATE -->
<section class="section corporate" id="corporate">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">Corporate and in-house training</div>
      <h2>Train the whole team. At your office, or ours.</h2>
      <p class="lead">Any course on this site can be delivered privately to a single organisation, adapted to your systems, your policies and your sector. Tell us the team and the outcome; we will build the timetable around your operations.</p>
      <ul class="corp-points">
        <li><b>Delivered at your premises across the UAE</b><span>Or in a private group at the Abu Dhabi centre, whichever costs your team less time.</span></li>
        <li><b>Content mapped to your roles</b><span>Case material, exercises and examples rewritten around the work your people actually do.</span></li>
        <li><b>Attendance records and completion certificates</b><span>Documentation your HR and compliance teams can file without chasing us for it.</span></li>
      </ul>
      <div class="corp-cta">
        <a class="btn btn-gold" href="https://wa.me/9710506399915">WhatsApp 050 6399915</a>
        <small>Group rates apply from [N] delegates. Confirm the threshold before publishing.</small>
      </div>
    </div>
    <div class="proposal">
      <h3>Request a training proposal</h3>
      <p class="sub">Six fields. An advisor replies with dates, format and a written quote.</p>
      <form onsubmit="event.preventDefault();alert('Demo only — connect this form to your enquiry handler before launch.')">
        <div class="field"><label>Full name</label><input placeholder="Your name" required></div>
        <div class="field"><label>Organisation</label><input placeholder="Company name" required></div>
        <div class="field"><label>Work email</label><input type="email" placeholder="name@company.ae" required></div>
        <div class="field"><label>Mobile</label><input type="tel" placeholder="05X XXX XXXX" required></div>
        <div class="field"><label>Course of interest</label><select id="proposalCourse"><option>Select a course</option></select></div>
        <div class="field"><label>Team size</label><select><option>Select a range</option><option>2–5</option><option>6–15</option><option>16–30</option><option>30+</option></select></div>
        <div class="field full"><label>What outcome are you aiming for? <span style="text-transform:none;font-weight:400">Optional</span></label>
          <textarea placeholder="For example: twelve finance staff ready to sit the CMA exam before the end of the year."></textarea></div>
        <div class="full"><button class="btn btn-navy" style="width:100%">Request the proposal</button>
          <p class="privacy">We use these details to answer your enquiry only. See the <a href="#">privacy notice</a>.</p></div>
      </form>
    </div>
  </div>
</section>

<!-- 11 THREE STEPS -->
<section class="section">
  <div class="container">
    <div class="eyebrow">Enrolling</div>
    <h2>Three steps between you and a seat.</h2>
    <div class="steps-grid">
      <div class="step"><div class="eyebrow">Step 01</div><h3>Pick the course and the timing</h3><p>Use the course finder or call us. We will tell you honestly whether a course fits your level, and suggest a different one if it does not.</p></div>
      <div class="step"><div class="eyebrow">Step 02</div><h3>Confirm your place</h3><p>Complete the registration form and settle the fee. You receive written confirmation with the venue, the start date and the daily timings.</p></div>
      <div class="step"><div class="eyebrow">Step 03</div><h3>Attend and certify</h3><p>Train Monday to Friday in your chosen group, then collect your CompuBase completion certificate and your exam guidance where the course leads to one.</p></div>
    </div>
    <div class="steps-photo"><div class="photo-frame">📷 &nbsp;Photograph goes here: the CompuBase training room, a trainer mid-session, or the reception at the Abu Dhabi centre. Secure releases from anyone identifiable.</div></div>
  </div>
</section>

<!-- 12 WHY COMPUBASE -->
<section class="section why">
  <div class="container">
    <div class="eyebrow">Why CompuBase</div>
    <h2>A training centre built around the working week.</h2>
    <p style="max-width:700px">CompuBase Training Center runs from a single Abu Dhabi campus. Every course on this site is taught in our own rooms, by our own faculty, on a timetable designed for people who cannot stop working to study.</p>
    <div class="why-grid">
      <div class="why-item"><h3>Morning and evening groups</h3><p>The same syllabus, twice a day, so your shift pattern is not a reason to postpone a qualification.</p></div>
      <div class="why-item"><h3>Taught in Arabic or English</h3><p>Course material and instruction in the language your group works in.</p></div>
      <div class="why-item"><h3>Classroom, not a video library</h3><p>Small groups in a real room, where a question gets answered the moment it comes up.</p></div>
      <div class="why-item"><h3>Straight answers on fit</h3><p>If a course is not right for your level or your goal, an advisor will say so before you pay.</p></div>
    </div>
  </div>
</section>

<!-- 13 TESTIMONIALS -->
<section class="section testi">
  <div class="container">
    <div class="eyebrow">From our learners</div>
    <h2>What people say after the course.</h2>
    <div class="placeholder-note">[Replace all three with real, attributed feedback collected from past delegates. Written consent required before publishing a name or employer.]</div>
    <div class="testi-grid">
      <div class="quote"><div class="qm">“</div><p>[Learner quote — one specific thing the course changed about how they work. Two or three sentences, in their own words.]</p><b>[Full name]</b><small>[Job title], [Organisation] · PMP, [year]</small></div>
      <div class="quote"><div class="qm">“</div><p>[Learner quote — ideally from a corporate group, mentioning how the in-house format worked around their operations.]</p><b>[Full name]</b><small>[Job title], [Organisation] · Cyber Security Essentials</small></div>
      <div class="quote"><div class="qm">“</div><p>[Learner quote — a language or IELTS candidate is a good third voice, to show the range of the centre.]</p><b>[Full name]</b><small>[Job title], [Organisation] · IELTS Preparation</small></div>
    </div>
  </div>
</section>

<!-- 14 SEO CONTENT -->
<section class="section seo-content" id="about">
  <div class="container">
    <div>
      <div class="eyebrow">About our training</div>
      <h1>Professional training courses in Abu Dhabi, built for people already in work</h1>
      <p>CompuBase Training Center is a classroom training provider in Abu Dhabi offering professional certification preparation, IT and cyber security courses, and English and Arabic language training. Every programme runs Monday to Friday with a morning group and an evening group, so a qualification does not have to cost you annual leave.</p>
      <p>Courses range from a two-day Prompt Engineering workshop to a full month of English language tuition. Whichever you choose, you train in a room with a CompuBase instructor rather than working alone through recorded video.</p>
      <h3>Certification courses for finance, audit and project professionals</h3>
      <p>Our certification track covers four of the credentials most often asked for in UAE job specifications: PMP for project managers, CIA for internal auditors, CMA for management accountants and CISA for information systems auditors. Each runs as forty classroom hours across a working week, with evening groups for candidates in full-time roles.</p>
      <p>Sessions follow the published exam domains for each credential and include worked questions under exam conditions. Examination fees are paid directly to the awarding body and are not included in the course fee.</p>
      <h3>Cyber security and AI training for UAE teams</h3>
      <p>Organisations across Abu Dhabi are being asked to evidence security awareness and responsible AI use. Our IT track answers both: Cyber Security Essentials for staff who need to recognise and report a threat, EC-Council Ethical Hacking for technical teams testing their own systems, and short AI Essentials and Prompt Engineering workshops for everyone else.</p>
      <p>The two AI courses are deliberately short — eighteen and twelve hours — because they are meant to be booked for a whole department without disrupting a month of work.</p>
      <h3>English, Arabic and Microsoft Office skills</h3>
      <p>Language is the foundation under every other qualification on this site. We teach general English over a month, IELTS preparation over two weeks for candidates with a test date booked, and Arabic for non-Arabic speakers for residents who want to work and live more confidently in the UAE.</p>
      <p>Alongside them, MS Office with Copilot covers Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout rather than bolted on at the end.</p>
      <h3>Corporate training delivered across the UAE</h3>
      <p>Any course listed here can be delivered privately to one organisation, at your premises or in a closed group at our Abu Dhabi centre. Content, examples and timetable are adapted to the team. Request a corporate training proposal and an advisor will come back with dates, format and a written quote.</p>
    </div>
    <aside>
      <div class="side-box">
        <h4>Popular courses</h4>
        <ul>
          <li><a href="{{ route('pmp') }}">PMP certification training</a></li>
          <li><a href="{{ route('ceh') }}">Ethical hacking (CEH)</a></li>
          <li><a href="{{ route('cisa') }}">CISA exam preparation</a></li>
          <li><a href="{{ route('ielts') }}">IELTS preparation</a></li>
          <li><a href="{{ route('office') }}">MS Office with Copilot</a></li>
          <li><a href="{{ route('arabic') }}">Arabic for non-Arabic speakers</a></li>
        </ul>
      </div>
      <div class="side-box calendar" id="calendar">
        <h4>Course calendar</h4>
        <h3>Get every start date as a PDF</h3>
        <p>All 12 courses, durations and timings on one page — useful when you need approval from a manager.</p>
        <form onsubmit="event.preventDefault();alert('Demo only — connect to your email handler before launch.')">
          <input type="email" placeholder="name@company.ae" required>
          <button class="btn btn-gold">Send me the calendar</button>
        </form>
      </div>
    </aside>
  </div>
</section>

<!-- 15 FAQ -->
<section class="section faq">
  <div class="container">
    <div class="head-row">
      <div>
        <div class="eyebrow">Common questions</div>
        <h2>Before you register.</h2>
        <p>If your question is not here, an advisor will answer it directly.</p>
      </div>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">Ask on WhatsApp</a>
    </div>
    <details open>
      <summary>Are courses taught in English or Arabic?</summary>
      <div class="a">Both. The language of instruction depends on the group, and every course is published with its Arabic title so you can see at a glance what you are booking. Tell us your preference when you enquire and we will place you in a group taught in that language.</div>
    </details>
    <details><summary>Can I attend in the evening if I work full time?</summary><div class="a">[Answer to be supplied and verified against the approved course information sheet.]</div></details>
    <details><summary>Where is the training centre and is parking available?</summary><div class="a">[Answer to be supplied and verified against the approved course information sheet.]</div></details>
    <details><summary>Do I receive a certificate, and is the exam fee included?</summary><div class="a">[Answer to be supplied and verified against the approved course information sheet.]</div></details>
    <details><summary>How much does a course cost and how do I pay?</summary><div class="a">[Answer to be supplied and verified against the approved course information sheet.]</div></details>
    <details><summary>Can you train my team at our own offices?</summary><div class="a">[Answer to be supplied and verified against the approved course information sheet.]</div></details>
    <div class="placeholder-note">[Answers for the collapsed questions to be supplied and verified against the approved course information sheet. Mark this block up as FAQPage structured data before launch.]</div>
  </div>
</section>

<!-- 16/17 CLOSING -->
<section class="closing" id="contact">
  <div class="container">
    <div>
      <h2>Registration is now open. Morning and evening classes are available.</h2>
      <p>CompuBase Training Center, Abu Dhabi. Call or WhatsApp 050 6399915.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="{{ route('schedule') }}">Register now</a>
      <a class="btn btn-outline" href="tel:0506399915">050 6399915</a>
    </div>
  </div>
</section>

</div><!-- /page-home -->

<!-- 18 FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><img src="{{ asset('images/logo-light.png') }}" alt="CompuBase — Innovative Training Solutions" width="720" height="275"></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="{{ route('pmp') }}">PMP</a></li>
        <li><a href="{{ route('cia') }}">CIA</a></li>
        <li><a href="{{ route('cma') }}">CMA</a></li>
        <li><a href="{{ route('cisa') }}">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="{{ route('ceh') }}">Ethical Hacking</a></li>
        <li><a href="{{ route('cyber') }}">Cyber Security Essentials</a></li>
        <li><a href="{{ route('ai') }}">AI Essentials</a></li>
        <li><a href="{{ route('prompt') }}">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="{{ route('english') }}">English Language</a></li>
        <li><a href="{{ route('ielts') }}">IELTS Preparation</a></li>
        <li><a href="{{ route('arabic') }}">Arabic for Non-Arabic Speakers</a></li>
        <li><a href="{{ route('office') }}">MS Office + Copilot</a></li>
      </ul></div>
      <div><h4>Contact</h4>
        <p><b style="color:#fff">CompuBase Training Center</b><br>[Full street address]<br>Abu Dhabi, United Arab Emirates</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">[info@compubase.ae]</a><br>Sunday to Thursday · [opening hours]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> CompuBase Training Center. All rights reserved.</span>
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="{{ route('home-ar') }}">AR</a></span>
    </div>
  </div>
</footer>

<!-- Mobile fixed contact bar -->
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#">Register</a>
</div>


</div>
@endsection
