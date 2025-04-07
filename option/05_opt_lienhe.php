<?php

$options = array(

	array("namePanel" => "Trang liên hệ"),


	array("nameSection" => "Thông tin", "link" => "lien-he"),

	array(
		"name" => "sl_dc_lh",

		"label" => "Số lượng thông tin hiển thị",

		"description" => "",

		"default" => "3",

		'choices' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', ),

		"partial" => ".left_lh",

		"type" => "select"
	),

	array(
		"name" => "ten_lh",

		"label" => "Tiêu đề nội dung",

		"description" => "",

		"default" => "",

		"repeat" => "sl_dc_lh",

		"type" => "text"
	),

	array(
		"name" => "nd_lh",

		"label" => "Nội dung",

		"description" => "",

		"default" => "",

		"repeat" => "sl_dc_lh",

		"type" => "textarea"
	),

	array(
		"name" => "link_nd_lh",

		"label" => "Link nội dung",

		"description" => "",

		"default" => "",

		"repeat" => "sl_dc_lh",

		"type" => "text"
	),

	array(
		"name" => "nd_cn",

		"label" => "Nội dung chứng nhận",

		"description" => "",

		"default" => "",

		"type" => "textarea"
	),

	array(
		"name" => "form_lh",

		"label" => "Form liên hệ",

		"description" => "",

		"default" => "",

		"type" => "textarea"
	),

	array("nameSection" => "GG map", "link" => "lien-he"),

	array(
		"name" => "link_map",

		"label" => "Mã gg map",

		"description" => "",

		"default" => "",

		"partial" => ".right_lh",

		"type" => "textarea"
	),


	array("namePanel" => "Trang hệ thống"),


	array("nameSection" => "Nội dung hệ thống", "link" => "he-thong-trung-tam"),

	array(
		"name" => "sl_box_ht",

		"label" => "Số lượng hệ  thông",

		"description" => "",

		"default" => "4",

		'input_attrs' => array(

			'min' => 0,

			'max' => 4,

			'step' => 1,

		),

		"partial" => ".item_page_tt",

		"type" => "number"
	),

	array(
		"name" => "title_ht",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "",

		"repeat" => "sl_box_ht",

		"type" => "text"
	),

	array(
		"name" => "so_title_ht",

		"label" => "Số lượng",

		"description" => "",

		"default" => "",

		"repeat" => "sl_box_ht",

		"type" => "text"
	),

	array("namePanel" => "Trang đăng ký"),

	array("nameSection" => "Banner login / register", "link" => "register"),

	array(
		"name" => "banner_lo",

		"label" => "Tải ảnh",

		"description" => "",

		"default" => "",

		"type" => "image"
	),




	// array(	"name" => "lienhe_code_ban_do",

	// 		"label" => "Mã code bản đồ",

	// 		"description" => "Max code lấy từ google map",

	// 		"partial" => ".lien-he-left",

	// 		"default" => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0561850082076!2d105.7829330149188!3d21.030437785997403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ac865806f3%3A0xe622b11fb8df6b87!2sC%C3%B4ng+ty+TNHH+KEYSKY!5e0!3m2!1svi!2s!4v1558230378876!5m2!1svi!2s" width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>',

	// 		"type" => "textarea"),

	// array(	"nameSection" => "Thiết lập form liên hệ", "link" => "lien-he"),

	// array(	"name" => "lienhe_form_title",

	// 		"label" => "Tiêu đề box form liên hệ",

	// 		"description" => "Nhập tiêu đề",

	// 		"default" => "LIÊN HỆ",

	// 		"type" => "text",

	// 		"partial"=>".contact-form-lh"),

	// array(	"name" => "form_lh_shortcode",

	// 		"label" => "Mã code form liên hệ",

	// 		"description" => "Nhập mã shortcode contactform (vd: [contact-form-7 id=\"289\" title=\"Form liên hệ 1\"])",

	// 		"default" => "[contact-form-7 id=\"289\" title=\"Form liên hệ 1\"]",

	// 		"type" => "textarea"),



	// array(	"nameSection" => "Thông tin liên hệ", "link" => "lien-he"),

	// array(	"name" => "lienhe_tt_title",

	// 		"label" => "Tiêu đề box thông tin",

	// 		"description" => "Tiêu đề box",

	// 		"default" => "THÔNG TIN LIÊN HỆ",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_company",

	// 		"label" => "Tên công ty",

	// 		"description" => "Tên công ty",

	// 		"default" => "Công Ty TNHH Đầu Tư Thương Mại Và Xuất Nhập Khẩu Nam Hải",

	// 		"partial" => ".content-lienhe",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_dia_chi",

	// 		"label" => "Địa chỉ",

	// 		"description" => "Địa chỉ",

	// 		"default" => "Địa chỉ: Số nhà 1037 Đường Giải Phóng, Phường Thịnh Liệt, Quận Hoàng Mai, TP. Hà Nội",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_phone",

	// 		"label" => "Số điện thoại",

	// 		"description" => "Số điện thoại",

	// 		"default" => "Tel: 0977.260.612",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_email",

	// 		"label" => "Email",

	// 		"description" => "Email",

	// 		"default" => "Email: Sales@namhaiinox.com.vn",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_website",

	// 		"label" => "Website",

	// 		"description" => "Website",

	// 		"default" => "Website: www.bulongnamhai.com",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_time",

	// 		"label" => "Thời gian làm việc",

	// 		"description" => "Thời gian làm việc",

	// 		"default" => "Thời gian làm việc: Thứ 2 – Thứ 7 / 8:00 AM – 17:00 PM",

	// 		"type" => "text"),

	// array(	"name" => "lienhe_mst",

	// 		"label" => "Mã số thuế",

	// 		"description" => "Mã số thuế",

	// 		"default" => "Mã số thuế: 0108190187",

	// 		"type" => "text"),



);

$arrOpt = array_merge($arrOpt, $options);



?>