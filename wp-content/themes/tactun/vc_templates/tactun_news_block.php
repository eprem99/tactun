<?php 
	extract(shortcode_atts(array(
	    'news_title' => '',
        'news_category' => '',
	    'news_display' => '',
	), $atts));

// Post type query
$query = new WP_Query(array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'id',
            'terms'    => $news_category
        )
    ),
    'posts_per_page' => esc_attr( $news_display ),
    'order' => 'ASC',
));

?>

<?php if(!empty($news_title)){ ?>
    <div class="news_title"><?php echo $news_title; ?></div>
<?php } ?>
<div class="news-slider">
	<div class="swiper-wrapper">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
	$html = post_tags(get_the_id(), 'solution_categories');
    $tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true);
    $text = get_the_excerpt();

    ?>
    <div class="swiper-slide <?php echo $tags[0]->slug ?>">
    <div class="col-sm-12 pl-0 pr-0">
    	<div class="row flex-sm-column-reverse">
	    	<div class="col-md-5">
            <div class="news-block">
            	<div class="tags"><?php echo $html; ?></div>
    	        <div class="news-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    	        <div class="news-date"><?php the_date('d M o') ?></div>
    	        <div class="news-grid-text"><p><?php echo substr($text, 0, 142); ?></p></div>
                <div class="slider-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
            </div>
        </div>
        <div class="col-md-6 offset-md-1">
            <div class="news-grid-img"><?php the_post_thumbnail('tactun-image-374x257-cropped'); ?></div>
        </div>
        </div>
    </div>	
</div>
<style type="text/css">
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .post_tags {
        color: <?php echo $color; ?>;
    }
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon span::after, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon span::before, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-grid-name::before {
        background: <?php echo $color; ?> !important;
        color: <?php echo $color; ?>;
    }    
    .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon:hover span::after, .news-slider .swiper-wrapper .<?php echo $tags[0]->slug ?> .news-block .btn-icon:hover span::before{
        background: #6f7684 !important;
    } 
</style>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="swiper-pagination"></div>
</div>