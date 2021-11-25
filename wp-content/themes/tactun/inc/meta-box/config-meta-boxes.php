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
				'name'        => 'Transparent Header',
				'id'          => 'transparent_header',
				'type' => 'switch',
				'on_label' => 'Yes',
				'off_label' => 'No',
				'default' => false,
			),
			array(
				'name'        => 'Breadcrumbs show',
				'id'          => 'breadcrumbs_show',
				'type' => 'switch',
				'on_label' => 'Yes',
				'off_label' => 'No',
				'default' => true,
			),
			array(
				'name'        => 'Select Slider',
				'id'          => 'slider',
				'type'        => 'select',
				'options'     =>  $sliders,
				'multiple'    => false,
			),
			array(
				'name'        => 'Footer Top show',
				'id'          => 'footer_show',
				'type' => 'switch',
				'on_label' => 'Yes',
				'off_label' => 'No',
				'default' => true,
			),
			array(
				'name' => esc_html__( 'Footer banner', 'framework' ),
				'desc' => esc_html__( 'add footer banner.', 'framework' ),
				'id' => "banner_image",
				'type' => 'image_advanced',
				'max_file_uploads' => 1,
				'columns' => 6,
				'hidden' => array( 'footer_show',  false ),
				
			),
			array(
				'name' => esc_html__( 'Footer banner text', 'framework' ),
				'id' => "footer_banner_text",
				'type' => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
				'columns' => 6,
				'hidden' => array( 'footer_show',  false ),
			),

		),

	);

	$meta_boxes[] = array(
		'id' => 'applications_and_industries_product',
		'title' => esc_html__( 'Applications and Industries', 'framework' ),
		'post_types' => array( 'product' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
			//	'name' => esc_html__( 'Name', 'framework' ),
				'id' => "applications_and_industries",
				// 'desc' => esc_html__( 'Please provide the Name, Otherwise the Name will be displayed in its place.', 'framework' ),
				'type' => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),

		),

	);
	$meta_boxes[] = array(
		'id' => 'resources_product',
		'title' => esc_html__( 'Resources', 'framework' ),
		'post_types' => array( 'product' ),
		'context' => 'normal',
		'priority' => 'high',
		'fields' => array(
			array(
			//	'name' => esc_html__( 'Name', 'framework' ),
				'id' => "resources",
				// 'desc' => esc_html__( 'Please provide the Name, Otherwise the Name will be displayed in its place.', 'framework' ),
				'type' => 'wysiwyg',
				'raw'     => false,
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
				),
			),

		),

	);


		// $meta_boxes[] = array(
		// 	'id' => 'solution-meta-box',
		// 	'title' => esc_html__( 'Setings this category', 'framework' ),
		// 	'taxonomies' => array( 'solution_categories' ),
		// 	'context' => 'normal',
		// 	'priority' => 'high',
		// 	'fields' => array(
		// 		array(
		// 			'name' => esc_html__( 'Color this category', 'framework' ),
		// 			'desc' => esc_html__( 'Add color this category.', 'framework' ),
		// 			'id' => "category_color",
		// 			'type' => 'color',
		// 			'js_options'    => array(
		// 		        'palettes' => array( '#e5137d', '#ff6e00', '#21b6eb' )
		// 		    ),
		// 			'columns' => 6,
		// 		),
		// 		array(
		// 			'name' => esc_html__( 'Image category', 'framework' ),
		// 			'desc' => esc_html__( 'add image this category solution.', 'framework' ),
		// 			'id' => "solution_image",
		// 			'type' => 'image_advanced',
		// 			'max_file_uploads' => 1,
		// 			'columns' => 6,
		// 		),
		// 		array(
		// 		    'name'        => 'Select redirect a page',
		// 		    'id'          => 'solution_redirect',
		// 		    'type'        => 'select',
	    // 			'options'     =>  $solution_pages,
		// 		    // Allow to select multiple value?
		// 		    'multiple'        => false,
		// 		),

		//     ),
  
		// );
	

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

			// $meta_boxes[] = array(
			// 	'title'       => esc_html__( 'Category Atributes', 'framework' ),
			// 	'tabs'        => array(
			// 		'control' => array(
			// 			'label' => 'Control Channels',
			// 		),
			// 		'transducer'  => array(
			// 			'label' => 'Transducer Inputs',
			// 		),
			// 		'auxiliary'  => array(
			// 			'label' => 'Auxiliary Inputs',
			// 		),
			// 		'connectivity'  => array(
			// 			'label' => 'Connectivity Channels',
			// 		),
			// 		'demand'  => array(
			// 			'label' => 'Demand Features',
			// 		),

			// 	),
			// 	'tab_style'   => 'box',
			// 	'tab_wrapper' => false,
			// 	'id' => 'product_cat_atributes',
			// 	'taxonomies' => 'product_cat',
				
			// 	'fields' => array(
			// 		array(
			// 			'name' => esc_html__( 'DC Drive Outputs (PWM, 9-30V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add DC Drive Outputs (PWM, 9-30V).', 'framework' ),
			// 			'id' => "category_options_dc_drive_30",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'DC Drive Outputs (PWM, 9-50V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add DC Drive Outputs (PWM, 9-50V).', 'framework' ),
			// 			'id' => "category_options_dc_drive_50",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Stepper Drive Outputs (PWM, 9-48V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Stepper Drive Outputs (PWM, 9-48V).', 'framework' ),
			// 			'id' => "category_options_stepper_drive_48",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Servo Drive Outputs, Voltage (+/-10V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Servo Drive Outputs, Voltage (+/-10V).', 'framework' ),
			// 			'id' => "category_options_servo_drive_10",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Servo Servo Drive Outputs, Voltage/Current (+/-10V;+/-24mA)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Servo Drive Outputs, Voltage/Current (+/-10V;+/-24mA).', 'framework' ),
			// 			'id' => "category_options_servo_outputs_current",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Servo Drive Outputs, Voltage/Current (+/-10V;0-200mA)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Servo Drive Outputs, Voltage/Current (+/-10V;0-200mA).', 'framework' ),
			// 			'id' => "category_options_servo_drive_200mA",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'control',
			// 		),
			// 		//tab 2
			// 		array(
			// 			'name' => esc_html__( 'Signal Conditioning Inputs', 'framework' ),
			// 			'desc' => esc_html__( 'Add Signal Conditioning Inputs.', 'framework' ),
			// 			'id' => "category_options_signal_inputs",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'transducer',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'LVDT Inputs', 'framework' ),
			// 			'desc' => esc_html__( 'Add LVDT Inputs.', 'framework' ),
			// 			'id' => "category_options_lvdt",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'transducer',
			// 		),
			// 		// TAb 3
			// 		array(
			// 			'name' => esc_html__( 'Digital 5V I/O', 'framework' ),
			// 			'desc' => esc_html__( 'Add Digital 5V I/O.', 'framework' ),
			// 			'id' => "category_options_5v",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Digital 24V Inputs', 'framework' ),
			// 			'desc' => esc_html__( 'Add Digital 24V Inputs.', 'framework' ),
			// 			'id' => "category_options_24v",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),
					

			// 		array(
			// 			'name' => esc_html__( 'Relay Output (9-30V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Relay Output (9-30V).', 'framework' ),
			// 			'id' => "category_options_realy",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Analog Inputs, Voltage (+/-10V, 10kS/s)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Analog Inputs, Voltage (+/-10V, 10kS/s).', 'framework' ),
			// 			'id' => "category_options_analog_10",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Analog Inputs, Voltage (+/-10V, 60kS/s)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Analog Inputs, Voltage (+/-10V, 60kS/s).', 'framework' ),
			// 			'id' => "category_options_analog_60v",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Analog Inputs, Voltage/Current (+/-10V; 0-24mA, 10kS/s)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Analog Inputs, Voltage/Current (+/-10V; 0-24mA, 10kS/s).', 'framework' ),
			// 			'id' => "category_options_analog_current",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Analog Outputs, Voltage (+/-10V)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Analog Outputs, Voltage (+/-10V).', 'framework' ),
			// 			'id' => "category_options_analog_outputs_10",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Analog Outputs, Voltage/Current (+/-10V; +/-24mA)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Analog Outputs, Voltage/Current (+/-10V; +/-24mA).', 'framework' ),
			// 			'id' => "category_options_analog_current_10",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Digital Encoder Inputs (Single-Ended)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Digital Encoder Inputs (Single-Ended).', 'framework' ),
			// 			'id' => "category_options_encoder",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Digital Encoder Inputs (Differential)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Digital Encoder Inputs (Differential).', 'framework' ),
			// 			'id' => "category_options_encoder_differential",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),					
			// 		array(
			// 			'name' => esc_html__( 'Power output (5V, 500 mA)', 'framework' ),
			// 			'desc' => esc_html__( 'Add Power output (5V, 500 mA).', 'framework' ),
			// 			'id' => "category_options_power_output",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'auxiliary',
			// 		),		

			// 		array(
			// 			'name' => esc_html__( 'Ethernet', 'framework' ),
			// 			'desc' => esc_html__( 'Add Ethernet.', 'framework' ),
			// 			'id' => "category_options_ethernet",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'USB Host', 'framework' ),
			// 			'desc' => esc_html__( 'Add USB Host.', 'framework' ),
			// 			'id' => "category_options_usb_host",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'USB Device/Host', 'framework' ),
			// 			'desc' => esc_html__( 'Add USB Device/Host.', 'framework' ),
			// 			'id' => "category_options_usb_device_host",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'MicroSD Car Interface', 'framework' ),
			// 			'desc' => esc_html__( 'Add MicroSD Car Interface.', 'framework' ),
			// 			'id' => "category_options_microsd",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'RS-232', 'framework' ),
			// 			'desc' => esc_html__( 'Add RS-232.', 'framework' ),
			// 			'id' => "category_options_rs-232",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'RS-485', 'framework' ),
			// 			'desc' => esc_html__( 'Add RS-485.', 'framework' ),
			// 			'id' => "category_options_rs-485",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'CAN', 'framework' ),
			// 			'desc' => esc_html__( 'Add CAN.', 'framework' ),
			// 			'id' => "category_options_can",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'BISS', 'framework' ),
			// 			'desc' => esc_html__( 'Add BISS.', 'framework' ),
			// 			'id' => "category_options_biss",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'connectivity',
			// 		),

			// 		array(
			// 			'name' => esc_html__( 'Wi-Fi', 'framework' ),
			// 			'desc' => esc_html__( 'Add Wi-Fi.', 'framework' ),
			// 			'id' => "category_options_wi-fi",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'BISS', 'framework' ),
			// 			'desc' => esc_html__( 'Add BISS.', 'framework' ),
			// 			'id' => "category_options_biss",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Bluetooth', 'framework' ),
			// 			'desc' => esc_html__( 'Add Bluetooth.', 'framework' ),
			// 			'id' => "category_options_bluetooth",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( '4G*', 'framework' ),
			// 			'desc' => esc_html__( 'Add 4G*.', 'framework' ),
			// 			'id' => "category_options_4g",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( '4G+GPS*', 'framework' ),
			// 			'desc' => esc_html__( 'Add 4G+GPS*.', 'framework' ),
			// 			'id' => "category_options_4g_gps",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'GSM/GPRS*', 'framework' ),
			// 			'desc' => esc_html__( 'Add GSM/GPRS*.', 'framework' ),
			// 			'id' => "category_options_gsm_gprs",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'LTE CAT-1*', 'framework' ),
			// 			'desc' => esc_html__( 'Add LTE CAT-1*.', 'framework' ),
			// 			'id' => "category_options_lte_Cat_1",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'LTE CAT-4*', 'framework' ),
			// 			'desc' => esc_html__( 'Add LTE CAT-4*.', 'framework' ),
			// 			'id' => "category_options_lte_cat_4",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'Modbus', 'framework' ),
			// 			'desc' => esc_html__( 'Add Modbus.', 'framework' ),
			// 			'id' => "category_options_modbus",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 		array(
			// 			'name' => esc_html__( 'EtherCat', 'framework' ),
			// 			'desc' => esc_html__( 'Add EtherCat.', 'framework' ),
			// 			'id' => "category_options_ethercat",
			// 			'type' => 'text',
			// 			'alpha_channel' => true,
			// 			'std' => '0',
			// 			'tab' => 'demand',
			// 		),
			// 	),
			// );


			$meta_boxes[] = array(
				'id' => 'product_cat_setings',
				'title' => esc_html__( 'Category Settings', 'framework' ),
				'taxonomies' => 'product_cat',
				'context' => 'normal',
				'priority' => 'low',
				'fields' => array(
					array(
						'name' => esc_html__( 'Color blocks this category', 'framework' ),
						'desc' => esc_html__( 'Add Color blocks this category.', 'framework' ),
						'id' => "category_color",
						'type' => 'color',
						'alpha_channel' => true,
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



