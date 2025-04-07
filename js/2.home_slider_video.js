// slider video

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_video", {

        slidesPerView: 4,

        spaceBetween: 20,

        loop: true,


        navigation: {

            nextEl: ".swiper-button-next_video",

            prevEl: ".swiper-button-prev_video",

        },

        breakpoints: {
            900: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            700: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            330: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
        }
    });
});
