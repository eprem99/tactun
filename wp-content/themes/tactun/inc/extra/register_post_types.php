<?php

function tactun_register_posttypes() {

    /**
     * Solutions
     */
    $solution_labels = array(
        'name'               => esc_html__( 'Solutions', 'tactun' ),
        'singular_name'      => esc_html__( 'Solutions', 'tactun' ),
        'menu_name'          => esc_html__( 'Solutions', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'Solutions', 'tactun' ),
        'add_new'            => esc_html__( 'Add new', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add new solution', 'tactun' ),
        'new_item'           => esc_html__( 'New solution', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit solution', 'tactun' ),
        'view_item'          => esc_html__( 'View solution', 'tactun' ),
        'all_items'          => esc_html__( 'All  solutions', 'tactun' ),
        'search_items'       => esc_html__( 'Search  solution', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent  solution:', 'tactun' ),
        'not_found'          => esc_html__( 'No solution found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No solution found in Trash.', 'tactun' )
    );

    $solution_args = array(
        'labels'             => $solution_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'solution' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'solution', $solution_args );


    /**
     * Customer Stories
     */
    $story_labels = array(
        'name'               => esc_html__( 'Customer Stories', 'tactun' ),
        'singular_name'      => esc_html__( 'Customer Stories', 'tactun' ),
        'menu_name'          => esc_html__( 'Customer Stories', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'Customer Stories', 'tactun' ),
        'add_new'            => esc_html__( 'Add New', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add New Story', 'tactun' ),
        'new_item'           => esc_html__( 'New story', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit story', 'tactun' ),
        'view_item'          => esc_html__( 'View story', 'tactun' ),
        'all_items'          => esc_html__( 'All Stories', 'tactun' ),
        'search_items'       => esc_html__( 'Search story', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent story:', 'tactun' ),
        'not_found'          => esc_html__( 'No story found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No story found in Trash.', 'tactun' )
    );

    $story_args = array(
        'labels'             => $story_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'story' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('post_tag', 'product_line'),
    );

    register_post_type( 'story', $story_args );

    /**
     * Resources
     */
    $resource_labels = array(
        'name'               => esc_html__( 'Resources', 'tactun' ),
        'singular_name'      => esc_html__( 'Resources', 'tactun' ),
        'menu_name'          => esc_html__( 'Resources', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'Resources', 'tactun' ),
        'add_new'            => esc_html__( 'Add New', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add New resource', 'tactun' ),
        'new_item'           => esc_html__( 'New resource', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit resource', 'tactun' ),
        'view_item'          => esc_html__( 'View resource', 'tactun' ),
        'all_items'          => esc_html__( 'All resources', 'tactun' ),
        'search_items'       => esc_html__( 'Search resource', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent resource:', 'tactun' ),
        'not_found'          => esc_html__( 'No resource found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No resource found in Trash.', 'tactun' )
    );

    $resource_args = array(
        'labels'             => $resource_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resource' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'taxonomies'         => array('post_tag', 'product_line'),
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'resource', $resource_args );

    /**
     * Resources
     */
    $event_labels = array(
        'name'               => esc_html__( 'Events', 'tactun' ),
        'singular_name'      => esc_html__( 'Events', 'tactun' ),
        'menu_name'          => esc_html__( 'Events', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'Events', 'tactun' ),
        'add_new'            => esc_html__( 'Add New', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add New event', 'tactun' ),
        'new_item'           => esc_html__( 'New resource', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit event', 'tactun' ),
        'view_item'          => esc_html__( 'View event', 'tactun' ),
        'all_items'          => esc_html__( 'All events', 'tactun' ),
        'search_items'       => esc_html__( 'Search event', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent event:', 'tactun' ),
        'not_found'          => esc_html__( 'No event found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No event found in Trash.', 'tactun' )
    );

    $event_args = array(
        'labels'             => $event_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'evente' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'event', $event_args );

    /**
     * Team
     */
    $team_labels = array(
        'name'               => esc_html__( 'Team', 'tactun' ),
        'singular_name'      => esc_html__( 'Team', 'tactun' ),
        'menu_name'          => esc_html__( 'Team', 'tactun' ),
        'name_admin_bar'     => esc_html__( 'tactun', 'tactun' ),
        'add_new'            => esc_html__( 'Add New', 'tactun' ),
        'add_new_item'       => esc_html__( 'Add New Team', 'tactun' ),
        'new_item'           => esc_html__( 'New team', 'tactun' ),
        'edit_item'          => esc_html__( 'Edit team', 'tactun' ),
        'view_item'          => esc_html__( 'View tactun', 'tactun' ),
        'all_items'          => esc_html__( 'All team', 'tactun' ),
        'search_items'       => esc_html__( 'Search team', 'tactun' ),
        'parent_item_colon'  => esc_html__( 'Parent team:', 'tactun' ),
        'not_found'          => esc_html__( 'No team found.', 'tactun' ),
        'not_found_in_trash' => esc_html__( 'No team found in Trash.', 'tactun' )
    );

    $team_args = array(
        'labels'             => $team_labels,
        'description'        => esc_html__( 'Description.', 'tactun' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-images-alt',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' )
    );

    register_post_type( 'team', $team_args );
}
add_action( 'init', 'tactun_register_posttypes' );

?>