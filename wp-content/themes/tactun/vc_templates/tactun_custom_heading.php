<?php
extract(shortcode_atts(array(
    'heading_title' => '',
    'heading_size' => '',
    'heading_line' => '',
    'heading_weight' => '',
    'heading_transform' => '',
    'heading_spacing' => '',
    'heading_alignnment' => '',
    'heading_tag' => '',

    // design
    'heading_color' => '',

    // other
    'heading_underline' => '',
    'heading_position' => '',
    'custom_class' => '',

), $atts));

// Color
if(!empty($heading_color)) {
    $color = 'color: ' . esc_attr( $heading_color ) . ';';
}else{
	$color = "";
}

if(!empty($heading_line)){
	$line = 'line-height: ' . esc_attr( $heading_line ) . 'px;';
}else{
	$line = '';
}

// Font Size
if( !empty( $heading_size ) ) {
    $size = 'font-size: ' . esc_attr( $heading_size ) . 'px;';
} else {
    $size = null;
}

// Text Transform
if( $heading_transform == 'none' ) {
    $transform = null;
} else {
    $transform = 'text-transform: ' . esc_attr( $heading_transform ) . ';';
}

// Letter Spacing
if( !empty( $heading_spacing ) ) {
    $spacing = 'letter-spacing: ' . esc_attr( $heading_spacing ) . 'px;';
} else {
    $spacing = null;
}

// Font Weight
if( $heading_weight == 'theme_default' ) {
    $weight = null;
} else {
    $weight = 'font-weight: ' . esc_attr($heading_weight) . ';';
}

// Text Alignment
if( $heading_alignnment == 'center' ) {
    $align = 'text-align: center;';
} elseif( $heading_alignnment == 'right' ) {
    $align = 'text-align: right;';
} else {
    $align = null;
}

?>

<<?php echo esc_attr( $heading_tag ) ?> class="tactun-custom-heading <?php echo esc_attr( $custom_class ) ?>" style="<?php echo esc_attr( $size . $line . $color . $spacing . $weight . $align . $transform ) ?>"><?php echo esc_html( $heading_title ) ?></<?php echo esc_attr( $heading_tag ) ?>>
