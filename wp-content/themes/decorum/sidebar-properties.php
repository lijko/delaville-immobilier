<div id="sidebar">

	<?php
		do_action('ts_properties_before_sidebar');
	
		if((is_tax('sales') || is_tax('rentals') || is_tax('feature') || is_tax('property-type') || is_tax('location') || is_author()) && is_active_sidebar('sb-properties-archive')) : dynamic_sidebar('sb-properties-archive');
	    elseif(get_post_type()=='sale' && is_singular() && is_active_sidebar('sb-properties-sales')) : dynamic_sidebar('sb-properties-sales');
	    elseif(get_post_type()=='rent' && is_singular() && is_active_sidebar('sb-properties-rentals')) : dynamic_sidebar('sb-properties-rentals');
		else :
	?>
	
	    <?php if (!dynamic_sidebar('sb-properties')) : ?>
				
		<div class="ts-box box-4 clearfix">
		
		    <h3 class="section-title"><?php _e('Widget Area',TS_DOMAIN); ?></h3>
	    	
	    	<p><?php _e('This is the sidebar widget area. Please go to <code>WP-Admin > Appearance > Widgets</code> to drag and drop your preferred widgets in this area.', TS_DOMAIN); ?></p>
	    	
	    	<p><a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php" class="btn"><?php _e('Edit Widgets',TS_DOMAIN); ?></a></p>
		
		</div><!-- end ts-box -->
	    
		<?php endif; ?>
		
	<?php
		endif; // endif Sidebar - category_description
		do_action('ts_properties_after_sidebar');	
	?>

</div><!-- end sidebar -->