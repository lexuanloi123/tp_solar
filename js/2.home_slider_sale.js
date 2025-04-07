// slider sale

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_list_sale", {

        slidesPerView: 5,

        spaceBetween: 10,

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
