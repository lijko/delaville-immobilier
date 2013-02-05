<?php get_header(); ?>

<?php
	$ts_property_layout_single = ts_get_option('ts_property_layout_single');
	$ts_property_elements_single = ts_get_option('ts_property_elements_single');
	$ts_property_search = ts_get_option('ts_property_search');
?>

<div id="main">

	<?php if(!$ts_property_layout_single[0] || $ts_property_layout_single[1] || get_post_meta($post->ID, 'image_full', true)) include( TS_INC . '/slider-single-full.php'); ?>
	
	<?php if($ts_property_search[1]) include(TS_INC . '/property-search.php'); ?>
			
    <div id="content-wrap" class="clearfix">
    
    	<?php if($ts_property_layout_single[0]) : ?>
    	<div id="content">
    	<?php endif; ?>
    	
    		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
        
    		<div <?php post_class(); ?>>
    		
    			<div id="property-description" class="clearfix">
    			 
    				<?php if($ts_property_layout_single[0] && !$ts_property_layout_single[1] && !get_post_meta($post->ID, 'image_full', true)) include( TS_INC . '/slider-single.php'); ?>
					    	
				    <?php include( TS_INC . '/property-details.php'); ?>
				    
				    <div class="description">
				    	
				    	<?php
				    		do_action('ts_single_sale_before_description');
				    		
				    		the_content();
				    		
				    		do_action('ts_single_sale_after_description');
				    	?>
				    
				    </div><!-- end description -->
				
				</div><!-- end property-description -->
				
				<?php dynamic_sidebar('properties-sales'); ?>
        	
        	</div><!-- end post -->
    		
    		<?php $i++; endwhile; endif; ?>
        		
			<?php
				$sale_count = count(get_posts(array('post_type' => 'sale', 'post_status' => 'publish')));
				if(ts_get_option('ts_property_paging') && $sale_count > 1) :
			?>
			<div class="ts-paging clear clearfix">
			<?php
			    previous_post_link('<div class="ts-paging-prev left">%link</div>', __('Previous property', TS_DOMAIN));
			    next_post_link('<div class="ts-paging-next right">%link</div>', __('Next property', TS_DOMAIN));
			?>
			</div>
			<?php endif; ?>
    	
    	<?php if($ts_property_layout_single[0]) : ?>
    	</div><!-- end content -->
    
    	<?php get_sidebar('properties'); ?>
    	<?php endif; ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>