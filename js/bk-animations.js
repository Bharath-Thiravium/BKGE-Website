// BK Green Energy — Premium Animation System (Solartec-style)
(function () {
    'use strict';

    // ── 1. Navbar + hero: add .show on window load ─────────
    window.addEventListener('load', function () {
        // navbar slides down
        var nav = document.querySelector('.custom-navbar, .solartec-nav');
        if (nav) nav.classList.add('show');

        // hero elements: add .show with stagger via delay classes
        document.querySelectorAll('.hero-copy .fade-up, .bk-hero-card.fade-up').forEach(function (el) {
            el.classList.add('show');
        });
    });

    // ── 2. Scroll reveal: add .visible to .fade-up on scroll ─
    function initScrollReveal() {
        var heroCopy = document.querySelector('.hero-copy');
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.classList.contains('reveal')
                    ? e.target.classList.add('active')
                    : e.target.classList.add('visible');
                io.unobserve(e.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.fade-up, .fade-left, .fade-right, .fade-in, .fade-in-up, .img-reveal, .reveal, .slide-up, .zoom-in').forEach(function (el) {
            // skip hero elements — they use .show on load
            if (heroCopy && heroCopy.contains(el)) return;
            if (el.classList.contains('bk-hero-card')) return;
            io.observe(el);
        });
    }

    // ── 3. Navbar sticky on scroll ─────────────────────────
    function initNavbarSticky() {
        var nav = document.querySelector('.custom-navbar');
        if (!nav) return;
        window.addEventListener('scroll', function () {
            nav.classList.toggle('navbar-scrolled', window.scrollY > 60);
        }, { passive: true });
    }

    // ── 4. Counter animation ───────────────────────────────
    function initCounters() {
        var sel = '[data-count],[data-target],.stat-num,.proj-stat-num,.svc-stat-num,.team-count-num';
        var els = document.querySelectorAll(sel);
        if (!els.length) return;

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                var el = e.target;
                var raw = el.getAttribute('data-count') || el.getAttribute('data-target') || '0';
                var target = parseInt(raw, 10) || 0;
                // preserve suffix: +, %, MW+ etc.
                var suffix = el.textContent.trim().replace(/^[0-9]+/, '');
                var n = 0, inc = Math.max(1, Math.ceil(target / 60));
                var timer = setInterval(function () {
                    n = Math.min(n + inc, target);
                    el.textContent = n + suffix;
                    if (n >= target) clearInterval(timer);
                }, 27);
                io.unobserve(el);
            });
        }, { threshold: 0.4 });

        els.forEach(function (el) { io.observe(el); });
    }

    // ── 5. Home project filter ─────────────────────────────
    function initHomeFilter() {
        var pills = document.querySelectorAll('.filter-pill[data-filter]');
        var cards = document.querySelectorAll('#homeProjectsGrid .project-card-home');
        if (!pills.length || !cards.length) return;

        pills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                pills.forEach(function (p) { p.classList.remove('active'); });
                pill.classList.add('active');
                var filter = pill.getAttribute('data-filter');

                cards.forEach(function (card) {
                    var show = filter === 'all' || card.getAttribute('data-category') === filter;
                    if (!show) {
                        card.classList.add('card-hiding');
                        setTimeout(function () {
                            card.classList.add('hidden');
                            card.classList.remove('card-hiding');
                        }, 300);
                    } else {
                        card.classList.remove('hidden', 'card-hiding');
                        requestAnimationFrame(function () {
                            card.classList.add('card-showing');
                            setTimeout(function () { card.classList.remove('card-showing'); }, 420);
                        });
                    }
                });
            });
        });
    }

    // ── 6. Footer reveal ───────────────────────────────────
    function initFooterReveal() {
        var cols = document.querySelectorAll('.footer .footer-col');
        if (!cols.length) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('bk-visible'); io.unobserve(e.target); }
            });
        }, { threshold: 0.12 });
        cols.forEach(function (c) { io.observe(c); });
    }

    // ── 7. Checklist stagger ───────────────────────────────
    function initListStagger() {
        var lists = document.querySelectorAll('.about-checklist,.culture-list,.apply-perks,.why-list,.feature-list,.why-points');
        if (!lists.length) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                e.target.querySelectorAll('li,.why-point').forEach(function (item, i) {
                    item.style.cssText = 'opacity:0;transform:translateY(14px);transition:opacity .45s ease,transform .45s ease;transition-delay:' + (i * 0.1) + 's';
                    requestAnimationFrame(function () {
                        requestAnimationFrame(function () {
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        });
                    });
                });
                io.unobserve(e.target);
            });
        }, { threshold: 0.2 });
        lists.forEach(function (l) { io.observe(l); });
    }

    // ── 8. Grid stagger ────────────────────────────────────
    function initGridStagger() {
        var grids = document.querySelectorAll('.svc-grid,.features-grid,.jobs-grid,.proj-grid,.cap-grid,.team-grid,.stats-grid,.svc-stats-grid,.proj-stats-grid');
        if (!grids.length) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;
                Array.prototype.forEach.call(e.target.children, function (card, i) {
                    card.style.transitionDelay = (i * 0.1) + 's';
                    requestAnimationFrame(function () { card.classList.add('visible'); });
                });
                io.unobserve(e.target);
            });
        }, { threshold: 0.08 });
        grids.forEach(function (g) { io.observe(g); });
    }

    // ── 9. Dashboard tab animation reset ──────────────────
    function initDashAnim() {
        document.addEventListener('click', function (e) {
            var tab = e.target.closest('.dash-tab');
            if (!tab) return;
            var layout = tab.closest('.dash-layout');
            if (!layout) return;
            layout.querySelectorAll('.dash-panel').forEach(function (p) {
                p.style.animation = 'none';
                void p.offsetHeight;
                p.style.animation = '';
            });
        });
    }

    // ── 10. Smooth scroll ──────────────────────────────────
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                var t = document.querySelector(this.getAttribute('href'));
                if (!t) return;
                e.preventDefault();
                t.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    }

    // ── 11. Fallback: reveal all after 4s ─────────────────
    function initFallback() {
        setTimeout(function () {
            document.querySelectorAll('.fade-up:not(.show):not(.visible)').forEach(function (el) {
                el.classList.add('visible');
            });
            document.querySelectorAll('.reveal:not(.active)').forEach(function (el) {
                el.classList.add('active');
            });
            document.querySelectorAll('.footer .footer-col:not(.bk-visible)').forEach(function (c) {
                c.classList.add('bk-visible');
            });
        }, 4000);
    }

    // ── Init ───────────────────────────────────────────────
    function init() {
        if ('IntersectionObserver' in window) {
            initScrollReveal();
            initCounters();
            initFooterReveal();
            initListStagger();
            initGridStagger();
        }
        initNavbarSticky();
        initHomeFilter();
        initDashAnim();
        initSmoothScroll();
        initFallback();
    }

    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', init)
        : init();

})();
