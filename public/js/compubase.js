function pageUrl(slug){
  const root = String(window.APP_BASE || '').replace(/\/$/, '');
  if (!slug || slug === 'home') return root + '/';
  return root + '/' + slug;
}

/* ---------------- Course data (all 12) ---------------- */
const COURSES = {
  pmp:{cat:'cert',catName:'Professional certifications',tag:'Certification',title:'PMP — Project Management Professional',
    lead:'Work through every PMP exam domain with a CompuBase instructor, and leave the week with the 35 contact hours the PMI application requires.',
    blurb:'Work through the PMP exam domains with practice questions and the 35 contact hours the application requires.',
    dur:'5 days · 40 hours',timing:'Morning or evening',exam:'Paid to PMI',featured:true,sched:true,
    covers:'Five classroom days spent inside the PMP examination content outline: people, process and business environment. Each domain is taught, then practised against exam-style questions, so you finish the week knowing which areas still need work before you sit the paper.',
    outcomes:['Build a project charter, schedule and budget from a business case','Apply predictive, agile and hybrid approaches to the right situation','Manage risk, procurement and stakeholder expectations on a live project','Sit the PMP examination with the required contact hours documented'],
    days:['Project environment and the business case','Scope, schedule and cost','Quality, risk and procurement','People, teams and stakeholder management','Exam technique and a full timed mock'],
    attend:['Project managers and coordinators with delivery experience','Engineers and team leads moving into a project role','PMO staff preparing for the PMI application'],
    related:['cia','cisa','office']},
  cia:{cat:'cert',catName:'Professional certifications',tag:'Certification',title:'CIA — Certified Internal Auditor',
    lead:'Prepare for all three parts of the IIA Certified Internal Auditor examination with evening classroom sessions built around a full-time role.',
    blurb:'Evening exam preparation covering the internal audit essentials, practice and knowledge domains of the CIA syllabus.',
    dur:'5 days · 40 hours',timing:'Evening',exam:'Paid to IIA',featured:false,sched:true,
    covers:'Forty evening classroom hours across the CIA syllabus: internal audit essentials, the practice of internal auditing, and the business knowledge tested in the examination — each area taught and then drilled with exam-style questions.',
    outcomes:['Plan and scope an internal audit engagement','Apply the IIA standards and code of ethics to real cases','Evaluate governance, risk management and controls','Approach each CIA exam part with a revision plan'],
    days:['Internal audit foundations and standards','Governance, risk and control frameworks','Engagement planning and fieldwork','Reporting, follow-up and fraud awareness','Exam technique and timed practice'],
    attend:['Internal auditors working toward the CIA credential','Finance and compliance staff moving into audit','Audit team members asked to formalise their qualification'],
    related:['cma','cisa','pmp']},
  cma:{cat:'cert',catName:'Professional certifications',tag:'Certification',title:'CMA — Certified Management Accountant',
    lead:'Evening classroom preparation across both parts of the IMA CMA examination, for finance professionals in full-time roles.',
    blurb:'Financial planning, analytics, and strategic financial management mapped to the two-part CMA examination.',
    dur:'5 days · 40 hours',timing:'Evening',exam:'Paid to IMA',featured:false,sched:true,
    covers:'Forty evening hours across the CMA content: financial planning, performance and analytics in part one, and strategic financial management in part two — with worked questions under exam conditions throughout the week.',
    outcomes:['Build budgets, forecasts and performance reports','Apply cost management and internal control concepts','Analyse financial statements and investment decisions','Plan the two-part CMA exam sitting with confidence'],
    days:['External reporting and planning','Budgeting, forecasting and performance','Cost management and internal controls','Financial statement analysis and corporate finance','Decision analysis, risk and exam practice'],
    attend:['Accountants working toward a management accounting credential','Finance analysts moving into planning and reporting roles','Finance teams asked to standardise on the CMA'],
    related:['cia','pmp','office']},
  cisa:{cat:'cert',catName:'Professional certifications',tag:'Certification',title:'CISA — Information Systems Auditor',
    lead:'Audit, control and assurance of information systems, mapped to the current ISACA CISA job practice areas, in an evening group.',
    blurb:'Audit, control and assurance of information systems, mapped to the current ISACA CISA job practice areas.',
    dur:'5 days · 40 hours',timing:'Evening',exam:'Paid to ISACA',featured:true,sched:true,
    covers:'Forty evening classroom hours across the five CISA job practice areas — the IS audit process, IT governance, systems acquisition, operations and resilience, and protection of information assets — with exam-style questions after each domain.',
    outcomes:['Plan and execute a risk-based IS audit','Evaluate IT governance and management practices','Assess system development, operations and resilience','Sit the CISA exam with each domain revised'],
    days:['The IS audit process','Governance and management of IT','Systems acquisition, development and implementation','IS operations and business resilience','Protection of information assets and exam practice'],
    attend:['IT auditors and audit team members','Security and risk staff moving into assurance roles','Internal auditors extending into information systems'],
    related:['cia','ceh','cyber']},
  ceh:{cat:'it',catName:'IT and cyber security',tag:'IT and cyber security',title:'EC-Council Certified Ethical Hacker',
    lead:'Probe systems the way an attacker would, in a supervised lab, and prepare for the EC-Council CEH examination.',
    blurb:'Probe systems the way an attacker would, in a supervised lab, and prepare for the EC-Council CEH examination.',
    dur:'5 days · 40 hours',timing:'Morning or evening',exam:'Paid to EC-Council',featured:true,sched:true,
    covers:'Five hands-on classroom days moving through the attack lifecycle in a supervised lab: reconnaissance, scanning, gaining and maintaining access, and covering tracks — each phase practised on lab systems, never on live targets.',
    outcomes:['Run reconnaissance and vulnerability scans methodically','Exploit common weaknesses in a controlled lab','Document findings the way a professional tester reports them','Prepare for the EC-Council CEH examination'],
    days:['Ethics, scoping and reconnaissance','Scanning, enumeration and vulnerability analysis','System hacking and web attacks in the lab','Networks, wireless and social engineering','Reporting, defences and exam preparation'],
    attend:['System and network administrators testing their own estate','Security analysts moving into offensive testing','IT staff asked to evidence security capability'],
    related:['cyber','cisa','ai']},
  cyber:{cat:'it',catName:'IT and cyber security',tag:'IT and cyber security',title:'Cyber Security Essentials',
    lead:'A practical week that moves staff from security awareness to security capability — recognising, reporting and responding to everyday threats.',
    blurb:'A practical week that moves staff from awareness to capability — recognising, reporting and responding to threats.',
    dur:'5 days · 40 hours',timing:'Morning or evening',exam:'—',featured:false,sched:true,
    covers:'Five classroom days on the threats a UAE organisation actually faces: phishing and social engineering, credential and device hygiene, safe data handling, and what to do in the first hour of an incident — taught with real examples rather than theory.',
    outcomes:['Recognise phishing, social engineering and fraud attempts','Apply password, device and data-handling hygiene','Follow an incident-reporting process correctly','Explain security policy to colleagues in plain language'],
    days:['The threat landscape and how attacks start','Phishing, social engineering and fraud','Passwords, devices and safe data handling','Working securely — email, cloud and remote work','Incident response and putting it into practice'],
    attend:['Staff at any level who handle company systems or data','Teams asked to evidence security awareness training','Managers building a security-conscious department'],
    related:['ceh','ai','prompt']},
  ai:{cat:'it',catName:'IT and cyber security',tag:'IT and cyber security',title:'AI Essentials',
    lead:'Put AI tools to work on the tasks your role already involves — reporting, drafting, analysis. No coding required.',
    blurb:'Put AI tools to work on the tasks your role already involves — reporting, drafting, analysis. No coding required.',
    dur:'3 days · 18 hours',timing:'Morning or evening',exam:'—',featured:true,sched:true,
    covers:'Three short classroom days that take a working professional from cautious first use to confident daily use of AI tools — drafting, summarising, analysing and checking — with your organisation\u2019s data-handling rules kept front and centre.',
    outcomes:['Choose the right AI tool for a given task','Draft, summarise and analyse work documents with AI','Check and correct AI output before it leaves your desk','Use AI within data-privacy and policy boundaries'],
    days:['How the tools work and where they fail','Drafting, summarising and analysis in practice','Policy, privacy and building a daily workflow'],
    attend:['Professionals in any role who write, report or analyse','Departments adopting AI tools together','Managers setting AI usage expectations for a team'],
    related:['prompt','cyber','office']},
  prompt:{cat:'it',catName:'IT and cyber security',tag:'IT and cyber security',title:'Prompt Engineering',
    lead:'Two focused days on getting consistently better output from AI tools — structure, context, iteration and evaluation.',
    blurb:'Two focused days on getting consistently better output from AI tools — structure, context, iteration and evaluation.',
    dur:'2 days · 12 hours',timing:'Morning or evening',exam:'—',featured:false,sched:true,
    covers:'Twelve classroom hours on the craft behind good AI output: structuring a request, supplying the right context, iterating on a draft, and evaluating what comes back — practised on your own real work tasks across both days.',
    outcomes:['Structure prompts that produce usable first drafts','Supply context, examples and constraints effectively','Iterate and refine output instead of starting over','Build reusable prompt patterns for recurring tasks'],
    days:['Prompt structure, context and constraints','Iteration, evaluation and reusable patterns'],
    attend:['Anyone already using AI tools who wants better results','Teams standardising how they work with AI','Graduates of AI Essentials going one level deeper'],
    related:['ai','cyber','office']},
  english:{cat:'lang',catName:'Languages and office skills',tag:'Languages',title:'English Language',
    lead:'A month of general English tuition — speaking, writing, listening and reading — in a small classroom group, morning or evening.',
    blurb:'A month of general English tuition across speaking, writing, listening and reading, in a small classroom group.',
    dur:'1 month · 40 hours',timing:'Morning or evening',exam:'—',featured:false,sched:true,
    covers:'Forty classroom hours over a month, building practical workplace English: everyday conversation, professional email and writing, listening comprehension and reading — with the group placed by level on day one.',
    outcomes:['Hold workplace conversations with confidence','Write clear professional emails and messages','Follow meetings, calls and spoken instructions','Read and summarise work documents accurately'],
    days:['Placement, speaking foundations and everyday vocabulary','Workplace writing — email, messages and reports','Listening and meetings practice','Reading, review and consolidation'],
    attend:['Professionals building workplace English','Residents preparing for study or a new role','Teams whose working language is moving to English'],
    related:['ielts','arabic','office']},
  ielts:{cat:'lang',catName:'Languages and office skills',tag:'Languages',title:'IELTS Preparation',
    lead:'Timed practice and exam technique across listening, reading, writing and speaking, with feedback on every mock.',
    blurb:'Timed practice and exam technique across listening, reading, writing and speaking, with feedback on every mock.',
    dur:'2 weeks · 20 hours',timing:'Morning or evening',exam:'Paid to test centre',featured:true,sched:true,
    covers:'Twenty classroom hours over two weeks for candidates with a test date booked: timed practice in all four papers, band-descriptor marking on every mock, and targeted technique work on the sections costing you marks.',
    outcomes:['Manage time across all four IELTS papers','Apply task-specific technique in writing tasks 1 and 2','Approach the speaking interview with a clear structure','Read your mock scores against the band descriptors'],
    days:['Listening and reading technique with timed practice','Writing tasks, speaking interview and full mock feedback'],
    attend:['Candidates with an IELTS test date booked','Professionals needing a band score for licensure or visa','Students preparing for university admission'],
    related:['english','arabic','office']},
  arabic:{cat:'lang',catName:'Languages and office skills',tag:'Languages',title:'Arabic for Non-Arabic Speakers',
    lead:'Practical spoken and written Arabic for residents who want to work and live more confidently in the UAE.',
    blurb:'Practical spoken and written Arabic for residents who want to work and live more confidently in the UAE.',
    dur:'2 weeks · 20 hours',timing:'Morning or evening',exam:'—',featured:false,sched:false,
    covers:'Twenty classroom hours of practical Arabic for daily and working life in the UAE: greetings and courtesy, essential vocabulary, reading the script, and the phrases that make service, government and workplace interactions easier.',
    outcomes:['Greet, introduce and hold basic conversations in Arabic','Read and write the Arabic script at a starter level','Use courtesy and workplace phrases appropriately','Continue learning independently with a clear method'],
    days:['Sounds, script and greetings','Everyday vocabulary and courtesy','Workplace and service interactions','Reading practice and consolidation'],
    attend:['UAE residents new to Arabic','Customer-facing staff serving Arabic-speaking clients','Professionals showing commitment to the local culture'],
    related:['english','ielts','office']},
  office:{cat:'lang',catName:'Languages and office skills',tag:'Office skills',title:'MS Office + Copilot',
    lead:'Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout the week.',
    blurb:'Excel, Word, PowerPoint and Outlook to a working standard, with Microsoft Copilot used throughout the week.',
    dur:'1 week · 30 hours',timing:'Morning or evening',exam:'—',featured:true,sched:false,
    covers:'Thirty classroom hours across the Microsoft applications a UAE office runs on — Excel, Word, PowerPoint and Outlook — each taught to a working standard, with Microsoft Copilot used inside every application rather than bolted on at the end.',
    outcomes:['Build and maintain working Excel sheets with formulas','Produce clean Word documents and PowerPoint decks','Manage email, calendar and tasks efficiently in Outlook','Use Copilot to draft, summarise and analyse inside Office'],
    days:['Excel — formulas, tables and Copilot analysis','Word — documents, formatting and Copilot drafting','PowerPoint — decks and Copilot design help','Outlook — email, calendar and task management','Bringing it together on real work files'],
    attend:['Administrative and office staff at any level','Professionals formalising self-taught Office skills','Teams adopting Microsoft Copilot together'],
    related:['ai','prompt','english']},
};

