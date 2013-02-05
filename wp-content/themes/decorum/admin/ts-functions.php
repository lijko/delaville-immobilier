<?php
/**
 * ts-functions.php
 * 
 * This file will be included when class Frontend is registered
 * It is helpful to use self written functions for use in frontend
 * 
 * @since 0.1.0
 */

/**
 * Latest ThemeShift News dashboard widget 
 */
function ts_dashboard() {
	
	$rss = @fetch_feed('http://themeshift.com/feed/');
	
	if ( is_wp_error($rss) ) {
		if ( is_admin() || current_user_can('manage_options') ) {
			echo '<div class="rss-widget"><p>';
			printf(__('<strong>RSS Error</strong>: %s'), $rss->get_error_message());
			echo '</p></div>';
		}
	} elseif ( !$rss->get_item_quantity() ) {
		$rss->__destruct();
		unset($rss);
		return false;
	} else {
		echo '<div class="rss-widget">';
		wp_widget_rss_output( $rss, 'items=5' );
		echo '</div>';
		$rss->__destruct();
		unset($rss);
	}

}

function ts_dashboard_setup() {
    wp_add_dashboard_widget( 'ts_dashboard', 'ThemeShift News', 'ts_dashboard' );    
}
add_action('wp_dashboard_setup', 'ts_dashboard_setup');

/**
 * ts_get_option()
 * User generated function
 * 
 * @param string $key
 */
function ts_get_option($key) {

    global $ts_defaults;

    if( empty( $ts_defaults ) || !is_array( $ts_defaults ) )
    	return false;

    $ts_options = get_option( TSO_OPTION_FRONTEND );

    foreach($ts_defaults as $k=>$v) {

        if ( ! isset( $ts_options[$k] ) )
            $ts_options[$k] = $ts_defaults[$k];

    }

	if(isset($ts_options[$key]))
    	return $ts_options[$key];
}

/**
 * Mapping old option names to new one for downward compatibility 
 */
if( true == ACTIVATE_OLD_OPTION_NAME_FILTERING && defined( 'OLD_OPTION_NAME' ) )
{
	add_filter('pre_option_' . OLD_OPTION_NAME, 'old2new_option' );
	  
	function old2new_option()
	{
		return get_option( TSO_OPTION_FRONTEND );
	}
}

/**
 * Login logo from branding options 
 */
function ts_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.ts_get_option('ts_login_logo').')!important; }
    </style>';
}

if(ts_get_option('ts_login_logo'))
	add_action('login_head', 'ts_login_logo');
	
/**
 * Remove page Themes & News 
 */
function ts_remove_news_page() {
	$ts_options_links = ts_get_option('ts_options_links');
	if(!empty($ts_options_links[1]))
		remove_submenu_page('tso_options', 'tso_news');
}

add_action( 'admin_init', 'ts_remove_news_page' );

/**
 * Remove page Help Center 
 */
function ts_remove_help_page() {
	$ts_options_links = ts_get_option('ts_options_links');
	if(!empty($ts_options_links[2]))
		remove_submenu_page('tso_options', 'tso_docs');
}

add_action( 'admin_init', 'ts_remove_help_page' );

/**
 * Apply custom menu icon 
 */
function ts_custom_menu_icon() {
	return ts_get_option('ts_options_icon');	
}
if(ts_get_option('ts_options_icon'))
	add_filter('ts_menu_icon', 'ts_custom_menu_icon');

/**
 * Remove description field from static slides 
 */	
add_filter( 'image_slider_fields', 'ts_slider_fields' );

function ts_slider_fields() 
{
  $array = array(
    array(
      'name'  => 'image',
      'type'  => 'text',
      'label' => __('Image URL', TS_DOMAIN),
      'class' => ''
    ),
    array(
      'name'  => 'link',
      'type'  => 'text',
      'label' => __('Link URL', TS_DOMAIN),
      'class' => ''
    ),
    array(
      'name'  => 'description',
      'type'  => 'textarea',
      'label' => __('Description', TS_DOMAIN),
      'class' => ''
    )
  );
  return $array;
}

/**
 * Define measurement unit 
 */	
add_filter( 'measurement_unit_types', 'ts_measurement_types' );

