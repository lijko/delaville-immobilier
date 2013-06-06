<?php 

/**
 * Theme header
 */
	
add_action('wp_enqueue_scripts', 'ts_scripts');

function ts_scripts() {

	wp_enqueue_script('jquery');	
	wp_enqueue_script('scripts', TS_SCRIPTS . '/scripts.js', array('jquery'), '0.9', true);	
	wp_enqueue_script('pretty', TS_SCRIPTS . '/pretty/js/jquery.prettyPhoto.js', array('jquery'), '3.1.2', true);
	wp_enqueue_style('pretty', TS_SCRIPTS . '/pretty/css/prettyPhoto.css', false, '3.1.2', 'all' );	
	wp_enqueue_script('gmaps', 'http://maps.google.com/maps/api/js?sensor=false', '', '3.0', false);	
	if (is_singular()) wp_enqueue_script('comment-reply');	
	if (is_singular()) wp_enqueue_style('print', TS_ADMIN . '/print.css', false, '0.9', 'print' );
	
}

add_filter('the_generator', 'ts_theme_generator');

function ts_theme_generator($generator) {
	$generator .= "\r\n" . '<meta name="generator" content="'.TS_THEME.' '.TS_VERSION.'" />';
	return $generator;
}


/**
 * Theme footer
 */

add_action('wp_footer','ts_theme_footer');

function ts_theme_footer() {
	echo "\n".stripslashes(ts_get_option('ts_tracking'))."\n";
}


/**
 * Custom menus
 */

add_theme_support('menus');

if (function_exists('register_nav_menu')) {
	register_nav_menu('menu-1', __('Main Menu', TS_DOMAIN));
}

// add home link to main menu
add_filter( 'wp_nav_menu_items', 'ts_nav_menu_items', 10, 2 );

function ts_nav_menu_items($items,$args) {
	$ts_current = (is_front_page()) ? 'current-menu-item ' : '';
	if( $args->theme_location == 'menu-1' ) {
		$home_url = apply_filters('ts_menu_home_url', home_url( '/' ));
		$ts_home = '<li class="' . $ts_current . 'menu-item-home"><a href="' . $home_url . '">' . __('Home', TS_DOMAIN) . '</a></li>';
		$items = apply_filters('ts_menu_home', $ts_home) . $items;
	}
	return $items;
}


/**
 * Custom theme background
 */

add_custom_background();


/**
 * Custom excerpt and more link
 */

function ts_excerpt_more($more) {
	global $post;
	$ts_more = '<a href="'. get_permalink($post->ID) . '" class="btn">'. apply_filters('ts_more_text', __('More info', TS_DOMAIN)) .'</a>';
	return apply_filters('ts_more', $ts_more);
}

add_filter('excerpt_more', 'ts_excerpt_more');

function ts_the_excerpt($length = 55, $post_id = '', $more = ''){

	global $post, $more;

	if(!empty($post_id)) {
	    $post = get_post($post_id);
	    $more = false;
	}
	
	// respect excerpt_length filter
	$excerpt_length = apply_filters('excerpt_length', $length);
	
	$ts_more = ' <a href="'. get_permalink($post->ID) . '">['. apply_filters('ts_more_text', __('More info', TS_DOMAIN)) .'&hellip;]</a>';
	
	// when excerpt comes with custom more, set it
	// else use the default excerpt more
	$excerpt_more = (!empty($more)) ? $more : apply_filters('excerpt_more', $ts_more);

	if (strpos($post->post_content, '<!--more-->')) {
	
		$output = get_the_content('', true);
		
	} else {
		
		if(!empty($post->post_excerpt)) {	
		
			$output = $post->post_excerpt;
			
		} else {
		
			$content = strip_tags($post->post_content);	
			preg_match('/^\s*+(?:\S++\s*+){1,' . $excerpt_length . '}/', $content, $matches);	  
			$output = $matches[0];
			
		}
		
	}
	
	$output = strip_shortcodes($output).'...';
	$output = wpautop($output).wpautop($excerpt_more);
	
	echo $output;
}


/**
 * Body classes
 */

