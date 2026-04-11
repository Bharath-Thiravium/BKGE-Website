// BK Green Energy — projects.js
(function () {
    'use strict';

    // ── Project image data ─────────────────────────────────
    var PROJECT_DATA = {
        hinduja:     { title: 'Hinduja Solar Power Project (75 MW)', loc: 'Veppankulam & Devakottai, Tamil Nadu', imgs: ['assets/images/projects/hinduja/1.jpg','assets/images/projects/hinduja/2.jpg','assets/images/projects/hinduja/3.jpg','assets/images/projects/hinduja/4.jpg','assets/images/projects/hinduja/5.jpg'] },
        itc:         { title: 'ITC Solar Power Project (25 MW)', loc: 'Eluvanampatti & Vadhalakundu, Tamil Nadu', imgs: ['assets/images/projects/itc/6.jpg','assets/images/projects/itc/7.jpg','assets/images/projects/itc/8.jpg','assets/images/projects/itc/9.jpg','assets/images/projects/itc/10.jpg'] },
        thiagarajar: { title: 'Thiagarajar Mills Solar (10 MW)', loc: 'Ottapidaram, Thoothukudi, Tamil Nadu', imgs: ['assets/images/projects/thiagarajar/11.jpg','assets/images/projects/thiagarajar/12.jpg','assets/images/projects/thiagarajar/13.jpg','assets/images/projects/thiagarajar/14.jpg','assets/images/projects/thiagarajar/15.jpg'] },
        capacity:    { title: 'Capacity Solar Project (10 MW)', loc: 'Aviyur, Madurai, Tamil Nadu', imgs: ['assets/images/projects/capacity/16.jpg','assets/images/projects/capacity/17.jpg','assets/images/projects/capacity/18.jpg','assets/images/projects/capacity/19.jpg','assets/images/projects/capacity/20.jpg'] },
        mtk:         { title: 'Shree MTK / Stareco / Pantech (10 MW)', loc: 'Aviyur, Madurai, Tamil Nadu', imgs: ['assets/images/projects/mtk/21.jpg','assets/images/projects/mtk/22.jpg','assets/images/projects/mtk/23.jpg','assets/images/projects/mtk/24.jpg','assets/images/projects/mtk/25.jpg'] },
        torrent14:   { title: 'Torrent Urja 14 (15 MW)', loc: 'Ottapidaram, Thoothukudi, Tamil Nadu', imgs: ['assets/images/projects/torrent14/26.jpg','assets/images/projects/torrent14/27.jpg','assets/images/projects/torrent14/28.jpg','assets/images/projects/torrent14/29.jpg','assets/images/projects/torrent14/30.jpg'] },
        torrent17:   { title: 'Torrent Urja 17 (8.5 MW)', loc: 'Ottapidaram, Thoothukudi, Tamil Nadu', imgs: ['assets/images/projects/torrent17/31.jpg','assets/images/projects/torrent17/32.jpg','assets/images/projects/torrent17/33.jpg','assets/images/projects/torrent17/34.jpg','assets/images/projects/torrent17/35.jpg'] },
        ghcl1:       { title: 'GHCL Phase 1', loc: 'Musiri, Tiruchirappalli, Tamil Nadu', imgs: ['assets/images/projects/ghcl1/36.jpg','assets/images/projects/ghcl1/37.jpg','assets/images/projects/ghcl1/38.jpg','assets/images/projects/ghcl1/39.jpg','assets/images/projects/ghcl1/40.jpg'] },
        ghcl2:       { title: 'GHCL Phase 2', loc: 'Ottapidaram, Thoothukudi, Tamil Nadu', imgs: ['assets/images/projects/ghcl2/41.jpg','assets/images/projects/ghcl2/42.jpg','assets/images/projects/ghcl2/43.jpg','assets/images/projects/ghcl2/44.jpg','assets/images/projects/ghcl2/45.jpg'] },
        renew:       { title: 'ReNew Power Solar Project', loc: 'Manwath, Maharashtra', imgs: ['assets/images/projects/renew/46.jpg','assets/images/projects/renew/47.jpg','assets/images/projects/renew/48.jpg','assets/images/projects/renew/49.jpg','assets/images/projects/renew/50.jpg'] },
        bial:        { title: 'Bangalore International Airport (BIAL)', loc: 'Bangalore, Karnataka', imgs: ['assets/images/projects/bial/51.jpg','assets/images/projects/bial/52.jpg','assets/images/projects/bial/53.jpg','assets/images/projects/bial/54.jpg','assets/images/projects/bial/55.jpg'] }
    };

    var currentImgs = [];
    var currentIdx  = 0;

    // ── Filter ─────────────────────────────────────────────
    function initFilter() {
        var btns  = document.querySelectorAll('.proj-filter-btn');
        var cards = document.querySelectorAll('.proj-card');
        if (!btns.length) return;

        btns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                btns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var filter = btn.getAttribute('data-filter');
                cards.forEach(function (card) {
                    var cat = card.getAttribute('data-cat');
                    if (filter === 'all' || cat === filter) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

    // ── Lightbox ───────────────────────────────────────────
    function openLightbox(key) {
        var data = PROJECT_DATA[key];
        if (!data) return;
        currentImgs = data.imgs;
        currentIdx  = 0;

        document.getElementById('lightboxTitle').textContent    = data.title;
        document.getElementById('lightboxLocation').textContent = data.loc;
        renderLightboxImg();
        renderThumbs();
        document.getElementById('projLightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('projLightbox').classList.remove('open');
        document.body.style.overflow = '';
    }

    function renderLightboxImg() {
        var img = document.getElementById('lightboxImg');
        img.style.opacity = '0';
        img.src = currentImgs[currentIdx];
        img.onload = function () { img.style.opacity = '1'; };
        // update thumb active state
        var thumbs = document.querySelectorAll('.lightbox-thumbs img');
        thumbs.forEach(function (t, i) {
            t.classList.toggle('active', i === currentIdx);
        });
    }

    function renderThumbs() {
        var wrap = document.getElementById('lightboxThumbs');
        wrap.innerHTML = '';
        currentImgs.forEach(function (src, i) {
            var img = document.createElement('img');
            img.src = src;
            img.alt = 'Thumbnail ' + (i + 1);
            if (i === 0) img.classList.add('active');
            img.addEventListener('click', function () {
                currentIdx = i;
                renderLightboxImg();
            });
            wrap.appendChild(img);
        });
    }

    function initLightbox() {
        // open via view buttons
        document.addEventListener('click', function (e) {
            var btn = e.target.closest('.proj-view-btn');
            if (btn) { e.preventDefault(); openLightbox(btn.getAttribute('data-project')); }
        });

        document.getElementById('lightboxClose').addEventListener('click', closeLightbox);
        document.getElementById('lightboxBackdrop').addEventListener('click', closeLightbox);

        document.getElementById('lightboxPrev').addEventListener('click', function () {
            currentIdx = (currentIdx - 1 + currentImgs.length) % currentImgs.length;
            renderLightboxImg();
        });
        document.getElementById('lightboxNext').addEventListener('click', function () {
            currentIdx = (currentIdx + 1) % currentImgs.length;
            renderLightboxImg();
        });

        // keyboard nav
        document.addEventListener('keydown', function (e) {
            var lb = document.getElementById('projLightbox');
            if (!lb.classList.contains('open')) return;
            if (e.key === 'Escape')      closeLightbox();
            if (e.key === 'ArrowLeft')  { currentIdx = (currentIdx - 1 + currentImgs.length) % currentImgs.length; renderLightboxImg(); }
            if (e.key === 'ArrowRight') { currentIdx = (currentIdx + 1) % currentImgs.length; renderLightboxImg(); }
        });
    }

    // ── Stat counters ──────────────────────────────────────
    function initCounters() {
        var els = document.querySelectorAll('.proj-stat-num');
        if (!els.length || !('IntersectionObserver' in window)) return;
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var target = parseInt(el.getAttribute('data-target'), 10) || 0;
                var start = 0;
                var step = Math.max(1, Math.ceil(target / (1600 / 16)));
                var timer = setInterval(function () {
                    start += step;
                    if (start >= target) { start = target; clearInterval(timer); }
                    el.textContent = start;
                }, 16);
                io.unobserve(el);
            });
        }, { threshold: 0.4 });
        els.forEach(function (el) { io.observe(el); });
    }

    // ── Init ───────────────────────────────────────────────
    function init() {
        initFilter();
        initLightbox();
        initCounters();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

// ── Dashboard sidebar tab switching ───────────────────────
function initDashboard() {
    var tabs = document.querySelectorAll('.dash-tab');
    if (!tabs.length) return;

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var key = tab.getAttribute('data-dash');

            // update tabs
            tabs.forEach(function (t) { t.classList.remove('active'); });
            tab.classList.add('active');

            // update panels
            document.querySelectorAll('.dash-panel').forEach(function (p) { p.classList.remove('active'); });
            var panel = document.querySelector('.dash-panel[data-panel="' + key + '"]');
            if (panel) panel.classList.add('active');
        });
    });

    // gallery buttons inside dashboard panels reuse existing lightbox
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.dash-gallery-btn');
        if (btn) { e.preventDefault(); openLightbox(btn.getAttribute('data-project')); }
    });
}

document.addEventListener('DOMContentLoaded', function () { initDashboard(); });