function ts_measurement_types() 
{
  	$array = array('m2', 'sq ft', 'sq yd');
  	return $array;
}

/**
 * Localization of dynamically created strings 
 */

$ts_localize_strings_backend = array(
		
	__('General', TS_DOMAIN),
	__('Custom Logo', TS_DOMAIN),
	__('Please enter an URL or upload your custom logo.', TS_DOMAIN),
	__('Custom Favicon', TS_DOMAIN),
	__('Please enter an URL or upload your custom favicon.', TS_DOMAIN),
	__('Custom RSS', TS_DOMAIN),
	__('Please enter your custom RSS URL (e.g. Feedburner).', TS_DOMAIN),
	__('Custom CSS', TS_DOMAIN),
	__('Easily add some custom css to the head of your theme.', TS_DOMAIN),
	__('Tracking Code', TS_DOMAIN),
	__('Insert your tracking code here (e.g. Google Analytics). This code will be added to the footer of the theme.', TS_DOMAIN),
	__('Styling', TS_DOMAIN),
	__('Custom Styling', TS_DOMAIN),
	__('Activate custom styling options', TS_DOMAIN),
	__('<strong style="color:red;text-transform:uppercase">Please notice!</strong> Do not forget to activate the styling options. Otherwise they will have no effect.', TS_DOMAIN),
	__('Background Image', TS_DOMAIN),
	__('Please enter a URL or upload a background image.', TS_DOMAIN),
	__('Background Image Repeat', TS_DOMAIN),
	__('Please selete how you would like to repeat the background image.', TS_DOMAIN),
	__('Background Image Position', TS_DOMAIN),
	__('Please select how you would like to position the background image.', TS_DOMAIN),
	__('Background Image Attachment', TS_DOMAIN),
	__('Background image fixed', TS_DOMAIN),
	__('Background Color', TS_DOMAIN),
	__('Please pick a custom background color of the theme.', TS_DOMAIN),
	__('Button Color', TS_DOMAIN),
	__('Please pick a color for buttons.', TS_DOMAIN),
	__('Link Color', TS_DOMAIN),
	__('Please pick a color for links.', TS_DOMAIN),
	__('Link Color Hover', TS_DOMAIN),
	__('Please pick a color for links hover.', TS_DOMAIN),
	__('Home', TS_DOMAIN),
	__('Home Sidebar', TS_DOMAIN),
	__('Display sidebar on home page', TS_DOMAIN),
	__('Display sidebar on the left', TS_DOMAIN),
	__('Slider Size', TS_DOMAIN),
	__('Display small slider (no sidebar = large slider)', TS_DOMAIN),
	__('Slider Content', TS_DOMAIN),
	__('Property Category', TS_DOMAIN),
	__('If property category selected for slider content.', TS_DOMAIN),
	__('Post Category', TS_DOMAIN),
	__('If post category selected for slider content.', TS_DOMAIN),
	__('Static Slides', TS_DOMAIN),
	__('Add your static slides to the slider (overwrites slider content selected above).', TS_DOMAIN),
	__('Add slide', TS_DOMAIN),
	__('Slider Overlay', TS_DOMAIN),
	__('Show slider overlay', TS_DOMAIN),
	__('Slider Navigation', TS_DOMAIN),
	__('Display previous and next buttons', TS_DOMAIN),
	__('Slider Effect', TS_DOMAIN),
	__('Slider Auto', TS_DOMAIN),
	__('Time between animations in seconds.', TS_DOMAIN),	 
	__('Properties', TS_DOMAIN),
	__('Property Archive Layout', TS_DOMAIN),
	__('Property Search', TS_DOMAIN),
	__('Display search form on property archive pages', TS_DOMAIN),
	__('Display search form on single property pages', TS_DOMAIN),
	__('Display advanced search', TS_DOMAIN),
	__('Property Sidebar', TS_DOMAIN),
	__('Display sidebar on the left', TS_DOMAIN),
	__('Property Single Layout', TS_DOMAIN),
	__('Display sidebar (no sidebar = large image)', TS_DOMAIN),
	__('Display large image', TS_DOMAIN),
	__('Property Single Elements', TS_DOMAIN),
	__('Display favorites link', TS_DOMAIN),
	__('Display print link', TS_DOMAIN),
	__('Display property ID', TS_DOMAIN),
	__('Display property type', TS_DOMAIN),
	__('Display loaction', TS_DOMAIN),
	__('Display price button', TS_DOMAIN),
	__('Display date', TS_DOMAIN),
	__('Price Button Link', TS_DOMAIN),
	__('If empty, price button will be a jump link to contact widget.', TS_DOMAIN),
	__('Property Navigation', TS_DOMAIN),
	__('Enable single property paging', TS_DOMAIN),
	__('Standard Feature #1', TS_DOMAIN),
	__('Standard Feature #2', TS_DOMAIN),
	__('Standard Feature #3', TS_DOMAIN),
	__('Standard Feature #4', TS_DOMAIN),
	__('Standard Feature #5', TS_DOMAIN),
	__('Living Area', TS_DOMAIN),
	__('Terrace', TS_DOMAIN),
	__('Parking', TS_DOMAIN),
	__('Heating', TS_DOMAIN),
	__('Year Built', TS_DOMAIN),
	__('Property ID Prefix', TS_DOMAIN),
	__('The property ID will be this prefix plus post ID.', TS_DOMAIN),
	__('Measurement Unit', TS_DOMAIN),
	__('Price Format', TS_DOMAIN),
	__('dot', TS_DOMAIN),
	__('comma', TS_DOMAIN),
	__('Please select the thousands separator dot (1.000) or comma (1,000).', TS_DOMAIN),
	__('Currency', TS_DOMAIN),
	__('Currency Symbol', TS_DOMAIN),
	__('Display currency symbol after amount', TS_DOMAIN),
	__('Rental Period #1', TS_DOMAIN),
	__('Rental Period #2', TS_DOMAIN),
	__('Rental Period #3', TS_DOMAIN),
	__('per Month', TS_DOMAIN),
	__('per Week', TS_DOMAIN),
	__('per Year', TS_DOMAIN),
	__('Archive Layout', TS_DOMAIN),
	__('Archive Sidebar', TS_DOMAIN),
	__('Display sidebar on the left', TS_DOMAIN),
	__('This affects the sidebar on archive pages, single posts and static pages.', TS_DOMAIN),
	__('Archive Meta', TS_DOMAIN),
	__('Display post date', TS_DOMAIN),
	__('Display category', TS_DOMAIN),
	__('Display post author', TS_DOMAIN),
	__('Display comments number', TS_DOMAIN),
	__('Post Navigation', TS_DOMAIN),
	__('Enable single post paging', TS_DOMAIN),
	__('Comments', TS_DOMAIN),
	__('Allow comments on posts', TS_DOMAIN),
	__('Allow comments on pages', TS_DOMAIN),
	__('Social', TS_DOMAIN),
	__('Header Top', TS_DOMAIN),
	__('Need expert advice? <strong>Call us now - 555 555 555</strong>', TS_DOMAIN),
	__('Social Icons', TS_DOMAIN),
	__('The following social icons will be displayed on the right side of the header section.', TS_DOMAIN),
	__('Icon #1', TS_DOMAIN),
	__('Icon #2', TS_DOMAIN),
	__('Icon #3', TS_DOMAIN),
	__('Icon #4', TS_DOMAIN),
	__('Icon #5', TS_DOMAIN),
	__('Icon #6', TS_DOMAIN),
	__('URL #1', TS_DOMAIN),
	__('URL #2', TS_DOMAIN),
	__('URL #3', TS_DOMAIN),
	__('URL #4', TS_DOMAIN),
	__('URL #5', TS_DOMAIN),
	__('URL #6', TS_DOMAIN),
	__('Please enter the URL of your social icon.', TS_DOMAIN),
	__('Footer Left', TS_DOMAIN),
	__('Place your custom text in the left footer.', TS_DOMAIN),
	__('Footer Left (disable)', TS_DOMAIN),
	__('Tick the box to hide the left footer', TS_DOMAIN),
	__('Footer Right', TS_DOMAIN),
	__('Place your custom text in the right footer.', TS_DOMAIN),
	__('Footer Right (disable)', TS_DOMAIN),
	__('Tick the box to hide the right footer', TS_DOMAIN),	
	__('To Top', TS_DOMAIN),
	__('Display scroll to top', TS_DOMAIN),
	__('Branding Options', TS_DOMAIN),
	__('<strong style="color:red;text-transform:uppercase">Please notice!</strong> You&#039;re seeing the branding options because you have activated the developer mode in  the theme file <code>ts-config.php</code>. They are useful if you are creating a site for a client and want to put his branding or simply hide any ThemeShift related elements.', TS_DOMAIN),
	__('Hide Basic Questions / General Usage / Theme Docs / Forum etc.', TS_DOMAIN),
	__('Hide Themes &amp; News (menu)', TS_DOMAIN),
	__('Hide Help Center (menu)', TS_DOMAIN),
	__('Options Panel Logo', TS_DOMAIN),
	__('Options Panel Icon', TS_DOMAIN),
	__('Please enter an URL or upload your custom menu icon (16x16px).', TS_DOMAIN),
	__('WordPress Login Logo', TS_DOMAIN)
	
);

