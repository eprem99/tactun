<?php
/**
 * Plugin Name: MB User Meta
 * Plugin URI:  https://metabox.io/plugins/mb-user-meta/
 * Description: Add custom fields (meta data) for users.
 * Version:     1.2.4
 * Author:      MetaBox.io
 * Author URI:  https://metabox.io
 * License:     GPL2+
 * Text Domain: mb-user-meta
 * Domain Path: /languages/
 *
 * @package Meta Box
 * @subpackage MB User Meta
 */

// Prevent loading this file directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mb_user_meta_load' ) ) {
	/**
	 * Hook to 'init' with priority 5 to make sure all actions are registered before Meta Box 4.9.0 runs
	 */
	add_action( 'init', 'mb_user_meta_load', 5 );

	/**
	 * Load plugin files after Meta Box is loaded
	 */
	function mb_user_meta_load() {
		if ( ! defined( 'RWMB_VER' ) ) {
			return;
		}

		require dirname( __FILE__ ) . '/inc/class-mb-user-meta-loader.php';
		require dirname( __FILE__ ) . '/inc/class-mb-user-meta-box.php';
		require dirname( __FILE__ ) . '/inc/class-rwmb-user-storage.php';
		$loader = new MB_User_Meta_Loader();
		$loader->init();

		// Backward compatible with Meta Box Group extension < 1.2.7 when Meta Box 1.12 switch to use storage.
		$old_group = false;
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		if ( is_plugin_active( 'meta-box-group/meta-box-group.php' ) ) {
			$group = get_plugin_data( WP_PLUGIN_DIR . '/meta-box-group/meta-box-group.php' );

			if ( version_compare( $group['Version'], '1.2.7' ) < 0 ) {
				$old_group = true;
			}
		}

		if ( $old_group ) {
			require dirname( __FILE__ ) . '/inc/class-mb-user-meta-field.php';
			( new MB_User_Meta_Field() )->init();
		}
	}
}
