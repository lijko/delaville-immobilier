<?php /*
Template Name: Contact Form
*/ ?>

<?php get_header(); ?>

<div id="main">
			
    <div id="content-wrap" class="clearfix">
    
    	<div id="content">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<div <?php post_class('ts-box box-3'); ?>>
				
				<h1 class="section-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
				<?php include( TS_INC . '/contact-form.php'); ?>
			
			</div><!-- end page -->
				
			<?php endwhile; endif; ?>
    		
    	</div><!-- end content -->
    
    	<?php get_sidebar(); ?>
    
    </div><!-- end content-wrap -->

</div><!-- end main -->

<?php get_footer(); ?>