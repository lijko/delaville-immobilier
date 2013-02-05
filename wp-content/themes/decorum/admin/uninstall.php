<?php
/**
 * uninstall the plugin. delete all options in the option-table
 */
function remove_me(){
		require '/tso-config.php';	
	
		delete_option( TSO_OPTION_VERSION );
		delete_option( TSO_OPTION_FRONTEND );
		delete_option( TSO_OPTION_NAME );

}

remove_me();