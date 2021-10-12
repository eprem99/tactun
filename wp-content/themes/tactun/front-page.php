<?php 
/*  Template Name: Front page */
    get_header( );
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