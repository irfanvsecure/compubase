function pageUrl(slug){
  const root = String(window.APP_BASE || '').replace(/\/$/, '');
  if (!slug || slug === 'home') return root + '/';
  if (slug === 'home-ar') return root + '/ar/';
  if (slug.endsWith('-ar')) return root + '/ar/' + slug.slice(0, -3);
  return root + '/' + slug;
}

/* ---------------- Course data (from config/courses.php) ---------------- */
const COURSES = window.COURSE_DATA || [];
const esc=s=>String(s).replace(/[&<>"]/g,ch=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[ch]));

/* ---------------- Render featured cards ---------------- */
const grid=document.getElementById('courseGrid');
function renderGrid(filter){
  if(!grid) return;
  grid.innerHTML='';
  const list=filter==='all'?COURSES.slice(0,6):COURSES.filter(c=>c.cats.includes(filter));
  list.forEach(c=>{
    grid.insertAdjacentHTML('beforeend',`
    <div class="course-card">
      <div class="head"><span class="tag">${esc(c.catName)}</span><h3>${esc(c.title)}</h3></div>
      <div class="body">
        <p>${c.summary?esc(c.summary):'[Course summary from the CompuBase course outline.]'}</p>
        <div class="meta">
          <div><span>Duration</span><b>${c.dur}</b></div>
          <div><span>Timing</span><b>Morning or evening</b></div>
          <div><span>Days</span><b>Monday to Friday</b></div>
          <div><span>Next start</span><b style="color:var(--gold-ink)">2026 &amp; 2027</b></div>
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
   `<tr><td><b style="color:var(--navy)">${esc(c.title)}</b></td><td>${esc(c.catName)}</td><td>${c.dur}</td><td>Morning or evening</td><td>2026 &amp; 2027</td><td><a href="${c.url}">Register</a></td></tr>`);
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

/* ---------------- All Courses and Schedule: category filter and pagination ---------------- */
document.querySelectorAll('.catalog').forEach(box=>{
 const perPage=+box.dataset.perPage||12;
 const cards=[...box.querySelectorAll('.course-grid>.course-card,.sched tbody>tr')];
 const chips=[...box.querySelectorAll('.cat-filter [data-cat]')];
 const pager=box.querySelector('.pager'), pages=box.querySelector('.pager-pages');
 const prev=box.querySelector('.pager-prev'), next=box.querySelector('.pager-next');
 const count=box.querySelector('.catalog-count');
 const params=new URLSearchParams(location.search);
 let cat=params.get('category')||box.dataset.initial||'all', page=+params.get('page')||1;
 if(!chips.some(c=>c.dataset.cat===cat)) cat='all';

 function pageList(total){
  // Every page when there are few, otherwise the first, the last and two either side of the current one.
  if(total<=7) return Array.from({length:total},(_,i)=>i+1);
  const out=[1], from=Math.max(2,page-2), to=Math.min(total-1,page+2);
  if(from>2) out.push('…');
  for(let i=from;i<=to;i++) out.push(i);
  if(to<total-1) out.push('…');
  out.push(total);
  return out;
 }
 function render(scroll){
  const list=cards.filter(c=>cat==='all'||c.dataset.cats.split(' ').includes(cat));
  const total=Math.max(1,Math.ceil(list.length/perPage));
  page=Math.min(Math.max(1,page),total);
  const start=(page-1)*perPage, shown=list.slice(start,start+perPage);
  cards.forEach(c=>c.style.display=shown.includes(c)?'':'none');
  chips.forEach(c=>{const on=c.dataset.cat===cat;c.classList.toggle('active',on);c.setAttribute('aria-pressed',on)});
  count.textContent=box.dataset.showing.replace('{from}',list.length?start+1:0).replace('{to}',start+shown.length).replace('{total}',list.length);
  pager.hidden=total<2;
  prev.disabled=page===1; next.disabled=page===total;
  pages.innerHTML='';
  pageList(total).forEach(n=>{
   if(n==='…'){pages.insertAdjacentHTML('beforeend','<span class="pager-gap">…</span>');return;}
   const b=document.createElement('button');b.type='button';b.textContent=n;
   if(n===page){b.className='current';b.setAttribute('aria-current','page');}
   b.onclick=()=>{page=n;render(true)};
   pages.appendChild(b);
  });
  const q=new URLSearchParams();
  if(cat!=='all') q.set('category',cat);
  if(page>1) q.set('page',page);
  history.replaceState(null,'',location.pathname+(q.toString()?'?'+q:''));
  if(scroll) box.scrollIntoView({behavior:'smooth',block:'start'});
 }
 chips.forEach(c=>c.addEventListener('click',()=>{cat=c.dataset.cat;page=1;render(false)}));
 prev.addEventListener('click',()=>{page--;render(true)});
 next.addEventListener('click',()=>{page++;render(true)});
 render(cat!=='all'||page>1);
});