add_filter('body_class','ts_body_classes');
	
function ts_body_classes($classes) {
	global $post;
	$ts_archive = ts_get_option('ts_archive_layout') ? ts_get_option('ts_archive_layout') : '3-column with sidebar';
	$ts_archive = str_replace(' ', '-', $ts_archive);
	if(is_archive() && !is_tax() && !is_search() && !is_author()) $classes[] = 'ts-'.$ts_archive;
	$ts_property_archive = ts_get_option('ts_property_layout') ? ts_get_option('ts_property_layout') : '3-column with sidebar';
	$ts_property_archive = str_replace(' ', '-', $ts_property_archive);
	if(is_tax('sales') || is_tax('rentals') || is_tax('feature') || is_tax('property-type') || is_tax('location') || is_author()) $classes[] = 'ts-'.$ts_property_archive;
	$ts_property_layout_single = ts_get_option('ts_property_layout_single');
	if((get_post_type() == 'sale' || get_post_type() == 'rent') && !$ts_property_layout_single[0]) $classes[] = 'single-property-full';
	if((get_post_type() == 'sale' || get_post_type() == 'rent') && ts_get_option('ts_property_sidebar')) $classes[] = 'ts-sidebar-left';
	if((is_singular() || is_archive()) && ts_get_option('ts_archive_sidebar')) $classes[] = 'ts-sidebar-left';
	if((is_search() || is_page_template('page-tpl-properties.php') || is_page_template('page-tpl-properties-sale.php') || is_page_template('page-tpl-properties-rent.php')) && ts_get_option('ts_property_sidebar')) $classes[] = 'ts-sidebar-left';
	$ts_sidebar_home = ts_get_option('ts_home_sidebar');
	if(is_front_page() && $ts_sidebar_home[1]) $classes[] = 'ts-sidebar-left';
	if(is_front_page() && ts_get_option('ts_slider_size') && ts_get_option('ts_home_sidebar')) $classes[] = 'ts-home-small';
    return $classes;
}


/**
 * Post classes
 */

add_filter('post_class','ts_post_class');

function ts_post_class($classes) {
	if(is_singular()) $classes[] = 'clearfix';
	return $classes;
}


/**
 * WP head
 */

add_action('wp_head','ts_theme_head');

