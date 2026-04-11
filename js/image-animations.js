// BK Green Energy — image-animations.js
// Scroll-reveal for all image containers using Intersection Observer.
// Adds .img-in to containers; CSS handles the actual transition.

(function () {
    'use strict';

    // Selectors for every image container on the site
    var CONTAINER_SEL = [
        '.service-thumb',
        '.about-image-wrap',
        '.why-visual',
        '.project-card-home'
    ].join(', ');

    function init() {
        var containers = document.querySelectorAll(CONTAINER_SEL);
        if (!containers.length) return;

        // No IntersectionObserver support — reveal everything immediately
        if (!('IntersectionObserver' in window)) {
            containers.forEach(function (el) { el.classList.add('img-in'); });
            return;
        }

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('img-in');
                io.unobserve(entry.target);
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });

        containers.forEach(function (el) { io.observe(el); });

        // Safety fallback: reveal anything still hidden after 4 s
        setTimeout(function () {
            document.querySelectorAll(CONTAINER_SEL).forEach(function (el) {
                if (!el.classList.contains('img-in')) el.classList.add('img-in');
            });
        }, 4000);
    }

    // Globe tap interaction (kept from original)
    function initGlobeTap() {
        var globe = document.getElementById('globe-img');
        if (!globe) return;
        var pop = function () {
            globe.classList.remove('globe-tap');
            void globe.offsetWidth;
            globe.classList.add('globe-tap');
        };
        globe.addEventListener('mousedown',  pop, { passive: true });
        globe.addEventListener('touchstart', pop, { passive: true });
        globe.addEventListener('animationend', function () {
            globe.classList.remove('globe-tap');
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () { init(); initGlobeTap(); });
    } else {
        init();
        initGlobeTap();
    }
})();
