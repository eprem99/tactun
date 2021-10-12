<?php extract(shortcode_atts(array(
    'featured_img' => '',
    'tactun_title' => '',
    'tactun_descritpion' => '',
    'tactun_color' => '',
), $atts));

?>
<?php if(!empty($solution_title)){ ?>
    <div class="solution_title"><?php echo $solution_title; ?></div>
<?php } ?>

<?php 

$color = $tactun_color;
$image  = wp_get_attachment_image($featured_img, 'tactun-image-374x257-cropped');
$class = chars_class();
?>
    <div class="mb-4 <?php echo $class; ?>">
        <div class="solution-grid fetured">
            <div class="featured-grid-img"> <?php echo $image; ?></div>
            <div class="featured-block">
            	<div class="fetured-name"><?php echo $tactun_title; ?></div>
                <div class="featured-grid-text"><p><?php echo $tactun_descritpion; ?></p></div>
            </div>
        </div>
    </div>  
<style type="text/css">
    .<?php echo $class; ?> .solution-grid::after{
       background-color: <?php echo $color; ?>;
    }
    .mb-4.<?php echo $class; ?> .solution-grid{
        color: <?php echo $color; ?>;
        border-color: <?php echo $color; ?>;
    }

</style>