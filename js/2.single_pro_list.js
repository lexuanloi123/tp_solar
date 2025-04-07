// list sản phẩm liên quan

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_list", {

        slidesPerView: 5,

        spaceBetween: 10,
        
        navigation: {
            nextEl: ".swiper-next_single",
            prevEl: ".swiper-prev_single",
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
