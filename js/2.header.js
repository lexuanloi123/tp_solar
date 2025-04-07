// fixed menu

jQuery(document).ready(function ($) {

    jQuery(window).scroll(function () {

        if (jQuery(this).scrollTop() > 40) {

            jQuery('.full-header').addClass('sticky');

        } else {

            jQuery('.full-header').removeClass('sticky');

        }
    });
});