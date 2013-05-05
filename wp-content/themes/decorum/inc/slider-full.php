<?php

$slider_content 	= ts_get_option('ts_slider_content');
$property_category 	= ts_get_option('ts_property_category');
$post_category 		= ts_get_option('ts_post_category');

$get_taxonomy 		= explode(',', $property_category);
$taxonomy 			= $get_taxonomy[0];
$term 				= $get_taxonomy[1];

if($slider_content == 'Show latest properties') {
	$args = array(
	    'post_type' => array('sale', 'rent')
	);
} elseif($slider_content == 'Show latest properties (for sale)') {
	$args = array(
	    'post_type' => 'sale'
	);
} elseif($slider_content == 'Show latest properties (for rent)') {
	$args = array(
	    'post_type' => 'rent'
	);
} elseif($slider_content == 'Show property category (select below)') {
	$args = array(
	    $taxonomy => $term
	);
} elseif($slider_content == 'Show latest posts') {
	$args = array(
	    'post_type' => 'post'
	);
} elseif($slider_content == 'Show post category (select below)') {
	$args = array(
	    'cat' => $post_category
	);
}

if($slider_content) $slider = new WP_Query($args);

// static slides from theme options page
$slider_static = ts_get_option('ts_slider_static');

 // slider doesn't show up when there is only one slide (???)
$slider_count = $slider_static ? count($slider_static) : $slider->post_count;
	

if(($slider || $slider_static) && !$paged) :

if($slider_count > 1) :
?>
<script type="text/javascript">
jQuery(document).ready(function($){
	$(function(){
		$('#slides').slides({
			effect: '<?php echo ts_get_option('ts_slider_effect') ?>',
			<?php if(ts_get_option('ts_slider_effect')) : ?>crossfade: true,<?php endif; ?>
			<?php if(ts_get_option('ts_slider_auto') && ts_get_option('ts_slider_auto')!='off') : ?>play: <?php echo ts_get_option('ts_slider_auto') ?>000,<?php endif; ?>
			pause: 2500,
			hoverPause: true,
			generatePagination: false,
			generateNextPrev: <?php if(ts_get_option('ts_slider_nav')) : echo 'true'; else : echo 'false'; endif; ?>,
			<?php if(ts_get_option('ts_slider_nav')) : ?>
			next: 'slides-next',
			prev: 'slides-prev',
			<?php endif; ?>			
			preload: true,
			preloadImage: '<?php echo TS_IMG; ?>/loading.gif'
		});
	});	            
});
</script>
<?php endif; ?>

