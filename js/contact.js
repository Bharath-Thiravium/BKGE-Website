// BK Green Energy — contact.js
// Observer + navbar scroll handled by animate.js

document.addEventListener('DOMContentLoaded', function () {
    // Floating label: ensure placeholder is a space so CSS :placeholder-shown works
    document.querySelectorAll('.form-group input, .form-group textarea').forEach(function (input) {
        if (!input.getAttribute('placeholder')) {
            input.setAttribute('placeholder', ' ');
        }
    });

    // Scroll indicator click
    var scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function () {
            var target = document.querySelector('.contact-form-section');
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        });
    }

    // Shape parallax (desktop only)
    if (window.innerWidth > 767) {
        var shapes = document.querySelectorAll('.shape');
        if (shapes.length) {
            window.addEventListener('scroll', function () {
                var scrolled = window.pageYOffset;
                shapes.forEach(function (shape, i) {
                    shape.style.transform = 'translateY(' + (scrolled * (0.3 + i * 0.1)) + 'px)';
                });
            }, { passive: true });
        }
    }
});
