@extends('layouts.site')

@section('content')
@verbatim
<!-- ================ PAGE: home ================ -->
<div class="page" id="pg-home" lang="en">

<!-- 01 UTILITY BAR -->
<div class="utility">
  <div class="container">
    <div class="left">
      <span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span>
    </div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#home-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>

<!-- 02 HEADER -->
<header class="site">
  <div class="container">
    <a class="logo" href="#home">
      <b>CompuBase</b><small>Innovative Training Solutions</small>
    </a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#home-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#register">Register now</a>
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
        <a class="btn btn-gold" href="#schedule">Register for the next intake →</a>
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
      <a class="btn btn-outline" href="#calendar">⤓ Download the course calendar</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>Next confirmed groups</caption>
        <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
        <tbody id="schedBody"></tbody>
      </table>
    </div>
    <p class="sched-note">Showing 8 of 12 courses. All groups run Monday to Friday at the Abu Dhabi centre. <a href="#featured" style="font-weight:700;text-decoration:underline">See the full schedule</a></p>
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
          <li><a href="#pmp">PMP certification training</a></li>
          <li><a href="#ceh">Ethical hacking (CEH)</a></li>
          <li><a href="#cisa">CISA exam preparation</a></li>
          <li><a href="#ielts">IELTS preparation</a></li>
          <li><a href="#office">MS Office with Copilot</a></li>
          <li><a href="#arabic">Arabic for non-Arabic speakers</a></li>
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
      <a class="btn btn-navy" href="#schedule">Register now</a>
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
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
        <div class="placeholder-note" style="margin-top:14px;background:rgba(255,255,255,.06);border-color:rgba(199,184,143,.5);color:var(--gold-light)">Reversed (white) logo needed — the grey wordmark loses contrast on Deep Navy.</div>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li>
        <li><a href="#cia">CIA</a></li>
        <li><a href="#cma">CMA</a></li>
        <li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li>
        <li><a href="#cyber">Cyber Security Essentials</a></li>
        <li><a href="#ai">AI Essentials</a></li>
        <li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li>
        <li><a href="#ielts">IELTS Preparation</a></li>
        <li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li>
        <li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#home-ar">AR</a></span>
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

<!-- ================ PAGE: about ================ -->
<div class="page" id="pg-about" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#about-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#about-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><b style="color:var(--navy)">About us</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">About CompuBase</div>
  <h1>A training centre built around the working week.</h1><p class="lead">CompuBase Training Center runs from a single Abu Dhabi campus. Every course is taught in our own rooms, by our own faculty, on a timetable designed for people who cannot stop working to study.</p></div>