function ts_theme_head() { ?>

<?php if(ts_get_option('ts_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo ts_get_option('ts_favicon'); ?>" />
<?php endif; ?>
<?php if(ts_get_option('ts_css')) : ?>
<style type="text/css" media="screen">
<?php echo stripslashes(ts_get_option('ts_css')); ?>

</style><?php echo "\n"; endif; ?>
<?php if(ts_get_option('ts_styling_activate')) :
$ts_bg_color = ts_get_option('ts_bg_color');
$ts_bg_img = (ts_get_option('ts_bg_img')) ? ' url('.ts_get_option('ts_bg_img').')' : '';
$ts_bg_img_no = (!ts_get_option('ts_bg_img') && ts_get_option('ts_bg_color')) ? 'background-image:none;' : '';
$ts_bg_img_repeat = (ts_get_option('ts_bg_img')) ? ' '.ts_get_option('ts_bg_img_repeat') : '';
$ts_bg_img_pos = (ts_get_option('ts_bg_img')) ? ' '.ts_get_option('ts_bg_img_pos') : '';
$ts_bg_img_fixed = (ts_get_option('ts_bg_img_fixed')) ? ' fixed' : '';
$ts_menu_color = ts_get_option('ts_menu_color');
$ts_btn_color = ts_get_option('ts_btn_color');
$ts_link_color = ts_get_option('ts_link_color');
$ts_link_color_hover = ts_get_option('ts_link_color_hover');
?>
<style type="text/css" media="screen">
<?php if($ts_bg_color || $ts_bg_img) echo 'body { background: '.$ts_bg_color.$ts_bg_img.$ts_bg_img_fixed.$ts_bg_img_repeat.$ts_bg_img_pos.';'.$ts_bg_img_no.' }'; ?>
<?php if($ts_menu_color) echo '.ts-menu { width:980px; background-color: '.$ts_menu_color.'; border: none }'."\n"; ?>
<?php if($ts_btn_color) echo '.btn, .btn-big, .slides-prev:hover, span.favorites-remove:hover, .slides-next:hover, a#totop:hover, .wpcf7-submit, .mu_register input[type="submit"] { background-color: '.$ts_btn_color.'; }'."\n"; ?>
<?php if($ts_link_color) echo 'a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .comments-title h3 a, #the404, .ts-paging a:hover { color: '.$ts_link_color.'; }'."\n"; ?>
<?php if($ts_link_color_hover) echo 'a:hover, h1 a:hover, h2 a:hover, .hentry h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .section-title a:hover, .comments-title h3 a:hover { color: '.$ts_link_color_hover.'; }'."\n"; ?>
</style><?php echo "\n\n"; endif; // endif ts_styling_activate ?>
<!--[if IE]>
<link href="<?php bloginfo('template_url'); ?>/lib/admin/ie.css" rel="stylesheet" type="text/css">
<![endif]-->

<?php }


/**
 * Social icons
 */
 
function ts_social() {
	
	$ts_social = array();
	for ($i=1; $i<=6; $i++) {
		if(ts_get_option('ts_social_'.$i)) {
	    	$ts_social[ts_get_option('ts_social_'.$i)]['icon'] = ts_get_option('ts_social_'.$i);
	    	$ts_social[ts_get_option('ts_social_'.$i)]['url'] = ts_get_option('ts_social_'.$i.'_url');
	    }
	}
	$ts_social = apply_filters('ts_social_icons', $ts_social);
	
	if(!array_empty($ts_social)) {
	
		$ts_social_icons = '<div id="top-right" class="ts-box box-2"><div id="ts-social">';
		
		foreach($ts_social as $ts_icon) {
			if($ts_icon['icon'] && $ts_icon['url']) {
				$ts_social_icons .= '<a href="'.$ts_icon['url'].'"><img src="'.TS_IMG.'/icons/social/'.$ts_icon['icon'].'.png" class="social-link" alt="" /></a>';
			}
		}
		
		$ts_social_icons .= '</div></div>';
		
		return $ts_social_icons;
	}

}


/**
 * Custom search form
 */

function ts_search_form( $form ) {
    
    $form = '
    <form class="searchform clearfix" method="get" action="' . home_url( '/' ) . '">
    	<input type="text" name="s" class="text search-text required" value="'.get_search_query().'" />
    	<input type="submit" class="btn submit search-submit" value="'.__('Ok', TS_DOMAIN).'" />
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'ts_search_form' );


/**
 * WPMU signup page
 */

add_action('before_signup_form', 'ts_before_signup');
function ts_before_signup() {
	echo '<div id="main"><div id="content-wrap" class="clearfix">';
}

add_action('after_signup_form', 'ts_after_signup');
function ts_after_signup() {
	get_sidebar();
	echo '</div></div>';
}


/**
 * Menu fallback
 */
	
function ts_menu() {
	$ts_menu = '<div class="ts-menu"><ul class="sf-menu">';
	$ts_menu .= '<li class="current-menu-item"><a href="'.TS_URL.'/wp-admin/nav-menus.php">'.__('Create a custom menu', TS_DOMAIN).'</a></li>';
	$ts_menu .= '</ul></div>';
	echo $ts_menu;	
}

// Add theme options to admin bar

add_action('admin_bar_menu', 'theme_options_link', 1000);

function theme_options_link() {
	global $wp_admin_bar, $wpdb;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$args = array(
		'parent'=> 'appearance',
		'title' => __( 'Theme Options', TS_DOMAIN ),
		'href' 	=> get_bloginfo('url').'/wp-admin/admin.php?page=tso_options'
	);
	$wp_admin_bar->add_menu($args);
}


/**
 * Admin head
 */

add_action('admin_head', 'custom_colors');

function custom_colors() {
   echo '<style type="text/css">
           .post-option-value select { min-width: 25% }
         </style>';
}


/**
 * Remove stuff
 */

// #more from more-link
add_filter('the_content', 'ts_less');
function ts_less($content) {
	global $id;
	return str_replace('#more-'.$id.'"', '"', $content);
}

// default css for wp-pagenavi
add_action( 'wp_print_styles', 'ts_deregister_styles', 100 );
function ts_deregister_styles() {
	wp_deregister_style('wp-pagenavi');
	wp_deregister_style('contact-form-7');
}

// recent comments widget inline CSS
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}

// p tags from category description
remove_filter('term_description','wpautop');


/**
 * Paging
 */
	
// based on http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin

function ts_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}


