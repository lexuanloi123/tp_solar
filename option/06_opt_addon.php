<?php
$options = array (
	array(	"namePanel" => "Cấu hình kết nối"),
	
	array(	"nameSection" => "Chat box"),
	array(	"name" => "addon_code_chat",
			"label" => "Mã code chat",
			"description" => "Mã Facebook, Subiz, Vchat...",
			"default" => '',
			"type" => "textarea"),
	array(	"nameSection" => "Mã theo dõi"),
	array(	"name" => "pixel_fb_id",
			"label" => "Mã Facebook Pixel",
			"description" => "Chỉ điều mã ID Pixel(VD: 1607220466165111)",
			"default" => '',
			"type" => "text"),
	array(	"name" => "code_adword_id",
			"label" => "Mã bám đuổi Google Ads",
			"description" => "Chỉ điều mã ID (VD: AW-942094111)",
			"default" => '',
			"type" => "text"),
	array(	"name" => "google_verification",
			"label" => "Mã Webmaster Tool",
			"description" => "Chỉ điều mã ID (VD: eBEN2oVeQ4c-Zd_AgSCGRxa_mnnWtivSecHWPO3Gr5V)",
			"default" => '',
			"type" => "text"),
	array(	"name" => "google_analytics",
			"label" => "Mã Google Analytics",
			"description" => "Chỉ điều mã ID (VD: UA-35577111-1)",
			"default" => '',
			"type" => "text"),
			
	array(	"nameSection" => "Nút Click Call"),
	
	array(	"name" => "addon_phone_check",
			"label" => "Bật nút gọi điện",
			"default" => 1,
			"type" => "checkbox"),
	array(	"name" => "addon_phone_call",
			"label" => "Số điện thoại",
			"description" => "Số điện thoại sẽ gọi khi click",
			"default" => "099999999",
			"partial" => ".phonering-buton",
			"type" => "text"),
	array(	"name" => "addon_zalo_check",
			"label" => "Bật nút gọi zalo",
			"default" => 0,
			"type" => "checkbox"),
	array(	"name" => "addon_zalo_call",
			"label" => "Mã zalo",
			"description" => "Mã zalo sẽ gọi khi click",
			"default" => "099999999",
			"partial" => ".zaloring-buton",
			"type" => "text"),
			
	array(	"nameSection" => "Popup Quảng cáo"),
	
	array(	"name" => "addon_popup_check",
			"label" => "Bật Popup Quảng cáo",
			"default" => 0,
			"type" => "checkbox"),
	array(	"name" => "addon_popup_check_mobile",
			"label" => "Bật Popup Quảng cáo trên di động",
			"default" => 0,
			"type" => "checkbox"),
	array(	"name" => "addon_popup_img",
			"label" => "Ảnh popup",
			"description" => "Upload và chọn ảnh(Width tối đa: 800px)",
			"default" => "",
			"type" => "image"),
	array(	"name" => "addon_popup_link",
			"label" => "Liên kết",
			"description" => "Liên kết khi click ảnh",
			"default" => "#",
			"type" => "text"),
			
	array(	"nameSection" => "Banner Quảng cáo Sidebar trái"),
	array(	"name" => "addon_banner_sidebar_left_num",
			"label" => "Số banner bên trái",
			"description" => "Liên quan đến các ô bên dưới. Lưu xong nhấn F5 để số lượng nhập bên dưới cập nhật",
			"default" => "2",
			'choices' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7','8' => '8', ),
			"type" => "select"),			
	array(	"name" => "addon_banner_sidebar_left_img",
			"label" => "Ảnh banner trái",
			"description" => "Ảnh banner quảng cáo(Tỉ lệ: 250x25px)",
			"default" => "",
			"repeat" => "addon_banner_sidebar_left_num",
			"type" => "image"),
	array(	"name" => "addon_banner_sidebar_left_link",
			"label" => "Liên kết banner",
			"description" => "Liên kết khi click ảnh",
			"default" => "#",
			"repeat" => "addon_banner_sidebar_left_num",
			"type" => "text"),
			
	array(	"nameSection" => "Banner Quảng cáo Sidebar phải"),
	array(	"name" => "addon_banner_sidebar_right_num",
			"label" => "Số banner bên phải",
			"description" => "Liên quan đến các ô bên dưới. Lưu xong nhấn F5 để số lượng nhập bên dưới cập nhật",
			"default" => "1",
			'choices' => array('0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7','8' => '8', ),
			"type" => "select"),			
	array(	"name" => "addon_banner_sidebar_right_img",
			"label" => "Ảnh banner phải",
			"description" => "Ảnh banner quảng cáo(Tỉ lệ: 500x500px)",
			"default" => "",
			"repeat" => "addon_banner_sidebar_right_num",
			"type" => "image"),
	array(	"name" => "addon_banner_sidebar_right_link",
			"label" => "Liên kết banner",
			"description" => "Liên kết khi click ảnh",
			"default" => "#",
			"repeat" => "addon_banner_sidebar_right_num",
			"type" => "text"),
			
			
);
$arrOpt=array_merge($arrOpt,$options);

?>