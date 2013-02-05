<?php
/**
 * ThemeShift-Options Class_Loader
 * Merging classes
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.2.3
 * @author Ralf Albert
 */
class Loader
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
	
	public function classloader()
	{
		if ( is_admin() )
		{
			// Classes to include
			// format: classname => path/to/file/with/class
			// Notice: Load Data_Transfer first, then Add_Hooks. 
			// Add_Hooks need methods from Data_transfer in the constructor
			
			$classes = array( 'Data_Transfer' 		 => TSO_DIR.'/classes/subclasses/class-datatransfer.php',
							  'Add_Hooks'		 	 => TSO_DIR.'/classes/subclasses/class-add_hooks.php',
							  'Admin_Views'		 	 => TSO_DIR.'/classes/subclasses/class-admin_views.php',
							  'Admin_Ajax_Functions' =>	TSO_DIR.'/classes/subclasses/class-admin_ajax_functions.php',							  
							  'Admin_Menu' 			 => TSO_DIR.'/classes/subclasses/class-admin_menu.php',
							  'Custom_Post_Type' 	 => TSO_DIR.'/classes/subclasses/class-custom_post_type.php',
							  'Frontend' 	 		 => TSO_DIR.'/classes/subclasses/class-frontend.php'
							 );
		
			$this->register_classes( $classes );
		
		}
		elseif ( ! is_admin() )
		{
			$this->register_class( 'Frontend',  		TSO_DIR.'/classes/subclasses/class-frontend.php' );
			$this->register_class( 'Custom_Post_Type',	TSO_DIR.'/classes/subclasses/class-custom_post_type.php');
		}
		else 
		{
			// for debugging only
			die('Something went terribly wrong');
		}
	}

} // end class