/* ================================================================
   BK GREEN ENERGY — bkn-navbar.js
   Entrance · Scroll · Hamburger · Search · Quick Links
   ================================================================ */
(function () {
    'use strict';

    var nav              = document.getElementById('bknNav');
    var topbar           = document.querySelector('.bkn-topbar');
    var hamburger        = document.getElementById('bknHamburger');
    var drawer           = document.getElementById('bknDrawer');
    var searchBtn        = document.getElementById('bknSearchBtn');
    var searchOverlay    = document.getElementById('bknSearchOverlay');
    var searchClose      = document.getElementById('bknSearchClose');
    var searchInput      = document.getElementById('bknSearchInput');
    var gridBtn          = document.getElementById('bknGridBtn');
    var qlOverlay        = document.getElementById('bknQuicklinksOverlay');
    var qlPanel          = document.getElementById('bknQuicklinksPanel');
    var qlClose          = document.getElementById('bknQuicklinksClose');

    if (!nav) return;

    var TOPBAR_H = topbar ? topbar.offsetHeight : 0;

    /* ── 1. ENTRANCE ─────────────────────────────────────────── */
    nav.querySelectorAll('.bkn-menu li').forEach(function (li, i) {
        li.style.setProperty('--i', i);
    });

    function triggerEntrance() {
        requestAnimationFrame(function () { nav.classList.add('bkn-ready'); });
    }

    var pollCount = 0;
    function waitForLoaded() {
        if (document.body.classList.contains('loaded') || pollCount > 12) {
            triggerEntrance();
        } else {
            pollCount++;
            setTimeout(waitForLoaded, 50);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', waitForLoaded);
    } else {
        waitForLoaded();
    }

    /* ── 2. SCROLL GLASS + TOPBAR HIDE ──────────────────────── */
    if (topbar) {
        topbar.style.transition = 'transform 0.32s cubic-bezier(0.4, 0, 0.2, 1)';
    }

    var lastY = 0, ticking = false;

    function onScroll() {
        lastY = window.scrollY || window.pageYOffset;
        if (!ticking) { requestAnimationFrame(updateNav); ticking = true; }
    }

    function updateNav() {
        if (topbar && document.body.classList.contains('bkn-has-topbar')) {
            if (lastY > TOPBAR_H) {
                topbar.style.transform = 'translateY(-100%)';
                nav.classList.add('topbar-hidden');
            } else {
                topbar.style.transform = '';
                nav.classList.remove('topbar-hidden');
            }
        }
        nav.classList.toggle('scrolled', lastY > 60);
        ticking = false;
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    updateNav();

    /* ── 3. HAMBURGER ────────────────────────────────────────── */
    if (hamburger && drawer) {
        hamburger.addEventListener('click', function () {
            var isOpen = hamburger.classList.toggle('open');
            hamburger.setAttribute('aria-expanded', String(isOpen));

            if (isOpen) {
                drawer.classList.add('open');
                drawer.querySelectorAll('a').forEach(function (a, i) {
                    a.style.opacity   = '0';
                    a.style.transform = 'translateX(-14px)';
                    a.style.transition =
                        'opacity 0.28s ease ' + (i * 48 + 60) + 'ms,' +
                        'transform 0.3s cubic-bezier(0.22,1,0.36,1) ' + (i * 48 + 60) + 'ms,' +
                        'background 0.22s ease,color 0.22s ease,box-shadow 0.22s ease';
                    requestAnimationFrame(function () {
                        a.style.opacity   = '1';
                        a.style.transform = 'translateX(0)';
                    });
                });
            } else {
                drawer.classList.remove('open');
            }
        });

        drawer.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                hamburger.classList.remove('open');
                drawer.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
            });
        });
    }

    /* ── 4. SEARCH OVERLAY ───────────────────────────────────── */
    var searchIsOpen = false;

    function openSearch() {
        if (searchIsOpen || !searchOverlay) return;
        closeQuicklinks();          /* close panel if open */
        searchIsOpen = true;
        searchOverlay.classList.add('open');
        searchOverlay.removeAttribute('aria-hidden');
        document.body.classList.add('bkn-panel-open');
        if (searchBtn) searchBtn.classList.add('bkn-btn-active');
        setTimeout(function () { if (searchInput) searchInput.focus(); }, 80);
    }

    function closeSearch() {
        if (!searchIsOpen || !searchOverlay) return;
        searchIsOpen = false;
        searchOverlay.classList.remove('open');
        searchOverlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('bkn-panel-open');
        if (searchBtn) searchBtn.classList.remove('bkn-btn-active');
        if (searchInput) searchInput.value = '';
    }

    if (searchBtn)    searchBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        searchIsOpen ? closeSearch() : openSearch();
    });
    if (searchClose)  searchClose.addEventListener('click', closeSearch);
    if (searchOverlay) {
        searchOverlay.addEventListener('click', function (e) {
            if (e.target === searchOverlay) closeSearch();
        });
    }

    /* ── 5. QUICK LINKS PANEL ────────────────────────────────── */
    var qlIsOpen = false;

    function openQuicklinks() {
        if (qlIsOpen || !qlPanel) return;
        closeSearch();              /* close search if open */
        qlIsOpen = true;

        /* assign stagger index to each tile */
        if (qlPanel) {
            qlPanel.querySelectorAll('.bkn-ql-item').forEach(function (item, i) {
                item.style.setProperty('--qi', i);
            });
        }

        if (qlOverlay) qlOverlay.classList.add('open');
        qlPanel.classList.add('open');
        qlPanel.removeAttribute('aria-hidden');
        document.body.classList.add('bkn-panel-open');
        if (gridBtn) gridBtn.classList.add('bkn-btn-active');
    }

    function closeQuicklinks() {
        if (!qlIsOpen || !qlPanel) return;
        qlIsOpen = false;
        if (qlOverlay) qlOverlay.classList.remove('open');
        qlPanel.classList.remove('open');
        qlPanel.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('bkn-panel-open');
        if (gridBtn) gridBtn.classList.remove('bkn-btn-active');
    }

    if (gridBtn) gridBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        qlIsOpen ? closeQuicklinks() : openQuicklinks();
    });
    if (qlClose)   qlClose.addEventListener('click', closeQuicklinks);
    if (qlOverlay) qlOverlay.addEventListener('click', closeQuicklinks);

    /* ── 6. GLOBAL CLOSE — outside click + ESC ──────────────── */
    document.addEventListener('click', function (e) {
        /* close hamburger drawer */
        if (hamburger && drawer && !nav.contains(e.target)) {
            hamburger.classList.remove('open');
            drawer.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        closeSearch();
        closeQuicklinks();
        if (hamburger && drawer) {
            hamburger.classList.remove('open');
            drawer.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
        }
    });

    /* ── 7. NAV LINK CLICK RIPPLE ────────────────────────────── */
    nav.querySelectorAll('.bkn-menu li a').forEach(function (a) {
        a.addEventListener('click', function () {
            a.style.transition = 'transform 0.14s ease';
            a.style.transform  = 'scale(0.93)';
            setTimeout(function () {
                a.style.transform  = '';
                a.style.transition = '';
            }, 140);
        });
    });

    /* ── 8. HERO LOGO BADGE float+glow ──────────────────────── */
    var badge = document.querySelector('.hero-logo-badge');
    if (badge) {
        setTimeout(function () { badge.classList.add('badge-loaded'); }, 1400);
    }

}());
