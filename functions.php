<?php

// Update: 30/11/22

// Đoạn này ko xóa---------------->

function check_plugin_keyweb()
{
    if (!is_plugin_active('keyweb/keyweb.php')) {
        echo '<h1>Cần bật Plugin Keyweb để vận hành website!</h1>';
        die();
    }
}
add_action('wp_head', 'check_plugin_keyweb', 0); // Kiểm tra

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support'); // Bật hỗ trợ woocommerce

// Hết đoạn ko xóa----------------|



remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);





// chuyển url ajax
function enqueue_custom_scripts()
{

    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/2.header_search.js', array('jquery'), null, true);

    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/2.page_search_dc.js', array('jquery'), null, true);

    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/2.page_register.js', array('jquery'), null, true);


    // Truyền URL AJAX vào file JavaScript
    wp_localize_script('custom-ajax-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');





// ajax search
function search_suggestions()
{
    $search_query = sanitize_text_field($_POST['search']);
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 5,
        's' => $search_query,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();

            $price = get_post_meta(get_the_ID(), '_price', true);
            $formatted_price = wc_price($price);

            echo '<li>';
            echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            echo '<span class="price">' . $formatted_price . '</span>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p class="no_text_sea">Không tìm thấy sản phẩm</p>';
    }

    wp_reset_postdata();
    wp_die(); // Kết thúc xử lý AJAX
}
add_action('wp_ajax_search_suggestions', 'search_suggestions');
add_action('wp_ajax_nopriv_search_suggestions', 'search_suggestions');





// Hàm lấy giao dịch từ API Senpay
function get_senpay_transactions()
{
    $url = 'https://my.sepay.vn/userapi/transactions/list';
    $token = '6NLYZBWFBL3I0PMDJD2KXMDGJFAPA4VVJURPVUSFEE5AG5VQUEQXHWB761C7TSG8';

    $response = wp_remote_get($url, array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        )
    ));

    if (is_wp_error($response)) {
        return []; // Xử lý lỗi nếu cần
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return isset($data['status']) && $data['status'] == 200 ? $data['transactions'] : [];
}





// Hàm cập nhật trạng thái đơn hàng từ giao dịch
function update_order_status_from_transactions()
{
    $transactions = get_senpay_transactions();

    foreach ($transactions as $transaction) {
        $amount_in = floatval($transaction['amount_in']);
        $transaction_content = $transaction['transaction_content'];

        preg_match('/TPORDER(\d+)/', $transaction_content, $matches);
        if (!empty($matches)) {
            $order_id = intval($matches[1]);
            $order = wc_get_order($order_id);

            if ($order) {
                // Kiểm tra số tiền và cập nhật trạng thái
                if ($order->get_total() == $amount_in) {
                    $order->update_status('completed');
                } else {
                    $order->update_status('failed');
                }
            }
        }
    }
}
add_action('init', 'update_order_status_from_transactions');





// Hiển thị mã QR hoặc thông báo đã thanh toán
add_action('woocommerce_thankyou_bacs', function ($order_id) {
    $bacs_info = get_option('woocommerce_bacs_accounts');
    if (!empty($bacs_info)) {
        $order = wc_get_order($order_id);

        if ($order->get_status() == 'completed') {
            echo '<div class="payment-success-message">
                    <div class="content_check_pay"> <i class="fa-solid fa-check"></i> Đã thanh toán</div>
                  </div>';
        } else {
            $content = 'TPORDER' . $order->get_order_number();
            ?>
            <div class="vdh_qr_code">
                <?php foreach ($bacs_info as $item): ?>
                    <span class="vdh_bank_item">
                        <img class="img_qr_code"
                            src="https://img.vietqr.io/image/<?php echo $item['bank_name']; ?>-<?php echo $item['account_number']; ?>-print.jpg?amount=<?php echo $order->get_total(); ?>&addInfo=<?php echo $content; ?>&accountName=<?php echo $item['account_name']; ?>"
                            alt="QR Code">
                    </span>
                <?php endforeach; ?>

                <div id="modal_qr_code" class="modal">
                    <img class="modal-content" id="img01">
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <?php

            // id qua url
            wp_enqueue_script('check-order-status', get_template_directory_uri() . '/js/2.page_check_order_status.js', array('jquery'), null, true);
            wp_localize_script('check-order-status', 'ajax_object', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'order_id' => $order_id
            ));
        }
    }
});





