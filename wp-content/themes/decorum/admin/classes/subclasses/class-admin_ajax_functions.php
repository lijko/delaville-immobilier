<?php
/**
 * ThemeShift-Options Admin_Ajax_Functions
 * Functions called via ajax
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.0.1
 * @author Ralf Albert
 */

class Admin_Ajax_Functions extends TSO_Core
{	
	public $config_file = '';
	
	/**
	 * 
	 * Constructor
	 * Exists only to prevent automatically call the parent constructor
	 */
	public function __construct()
	{
		$this->config_file = TSO_DIR.'/ts-config.php';
	}
	
	/**
	 * Save Theme Option via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 * @uses _set_post_lock()
	 * @uses get_option_page_ID()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _array_save() 
	{
		global $ts_defaults;
			
		// Check AJAX Referer
		check_ajax_referer( '_theme_options', '_ajax_nonce' );

		// get fresh items
		$items = get_option( self::OPTION_ITEMS );

		// set option values
		foreach ( $items as $value ) 
		{
			$key = trim( $value->item_id );
			if ( isset( $_REQUEST[$key] ) )
			{ 
				$val = $_REQUEST[$key];
				
				// check if the option-setting is empty and replace it with the default value
				if( empty( $val ) && isset( $ts_defaults[$key] ) )
					$val = str_replace( '\\', '/', $ts_defaults[$key] );
					
				$new_settings[$key] = $val;
			}
		}
			
		// Update Theme Options
		update_option( self::OPTION_FRONTEND, $new_settings );
		$this->_set_post_lock( $this->_get_option_page_ID( 'media' ) );
		
		$json = json_encode( get_option( self::OPTION_FRONTEND ) );
		
		exit($json);
	}

	/**
	 * Reset Theme Option via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _array_reset() 
	{
		global $ts_defaults;
		
		// Check AJAX Referer
		check_ajax_referer( '_theme_options', '_ajax_nonce' );

		// reset all items to an empty setting
		$this->_clear_settings();

		// reset default settings
		if( !empty( $ts_defaults ) && is_array( $ts_defaults ) )
		{

			$this->_fill_settings( $ts_defaults );
		}
						
		$json = json_encode( get_option( self::OPTION_FRONTEND ) );
		
		exit($json);
	}

	/**
	 * Insert Row into Option Setting Table via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 * @uses _confirmation()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _add()
	{
		$updated = false;
		
		// check AJAX referer
		check_ajax_referer( 'inlineeditnonce', '_ajax_nonce' );

		// grab fresh options array
		$items = get_option( self::OPTION_ITEMS );

		// be sure the item_sort is not lesser than the highest id
		$max_id = $this->_get_max_id();
		// get form data
		$new_item = new stdClass();
		$new_item->id = $_POST['id'];
		$new_item->item_id       = htmlspecialchars(stripslashes(trim($_POST['item_id'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_title    = htmlspecialchars(stripslashes(trim($_POST['item_title'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_desc     = htmlspecialchars(stripslashes(trim($_POST['item_desc'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_type     = htmlspecialchars(stripslashes(trim($_POST['item_type'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_options  = htmlspecialchars(stripslashes(trim($_POST['item_options'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_sort	 = $max_id+1;
  	
		// validate item key
		foreach( $items as $old_item ) 
		{
			if ( $new_item->item_id == $old_item->item_id ) 
			{
				die( "That option key is already in use." );
			}
		}
		  	
		// verify key is alphanumeric
		if ( eregi( '[^a-z0-9_]', $new_item->item_id ) ) 
			die("You must enter a valid option key.");
		  	
		// verify title
		if (strlen($new_item->item_title) < 1 ) 
			die("You must give your option a title.");
		    
		if ( $new_item->item_type == 'textarea' && !is_numeric( $new_item->item_options ) )
			die("The row value must be numeric.");
				
		$items[] = $new_item;
		
		$updated = update_option( self::OPTION_ITEMS, $items );
		// update message
		$this->_confirmation( $updated, 'updated' );
	}

	/**
	 * Update Option Setting Table via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 * @uses _confirmation()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _edit()
	{
		$updated = false;
		
		// Check AJAX Referer
		check_ajax_referer( 'inlineeditnonce', '_ajax_nonce' );
		
		// grab fresh options array
		$items = get_option( self::OPTION_ITEMS );
    
		// get form data
		$new_item = new stdClass();
		$new_item->id = $_POST['id'];
		$new_item->item_id       = htmlspecialchars(stripslashes(trim($_POST['item_id'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_title    = htmlspecialchars(stripslashes(trim($_POST['item_title'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_desc     = htmlspecialchars(stripslashes(trim($_POST['item_desc'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_type     = htmlspecialchars(stripslashes(trim($_POST['item_type'])), ENT_QUOTES,'UTF-8',true);
		$new_item->item_options  = htmlspecialchars(stripslashes(trim($_POST['item_options'])), ENT_QUOTES,'UTF-8',true);
		$new_item_as_array = (array) $new_item;
  	
		// validate item key
		foreach($items as $value) 
		{
			if( $value->item_sort == $new_item->id ) 
			{
				if( $new_item->item_id == $value->item_id && $new_item->id != $value->item_sort ) 
				{
					die("That option key is already in use.");
				}
			} 
			elseif( $new_item->item_id == $value->item_id && $new_item->id != $value->id ) 
			{
				die("That option key is already in use.");
			}
		}
  	
		// verify key is alphanumeric
		if( eregi( '[^a-z0-9_]', $new_item->item_id ) ) 
			die("You must enter a valid option key.");
      
		// verify title
		if( strlen( $new_item->item_title ) < 1 ) 
			die("You must give your option a title.");
    
		if( $new_item->item_type == 'textarea' && !is_numeric( $new_item->item_options ) )
			die("The row value must be numeric.");
    
		
		foreach( $items as $key => $old_item )
		{
			if( $old_item->id == $new_item->id )
			{
				$old_item_as_array = (array) $items[$key];
				$new_item = (object) array_merge( $old_item_as_array, $new_item_as_array );
				$items[$key] = $new_item;
				break;
			}
		}
		
		unset( $new_item, $new_item_as_array, $old_item, $old_item_as_array );
		
		$updated = update_option( self::OPTION_ITEMS, $items );
		
		// update message
		$this->_confirmation( $updated, 'updated' );	
	}

	/**
	 * Remove Option via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 * @uses _confirmation()
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function _delete() 
	{
		$updated = false;
		
		// check AJAX referer
		check_ajax_referer( 'inlineeditnonce', '_ajax_nonce' );
		
		// grab ID
		$id = $_REQUEST['id'];
		
		// delete item
		$items = get_option( self::OPTION_ITEMS );
		
		foreach( $items as $key => $item )
		{
			if( $id == $item->id )
			{
				unset( $items[$key] );
				break;
			}
		}
		
		$updated = update_option( self::OPTION_ITEMS, $items );

		// update message
		$this->_confirmation( $updated, 'removed' );
	}

	/**
	 * Get Option ID via AJAX
	 *
	 * @uses check_ajax_referer()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function _next_id() 
	{
		// check AJAX referer
		check_ajax_referer( 'inlineeditnonce', '_ajax_nonce' );
		
		// get ID
		$id = $this->_get_max_id();
		echo $id;
		exit();
	}

	/**
	 * Update Sort Order via AJAX
	 *
	 * @uses check_ajax_referer()
	 * @uses update_option()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _sort()
	{
		// check AJAX referer
		check_ajax_referer( 'inlineeditnonce', '_ajax_nonce' );

		// get items
		$items = get_option( self::OPTION_ITEMS );
		
		// create an array of IDs
		$fields = explode('&', $_REQUEST['id']);

		// set order
		$order = 0;
		
		// update the sort order
		foreach( $fields as $field )
		{
			$order++;
			$key = explode('=', $field);
			$id = intval(urldecode($key[1]));

			foreach( $items as $item_key => $item )
			{
				if( $id == $item->id )
				{
					$item->item_sort = $order;
					$items[$item_key] = $item;
					break;					
				}
			}
		}

		// sort items
		$temp = array();

		foreach( $items as $item ){
			$id = intval($item->item_sort);
			
			if( !key_exists( $id, $temp ) )
				$temp[$id] = $item;
		}
		
		ksort( $temp );
		
		update_option( self::OPTION_ITEMS, $temp );
		
		unset( $items, $temp );
		
		exit;
	}

	/**
	 * Insert slider
	 *
	 * @uses _slider_view()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _add_slider() 
	{
		$count = $_GET['count'] + 1;
		$id = $_GET['slide_id'];
		$image = array(
			'order' => $count,
			'title' => '',
			'image' => '',
			'link'=> '',
			'description' => ''
		);
	
		$this->_slider_view( $id, $image, $count );
		
		die();
	}
	
	/**
	 * Clear the default-array ts_defaults in config file
	 * 
	 * @since 0.3.0
	 * @access public
	 * @param bool $goback Used by _save_defaults() to avoid stopping the script. Ajax-calls will stop the script
	 */ 
	public function _clear_defaults( $goback = false )
	{
		// check if file is accesible
		$e = $this->_is_accessible( $this->config_file );
			if( 0 != $e )
				exit( "{$e}" );
		
		// search & replace with preg_replace
		// replace the content in file
		$search = '#ts-defaults\] \*\/(.*)\/\* \[ts-defaults#s';
		$replace = "ts-defaults] */".PHP_EOL."/* [ts-defaults";
		$success = $this->_replace_file_contents( $search, $replace );
				
		// cleanup
		unset( $search, $replace, $content, $replaced );
		
		if( $goback )
			return (bool) $success;
		else
		{
			! $success ? exit('5') : exit('0');
		}
	}
	
