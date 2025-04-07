<?php get_header(); ?>


<div class="full-row full-content_my" style="background-image: url('<?php echo _opt('banner_lo') ?>');">

    <div class="flex_right_body">

        <div class="full_signup bor_left_1">
            <div class="title_full_log_re">

                <a class="text_lo_re" href="/login/">Đăng nhập<span></span></a>

            </div>

            <div class="conetent_login">
                <?php
                if (is_user_logged_in()) {
                    wp_redirect(home_url('/my-account'));
                    exit;
                } else {
                    woocommerce_login_form();
                }
                ?>
            </div>

            <div class="bor_page">

                <a class="link_logins_page" href="/register/">Đăng ký<span></span></a>

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
