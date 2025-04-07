// view order qr
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("modal_qr_code");
  const modalImg = document.getElementById("img01");
  const downloadIcon = document.querySelector(".fa-download");

  // Hiển thị modal khi click vào QR Code
  document.querySelectorAll(".img_qr_code").forEach((img) => {
    img.addEventListener("click", () => {
      modal.style.display = "block";
      modalImg.src = img.src;
      modalImg.alt = img.alt;
    });
  });

  // Đóng modal khi click ra ngoài
  modal.addEventListener("click", () => {
    modal.classList.add("out");
    setTimeout(() => {
      modal.style.display = "none";
      modal.classList.remove("out");
    }, 400);
  });

  // Tải ảnh khi click vào icon download
  downloadIcon.addEventListener("click", function () {
    const imgSrc = modalImg.src; // URL ảnh
    fetch(imgSrc)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to fetch the image");
        }
        return response.blob();
      })
      .then((blob) => {
        const link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = modalImg.alt || "qr_code_image.jpg"; // Đặt tên file tải xuống
        link.click();
        URL.revokeObjectURL(link.href); // Dọn dẹp bộ nhớ
      })
      .catch((error) => {
        console.error("Error downloading the image:", error);
      });
  });
});
