// //click add to cart


jQuery(document).ready(function () {

    jQuery('.box_add_cart').click(function () {

        jQuery('form.cart>button.button.buy_now_button').click();

    });

    // jQuery('.quantity').after(`<div class="box_add_cart"><p class="button_add">Mua ngay</p></div>`);
    jQuery('.single_add_to_cart_button').prepend('<i class="fa-solid fa-cart-shopping"></i> ');

});
