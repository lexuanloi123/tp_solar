// slider ảnh đại diện

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_product", {

        spaceBetween: 10,

        slidesPerView: 4,

        freeMode: true,

        watchSlidesProgress: true,

        breakpoints: {
            530: {
                spaceBetween: 10,
                slidesPerView: 4,
            },
        }
    });
    var swiper2 = new Swiper(".mySwiper2_product", {

        loop: true,

        spaceBetween: 10,

        navigation: {
            nextEl: ".swiper-button-next_product",
            prevEl: ".swiper-button-prev_product",
        },
        thumbs: {
            swiper: swiper,
        },
    });
});
