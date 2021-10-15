<?php 
extract(shortcode_atts(array(
	'solution_title' => '',
    'solution_description' => '',
    'solution_category' => '',
    'solution_per_row' => '',
    'solution_display' => '',
), $atts));

// Post type query
$query = new WP_Query(array(
    'post_type' => 'solution',
    'tax_query' => array(
        array(
            'taxonomy' => 'solution_categories',
            'field'    => 'id',
            'terms'    => $solution_category
        )
    ),
    'posts_per_page' => esc_attr( $solution_display ),
    'order' => 'ASC',
    'orderby' => 'id'
));   

?>
<?php if(!empty($solution_title)){ ?>
    <div class="solutions_title"><?php echo $solution_title; ?></div>
<?php } ?>
<?php if(!empty($solution_description)){ ?>
    <div class="solutions_description"><?php echo $solution_description; ?></div>
<?php } ?>
<div class="row solution posts">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
    $tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true); 
       $text =  get_the_excerpt( );
    ?>

    <div class="mb-4 <?php echo $solution_per_row; ?> <?php echo $tags[0]->slug ?>">
        <div class="solution-grid">
            <a href="<?php the_permalink(); ?>">
            <div class="solution-grid-img" style="background-image: url(<?php the_post_thumbnail_url('tactun-image-374x257-cropped'); ?>)"></div>
            <div class="solution-block">
                <div class="solution-grid-name"><?php the_title(); ?></div>
                <div class="solution-grid-text"><p><?php echo substr($text, 0, 200) ?></p></div>
                <span class="btn-icon"><span></span></span>
            </div>
            </a>
        </div>
<style type="text/css">
    .solution .mb-4.<?php echo $tags[0]->slug ?> .solution-grid::after{
       background-color: <?php echo $color; ?>;
    }
    .solution .mb-4.<?php echo $tags[0]->slug ?> .solution-grid{
        color: <?php echo $color; ?>;
        border-color: <?php echo $color; ?>;
    }

</style>  
    </div>  <?php endwhile; wp_reset_postdata(); endif; ?>
</div>

