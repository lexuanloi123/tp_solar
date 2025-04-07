// send sheet contact

jQuery(document).ready(function () {
    var date = new Date();
    var formattedDate = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
    jQuery('#currentDate_lh').val(formattedDate);

    jQuery('#submit-form_lh').on('click', function (e) {
        e.preventDefault();

        var customerName = jQuery('input[name="name"]').val().trim();
        var customerHotline = jQuery('input[name="hotline"]').val().trim();
        var customerEmail = jQuery('input[name="email"]').val().trim();
        var customerContent = jQuery('textarea[name="content"]').val().trim();

        if (!customerName) {
            showPopup('Vui lòng nhập Họ tên.', false);
            return;
        }

        if (!customerHotline) {
            showPopup('Vui lòng nhập Số điện thoại.', false);
            return;
        }

        if (!customerEmail) {
            showPopup('Vui lòng nhập Email.', false);
            return;
        }

        if (!customerContent) {
            showPopup('Vui lòng nhập Nội dung tư vấn.', false);
            return;
        }

        showPopup('Đang xử lý...', true);

        var formData = jQuery('#from_page_lh').serialize();

        jQuery.ajax({
            type: 'GET',
            url: 'https://script.google.com/macros/s/AKfycbyN2pHzsXj_9FKTDnayBTudQRCp0Vx5vM45ftMsmz_klLWEv_TSZnwOuPNWyfRQRUv4/exec',
            dataType: 'json',
            crossDomain: true,
            data: formData,
            success: function (response) {
                if (response === 'false') {
                    showPopup('Thông tin chưa được ghi nhận', false);
                } else {
                    showPopup('Đã nhận thông tin!!! Chúng Tôi sẽ liên hệ lại sau.', false);

                    jQuery('input[name="name"]').val('');
                    jQuery('input[name="hotline"]').val('');
                    jQuery('input[name="email"]').val('');
                    jQuery('textarea[name="content"]').val('');
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                showPopup('Có lỗi xảy ra, vui lòng thử lại sau.', false);
            }
        });
    });

    function showPopup(message, isLoading) {
        if (isLoading) {
            jQuery('#loader').show();
            jQuery('#popup-message, #close-popup').hide();
        } else {
            jQuery('#loader').hide();
            jQuery('#popup-message').text(message).show();
            jQuery('#close-popup').show();
        }
        jQuery('#popup-modal, #overlay').fadeIn();
    }

    jQuery('#close-popup, #overlay').on('click', function () {
        jQuery('#popup-modal, #overlay').fadeOut();
    });
});
