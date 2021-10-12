<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">
		<?php
		add_action('woocommerce_after_single_product_summary', 'show_cross_sell_in_single_product', 30);
		function show_cross_sell_in_single_product(){
		    $crosssells = get_post_meta( get_the_ID(), '_crosssell_ids',true);

		    if(empty($crosssells)){
		        return;
		    }

		    $args = array( 
		        'post_type' => 'product', 
		        'posts_per_page' => -1, 
		        'post__in' => $crosssells 
		        );
		    $products = new WP_Query( $args );
		    if( $products->have_posts() ) : 
		        echo '<div class="cross-sells"><h2>מוצרים קשורים</h2>';
		        woocommerce_product_loop_start();
		        while ( $products->have_posts() ) : $products->the_post();
		            wc_get_template_part( 'content', 'product' );
		        endwhile; // end of the loop.
		        woocommerce_product_loop_end();
		        echo '</div>';
		    endif;
		    wp_reset_postdata();
		} 
		?>

	</section> 
	<?php
endif;

wp_reset_postdata();
