// BK Green Energy — services.js
(function () {
    'use strict';

    // Staggered animation for service cards
    function initCardStagger() {
        var grid = document.querySelector('.svc-grid');
        if (!grid || !('IntersectionObserver' in window)) return;

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                Array.prototype.forEach.call(entry.target.children, function (card, i) {
                    setTimeout(function () {
                        card.classList.add('visible');
                    }, i * 120);
                });
                io.unobserve(entry.target);
            });
        }, { threshold: 0.08 });

        io.observe(grid);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCardStagger);
    } else {
        initCardStagger();
    }
})();

// Stat counters
(function () {
    var els = document.querySelectorAll('.svc-stat-num');
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
})();

// Service dashboard tab switching
(function () {
    function initServiceDash() {
        var tabs = document.querySelectorAll('.proj-dashboard .dash-tab');
        if (!tabs.length) return;
        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var key = tab.getAttribute('data-dash');
                tabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                document.querySelectorAll('.proj-dashboard .dash-panel').forEach(function (p) { p.classList.remove('active'); });
                var panel = document.querySelector('.proj-dashboard .dash-panel[data-panel="' + key + '"]');
                if (panel) panel.classList.add('active');
            });
        });
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initServiceDash);
    } else {
        initServiceDash();
    }
})();
