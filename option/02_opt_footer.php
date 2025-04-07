<?php

$options = array(

	array("namePanel" => "Cấu hình Footer"),


	array("nameSection" => "Box thông tin công ty"),


	array(
		"name" => "logo_footer",

		"label" => "Ảnh logo",

		"description" => "200 x 130px",

		"default" => "",

		"partial" => ".footer_cty",

		"type" => "image"
	),

	array(
		"name" => "text_cty_footer",

		"label" => "Tên công ty",

		"description" => "",

		"default" => "CÔNG TY CỔ PHẦN TP SOLAR",

		"partial" => "",

		"type" => "text"
	),

	array(
		"name" => "sl_nd_cty",

		"label" => "Số lượng nội dung hiển thị",

		"description" => "",

		"default" => "5",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"type" => "number"
	),

	array(
		"name" => "nd_cty_footer",

		"label" => "Nội dung thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_nd_cty",

		"type" => "textarea"
	),

	array(
		"name" => "link_nd_cty_footer",

		"label" => "Link thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_nd_cty",

		"type" => "text"
	),


	array("nameSection" => "Box số điện thoại"),


	array(
		"name" => "sl_sdt_footer",

		"label" => "Số lượng số điện thoại hiển thị",

		"description" => "",

		"default" => "2",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),
		"partial" => ".hotline_footer",

		"type" => "number"
	),

	array(
		"name" => "title_sdt_footer",

		"label" => "Tiêu đề thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_sdt_footer",

		"type" => "text"
	),

	array(
		"name" => "sdt_footer",

		"label" => "Số điện thoại thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_sdt_footer",

		"type" => "text"
	),

	array(
		"name" => "link_sdt_footer",

		"label" => "Link số điện thoại thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_sdt_footer",

		"type" => "text"
	),

	array("nameSection" => "Box chính sách"),

	array(
		"name" => "title_cs_footer",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Chính sách",

		"partial" => ".menu_footer",

		"type" => "text"
	),

	array("nameSection" => "Box thanh toán"),

	array(
		"name" => "title_tt_footer",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Phương thức thanh toán",

		"partial" => ".pt_footer",

		"type" => "text"
	),

	array(
		"name" => "img_tt_1",

		"label" => "Ảnh thanh toán 1",

		"description" => "",

		"default" => "",

		"type" => "image"
	),

	array(
		"name" => "img_tt_2",

		"label" => "Ảnh thanh toán 2",

		"description" => "",

		"default" => "",

		"type" => "image"
	),

	array(
		"name" => "img_tt_ct",

		"label" => "Ảnh Bộ công thương",

		"description" => "",

		"default" => "",

		"type" => "image"
	),

	array(
		"name" => "link_img_tt_ct",

		"label" => "Link ảnh Bộ công thương",

		"description" => "",

		"default" => "",

		"type" => "text"
	),

	array("nameSection" => "Box kết nối"),

	array(
		"name" => "tat_kn",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_kn_footer",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Kết nối với chúng tôi",

		"partial" => ".text_kn",

		"type" => "text"
	),

	array(
		"name" => "sl_kn_footer",

		"label" => "Số lượng ảnh liên kết",

		"description" => "",

		"default" => "6",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"type" => "number"
	),

	array(
		"name" => "img_kn",

		"label" => "Ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_kn_footer",

		"type" => "image"
	),

	array(
		"name" => "link_img_kn",

		"label" => "Link ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_kn_footer",

		"type" => "text"
	),

	array("nameSection" => "Box hướng dẫn"),


	array(
		"name" => "tat_hd",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "sl_hd_footer",

		"label" => "Số lượng text hương dẫn",

		"description" => "",

		"default" => "3",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),
		"partial" => ".link_bt_footer",

		"type" => "number"
	),

	array(
		"name" => "text_hd",

		"label" => "Nội dung thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_hd_footer",

		"type" => "text"
	),

	array(
		"name" => "link_text_hd",

		"label" => "Link thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_hd_footer",

		"type" => "text"
	),

	array("nameSection" => "Box copy right"),

	array(
		"name" => "text_copy_right",

		"label" => "Nội dung copy right",

		"description" => "",

		"default" => "Bản quyền thuộc về CÔNG TY CỔ PHẦN TP SOLAR.",

		"partial" => ".text_copy",

		"type" => "textarea"
	),


	// array(	"name" => "footer_company",

	// 		"label" => "Tên công ty",

	// 		"description" => "Tiêu đề tên công ty in đậm phía trên",

	// 		"default" => "CÔNG TY TNHH ĐẦU TƯ TM & XNK NAM HẢI",

	// 		"partial" => ".footer-box-1",

	// 		"type" => "text"),

	// array(	"name" => "footer_dia_chi",

	// 		"label" => "Địa chỉ",

	// 		"description" => "Địa chỉ",

	// 		"default" => "Địa chỉ: Số nhà 1037 Đường Giải Phóng, Phường Thịnh Liệt, Quận Hoàng Mai, TP. Hà Nội",

	// 		"type" => "text"),

	// array(	"name" => "footer_phone",

	// 		"label" => "Số điện thoại",

	// 		"description" => "Số điện thoại",

	// 		"default" => "Tel: 0977.260.612",

	// 		"type" => "text"),

	// array(	"name" => "footer_email",

	// 		"label" => "Email",

	// 		"description" => "Email",

	// 		"default" => "Email: Sales@namhaiinox.com.vn",

	// 		"type" => "text"),

	// array(	"name" => "footer_website",

	// 		"label" => "Website",

	// 		"description" => "Website",

	// 		"default" => "Website: www.bulongnamhai.com",

	// 		"type" => "text"),



	// array(	"nameSection" => "Box menu liên kết"),

	// array(	"name" => "footer_title_lien_ket",

	// 		"label" => "Tiêu đề box liên kết",

	// 		"description" => "Tiêu đề in đậm phía trên",

	// 		"default" => "CHÍNH SÁCH BÁN HÀNG",

	// 		"partial" => ".footer-box-2",

	// 		"type" => "text"),



	// array(	"nameSection" => "Box bản đồ"),

	// array(	"name" => "footer_title_ban_do",

	// 		"label" => "Tiêu đề box bản đồ",

	// 		"description" => "Tiêu đề in đậm phía trên",

	// 		"default" => "BẢN ĐỒ",

	// 		"partial" => ".footer-box-3",

	// 		"type" => "text"),

	// array(	"name" => "footer_code_ban_do",

	// 		"label" => "Mã code bản đồ",

	// 		"description" => "Max code lấy từ google map",

	// 		"default" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0561850082076!2d105.7829330149188!3d21.030437785997403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ac865806f3%3A0xe622b11fb8df6b87!2sC%C3%B4ng+ty+TNHH+KEYSKY!5e0!3m2!1svi!2s!4v1558230378876!5m2!1svi!2s" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>',

	// 		"type" => "textarea"),



	// array(	"nameSection" => "Box kết nối"),

	// array(	"name" => "footer_title_ket_noi",

	// 		"label" => "Tiêu đề box kết nối",

	// 		"description" => "Tiêu đề in đậm phía trên",

	// 		"default" => "KẾT NỐI VỚI CHÚNG TÔI",

	// 		"partial" => ".footer-box-4",

	// 		"type" => "text"),

	// array(	"name" => "footer_facebook",

	// 		"label" => "Link Facebook",

	// 		"description" => "Điền link liên kết",

	// 		"default" => "#",

	// 		"type" => "text"),

	// array(	"name" => "footer_youtube",

	// 		"label" => "Link Youtube",

	// 		"description" => "Điền link liên kết",

	// 		"default" => "#",

	// 		"type" => "text"),

	// array(	"name" => "footer_instagram",

	// 		"label" => "Link Instagram",

	// 		"description" => "Điền link liên kết",

	// 		"default" => "#",

	// 		"type" => "text"),

	// array(	"name" => "footer_twitter",

	// 		"label" => "Link Twitter",

	// 		"description" => "Điền link liên kết",

	// 		"default" => "#",

	// 		"type" => "text"),

	// array(	"nameSection" => "Box bản quyền"),

	// array(	"name" => "footer_copyright",

	// 		"label" => "Bản quyền",

	// 		"description" => "Bản quyền",

	// 		"default" => "Copyright 2019 © Bulông Nam Hải",

	// 		"type" => "text"),

	// array(	"name" => "footer_dmca",

	// 		"label" => "Link dmca",

	// 		"description" => "Mã dmca",

	// 		"default" => "",

	// 		"type" => "text"),

	// array(	"name" => "footer_bct_check",

	// 		"label" => "Bật ảnh đăng ký bộ công thương",

	// 		"default" => 1,

	// 		"type" => "checkbox"),

	// array(	"name" => "footer_bct_image",

	// 		"label" => "Ảnh đk bct",

	// 		"description" => "Ảnh biểu tượng đăng ký",

	// 		"default" => "",

	// 		"type" => "image"),

	// array(	"name" => "footer_bct_link",

	// 		"label" => "Link bộ công thương",

	// 		"description" => "Link bộ công thương cấp cho website",

	// 		"default" => "#",

	// 		"type" => "text"),



);

$arrOpt = array_merge($arrOpt, $options);



?>