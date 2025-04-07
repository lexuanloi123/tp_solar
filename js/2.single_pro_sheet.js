// send gg sheet ajax


jQuery(document).ready(function () {

    var date = new Date();
    var formattedDate = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
    jQuery('#currentDate').val(formattedDate);

    jQuery('#submit-form_pro').on('click', function (e) {
        e.preventDefault();

        var customerName = jQuery('input[name="customer_name"]').val().trim();
        var customerHotline = jQuery('input[name="customer_hotline"]').val().trim();

        if (!customerName) {
            showPopup('Vui lòng nhập Họ tên.', false);
            return;
        }

        if (!customerHotline) {
            showPopup('Vui lòng nhập Số điện thoại.', false);
            return;
        }

        showPopup('Đang xử lý...', true);

        var formData = jQuery('#from_single_pro').serialize();

        jQuery.ajax({
            type: 'GET',
            url: 'https://script.google.com/macros/s/AKfycbzV436LJHoMRa-aKnu2ZmdlN8RlToQjl3vQFNZpO9Fe_db7EaQimVbwqQje3XoD5P6_zg/exec',
            dataType: 'json',
            crossDomain: true,
            data: formData,
            success: function (response) {
                if (response === 'false') {
                    showPopup('Thông tin chưa được ghi nhận', false);
                } else {
                    showPopup('Đã nhận thông tin!!! Chúng Tôi sẽ liên hệ lại sau.', false);
                    jQuery('input[name="customer_name"]').val('');
                    jQuery('input[name="customer_hotline"]').val('');
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
