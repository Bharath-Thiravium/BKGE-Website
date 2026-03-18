// BK Green Energy — about.js
// Observer + navbar scroll handled by animate.js

document.addEventListener('DOMContentLoaded', function () {
    // Timeline stagger
    var timelineItems = document.querySelectorAll('.timeline-item');
    if (timelineItems.length) {
        var tlObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    setTimeout(function () {
                        entry.target.classList.add('visible');
                    }, i * 100);
                    tlObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });
        timelineItems.forEach(function (item) { tlObserver.observe(item); });
    }

    // Parallax bg-decoration (desktop only — skip on mobile for performance)
    if (window.innerWidth > 767) {
        var bgDecoration = document.querySelector('.bg-decoration');
        if (bgDecoration) {
            window.addEventListener('scroll', function () {
                bgDecoration.style.transform = 'translateY(' + (window.pageYOffset * 0.3) + 'px)';
            }, { passive: true });
        }
    }
});