	/**
	 * Save the default-array ts_defaults to config file
	 * 
	 * @since 0.3.0
	 * @access public
	 * @uses _clear_defaults
	 */
	public function _save_defaults()
	{
		
		// check if any data was submitted with post-request
		if( isset( $_POST['defaults'] ) && ! empty( $_POST['defaults'] ) )		
			$new_defaults = stripslashes( urldecode( $_POST['defaults'] ) );
		else
			exit('6');

		// first clear old ts_default to avoid double content
		$e = $this->_clear_defaults( true );
			if( ! $e )
				exit( "{$e}" );
		
		// search & replace with preg_match
		$search = '#\*\/'.PHP_EOL.'?\/\*#s';
		$replace = "*/".PHP_EOL.$new_defaults.PHP_EOL."/*";
		$success = $this->_replace_file_contents( $search, $replace );
		
		// cleanup
		unset( $search, $replace, $content, $replaced );

		// return with error-code or ok-status
		! $success ? exit('5') : exit('0');	
	}

	/**
	 * 
	 * Read default array from config file
	 */
	public function _read_defaults()
	{
		// check if file is accesible
		$e = $this->_is_accessible( $this->config_file );
			if( 0 != $e )
				exit( "{$e}" );
		
		// get file contents
		$content = file_get_contents( $this->config_file );
				
		// search preg_match
		$search = '#ts-defaults\] \*\/(.*)\/\* \[ts-defaults#s';
		
		preg_match( $search, $content, $match );
		
		exit( trim( $match[1] ) );
	}
	
/* ----- private functions --- internal use only ! ----- */
	/**
	 * 
	 * print out the status of an action
	 * 
	 * @since 0.2.0
	 * @access private
	 * @param bool $status return status of the action
	 * @param string $string message to print out to ajax
	 */
	private function _confirmation( $status, $string )
	{
		if ( $status ) 
		{
			die( $string );
		} 
		else 
		{
			die("There was an error, please try again.");
		}
	}
	
