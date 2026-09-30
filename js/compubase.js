function pageUrl(slug){
  const root = String(window.APP_BASE || '').replace(/\/$/, '');
  if (!slug || slug === 'home') return root + '/';
  if (slug === 'home-ar') return root + '/ar/';
  if (slug.endsWith('-ar')) return root + '/ar/' + slug.slice(0, -3);
  return root + '/' + slug;
}

/* ---------------- Course data (from config/courses.php) ---------------- */
const COURSES = window.COURSE_DATA || [];

/* ---------------- Render featured cards ---------------- */
const grid=document.getElementById('courseGrid');
function renderGrid(filter){
  if(!grid) return;
  grid.innerHTML='';
  const list=filter==='all'?COURSES.slice(0,6):COURSES.filter(c=>c.cat===filter);
  list.forEach(c=>{
    grid.insertAdjacentHTML('beforeend',`
    <div class="course-card">
      <div class="head"><span class="tag">${c.catName}</span><h3>${c.title}</h3></div>
      <div class="body">
        <p>[Course summary from the CompuBase course outline.]</p>
        <div class="meta">
          <div><span>Duration</span><b>${c.dur}</b></div>
          <div><span>Timing</span><b>Morning or evening</b></div>
          <div><span>Days</span><b>Monday to Friday</b></div>
          <div><span>Next start</span><b style="color:var(--gold-ink)">[START DATE]</b></div>
        </div>
        <a class="btn btn-outline" href="${c.url}">Course details and fees →</a>
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

/* ---------------- Schedule table ---------------- */
const schedBody=document.getElementById('schedBody');
if(schedBody){
COURSES.slice(0,8).forEach(c=>{
  schedBody.insertAdjacentHTML('beforeend',
   `<tr><td><b style="color:var(--navy)">${c.title}</b></td><td>${c.catName}</td><td>${c.dur}</td><td>Morning or evening</td><td>[DATE]</td><td><a href="${c.url}">Register</a></td></tr>`);
});}

/* ---------------- Populate select lists ---------------- */
['finderCourse','proposalCourse'].forEach(sel=>{
  const s=document.getElementById(sel);
  if(!s) return;
  COURSES.forEach(c=>{const o=document.createElement('option');o.textContent=c.title;s.appendChild(o)});
});




const TITLES={"home":"CompuBase Training Center — Professional Training Courses in Abu Dhabi","about":"About Us — CompuBase Training Center, Abu Dhabi","contact":"Contact Us — CompuBase Training Center, Abu Dhabi","courses":"All Courses — CompuBase Training Center, Abu Dhabi","schedule":"Course Schedule — CompuBase Training Center, Abu Dhabi","corporate":"Corporate Training — CompuBase Training Center, Abu Dhabi","home-ar":"مركز كمبيوبيس للتدريب — دورات تدريبية احترافية في أبوظبي","about-ar":"من نحن — مركز كمبيوبيس للتدريب، أبوظبي","contact-ar":"اتصل بنا — مركز كمبيوبيس للتدريب، أبوظبي","courses-ar":"جميع الدورات — مركز كمبيوبيس للتدريب، أبوظبي","schedule-ar":"جدول الدورات — مركز كمبيوبيس للتدريب، أبوظبي","corporate-ar":"التدريب المؤسسي — مركز كمبيوبيس للتدريب، أبوظبي"};
const KNOWN=new Set(["home","about","contact","courses","schedule","corporate","home-ar","about-ar","contact-ar","courses-ar","schedule-ar","corporate-ar"]);
let CURRENT='home';
function scrollSec(sec){
 const el=document.querySelector('#pg-'+CURRENT+' #'+sec)||document.querySelector('#pg-'+CURRENT+' .'+sec);
 if(el)el.scrollIntoView({behavior:'smooth'});
}
function showTab(id,remember){
 const panel=id&&document.getElementById(id);
 if(!panel||!panel.classList.contains('tab-panel'))return false;
 const box=panel.parentElement;
 box.querySelectorAll(':scope>.tab-panel').forEach(x=>x.classList.toggle('active',x===panel));
 box.querySelectorAll('.tabs [data-tab]').forEach(a=>{a.classList.toggle('active',a.dataset.tab===id);a.setAttribute('aria-selected',a.dataset.tab===id)});
 if(remember)history.replaceState(null,'','#'+id);
 return true;
}
document.querySelectorAll('.tabs [data-tab]').forEach(a=>a.addEventListener('click',e=>{e.preventDefault();showTab(a.dataset.tab,true)}));
function bootPage(){
 const hash=decodeURIComponent((location.hash||'').replace(/^#\/?/, ''));
 const legacy=showTab(hash,false)?'':hash;
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
 CURRENT=p;
 if(!KNOWN.has(p))return;
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
