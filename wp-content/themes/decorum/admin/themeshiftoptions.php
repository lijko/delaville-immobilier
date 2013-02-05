<?php
/*
Plugin Name: ThemeShift Options
Plugin URI: http://themeshift.com
Description: Customizable WordPress Theme Options Admin Interface
Version: 1.0.1
Author: Derek Herman, Ralf Albert
Author URI: http://yoda.neun12.de
*/

/**
 * Load configuration
 *
 * @since 0.1.0
 */
require_once 'ts-config.php';

/**
 * Load the core class (God is in the house)
 * and create a instance of it
 * 
 * @since 0.1.0
 */
require_once TSO_DIR.'/classes/class-core.php';

$tso = new TSO_Core();