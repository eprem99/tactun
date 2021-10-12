<?php


/**
 * Remove Redux Menu under Tools
 */
function tactun_remove_redux_menu()
{
    remove_submenu_page('tools.php', 'redux-about');
}

add_action('admin_menu', 'tactun_remove_redux_menu', 12);


/*--------------------------------------------------------------
# Outputs favicon to head
--------------------------------------------------------------*/
// if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {

//     function tactun_output_favicon() {

//         $favicons = null;

//         if (tactun_option('favicon', '', 'url')) $favicons .= '
// 	<link rel="shortcut icon" href="' . esc_url(tactun_option('favicon', '', 'url')) . '">';

//         if (tactun_option('iphone_icon', '', 'url')) $favicons .= '
// 	<link rel="apple-touch-icon-precomposed" href="' . esc_url(tactun_option('iphone_icon', '', 'url')) . '">';

//         if (tactun_option('ipad_icon', '', 'url')) $favicons .= '
// 	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . esc_url(tactun_option('ipad_icon', '', 'url')) . '">';

//         echo $favicons;
//     }

//     add_action('wp_head', 'tactun_output_favicon');

// }


/*--------------------------------------------------------------
# Theme advanced section output
--------------------------------------------------------------*/

// Google analytics
// function tactun_google_analytics() {

//     global $tactun_options;

//     if (!empty($tactun_options['google_analytics'])) {
//         echo $tactun_options['google_analytics'];
//     }

// }
// add_action( 'wp_head', 'tactun_google_analytics' );


// // Custom CSS
// function tactun_custom_css() {

//     global $tactun_options;

//     $styles     = null;
//     $custom_css = $tactun_options['custom_css'];

//     if ( $custom_css !== '' ) $styles .= $custom_css;

//     $css_output = "\n<style id=\"theme_option_custom_css\" type=\"text/css\">\n" . preg_replace( '/\s+/', ' ', $styles ) . "\n</style>\n";

//     if ( !empty( $custom_css ) ) echo $css_output;

// }
// add_action( 'wp_head', 'tactun_custom_css' );


// // Custom JS
// function tactun_custom_js() {

//     global $tactun_options;

//     $custom_js = $tactun_options['custom_js'];
//     if ( $custom_js !== '' ) echo $custom_js;

// }
// add_action( 'wp_head', 'tactun_custom_js' );

?>