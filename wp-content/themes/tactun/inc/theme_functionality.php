<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    die;
}

    // Load Redux Extensions
    if (file_exists(dirname(__FILE__) . '/redux/ReduxCore/inc/loader.php')) {
        require_once dirname(__FILE__) . '/redux/ReduxCore/inc/loader.php';
    }

    // Load Redux Framework
    if (!class_exists('ReduxFramework')) {
        require_once dirname(__FILE__) . '/redux/ReduxCore/framework.php';
    }
    // Load Extra Functions
    require_once dirname(__FILE__) . '/extra/additional_functions.php';
    
    // Register Custom PostTypes
    require_once dirname(__FILE__) . '/extra/register_post_types.php';

    // Register Custom Taxonomies
    require_once dirname(__FILE__) . '/extra/register_taxonomies.php';

	/** Meta Boxes */
   require_once dirname(__FILE__) . '/meta-box/tactun-meta-box.php';

    /** Widget Soc icons */
   require_once dirname(__FILE__) . '/widget/tactun_soc.php';


?>