<?php 
	extract(shortcode_atts(array(
	    'solution_title' => '',
	    'solution_display' => '',
	    'solution_per_row' => '',
	), $atts));


$terms = get_terms(array(
    'taxonomy' => 'solution_categories',
    'number' => esc_attr( $solution_display ), 
    'hide_empty'    => false, 
    'orderby' => 'id'
));



?>

<?php if(!empty($solution_title)){ ?>
    <div class="solution_title"><?php echo $solution_title; ?></div>
<?php } ?>
<div class="row solution">

<?php 

foreach( $terms as $term ){
//print_r($term); 

$color = get_term_meta($term->term_id, 'category_color', true);
$images = get_term_meta( $term->term_id, 'solution_image', false);
$image  = wp_get_attachment_image_url($images[0], 'tactun-image-374x257-cropped');
$class = rand();
?>
    <div class="mb-4 <?php echo $solution_per_row. ' ' .$term->slug; ?>">
        <div class="solution-grid">
            <a href="<?php echo get_term_link($term->term_id, 'solution_categories'); ?>">
            <div class="solution-grid-img" style="background-image: url(<?php echo $image; ?>)"></div>
            <div class="solution-block">
                <div class="solution-grid-name"><?php echo $term->name; ?></div>
                <div class="solution-grid-text"><p><?php echo substr($term->description, 0, 100) ?></p></div>
                <span class="btn-icon"><span></span></span>
            </div>
            </a>
        </div>
    </div>  
<style type="text/css">
    .solution .mb-4.<?php echo $term->slug; ?> .solution-grid::after{
       background-color: <?php echo $color; ?>;
    }
    .solution .mb-4.<?php echo $term->slug; ?> .solution-grid{
        color: <?php echo $color; ?>;
        border-color: <?php echo $color; ?>;
    }
    .<?php echo $term->slug; ?> a .solution-grid-name{
        color: <?php echo $color; ?>;
    }
</style>
<?php  }  ?>
   
</div>