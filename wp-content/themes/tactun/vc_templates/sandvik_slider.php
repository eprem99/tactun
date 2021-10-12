<?php extract(shortcode_atts(array(
     'tactun_window' => '',
     'tactun_tablet' => '',
     'tactun_mobile' => '',
), $atts));

	echo '<div class="swiper-container banner-slider">
            <div class="swiper-wrapper">';
	            echo do_shortcode( $content );
	echo '</div><div class="swiper-pagination"></div></div>';            


?>
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