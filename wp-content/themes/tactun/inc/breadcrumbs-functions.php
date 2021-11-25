<?php
/**
 * Bredcrumbs
 *
 * @since 1.0.0
 */

function the_breadcrumb () {
     
    // Settings
    $separator  = ' / ';
    $id         = 'breadcrumbs';
    $class      = 'mt-bredcrumb row';
    $home_title = 'Home';
     
    // Get the query & post information
    global $post,$wp_query;
    $category = get_the_category();
    $post_type = get_post_type( get_the_ID() );
    if($post_type == 'solution'){
        $link = get_the_permalink(7);
    }elseif($post_type == 'story'){
        $link = get_the_permalink(360);
    }elseif($post_type == 'resource'){
        $link = get_the_permalink(9);
    }elseif($post_type == 'event'){
        $link = get_the_permalink(320);
    }else{
        $link = get_post_type_archive_link( $post_type );
    }
    $post_type_obj = get_post_type_object( $post_type );
     
    // Build the breadcrums
    echo '<ul id="' . $id . '" class="m0 ' . $class . '">';
     
    // Do not display on the homepage
    if ( !is_front_page() ) {
         
        // Home page
        echo '<li class="breadcrumb-item"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a><span>'.$separator.'</span></li>';
         
        if ( is_singular('post') ) {
             
            // Single post (Only display the first category)
            echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id ) . '" title="' . $category[0]->cat_name . '">' . $category[0]->cat_name . '</a></li>';
            echo '<li class="breadcrumb-item active">'. get_the_title() . '</li>';
             
        } else if ( is_single() ) {
            $tags = get_the_terms(get_the_id(), 'solution_categories');
            $color = get_term_meta($tags[0]->term_id, 'category_color', true); 

            if(!empty($color)){
                $style = 'color:'.$color.';';
                echo '<style>.banner-title::before{background:'.$color.';}</style>';
            }else{
               $style = ''; 
               echo '<style>.banner-title::before{background:#000;}</style>';
            }
            echo '<li class="breadcrumb-item"><a href="' . $link . '" title="' . $post_type_obj->labels->name . '">' . $post_type_obj->labels->name . '</a><span>'.$separator.'</span></li>';
            echo '<li class="breadcrumb-item active" style="'.$style.'">'. get_the_title() . '</li>';

        } else if ( is_category() ) {
             
            // Category page
            echo '<li class="breadcrumb-item active">' . $category[0]->cat_name . '</li>';
             
        } else if ( is_page() ) {
             
            // Standard page
            if( $post->post_parent ){
                 
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                 
                // Get parents in the right order
                $anc = array_reverse($anc);
                 
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents = '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                 
                // Display parent pages
                echo $parents;
                 
                // Current page
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
                 
            } else {
                 
                // Just display current page if not parents
                echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
                 
            }
             
        } else if ( is_tag() ) {
             
            // Tag page
             
            // Get tag information
            $term_id = get_query_var('tag_id');
            $taxonomy = 'post_tag';
            $args ='include=' . $term_id;
            $terms = get_terms( $taxonomy, $args );
             
            // Display the tag name
            echo '<li class="breadcrumb-item active">' . $terms[0]->name . '</li>';
         
        } else if ( is_day() ) {
             
            // Day archive
             
            // Year link
            echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
             
            // Month link
            echo '<li class="breadcrumb-item"><a href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
             
            // Day display
            echo '<li class="breadcrumb-item active">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
             
        } else if ( is_month() ) {
             
            // Month Archive
             
            // Year link
            echo '<li class="breadcrumb-item"><a href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
             
            // Month display
            echo '<li class="breadcrumb-item active">' . get_the_time('M') . ' Archives</li>';
             
        } else if ( is_year() ) {
             
            // Display year archive
            echo '<li class="breadcrumb-item active">' . get_the_time('Y') . ' Archives</li>';
             
        } else if ( is_author() ) {
             
            // Auhor archive
             
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
             
            // Display author name
            echo '<li class="breadcrumb-item active">' . 'Author: ' . $userdata->display_name . '</li>';

        } elseif ( is_post_type_archive() ) {

            // Post Type Name
            echo '<li class="breadcrumb-item active">' . $post_type_obj->labels->singular_name . '</li>';

        } else if ( get_query_var('paged') ) {
             
            // Paginated archives
            echo '<li class="breadcrumb-item active">'.__('Page') . ' ' . get_query_var('paged') . '</li>';
             
        } else if ( is_search() ) {

            echo '<li class="breadcrumb-item"><a href="' . $link . '" title="' . $post_type_obj->labels->name . '">' . $post_type_obj->labels->name . '</a><span>'.$separator.'</span></li>';

            echo '<li class="breadcrumb-item active"><a href="'.get_the_permalink( get_the_ID() ).'">'. get_the_title() . '</a></li>';

            // Search results page
          //  echo '<li class="breadcrumb-item active">Search results for: ' . get_search_query() . '</li>';
         
        } elseif ( is_404() ) {
             
            // 404 page
            echo '<li class="breadcrumb-item active">' . 'Error 404' . '</li>';
        }
         
    }
     
    echo '</ul>';
     
}