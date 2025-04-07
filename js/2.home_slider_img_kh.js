// slider ảnh khách hàng sử dụng 

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_img", {

        slidesPerView: 4,

        spaceBetween: 20,

        loop: true,

        autoplay: {
            delay: 5000,

            disableOnInteraction: false,
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
