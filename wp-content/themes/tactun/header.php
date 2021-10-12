<?php
/**
 * @package Sandvik
 * @since Sandvik 1.0
 */
?><!DOCTYPE html>
    <?php 
    global $tactun_options; 
    $custom_logo = tactun_option( 'custom_logo', false, 'url' ); 
    ?>
<html class="no-js" <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="profile" href="https://gmpg.org/xfn/11">

        <?php wp_head(); ?>

    </head>
<body>

<header id="masthead" class="header">
<div id="content-fulid" class="container-fluid">
    <div class="row">
        <div id="logo" class="col-lg-3 col-md-5 col-sm-5">
            <?php if( !empty( $custom_logo ) ) { ?>
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url( $custom_logo ) ?>" class="custom-logo" alt="<?php bloginfo( 'Name' ) ?>">
                </a>
            <?php } ?>
            <?php // the_custom_logo(); ?>
<!--             <span class="logo-title">
                <?php // echo get_bloginfo('name'); ?>
            </span> -->
        </div>
        <div class="col-lg-7 col-md-7 col-sm-5 offset-md-2 align-self-end end no-relative">
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
    </div>
</div>
</header>

	<div id="content" class="content">