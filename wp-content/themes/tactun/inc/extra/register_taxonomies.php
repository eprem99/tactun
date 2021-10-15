<?php

function tactun_register_taxonomies() {

    /**
     * Add "Category" taxonomy to the Solution post type
     */
//     $labels = array(
//         'name'              => esc_html__( 'Solution categories', 'tactun' ),
//         'singular_name'     => esc_html__( 'Category', 'tactun' ),
//         'search_items'      => esc_html__( 'Search Categories', 'tactun' ),
//         'all_items'         => esc_html__( 'All Categories', 'tactun' ),
//         'parent_item'       => esc_html__( 'Parent Category', 'tactun' ),
//         'parent_item_colon' => esc_html__( 'Parent Category:', 'tactun' ),
//         'edit_item'         => esc_html__( 'Edit Category', 'tactun' ),
//         'update_item'       => esc_html__( 'Update Category', 'tactun' ),
//         'add_new_item'      => esc_html__( 'Add New Category', 'tactun' ),
//         'new_item_name'     => esc_html__( 'New Category Name', 'tactun' ),
//         'menu_name'         => esc_html__( 'Categories', 'tactun' ),
//     );

//     $args = array(
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'show_in_menu'      => true,
//         'has_archive'       => true,
//         'query_var'         => true,
//         'rewrite'           => array( 'slug' => 'solutions-cat' ),
//     );

//     register_taxonomy( 'solution_categories', array( 'solution', 'post', 'story', 'resource', 'event' ), $args );

//     /**
//      * Add "Country" taxonomy to the Solution post type
//      */
//     $labels = array(
//         'name'              => esc_html__( 'Country categories', 'tactun' ),
//         'singular_name'     => esc_html__( 'Country', 'tactun' ),
//         'search_items'      => esc_html__( 'Search Country', 'tactun' ),
//         'all_items'         => esc_html__( 'All Country', 'tactun' ),
//         'parent_item'       => esc_html__( 'Parent Country', 'tactun' ),
//         'parent_item_colon' => esc_html__( 'Parent Country:', 'tactun' ),
//         'edit_item'         => esc_html__( 'Edit Country', 'tactun' ),
//         'update_item'       => esc_html__( 'Update Country', 'tactun' ),
//         'add_new_item'      => esc_html__( 'Add New Country', 'tactun' ),
//         'new_item_name'     => esc_html__( 'New Country Name', 'tactun' ),
//         'menu_name'         => esc_html__( 'Country', 'tactun' ),
//     );

//     $args = array(
//         'hierarchical'      => true,
//         'labels'            => $labels,
//         'show_ui'           => true,
//         'show_admin_column' => true,
//         'show_in_menu'      => true,
//         'has_archive'       => true,
//         'query_var'         => true,
//         'rewrite'           => array( 'slug' => 'country' ),
//     );

//     register_taxonomy( 'country_categories', array( 'event' ), $args );

// }

// add_action( 'init', 'tactun_register_taxonomies');



// add_action( 'init', function() {

//     global $wp_taxonomies;

//     $wp_taxonomies['post_tag']->labels->name = 'Business Area';
//     $wp_taxonomies['post_tag']->labels->menu_name = 'Business Area';
//     $wp_taxonomies['post_tag']->labels->singular_name = 'Business Area';
//     $wp_taxonomies['post_tag']->labels->search_items = 'Search Business Area';

//     $wp_taxonomies['post_tag']->label = 'Business Area';

// }, 1 );

// add_action( 'init', 'create_product_line' );
// function create_product_line() {
//     register_taxonomy( 
//             'product_line', //your tags taxonomy
//             array('story', 'resource'),  // Your post type
//             array( 
//                 'hierarchical'  => false, 
//                 'label'         => __( 'Product line', 'tactun' ), 
//                 'singular_name' => __( 'Line', 'tactun'), 
//                 'rewrite'       => true, 
//                 'show_admin_column' => true,
//                 'query_var'     => true 
//             )  
//         );
 }
?>