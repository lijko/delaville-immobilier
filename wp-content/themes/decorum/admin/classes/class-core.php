<?php
/**
 * ThemeShift-Options TSO_Core
 * The Admin-Class handle all methods and function calls
 * Handles GET- & POST requests for ajax calls (router)
 * 
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.1.0
 * @author Ralf Albert
 */

require_once 'class-loader.php';

class TSO_Core extends Loader
{
	public static $instances_array 	= array();
	public static $class_array 		= array();
	
	const VERSION 			= '1.0.2';
	const DATA_VERSION		= '0.1.2';
	const OPTION_ITEMS 		= TSO_OPTION_NAME;
	const OPTION_FRONTEND 	= TSO_OPTION_FRONTEND;
	const OPTION_VERSION	= TSO_OPTION_VERSION;
	
	public $admin_page 			= 'tso_options';
	public $admin_settings_page	= 'tso_settings';
	public $custom_post_type 	= 'themeshift-options';
	
	/**
	 * 
	 * Constructor
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function __construct()
	{		
		// loading & registering the sub-classes
		$this->classloader();
		// $this->logger('OK');		
		// controller ($_GET & $_POST)
		$this->_router();
	}
	
/* ----- magic methods --------------------------------- */
	/**
	 * 
	 * magic call. invoke method calls to included classes
	 * 
	 * @since 0.1.0
	 * @access public
	 * @param string $method
	 * @param mixed $args
	 */
	public function __call( $method, $args )
	{
	    foreach( self::$class_array as $class )
	    {
	      $methods = get_class_methods( self::$instances_array[$class] );
	
	      if( in_array( $method, $methods ) )
	      {
	        $function_call = array( self::$instances_array[$class], $method );
	
	        if( !empty( $args ) )
	        {
	          return call_user_func_array( $function_call, $args  );
	        
	        }
	        else
	        {
	          return call_user_func( $function_call );
	        }
	      }
	          
	    }
	    
	    die( $method.' not found' );
	}	
	
/* ----- public functions --- for initialise the class & other purposes ----- */
	
	/**
	 * 
	 * register classes for magic __call
	 * register multiple classes via array
	 * 
	 * @since 0.1.0
	 * @access public
	 * @param array $classes assoziatives array $class => $filename
	 */
	public function register_classes( array $classes )
	{
		$error = false;
		
		// double the moppel (array)
		if( empty( $classes ) || !is_array( $classes ) )
		{
			return false;
		}
		
		foreach( $classes as $class_name => $filename )
		{
			$error = $this->register_class( $class_name, $filename );
		}
		
		return $error;
	}

	/**
	 * 
	 * register single class
	 * 
	 * @since 0.1.0
	 * @access public
	 * @param string $class class-name to register
	 * @param string $filename
	 */
	public function register_class( $class_name = false, $filename = false )
	{
		if( $class_name && $filename )
		{
			// if this class is already registered return false
			if( key_exists( $class_name, self::$instances_array ) ){
				
				// for debugging only
				// $this->logger('class already registered ==> class: '.$class_name);				
				return false;				
			}
			
			if( file_exists( $filename ) )
			{
				require_once $filename;
			}
			else
			{
				// for debugging only
				// $this->logger('file not found ==> file: '.$filename);			
				return false;
			}
			
			if( class_exists( $class_name ) )
			{
				self::$instances_array[$class_name] = new $class_name;
				self::$class_array[] = $class_name;
				
				return true;
			}
			else
			{
				// for debugging only
				// $this->logger('registering failed ==> file: '.$filename.' | class: '.$class_name);				
				return false;
			}
		}

		// for debugging only
		// $this->logger('registering class failed with unknown reason');
		return false;
	}

/* ----- private functions --- internal use only ! ----- */
	/**
	 * 
	 * Routing GET- & POST-Requests
	 * 
	 * @since 0.2.3
	 * @access private
	 */
	private function _router()
	{
		if( !empty( $_POST ) )
		{
			if( isset( $_POST['action'] ) && 'export' == $_POST['action'] )
			{
				$this->_export_data();
			}
				
			if( isset( $_POST['action'] ) && 'import' == $_POST['action'] )
			{
				if( isset( $_FILES['import'] ) )
					$this->_import_data();
			}
		}
	}

	
	
// for debugging only	
	
	public function logger($data){
	
		$f = @fopen(TSO_DIR.'/_errorlog.txt', 'a+');
		if(!$f) die("Fehlgeschlagen");
		$out = var_export($data, true);
		fputs($f, date('d.m.Y - H:i:s').' => ');
		fputs($f,$out.PHP_EOL);
		fputs($f, "--------------------".PHP_EOL);
		fclose($f);
	
		return 'ok';
	}
	
} //end class