/* ---------------- Render featured cards ---------------- */
const grid=document.getElementById('courseGrid');
function renderGrid(filter){
  if(!grid) return;
  grid.innerHTML='';
  Object.entries(COURSES).forEach(([id,c])=>{
    if(filter!=='all'&&c.cat!==filter)return;
    if(filter==='all'&&!c.featured)return;
    grid.insertAdjacentHTML('beforeend',`
    <div class="course-card">
      <div class="head"><span class="tag">${c.tag}</span><h3>${c.title}</h3></div>
      <div class="body">
        <p>${c.blurb}</p>
        <div class="meta">
          <div><span>Duration</span><b>${c.dur}</b></div>
          <div><span>Timing</span><b>${c.timing}</b></div>
          <div><span>Days</span><b>Monday to Friday</b></div>
          <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
        </div>
        <a class="btn btn-outline" href="${pageUrl(id)}">Course details and fees →</a>
      </div>
    </div>`);
  });
}
renderGrid('all');
const filterTabs=document.getElementById('filterTabs');
if(filterTabs) filterTabs.addEventListener('click',e=>{
  if(e.target.tagName!=='BUTTON')return;
  document.querySelectorAll('#filterTabs button').forEach(b=>b.classList.remove('active'));
  e.target.classList.add('active');
  renderGrid(e.target.dataset.f);
});
function filterCat(e,f){
  e.preventDefault();
  document.querySelectorAll('#filterTabs button').forEach(b=>b.classList.toggle('active',b.dataset.f===f));
  renderGrid(f);
  document.getElementById('featured').scrollIntoView({behavior:'smooth'});
}

