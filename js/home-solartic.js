(function () {
    'use strict';

    function initHeroSlider() {
        var slides = document.querySelectorAll('.hero-slide');
        if (!slides.length) return;
        var current = 0;
        setInterval(function () {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 4500);
    }

    function initCounterAnimation() {
        var counters = document.querySelectorAll('[data-count]');
        if (!counters.length || !('IntersectionObserver' in window)) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el = entry.target;
                var target = parseInt(el.getAttribute('data-count'), 10) || 0;
                var suffix = el.textContent.replace(/[0-9]/g, '').trim() || '';
                var current = 0;
                var duration = 1400;
                var step = Math.max(1, Math.ceil(target / (duration / 16)));

                var timer = setInterval(function () {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    el.textContent = current + suffix;
                }, 16);

                observer.unobserve(el);
            });
        }, { threshold: 0.4 });

        counters.forEach(function (counter) { observer.observe(counter); });
    }

    function initFakeFilterPills() {
        var pills = document.querySelectorAll('.filter-pill');
        var cards = document.querySelectorAll('#homeProjectsGrid .project-card-home');
        if (!pills.length) return;

        pills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                // update active pill
                pills.forEach(function (p) { p.classList.remove('active'); });
                pill.classList.add('active');

                var filter = pill.getAttribute('data-filter');

                cards.forEach(function (card) {
                    var cat = card.getAttribute('data-category');
                    var show = filter === 'all' || cat === filter;
                    if (show) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        initHeroSlider();
        initCounterAnimation();
        initFakeFilterPills();
    });
})();
