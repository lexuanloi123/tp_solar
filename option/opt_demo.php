<?php



$options = array (

	array(	"namePanel" => "Panel Demo"),

	

	array(	"nameSection" => "Section Demo 1"),

	

	array(	"name" => "demo_text",

			"label" => "Demo text",

			"description" => "Demo description text",

			"default" => "Demo text default",

			"type" => "text"),

			

	array(	"name" => "demo_textarea",

			"label" => "Demo textarea",

			"description" => "Demo description textarea",

			"default" => 'Demo textarea default',

			"type" => "textarea"),

			

	array(	"nameSection" => "Section Demo 2"),

	

	array(	"name" => "demo_radio",

			"label" => "Demo radio",

			"description" => "Demo description radio",

			"default" => "radio_2",

			'choices' => array(

				'radio_1' => 'Radio 1',

				'radio_2' => 'Radio 2',

				'radio_3' => 'Radio 3',

				'radio_4' => 'Radio 4',

			),

			"type" => "radio"),

			

	array(	"name" => "demo_select",

			"label" => "Demo select",

			"description" => "Demo description select",

			"default" => "choices_2",

			'choices' => array(

				'choices_1' => 'Choices 1',

				'choices_2' => 'Choices 2',

				'choices_3' => 'Choices 3',

				'choices_4' => 'Choices 4',

			),

			"type" => "select"),

			

	array(	"name" => "demo_number",

			"label" => "Demo number",

			"description" => "Demo description number",

			"default" => "700",

			'input_attrs' => array(

				'min' => 0,

				'max' => 2000,

				'step' => 1,

			),

			"type" => "number"),

			

	array(	"name" => "demo_checkbox",

			"label" => "Demo checkbox",

			"description" => "Demo description checkbox",

			"default" => 1,

			"type" => "checkbox"),

			

			

	array(	"name" => "demo_color",

			"label" => "Demo color",

			"description" => "Demo description color",

			"default" => "#1C76A8",

			"type" => "color"),

			

	array(	"name" => "demo_image",

			"label" => "Demo image",

			"description" => "Demo description image",

			"default" => "",

			"type" => "image"),

	// Chế độ repeat

	array(	"name" => "home_number_doi_tac",

			"label" => "Số đối tác sẽ hiển thị",

			"description" => "Liên quan đến các ô bên dưới. Lưu xong nhấn F5 để số lượng nhập bên dưới cập nhật",

			"default" => "6",

			'choices' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7','8' => '8', ),

			"type" => "select"),			

	array(	"name" => "home_image_doitac",

			"label" => "Ảnh đối tác",

			"description" => "Ảnh đối tác, khách hàng thân thiết",

			"default" => "",

			"repeat" => "home_number_doi_tac",

			"type" => "image"),

	// Chọn danh mục sản phẩm drop_product_cat và drop_cat

	array("name" => "home_category",

			"label" => "Danh mục sẽ hiển thị",

			"description" => "Danh mục hiển thị",

			"default" => "",

			"repeat" => "home_number_danh_muc",

			"type" => "drop_product_cat"),

);

//$arrOpt=array_merge($arrOpt,$options);



?>