<?php get_header(); ?>
		
	<div id="main">
	    
	    <?php if(!ts_get_option('ts_slider_size') || !ts_get_option('ts_home_sidebar')) include( TS_INC . '/slider-full.php'); ?>
	    
	    <div id="content-wrap" class="clearfix">
	    
	    	<?php if(ts_get_option('ts_home_sidebar')) : ?>
	    	<div id="content">
	    	<?php endif; ?>
	    	
	    		<?php if(ts_get_option('ts_slider_size') && ts_get_option('ts_home_sidebar')) include( TS_INC . '/slider.php'); ?>
	    				
	    		<?php if (!dynamic_sidebar('home')) : ?>
	    	
	    			<div class="box-wrap clearfix">
	    			
	    			<?php $box_width = ts_get_option('ts_home_sidebar') ? 'box-3' : 'box-1';?>
	    			<div class="ts-box <?php echo $box_width; ?> clearfix">
	    			
	    				<div class="ts-info info-icon">
	    				    <span class="icon-info"></span>
	    				    <?php _e('Thanks for using my theme! Now it\'s your turn.',TS_DOMAIN); ?>
	    				</div>
	    			
	    			    <h3 class="section-title"><?php _e('First Steps',TS_DOMAIN); ?></h3>
	    			    
	    			    <ul>
	    				
	    				<li><?php _e('Create some example properties',TS_DOMAIN); ?> &rarr; <a href="<?php echo TS_URL; ?>/wp-admin/post-new.php?post_type=sale"><?php _e( 'Add New Property', TS_DOMAIN ); ?></a></li>
	    				
	    				<li><?php _e('Make your settings in the theme options',TS_DOMAIN); ?> &rarr; <a href="<?php echo TS_URL; ?>/wp-admin/admin.php?page=tso_options"><?php _e( 'Theme Options', TS_DOMAIN ); ?></a></li>
	    				
	    				<li><?php _e('Drag widgets to the home page widget area',TS_DOMAIN); ?> &rarr; <a href="<?php echo TS_URL; ?>/wp-admin/widgets.php"><?php _e( 'Edit Widgets', TS_DOMAIN ); ?></a></li>
	    				
	    				<li><?php _e('Add items to the main menu',TS_DOMAIN); ?> &rarr; <a href="<?php echo TS_URL; ?>/wp-admin/nav-menus.php"><?php _e( 'Create a custom menu', TS_DOMAIN ); ?></a></li>
	    				
	    				</ul>
	    				
	    				<div class="ts-info info-icon">
	    				    <span class="icon-bulb"></span>
	    				    <?php _e('If you need any help, please <a href="http://themeshift.com/register/" target="_blank">register</a> and head over to the <a href="http://themeshift.com/docs/" target="_blank">theme docs</a>.',TS_DOMAIN); ?>
	    				</div>
	    			
	    			</div><!-- end ts-box -->
	    			
	    			<div class="ts-box <?php echo $box_width; ?> clearfix">
	    			
	    			    <h3 class="section-title"><?php _e('Dummy Content',TS_DOMAIN); ?></h3>
	    				
	    				<div class="ts-info info-icon">
	    					<span class="icon-download"></span>
	    					<?php _e('To get started with the theme you may also want to upload some dummy content (also see <a href="http://codex.wordpress.org/Importing_Content#WordPress" target="_blank">codex</a> about importing content)',TS_DOMAIN); ?> &rarr; <a href="http://themeshift.com/download/decorum-dummy.xml"><?php _e('Download XML',TS_DOMAIN); ?></a>
	    				</div>
	    			
	    			</div><!-- end ts-box -->
	    			
	    		</div>
	    			
	    		<?php endif; ?>
	    	
	    	<?php if(ts_get_option('ts_home_sidebar')) : ?>
	    	</div><!-- end content -->
	    
	    	<?php get_sidebar(); ?>
	    	<?php endif; ?>
	    
	    </div><!-- end content-wrap -->
	
	</div><!-- end main -->
		
<?php get_footer(); ?>