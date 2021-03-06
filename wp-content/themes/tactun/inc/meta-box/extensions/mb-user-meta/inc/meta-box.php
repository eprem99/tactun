<?php
/**
 * The main class of the plugin which handle show, edit, save custom fields for users.
 *
 * @package    Meta Box
 * @subpackage MB User Meta
 * @author     Tran Ngoc Tuan Anh <rilwis@gmail.com>
 */

/**
 * Class for handling custom fields (meta data) for users.
 */
class MB_User_Meta_Box extends RW_Meta_Box {

	/**
	 * The object type.
	 *
	 * @var string
	 */
	protected $object_type = 'user';

	/**
	 * Specific hooks for user.
	 */
	protected function object_hooks() {
		// Add meta fields to edit user page.
		add_action( 'show_user_profile', array( $this, 'show' ) );
		add_action( 'edit_user_profile', array( $this, 'show' ) );

		// Save user meta.
		add_action( 'profile_update', array( $this, 'save_post' ) );
		add_action( 'user_register', array( $this, 'save_post' ) );

		add_action( "rwmb_before_{$this->meta_box['id']}", array( $this, 'show_heading' ) );
	}

	/**
	 * Show heading of the section.
	 */
	public function show_heading() {
		echo '<h2>', esc_html( $this->meta_box['title'] ), '</h2>';
	}

	/**
	 * Enqueue styles for user meta.
	 */
	public function enqueue() {

		parent::enqueue();
		list( , $url ) = RWMB_Loader::get_path( dirname( dirname( __FILE__ ) ) );

		if ( ! $this->is_edit_screen() ) {
			return;
		}
		wp_enqueue_style( 'mb-user-meta', $url . 'css/user-meta.css', '', '1.2.3' );
	}

	/**
	 * Check if we're on the right edit screen.
	 *
	 * @param WP_Screen $screen Screen object. Optional. Use current screen object by default.
	 *
	 * @return bool
	 */
	public function is_edit_screen( $screen = null ) {
		if ( ! is_admin() ) {
			return false;
		}
		$screen = get_current_screen();
		return in_array( $screen->id, array( 'profile', 'user-edit', 'profile-network', 'user-edit-network' ), true );
	}

	/**
	 * Get current user id.
	 *
	 * @return int|string
	 */
	public function get_current_object_id() {
		return self::get_current_user_id();
	}

	/**
	 * Get editing user ID.
	 *
	 * @return bool|int
	 */
	public static function get_current_user_id() {
		if ( ! is_admin() ) {
			return false;
		}
		$screen = get_current_screen();
		if ( in_array( $screen->id, array( 'profile', 'profile-network' ), true ) ) {
			return get_current_user_id();
		}
		if ( in_array( $screen->id, array( 'user-edit', 'user-edit-network' ), true ) ) {
			return isset( $_REQUEST['user_id'] ) ? absint( $_REQUEST['user_id'] ) : false;
		}
		return false;
	}

	/**
	 * Add fields to field registry.
	 */
	public function register_fields() {
		$field_registry = rwmb_get_registry( 'field' );

		foreach ( $this->fields as $field ) {
			$field_registry->add( $field, 'user', 'user' );
		}
	}
}
