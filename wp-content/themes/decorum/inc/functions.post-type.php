<?php
	
/**
 * Custom post types
 *
 * => Properties (for Sale)
 * => Properties (for Rent)
 * => Taxonomies (non-hierarchical): Locations, Property Types, Features
 * => Taxonomies (hierarchical): Categories (for Sale), Categories (for Rent)
 *
 */

/**
 * Register post types
 */

add_action( 'init', 'register_ts_post_types' );

function register_ts_post_types() {

    $labels = array( 
        'name' => _x( 'Properties (for Sale)', 'sale', TS_DOMAIN ),
        'singular_name' => _x( 'Property (for Sale)', 'sale', TS_DOMAIN ),
        'add_new' => _x( 'Add New', 'sale', TS_DOMAIN ),
        'add_new_item' => _x( 'Add New Property', 'sale', TS_DOMAIN ),
        'edit_item' => _x( 'Edit Property', 'sale', TS_DOMAIN ),
        'new_item' => _x( 'New Property', 'sale', TS_DOMAIN ),
        'view_item' => _x( 'View Property', 'sale', TS_DOMAIN ),
        'search_items' => _x( 'Search Properties', 'sale', TS_DOMAIN ),
        'not_found' => _x( 'No properties found', 'sale', TS_DOMAIN ),
        'not_found_in_trash' => _x( 'No properties found in Trash', 'sale', TS_DOMAIN ),
        'parent_item_colon' => _x( 'Parent Property:', 'sale', TS_DOMAIN ),
        'menu_name' => _x( 'For Sale', 'sale', TS_DOMAIN ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => TS_IMG . '/menu-properties.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'sale', $args );
    
    $labels_2 = array( 
        'name' => _x( 'Properties (for Rent)', 'rent', TS_DOMAIN ),
        'singular_name' => _x( 'Property (for Rent)', 'rent', TS_DOMAIN ),
        'add_new' => _x( 'Add New', 'rent', TS_DOMAIN ),
        'add_new_item' => _x( 'Add New Property', 'rent', TS_DOMAIN ),
        'edit_item' => _x( 'Edit Property', 'rent', TS_DOMAIN ),
        'new_item' => _x( 'New Property', 'rent', TS_DOMAIN ),
        'view_item' => _x( 'View Property', 'rent', TS_DOMAIN ),
        'search_items' => _x( 'Search Properties', 'rent', TS_DOMAIN ),
        'not_found' => _x( 'No properties found', 'rent', TS_DOMAIN ),
        'not_found_in_trash' => _x( 'No properties found in Trash', 'rent', TS_DOMAIN ),
        'parent_item_colon' => _x( 'Parent Property:', 'rent', TS_DOMAIN ),
        'menu_name' => _x( 'For Rent', 'rent', TS_DOMAIN ),
    );

    $args_2 = array( 
        'labels' => $labels_2,
        'hierarchical' => false,        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => TS_IMG . '/menu-properties.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'rent', $args_2 );
}


/**
 * Set post type icon
 */

add_action('admin_head', 'ts_post_type_header');

function ts_post_type_header() {
	global $post_type;
	?>
	<style>
	<?php if (($post_type == 'sale') || ($post_type == 'rent')) : ?>
	#icon-edit { background:transparent url('<?php echo TS_URL .'/wp-admin/images/icons32.png';?>') no-repeat -137px -5px; }		
	<?php endif; ?>
	</style>
	<?php
}


/**
 * Register taxonomies
 */
 
add_action('init', 'ts_taxonomy_register');

function ts_taxonomy_register() {

	$labels = array(
		'name' => _x('Locations', 'taxonomy general name', TS_DOMAIN),
		'singular_name' => _x('Location', 'taxonomy singular name', TS_DOMAIN)
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'rewrite' => true
	);
	
	register_taxonomy('location', array('sale', 'rent'), $args);
	
	$labels_2 = array(
		'name' => _x('Types', 'taxonomy general name', TS_DOMAIN),
		'singular_name' => _x('Property Type', 'taxonomy singular name', TS_DOMAIN)
	);

	$args_2 = array(
		'labels' => $labels_2,
		'hierarchical' => false,
		'rewrite' => true
	);
	
	register_taxonomy('property-type', array('sale', 'rent'), $args_2);
	
	$labels_3 = array(
		'name' => _x('Features', 'taxonomy general name', TS_DOMAIN),
		'singular_name' => _x('Feature', 'taxonomy singular name', TS_DOMAIN)
	);

	$args_3 = array(
		'labels' => $labels_3,
		'hierarchical' => false,
		'rewrite' => true
	);
	
	register_taxonomy('feature', array('sale', 'rent'), $args_3);
	
	$labels_cat_sale = array(
		'name' => _x('Categories (for Sale)', 'taxonomy general name', TS_DOMAIN),
		'singular_name' => _x('Category (for Sale)', 'taxonomy singular name', TS_DOMAIN)
	);

	$args_cat_sale = array(
		'labels' => $labels_cat_sale,
		'hierarchical' => true,
		'rewrite' => true,
		'query_var'=> true
	);
	
	register_taxonomy('sales', array('sale'), $args_cat_sale);
	
	$labels_cat_rent = array(
		'name' => _x('Categories (for Rent)', 'taxonomy general name', TS_DOMAIN),
		'singular_name' => _x('Category (for Rent)', 'taxonomy singular name', TS_DOMAIN)
	);

	$args_cat_rent = array(
		'labels' => $labels_cat_rent,
		'hierarchical' => true,
		'rewrite' => true,
		'query_var'=> true
	);
	
	register_taxonomy('rentals', array('rent'), $args_cat_rent);

}


/**
 * Set columns of properties list
 */

function property_edit_columns($columns){

	$ts_currency = ts_get_option('ts_currency');
	
  	$columns = array(
    	'cb' => '<input type="checkbox" />',
    	'title' => __('Title'),
    	'property_details' => __('Details', TS_DOMAIN),
    	'property_info' => __('Info', TS_DOMAIN), 	
    	'property_image' => __('Image', TS_DOMAIN),
    	'property_price' => __('Price', TS_DOMAIN).' ('. apply_filters('ts_currency', ts_get_option('ts_currency')) .')'
	);
 
	return $columns;
}

function property_custom_columns($column) {

  	global $post;  	
  	
  	switch ($column) {
  	
  	  	case 'property_details':  	  		
  	  	  	$custom = get_post_custom();
  	  		$property_id = $property_id = $custom['property_id'][0] ?  $custom['property_id'][0] : ts_get_option('ts_prefix').get_the_ID();
  	  	  	echo '<div style="margin:0 0 -14px;font-size:13px;font-weight:bold">'.$property_id.'</div>';
  	  	  	if(!empty($custom['_size'][0]))
  	  	  		echo '<br />'.apply_filters('ts_size_text', __('Size', TS_DOMAIN)).': '.$custom['_size'][0].' '.apply_filters('ts_measurement_unit', ts_get_option('ts_measurement_unit'));
  	  	  	if(!empty($custom['_beds'][0]))
  	  	  		echo '<br />'.apply_filters('ts_beds_text', __('Bedrooms', TS_DOMAIN)).': '.$custom['_beds'][0];
  	  	  	if(!empty($custom['_rooms'][0]))
  	  	  		echo '<br />'.apply_filters('ts_rooms_text', __('Rooms', TS_DOMAIN)).': '.$custom['_rooms'][0];
  	  	  	break;
  	  	  	
  	  	case 'property_info':  	  		
  	  		echo __('Location', TS_DOMAIN).': '.get_the_term_list($post->ID, 'location', '', ', ','').'<br />';
  	  	  	echo __('Type', TS_DOMAIN).': '.get_the_term_list($post->ID, 'property-type', '', ', ','').'<br />';
  	  	  	echo __('Features', TS_DOMAIN).': '.get_the_term_list($post->ID, 'feature', '', ', ','').'<br />';
  	  	  	if(has_term('', 'sales', $post) || has_term('', 'rentals', $post))
  	  			echo __('Category', TS_DOMAIN).': '.get_the_term_list($post->ID, 'sales', '', ', ','').get_the_term_list($post->ID, 'rentals', '', ', ','');
  	  	  	break;
  	  	  	
  	  	case 'property_image':
  	  	  	$image = get_the_post_thumbnail($post->ID, 'post-thumbnail');
  	  	  	echo $image;
  	  	  	break;
  	  	  	
		case 'property_price':
		
  	  	  	$custom = get_post_custom();
			
			global $typenow;
  	  	  	
  	  	  	if(!empty($custom['_price'][0])) {
  	  	  		echo '<div style="margin:10px 0 -14px;font-size:13px;font-weight:bold'.$classes_sold.'">'.ts_get_currency_price().'</div>';
  	  	  	} else {
  	  	  		echo '<div style="margin:10px 0 -14px;font-style:italic">'.__('not specified', TS_DOMAIN).'</div>';
  	  	  	}
  	  	  	
  	  	  	if($typenow=='sale')
  	  	  		$property_status = ($custom['_price_sold'][0]) ?
  	  	  			'<span style="color:red;font-weight:bold;text-transform:uppercase">'.__('Sold', TS_DOMAIN).'</span>' :
  	  	  			'<span style="color:green;font-weight:bold">'.__('For sale', TS_DOMAIN).'</span>';
  	  	  	if($typenow=='rent')
  	  	  		$property_status = ($custom['_price_rented'][0]) ? 
  	  	  			'<span style="color:red;font-weight:bold;text-transform:uppercase">'.__('Rented', TS_DOMAIN).'</span>' :
  	  	  			'<span style="color:green;font-weight:bold">'.__('For rent', TS_DOMAIN).'</span>';
  	  	  	
  	  	  	echo '<br />'.__('Status', TS_DOMAIN).': '.$property_status;
  	  	  	
  	  	  	break;
  	}
}


/**
 * Make columns sortable
 */

function id_column_register_sortable( $columns ) {
	$columns['property_details'] = 'property_details'; 
	return $columns;
}

add_filter('manage_edit-sale_sortable_columns', 'id_column_register_sortable' );
add_filter('manage_edit-rent_sortable_columns', 'id_column_register_sortable' );

add_action('manage_posts_custom_column',  'property_custom_columns');
add_filter('manage_edit-sale_columns', 'property_edit_columns');

add_action('manage_posts_custom_column',  'property_custom_columns');
add_filter('manage_edit-rent_columns', 'property_edit_columns');

function id_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && 'property_details' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'orderby' => 'id'
		) );
	}
 
	return $vars;
}

