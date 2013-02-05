<?php /*
Template Name: Subpages (full width)
*/ ?>

<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    	
		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class('ts-box box-1'); ?>>
		
		    <h1 class="section-title"><?php the_title(); ?></h1>
		    
		    <?php if(has_post_thumbnail()) the_post_thumbnail('dcr-large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
		    
		    <?php the_content(); ?>
		    
		    <?php // edit_post_link(__('Edit Page',TS_DOMAIN), '<p class="clear">', '</p>'); ?>
		
		</div><!-- end post -->
		
		<?php $i++; endwhile; endif; ?>    		
		
		<?php $i=0; $subpages = new WP_Query('post_type=page&post_parent='.$post->ID.'&orderby=menu_order&order=ASC&showposts=-1'); ?>
		
		<?php if($subpages) : ?>
		
		<div id="subpages" class="box-wrap clearfix">
		
		    <?php $i=0; while ($subpages->have_posts()) : $subpages->the_post(); ?>
		
		    <div class="ts-box box-4 hentry<?php if($i%4==0) echo ' clear'; ?>">
		    
		        <?php if(has_post_thumbnail()) : ?>    	    
		        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-thumbnail', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
		        <?php endif; ?>
		    
		        <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		        	
		        <?php
		            if (strpos($post->post_content, '<!--more-->')) : 
		            	$page_content = substr($post->post_content, 0, strpos($post->post_content, "<!--more-->"));
		            else : 
		            	$page_content = $post->post_content;
		            endif;
		            
		            echo wpautop(do_shortcode($page_content));
		            
		            if (strpos($post->post_content, '<!--more-->')) :
		        ?>
			    <p><a href="<?php the_permalink(); ?>"  class="btn" title="<?php the_title(); ?>"><?php echo apply_filters('ts_more', __('More info', TS_DOMAIN)); ?></a></p>
			    <?php endif; ?>
		    
		    </div><!-- end post -->
		    
		    <?php $i++; endwhile; ?>
		
		</div><!-- end subpages -->
		
		<?php endif; // endif subpages ?>
		    
		<?php wp_reset_query(); ?>
		
		<?php include( TS_INC . '/gallery.php'); ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>