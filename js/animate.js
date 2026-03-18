// BK Green Energy — animate.js
// Single shared animation system for ALL pages.
// Handles: scroll reveal, hero stagger, card stagger, navbar scroll.

(function () {
    'use strict';

    // ── Observer settings ──────────────────────────────────
    var IO_OPTS = {
        threshold: 0.08,
        rootMargin: '0px 0px 0px 0px'
    };

    // ── Main scroll-reveal observer ────────────────────────
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                if (el.classList.contains('reveal')) {
                    el.classList.add('active');
                } else {
                    el.classList.add('visible');
                }
                io.unobserve(el);
            }
        });
    }, IO_OPTS);

    function observeAll() {
        document.querySelectorAll(
            '.fade-up, .fade-left, .fade-right, .fade-in, .fade-in-up, .img-reveal, .reveal, .slide-up, .zoom-in'
        ).forEach(function (el) {
            io.observe(el);
        });
    }

    // ── Navbar scroll state ────────────────────────────────
    function initNavbarScroll() {
        var navbar = document.querySelector('.custom-navbar');
        if (!navbar) return;
        function onScroll() {
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 60);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // ── Hero stagger ───────────────────────────────────────
    // Fires on page load — not scroll-based, so always works on mobile.
    // Covers all hero wrapper patterns across all pages.
    function initHeroStagger() {
        var heroContent = document.querySelector(
            '.hero-content-wrapper, .hero-content, .intro-content, .hero-text-block'
        );
        if (!heroContent) return;

        // Search the full hero section scope so logo block + text both animate
        var heroSection = heroContent.closest(
            '.hero, .hero-section, .hero-banner, .hero-intro, .intro-section'
        );
        var scope = heroSection || heroContent;
        var children = scope.querySelectorAll('.fade-in-up, .fade-up, .fade-in');
        children.forEach(function (el, i) {
            setTimeout(function () {
                el.classList.add('visible');
            }, 120 + i * 110);
        });
    }

    // ── Card / grid stagger ────────────────────────────────
    // Auto-adds .fade-up to grid children that have no animation class,
    // ensuring every grid on every page animates consistently.
    function initCardStagger() {
        var GRID_SEL = [
            '.why-grid',
            '.roles-grid',
            '.benefits-grid',
            '.capabilities-grid',
            '.office-grid',
            '.team-grid',
            '.stats-grid',
            '.projects-grid',
            '.projects-gallery-grid',
            '.process-timeline'
        ].join(', ');

        var grids = document.querySelectorAll(GRID_SEL);

        var ANIM_CLASSES = ['fade-up', 'fade-in-up', 'fade-in', 'fade-left', 'fade-right'];

        var gridObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                Array.prototype.forEach.call(entry.target.children, function (card, i) {
                    // Auto-add fade-up if card has no animation class yet
                    var hasClass = ANIM_CLASSES.some(function (c) {
                        return card.classList.contains(c);
                    });
                    if (!hasClass) {
                        card.classList.add('fade-up');
                    }
                    card.style.transitionDelay = (i * 0.08) + 's';
                    // One rAF so the class is painted before visible is added
                    requestAnimationFrame(function () {
                        card.classList.add('visible');
                    });
                });
                gridObserver.unobserve(entry.target);
            });
        }, IO_OPTS);

        grids.forEach(function (g) { gridObserver.observe(g); });

        // Home page service cards (vertical list, not a grid class)
        var serviceCards = document.querySelectorAll('.services-section .service-card');
        if (serviceCards.length) {
            serviceCards.forEach(function (card, i) {
                card.style.transitionDelay = (i * 0.1) + 's';
            });
        }
    }

    // ── Timeline stagger (about page) ─────────────────────
    function initTimelineStagger() {
        var items = document.querySelectorAll('.timeline-item');
        if (!items.length) return;
        var tlObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    setTimeout(function () {
                        entry.target.classList.add('visible');
                    }, i * 100);
                    tlObserver.unobserve(entry.target);
                }
            });
        }, IO_OPTS);
        items.forEach(function (item) { tlObserver.observe(item); });
    }

    // ── Safety fallback ────────────────────────────────────
    // Force-reveal all animated elements after 4s in case observer misses them.
    function initFallback() {
        setTimeout(function () {
            document.querySelectorAll(
                '.fade-up, .fade-left, .fade-right, .fade-in, .fade-in-up, .img-reveal, .slide-up, .zoom-in'
            ).forEach(function (el) {
                if (!el.classList.contains('visible')) el.classList.add('visible');
            });
            document.querySelectorAll('.reveal').forEach(function (el) {
                if (!el.classList.contains('active')) el.classList.add('active');
            });
        }, 4000);
    }

    // ── Smooth scroll for anchor links ────────────────────
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (!target) return;
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        });
    }

    // ── Init ───────────────────────────────────────────────
    function init() {
        observeAll();
        initNavbarScroll();
        initHeroStagger();
        initCardStagger();
        initTimelineStagger();
        initSmoothScroll();
        initFallback();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
