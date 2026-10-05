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
function renderGrid(list){
  if(!grid) return;
  grid.innerHTML='';
  list.slice(0,6).forEach(c=>{
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
/* Scrolling category row: arrows step through it and grey out at either end. Returns a refresh function. */
function railArrows(rail){
  const row=rail.querySelector('.feat-cats'),prev=rail.querySelector('.prev'),next=rail.querySelector('.next');
  const rtl=document.documentElement.dir==='rtl';
  function update(){
    const max=row.scrollWidth-row.clientWidth,x=Math.abs(row.scrollLeft);
    prev.disabled=x<4;next.disabled=x>max-4;
    rail.classList.toggle('no-scroll',max<4);
  }
  const step=d=>row.scrollBy({left:d*row.clientWidth*.7*(rtl?-1:1),behavior:'smooth'});
  prev.addEventListener('click',()=>step(-1));next.addEventListener('click',()=>step(1));
  row.addEventListener('scroll',update,{passive:true});
  window.addEventListener('resize',update);
  return ()=>{row.scrollLeft=0;update()};
}
/* Featured filter: pick a group (all / management / IT), then optionally one of its categories. */
const featGroups=document.getElementById('featGroups');
const featRail=document.getElementById('featRail');
const filterTabs=document.getElementById('filterTabs');
const featMore=document.getElementById('featMore');
if(grid && featGroups && filterTabs){
  const chips=[...filterTabs.querySelectorAll('button')];
  const groupOf={};chips.forEach(b=>groupOf[b.dataset.f]=b.dataset.g);
  const inGroup=g=>g==='all'?COURSES:COURSES.filter(c=>c.cats.some(k=>groupOf[k]===g));
  featGroups.querySelectorAll('button').forEach(b=>b.querySelector('span').textContent=inGroup(b.dataset.g).length);
  const coursesUrl=pageUrl('courses');
  const resetRail=railArrows(featRail);
  function show(list,label,href){
    renderGrid(list);
    const a=featMore.querySelector('a');
    a.textContent=list.length>6?`View all ${list.length} ${label} →`:'Browse the full catalogue →';
    a.href=href;
  }
  function pickGroup(g){
    featGroups.querySelectorAll('button').forEach(b=>b.classList.toggle('active',b.dataset.g===g));
    chips.forEach(b=>{b.hidden=b.dataset.g!==g;b.classList.remove('active')});
    featRail.hidden=g==='all';
    resetRail();
    show(inGroup(g),g==='all'?'courses':g==='it'?'IT courses':'management courses',coursesUrl);
  }
  featGroups.addEventListener('click',e=>{const b=e.target.closest('button');if(b)pickGroup(b.dataset.g)});
  filterTabs.addEventListener('click',e=>{
    const b=e.target.closest('button');if(!b)return;
    if(b.classList.contains('active')){pickGroup(b.dataset.g);return}
    chips.forEach(x=>x.classList.remove('active'));
    b.classList.add('active');
    show(COURSES.filter(c=>c.cats.includes(b.dataset.f)),b.dataset.name+' courses',coursesUrl+'?go='+encodeURIComponent(b.dataset.f));
  });
  pickGroup('all');
}

/* ---------------- Schedule table ---------------- */
const schedBody=document.getElementById('schedBody');
if(schedBody){
COURSES.slice(0,8).forEach(c=>{
  schedBody.insertAdjacentHTML('beforeend',
   `<tr><td><b style="color:var(--navy)">${esc(c.title)}</b></td><td>${esc(c.catName)}</td><td>${c.dur}</td><td>Morning or evening</td><td>2026 &amp; 2027</td><td><a href="${c.url}">Register</a></td></tr>`);
});}

/* ---------------- Course search helpers (home finder and All Courses) ---------------- */
function searchNorm(t){return String(t).toLowerCase().replace(/[\u064B-\u0652\u0640]/g,'').replace(/[إأآ]/g,'ا')}
function searchWords(q){return searchNorm(q).trim().split(/\s+/).filter(Boolean)}
function fitsDays(d,v){return !v||(v==='short'?d<=3:v==='week'?d>3&&d<=5:d>5)}

/* ---------------- Course finder (home): type to get suggestions, filters narrow the count, Search opens the course or the list ---------------- */
document.querySelectorAll('.finder-form').forEach(form=>{
  const data=JSON.parse(form.querySelector('.finder-data').textContent).map(c=>({...c,s:searchNorm(c.s)}));
  const q=form.querySelector('[name=q]'), cat=form.querySelector('[name=category]'), days=form.querySelector('[name=days]');
  const list=form.querySelector('.finder-suggest'), btn=form.querySelector('button[type=submit]');
  let matches=data, active=-1;
  // Highlight the first matching word in the title (skipped when normalising changed its length, e.g. Arabic diacritics).
  const hl=(t,words)=>{const n=searchNorm(t),w=words.find(x=>n.includes(x));if(!w||n.length!==t.length)return esc(t);const i=n.indexOf(w);return esc(t.slice(0,i))+'<mark>'+esc(t.slice(i,i+w.length))+'</mark>'+esc(t.slice(i+w.length))};
  function close(){list.hidden=true;q.setAttribute('aria-expanded','false');q.removeAttribute('aria-activedescendant');active=-1}
  function mark(i){
    const items=[...list.querySelectorAll('[role=option]')];
    if(!items.length) return;
    active=(i+items.length)%items.length;
    items.forEach((li,k)=>li.classList.toggle('on',k===active));
    q.setAttribute('aria-activedescendant',items[active].id);
    items[active].scrollIntoView({block:'nearest'});
  }
  function update(open){
    const words=searchWords(q.value);
    matches=data.filter(c=>(!cat.value||c.k.includes(cat.value))&&fitsDays(c.d,days.value)&&words.every(w=>c.s.includes(w)));
    btn.textContent=matches.length===1?form.dataset.one:matches.length?form.dataset.show.replace('{n}',matches.length):form.dataset.none;
    btn.disabled=!matches.length;
    if(!open||!words.length){close();return}
    list.innerHTML=matches.length
      ?matches.slice(0,8).map((c,i)=>`<li role="option" id="${list.id}-${i}"><a href="${c.u}"><b>${hl(c.t,words)}</b><small>${esc(c.c)} · ${esc(c.l)}</small></a></li>`).join('')
        +(matches.length>8?`<li class="more">${esc(form.dataset.show.replace('{n}',matches.length))}</li>`:'')
      :`<li class="more">${esc(form.dataset.none)}</li>`;
    list.hidden=false;q.setAttribute('aria-expanded','true');active=-1;
  }
  q.addEventListener('input',()=>update(true));
  q.addEventListener('focus',()=>update(true));
  cat.addEventListener('change',()=>update(false));
  days.addEventListener('change',()=>update(false));
  q.addEventListener('keydown',e=>{
    if(e.key==='ArrowDown'){e.preventDefault();if(list.hidden)update(true);mark(active+1)}
    else if(e.key==='ArrowUp'){e.preventDefault();mark(active-1)}
    else if(e.key==='Escape'){close()}
    else if(e.key==='Enter'&&active>-1){e.preventDefault();location.href=matches[active].u}
  });
  list.addEventListener('click',e=>{if(e.target.closest('.more'))form.requestSubmit()});
  document.addEventListener('click',e=>{if(!form.querySelector('.finder-q').contains(e.target))close()});
  form.addEventListener('submit',e=>{
    e.preventDefault();
    if(matches.length===1){location.href=matches[0].u;return}
    const p=new URLSearchParams();
    if(q.value.trim()) p.set('q',q.value.trim());
    if(cat.value) p.set('category',cat.value);
    if(days.value) p.set('days',days.value);
    location.href=form.action+(p.toString()?'?'+p:'');
  });
  update(false);
});

/* ---------------- Populate select lists ---------------- */
[].forEach(sel=>{
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
  // Scroll when the section is on this page; otherwise follow the link to the page that has it.
  const sec=a.dataset.scroll, el=document.getElementById(sec)||document.querySelector('.'+sec);
  if(!el)return;
  e.preventDefault();
  el.scrollIntoView({behavior:'smooth'});
 });
});

/* ---------------- All Courses and Schedule: category filter and pagination ---------------- */
document.querySelectorAll('.catalog').forEach(box=>{
 const perPage=+box.dataset.perPage||12;
 const cards=[...box.querySelectorAll('.course-grid>.course-card,.sched tbody>tr')];
 const tabs=[...box.querySelectorAll('.feat-groups [data-group]')];
 const chips=[...box.querySelectorAll('.feat-cats [data-cat]')];
 const rail=box.querySelector('.feat-rail'), resetRail=railArrows(rail);
 const groupOf={};chips.forEach(c=>groupOf[c.dataset.cat]=c.dataset.g);
 const pager=box.querySelector('.pager'), pages=box.querySelector('.pager-pages');
 const prev=box.querySelector('.pager-prev'), next=box.querySelector('.pager-next');
 const count=box.querySelector('.catalog-count');
 const params=new URLSearchParams(location.search);
 // cat is a category slug or 'all'; group is 'all', 'management' or 'it'.
 let cat=params.get('category')||box.dataset.initial||'all', group=params.get('group')||'all', page=+params.get('page')||1;
 let q=(params.get('q')||'').trim(), days=params.get('days')||'';
 if(!groupOf[cat]) cat='all'; else group=groupOf[cat];
 if(!tabs.some(t=>t.dataset.group===group)) group='all';

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
  const words=searchWords(q);
  const list=cards.filter(c=>{const cs=c.dataset.cats.split(' ');
   if(c.dataset.title!==undefined&&!(words.every(w=>searchNorm(c.dataset.title).includes(w))&&fitsDays(+c.dataset.days,days))) return false;
   return cat!=='all'?cs.includes(cat):group==='all'||cs.some(k=>groupOf[k]===group)});
  const total=Math.max(1,Math.ceil(list.length/perPage));
  page=Math.min(Math.max(1,page),total);
  const start=(page-1)*perPage, shown=list.slice(start,start+perPage);
  cards.forEach(c=>c.style.display=shown.includes(c)?'':'none');
  tabs.forEach(t=>{const on=t.dataset.group===group;t.classList.toggle('active',on);t.setAttribute('aria-pressed',on)});
  chips.forEach(c=>{const on=c.dataset.cat===cat;c.hidden=c.dataset.g!==group;c.classList.toggle('active',on);c.setAttribute('aria-pressed',on)});
  rail.hidden=group==='all';
  count.textContent=box.dataset.showing.replace('{from}',list.length?start+1:0).replace('{to}',start+shown.length).replace('{total}',list.length);
  if(q||days){
   const lbl=[q&&`“${q}”`,days&&box.dataset['days'+days[0].toUpperCase()+days.slice(1)]].filter(Boolean).join(' · ');
   count.insertAdjacentHTML('beforeend',` · <b>${esc(lbl)}</b> <button type="button" class="catalog-clear">${esc(box.dataset.clear||'Clear search')}</button>`);
   count.querySelector('.catalog-clear').onclick=()=>{q='';days='';page=1;render(false)};
  }
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
  const u=new URLSearchParams();
  if(q) u.set('q',q);
  if(cat!=='all') u.set('category',cat); else if(group!=='all') u.set('group',group);
  if(days) u.set('days',days);
  if(page>1) u.set('page',page);
  history.replaceState(null,'',location.pathname+(u.toString()?'?'+u:''));
  if(scroll) box.scrollIntoView({behavior:'smooth',block:'start'});
 }
 tabs.forEach(t=>t.addEventListener('click',()=>{group=t.dataset.group;cat='all';page=1;render(false);resetRail()}));
 chips.forEach(c=>c.addEventListener('click',()=>{cat=cat===c.dataset.cat?'all':c.dataset.cat;page=1;render(false)}));
 prev.addEventListener('click',()=>{page--;render(true)});
 next.addEventListener('click',()=>{page++;render(true)});
 render(cat!=='all'||group!=='all'||page>1||!!q||!!days);
 const on=chips.find(c=>c.dataset.cat===cat);
 resetRail(); if(on){const row=on.parentNode;row.scrollLeft+=on.getBoundingClientRect().left-row.getBoundingClientRect().left-40}
});
// Course sidebar: links that open a tab, and the "Read more" toggle on long text.
document.querySelectorAll('[data-open-tab]').forEach(a=>a.addEventListener('click',e=>{e.preventDefault();if(showTab(a.dataset.openTab,true)){const t=document.querySelector('.tabs');if(t)t.scrollIntoView({behavior:'smooth'});}}));
/* Course page: "Download the course outline" prints every part of the course document (save as PDF from the print window). */
document.querySelectorAll('[data-print-outline]').forEach(b=>b.addEventListener('click',()=>{
 document.body.classList.add('print-outline');
 window.print();
 setTimeout(()=>document.body.classList.remove('print-outline'),500);
}));
document.querySelectorAll('.cs-toggle').forEach(b=>{
 const box=b.previousElementSibling;
 if(box&&box.scrollHeight<=box.clientHeight+4){box.classList.add('short');b.hidden=true;return;}
 b.addEventListener('click',()=>{const open=box.classList.toggle('open');b.textContent=open?b.dataset.less:b.dataset.more;});
});
