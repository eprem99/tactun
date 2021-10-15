<?php
/**
 * @package Sandvik
 * @since Sandvik 1.0
 */
?><!DOCTYPE html>
    <?php 
    global $tactun_options; 
    $custom_logo = tactun_option( 'custom_logo', false, 'url' ); 
    $dark_logo = tactun_option( 'custom_logo_fixed', false, 'url' ); 
    ?>
<html class="no-js" <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>

    </head>
<body id="scrollpage">

<header id="masthead" class="header">
<div id="content-fulid" class="container-fluid">
    <div class="row">
        <div id="logo" class="col-lg-2 col-md-3 col-sm-3">
            <?php if( !empty( $custom_logo ) ) { ?>
                <a class="custom-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url( $custom_logo ) ?>" alt="<?php bloginfo( 'Name' ) ?>">
                </a>
            <?php } ?>
            <?php if( !empty( $dark_logo ) ) { ?>
                <a class="dark-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url( $dark_logo ) ?>" alt="<?php bloginfo( 'Name' ) ?>">
                </a>
            <?php } ?>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-5">
             <?php get_template_part('template-parts/header/mobile-menu'); ?>  
            <nav id="navigation">
                <div id="access" role="navigation">
                	<?php wp_nav_menu( [ 
                		'container_class' => 'main-menu',
                		'theme_location'  => 'menu-1'
                	] ); ?>
                </div>
            </nav>
        </div>    
        <div class="col-lg-3 col-md-2 col-sm-2">
            <div class="flex">
                <?php get_search_form( ); ?>
                <div class="login-button">
                    <a href="#">
                        <?php esc_html_e('Log in', 'tactun'); ?> <span><svg width="11" height="16" viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 1C4.11929 1 3 2.11929 3 3.5C3 4.88071 4.11929 6 5.5 6C6.88071 6 8 4.88071 8 3.5C8 2.11929 6.88071 1 5.5 1ZM2 3.5C2 1.567 3.567 0 5.5 0C7.433 0 9 1.567 9 3.5C9 5.433 7.433 7 5.5 7C3.567 7 2 5.433 2 3.5ZM0.867464 8.93908C1.42721 8.34201 2.19356 8 3 8H8C8.80644 8 9.57279 8.34201 10.1325 8.93908C10.6913 9.53505 11 10.3369 11 11.1667V15.5C11 15.7761 10.7761 16 10.5 16C10.2239 16 10 15.7761 10 15.5V11.1667C10 10.582 9.78195 10.0272 9.403 9.62302C9.02507 9.21989 8.51964 9 8 9H3C2.48036 9 1.97493 9.21989 1.597 9.62302C1.21805 10.0272 1 10.582 1 11.1667V15.5C1 15.7761 0.776142 16 0.5 16C0.223858 16 0 15.7761 0 15.5V11.1667C0 10.3369 0.308739 9.53505 0.867464 8.93908Z"/>
</svg></span>
                    </a>
                </div>
                <div class="demo-button">
                    <a href="#">
                        <?php esc_html_e('Request a Demo', 'tactun'); ?>
                    </a>
                </div>
            </div>
        </div> 
    </div>
</div>
</header>

	<div id="content" class="content">