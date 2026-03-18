// BK Green Energy — script.js (Home page)
// Observer + navbar scroll handled by animate.js

document.addEventListener('DOMContentLoaded', function () {
    // Hero image slider
    var slides = document.querySelectorAll('.hero-slider .slide');
    var index = 0;

    function changeSlide() {
        if (!slides.length) return;
        slides[index].classList.remove('active');
        index = (index + 1) % slides.length;
        slides[index].classList.add('active');
    }

    if (slides.length > 0) {
        setInterval(changeSlide, 4000);
    }
});
