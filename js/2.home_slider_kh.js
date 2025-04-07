// slider khánh hàng

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_client", {

        slidesPerView: 2,

        spaceBetween: 20,

        loop: true,

        autoplay: {
            delay: 5000,

            disableOnInteraction: false,
        },

        breakpoints: {

            900: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

        }


    });
});
