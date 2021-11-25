<?php
/**
 * VECTO functions
 */
add_theme_support(
 'custom-logo',
 array(
     'height'      => 36.4,
     'width'       => 100,
     'flex-width'  => false,
     'flex-height' => false,
 )
);
 add_theme_support( 'title-tag' ); 
 
 add_image_size( 'tactun-image-278x200-cropped', 278, 200, true ); 
 add_image_size( 'tactun-image-374x257-cropped', 374, 257, true ); 
 add_image_size( 'tactun-image-374x211-cropped', 374, 211, true ); 
 add_image_size( 'tactun-image-572x260-cropped', 572, 260, true );
 add_image_size( 'tactun-image-712x451-cropped', 712, 451, true ); 
 add_image_size( 'tactun-image-1162x442-cropped', 1162, 442, true );  

register_nav_menus(
    array(
        'menu-1' => __( 'Main menu', 'sadvik' ),
    )
);

function remove_admin_menu_items(){
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=solution_categories' );
    remove_submenu_page( 'edit.php?post_type=story', 'edit-tags.php?taxonomy=solution_categories&amp;post_type=story' );
    remove_submenu_page( 'edit.php?post_type=resource', 'edit-tags.php?taxonomy=solution_categories&amp;post_type=resource' );
    remove_submenu_page( 'edit.php?post_type=event', 'edit-tags.php?taxonomy=solution_categories&amp;post_type=event' );            
}
add_action('admin_menu', 'remove_admin_menu_items', 999);

require_once( get_template_directory() . '/inc/theme_functionality.php' );

function tactun_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'tactun' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'tactun' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
    register_sidebar(
		array(
			'name'          => __( 'Footer social', 'tactun' ),
			'id'            => 'footer-socila',
			'description'   => __( 'Add widgets here to appear in your footer.', 'tactun' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	); 
}
add_action( 'widgets_init', 'tactun_widgets_init' );


function tactun_enqueue_scripts() {

    /**
     * CSS
     */
    wp_enqueue_style( 'tactun-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tactun-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tactun-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tactun-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tactun-select', get_template_directory_uri() . '/assets/css/select2.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tactun-wc', get_template_directory_uri() . '/assets/css/wc.css', array(), '1.0', 'all' );
  //  wp_enqueue_style( 'tactun-scroll', get_template_directory_uri() . '/assets/css/perfect-scrollbar.css', array(), '1.0', 'all' );

    /**
     * JS
     */
    wp_enqueue_script( 'tactun-parallax-js', get_template_directory_uri() . '/assets/js/jquery.parallax.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'tactun-select-js', get_template_directory_uri() . '/assets/js/select2.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'tactun-moment-js', get_template_directory_uri() . '/assets/js/moment.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'tactun-header-js', get_template_directory_uri() . '/assets/js/header_slidedown.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'tactun-swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array( 'jquery' ), '1', true );
  //  wp_enqueue_script( 'tactun-scroll-js', get_template_directory_uri() . '/assets/js/jquery.scrollbar.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'tactun-theme-js', get_template_directory_uri() . '/assets/js/tactun.js', array( 'jquery' ), '1', true );

}

add_action( 'wp_enqueue_scripts', 'tactun_enqueue_scripts' );

// function admin_scripts() {

//     wp_register_script( 'tooltip-js', get_template_directory_uri() . '/assets/js/tooltipshortcode.js', array( 'jquery', 'wp-tinymce' ), '1', true );
    
//     wp_enqueue_script( 'tooltip-js' );
    
//     }
    
//     add_action( 'admin_enqueue_scripts', 'admin_scripts' );

// function add_description_to_menu($item_output, $item, $depth, $args) {
//     if (strlen($item->description) > 0 ) {
//         // append description after link
//         $desc = substr($item->description, 0, 50);
//         print_r($item);
//         $item_output .= sprintf('<span class="description">%s</span>', esc_html($desc));
//     }

//     return $item_output;
// }
// add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);


function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $desc = substr($item->description, 0, 50);
        $item_output = str_replace( $args->link_after . '</a>', '<p class="description">' . $desc . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

function post_tags($id, $taxonmy){
	$tags = get_the_terms($id, $taxonmy);
	$html = '<div class="post_tags">';
	$i = 0;
	    foreach ( $tags as $tag ) {

	       $tag_link = get_tag_link( $tag->term_id );
           if($i > 0){
              $html .= " | {$tag->name}";
           }else{
              $html .= "{$tag->name}";
           }
	    //   $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
	       
	     //  $html .= "</a>";
	    $i++;   
	    }
	$html .= '</div>';

	return $html;
}


function chars_class(){
	$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';
	$class = substr(str_shuffle($permitted_chars), 0, 5);
	return $class;
}

function output_all_postmeta($id) {

	$postmetas = get_post_meta($id);

	foreach($postmetas as $meta_key=>$meta_value) {
		echo $meta_key . ' : ' . $meta_value[0] . '<br/>';
	}
}
function output_all_taxmeta($id) {

	$termmetas = get_metadata('term', $id);
  var_dump($termmetas);
	// foreach($termmetas as $meta_key=>$meta_value) {
	// 	echo $meta_key . ' : ' . $meta_value[0] . '<br/>';
	// }
}


function new_tooltip($atts) { 

    $message = ''; 
    $message .= '<div class="con-tooltip left">';
    
    if($atts['titlepreview'] == true){
        $message .= '<span>'.$atts['title'].'</span>';  
    }
    $message .= '<i class="tooltip-icon"></i><div class="tooltip"><span class="title">'.$atts['title'].'</span>';  
    $message .= '<p>'.$atts['text']."</p></div></div>";
    return $message;
    } 

    add_shortcode('tooltip', 'new_tooltip'); 
    
    add_action( 'wp_enqueue_scripts', 'geg_remove_woo_styles', 20 ); // priority 20 and higher

// Options Admin Panel
require_once( get_template_directory() . '/inc/remove-tracking-class.php' ); // Remove tracking
require_once( get_template_directory() . '/inc/theme-options.php' );
require_once( get_template_directory() . '/inc/theme-option.php' );
if ( class_exists( 'WPBakeryShortCode' ) ) {
    require_once( get_template_directory() . '/inc/visual_composer.php' );
}
require_once( get_template_directory() . '/inc/breadcrumbs-functions.php' );
require_once( get_template_directory() . '/inc/filter.php' );
if ( class_exists( 'woocommerce' ) ) {
    require_once( get_template_directory() . '/inc/woocomerce.php' );
}


 add_action('init', 'tooltip_shortcode_button_init');
 function tooltip_shortcode_button_init() {

      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;
  
      add_filter("mce_external_plugins", "tooltip_register_tinymce_plugin"); 
      add_filter('mce_buttons', 'tooltip_add_tinymce_button');
}


function tooltip_register_tinymce_plugin($plugin_array) {
    $plugin_array['tooltip_button'] = get_template_directory_uri() . '/assets/js/tooltipshortcode.js';
    return $plugin_array;
}

function tooltip_add_tinymce_button($buttons) {
    $buttons[] = "tooltip_button";
    return $buttons;
}