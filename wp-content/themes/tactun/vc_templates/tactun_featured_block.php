<?php extract(shortcode_atts(array(
    'featured_img' => '',
    'tactun_title' => '',
    'tactun_descritpion' => '',
    'tactun_color' => '',
    'featured_align' => '',
), $atts));


$color = $tactun_color;
$image  = wp_get_attachment_image($featured_img, 'tactun-image-374x257-cropped');
$class = chars_class();
?>
    <div class="mb-4 <?php echo $class; echo ' '.$featured_align; ?>">
        <div class="featured-grid fetured">
            <div class="featured-grid-img"> <?php echo $image; ?></div>
            <div class="featured-block">
            	<div class="fetured-name"><?php echo $tactun_title; ?></div>
                <div class="featured-grid-text"><p><?php echo $tactun_descritpion; ?></p></div>
            </div>
        </div>
    </div>  
<style type="text/css">
    .mb-4.<?php echo $class; ?> .fetured-name{
        color: <?php echo $color; ?>;
    }

</style>