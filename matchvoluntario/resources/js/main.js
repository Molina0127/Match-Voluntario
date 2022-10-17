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