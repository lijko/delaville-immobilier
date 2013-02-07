<?php

/**
 * Post options
 *
 * => Property price (sale)
 * => Property price (rent)
 * => Property details
 * => Property location
 *
 */

add_action('init', 'ts_post_options');

function ts_post_options() {

    // Initialize Post Options API
    require( TEMPLATEPATH . '/admin/post-options-api.1.0.1.php' );
    $post_options = get_post_options_api( '1.0.1' );
    $post_fields = get_post_options_api_fields( '1.0.1' );
	
	/**
	 * Property price (sale)
	 */
    
    $post_options->register_post_options_section( 'property_price_sale', __('Property Price', TS_DOMAIN) );
	$post_options->add_section_to_post_type( 'property_price_sale', 'sale' );
	
	$post_options->register_post_option(
		array(
			'id' => '_price',
			'title' => __('Price', TS_DOMAIN).' ('. apply_filters('ts_currency', ts_get_option('ts_currency')) .')',
			'section' => 'property_price_sale',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
	    array( 
	    	'id' => '_price_sold',
	    	'title' => __('Status', TS_DOMAIN),
	    	'section' => 'property_price_sale',
	    	'callback' => $post_fields->checkbox(
	    		array(
	    			'label' => __('Property is sold', TS_DOMAIN)
	    		)
	    	)
	    )
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_price_notice',
			'title' => '<strong>'.__('Please notice!', TS_DOMAIN).'</strong>',
			'section' => 'property_price_sale',
			'callback' => 'ts_property_price_notice'
		)
	);
	
	/**
	 * Property price (rent)
	 */
    
    $post_options->register_post_options_section( 'property_price_rent', __('Property Price', TS_DOMAIN) );
	$post_options->add_section_to_post_type( 'property_price_rent', 'rent' );
	 
	$rental_period_1 = ts_get_option('ts_rental_period_1') ? ts_get_option('ts_rental_period_1') : __('per Month', TS_DOMAIN);
	$rental_period_2 = ts_get_option('ts_rental_period_2') ? ts_get_option('ts_rental_period_2') : __('per Week', TS_DOMAIN);
	$rental_period_3 = ts_get_option('ts_rental_period_3') ? ts_get_option('ts_rental_period_3') : __('per Year', TS_DOMAIN);
	
	$post_options->register_post_option(
		array(
			'id' => '_price',
			'title' => __('Price', TS_DOMAIN).' ('. apply_filters('ts_currency', ts_get_option('ts_currency')) .')',
			'section' => 'property_price_rent',
			'callback' => $post_fields->text()
		)
	);
	 
	$post_options->register_post_option(
	    array(
	    	'id' => '_price_rent',
	    	'title' => __('Period', TS_DOMAIN),
	    	'section' => 'property_price_rent',
	    	'callback' => $post_fields->select(
	    		array(
	    			'select_data' => array(
	    				'rental_period_1' =>	$rental_period_1,
	    				'rental_period_2' =>	$rental_period_2,
	    				'rental_period_3' =>	$rental_period_3
	    			)
	    		)
	    	)
	    )
	);
	
	$post_options->register_post_option(
	    array( 
	    	'id' => '_price_rented',
	    	'title' => __('Status', TS_DOMAIN),
	    	'section' => 'property_price_rent',
	    	'callback' => $post_fields->checkbox(
	    		array(
	    			'label' => __('Property is rented', TS_DOMAIN)
	    		)
	    	)
	    )
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_price_notice',
			'title' => '<strong>'.__('Please notice!', TS_DOMAIN).'</strong>',
			'section' => 'property_price_rent',
			'callback' => 'ts_property_price_notice'
		)
	);
	
	/**
	 * Property details
	 */
    
    $post_options->register_post_options_section( 'property_details', __('Property Details', TS_DOMAIN) );
	$post_options->add_section_to_post_type( 'property_details', 'sale' );
	$post_options->add_section_to_post_type( 'property_details', 'rent' );
	 
	$ts_details = array();

	for($i=1;$i<=6;$i++) {
	    $ts_standard[$i] = ts_get_option('ts_standard_feature_'.$i);
	}
	
	$ts_details[1] = $ts_standard[1] ? $ts_standard[1][0] : __('Plot Size', TS_DOMAIN);
	$ts_details[2] = $ts_standard[2] ? $ts_standard[2][0] : __('Living Area', TS_DOMAIN);
	$ts_details[3] = $ts_standard[3] ? $ts_standard[3][0] : __('Terrace', TS_DOMAIN);
	$ts_details[4] = $ts_standard[4] ? $ts_standard[4][0] : __('Parking', TS_DOMAIN);
	$ts_details[5] = $ts_standard[5] ? $ts_standard[5][0] : __('Heating', TS_DOMAIN);
	$ts_details[6] = $ts_standard[6] ? $ts_standard[6][0] : __('Year Built', TS_DOMAIN);
	 
	$post_options->register_post_option(
		array(
			'id' => '_beds',
			'title' => apply_filters('ts_beds_text', __('Bedrooms', TS_DOMAIN)),
			'section' => 'property_details',
			'callback' => $post_fields->select(
				array(
					'select_data' => apply_filters('ts_beds_options', array('', '1','2','3','4','5','6','7','8','9','10'))
				) 
			)
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_rooms',
			'title' => apply_filters('ts_rooms_text', __('Bathrooms', TS_DOMAIN)),
			'section' => 'property_details',
			'callback' => $post_fields->select(
				array(
					'select_data' => apply_filters('ts_rooms_options', array('', '1','2','3','4','5','6','7','8','9','10'))
				)
			)
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_size',
			'title' => $ts_details[1],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_details_1',
			'title' => $ts_details[2],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_details_2',
			'title' => $ts_details[3],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_details_3',
			'title' => $ts_details[4],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_details_4',
			'title' => $ts_details[5],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_details_5',
			'title' => $ts_details[6],
			'section' => 'property_details',
			'callback' => $post_fields->text()
		)
	);
	
	/**
	 * Property location
	 */
    
    $post_options->register_post_options_section( 'property_location', __('Property Location', TS_DOMAIN) );
	$post_options->add_section_to_post_type( 'property_location', 'sale' );
	$post_options->add_section_to_post_type( 'property_location', 'rent' );
	
	$post_options->register_post_option(
		array(
		    'id' => '_map_address',
		    'title' => __('Enter property address', TS_DOMAIN),
		    'section' => 'property_location',
		    'callback' => $post_fields->text(
		    	array(
		    	'description' => __('e.g. <em>Marbella, Spain</em> or <em>Platz der Republik 1, 10557 Berlin</em>', TS_DOMAIN)
		    	)
		    )
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_map_lat',
			'title' => __('Enter latitude', TS_DOMAIN),
			'section' => 'property_location',
			'callback' => $post_fields->text(
				array(
					'description' => __('Geo code e.g. <em>36.509937</em>', TS_DOMAIN)
				)
			)
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_map_long',
			'title' => __('Enter longitude', TS_DOMAIN),
			'section' => 'property_location',
			'callback' => $post_fields->text(
				array(
					'description' => __('Geo code e.g. <em>-4.886352</em>', TS_DOMAIN)
				)
			)
		)
	);
	
	$post_options->register_post_option(
		array(
			'id' => '_map_notice',
			'title' => '<strong>'.__('Please notice!', TS_DOMAIN).'</strong>',
			'section' => 'property_location',
			'callback' => 'ts_property_location_notice'
		)
	);
	
}

/**
 * Callbacks
 */

// Property price notice callback
function ts_property_price_notice( $args ) {

	echo '<span class="description">'. __('Do not put currency symbols and thousands separators to make sure the advanced search for price works correctly.', TS_DOMAIN) .' '. __('You can change the price format on the theme settings page.', TS_DOMAIN) .'</span>';

}

// Property location notice callback
function ts_property_location_notice( $args ) {

	echo '<span class="description">'. __('The geo code will overwrite any value given in the address field.', TS_DOMAIN) .'</span>';

}

?>