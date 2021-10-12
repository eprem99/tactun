<?php
/**
 * Template for 404 Errors
 */

get_header(); ?>

    <div class="error-page">
        <div class="container">

            <h1 class="error-page-heading"><?php echo esc_html__('404 Error', 'sanfvik'); ?></h1>
            <h3 class="error-page-subheading"><?php echo esc_html__('Page Not Found', 'sanfvik') ?></h3>
            <p class="error-page-text"><?php echo esc_html__('The page you are looking for does not exist.', 'sanfvik'); ?></p>

            <div class="error-buttons">
                <a href="javascript: history.go(-1)" class="error-page-button btn pink"><?php echo esc_html__('Previous Page', 'sanfvik'); ?></a>
                <a href="<?php echo esc_url( site_url() ); ?>" class="error-page-button btn pink"><?php echo esc_html__('Go Back Home', 'sanfvik'); ?></a>
            </div>

        </div>
    </div>

<?php get_footer(); ?>