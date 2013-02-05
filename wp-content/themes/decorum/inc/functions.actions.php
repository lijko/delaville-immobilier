<?php

/**
 * Available action hooks
 *
 * All action are currenlty deactivated. To activate them
 * just remove the // before add_action() and change the
 * content to your needs.
 *
 */
 
/**
 * General layout
 *
 * => Add content before top wrap
 * => Add content after top wrap
 * => Add content before header
 * => Add content after header
 * => Add content before footer
 * => Add content after footer
 * => Add content after wrap
 * => Add content after all
 *
 */
 
/**
 * Add content before top wrap
 */

// add_action('ts_before_top_wrap', 'my_before_top_wrap');

function my_before_top_wrap() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after top wrap
 */

// add_action('ts_after_top_wrap', 'my_after_top_wrap');

function my_after_top_wrap() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content before header
 */

// add_action('ts_before_header', 'my_before_header');

function my_before_header() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after header
 */

// add_action('ts_after_header', 'my_after_header');

function my_after_header() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content before footer
 */

// add_action('ts_before_footer', 'my_before_footer');

function my_before_footer() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after footer
 */

// add_action('ts_after_footer', 'my_after_footer');

function my_after_footer() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after wrap
 */

// add_action('ts_after_wrap', 'my_after_wrap');

function my_after_wrap() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after all
 */

// add_action('ts_after_all', 'my_after_all');

function my_after_all() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Single properties
 *
 * => Add content after title (single sale)
 * => Add content after image (single sale)
 * => Add content before description (single sale)
 * => Add content after description (single sale)
 * => Add content after title (single rent)
 * => Add content after image (single rent)
 * => Add content before description (single rent)
 * => Add content after description (single rent)
 *
 */

/**
 * Add content after title (single sale)
 */

// add_action('ts_single_sale_after_title', 'my_single_sale_after_title');

function my_single_sale_after_title() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after image (single sale)
 */

// add_action('ts_single_sale_after_image', 'my_single_sale_after_image');

function my_single_sale_after_image() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content before description (single sale)
 */

// add_action('ts_single_sale_before_description', 'my_single_sale_before_description');

function my_single_sale_before_description() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after description (single sale)
 */

// add_action('ts_single_sale_after_description', 'my_single_sale_after_description');

function my_single_sale_after_description() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after title (single rent)
 */

// add_action('ts_single_rent_after_title', 'my_single_rent_after_title');

function my_single_rent_after_title() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after image (single rent)
 */

// add_action('ts_single_rent_after_image', 'my_single_rent_after_image');

function my_single_rent_after_image() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content before description (single rent)
 */

// add_action('ts_single_rent_before_description', 'my_single_rent_before_description');

function my_single_rent_before_description() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after description (single rent)
 */

// add_action('ts_single_rent_after_description', 'my_single_rent_after_description');

function my_single_rent_after_description() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Single posts
 *
 * => Add content before sidebar
 * => Add content after sidebar
 * => Add content before sidebar (properties)
 * => Add content after sidebar (properties)
 *
 */
 
/**
 * Add content after title (single post)
 */

// add_action('ts_single_after_title', 'my_single_after_title');

function my_single_after_title() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content after image (single post)
 */

// add_action('ts_single_after_image', 'my_single_after_image');

function my_single_after_image() {

	$my_content = '<div style="text-align:center;color:red">My custom content</div>';
	
	echo $my_content;

}

/**
 * Add content before description (single post)
 */

// add_action('ts_single_before_content', 'my_single_before_content');

function my_single_before_content() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after description (single post)
 */

// add_action('ts_single_after_content', 'my_single_after_content');

function my_single_after_content() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Sidebar
 *
 * => Add content before sidebar
 * => Add content after sidebar
 * => Add content before sidebar (properties)
 * => Add content after sidebar (properties)
 *
 */

/**
 * Add content before sidebar
 */

// add_action('ts_before_sidebar', 'my_before_sidebar');

function my_before_sidebar() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after sidebar
 */

// add_action('ts_after_sidebar', 'my_after_sidebar');

function my_after_sidebar() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content before sidebar (properties)
 */

// add_action('ts_properties_before_sidebar', 'my_properties_before_sidebar');

function my_properties_before_sidebar() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

/**
 * Add content after sidebar (properties)
 */

// add_action('ts_properties_after_sidebar', 'my_properties_after_sidebar');

function my_properties_after_sidebar() {

	$my_content = '<p style="color:red">My custom content</p>';
	
	echo $my_content;

}

?>