/**
 * Custom more link
 */

function the_more() {
	global $post;
	if (strpos($post->post_content, '<!--more-->')) :
		$the_more = '<p class="the-more"><a href="'.get_permalink().'" class="btn" title="'.get_the_title().'">';
		$the_more .= apply_filters('ts_more', __('More info', TS_DOMAIN));
		$the_more .= '</a></p>';
		echo $the_more;
	endif;
}


/**
 * Custom comment format
 */

function ts_comments($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>

	<li <?php comment_class(); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="comment-inner clearfix">
			
			<?php echo get_avatar($comment,80); ?>
			
			<div class="comment-text">
			
				<p class="comment-meta"><span class="comment-author"><?php printf(__('%s'), get_comment_author_link()) ?></span> - <?php printf(__('%1$s'), get_comment_date()); ?> <?php if(get_option('thread_comments')) : ?><span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply',TS_DOMAIN), 'depth' => $depth, 'max_depth' => $args['max_depth'], 'login_text' => __('Login to reply',TS_DOMAIN)))) ?></span><?php endif; ?></p>
				
        		<?php if ($comment->comment_approved == '0') : ?>
				<div class="ts-info info-icon" style="margin:10px 0"><span class="icon-info"></span><?php _e('Your comment is awaiting moderation.',TS_DOMAIN) ?></div>
				<?php endif; ?>
				
        		<?php comment_text() ?>
        	
        	</div>
			
       </div><!-- end comment -->

<?php }

function ts_pings($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php

}


/**
 * Function: is page template active
 */

// helper to check if page template is active

function is_pagetemplate_active($pagetemplate = '') {
    global $wpdb;
    $sql = "select meta_key from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
    $result = $wpdb->query($sql);
    if ($result) {
        return TRUE;
    } else {
        return FALSE;
    }
}


/**
 * Function: get page template link
 */

function get_pagetemplate_permalink($pagetemplate = '') {
    global $wpdb;
    $sql = "select post_id from $wpdb->postmeta where meta_key like '_wp_page_template' and meta_value like '" . $pagetemplate . "'";
    $rows = $wpdb->get_results($sql);

    if ($rows) {
        return get_permalink($rows[0]->post_id);
    }
}


/**
 * Function: check multi-dimensional array
 */

function array_empty($mixed) {
    if (is_array($mixed)) {
        foreach ($mixed as $value) {
            if (!array_empty($value)) {
                return false;
            }
        }
    }
    elseif (!empty($mixed)) {
        return false;
    }
    return true;
}

function in_multiarray($elem, $array)
{
    // if the $array is an array or is an object
     if( is_array( $array ) || is_object( $array ) )
     {
         // if $elem is in $array object
         if( is_object( $array ) )
         {
             $temp_array = get_object_vars( $array );
             if( in_array( $elem, $temp_array ) )
                 return TRUE;
         }
       
         // if $elem is in $array return true
         if( is_array( $array ) && in_array( $elem, $array ) )
             return TRUE;
           
       
         // if $elem isn't in $array, then check foreach element
         foreach( $array as $array_element )
         {
             // if $array_element is an array or is an object call the in_multiarray function to this element
             // if in_multiarray returns TRUE, than the element is in array, else check next element
             if( ( is_array( $array_element ) || is_object( $array_element ) ) && in_multiarray( $elem, $array_element ) )
             {
                 return TRUE;
                 exit;
             }
         }
     }
   
     // if isn't in array return FALSE
     return FALSE;
}

?>