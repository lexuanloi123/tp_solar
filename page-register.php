<?php get_header(); ?>


<div class="full-row full-content_my" style="background-image: url('<?php echo _opt('banner_lo') ?>');">
    
    <div class="flex_right_body">

        <div class="full_signup bor_left_1">

            <div class="title_full_log_re">

                <a class="text_lo_re" href="/register/">Đăng ký<span></span></a>

            </div>

            <form id="hk-registerform" action="<?php echo esc_url(get_home_url() . '/dang-ky'); ?>" method="post">

                <?php wp_nonce_field('form_register'); ?>

                <div id="hk-message"></div>

                <p style="display:none" id="hk-success" class="text_green">
                    Đăng ký người dùng thành công.
                </p>
                <p class="bor_input_dk">

                    <label for="username">Tên đăng nhập<span class="text_red">*</span></label>

                    <input placeholder="Nhập tên" type="text" name="username" id="username" required>
                </p>
                <p class="bor_input_dk">

                    <label for="email">Email <span class="text_red">*</span></label>

                    <input placeholder="Nhập email" type="email" name="email" id="email" required>
                </p>
                <p class="bor_input_dk">

                    <label for="password">Mật khẩu <span class="text_red">*</span></label>

                    <input placeholder="Nhập mật khẩu" type="password" name="password" id="password" required>
                </p>
                <p class="bor_input_dk">

                    <label for="repassword">Xác nhận mật khẩu <span class="text_red">*</span></label>

                    <input placeholder="Nhập lại mật khẩu" type="password" name="repassword" id="repassword" required>
                </p>
                <p class="text-center mb-0">

                    <button class="form-submit" type="submit">Tạo tài khoản</button>
                </p>
            </form>

            <div class="bor_page">

                <a class="link_logins_page" href="/login/">Đăng nhập<span></span></a>

                <a class="link_logins_page" href="/">Quay về trang chủ<span></span></a>

            </div>

        </div>
    </div>

</div>


<style>
    .hotline {
        display: none !important;
    }

    .full-row.full-header-top {
        display: none;
    }

    header.full-row.full-header {
        display: none;
    }

    .full-row.full_menu {
        display: none;
    }

    footer.full-row.full-footer {
        display: none;
    }

    .full-row.full-footer-bottom {
        display: none;
    }
</style>


<?php get_footer(); ?>

