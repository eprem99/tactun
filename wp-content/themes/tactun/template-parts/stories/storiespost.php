<?php
    $text =  get_the_excerpt( );
    $html = post_tags(get_the_id(), 'solution_categories');
?>
<div class="posts-block">
    <div class="post-grid-img"><?php the_post_thumbnail('tactun-image-374x211-cropped'); ?></div>
    <div class="post-block">
        <div class="tags"><?php echo $html; ?></div>
        <div class="post-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="post-grid-text"><p><?php echo substr($text, 0, 120); ?></p></div>
        <div class="post-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
    </div>
</div>