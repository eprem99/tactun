<?php 
/*  Template Name: Title display */
    get_header( );
?>

	<div id="primary" class="container solution">
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