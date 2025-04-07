// ///////////////// đăng ký -->
(function ($) {
    $(document).ready(function () {
        // var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
        $('#hk-registerform').submit(function (e) {
            e.preventDefault();
            var data = {};
            var ArrayForm = $(this).serializeArray();
            $.each(ArrayForm, function () {
                data[this.name] = this.value;
            });

            $.ajax({
                type: "POST",
                url: ajax_object.ajax_url,
                data: {
                    'action': 'RegisterAction',
                    'userData': data
                },
                dataType: "html",
                beforeSend: function () {
                },
                success: function (response) {
                    $('#hk-message').html(response);
                    if (response == 'success') {
                        $("#hk-registerform")[0].reset();
                        $('#hk-message').hide();
                        $('#hk-success').show();
                    }
                }
            });
        });
    });
})(jQuery);
