// BK GREEN ENERGY - PROJECTS GALLERY FUNCTIONALITY

document.addEventListener('DOMContentLoaded', function() {
    
    // STAT CARD FILTERING
    const statCards = document.querySelectorAll('.stat-card');
    const gallerySection = document.querySelector('.completed-projects-section');
    const projectCards = document.querySelectorAll('.project-gallery-card');
    
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            const filter = this.dataset.filter;
            
            // Show gallery section
            if (gallerySection) {
                gallerySection.style.display = 'block';
                setTimeout(() => {
                    gallerySection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
            
            // Filter project cards
            projectCards.forEach(card => {
                const category = card.dataset.cat;
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Active state
            statCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // THUMBNAIL SWITCHING
    projectCards.forEach(card => {
        const mainImg = card.querySelector('.main-img');
        const thumbnails = card.querySelectorAll('.thumbnail');
        
        thumbnails.forEach((thumb, index) => {
            // Add active class to first thumbnail
            if (index === 0) {
                thumb.classList.add('active');
            }
            
            thumb.addEventListener('click', function() {
                const newSrc = this.dataset.full;
                
                // Update main image
                mainImg.src = newSrc;
                
                // Update active thumbnail
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    
});
