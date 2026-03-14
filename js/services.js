// ===============================
// BK GREEN ENERGY - SERVICES PAGE
// ===============================

const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            entry.target.classList.add("visible");
            if(entry.target.classList.contains("stat-card")){
                const num = entry.target.querySelector(".stat-number");
                if(num && !num.classList.contains("counted")){
                    animateCounter(num);
                    num.classList.add("counted");
                }
            }
        }
    });
},{threshold:0.15,rootMargin:"0px 0px -50px 0px"});

document.addEventListener("DOMContentLoaded",()=>{
    document.querySelectorAll(".fade-up, .fade-in-up").forEach(el=>observer.observe(el));
    document.querySelectorAll(".stat-card").forEach(el=>observer.observe(el));

    const navbar=document.querySelector(".custom-navbar");
    if(navbar){
        window.addEventListener("scroll",()=>{
            navbar.classList.toggle("navbar-scrolled", window.scrollY>60);
        });
    }

    const arrow=document.querySelector(".scroll-arrow");
    if(arrow){
        arrow.addEventListener("click",()=>{
            document.querySelector(".project-gallery")?.scrollIntoView({behavior:"smooth"});
        });
    }

    initProjectFilter();
    initGalleryFilter();
    initThumbnailGallery();
    initMobileAccordion();
});

// ---------- PROJECT FILTER WITH GALLERY ----------
function initProjectFilter(){
    const filterBtns=document.querySelectorAll(".stats-section .filter-btn");
    const projectSection=document.querySelector(".completed-projects-section");
    const projectCards=document.querySelectorAll(".project-gallery-card");

    if(!filterBtns.length || !projectSection) return;

    filterBtns.forEach(btn=>{
        btn.addEventListener("click",()=>{
            const filter=btn.dataset.filter;

            filterBtns.forEach(b=>b.classList.remove("active"));
            btn.classList.add("active");

            projectSection.style.display="block";

            projectCards.forEach(card=>{
                card.classList.remove("show");
                card.style.display="none";
            });

            setTimeout(()=>{
                projectCards.forEach(card=>{
                    const cat=card.dataset.cat;
                    if(filter==="all" || cat===filter){
                        card.style.display="block";
                        setTimeout(()=>card.classList.add("show"),10);
                    }
                });
            },50);

            setTimeout(()=>{
                projectSection.scrollIntoView({behavior:"smooth",block:"start"});
            },100);
        });
    });
}

// ---------- THUMBNAIL GALLERY ----------
function initThumbnailGallery(){
    const cards=document.querySelectorAll(".project-gallery-card");
    
    cards.forEach(card=>{
        const mainImg=card.querySelector(".main-img");
        const thumbnails=card.querySelectorAll(".thumbnail");
        
        if(!mainImg || !thumbnails.length) return;
        
        // Set first thumbnail as active
        thumbnails[0]?.classList.add("active");
        
        thumbnails.forEach(thumb=>{
            thumb.addEventListener("click",()=>{
                const fullSrc=thumb.dataset.full || thumb.src;
                
                // Update main image
                mainImg.src=fullSrc;
                
                // Update active thumbnail
                thumbnails.forEach(t=>t.classList.remove("active"));
                thumb.classList.add("active");
            });
        });
    });
}

// ---------- GALLERY FILTER ----------
function initGalleryFilter(){
    const filterBtns=document.querySelectorAll(".project-gallery .filter-btn");
    const galleryCards=document.querySelectorAll(".project-gallery .project-card");

    if(!filterBtns.length) return;

    filterBtns.forEach(btn=>{
        btn.addEventListener("click",()=>{
            const filter=btn.dataset.filter;

            filterBtns.forEach(b=>b.classList.remove("active"));
            btn.classList.add("active");

            galleryCards.forEach(card=>{
                const cat=card.dataset.category;
                if(filter==="all" || cat===filter){
                    card.style.display="block";
                    setTimeout(()=>{
                        card.style.opacity="1";
                        card.style.transform="scale(1)";
                    },10);
                }else{
                    card.style.opacity="0";
                    card.style.transform="scale(0.95)";
                    setTimeout(()=>card.style.display="none",300);
                }
            });
        });
    });
}

function animateCounter(el){
    const target=parseInt(el.dataset.target);
    const duration=1800;
    const startTime=performance.now();

    function update(now){
        const progress=Math.min((now-startTime)/duration,1);
        el.textContent=Math.floor(progress*target);
        if(progress<1){
            requestAnimationFrame(update);
        }else{
            el.textContent=target;
        }
    }
    requestAnimationFrame(update);
}

function initMobileAccordion(){
    const panels=document.querySelectorAll(".content-panel");
    if(!panels.length) return;

    panels.forEach(panel=>{
        panel.addEventListener("click",()=>{
            if(window.innerWidth>991) return;
            panels.forEach(p=>{
                if(p!==panel) p.classList.remove("active");
            });
            panel.classList.toggle("active");
        });
    });
}
