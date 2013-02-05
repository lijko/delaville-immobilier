	<?php do_action('ts_before_footer'); ?>

    <div id="footer">
    
    	<div class="box-wrap clearfix">
    
    		<?php
			    if(is_front_page() && is_active_sidebar('footer-home')) : dynamic_sidebar('footer-home');
			    elseif(is_archive() && is_active_sidebar('footer-category')) : dynamic_sidebar('footer-category');
			    elseif(is_single() && is_active_sidebar('footer-posts')) : dynamic_sidebar('footer-posts');
			    elseif(is_page() && is_active_sidebar('footer-pages')) : dynamic_sidebar('footer-pages');
			else : ?>
    	
    			<?php if (!dynamic_sidebar('ts-footer')) : ?>
    			
    			<div class="ts-box box-4">
    			
    				<h3><?php _e('Widget Area',TS_DOMAIN); ?></h3>
    				
    				<p><?php _e('This is the footer widget area. Please go to <code>WP-Admin > Appearance > Widgets</code> to drag and drop your preferred widgets in this area.', TS_DOMAIN); ?></p>
				
					<p><a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php" class="btn"><?php _e('Edit Widgets',TS_DOMAIN); ?></a></p>
    			
    			</div><!-- end ts-box -->
    			
    			<?php endif; ?>
	
			<?php endif; // endif Footer ?>
    	
    	</div><!-- end box-wrap -->		
    
    </div><!-- end footer -->
    
    <?php do_action('ts_after_footer'); ?>

</div><!-- end wrap -->

<?php do_action('ts_after_wrap'); ?>
	
<?php if(!ts_get_option('ts_footer_left_off') || !ts_get_option('ts_footer_right_off')) : ?>
<div id="subfooter" class="clearfix">
    	
    <?php if(!ts_get_option('ts_footer_left_off')) : ?><div id="subfooter-left"><?php echo stripslashes(ts_get_option('ts_footer_left')); ?></div><?php endif; ?>
    <?php if(!ts_get_option('ts_footer_right_off')) : ?><div id="subfooter-right"><?php echo stripslashes(ts_get_option('ts_footer_right')); ?></div><?php endif; ?>

</div>
<?php endif; ?>

<?php if(ts_get_option('ts_totop')) : ?>
<a href="#" id="totop"></a>
<?php endif; ?>

<?php
	do_action('ts_after_all');
	wp_footer();
?>

</body>
</html>