// Hàm kiểm tra trạng thái đơn hàng
function check_order_status_ajax()
{
    $order_id = intval($_POST['order_id']);
    $order = wc_get_order($order_id);

    if ($order) {
        $status = $order->get_status();
        wp_send_json_success(['status' => $status]);
    } else {
        wp_send_json_error(['message' => 'Order not found']);
    }

    wp_die();
}
add_action('wp_ajax_check_order_status', 'check_order_status_ajax');
add_action('wp_ajax_nopriv_check_order_status', 'check_order_status_ajax');





//  đổi tên trạng thái đơn hàng
add_filter('wc_order_statuses', 'ts_rename_order_status_msg', 20, 1);
function ts_rename_order_status_msg($order_statuses)
{

    $order_statuses['wc-on-hold'] = _x('Đang chuyển khoản', 'Order status', 'woocommerce');

    return $order_statuses;
}






// mã khi chưa thanh toán
add_action('woocommerce_account_view-order_endpoint', function ($order_id) {
    $order = wc_get_order($order_id);

    if (!$order)
        return;

    // Kiểm tra trạng thái đơn hàng (chưa chuyển khoản)
    if ($order->get_status() === 'on-hold') {
        $bacs_info = get_option('woocommerce_bacs_accounts');
        if (!empty($bacs_info)) {
            $content = 'TPORDER' . $order->get_order_number();
            ?>
            <h3 style="text-align: center;">Vui lòng chuyển khoản để hoàn tất đơn hàng</h3>
            <div class="vdh_qr_code">

                <?php foreach ($bacs_info as $item): ?>
                    <span class="vdh_bank_item">
                        <img class="img_qr_code"
                            src="https://img.vietqr.io/image/<?php echo $item['bank_name']; ?>-<?php echo $item['account_number']; ?>-print.jpg?amount=<?php echo $order->get_total(); ?>&addInfo=<?php echo $content; ?>&accountName=<?php echo $item['account_name']; ?>"
                            alt="QR Code">
                    </span>
                <?php endforeach; ?>

                <div id="modal_qr_code" class="modal">
                    <img class="modal-content" id="img01">
                    <i class="fa-solid fa-download"></i>
                </div>
            </div>
            <?php
        }
    }
});






// đổi tên my account
add_filter('woocommerce_account_menu_items', 'bbloomer_rename_address_my_account', 9999);

function bbloomer_rename_address_my_account($items)
{
    $items['edit-account'] = 'Chi tiết tài khoản';
    $items['customer-logout'] = 'Đăng xuất';
    return $items;
}



// đăng ký

add_action('wp_ajax_RegisterAction', 'hk_handle_register_form');
add_action('wp_ajax_nopriv_RegisterAction', 'hk_handle_register_form');

