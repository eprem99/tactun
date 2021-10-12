<?php
/**
 * Template Part for the BlogPage
 */
?>
<?php
    $text = get_the_excerpt( );
    ?>
<div class="mb-3 mt-1 col-md-4 col-sm-6 blog">    
<div class="posts-block">
    <div class="post-grid-img"><?php the_post_thumbnail('tactun-image-374x211-cropped'); ?></div>
    <div class="post-block">
        <div class="post-date"><?php echo get_the_date('d M o'); ?> <?php echo esc_html__( 'by ', 'tactun' ); ?> <?php the_author_meta( 'display_name'); ?></div>
        <div class="post-grid-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
        <div class="post-grid-text"><p><?php echo substr($text, 0, 150); ?></p></div>
        <div class="post-more"><a class="btn-icon" href="<?php the_permalink(); ?>"><span></span></a></div>
    </div>
</div>

</div>
