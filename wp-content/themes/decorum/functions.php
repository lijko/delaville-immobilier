<?php

/*	##################################
	SETTINGS
	################################## */

define('TS_THEME', 'deCorum');
define('TS_DOMAIN', 'decorum');
define('TS_SHORT', 'dcr');
define('TS_VERSION', '0.9');
define('TS_URL', home_url());
define('TS_IMG', get_bloginfo('template_url').'/img');
define('TS_ADMIN', get_bloginfo('template_url') .'/lib/admin');
define('TS_SCRIPTS', get_bloginfo('template_url') .'/lib/scripts');


/*	##################################
	THEME OPTIONS
	################################## */

require_once( TEMPLATEPATH . '/admin/themeshiftoptions.php');


/*	##################################
	INIT LOCALIZATION
	################################## */

load_theme_textdomain(TS_DOMAIN, TEMPLATEPATH . '/lang');


/*	##################################
	REQUIRE
	################################## */

define('TS_INC', TEMPLATEPATH .'/inc');

require_once( TS_INC .'/functions.post-type.php');
require_once( TS_INC .'/functions.properties.php');
require_once( TS_INC .'/functions.shortcodes.php');
require_once( TS_INC .'/functions.meta-box.php');
require_once( TS_INC .'/functions.widgets.php');
require_once( TS_INC .'/functions.strings.php');
require_once( TS_INC .'/functions.helper.php');
require_once( TS_INC .'/functions.filters.php');
require_once( TS_INC .'/functions.actions.php');


/*	##################################
	IMAGE SIZES
	################################## */

if (function_exists('add_theme_support')) {

	add_theme_support('post-thumbnails');
	
	set_post_thumbnail_size(215, 100, true);
	
	add_image_size('dcr-half', 450, 200, true);
	add_image_size('dcr-medium', 685, 310, true);
	add_image_size('dcr-large', 920, 420, true);
	
}

?>