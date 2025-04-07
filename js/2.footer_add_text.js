
//  add text js
jQuery(document).ready(function () {

    // add archive product
    jQuery(".woocommerce ul.products li.product a.button.add_to_cart_button").html('<i class="fa-solid fa-cart-shopping"></i>');
    jQuery("a.button.product_type_simple").html('<i class="fa-solid fa-cart-shopping"></i>');

    // add my account xem lại
    jQuery('p.order-again>a').text('Đặt lại');

    // add login
    jQuery('form.woocommerce-form.woocommerce-form-login.login input#username').attr('placeholder', 'Email');
    jQuery('form.woocommerce-form.woocommerce-form-login.login input#password').attr('placeholder', 'Mật khẩu');


});