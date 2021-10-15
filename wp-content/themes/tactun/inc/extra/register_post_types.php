<?php

function tactun_register_posttypes() {

    /**
     * Services
     */
    $service_labels = array(
        'name'               => esc_html__( 'Services', 'tactun' ),
        'singular_name'      => esc_html__( 'Services', 'tactun' ),
        'menu_name'          => esc_html__( 'Services', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'Services', 'tactun' ),
        'add_new'            => esc_html__( 'Add new', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add new service', 'tactun' ),
        'new_item'           => esc_html__( 'New service', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit service', 'tactun' ),
        'view_item'          => esc_html__( 'View service', 'tactun' ),
        'all_items'          => esc_html__( 'All  Services', 'tactun' ),
        'search_items'       => esc_html__( 'Search  service', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent  service:', 'tactun' ),
        'not_found'          => esc_html__( 'No service found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No service found in Trash.', 'tactun' )
    );

    $service_args = array(
        'labels'             => $service_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'service', $service_args );


    /**
     * Customer Stories
     */
//     $story_labels = array(
//         'name'               => esc_html__( 'Customer Stories', 'tactun' ),
//         'singular_name'      => esc_html__( 'Customer Stories', 'tactun' ),
//         'menu_name'          => esc_html__( 'Customer Stories', 'tactun' ),
//         'name_admin_bar'     => esc_html__( 'Customer Stories', 'tactun' ),
//         'add_new'            => esc_html__( 'Add New', 'tactun' ),
//         'add_new_item'       => esc_html__( 'Add New Story', 'tactun' ),
//         'new_item'           => esc_html__( 'New story', 'tactun' ),
//         'edit_item'          => esc_html__( 'Edit story', 'tactun' ),
//         'view_item'          => esc_html__( 'View story', 'tactun' ),
//         'all_items'          => esc_html__( 'All Stories', 'tactun' ),
//         'search_items'       => esc_html__( 'Search story', 'tactun' ),
//         'parent_item_colon'  => esc_html__( 'Parent story:', 'tactun' ),
//         'not_found'          => esc_html__( 'No story found.', 'tactun' ),
//         'not_found_in_trash' => esc_html__( 'No story found in Trash.', 'tactun' )
//     );

//     $story_args = array(
//         'labels'             => $story_labels,
//         'description'        => esc_html__( 'Description.', 'tactun' ),
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu'       => true,
//         'query_var'          => true,
//         'rewrite'            => array( 'slug' => 'story' ),
//         'capability_type'    => 'post',
//         'menu_icon'          => 'dashicons-images-alt',
//         'has_archive'        => false,
//         'hierarchical'       => false,
//         'menu_position'      => null,
//         'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
//         'taxonomies' => array('post_tag', 'product_line'),
//     );

//     register_post_type( 'story', $story_args );

//     /**
//      * Resources
//      */
//     $resource_labels = array(
//         'name'               => esc_html__( 'Resources', 'tactun' ),
//         'singular_name'      => esc_html__( 'Resources', 'tactun' ),
//         'menu_name'          => esc_html__( 'Resources', 'tactun' ),
//         'name_admin_bar'     => esc_html__( 'Resources', 'tactun' ),
//         'add_new'            => esc_html__( 'Add New', 'tactun' ),
//         'add_new_item'       => esc_html__( 'Add New resource', 'tactun' ),
//         'new_item'           => esc_html__( 'New resource', 'tactun' ),
//         'edit_item'          => esc_html__( 'Edit resource', 'tactun' ),
//         'view_item'          => esc_html__( 'View resource', 'tactun' ),
//         'all_items'          => esc_html__( 'All resources', 'tactun' ),
//         'search_items'       => esc_html__( 'Search resource', 'tactun' ),
//         'parent_item_colon'  => esc_html__( 'Parent resource:', 'tactun' ),
//         'not_found'          => esc_html__( 'No resource found.', 'tactun' ),
//         'not_found_in_trash' => esc_html__( 'No resource found in Trash.', 'tactun' )
//     );

//     $resource_args = array(
//         'labels'             => $resource_labels,
//         'description'        => esc_html__( 'Description.', 'tactun' ),
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu'       => true,
//         'query_var'          => true,
//         'rewrite'            => array( 'slug' => 'resource' ),
//         'capability_type'    => 'post',
//         'menu_icon'          => 'dashicons-images-alt',
//         'has_archive'        => false,
//         'hierarchical'       => false,
//         'menu_position'      => null,
//         'taxonomies'         => array('post_tag', 'product_line'),
//         'supports'           => array( 'title', 'editor', 'thumbnail' )
//     );

//     register_post_type( 'resource', $resource_args );

//     /**
//      * Resources
//      */
//     $event_labels = array(
//         'name'               => esc_html__( 'Events', 'tactun' ),
//         'singular_name'      => esc_html__( 'Events', 'tactun' ),
//         'menu_name'          => esc_html__( 'Events', 'tactun' ),
//         'name_admin_bar'     => esc_html__( 'Events', 'tactun' ),
//         'add_new'            => esc_html__( 'Add New', 'tactun' ),
//         'add_new_item'       => esc_html__( 'Add New event', 'tactun' ),
//         'new_item'           => esc_html__( 'New resource', 'tactun' ),
//         'edit_item'          => esc_html__( 'Edit event', 'tactun' ),
//         'view_item'          => esc_html__( 'View event', 'tactun' ),
//         'all_items'          => esc_html__( 'All events', 'tactun' ),
//         'search_items'       => esc_html__( 'Search event', 'tactun' ),
//         'parent_item_colon'  => esc_html__( 'Parent event:', 'tactun' ),
//         'not_found'          => esc_html__( 'No event found.', 'tactun' ),
//         'not_found_in_trash' => esc_html__( 'No event found in Trash.', 'tactun' )
//     );

//     $event_args = array(
//         'labels'             => $event_labels,
//         'description'        => esc_html__( 'Description.', 'tactun' ),
//         'public'             => true,
//         'publicly_queryable' => true,
//         'show_ui'            => true,
//         'show_in_menu'       => true,
//         'query_var'          => true,
//         'rewrite'            => array( 'slug' => 'evente' ),
//         'capability_type'    => 'post',
//         'menu_icon'          => 'dashicons-images-alt',
//         'has_archive'        => false,
//         'hierarchical'       => false,
//         'menu_position'      => null,
//         'supports'           => array( 'title', 'editor', 'thumbnail' )
//     );

//     register_post_type( 'event', $event_args );

    /**
     * Testimonials
     */
    $testimonials_labels = array(
        'name'               => esc_html__( 'Testimonials', 'tactun' ),
        'singular_name'      => esc_html__( 'Testimonials', 'tactun' ),
        'menu_name'          => esc_html__( 'Testimonials', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'tactun', 'tactun' ),
        'add_new'            => esc_html__( 'Add New', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add New Testimonials', 'tactun' ),
        'new_item'           => esc_html__( 'New Testimonials', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit Testimonials', 'tactun' ),
        'view_item'          => esc_html__( 'View tactun', 'tactun' ),
        'all_items'          => esc_html__( 'All Testimonials', 'tactun' ),
        'search_items'       => esc_html__( 'Search Testimonials', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent Testimonials:', 'tactun' ),
        'not_found'          => esc_html__( 'No Testimonials found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No Testimonials found in Trash.', 'tactun' )
    );

    $testimonials_args = array(
        'labels'             => $testimonials_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'testimonials', $testimonials_args );
 }
add_action( 'init', 'tactun_register_posttypes' );

?>