	/**
	 * 
	 * get the highest id
	 * 
	 * @uses get_option
	 * @since 0.2.0
	 * @access private
	 */
	private function _get_max_id()
	{
		// find highest id
		$max = 0;
		$items = get_option( self::OPTION_ITEMS );
		
		foreach( $items as $item ){
			
			if( $item->id > $max )
				$max = $item->id;
		}
		
		return $max;
	}

	/**
	 * 
	 * Overwrite values in OPTIONS_FRONTEND
	 * 
	 * @since 0.2.4
	 * @access private
	 * @param array $settings
	 * @return bool true|false
	 */
	private function _fill_settings( array $settings )
	{
		if( empty( $settings ) || !is_array( $settings ) || !$settings )
			return false;
			
		$items = get_option( self::OPTION_ITEMS );
		$option_values = get_option( self::OPTION_FRONTEND );

		foreach( $items as $value )
		{
			if( isset( $value->item_id ) && isset( $settings[$value->item_id] ) )
			{
				// windows hack for backslashes in path-vars
				$settings[$value->item_id] = str_replace( '\\', '/', $settings[$value->item_id] ); 
				$option_values[$value->item_id] = $settings[$value->item_id];
			}				
		}
		
		return update_option( self::OPTION_FRONTEND, $option_values );
	}
	
	/**
	 * 
	 * Clear all option-values
	 * 
	 * @since 0.2.4
	 * @access private
	 * @return void
	 */
	private function _clear_settings()
	{
		$items = get_option( self::OPTION_ITEMS );
		
		// set blank option-settings
		foreach ( $items as $value ) 
		{
			$key = $value->item_id;
			$blank_settings[$key] = '';
		}
		
		update_option( self::OPTION_FRONTEND, $blank_settings );

		unset( $items, $blank_settings, $value, $key );
		
		return;
	}
	
	/**
	 * 
	 * Checks if a file is a file, is readablke and is writeable
	 * 
	 * @since 0.3.1
	 * @access private
	 * @param string $file Filename
	 * @return int $error error-code
	 */
	private function _is_accessible( $file = '' )
	{
		$error = 0;
		
		if( empty( $file ) )
			$error = 1;
			
		if( ! is_file( $file ) )
			$error = 2;
			
		if( ! is_readable( $file ) )
			$error = 3;
			
		if( ! is_writable( $file ) )
			$error = 4;
			
		return $error;
	}

	/**
	 * 
	 * Replace filecontents with preg_match
	 * 
	 * @since 0.3.1
	 * @access private
	 * @param string $search RegExp to search
	 * @param string $replace String to replace
	 * @return bool $success Returns true if everything is ok, else false
	 */
	private function _replace_file_contents( $search = '', $replace = '' )
	{
		if( empty( $search ) || empty( $replace ) )
			return false;
		
		// get file contents
		$content = file_get_contents( $this->config_file );		
		
		// replace
		$replaced = preg_replace( $search, $replace, $content);
		
		// write new file content
		$success = file_put_contents( $this->config_file, $replaced );
		
		// cleanup
		unset( $search, $replace, $content, $replaced );
		
		return (bool) $success;		
	}
} // end class
