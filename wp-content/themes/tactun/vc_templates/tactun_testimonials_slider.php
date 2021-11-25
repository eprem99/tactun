<?php 
	extract(shortcode_atts(array(
	    'testimonials_title' => '',
	    'testimonials_display' => '',
	), $atts));

// Post type query
$query = new WP_Query(array(
    'post_type' => 'testimonials',
    'posts_per_page' => esc_attr( $testimonials_display ),
    'order' => 'ASC',
));

?>

<div id="testimonial" class="swiper-container">
	<div class="swiper-wrapper">
    <?php if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); 
    $text = get_the_excerpt();
    $name = get_post_meta(get_the_ID(), 'testimonial_name', true )
    ?>
    <div class="swiper-slide">
    <div class="col-sm-12 pl-0 pr-0">
    	<div class="row">
        <div class="col-md-1 col-4">
            <div class="news-grid-img"><?php the_post_thumbnail('tactun-image-374x257-cropped'); ?></div>
        </div>
        <div class="col-md-11 col-8">
            <div class="testimional-name"><?php echo $name; ?></div>
            <div class="testimional-title"><?php the_title(); ?></div>
        </div>
        <div class="col-md-12">
        <div class="news-block">
            <div class="testimional-text"><svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0 6.65198C0 5.38913 0.567164 3.96476 1.70149 2.37885C2.83582 0.792951 3.68657 0 4.25373 0C4.79104 0 5.0597 0.176212 5.0597 0.528635C5.0597 0.675478 4.92537 1.17474 4.65672 2.02643C4.41791 2.84875 4.29851 3.45081 4.29851 3.8326C4.29851 4.21439 4.40298 4.46402 4.61194 4.5815C5.56716 5.22761 6.04478 6.18209 6.04478 7.44493C6.04478 8.20852 5.74627 8.82526 5.14925 9.29515C4.58209 9.76505 3.83582 10 2.91045 10C0.970149 10 0 8.884 0 6.65198ZM8.95522 6.65198C8.95522 5.38913 9.52239 3.96476 10.6567 2.37885C11.791 0.792951 12.6418 0 13.209 0C13.7463 0 14.0149 0.176212 14.0149 0.528635C14.0149 0.675478 13.8806 1.17474 13.6119 2.02643C13.3731 2.84875 13.2537 3.45081 13.2537 3.8326C13.2537 4.21439 13.3582 4.46402 13.5672 4.5815C14.5224 5.22761 15 6.18209 15 7.44493C15 8.20852 14.7015 8.82526 14.1045 9.29515C13.5373 9.76505 12.791 10 11.8657 10C9.92537 10 8.95522 8.884 8.95522 6.65198Z" fill="#363F46"/>
</svg><p><?php echo substr($text, 0, 250); ?></p></div>
        </div>
        </div>
        </div>
    </div>	
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-f999cc2c3f6991026" aria-disabled="true"></div>
<div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-f999cc2c3f6991026" aria-disabled="false"></div>
<div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"></div>
</div>