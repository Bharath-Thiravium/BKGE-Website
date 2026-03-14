// ===============================
// CATEGORY FILTER SYSTEM
// ===============================

document.addEventListener("DOMContentLoaded", ()=>{
    initCategoryFilter();
});

function initCategoryFilter(){
    
    const categoryBtns = document.querySelectorAll("[data-target]");
    const sections = document.querySelectorAll(".category-section");
    
    if(!categoryBtns.length || !sections.length) return;
    
    // Hide all sections on load
    sections.forEach(section=>section.style.display="none");
    
    categoryBtns.forEach(btn=>{
        btn.addEventListener("click", ()=>{
            
            const targetId = btn.dataset.target;
            const targetSection = document.getElementById(targetId);
            
            if(!targetSection) return;
            
            // Remove active from all buttons
            categoryBtns.forEach(b=>b.classList.remove("active"));
            btn.classList.add("active");
            
            // Hide all sections
            sections.forEach(section=>{
                section.style.opacity="0";
                section.style.transform="translateY(20px)";
                setTimeout(()=>section.style.display="none", 300);
            });
            
            // Show target section with animation
            setTimeout(()=>{
                targetSection.style.display="block";
                requestAnimationFrame(()=>{
                    targetSection.style.opacity="1";
                    targetSection.style.transform="translateY(0)";
                });
                
                // Smooth scroll to section
                setTimeout(()=>{
                    targetSection.scrollIntoView({
                        behavior:"smooth",
                        block:"start"
                    });
                }, 100);
            }, 320);
            
        });
    });
}
