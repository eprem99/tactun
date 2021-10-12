<?php 
	extract(shortcode_atts(array(
	    'team_title' => '',
	    'team_display' => '',
	    'team_per_row' => '',
	), $atts));

// Post type query
$query = new WP_Query(array(
    'post_type' => 'team',
    'posts_per_page' => esc_attr( $team_display ),
    'order' => 'ASC',
));

?>

<?php if(!empty($team_title)){ ?>
<div class="team_title"><?php echo $team_title; ?></div>
<?php } ?>
<div class="row">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
    ?>

    <div class="mb-4 <?php echo $team_per_row; ?>">
    	<div class="theme-grid">
	    	<div class="theme-grid-img"><?php the_post_thumbnail(); ?></div>
	        <div class="theme-grid-name"><?php the_title(); ?></div>
	        <div class="theme-grid-text"><?php the_content( ); ?></div>
        </div>
    </div>	

<?php endwhile; wp_reset_postdata(); endif; ?>    
</div>