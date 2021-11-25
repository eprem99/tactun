<?php

/**
* For full documentation, please visit: http://docs.reduxframework.com/
* For a more extensive sample-config file, you may look at:
* https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
*/

if ( ! class_exists( 'Redux' ) ) {
return;
}

$opt_name = 'tactun_options';
$theme    = wp_get_theme();

$args = array(
'opt_name'              => $opt_name,
'dev_mode'              => FALSE,
'use_cdn'               => FALSE,
'display_name'          => $theme->get( 'Name' ),
'display_version'       => $theme->get( 'Version' ),
'page_slug'             => 'theme-options',
'page_title'            => 'Theme Options',
'update_notice'         => TRUE,
'redux_training'        => true,
'admin_bar'             => TRUE,
'menu_type'             => 'menu',
'page_parent'           => '',
'menu_title'            => 'Theme Options',
'allow_sub_menu'        => FALSE,
'page_parent_post_type' => 'your_post_type',
'default_mark'          => '*',
'class'                 => 'theme-options',
'output'                => TRUE,
'output_tag'            => TRUE,
'settings_api'          => TRUE,
'cdn_check_time'        => '1440',
'compiler'              => TRUE,
'page_permissions'      => 'manage_options',
'save_defaults'         => TRUE,
'show_import_export'    => TRUE,
'database'              => 'options',
'transient_time'        => '3600',
'network_sites'         => TRUE,
);


Redux::setArgs( $opt_name, $args );

/*--------------------------------------------------------*/
/* Layout
/*--------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Layout', 'tactun' ),
    'id'         => 'layout_options',
    'subsection' => false,
));

/**
 * Logos
 */
Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Logos & Favicon', 'tactun' ),
    'id'     => 'logo-favicon',
    'desc'   => '',
    'subsection' => true,
    'fields'        => array(
        array(
            'id'        => 'custom_logo',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Logo', 'tactun' ),
            'read-only' => false,
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/img/logo/logo-dark.png' ),
            'subtitle'  => esc_html__( 'Upload your custom site logo.', 'tactun' ),
        ),
        array(
            'id'        => 'custom_logo_fixed',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Dark Logo', 'tactun' ),
            'read-only' => false,
            'default'   => array( 'url' => get_template_directory_uri() . '/assets/img/logo/logo-dark.png' ),
            'subtitle'  => esc_html__( 'Upload your Dark site logo.', 'tactun' ),
        ),
        array(
            'title'            => esc_html__('Logo Margin', 'tactun'),
            'subtitle'         => esc_html__('Move your logo around to fit it perfectly.', 'tactun'),
            'id'               => 'logo_margin',
            'type'             => 'spacing',
            'output'           => array('.logo'),
            'mode'             => 'margin',
            'units'            => array('px'),
            'units_extended'   => 'false',
            'default'          => array(
                'margin-top'     => '5px',
                'margin-right'   => '0px',
                'margin-bottom'  => '0px',
                'margin-left'    => '0px',
                'units'          => 'px',
            )
        ),

        array(
            'id'    => 'favicon',
            'url'           => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Favicon', 'tactun' ),
            'subtitle'  => esc_html__( 'Upload your custom site favicon.', 'tactun' ),
        ),

        array(
            'id'        => 'iphone_icon',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Apple iPhone Icon ', 'tactun' ),
            'subtitle'  => esc_html__( 'Upload your custom iPhone icon (57px by 57px).', 'tactun' ),
        ),

        array(
            'id'        => 'iphone_icon_retina',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Apple iPhone Retina Icon ', 'tactun' ),
            'subtitle'  => esc_html__( 'Upload your custom iPhone retina icon (114px by 114px).', 'tactun' ),
        ),

        array(
            'id'        => 'ipad_icon',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Apple iPad Icon ', 'tactun' ),
            'subtitle'  => esc_html__( 'Upload your custom iPad icon (72px by 72px).', 'tactun' ),
        ),

        array(
            'id'        => 'ipad_icon_retina',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Apple iPad Retina Icon ', 'tactun' ),
            'subtitle'  => esc_html__( 'Upload your custom iPad retina icon (144px by 144px).', 'tactun' ),
        ),
    )
));

