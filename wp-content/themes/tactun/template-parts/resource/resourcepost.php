<?php
/**
 * Template Part for Single BlogPosts
 */
// $tags = get_the_terms(get_the_id(), 'category');
$cat = get_the_terms(get_the_id(), 'solution_categories');
$html = post_tags(get_the_id(), 'solution_categories');
$color = get_term_meta($cat[0]->term_id, 'category_color', true);
// $id = $tags[0]->term_id;
$link = get_category_link( $id );
$tactun_title = get_the_title();
?>
<?php if(strlen($tactun_title) > 35){ ?>
	<style type="text/css" media="screen">
		@media screen and (max-width: 360px){
			.blogpost-title::before {
				height: 90%;
			}
		}	
	</style>

	<?php } ?>	
<div class="cat">
    <a href="<?php the_permalink(422); ?>"><?php echo get_the_title(422) ?></a>
</div>
<div class="breadcrumb">
	<?php echo $html; ?>
</div>
<!-- Post title -->
<h1 class="blogpost-title">
    <?php the_title(); ?>
</h1>

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

<style type="text/css" media="screen">
	.blogpost-title:before{
		background-color: <?php echo $color; ?>;
	}
	.breadcrumb .post_tags {
		color: <?php echo $color; ?>;
	}
</style>

