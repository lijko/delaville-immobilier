<?php get_header(); ?>

<div id="main-wrap">

	<div id="main" class="clearfix">
	
		<?php $ts_archive_layout = ts_get_option('ts_archive_layout'); ?>
		
		<?php if($ts_archive_layout == '1-column with sidebar' || $ts_archive_layout == '3-column with sidebar') : ?>
		<div id="content">
		<?php endif; ?>
		
			<?php global $post; if(is_archive() && have_posts()) :
    
			if (is_category()) : ?>
			<h1 class="section-title"><?php single_cat_title(); ?> <?php if(category_description()) : ?><small>&larr; <?php echo term_description(); ?></small><?php endif; ?></h1>
			<?php elseif( is_tag() ) : ?>
			<h1 class="section-title"><?php single_tag_title(); ?></h1>
			<?php elseif( is_author() ) : $curauth = $wp_query->get_queried_object(); ?>
			<h1 class="section-title"><?php echo $curauth->display_name; ?></h1>
			<?php elseif (is_day()) : ?>
			<h1 class="section-title"><?php _e('Archive',TS_DOMAIN); ?> <?php the_time(get_option('date_format')); ?></h1>
			<?php elseif (is_month()) : ?>
			<h1 class="section-title"><?php _e('Archive',TS_DOMAIN); ?> <?php the_time('F Y'); ?></h1>
			<?php elseif (is_year()) : ?>
			<h1 class="section-title"><?php _e('Archive',TS_DOMAIN); ?> <?php the_time('Y'); ?></h1>
			<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
			<h1 class="section-title"><?php _e('Archive',TS_DOMAIN); ?></h1>
			<?php endif; ?>
			    
			<?php endif; ?>
			
			<?php $i=0; if(have_posts()) : ?>
			
			<div class="box-wrap clearfix">
			
				<?php while (have_posts()) : the_post(); ?>
			
				<?php
				    if($ts_archive_layout == '1-column without sidebar') :
				    	$post_class = 'ts-box box-1 clear';
				    	$ts_thumb = 'dcr-large';
				    elseif($ts_archive_layout == '1-column with sidebar') :
				    	$post_class = 'ts-box box-3 clear';
				    	$ts_thumb = 'dcr-medium';
				    elseif($ts_archive_layout == '2-column without sidebar') :
				    	$clear = ($i%2==0) ? ' clear' : '';
				    	$post_class = 'ts-box box-2'.$clear;
				    	$ts_thumb = 'dcr-half';
				    elseif($ts_archive_layout == '3-column with sidebar') :
				    	$clear = ($i%3==0) ? ' clear' : '';
				    	$post_class = 'ts-box box-4'.$clear;
				    	$ts_thumb = 'post-thumbnail';
				    else :
				    	$clear = ($i%4==0) ? ' clear' : '';
				    	$post_class = 'ts-box box-4'.$clear;
				    	$ts_thumb = 'post-thumbnail';
				    endif;
				?>
				
				<div <?php post_class($post_class); ?>>
				
				    <?php if(has_post_thumbnail()) : ?>    	    
				    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail($ts_thumb, array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?></a>
				    <?php endif; ?>
				
				    <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				    
				    <?php $ts_archive_meta = ts_get_option('ts_archive_meta'); if($ts_archive_meta) : ?>
				    <p class="meta"><?php if($ts_archive_meta[0]) the_time(get_option('date_format')); ?><?php if($ts_archive_meta[1]) : ?> <?php _e('in', TS_DOMAIN); ?> <?php the_category(', '); endif; ?><?php if($ts_archive_meta[2]) : ?> <?php _e('by', TS_DOMAIN); ?> <?php the_author_posts_link(); endif; ?><?php if($ts_archive_meta[3]) : ?> - <?php comments_popup_link(__('Leave a reply',TS_DOMAIN), __('1 Comment',TS_DOMAIN), __('% Comments',TS_DOMAIN),'',__('Comments off',TS_DOMAIN)); endif; ?></p>
				    <?php endif; ?>
				    
				    <?php the_content('',TRUE); ?>
		
					<?php the_more(); ?>
				
				</div><!-- end post -->
				
				<?php $i++; endwhile; ?>
			
			</div>
			
			<?php include( TS_INC . '/paging.php'); ?>
    			
			<?php endif; // have_posts() ?>
		 
		<?php if($ts_archive_layout == '1-column with sidebar' || $ts_archive_layout == '3-column with sidebar') : ?>
		   
		</div><!-- end content -->
		
		<?php get_sidebar(); ?>
		
		<?php endif; // $ts_archive_layout ?>
	
	</div><!-- end main -->

</div><!-- end main-wrap -->
	
<?php get_footer(); ?>