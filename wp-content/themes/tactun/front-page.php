<?php 
/*  Template Name: Front page */
    get_header( );
?>
	<?php
		$mytheme_slider = get_post_meta(get_the_ID(), 'slider', true); //in case it is a post/page option 

		if(shortcode_exists("rev_slider") && !empty($mytheme_slider)){ 
			echo '<div class="slider-top">'.do_shortcode('[rev_slider '.$mytheme_slider.']');
			echo '<div class="decor-top"><svg class="decor" height="100%" preserveAspectRatio="none" version="1.1" viewBox="0 0 100 100" width="100%" xmlns="http://www.w3.org/2000/svg"><path d="M0 100 L100 0 L100 100" stroke-width="0"></path></svg></div>';
		    echo '</div>';
		}
	?>
	<div id="primary" class="container">
		<?php
			while ( have_posts() ) :
				the_post();

				the_content( );


			endwhile; // End the loop.
			?>
	</div>
<?php 
    get_footer( );
?>