function hk_handle_register_form()
{
    $userData = [];
    if (isset($_POST['userData']) && is_array($_POST['userData'])) {
        $userData = $_POST['userData'];
    }

    if (isset($userData['_wpnonce']) && wp_verify_nonce($userData['_wpnonce'], 'form_register')) {
        $arr_signup = [];
        $arr_error = [];

        if (isset($userData['email']) && $userData['email']) {
            $arr_signup['email'] = sanitize_text_field($userData['email']);

            if (email_exists($arr_signup['email'])) {
                $arr_error['email'] = 'Địa chỉ email đã tồn tại';
            }
        } else {
            $arr_error['email'] = 'Bạn chưa nhập địa chỉ email';
        }

        if (isset($userData['username']) && $userData['username']) {
            $arr_signup['username'] = sanitize_text_field($userData['username']);

            if (username_exists($arr_signup['username'])) {
                $arr_error['username'] = 'Username đã tồn tại';
            }
        } else {
            $arr_error['username'] = 'Bạn chưa nhập username';
        }

        if (isset($userData['password']) && $userData['password']) {
            $arr_signup['password'] = sanitize_text_field($userData['password']);
        } else {
            $arr_error['password'] = 'Bạn chưa nhập password';
        }

        if (isset($userData['repassword']) && $userData['repassword']) {
            $arr_signup['repassword'] = sanitize_text_field($userData['repassword']);

            if ($arr_signup['password'] != $arr_signup['repassword']) {
                $arr_error['repassword'] = 'Xác nhận password chưa trùng nhau';
            }
        } else {
            $arr_error['repassword'] = 'Bạn chưa nhập xác nhận password';
        }


        if (count($arr_error)) {
            echo '<ul>';
            foreach ($arr_error as $key => $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
        } else {
            $user_id = wp_create_user($arr_signup['username'], $arr_signup['password'], $arr_signup['email']);
            if ($user_id) {
                $arr_signup = [];
                echo 'success';
            }
        }

    }
    die();
}



//  đổi tên text checkout sau khi đặt hàng

function wc_billing_field_strings($translated_text, $text, $domain)
{
    switch ($translated_text) {
        case 'Our bank details':
            $translated_text = __('Chi tiết ngân hàng', 'woocommerce');
            break;

        case 'Order details':
            $translated_text = __('Chi tiết đơn hàng', 'woocommerce');
            break;

        case 'Payment method:':
            $translated_text = __('Hình thức thanh toán', 'woocommerce');
            break;
    }
    return $translated_text;
}

add_filter('gettext', 'wc_billing_field_strings', 20, 3);





// xóa giao hàng địa chỉ khác
add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
add_filter('woocommerce_checkout_fields', 'vutruso_remove_shipping_address');

function vutruso_remove_shipping_address($fields)
{
    unset($fields['shipping']);
    return $fields;
}





// đổi tên file check out

add_filter('woocommerce_default_address_fields', 'bbloomer_rename_state_province', 9999);

function bbloomer_rename_state_province($fields)
{
    $fields['address_1']['label'] = 'Địa chỉ';
    return $fields;
}

add_filter('woocommerce_checkout_fields', function ($fields) {

    $fields['order']['order_comments']['label'] = 'Ghi chú đơn hàng';
    $fields['order']['order_comments']['placeholder'] = 'Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn.';

    return $fields;

});




// phân trang
function set_posts_per_page_for_archives($query)
{
    if ($query->is_archive() && $query->is_main_query()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'set_posts_per_page_for_archives');




// phân trang tìm kiếm
function custom_search_query_limit($query)
{
    if ($query->is_search() && !is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'custom_search_query_limit');





// // Thêm add to cart
// add_action('woocommerce_after_shop_loop_item', 'bbloomer_add_to_cart_button', 11);

// function bbloomer_add_to_cart_button()
// {
//     global $product;

//     $product_id = $product->get_id();

//     $add_to_cart_url = '?add-to-cart=' . $product_id;

//     echo '<a href="' . esc_url($add_to_cart_url) . '" data-quantity="1" class="none_button_cart button product_type_simple add_to_cart_button ajax_add_to_cart"  aria-describedby="" rel="nofollow"><i class="fa-solid fa-cart-shopping"></i></a>';
// }





// thu gọn mô tả danh mục
add_action('wp_footer', 'devvn_readmore_taxonomy_flatsome');
function devvn_readmore_taxonomy_flatsome()
{
    if (is_woocommerce() && is_tax('product_cat')):
        ?>
        <style>
            .term-description {
                overflow: hidden;
                position: relative;
                margin-bottom: 20px;
                padding-bottom: 25px;
            }

            .devvn_readmore_taxonomy_flatsome {
                text-align: center;
                cursor: pointer;
                position: absolute;
                z-index: 10;
                bottom: 0;
                width: 100%;
                background: #fff;
            }

            .devvn_readmore_taxonomy_flatsome:before {
                height: 55px;
                margin-top: -45px;
                content: "";
                background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
                background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff00', endColorstr='#ffffff', GradientType=0);
                display: block;
            }

            .devvn_readmore_taxonomy_flatsome a {
                color: #318A00;
                display: block;
            }

            .devvn_readmore_taxonomy_flatsome a:after {
                content: '';
                width: 0;
                right: 0;
                border-top: 6px solid #318A00;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                display: inline-block;
                vertical-align: middle;
                margin: -2px 0 0 5px;
            }

            .devvn_readmore_taxonomy_flatsome_less:before {
                display: none;
            }

            .devvn_readmore_taxonomy_flatsome_less a:after {
                border-top: 0;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                border-bottom: 6px solid #318A00;
            }
        </style>
        <script>
            (function ($) {
                $(window).on('load', function () {
                    if ($('.term-description').length > 0) {
                        var wrap = $('.term-description');
                        var current_height = wrap.height();
                        var your_height = 300;
                        if (current_height > your_height) {
                            wrap.css('height', your_height + 'px');
                            wrap.append(function () {
                                return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_show"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                            });
                            wrap.append(function () {
                                return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_less" style="display: none"><a title="Thu gọn" href="javascript:void(0);">Thu gọn</a></div>';
                            });
                            $('body').on('click', '.devvn_readmore_taxonomy_flatsome_show', function () {
                                wrap.removeAttr('style');
                                $('body .devvn_readmore_taxonomy_flatsome_show').hide();
                                $('body .devvn_readmore_taxonomy_flatsome_less').show();
                            });
                            $('body').on('click', '.devvn_readmore_taxonomy_flatsome_less', function () {
                                wrap.css('height', your_height + 'px');
                                $('body .devvn_readmore_taxonomy_flatsome_show').show();
                                $('body .devvn_readmore_taxonomy_flatsome_less').hide();
                            });
                        }
                    }
                });
            })(jQuery);
        </script>
        <?php
    endif;
}






// rút ngắn nội dung product
add_action('wp_footer', 'chowordpress_readmore_flatsome');
function chowordpress_readmore_flatsome()
{
    ?>
    <style>
        .item_mota {
            overflow: hidden;
            position: relative;
            padding-bottom: 25px;
        }

        .single-product .tab-panels div#tab-description.panel:not(.active) {
            height: 0 !important;
        }

        .chowordpress_readmore_flatsome {
            text-align: center;
            cursor: pointer;
            position: absolute;
            z-index: 10;
            bottom: 0;
            width: 100%;
            background: #fff;
        }

        .chowordpress_readmore_flatsome:before {
            height: 55px;
            margin-top: -45px;
            content: "";
            background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff00', endColorstr='#ffffff', GradientType=0);
            display: block;
        }

        .chowordpress_readmore_flatsome a {
            color: #318A00;
            display: block;
        }

        .chowordpress_readmore_flatsome a:after {
            content: '';
            width: 0;
            right: 0;
            border-top: 6px solid #318A00;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            display: inline-block;
            vertical-align: middle;
            margin: -2px 0 0 5px;
        }

        .chowordpress_readmore_flatsome_less a:after {
            border-top: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #318A00;
        }

        .chowordpress_readmore_flatsome_less:before {
            display: none;
        }
    </style>
    <script>
        (function ($) {
            jQuery(document).ready(function () {
                jQuery(window).on('load', function () {
                    if (jQuery('.item_mota').length > 0) {
                        var wrap = jQuery('.item_mota');
                        var current_height = wrap.height();
                        var your_height = 380;
                        if (current_height > your_height) {
                            wrap.css('height', your_height + 'px');
                            wrap.append(function () {
                                return '<div class="chowordpress_readmore_flatsome chowordpress_readmore_flatsome_more"><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                            });
                            wrap.append(function () {
                                return '<div class="chowordpress_readmore_flatsome chowordpress_readmore_flatsome_less" style="display: none;"><a title="Xem thêm" href="javascript:void(0);">Thu gọn</a></div>';
                            });
                            jQuery('body').on('click', '.chowordpress_readmore_flatsome_more', function () {
                                wrap.removeAttr('style');
                                jQuery('body .chowordpress_readmore_flatsome_more').hide();
                                jQuery('body .chowordpress_readmore_flatsome_less').show();
                            });
                            jQuery('body').on('click', '.chowordpress_readmore_flatsome_less', function () {
                                wrap.css('height', your_height + 'px');
                                jQuery('body .chowordpress_readmore_flatsome_less').hide();
                                jQuery('body .chowordpress_readmore_flatsome_more').show();
                            });
                        }
                    }
                });
            });
        })(jQuery);
    </script>
    <?php
}





// add button số lượng////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('woocommerce_after_quantity_input_field', 'vutruso_display_quantity_plus');
function vutruso_display_quantity_plus()
{
    echo '<button type="button" class="plus">+</button>';
}
add_action('woocommerce_before_quantity_input_field', 'vutruso_display_quantity_minus');
function vutruso_display_quantity_minus()
{
    echo '<button type="button" class="minus">-</button>';
}

add_action('woocommerce_after_quantity_input_field', 'vutruso_add_buy_now_button', 20);
function vutruso_add_buy_now_button()
{
    echo '<div class="box_add_cart sitdown"><div class="button_add">Mua ngay</div><span>giao hàng tận nơi</span></div>';
}

/* Jquery for for Quantity Plus-Minus Button*/
add_action('wp_footer', 'vutruso_add_cart_quantity_plus_minus');
function vutruso_add_cart_quantity_plus_minus()
{
    wc_enqueue_js("   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
}




// add nút mua ngay

add_action('woocommerce_after_add_to_cart_button', 'devvn_quickbuy_after_addtocart_button');

function devvn_quickbuy_after_addtocart_button()
{

    global $product;

    ?>


    <button type="button" class="button buy_now_button">

        <?php _e('Mua ngay', 'devvn'); ?>

    </button>

    <input type="hidden" name="is_buy_now" class="is_buy_now" value="0" autocomplete="off" />

    <script>

        jQuery(document).ready(function () {

            jQuery('body').on('click', '.buy_now_button', function (e) {

                e.preventDefault();

                var thisParent = jQuery(this).parents('form.cart');

                if (jQuery('.single_add_to_cart_button', thisParent).hasClass('disabled')) {

                    jQuery('.single_add_to_cart_button', thisParent).trigger('click');

                    return false;

                }

                thisParent.addClass('devvn-quickbuy');

                jQuery('.is_buy_now', thisParent).val('1');

                jQuery('.single_add_to_cart_button', thisParent).trigger('click');

            });

        });

    </script>

    <?php

}

add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');

function redirect_to_checkout($redirect_url)
{

    if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {

        $redirect_url = wc_get_checkout_url(); //or wc_get_cart_url()

    }

    return $redirect_url;

}

// add_action('woocommerce_single_product_summary', 'custom_action_button', 45);

// function custom_action_button()
// {
//     global $product;

//     // Kiểm tra nếu sản phẩm có thể mua
//     if ($product->is_in_stock() && $product->is_purchasable()) {
//         echo '<div class="box_add_cart">';
//         echo '<p class="button_add">Mua ngay</p>';
//         echo '</div>';
//     }
// }




// liên hệ giá bằng 0
function devvn_wc_custom_get_price_html($price, $product)
{
    if (!$product->get_price()) {
        if ($product->is_on_sale() && $product->get_regular_price()) {
            $regular_price = wc_get_price_to_display($product, array('qty' => 1, 'price' => $product->get_regular_price()));

            $price = wc_format_price_range($regular_price, __('Free!', 'woocommerce'));
        } else {
            $price = '<span class="pro_lh achive_lh">' . __('Liên hệ', 'woocommerce') . '</span>';
        }
    }
    return $price;
}
add_filter('woocommerce_get_price_html', 'devvn_wc_custom_get_price_html', 10, 2);




// đổi giảm giá thành % giảm giá

add_filter('woocommerce_sale_flash', 'devvn_woocommerce_sale_flash', 10, 3);
function devvn_woocommerce_sale_flash($html, $post, $product)
{
    return '<span class="onsale"><span>' . devvn_presentage_bubble($product) . '</span></span>';
}
function devvn_presentage_bubble($product)
{
    $post_id = $product->get_id();
    if ($product->is_type('simple') || $product->is_type('external')) {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $bubble_content = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
    } elseif ($product->is_type('variable')) {
        if ($bubble_content = devvn_percentage_get_cache($post_id)) {
            return devvn_percentage_format($bubble_content);
        }
        $available_variations = $product->get_available_variations();
        $maximumper = 0;
        for ($i = 0; $i < count($available_variations); ++$i) {
            $variation_id = $available_variations[$i]['variation_id'];
            $variable_product = new WC_Product_Variation($variation_id);
            if (!$variable_product->is_on_sale()) {
                continue;
            }
            $regular_price = $variable_product->get_regular_price();
            $sale_price = $variable_product->get_sale_price();
            $percentage = round(((floatval($regular_price) - floatval($sale_price)) / floatval($regular_price)) * 100);
            if ($percentage > $maximumper) {
                $maximumper = $percentage;
            }
        }
        $bubble_content = sprintf(__('%s', 'woocommerce'), $maximumper);
        devvn_percentage_set_cache($post_id, $bubble_content);
    } else {
        $bubble_content = __('Sale!', 'woocommerce');
        return $bubble_content;
    }
    return devvn_percentage_format($bubble_content);
}
function devvn_percentage_get_cache($post_id)
{
    return get_post_meta($post_id, '_devvn_product_percentage', true);
}
function devvn_percentage_set_cache($post_id, $bubble_content)
{
    update_post_meta($post_id, '_devvn_product_percentage', $bubble_content);
}
//Định dạng kết quả dạng -{value}%. Ví dụ -20%
function devvn_percentage_format($value)
{
    return str_replace('{value}', $value, 'Giảm {value}%');
}
// Xóa cache khi sản phẩm hoặc biến thể thay đổi
function devvn_percentage_clear($object)
{
    $post_id = 'variation' === $object->get_type()
        ? $object->get_parent_id()
        : $object->get_id();
    delete_post_meta($post_id, '_devvn_product_percentage');
}
add_action('woocommerce_before_product_object_save', 'devvn_percentage_clear');




// remove link shop breadcrumb
add_filter('wpseo_breadcrumb_links', 'wpseo_remove_breadcrumb_link', 10);

function wpseo_remove_breadcrumb_link($links)
{
    $new_links = array_filter($links, function ($link) {
        return $link['text'] !== 'Shop';
    });

    return array_values($new_links);
}









// Register Custom Post Type

function custom_post_type_dia_chi()
{

    $labels = array(

        'name' => __('Địa chỉ'),

        'singular_name' => __('Địa chỉ'),

        'menu_name' => __('Địa chỉ'),

        'add_new' => __('Thêm địa chỉ'),

    );

    $args = array(

        'label' => __('Địa chỉ'),

        'labels' => $labels,

        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'excerpt'),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 5,

        'show_in_admin_bar' => true,

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,


        'capability_type' => 'page',


    );

    register_post_type('dia-chi', $args);

    $taxonomy_labels = array(
        'name' => _x('Tỉnh thành', 'taxonomy general name'),

        'singular_name' => _x('Tỉnh thành', 'taxonomy singular name'),

        'search_items' => __('Tìm kiếm tỉnh thành'),

        'all_items' => __('Tất cả tỉnh thành'),

        'parent_item' => __('Tỉnh thành'),

        'parent_item_colon' => __('Tỉnh thành:'),

        'edit_item' => __('Chỉnh sửa tỉnh thành'),

        'update_item' => __('Cập nhật tỉnh thành'),

        'add_new_item' => __('Thêm tỉnh thành mới'),

        'new_item_name' => __('Tên tỉnh thành mới'),

        'menu_name' => __('Tỉnh thành'),
    );

    $taxonomy_args = array(
        'hierarchical' => true,

        'labels' => $taxonomy_labels,

        'show_ui' => true,

        'show_admin_column' => true,

        'query_var' => true,

        'rewrite' => array('slug' => 'tinh-thanh'),

    );

    register_taxonomy('tinh-thanh', 'dia-chi', $taxonomy_args);


}

add_action('init', 'custom_post_type_dia_chi', 0);



function fetch_posts_by_category()
{

    if (!isset($_POST['category_id']) || empty($_POST['category_id'])) {
        wp_send_json_error(array('message' => 'Invalid category.'));
    }

    $category_id = intval($_POST['category_id']);

    $args = array(
        'post_type' => 'dia-chi',
        'tax_query' => array(
            array(
                'taxonomy' => 'tinh-thanh',
                'field' => 'term_id',
                'terms' => $category_id,
            ),
        ),
        'posts_per_page' => 10,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ob_start();
        while ($query->have_posts()) {
            $query->the_post();
            $map_content = get_field('map');
            ?>
            <div class="post-item" data-map="<?php echo esc_attr($map_content); ?>">
                <h3><?php the_title(); ?></h3>
                <div class="content_dc"><?php the_content(); ?></div>
            </div>
            <?php
        }
        wp_reset_postdata();
        $content = ob_get_clean();
        wp_send_json_success($content);
    } else {
        wp_send_json_success('<p>Không có địa chỉ</p>');
    }
}

add_action('wp_ajax_fetch_posts_by_category', 'fetch_posts_by_category');
add_action('wp_ajax_nopriv_fetch_posts_by_category', 'fetch_posts_by_category');

















// Thay đổi văn bản số sp

remove_filter('woocommerce_subcategory_count_html', 'filter_woocommerce_subcategory_count_html', 10, 2);

function filter_woocommerce_subcategory_count_html($mark_class_count_category_count_mark, $category)
{

    return ' <span class="count">' . $category->count . ' ' . __('Sản phẩm') . '</span>';

}
;

add_filter('woocommerce_subcategory_count_html', 'filter_woocommerce_subcategory_count_html', 10, 2);

// widgets

function keyweb_widgets_init()
{

    register_sidebar(array(

        'name' => __('Filter'),

        'id' => 'keyweb_filter',

        'before_widget' => '<div id="%1$s" class="block-filter widget %2$s">',

        'after_widget' => '</div>',

        'before_title' => '<div class="heading_filter">',

        'after_title' => '</div>',

    ));

    register_sidebar(array(

        'name' => __('Sản phẩm đã xem'),

        'id' => 'keyweb_product_viewed',

        'before_widget' => '<div id="%1$s" class="block-viewed widget %2$s">',

        'after_widget' => '</div>',

    ));

    register_sidebar(array(

        'name' => __('Từ khóa sản phẩm'),

        'id' => 'keyweb_product_tag',

        'before_widget' => '<div id="%1$s" class="block-tag widget %2$s">',

        'after_widget' => '</div>',

    ));

    register_sidebar(array(

        'name' => __('Giỏ hàng'),

        'id' => 'keyweb_box_cart',

        'before_widget' => '<div id="%1$s" class="block-cart widget %2$s">',

        'after_widget' => '</div>',

    ));

}

add_action('widgets_init', 'keyweb_widgets_init');

// // Thêm nội dung vào bên dưới content product

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// function woocommerce_template_single_meta()
// {

// 	wc_get_template('single-product/meta.php');

// 	global $product;

// 	$product_id = $product->get_id();

// 	if ($product->get_price() > 0 && $product->is_in_stock()) { // Có thể mua

// 		$urlQr = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=' . esc_url(home_url('/')) . 'cart?add-to-cart=' . $product_id . '&choe=UTF-8';

// 	} else { // Ko thể mua

// 		$urlQr = 'https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=' . get_permalink($product_id) . '&choe=UTF-8';

// 	}

// 	echo '<div class="kw-box-contact">' . _opt('product_contact') . '</div>';

// 	echo '<div class="qr-create-cart"><h4>' . __('Tạo nhanh đơn hàng trên điện thoại') . ':</h4> <img src="' . $urlQr . '"></div>';

// }

// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 41);



add_action('after_setup_theme', 'yourtheme_setup');

function yourtheme_setup()
{

    add_theme_support('wc-product-gallery-zoom');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');

}

// Ẩn thêm sửa css

function customizer_remove_css_section($wp_customize)
{
    $wp_customize->remove_section('custom_css');
}

add_action('customize_register', 'customizer_remove_css_section', 15);

// Cấm xóa các trang mặc định

function modify_trash_actions($actions, $post)
{

    $arr = array(3, 6, 7, 8, 9, 18, 16); // lấy danh sách các mảng trang thuộc post type page cần loại bỏ phần thùng rác (xóa bỏ). 3,6,7,8,9 là các page woocommerce

    if ($post->post_type == "page") // Kiểm tra post type.

        foreach ($arr as $key => $value) {

            if ($post->ID == $value) { // Kiểm tra ID page có đúng với mảng nhập vào hay không.

                unset($actions['trash']); // Loại bỏ phần thùng rác hay loại  bỏ phần (xóa bỏ).

                unset($actions['delete']);

            }

        }

    return $actions; // Trả về action.

}

add_filter('page_row_actions', 'modify_trash_actions', 10, 2); // Thay đổi action thông qua filter page_row_actions

// Khai báo thêm menu

add_action('init', 'register_my_menus');

function register_my_menus()
{

    register_nav_menus(

        array(

            'footer_1' => 'Menu Footer 1',

        )

    );

}

?>