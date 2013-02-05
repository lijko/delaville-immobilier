<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    
    	<div id="content">
    	
    		<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
        
    		<div <?php post_class(); ?>>
    	
    			<h1 class="section-title"><?php the_title(); ?></h1>
    			
    			<?php 
    				do_action('ts_single_after_title');
    				if(has_post_thumbnail()) the_post_thumbnail('dcr-medium', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().''));
    				do_action('ts_single_after_image');
    			?>
    			
    			<?php $ts_archive_meta = ts_get_option('ts_archive_meta'); if($ts_archive_meta) : ?>
    			<p class="meta"><?php if($ts_archive_meta[0]) the_time(get_option('date_format')); ?><?php if($ts_archive_meta[1]) : ?> <?php _e('in', TS_DOMAIN); ?> <?php the_category(', '); endif; ?><?php if($ts_archive_meta[2]) : ?> <?php _e('by', TS_DOMAIN); ?> <?php the_author_posts_link(); endif; ?><?php if($ts_archive_meta[3]) : ?> - <?php comments_popup_link(__('Leave a reply',TS_DOMAIN), __('1 Comment',TS_DOMAIN), __('% Comments',TS_DOMAIN),'',__('Comments off',TS_DOMAIN)); endif; ?></p>
    			<?php endif; ?>
        		
        		<?php 
        			do_action('ts_single_before_content');
        			
        			the_content();
        			
        			do_action('ts_single_after_content');
        		?>
        		
        		<?php the_tags('<p class="meta-tags">',', ', '</p>'); ?>
        	
        	</div><!-- end post -->
    
    		<?php include( TS_INC . '/gallery.php'); ?>
    		
    		<?php $i++; endwhile; endif; ?>
    		
    		<?php
				$ts_comments = ts_get_option('ts_comments');
				if($ts_comments[0]) comments_template('', true);
			?>
        		
			<?php if(ts_get_option('ts_single_paging')) : ?>
			<div class="ts-paging clear clearfix">
			<?php
			    previous_post_link('<div class="ts-paging-prev left">%link</div>', __('Previous post', TS_DOMAIN));
			    next_post_link('<div class="ts-paging-next right">%link</div>', __('Next post', TS_DOMAIN));
			?>
			</div>
			<?php endif; ?>
    		
    	</div><!-- end content -->
    
    	<?php get_sidebar(); ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>