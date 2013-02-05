<?php
/**
 * ThemeShift-Options Frontend
 * Check if any settings are available
 * If settings are available, load the ts-functions.php. If not, log an error message and break.
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.0.1
 * @author Ralf Albert
 */

class Frontend extends TSO_Core
{
	/**
	 * 
	 * Constructor
	 * Exists only to prevent automatically call the parent constructor
	 */
	public function __construct()
	{
		// just to avoid calling parent::__construct automatically
		$this->check_state();
	}
	
	public function check_state()
	{
		$settings = get_option( self::OPTION_FRONTEND );
		
		if( ! $settings || empty( $settings ) || ! is_array( $settings ) )
		{
			$this->logger( 'Can not find any settings. Script will abort!' );
			return false;
		}
		else 
		{
			include_once TSO_DIR.'/ts-functions.php';
			return true;
		}
		
	}
}