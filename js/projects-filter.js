// Featured Projects Filter System
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card');
    const projectsList = document.getElementById('projectsList');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter projects
            projectCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                
                if (category === 'all' || cardCategory === category) {
                    card.classList.remove('hide');
                } else {
                    card.classList.add('hide');
                }
            });
            
            // Smooth scroll to projects list
            projectsList.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
});

// Service Showcase Tabs (existing functionality)
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-item');
    const panels = document.querySelectorAll('.content-panel');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const service = this.getAttribute('data-service');
            
            tabs.forEach(t => t.classList.remove('active'));
            panels.forEach(p => p.classList.remove('active'));
            
            this.classList.add('active');
            document.querySelector(`[data-content="${service}"]`).classList.add('active');
        });
    });
});

// Fade-up animation on scroll
const fadeElements = document.querySelectorAll('.fade-up, .fade-left, .fade-right, .fade-in-up');

const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });

fadeElements.forEach(el => fadeObserver.observe(el));
