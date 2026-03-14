// ===============================
// GROUP-BASED PROJECT FILTER
// ===============================

document.addEventListener("DOMContentLoaded", ()=>{
    initGroupFilter();
});

function initGroupFilter(){
    
    const buttons = document.querySelectorAll(".project-btn");
    const sections = document.querySelectorAll(".project-section");
    
    if(!buttons.length || !sections.length) return;
    
    // Hide all sections on load
    sections.forEach(section=>{
        section.style.display="none";
        section.style.opacity="0";
    });
    
    buttons.forEach(btn=>{
        btn.addEventListener("click", ()=>{
            
            const targetGroup = btn.dataset.target;
            
            // Remove active from all buttons
            buttons.forEach(b=>b.classList.remove("active"));
            btn.classList.add("active");
            
            // Hide all sections first
            sections.forEach(section=>{
                section.style.opacity="0";
                section.style.transform="translateY(20px)";
                setTimeout(()=>section.style.display="none", 300);
            });
            
            // Show sections matching the group
            setTimeout(()=>{
                const matchingSections = document.querySelectorAll(`.${targetGroup}`);
                let firstSection = null;
                
                matchingSections.forEach((section, index)=>{
                    if(index === 0) firstSection = section;
                    
                    section.style.display="block";
                    requestAnimationFrame(()=>{
                        section.style.opacity="1";
                        section.style.transform="translateY(0)";
                    });
                });
                
                // Smooth scroll to first section
                if(firstSection){
                    setTimeout(()=>{
                        const offset = 100;
                        const elementPosition = firstSection.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - offset;
                        
                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                    }, 100);
                }
            }, 320);
            
        });
    });
}
