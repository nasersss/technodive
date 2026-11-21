/* Techno Dive — landing page interactions (vanilla JS, no dependencies) */
(function () {
    'use strict';

    var root = document.documentElement;
    var body = document.body;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    root.classList.add('td-js');
    body.classList.add('td-js');

    /* ---------- Theme toggle ---------- */
    var themeMeta = document.querySelectorAll('meta[name="theme-color"]');
    function applyTheme(theme) {
        root.setAttribute('data-theme', theme);
        themeMeta.forEach(function (m) { m.setAttribute('content', theme === 'dark' ? '#061826' : '#f4f7fa'); });
    }
    document.querySelectorAll('[data-theme-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            applyTheme(next);
            try { localStorage.setItem('td-theme', next); } catch (e) {}
        });
    });

    /* ---------- Sticky header shadow ---------- */
    var header = document.querySelector('[data-header]');
    function onScroll() {
        if (header) header.classList.toggle('is-scrolled', window.scrollY > 8);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    /* ---------- Mobile drawer ---------- */
    var drawer = document.querySelector('[data-drawer]');
    var openBtn = document.querySelector('[data-menu-open]');
    function openMenu() {
        if (!drawer) return;
        drawer.hidden = false;
        body.classList.add('is-locked');
        if (openBtn) openBtn.setAttribute('aria-expanded', 'true');
        var first = drawer.querySelector('.td-drawer__link');
        if (first) first.focus();
    }
    function closeMenu() {
        if (!drawer || drawer.hidden) return;
        drawer.hidden = true;
        body.classList.remove('is-locked');
        if (openBtn) { openBtn.setAttribute('aria-expanded', 'false'); openBtn.focus(); }
    }
    if (openBtn) openBtn.addEventListener('click', openMenu);
    document.querySelectorAll('[data-menu-close]').forEach(function (el) { el.addEventListener('click', closeMenu); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeMenu(); });
    window.addEventListener('resize', function () { if (window.innerWidth >= 1200) closeMenu(); });

    /* ---------- Hero slides (chips) ---------- */
    var hero = document.querySelector('[data-hero]');
    if (hero) {
        var slides = hero.querySelectorAll('[data-hero-slide]');
        var chips = hero.querySelectorAll('[data-hero-chip]');
        var gauge = hero.querySelector('[data-hero-gauge]');
        var current = 0;
        var timer = null;

        var go = function (index) {
            current = (index + slides.length) % slides.length;
            slides.forEach(function (s, i) { s.classList.toggle('is-active', i === current); });
            chips.forEach(function (c, i) {
                c.classList.toggle('is-active', i === current);
                c.setAttribute('aria-selected', i === current ? 'true' : 'false');
            });
            if (gauge) gauge.style.top = (12 + current * (76 / Math.max(1, slides.length - 1))) + '%';
        };
        var start = function () {
            if (reduceMotion || slides.length < 2) return;
            stop();
            timer = window.setInterval(function () { go(current + 1); }, 6000);
        };
        var stop = function () { if (timer) window.clearInterval(timer); timer = null; };

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                go(parseInt(chip.getAttribute('data-hero-chip'), 10));
                start();
            });
        });
        hero.addEventListener('mouseenter', stop);
        hero.addEventListener('mouseleave', start);
        document.addEventListener('visibilitychange', function () { document.hidden ? stop() : start(); });
        go(0);
        start();
    }

    /* ---------- Count-up stats ---------- */
    function countUp(el) {
        var target = parseInt(el.getAttribute('data-count'), 10) || 0;
        if (reduceMotion) { el.textContent = target; return; }
        var duration = 1400;
        var startTime = null;
        el.textContent = '0';
        function step(ts) {
            if (!startTime) startTime = ts;
            var p = Math.min(1, (ts - startTime) / duration);
            el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));
            if (p < 1) window.requestAnimationFrame(step);
        }
        window.requestAnimationFrame(step);
    }

    /* ---------- Reveal on scroll ---------- */
    var revealEls = document.querySelectorAll('[data-reveal]');
    var counters = document.querySelectorAll('[data-count]');
    if ('IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                entry.target.querySelectorAll('[data-count]').forEach(countUp);
                io.unobserve(entry.target);
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
        revealEls.forEach(function (el) { io.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('is-visible'); });
        counters.forEach(function (el) { el.textContent = el.getAttribute('data-count'); });
    }

    /* ---------- Certificates filter ---------- */
    var filters = document.querySelectorAll('[data-cert-filter]');
    var certs = document.querySelectorAll('[data-cert]');
    filters.forEach(function (btn) {
        btn.addEventListener('click', function () {
            var value = btn.getAttribute('data-cert-filter');
            filters.forEach(function (b) {
                var on = b === btn;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            certs.forEach(function (card) {
                var show = value === 'all' || card.getAttribute('data-cert') === value;
                card.hidden = !show;
                if (show) card.classList.add('is-visible');
            });
        });
    });

    /* ---------- Contact form: prevent double submit ---------- */
    document.querySelectorAll('form[data-disable-on-submit]').forEach(function (form) {
        form.addEventListener('submit', function () {
            var btn = form.querySelector('[type="submit"]');
            if (btn) btn.setAttribute('disabled', 'disabled');
        });
    });

    /* ---------- Flash toast ---------- */
    var toast = document.querySelector('[data-toast]');
    if (toast) {
        var hide = function () { toast.remove(); };
        var close = toast.querySelector('[data-toast-close]');
        if (close) close.addEventListener('click', hide);
        window.setTimeout(hide, 6000);
        if (document.querySelector('.td-field__error')) {
            var contact = document.getElementById('contact');
            if (contact) contact.scrollIntoView();
        }
    }
    if (!toast && document.querySelector('.td-field__error')) {
        var c = document.getElementById('contact');
        if (c) c.scrollIntoView();
    }
})();
