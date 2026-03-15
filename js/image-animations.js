/**
 * Image Animation System
 * Smooth scroll reveal animations for all project images
 * Uses Intersection Observer for performance
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check if Intersection Observer is supported
    if (!('IntersectionObserver' in window)) {
        // Fallback: add visible class to all images immediately
        document.querySelectorAll('img').forEach(img => {
            img.classList.add('visible');
        });
        return;
    }

    // Intersection Observer options
    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -50px 0px',
        threshold: 0.1
    };

    // Create observer
    const imageObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add visible class when image enters viewport
                entry.target.classList.add('visible');
                
                // Optional: Stop observing after image is visible
                imageObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all images with animation classes
    const animatedImages = document.querySelectorAll(
        '.image-reveal, ' +
        '.about-image img, ' +
        '.about-image svg, ' +
        '.service-image img, ' +
        '.gallery-image img, ' +
        '.card-image img, ' +
        '.project-image img'
    );

    animatedImages.forEach(img => {
        imageObserver.observe(img);
    });

    // Also observe parent containers for better control
    const imageContainers = document.querySelectorAll(
        '.about-image, ' +
        '.service-image, ' +
        '.gallery-image, ' +
        '.card-image, ' +
        '.project-image'
    );

    imageContainers.forEach(container => {
        imageObserver.observe(container);
    });
});
