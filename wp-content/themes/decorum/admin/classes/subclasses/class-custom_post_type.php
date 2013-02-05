<?php
/**
 * ThemeShift-Options Custom_Post_Type
 * Register Custom Post Types
 * Handles post locks
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.0.1
 * @author Ralf Albert
 */

class Custom_Post_Type extends TSO_Core
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
	 * 
	 * register custom post type & create two posts
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function register_custom_post_type() 
	{
		register_post_type( $this->custom_post_type, array(
			'labels' => array(
				'name' => __( 'Options' ),
			),
			'public' => true,
			'show_ui' => false,
			'capability_type' => 'post',
			'exclude_from_search' => true,
			'hierarchical' => false,
			'rewrite' => false,
			'supports' => array( 'title', 'editor' ),
			'can_export' => true,
			'show_in_nav_menus' => false,
		) );
	
		// create a private page to attach media to
		if ( isset($_GET['page']) && $_GET['page'] == $this->admin_page ) 
		{
			// look for custom page
			$page_id = $this->_get_option_page_ID( 'media' );
			
			// no page create it
			if ( ! $page_id ) 
			{
				// create post object
				$_p = array();
				$_p['post_title'] = 'Media';
				$_p['post_status'] = 'private';
				$_p['post_type'] = $this->custom_post_type;
				$_p['comment_status'] = 'closed';
				$_p['ping_status'] = 'closed';
				
				// insert the post into the database
				$page_id = wp_insert_post( $_p );
			}
		}
	
		// create a private page for settings page
		if ( isset($_GET['page']) && $_GET['page'] == $this->admin_page ) 
		{
			// look for custom page
			$page_id = $this->_get_option_page_ID( 'options' );
			
			// no page create it
			if ( ! $page_id ) 
			{
				// create post object
				$_p = array();
				$_p['post_title'] = 'Options';
				$_p['post_status'] = 'private';
				$_p['post_type'] = $this->custom_post_type;
				$_p['comment_status'] = 'closed';
				$_p['ping_status'] = 'closed';
				
				// insert the post into the database
				$page_id = wp_insert_post( $_p );
			}
		}
	}	

	
	/**
	 * Returns the ID of a cutom post tpye
	 *
	 * @uses get_var()
	 *  
	 * @since 0.1.0
	 * @access public
	 * @param string $page_title
	 * @return int
	 */
	public function _get_option_page_ID( $page_title = '' ) 
	{
		global $wpdb;
		return $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE post_title = '{$page_title}' AND post_type = '{$this->custom_post_type}' AND post_status != 'trash'");
	}
	
	/**
	 * Check to see if the post is currently being edited by another user.
	 *
	 * @uses get_post_meta()
	 * @uses apply_filters()
	 * @uses get_current_user_id()
	 *
	 * @since 1.0.0
	 * @access public
	 * @param int $post_id
	 * @return bool
	 */
	public function _check_post_lock( $post_id ) 
	{ 
		if ( !$post_id )
			return false;
		
		$lock = get_post_meta( $post_id, '_edit_lock', true );
		$last = get_post_meta( $post_id, '_edit_last', true );
		
		$time_window = apply_filters( 'wp_check_post_lock_window', 30 );
		
		if ( $lock && $lock > time() - $time_window && $last != get_current_user_id() )
			return $last;
		
		return false;
	}
	
	/**
	 * Outputs the notice message to say that someone else is editing this post at the moment.
	 *
	 * @uses get_userdata()
	 * @uses get_post_meta()
	 * @uses esc_html()
	 *
	 * @since 1.0.0
	 * @access public
	 * @param int $post_id
	 * @return string
	 */
	public function _notice_post_locked( $post_id ) 
	{
		if ( !$post_id )
			return false;
		
		$last_user = get_userdata( get_post_meta( $post_id, '_edit_last', true ) );
		$last_user_name = $last_user ? $last_user->display_name : __('Somebody');
		$the_page = ( $_GET['page'] == $this->admin_page ) ? __('Theme Options') : __('Settings');
		
		$message = sprintf( __( 'Warning: %s is currently editing the %s.' ), esc_html( $last_user_name ), $the_page );

		return '<div class="message warning"><span>&nbsp;</span>'.$message.'</div>';
	}
	
	/**
	 * Mark the post as currently being edited by the current user
	 *
	 * @uses update_post_meta()
	 * @uses get_current_user_id()
	 *
	 * @since 1.0.0
	 * @access public
	 * @param int $post_id
	 * @return bool
	 */
	public function _set_post_lock( $post_id ) 
	{
		if ( !$post_id )
			return false;
		
		if ( 0 == get_current_user_id() )
			return false;
		
		$now = time();
		
		update_post_meta( $post_id, '_edit_lock', $now );
		update_post_meta( $post_id, '_edit_last', get_current_user_id() );
	}

} // end class