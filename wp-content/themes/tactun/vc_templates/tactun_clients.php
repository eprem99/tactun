<?php 
extract(shortcode_atts(array(
	'client_img' => '',
	'client_per_row' => '',
), $atts));

$client = explode(',', $client_img);
echo  '<div class="row clients align-items-center">';
foreach ($client as $value) {
	$img = wp_get_attachment_image( $value, 'thumbnail' );
	echo '<div class="'.$client_per_row.'"><div class="client">'.$img.'</div></div>';
	# code...
}
echo '</div>';