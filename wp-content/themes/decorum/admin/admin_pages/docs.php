<div id="tso-wrap" class="wrap">

	<div id="header">
    <h1><a href="http://themeshift.com" target="_blank">ThemeShift</a></h1>
    <span class="theme"><?php _e('Help Center', TS_DOMAIN); ?></span>
    <?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
    <div class="version">
      <?php echo self::VERSION; ?>
    </div>
    <?php } ?>
	</div>
  
  <div id="content-wrap">
  
    <div class="ts-info-top ts-info-docs">
    
    	<ul style="float:left;margin-left:-5px">
    		<li><a class="ts-options-help" href="http://themeshift.com/faq/" target="_blank"><?php _e('Basic Questions', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-general" href="http://themeshift.com/docs/" target="_blank"><?php _e('General Usage', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-docs" href="http://themeshift.com/<?php echo TS_DOMAIN; ?>/docs/" target="_blank"><?php _e('Theme Docs', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-forums" href="http://themeshift.com/forum/<?php echo TS_DOMAIN; ?>/" target="_blank"><?php _e('Forum', TS_DOMAIN); ?></a></li>
    	</ul>
    
    	<ul>
		    <li><a class="ts-options-login" href="http://themeshift.com/login/" target="_blank"><?php _e('Login', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-profile" href="http://themeshift.com/profile/" target="_blank"><?php _e('Profile', TS_DOMAIN); ?></a></li>
		</ul>
    
    </div>

    <div id="content">
      <div id="options_tabs" class="docs">
      
        <ul class="options_tabs">
          <li><a href="#help"><?php _e('Help Center', TS_DOMAIN); ?></a><span></span></li>
          <li><a href="#affiliates"><?php _e('Affiliate Program', TS_DOMAIN); ?></a><span></span></li>
          <li><a href="#devmode"><?php _e('Developer Mode', TS_DOMAIN); ?></a><span></span></li>
          <?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
          <li><a href="#option_types">Option Types</a><span></span></li>
          <li><a href="#settings">Option Fields</a><span></span></li>
          <?php } ?>
        </ul>
        
        <div id="help" class="block">

          <h3><?php _e('Help Center', TS_DOMAIN); ?></h3>
          
          <p><?php _e('ThemeShift theme packages inlcude support. That means that after purchasing a theme from ThemeShift you can register and create an account on the ThemeShift website. I will then manually upgrade your account. Please bear with me on week ends.', TS_DOMAIN); ?></p>
          
          <p><a href="http://themeshift.com/register/" class="button" target="_blank"><?php _e('Register', TS_DOMAIN); ?></a> <?php _e('or', TS_DOMAIN); ?> <a href="http://themeshift.com/login/" class="button" target="_blank"><?php _e('Login', TS_DOMAIN); ?></a></p>
          
          <h3><?php _e('Theme Support', TS_DOMAIN); ?></h3>
          
          <p><?php _e('Once your account is upgraded you have access to extensive theme documentation, tutorials, screencasts and the support forum. You can find useful shortlinks in the top bar of the theme options page.', TS_DOMAIN); ?></p>
          
          <h3><?php _e('Customizations', TS_DOMAIN); ?></h3>
          
          <p><?php _e('In the forum I try to cover minor theme modifications and tweaks. For major customizations please check out the list of recommended co-workers.', TS_DOMAIN); ?></p>
          
          <p><a href="http://themeshift.com/custom/" class="button" target="_blank"><?php _e('Custom Work', TS_DOMAIN); ?></a></p>
          
          <h3><?php _e('WordPress Support', TS_DOMAIN); ?></h3>
          
          <p><?php _e('Please understand that I cannot provide support for general WordPress questions. If your issue is not theme-related, please visit the Codex or the official WordPress forum.', TS_DOMAIN); ?></p>
          
          <p><a href="http://codex.wordpress.org/" class="button" target="_blank">WordPress Codex</a> <?php _e('or', TS_DOMAIN); ?> <a href="http://wordpress.org/support/" class="button" target="_blank">WordPress Forum</a></p>
          
        </div>
        
        <div id="affiliates" class="block">

          <h3>ThemeShift <?php _e('Affiliate Program', TS_DOMAIN); ?></h3>
          
          <p><?php _e('Signup to our affiliate program and generate some extra income. For every theme package sold through one of your affiliate links you get <strong>30% commision</strong>. Place a banner on your website and start making serious cash.', TS_DOMAIN); ?></p>
          
          <p><a href="http://themeshift.com/affiliates/" class="button" target="_blank"><?php _e('More info', TS_DOMAIN); ?></a> <?php _e('or', TS_DOMAIN); ?> <a href="http://themeshift.com/affiliates/banners/" class="button" target="_blank"><?php _e('Banners', TS_DOMAIN); ?></a></p>
          
        </div>
        
        <div id="devmode" class="block">

          <h3><?php _e('Developer Mode', TS_DOMAIN); ?></h3>
          
          <p><strong style="color:red;text-transform:uppercase">Please notice!</strong> Only enable the developer mode if you're really sure of what this is all about. This is only recommended if you want to heavily customize the theme and if your are a WordPress black belt.</p>
          
          <p>The developer mode gives you access to more advanced options where you can manage the items on the theme options page. Further you can set your own branding (upload custom theme options logo, set a custom menu icon and change the WordPress login logo).</p>
          
          <p>To activate the developer mode please open the theme file <code>/admin/ts-config.php</code> and look for this code:</p>
          
          <pre><code>if( !defined( 'TSO_DEV_MODE' ) )
	define( 'TSO_DEV_MODE', false );</code></pre>
	
		  <p>Now set the <code>TSO_DEV_MODE</code> to <code>true</code>:</p>
	
		  <pre><code>if( !defined( 'TSO_DEV_MODE' ) )
	define( 'TSO_DEV_MODE', true );</code></pre>
          
        </div>
        
        <?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
        <div id="option_types" class="block">

          <h3>Available Option Types <small>(Developer Mode)</small></h3>
          
          <p>
            <strong>Heading</strong>:<br />
            Used only in the WordPress Admin area to logical separate Theme Options into sections for easy editing. A Heading will create a navigation menu item on the <a href="<?php echo admin_url().'admin.php?page='.$this->admin_page; ?>"><strong>Theme Options</strong></a> page. You would NEVER use this in your themes template files.
          </p>
          
          <p>
            <strong>Textblock</strong>:<br />
            Used only in the WordPress Admin area. A Textblock will allow you to create &amp; display HTML on your <a href="<?php echo admin_url().'admin.php?page='.$this->admin_page; ?>"><strong>Theme Options</strong></a> page. You can then use the Textblock to add a more detailed set of instruction on how the options are used in your theme. You would NEVER use this in your themes template files.
          </p>
          
          <p>
            <strong>Input</strong>:<br />
            The Input option type would be used to save a simple string value. Maybe a link to feedburner, your Twitter username, or Google Analytics ID. Any optional or required text that is of reasonably short character length.
          </p>
          
          <p>
            <strong>Checkbox</strong>:<br />
            A Checkbox option type could ask a question. For example, "Do you want to activate asynchronous Google analytics?" would be a simple one checkbox question. You could have more complex usages but the idea is that you can easily grab the value of the checkbox and use it in you theme. In this situation you would test if the checkbox has a value and execute a block of code if it does and do nothing if it doesn't.
          </p>
          
          <p>
            <strong>Radio</strong>:<br />
            A Radio option type could ask a question. For example, "Do you want to activate the custom navigation?" could require a yes or no answer with a radio option. In this situation you would test if the radio has a value of 'yes' and execute a block of code, or if it's 'no' execute a different block of code. Since a radio has to be one or the other nothing will execute if you have not saved the options yet.
          </p>
          
          <p>
            <strong>Select</strong>:<br />
            Could use the Select option type to list different theme styles or choose any other setting that would be chosen from a select option list.
          </p>
          
          <p>
            <strong>Textarea</strong>:<br />
            With the Textarea option type users can add custom code or text for use in the theme.
          </p>
          
          <p>
            <strong>Upload</strong>:<br />
            The Upload option type is used to upload any WordPress supported media. After uploading, users are required to press the "<strong style="color:red;">Insert into Post</strong>" button in order to populate the input with the URI of that media. There is one caveat of this feature. If you import the theme options and have uploaded media on one site the old URI will not reflect the URI of your new site. You'll have to re-upload or FTP any media to your new server and change the URIs if necessary.
          </p>
          
          <p>
            <strong>Colorpicker</strong>:<br />
            A Colorpicker is a very self explanatory feature that saves hex HTML color codes. Use it to set/change the color of something in your theme.
          </p>
          
          <p>
            <strong>Post</strong>:<br />
            The Post option type is an option select list of post IDs. It will return a single post ID for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Posts</strong>:<br />
            The Posts option type is a checkbox list of post IDs. It will return an array of multiple post IDs for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Page</strong>:<br />
            The Page option type is an option select list of page IDs. It will return a single page ID for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Pages</strong>:<br />
            The Pages option type is a checkbox list of page IDs. It will return an array of multiple page IDs for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Category</strong>:<br />
            The Category type is an option select list of category IDs. It will return a single category ID for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Categories</strong>:<br />
            The Categories option type is a checkbox list of category IDs. It will return an array of multiple category IDs for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Tag</strong>:<br />
            The Tag option type is an option select list of tag IDs. It will return a single tag ID for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Tags</strong>:<br />
            The Tags option type is a checkbox list of tag IDs. It will return an array of multiple tag IDs for use in a custom function or loop.
          </p>
          
          <p>
            <strong>Custom Post</strong>:<br />
            The Custom Post option type is an option select list of IDs from any available wordpress post type or custom post type. It will return a single ID for use in a custom function or loop. Custom Post requires the post_type you are querying when created.
          </p>
          
          <p>
            <strong>Custom Posts</strong>:<br />
            The Custom Posts option type is a checkbox list of IDs from any available wordpress post type or custom post type. It will return an array of multiple IDs for use in a custom function or loop. Custom Posts requires the post_type you are querying when created.
          </p>
          
          <p>
            <strong>Measurement</strong>:<br />
            The Measurement option type is a mix of input and select fields. The text input excepts a value and the select list lets you choose the unit of measurement to add to that value. Currently the default units are px, %, em, pt. However, you can change them with the<code>measurement_unit_types</code> filter.
          </p>
          
          <p>
            <strong>Filter to completely change the units in the Measurement option type</strong><br />
            Added to functions.php
          </p>
          
          <pre><code>add_filter( 'measurement_unit_types', 'custom_unit_types' );

function custom_unit_types() 
{
  $array = array(
    'in' => 'inches',
    'ft' => 'feet'
  );
  return $array;
}</code></pre>

          <p>
            <strong>Filter to add new units in the Measurement option type</strong><br />
            Added to functions.php
          </p>
          
          <pre><code>add_filter( 'measurement_unit_types', 'custom_unit_types' );

function custom_unit_types($array) 
{
  $array['in'] = 'inches';
  $array['ft'] = 'feet';
  return $array;
}</code></pre>
          
          <p>
            <strong>Slider</strong>:<br />
            The Slider option type is a mix of elements that you can change with the<code>image_slider_fields</code> filter. The currently supported element types are text, textarea, & hidden. In the future there will be more input types. As well, the current inputs are order, title, image, link, & description. Order & title are required fields. However, the other three can be altered using the filter above.<br />
          
          <p>
            <strong>Filter to completely change the input fields in the Slider option type</strong><br />
            Added to functions.php
          </p>
          <pre><code>add_filter( 'image_slider_fields', 'new_slider_fields' );

function new_slider_fields() 
{
  $array = array(
    array(
      'name'  => 'image',
      'type'  => 'text',
      'label' => 'Post Image URL',
      'class' => ''
    ),
    array(
      'name'  => 'link',
      'type'  => 'text',
      'label' => 'Post URL',
      'class' => ''
    ),
    array(
      'name'  => 'description',
      'type'  => 'textarea',
      'label' => 'Post Description',
      'class' => ''
    )
  );
  return $array;
}</code></pre>

          <p>
            <strong>Filter to add a new field to the Slider option type</strong><br />
            Added to functions.php
          </p>
          <pre><code>add_filter( 'image_slider_fields', 'new_slider_fields' );

function new_slider_fields($array) 
{
  $array[] =
    array(
      'name'  => 'awesome_field',
      'type'  => 'text',
      'label' => 'Write Something Awesome',
      'class' => ''
    );
  return $array;
}</code></pre>			
                                     
        </div>
        
        <div id="settings" class="block">

          <h3>Theme Option Fields <small>(Developer Mode)</small></h3>
          
          <p>
            <strong>Title</strong>:<br />
            The Title field should be a short but descriptive block of text 100 characters or less with no HTML.
          </p>
          
          <p>
            <strong>Option Key</strong>:<br />
            The Option Key field is a unique alphanumeric key used to differentiate each theme option (underscores are acceptable). Also, the script will lowercase any text you write in this field and bridge all spaces with an underscore automatically.
          </p>
          
          <p style="padding-bottom:10px">
            <strong>Option Type</strong>:<br />
            You are required to choose one of the supported option types. They are:
          </p>
          <ul class="doc_list">
            <li>Heading</li>
            <li>Textblock</li>
            <li>Input</li>
            <li>Checkbox</li>
            <li>Radio</li>
            <li>Select</li>
            <li>Textarea</li>
            <li>Upload</li>
            <li>Colorpicker</li>
            <li>Post</li>
            <li>Posts</li>
            <li>Page</li>
            <li>Pages</li>
            <li>Category</li>
            <li>Categories</li>
            <li>Tag</li>
            <li>Tags</li>
            <li>Custom Post</li>
            <li>Custom Posts</li>
            <li>Measurement</li>
            <li>Slider</li>
            <li>Import</li>
            <li>Export</li>
          </ul>
          
          <p>
            <strong>Description</strong>:<br />
            Enter a detailed description of the option for end users to read. However, if the option type is a Textblock, enter the text you want to display (HTML is allowed).
          </p>

          <p>
            <strong>Options</strong>:<br />
            Enter a comma-separated list of options in this field. For example, you could have "One,Two,Three" or just a single value like "Yes" for a checkbox.
          </p>
          
          <p>
            <strong>Row Count</strong>:<br />
            Enter a numeric value for the number of rows in your textarea.
          </p>
          
          <p style="padding-bottom:10px">
            <strong>Post Type</strong>:<br />
            Enter your custom post type. These are the default post types available with WordPress. You can also add your own custom post type.
          </p>
          <ul class="doc_list">
            <li>post</li>
            <li>page</li>
            <li>attachment</li>
            <li>any</li>
          </ul>
          
        </div>
        <?php } ?>
        
        <br class="clear" />
      </div>
    </div>
    <div class="ts-info-bottom"></div>   
  </div>

</div>
<!-- [END] framework_wrap -->