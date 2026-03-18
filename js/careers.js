// BK Green Energy — careers.js
// Observer + navbar scroll handled by animate.js

document.addEventListener('DOMContentLoaded', function () {
    // Stagger transition delays on cards
    document.querySelectorAll('.why-card').forEach(function (card, i) {
        card.style.transitionDelay = (i * 0.08) + 's';
    });
    document.querySelectorAll('.role-card').forEach(function (card, i) {
        card.style.transitionDelay = (i * 0.08) + 's';
    });

    // Scroll indicator click
    var scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function () {
            var target = document.querySelector('.why-section');
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    }

    // Parallax bg-decoration (desktop only)
    if (window.innerWidth > 767) {
        var bgDecoration = document.querySelector('.bg-decoration');
        if (bgDecoration) {
            window.addEventListener('scroll', function () {
                bgDecoration.style.transform = 'translateY(' + (window.pageYOffset * 0.3) + 'px)';
            }, { passive: true });
        }
    }
});
