<?php

extract(shortcode_atts(array(
    'color_line_top' => '',
    'color_line_bottom' => '',
    'color_line_color' => '',
    'color_line_height'  => '',
), $atts));

$style = "";

if(!empty($color_line_color)){

	$style = 'background-color:'.$color_line_color.';';
}elseif( is_singular('solution') ){
    $tags = get_the_terms(get_the_id(), 'solution_categories');
    $color = get_term_meta($tags[0]->term_id, 'category_color', true); 
    $style = 'background-color:'.$color.';';        
}
if(!empty($color_line_top)){

	$style .= 'margin-top:'.$color_line_top.'px;';
}
if(!empty($color_line_bottom)){

	$style .= 'margin-bottom:'.$color_line_bottom.'px;';
}
if(!empty($color_line_height)){

	$style .= 'height:'.$color_line_height.'px;';
}

?>

<div class="color-line" style="<?php echo $style; ?>" ></div>