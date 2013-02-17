<?php
	// check if there are sales AND rentals
    $properties_sale = get_posts(array('post_type' => 'sale', 'post_status' => 'publish'));
    $properties_rent = get_posts(array('post_type' => 'rent', 'post_status' => 'publish'));
    if(empty($properties_sale) || empty($properties_rent)) $select_wide = ' wide';
?>

<div id="search-box" class="search-box-<?php bloginfo('language'); ?>">

	<?php	
		// get all gets		
		foreach($_GET as $name=>$value) {
		    $search_get[$name] = $value;
		}
	?>
						
    <form method="get" action="<?php echo home_url( '/' ); ?>">
    
    	<div class="clearfix">
    	
    		<input type="text" name="s" id="search-text" title="<?php echo apply_filters('ts_search_text_default', __('Enter keyword or ID', TS_DOMAIN).'&hellip;'); ?>" class="text left" value="<?php echo $search_get['s']; ?>" />
    	
    		<input type="submit" id="search-submit" class="submit btn left" value="<?php _e('Search', TS_DOMAIN); ?>" />
    	
    	</div>
    	
    	<div class="clearfix">
    	
    		<?php if(!empty($properties_sale) && !empty($properties_rent)) : ?>
    		
    		<div id="search-sale-type">
    		
    			<?php if(empty($search_get['sale-type'])) $search_get['sale-type'] = 'all'; ?>
    			<input type="radio" name="sale-type" value="all" <?php checked('all', $search_get['sale-type']); ?> /> <?php _e('All', TS_DOMAIN); ?>  
    			<input type="radio" name="sale-type" value="sale" <?php checked('sale', $search_get['sale-type']); ?> /> <?php _e('Sale', TS_DOMAIN); ?>
    			<input type="radio" name="sale-type" value="rent" <?php checked('rent', $search_get['sale-type']); ?> /> <?php _e('Rent', TS_DOMAIN); ?>
    			
    		</div>
    		 	
    		<?php endif; // $properties_sale && $properties_rent ?>
    	
    		<select name="location" id="search-location" class="text<?php echo $select_wide; ?>">
    		
    			<option value=""><?php _e('Location', TS_DOMAIN); ?>&hellip;</option>
    			<?php
    				$ts_locations = apply_filters('ts_search_location_terms', get_terms('location', array('hide_empty' => true)) );
    				foreach($ts_locations as $ts_location) {
    					echo '<option value="'.$ts_location->slug.'"'.selected($ts_location->slug, $search_get['location'], false).'>'.$ts_location->name.'</option>';
    				}
    			?>
    		
    		</select>
    		
    		<select name="type" id="search-type" class="text<?php echo $select_wide; ?>">
    		
    			<option value=""><?php _e('Type', TS_DOMAIN); ?>&hellip;</option>
    			<?php
    				$ts_types = apply_filters('ts_search_type_terms', get_terms('property-type', array('hide_empty' => true)) );
    				foreach($ts_types as $ts_type) {
    					echo '<option value="'.$ts_type->slug.'"'.selected($ts_type->slug, $search_get['type'], false).'>'.$ts_type->name.'</option>';
    				}
    			?>
    		
    		</select>
    		    				
    		<select name="beds" id="search-beds" class="text<?php echo $select_wide; ?>">
    		
    			<option value=""><?php _e('Beds', TS_DOMAIN); ?>&hellip;</option>
				<?php
					$ts_beds = apply_filters('ts_beds_options', array('1','2','3','4','5','6','7','8','9','10'));
					foreach($ts_beds as $ts_bed) {
						echo '<option'.selected($ts_bed, $search_get['beds'], false).'>'.$ts_bed.'</option>';
					}
				?>
    		
    		</select>
    		
    		<select name="rooms" id="search-rooms" class="text<?php echo $select_wide; ?>">
    		
    			<option value=""><?php _e('Pièces', TS_DOMAIN); ?>&hellip;</option>
    			<?php
    				$ts_rooms = apply_filters('ts_rooms_options', array('1','2','3','4','5','6','7','8','9','10'));
					foreach($ts_rooms as $ts_room) {
						echo '<option'.selected($ts_room, $search_get['rooms'], false).'>'.$ts_room.'</option>';
					}
				?>
    		
    		</select>
    	
    	</div>
    	
    	<?php
    		$ts_property_search = ts_get_option('ts_property_search');
    		if($ts_property_search[3]) :
    	?>
    	
    	<div id="advanced-search-btn">
    		<span><?php _e('Advanced Search', TS_DOMAIN); ?></span>
    	</div>
    	
    	<div id="advanced-search" class="clearfix">
    	
    		<div id="search-pricemin" class="left">
    	
    			<label>    		
    				<span><?php _e('Price (min)', TS_DOMAIN); ?></span>
    				<input type="text" name="min" id="search-price-min" class="text" value="<?php echo $search_get['min']; ?>" />    			
    			</label>
    		
    		</div>
    		
    		<div id="search-pricemax" class="left">
    		
    			<label>    		
    				<span><?php _e('Price (max)', TS_DOMAIN); ?></span>
    				<input type="text" name="max" id="search-price-max" class="text" value="<?php echo $search_get['max']; ?>" />    			
    			</label>
    		
    		</div>
    		
    		<div id="search-orderby" class="left">
    		
    			<span><?php _e('Order by', TS_DOMAIN); ?>:</span>
    			<?php $ts_order_by = (empty($search_get['orderby'])) ? 'date' : $search_get['orderby']; ?>
    			<span class="search-orderby-span"><input type="radio" name="orderby" value="date" <?php checked('date', $ts_order_by); ?> /> <?php _e('Date', TS_DOMAIN); ?></span>
    			<span class="search-orderby-span"><input type="radio" name="orderby" value="price" <?php checked('price', $search_get['orderby']); ?> /> <?php _e('Price', TS_DOMAIN); ?></span>
    			
    		</div>
    		
    		<div id="search-order" class="left">
    		
    			<span><?php _e('Order', TS_DOMAIN); ?>:</span>
    			<?php $ts_order = (empty($search_get['order'])) ? 'DESC' : $search_get['order']; ?>
    			<span class="search-order-span"><input type="radio" name="order" value="DESC" <?php checked('DESC', $ts_order); ?> /> <?php _e('descending', TS_DOMAIN); ?></span>
    			<span class="search-order-span"><input type="radio" name="order" value="ASC" <?php checked('ASC', $search_get['order']); ?> /> <?php _e('ascending', TS_DOMAIN); ?></span>
    			
    		</div>
    		
    		<div id="search-number" class="left">
    		
    			<span><?php _e('Results', TS_DOMAIN); ?>:</span>
    			<select name="nr" class="text<?php echo $select_wide; ?>">
    				<?php
    					$ts_nr_posts = apply_filters('ts_nr_options', array('10','20','30','40','50','60'));
						foreach($ts_nr_posts as $ts_nr_post) {
							echo '<option'.selected($ts_nr_post, $search_get['nr'], false).'>'.$ts_nr_post.'</option>';
						}
					?>   		
    			</select>
    			
    		</div>
    	
    	</div>
    	
    	<?php endif; ?>
    
    </form>

</div><!-- end search-box -->