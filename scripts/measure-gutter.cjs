/**
 * Measure left/right content inset on key pages at several widths.
 * Uses system Chrome via puppeteer-core if available, else prints CSS math.
 */
const { spawn } = require('child_process');
const http = require('http');
const fs = require('fs');
const path = require('path');
const os = require('os');

const BASE = 'http://127.0.0.1:8081/compubase';
const PAGES = ['/', '/courses', '/about', '/contact', '/corporate'];
const WIDTHS = [1100, 1280, 1440, 1600, 1920];
const CHROME = process.env.CHROME_PATH ||
  'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe';

async function measureWithChrome() {
  const puppeteer = require('puppeteer-core');
  const browser = await puppeteer.launch({
    executablePath: CHROME,
    headless: 'new',
    args: ['--no-sandbox', '--disable-gpu', `--window-size=1920,1080`],
  });
  const page = await browser.newPage();
  const rows = [];

  for (const w of WIDTHS) {
    await page.setViewport({ width: w, height: 900 });
    for (const route of PAGES) {
      await page.goto(BASE + route, { waitUntil: 'networkidle2', timeout: 30000 });
      const m = await page.evaluate(() => {
        const pick =
          document.querySelector('.hero-2col .container') ||
          document.querySelector('.course-hero .container') ||
          document.querySelector('header.site .container') ||
          document.querySelector('.container');
        if (!pick) return null;
        const r = pick.getBoundingClientRect();
        const cs = getComputedStyle(pick);
        const padL = parseFloat(cs.paddingLeft) || 0;
        const padR = parseFloat(cs.paddingRight) || 0;
        // First text / content edge inside padding
        const leftInset = r.left + padL;
        const rightInset = window.innerWidth - (r.right - padR);
        // Outer margin of the box itself
        const outerL = r.left;
        const outerR = window.innerWidth - r.right;
        return {
          leftInset: Math.round(leftInset),
          rightInset: Math.round(rightInset),
          outerL: Math.round(outerL),
          outerR: Math.round(outerR),
          padL: Math.round(padL),
          padR: Math.round(padR),
          boxW: Math.round(r.width),
          vw: window.innerWidth,
        };
      });
      rows.push({ w, route, ...m });
    }
  }
  await browser.close();
  return rows;
}

(async () => {
  try {
    require.resolve('puppeteer-core');
  } catch {
    console.log('Installing puppeteer-core…');
    require('child_process').execSync('npm install --no-save puppeteer-core@23', {
      stdio: 'inherit',
      cwd: path.join(__dirname, '..'),
    });
  }
  const rows = await measureWithChrome();
  console.log('width\tpage\tleftInset\trightInset\touterL\touterR\tpadL\tpadR\tboxW');
  for (const r of rows) {
    if (!r) continue;
    console.log(
      [r.w, r.route, r.leftInset, r.rightInset, r.outerL, r.outerR, r.padL, r.padR, r.boxW].join('\t')
    );
  }
  // Flag inconsistency
  const byW = {};
  for (const r of rows) {
    if (!r || r.leftInset == null) continue;
    (byW[r.w] ||= []).push(r);
  }
  console.log('\n--- consistency check (leftInset should match across pages at same width) ---');
  for (const w of Object.keys(byW)) {
    const vals = byW[w].map((x) => x.leftInset);
    const min = Math.min(...vals);
    const max = Math.max(...vals);
    console.log(`vw=${w}: leftInset ${min}–${max}` + (max - min > 2 ? '  ✗ DRIFT' : '  ✓'));
  }
  console.log('\n--- across widths (should stay flat if gutter is fixed) ---');
  const home = rows.filter((r) => r.route === '/');
  for (const r of home) {
    console.log(`vw=${r.w}: left=${r.leftInset} right=${r.rightInset}`);
  }
})().catch((e) => {
  console.error(e);
  process.exit(1);
});
