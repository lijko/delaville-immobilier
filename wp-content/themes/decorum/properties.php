<?php
	$ts_property_layout = ts_get_option('ts_property_layout');
	$ts_property_search = ts_get_option('ts_property_search');
	
	$ts_measurement = apply_filters('ts_measurement_unit', ts_get_option('ts_measurement_unit'));
?>

<?php if($ts_property_search[0]) include(TS_INC . '/property-search.php'); ?>

<?php if($ts_property_layout == '1-column with sidebar' || $ts_property_layout == '3-column with sidebar') : ?>
<div id="content">
<?php endif; ?>

	<h1 class="section-title"><?php ts_tax_title(); ?></h1>
    
    <?php $i=0; if(have_posts()) : ?>
    
    <div class="box-wrap clearfix">
    
    	<?php while (have_posts()) : the_post(); ?>
    
    	<?php
    	    if($ts_property_layout == '1-column without sidebar') :
    	    	$post_class = 'ts-box box-1 clear';
    	    	$ts_thumb = 'dcr-large';
    	    elseif($ts_property_layout == '1-column with sidebar') :
    	    	$post_class = 'ts-box box-3 clear';
    	    	$ts_thumb = 'dcr-medium';
    	    elseif($ts_property_layout == '2-column without sidebar') :
    	    	$clear = ($i%2==0) ? ' clear' : '';
    	    	$post_class = 'ts-box box-2'.$clear;
    	    	$ts_thumb = 'dcr-half';
    	    elseif($ts_property_layout == '3-column with sidebar') :
    	    	$clear = ($i%3==0) ? ' clear' : '';
    	    	$post_class = 'ts-box box-4'.$clear;
    	    	$ts_thumb = 'post-thumbnail';
    	    else :
    	    	$clear = ($i%4==0) ? ' clear' : '';
    	    	$post_class = 'ts-box box-4'.$clear;
    	    	$ts_thumb = 'post-thumbnail';
    	    endif;
    	?>
    	
    	<div <?php post_class($post_class); ?>>

    	    <?php if(has_post_thumbnail()) : ?>    
    	    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail($ts_thumb, array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    	    <?php endif; ?>
    	
    		<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    		
    		<div class="details-overview clearfix">
    			
    			<?php if(
    				get_post_meta($post->ID, '_size', true) &&
    			    $ts_property_layout != '3-column with sidebar' &&
    			    $ts_property_layout != '4-column without sidebar'
    			) : ?>
    			<span class="details-size"><?php echo get_post_meta($post->ID, '_size', true).' '.$ts_measurement; ?></span>
    			<?php endif; ?>
    			<?php if(get_post_meta($post->ID, '_beds', true)) : ?>
    		    <span class="details-beds"><?php echo get_post_meta($post->ID, '_beds', true); ?></span>
    		    <?php endif; ?>
    		    <?php if(get_post_meta($post->ID, '_baths', true)) : ?>
    		    <span class="details-baths"><?php echo get_post_meta($post->ID, '_baths', true); ?></span>
    		    <?php endif; ?>
    		    
    		    <?php if(get_post_meta($post->ID, '_price_sold', true)) : ?>
    			<span class="details-price details-sold" title="<?php echo strip_tags(ts_get_currency_price()); ?>"><?php _e('Sold', TS_DOMAIN); ?></span>
    			<?php elseif(get_post_meta($post->ID, '_price_rented', true)) : ?>
    			<span class="details-price details-rented" title="<?php echo strip_tags(ts_get_currency_price()); ?>"><?php _e('Rented', TS_DOMAIN); ?></span>
    			<?php else : ?>
    			<span class="details-price">
				    <?php
				    	do_action('ts_price_'.get_post_type().'_before');
				    	ts_currency_price();
				    	do_action('ts_price_'.get_post_type().'_after');
				    ?>
				</span>
    			<?php endif; ?>
    		
    		</div>
    		
    		<?php ts_the_excerpt(25, get_the_ID()); ?>
    	
    	</div><!-- end post -->
    	
    	<?php $i++; endwhile; ?>
    
    </div>
    
    <?php include( TS_INC . '/paging.php'); ?>
    	
    <?php else : ?>
	
	<div class="ts-info info-icon"><span class="icon-bulb"></span><?php _e('Sorry, no properties matched your criteria.',TS_DOMAIN); ?> <?php _e('Please try again.',TS_DOMAIN); ?></div>
	
	<?php endif; // has_posts() ?>
 
<?php if($ts_property_layout == '1-column with sidebar' || $ts_property_layout == '3-column with sidebar') : ?>
   
</div><!-- end content -->

<?php get_sidebar(); ?>

<?php endif; // $ts_property_layout ?>