<?php



$options = array(

	array("namePanel" => "Cấu hình Header"),

	array("nameSection" => "Header Top"),

	array(
		"name" => "text_top_header",

		"label" => "Nội dung trên header",

		"description" => "",

		"default" => "TP Solar - Đèn Năng Lượng Mặt Trời Chính Hãng",

		"partial" => ".text_header",

		"type" => "textarea"
	),


	array("nameSection" => "Header Main"),

	array(
		"name" => "logo",

		"label" => "Ảnh logo",

		"description" => "Upload và chọn ảnh cho logo(Tỉ lệ: 190x80px)",

		"partial" => ".header-logo",

		"default" => "",

		"type" => "image"
	),

	array(
		"name" => "text_hotline_header",

		"label" => "Nội dung số điện thoại",

		"description" => "",

		"partial" => "",

		"default" => "Hotline <br> 0363 993 993",

		"type" => "text"
	),


	array(
		"name" => "link_text_hotline_header",

		"label" => "link số điện thoại",

		"description" => "tel:.....sdt.....",

		"partial" => "",

		"default" => "tel:0363993993",

		"type" => "text"
	),


	array(
		"name" => "text_dl_header",

		"label" => "Nội dung đại lý",

		"description" => "",

		"partial" => "",

		"default" => "Hệ thống đại lý",

		"type" => "text"
	),

	array(
		"name" => "link_text_dl_header",

		"label" => "Link đại lý",

		"description" => "",

		"partial" => "",

		"default" => "#",

		"type" => "text"
	),

);

$arrOpt = array_merge($arrOpt, $options);





?>