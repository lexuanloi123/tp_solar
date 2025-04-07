document.addEventListener("DOMContentLoaded", function () {
  const orderId = ajax_object.order_id; // Lấy order_id từ PHP
  const checkInterval = 5000; // 5 giây

  // Kiểm tra trạng thái đơn hàng theo thời gian thực
  function checkOrderStatus() {
    fetch(ajax_object.ajax_url, {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({
        action: "check_order_status",
        order_id: orderId,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success && data.data.status === "completed") {
          document.querySelector(".vdh_qr_code").innerHTML =
            '<div class="payment-success-message"> <div class="content_check_pay"> <i class="fa-solid fa-check"></i> Đã thanh toán</div></div>';
        } else {
          setTimeout(checkOrderStatus, checkInterval);
        }
      })
      .catch((error) => {
        console.error("Error checking order status:", error);
        setTimeout(checkOrderStatus, checkInterval);
      });
  }

  checkOrderStatus();
});
