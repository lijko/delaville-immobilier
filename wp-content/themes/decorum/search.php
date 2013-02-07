<?php get_header(); ?>

<div id="main-wrap">

	<div id="main" class="clearfix">
	
		<?php		
			// get all gets		
			foreach($_GET as $name=>$value) {
				$search_get[$name] = $value;
			}
			
			global $wp_query;
			$s_false = false;
			
			// set custom post type			
			if($search_get['sale-type']=='sale') $post_type = array('sale');
			elseif($search_get['sale-type']=='rent') $post_type = array('rent');
			else $post_type = array('sale', 'rent');
			
			// get custom taxonomies
			if($search_get['location'])
				$tax_location = $search_get['location'];
			
			// check if search term is taxonomy term
			if(!empty($search_get['s']) && in_multiarray(sanitize_title($search_get['s']), get_terms('location'))) :
				$locations = get_terms('location');
				foreach($locations as $location) :
					if($location->slug==sanitize_title($search_get['s'])) :
						$tax_location = sanitize_title($search_get['s']);
						$s_false = true;
						$search_get['s'] = false;
					endif;
				endforeach;
			endif;
			
			if($search_get['type'])
				$tax_type = $search_get['type'];
			
			// check if search term is taxonomy term
			if(!empty($search_get['s']) && in_multiarray(sanitize_title($search_get['s']), get_terms('property-type'))) :
				$property_types = get_terms('property-type');
				foreach($property_types as $property_type) :
					if($property_type->slug==sanitize_title($search_get['s'])) :
						$tax_type = sanitize_title($search_get['s']);
						$s_false = true;
						$search_get['s'] = false;
					endif;
				endforeach;
			endif;
			
			// check if search term is taxonomy term
			if(!empty($search_get['s']) && in_multiarray(sanitize_title($search_get['s']), get_terms('feature'))) :
				$features = get_terms('feature');
				foreach($features as $feature) :
					if($feature->slug==sanitize_title($search_get['s'])) :
						$tax_feature = sanitize_title($search_get['s']);
						$s_false = true;
						$search_get['s'] = false;
					endif;
				endforeach;
			endif;
			
			// check if search term is property ID
			if(!empty($search_get['s']) && preg_match('#[0-9]#',$search_get['s'])) :	
				$ts_prefix = ts_get_option('ts_prefix');
				// filter post id			
				$ts_property_id = str_replace($ts_prefix, '', $search_get['s']);
				$ts_property_id = str_replace(strtolower($ts_prefix), '', $ts_property_id);
				$ts_property_id = str_replace(strtoupper($ts_prefix), '', $ts_property_id);
				$ts_property_id = str_replace(ucfirst(strtolower($ts_prefix)), '', $ts_property_id);
				if(is_numeric($ts_property_id)) :
					$post_query_id = array($ts_property_id);
					$s_false = true;
					$search_get['s'] = false;
				endif;
			endif;
			
			// filter out sold and rented
			$ts_property_search = ts_get_option('ts_property_search');
			if(empty($ts_property_search[2])) :	
			
				// get post IDs of sold and rented properties
				$sold_rented_sql = "SELECT m.post_id FROM $wpdb->postmeta m, $wpdb->posts p WHERE (m.meta_key = '_price_sold' OR m.meta_key = '_price_rented') AND (m.meta_value = '1' OR m.meta_value = 'true') AND p.post_status = 'publish' AND p.ID = m.post_id";
				
				if(empty($post_query_id))
					$sold_rented = $wpdb->get_col($sold_rented_sql);
					
			endif;
			
			// check beds custom fields
			if($search_get['beds'])
				$meta_query_beds = array(
					'key' => '_beds',
					'value' => $search_get['beds'],
					'compare' => '>=',
					'type' => 'numeric'
				);
			
			// check rooms custom fields	
			if($search_get['rooms'])
				$meta_query_rooms = array(
					'key' => '_rooms',
					'value' => $search_get['rooms'],
					'compare' => '>=',
					'type' => 'numeric'
				);
				
			// check price custom fields	
			if($search_get['min'])
				$meta_query_price_min = array(
					'key' => '_price',
					'value' => $search_get['min'],
					'compare' => '>=',
					'type' => 'numeric'
				);
				
			// check price custom fields	
			if($search_get['max'])
				$meta_query_price_max = array(
					'key' => '_price',
					'value' => $search_get['max'],
					'compare' => '<=',
					'type' => 'NUMERIC'
				);
			
			// build meta query
			$meta_query = array();
			
			if(!empty($meta_query_beds))
				array_push($meta_query, $meta_query_beds);
			if(!empty($meta_query_rooms))
				array_push($meta_query, $meta_query_rooms);
			if(!empty($meta_query_price_min))
				array_push($meta_query, $meta_query_price_min);
			if(!empty($meta_query_price_max))
				array_push($meta_query, $meta_query_price_max);	
			
			
			// set orderby and order
			$orderby = ($search_get['orderby']=='price') ? 'meta_value_num' : 'date';
			$order = $search_get['order'] ? $search_get['order'] : 'DESC';
			
			// posts per page
			$posts_per_page = $search_get['nr'] ? $search_get['nr'] : get_option('posts_per_page');
				
			if(!empty($search_get)) :
				$args = array(
					'post_type' => $post_type,
					'posts_per_page' => $posts_per_page,
					'location' => $tax_location,
					'property-type' => $tax_type,
					'feature' => $tax_feature,
					's' => $search_get['s'],
					'paged' => get_query_var('paged'),
					'post__in' => $post_query_id,
					'post__not_in' => $sold_rented,
					'orderby' => $orderby,
					'order' => $order
				);
				
				// add meta query
				if(!empty($meta_query))
					$args = array_merge($args, array('meta_query' => $meta_query));
				
				// set orderby price
				if($search_get['orderby']=='price') :
					$orderby_args = array(
						'meta_key' => '_price'
					);
					$args = array_merge($args, $orderby_args);
				endif;
				
		 		query_posts($args);
		 		
		 		if($s_false) :
		 			$wp_query->is_home = false;
		 			$wp_query->is_search = true;
		 		endif;
		 		
		 	endif;
		 	
		 	get_template_part( 'properties');
			
		?>
	
	</div><!-- end main -->

</div><!-- end main-wrap -->
	
<?php get_footer(); ?>