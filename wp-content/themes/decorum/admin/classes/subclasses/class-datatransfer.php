<?php
/**
 * ThemeShift-Options Data_Transfer
 * Import and export data
 * Reading data on activation
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.2.3
 * @author Ralf Albert
 */

class Data_Transfer extends TSO_Core
{
	/**
	 * 
	 * Constructor
	 * Exists only to prevent automatically call the parent constructor
	 */
	public function __construct()
	{
		// just to avoid calling parent::__construct automatically
	}
	
	/**
	 * Import Data
	 *
	 * @uses update_option()
	 * @uses wp_safe_redirect()
	 * @since 0.1.1
	 * @access private
	 * @return void
	 */
	public function _import_data() 
	{
		// check nonce
		check_ajax_referer( '_theme_options', '_ajax_nonce' );

		If( isset( $_FILES ) && isset( $_FILES['import'] ) )
		{
			$file_error = $_FILES['import']['error']; 
		}
		
		if( 0 == $file_error )
		{
		
			if( 'text/plain' != $_FILES['import']['type'] )
			{
				// wrong file type
				$file_error = 9;
			}
			else
			{
				$rawdata = file_get_contents( $_FILES['import']["tmp_name"] );
				$data = unserialize( $rawdata );
				
				// check if it is a file created by ThemeShift-Options
				if( !isset( $data['signature'] ) || empty( $data['signature'] ) )
				{
					// fiel signature mismatch
					$file_error = 10;
				}
				else
				{
					// check if it the right version
					$sign = unserialize( $data['signature'] );

					if( !isset( $sign['ThemeShiftOptions'] ) || self::DATA_VERSION != $sign['ThemeShiftOptions'] )
					{
						// wrong file version						
						$file_error = 11;
					}
					else
					{
						$items 		= unserialize( $data['items'] );
						update_option( self::OPTION_ITEMS, $items );
						
						wp_safe_redirect('admin.php?page=' . $this->admin_settings_page . '&file_error=' . $file_error );
					}
				}
			}
			
		}

		// if some error occur, break the script and send back with header()
		if( 0 != $file_error )
		{
			wp_safe_redirect('admin.php?page=' . $this->admin_settings_page . '&file_error=' . $file_error );
		}
	}
	
	/**
	 * 
	 * Import user data vaia AJAX call
	 * 
	 * @since 0.2.3
	 * @access public
	 * @return string foo Echo a error-string to AJAX-Script
	 */
	public function _user_import_data()
	{
		$data = false;

		// empty POST, return with error-code
		if( ! isset( $_POST['user_import'] ) || empty( $_POST['user_import'] ) )
			exit('-2'); 
		
		
		if( isset( $_POST['user_import'] ) )
		{
			$data = @base64_decode( $_POST['user_import'] );
			
			if( ! $data )
			{
				exit('-3');
			}
				
			$data = @unserialize( trim( $data ) );
			if( ! $data )
			{
				exit('-3');
			}
			
			// validate data
			if( ! is_array( $data ) )
			{	
				exit('-3');
			}
				
			if( ! isset( $data['ThemeShiftVersion'] ) || self::VERSION != $data['ThemeShiftVersion'] )
			{
				exit('-4');
			}

			unset( $data['ThemeShiftVersion'] );
			
			update_option( self::OPTION_FRONTEND, $data );
			
			$json = json_encode( get_option( self::OPTION_FRONTEND ) );
			
			exit($json);
		}
		else
		{
			// undefined error
			exit('-1');
		}
	}
	
	/**
	 * Export Data
	 *
	 * @since 0.1.1
	 * @access private
	 * @return file
	 */
	public function _export_data() 
	{
		$sign = array( 'ThemeShiftOptions' => self::DATA_VERSION );
		$items = get_option( self::OPTION_ITEMS );
		$settings = get_option( self::OPTION_FRONTEND );

		$output = array();
		$output['signature'] = serialize( $sign );
		$output['items'] 	 = serialize( $items );
		$output['settings']  = serialize( $settings );

		$out = serialize( $output );
		$size = ( strlen( $out ) );

		header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache ");
		header("Content-Type: text/plain");
		header("Content-Length: ".$size ) ;
		header('Content-Disposition: attachment; filename="' . TSO_EXPORT_FILENAME . '"');
  
		echo $out;
		exit;
		
	}
		
	/**
	 * 
	 * read default data from file and return example options
	 * 
	 * @since 0.1.0
	 * @access private
	 * @return array $items | bool false
	 */
	public function _read_datafile( $filename, $what = 'items' )
	{
		if( !$filename )
			return false;
			
	    if( file_exists( $filename ) )
	    {
	    	$data = unserialize( file_get_contents( $filename ) );
	    	$sign = unserialize( $data['signature'] );
	    	
			if( isset( $sign['ThemeShiftOptions'] ) && self::DATA_VERSION == $sign['ThemeShiftOptions'] )
			{
				if( isset( $data[ $what ] ) )
	    		{
		    		$_data = unserialize( $data[$what] );
		    		unset( $default_options, $data, $sign );
		    		
		    		return $_data;
	    		}				
			}
	    }
	    
	    return false;
	}

	/**
	 * 
	 * Read default items from file if exists. Else create two items
	 * 
	 * @since 0.2.0
	 * @access private
	 * @return array $default_items
	 */
	public function _default_items()
	{
		$default_options = TSO_DEFAULT_OPTIONS_FILENAME;
		
		if( file_exists( TSO_DEFAULT_OPTIONS_FILENAME ) )
		{
			$default_items = $this->_read_datafile( TSO_DEFAULT_OPTIONS_FILENAME, 'items' );
		}
	    else
	    {    	
		    $default_items = array();
		    
			$value = new stdClass();
			$value->id = 1;
		    $value->item_id = 'ts_heading';
		    $value->item_title = 'ThemeShift';
		    $value->item_desc = null;
		    $value->item_type = 'heading';
		    $value->item_options = null;
		    $value->item_sort = 1;
		    
		    $default_items[] = $value;

			$value = new stdClass();
			$value->id = 1;
			$value->item_id = 'ts_input';
			$value->item_title = 'ThemeShift Input';
			$value->item_desc = null;
			$value->item_type = 'input';
			$value->item_options = null;
			$value->item_sort = 2;
			  
			$default_items[] = $value;
		    
	    }
	    
	    return $default_items;
	}
	
	/**
	 * 
	 * Read default settings from file if exists. Else create a setting
	 * 
	 * @since 0.2.0
	 * @access private
	 * @return array $default_settings
	 */
	public function _default_settings()
	{
		$default_options = TSO_DEFAULT_OPTIONS_FILENAME;
		
		if( file_exists( $default_options ) )
		{
			$default_settings = $this->_read_datafile( $default_options, 'settings' );

		}
	    else
	    {
			$this->_clear_settings();
			$default_settings = get_option( self::OPTION_FRONTEND );
		    
	    }
	    
	    return $default_settings;
	}	
	
	/**
	 * 
	 * Overwrite values in OPTIONS_FRONTEND
	 * 
	 * @since 0.2.0
	 * @access private
	 * @param array $settings
	 * @return bool true|false
	 */
	public function _fill_settings( array $settings )
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
	 * @since 0.2.0
	 * @access private
	 * @return void
	 */
	public function _clear_settings()
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
	
} // end class
