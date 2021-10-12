<?php extract(shortcode_atts(array(
    'slider_blocks_img' => '',
    'tactun_title' => '',
    'tactun_description' => '',
    'tactun_link' => '',
    'tactun_title_2' => '',
    'tactun_description_2' => '',   
    'tactun_link_2' => '', 
), $atts));

$featured_img = wp_get_attachment_image_url( $slider_blocks_img, 'full' );

echo '<div class="swiper-slide" style="background-image:url('.$featured_img.')">';
// echo $featured_img;
echo '<div class="container">';
echo '<div class="slider-block">';
echo '<div class="slider-block-white">';
echo '<div class="slider-title">'.$tactun_title.'</div>';
echo '<div class="slider-description">'.$tactun_description.'</div>';
echo '<div class="slider-more"><a class="btn btn-succes" href="'.get_permalink( $tactun_link ).'">'.esc_html__( 'Learn more', 'tactun' ).'</a></div>';
echo '</div>';
echo '<div class="slider-block-black">';
echo '<div class="slider-title">'.$tactun_title_2.'</div>';
echo '<div class="slider-description">'.$tactun_description_2.'</div>';
echo '<div class="slider-moretou"><a class="btn-icon" href="'.get_permalink( $tactun_link_2 ).'"><span></span></a></div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
?>

