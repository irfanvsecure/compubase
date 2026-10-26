/* Home page only: reveals, count-ups, sticky programme story, spotlight cards, scroll progress, FAQ animation. */
(function () {
  const root = document.querySelector('.nx');
  if (!root) return;
  const still = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* Scroll progress bar */
  const bar = document.querySelector('.nx-progress');
  const onScroll = () => {
    const h = document.documentElement.scrollHeight - innerHeight;
    if (bar) bar.style.setProperty('--p', h > 0 ? Math.min(1, scrollY / h) : 0);
  };
  addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* Spotlight: radial glow follows the pointer */
  root.querySelectorAll('.nx-spot').forEach(el => {
    el.addEventListener('pointermove', e => {
      const r = el.getBoundingClientRect();
      el.style.setProperty('--mx', (e.clientX - r.left) + 'px');
      el.style.setProperty('--my', (e.clientY - r.top) + 'px');
    });
  });

  /* FAQ: only one open at a time */
  const items = [...root.querySelectorAll('.nx-acc-item')];
  items.forEach(d => d.addEventListener('toggle', () => {
    if (d.open) items.forEach(o => { if (o !== d) o.open = false; });
  }));

  /* Programme story: active chapter drives the sticky stage and the nav */
  const chapters = [...root.querySelectorAll('.nx-chapter')];
  const cards = [...root.querySelectorAll('.nx-stage-card')];
  const links = [...root.querySelectorAll('.nx-story-nav a')];
  const count = root.querySelector('.nx-stage-count b');
  const activate = i => {
    chapters.forEach((c, k) => c.classList.toggle('on', k === i));
    cards.forEach((c, k) => c.classList.toggle('on', k === i));
    links.forEach((a, k) => a.classList.toggle('on', k === i));
    if (count) count.textContent = '0' + (i + 1);
  };
  links.forEach((a, i) => a.addEventListener('click', e => {
    e.preventDefault();
    chapters[i].scrollIntoView({ behavior: still ? 'auto' : 'smooth', block: 'center' });
  }));

  if (still || !('IntersectionObserver' in window)) {
    chapters.forEach(c => c.classList.add('on'));
    return;
  }
  activate(0);
  const story = new IntersectionObserver(entries => entries.forEach(e => {
    if (e.isIntersecting) activate(chapters.indexOf(e.target));
  }), { rootMargin: '-45% 0px -45% 0px' });
  chapters.forEach(c => story.observe(c));

  /* Parallax on the hero collage */
  const collage = root.querySelector('[data-parallax]');
  if (collage) addEventListener('scroll', () => {
    if (scrollY < innerHeight) collage.style.transform = 'translateY(' + (scrollY * -0.08) + 'px)';
  }, { passive: true });

  /* Reveals (siblings stagger) and count-ups */
  document.documentElement.classList.add('nx-js');
  const reveals = [...root.querySelectorAll('[data-reveal]')];
  reveals.forEach(el => {
    const sibs = [...el.parentElement.children].filter(s => s.hasAttribute('data-reveal'));
    el.style.setProperty('--d', (sibs.indexOf(el) * 0.1) + 's');
  });
  const countUp = el => {
    const end = +el.dataset.count;
    if (!end) return;
    const t0 = performance.now(), dur = 1600;
    const tick = t => {
      const k = Math.min(1, (t - t0) / dur);
      el.textContent = Math.round(end * (1 - Math.pow(1 - k, 4)));
      if (k < 1) requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  };
  const io = new IntersectionObserver(entries => entries.forEach(e => {
    if (!e.isIntersecting) return;
    io.unobserve(e.target);
    if (e.target.hasAttribute('data-count')) countUp(e.target);
    else {
      const el = e.target;
      el.classList.add('is-in');
      // Once revealed, drop the reveal transition so hover effects respond instantly.
      el.addEventListener('transitionend', function done(ev) {
        if (ev.target !== el) return;
        el.removeEventListener('transitionend', done);
        el.removeAttribute('data-reveal');
        el.style.removeProperty('--d');
      });
    }
  }), { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
  reveals.forEach(el => io.observe(el));
  root.querySelectorAll('[data-count]').forEach(el => io.observe(el));
})();
