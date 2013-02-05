<?php
/**
 * ThemeShift-Options Admin_Menu
 * Create the admin menu and loads the admin pages
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.0.1
 * @author Ralf Albert
 */

class Admin_Menu extends TSO_Core
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
	
	/* ----- methods call in hooks & filters --------------- */
	/**
	 * 
	 * Creating the admin menu
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function admin_menu()
	{
		global $submenu;
		
		$theme_name = get_option('current_theme');
		
		$admin_page = add_menu_page( $theme_name . ' Options', $theme_name, 'manage_options', $this->admin_page, array( &$this, '_options_page' ), apply_filters('ts_menu_icon', TSO_URL . '/img/icons/menu.png') );
		$news_page = add_submenu_page( $this->admin_page, __( 'Themes &amp; News', TS_DOMAIN ), __( 'Themes &amp; News', TS_DOMAIN ), 'manage_options', 'tso_news', array( &$this, '_news_page' ) );
		$docs_page = add_submenu_page( $this->admin_page, __( 'Help Center', TS_DOMAIN ), __( 'Help Center', TS_DOMAIN ), 'manage_options', 'tso_docs', array( &$this, '_docs_page' ) );

		// Dev-Mode
	    if( true === TSO_DEV_MODE ){
	    	$settings_page = add_submenu_page( $this->admin_page, __( 'Option Settings', TS_DOMAIN ), __( 'Settings', TS_DOMAIN ), 'manage_options', $this->admin_settings_page, array( &$this, '_settings_page' ) );
	    	add_action( "admin_print_styles-$settings_page", array( $this, '_page_styles' ) );
	    }
	    
	    $submenu[$this->admin_page][0][0] = __( 'Theme Options', TS_DOMAIN );
	    
	    add_action( "admin_print_styles-$admin_page", array( $this, '_page_styles' ) );
	    add_action( "admin_print_styles-$docs_page", array( $this, '_page_styles' ) );
	    add_action( "admin_print_styles-$news_page", array( $this, '_page_styles' ) );
	    
	}

	/**
	 * 
	 * Load the options page
	 * 
	 * @use _prepare_page()
	 * @since 0.1.0
	 * @access public
	 */
	public function _options_page()
	{
		extract( $this->_prepare_page() );
		    
	    // Grab Options Page
	    include TSO_DIR.'/admin_pages/options.php';
	}
	
	/**
	 * 
	 * Load the settings page
	 * 
	 * @uses _prepare_page()
	 * @since 0.1.0
	 * @access public
	 */
	public function _settings_page()
	{
		extract( $this->_prepare_page() );
			    
	    // Grab settings Page
	    include TSO_DIR.'/admin_pages/settings.php';
	}

	/**
	 * 
	 * Load the docs page
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function _docs_page()
	{
	    // Grab docs page
	    include TSO_DIR.'/admin_pages/docs.php';
	}
	
	/**
	 * 
	 * Load the news page
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function _news_page()
	{
	    // Grab news page
	    include TSO_DIR.'/admin_pages/news.php';
	}

	/**
	 * Load Scripts & Styles
	 *
	 * @uses wp_enqueue_style()
	 * @uses get_user_option()
	 * @uses add_thickbox()
	 * @uses wp_enqueue_script()
	 * @uses wp_deregister_style()
	 *
	 * @since 0.1.0
	 * @access public
	 * @return void
	 */
	public function _page_styles() 
	{
		// enqueue styles
		wp_enqueue_style( 'themshift-options-style', TSO_URL . '/css/style.css', false, self::VERSION, 'screen');
		
		// classic admin theme styles
		if ( get_user_option( 'admin_color') == 'classic' ) 
		wp_enqueue_style( 'themshift-options-style-classic', TSO_URL . '/css/style-classic.css', array( 'themshift-options-style' ), $this->version, 'screen');
		
		// enqueue scripts
		add_thickbox();
		wp_enqueue_script( 'jquery-table-dnd', TSO_URL . '/js/jquery.table.dnd.js', array('jquery'), self::VERSION );
		wp_enqueue_script( 'jquery-color-picker', TSO_URL . '/js/jquery.color.picker.js', array('jquery'), self::VERSION );
		wp_enqueue_script( 'jquery-themeshift-options', TSO_URL . '/js/jquery.themeshift.options.js', array('jquery','media-upload','thickbox','jquery-ui-core','jquery-ui-tabs','jquery-table-dnd','jquery-color-picker', 'jquery-ui-sortable'), self::VERSION );    	
		wp_localize_script( 'jquery-themeshift-options', 'ts_js', $this->_ts_language_strings() );
		
		// remove GD star rating conflicts
		wp_deregister_style( 'gdsr-jquery-ui-core' );
		wp_deregister_style( 'gdsr-jquery-ui-theme' );
	}
	
	/**
	 * 
	 * Localize javascript stings
	 * 
	 * @since 0.1.0
	 * @access public
	 */
	public function _ts_language_strings()
	{	
		$strings = array(
    	    'options_import_confirm' => __( 'Are you sure to import these settings?', TS_DOMAIN ),
    	    'options_reset' => __( 'Are you sure to delete all of the theme options?', TS_DOMAIN ),
    	    'options_saved' => __( 'Theme Options saved', TS_DOMAIN ),
    	    'options_saved_not' => __( 'Theme Options not saved', TS_DOMAIN ),
    	    'option_select' => __('Please select', TS_DOMAIN),
    	    'options_deleted' => __( 'Theme Options deleted', TS_DOMAIN ),
    	    'options_deleted_not' => __( 'Theme Options not deleted', TS_DOMAIN ),
    	    'options_import_empty' => __( 'Please insert some data', TS_DOMAIN ),
    	    'options_import_success' => __( 'Theme Options successfully imported', TS_DOMAIN ),
    	    'options_import_error' => __( 'Theme Options could not be imported', TS_DOMAIN )
    	);   	
    	return $strings;	
	}
		
/* ----- private functions --- internal use only ! ----- */
		
	/**
	 * 
	 * Load vars from option table and check the post lock of CPTs
	 * 
	 * @since 0.1.0
	 * @access private
	 */
	private function _prepare_page(){
	    $items 	 = NULL;
	    $post_id = NULL;
	    $message = NULL;
	    
		// load saved items
	    $items 		= get_option( self::OPTION_ITEMS );
	    $settings 	= get_option( self::OPTION_FRONTEND );

	    // private page ID
	    $post_id = $this->_get_option_page_ID( 'media' );
	    
	    // set post lock
	    if ( $last = $this->_check_post_lock( $post_id ) ) 
	    {
	      $message = $this->_notice_post_locked( $post_id );
	  	} 
	  	else 
	  	{
	  		$this->_set_post_lock( $post_id );
	  	}
	  	
	  	return array( 'items' => $items, 'settings' => $settings, 'post_id' => $post_id, 'message' => $message );
		
	}

} // end class
