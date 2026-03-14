// Impact Cards Click-to-Reveal Featured Projects
document.addEventListener('DOMContentLoaded', function() {
    const impactCards = document.querySelectorAll('.impact-card');
    const featuredSection = document.getElementById('featuredSection');
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    impactCards.forEach(card => {
        card.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Remove active from all impact cards
            impactCards.forEach(c => c.classList.remove('active'));
            
            // Add active to clicked card
            this.classList.add('active');
            
            // Show featured section with animation
            featuredSection.style.display = 'block';
            setTimeout(() => {
                featuredSection.classList.add('show');
            }, 10);
            
            // Update filter buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                if (btn.getAttribute('data-category') === filter) {
                    btn.classList.add('active');
                }
            });
            
            // Filter projects
            projectCards.forEach(project => {
                const projectCategory = project.getAttribute('data-category');
                if (filter === 'all' || projectCategory === filter) {
                    project.classList.remove('hide');
                } else {
                    project.classList.add('hide');
                }
            });
            
            // Smooth scroll to featured section
            setTimeout(() => {
                featuredSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        });
    });

    // Filter button clicks (when featured section is already visible)
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Remove active from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active to clicked button
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
        });
    });
});
