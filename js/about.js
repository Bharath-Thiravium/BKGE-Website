// BK Green Energy — about.js
(function () {
    'use strict';

    function animateCounter(el, target, duration) {
        var start = 0;
        var step = Math.max(1, Math.ceil(target / (duration / 16)));
        var timer = setInterval(function () {
            start += step;
            if (start >= target) { start = target; clearInterval(timer); }
            el.textContent = start;
        }, 16);
    }

    function initCounters() {
        var els = document.querySelectorAll('.stat-num, .team-count-num');
        if (!els.length || !('IntersectionObserver' in window)) return;

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var target = parseInt(el.getAttribute('data-target'), 10) || 0;
                animateCounter(el, target, 1600);
                io.unobserve(el);
            });
        }, { threshold: 0.4 });

        els.forEach(function (el) { io.observe(el); });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCounters);
    } else {
        initCounters();
    }
})();
