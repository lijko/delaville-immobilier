<div id="sidebar">

	<?php
		do_action('ts_before_sidebar');
		
	    if(is_front_page() && is_active_sidebar('sb-home')) : dynamic_sidebar('sb-home');
	    elseif(is_archive() && is_active_sidebar('sidebar-category')) : dynamic_sidebar('sidebar-category');
	    elseif(is_single() && is_active_sidebar('sidebar-posts')) : dynamic_sidebar('sidebar-posts');
	    elseif((is_page_template('page-tpl-properties.php') || is_page_template('page-tpl-properties-sale.php') || is_page_template('page-tpl-properties-rent.php') || is_search()) && is_active_sidebar('sb-properties-archive')) : dynamic_sidebar('sb-properties-archive');
	    elseif(is_page() && is_active_sidebar('sidebar-pages')) : dynamic_sidebar('sidebar-pages');
	else : ?>
	
	    <?php if (!dynamic_sidebar('sidebar')) : ?>
				
		<div class="ts-box box-4 clearfix">
		
		    <h3 class="section-title"><?php _e('Widget Area',TS_DOMAIN); ?></h3>
	    	
	    	<p><?php _e('This is the sidebar widget area. Please go to <code>WP-Admin > Appearance > Widgets</code> to drag and drop your preferred widgets in this area.', TS_DOMAIN); ?></p>
	    	
	    	<p><a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php" class="btn"><?php _e('Edit Widgets',TS_DOMAIN); ?></a></p>
		
		</div><!-- end ts-box -->
	    
		<?php endif; ?>
		
	<?php
		endif; // endif Sidebar - category_description()
		do_action('ts_after_sidebar');	
	?>

</div><!-- end sidebar -->