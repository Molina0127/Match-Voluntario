/* Testemunho Slider */

function testimonialSlider() {
    const carouselOne = document.getElementById('carouselOne');
    if (carouselOne) { /* if the element exists*/
        carouselOne.addEventListener('slid.bs.carousel', function (){
            const activeItem = this.querySelector(".active");
            document.querySelector(".js-testimonial-img").src =  
            activeItem.getAttribute("data-js-testimonial-img");

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