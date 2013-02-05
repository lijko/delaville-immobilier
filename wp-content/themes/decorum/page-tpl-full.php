<?php /*
Template Name: Full Width
*/ ?>

<?php get_header(); ?>

<div id="main-wrap">

	<div id="main" class="clearfix">
	
		<div id="content-wrap" class="clearfix">
		
			<?php $i=0; if(have_posts()) : while (have_posts()) : the_post(); ?>
			    
			<div <?php post_class(); ?>>
			
				<h1 class="section-title"><?php the_title(); ?></h1>
			
			    <?php if(has_post_thumbnail()) the_post_thumbnail('dcr-large', array('alt' => ''.get_the_title().'', 'title' => ''.get_the_title().'')); ?>
			    
			    <?php the_content(); ?>
			    
			    <?php // edit_post_link(__('Edit Page',TS_DOMAIN), '<p class="clear">', '</p>'); ?>
			
			</div><!-- end post -->
			
			<?php include( TS_INC . '/gallery.php'); ?>
			
			<?php $i++; endwhile; endif; ?>
		
		</div><!-- end content-wrap -->
	
	</div><!-- end main -->

</div><!-- end main-wrap -->

<?php
	$ts_comments = ts_get_option('ts_comments');
	if($ts_comments[1]) comments_template('', true);
?>
	
<?php get_footer(); ?>