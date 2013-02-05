<?php
/**
 * ThemeShift-Options Add_Hooks
 * Adding the needed hooks and filters
 * Contain the activation-, deactivation- and uninstall-methods
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @uses class Data_Transfer
 * @uses class Admin_Menu
 * @uses class Costum_Post_Type
 * @uses class Admin_Ajax_Functions
 * @since 0.2.3
 * @author Ralf Albert
 */

class Add_Hooks extends TSO_Core
{
	/**
	 * 
	 * Constructor
	 * Automatically add hooks & filters when creating an instance of this class
	 */
	public function __construct()
	{
		$this->add_hooks();
	}
	
	/**
	 * 
	 * Adding Hooks & Filters
	 */
	public function add_hooks()
	{
		/**
		 * In this non-plugin version we have no hook plugin_activation.
		 * We call the activation-method by hand
		 */
		$this->activate();
		
		/**
		 * Add hooks
		 *
		 * @uses add_action()
		 *
		 * @since 0.1.0
		 */
		add_action( 'init', array( &$this, 'register_custom_post_type' ), 5 );
		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );

		/**
		 * Add ajax hooks
		 * 
		 * @uses add_action()
		 * @since 0.1.0
		 */
		$ajax_actions = array(
			'_array_save',
			'_array_reset',
			'_add',
			'_edit',
			'_delete',
			'_next_id',
			'_sort',
			'_add_slider',
			'_user_import_data',
			'_clear_defaults',
			'_save_defaults',
			'_read_defaults',
		);
		
		foreach( $ajax_actions as $single_action ){
			add_action( 'wp_ajax_themeshift_options'.$single_action, array( &$this, $single_action ) );
		}		
	}
	
/* ----- methods call in hooks & filters --------------- */
	
	/**
	 * 
	 * plugin activation
	 * check if version-string exists
	 * if not, create a new versin-string and check if option-data from an
	 * earlierer activation was left
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function activate()
	{
		global $ts_defaults;

		// check version
		$version = get_option( self::OPTION_VERSION );
		
		if( !$version || self::VERSION != $version )
		{
			
			// store version in db with add_option (we need the autoload)
			update_option( self::OPTION_VERSION, self::VERSION, false, 'yes' );
			
			// get default items (options) and store them in DB
			$items = $this->_default_items();
			update_option( self::OPTION_ITEMS, $items );

			// get default settings (option values) and store them in DB (with autoload)
			$frontend_options = $this->_default_settings();
			add_option( self::OPTION_FRONTEND, $frontend_options, false, 'yes' );
			
			// overwrite created default option values by $ts_defaults (if exists)
			// _fill_settings will store the data in DB
			if( !empty( $ts_defaults ) && is_array( $ts_defaults ) )
			{
				$this->_fill_settings( $ts_defaults );
			}
			
		}
		else
		{
			
			// check items
			// if no items (options) are set, create/read default items 
			
			$items = get_option( self::OPTION_ITEMS );
			if( empty( $items ) || !is_array( $items ) || !$items )
			{				
				// get example items and save them in option-table
				update_option( self::OPTION_ITEMS, $this->_default_items() );
			}

			// check settings (option values)
			// if no settings are set, create/read default settings
			$frontend_options = get_option( self::OPTION_FRONTEND );			
			if( empty( $frontend_options ) || !is_array( $frontend_options ) || !$frontend_options )
			{
				
				// get default settings (option values)
				$frontend_options = $this->_default_settings();
				
				// overwrite created default values by $ts_defaults (if exists)
				if( !empty( $ts_defaults ) && is_array( $ts_defaults ) )
					$this->_fill_settings( $ts_defaults );
								
				// autoload this options. we need it often in the frontend
				add_option( self::OPTION_FRONTEND, $frontend_options, false, 'yes' );
			}
			
			unset( $items, $frontend_options, $version );
		}		
	}
	
	/**
	 * 
	 * plugin deactivation
	 * remove version from options table, keeps items in option-table
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function deactivate()
	{
		delete_option( self::OPTION_VERSION );	
	}
	
	/**
	 * 
	 * plugin uninstall. for testing purpose
	 * remove ALL options and data
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function uninstall()
	{
		delete_option( self::OPTION_VERSION );
		delete_option( self::OPTION_ITEMS );
	}

} // end class
