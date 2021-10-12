<?php
add_action('wp_ajax_myfilter', 'geg_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'geg_filter_function');


add_filter( 'posts_where', 'filter_where' );

function geg_filter_function(){
    

	$args = array(
		'post_type' => $_POST['posttype'],
		'post_author' => $_POST['author'],
		'post_status' => 'publish',

	);

    if( isset( $_POST['countryfilter'] ) && !empty($_POST['countryfilter']) != "") {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'country_categories',
				'field' => 'id',
				'terms' => $_POST['countryfilter'],
			)
		);

    }
    if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter']) != '') {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }   
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "") && isset( $_POST['countryfilter'] ) && !empty($_POST['countryfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			),
			array(
				'taxonomy' => 'country_categories',
				'field' => 'id',
				'terms' => $_POST['countryfilter'],
			)
		);

    }    

    if(isset($_POST['dates']) && !empty($_POST['dates'] != "")){
    	$dates = $_POST['dates'];
    $date = substr($_POST['dates'], 0, 10);
    $dateto = substr($_POST['dates'], 14, 24);
     $after = date( 'F jS, Y', strtotime($date ));
	    $args['date_query'] = array(
	        array(
	            'after' => $after,
	            'before'    => array(
	                'year'  => date( 'Y', strtotime($dateto)),
	                'month' => date( 'm', strtotime($dateto)),
	                'day'   => date( 'd', strtotime($dateto)),
	            ),
	            'inclusive' => true,
	        )
	    );
    }

	$query = new WP_Query( $args );

	if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
			<div id="post-<?php the_ID() ?>" class="<?php echo $_POST['perrow']; ?>">
              <?php get_template_part( 'template-parts/event/eventpost' ); ?>
          </div>
		<?php endwhile; wp_reset_postdata();?>
		

	<?php else :
		echo '<div class="col-md-12 text-center mt-4 mb-4">No posts found</div>';
	endif;
 
	die();
}

remove_filter( 'posts_where', 'filter_where' );


add_action('wp_ajax_loadmore', 'true_load');
add_action('wp_ajax_nopriv_loadmore', 'true_load');	
function true_load(){
	
	$args = array(
	'post_type' => $_POST['type'],
	'post_status' => 'publish',
	'posts_per_page' => 6,
	'paged'          => $_POST['page'] + 1,
	);
	
$query = new WP_Query( $args );?>
<?php if ( $query->have_posts() ) : ?>			

<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<div id="post-<?php the_ID() ?>" class="<?php echo $_POST['post_per_row']; ?> mb-4">
      <?php if($_POST['type'] == 'event'){
            get_template_part( 'template-parts/event/eventpost' ); 
        }elseif($_POST['type'] == 'story'){
        	get_template_part( 'template-parts/stories/storiespost' ); 
        }
        ?>
   </div>
<?php endwhile; ?>
<?php endif; 
	die();
}

/********************* BLOG FILTER //*/

add_action('wp_ajax_blogfilter', 'geg_blogfilter_function');
add_action('wp_ajax_nopriv_blogfilter', 'geg_blogfilter_function');


function geg_blogfilter_function(){
    

	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',

	);

    if( isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter']) != "") {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			)
		);

    }
    if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter']) != '') {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }   
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "") && isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }    


	$query = new WP_Query( $args );

	if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
              <?php get_template_part( 'template-parts/blog/blogpage' ); ?>
		<?php endwhile; wp_reset_postdata();?>
		

	<?php else :
		echo '<div class="col-md-12 text-center mt-4 mb-4">No posts found</div>';
	endif;
 
	die();
}


/********************* STORY FILTER //*/

add_action('wp_ajax_csfilter', 'geg_csfilter_function');
add_action('wp_ajax_nopriv_csfilter', 'geg_csfilter_function');


function geg_csfilter_function(){
    

	$args = array(
		'post_type' => 'story',
		'post_status' => 'publish',

	);

    if( isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter']) != "") {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			)
		);

    }
    if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter']) != '') {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    } 
    if( isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter']) != '') {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['tagfilter'],
			)
		);

    }   
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "") 
 		&& isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter'] != "") 
 		&& isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			),
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }    
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "")	&& isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			),
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			),
		);

    }   
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "")	&& isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['tagfilter'],
			),
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			),
		);

    }  
 	if( isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter'] != "")	&& isset( $_POST['solutionfilter'] ) && !empty($_POST['solutionfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'solution_categories',
				'field' => 'id',
				'terms' => $_POST['solutionfilter'],
			),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['tagfilter'],
			),
		);

    }  
	$query = new WP_Query( $args );

	if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
		<div id="post-<?php the_ID() ?>" class="<?php echo $_POST['perrow']; ?> mb-3">
              <?php get_template_part( 'template-parts/stories/storiespost' ); ?>
        </div>      
		<?php endwhile; wp_reset_postdata();?>
		

	<?php else :
		echo '<div class="col-md-12 text-center mt-4 mb-4">No posts found</div>';
	endif;
 
	die();
}


/********************* Resurce FILTER //*/

add_action('wp_ajax_resfilter', 'geg_resfilter_function');
add_action('wp_ajax_nopriv_resfilter', 'geg_resfilter_function');


function geg_resfilter_function(){
    

	$args = array(
		'post_type' => 'resource',
		'post_status' => 'publish',

	);

    if( isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter']) != "") {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['tagfilter'],
			)
		);

    }
    if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter']) != '') {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }   
 	if( isset( $_POST['categoryfilter'] ) && !empty($_POST['categoryfilter'] != "") && isset( $_POST['tagfilter'] ) && !empty($_POST['tagfilter'] != "")) {
		$args['tax_query'] = array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $_POST['tagfilter'],
			),
			array(
				'taxonomy' => 'product_line',
				'field' => 'id',
				'terms' => $_POST['categoryfilter'],
			)
		);

    }    


	$query = new WP_Query( $args );

	if( $query->have_posts() ): while( $query->have_posts() ): $query->the_post(); ?>
		<div id="post-<?php the_ID() ?>" class="<?php echo $_POST['perrow']; ?> mb-3">
              <?php get_template_part( 'template-parts/stories/storiespost' ); ?>
        </div>      
		<?php endwhile; wp_reset_postdata();?>
		

	<?php else :
		echo '<div class="col-md-12 text-center mt-4 mb-4">No posts found</div>';
	endif;
 
	die();
}

?>