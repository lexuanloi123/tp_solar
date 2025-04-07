<?php



$options = array(

	array("namePanel" => "Trang bán hàng"),

	array("nameSection" => "Trang chi tiết sản phẩm"),

	array(
		"name" => "form_pro_lh",

		"label" => "Form đặt hàng",

		"description" => "",

		"default" => "",

		"partial" => ".form_single_pro",

		"type" => "textarea"
	),

	array(
		"name" => "title_pro_lh",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Hỗ trợ mua hàng:",

		"partial" => ".hotline_single",

		"type" => "text"
	),

	array(
		"name" => "sdt_pro_lh",

		"label" => "Số điện thoại",

		"description" => "",

		"default" => "0363 993 993",

		"type" => "text"
	),

	array(
		"name" => "link_sdt_pro_lh",

		"label" => "Link số điện thoại",

		"description" => "",

		"default" => "#",

		"type" => "text"
	),

);

$arrOpt = array_merge($arrOpt, $options);





?>