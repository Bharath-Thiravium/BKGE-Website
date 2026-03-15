/**
 * Statistics Counter Animation
 * Smooth count-up animation for stat numbers
 * Triggers when stats section enters viewport
 */

document.addEventListener('DOMContentLoaded', function() {
    // Check if Intersection Observer is supported
    if (!('IntersectionObserver' in window)) {
        // Fallback: display final values immediately
        document.querySelectorAll('.stat-number[data-target]').forEach(element => {
            const target = element.getAttribute('data-target');
            element.textContent = target + '+';
        });
        return;
    }

    // Track if animation has already run
    let animationTriggered = false;

    // Intersection Observer options
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.3
    };

    // Create observer
    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            // Only animate once when section enters viewport
            if (entry.isIntersecting && !animationTriggered) {
                animationTriggered = true;
                animateStatNumbers();
                // Stop observing after animation triggers
                statsObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Get stats section
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }

    /**
     * Animate all stat numbers
     */
    function animateStatNumbers() {
        const statNumbers = document.querySelectorAll('.stat-number[data-target]');
        
        statNumbers.forEach((element, index) => {
            const target = parseInt(element.getAttribute('data-target'), 10);
            const duration = 1800; // Animation duration in milliseconds
            const delay = index * 100; // Stagger animation by 100ms per card
            
            // Apply delay
            setTimeout(() => {
                animateNumber(element, target, duration);
            }, delay);
        });
    }

    /**
     * Animate a single number from 0 to target
     * @param {HTMLElement} element - The element to animate
     * @param {number} target - Target number value
     * @param {number} duration - Animation duration in milliseconds
     */
    function animateNumber(element, target, duration) {
        const startTime = performance.now();
        const startValue = 0;

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function for smooth animation (ease-out)
            const easeProgress = 1 - Math.pow(1 - progress, 3);
            
            // Calculate current value
            const currentValue = Math.floor(startValue + (target - startValue) * easeProgress);
            
            // Update element text with current value and + symbol
            element.textContent = currentValue + '+';
            
            // Continue animation if not complete
            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                // Ensure final value is displayed
                element.textContent = target + '+';
            }
        }

        requestAnimationFrame(update);
    }
});
