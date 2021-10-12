<?php
/**
 * Visual Composer Extensions
 */

// don't load directly
if ( !defined( 'ABSPATH' ) )
    die( '-1' );


// if (class_exists('WPBakeryVisualComposer')) {

        // Remove Elements
    vc_remove_element('vc_wp_search');
    vc_remove_element('vc_wp_meta');
    vc_remove_element('vc_wp_recentcomments');
    vc_remove_element('vc_wp_calendar');
    vc_remove_element('vc_wp_pages');
    vc_remove_element('vc_wp_tagcloud');
  //  vc_remove_element('vc_wp_custommenu');
    vc_remove_element('vc_wp_text');
    vc_remove_element('vc_wp_posts');
    vc_remove_element('vc_wp_links');
    vc_remove_element('vc_wp_categories');
    vc_remove_element('vc_wp_archives');
    vc_remove_element('vc_wp_rss');
    vc_remove_element('vc_carousel');
    vc_remove_element('vc_posts_slider');
    vc_remove_element('vc_pinterest');
    vc_remove_element('vc_tweetmeme');
    vc_remove_element('vc_facebook');
    vc_remove_element('vc_flickr');
    vc_remove_element('vc_progress_bar');
    vc_remove_element('vc_pie');
    vc_remove_element('vc_round_chart');
    vc_remove_element('vc_line_chart');

    /**
     * Activate VC on custom post types
     */
    if (function_exists('vc_set_default_editor_post_types')) {
        vc_set_default_editor_post_types(array(
            'page',
            'post',
            'solution',
        ));
    }

    /**
     * Add new Google Fonts
     */
    if (!function_exists('tactun_vc_add_google_fonts')) {
        function tactun_vc_add_google_fonts($fonts)
        {
            $fonts[] = (object)array(
                'font_family' => 'Poppins',
                'font_styles' => '300,regular,500,600,700',
                'font_types' => '300 light:300:normal,400 regular:400:normal,500 medium:500:normal,600 semi-bold:600:normal,700 bold:700:normal'
            );
            return $fonts;
        }
    }
    add_filter('vc_google_fonts_get_fonts_filter', 'tactun_vc_add_google_fonts', 10, 1);


    /**
     * Filter to Replace Class Names
     */
    if( !function_exists('tactun_vc_custom_classes') ) {

        function tactun_vc_custom_classes($class_string, $tag) {
            if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
                $class_string = str_replace('vc_row-fluid', 'row-fluid', $class_string);
                $class_string = str_replace('vc_row', 'row', $class_string);
                $class_string = str_replace('wpb_row', '', $class_string);
                $class_string = str_replace('vc_inner', '', $class_string);
            }
            if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
                $class_string = preg_replace('/vc_col-sm-(\d{1,2})/', 'col-md-$1', $class_string);
                $class_string = str_replace('wpb_column', '', $class_string);
                $class_string = str_replace('vc_column_container', '', $class_string);
                $class_string = str_replace('vc_column-inner', 'column-inner', $class_string);
                $class_string = str_replace('wpb_wrapper', 'wrapper', $class_string); 
            }
            if ($tag == 'vc_section') {
                $class_string = str_replace('vc_section', 'section', $class_string);          
            }
 
            return $class_string;
        }
        add_filter('vc_shortcodes_css_class', 'tactun_vc_custom_classes', 10, 2);
    }

    /*---------------------------------------------------------------------------------
        BANNER
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Banner extends WPBakeryShortCode {}

    vc_map( array(

        'name' => esc_html__( 'Banner', 'tactun' ),
        'description' => esc_html__( 'Add banner.', 'tactun' ),
        'base' => 'tactun_banner',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Banner default image', 'tactun' ),
                'description' => esc_html__( 'Add image banner block', 'tactun' ),
                'param_name' => 'banner_img',
            ),

            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Width block for window', 'tactun' ),
                'description' => esc_html__( 'Add width block for window px', 'tactun' ),
                'param_name' => 'tactun_window_width',
                'std' => '567px',
                'save_always' => true,
            ),
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for window', 'tactun' ),
                'description' => esc_html__( 'Add height block for window px', 'tactun' ),
                'param_name' => 'tactun_window',
                'std' => '',
                'save_always' => true,
            ),
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for tablet', 'tactun' ),
                'description' => esc_html__( 'Add height block for tablet px', 'tactun' ),
                'param_name' => 'tactun_tablet',
                'std' => '',
                'save_always' => true,
            ),
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for mobile', 'tactun' ),
                'description' => esc_html__( 'Add height block for mobile px', 'tactun' ),
                'param_name' => 'tactun_mobile',
                'std' => '',
                'save_always' => true,
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__('Banner pralax option', 'tactun'),
                'param_name'  => 'tactun_paralax',
                'value'       => array(
                    esc_html__('Yes', 'tactun')   => '1',
                ),
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__('Banner breadcrumbs display', 'tactun'),
                'param_name'  => 'tactun_bredcrumbs',
                'value'       => array(
                    esc_html__('Yes', 'tactun')   => '1',
                ),  
            ),
            // Title this banner
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title this banner', 'tactun' ),
                'description' => esc_html__( 'Add title this block', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title font size this banner', 'tactun' ),
                'description' => esc_html__( 'Add title font size this block', 'tactun' ),
                'param_name' => 'tactun_title_size',
                'std' => '40px',
                'save_always' => true,
            ),
            // Font Weight
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Font Weight', 'tactun' ),
                'description' => esc_html__( 'Select the font weight for your heading.', 'tactun' ),
                'param_name' => 'tactun_title_weight',
                'value' => array(
                    esc_html__( 'Theme Default', 'tactun' ) => 'theme_default',
                    esc_html__( 'Light', 'tactun' ) => '300',
                    esc_html__( 'Normal', 'tactun' ) => '500',
                    esc_html__( 'Bold', 'tactun' ) => '900',
                ),
                'std' => 'theme_default',
                'save_always' => true,
            ),
            array(
                'type'    => 'checkbox',
                'heading' => esc_html__( 'Title line this banner', 'tactun' ),
                'description' => esc_html__( 'Add title line this block', 'tactun' ),
                'param_name' => 'tactun_title_line',
                'save_always' => false,
            ),
            // Description this banner
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Descritpion this banner', 'tactun' ),
                'description' => esc_html__( 'Add description this block', 'tactun' ),
                'param_name' => 'tactun_descrition',
                'std' => '',
                'save_always' => true,
            ),
            array(
                'type'        => 'checkbox',
                'heading'     => esc_html__('Banner colors', 'tactun'),
                'param_name'  => 'tactun_colors',
                'save_always' => false, 
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add backgraund color', 'tactun' ),
                'description' => esc_html__( 'Add backgraund color this block', 'tactun' ),
                'param_name' => 'tactun_backgraund_color',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add backgraund gradient', 'tactun' ),
                'description' => esc_html__( 'Add backgraund gardient this block', 'tactun' ),
                'param_name' => 'tactun_backgraund_gradient',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),
            // Text Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add title color', 'tactun' ),
                'description' => esc_html__( 'Add Title color banner block', 'tactun' ),
                'param_name' => 'tactun_backgraund_color_text',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add text color', 'tactun' ),
                'description' => esc_html__( 'Add Text color banner block', 'tactun' ),
                'param_name' => 'tactun_backgraund_color_desc',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add backgraund color title and description', 'tactun' ),
                'description' => esc_html__( 'Add backgraund color title and description', 'tactun' ),
                'param_name' => 'tactun_backgraund_title_color',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Add backgraund gradien title and description', 'tactun' ),
                'description' => esc_html__( 'Add backgraund gradient title and description', 'tactun' ),
                'param_name' => 'tactun_backgraund_title_gradient',
                'dependency'  => array( 'element' => 'tactun_colors', 'value' => 'true' ),
                'group'       => esc_html__( 'Colors', 'tactun' ),
            ),

        )

    ) );

    /*---------------------------------------------------------------------------------
        BANNER SLIDER
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Slider extends WPBakeryShortCodesContainer {}

    vc_map( array(

        'name' => esc_html__( 'Slider', 'tactun' ),
        'description' => esc_html__( 'Add slider.', 'tactun' ),
        'as_parent' => array( 'only' => 'tactun_sliders_blocks' ),
        'base' => 'tactun_slider',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'js_view' => 'VcColumnView',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for window', 'tactun' ),
                'description' => esc_html__( 'Add height block for window px', 'tactun' ),
                'param_name' => 'tactun_window',
                'std' => '',
                'save_always' => true,
            ),
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for tablet', 'tactun' ),
                'description' => esc_html__( 'Add height block for tablet px', 'tactun' ),
                'param_name' => 'tactun_tablet',
                'std' => '',
                'save_always' => true,
            ),
            // Height window
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height block for mobile', 'tactun' ),
                'description' => esc_html__( 'Add height block for mobile px', 'tactun' ),
                'param_name' => 'tactun_mobile',
                'std' => '',
                'save_always' => true,
            ),
        )

    ) );

    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Sliders_Blocks extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Slider blocks', 'tactun'),
        'description'     => esc_html__('Add slider block.', 'tactun'),
        'as_child'        => array( 'only' => 'tactun_slider' ),
        'base'            => 'tactun_sliders_blocks',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Slider images', 'tactun' ),
                'param_name' => 'slider_blocks_img',
                'group'       => esc_html__( 'Default', 'tactun' ),
            ),
            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title slider', 'tactun' ),
                'description' => esc_html__( 'Add title slider', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 1', 'tactun' ),
            ),
            // Description
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Description slider', 'tactun' ),
                'description' => esc_html__( 'Add description slider', 'tactun' ),
                'param_name' => 'tactun_description',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 1', 'tactun' ),
            ),
            // Link 
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link button slider', 'tactun' ),
                'description' => esc_html__( 'Add link button slider', 'tactun' ),
                'param_name' => 'tactun_link',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 1', 'tactun' ),
            ),
            // Title 2 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title slider 2', 'tactun' ),
                'description' => esc_html__( 'Add title slider', 'tactun' ),
                'param_name' => 'tactun_title_2',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 2', 'tactun' ),
            ),
            // Description 2
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Description slider 2', 'tactun' ),
                'description' => esc_html__( 'Add description slider 2', 'tactun' ),
                'param_name' => 'tactun_description_2',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 2', 'tactun' ),
            ),
            // Link 2
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Link button slider 2', 'tactun' ),
                'description' => esc_html__( 'Add link button slider 2', 'tactun' ),
                'param_name' => 'tactun_link_2',
                'std' => '',
                'save_always' => true,
                'group'       => esc_html__( 'Block 2', 'tactun' ),
            ),
        )
    ));


    /*---------------------------------------------------------------------------------
        IMAGE AND TEXT
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Image_Text extends WPBakeryShortCode {}

    vc_map( array(

        'name' => esc_html__( 'Image and text', 'tactun' ),
        'description' => esc_html__( 'Add Image and text block.', 'tactun' ),
        'base' => 'tactun_image_text',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title for Block', 'tactun' ),
                'description' => esc_html__( 'Add title for block', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Font Weight
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Font Weight', 'tactun' ),
                'description' => esc_html__( 'Select the font weight for your heading.', 'tactun' ),
                'param_name' => 'tactun_weight',
                'value' => array(
                    esc_html__( 'Theme Default', 'tactun' ) => 'theme_default',
                    esc_html__( 'Light', 'tactun' ) => '300',
                    esc_html__( 'Normal', 'tactun' ) => '500',
                    esc_html__( 'Bold', 'tactun' ) => '900',
                ),
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Add this block text', 'tactun' ),
                'description' => esc_html__( 'Add text for block', 'tactun' ),
                'param_name' => 'image_text_text', 
                'save_always' => true,    
            ), 
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Banner images', 'tactun' ),
                'param_name' => 'image_text_img',
            ),
            // Image left or right
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image left or right', 'tactun' ),
                'description' => esc_html__( 'Select Image left or right', 'tactun' ),
                'param_name' => 'image_left',
                'value' => array(
                    esc_html__( 'Left', 'tactun' ) => 'left',
                    esc_html__( 'Right', 'tactun' ) => 'right',
                ),
                'std' => 'left',
                'save_always' => true,
            ),
            // Image left or right
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Image and stext padding', 'tactun' ),
                'description' => esc_html__( 'add Image and text padding', 'tactun' ),
                'param_name' => 'image_padding',
                'value' => array(
                    esc_html__( '75px', 'tactun' ) => 'pr-7',
                    esc_html__( '65px', 'tactun' ) => 'pr-6',
                    esc_html__( '55px', 'tactun' ) => 'pr-5',
                    esc_html__( '45px', 'tactun' ) => 'pr-4',
                    esc_html__( '35px', 'tactun' ) => 'pr-3',
                    esc_html__( '25px', 'tactun' ) => 'pr-2',
                    esc_html__( '15px', 'tactun' ) => 'pr-1',
                    esc_html__( '0px', 'tactun' )  => 'pr-0',
                ),
                'std' => 'left',
                'save_always' => true,
            ),
        )

    ) );
    /*---------------------------------------------------------------------------------
        TEAM GRID
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Team_Grid extends WPBakeryShortCode {}

    vc_map( array(

        'name' => esc_html__( 'Team grid', 'tactun' ),
        'description' => esc_html__( 'Add team grid display.', 'tactun' ),
        'base' => 'tactun_tema_grid',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title for Block', 'tactun' ),
                'description' => esc_html__( 'Add title for block', 'tactun' ),
                'param_name' => 'team_title',
                'std' => '',
                'save_always' => true,
            ),
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number posts display', 'tactun' ),
                'description' => esc_html__( 'Add number them display greid system', 'tactun' ),
                'param_name' => 'team_display',
                'std' => '',
                'save_always' => true,
            ),

            // Number to show in row
            array(
                'type' => 'dropdown',
                'heading' => esc_html( 'Posts per row', 'tactun' ),
                'description' => esc_html__( 'How many posts would you like to display per row?', 'tactun' ),
                'param_name' => 'team_per_row',
                'value' => array(
                    esc_html__( 'One', 'tactun' ) => 'col-sm-12 col-xs-12',
                    esc_html__( 'Two', 'tactun' ) => 'col-sm-6 col-xs-12',
                    esc_html__( 'Three', 'tactun' ) => 'col-sm-4 col-xs-12',
                    esc_html__( 'Four', 'tactun' ) => 'col-sm-3 col-xs-12',
                    esc_html__( 'Five', 'tactun' ) => 'flex-md-2 col-xs-12',
                    esc_html__( 'Six', 'tactun' ) => 'col-sm-2 col-xs-12',
                ),
                'save_always' => true,

            ),
        )

    ) );

    /*---------------------------------------------------------------------------------
        SOLUTION GRID
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Solution_Grid extends WPBakeryShortCode {}

    vc_map( array(

        'name' => esc_html__( 'Solution grid', 'tactun' ),
        'description' => esc_html__( 'Add solution grid display.', 'tactun' ),
        'base' => 'tactun_solution_grid',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title for Block', 'tactun' ),
                'description' => esc_html__( 'Add title for block', 'tactun' ),
                'param_name' => 'solution_title',
                'std' => '',
                'save_always' => true,
            ),
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Number posts display', 'tactun' ),
                'description' => esc_html__( 'Add number them display greid system', 'tactun' ),
                'param_name' => 'solution_display',
                'std' => '',
                'save_always' => true,
            ),

            // Number to show in row
            array(
                'type' => 'dropdown',
                'heading' => esc_html( 'Posts per row', 'tactun' ),
                'description' => esc_html__( 'How many posts would you like to display per row?', 'tactun' ),
                'param_name' => 'solution_per_row',
                'value' => array(
                    esc_html__( 'One', 'tactun' ) => 'col-md-12 col-xs-12',
                    esc_html__( 'Two', 'tactun' ) => 'col-md-6 col-xs-12',
                    esc_html__( 'Three', 'tactun' ) => 'col-md-4 col-xs-12',
                    esc_html__( 'Four', 'tactun' ) => 'col-md-3 col-xs-12',
                    esc_html__( 'Five', 'tactun' ) => 'flex-md-2 col-xs-12',
                    esc_html__( 'Six', 'tactun' ) => 'col-md-2 col-xs-12',
                ),
                'save_always' => true,

            ),
        )

    ) );


    /*---------------------------------------------------------------------------------
        CUSTOM HEADING
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Custom_Heading extends WPBakeryShortCode{}

    vc_map( array(

        'name' => esc_html__( 'Custom Heading', 'tactun'),
        'description' => esc_html__( 'Create custom headings with optionals.', 'tactun' ),
        'base' => 'tactun_custom_heading',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(

            // The Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Heading Title', 'tactun' ),
                'description' => esc_html__( 'Enter the title for your custom heading.', 'tactun' ),
                'param_name' => 'heading_title'
            ),

            // The font size
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Font Size', 'tactun' ),
                'description' => esc_html__( 'Enter the font-size in px. Example: 30', 'tactun' ),
                'param_name' => 'heading_size'
            ),

            // The font size
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Line hright', 'tactun' ),
                'description' => esc_html__( 'Enter the Line height in px. Example: 30', 'tactun' ),
                'param_name' => 'heading_line'
            ),

            // Font Weight
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Font Weight', 'tactun' ),
                'description' => esc_html__( 'Select the font weight for your heading.', 'tactun' ),
                'param_name' => 'heading_weight',
                'value' => array(
                    esc_html__( 'Theme Default', 'tactun' ) => 'normal',
                    esc_html__( 'Light', 'tactun' ) => '300',
                    esc_html__( 'Normal', 'tactun' ) => '500',
                    esc_html__( 'Bold', 'tactun' ) => '900',
                ),
                'std' => 'normal',
                'save_always' => true,
            ),

            // Text Transform
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Text Transform', 'tactun' ),
                'description' => esc_html__( 'Select the transform for your heading.', 'tactun' ),
                'param_name' => 'heading_transform',
                'value' => array(
                    esc_html__( 'None', 'tactun' ) => 'none',
                    esc_html__( 'Capitalize', 'tactun' ) => 'capitalize',
                    esc_html__( 'Uppercase', 'tactun' ) => 'uppercase',
                    esc_html__( 'Lowercase', 'tactun' ) => 'lowercase',
                ),
                'std' => 'theme_default',
                'save_always' => true,
            ),

            // Letter spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Letter Spacing', 'tactun' ),
                'description' => esc_html__( '(Optional) Enter the letter-spacing in px. Example: -0.5', 'tactun' ),
                'param_name' => 'heading_spacing'
            ),

            // Text Alignment
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Text Alignment', 'tactun' ),
                'description' => esc_html__( 'Left, Right or Center your heading.', 'tactun' ),
                'param_name' => 'heading_alignnment',
                'value' => array(
                    esc_html__( 'Left', 'tactun' ) => 'left',
                    esc_html__( 'Center', 'tactun' ) => 'center',
                    esc_html__( 'Right', 'tactun' ) => 'right',
                ),
                'std' => 'left',
                'save_always' => true,
            ),

            // The heading tag (h1,h2,h3)
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Heading Tag', 'tactun' ),
                'description' => esc_html__( 'Would you like to use an h1, h2, h3, h4 tag?', 'tactun' ),
                'param_name' => 'heading_tag',
                'value' => array(
                    esc_html__( 'H1 Tag', 'tactun' ) => 'h1',
                    esc_html__( 'H2 Tag', 'tactun' ) => 'h2',
                    esc_html__( 'H3 Tag', 'tactun' ) => 'h3',
                    esc_html__( 'H4 Tag', 'tactun' ) => 'h4',
                    esc_html__( 'DIV Tag', 'tactun' ) => 'div',
                    esc_html__( 'SPAN Tag', 'tactun' ) => 'span',
                    esc_html__( 'P Tag', 'tactun' ) => 'p',
                ),
                'std' => 'h2',
                'save_always' => true,
            ),

            // The Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Custom Class', 'tactun' ),
                'description' => esc_html__( '(Optional) Add a class and refer to it in your CSS.', 'tactun' ),
                'param_name' => 'custom_class'
            ),

            // Normal Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Heading Color', 'tactun' ),
                'description' => esc_html__( 'Choose your heading\'s color', 'tactun' ),
                'param_name' => 'heading_color',
                'group'       => esc_html__( 'Colors', 'tactun' ),
                'dependency'  => array( 'element' => 'heading_color_type', 'value' => 'normal' ),
            ),

        )
    ));

    /*---------------------------------------------------------------------------------
        SUBSCRIBE BLOCK
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Subscribe_Block extends WPBakeryShortCode {}

    vc_map( array(

        'name' => esc_html__( 'Subscribe block', 'tactun' ),
        'description' => esc_html__( 'Add solution grid display.', 'tactun' ),
        'base' => 'tactun_subscribe_block',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title for Block', 'tactun' ),
                'description' => esc_html__( 'Add title for block', 'tactun' ),
                'param_name' => 'subscribe_title',
                'std' => '',
                'save_always' => true,
            ),
            // Title
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Description for Block', 'tactun' ),
                'description' => esc_html__( 'Add description for block', 'tactun' ),
                'param_name' => 'subscribe_descrikption',
                'std' => '',
                'save_always' => true,
            ),
            // Title
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Shortcode form', 'tactun' ),
                'description' => esc_html__( 'Add shortcode form for block', 'tactun' ),
                'param_name' => 'subscribe_shortcode',
                'std' => '',
                'save_always' => true,
            ),
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Backgraund image for Block', 'tactun' ),
                'description' => esc_html__( 'Add backgraund image for block', 'tactun' ),
                'param_name' => 'subscribe_img',
                'std' => '',
                'save_always' => true,
            ),
            // backgraujnd color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Backgraund color for Block', 'tactun' ),
                'description' => esc_html__( 'Add backgraund color for block', 'tactun' ),
                'param_name' => 'subscribe_color',
                'std' => '',
                'save_always' => true,
            ),
            // Text color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Text color for Block', 'tactun' ),
                'description' => esc_html__( 'Add text color for block', 'tactun' ),
                'param_name' => 'subscribe_colors',
                'std' => '',
                'save_always' => true,
            ),
            // Text color
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Title weight for Block', 'tactun' ),
                'description' => esc_html__( 'Add Title weight color for block', 'tactun' ),
                'param_name' => 'subscribe_weight',
                'value' => array(
                    esc_html__( '300', 'tactun' ) => '300',
                    esc_html__( '500', 'tactun' ) => '500',
                    esc_html__( '900', 'tactun' ) => '900',
                ),
                'save_always' => true,
                'save_always' => true,
            ),
        )
    ) );
    /*---------------------------------------------------------------------------------
        CREATE SPACE
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Create_Space extends WPBakeryShortCode{}

    vc_map( array(

        'name' => esc_html__( 'Create Space', 'tactun' ),
        'description' => esc_html__( 'Create spacing for desktops, tablets and mobile devices,', 'tactun' ),
        'base' => 'tactun_create_space',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(

            // Desktop Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Desktop Spacing', 'tactun' ),
                'description' => esc_html__( 'Enter the spacing in px for Desktop Sized Devices.', 'tactun' ),
                'param_name' => 'create_space_desktop',
            ),

            // Tablet Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Tablet Spacing', 'tactun' ),
                'description' => esc_html__( 'Enter the spacing in px for Tablet Sized Devices.', 'tactun' ),
                'param_name' => 'create_space_tablet',
            ),

            // Mobile Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Mobile Spacing', 'tactun' ),
                'description' => esc_html__( 'Enter the spacing in px for Mobile Sized Devices.', 'tactun' ),
                'param_name' => 'create_space_mobile'
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color block', 'tactun' ),
                'description' => esc_html__( 'Add color block', 'tactun' ),
                'param_name' => 'create_space_color',
                'std' => '',
                'save_always' => true,
            ),
        )

    ) );


    /*---------------------------------------------------------------------------------
        CREATE SPACE
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Color_Line extends WPBakeryShortCode{}

    vc_map( array(

        'name' => esc_html__( 'Color line', 'tactun' ),
        'description' => esc_html__( 'Create color line', 'tactun' ),
        'base' => 'tactun_color_line',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category' => esc_html( 'Tactun' ),
        'params' => array(

            // Desktop Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pading top', 'tactun' ),
                'description' => esc_html__( 'Enter the spacing in px for Desktop Sized Devices.', 'tactun' ),
                'param_name' => 'color_line_top',
            ),

            // Tablet Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pading bottom', 'tactun' ),
                'description' => esc_html__( 'Enter the spacing in px for Tablet Sized Devices.', 'tactun' ),
                'param_name' => 'color_line_bottom',
            ),
            // Tablet Spacing
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Height', 'tactun' ),
                'description' => esc_html__( 'Enter this block color height.', 'tactun' ),
                'param_name' => 'color_line_height',
            ),

            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color block', 'tactun' ),
                'description' => esc_html__( 'Add color block', 'tactun' ),
                'param_name' => 'color_line_color',
                'std' => '',
                'save_always' => true,
            ),
        )

    ) );

    /*---------------------------------------------------------------------------------
        Navigate 
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Navigate extends WPBakeryShortCodesContainer {}

    vc_map( array(

        'name' => esc_html__( 'Navigation', 'tactun' ),
        'description' => esc_html__( 'Add navigation.', 'tactun' ),
        'as_parent' => array( 'only' => 'tactun_navigate_blocks' ),
        'base' => 'tactun_navigate',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'js_view' => 'VcColumnView',
        'category' => esc_html( 'Tactun' ),
        'params' => array(

        )

    ) );

    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Navigate_Blocks extends WPBakeryShortCodesContainer {}

    vc_map(array(
        'name'            => esc_html__('Slider blocks', 'tactun'),
        'description'     => esc_html__('Add navigation block.', 'tactun'),
        'as_child'        => array( 'only' => 'tactun_navigate' ),
        'as_parent' => array( 'only' => 'tactun_navigate_blockis' ),
        'base'            => 'tactun_navigate_blocks',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'js_view' => 'VcColumnView',
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(

            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title navogation', 'tactun' ),
                'description' => esc_html__( 'Add title navigation', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Link 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Link navigation', 'tactun' ),
                'description' => esc_html__( 'Add link navigation', 'tactun' ),
                'param_name' => 'tactun_link',
                'std' => '',
                'save_always' => true,
            ),

        )
    ));
    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Navigate_Blockis extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Slider block', 'tactun'),
        'description'     => esc_html__('Add new block.', 'tactun'),
        'as_child'        => array( 'only' => 'tactun_navigate_blocks' ),
        'base'            => 'tactun_navigate_blockis',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(

            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title navogation', 'tactun' ),
                'description' => esc_html__( 'Add title navigation', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Link 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Link navigation', 'tactun' ),
                'description' => esc_html__( 'Add link navigation', 'tactun' ),
                'param_name' => 'tactun_link',
                'std' => '',
                'save_always' => true,
            ),
        )
    ));
    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Featured_Block extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Featured block', 'tactun'),
        'description'     => esc_html__('Add featured block.', 'tactun'),
        'base'            => 'tactun_featured_block',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(
            // Image
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'This Block image', 'tactun' ),
                'description' => esc_html__( 'Add image this block', 'tactun' ),
                'param_name' => 'featured_img',
                'std' => '',
                'save_always' => true,
            ),

            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title block', 'tactun' ),
                'description' => esc_html__( 'Add title navigation', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Description
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Description block', 'tactun' ),
                'description' => esc_html__( 'Add title block', 'tactun' ),
                'param_name' => 'tactun_descritpion',
                'std' => '',
                'save_always' => true,
            ),
            // Color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Color block', 'tactun' ),
                'description' => esc_html__( 'Add color block', 'tactun' ),
                'param_name' => 'tactun_color',
                'std' => '',
                'save_always' => true,
            ),
        )
    ));


    /*---------------------------------------------------------------------------------
        Acardeon
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Accordion extends WPBakeryShortCodesContainer {}

    vc_map( array(

        'name' => esc_html__( 'Accordion', 'tactun' ),
        'description' => esc_html__( 'Add Accordion.', 'tactun' ),
        'as_parent' => array( 'only' => 'tactun_accordion_blocks' ),
        'base' => 'tactun_accordion',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'js_view' => 'VcColumnView',
        'category' => esc_html( 'Tactun' ),
        'params' => array(

        )

    ) );


    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Accordion_Blocks extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Accordion blocks', 'tactun'),
        'description'     => esc_html__('Add Accordion block.', 'tactun'),
        'as_child'        => array( 'only' => 'tactun_accordion' ),
        'base'            => 'tactun_accordion_blocks',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(

            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title accordion', 'tactun' ),
                'description' => esc_html__( 'Add title accordion', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Link 
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Description accordion', 'tactun' ),
                'description' => esc_html__( 'Add description accordion', 'tactun' ),
                'param_name' => 'tactun_description',
                'std' => '',
                'save_always' => true,
            ),
        )
    ));

    /*---------------------------------------------------------------------------------
        Filter Block
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Filter_Blocks extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Filter block', 'tactun'),
        'description'     => esc_html__('Add your filter block.', 'tactun'),
        'base'            => 'tactun_filter_blocks',
        'icon' => 'icon-wpb-toggle-small-expand',
        'content_element' => true,
        'show_settings_on_create' => true,
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Enable filter', 'tactun' ),
                'description' => esc_html__( 'Enable filter', 'tactun' ),
                'param_name' => 'filter_enabled',
                'save_always' => false,
            ),
            array(
                'type' => 'checkbox',
                'heading' => esc_html__( 'Enable ajax pagination', 'tactun' ),
                'description' => esc_html__( 'Enable ajax pagination', 'tactun' ),
                'param_name' => 'filter_pagination',
                'save_always' => false,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Select your post type this block', 'tactun' ),
                'description' => esc_html__( 'Select your post type this block', 'tactun' ),
                'param_name' => 'filter_type',
                'value' => array(
                    esc_html__( 'Events', 'tactun' ) => 'event',
                    esc_html__( 'Customer Stories', 'tactun' ) => 'story',
                    esc_html__( 'Resources', 'tactun' ) => 'resource',
                    // esc_html__( 'Blog', 'tactun' ) => 'post',
                ),
                'save_always' => true,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html( 'Posts per row', 'tactun' ),
                'description' => esc_html__( 'How many posts would you like to display per row?', 'tactun' ),
                'param_name' => 'post_per_row',
                'value' => array(
                    esc_html__( 'One', 'tactun' ) => 'col-md-12  col-sm-12 col-xs-12',
                    esc_html__( 'Two', 'tactun' ) => 'col-md-6 col-sm-1 col-xs-12',
                    esc_html__( 'Three', 'tactun' ) => 'col-md-4 col-sm-6 col-xs-12',
                    esc_html__( 'Four', 'tactun' ) => 'col-md-3 col-sm-4 col-xs-12',
                    esc_html__( 'Five', 'tactun' ) => 'flex-md-2 col-sm-3 col-xs-12',
                    esc_html__( 'Six', 'tactun' ) => 'col-md-2 col-sm-4 col-xs-12',
                ),
                'save_always' => true,

            ),
            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Post per page', 'tactun' ),
                'description' => esc_html__( 'Add number posts, -1 all', 'tactun' ),
                'param_name' => 'posts_per_page',
                'std' => '',
                'save_always' => true,
            ),
            // Title 1 
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title this block', 'tactun' ),
                'description' => esc_html__( 'Add title this block', 'tactun' ),
                'param_name' => 'tactun_title',
                'std' => '',
                'save_always' => true,
            ),
            // Description
            array(
                'type' => 'textarea',
                'heading' => esc_html__( 'Title this block', 'tactun' ),
                'description' => esc_html__( 'Add title this block', 'tactun' ),
                'param_name' => 'tactun_description',
                'std' => '',
                'save_always' => true,
            ),
        )
    ));

    /*---------------------------------------------------------------------------------
        Slider Blocks
    -----------------------------------------------------------------------------------*/
    class WPBakeryShortCode_Tactun_Clients extends WPBakeryShortCode {}

    vc_map(array(
        'name'            => esc_html__('Clients blocks', 'tactun'),
        'description'     => esc_html__('Add Client block.', 'tactun'),
        'base'            => 'tactun_clients',
        'icon' => 'icon-wpb-toggle-small-expand',
        'category'        => esc_html( 'Tactun' ),
        'params'          => array(
            // Link 
            array(
                'type' => 'attach_images',
                'heading' => esc_html__( 'This Block image', 'tactun' ),
                'description' => esc_html__( 'Add image this block', 'tactun' ),
                'param_name' => 'client_img',
                'std' => '',
                'save_always' => true,
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html( 'Posts per row', 'tactun' ),
                'description' => esc_html__( 'How many posts would you like to display per row?', 'tactun' ),
                'param_name' => 'client_per_row',
                'value' => array(
                    esc_html__( 'One', 'tactun' ) => 'col-sm-12 col-xs-12',
                    esc_html__( 'Two', 'tactun' ) => 'col-sm-6 col-xs-12',
                    esc_html__( 'Three', 'tactun' ) => 'col-sm-4 col-xs-12',
                    esc_html__( 'Four', 'tactun' ) => 'col-sm-3 col-xs-12',
                    esc_html__( 'Five', 'tactun' ) => 'flex-sm-2 col-xs-12',
                    esc_html__( 'Six', 'tactun' ) => 'col-sm-2 col-xs-12',
                ),
                'save_always' => true,

            ),
        )
    ));
// } // End Class_exists

?>