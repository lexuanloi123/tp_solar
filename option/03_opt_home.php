<?php

$options = array(

	array("namePanel" => "Trang chủ"),

	array("nameSection" => "Thiết lập banner"),

	array(
		"name" => "tat_1",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "banner_home",

		"label" => "Ảnh banner",

		"description" => "",

		"default" => "",

		"partial" => ".banner_home",

		"type" => "image"
	),

	array(
		"name" => "link_banner_home",

		"label" => "Link ảnh banner",

		"description" => "",

		"default" => "",

		"type" => "text"
	),

	array("nameSection" => "Thiết lập slider"),

	array(
		"name" => "tat_2",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "sl_slider_home",

		"label" => "Số lượng silder hiển thị",

		"description" => "",

		"default" => "4",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),
		"partial" => ".slider_home",

		"type" => "number"
	),

	array(
		"name" => "img_slider",

		"label" => "Ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_slider_home",

		"type" => "image"
	),

	array(
		"name" => "link_img_slider",

		"label" => "Link ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_slider_home",

		"type" => "text"
	),


	array("nameSection" => "Thiết lập box bảo hành"),

	array(
		"name" => "tat_3",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "sl_bh_home",

		"label" => "Số lượng box hiển thị",

		"description" => "",

		"default" => "4",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),
		"partial" => ".content_guarantee",

		"type" => "number"
	),

	array(
		"name" => "img_gua",

		"label" => "Ảnh thứ ",

		"description" => "32 x 32 px",

		"default" => "",

		"repeat" => "sl_bh_home",

		"type" => "image"
	),

	array(
		"name" => "link_img_gua",

		"label" => "Nội dung thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_bh_home",

		"type" => "text"
	),

	array("nameSection" => "Thiết lập danh mục"),

	array(
		"name" => "tat_4",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_cate_home",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Danh mục sản phẩm",

		"partial" => ".box_cate_home",

		"type" => "text"
	),


	array("nameSection" => "Thiết lập video"),

	array(
		"name" => "tat_5",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_video_home",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Video Review",

		"partial" => ".box_video",

		"type" => "text"
	),

	array(
		"name" => "cate_video",

		"label" => "Chọn danh mục video",

		"description" => " ( danh mục có video youtube ) ",

		"default" => "",

		"type" => "drop_cat"
	),

	array(
		"name" => "sl_video",

		"label" => "Số lượng video hiển thị",

		"description" => "",

		"default" => "5",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"type" => "number"
	),


	array("nameSection" => "Thiết lập box sale"),

	array(
		"name" => "tat_6",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_sale_home",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "FLASH SALE",

		"partial" => ".box_sale",

		"type" => "text"
	),

	array(
		"name" => "link_title_sale_home",

		"label" => "Link tiêu đề",

		"description" => "",

		"default" => "FLASH SALE",

		"type" => "text"
	),

	array(
		"name" => "nd_sale",

		"label" => "Nội dung",

		"description" => "",

		"default" => "MIỄN PHÍ GIAO HÀNG TẬN NHÀ",

		"type" => "textarea"
	),



	array("nameSection" => "Thiết lập box sản phẩm (4)"),

	array(
		"name" => "tat_7",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "sl_img_pro",

		"label" => "Số lượng danh mục hiển thị",

		"description" => "",

		"default" => "2",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"partial" => ".box_img_left",

		"type" => "number"
	),

	array(
		"name" => "cate_img",

		"label" => "Danh mục thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_pro",

		"type" => "drop_product_cat"
	),

	array(
		"name" => "img_cate_1",

		"label" => "Ảnh thứ (1)",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_pro",

		"type" => "image"
	),

	array(
		"name" => "link_img_cate_1",

		"label" => "Link ảnh thứ (1)",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_pro",

		"type" => "text"
	),

	array(
		"name" => "img_cate_2",

		"label" => "Ảnh thứ (2)",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_pro",

		"type" => "image"
	),

	array(
		"name" => "link_img_cate_2",

		"label" => "Link ảnh thứ (2)",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_pro",

		"type" => "text"
	),


	array("nameSection" => "Thiết lập box sản phẩm (6)"),

	array(
		"name" => "tat_8",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "sl_pro_list",

		"label" => "Số lượng danh mục hiển thị",

		"description" => "",

		"default" => "2",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"partial" => ".box_pro_list",

		"type" => "number"
	),

	array(
		"name" => "cate_pro_list",

		"label" => "Danh mục thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_pro_list",

		"type" => "drop_product_cat"
	),

	array("nameSection" => "Thiết lập box chúng tôi"),

	array(
		"name" => "tat_9",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_we",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "BÁO ĐÀI NÓI GÌ VỀ CHÚNG TÔI ?",

		"partial" => ".box_we",

		"type" => "text"
	),

	array(
		"name" => "sl_we",

		"label" => "Số lượng ảnh hiển thị",

		"description" => "",

		"default" => "7",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"type" => "number"
	),

	array(
		"name" => "img_we",

		"label" => "Ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_we",

		"type" => "image"
	),

	array(
		"name" => "link_img_we",

		"label" => "Link ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_we",

		"type" => "text"
	),

	array("nameSection" => "Thiết lập box khách hàng"),

	array(
		"name" => "tat_10",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),

	array(
		"name" => "title_client",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "Khách hàng với TP Solar",

		"partial" => ".box_client",

		"type" => "text"
	),

	array(
		"name" => "sl_client",

		"label" => "Số lượng box hiển thị",

		"description" => "",

		"default" => "3",

		'input_attrs' => array(

			'min' => 0,

			'max' => 10,

			'step' => 1,

		),

		"type" => "number"
	),

	array(
		"name" => "img_client",

		"label" => "Ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_client",

		"type" => "image"
	),

	array(
		"name" => "ten_client",

		"label" => "Tên khách hàng thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_client",

		"type" => "text"
	),

	array(
		"name" => "nghe_client",

		"label" => "Nghề nghiệp thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_client",

		"type" => "text"
	),

	array(
		"name" => "content_client",

		"label" => "Nội dung thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_client",

		"type" => "textarea"
	),


	array("nameSection" => "Thiết lập khách hàng sử dụng"),

	array(
		"name" => "tat_11",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),


	array(
		"name" => "title_img_home",

		"label" => "Tiêu đề",

		"description" => "",

		"default" => "+78.000 Khách hàng đã sử dụng",

		"partial" => ".box_img",

		"type" => "text"
	),

	array(
		"name" => "sl_img_home",

		"label" => "Số lượng ảnh hiển thị",

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
		"name" => "img_home",

		"label" => "Ảnh thứ ",

		"description" => "",

		"default" => "",

		"repeat" => "sl_img_home",

		"type" => "image"
	),


	array("nameSection" => "Thiết lập bài viết"),

	array(
		"name" => "tat_12",

		"label" => "Bật tắt",

		"description" => "",

		"default" => 1,

		"type" => "checkbox"
	),


	array(
		"name" => "cate_post_home",

		"label" => "Danh mục bài viết hiển thị",

		"description" => "",

		"default" => "",

		"partial" => ".box_post",

		"type" => "drop_cat"
	),






);

$arrOpt = array_merge($arrOpt, $options);



?>