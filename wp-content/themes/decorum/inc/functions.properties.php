<?php

/**
 * Property price
 */
	
function ts_get_currency_price() {
	
	global $post;
	
	$ts_currency = ts_get_option('ts_currency');
	$ts_currency_pos = ts_get_option('ts_currency_pos');
	
	// convert currency abbreviations in symbols
	
	if($ts_currency=='EUR') {
		$ts_currency_ent = '&euro;';
	}
	elseif($ts_currency=='USD') {
		$ts_currency_ent = '&#36;';
	}
	elseif($ts_currency=='CAD') {
		$ts_currency_ent = 'C&#36;';
	}
	elseif($ts_currency=='GBP') {
		$ts_currency_ent = '&pound;';
	}
	elseif($ts_currency=='AUD') {
		$ts_currency_ent = 'AU&#36;';
	}
	elseif($ts_currency=='JPY') {
		$ts_currency_ent = '&yen;';
	}
	elseif($ts_currency=='CHF') {
		$ts_currency_ent = ' SFr. ';
	}
	elseif($ts_currency=='ILS') {
		$ts_currency_ent = '&#8362;';
	}
	
	$ts_currency = apply_filters('ts_currency', $ts_currency);
	$ts_currency_ent = apply_filters('ts_currency_entity', $ts_currency_ent);
	
	$ts_price = get_post_meta($post->ID, '_price', true);

	// set price format
	
	if(!empty($ts_price)) {
		
		$ts_price_format = ts_get_option('ts_price');
		
		// remove dots and commas
		$ts_price = str_replace('.', '', $ts_price);
		$ts_price = str_replace(',', '', $ts_price);
		
		if($ts_price_format == 'dot') {
			$ts_price = number_format($ts_price, 0, ',', '.');
		} else {
			$ts_price = number_format($ts_price, 0, '.', ',');
		}
	}
	
	// currency symbol before or after amount
	
	if($ts_currency_pos) {
		$ts_currency_price = $ts_price.$ts_currency_ent;
	} else {
		$ts_currency_price = $ts_currency_ent.$ts_price;
	}
	
	// set rental period
	
	$price_rent = get_post_meta($post->ID, '_price_rent', true);
	if($price_rent=='rental_period_2') {
		$rental_period = ts_get_option('ts_rental_period_2') ? ts_get_option('ts_rental_period_2') : __('per Week', TS_DOMAIN);
	} elseif($price_rent=='rental_period_3') {
		$rental_period = ts_get_option('ts_rental_period_3') ? ts_get_option('ts_rental_period_3') : __('per Year', TS_DOMAIN);
	} else {
		$rental_period = ts_get_option('ts_rental_period_1') ? ts_get_option('ts_rental_period_1') : __('per Month', TS_DOMAIN);
	}
	
	// add some style in admin properties list
	
	if(is_admin()) $rental_period_style = ' style="font-weight:normal;font-size:11px"';
	$rental_period = get_post_type()=='rent' ? ' <span'.$rental_period_style.'>/ '.$rental_period.'</span>' : '';
	
	// display complete price or 'on request'
	
	if(get_post_meta($post->ID, '_price', true)) {
		
		$ts_price_output = '';
		
		$ts_price_output .= $ts_currency_price;
		$ts_price_output .= $rental_period;
		
		$ts_price_output = apply_filters('ts_currency_price', $ts_price_output, get_post_type());
		
		return $ts_price_output;
		
	} else {
	
		if(is_single()) {
		
			return '<span class="price-request">'.apply_filters('ts_price_on_request',__('Price on request', TS_DOMAIN)).'</span>';
			
		} else {
		
			$ts_price_button = ts_get_option('ts_price_button') ? get_permalink(ts_get_option('ts_price_button')) : get_permalink().'#contact';
			
			if(get_post_meta($post->ID, 'price_button', true))
				$ts_price_button = get_post_meta($post->ID, 'price_button', true);

			return '<a href="'.$ts_price_button.'" class="action-link price-request">'.apply_filters('ts_price_on_request',__('Price on request', TS_DOMAIN)).'</a>';
			
		}
				
	}
}

