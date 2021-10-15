<?php extract(shortcode_atts(array(
     'banner_slider_img' => '',
     'tactun_paralax' => '',
     'tactun_window' => '',
     'tactun_tablet' => '',
     'tactun_mobile' => '',
), $atts));

if(!empty($banner_slider_img)){
	$featured_img = wp_get_attachment_image_url( $banner_slider_img, 'full' );
       if($tactun_paralax != 1){
			echo '<div class="banner" style="background-image:url('.$featured_img.')">';
			echo '</div>';
      }else{
			echo '<div class="parallax-window banner" data-image-src="'.$featured_img.'">';
			echo '</div>';
      }
}else{
	echo '<div class="swiper-container banner-slider">
            <div class="swiper-wrapper">';
	            echo do_shortcode( $content );
	echo '</div><div class="swiper-pagination"></div></div>';            
}

?>
<?php if(empty($banner_slider_img)){ ?>
<style type="text/css" media="screen">
	<?php if(!empty($tactun_mobile)){ ?>
	@media (max-width: 760px){
		.swiper-container{
			height: <?php echo $tactun_mobile; ?>px;
		}
	}
	<?php } ?>
    <?php if(!empty($tactun_tablet)){ ?>
	@media (min-width: 770px){
		.swiper-container{
			height: <?php echo $tactun_tablet; ?>px;
		}
	}
	<?php } ?>
	<?php if(!empty($tactun_window)){ ?>
		@media (min-width: 1024px){
			.swiper-container{
				height: <?php echo $tactun_window; ?>px;
			}
		}
    <?php } ?>	
</style>
<?php }else{ ?>
<style type="text/css" media="screen">
	<?php if(!empty($tactun_mobile)){ ?>
	@media (max-width: 760px){
		.banner{
			height: <?php echo $tactun_mobile; ?>px;
		}
	}
	<?php } ?>
    <?php if(!empty($tactun_tablet)){ ?>
	@media (min-width: 770px){
		.banner{
			height: <?php echo $tactun_tablet; ?>px;
		}
	}
	<?php } ?>
	<?php if(!empty($tactun_window)){ ?>
		@media (min-width: 1024px){
			.banner{
				height: <?php echo $tactun_window; ?>px;
			}
		}
    <?php } ?>	


</style>
<?php } ?>