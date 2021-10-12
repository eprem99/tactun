<?php

// Returns theme options data

if ( ! function_exists( 'tactun_option' ) ) {
	function tactun_option( $id, $fallback = false, $param = false ) {
		if ( isset( $_GET['tactun_'.$id] ) ) {
			if ( '-1' == $_GET['tactun_'.$id] ) {
				return false;
			} else {
				return $_GET['tactun_'.$id];
			}
		} else {
			global $tactun_options;
			if ( $fallback == false ) $fallback = '';
			$output = ( isset($tactun_options[$id]) && $tactun_options[$id] !== '' ) ? $tactun_options[$id] : $fallback;
			if ( !empty($tactun_options[$id]) && $param ) {
				$output = $tactun_options[$id][$param];
			}
		}
		return $output;
	}
}

/*--------------------------------------------------------------
# Outputs favicon to head
--------------------------------------------------------------*/
if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

    function tactun_output_favicon() {
$protocols = array( 'https' ); 
        $favicons = null;

        if (tactun_option('favicon', '', 'url')) $favicons .= '
	<link rel="shortcut icon" href="' . esc_url(tactun_option('favicon', 'https', 'url')) . '">';

        if (tactun_option('iphone_icon', '', 'url')) $favicons .= '
	<link rel="apple-touch-icon-precomposed" href="' . esc_url(tactun_option('iphone_icon', '', 'url')) . '">';

        if (tactun_option('ipad_icon', '', 'url')) $favicons .= '
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . esc_url(tactun_option('ipad_icon', '', 'url')) . '">';

        echo $favicons;
    }

    add_action('wp_head', 'tactun_output_favicon');

}