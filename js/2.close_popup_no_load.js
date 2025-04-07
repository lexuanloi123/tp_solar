// <!-- đóng popup không load trang -->

jQuery(document).ready(function () {

    jQuery('[data-fancybox="video-slider"]').fancybox({

        loop: true,

        buttons: ['slideShow', 'thumbs', 'zoom', 'close'],

        animationEffect: "zoom",

        transitionEffect: "fade",

        hash: false,

        beforeLoad: function (instance, current) {

            current.opts.$orig.on('click.fb-start', function (e) {

                e.preventDefault();

            });
        }
    });
});
