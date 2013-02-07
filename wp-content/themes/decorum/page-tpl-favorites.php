<?php /*
Template Name: Favorites
*/ ?>

<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
			
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class('box-1'); ?>>
		    
		    <h1 class="section-title"><?php the_title(); ?></h1>
		    
		    <?php the_content(); ?>
		    
		    <?php
		    	$ts_favorites_array = explode(',',$_COOKIE['ts_favorites']);		
		    	$ts_favorites = new WP_Query( array( 'post_type' => array('sale', 'rent'), 'post__in' => $ts_favorites_array, 'paged' => $paged ) );
		    ?>
		    
		    <?php $i=0; if($ts_favorites->have_posts()) : ?>
		    
		    <script type="text/javascript">
				jQuery(document).ready(function($){
					
    				var removeValue = function(list, value) {
					  var values = list.split(",");
					  for(var i = 0 ; i < values.length ; i++) {
					    if(values[i] == value) {
					      values.splice(i, 1);
					      return values.join(",");
					    }
					  }
					  return list;
					};
					
					$('.favorites-remove').click(function() {
									
						var favID = $(this).attr('id');
						var favs = removeValue($.cookie('ts_favorites'), favID);
						$.cookie('ts_favorites', favs,{ expires: 60, path: '/' });
						$('.post-'+favID).fadeOut('fast', function() {
							if($.cookie('ts_favorites')=='') {
								$('#nofavs').fadeIn('fast');
							}
						});						
						
					});
      				   			
				});
			</script>
		
		    <div class="box-wrap clearfix">
		    
		    	<?php while ($ts_favorites->have_posts()) : $ts_favorites->the_post(); ?>
    			
    			<?php $clear = ($i%2==0) ? ' clear' : ''; ?>
	
				<div <?php post_class('ts-box box-2'.$clear); ?>>
				
					<span id="<?php the_ID(); ?>" class="favorites-remove" title="<?php _e('Remove', TS_DOMAIN); ?>"><?php _e('Remove', TS_DOMAIN); ?></span>
				
				    <?php if(has_post_thumbnail()) : ?>    	    
				    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('dcr-half', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
				    <?php endif; ?>
				
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<div class="details-overview clearfix">
					
    					<?php if(get_post_meta($post->ID, '_size', true)) : ?>
    				    <span class="details-size"><?php echo get_post_meta($post->ID, '_size', true).' '.ts_get_option('ts_measurement_unit'); ?></span>
    				    <?php endif; ?>
    				    <?php if(get_post_meta($post->ID, '_beds', true)) : ?>
    				    <span class="details-beds"><?php echo get_post_meta($post->ID, '_beds', true); ?> <?php _e('Beds', TS_DOMAIN); ?></span>
    				    <?php endif; ?>
    				    <?php if(get_post_meta($post->ID, '_rooms', true)) : ?>
    				    <span class="details-rooms"><?php echo get_post_meta($post->ID, '_rooms', true); ?> <?php _e('rooms', TS_DOMAIN); ?></span>
    				    <?php endif; ?>
    				    
    				    <span class="details-price"><?php ts_currency_price(); ?></span>
    				
    				</div>
					
					 <?php ts_the_excerpt(25, get_the_ID()); ?>
				
				</div><!-- end post -->
		    	
		    	<?php $i++; endwhile; ?>
		    
		    </div>
		    
		    <?php if(function_exists('ts_pagination') && $ts_favorites->max_num_pages > 1) : ?>
		    
		    	<div class="ts-paging clear"><?php ts_pagination($ts_favorites->max_num_pages); ?></div>
		    	
		    <?php endif; ?>
		    
		    <div id="nofavs" class="ts-info info-icon" style="display:none"><span class="icon-info"></span><?php _e('You currently have no favorites.', TS_DOMAIN); ?></div>
		    
		    <?php else : ?>
		    
		    <div class="ts-info info-icon"><span class="icon-info"></span><?php _e('You currently have no favorites.', TS_DOMAIN); ?></div>
		    
		    <?php endif; ?>
		    			
		</div><!-- end page -->
		    
		<?php endwhile; endif; ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>