/*
Plugin Name: Rms User Metadata
Version: 0.1
Author: Rameshwor Maharjan
Description: Additional User Metadata
URL: flicknepal.com
*/

if ( !class_exists('RmsUser') ) :
 
class RmsUser
{ 
 
	function RmsUser()
	{
 
		add_action( 'show_user_profile', array(&$this,'my_show_extra_profile_fields') );
		add_action( 'edit_user_profile', array(&$this,'my_show_extra_profile_fields') );
		add_action( 'personal_options_update', array(&$this,'my_save_extra_profile_fields') );
		add_action( 'edit_user_profile_update', array(&$this,'my_save_extra_profile_fields') );
 
	}
	
	function get_author_profile_image($user_ID)
	{
	 
		$author_data = get_the_author_meta( 'profile_image' , $user_ID );
		$uploads = wp_upload_dir();
		if($author_data["file"]) $author_data["file"] = $uploads["baseurl"] . $author_data["file"];
		return $author_data;
	} 
 
	function my_show_extra_profile_fields( $user ) { ?>
 
		<script type="text/javascript">
			var form = document.getElementById('your-profile');
			form.encoding = "multipart/form-data";
			form.setAttribute('enctype', 'multipart/form-data');
		</script>
		
		<table class="form-table">
		
		    <tr>
		    	<th><label for="profile_image"><?php _e('Profile Image', TS_DOMAIN); ?></label></th>
		
		    	<td>
		    		<?php
		    		$author_profile_image = $this->get_author_profile_image($user->ID);
		    		if(is_array($author_profile_image)):
		    		?>
		    		<p><span class="description">
		    		<img src="<?php echo $author_profile_image["file"];?>" />
		    		</span></p>
		    		<p><label><input type="checkbox" name="remove_image" id="remove_image" style="margin-right:5px" /><?php _e('Remove image',TS_DOMAIN); ?></label></p>
		    		<?php
		    		endif;
		    		?>
		    		<p><input type="file" name="profile_image" id="profile_image" class="regular-text" /></p>
		    	</td>
		    </tr>
		    
		</table>
 
	<?php } 
 
	function my_save_extra_profile_fields( $user_id ) {
 
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;
 
		$upload=$_FILES['profile_image'];
		$uploads = wp_upload_dir();
		if ($upload['tmp_name'] && file_is_displayable_image( $upload['tmp_name'] ))
		{ 
			// handle the uploaded file
			$overrides = array('test_form' => false);
			$file=wp_handle_upload($upload, $overrides);
			$file["file"] = $uploads["subdir"]."/".basename($file["url"]);
			
			if ($file)
			{			
			    //remove previous uploaded file
			    $author_profile_image = $this->get_author_profile_image($user_id);
			    @unlink($author_profile_image["file"]);			
			    update_user_meta( $user_id, 'profile_image', $file ); 			
			}
 		}
		
		if ($_POST['remove_image'])
		{		
		    $author_profile_image = $this->get_author_profile_image($user_id);
		    @unlink($author_profile_image["file"]);
		    update_user_meta( $user_id, 'profile_image', false );
		}
	}
}
 
	if ( class_exists('RmsUser') ) :
	$RmsUser = new RmsUser();
	endif;
	
endif;