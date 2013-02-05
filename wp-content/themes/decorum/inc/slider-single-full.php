<?php
	$slider_gallery = get_post_meta($post->ID, 'slider_gallery', true);
	if($slider_gallery) $slider_gallery = explode(',', $slider_gallery);
?>

<div class="section-title clearfix">
    	
    <h1><?php the_title(); ?></h1>
    
    <?php
    	do_action('ts_single_'.get_post_type().'_after_title');    	
    	$ts_property_elements_single = ts_get_option('ts_property_elements_single');    	
    	if($ts_property_elements_single[0] || $ts_property_elements_single[1]) :
    ?>
    	
	<script type="text/javascript">
	    jQuery(document).ready(function($){	    	
	    	if($.cookie('ts_favorites')!==null) {
	    		if($.cookie('ts_favorites').search('<?php the_ID(); ?>')!=-1) {
	    			$('.actions-favorites').hide();
	    			$('.actions-favorites-link').show();
	    			if($('.actions-favorites-link small').length == 0) {
	    				$('.actions-favorites-link').append(' <small>(' + $.cookie('ts_favorites').split(',').length + ')</small>');
	    			}
	    		}
	    	}	    	    	
	    	$('.actions-favorites').click(function() {	    		    			    				
	    		if($.cookie('ts_favorites')===null || $.cookie('ts_favorites')=='') {
	    			$.cookie('ts_favorites', <?php the_ID(); ?>,{ expires: 60, path: '/' });
	    		} else {
	    			var fav = $.cookie('ts_favorites');
	    			$.cookie('ts_favorites', fav + ',' + <?php the_ID(); ?>,{ expires: 60, path: '/' });
	    		}	    		
	    		$(this).fadeOut('fast', function() {
	    		  $('.actions-favorites-link').fadeIn('fast');
	    		  $('.actions-favorites-link').append(' <small>(' + $.cookie('ts_favorites').split(',').length + ')</small>');
	    		});	    		  				
	    	}); 	    	   			
	    });
	</script>
	
    <div class="details-actions">
    
    	<?php if($ts_property_elements_single[0] && is_pagetemplate_active('page-tpl-favorites.php')) : ?>    	
    	<span class="actions-favorites action-link"><?php _e('Add to Favorites', TS_DOMAIN); ?></span>
    	<a href="<?php echo get_pagetemplate_permalink('page-tpl-favorites.php'); ?>" class="actions-favorites-link action-link" style="display:none"><?php _e('See Favorites', TS_DOMAIN); ?></a>
    	<?php endif; ?>
    	
    	<?php if($ts_property_elements_single[1]) : ?>    	
    	<a href="#" onclick="window.print();return false" class="actions-print action-link"><?php _e('Print Property', TS_DOMAIN); ?></a>  	
    	<?php endif; ?>
    	
    </div>
    
    <?php endif; // $ts_property_elements_single ?>
    
</div>

<?php
	if(!$slider_gallery && has_post_thumbnail()) :
		the_post_thumbnail('dcr-large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().''));
		do_action('ts_single_'.get_post_type().'_after_image');
	elseif($slider_gallery) :
?>
		
	<?php if(count($slider_gallery) > 1) : ?>
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

		<div class="slides_container"<?php if(count($slider_gallery) == 1) echo ' style="display:block"' ?>>
			    
			<?php foreach($slider_gallery as $slider_image) : ?>			    	
			<div class="slide"><?php echo wp_get_attachment_image($slider_image, 'dcr-large'); ?></div>			    
			<?php endforeach; ?>
		
		</div>
	
	</div><!-- end slides -->
		
<?php endif; // !$slider_gallery && has_post_thumbnail() ?>