/*--------------------------------------------------------*/
/* Header
/*--------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Header', 'tactun' ),
    'id'         => 'header_options',
    'subsection' => false,
));

/**
 * header Section
 */
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Header options', 'tactun' ),
    'id'      => 'headers_options',
    'subsection' => true,
    'fields'  => array(
        // Enable Search
        array(
            'title'            => esc_html__('Enable Search', 'tactun'),
            'id'               => 'header_search',
            'type'             => 'switch',
            'default'          => true,
        ),
        // Enable Login button
        array(
            'title'            => esc_html__('Enable Login', 'tactun'),
            'id'               => 'header_login',
            'type'             => 'switch',
            'default'          => true,
        ),
        // Enable Request
        array(
            'title'            => esc_html__('Enable Request button', 'tactun'),
            'id'               => 'header_request',
            'type'             => 'switch',
            'default'          => true,
        ),
        // Request button link
        array(
            'title'            => esc_html__('Request button link', 'tactun'),
            'id'               => 'header_request_link',
            'type'             => 'text',
            'default'          => esc_html( '#' ),
            'required'         => array('header_request', '=', true),
        ),
    ),

));
/*--------------------------------------------------------*/
/* Footer
/*--------------------------------------------------------*/

Redux::setSection( $opt_name, array(
    'title'      => esc_html__( 'Footer  options', 'tactun' ),
    'id'         => 'footer_options',
    'subsection' => false,
));

/**
 * Footer Section
 */
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Footer options', 'tactun' ),
    'id'      => 'footers_options',
    'subsection' => true,
    'fields'  => array(
        // Enable Scroll top
        array(
            'title'            => esc_html__('Enable Scroll Top', 'tactun'),
            'id'               => 'scroll_top',
            'type'             => 'switch',
            'default'          => true,
        ),

    ),

));

/**
 * Copyright Section
 */
Redux::setSection( $opt_name, array(
    'title'   => esc_html__( 'Copyright', 'tactun' ),
    'id'      => 'copyright_options',
    'subsection' => true,
    'fields'  => array(

        // Top footer area
        array(
            'title'            => esc_html__('Copyright Text', 'tactun'),
            'subtitle'         => esc_html__('Enter the text which you would like in the copyright section (HTML Allowed).', 'tactun'),
            'id'               => 'copyright_text',
            'type'             => 'textarea',
            'default'          => esc_html( '© 2021 TACTUN LLC. All rights reserved.' )
        ),
        // Top footer area
        array(
            'title'            => esc_html__('Theme Creator', 'tactun'),
            'subtitle'         => esc_html__('Enter the text Theme Creator.', 'tactun'),
            'id'               => 'creater_text',
            'type'             => 'textarea',
            'default'          => esc_html( 'VECTO' )
        ),
        // Enable Facebook
        array(
            'title'            => esc_html__('Enable Facebook', 'tactun'),
            'id'               => 'footer_social_facebook',
            'type'             => 'switch',
            'default'          => true,
        ),

        // Facebook URL
        array(
            'title'            => esc_html__('Facebook URL', 'tactun'),
            'id'               => 'footer_social_facebook_url',
            'type'             => 'text',
            'default'          => esc_html( 'http://www.facebook.com' ),
            'required'         => array('footer_social_facebook', '=', true),
        ),

        // Enable Twitter
        array(
            'title'            => esc_html__('Enable Twitter', 'tactun'),
            'id'               => 'footer_social_twitter',
            'type'             => 'switch',
            'default'          => true,
        ),

        // Twitter URL
        array(
            'title'            => esc_html__('Twitter URL', 'tactun'),
            'id'               => 'footer_social_twitter_url',
            'type'             => 'text',
            'default'          => esc_html( 'http://www.twitter.com' ),
            'required'         => array('footer_social_twitter', '=', true),
        ),

        // Enable rss
        array(
            'title'            => esc_html__('Enable Rss', 'tactun'),
            'id'               => 'footer_social_rss',
            'type'             => 'switch',
            'default'          => true,
        ),

        // Rss URL
        array(
            'title'            => esc_html__('Rss URL', 'tactun'),
            'id'               => 'footer_social_rss_url',
            'type'             => 'text',
            'default'          => esc_html( get_site_url() ),
            'required'         => array('footer_social_rss', '=', true),
        ),

        // Enable Youtube
        array(
            'title'            => esc_html__('Enable youtube', 'tactun'),
            'id'               => 'footer_social_youtube',
            'type'             => 'switch',
            'default'          => false,
        ),

        // Youtube URL
        array(
            'title'            => esc_html__('Youtube URL', 'tactun'),
            'id'               => 'footer_social_youtube_url',
            'type'             => 'text',
            'default'          => esc_html( 'https://www.youtube.com/' ),
            'required'         => array('footer_social_youtube', '=', true),
        ),

    ),

));