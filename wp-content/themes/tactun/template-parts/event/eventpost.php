<?php
	$tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true);
	$html = post_tags(get_the_id(), 'solution_categories');
    $text = get_the_excerpt( );
    $imgid = get_post_meta( get_the_ID(), 'event_image', true );
    $image = wp_get_attachment_url( $imgid, 'tactun-image-374x211-cropped' );
    ?>
<div class="mb-3 mt-1 event">    
<div class="posts-block <?php echo $tags[0]->slug ?>">
    <div class="post-grid-img"><?php 
        if(!empty($image)){ ?> 
         <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
        <?php }else{ ?>
        <?php the_post_thumbnail('tactun-image-374x211-cropped'); } ?></div>
    <div class="post-block">
    	<div class="post-date"><?php the_date('d M o'); ?></div>
        <div class="post-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="post-grid-text"><p><?php echo substr($text, 0, 150); ?></p></div>
        <div class="post-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
    </div>
</div>
<!-- <style type="text/css">
    .<?php // echo $tags[0]->slug ?> .post-more a span::after, 
    .<?php //  echo $tags[0]->slug ?> .post-more a span::before {
        background: <?php // echo $color; ?>;
    }
    .<?php // echo $tags[0]->slug ?> .post_tags,
    .<?php // echo $tags[0]->slug ?> .post-date{
        color: <?php // echo $color; ?>;
    }
</style> -->

</div>