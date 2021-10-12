<?php get_header(); ?>
<div id="content" class="container search">
	<header class="page-header">
		<?php if ( have_posts() ) : ?>
			<h1 class="page-title">
			<?php
			    printf( __( 'Search Results For:  %s', 'tactun' ), '<span>' . get_search_query() . '</span>' );
			?>
			</h1>
			<h2 class="search-title">
		    	<?php echo $wp_query->found_posts; ?> <?php printf( __( ' hits on %s in entire website', 'locale' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h2>
		<?php else : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'tactun' ); ?></h1>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="content">

		<?php
		if ( have_posts() ) : while ( have_posts() ) :	the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile; 

			the_posts_pagination(
				array(
					'show_all'     => true,
					'screen_reader_text' => ' ', 
					'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous', 'tactun' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next', 'tactun' ) . '</span>',
				)
			);

		else :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tactun' ); ?></p>
			<?php
				get_search_form();

		endif;
		?>
	</div>
</div>
<?php get_footer();