<div id="slides">

	<div class="slides_container"<?php if($slider_count == 1) echo ' style="display:block"' ?>>
	
		<?php if(empty($slider_static)) : ?>
		
		<?php $i=0; while($slider->have_posts()) : $slider->the_post(); ?>
		    
		    <?php if(has_post_thumbnail() || get_post_meta($post->ID, "slider_image", true)) : ?>
		    	
		    <div class="slide">
		    	
		    	<?php
		    		if(!get_post_meta($post->ID, "slider_nolink", true) && !ts_get_option('ts_slider_home_nolink')) :
		    		    if(get_post_meta($post->ID, "slider_link", true)) :
		    		    	$slider_url = get_post_meta($post->ID, "slider_link", true);
		    		    elseif(get_post_meta($post->ID, "slider_lightbox", true)) :
		    		    	$slider_url = get_post_meta($post->ID, "slider_lightbox", true);
		    		    	$slider_fancy = ' class="fancy"';
		    		    else :	
		    		    	$slider_url = get_permalink();
		    		    	$slider_fancy = '';
		    		    endif;
		    		    $slider_link = '<a href="'. $slider_url .'" title="'. get_the_title() .'"'.$slider_fancy.'>';
		    		    $slider_link_close = '</a>';
		    		else : $slider_link = ''; $slider_link_close = ''; endif;
		    	?>
		    	
		    	<?php
		    		if(get_post_meta($post->ID, "slider_image", true)) :
		    		
		    			echo $slider_link; ?><img src="<?php echo get_post_meta($post->ID, "slider_image", true); ?>" width="920" height="420" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /><?php echo $slider_link_close;
		    			
		    			if(ts_get_option('ts_slider_title') || get_post_meta($post->ID, 'slider_title', true)) : ?><h2><?php echo $slider_link; the_title(); echo $slider_link_close; ?></h2><?php endif;
		    			
		    			elseif(has_post_thumbnail()) :
		    			
		    				echo $slider_link; the_post_thumbnail('dcr-large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().''));
		    				echo $slider_link_close;
		    				
		    				if(ts_get_option('ts_slider_title') || get_post_meta($post->ID, 'slider_title', true)) : ?><h2><?php echo $slider_link; the_title(); echo $slider_link_close; ?></h2><?php endif;
		    				
		    			endif;
		    			
		    		if(ts_get_option('ts_slider_overlay')) :
		    	?>
		    	<div class="slider-overlay">
					
				    <h2><?php echo $slider_link; ?><?php the_title(); echo $slider_link_close; ?></h2>
				    
				    <?php
				    	$ts_archive_meta = ts_get_option('ts_archive_meta');
				    	if(($slider_content == 'Show latest posts' || $slider_content == 'Show post category (select below)') && $ts_archive_meta[0]) :
				    ?>
				    <p class="meta-date"><?php the_time(get_option('date_format')); ?></p>
				    <?php
				    	endif;
				    	
				    	ts_the_excerpt(20, get_the_ID());
				    	
				    	if($slider_content != 'Show latest posts' && $slider_content != 'Show post category (select below)') :
				    ?>
				    
				    <div class="slider-details">
				    
				    	<div class="slider-details-overview">
				    		<?php if(get_post_meta($post->ID, '_size', true)) : ?>
			    			<span class="details-size"><?php echo get_post_meta($post->ID, '_size', true).' '.ts_get_option('ts_measurement_unit'); ?></span>
			    			<?php else : ?>
			    			<span class="details-rooms"><?php _e('n/d', TS_DOMAIN); ?></span>
			    			<?php endif; ?>
			    			<?php if(get_post_meta($post->ID, '_beds', true)) : ?>
			    			<span class="details-beds"><?php echo get_post_meta($post->ID, '_beds', true); ?> <?php _e('Beds', TS_DOMAIN); ?></span>
			    			<?php else : ?>
			    			<span class="details-beds"><?php _e('n/d', TS_DOMAIN); ?></span>
			    			<?php endif; ?>
			    			<?php if(get_post_meta($post->ID, '_rooms', true)) : ?>
			    			<span class="details-rooms"><?php echo get_post_meta($post->ID, '_rooms', true); ?> <?php _e('Rooms', TS_DOMAIN); ?></span>
			    			<?php else : ?>
			    			<span class="details-rooms"><?php _e('n/d', TS_DOMAIN); ?></span>
			    			<?php endif; ?>
				    	</div>
				    					
				    	<?php if(get_post_meta($post->ID, '_price_sold', true)) : ?>
    					<span class="details-price details-sold"><?php _e('Sold', TS_DOMAIN); ?></span>
    					<?php elseif(get_post_meta($post->ID, '_price_rented', true)) : ?>
    					<span class="details-price details-rented"><?php _e('Rented', TS_DOMAIN); ?></span>
    					<?php else : ?>
    					<span class="details-price"><?php ts_currency_price(); ?></span>
    					<?php endif; ?>
				    
				    </div>
				    
				    <?php endif; ?>
				
				</div><!-- end slider-overlay -->
				<?php endif; ?>
		    		
		    </div>
		    
		    <?php $i++; endif; ?>
		    
		<?php endwhile; ?>
		
		<?php else : ?>
			
			<?php foreach($slider_static as $slide) : ?>
			
			<div>
				<?php if($slide['link']) echo '<a href="'.$slide['link'].'">'; ?>
				<img src="<?php echo $slide['image']; ?>" width="920" height="420" alt="<?php echo $slide['title']; ?>" />
				<?php if($slide['link']) echo '</a>'; ?>
				
				<?php if(ts_get_option('ts_slider_overlay')) : ?>
		    	<div class="slider-overlay">
					
				    <h2>
				    	<?php if($slide['link']) echo '<a href="'.$slide['link'].'">'; ?>
				    		<?php echo $slide['title'] . $slider_link_close; ?>
				    	<?php if($slide['link']) echo '</a>'; ?>
				    </h2>
				    
				    <?php if($slide['description']) echo nl2br(do_shortcode(stripslashes($slide['description']))); ?>
				
				</div><!-- end slider-overlay -->
				<?php endif; ?>
				
			</div>
			
			<?php endforeach; ?>
		
		<?php endif; // end slider_static ?>
	
	</div>

</div><!-- end slides -->

<?php endif; ?>