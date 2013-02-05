<?php

/**
 * Widgets
 *
 * Register widget areas:
 *
 * => Home page
 * => Sidebar home page
 * => Sidebar properties
 * => Content properties (sales)
 * => Sidebar properties (sale)
 * => Content properties (rent)
 * => Sidebar properties (rent)
 * => Sidebar properties archive
 * => Sidebar (posts, pages etc.)
 * => Sidebar category (posts)
 * => Sidebar single (posts)
 * => Sidebar single (pages)
 * => Footer
 *
 */

register_sidebar(array(
	'name' => __('Home Page', TS_DOMAIN),
	'id' => 'home',
	'description' => __('Main content on the home page', TS_DOMAIN),
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-3">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Home Page', TS_DOMAIN),
	'id' => 'sb-home',
	'description' => __('Sidebar on the home page', TS_DOMAIN),
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Properties', TS_DOMAIN),
	'id' => 'sb-properties',
	'description' => __('General sidebar of property pages', TS_DOMAIN),
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Properties Sales', TS_DOMAIN),
	'id' => 'properties-sales',
	'description' => __('Main content on single property pages', TS_DOMAIN).' ('.__('sales', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-3 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Properties Sales', TS_DOMAIN),
	'id' => 'sb-properties-sales',
	'description' => __('Sidebar on single property pages', TS_DOMAIN).' ('.__('sales', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Properties Rentals', TS_DOMAIN),
	'id' => 'properties-rentals',
	'description' => __('Main content on single property pages', TS_DOMAIN).' ('.__('rentals', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-3 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Properties Rentals', TS_DOMAIN),
	'id' => 'sb-properties-rentals',
	'description' => __('Sidebar on single property pages', TS_DOMAIN).' ('.__('rentals', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Properties Archive', TS_DOMAIN),
	'id' => 'sb-properties-archive',
	'description' => __('Sidebar on property archive pages', TS_DOMAIN),
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN),
	'id' => 'sidebar',
	'description' => __('General sidebar on posts, pages and archives', TS_DOMAIN).' ('.__('not properties', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Category', TS_DOMAIN),
	'id' => 'sidebar-category',
	'description' => __('Sidebar on archive pages', TS_DOMAIN).' ('.__('not properties', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Posts', TS_DOMAIN),
	'id' => 'sidebar-posts',
	'description' => __('Sidebar on single post pages', TS_DOMAIN).' ('.__('not properties', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Sidebar', TS_DOMAIN).' '.__('Pages', TS_DOMAIN),
	'id' => 'sidebar-pages',
	'description' => __('Sidebar on single static pages', TS_DOMAIN).' ('.__('not properties', TS_DOMAIN).')',
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

register_sidebar(array(
	'name' => __('Footer', TS_DOMAIN),
	'id' => 'ts-footer',
	'description' => __('Widget area in the footer section', TS_DOMAIN),
	'before_widget' => '<div id="%1$s" class="%2$s ts-box box-4 clearfix">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="section-title">',
	'after_title' => '</h3>'
));

/**
 *  Activate shortcodes in widets
 */

add_filter('widget_text', 'do_shortcode');


/**
 * Property search
 *
 */
 
class TS_Property_Search extends WP_Widget {
 
	function TS_Property_Search() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_property_search', 'description' => __('Show property search form', TS_DOMAIN) );
		$this->WP_Widget('ts_property_search', TS_THEME.' '.__('Property Search', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );        
        $title 	= strip_tags($instance['title']);
 
        ?>
        
        <div id="<?php echo $args['widget_id']; ?>" class="widget_ts_property_search clearfix clear">
        	
			<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
			
			<?php include( TS_INC . '/property-search.php'); ?>
			
		</div>
			
        <?php }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 		= $instance['title'];
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
<?php
	}

}


/**
 * Property teaser
 *
 */
 
class TS_Property_Category extends WP_Widget {
 
	function TS_Property_Category() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_property_teaser', 'description' => __('Show latest properties', TS_DOMAIN) );
		$this->WP_Widget('ts_property_teaser', TS_THEME.' '.__('Property Teaser', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= $instance['title'];
        $filter = $instance['filter'];
        if ( !$number = (int) $instance['number'] )
			$number = 3;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
                
        if($filter=='all') {
        	$post_type = array('sale','rent');
        } elseif($filter=='all_sale') {
        	$post_type = 'sale';
        } elseif($filter=='all_rent') {
        	$post_type = 'rent';
        } else {
        	$get_taxonomy = explode(',', $filter);
        	$taxonomy = $get_taxonomy[0];
        	$term = $get_taxonomy[1];
        	$term_link = get_term_link($term, $taxonomy);
        }
        
        $image 		= $instance['image'];
        $details	= $instance['details'];
        $price 		= $instance['price'];
        $button 	= $instance['button'];
        $width 		= $instance['width'];
        
        $r = new WP_Query(array('post_type' => $post_type, $taxonomy => $term, 'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1)); ?>
        
		<?php if ($r->have_posts()) : ?>		
		
		<div id="<?php echo $args['widget_id']; ?>" class="ts_property_teaser box-wrap clearfix clear">
		
			<?php if(!empty($title)) : ?>
			<div class="section-title clearfix">
			
				<h2><?php echo $title; ?></h2>
				
				<?php if(!empty($term_link)) : ?>
				<div class="details-actions">
					<a href="<?php echo $term_link; ?>" class="action-link"><?php _e('See all', TS_DOMAIN); ?></a>
				</div>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>
		
			<?php $i=0; while ($r->have_posts()) : $r->the_post(); ?>
			
			<?php
				$clear = '';
				if($width=='box-4' && ts_get_option('ts_home_sidebar') && $args['id']=='ts-footer') {
					$clear_width = 4;
				} elseif($width=='box-4' && ts_get_option('ts_home_sidebar')) {
					$clear_width = 3;
				} elseif($width=='box-3' || $width=='box-1') {
					$clear_width = 1;
				} elseif($width=='box-2') {
					$clear_width = 2;
				} else {
					$clear_width = 4;
				}
				
				if($i%$clear_width==0) $clear = ' clear';
				
			?>
			
			<div <?php post_class('ts-box '.$width.$clear); ?>>
    		
    		    <?php if(has_post_thumbnail() && !empty($image)) : ?>
    		    <?php
    		    	if($width=='box-2') {
    		    		$ts_thumb = 'dcr-half';
    		    	} elseif($width=='box-3') {
    		    		$ts_thumb = 'dcr-medium';
    		    	} elseif($width=='box-1') {
    		    		$ts_thumb = 'dcr-large';
    		    	} else {
    		    		$ts_thumb = 'post-thumbnail';
    		    	}
    		    ?> 	    
    		    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail($ts_thumb, array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    		    <?php endif; ?>
    		
    			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    			
    			<?php if(!empty($details) || !empty($price)) : ?>
    			<div class="details-overview clearfix">
    			
    				<?php if(get_post_meta(get_the_ID(), '_size', true) && !empty($details) && $width!='box-4') : ?>
			    	<span class="details-size"><?php echo get_post_meta(get_the_ID(), '_size', true).' '.ts_get_option('ts_measurement_unit'); ?></span>
			   		<?php endif; ?>    			
					<?php if(get_post_meta(get_the_ID(), '_beds', true) && !empty($details)) : ?>
				    <span class="details-beds"><?php echo get_post_meta(get_the_ID(), '_beds', true); ?> <?php if($width!='box-4') _e('Beds', TS_DOMAIN); ?></span>
				    <?php endif; ?>
				    <?php if(get_post_meta(get_the_ID(), '_baths', true) && !empty($details)) : ?>
				    <span class="details-baths"><?php echo get_post_meta(get_the_ID(), '_baths', true); ?> <?php if($width!='box-4') _e('Baths', TS_DOMAIN); ?></span>
				    <?php endif; ?>
				    
				    <?php if(get_post_meta(get_the_ID(), '_price_sold', true)) : ?>
					<span class="details-price details-sold"><?php _e('Sold', TS_DOMAIN); ?></span>
					<?php elseif(get_post_meta(get_the_ID(), '_price_rented', true)) : ?>
					<span class="details-price details-rented"><?php _e('Rented', TS_DOMAIN); ?></span>
					<?php else : ?>
					<span class="details-price"><?php ts_currency_price(); ?></span>
					<?php endif; ?>
				
				</div>
				<?php				
					endif;
					
					// get teaser text
					ts_the_excerpt(25, get_the_ID());					
				?>
    		
    		</div><!-- end post -->
			
			<?php $i++; endwhile; ?>
		
		</div>
		
		<?php wp_reset_query();  // Restore global post data stomped by the_post().
		
		endif;
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['filter'] = $new_instance['filter'];
    	$instance['number'] = (int) $new_instance['number'];
    	$instance['image'] = $new_instance['image'];
        $instance['details'] = $new_instance['details'];
        $instance['price'] = $new_instance['price'];
        $instance['button'] = $new_instance['button'];
        $instance['width'] = $new_instance['width'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'filter' => 'all', 'number' => '', 'image' => '', 'details' => '', 'price' => '', 'button' => '', 'width' => '') );
		$title 		= $instance['title'];
		$filter     = $instance['filter'];
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 3;
		$image 		= $instance['image'];
        $details	= $instance['details'];
        $price 		= $instance['price'];
        $button 	= $instance['button'];
        $width 		= $instance['width'];
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Filter', TS_DOMAIN); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>">
				<option value="all" <?php selected('all', $filter); ?>><?php _e('All properties', TS_DOMAIN); ?></option>
				<option value="all_sale" <?php selected('all_sale', $filter); ?>><?php _e('Most recent for sale', TS_DOMAIN); ?></option>
				<option value="all_rent" <?php selected('all_rent', $filter); ?>><?php _e('Most recent for rent', TS_DOMAIN); ?></option>
					
				<?php
					$terms = get_terms(array('sales','rentals'), 'orderby=name&hide_empty=0');
				?>
				
				<?php foreach($terms as $term) {
					echo '<option value="'.$term->taxonomy.','.$term->slug.'" '.selected($term->taxonomy.','.$term->slug, $filter).'>'.$term->name.' ('.$term->taxonomy.')</option>';
				} ?>
				
			</select>
			
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e('(at most 20)', TS_DOMAIN); ?></small></p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="1" <?php checked( $image, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Show property thumbnail', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('details'); ?>" name="<?php echo $this->get_field_name('details'); ?>" value="1" <?php checked( $details, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('details'); ?>"><?php _e('Show property details', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('price'); ?>" name="<?php echo $this->get_field_name('price'); ?>" value="1" <?php checked( $price, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('price'); ?>"><?php _e('Show property price', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" value="1" <?php checked( $button, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Show more info button', TS_DOMAIN); ?></label>		
		</p>
		
		<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>">
			<option value="box-4" <?php selected('box-4', $width)?>>1/4</option>
			<option value="box-2" <?php selected('box-2', $width)?>>2/4</option>
			<option value="box-3" <?php selected('box-3', $width)?>>3/4</option>
			<option value="box-1" <?php selected('box-1', $width)?>>4/4</option>
		</select><br /><small><?php _e('(Width of one property box)', TS_DOMAIN); ?></small></p>
		
<?php
	}

}


/**
 * Recent posts (category teaser)
 *
 */

class TS_Posts extends WP_Widget {
 
	function TS_Posts() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_category_teaser', 'description' => __('Show latest posts', TS_DOMAIN) );
		$this->WP_Widget('ts_category_teaser', TS_THEME.' '.__('Category Teaser', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= $instance['title'];
        $cat 	= $instance['cat'];
        if ( !$number = (int) $instance['number'] )
			$number = 3;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
        
        $image 		= $instance['image'];
        $meta		= $instance['meta'];
        $button 	= $instance['button'];
        $width 		= $instance['width'];
        
        $r = new WP_Query(array('cat' => $cat, 'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1)); ?>
        
		<?php if ($r->have_posts()) : ?>
		
		<div id="<?php echo $args['widget_id']; ?>" class="ts_category_teaser box-wrap clearfix clear">
		
			<?php if(!empty($title)) : ?>
			<div class="section-title clearfix">
			
				<h2><?php echo $title; ?></h2>
				
				<?php if(!empty($cat)) : ?>
				<div class="details-actions">
					<a href="<?php echo get_category_link($cat); ?>" class="action-link"><?php _e('See all', TS_DOMAIN); ?></a>
				</div>
				<?php endif; ?>
				
			</div>
			<?php endif; ?>
		
			<?php $i=0; while ($r->have_posts()) : $r->the_post(); ?>
			
			<?php
				$clear = '';
				if($width=='box-4' && ts_get_option('ts_home_sidebar')) {
					$clear_width = 3;
				} elseif($width=='box-3' || $width=='box-1') {
					$clear_width = 1;
				} elseif($width=='box-2') {
					$clear_width = 2;
				} else {
					$clear_width = 4;
				}
				
				if($i%$clear_width==0) $clear = ' clear';
				
			?>
			
			<div <?php post_class('ts-box '.$width.$clear); ?>>
    		
    		    <?php if(has_post_thumbnail() && !empty($image)) : ?>
    		    <?php
    		    	if($width=='box-2') {
    		    		$ts_thumb = 'dcr-half';
    		    	} elseif($width=='box-3') {
    		    		$ts_thumb = 'dcr-medium';
    		    	} elseif($width=='box-1') {
    		    		$ts_thumb = 'dcr-large';
    		    	} else {
    		    		$ts_thumb = 'post-thumbnail';
    		    	}
    		    ?>  	    
    	   		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail($ts_thumb, array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
    	   		<?php endif; ?>
    	   		
    	   		<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    	   		   
    	   		<?php $ts_archive_meta = ts_get_option('ts_archive_meta'); if($ts_archive_meta && !empty($meta)) : ?>
    	   		<p class="meta"><?php if($ts_archive_meta[0]) the_time(get_option('date_format')); ?><?php if($ts_archive_meta[1]) : ?> <?php _e('in', TS_DOMAIN); ?> <?php the_category(', '); endif; ?><?php if($ts_archive_meta[2]) : ?> <?php _e('by', TS_DOMAIN); ?> <?php the_author_posts_link(); endif; ?><?php if($ts_archive_meta[3]) : ?> - <?php comments_popup_link(__('Leave a reply',TS_DOMAIN), __('1 Comment',TS_DOMAIN), __('% Comments',TS_DOMAIN),'',__('Comments off',TS_DOMAIN)); endif; ?></p>
    			<?php
    				endif;
    				// get teaser text
					ts_the_excerpt(25, get_the_ID());
    			?>
    		
    		</div><!-- end post -->
			
			<?php $i++; endwhile; ?>
		
		</div>
		
		<?php wp_reset_query();  // Restore global post data stomped by the_post().
		
		endif;
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['cat'] = $new_instance['cat'];
    	$instance['number'] = (int) $new_instance['number'];
    	$instance['image'] = $new_instance['image'];
        $instance['meta'] = $new_instance['meta'];
        $instance['button'] = $new_instance['button'];
        $instance['width'] = $new_instance['width'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'cat' => '', 'number' => '', 'image' => '', 'meta' => '', 'button' => '', 'width' => '') );
		$title 		= $instance['title'];
		$cat	    = $instance['cat'];
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 3;
		$image 		= $instance['image'];
        $meta		= $instance['meta'];
        $button 	= $instance['button'];
        $width 		= $instance['width'];
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category', TS_DOMAIN); ?>:</label>
			<select class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>">
				<option value=""><?php _e('Most recent posts', TS_DOMAIN); ?></option>
				
				<?php
					$categories = get_categories('orderby=name&hide_empty=0');
					foreach($categories as $category) {
					echo '<option value="'.$category->cat_ID.'" '.selected($category->category_nicename, $cat).'>'.$category->cat_name.'</option>';
				} ?>
				
			</select>
			
		</p>
		
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e('(at most 20)', TS_DOMAIN); ?></small></p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="1" <?php checked( $image, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Show post thumbnail', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('meta'); ?>" name="<?php echo $this->get_field_name('meta'); ?>" value="1" <?php checked( $meta, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('meta'); ?>"><?php _e('Show post meta', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('button'); ?>" name="<?php echo $this->get_field_name('button'); ?>" value="1" <?php checked( $button, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('button'); ?>"><?php _e('Show more info button', TS_DOMAIN); ?></label>		
		</p>
		
		<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>">
			<option value="box-4" <?php selected('box-4', $width)?>>1/4</option>
			<option value="box-2" <?php selected('box-2', $width)?>>2/4</option>
			<option value="box-3" <?php selected('box-3', $width)?>>3/4</option>
			<option value="box-1" <?php selected('box-1', $width)?>>4/4</option>
		</select><br /><small><?php _e('(Width of one property box)', TS_DOMAIN); ?></small></p>
		
<?php
	}

}


/**
 * Property location
 * => only single property pages
 *
 */
 
class TS_Location extends WP_Widget {
 
	function TS_Location() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_location', 'description' => __('Google Map', TS_DOMAIN).' ('.__('only single properties', TS_DOMAIN).')' );
		$this->WP_Widget('ts_location', TS_THEME.' '.__('Property Location', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= strip_tags($instance['title']);
        $maptype 	= $instance['maptype'] ? $instance['maptype'] : 'ROADMAP';
        $mapzoom 	= $instance['mapzoom'] ? $instance['mapzoom'] : 14;
        $streetview	= $instance['streetview'] ? 'true' : 'false';
        
        $ts_property_layout_single = ts_get_option('ts_property_layout_single');
        if($args['id']=='sb-properties' || $args['id']=='sb-properties-sales' || $args['id']=='sb-properties-rentals') {
        	$size =  215;
        } elseif(!$ts_property_layout_single[0]) {
        	$size =  920;
        } else {
        	$size = 685;
        }
        
        if((get_post_type() == 'sale' || get_post_type() == 'rent') && is_singular()) {
        
        	$post = get_post(get_the_ID());
        	$custom = get_post_custom(get_the_ID());
        	
        	if(!empty($custom['_map_lat'][0]) && !empty($custom['_map_long'][0])) :
        		$marker = 'latLng:['.$custom['_map_lat'][0].', '.$custom['_map_long'][0].']';
        	elseif(!empty($custom['_map_address'][0])) :
        		$marker = 'address: "'.$custom['_map_address'][0].'"';
        	endif;
        	
        	if(!empty($marker)) :
 			
        		?>
        		
        		<script type="text/javascript">
					jQuery(document).ready(function($){
					    $("#property-map").gmap3({
      						action: 'addMarker',
      						<?php echo $marker; ?>,
	  					  	map:{
	  					  	  center: true,
	  					  	  zoom: <?php echo $mapzoom; ?>,
	  					  	  mapTypeId: google.maps.MapTypeId.<?php echo $maptype; ?>,
      						  mapTypeControl: true,
      						  navigationControl: true,
      						  scrollwheel: false,
      						  streetViewControl: <?php echo $streetview; ?>
				
	  					  	} 					
	  					});	            
					});
				</script>
        		
				<?php echo $before_widget; ?>
				    <?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				    
				    <div id="property-map" style="width:<?php echo $size; ?>;height:310px;margin-bottom:10px"></div>
				
				<?php echo $after_widget;
			
			endif; // if $marker
		}
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] 		= strip_tags($new_instance['title']);
    	$instance['maptype'] 	= $new_instance['maptype'];
    	$instance['mapzoom'] 	= $new_instance['mapzoom'];
    	$instance['streetview'] = $new_instance['streetview'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 		= strip_tags($instance['title']);
		$maptype 	= $instance['maptype'] ? $instance['maptype'] : 'ROADMAP';
		$mapzoom 	= $instance['mapzoom'] ? $instance['mapzoom'] : 14;
		$streetview	= $instance['streetview'] ? 'true' : 'false';
		
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('maptype'); ?>"><?php _e('Map type', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('maptype'); ?>" name="<?php echo $this->get_field_name('maptype'); ?>">
			<option value="ROADMAP" <?php selected('ROADMAP', $maptype)?>><?php _e('Map', TS_DOMAIN); ?></option>
			<option value="SATELLITE" <?php selected('SATELLITE', $maptype)?>><?php _e('Satellite', TS_DOMAIN); ?></option>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('mapzoom'); ?>"><?php _e('Zoom level', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('maptype'); ?>" name="<?php echo $this->get_field_name('mapzoom'); ?>">
			<?php
				for($i=1;$i<=20;$i++) {
					echo '<option '.selected($i, $mapzoom).'>'.$i.'</option>';
				}
			?>
		</select></p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('streetview'); ?>" name="<?php echo $this->get_field_name('streetview'); ?>" value="1" <?php checked( $streetview, 'true' ); ?> />
			<label for="<?php echo $this->get_field_id('streetview'); ?>"><?php _e('Enable streetview', TS_DOMAIN); ?></label>		
		</p>
		
<?php
	}

}


/**
 * Property gallery
 * => only single property pages
 *
 */
 
class TS_Gallery extends WP_Widget {
 
	function TS_Gallery() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_gallery', 'description' => __('Image Gallery', TS_DOMAIN).' ('.__('only single properties', TS_DOMAIN).')' );
		$this->WP_Widget('ts_gallery', TS_THEME.' '.__('Property Gallery', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        if((get_post_type() == 'sale' || get_post_type() == 'rent') && is_singular()) {
        
        $title 	= strip_tags($instance['title']);
        $size 	= $instance['size'] ? $instance['size'] : 'post-thumbnail';
 
        ?>
			<?php echo $before_widget; ?>
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				
				<?php
					$gallery_exclude = get_post_meta(get_the_ID(), 'gallery_exclude', true);
					$attachments = get_children( array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'exclude' => $gallery_exclude) );
					$gallery = get_post_meta(get_the_ID(), 'gallery', true);
				
				    if($size=='dcr-medium') :
				        $box_size = 'box-3';
				    elseif($size=='dcr-half') :
				        $box_size = 'box-2';
				    elseif($size=='dcr-large') :
				        $box_size = 'box-1';
				    else :
				        $box_size = 'box-4';
				    endif;
				?>
				
				<?php // photo gallery with custom field 'gallery' (comma-separated media file IDs => 12,34,69)
					if($gallery) : $images = explode(',',$gallery); ?>
				
				<div id="ts-gallery" class="box-wrap clearfix clear">
				
				    <?php foreach ($images as $image_id) : $src = wp_get_attachment_image_src($image_id, 'full'); $image_post = get_post($image_id); ?>
				    <div class="ts-box <?php echo $box_size; ?>">
						<a href="<?php echo $src[0]; ?>" title="<?php echo $image_post->post_content; ?>" rel="prettyPhoto[gallery]"><?php echo wp_get_attachment_image($image_id, $size); ?></a>
				    </div>   
					<?php endforeach; ?>
				
				</div><!-- end gallery -->
				
				<?php // photo gallery with attachments
					elseif($attachments && !get_post_meta(get_the_ID(), 'nogallery', true)) : ?>
				            
				<div id="ts-gallery" class="box-wrap clearfix clear">
				        
				    <?php foreach ($attachments as $attachment_id => $attachment) : $src = wp_get_attachment_image_src($attachment_id, 'full'); ?>
				    <div class="ts-box <?php echo $box_size; ?>">
				    	<a href="<?php echo $src[0]; ?>" title="<?php echo $attachment->post_content; ?>" rel="prettyPhoto[gallery]"><?php echo wp_get_attachment_image($attachment_id, $size); ?></a>
				    </div>
				    <?php endforeach; ?>
				
				</div><!-- end attachments -->
				
				<?php endif; // endif gallery ?>
 
			<?php echo $after_widget; ?>
        <?php }
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['size'] = $new_instance['size'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 		= strip_tags($instance['title']);
		$size 	= $instance['size'] ? $instance['size'] : 'post-thumbnail';
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Image size', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>">
			<option value="post-thumbnail" <?php selected('post-thumbnail', $size)?>>1/4</option>
			<option value="dcr-half" <?php selected('dcr-half', $size)?>>2/4</option>
			<option value="dcr-medium" <?php selected('dcr-medium', $size)?>>3/4</option>
			<option value="dcr-large" <?php selected('dcr-large', $size)?>>4/4</option>
		</select></p>
		
<?php
	}

}


/**
 * Property agent
 * => only single property pages
 *
 */
 
class TS_Agent extends WP_Widget {
 
	function TS_Agent() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_agent', 'description' => __('Property agent info', TS_DOMAIN).' ('.__('only single properties', TS_DOMAIN).')' );
		$this->WP_Widget('ts_agent', TS_THEME.' '.__('Property Agent', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options, $authordata;
        extract( $args );
        
        if((get_post_type() == 'sale' || get_post_type() == 'rent') && (is_singular() || is_author())) {
        
        $title 			= strip_tags($instance['title']);
        $title_name 	= $instance['title_name'];
        $title_link 	= $instance['title_link'];
        $image 			= $instance['image'];
        $align 			= $instance['align'] ? $instance['align'] : 'right';
        $avatar 		= $instance['avatar'];
        $contact 		= $instance['contact'];
        $contact_page 	= $instance['contact_page'];
 
        echo $before_widget;
			
				if($title_name) $title = ($title_link && is_singular()) ? '<a href="'.get_author_posts_url( $authordata->ID ).'">'.get_the_author_meta('display_name').'</a>' : get_the_author_meta('display_name');
				
				if(!empty($title)) echo $before_title . $title . $after_title;
				
				$meta_image = get_the_author_meta( 'profile_image' );
				
				if($avatar) {
					$agent_image = get_avatar( get_the_author_email(), '60' );
				} elseif(!empty($image) && !empty($meta_image)) {					
					$agent_image = '<img src="'.$meta_image['url'].'" class="avatar" />';
				} ?>
				    
				<p><?php if($agent_image) echo '<span class="avatar-align-'.$align.'">'.$agent_image.'</span>'; ?><?php the_author_description(); ?></p>
		    
		    	<?php
		    		if($contact && is_singular()) :
		    		$button_link = (!empty($contact_page)) ? get_permalink($contact_page) : '#contact';
		    	?>
		    	<p><a href="<?php echo $button_link; ?>" class="btn"><?php _e('Contact Agent', TS_DOMAIN); ?></a></p>
		    	<?php endif; ?>
 
		<?php echo $after_widget;
		}
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] 			= strip_tags($new_instance['title']);
    	$instance['title_name'] 	= $new_instance['title_name'];
    	$instance['title_link'] 	= $new_instance['title_link'];
    	$instance['image'] 			= $new_instance['image'];
    	$instance['align'] 			= $new_instance['align'];
    	$instance['avatar'] 		= $new_instance['avatar'];
    	$instance['contact'] 		= $new_instance['contact'];
    	$instance['contact_page'] 	= $new_instance['contact_page'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance		= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 			= strip_tags($instance['title']);
		$title_name 	= $instance['title_name'];
		$title_link 	= $instance['title_link'];
		$image 			= $instance['image'];
		$align 			= $instance['align'] ? $instance['align'] : 'right';
		$avatar 		= $instance['avatar'];
		$contact 		= $instance['contact'];
		$contact_page	= $instance['contact_page'];
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('title_name'); ?>" name="<?php echo $this->get_field_name('title_name'); ?>" value="1" <?php checked( $title_name, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('title_name'); ?>"><?php _e('Agent name as widget title', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('title_link'); ?>" name="<?php echo $this->get_field_name('title_link'); ?>" value="1" <?php checked( $title_link, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('title_link'); ?>"><?php _e('Link name with agent archive', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" value="1" <?php checked( $image, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Show profile image', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('avatar'); ?>" name="<?php echo $this->get_field_name('avatar'); ?>" value="1" <?php checked( $avatar, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('avatar'); ?>"><?php _e('Show agent avatar', TS_DOMAIN); ?></label>		
		</p>
		
		<p><label for="<?php echo $this->get_field_id('align'); ?>"><?php _e('Image align', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('align'); ?>" name="<?php echo $this->get_field_name('align'); ?>">
			<option value="right" <?php selected('right', $align)?>><?php _e('right', TS_DOMAIN); ?></option>
			<option value="left" <?php selected('left', $align)?>><?php _e('left', TS_DOMAIN); ?></option>
			<option value="none" <?php selected('none', $align)?>><?php _e('none', TS_DOMAIN); ?></option>
		</select></p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('contact'); ?>" name="<?php echo $this->get_field_name('contact'); ?>" value="1" <?php checked( $contact, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('contact'); ?>"><?php _e('Show contact link', TS_DOMAIN); ?></label>		
		</p>
		
		<p><label for="<?php echo $this->get_field_id('contact_page'); ?>"><?php _e('Contact Link', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('contact_page'); ?>" name="<?php echo $this->get_field_name('contact_page'); ?>">
			<option value=""><?php _e('Please select', TS_DOMAIN); ?>&hellip;</option>
			<?php $get_pages = get_pages(); foreach($get_pages as $page) : ?>
			<option value="<?php echo $page->ID; ?>" <?php selected($page->ID, $contact_page); ?>><?php echo $page->post_title; ?></option>
			<?php endforeach; ?>
		</select></p>
		
		<p><small><?php _e('If empty, button will be a jump link to contact widget.', TS_DOMAIN); ?></small></p>
		
<?php
	}

}


/**
 * Property contact
 * => only single property pages
 *
 */
 
class TS_Contact extends WP_Widget {
 
	function TS_Contact() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_contact', 'description' => __('Contact Form', TS_DOMAIN).' ('.__('only single properties', TS_DOMAIN).')' );
		$this->WP_Widget('ts_contact', TS_THEME.' '.__('Property Contact', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        if((get_post_type() == 'sale' || get_post_type() == 'rent') && is_singular()) {
        
        $title 			= strip_tags($instance['title']);
        $text 			= apply_filters( 'widget_text', $instance['text'], $instance );
        $tellafriend 	= $instance['tellafriend'];
        $email_custom	= $instance['email_custom'];
 
        ?>
			<?php echo $before_widget; ?>
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				
				<a name="contact"></a>
				
				<?php include( TS_INC . '/contact-form.php'); ?>
				
				<?php if($tellafriend) include( TS_INC . '/contact-tellafriend.php'); ?>
 
			<?php echo $after_widget; ?>
        <?php }
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	if ( current_user_can('unfiltered_html') ) {
			$instance['text'] =  $new_instance['text'];
		} else {
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		}
		$instance['tellafriend']	= $new_instance['tellafriend'];
		$instance['email_custom']	= $new_instance['email_custom'];
			                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance		= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 			= strip_tags($instance['title']);
		$text 			= format_to_edit($instance['text']);
		$tellafriend 	= $instance['tellafriend'];
		$email_custom	= $instance['email_custom'];
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', TS_DOMAIN); ?>:</label>
			<textarea class="widefat" rows="5" cols="10" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea><br />
			<small>(<?php _e('HTML allowed - will be wrapped by p-tags', TS_DOMAIN); ?>)</small>
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('tellafriend'); ?>" name="<?php echo $this->get_field_name('tellafriend'); ?>" value="1" <?php checked( $tellafriend, 1 ); ?> />
			<label for="<?php echo $this->get_field_id('tellafriend'); ?>"><?php _e('Show tell-a-friend', TS_DOMAIN); ?></label>		
		</p>
		
		<p><small><?php _e('Emails of this form will be sent to the author of the property entry.', TS_DOMAIN); ?> <?php _e('Optionally provide an email you prefer.', TS_DOMAIN); ?></small></p>
		
		<p>
			<input class="widefat" id="<?php echo $this->get_field_id('email_custom'); ?>" name="<?php echo $this->get_field_name('email_custom'); ?>" type="text" value="<?php echo $email_custom; ?>" />
		</p>
		
<?php
	}

}


/**
 * Features box
 *
 */

class TS_Features extends WP_Widget {

	function TS_Features() {
		global $options;
		$widget_ops = array('classname' => 'widget_ts_features', 'description' => __('Features Box', TS_DOMAIN));
		$this->WP_Widget('ts_features', TS_THEME.' '.__('Features Box', TS_DOMAIN), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$width = empty($instance['width']) ? 'box-4' : $instance['width'];
		if($instance['width']=='box-1' && ts_get_option('ts_home_sidebar')) $width = 'box-3';
		if($args['id']!='home' && $args['id']!='ts-footer') $width = 'box-4';
		$icon = $instance['icon'];
		$title = $instance['title'];
		$text = apply_filters( 'widget_text', $instance['text'], $instance );
		$img = $instance['img'];
		$img_lightbox = $instance['img_lightbox'];
		$img_align = $instance['align'] ? $instance['align'] : 'left';
		$link = $instance['link'];
		$label = $instance['label'];
		echo '<div id="'.$args['widget_id'].'" class="widget_ts_features ts-box '.$width.' clearfix">';
		
		if (substr($img,0,4)=='http') :
			$image = '<img src="'.$img.'" width="215" height="100" alt="'.$title.'" class="'.$img_align.'" />';
		else :
			$src = wp_get_attachment_image_src($img, 'post-thumbnail');
			$image = '<img src="'.$src[0].'" width="'.$src[1].'" height="'.$src[2].'" alt="'.$title.'" class="wp-post-image '.$img_align.'" />';
		endif;
		
		if(substr($img_lightbox,0,4)=='http') :
			$image_lightbox = $img_lightbox;
		else : 
			$lightbox_src = wp_get_attachment_image_src($img_lightbox, 'full');
			$image_lightbox = $lightbox_src[0];
		endif;
		
		if (substr($link,0,4)=='http') :
			$url = $link;
		else :
			$url = get_permalink($link);
		endif;
		
		if (!empty($icon)) $before_title = str_replace('class="section-title">', 'class="section-title icon-title icon-'.$icon.'">', $before_title);
		if (!empty($link) && !empty($title)) $title = '<a href="'.$url.'">'.$title.'</a>';
		if (!empty($title)) echo $before_title . $title . $after_title;
		if(!empty($img)) :
			if(!empty($image_lightbox)) echo '<a href="'.$image_lightbox.'" rel="prettyPhoto">';
			echo $image;
			if(!empty($image_lightbox)) echo '</a>';
		endif; ?>
		
		<div class="widget_text">
		    
		    <p><?php echo nl2br(($text)); ?></p>
		
		    <?php if (!empty($label) && !empty($link)) echo '<p><a href="'.$url.'" class="btn">'.$label.'</a></p>'; ?>
		
		</div>
		
		<?php echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['width'] = $new_instance['width'];
		$instance['icon'] = strip_tags($new_instance['icon']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['img'] = strip_tags($new_instance['img']);
		$instance['img_lightbox'] = strip_tags($new_instance['img_lightbox']);
		$instance['align'] = strip_tags($new_instance['align']);
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['label'] = strip_tags($new_instance['label']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		
		global $options;
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$width = $instance['width'];
		$icon = $instance['icon'];
		$title = strip_tags($instance['title']);
		$img = $instance['img'];
		$img_lightbox = $instance['img_lightbox'];
		$img_align = $instance['align'];
		$text = format_to_edit($instance['text']);
		$link = $instance['link'];
		$label = $instance['label'];
		
		$pn_icons_obj = array('about', 'alert', 'appointment', 'bulb', 'checked', 'disc', 'download', 'error', 'favorite', 'find', 'gear', 'info', 'internet', 'ipod', 'laboratory', 'license', 'locked', 'mail', 'note', 'package', 'preferences', 'refresh', 'rss', 'software', 'support', 'user');
		$pn_icons_obj_tmp = sort($pn_icons_obj);
?>
		
		<p><label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Icon:'); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>">
			<option value=""><?php _e('none', TS_DOMAIN) ?></option>
			<?php foreach ($pn_icons_obj as $pn_icon) {
				echo '<option value="'.$pn_icon.'" '.selected($pn_icon, $icon).'>'.$pn_icon.'</option>';
			} ?>
		</select></p>
		
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p>
			<label for="<?php echo $this->get_field_id('img'); ?>"><?php _e('Image:', TS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" type="text" value="<?php echo esc_attr($img); ?>" /><br /><small>(<?php _e('Enter URL or media image ID', TS_DOMAIN); ?>)</small><br />
			<label for="<?php echo $this->get_field_id('img_lightbox'); ?>"><?php _e('Lightbox:', TS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('img_lightbox'); ?>" name="<?php echo $this->get_field_name('img_lightbox'); ?>" type="text" value="<?php echo esc_attr($img_lightbox); ?>" /><br /><small>(<?php _e('Enter URL or media image ID', TS_DOMAIN); ?> - lightbox)</small><br />
		<select class="widefat" id="<?php echo $this->get_field_id('align'); ?>" name="<?php echo $this->get_field_name('align'); ?>">
			<option value="left" <?php selected('left', $img_align)?>><?php _e('left', TS_DOMAIN); ?></option>
			<option value="right" <?php selected('right', $img_align)?>><?php _e('right', TS_DOMAIN); ?></option>
		</select><br /><small>(<?php _e('Image align', TS_DOMAIN); ?>)</small>
		</p>

		<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', TS_DOMAIN); ?></label>
		<textarea class="widefat" rows="5" cols="10" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea><br /><small>(<?php _e('HTML allowed - will be wrapped by p-tags', TS_DOMAIN); ?>)</small></p>
		
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:', TS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /><br /><small>(<?php _e('Enter URL or post/page ID', TS_DOMAIN); ?>)</small></p>
		
		<p><label for="<?php echo $this->get_field_id('label'); ?>"><?php _e('Button label:', TS_DOMAIN); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo $this->get_field_name('label'); ?>" type="text" value="<?php echo esc_attr($label); ?>" /><br /><small>(<?php _e('Enter label to display a button', TS_DOMAIN); ?>)</small></p>
		
		<p><label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width', TS_DOMAIN); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>">
			<option value="box-4" <?php selected('box-4', $width)?>>1/4</option>
			<option value="box-2" <?php selected('box-2', $width)?>>2/4</option>
			<option value="box-3" <?php selected('box-3', $width)?>>3/4</option>
			<option value="box-1" <?php selected('box-1', $width)?>>4/4</option>
		</select><br /><small>(<?php _e('only home page', TS_DOMAIN); ?>)</small></p>
		
<?php
	}
}


/**
 * Call to action
 *
 */
 
class TS_Call2Action extends WP_Widget {
 
	function TS_Call2Action() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_call2action', 'description' => __('Call-to-action bar for', TS_DOMAIN).' '.TS_THEME );
		$this->WP_Widget('ts_call2action', TS_THEME.' '.__('Call2Action', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= empty($instance['title']) ? __('Call2Action', TS_DOMAIN) : strip_tags($instance['title']);
        $text 	= empty($instance['text']) ? __('Make the user do <em>something</em>', TS_DOMAIN) : apply_filters( 'widget_text', $instance['text'], $instance );
        $link 	= $instance['link'];
		$label 	= empty($instance['label']) ? __('Do something!', TS_DOMAIN) : $instance['label'];
		
		if (substr($link,0,4)=='http') :
			$url = $link;
		else :
			$url = get_permalink($link);
		endif;
 
        ?>
        
        <div class="ts_call2action-wrap">
        
			<div id="<?php echo $args['widget_id']; ?>" class="ts-bar ts_call2action clearfix clear">
				
				<div class="bar-text"><?php echo $text; ?></div>
				
				<?php if(!empty($link)) : ?>
				<div class="bar-btn"><a href="<?php echo $url; ?>" class="btn btn-big"><?php echo $label; ?></a></div>
				<?php endif; ?>
				
			</div><!-- end ts-bar -->
		
		</div>
		
		<?php }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['text'] = strip_tags($new_instance['text']);
    	$instance['link'] = strip_tags($new_instance['link']);
    	$instance['label'] = strip_tags($new_instance['label']);
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$title 		= empty($instance['title']) ? __('Call2Action', TS_DOMAIN) : strip_tags($instance['title']);
		$text 		= empty($instance['text']) ? __('Make the user do <em>something</em>', TS_DOMAIN) : apply_filters( 'widget_text', $instance['text'], $instance );
		$link		= $instance['link'];
		$label 		= empty($instance['label']) ? __('Do something!', TS_DOMAIN) : $instance['label'];
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text:', TS_DOMAIN); ?></label>
			<textarea class="widefat" rows="5" cols="10" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link:', TS_DOMAIN); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo esc_attr($link); ?>" /><br />
			<small>(<?php _e('Enter URL or post/page ID', TS_DOMAIN); ?>)</small>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('label'); ?>"><?php _e('Link label:', TS_DOMAIN); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('label'); ?>" name="<?php echo $this->get_field_name('label'); ?>" type="text" value="<?php echo esc_attr($label); ?>" />
		</p>
		
<?php
	}

}


/**
 * Recent posts (sidebar)
 *
 */

class TS_Recent extends WP_Widget {

	function TS_Recent() {
		global $options;
		$widget_ops = array('classname' => 'widget_ts_recent_2', 'description' => __('Recent posts in sidebar', TS_DOMAIN));
		$this->WP_Widget('ts_recent_2', TS_THEME.' '.__('Recent Posts', TS_DOMAIN).' 2', $widget_ops);
	}

	function widget($args, $instance) {
	
		global $options;
	
		ob_start();
		extract($args);

		$width = empty($instance['width']) ? 'box-1' : $instance['width'];
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', TS_DOMAIN) : $instance['title']);
		if ( !$number = (int) $instance['number'] )
			$number = 4;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 20 )
			$number = 20;
			
		$news_cat = $instance['news_cat'];
		$image	= $instance['image'] ? '1' : '0';
		$image_size	= $instance['image_size'] ? '1' : '0';
		$button	= $instance['button'] ? '1' : '0';

		$r = new WP_Query(array('cat' => $news_cat, 'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1));
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>
		<ul>
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a><br /><small><?php the_time(get_option('date_format')); ?> <?php _e('in',TS_DOMAIN); ?> <?php the_category(', '); ?></small></li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
			wp_reset_query();  // Restore global post data stomped by the_post().
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['news_cat'] = $new_instance['news_cat'];

		return $instance;
	}

	function form( $instance ) {
	
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'number' => 4 ) );
	
		$width = empty($instance['width']) ? 'box-1' : $instance['width'];
		$title = isset($instance['title']) ? esc_attr($instance['title']) : __('Recent News', TS_DOMAIN);
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 4;
			
		$news_cat = $instance['news_cat'];
		$image	= $instance['image'] ? '1' : '0';
		$image_size	= $instance['image_size'] ? '1' : '0';
		$button	= $instance['button'] ? '1' : '0';

		$pn_categories_obj = get_categories('hide_empty=0');
		$pn_categories = array(); ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		
		<p><label for="<?php echo $this->get_field_id('news_cat'); ?>"><?php _e('Category:'); ?></label>
		<select class="widefat" id="<?php echo $this->get_field_id('news_cat'); ?>" name="<?php echo $this->get_field_name('news_cat'); ?>">
			<option value=""><?php _e('All', TS_DOMAIN) ?></option>
			<?php foreach ($pn_categories_obj as $pn_cat) {
				// if($pn_cat->cat_ID==$news_cat) : $selected = ' select="selected"'; else : ''; endif;
				echo '<option value="'.$pn_cat->cat_ID.'" '.selected($pn_cat->cat_ID, $news_cat).'>'.$pn_cat->cat_name.'</option>';
			} ?>
		</select></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
		<small><?php _e('(at most 20)', TS_DOMAIN); ?></small></p>
<?php
	}
}


/**
 * Newsletter (feedburner)
 *
 */
 
class TS_Newsletter extends WP_Widget {
 
	function TS_Newsletter() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_newsletter', 'description' => __('Newsletter form for', TS_DOMAIN).' '.TS_THEME );
		$this->WP_Widget('ts_newsletter', TS_THEME.' '.__('Newsletter', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= strip_tags($instance['title']);
        $user	= $instance['user'];
        $text	= $instance['text'];
        $default = empty($instance['default']) ? __('Enter email address', TS_DOMAIN) : $instance['default'];
 
        ?>
			<?php echo $before_widget; ?>
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				
				<?php if($text) : ?>
				<p><?php echo $text; ?></p>
				<?php endif; ?>
				
				<form class="newsletterform" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $user; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">				
					<p class="clearfix">
					    <input type="text" class="text newsletter-text" name="email" value="<?php echo $default; ?>..." onfocus="if (this.value == '<?php echo $default; ?>...') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo $default; ?>...';}" />
    				    <input type="hidden" value="<?php echo $user; ?>" name="uri" />
    				    <input type="hidden" name="loc" value="<?php bloginfo('language'); ?>"/>
					    <input type="submit" class="btn submit newsletter-submit" value="<?php _e('Ok', TS_DOMAIN); ?>" />
					</p>
				</form>
 
			<?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['user'] = strip_tags($new_instance['user']);
    	$instance['text'] = strip_tags($new_instance['text']);
    	$instance['default'] = strip_tags($new_instance['default']);
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'user' => '', 'text' => '') );
		$title 		= strip_tags($instance['title']);
		$user		= $instance['user'];
		$text		= $instance['text'];
		$default = empty($instance['default']) ? __('Enter email address', TS_DOMAIN) : $instance['default'];
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo attribute_escape($text); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('Feedburner ID', TS_DOMAIN); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo attribute_escape($user); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('default'); ?>"><?php _e('Default', TS_DOMAIN); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('default'); ?>" name="<?php echo $this->get_field_name('default'); ?>" type="text" value="<?php echo attribute_escape($default); ?>" />
			</label>
		</p>
		
<?php
	}

}


/**
 * Search
 *
 */
 
class TS_Search extends WP_Widget {
 
	function TS_Search() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_search', 'description' => __('Search form for', TS_DOMAIN).' '.TS_THEME );
		$this->WP_Widget('ts_search', TS_THEME.' '.__('Search', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
        extract( $args );
        
        $title 	= strip_tags($instance['title']);
 
        ?>
			<?php echo $before_widget; ?>
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				
				<?php get_search_form(); ?>
 
			<?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
                  
        return $new_instance;
    }
 
    function form($instance) {
        
        global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '') );
		$title 		= strip_tags($instance['title']);
		
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
<?php
	}

}


/**
 * Twitter
 *
 */
 
class TS_Twitter extends WP_Widget {
 
	function TS_Twitter() {
	
		global $options;
		
        $widget_ops = array('classname' => 'widget_ts_twitter', 'description' => __('Display latest tweets in', TS_DOMAIN).' '.TS_THEME );
		$this->WP_Widget('ts_twitter', TS_THEME.' '.__('Twitter', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
       
        extract( $args );
        
        $title	= $instance['title'];
        $user	= empty($instance['user']) ? ts_get_option('ts_twitter') : $instance['user'];
        $link	= $instance['twitter_link'] ? '1' : '0';
        $label	= empty($instance['twitter_label']) ? __('Follow', TS_DOMAIN) : $instance['twitter_label'];
        if ( !$nr = (int) $instance['twitter_nr'] )
			$nr = 5;
		else if ( $nr < 1 )
			$nr = 1;
		else if ( $nr > 15 )
			$nr = 15;
 
        ?>
			<?php echo $before_widget; ?>
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>

    			<?php
    			/*
    			 * JSON list of tweets using:
    			 *         http://dev.twitter.com/doc/get/statuses/user_timeline
    			 * Cached using WP transient API.
    			 *        http://www.problogdesign.com/wordpress/use-the-transients-api-to-list-the-latest-commenter/
    			 */

    			$transName = 'list-tweets'; // Name of value in database.
    			$cacheTime = 2; // Time in minutes between updates.
    			
    			if(false === ($tweets = get_transient($transName) ) ) :    
    			
    			    // Get the tweets from Twitter.
        			$json = wp_remote_get("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=$user&count=$nr");
        			
        			// Get tweets into an array.
        			$twitterData = json_decode($json['body'], true);
        			
        				// Now update the array to store just what we need.
        				// (Done here instead of PHP doing this for every page load)
        				foreach ($twitterData as $tweet) :
        				    // Core info.
        				    $name = $tweet['user']['name'];
        				    $permalink = 'http://twitter.com/#!/'. $name .'/status/'. $tweet['id_str'];
        				    
        				    /* Alternative image sizes method: http://dev.twitter.com/doc/get/users/profile_image/:screen_name */
        				    $image = $tweet['user']['profile_image_url'];
        				    
        				    // Message. Convert links to real links.
        				    $pattern = '/http:(\S)+/';
        				    $replace = '<a href="${0}" target="_blank" rel="nofollow">${0}</a>';
        				    $text = preg_replace($pattern, $replace, $tweet['text']);
        				    
        				    // Need to get time in Unix format.
        				    $time = $tweet['created_at'];
        				    $time = date_parse($time);
        				    $uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
        				    
        				    // Now make the new array.
        				    $tweets[] = array(
        				                    'text' => $text,
        				                    'name' => $name,
        				                    'permalink' => $permalink,
        				                    'image' => $image,
        				                    'time' => $uTime
        				                    );
        				endforeach;
        			
        			// Save our new transient.
        			set_transient($transName, $tweets, 60 * $cacheTime);
    			endif;
    				
    			foreach($tweets as $t) : ?>
    			    <div class="tweet-wrap clearfix">
    			    	<p>
    			        	<img src="<?php echo $t['image']; ?>" width="48" height="48" alt="" />                
    			        	<?php echo '<span class="tweet-name"><a href="'.$t['permalink'].'">'.$t['name'] . '</a></span>: '. $t['text']; ?>
    			        	<span class="tweet-time">&larr; <?php echo human_time_diff($t['time'], current_time('timestamp')); ?> ago</span>
    			        </p>
    			    </div>
    			<?php endforeach; ?>
                  
                <?php if($link) : ?>
                <p><a href="http://twitter.com/<?php echo $user; ?>" class="btn"><?php echo $label; ?></a></p>
                <?php endif; ?>
 
			<?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = strip_tags($new_instance['title']);
    	$instance['user'] = strip_tags($new_instance['user']);
    	$instance['twitter_link'] = $new_instance['twitter_link'] ? 1 : 0;
    	$instance['twitter_label'] = strip_tags($new_instance['twitter_label']);
    	$instance['twitter_nr'] = (int) $new_instance['twitter_nr'];
                  
        return $new_instance;
    }
 
    function form($instance) {
    
    	global $options;
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'user' => '', 'twitter_link' => '', 'twitter_label' => '', 'twitter_nr' => '') );
		$title		= $instance['title'];
		$user		= $instance['user'];
		$link 		= $instance['twitter_link'] ? 1 : 0;
		$label		= empty($instance['twitter_label']) ? __('Follow', TS_DOMAIN) : $instance['twitter_label'];
		if (!$nr = (int) $instance['twitter_nr']) $nr = 5;
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('User'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo attribute_escape($user); ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter_nr'); ?>"><?php _e('Number of tweets to show', TS_DOMAIN); ?>:</label>
			<input id="<?php echo $this->get_field_id('twitter_nr'); ?>" name="<?php echo $this->get_field_name('twitter_nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" /><br />
			<small><?php _e('(at most 15)'); ?></small>
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>"<?php checked($link); ?> />
			<label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php _e('Show link to Twitter', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twitter_label'); ?>"><?php _e('Link label', TS_DOMAIN); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo attribute_escape($label); ?>" />
			</label>
		</p>
		
<?php
	}

}


/**
 * About
 *
 */
 
class TS_About extends WP_Widget {
 
	function TS_About() {
		global $options;
        $widget_ops = array('classname' => 'widget_ts_about', 'description' => __('Display about section in', TS_DOMAIN).' '.TS_THEME );
		$this->WP_Widget('ts_about', TS_THEME.' '.__('About', TS_DOMAIN), $widget_ops);
    
    }
 
    function widget($args, $instance) {
    
    	global $options;
      
        extract( $args );
        
        $title	= strip_tags($instance['title']);
        $avatar	= $instance['about_avatar'] ? '1' : '0';
        $text	= empty($instance['about_text']) ? __('Your text about you.', TS_DOMAIN) : $instance['about_text'];
        $link 	= (int) $instance['about_link'];
        $label	= empty($instance['about_label']) ? __('More', TS_DOMAIN) : $instance['about_label'];
 
        ?>
			<?php echo $before_widget; ?>
				
				<?php if(!empty($title)) echo $before_title . $title . $after_title; ?>
				
				<?php if($avatar) : ?>
				<?php echo get_avatar(get_bloginfo('admin_email'),'80'); ?>
				<?php endif; ?>
				
				<p><?php echo nl2br($text); ?></p>                
				
				<?php if($link) : ?><p><a href="<?php echo get_permalink($link); ?>" class="btn"><?php echo $label; ?></a></p><?php endif; ?>
 
			<?php echo $after_widget; ?>
        <?php
    }

    function update($new_instance, $old_instance) {  
    
    	$instance['title'] = empty($new_instance['title']) ? __('About Us', TS_DOMAIN) : $new_instance['title'];
    	$instance['about_avatar'] = $new_instance['about_avatar'] ? 1 : 0;
    	$instance['about_text'] = strip_tags($new_instance['about_text']);
    	$instance['about_link'] = (int) $new_instance['about_link'];
    	$instance['about_label'] = empty($new_instance['about_label']) ? __('More', TS_DOMAIN) : $new_instance['about_label'];
                  
        return $new_instance;
    }
 
    function form($instance) {
        
		$instance	= wp_parse_args( (array) $instance, array( 'title' => '', 'about_avatar' => '', 'about_text' => '', 'about_link' => '', 'about_label' => '', 'about_big' => '') );
		$title	= strip_tags($instance['title']);
        $avatar	= $instance['about_avatar'] ? '1' : '0';
        $text	= empty($instance['about_text']) ? __('Your text about you.', TS_DOMAIN) : $instance['about_text'];
        $link 	= $instance['about_link'];
        $label	= empty($instance['about_label']) ? __('More', TS_DOMAIN) : $instance['about_label'];
?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
		
		<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('about_avatar'); ?>" name="<?php echo $this->get_field_name('about_avatar'); ?>"<?php checked( $avatar ); ?> />
			<label for="<?php echo $this->get_field_id('about_avatar'); ?>"><?php _e('Show admin\'s avatar', TS_DOMAIN); ?></label>		
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('about_text'); ?>"><?php _e('Text', TS_DOMAIN); ?>:
			<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('about_text'); ?>" name="<?php echo $this->get_field_name('about_text'); ?>"><?php echo attribute_escape($text); ?></textarea>
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('about_link'); ?>"><?php _e('Post/page ID for link', TS_DOMAIN); ?>:</label>
			<input id="<?php echo $this->get_field_id('about_link'); ?>" name="<?php echo $this->get_field_name('about_link'); ?>" type="text" value="<?php echo $link; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('about_label'); ?>"><?php _e('Link label', TS_DOMAIN); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id('about_label'); ?>" name="<?php echo $this->get_field_name('about_label'); ?>" type="text" value="<?php echo attribute_escape($label); ?>" />
			</label>
		</p>
		
<?php
	}

}


/**
 * Register widgets
 */
 
add_action( 'widgets_init', 'ts_register_widgets' );

function ts_register_widgets() {
	
	register_widget('TS_Property_Search');
	register_widget('TS_Property_Category');
	register_widget('TS_Posts');
	register_widget('TS_Location');
	register_widget('TS_Gallery');
	register_widget('TS_Agent');
	register_widget('TS_Contact');
	register_widget('TS_Features');
	register_widget('TS_Call2Action');
	register_widget('TS_Recent');
	register_widget('TS_Newsletter');
	register_widget('TS_Search');
	register_widget('TS_Twitter');
	register_widget('TS_About');
	
	
}


/**
 * Unregister widgets:
 *
 * => default WordPress search
 *
 */
 
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
	
function unregister_default_wp_widgets() {

    unregister_widget('WP_Widget_Search');
}


?>