function ts_currency_price() {
	
	// like ts_get_currency_price
	// but with echo
	echo ts_get_currency_price();
	
}


/**
 * Taxonomy title
 */
	
function ts_get_tax_name() {

	global $post;

	// loop through custom taxonomies	
	
	$current_term = array();
	
	$args = array(
	  'public'   => true,
	  '_builtin' => false		  
	);
	
	foreach(get_taxonomies($args) as $ts_taxonomy) {
	    $current_term[] = get_term_by('slug', get_query_var('term'), $ts_taxonomy);
	}
	
	// remove empty to get current taxonomy	
	
	foreach($current_term as $key => $value) {
	    if($value == "") {
	    	unset($current_term[$key]);
	    }
	}
	
	$current_term = array_values($current_term);
	return $current_term[0]->name;
	
}

function ts_tax_title() {

	global $wp_query, $post;
	
	// get all gets
		
	foreach($_GET as $name=>$value) {
	    $search_get[$name] = $value;
	}

	if(isset($_GET['s'])) {
	
		$properties_found = $wp_query->found_posts==1 ? __('Property', TS_DOMAIN) : __('Properties', TS_DOMAIN);
		$ts_tax_title = __('Search Results', TS_DOMAIN).': '.$wp_query->found_posts.' '.$properties_found;
		
	} elseif(is_tax()) {
	
	    if(is_tax('property-type')) $ts_tax_title = apply_filters('ts_tax_title_type', __('Property Type', TS_DOMAIN).': ');
	    if(is_tax('feature')) $ts_tax_title = apply_filters('ts_tax_title_feature', __('Feature', TS_DOMAIN).': ');
	    if(is_tax('location')) $ts_tax_title = apply_filters('ts_tax_title_location', __('Location', TS_DOMAIN).': ');
	    
	    $ts_tax_title .= ts_get_tax_name();
	    
	} elseif( !isset( $wp_query->query_vars['favorites'] ) && !is_author() ) {
	
		$ts_tax_title = __('Favorites', TS_DOMAIN);
		
	} else {
	
	    $curauth = $wp_query->get_queried_object();
	    $ts_tax_title = __('Property Agent', TS_DOMAIN).': '.$curauth->display_name;
	    
	}
	
	echo $ts_tax_title;

}


/**
 * Author template
 *
 * The autor template and query are limited to
 * sale and rent custom post types.
 *
 */

add_filter('pre_get_posts','ts_author_filter');

function ts_author_filter($query) {

    if ($query->is_author)
    	$query->set('post_type',array('sale','rent'));
    	
    return $query;
}


/**
 * Property RSS
 *
 * By default the RSS feed shows:
 * Posts, properties (for sale) and properties (for rent)
 *
 */

add_filter('request', 'ts_feed_request');

function ts_feed_request($qv) {

	if (isset($qv['feed']) && !isset($qv['post_type']))
		$qv['post_type'] = apply_filters('ts_feed_post_types', array('post', 'sale', 'rent'));
		
	return $qv;
}


/**
 * Author permalink
 *
 * Posts, properties (for sale) and properties (for rent)
 *
 */

//change author/username base to users/userID

add_action('init','change_author_permalinks');

function change_author_permalinks() {
	global $wp_rewrite;
   	$wp_rewrite->author_base = 'agent';
  	$wp_rewrite->flush_rules();
}

// add new query var

add_filter('query_vars', 'users_query_vars');

function users_query_vars($vars) {

    $new_vars = array('agents');
    $vars = $new_vars + $vars;
    
    return $vars;
}

// rewrite ?author and make it ?agent

add_filter('generate_rewrite_rules','user_rewrite_rules');

function user_rewrite_rules( $wp_rewrite ) {

  $newrules = array();
  $new_rules['users/(\d*)$'] = 'index.php?author=$matches[1]';
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
  
}


/**
 * Property search
 *
 */

// use search template even if s is empty

add_filter('request', 'ts_request_filter' );

function ts_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

// and set $wp_query accordingly

add_filter('pre_get_posts', 'ts_query_filter' );

function ts_query_filter( $query ) {	
	global $wp_query;
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $wp_query->is_home = false;
		$wp_query->is_search = true;
    }
    return $query;
}

?>