</div></section>
<section class="section"><div class="container">
  <div class="eyebrow">Who we are</div>
  <h2>Classroom training, done properly.</h2>
  <div style="max-width:760px">
    <p>CompuBase Training Center — Innovative Training Solutions — is a professional training institute in Abu Dhabi, United Arab Emirates. We deliver twelve scheduled courses across three tracks: professional certifications (PMP, CIA, CMA, CISA), IT and cyber security (Ethical Hacking, Cyber Security Essentials, AI Essentials, Prompt Engineering), and languages and office skills (English, IELTS, Arabic for non-Arabic speakers, MS Office with Copilot).</p>
    <p>Every programme runs Monday to Friday with a morning group and an evening group, taught in English or Arabic depending on the group. Courses range from a two-day workshop to a full month of tuition — and all of them happen in a real classroom, with an instructor who answers questions the moment they come up.</p>
    <p>[Add: founding year, licence details, and two or three sentences of the centre's own history — to be supplied by CompuBase before publication.]</p>
  </div>
  <div class="placeholder-note" style="max-width:760px">[History, founding year, and team details to be confirmed with the client before this page goes live.]</div>
</div></section>
<section class="accred"><div class="container" style="text-align:center">
  <div class="eyebrow">Accredited and recognised by</div>
  <div class="marks"><div class="mark">ACTVET</div><div class="mark">BRITISH COUNCIL</div><div class="mark">IELTS</div><div class="mark">ICDL</div></div>
</div></section>
<section class="section why"><div class="container">
  <div class="eyebrow">Why learners choose us</div>
  <h2>What makes CompuBase different.</h2>
  <div class="why-grid">
    <div class="why-item"><h3>Morning and evening groups</h3><p>The same syllabus, twice a day, so your shift pattern is not a reason to postpone a qualification.</p></div>
    <div class="why-item"><h3>Taught in Arabic or English</h3><p>Course material and instruction in the language your group works in.</p></div>
    <div class="why-item"><h3>Classroom, not a video library</h3><p>Small groups in a real room, where a question gets answered the moment it comes up.</p></div>
    <div class="why-item"><h3>Straight answers on fit</h3><p>If a course is not right for your level or your goal, an advisor will say so before you pay.</p></div>
  </div>
  <div class="steps-photo"><div class="photo-frame">📷 &nbsp;Photograph goes here: the CompuBase training rooms, faculty, or reception at the Abu Dhabi centre.</div></div>
</div></section>
<section class="closing"><div class="container">
  <div><h2>Come and see the centre.</h2><p>CompuBase Training Center, Abu Dhabi. Call or WhatsApp 050 6399915.</p></div>
  <div class="actions"><a class="btn btn-navy" href="#contact">Contact us</a><a class="btn btn-outline" href="#courses">Browse courses</a></div>
</div></section><footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#about-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: contact ================ -->
<div class="page" id="pg-contact" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#contact-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#contact-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><b style="color:var(--navy)">Contact</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Contact and registration</div>
  <h1>Talk to an advisor today.</h1><p class="lead">Call, WhatsApp or send the form — an advisor replies with available dates, timings and fees for the course you are interested in.</p></div>
</div></section>
<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 380px;gap:56px;align-items:start" id="contactGrid">
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>Registration and enquiry form</h3>
    <p class="sub">Tell us the course and your preferred timing — we reply with the next start date and the fee.</p>
    <form onsubmit="event.preventDefault();alert('Demo only — connect this form to your enquiry handler before launch.')">
      <div class="field"><label>Full name</label><input placeholder="Your name" required></div>
      <div class="field"><label>Mobile</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>Email</label><input type="email" placeholder="name@email.com" required></div>
      <div class="field"><label>Preferred timing</label><select><option>Morning or evening</option><option>Morning</option><option>Evening</option></select></div>
      <div class="field full"><label>Course of interest</label><select><option>Select a course</option><option>PMP — Project Management Professional</option><option>CIA — Certified Internal Auditor</option><option>CMA — Certified Management Accountant</option><option>CISA — Information Systems Auditor</option><option>EC-Council Certified Ethical Hacker</option><option>Cyber Security Essentials</option><option>AI Essentials</option><option>Prompt Engineering</option><option>English Language</option><option>IELTS Preparation</option><option>Arabic for Non-Arabic Speakers</option><option>MS Office + Copilot</option></select></div>
      <div class="field full"><label>Message <span style="text-transform:none;font-weight:400">Optional</span></label><textarea placeholder="Anything we should know — your level, your exam date, your team size."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">Send the enquiry</button>
      <p class="privacy">We use these details to answer your enquiry only. See the <a href="#">privacy notice</a>.</p></div>
    </form>
  </div>
  <aside>
    <div class="side-box">
      <h4>Reach us directly</h4>
      <p><b style="color:var(--navy)">Phone / WhatsApp</b><br><a href="tel:0506399915" style="color:var(--gold-ink);font-weight:700">050 6399915</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Email</b><br><a href="mailto:info@compubase.ae">[info@compubase.ae]</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Address</b><br>[Full street address]<br>Abu Dhabi, United Arab Emirates</p>
      <p style="margin-top:12px"><b style="color:var(--navy)">Office hours</b><br>Sunday to Thursday · [opening hours]</p>
      <a class="btn btn-gold" style="width:100%;margin-top:16px" href="https://wa.me/9710506399915">WhatsApp us now</a>
    </div>
    <div class="side-box">
      <h4>Location map</h4>
      <div class="trainer-photo" style="min-height:220px">📍 &nbsp;Google Maps embed goes here once the street address is confirmed.</div>
    </div>
  </aside>
</div></section>
<style>@media(max-width:1024px){#contactGrid{grid-template-columns:1fr!important}}</style>
<section class="closing"><div class="container">
  <div><h2>Prefer to just call?</h2><p>An advisor answers Sunday to Thursday during office hours.</p></div>
  <div class="actions"><a class="btn btn-navy" href="tel:0506399915">Call 050 6399915</a></div>
</div></section><footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#contact-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: courses ================ -->
<div class="page" id="pg-courses" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#courses-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#courses-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><b style="color:var(--navy)">All courses</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Course catalogue</div>
  <h1>Twelve courses. Three tracks. One campus.</h1><p class="lead">Certification, IT and cyber security, and language training — every course Monday to Friday in Abu Dhabi, with morning and evening groups.</p></div>
</div></section>
<section class="section featured"><div class="container">
  <div class="course-grid" style="grid-template-columns:repeat(3,1fr)">
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>PMP — Project Management Professional</h3></div>
    <div class="body"><p>Work through the PMP exam domains with practice questions and the 35 contact hours the application requires.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#pmp">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CIA — Certified Internal Auditor</h3></div>
    <div class="body"><p>Evening exam preparation covering the internal audit essentials, practice and knowledge domains of the CIA syllabus.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#cia">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CMA — Certified Management Accountant</h3></div>
    <div class="body"><p>Financial planning, analytics, and strategic financial management mapped to the two-part CMA examination.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#cma">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Certification</span><h3>CISA — Information Systems Auditor</h3></div>
    <div class="body"><p>Audit, control and assurance of information systems, mapped to the current ISACA CISA job practice areas.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#cisa">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>EC-Council Certified Ethical Hacker</h3></div>
    <div class="body"><p>Probe systems the way an attacker would, in a supervised lab, and prepare for the EC-Council CEH examination.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#ceh">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>Cyber Security Essentials</h3></div>
    <div class="body"><p>A practical week that moves staff from awareness to capability — recognising, reporting and responding to threats.</p>
      <div class="meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#cyber">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>AI Essentials</h3></div>
    <div class="body"><p>Put AI tools to work on the tasks your role already involves — reporting, drafting, analysis. No coding required.</p>
      <div class="meta">
        <div><span>Duration</span><b>3 days · 18 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#ai">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">IT and cyber security</span><h3>Prompt Engineering</h3></div>
    <div class="body"><p>Two focused days on getting consistently better output from AI tools — structure, context, iteration and evaluation.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 days · 12 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#prompt">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>English Language</h3></div>
    <div class="body"><p>A month of general English tuition across speaking, writing, listening and reading, in a small classroom group.</p>
      <div class="meta">
        <div><span>Duration</span><b>1 month · 40 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#english">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>IELTS Preparation</h3></div>
    <div class="body"><p>Timed practice and exam technique across listening, reading, writing and speaking, with feedback on every mock.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#ielts">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Languages</span><h3>Arabic for Non-Arabic Speakers</h3></div>
    <div class="body"><p>Practical spoken and written Arabic for residents who want to work and live more confidently in the UAE.</p>
      <div class="meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#arabic">Course details and fees →</a>
    </div>
  </div>
  <div class="course-card">
    <div class="head"><span class="tag">Office skills</span><h3>MS Office + Copilot</h3></div>
    <div class="body"><p>Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout the week.</p>
      <div class="meta">
        <div><span>Duration</span><b>1 week · 30 hours</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
      </div>
      <a class="btn btn-outline" href="#office">Course details and fees →</a>
    </div>
  </div></div>
  <p class="foot">Not sure which fits? Call an advisor on <a href="tel:0506399915">050 6399915</a></p>
</div></section>
<section class="closing"><div class="container">
  <div><h2>Registration is now open.</h2><p>Morning and evening classes are available.</p></div>
  <div class="actions"><a class="btn btn-navy" href="#contact">Register now</a><a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a></div>
</div></section><footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#courses-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: schedule ================ -->
<div class="page" id="pg-schedule" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#schedule-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#schedule-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><b style="color:var(--navy)">Schedule</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
 <div><div class="eyebrow on-dark">Upcoming intakes</div>
 <h1>Every start date, in one table.</h1>
 <p class="lead">Confirmed intakes at the Abu Dhabi centre for all 12 courses. If a date does not suit you, tell us your preferred week and we will place you in the next group.</p></div>
</div></section>
<section class="section schedule"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">All 12 courses</div><h2>Next confirmed groups.</h2></div>
  <a class="btn btn-outline" href="#contact">⤓ Get the calendar by email</a>
 </div>
 <div class="table-wrap">
  <table class="sched">
   <caption>Monday to Friday · Abu Dhabi centre</caption>
   <thead><tr><th>Course</th><th>Category</th><th>Duration</th><th>Timing</th><th>Starts</th><th>Seat</th></tr></thead>
   <tbody>
<tr><td><b style="color:var(--navy)"><a href="#pmp" style="color:var(--navy)">PMP — Project Management Professional</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cia" style="color:var(--navy)">CIA — Certified Internal Auditor</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cma" style="color:var(--navy)">CMA — Certified Management Accountant</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cisa" style="color:var(--navy)">CISA — Information Systems Auditor</a></b></td><td>Certification</td><td>5 days · 40 hrs</td><td>Evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ceh" style="color:var(--navy)">EC-Council Certified Ethical Hacker</a></b></td><td>IT and cyber</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cyber" style="color:var(--navy)">Cyber Security Essentials</a></b></td><td>IT and cyber</td><td>5 days · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ai" style="color:var(--navy)">AI Essentials</a></b></td><td>IT and cyber</td><td>3 days · 18 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#prompt" style="color:var(--navy)">Prompt Engineering</a></b></td><td>IT and cyber</td><td>2 days · 12 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#english" style="color:var(--navy)">English Language</a></b></td><td>Languages</td><td>1 month · 40 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ielts" style="color:var(--navy)">IELTS Preparation</a></b></td><td>Languages</td><td>2 weeks · 20 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#arabic" style="color:var(--navy)">Arabic for Non-Arabic Speakers</a></b></td><td>Languages</td><td>2 weeks · 20 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#office" style="color:var(--navy)">MS Office + Copilot</a></b></td><td>Office skills</td><td>1 week · 30 hrs</td><td>Morning or evening</td><td>[DATE]</td><td><a href="#contact">Register</a></td></tr>
   </tbody>
  </table>
 </div>
 <p class="sched-note">All groups run Monday to Friday at the Abu Dhabi centre. Start dates to be confirmed — call <a href="tel:0506399915" style="font-weight:700;text-decoration:underline">050 6399915</a> for the nearest intake.</p>
</div></section>
<section class="closing"><div class="container">
 <div><h2>Registration is now open.</h2><p>Morning and evening classes are available.</p></div>
 <div class="actions"><a class="btn btn-navy" href="#contact">Register now</a><a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a></div>
</div></section>
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#courses-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: corporate ================ -->
<div class="page" id="pg-corporate" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#corporate-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#corporate-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><b style="color:var(--navy)">Corporate training</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">Corporate and in-house training</div>
  <h1>Train the whole team. At your office, or ours.</h1><p class="lead">Any course on this site can be delivered privately to a single organisation, adapted to your systems, your policies and your sector.</p></div>
</div></section>
<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start" id="corpGrid">
  <div>
    <div class="eyebrow">How it works</div>
    <h2>Built around your operations.</h2>
    <ul class="corp-points" style="margin-top:24px">
      <li style="color:var(--text)"><b style="color:var(--navy)">Delivered at your premises across the UAE</b><span style="color:#6b7688">Or in a private group at the Abu Dhabi centre, whichever costs your team less time.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Content mapped to your roles</b><span style="color:#6b7688">Case material, exercises and examples rewritten around the work your people actually do.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Attendance records and completion certificates</b><span style="color:#6b7688">Documentation your HR and compliance teams can file without chasing us for it.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">Group rates</b><span style="color:#6b7688">From [N] delegates — confirm the threshold with an advisor.</span></li>
    </ul>
    <div class="steps-grid" style="margin-top:40px;grid-template-columns:1fr">
      <div class="step"><div class="eyebrow">Step 01</div><h3>Tell us the team and the outcome</h3><p>Six fields on the form — or one WhatsApp message.</p></div>
      <div class="step"><div class="eyebrow">Step 02</div><h3>Receive a written proposal</h3><p>Dates, format, venue and a quote, usually within [X] working days.</p></div>
      <div class="step"><div class="eyebrow">Step 03</div><h3>Train on your schedule</h3><p>Sessions timed around shifts, operations and business hours.</p></div>
    </div>
  </div>
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>Request a training proposal</h3>
    <p class="sub">Six fields. An advisor replies with dates, format and a written quote.</p>
    <form onsubmit="event.preventDefault();alert('Demo only — connect this form to your enquiry handler before launch.')">
      <div class="field"><label>Full name</label><input placeholder="Your name" required></div>
      <div class="field"><label>Organisation</label><input placeholder="Company name" required></div>
      <div class="field"><label>Work email</label><input type="email" placeholder="name@company.ae" required></div>
      <div class="field"><label>Mobile</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>Course of interest</label><select><option>Select a course</option><option>PMP — Project Management Professional</option><option>CIA — Certified Internal Auditor</option><option>CMA — Certified Management Accountant</option><option>CISA — Information Systems Auditor</option><option>EC-Council Certified Ethical Hacker</option><option>Cyber Security Essentials</option><option>AI Essentials</option><option>Prompt Engineering</option><option>English Language</option><option>IELTS Preparation</option><option>Arabic for Non-Arabic Speakers</option><option>MS Office + Copilot</option></select></div>
      <div class="field"><label>Team size</label><select><option>Select a range</option><option>2–5</option><option>6–15</option><option>16–30</option><option>30+</option></select></div>
      <div class="field full"><label>What outcome are you aiming for? <span style="text-transform:none;font-weight:400">Optional</span></label><textarea placeholder="For example: twelve finance staff ready to sit the CMA exam before the end of the year."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">Request the proposal</button>
      <p class="privacy">We use these details to answer your enquiry only. See the <a href="#">privacy notice</a>.</p></div>
    </form>
  </div>
</div></section>
<style>@media(max-width:1024px){#corpGrid{grid-template-columns:1fr!important}}</style>
<section class="closing"><div class="container">
  <div><h2>Faster by phone.</h2><p>WhatsApp 050 6399915 with the course name and team size — we take it from there.</p></div>
  <div class="actions"><a class="btn btn-navy" href="https://wa.me/9710506399915">WhatsApp us</a></div>
</div></section><footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#corporate-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: pmp ================ -->
<div class="page" id="pg-pmp" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#pmp-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#pmp-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Professional certifications</a><span>/</span><b style="color:var(--navy)">PMP</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Professional certification</span>
      <h1>PMP — Project Management Professional</h1>
      
      <p class="lead">Work through every PMP exam domain with a CompuBase instructor, and leave the week with the 35 contact hours the PMI application requires.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to PMI</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Five classroom days spent inside the PMP examination content outline: people, process and business environment. Each domain is taught, then practised against exam-style questions, so you finish the week knowing which areas still need work before you sit the paper.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Build a project charter, schedule and budget from a business case</li>
          <li>Apply predictive, agile and hybrid approaches to the right situation</li>
          <li>Manage risk, procurement and stakeholder expectations on a live project</li>
          <li>Sit the PMP examination with the required contact hours documented</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Project environment and the business case</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Scope, schedule and cost</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Quality, risk and procurement</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>People, teams and stakeholder management</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Exam technique and a full timed mock</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Project managers and coordinators with delivery experience</li>
            <li>Engineers and team leads moving into a project role</li>
            <li>PMO staff preparing for the PMI application</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took PMP also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CIA — Certified Internal Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cia">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CISA — Information Systems Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cisa">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#pmp-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: cia ================ -->
<div class="page" id="pg-cia" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cia-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cia-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Professional certifications</a><span>/</span><b style="color:var(--navy)">CIA</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Professional certification</span>
      <h1>CIA — Certified Internal Auditor</h1>
      
      <p class="lead">Prepare for all three parts of the IIA Certified Internal Auditor examination with evening classroom sessions built around a full-time role.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to IIA</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Forty evening classroom hours across the CIA syllabus: internal audit essentials, the practice of internal auditing, and the business knowledge tested in the examination — each area taught and then drilled with exam-style questions.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Plan and scope an internal audit engagement</li>
          <li>Apply the IIA standards and code of ethics to real cases</li>
          <li>Evaluate governance, risk management and controls</li>
          <li>Approach each CIA exam part with a revision plan</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Internal audit foundations and standards</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Governance, risk and control frameworks</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Engagement planning and fieldwork</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Reporting, follow-up and fraud awareness</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Exam technique and timed practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Internal auditors working toward the CIA credential</li>
            <li>Finance and compliance staff moving into audit</li>
            <li>Audit team members asked to formalise their qualification</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took CIA also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CMA — Certified Management Accountant</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cma">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CISA — Information Systems Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cisa">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>PMP — Project Management Professional</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#pmp">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#cia-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: cma ================ -->
<div class="page" id="pg-cma" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cma-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cma-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Professional certifications</a><span>/</span><b style="color:var(--navy)">CMA</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Professional certification</span>
      <h1>CMA — Certified Management Accountant</h1>
      
      <p class="lead">Evening classroom preparation across both parts of the IMA CMA examination, for finance professionals in full-time roles.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to IMA</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Forty evening hours across the CMA content: financial planning, performance and analytics in part one, and strategic financial management in part two — with worked questions under exam conditions throughout the week.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Build budgets, forecasts and performance reports</li>
          <li>Apply cost management and internal control concepts</li>
          <li>Analyse financial statements and investment decisions</li>
          <li>Plan the two-part CMA exam sitting with confidence</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>External reporting and planning</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Budgeting, forecasting and performance</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Cost management and internal controls</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Financial statement analysis and corporate finance</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Decision analysis, risk and exam practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Accountants working toward a management accounting credential</li>
            <li>Finance analysts moving into planning and reporting roles</li>
            <li>Finance teams asked to standardise on the CMA</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took CMA also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CIA — Certified Internal Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cia">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>PMP — Project Management Professional</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#pmp">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#cma-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: cisa ================ -->
<div class="page" id="pg-cisa" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cisa-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cisa-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Professional certifications</a><span>/</span><b style="color:var(--navy)">CISA</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Professional certification</span>
      <h1>CISA — Information Systems Auditor</h1>
      
      <p class="lead">Audit, control and assurance of information systems, mapped to the current ISACA CISA job practice areas, in an evening group.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to ISACA</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Forty evening classroom hours across the five CISA job practice areas — the IS audit process, IT governance, systems acquisition, operations and resilience, and protection of information assets — with exam-style questions after each domain.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Plan and execute a risk-based IS audit</li>
          <li>Evaluate IT governance and management practices</li>
          <li>Assess system development, operations and resilience</li>
          <li>Sit the CISA exam with each domain revised</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>The IS audit process</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Governance and management of IT</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Systems acquisition, development and implementation</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>IS operations and business resilience</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Protection of information assets and exam practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>IT auditors and audit team members</li>
            <li>Security and risk staff moving into assurance roles</li>
            <li>Internal auditors extending into information systems</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took CISA also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CIA — Certified Internal Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cia">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>EC-Council Certified Ethical Hacker</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#ceh">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Cyber Security Essentials</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#cyber">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#cisa-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: ceh ================ -->
<div class="page" id="pg-ceh" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ceh-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ceh-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">IT and cyber security</a><span>/</span><b style="color:var(--navy)">EC-Council Certified Ethical Hacker</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">IT and cyber security</span>
      <h1>EC-Council Certified Ethical Hacker</h1>
      
      <p class="lead">Probe systems the way an attacker would, in a supervised lab, and prepare for the EC-Council CEH examination.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to EC-Council</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Five hands-on classroom days moving through the attack lifecycle in a supervised lab: reconnaissance, scanning, gaining and maintaining access, and covering tracks — each phase practised on lab systems, never on live targets.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Run reconnaissance and vulnerability scans methodically</li>
          <li>Exploit common weaknesses in a controlled lab</li>
          <li>Document findings the way a professional tester reports them</li>
          <li>Prepare for the EC-Council CEH examination</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Ethics, scoping and reconnaissance</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Scanning, enumeration and vulnerability analysis</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>System hacking and web attacks in the lab</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Networks, wireless and social engineering</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Reporting, defences and exam preparation</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>System and network administrators testing their own estate</li>
            <li>Security analysts moving into offensive testing</li>
            <li>IT staff asked to evidence security capability</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took EC-Council Certified Ethical Hacker also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Cyber Security Essentials</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#cyber">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Certification</div><h3>CISA — Information Systems Auditor</h3>
        <p>5 days · 40 hours · Evening group</p>
        <a href="#cisa">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>AI Essentials</h3>
        <p>3 days · 18 hours · Morning or evening</p>
        <a href="#ai">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#ceh-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: cyber ================ -->
<div class="page" id="pg-cyber" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cyber-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cyber-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">IT and cyber security</a><span>/</span><b style="color:var(--navy)">Cyber Security Essentials</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">IT and cyber security</span>
      <h1>Cyber Security Essentials</h1>
      
      <p class="lead">A practical week that moves staff from security awareness to security capability — recognising, reporting and responding to everyday threats.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>5 days · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Five classroom days on the threats a UAE organisation actually faces: phishing and social engineering, credential and device hygiene, safe data handling, and what to do in the first hour of an incident — taught with real examples rather than theory.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Recognise phishing, social engineering and fraud attempts</li>
          <li>Apply password, device and data-handling hygiene</li>
          <li>Follow an incident-reporting process correctly</li>
          <li>Explain security policy to colleagues in plain language</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>The threat landscape and how attacks start</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Phishing, social engineering and fraud</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Passwords, devices and safe data handling</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Working securely — email, cloud and remote work</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Incident response and putting it into practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Staff at any level who handle company systems or data</li>
            <li>Teams asked to evidence security awareness training</li>
            <li>Managers building a security-conscious department</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took Cyber Security Essentials also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>EC-Council Certified Ethical Hacker</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#ceh">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>AI Essentials</h3>
        <p>3 days · 18 hours · Morning or evening</p>
        <a href="#ai">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Prompt Engineering</h3>
        <p>2 days · 12 hours · Morning or evening</p>
        <a href="#prompt">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#cyber-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: ai ================ -->
<div class="page" id="pg-ai" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ai-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ai-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">IT and cyber security</a><span>/</span><b style="color:var(--navy)">AI Essentials</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">IT and cyber security</span>
      <h1>AI Essentials</h1>
      
      <p class="lead">Put AI tools to work on the tasks your role already involves — reporting, drafting, analysis. No coding required.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>3 days · 18 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Three short classroom days that take a working professional from cautious first use to confident daily use of AI tools — drafting, summarising, analysing and checking — with your organisation’s data-handling rules kept front and centre.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Choose the right AI tool for a given task</li>
          <li>Draft, summarise and analyse work documents with AI</li>
          <li>Check and correct AI output before it leaves your desk</li>
          <li>Use AI within data-privacy and policy boundaries</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>How the tools work and where they fail</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Drafting, summarising and analysis in practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Policy, privacy and building a daily workflow</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Professionals in any role who write, report or analyse</li>
            <li>Departments adopting AI tools together</li>
            <li>Managers setting AI usage expectations for a team</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took AI Essentials also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Prompt Engineering</h3>
        <p>2 days · 12 hours · Morning or evening</p>
        <a href="#prompt">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Cyber Security Essentials</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#cyber">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#ai-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: prompt ================ -->
<div class="page" id="pg-prompt" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#prompt-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#prompt-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">IT and cyber security</a><span>/</span><b style="color:var(--navy)">Prompt Engineering</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">IT and cyber security</span>
      <h1>Prompt Engineering</h1>
      
      <p class="lead">Two focused days on getting consistently better output from AI tools — structure, context, iteration and evaluation.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>2 days · 12 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Twelve classroom hours on the craft behind good AI output: structuring a request, supplying the right context, iterating on a draft, and evaluating what comes back — practised on your own real work tasks across both days.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Structure prompts that produce usable first drafts</li>
          <li>Supply context, examples and constraints effectively</li>
          <li>Iterate and refine output instead of starting over</li>
          <li>Build reusable prompt patterns for recurring tasks</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Prompt structure, context and constraints</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Iteration, evaluation and reusable patterns</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Anyone already using AI tools who wants better results</li>
            <li>Teams standardising how they work with AI</li>
            <li>Graduates of AI Essentials going one level deeper</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took Prompt Engineering also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>AI Essentials</h3>
        <p>3 days · 18 hours · Morning or evening</p>
        <a href="#ai">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Cyber Security Essentials</h3>
        <p>5 days · 40 hours · Morning or evening</p>
        <a href="#cyber">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#prompt-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: english ================ -->
<div class="page" id="pg-english" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#english-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#english-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Languages and office skills</a><span>/</span><b style="color:var(--navy)">English Language</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Languages</span>
      <h1>English Language</h1>
      
      <p class="lead">A month of general English tuition — speaking, writing, listening and reading — in a small classroom group, morning or evening.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>1 month · 40 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Forty classroom hours over a month, building practical workplace English: everyday conversation, professional email and writing, listening comprehension and reading — with the group placed by level on day one.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Hold workplace conversations with confidence</li>
          <li>Write clear professional emails and messages</li>
          <li>Follow meetings, calls and spoken instructions</li>
          <li>Read and summarise work documents accurately</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Placement, speaking foundations and everyday vocabulary</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Workplace writing — email, messages and reports</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Listening and meetings practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Reading, review and consolidation</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Professionals building workplace English</li>
            <li>Residents preparing for study or a new role</li>
            <li>Teams whose working language is moving to English</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took English Language also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>IELTS Preparation</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="#ielts">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>Arabic for Non-Arabic Speakers</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="#arabic">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#english-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: ielts ================ -->
<div class="page" id="pg-ielts" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ielts-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ielts-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Languages and office skills</a><span>/</span><b style="color:var(--navy)">IELTS Preparation</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Languages</span>
      <h1>IELTS Preparation</h1>
      
      <p class="lead">Timed practice and exam technique across listening, reading, writing and speaking, with feedback on every mock.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Paid to test centre</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Twenty classroom hours over two weeks for candidates with a test date booked: timed practice in all four papers, band-descriptor marking on every mock, and targeted technique work on the sections costing you marks.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Manage time across all four IELTS papers</li>
          <li>Apply task-specific technique in writing tasks 1 and 2</li>
          <li>Approach the speaking interview with a clear structure</li>
          <li>Read your mock scores against the band descriptors</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Listening and reading technique with timed practice</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Writing tasks, speaking interview and full mock feedback</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Candidates with an IELTS test date booked</li>
            <li>Professionals needing a band score for licensure or visa</li>
            <li>Students preparing for university admission</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took IELTS Preparation also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>English Language</h3>
        <p>1 month · 40 hours · Morning or evening</p>
        <a href="#english">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>Arabic for Non-Arabic Speakers</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="#arabic">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#ielts-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: arabic ================ -->
<div class="page" id="pg-arabic" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#arabic-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#arabic-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Languages and office skills</a><span>/</span><b style="color:var(--navy)">Arabic for Non-Arabic Speakers</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Languages</span>
      <h1>Arabic for Non-Arabic Speakers</h1>
      
      <p class="lead">Practical spoken and written Arabic for residents who want to work and live more confidently in the UAE.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>2 weeks · 20 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Twenty classroom hours of practical Arabic for daily and working life in the UAE: greetings and courtesy, essential vocabulary, reading the script, and the phrases that make service, government and workplace interactions easier.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Greet, introduce and hold basic conversations in Arabic</li>
          <li>Read and write the Arabic script at a starter level</li>
          <li>Use courtesy and workplace phrases appropriately</li>
          <li>Continue learning independently with a clear method</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Sounds, script and greetings</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Everyday vocabulary and courtesy</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>Workplace and service interactions</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Reading practice and consolidation</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>UAE residents new to Arabic</li>
            <li>Customer-facing staff serving Arabic-speaking clients</li>
            <li>Professionals showing commitment to the local culture</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took Arabic for Non-Arabic Speakers also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>English Language</h3>
        <p>1 month · 40 hours · Morning or evening</p>
        <a href="#english">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>IELTS Preparation</h3>
        <p>2 weeks · 20 hours · Morning or evening</p>
        <a href="#ielts">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Office skills</div><h3>MS Office + Copilot</h3>
        <p>1 week · 30 hours · Morning or evening</p>
        <a href="#office">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#arabic-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: office ================ -->
<div class="page" id="pg-office" lang="en">
<div class="utility">
  <div class="container">
    <div class="left"><span>Abu Dhabi campus</span><span>Weekdays, Monday to Friday</span><span>Morning and evening classes</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#office-ar" title="Arabic version" style="font-weight:700">AR</a>
      <span class="status">REGISTRATION OPEN</span>
    </div>
  </div>
</div>
<header class="site">
  <div class="container">
    <a class="logo" href="#home"><b>CompuBase</b><small>Innovative Training Solutions</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses">Courses</a></li>
        <li><a href="#corporate">Corporate training</a></li>
        <li><a href="#home/accreditation">Accreditation</a></li>
        <li><a href="#schedule">Schedule</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#office-ar" lang="ar">AR</a>
      <a class="btn btn-outline" href="#corporate">Enquire</a>
      <a class="btn btn-navy" href="#contact">Register now</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<div class="crumbs"><div class="container"><a href="#home">Home</a><span>/</span><a href="#courses">Courses</a><span>/</span><a href="#courses">Languages and office skills</a><span>/</span><b style="color:var(--navy)">MS Office + Copilot</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.12em;text-transform:uppercase;padding:5px 12px">Office skills</span>
      <h1>MS Office + Copilot</h1>
      
      <p class="lead">Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout the week.</p>
      <div class="hero-meta">
        <div><span>Duration</span><b>1 week · 30 hours</b></div>
        <div><span>Days</span><b>Monday to Friday</b></div>
        <div><span>Timing</span><b>Morning or evening</b></div>
        <div><span>Location</span><b>Abu Dhabi centre</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">Next group</div>
      <div class="date">[START DATE]</div>
      <dl>
        <div><dt>Course fee</dt><dd>[AED X,XXX]</dd></div>
        <div><dt>Exam fee</dt><dd>Not applicable</dd></div>
        <div><dt>Group rate</dt><dd>From [N] delegates</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact">Register for this course →</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 Ask a question on WhatsApp</a>
      <a class="dl-link" href="#">⤓ Download the course outline</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <div class="tabs">
        <a href="#covers" class="active">Overview</a>
        <a href="#attend-side">Who should attend</a>
        <a href="#daybyday">Day by day</a>
        <a href="#trainer-side">Your trainer</a>
      </div>
      <h2 id="covers">What this course covers</h2>
      <p>Thirty classroom hours across the Microsoft applications a UAE office runs on — Excel, Word, PowerPoint and Outlook — each taught to a working standard, with Microsoft Copilot used inside every application rather than bolted on at the end.</p>
      <div class="placeholder-note">[Replace with the approved course description from the CompuBase course information sheet. Verify exam eligibility, contact hours and certification claims before publication.]</div>
      <h2>By the end you will be able to</h2>
      <ul class="outcomes">
          <li>Build and maintain working Excel sheets with formulas</li>
          <li>Produce clean Word documents and PowerPoint decks</li>
          <li>Manage email, calendar and tasks efficiently in Outlook</li>
          <li>Use Copilot to draft, summarise and analyse inside Office</li>
      </ul>
      <h2 id="daybyday">The course, day by day</h2>
        <div class="day"><div class="d">Day 1</div><div><b>Excel — formulas, tables and Copilot analysis</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 2</div><div><b>Word — documents, formatting and Copilot drafting</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 3</div><div><b>PowerPoint — decks and Copilot design help</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 4</div><div><b>Outlook — email, calendar and task management</b><p>[Session detail from the approved course information sheet.]</p></div></div>
        <div class="day"><div class="d">Day 5</div><div><b>Bringing it together on real work files</b><p>[Session detail from the approved course information sheet.]</p></div></div>
    </div>
    <aside>
      <div class="side-box" id="attend-side">
        <h4>Who should attend</h4>
        <ul class="attend" style="list-style:none">
            <li>Administrative and office staff at any level</li>
            <li>Professionals formalising self-taught Office skills</li>
            <li>Teams adopting Microsoft Copilot together</li>
        </ul>
      </div>
      <div class="side-box" id="trainer-side">
        <h4>Your trainer</h4>
        <div class="trainer-photo">👤 &nbsp;Trainer portrait</div>
        <b style="color:var(--navy)">[Trainer name]</b><br>
        <small style="color:var(--gold-ink)">[Credentials] · CompuBase faculty</small>
        <p style="font-size:13px;margin-top:10px">[Two sentences on the trainer's delivery background and the sectors they have worked in.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>Learners who took MS Office + Copilot also considered</h2>
    <div class="rel-grid">
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>AI Essentials</h3>
        <p>3 days · 18 hours · Morning or evening</p>
        <a href="#ai">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">IT and cyber security</div><h3>Prompt Engineering</h3>
        <p>2 days · 12 hours · Morning or evening</p>
        <a href="#prompt">Course details →</a></div>
      <div class="rel-card"><div class="eyebrow">Languages</div><h3>English Language</h3>
        <p>1 month · 40 hours · Morning or evening</p>
        <a href="#english">Course details →</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div>
      <h2>Registration is now open.</h2>
      <p>Morning and evening classes are available. CompuBase Training Center, Abu Dhabi.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#contact">Register now</a>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>CompuBase</b><small>Innovative Training Solutions</small></div>
        <p style="font-size:13px">Classroom training in professional certification, IT, cyber security and languages. One campus in Abu Dhabi, morning and evening groups, Monday to Friday.</p>
      </div>
      <div><h4>Certifications</h4><ul>
        <li><a href="#pmp">PMP</a></li><li><a href="#cia">CIA</a></li><li><a href="#cma">CMA</a></li><li><a href="#cisa">CISA</a></li>
      </ul></div>
      <div><h4>IT and cyber</h4><ul>
        <li><a href="#ceh">Ethical Hacking</a></li><li><a href="#cyber">Cyber Security Essentials</a></li><li><a href="#ai">AI Essentials</a></li><li><a href="#prompt">Prompt Engineering</a></li>
      </ul></div>
      <div><h4>Languages</h4><ul>
        <li><a href="#english">English Language</a></li><li><a href="#ielts">IELTS Preparation</a></li><li><a href="#arabic">Arabic for Non-Arabic Speakers</a></li><li><a href="#office">MS Office + Copilot</a></li>
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
      <span><a href="#">Privacy notice</a><a href="#">Terms and refunds</a><a href="#">Sitemap</a><a href="#office-ar">AR</a></span>
    </div>
  </div>
</footer>
<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">WhatsApp</a>
  <a class="btn btn-navy" href="#contact">Register</a>
</div>

</div>

<!-- ================ PAGE: home-ar ================ -->
<div class="page" id="pg-home-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#home" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#home" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>

<!-- HERO + SLIDER -->
<section class="hero-2col">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">مركز كمبيوبيس للتدريب · أبوظبي</div>
      <h1>احصل على مؤهلك المهني دون التوقف عن العمل.</h1>
      <p class="lead">دورات الشهادات المهنية والأمن السيبراني والذكاء الاصطناعي واللغات في أبوظبي — صباحاً أو مساءً خلال أيام الأسبوع، وبالعربية أو الإنجليزية، بإشراف كادرنا التدريبي.</p>
      <ul class="points">
        <li>12 دورة مجدولة في الشهادات المهنية وتقنية المعلومات واللغات</li>
        <li>حصص صفية من يومين إلى شهر كامل، من الاثنين إلى الجمعة</li>
        <li>تدريب داخلي متاح في مقر منشأتك في جميع أنحاء الإمارات</li>
      </ul>
      <div class="cta-row">
        <a class="btn btn-gold" href="#schedule-ar">سجّل في الدفعة القادمة ←</a>
        <a class="btn btn-outline-light" href="https://wa.me/9710506399915">واتساب 050 6399915</a>
      </div>
    </div>
    <div class="hero-box hero-slider">
      <div class="hs-slide active"><img class="bg" src="https://picsum.photos/seed/compubase-class/900/700" alt="قاعة تدريب في كمبيوبيس أبوظبي"><div class="cap">حصص صفية من الاثنين إلى الجمعة — مجموعات صباحية ومسائية</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cert/900/700" alt="التحضير للشهادات المهنية"><div class="cap">التحضير لامتحانات إدارة المشاريع والتدقيق والمحاسبة مع كادرنا الداخلي</div></div>
      <div class="hs-slide"><img class="bg" src="https://picsum.photos/seed/compubase-cyber/900/700" alt="ورش الأمن السيبراني والذكاء الاصطناعي"><div class="cap">ورش عملية في الأمن السيبراني والاختراق الأخلاقي والذكاء الاصطناعي</div></div>
      <div class="hs-arrows"><button class="hs-prev" aria-label="السابق">›</button><button class="hs-next" aria-label="التالي">‹</button></div>
      <div class="hs-dots"></div>
    </div>
  </div>
</section>

<!-- COURSE FINDER -->
<div class="container">
  <div class="finder">
    <div class="eyebrow">البحث عن دورة</div>
    <h3>تحقّق من أقرب مقعد متاح</h3>
    <form onsubmit="event.preventDefault();scrollSec('schedule')">
      <div class="field"><label>الفئة</label>
        <select><option>جميع الفئات</option><option>الشهادات المهنية</option><option>تقنية المعلومات والأمن السيبراني</option><option>اللغات والمهارات المكتبية</option></select></div>
      <div class="field"><label>الدورة</label>
        <select><option>أي دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field"><label>التوقيت المفضل</label>
        <select><option>صباحي أو مسائي</option><option>صباحي</option><option>مسائي</option></select></div>
      <button class="btn btn-navy" type="submit">عرض المواعيد ←</button>
    </form>
  </div>
</div>

<!-- ACCREDITATION -->
<section class="accred" id="accreditation">
  <div class="container" style="text-align:center">
    <div class="eyebrow">معتمدون ومعترف بنا من</div>
    <div class="marks">
      <div class="mark">أكتفيت</div>
      <div class="mark">المجلس الثقافي البريطاني</div>
      <div class="mark">آيلتس</div>
      <div class="mark">الرخصة الدولية لقيادة الحاسوب</div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="section" id="courses">
  <div class="container">
    <div class="eyebrow">فئات الدورات</div>
    <h2>ثلاثة مسارات، اثنتا عشرة دورة، ومقرّ واحد في أبوظبي.</h2>
    <p style="max-width:720px">سواء كنت تستعد لامتحان مهني، أو تنقل فريقك إلى مجال الأمن السيبراني والذكاء الاصطناعي، أو تبني مهارات اللغة والأوفيس التي تتطلبها بيئة العمل الإماراتية — فكل دوراتنا مجدولة حول أسبوع عمل كامل.</p>
    <div class="cat-grid">
      <div class="cat">
        <div class="num">01 <small>4 دورات</small></div>
        <h3>الشهادات المهنية</h3>
        <p>تحضير مركّز على الامتحانات لاعتمادات الإدارة المالية والتدقيق وإدارة المشاريع. التوقيت المسائي يناسب الموظفين بدوام كامل.</p>
        <table>
          <tr><td>شهادة إدارة المشاريع الاحترافية</td><td>40 ساعة</td></tr>
          <tr><td>شهادة المدقق الداخلي المعتمد</td><td>40 ساعة</td></tr>
          <tr><td>شهادة المحاسب الإداري المعتمد</td><td>40 ساعة</td></tr>
          <tr><td>شهادة مدقق نظم المعلومات المعتمد</td><td>40 ساعة</td></tr>
        </table>
        <a class="link" href="#featured">عرض دورات الشهادات ←</a>
      </div>
      <div class="cat">
        <div class="num">02 <small>4 دورات</small></div>
        <h3>تقنية المعلومات والأمن السيبراني</h3>
        <p>دورات قصيرة وعملية تنقل الفريق من مرحلة الوعي إلى مرحلة القدرة — من الاستخدام اليومي للذكاء الاصطناعي إلى الاختراق الأخلاقي التطبيقي.</p>
        <table>
          <tr><td>شهادة الاختراق الأخلاقي المعتمدة</td><td>40 ساعة</td></tr>
          <tr><td>أساسيات الأمن السيبراني</td><td>40 ساعة</td></tr>
          <tr><td>أساسيات الذكاء الاصطناعي</td><td>18 ساعة</td></tr>
          <tr><td>هندسة الأوامر النصية</td><td>12 ساعة</td></tr>
        </table>
        <a class="link" href="#featured">عرض دورات التقنية والأمن ←</a>
      </div>
      <div class="cat">
        <div class="num">03 <small>4 دورات</small></div>
        <h3>اللغات والمهارات المكتبية</h3>
        <p>الأساس الذي تُبنى عليه كل المؤهلات الأخرى: مهارات اللغة الإنجليزية والعربية وبرامج الأوفيس التي تتوقعها أي جهة عمل من اليوم الأول.</p>
        <table>
          <tr><td>دورة اللغة الإنجليزية</td><td>40 ساعة</td></tr>
          <tr><td>دورة التحضير لامتحان الآيلتس</td><td>20 ساعة</td></tr>
          <tr><td>اللغة العربية لغير الناطقين بها</td><td>20 ساعة</td></tr>
          <tr><td>مايكروسوفت أوفيس وكوبايلوت</td><td>30 ساعة</td></tr>
        </table>
        <a class="link" href="#featured">عرض دورات اللغات ←</a>
      </div>
    </div>
  </div>
</section>

<!-- FEATURED -->
<section class="section featured" id="featured">
  <div class="container">
    <div class="eyebrow">دورات هذه الدفعة</div>
    <h2>الدورات الأكثر طلباً لدى جهات العمل في أبوظبي.</h2>
    <p style="max-width:720px">تُعقد كل دورة من الاثنين إلى الجمعة في مقرّنا بأبوظبي، مع مجموعات صباحية ومسائية لتتمكن من التدرّب دون ترك عملك. تُخصّص المقاعد حسب أسبقية الاستفسار.</p>
    <div class="course-grid">
      <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة إدارة المشاريع الاحترافية</h3></div>
        <div class="body"><p>تغطية كاملة لمجالات امتحان إدارة المشاريع مع أسئلة تدريبية وساعات التواصل الخمس والثلاثين المطلوبة للتقديم.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة مدقق نظم المعلومات المعتمد</h3></div>
        <div class="body"><p>تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية المعتمدة، في مجموعة مسائية.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>شهادة الاختراق الأخلاقي المعتمدة</h3></div>
        <div class="body"><p>اختبر الأنظمة كما يفعل المهاجم، في مختبر خاضع للإشراف، واستعد لامتحان الشهادة المعتمدة.</p>
          <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الذكاء الاصطناعي</h3></div>
        <div class="body"><p>وظّف أدوات الذكاء الاصطناعي في مهام عملك اليومية — التقارير والصياغة والتحليل. لا حاجة للبرمجة.</p>
          <div class="meta"><div><span>المدة</span><b>3 أيام · 18 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة التحضير لامتحان الآيلتس</h3></div>
        <div class="body"><p>تدريب موقوت وتقنيات امتحان في الاستماع والقراءة والكتابة والمحادثة، مع تقييم لكل اختبار تجريبي.</p>
          <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
      <div class="course-card"><div class="head"><span class="tag">مهارات مكتبية</span><h3>مايكروسوفت أوفيس وكوبايلوت</h3></div>
        <div class="body"><p>إكسل وورد وباوربوينت وآوتلوك بمستوى احترافي، مع استخدام كوبايلوت طوال أيام الدورة.</p>
          <div class="meta"><div><span>المدة</span><b>أسبوع · 30 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
          <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
    </div>
    <p class="foot">تصفّح الدورات الاثنتي عشرة كاملة أو اتصل بمستشار التدريب على <a href="tel:0506399915">050 6399915</a></p>
  </div>
</section>

<!-- SCHEDULE -->
<section class="section schedule" id="schedule">
  <div class="container">
    <div class="sched-head">
      <div>
        <div class="eyebrow">الدفعات القادمة</div>
        <h2>جميع مواعيد البدء في جدول واحد.</h2>
        <p style="max-width:640px">دفعات مؤكدة في مقر أبوظبي. إن لم يناسبك موعد، أخبرنا بالأسبوع الذي تفضّله وسنضمّك إلى المجموعة التالية.</p>
      </div>
      <a class="btn btn-outline" href="#contact-ar">⤓ تحميل تقويم الدورات</a>
    </div>
    <div class="table-wrap">
      <table class="sched">
        <caption>المجموعات المؤكدة القادمة</caption>
        <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
        <tbody>
          <tr><td><b style="color:var(--navy)">شهادة إدارة المشاريع الاحترافية</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة الاختراق الأخلاقي المعتمدة</b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">أساسيات الأمن السيبراني</b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة المدقق الداخلي المعتمد</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">شهادة المحاسب الإداري المعتمد</b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">دورة اللغة الإنجليزية</b></td><td>لغات</td><td>شهر · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">أساسيات الذكاء الاصطناعي</b></td><td>تقنية وأمن</td><td>3 أيام · 18 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
          <tr><td><b style="color:var(--navy)">هندسة الأوامر النصية</b></td><td>تقنية وأمن</td><td>يومان · 12 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
        </tbody>
      </table>
    </div>
    <p class="sched-note">يعرض الجدول 8 دورات من أصل 12. تُعقد جميع المجموعات من الاثنين إلى الجمعة في مقر أبوظبي.</p>
  </div>
</section>

<!-- FACTS -->
<section class="facts">
  <div class="container">
    <div class="fact"><b>12</b><p>دورة مجدولة في ثلاث فئات</p></div>
    <div class="fact"><b>2</b><p>توقيتان يومياً — مجموعات صباحية ومسائية</p></div>
    <div class="fact"><b>ع / إ</b><p>التدريس بالعربية أو الإنجليزية حسب الدورة</p></div>
    <div class="fact"><b>[X]</b><p>متدرّب تخرّج من مركزنا في أبوظبي — يُؤكَّد الرقم قبل النشر</p></div>
  </div>
</section>

<!-- CORPORATE -->
<section class="section corporate" id="corporate">
  <div class="container">
    <div>
      <div class="eyebrow on-dark">التدريب المؤسسي والداخلي</div>
      <h2>درّب فريقك كاملاً. في مقرّك أو مقرّنا.</h2>
      <p class="lead">يمكن تقديم أي دورة على هذا الموقع بشكل خاص لمنشأة واحدة، مع تكييف المحتوى وفق أنظمتكم وسياساتكم وقطاعكم. أخبرنا بالفريق والهدف، ونحن نبني الجدول حول سير عملكم.</p>
      <ul class="corp-points">
        <li><b>التدريب في مقرّكم في جميع أنحاء الإمارات</b><span>أو في مجموعة خاصة بمقرّنا في أبوظبي — أيهما يوفّر وقت فريقكم أكثر.</span></li>
        <li><b>محتوى مصمّم حسب أدواركم الوظيفية</b><span>حالات عملية وتمارين وأمثلة تُعاد صياغتها حول العمل الفعلي لموظفيكم.</span></li>
        <li><b>سجلات حضور وشهادات إتمام</b><span>وثائق جاهزة لإدارات الموارد البشرية والامتثال دون متابعة منكم.</span></li>
      </ul>
      <div class="corp-cta">
        <a class="btn btn-gold" href="https://wa.me/9710506399915">واتساب 050 6399915</a>
        <small>تسري أسعار المجموعات ابتداءً من [العدد] متدربين.</small>
      </div>
    </div>
    <div class="proposal">
      <h3>اطلب عرضاً تدريبياً</h3>
      <p class="sub">ستة حقول فقط. يردّ عليك مستشار التدريب بالمواعيد والصيغة وعرض سعر مكتوب.</p>
      <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
        <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
        <div class="field"><label>المنشأة</label><input placeholder="اسم الشركة" required></div>
        <div class="field"><label>البريد الإلكتروني للعمل</label><input type="email" placeholder="name@company.ae" required></div>
        <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
        <div class="field"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
        <div class="field"><label>حجم الفريق</label><select><option>اختر النطاق</option><option>2–5</option><option>6–15</option><option>16–30</option><option>أكثر من 30</option></select></div>
        <div class="field full"><label>ما الهدف الذي تسعون إليه؟ <span style="text-transform:none;font-weight:400">اختياري</span></label>
          <textarea placeholder="مثال: اثنا عشر موظفاً مالياً جاهزون لامتحان المحاسب الإداري قبل نهاية العام."></textarea></div>
        <div class="full"><button class="btn btn-navy" style="width:100%">اطلب العرض</button>
          <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
      </form>
    </div>
  </div>
</section>

<!-- STEPS -->
<section class="section">
  <div class="container">
    <div class="eyebrow">خطوات التسجيل</div>
    <h2>ثلاث خطوات تفصلك عن مقعدك.</h2>
    <div class="steps-grid">
      <div class="step"><div class="eyebrow">الخطوة 01</div><h3>اختر الدورة والتوقيت</h3><p>استخدم أداة البحث عن الدورات أو اتصل بنا. سنخبرك بصراحة إن كانت الدورة تناسب مستواك، وسنقترح غيرها إن لم تكن كذلك.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 02</div><h3>أكّد مقعدك</h3><p>أكمل نموذج التسجيل وسدّد الرسوم. تصلك رسالة تأكيد مكتوبة بالمكان وتاريخ البدء والتوقيت اليومي.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 03</div><h3>احضر واحصل على شهادتك</h3><p>تدرّب من الاثنين إلى الجمعة في مجموعتك، ثم استلم شهادة الإتمام من كمبيوبيس مع إرشادات الامتحان إن كانت الدورة تؤدي إليه.</p></div>
    </div>
    <div class="steps-photo"><div class="photo-frame">📷 &nbsp;مكان الصورة: قاعة التدريب في كمبيوبيس، أو مدرّب أثناء الحصة، أو الاستقبال في مقر أبوظبي.</div></div>
  </div>
</section>

<!-- WHY -->
<section class="section why">
  <div class="container">
    <div class="eyebrow">لماذا كمبيوبيس</div>
    <h2>مركز تدريب مصمّم حول أسبوع العمل.</h2>
    <p style="max-width:700px">يعمل مركز كمبيوبيس للتدريب من مقرّ واحد في أبوظبي. كل دورة على هذا الموقع تُدرَّس في قاعاتنا، بكادرنا التدريبي، وبجدول مصمّم لمن لا يستطيع التوقف عن العمل من أجل الدراسة.</p>
    <div class="why-grid">
      <div class="why-item"><h3>مجموعات صباحية ومسائية</h3><p>المنهج نفسه مرتين يومياً، حتى لا يكون نظام مناوباتك سبباً لتأجيل مؤهلك.</p></div>
      <div class="why-item"><h3>التدريس بالعربية أو الإنجليزية</h3><p>المادة التدريبية والشرح باللغة التي يعمل بها فريقك.</p></div>
      <div class="why-item"><h3>قاعة حقيقية، لا مكتبة فيديو</h3><p>مجموعات صغيرة في قاعة فعلية، حيث يُجاب عن سؤالك لحظة طرحه.</p></div>
      <div class="why-item"><h3>إجابات صريحة حول الملاءمة</h3><p>إن لم تكن الدورة مناسبة لمستواك أو هدفك، سيخبرك المستشار بذلك قبل الدفع.</p></div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="section testi">
  <div class="container">
    <div class="eyebrow">من متدرّبينا</div>
    <h2>ماذا يقول المتدربون بعد الدورة؟</h2>
    <div class="placeholder-note">[تُستبدل الشهادات الثلاث بآراء حقيقية وموثّقة من متدرّبين سابقين، مع موافقة خطية قبل نشر الاسم أو جهة العمل.]</div>
    <div class="testi-grid">
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — أمر محدد غيّرته الدورة في طريقة عمله. جملتان أو ثلاث بكلماته.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — يُفضَّل من مجموعة مؤسسية يذكر كيف ناسب التدريب الداخلي سير عملهم.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
      <div class="quote"><div class="qm">"</div><p>[رأي متدرّب — مرشّح لغات أو آيلتس صوت ثالث جيد يُظهر تنوّع المركز.]</p><b>[الاسم الكامل]</b><small>[المسمى الوظيفي]، [جهة العمل]</small></div>
    </div>
  </div>
</section>

<!-- ABOUT / SEO CONTENT -->
<section class="section seo-content" id="about">
  <div class="container">
    <div>
      <div class="eyebrow">عن تدريبنا</div>
      <h1>دورات تدريبية احترافية في أبوظبي، مصمّمة لمن هم على رأس عملهم</h1>
      <p>مركز كمبيوبيس للتدريب هو مزوّد تدريب صفّي في أبوظبي يقدّم التحضير للشهادات المهنية، ودورات تقنية المعلومات والأمن السيبراني، وتدريب اللغتين الإنجليزية والعربية. يُعقد كل برنامج من الاثنين إلى الجمعة بمجموعة صباحية وأخرى مسائية، حتى لا يكلّفك المؤهل إجازتك السنوية.</p>
      <p>تتراوح الدورات بين ورشة يومين في هندسة الأوامر النصية وشهر كامل من دروس اللغة الإنجليزية. وأياً كان اختيارك، فأنت تتدرّب في قاعة مع مدرّب من كمبيوبيس، لا وحدك أمام مقاطع مسجّلة.</p>
      <h3>دورات الشهادات لمحترفي المالية والتدقيق والمشاريع</h3>
      <p>يغطي مسار الشهادات أربعة من أكثر الاعتمادات طلباً في الوصف الوظيفي الإماراتي: إدارة المشاريع الاحترافية لمديري المشاريع، والمدقق الداخلي المعتمد، والمحاسب الإداري المعتمد، ومدقق نظم المعلومات المعتمد. تمتد كل دورة أربعين ساعة صفّية خلال أسبوع عمل، مع مجموعات مسائية للموظفين بدوام كامل. تُدفع رسوم الامتحان مباشرة للجهة المانحة وليست ضمن رسوم الدورة.</p>
      <h3>تدريب الأمن السيبراني والذكاء الاصطناعي لفرق العمل الإماراتية</h3>
      <p>تُطالَب المنشآت في أبوظبي اليوم بإثبات وعيها الأمني واستخدامها المسؤول للذكاء الاصطناعي. ومسارنا التقني يلبّي الأمرين: أساسيات الأمن السيبراني للموظفين، والاختراق الأخلاقي للفرق التقنية، وورشتا أساسيات الذكاء الاصطناعي وهندسة الأوامر النصية القصيرتان لبقية الموظفين — قصيرتان عمداً لتُحجزا لقسم كامل دون تعطيل شهر من العمل.</p>
      <h3>الإنجليزية والعربية ومهارات الأوفيس</h3>
      <p>اللغة هي الأساس تحت كل مؤهل آخر على هذا الموقع. ندرّس الإنجليزية العامة على مدى شهر، والتحضير للآيلتس خلال أسبوعين لمن حجز موعد امتحانه، والعربية لغير الناطقين بها للمقيمين الراغبين في عمل وحياة أكثر ثقة في الإمارات. وإلى جانبها، تغطي دورة أوفيس مع كوبايلوت برامج إكسل وورد وباوربوينت وآوتلوك بمستوى مهني.</p>
      <h3>تدريب مؤسسي في جميع أنحاء الإمارات</h3>
      <p>يمكن تقديم أي دورة مذكورة هنا بشكل خاص لمنشأة واحدة، في مقرّكم أو في مجموعة مغلقة بمقرّنا في أبوظبي. اطلب عرضاً تدريبياً وسيوافيك مستشارنا بالمواعيد والصيغة وعرض سعر مكتوب.</p>
    </div>
    <aside>
      <div class="side-box">
        <h4>الدورات الأكثر طلباً</h4>
        <ul>
          <li><a href="#featured">شهادة إدارة المشاريع الاحترافية</a></li>
          <li><a href="#featured">شهادة الاختراق الأخلاقي</a></li>
          <li><a href="#featured">شهادة مدقق نظم المعلومات</a></li>
          <li><a href="#featured">التحضير لامتحان الآيلتس</a></li>
          <li><a href="#featured">أوفيس مع كوبايلوت</a></li>
          <li><a href="#featured">العربية لغير الناطقين بها</a></li>
        </ul>
      </div>
      <div class="side-box calendar">
        <h4>تقويم الدورات</h4>
        <h3>احصل على جميع مواعيد البدء في ملف واحد</h3>
        <p>الدورات الاثنتا عشرة بمددها وتوقيتاتها في صفحة واحدة — مفيد عند طلب موافقة مديرك.</p>
        <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بالبريد قبل الإطلاق.')">
          <input type="email" placeholder="name@company.ae" required>
          <button class="btn btn-gold">أرسلوا لي التقويم</button>
        </form>
      </div>
    </aside>
  </div>
</section>

<!-- FAQ -->
<section class="section faq">
  <div class="container">
    <div class="head-row">
      <div>
        <div class="eyebrow">أسئلة شائعة</div>
        <h2>قبل أن تسجّل.</h2>
        <p>إن لم تجد سؤالك هنا، سيجيبك مستشار التدريب مباشرة.</p>
      </div>
      <a class="btn btn-outline" href="https://wa.me/9710506399915">اسأل عبر واتساب</a>
    </div>
    <details open>
      <summary>هل تُدرَّس الدورات بالإنجليزية أم بالعربية؟</summary>
      <div class="a">باللغتين. تعتمد لغة التدريس على المجموعة. أخبرنا بلغتك المفضلة عند الاستفسار وسنضمّك إلى مجموعة تُدرَّس بها.</div>
    </details>
    <details><summary>هل يمكنني الحضور مساءً إذا كنت أعمل بدوام كامل؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>أين يقع مركز التدريب وهل تتوفر مواقف سيارات؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>هل أحصل على شهادة، وهل رسوم الامتحان مشمولة؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>كم تبلغ رسوم الدورة وكيف أدفع؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
    <details><summary>هل تدرّبون فريقنا في مكاتبنا؟</summary><div class="a">[تُستكمل الإجابة وتُدقَّق وفق ورقة معلومات الدورة المعتمدة.]</div></details>
  </div>
</section>

<!-- CLOSING -->
<section class="closing" id="contact">
  <div class="container">
    <div>
      <h2>التسجيل مفتوح الآن. حصص صباحية ومسائية متاحة.</h2>
      <p>مركز كمبيوبيس للتدريب، أبوظبي. اتصل أو راسلنا على واتساب 050 6399915.</p>
    </div>
    <div class="actions">
      <a class="btn btn-navy" href="#schedule-ar">سجّل الآن</a>
      <a class="btn btn-outline" href="tel:0506399915">050 6399915</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: about-ar ================ -->
<div class="page" id="pg-about-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#about" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#home-ar/courses">الدورات</a></li>
        <li><a href="#home-ar/corporate">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#home-ar/contact">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#about" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><b style="color:var(--navy)">من نحن</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">عن كمبيوبيس</div>
  <h1>مركز تدريب مصمّم حول أسبوع العمل.</h1>
  <p class="lead">يعمل مركز كمبيوبيس للتدريب من مقرّ واحد في أبوظبي. كل دورة تُدرَّس في قاعاتنا، بكادرنا التدريبي، وبجدول مصمّم لمن لا يستطيع التوقف عن العمل من أجل الدراسة.</p></div>
</div></section>

<section class="section"><div class="container">
  <div class="eyebrow">من نحن</div>
  <h2>تدريب صفّي، كما ينبغي أن يكون.</h2>
  <div style="max-width:760px">
    <p>مركز كمبيوبيس للتدريب — حلول تدريبية مبتكرة — معهد تدريب مهني في أبوظبي، الإمارات العربية المتحدة. نقدّم اثنتي عشرة دورة مجدولة في ثلاثة مسارات: الشهادات المهنية (إدارة المشاريع الاحترافية، المدقق الداخلي المعتمد، المحاسب الإداري المعتمد، مدقق نظم المعلومات المعتمد)، وتقنية المعلومات والأمن السيبراني (الاختراق الأخلاقي، أساسيات الأمن السيبراني، أساسيات الذكاء الاصطناعي، هندسة الأوامر النصية)، واللغات والمهارات المكتبية (الإنجليزية، الآيلتس، العربية لغير الناطقين بها، أوفيس مع كوبايلوت).</p>
    <p>يُعقد كل برنامج من الاثنين إلى الجمعة بمجموعة صباحية وأخرى مسائية، ويُدرَّس بالعربية أو الإنجليزية حسب المجموعة. تتراوح الدورات بين ورشة يومين وشهر كامل من الدروس — وكلها في قاعة حقيقية، مع مدرّب يجيب عن الأسئلة لحظة طرحها.</p>
    <p>[يُضاف هنا: سنة التأسيس، وتفاصيل الترخيص، وجملتان أو ثلاث من تاريخ المركز — تُزوَّد من كمبيوبيس قبل النشر.]</p>
  </div>
  <div class="placeholder-note" style="max-width:760px">[تفاصيل التاريخ وسنة التأسيس والفريق تُؤكَّد مع العميل قبل نشر هذه الصفحة.]</div>
</div></section>

<section class="accred"><div class="container" style="text-align:center">
  <div class="eyebrow">معتمدون ومعترف بنا من</div>
  <div class="marks"><div class="mark">أكتفيت</div><div class="mark">المجلس الثقافي البريطاني</div><div class="mark">آيلتس</div><div class="mark">الرخصة الدولية لقيادة الحاسوب</div></div>
</div></section>

<section class="section why"><div class="container">
  <div class="eyebrow">لماذا يختارنا المتدربون</div>
  <h2>ما الذي يميّز كمبيوبيس؟</h2>
  <div class="why-grid">
    <div class="why-item"><h3>مجموعات صباحية ومسائية</h3><p>المنهج نفسه مرتين يومياً، حتى لا يكون نظام مناوباتك سبباً لتأجيل مؤهلك.</p></div>
    <div class="why-item"><h3>التدريس بالعربية أو الإنجليزية</h3><p>المادة التدريبية والشرح باللغة التي يعمل بها فريقك.</p></div>
    <div class="why-item"><h3>قاعة حقيقية، لا مكتبة فيديو</h3><p>مجموعات صغيرة في قاعة فعلية، حيث يُجاب عن سؤالك لحظة طرحه.</p></div>
    <div class="why-item"><h3>إجابات صريحة حول الملاءمة</h3><p>إن لم تكن الدورة مناسبة لمستواك أو هدفك، سيخبرك المستشار بذلك قبل الدفع.</p></div>
  </div>
  <div class="steps-photo"><div class="photo-frame">📷 &nbsp;مكان الصورة: قاعات التدريب أو الكادر التدريبي أو الاستقبال في مقر أبوظبي.</div></div>
</div></section>

<section class="section"><div class="container">
  <div class="eyebrow">أرقامنا</div>
  <h2>لمحة سريعة.</h2>
  <div class="cat-grid">
    <div class="cat"><div class="num">12</div><h3>دورة مجدولة</h3><p>في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات والمهارات المكتبية.</p></div>
    <div class="cat"><div class="num">2</div><h3>توقيتان يومياً</h3><p>مجموعات صباحية ومسائية من الاثنين إلى الجمعة، لتتدرّب دون ترك عملك.</p></div>
    <div class="cat"><div class="num">[X]</div><h3>متدرّب</h3><p>تخرّجوا من مقرّنا في أبوظبي — يُؤكَّد الرقم قبل النشر.</p></div>
  </div>
</div></section>

<section class="closing"><div class="container">
  <div><h2>تفضّل بزيارة المركز.</h2><p>مركز كمبيوبيس للتدريب، أبوظبي. اتصل أو راسلنا على واتساب 050 6399915.</p></div>
  <div class="actions"><a class="btn btn-navy" href="#home-ar/contact">اتصل بنا</a><a class="btn btn-outline" href="#home-ar/courses">تصفّح الدورات</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#about">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: contact-ar ================ -->
<div class="page" id="pg-contact-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#contact" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#home-ar/courses">الدورات</a></li>
        <li><a href="#home-ar/corporate">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#contact" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><b style="color:var(--navy)">اتصل بنا</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">التواصل والتسجيل</div>
  <h1>تحدّث إلى مستشار التدريب اليوم.</h1>
  <p class="lead">اتصل أو راسلنا على واتساب أو أرسل النموذج — يردّ عليك المستشار بالمواعيد المتاحة والتوقيتات والرسوم للدورة التي تهمّك.</p></div>
</div></section>

<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 380px;gap:56px;align-items:start" id="contactGrid">
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>نموذج التسجيل والاستفسار</h3>
    <p class="sub">أخبرنا بالدورة والتوقيت المفضل — نردّ عليك بموعد البدء القادم والرسوم.</p>
    <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
      <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
      <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>البريد الإلكتروني</label><input type="email" placeholder="name@email.com" required></div>
      <div class="field"><label>التوقيت المفضل</label><select><option>صباحي أو مسائي</option><option>صباحي</option><option>مسائي</option></select></div>
      <div class="field full"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field full"><label>رسالتك <span style="text-transform:none;font-weight:400">اختياري</span></label><textarea placeholder="أي شيء ينبغي أن نعرفه — مستواك، موعد امتحانك، حجم فريقك."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">أرسل الاستفسار</button>
      <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
    </form>
  </div>
  <aside>
    <div class="side-box">
      <h4>تواصل معنا مباشرة</h4>
      <p><b style="color:var(--navy)">الهاتف / واتساب</b><br><a href="tel:0506399915" style="color:var(--gold-ink);font-weight:700">050 6399915</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">البريد الإلكتروني</b><br><a href="mailto:info@compubase.ae">info@compubase.ae</a></p>
      <p style="margin-top:12px"><b style="color:var(--navy)">العنوان</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
      <p style="margin-top:12px"><b style="color:var(--navy)">ساعات الدوام</b><br>الأحد – الخميس · [ساعات الدوام]</p>
      <a class="btn btn-gold" style="width:100%;margin-top:16px" href="https://wa.me/9710506399915">راسلنا على واتساب الآن</a>
    </div>
    <div class="side-box">
      <h4>خريطة الموقع</h4>
      <div class="trainer-photo" style="min-height:220px">📍 &nbsp;تُدرج خريطة جوجل هنا بعد تأكيد العنوان.</div>
    </div>
  </aside>
</div></section>
<style>@media(max-width:1024px){#contactGrid{grid-template-columns:1fr!important}}</style>

<section class="closing"><div class="container">
  <div><h2>تفضّل الاتصال مباشرة؟</h2><p>يجيب المستشار من الأحد إلى الخميس خلال ساعات الدوام.</p></div>
  <div class="actions"><a class="btn btn-navy" href="tel:0506399915">اتصل على 050 6399915</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#contact">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: courses-ar ================ -->
<div class="page" id="pg-courses-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#courses" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#home-ar/corporate">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#courses" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><b style="color:var(--navy)">جميع الدورات</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">دليل الدورات</div>
  <h1>اثنتا عشرة دورة. ثلاثة مسارات. مقرّ واحد.</h1>
  <p class="lead">الشهادات المهنية، وتقنية المعلومات والأمن السيبراني، وتدريب اللغات — كل دورة من الاثنين إلى الجمعة في أبوظبي، بمجموعات صباحية ومسائية.</p></div>
</div></section>

<section class="section featured"><div class="container">
  <div class="course-grid" style="grid-template-columns:repeat(3,1fr)">
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة إدارة المشاريع الاحترافية</h3></div>
    <div class="body"><p>تغطية كاملة لمجالات امتحان إدارة المشاريع مع أسئلة تدريبية وساعات التواصل المطلوبة للتقديم.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة المدقق الداخلي المعتمد</h3></div>
    <div class="body"><p>تحضير مسائي يغطي أساسيات التدقيق الداخلي وممارسته والمعارف التي يختبرها الامتحان.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة المحاسب الإداري المعتمد</h3></div>
    <div class="body"><p>التخطيط المالي والتحليلات والإدارة المالية الاستراتيجية وفق جزأي الامتحان.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">شهادة مهنية</span><h3>شهادة مدقق نظم المعلومات المعتمد</h3></div>
    <div class="body"><p>تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية المعتمدة.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>شهادة الاختراق الأخلاقي المعتمدة</h3></div>
    <div class="body"><p>اختبر الأنظمة كما يفعل المهاجم، في مختبر خاضع للإشراف، واستعد لامتحان الشهادة.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الأمن السيبراني</h3></div>
    <div class="body"><p>أسبوع عملي ينقل الموظفين من الوعي الأمني إلى القدرة — رصد التهديدات والإبلاغ عنها والتعامل معها.</p>
      <div class="meta"><div><span>المدة</span><b>5 أيام · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>أساسيات الذكاء الاصطناعي</h3></div>
    <div class="body"><p>وظّف أدوات الذكاء الاصطناعي في مهام عملك اليومية — التقارير والصياغة والتحليل. لا حاجة للبرمجة.</p>
      <div class="meta"><div><span>المدة</span><b>3 أيام · 18 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">تقنية وأمن سيبراني</span><h3>هندسة الأوامر النصية</h3></div>
    <div class="body"><p>يومان مركّزان للحصول على نتائج أفضل من أدوات الذكاء الاصطناعي — البنية والسياق والتكرار والتقييم.</p>
      <div class="meta"><div><span>المدة</span><b>يومان · 12 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة اللغة الإنجليزية</h3></div>
    <div class="body"><p>شهر من دروس الإنجليزية العامة — محادثة وكتابة واستماع وقراءة — في مجموعة صفية صغيرة.</p>
      <div class="meta"><div><span>المدة</span><b>شهر · 40 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>دورة التحضير لامتحان الآيلتس</h3></div>
    <div class="body"><p>تدريب موقوت وتقنيات امتحان في المهارات الأربع، مع تقييم لكل اختبار تجريبي.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">لغات</span><h3>اللغة العربية لغير الناطقين بها</h3></div>
    <div class="body"><p>عربية عملية محادثةً وكتابةً للمقيمين الراغبين في عمل وحياة أكثر ثقة في الإمارات.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  <div class="course-card"><div class="head"><span class="tag">مهارات مكتبية</span><h3>مايكروسوفت أوفيس وكوبايلوت</h3></div>
    <div class="body"><p>إكسل وورد وباوربوينت وآوتلوك بمستوى احترافي، مع استخدام كوبايلوت طوال الدورة.</p>
      <div class="meta"><div><span>المدة</span><b>أسبوع · 30 ساعة</b></div><div><span>التوقيت</span><b>صباحي أو مسائي</b></div><div><span>الأيام</span><b>الاثنين – الجمعة</b></div><div><span>البداية القادمة</span><b style="color:var(--gold-ink)">[التاريخ]</b></div></div>
      <a class="btn btn-outline" href="#contact-ar">تفاصيل الدورة والرسوم ←</a></div></div>
  </div>
  <p class="foot">لست متأكداً أي دورة تناسبك؟ اتصل بمستشار التدريب على <a href="tel:0506399915">050 6399915</a></p>
</div></section>

<section class="closing"><div class="container">
  <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة.</p></div>
  <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#courses">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: schedule-ar ================ -->
<div class="page" id="pg-schedule-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#schedule" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#home-ar/corporate">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#schedule" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>



<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><b style="color:var(--navy)">جدول الدورات</b></div></div>
<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
 <div><div class="eyebrow on-dark">الدفعات القادمة</div>
 <h1>جميع مواعيد البدء في جدول واحد.</h1>
 <p class="lead">دفعات مؤكدة في مقر أبوظبي للدورات الاثنتي عشرة كلها. إن لم يناسبك موعد، أخبرنا بالأسبوع الذي تفضّله وسنضمّك إلى المجموعة التالية.</p></div>
</div></section>
<section class="section schedule"><div class="container">
 <div class="sched-head">
  <div><div class="eyebrow">الدورات الاثنتا عشرة</div><h2>المجموعات المؤكدة القادمة.</h2></div>
  <a class="btn btn-outline" href="#contact-ar">⤓ استلم التقويم بالبريد</a>
 </div>
 <div class="table-wrap">
  <table class="sched">
   <caption>من الاثنين إلى الجمعة · مقر أبوظبي</caption>
   <thead><tr><th>الدورة</th><th>الفئة</th><th>المدة</th><th>التوقيت</th><th>تبدأ في</th><th>المقعد</th></tr></thead>
   <tbody>
<tr><td><b style="color:var(--navy)"><a href="#pmp-ar" style="color:var(--navy)">شهادة إدارة المشاريع الاحترافية</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cia-ar" style="color:var(--navy)">شهادة المدقق الداخلي المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cma-ar" style="color:var(--navy)">شهادة المحاسب الإداري المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cisa-ar" style="color:var(--navy)">شهادة مدقق نظم المعلومات المعتمد</a></b></td><td>شهادات مهنية</td><td>5 أيام · 40 ساعة</td><td>مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ceh-ar" style="color:var(--navy)">شهادة الاختراق الأخلاقي المعتمدة</a></b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#cyber-ar" style="color:var(--navy)">أساسيات الأمن السيبراني</a></b></td><td>تقنية وأمن</td><td>5 أيام · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ai-ar" style="color:var(--navy)">أساسيات الذكاء الاصطناعي</a></b></td><td>تقنية وأمن</td><td>3 أيام · 18 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#prompt-ar" style="color:var(--navy)">هندسة الأوامر النصية</a></b></td><td>تقنية وأمن</td><td>يومان · 12 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#english-ar" style="color:var(--navy)">دورة اللغة الإنجليزية</a></b></td><td>لغات</td><td>شهر · 40 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#ielts-ar" style="color:var(--navy)">دورة التحضير لامتحان الآيلتس</a></b></td><td>لغات</td><td>أسبوعان · 20 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#arabic-ar" style="color:var(--navy)">اللغة العربية لغير الناطقين بها</a></b></td><td>لغات</td><td>أسبوعان · 20 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
<tr><td><b style="color:var(--navy)"><a href="#office-ar" style="color:var(--navy)">مايكروسوفت أوفيس وكوبايلوت</a></b></td><td>مهارات مكتبية</td><td>أسبوع · 30 ساعة</td><td>صباحي أو مسائي</td><td>[التاريخ]</td><td><a href="#contact-ar">سجّل</a></td></tr>
   </tbody>
  </table>
 </div>
 <p class="sched-note">تُعقد جميع المجموعات من الاثنين إلى الجمعة في مقر أبوظبي. تُؤكَّد المواعيد لاحقاً — اتصل على <a href="tel:0506399915" style="font-weight:700;text-decoration:underline">050 6399915</a> لأقرب دفعة.</p>
</div></section>
<section class="closing"><div class="container">
 <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة.</p></div>
 <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
</div></section>
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#courses">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: corporate-ar ================ -->
<div class="page" id="pg-corporate-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#corporate" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#corporate" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><b style="color:var(--navy)">التدريب المؤسسي</b></div></div>

<section class="course-hero"><div class="container" style="grid-template-columns:1fr">
  <div><div class="eyebrow on-dark">التدريب المؤسسي والداخلي</div>
  <h1>درّب فريقك كاملاً. في مقرّك أو مقرّنا.</h1>
  <p class="lead">يمكن تقديم أي دورة على هذا الموقع بشكل خاص لمنشأة واحدة، مع تكييف المحتوى وفق أنظمتكم وسياساتكم وقطاعكم.</p></div>
</div></section>

<section class="section"><div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:start" id="corpGrid">
  <div>
    <div class="eyebrow">كيف نعمل</div>
    <h2>تدريب مبني حول سير عملكم.</h2>
    <ul class="corp-points" style="margin-top:24px">
      <li style="color:var(--text)"><b style="color:var(--navy)">التدريب في مقرّكم في جميع أنحاء الإمارات</b><span style="color:#6b7688">أو في مجموعة خاصة بمقرّنا في أبوظبي — أيهما يوفّر وقت فريقكم أكثر.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">محتوى مصمّم حسب أدواركم الوظيفية</b><span style="color:#6b7688">حالات عملية وتمارين وأمثلة تُعاد صياغتها حول العمل الفعلي لموظفيكم.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">سجلات حضور وشهادات إتمام</b><span style="color:#6b7688">وثائق جاهزة لإدارات الموارد البشرية والامتثال دون متابعة منكم.</span></li>
      <li style="color:var(--text)"><b style="color:var(--navy)">أسعار المجموعات</b><span style="color:#6b7688">ابتداءً من [العدد] متدربين — يؤكَّد الحد مع مستشار التدريب.</span></li>
    </ul>
    <div class="steps-grid" style="margin-top:40px;grid-template-columns:1fr">
      <div class="step"><div class="eyebrow">الخطوة 01</div><h3>أخبرنا بالفريق والهدف</h3><p>ستة حقول في النموذج — أو رسالة واحدة على واتساب.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 02</div><h3>استلم عرضاً مكتوباً</h3><p>المواعيد والصيغة والمكان وعرض السعر، عادةً خلال [عدد] أيام عمل.</p></div>
      <div class="step"><div class="eyebrow">الخطوة 03</div><h3>تدرّبوا وفق جدولكم</h3><p>حصص موقّتة حول المناوبات والعمليات وساعات العمل.</p></div>
    </div>
  </div>
  <div class="proposal" style="border:1px solid var(--line)">
    <h3>اطلب عرضاً تدريبياً</h3>
    <p class="sub">ستة حقول فقط. يردّ عليك مستشار التدريب بالمواعيد والصيغة وعرض سعر مكتوب.</p>
    <form onsubmit="event.preventDefault();alert('نموذج تجريبي — يُربط بنظام الاستفسارات قبل الإطلاق.')">
      <div class="field"><label>الاسم الكامل</label><input placeholder="اسمك" required></div>
      <div class="field"><label>المنشأة</label><input placeholder="اسم الشركة" required></div>
      <div class="field"><label>البريد الإلكتروني للعمل</label><input type="email" placeholder="name@company.ae" required></div>
      <div class="field"><label>رقم الجوال</label><input type="tel" placeholder="05X XXX XXXX" required></div>
      <div class="field"><label>الدورة المطلوبة</label><select><option>اختر دورة</option><option>شهادة إدارة المشاريع الاحترافية</option><option>شهادة المدقق الداخلي المعتمد</option><option>شهادة المحاسب الإداري المعتمد</option><option>شهادة مدقق نظم المعلومات المعتمد</option><option>شهادة الاختراق الأخلاقي المعتمدة</option><option>أساسيات الأمن السيبراني</option><option>أساسيات الذكاء الاصطناعي</option><option>هندسة الأوامر النصية</option><option>دورة اللغة الإنجليزية</option><option>دورة التحضير لامتحان الآيلتس</option><option>اللغة العربية لغير الناطقين بها</option><option>مايكروسوفت أوفيس وكوبايلوت</option></select></div>
      <div class="field"><label>حجم الفريق</label><select><option>اختر النطاق</option><option>2–5</option><option>6–15</option><option>16–30</option><option>أكثر من 30</option></select></div>
      <div class="field full"><label>ما الهدف الذي تسعون إليه؟ <span style="text-transform:none;font-weight:400">اختياري</span></label><textarea placeholder="مثال: اثنا عشر موظفاً مالياً جاهزون لامتحان المحاسب الإداري قبل نهاية العام."></textarea></div>
      <div class="full"><button class="btn btn-navy" style="width:100%">اطلب العرض</button>
      <p class="privacy">نستخدم هذه البيانات للرد على استفسارك فقط. راجع <a href="#">سياسة الخصوصية</a>.</p></div>
    </form>
  </div>
</div></section>
<style>@media(max-width:1024px){#corpGrid{grid-template-columns:1fr!important}}</style>

<section class="closing"><div class="container">
  <div><h2>أسرع عبر الهاتف.</h2><p>راسلنا على واتساب 050 6399915 باسم الدورة وحجم الفريق — ونتولى الباقي.</p></div>
  <div class="actions"><a class="btn btn-navy" href="https://wa.me/9710506399915">راسلنا على واتساب</a></div>
</div></section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#corporate">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: pmp-ar ================ -->
<div class="page" id="pg-pmp-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#pmp" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#pmp" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">الشهادات المهنية</a><span>/</span><b style="color:var(--navy)">شهادة إدارة المشاريع الاحترافية</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">شهادة مهنية</span>
      <h1>شهادة إدارة المشاريع الاحترافية</h1>
      <p class="lead">تغطية كاملة لمجالات امتحان إدارة المشاريع مع مدرّب كمبيوبيس، وتحصل بنهاية الأسبوع على ساعات التواصل الخمس والثلاثين المطلوبة للتقديم.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>خمسة أيام صفّية داخل مخطط محتوى الامتحان: الأفراد والعمليات وبيئة الأعمال. يُدرَّس كل مجال ثم يُتدرَّب عليه بأسئلة بنمط الامتحان، فتنهي الأسبوع وأنت تعرف المواضع التي تحتاج مراجعة قبل جلوسك للامتحان.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>بناء ميثاق المشروع والجدول والميزانية من دراسة الجدوى</li><li>تطبيق المنهجيات التنبؤية والرشيقة والهجينة في موضعها الصحيح</li><li>إدارة المخاطر والمشتريات وتوقعات أصحاب المصلحة</li><li>الجلوس للامتحان مع توثيق ساعات التواصل المطلوبة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>مديرو ومنسّقو المشاريع ذوو خبرة تنفيذية</li><li>المهندسون وقادة الفرق المنتقلون إلى أدوار المشاريع</li><li>موظفو مكاتب إدارة المشاريع المستعدون للتقديم</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة المدقق الداخلي المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cia-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة مدقق نظم المعلومات المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cisa-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: cia-ar ================ -->
<div class="page" id="pg-cia-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cia" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cia" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">الشهادات المهنية</a><span>/</span><b style="color:var(--navy)">شهادة المدقق الداخلي المعتمد</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">شهادة مهنية</span>
      <h1>شهادة المدقق الداخلي المعتمد</h1>
      <p class="lead">استعد لأجزاء امتحان المدقق الداخلي المعتمد الثلاثة بحصص صفّية مسائية مصمّمة حول دوام كامل.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>أربعون ساعة صفّية مسائية عبر منهج الشهادة: أساسيات التدقيق الداخلي، وممارسة التدقيق الداخلي، والمعارف التجارية التي يختبرها الامتحان — يُدرَّس كل مجال ثم يُتدرَّب عليه بأسئلة بنمط الامتحان.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>تخطيط مهمة تدقيق داخلي وتحديد نطاقها</li><li>تطبيق المعايير المهنية وميثاق الأخلاقيات على حالات واقعية</li><li>تقييم الحوكمة وإدارة المخاطر والضوابط</li><li>التقدّم لكل جزء من الامتحان بخطة مراجعة واضحة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المدققون الداخليون الساعون إلى الاعتماد</li><li>موظفو المالية والامتثال المنتقلون إلى التدقيق</li><li>أعضاء فرق التدقيق المطالبون بتوثيق مؤهلهم</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة المحاسب الإداري المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cma-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة مدقق نظم المعلومات المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cisa-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة إدارة المشاريع الاحترافية</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#pmp-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: cma-ar ================ -->
<div class="page" id="pg-cma-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cma" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cma" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">الشهادات المهنية</a><span>/</span><b style="color:var(--navy)">شهادة المحاسب الإداري المعتمد</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">شهادة مهنية</span>
      <h1>شهادة المحاسب الإداري المعتمد</h1>
      <p class="lead">تحضير صفّي مسائي يغطي جزأي امتحان المحاسب الإداري المعتمد، لمحترفي المالية على رأس عملهم.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>أربعون ساعة مسائية عبر محتوى الشهادة: التخطيط المالي والأداء والتحليلات في الجزء الأول، والإدارة المالية الاستراتيجية في الجزء الثاني — مع أسئلة محلولة بظروف الامتحان طوال الأسبوع.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>إعداد الموازنات والتوقعات وتقارير الأداء</li><li>تطبيق مفاهيم إدارة التكاليف والرقابة الداخلية</li><li>تحليل القوائم المالية وقرارات الاستثمار</li><li>التخطيط لجلوس جزأي الامتحان بثقة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المحاسبون الساعون إلى اعتماد في المحاسبة الإدارية</li><li>محللو المالية المنتقلون إلى أدوار التخطيط والتقارير</li><li>فرق المالية الموحِّدة مؤهلاتها على هذه الشهادة</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة المدقق الداخلي المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cia-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة إدارة المشاريع الاحترافية</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#pmp-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: cisa-ar ================ -->
<div class="page" id="pg-cisa-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cisa" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cisa" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">الشهادات المهنية</a><span>/</span><b style="color:var(--navy)">شهادة مدقق نظم المعلومات المعتمد</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">شهادة مهنية</span>
      <h1>شهادة مدقق نظم المعلومات المعتمد</h1>
      <p class="lead">تدقيق نظم المعلومات وضبطها وضمانها وفق مجالات الممارسة المهنية الحالية، في مجموعة مسائية.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>أربعون ساعة صفّية مسائية عبر مجالات الممارسة الخمسة — عملية تدقيق نظم المعلومات، وحوكمة تقنية المعلومات، واقتناء النظم وتطويرها، والعمليات ومرونة الأعمال، وحماية أصول المعلومات — مع أسئلة بنمط الامتحان بعد كل مجال.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>تخطيط وتنفيذ تدقيق نظم معلومات قائم على المخاطر</li><li>تقييم ممارسات حوكمة تقنية المعلومات وإدارتها</li><li>تقييم تطوير النظم وعملياتها ومرونتها</li><li>الجلوس للامتحان بعد مراجعة كل مجال</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>مدققو تقنية المعلومات وأعضاء فرق التدقيق</li><li>موظفو الأمن والمخاطر المنتقلون إلى أدوار الضمان</li><li>المدققون الداخليون المتوسّعون نحو نظم المعلومات</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة المدقق الداخلي المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cia-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>شهادة الاختراق الأخلاقي المعتمدة</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#ceh-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الأمن السيبراني</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#cyber-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: ceh-ar ================ -->
<div class="page" id="pg-ceh-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ceh" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ceh" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">تقنية المعلومات والأمن السيبراني</a><span>/</span><b style="color:var(--navy)">شهادة الاختراق الأخلاقي المعتمدة</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">تقنية وأمن سيبراني</span>
      <h1>شهادة الاختراق الأخلاقي المعتمدة</h1>
      <p class="lead">اختبر الأنظمة كما يفعل المهاجم، في مختبر خاضع للإشراف، واستعد لامتحان الشهادة المعتمدة.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع للجهة المانحة</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>خمسة أيام صفّية تطبيقية عبر دورة حياة الهجوم في مختبر خاضع للإشراف: الاستطلاع، والفحص، واكتساب الوصول والحفاظ عليه، وإخفاء الأثر — تُتدرَّب كل مرحلة على أنظمة المختبر، لا على أهداف حقيقية أبداً.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>تنفيذ الاستطلاع وفحص الثغرات بمنهجية</li><li>استغلال نقاط الضعف الشائعة في مختبر مضبوط</li><li>توثيق النتائج بأسلوب المختبِر المحترف</li><li>الاستعداد لامتحان الشهادة المعتمدة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>مديرو الأنظمة والشبكات المختبِرون لبيئتهم</li><li>محللو الأمن المنتقلون إلى الاختبار الهجومي</li><li>موظفو التقنية المطالبون بإثبات قدرة أمنية</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الأمن السيبراني</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#cyber-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">شهادة مهنية</div><h3>شهادة مدقق نظم المعلومات المعتمد</h3><p>5 أيام · 40 ساعة · مسائي</p><a href="#cisa-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الذكاء الاصطناعي</h3><p>3 أيام · 18 ساعة · صباحي أو مسائي</p><a href="#ai-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: cyber-ar ================ -->
<div class="page" id="pg-cyber-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#cyber" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#cyber" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">تقنية المعلومات والأمن السيبراني</a><span>/</span><b style="color:var(--navy)">أساسيات الأمن السيبراني</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">تقنية وأمن سيبراني</span>
      <h1>أساسيات الأمن السيبراني</h1>
      <p class="lead">أسبوع عملي ينقل الموظفين من الوعي الأمني إلى القدرة — رصد التهديدات اليومية والإبلاغ عنها والتعامل معها.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>5 أيام · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>خمسة أيام صفّية حول التهديدات التي تواجهها المنشأة الإماراتية فعلاً: التصيّد والهندسة الاجتماعية، ونظافة كلمات المرور والأجهزة، والتعامل الآمن مع البيانات، وما يجب فعله في الساعة الأولى من أي حادث — بأمثلة واقعية لا نظريات.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>رصد محاولات التصيّد والهندسة الاجتماعية والاحتيال</li><li>تطبيق نظافة كلمات المرور والأجهزة والبيانات</li><li>اتباع إجراءات الإبلاغ عن الحوادث بشكل صحيح</li><li>شرح السياسة الأمنية للزملاء بلغة واضحة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>الموظفون في أي مستوى ممن يتعاملون مع أنظمة الشركة</li><li>الفرق المطالبة بإثبات تدريب التوعية الأمنية</li><li>المديرون البانون لقسم واعٍ أمنياً</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>شهادة الاختراق الأخلاقي المعتمدة</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#ceh-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الذكاء الاصطناعي</h3><p>3 أيام · 18 ساعة · صباحي أو مسائي</p><a href="#ai-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>هندسة الأوامر النصية</h3><p>يومان · 12 ساعة · صباحي أو مسائي</p><a href="#prompt-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: ai-ar ================ -->
<div class="page" id="pg-ai-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ai" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ai" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">تقنية المعلومات والأمن السيبراني</a><span>/</span><b style="color:var(--navy)">أساسيات الذكاء الاصطناعي</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">تقنية وأمن سيبراني</span>
      <h1>أساسيات الذكاء الاصطناعي</h1>
      <p class="lead">وظّف أدوات الذكاء الاصطناعي في المهام التي يتضمنها دورك أصلاً — التقارير والصياغة والتحليل. لا حاجة للبرمجة.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>3 أيام · 18 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>ثلاثة أيام صفّية قصيرة تنقل المحترف من الاستخدام الأول الحذر إلى الاستخدام اليومي الواثق لأدوات الذكاء الاصطناعي — صياغةً وتلخيصاً وتحليلاً وتدقيقاً — مع إبقاء قواعد التعامل مع بيانات منشأتك في الصدارة.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>اختيار أداة الذكاء الاصطناعي المناسبة لكل مهمة</li><li>صياغة وتلخيص وتحليل مستندات العمل بالذكاء الاصطناعي</li><li>تدقيق مخرجات الذكاء الاصطناعي وتصحيحها قبل خروجها من مكتبك</li><li>الاستخدام ضمن حدود الخصوصية والسياسات</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المحترفون في أي دور يكتبون أو يحلّلون أو يعدّون تقارير</li><li>الأقسام المتبنّية لأدوات الذكاء الاصطناعي معاً</li><li>المديرون الواضعون لتوقعات استخدام الذكاء الاصطناعي</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>هندسة الأوامر النصية</h3><p>يومان · 12 ساعة · صباحي أو مسائي</p><a href="#prompt-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الأمن السيبراني</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#cyber-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: prompt-ar ================ -->
<div class="page" id="pg-prompt-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#prompt" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#prompt" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">تقنية المعلومات والأمن السيبراني</a><span>/</span><b style="color:var(--navy)">هندسة الأوامر النصية</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">تقنية وأمن سيبراني</span>
      <h1>هندسة الأوامر النصية</h1>
      <p class="lead">يومان مركّزان للحصول على نتائج أفضل باستمرار من أدوات الذكاء الاصطناعي — البنية والسياق والتكرار والتقييم.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>يومان · 12 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>اثنتا عشرة ساعة صفّية في حرفة المخرجات الجيدة: بناء الطلب، وتزويد السياق الصحيح، وتحسين المسودة بالتكرار، وتقييم ما يعود إليك — تطبيقاً على مهام عملك الحقيقية طوال اليومين.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>بناء أوامر تنتج مسودات أولى قابلة للاستخدام</li><li>تزويد السياق والأمثلة والقيود بفعالية</li><li>تحسين المخرجات بالتكرار بدل البدء من جديد</li><li>بناء أنماط أوامر قابلة لإعادة الاستخدام</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>كل من يستخدم أدوات الذكاء الاصطناعي ويريد نتائج أفضل</li><li>الفرق الموحِّدة لأسلوب عملها مع الذكاء الاصطناعي</li><li>خرّيجو دورة أساسيات الذكاء الاصطناعي المتعمّقون</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الذكاء الاصطناعي</h3><p>3 أيام · 18 ساعة · صباحي أو مسائي</p><a href="#ai-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الأمن السيبراني</h3><p>5 أيام · 40 ساعة · صباحي أو مسائي</p><a href="#cyber-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: english-ar ================ -->
<div class="page" id="pg-english-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#english" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#english" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">اللغات والمهارات المكتبية</a><span>/</span><b style="color:var(--navy)">دورة اللغة الإنجليزية</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">لغات</span>
      <h1>دورة اللغة الإنجليزية</h1>
      <p class="lead">شهر من دروس الإنجليزية العامة — محادثة وكتابة واستماع وقراءة — في مجموعة صفّية صغيرة، صباحاً أو مساءً.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>شهر · 40 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>أربعون ساعة صفّية على مدى شهر تبني إنجليزية عملية لبيئة العمل: المحادثة اليومية، والبريد والكتابة المهنية، وفهم المسموع، والقراءة — مع تحديد مستوى المجموعة في اليوم الأول.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>إدارة محادثات بيئة العمل بثقة</li><li>كتابة رسائل بريد مهنية واضحة</li><li>متابعة الاجتماعات والمكالمات والتعليمات الشفهية</li><li>قراءة مستندات العمل وتلخيصها بدقة</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المحترفون البانون لإنجليزية بيئة العمل</li><li>المقيمون المستعدون لدراسة أو وظيفة جديدة</li><li>الفرق المنتقلة إلى الإنجليزية لغةَ عمل</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>دورة التحضير لامتحان الآيلتس</h3><p>أسبوعان · 20 ساعة · صباحي أو مسائي</p><a href="#ielts-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>اللغة العربية لغير الناطقين بها</h3><p>أسبوعان · 20 ساعة · صباحي أو مسائي</p><a href="#arabic-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: ielts-ar ================ -->
<div class="page" id="pg-ielts-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#ielts" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#ielts" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">اللغات والمهارات المكتبية</a><span>/</span><b style="color:var(--navy)">دورة التحضير لامتحان الآيلتس</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">لغات</span>
      <h1>دورة التحضير لامتحان الآيلتس</h1>
      <p class="lead">تدريب موقوت وتقنيات امتحان في الاستماع والقراءة والكتابة والمحادثة، مع تقييم لكل اختبار تجريبي.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>تُدفع لمركز الاختبار</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>عشرون ساعة صفّية على أسبوعين لمن حجز موعد امتحانه: تدريب موقوت في الأوراق الأربع، وتصحيح كل اختبار تجريبي وفق موصّفات الدرجات، وعمل مركّز على الأقسام التي تكلّفك علامات.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>إدارة الوقت عبر أوراق الامتحان الأربع</li><li>تطبيق تقنيات مهمتي الكتابة الأولى والثانية</li><li>دخول مقابلة المحادثة ببنية واضحة</li><li>قراءة درجات اختباراتك التجريبية وفق موصّفات الدرجات</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المرشّحون الحاجزون لموعد امتحان</li><li>المحترفون المحتاجون لدرجة لترخيص أو تأشيرة</li><li>الطلبة المستعدون للقبول الجامعي</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>دورة اللغة الإنجليزية</h3><p>شهر · 40 ساعة · صباحي أو مسائي</p><a href="#english-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>اللغة العربية لغير الناطقين بها</h3><p>أسبوعان · 20 ساعة · صباحي أو مسائي</p><a href="#arabic-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: arabic-ar ================ -->
<div class="page" id="pg-arabic-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#arabic" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#arabic" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">اللغات والمهارات المكتبية</a><span>/</span><b style="color:var(--navy)">اللغة العربية لغير الناطقين بها</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">لغات</span>
      <h1>اللغة العربية لغير الناطقين بها</h1>
      <p class="lead">عربية عملية محادثةً وكتابةً للمقيمين الراغبين في عمل وحياة أكثر ثقة في الإمارات.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>أسبوعان · 20 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>عشرون ساعة صفّية من العربية العملية للحياة اليومية والعمل في الإمارات: التحية والمجاملة، والمفردات الأساسية، وقراءة الحروف، والعبارات التي تسهّل التعامل مع الخدمات والجهات وبيئة العمل.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>التحية والتعارف وإدارة محادثات أساسية</li><li>قراءة الحروف العربية وكتابتها بمستوى مبتدئ</li><li>استخدام عبارات المجاملة وبيئة العمل في محلّها</li><li>مواصلة التعلّم ذاتياً بمنهج واضح</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>المقيمون الجدد على العربية</li><li>موظفو خدمة العملاء المتعاملون مع ناطقين بالعربية</li><li>المحترفون المُظهرون التزاماً بالثقافة المحلية</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>دورة اللغة الإنجليزية</h3><p>شهر · 40 ساعة · صباحي أو مسائي</p><a href="#english-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>دورة التحضير لامتحان الآيلتس</h3><p>أسبوعان · 20 ساعة · صباحي أو مسائي</p><a href="#ielts-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">مهارات مكتبية</div><h3>مايكروسوفت أوفيس وكوبايلوت</h3><p>أسبوع · 30 ساعة · صباحي أو مسائي</p><a href="#office-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>

<!-- ================ PAGE: office-ar ================ -->
<div class="page" id="pg-office-ar" dir="rtl" lang="ar">

<div class="utility">
  <div class="container">
    <div class="left"><span>مقرّنا في أبوظبي</span><span>من الاثنين إلى الجمعة</span><span>دوام صباحي ومسائي</span></div>
    <div class="right">
      <a href="tel:0506399915">📞 050 6399915</a>
      <a href="#office" style="font-weight:700">EN</a>
      <span class="status">التسجيل مفتوح</span>
    </div>
  </div>
</div>

<header class="site">
  <div class="container">
    <a class="logo" href="#home-ar"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></a>
    <nav class="main">
      <ul>
        <li><a href="#courses-ar">الدورات</a></li>
        <li><a href="#corporate-ar">التدريب المؤسسي</a></li>
        <li><a href="#home-ar/accreditation">الاعتمادات</a></li>
        <li><a href="#schedule-ar">جدول الدورات</a></li>
        <li><a href="#about-ar">من نحن</a></li>
        <li><a href="#contact-ar">اتصل بنا</a></li>
      </ul>
    </nav>
    <div class="header-actions">
      <a class="lang-btn" href="#office" lang="en">EN</a>
      <a class="btn btn-outline" href="#corporate-ar">استفسر الآن</a>
      <a class="btn btn-navy" href="#contact-ar">سجّل الآن</a>
      <button class="menu-toggle" onclick="this.closest('header').classList.toggle('open')">☰</button>
    </div>
  </div>
</header>


<div class="crumbs"><div class="container"><a href="#home-ar">الرئيسية</a><span>/</span><a href="#courses-ar">الدورات</a><span>/</span><a href="#courses-ar">اللغات والمهارات المكتبية</a><span>/</span><b style="color:var(--navy)">مايكروسوفت أوفيس وكوبايلوت</b></div></div>

<section class="course-hero">
  <div class="container">
    <div>
      <span style="display:inline-block;background:var(--gold);color:var(--navy-deep);font-size:11px;font-weight:800;letter-spacing:.02em;padding:5px 12px">مهارات مكتبية</span>
      <h1>مايكروسوفت أوفيس وكوبايلوت</h1>
      <p class="lead">إكسل وورد وباوربوينت وآوتلوك بمستوى احترافي، مع استخدام كوبايلوت طوال أيام الدورة.</p>
      <div class="hero-meta">
        <div><span>المدة</span><b>أسبوع · 30 ساعة</b></div>
        <div><span>الأيام</span><b>الاثنين – الجمعة</b></div>
        <div><span>التوقيت</span><b>صباحي أو مسائي</b></div>
        <div><span>المكان</span><b>مقر أبوظبي</b></div>
      </div>
    </div>
    <div class="booking">
      <div class="eyebrow">المجموعة القادمة</div>
      <div class="date">[تاريخ البدء]</div>
      <dl>
        <div><dt>رسوم الدورة</dt><dd>[X,XXX درهم]</dd></div>
        <div><dt>رسوم الامتحان</dt><dd>لا ينطبق</dd></div>
        <div><dt>سعر المجموعات</dt><dd>ابتداءً من [العدد] متدربين</dd></div>
      </dl>
      <a class="btn btn-navy" href="#contact-ar">سجّل في هذه الدورة ←</a>
      <a class="btn btn-outline" style="width:100%;margin-top:10px" href="https://wa.me/9710506399915">💬 اسأل عبر واتساب</a>
      <a class="dl-link" href="#">⤓ تحميل مخطط الدورة</a>
    </div>
  </div>
</section>

<section class="course-body">
  <div class="container">
    <div>
      <h2 style="margin-top:0">ماذا تغطي هذه الدورة</h2>
      <p>ثلاثون ساعة صفّية عبر البرامج التي تعمل بها المكاتب الإماراتية — إكسل وورد وباوربوينت وآوتلوك — يُدرَّس كل منها بمستوى عملي، مع استخدام كوبايلوت داخل كل برنامج لا كإضافة في النهاية.</p>
      <div class="placeholder-note">[يُستبدل بالوصف المعتمد من ورقة معلومات الدورة، وتُدقَّق كل الادعاءات حول الأهلية وساعات التواصل والشهادة قبل النشر. التفاصيل اليومية تُزوَّد من الورقة المعتمدة.]</div>
      <h2>بنهاية الدورة ستكون قادراً على</h2>
      <ul class="outcomes"><li>بناء وصيانة جداول إكسل عاملة بالمعادلات</li><li>إخراج مستندات وورد وعروض باوربوينت نظيفة</li><li>إدارة البريد والتقويم والمهام بكفاءة في آوتلوك</li><li>استخدام كوبايلوت للصياغة والتلخيص والتحليل داخل أوفيس</li></ul>
    </div>
    <aside>
      <div class="side-box">
        <h4>لمن هذه الدورة</h4>
        <ul class="attend" style="list-style:none"><li>الموظفون الإداريون في أي مستوى</li><li>المحترفون المرسّخون لمهارات أوفيس المكتسبة ذاتياً</li><li>الفرق المتبنّية لكوبايلوت معاً</li></ul>
      </div>
      <div class="side-box">
        <h4>مدرّبك</h4>
        <div class="trainer-photo">👤 &nbsp;صورة المدرّب</div>
        <b style="color:var(--navy)">[اسم المدرّب]</b><br>
        <small style="color:var(--gold-ink)">[المؤهلات] · كادر كمبيوبيس</small>
        <p style="font-size:13px;margin-top:10px">[جملتان عن خبرة المدرّب والقطاعات التي عمل فيها.]</p>
      </div>
    </aside>
  </div>
</section>

<section class="related">
  <div class="container">
    <h2>من درسوا هذه الدورة اطّلعوا أيضاً على</h2>
    <div class="rel-grid">
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>أساسيات الذكاء الاصطناعي</h3><p>3 أيام · 18 ساعة · صباحي أو مسائي</p><a href="#ai-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">تقنية وأمن سيبراني</div><h3>هندسة الأوامر النصية</h3><p>يومان · 12 ساعة · صباحي أو مسائي</p><a href="#prompt-ar">تفاصيل الدورة ←</a></div>
    <div class="rel-card"><div class="eyebrow">لغات</div><h3>دورة اللغة الإنجليزية</h3><p>شهر · 40 ساعة · صباحي أو مسائي</p><a href="#english-ar">تفاصيل الدورة ←</a></div>
    </div>
  </div>
</section>

<section class="closing">
  <div class="container">
    <div><h2>التسجيل مفتوح الآن.</h2><p>حصص صباحية ومسائية متاحة. مركز كمبيوبيس للتدريب، أبوظبي.</p></div>
    <div class="actions"><a class="btn btn-navy" href="#contact-ar">سجّل الآن</a><a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a></div>
  </div>
</section>
<!-- FOOTER -->
<footer class="site">
  <div class="container">
    <div class="foot-grid">
      <div>
        <div class="foot-logo"><b>كمبيوبيس</b><small>حلول تدريبية مبتكرة</small></div>
        <p style="font-size:13px">تدريب صفّي في الشهادات المهنية وتقنية المعلومات والأمن السيبراني واللغات. مقرّ واحد في أبوظبي، مجموعات صباحية ومسائية، من الاثنين إلى الجمعة.</p>
      </div>
      <div><h4>الشهادات المهنية</h4><ul>
        <li><a href="#featured">إدارة المشاريع الاحترافية</a></li><li><a href="#featured">المدقق الداخلي المعتمد</a></li><li><a href="#featured">المحاسب الإداري المعتمد</a></li><li><a href="#featured">مدقق نظم المعلومات</a></li>
      </ul></div>
      <div><h4>التقنية والأمن</h4><ul>
        <li><a href="#featured">الاختراق الأخلاقي</a></li><li><a href="#featured">أساسيات الأمن السيبراني</a></li><li><a href="#featured">أساسيات الذكاء الاصطناعي</a></li><li><a href="#featured">هندسة الأوامر النصية</a></li>
      </ul></div>
      <div><h4>اللغات</h4><ul>
        <li><a href="#featured">اللغة الإنجليزية</a></li><li><a href="#featured">التحضير للآيلتس</a></li><li><a href="#featured">العربية لغير الناطقين بها</a></li><li><a href="#featured">أوفيس وكوبايلوت</a></li>
      </ul></div>
      <div><h4>اتصل بنا</h4>
        <p><b style="color:#fff">مركز كمبيوبيس للتدريب</b><br>[العنوان الكامل]<br>أبوظبي، الإمارات العربية المتحدة</p>
        <p style="margin-top:10px"><a href="tel:0506399915">050 6399915</a><br><a href="mailto:info@compubase.ae">info@compubase.ae</a><br>الأحد – الخميس · [ساعات الدوام]</p>
      </div>
    </div>
  </div>
  <div class="foot-bottom">
    <div class="container">
      <span>© <span id="yr"></span> مركز كمبيوبيس للتدريب. جميع الحقوق محفوظة.</span>
      <span><a href="#">سياسة الخصوصية</a><a href="#">الشروط والاسترداد</a><a href="#">خريطة الموقع</a><a href="#home">EN</a></span>
    </div>
  </div>
</footer>

<div class="mobile-bar">
  <a class="btn call" href="tel:0506399915">📞</a>
  <a class="btn btn-outline" href="https://wa.me/9710506399915">واتساب</a>
  <a class="btn btn-navy" href="#contact-ar">سجّل</a>
</div>


</div>
@endverbatim
@endsection
