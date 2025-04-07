///<!-- get search -->

jQuery(document).ready(function ($) {
  $("#search-form").on("input", function () {
    var searchQuery = $(this).val();

    if (searchQuery.length > 2) {
      // Chỉ tìm khi nhập từ 3 ký tự trở lên
      $.ajax({
        url: ajax_object.ajax_url,
        type: "POST",
        data: {
          action: "search_suggestions",
          search: searchQuery,
        },
        success: function (response) {
          $(".search-suggestions").html(response).show();
        },
      });
    } else {
      $(".search-suggestions").hide();
    }
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest(".search-suggestions, #search-form").length) {
      $(".search-suggestions").hide();
    }
  });
});
