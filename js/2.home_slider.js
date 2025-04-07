// slide home

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_slider_home", {

        slidesPerView: 2,

        spaceBetween: 20,

        loop: true,

        autoplay: {

            delay: 5000,

            disableOnInteraction: false,
        },

        navigation: {

            nextEl: ".swiper-button-next_slider",

            prevEl: ".swiper-button-prev_slider",

        },

        breakpoints: {
            900: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
        }




    });
});
