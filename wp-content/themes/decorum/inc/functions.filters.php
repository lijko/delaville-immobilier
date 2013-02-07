<?php

/**
 * Available filter hooks
 *
 * All filters are currenlty deactivated. To activate them
 * just remove the // before add_filter() and change the
 * content to your needs.
 *
 */
 

/**
 * Currency
 *
 * => Currency abbreviation
 * => Currency HTML entity
 * => Text before/after price output
 *
 */
 
// add_filter('ts_currency', 'my_currency');

function my_currency() {

	$currency = 'EUR';

	return $currency;
	
}

// add_filter('ts_currency_entity', 'my_currency_entity');

function my_currency_entity() {

	$currency_entity = '&euro;';

	return $currency_entity;
	
}

// add_filter('ts_currency_price', 'my_currency_price', 10, 2);

function my_currency_price($output, $post_type) {

	// set text before price (sale)
	$output_sale_before = '';
	
	// set text after price (sale)
	$output_sale_after = '';
	
	// set text before price (rent)
	$output_rent_before = '';
	
	// set text after price (rent)
	$output_rent_after = '';
	
	if($post_type!='rent') {
		$my_currency_price = $output_sale_before.$output.$output_sale_after;
	} else {
		$my_currency_price = $output_rent_before.$output.$output_rent_after;
	}

	return $my_currency_price;
	
}


/**
 * Measurement Unit
 *
 * => Currency abbreviation
 *
 */
 
// add_filter('ts_measurement_unit', 'my_measurement_unit');

function my_measurement_unit() {

	$measurement_unit = 'm&sup2;';

	return $measurement_unit;
	
}


/**
 * Main menu
 *
 * By default the home link in the main menu is added
 * automatically. You can completely remove it or
 * set the link to a custom URL of your choice.
 *
 * => Main menu item
 * => Main menu home URL
 *
 */
 
/**
 * Remove main menu home item
 */

// add_filter('ts_menu_home', '__return_false');

/**
 * Set main menu home URL
 */

// add_filter('ts_menu_home_url', 'my_menu_home_url');

function my_menu_home_url() {
	
	$home_url = 'http://custom-url.com';
	
	return $home_url;
	
}


/**
 * Property search form
 *
 * => Text search default
 * => Location terms
 * => Property type terms
 * => Beds options
 * => Rooms options
 * => Number options (posts per page)
 *
 */
 
/**
 * Property text search default text
 */
 
// add_filter('ts_search_text_default', 'my_search_text_default');

function my_search_text_default() {

	$text = 'My custom default text&hellip;';
	
	return $text;

}

/**
 * Property locations term list
 */
 
// add_filter('ts_search_location_terms', 'my_search_location_terms');

function my_search_location_terms() {

	$terms_location = array(
		
		(object) array(
			'name' => 'My Location',
			'slug' => 'my-location'
		),
		
		(object) array(
			'name' => 'Another Location',
			'slug' => 'another-location'
		)
	
	);
	
	return $terms_location;

}

/**
 * Property locations term list
 */
 
// add_filter('ts_search_type_terms', 'my_search_type_terms');

function my_search_type_terms() {

	$terms_type = array(
		
		(object) array(
			'name' => 'My Type',
			'slug' => 'my-type'
		),
		
		(object) array(
			'name' => 'Another Type',
			'slug' => 'another-type'
		)
	
	);
	
	return $terms_type;

}

/**
 * Property search beds options
 */
 
// add_filter('ts_beds_options', 'my_beds_options');

function my_beds_options() {

	$beds_options = array('1','2','3','4','5');
	
	return $beds_options;

}

/**
 * Property search bath options
 */
 
// add_filter('ts_rooms_options', 'my_rooms_options');

function my_rooms_options() {

	$rooms_options = array('1','2','3','4','5');
	
	return $rooms_options;

}

/**
 * Property search number posts options
 */
 
// add_filter('ts_nr_options', 'my_nr_options');

function my_nr_options() {

	$nr_options = array('12','24','36','48');
	
	return $nr_options;

}


/**
 * Property RSS
 *
 * By default the RSS feed shows:
 *
 * => Posts
 * => Properties (for sale)
 * => Properties (for rent)
 *
 */
 
// add_filter('ts_feed_post_types', 'my_feed_post_types');

function my_feed_post_types() {

	$feed_post_types = array('post', 'sale', 'rent');
	
	return $feed_post_types;

}


/**
 * Social icons
 *
 * By default social icons include the icons that you find in
 * /img/icons/social/. You can completely remove them, change
 * the icons or add some more.
 *
 * => Remove social icons
 * => Change social icons
 * => Add social icons
 *
 */
 
/**
 * Remove social icons
 */

// add_filter('ts_social', '__return_false');

/**
 * Change social icons
 */
 
// add_filter('ts_social_icons', 'my_social_icons_edit');

function my_social_icons_edit($ts_social_icons) {

	$ts_social_icons['rss'] = array(
		
		// place an image file called my-rss.png
		// in /img/icons/social/
		
		'icon' => 'my-rss',
		'url' => '#custom-url'
	
	);
	
	return $ts_social_icons;

}

/**
 * Add social icons
 */
 
// add_filter('ts_social_icons', 'my_social_icons_add');

function my_social_icons_add($ts_social_icons) {

	$ts_social_icons['gplus'] = array(
		
		// place an image file called gplus.png
		// in /img/icons/social/
		
		'icon' 	=> 'gplus',
		'url' 	=> 'http://plus.google.com'
	
	);
	
	return $ts_social_icons;

}
 
 
/**
 * Some wording
 *
 * => More info button text
 * => Price on request text
 * => Taxonomy titles
 *
 */

/**
 * More info button text
 */
 
// add_filter('ts_more', 'my_more');

function my_more() {
	
	$more_text = 'More info';

	return $more_text;
	
}

/**
 * Price on request text
 */
 
// add_filter('ts_price_on_request', 'my_price_on_request');

function my_price_on_request() {

	$price_request_text = 'Contact us';

	return $price_request_text;
	
}
 
/**
 * Taxonomy titles
 */
 
// add_filter('ts_tax_title_type', 'my_tax_title_type');
	
function my_tax_title_type() {

	return __('Property Type', TS_DOMAIN).': ';
	
}

// add_filter('ts_tax_title_feature', 'my_tax_title_feature');

function my_tax_title_feature() {

	return __('Feature', TS_DOMAIN).': ';
	
}

// add_filter('ts_tax_title_location', 'my_tax_title_location');

function my_tax_title_location() {

	return __('Location', TS_DOMAIN).': ';
	
}


/**
 * Backend wording
 */
 
// add_filter('ts_size_text', 'my_size_text');

function my_size_text() {

	$size_text = 'My size';

	return $size_text;
	
}

// add_filter('ts_beds_text', 'my_beds_text');

function my_beds_text() {

	$beds_text = 'My bedrooms';

	return $beds_text;
	
}

// add_filter('ts_rooms_text', 'my_rooms_text');

function my_rooms_text() {

	$rooms_text = 'My rooms';

	return $rooms_text;
	
}

?>