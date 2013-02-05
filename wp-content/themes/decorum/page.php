<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    
    	<div id="content">
    	
    		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
        
    		<div <?php post_class('ts-box box-3'); ?>>
    	
    			<h1 class="section-title"><?php the_title(); ?></h1>
    			
    			<?php if(has_post_thumbnail()) the_post_thumbnail('dcr-medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
        		
        		<?php the_content(); ?>
        		
        		<?php // edit_post_link(__('Edit Page',TS_DOMAIN), '<p class="clear">', '</p>'); ?>
        	
        	</div><!-- end post -->
    
    		<?php include( TS_INC . '/gallery.php'); ?>
    		
    		<?php $i++; endwhile; endif; ?>
    		
    		<?php
				$ts_comments = ts_get_option('ts_comments');
				if($ts_comments[1]) comments_template('', true);
			?>
    		
    	</div><!-- end content -->
    
    	<?php get_sidebar(); ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>