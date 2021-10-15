<?php 
    extract(shortcode_atts(array(
        'tactun_title' => '',
        'tactun_weight'  => '',
        'image_text_text' => '',
        'image_text_link' => '',
        'image_text_img' => '',
        'image_left' => '',
        'image_padding' => '',
    ), $atts));

$featured_img = wp_get_attachment_image( $image_text_img, 'large' );
if($image_left == 'right'){
	$class = 'flex-column-reverse';
    $pl = str_ireplace("l", "r", $image_padding);
    $ps = 'pl-0';
    
}else{
	$class = '';
    $pl = str_ireplace("r", "l", $image_padding);
    $ps = 'pr-0';
}
if(!empty($tactun_weight)){
    $style = 'font-weight:'.$tactun_weight.';';
}else{
    $style = '';
}
?>

<div class="row text-block <?php echo $class; ?>">
	<div class="col-md-6 <?php echo $ps; ?>">
		<?php echo $featured_img; ?>
	</div>
	<div class="col-md-6 <?php echo $pl; ?>">
		<?php if(!empty($tactun_title)){
			echo '<div class="text-block-title" style="'.$style.'">'.$tactun_title.'</div>';
		}
        if(!empty($image_text_text)){
            echo '<div class="text">'.$image_text_text.'</div>';
        }   
        if(!empty($image_text_link)){
            echo '<a class="text-link" href="'.$image_text_link.'">'.esc_html('Learn More', 'tactun').'</a>';
        }  
        ?>
	</div>
</div>  
