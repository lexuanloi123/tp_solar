<?php

$options = array(

	array("namePanel" => "Màu sắc, Trang trí"),



	array("nameSection" => "Màu trang web"),


	array(
		"name" => "css_main_color_header",

		"label" => "Màu header top",

		"description" => "",

		"default" => "#003a9f",

		"type" => "color"
	),

	array(
		"name" => "css_main_color_header_m",

		"label" => "Màu header",

		"description" => "",

		"default" => "#ffb600",

		"type" => "color"
	),

	array(
		"name" => "css_main_color_cd",

		"label" => "Màu chủ đạo",

		"description" => "",

		"default" => "#003a9f",

		"type" => "color"
	),

	array(
		"name" => "css_main_color_button",

		"label" => "Màu trang liên hệ",

		"description" => "",

		"default" => "#ee1c27",

		"type" => "color"
	),

	array(
		"name" => "css_main_color_tc",

		"label" => "Màu thứ cấp",

		"description" => "",

		"default" => "#ffb600",

		"type" => "color"
	),

	array(
		"name" => "css_main_color_sidebar",

		"label" => "Màu sidebar",

		"description" => "",

		"default" => "#ee1c27",

		"type" => "color"
	),





	// array(
	// 	"name" => "css_main_color",

	// 	"label" => "Màu chủ đạo",

	// 	"description" => "Màu chính của web(Mặc đinh: #018791)",

	// 	"default" => "#018791",

	// 	"type" => "color"
	// ),

	// array(
	// 	"name" => "css_sub_color",

	// 	"label" => "Màu thứ cấp",

	// 	"description" => "Màu thứ cấp của web, nhạt hơn màu chính(Mặc đinh: #1FBBC6)",

	// 	"default" => "#1FBBC6",

	// 	"type" => "color"
	// ),

	// array(
	// 	"name" => "css_rev_color",

	// 	"label" => "Màu tương phản",

	// 	"description" => "Màu đảo màu chính, dùng cho hover(Mặc đinh: #f37022)",

	// 	"default" => "#f37022",

	// 	"type" => "color"
	// ),

	array("nameSection" => "Kích thước layout"),

	array(
		"name" => "css_layout_width",

		"label" => "Độ rộng khung chính",

		"description" => "Độ rộng tối đa(Mặc đinh: 1240px)",

		"default" => "1240px",

		"type" => "text"
	),

	array(
		"name" => "css_fixed_menu",

		"label" => "Cố định menu header",

		"description" => "Cố định menu header khi cuộn trang",

		"default" => "0",

		"type" => "checkbox"
	),





);

$arrOpt = array_merge($arrOpt, $options);



?>