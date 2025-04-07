<!-- Update: 30/11/22 !-->
<!-- Khu vực code các chức năng bổ sung !-->
<div id="bttop" title="Lên đầu trang" class="fa fa-chevron-up">
<script type='text/javascript'>
jQuery(function() {
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() != 0) {
			jQuery('#bttop').fadeIn();
		} else {
			jQuery('#bttop').fadeOut();
		}
	});
   jQuery('#bttop').click(function() {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 600);
	});
});
</script>
</div>
<?php if(CSVR_PACKAGE_ID>1 || CSVR_STATUS=='trying'){ // Chỉ gói B trở lên mới hiện. Nếu mua thì bỏ chỗ này ra ?>
	<div class="hotline">
	<?php if(_opt('addon_phone_check')===true){ ?>
		<div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show phonering-buton">
			<div class="phonering-alo-ph-circle"></div>
			<div class="phonering-alo-ph-circle-fill"></div>
			<a class="pps-btn-img " title="Liên hệ" href="tel:<?php echo _opt('addon_phone_call'); ?>">
				<div class="phonering-alo-ph-img-circle">	
				</div>
			</a>
		</div>
	<?php } ?>
	<?php if(_opt('addon_zalo_check')===true){ ?>
		<div id="phonering-zalo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show zaloring-buton">
			<div class="phonering-alo-ph-circle"></div>
			<div class="phonering-alo-ph-circle-fill"></div>
			<a class="pps-btn-img " title="zalo" href="https://zalo.me/<?php echo _opt('addon_zalo_call'); ?>" target="_blank">
				<div class="phonering-alo-ph-img-circle">	
				</div>
			</a>
		</div>
	<?php } ?>
	</div>
	<?php if(_opt('addon_popup_check')===true){ ?>
	<div class="kw-popup-overlay"></div>
	<div class="kw-popup">
		<div class="kw-popup-inner">
			<div class="close-popup-note">Popup sẽ tự đóng sau <span>10</span>s</div>
			<i class="fa fa-times close-popup"></i>
			<a class="link_popup" href="<?php echo _opt('addon_popup_link'); ?>">
				<img loading="lazy" src="<?php echo _opt('addon_popup_img'); ?>" title="<?php echo esc_attr(bloginfo('name')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
			</a>
		</div>
	</div>
	<?php } ?>
	<?php if(_opt('addon_popup_check_mobile')!==true){ ?>
	<style type="text/css">
	@media only screen and (max-width: 768px) {
	.kw-popup, .kw-popup-overlay {
		display: none !important;
	}
	}
	</style>
	<?php } ?>
	<script type='text/javascript'>
	jQuery(document).ready(function($) {
		// Hàm lấy value cooke theo tên
		  function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
			  var c = ca[i];
			  while (c.charAt(0) == ' ') {
				c = c.substring(1);
			  }
			  if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			  }
			}
			return "";
		  }
		 // Khởi tạo value cookie và tên.
		  function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		  }
		  // Kiểm tra đã có cookie hay chưa đưa ra action.
			if(getCookie('popupCookie') != 'closed' ){
				setTimeout(function(event){
					jQuery('.kw-popup, .kw-popup-overlay').show();
				}, 1000);
			}
			// Sự kiện click close popup và gán giá trị cho cookie
			jQuery('.kw-popup').on('click','.close-popup, .link_popup',function(event){
				jQuery('.kw-popup, .kw-popup-overlay').hide();
				setCookie( 'popupCookie', 'closed', 1 );
			});
			var autoClose = setInterval(function(){
				jQuery('.close-popup-note span').text(parseInt(jQuery('.close-popup-note span').text())-1);
			},1000);
			setTimeout(function(){
				jQuery('.kw-popup, .kw-popup-overlay').hide();
				clearInterval(autoClose);
			},10000);
		});
	</script>
<?php } ?>
<!-- Khu vực thêm các mã kết nối !-->
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '<?php echo _opt("pixel_fb_id"); ?>');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo _opt('pixel_fb_id'); ?>&ev=PageView&noscript=1" alt="noscript" title="noscript"/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Ads: 942094795  AW-942094795 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo _opt('code_adword_id'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo _opt("code_adword_id"); ?>');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo _opt('google_analytics'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo _opt('google_analytics'); ?>');
</script>

<!-- Thêm chat box -->
<?php if (_opt('addon_code_chat')) echo _opt('addon_code_chat'); ?>