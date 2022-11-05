/* Testemunho Slider */

// import { Collapse } from "bootstrap";

function testimonialSlider() {
    const carouselOne = document.getElementById('carouselOne');
    if (carouselOne) { /* if the element exists*/
        carouselOne.addEventListener('slid.bs.carousel', function (){
            const activeItem = this.querySelector(".active");
            document.querySelector(".js-testimonial-img").src = activeItem.getAttribute("data-js-testimonial-img");
        })
    }
}

testimonialSlider();

/* Apresentação da Ong */

function ongPreviewVideo() {
    const ongPreviewModal = document.querySelector(".js-course-preview-modal");
    
    if(ongPreviewModal) { /* Se o elemento existe */
   
    ongPreviewModal.addEventListener("shown.bs.modal", function() {
        this.querySelector(".js-course-preview-video").play();
        this.querySelector(".js-course-preview-video").currentTime = 0;
    });

    ongPreviewModal.addEventListener("hide.bs.modal", function() {
        this.querySelector(".js-course-preview-video").pause();
    });
    
    }

}

ongPreviewVideo();

/* Header Menu */
function headerMenu(){
    const menu = document.querySelector(".js-header-menu"),
    backdrop = document.querySelector(".js-header-backdrop"),
    menuCollapseBreakpoint = 991;

    function toggleMenu() {
        menu.classList.toggle("open")
        backdrop.classList.toggle("active")
        document.body.classList.toggle("overflow-hidden")
    }

    document.querySelectorAll(".js-header-menu-toggler").forEach((item) => {
        item.addEventListener("click", toggleMenu)
    })

    /* close the menu by clicking outside of it */
    backdrop.addEventListener("click", toggleMenu)

    function collapse() {
        menu.querySelector(".active .js-sub-menu").removeAttribute("style");
        menu.querySelector(".active").classList.remove("active");
    }

    menu.addEventListener("click", (event) => {
        const { target } = event;
        
        if(target.classList.contains("js-toggle-sub-menu") && window.innerWidth <= menuCollapseBreakpoint) {
            // prevent default anchor click behavior
            event.preventDefault();

            // if menu-item already expanded, collapse it and exit
            if (target.parentElement.classList.contains("active")) {
                collapse();
                return;
            }

            // if not already expanded ... run below code 


            // collapse the other expanded menu-item if exists
            if (menu.querySelector(".active")){
                collapse();
            }

            // expand new menu-item
            target.parentElement.classList.add("active");
            target.nextElementSibling.style.maxHeight = 
            target.nextElementSibling.scrollHeight + "px";
        }
    })

    // when resizing window
    window.addEventListener("resize", function() {
        if(this.innerWidth > menuCollapseBreakpoint && menu.classList.contains("open")) {
            toggleMenu();
        }
        if(this.innerWidth > menuCollapseBreakpoint && menu.querySelector(".active")) {
            collapse();
        }
    })
}

headerMenu();

/* Cadastro do Voluntário */

const form = document.querySelector("form"),
    nextBtn = form.querySelector(".nextBtn"),
    backBtn = form.querySelector(".backBtn"),   
    allInput = form.querySelectorAll(".first input")

nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != "") {
            form.classList.add('secActive');
        }
        else {
            form.classList.remove('secActive');
            window.alert("input is empty")
        }
    })
})