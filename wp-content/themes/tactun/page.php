<?php get_header(); ?>

	<div id="primary" class="container default">
		<?php
			while ( have_posts() ) :
				the_post(); ?>
 <h1 style="margin-top: 140px;"><?php the_title(); ?></h1>
	<?php			
                the_content();

			endwhile; // End the loop.
			?>
	</div>

<?php
get_footer();