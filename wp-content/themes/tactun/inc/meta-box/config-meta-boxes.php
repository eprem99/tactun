<?php
/**
 * Register Meta Boxes
 *
 * @package RH
 * @since 1.0.0
 */
// require_once( get_template_directory() . '/inc/options/theme-option.php' );
add_filter( 'rwmb_meta_boxes', 'tactun_register_meta_boxes' );

if ( ! function_exists( 'tactun_register_meta_boxes' ) ) {

	/**
	 * Register meta boxes function.
	 *
	 * @param array $meta_boxes - Array of meta boxes of the theme.
	 * @since 1.0.0
	 */


	function tactun_register_meta_boxes( $meta_boxes ) {

    $pages_array = get_pages();

	if(shortcode_exists("rev_slider")){ 
	$sliders = array(
		'0' =>  'Selsect Slider'
	);

	  $slider = new RevSlider();
	  $revolution_sliders = $slider->getArrSliders();

	  foreach ( $revolution_sliders as $revolution_slider ) {
		$alias = $revolution_slider->getAlias();
		$title = $revolution_slider->getTitle();
		    $sliders[$alias] = $title;
	  }

	 }else{
		$sliders = array(
			'0' =>  'No Slider found'
		); 
	 }
	 


    $solution_pages = array(
      'all' =>  'Selsect'
    );
    if( $pages_array && ! is_wp_error( $pages_array )  ){
        foreach( $pages_array as $page ){
        	//print_r($page);
                $solution_pages[$page->ID] = $page->post_title;
        }
    }

	$meta_boxes[] = array(
		'id' => 'pages-meta-box',
		'title' => esc_html__( 'Page Setings', 'framework' ),
		'post_types' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name'        => 'Select Slider',
				'id'          => 'slider',
				'type'        => 'select',
				'options'     =>  $sliders,
				// Allow to select multiple value?
				'multiple'        => false,
			),

		),

	);

	$meta_boxes[] = array(
		'id' => 'testimonials-meta-box',
		'title' => esc_html__( 'Testimonials Setings', 'framework' ),
		'post_types' => array( 'testimonials' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'framework' ),
				'id' => "testimonial_name",
				// 'desc' => esc_html__( 'Please provide the Name, Otherwise the Name will be displayed in its place.', 'framework' ),
				'type' => 'text',
			),

		),

	);


		$meta_boxes[] = array(
			'id' => 'solution-meta-box',
			'title' => esc_html__( 'Setings this category', 'framework' ),
			'taxonomies' => array( 'solution_categories' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => esc_html__( 'Color this category', 'framework' ),
					'desc' => esc_html__( 'Add color this category.', 'framework' ),
					'id' => "category_color",
					'type' => 'color',
					'js_options'    => array(
				        'palettes' => array( '#e5137d', '#ff6e00', '#21b6eb' )
				    ),
					'columns' => 6,
				),
				array(
					'name' => esc_html__( 'Image category', 'framework' ),
					'desc' => esc_html__( 'add image this category solution.', 'framework' ),
					'id' => "solution_image",
					'type' => 'image_advanced',
					'max_file_uploads' => 1,
					'columns' => 6,
				),
				array(
				    'name'        => 'Select redirect a page',
				    'id'          => 'solution_redirect',
				    'type'        => 'select',
	    			'options'     =>  $solution_pages,
				    // Allow to select multiple value?
				    'multiple'        => false,
				),

		    ),
  
		);
	

		// Banner Meta Box.
			$meta_boxes[] = array(
				'id' => 'banner-meta-box',
				'title' => esc_html__( 'Top Banner Area Settings', 'framework' ),
				'taxonomies' => 'category',
				'context' => 'normal',
				'priority' => 'low',
				'fields' => array(
					array(
						'name' => esc_html__( 'Banner Title', 'framework' ),
						'id' => "banner_title",
						'desc' => esc_html__( 'Please provide the Banner Title, Otherwise the Page Title will be displayed in its place.', 'framework' ),
						'type' => 'text',
					),
					array(
						'name' => esc_html__( 'Banner Image', 'framework' ),
						'id' => "page_banner_image",
						'desc' => esc_html__( 'Please upload the Banner Image. Otherwise the default banner image from theme options will be displayed.', 'framework' ),
						'type' => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name' => esc_html__( 'Banner Color', 'framework' ),
						'id' => "page_banner_color",
						'desc' => esc_html__( 'Please add banner color overlay.', 'framework' ),
						'type' => 'color',
						'alpha_channel' => true,
					),
					array(
						'name' => esc_html__( 'Banner Height', 'framework' ),
						'id' => "banner_banner_height",
						'desc' => esc_html__( 'Please provide the Banner height', 'framework' ),
						'type' => 'text',
					),
					array(
						'name' => esc_html__( 'Contact box display', 'framework' ),
						'id' => "page_contact_enabla",
						'desc' => esc_html__( 'Please select contact box display or no.', 'framework' ),
						'type' => 'switch',
						'on_label' => 'Yes',
						'off_label' => 'No',
	                    'default' => false,
					),
					array(
						'name' => esc_html__( 'Contact box backgraund image', 'framework' ),
						'id' => "page_contact_image",
						'desc' => esc_html__( 'Please upload the Contact box backgraund image.', 'framework' ),
						'type' => 'image_advanced',
						'max_file_uploads' => 1,
						'hidden' => array( 'page_contact_enabla', false ),
					),
					array(
						'name' => esc_html__( 'Contact box title', 'framework' ),
						'id' => "page_contact_title",
						'desc' => esc_html__( 'Please provide the contact box title', 'framework' ),
						'type' => 'text',
						'hidden' => array( 'page_contact_enabla',  false ),
					),
					array(
						'name' => esc_html__( 'Contact box description', 'framework' ),
						'id' => "page_contact_description",
						'desc' => esc_html__( 'Please provide the contact box description', 'framework' ),
						'type' => 'textarea',
						'hidden' => array( 'page_contact_enabla', false ),
					),
					array(
						'name' => esc_html__( 'Contact form shortcode', 'framework' ),
						'id' => "page_contact_shortcode",
						'desc' => esc_html__( 'Please provide the contact form shortcode', 'framework' ),
						'type' => 'text',
						'hidden' => array( 'page_contact_enabla', false ),
					),
					array(
						'name' => esc_html__( 'Backgraund color transparent', 'framework' ),
						'desc' => esc_html__( 'Add Backgraund color transparent.', 'framework' ),
						'id' => "page_contact_backgraund",
						'type' => 'color',
						'alpha_channel' => true,
						'hidden' => array( 'page_contact_enabla', false ),
					),
					array(
						'name' => esc_html__( 'Color text adn title', 'framework' ),
						'desc' => esc_html__( 'Add Color text adn title.', 'framework' ),
						'id' => "page_contact_color",
						'type' => 'color',
						'alpha_channel' => true,
						'hidden' => array( 'page_contact_enabla', false ),
					),
				),
			);

		$meta_boxes[] = array(
			'id' => 'event-meta-box',
			'title' => esc_html__( 'Setings this category', 'framework' ),
			'post_types' => array( 'event' ),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
				    'name'       => 'Date start',
				    'id'         => 'event-start-date',
				    'type'       => 'datetime',
				    'js_options' => array(
				    	'dateFormat'      => 'yy/mm/dd',
				        'stepMinute'      => 15,
				        'showTimepicker'  => true,
				        'controlType'     => 'select',
				        'showButtonPanel' => false,
				        'oneLine'         => true,
				        'save_format' => 'yy/mm/dd H:i',
				    ),
				    'inline'     => false,
				    'timestamp'  => false,
				    'columns' => 6,
				),
				array(
				    'name'       => 'Date end',
				    'id'         => 'event-end-date',
				    'type'       => 'datetime',
				    'js_options' => array(
				    	'dateFormat'      => 'yy/mm/dd',
				        'stepMinute'      => 15,
				        'showTimepicker'  => true,
				        'controlType'     => 'select',
				        'showButtonPanel' => false,
				        'oneLine'         => true,
				        'save_format' => 'yy/mm/dd H:i',
				    ),
				    'inline'     => false,
				    'timestamp'  => false,
				    'columns' => 6,
				),
				array(
					'name' => esc_html__( 'Enable register link', 'framework' ),
					'desc' => esc_html__( 'Enable register link.', 'framework' ),
					'id' => "event_link",
					'type' => 'switch',
					'on_label' => 'Yes',
					'off_label' => 'No',
                    'default' => false,
                    'columns' => 6,
				),
				array(
					'name' => esc_html__( 'Logo event', 'framework' ),
					'desc' => esc_html__( 'add logo this event.', 'framework' ),
					'id' => "event_image",
					'type' => 'image_advanced',
					'max_file_uploads' => 1,
					'columns' => 6,
				),
				array(
					'name' => esc_html__( 'Register Link', 'framework' ),
					'id' => "event_register",
					'desc' => esc_html__( 'Please enter register link', 'framework' ),
					'type' => 'text',
					'columns' => 12,
					'hidden' => array( 'event_link', false ),
				),
		    ),
  
		);
		// Apply a filter before returning meta boxes.
		$meta_boxes = apply_filters( 'framework_theme_meta', $meta_boxes );

		return $meta_boxes;

	}
}



