// tìm kiếm tình thành

jQuery(document).ready(function ($) {
    const firstCategoryId = $('#tinh-thanh').val();
    fetchPosts(firstCategoryId);

    $(document).on('change', '#tinh-thanh', function () {
        const categoryId = $(this).val();
        fetchPosts(categoryId);
    });


    // lấy data map khi click
    $(document).on('click', '.post-item', function () {
        const mapContent = $(this).data('map');
        $('#map_page').html(mapContent);

        $('.post-item').removeClass('selected');
        $(this).addClass('selected');
    });

    //    ajax chọn tình thành
    function fetchPosts(categoryId) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
            action: 'fetch_posts_by_category',
            category_id: categoryId
        },
            beforeSend: function () {
                $('#post-results').html('<p>Loading...</p>');
            },
            success: function (response) {
                if (response.success) {
                    $('#post-results').html(response.data);


                    setFirstPostSelected();
                } else {
                    $('#post-results').html('<p>No posts found.</p>');
                }
            },
            error: function () {
                $('#post-results').html('<p>Error occurred, please try again later.</p>');
            }
            });
        }

//    hiển thị data map đầu tiên
function setFirstPostSelected() {

    const firstPost = $('.post-item').first();
    if (firstPost.length > 0) {
        firstPost.addClass('selected');
        const mapContent = firstPost.data('map');
        $('#map_page').html(mapContent);
    }
}
    });