/* ---------------- Schedule table ---------------- */
const catShort={cert:'Certification',it:'IT and cyber',lang:'Languages'};
const schedBody=document.getElementById('schedBody');
if(schedBody){
['pmp','ceh','cyber','cia','cma','english','ai','prompt'].forEach(id=>{
  const c=COURSES[id];
  schedBody.insertAdjacentHTML('beforeend',
   `<tr><td><b style="color:var(--navy)">${c.title}</b></td><td>${catShort[c.cat]}</td><td>${c.dur.replace(' hours',' hrs')}</td><td>${c.timing}</td><td>[DATE]</td><td><a href="${pageUrl(id)}">Register</a></td></tr>`);
});}

/* ---------------- Populate select lists ---------------- */
['finderCourse','proposalCourse'].forEach(sel=>{
  const s=document.getElementById(sel);
  if(!s) return;
  Object.values(COURSES).forEach(c=>{const o=document.createElement('option');o.textContent=c.title;s.appendChild(o)});
});




const TITLES={"home":"CompuBase Training Center — Professional Training Courses in Abu Dhabi","about":"About Us — CompuBase Training Center, Abu Dhabi","contact":"Contact Us — CompuBase Training Center, Abu Dhabi","courses":"All Courses — CompuBase Training Center, Abu Dhabi","schedule":"Course Schedule — CompuBase Training Center, Abu Dhabi","corporate":"Corporate Training — CompuBase Training Center, Abu Dhabi","pmp":"PMP — Project Management Professional — CompuBase Training Center, Abu Dhabi","cia":"CIA — Certified Internal Auditor — CompuBase Training Center, Abu Dhabi","cma":"CMA — Certified Management Accountant — CompuBase Training Center, Abu Dhabi","cisa":"CISA — Information Systems Auditor — CompuBase Training Center, Abu Dhabi","ceh":"EC-Council Certified Ethical Hacker — CompuBase Training Center, Abu Dhabi","cyber":"Cyber Security Essentials — CompuBase Training Center, Abu Dhabi","ai":"AI Essentials — CompuBase Training Center, Abu Dhabi","prompt":"Prompt Engineering — CompuBase Training Center, Abu Dhabi","english":"English Language — CompuBase Training Center, Abu Dhabi","ielts":"IELTS Preparation — CompuBase Training Center, Abu Dhabi","arabic":"Arabic for Non-Arabic Speakers — CompuBase Training Center, Abu Dhabi","office":"MS Office + Copilot — CompuBase Training Center, Abu Dhabi","home-ar":"مركز كمبيوبيس للتدريب — دورات تدريبية احترافية في أبوظبي","about-ar":"من نحن — مركز كمبيوبيس للتدريب، أبوظبي","contact-ar":"اتصل بنا — مركز كمبيوبيس للتدريب، أبوظبي","courses-ar":"جميع الدورات — مركز كمبيوبيس للتدريب، أبوظبي","schedule-ar":"جدول الدورات — مركز كمبيوبيس للتدريب، أبوظبي","corporate-ar":"التدريب المؤسسي — مركز كمبيوبيس للتدريب، أبوظبي","pmp-ar":"شهادة إدارة المشاريع الاحترافية — مركز كمبيوبيس للتدريب، أبوظبي","cia-ar":"شهادة المدقق الداخلي المعتمد — مركز كمبيوبيس للتدريب، أبوظبي","cma-ar":"شهادة المحاسب الإداري المعتمد — مركز كمبيوبيس للتدريب، أبوظبي","cisa-ar":"شهادة مدقق نظم المعلومات المعتمد — مركز كمبيوبيس للتدريب، أبوظبي","ceh-ar":"شهادة الاختراق الأخلاقي المعتمدة — مركز كمبيوبيس للتدريب، أبوظبي","cyber-ar":"أساسيات الأمن السيبراني — مركز كمبيوبيس للتدريب، أبوظبي","ai-ar":"أساسيات الذكاء الاصطناعي — مركز كمبيوبيس للتدريب، أبوظبي","prompt-ar":"هندسة الأوامر النصية — مركز كمبيوبيس للتدريب، أبوظبي","english-ar":"دورة اللغة الإنجليزية — مركز كمبيوبيس للتدريب، أبوظبي","ielts-ar":"دورة التحضير لامتحان الآيلتس — مركز كمبيوبيس للتدريب، أبوظبي","arabic-ar":"اللغة العربية لغير الناطقين بها — مركز كمبيوبيس للتدريب، أبوظبي","office-ar":"مايكروسوفت أوفيس وكوبايلوت — مركز كمبيوبيس للتدريب، أبوظبي"};
const KNOWN=new Set(["home","about","contact","courses","schedule","corporate","pmp","cia","cma","cisa","ceh","cyber","ai","prompt","english","ielts","arabic","office","home-ar","about-ar","contact-ar","courses-ar","schedule-ar","corporate-ar","pmp-ar","cia-ar","cma-ar","cisa-ar","ceh-ar","cyber-ar","ai-ar","prompt-ar","english-ar","ielts-ar","arabic-ar","office-ar"]);
let CURRENT='home';
function scrollSec(sec){
 const el=document.querySelector('#pg-'+CURRENT+' #'+sec)||document.querySelector('#pg-'+CURRENT+' .'+sec);
 if(el)el.scrollIntoView({behavior:'smooth'});
}
function bootPage(){
 const legacy=decodeURIComponent((location.hash||'').replace(/^#\/?/, ''));
 if(legacy){
  const [p,s]=legacy.split('/');
  if(KNOWN.has(p)){
   location.replace(pageUrl(p)+(s?'?go='+encodeURIComponent(s):''));
   return;
  }
  history.replaceState(null,'',location.pathname+location.search);
  setTimeout(()=>scrollSec(legacy),60);
 }
 const p=window.INITIAL_PAGE||'home';
 if(!KNOWN.has(p))return;
 CURRENT=p;
 document.querySelectorAll('.page').forEach(d=>d.classList.toggle('active',d.id==='pg-'+p));
 document.documentElement.lang=p.endsWith('-ar')?'ar':'en';
 if(TITLES[p])document.title=TITLES[p];
 document.querySelectorAll('header.site.open').forEach(hd=>hd.classList.remove('open'));
 const go=new URLSearchParams(location.search).get('go');
 if(go){
  setTimeout(()=>scrollSec(go),60);
  history.replaceState(null,'',location.pathname);
 }else if(!legacy){
  window.scrollTo(0,0);
 }
}
bootPage();
document.querySelectorAll('.hero-slider').forEach(sl=>{
 const slides=[...sl.querySelectorAll('.hs-slide')];const dots=sl.querySelector('.hs-dots');const count=sl.querySelector('.hs-count');let i=0,timer;
 slides.forEach((_,n)=>{const b=document.createElement('button');b.setAttribute('aria-label','Slide '+(n+1));b.onclick=()=>show(n,true);dots.appendChild(b)});
 function show(n,manual){i=(n+slides.length)%slides.length;
  slides.forEach((x,k)=>x.classList.toggle('active',k===i));
  [...dots.children].forEach((d,k)=>d.classList.toggle('on',k===i));
  if(count)count.textContent=('0'+(i+1)).slice(-2)+' / '+('0'+slides.length).slice(-2);
  if(manual)restart();}
 function restart(){clearInterval(timer);timer=setInterval(()=>show(i+1),6000);}
 sl.querySelector('.hs-prev').onclick=()=>show(i-1,true);
 sl.querySelector('.hs-next').onclick=()=>show(i+1,true);
 let x0=null;
 sl.addEventListener('touchstart',e=>x0=e.touches[0].clientX,{passive:true});
 sl.addEventListener('touchend',e=>{if(x0===null)return;const dx=e.changedTouches[0].clientX-x0;if(Math.abs(dx)>50)show(i+(dx<0?1:-1),true);x0=null},{passive:true});
 show(0);restart();
});
document.querySelectorAll('.page').forEach(pg=>{
 const id=pg.id.replace('pg-','');
 const isAr=id.endsWith('-ar');
 const other=isAr?id.slice(0,-3):id+'-ar';
 if(!KNOWN.has(other))return;
 const acts=pg.querySelector('.header-actions');
 if(!acts)return;
 if(acts.querySelector('.lang-btn')){acts.querySelector('.lang-btn').href=pageUrl(other);return;}
 const a=document.createElement('a');
 a.className='lang-btn';a.href=pageUrl(other);
 a.innerHTML=isAr?'EN':'AR';
 a.setAttribute('lang',isAr?'en':'ar');
 acts.insertBefore(a,acts.firstChild);
});
document.querySelectorAll('#yr').forEach(y=>y.textContent=new Date().getFullYear());
document.querySelectorAll('[data-scroll]').forEach(a=>{
 a.addEventListener('click',e=>{
  if((a.getAttribute('href')||'').includes('?go='))return;
  e.preventDefault();
  scrollSec(a.dataset.scroll);
 });
});
