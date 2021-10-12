<?php
/*
Plugin Name: Meta Box Conditional Logic
Plugin URI: https://www.metabox.io/plugins/meta-box-conditional-logic
Description: Control the Visibility of Meta Boxes and Fields or even HTML elements with ease.
Version: 1.3.2
Author: Tan Nguyen
Author URI: https://giga.ai
License: GPL2+
*/

//Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

//----------------------------------------------------------
//Define plugin URL for loading static files or doing AJAX
//------------------------------------------------------------
if ( ! defined( 'MBC_URL' ) )
	define( 'MBC_URL', plugin_dir_url( __FILE__ ) );
list( , $url ) = RWMB_Loader::get_path( dirname( dirname( __FILE__ ) ) );
define( 'MBC_JS_URL', $url . 'meta-box-conditional-logic/assets/js/' );
// ------------------------------------------------------------
// Plugin paths, for including files
// ------------------------------------------------------------
if ( ! defined( 'MBC_DIR' ) )
	define( 'MBC_DIR', dirname( __FILE__ ) );

define( 'MBC_INC_DIR', trailingslashit( MBC_DIR . 'inc' ) );

// Load the conditional logic and assets
include dirname( __FILE__ ) . '/inc/class-conditional-logic.php';

new MB_Conditional_Logic;