<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    
    	<div id="content">
    	
    		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
        
    		<div <?php post_class(); ?>>
    	
    			<h1 class="section-title"><?php the_title(); ?></h1>
    			
    			<?php if(wp_attachment_is_image(get_the_ID())) :
		    	$att_image = wp_get_attachment_image_src( get_the_ID(), array(685,685) );
		    	?>
		    	<p>
		    		<a href="<?php echo wp_get_attachment_url(get_the_ID()); ?>" title="<?php the_title(); ?>" rel="prettyPhoto">
		    			<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>" alt="<?php the_title(); ?>" />
		    		</a>
		    	</p>
		    	<?php endif; ?>
        		
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