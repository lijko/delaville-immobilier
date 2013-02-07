<?php /*
Template Name: Properties (map)
*/ ?>

<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    	
		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class(); ?>>
		
		    <h1 class="section-title"><?php the_title(); ?></h1>
		    
		    <?php the_content(); ?>

		</div><!-- end post -->		
		
		<?php $i++; endwhile; endif; ?>
		
		<?php
			// set property filter to sales or rentals
			$property_filter = get_post_meta($post->ID, 'property_filter', true);
			if($property_filter=='sales') {
				$post_type = 'sale';
			} elseif($property_filter=='rentals') {
				$post_type = 'rent';
			} else {
				$post_type = array('sale', 'rent');
			}
			
			// get post IDs of sold and rented properties
			$sold_rented_sql = "SELECT m.post_id FROM $wpdb->postmeta m, $wpdb->posts p WHERE (m.meta_key = '_price_sold' OR m.meta_key = '_price_rented') AND m.meta_value = 'true' AND p.post_status = 'publish' AND p.ID = m.post_id";
			
			if(empty($post_query_id))
			    $sold_rented = $wpdb->get_col($sold_rented_sql);
			
			$args = array(
				'post_type' => $post_type,
				'posts_per_page' => apply_filters('ts_map_number', 50),
				'post__not_in' => $sold_rented
			);
			$properties_map = new WP_Query( $args );
		?>

		<?php if($properties_map->have_posts()) : ?>
		
		<script type="text/javascript">
		    jQuery(document).ready(function($){		
		    
		        $('#properties-map').gmap3(
		        
		        	{
    				    action:'init',
    				    options:{
    				    	zoom: 5,
    				    	scrollwheel: false
    				    }
    				},
    			<?php
    			    while ( $properties_map->have_posts() ) : $properties_map->the_post();
    			    
    			    $marker = NULL;
    			    $post = get_post(get_the_ID());
        		    $custom = get_post_custom(get_the_ID());
        		    $sales_type = (get_post_type(get_the_ID())=='sale') ? __('This property is for sale',TS_DOMAIN) : __('This property is for rent',TS_DOMAIN);
        		    $sales_type = (is_array($post_type)) ? '<p style="margin: 5px 0 0"><small>'.$sales_type.'</small></p>' : '';
        		    
        		    if(!empty($custom['_map_lat'][0]) && !empty($custom['_map_long'][0])) :
        		    	$marker = 'latLng:['.$custom['_map_lat'][0].', '.$custom['_map_long'][0].']';
        		    elseif(!empty($custom['_map_address'][0])) :
        		    	$marker = 'address: "'.$custom['_map_address'][0].'"';
        		    endif;
        		    
        		    if(!empty($marker)) :
    			?>
    				{ action:'init',
  					  options:{
  					    zoom: 14
  					  }
  					},
    				{
    				    action: 'addMarker',
    				    <?php echo $marker; ?>,
    					marker:{
    					  options:{
    					    draggable: false
    					  },
    					  events:{
    					    mouseover: function(marker, event, data){
    					      marker.set('sales_type', '<?php echo sanitize_title($sales_type); ?>');
    					      var infocontent = '<div class="map-property-<?php echo sanitize_title(get_post_type(get_the_ID())); ?>"><?php if(has_post_thumbnail()) : ?><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a><?php endif; ?><h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2><div class="details-overview clearfix"><?php if($custom['_beds'][0]) : ?><span class="details-beds"><?php echo $custom['_beds'][0]; ?></span><?php endif; ?><?php if($custom['_rooms'][0]) : ?><span class="details-rooms"><?php echo $custom['_rooms'][0]; ?></span><?php endif; ?><?php if(get_post_meta(get_the_ID(), '_price_sold', true)) : ?><span class="details-price details-sold"><?php _e('Sold', TS_DOMAIN); ?></span><?php elseif(get_post_meta(get_the_ID(), '_price_rented', true)) : ?><span class="details-price details-rented"><?php _e('Rented', TS_DOMAIN); ?></span><?php else : ?><span class="details-price"><?php ts_currency_price(); ?></span><?php endif; ?></div><?php the_more(); echo $sales_type; ?></div>';
    					      var map = $(this).gmap3('get'),
    					          infowindow = $(this).gmap3({action:'get', name:'infowindow'});
    					      if (infowindow){
    					        infowindow.open(map, marker);
    					        infowindow.setContent(infocontent);
    					      } else {
    					        $(this).gmap3({action:'addinfowindow', anchor:marker, options:{content: infocontent}});
    					      }
    					    },
    					  }
    					}

    					
    				},
    				<?php endif; endwhile; ?>
    				{
    					action:"autofit"
    				}
    										        
		        );
		        
		    });
		</script>
		
		<div id="properties-map"></div>
		
		<?php endif; ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>