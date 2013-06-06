<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' &raquo; ',true,'right'); ?><?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php if(ts_get_option('ts_rss')) : echo ts_get_option('ts_rss'); else : bloginfo('rss2_url'); endif; ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php do_action('ts_before_top_wrap'); ?>

	<div id="top-wrap">
	
		<div id="top">
		
			<div class="box-wrap clearfix">
		
				<?php if(ts_get_option('ts_header_top')) : ?>
				<div id="top-left" class="ts-box box-2">				
					<?php echo ts_get_option('ts_header_top'); ?>
				</div>
				<?php endif; ?>
				
				<?php echo apply_filters('ts_social', ts_social()); ?>
			
			</div>
		
		</div><!-- end top -->
	
	</div><!-- end top-wrap -->
	
	<?php do_action('ts_after_top_wrap'); ?>

	<div id="wrap">
	
		<?php do_action('ts_before_header'); ?>
	
		<div id="header-wrap">
		
			<div id="header" class="clearfix">
			
				<div id="logo">
				
					<?php $ts_logo = ts_get_option('ts_logo'); ?>
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $ts_logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>
					<?php if(get_bloginfo('description')) : ?><div id="logo-description"><?php bloginfo('description'); ?></div><?php endif; ?>
				
				</div>
				
				<?php if(function_exists('wp_nav_menu') && has_nav_menu('menu-1')) : wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'ts-menu', 'menu_class' => 'sf-menu', 'theme_location' => 'menu-1' ) ); else : ts_menu(); endif; ?>
			
			</div><!-- end header -->
		
		</div><!-- end header-wrap -->
		
		<?php do_action('ts_after_header'); ?>