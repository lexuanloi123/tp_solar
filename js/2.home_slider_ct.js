//  slider về chúng tôi 

document.addEventListener('DOMContentLoaded', function () {

    var swiper = new Swiper(".mySwiper_we", {

        slidesPerView: 7,

        spaceBetween: 10,

        breakpoints: {
            1300: {
                slidesPerView: 5,
                spaceBetween: 20,
            },

            1100: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
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