add_filter( 'request', 'id_column_orderby' );

function price_column_register_sortable( $columns ) {
	$columns['property_price'] = 'property_price'; 
	return $columns;
}

add_filter('manage_edit-sale_sortable_columns', 'price_column_register_sortable' );
add_filter('manage_edit-rent_sortable_columns', 'price_column_register_sortable' );

function price_column_orderby( $vars ) {
	if ( isset( $vars['orderby'] ) && 'property_price' == $vars['orderby'] ) {
		$vars = array_merge( $vars, array(
			'meta_key' => '_price',
			'orderby' => 'meta_value_num'
		) );
	}
 
	return $vars;
}

add_filter( 'request', 'price_column_orderby' );


/**
 * Create taxonomy filters
 *
 * Credit: http://wordpress.stackexchange.com/questions/578/adding-a-taxonomy-filter-to-admin-list-for-a-custom-post-type/12856#12856
 *
 */
 
add_action('restrict_manage_posts', 'ts_restrict_manage_posts');
add_filter('parse_query','ts_convert_restrict');

function ts_restrict_manage_posts() {
    global $typenow;
    $args = array('public' => true,'_builtin' => false); 
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
    $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);            
			if(count(get_terms($tax_slug)) > 0 ) {            
            	wp_dropdown_categories(array(
            	    'show_option_all' => __('Show all', TS_DOMAIN).' '.$tax_obj->label,
            	    'taxonomy' => $tax_slug,
            	    'name' => $tax_obj->name,
            	    'selected' => $_GET[$tax_obj->query_var],
            	    'hierarchical' => $tax_obj->hierarchical,
            	    'show_count' => false,
            	    'hide_empty' => true
            	));            
            }
        }
    }
}

function ts_convert_restrict($query) {
    global $pagenow, $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
                $var = $term->slug;
            }
        }
    }
}

?>