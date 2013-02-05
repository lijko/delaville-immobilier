<?php
/**
 * 
 * Configuration file
 * 
 * @author Ralf Albert
 * @package WordPress
 * @subpackage ThemeShift Options
 * @version 0.0.4
 */

/**
 * Path vars
 * Do not edit!
 */
// ----- Do not edit thinks between this lines -----
if( !defined( 'TSO_URL' ) )
	define( 'TSO_URL', str_replace( ABSPATH . 'wp-content', WP_CONTENT_URL, TEMPLATEPATH ) . '/' . basename( dirname( __FILE__ ) ) );

if( !defined( 'TSO_DIR' ) )
	define( 'TSO_DIR', TEMPLATEPATH . '/' . basename( dirname( __FILE__ ) ) );
// ----- untill here -----


/**
 * Default values for options
 * 
 * If this array is set, this values overwrite values in your default-options.txt
 * 
 * <ts-defaults> and <ts-defaults end> are markers!
 * ! PLEASE DO NOT REMOVE OR EDIT THIS TWO LINES !
 * 
 */

/* [ts-defaults] */
$ts_defaults = array (
  'general_default' => 'General',
  'ts_logo' => get_bloginfo('template_url').'/img/logo.png',
  'ts_styling' => 'Styling',
  'ts_home' => 'Home',
  'ts_slider_effect' => 'fade',
  'ts_slider_auto' => '5',
  'ts_properties' => 'Properties',
  'ts_property_layout' => '2-column without sidebar',
  'ts_property_elements_single' => 
  array (
    0 => 'Display favorites link',
    1 => 'Display print link',
    2 => 'Display property ID',
    3 => 'Display property type',
    4 => 'Display loaction',
    5 => 'Display price button',
    6 => 'Display date',
  ),
  'ts_standard_feature_1' => 
  array (
    0 => 'Plot Size',
    1 => 'm2',
  ),
  'ts_standard_feature_2' => 
  array (
    0 => 'Living Area',
    1 => 'm2',
  ),
  'ts_standard_feature_3' => 
  array (
    0 => 'Terrace',
    1 => 'm2',
  ),
  'ts_standard_feature_4' => 
  array (
    0 => 'Parking',
    1 => '',
  ),
  'ts_standard_feature_5' => 
  array (
    0 => 'Heating',
    1 => '',
  ),
  'ts_standard_feature_6' => 
  array (
    0 => 'Built in',
    1 => '',
  ),
  'ts_prefix' => 'PROP-',
  'ts_measurement_unit' => 'm2',
  'ts_currency' => 'EUR',
  'ts_rental_period_1' => 'per Month',
  'ts_rental_period_2' => 'per Week',
  'ts_rental_period_3' => 'per Year',
  'ts_archive' => 'Archive',
  'ts_archive_layout' => '3-column with sidebar',
  'ts_archive_meta' => 
  array (
    0 => 'Display post date',
    1 => 'Display category',
  ),
  'ts_social' => 'Social',
  'ts_header_top' => 'Need expert advice? <strong>Call us now - 555 555 555</strong>',
  'ts_social_1' => 'rss',
  'ts_social_1_url' => get_bloginfo('rss2_url'),
  'ts_footer' => 'Footer',
  'ts_footer_left' => '&copy; Copyright 2011',
  'ts_footer_right' => 'Real Estate WordPress Theme by <a href="http://themeshift.com" title="Professional WordPress Themes">ThemeShift</a>',
  'ts_import_export' => 'Import / Export',
  'ts_branding' => 'Branding',
);
/* [ts-defaults end] */

/* ----- class configuration ----- */

/**
 * Turns developer mode on or off
 */
if( !defined( 'TSO_DEV_MODE' ) )
	define( 'TSO_DEV_MODE', false );
	
/**
 * Filename for exportfile (without trailing slash and path)
 */
if( !defined( 'TSO_EXPORT_FILENAME' ) )
	define( 'TSO_EXPORT_FILENAME', 'themeshift-options_' . date("d-m-Y") . '.txt' );

/**
 * Filename for default options and settings (without trailing slash)
 */
if( !defined( 'TSO_DEFAULT_OPTIONS_FILENAME' ) )
	define( 'TSO_DEFAULT_OPTIONS_FILENAME', TSO_DIR.'/default-options.txt' );

/**
 * Filter for backward compatibility with old versions of OptionTree
 */
if( !defined( 'ACTIVATE_OLD_OPTION_NAME_FILTERING' ) )
{
	// if this is set to true, you have to define the old option name
	define( 'ACTIVATE_OLD_OPTION_NAME_FILTERING', true );
	define( 'OLD_OPTION_NAME', 'ts_options' );
}

/* --------------------------------------------------------------------- */

/* edit things below this line only if you exactly know what you do!!    */

/* --------------------------------------------------------------------- */

/**
 * Fieldnames in option table
 */
if( !defined( 'TSO_OPTION_NAME' ) )
	define( 'TSO_OPTION_NAME', 'themeshift' );

// suffixes for TSO_OPTION_TABLE
if( !defined( 'TSO_OPTION_FRONTEND' ) )
	define( 'TSO_OPTION_FRONTEND', TSO_OPTION_NAME . '_options' );

if( !defined( 'TSO_OPTION_VERSION' ) )
	define( 'TSO_OPTION_VERSION', TSO_OPTION_NAME . '_version' );
