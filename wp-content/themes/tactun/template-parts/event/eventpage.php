<?php
/**
 * Template Part for Single BlogPosts
 */
$tags = get_the_terms(get_the_id(), 'country_categories');
$cat = get_the_terms(get_the_id(), 'solution_categories');
$html = post_tags(get_the_id(), 'solution_categories');
$color = get_term_meta($cat[0]->term_id, 'category_color', true);
// $id = $tags[0]->term_id;
$link = get_category_link( $id );
$regen = get_post_meta( get_the_ID(), 'event_link', true );
$reg = get_post_meta( get_the_ID(), 'event_register', true );
$value = rwmb_meta( 'event-start-date' );
$startdate = get_post_meta( get_the_ID(), 'event-start-date', true );
$enddate = get_post_meta( get_the_ID(), 'event-end-date', true );
$text = get_the_excerpt();
?>

<div class="breadcrumb">
    <?php echo $html; ?>
</div>
<div class="author-by">
    <?php echo esc_html__( 'Event Date: ', 'tactun' ); ?> <?php the_date('d M o'); ?>
</div>
<!-- Post title -->
<h1 class="blogpost-title">
    <?php the_title(); ?>
</h1>
<div class="row register-block">
    <div class="col-12">
       <div id="addevent" class="btn btn-success addevent" data-event='{
                                "title":"<?php the_title(); ?>", 
                                "start":"<?php echo $startdate; ?>", 
                                "end":"<?php echo $enddate; ?>", 
                                "desc":"<?php echo $text; ?>",
                                "location":"<?php echo $tags[0]->name; ?>"
                                }'><span><?php echo esc_html__( 'ADD TO CALENDAR', 'tactun' ); ?></span></div>
       <?php if($regen == true) { ?>
             <a target="blank" class="btn btn-info register" href="<?php echo $reg; ?>" ><?php echo esc_html__( 'REGISTER', 'tactun' ); ?></a>
       <?php } ?>
   </div>
</div>
<!-- Post content -->
<div class="blogpost-content">
    <?php the_content(); ?>
</div>
<!-- Post thumbnail -->
<?php if( has_post_thumbnail() ) { ?>
    <div class="blogpost-thumbnail">
        <?php the_post_thumbnail( 'tactun-image-1162x442-cropped' ); ?>
    </div>
<?php } ?>

<!-- <style type="text/css" media="screen">
    .blogpost-title:before{
        background-color: <?php // echo $color; ?>;
    }
    .breadcrumb .post_tags {
        color: <?php // echo $color; ?>;
    }
</style> -->