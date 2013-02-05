<?php

	$ts_property_elements_single = ts_get_option('ts_property_elements_single');
	$property_size = get_post_meta($post->ID, '_size', true);
	$property_beds = get_post_meta($post->ID, '_beds', true);
	$property_baths = get_post_meta($post->ID, '_baths', true);
	
	$ts_measurement = apply_filters('ts_measurement_unit', ts_get_option('ts_measurement_unit'));
	
	$ts_details = array();
	$ts_details_emtpy = 'yes';
	for($i=1;$i<=6;$i++) {
		$ts_details[$i]['option'] = ts_get_option('ts_standard_feature_'.$i);
		$ts_details[$i]['custom'] = get_post_meta($post->ID, '_details_'.($i-1), true);
		if ($ts_details[$i]['custom']) {
			$ts_details_emtpy = 'no';
		}
	}	

if(
	!empty($ts_property_elements_single[2]) ||
	!empty($ts_property_elements_single[3]) ||
	!empty($property_size) ||
	!empty($property_beds) ||
	!empty($property_baths)
) :

?>
	
<div class="details-overview clearfix">

	<?php
		if($ts_property_elements_single[2]) :
			$property_id = get_post_meta($post->ID, 'property_id', true) ? 
				get_post_meta($post->ID, 'property_id', true) :
				ts_get_option('ts_prefix').get_the_ID();
	?>
    <span class="details-id"><strong>ID:</strong> <?php echo $property_id; ?></span>
    <?php endif; ?>
    <?php if(get_post_meta($post->ID, '_size', true)) : ?>
    <span class="details-size"><?php echo $property_size.' '.$ts_measurement; ?></span>
    <?php endif; ?>
    <?php if(get_post_meta($post->ID, '_beds', true)) : ?>
    <span class="details-beds"><?php echo $property_beds; ?> <?php _e('Beds', TS_DOMAIN); ?></span>
    <?php endif; ?>
    <?php if(get_post_meta($post->ID, '_baths', true)) : ?>
    <span class="details-baths"><?php echo $property_baths; ?> <?php _e('Baths', TS_DOMAIN); ?></span>
    <?php endif; ?>
    <?php if($ts_property_elements_single[3] || $ts_property_elements_single[4]) : ?>
    <div class="details-location">
    	<?php
    		if($ts_property_elements_single[3]) echo get_the_term_list($post->ID, 'property-type');
    		if($ts_property_elements_single[4]) echo get_the_term_list($post->ID, 'location');
    	?>
    </div>
    <?php endif; ?>

</div>

<?php
	endif;
	
	if(!empty($ts_property_elements_single[5]) || !empty($ts_property_elements_single[6]) || $ts_details_emtpy=='no') :
?>

<div class="details details-left">
    
    <?php
    	if($ts_property_elements_single[5]) :
    	
    	$ts_price_button = ts_get_option('ts_price_button') ? get_permalink(ts_get_option('ts_price_button')) : '#contact';
    	if(get_post_meta($post->ID, 'price_button', true)) $ts_price_button = get_post_meta($post->ID, 'price_button', true);
    ?>
    
    <p>
    	<?php if(get_post_meta($post->ID, '_price_sold', true)) : ?>
    	<a href="<?php echo $ts_price_button; ?>" class="btn btn-big btn-sold"><?php _e('Sold', TS_DOMAIN); ?></a>
    	<?php elseif(get_post_meta($post->ID, '_price_rented', true)) : ?>
    	<a href="<?php echo $ts_price_button; ?>" class="btn btn-big btn-rented"><?php _e('Rented', TS_DOMAIN); ?></a>
    	<?php else : ?>
    	<a href="<?php echo $ts_price_button; ?>" class="btn btn-big btn-price">
    		<?php
    			do_action('ts_price_'.get_post_type().'_before');
    			ts_currency_price();
    			do_action('ts_price_'.get_post_type().'_after');
    		?>
    	</a>
    	<?php endif; ?>
    </p>
    
    <?php endif; ?>
    
    <?php if($ts_details_emtpy=='no' || !empty($ts_property_elements_single[5]) || !empty($ts_property_elements_single[6])) : ?>
    
    <div class="details-features details-sub">
    
    	<dl class="clearfix">
    	
    		<?php if($ts_property_elements_single[6]) : ?>
    		<dt><?php _e('Published', TS_DOMAIN); ?>:</dt>
    		<dd><?php the_time(get_option('date_format')); ?></dd>
    		<?php endif; ?>
    		<?php if(get_post_meta($post->ID, '_size', true)) : ?>
    		<dt><?php $ts_details_1_option_0 = $ts_details[1]['option'][0]; _e($ts_details_1_option_0, TS_DOMAIN); ?>:</dt>
    		<dd><?php echo get_post_meta($post->ID, '_size', true).' '.$ts_details[1]['option'][1]; ?></dd>
    		<?php endif; ?>
    		<?php
    			$i=1;
    			$ts_details_arr = array_shift($ts_details);
    			foreach($ts_details as $ts_detail) {
    				
    				if(!empty($ts_detail['option'][0]) && !empty($ts_detail['custom'])) { 
    				
    				$ts_detail_option_0 = $ts_detail['option'][0];
    				$ts_detail_option_1 = $ts_detail['option'][1];
    				$ts_detail_custom 	= $ts_detail['custom'];
    				
    				?>
    				<dt><?php _e($ts_detail_option_0, TS_DOMAIN); ?>:</dt>
    	    		<dd><?php echo __($ts_detail_custom, TS_DOMAIN).' '.__($ts_detail_option_1, TS_DOMAIN); ?></dd>
    	    		<?php 
    	    		}
    			
    				$i++;
    			} // endforearch
    		?>    		
    	</dl>
    
    </div>
    
    <?php
    	endif;
    	
    	$ts_features = wp_get_post_terms($post->ID, 'feature');
    	
    	if($ts_features) :
    ?>
    
    <div class="details-features clearfix">
    
    	<h3><?php _e('Features', TS_DOMAIN); ?></h3>
    
    	<ul class="clearfix">
    	
    		<?php foreach($ts_features as $ts_feature) : ?>
    		<li><?php echo __($ts_feature->name, TS_DOMAIN); ?></li>
    		<?php endforeach; ?>
    		
    	</ul>
    
    </div>
    
    <?php endif; ?>

</div><!-- end details -->

<?php endif; ?>