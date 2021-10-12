<?php
/*
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0
 */

if ( !function_exists( 'wbc_after_content_import' ) ) {

	function kovka_importer_info( $description ) {
		$message = '<p>'. esc_html__( 'Demos are best if used on a new install of WordPress. When a demo is importing please be patient and do not click anywhere else, this may take up to 5-10 minutes depending on your servers speed. You will be notified once the demo has completed importing. Also remember that all images used are only for demo purposes.', 'kovka' ) .'</p>';
		$message .= '
        <h2 style="padding-top: 20px">What if the Import Fails or Stalls?</h2>

        <p>If the import stalls and fails to respond after a few minutes, you are suffering from PHP configuration limits that are set too low to complete the process. You should contact your hosting provider and ask them to increase your server limits to a minimum of what is recommended in our documentation - <a href="http://kovka.gegstyle.com/docs/templates/overview/system-status-parameters.html" target="_blank">Click Here</a>.
        </p>';

		return $message;
	}
	// Uncomment the below
	add_filter( 'wbc_importer_description', 'kovka_importer_info', 10 );
}


if ( !function_exists( 'wbc_filter_title' ) ) {

	/**
	 * Filter for changing demo title in options panel so it's not folder name.
	 *
	 * @param [string] $title name of demo data folder
	 *
	 * @return [string] return title for demo name.
	 */

	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {

		$message = '<p>'. esc_html__( 'Best if used on new WordPress install. Please be patient as demo can take up to 10 minutes to import.', 'kovka' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'kovka' ) .'</p>';

		return $message;
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}

if ( !function_exists( 'wbc_importer_label_text' ) ) {

	/**
	 * Filter for changing importer label/tab for redux section in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title label above demos
	 *
	 * @return [string] return no html
	 */

	function wbc_importer_label_text( $label_text ) {

		$label_text = 'WBC Importer';

		return $label_text;
	}

	// Uncomment the below
	// add_filter( 'wbc_importer_label', 'wbc_importer_label_text', 10 );
}

if ( !function_exists( 'wbc_change_demo_directory_path' ) ) {

	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */

	function wbc_change_demo_directory_path( $demo_directory_path ) {

		//$demo_directory_path = get_template_directory().'/demo-data/';

		//return $demo_directory_path;

	}

	// Uncomment the below
	//add_filter('wbc_importer_dir_path', 'wbc_change_demo_directory_path' );
}

if ( !function_exists( 'wbc_importer_before_widget' ) ) {

	/**
	 * Function/action ran before widgets get imported
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_importer_before_widget( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_before_widget_import', 'wbc_importer_before_widget', 10, 2 );
}

if ( !function_exists( 'wbc_after_theme_options' ) ) {

	/**
	 * Function/action ran after theme options set
	 *
	 * @param (array) $demo_active_import       Example below
	 * [wbc-import-1] => Array
	 *      (
	 *            [directory] => current demo data folder name
	 *            [content_file] => content.xml
	 *            [image] => screen-image.png
	 *            [theme_options] => theme-options.txt
	 *            [widgets] => widgets.json
	 *            [imported] => imported
	 *        )
	 * @param (string) $demo_data_directory_path path to current demo folder being imported.
	 *
	 * @return nothing
	 */

	function wbc_after_theme_options( $demo_active_import , $demo_data_directory_path ) {

		//Do Something

	}

	// Uncomment the below
	// add_action('wbc_importer_after_theme_options_import', 'wbc_after_theme_options', 10, 2 );
}

?>
