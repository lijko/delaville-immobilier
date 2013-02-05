<div id="tso-wrap" class="wrap">

	<div id="header">
    <h1><a href="http://themeshift.com" target="_blank">ThemeShift</a></h1>
    <span class="theme"><?php echo TS_THEME. ' '. TS_VERSION; ?></span>
    <?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
    <div class="version">
      <?php echo self::VERSION; ?>
    </div>
    <?php } ?>
	</div>
  
  <div id="content-wrap">
  
    <div class="ts-info-top ts-info-settings">
    
    	<ul>
		    <li><a class="ts-options-options" href="<?php echo admin_url().'admin.php?page=tso_options'; ?>"><?php _e('Theme Options', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-news" href="<?php echo admin_url().'admin.php?page=tso_news'; ?>"><?php _e('Themes &amp; News', TS_DOMAIN); ?></a></li>
		    <li><a class="ts-options-help" href="<?php echo admin_url().'admin.php?page=tso_docs'; ?>"><?php _e('Help Center', TS_DOMAIN); ?></a></li>
		</ul>
    
    </div>
    
   <?php
   // php file-errors
   $errors[0] = 'File uploaded';
   $errors[1] = 'File too large';
   $errors[2] = 'File too large';
   $errors[3] = 'The uploaded file was only partially uploaded';
   $errors[4] = 'No file was uploaded. Please select a file.';
   $errors[5] = 'Internal error. No further information.';
   $errors[6] = 'Internal error: Missing a temporary folder.';
   $errors[7] = 'Internal error: Failed to write file to disk';
   $errors[8] = 'Internal error: A PHP extension stopped the file upload.';
   
   // import file-errors
   $errors[9]	= 'Wrong file type. Not a txt-file.';
   $errors[10]	= 'File signature mismatch. File seems not to be a ThemeShift-Options file.';
   $errors[11] 	= 'Wrong version!<br />This file can not be used with this version (' . self::VERSION . ') of ThemeShift-Options.';
   
   
		$div = '<div class="ajax-message">';
		if(	isset( $message ) ||
			isset( $_GET['file_error'] ) 
			)
		{
			$div = str_replace( '">', ' show">', $div );
		}	
		
		echo $div;
		
		if( isset( $_GET['file_error'] ) )
		{
			$message = '<div class="message"><span>&nbsp;</span>' . $errors[ $_GET['file_error'] ] . '</div>';
			
			if( 0 != $_GET['file_error'] )
			{
				$message = str_replace( '">', ' warning">', $message );
			}
		}
        
		if ( isset( $message ) )
		{
			echo $message;
		}
		
		echo '</div>';
?> 
    <div id="content">
      <div id="options_tabs" class="settings">
        <ul class="options_tabs">
          <li><a href="#ts_settings" class="tab-general_default">Create Options</a><span></span></li>
          <li><a href="#import_export">Import / Export</a><span></span></li>
          <li><a href="#create-defaults">Default Values</a><span></span></li>          
        </ul>
        
        <div id="ts_settings" class="block has-table">
          <form method="post" id="theme-options" class="option-tree-settings">
            <h3>Create Theme Options</h3>
            <p><strong style="color:red;text-transform:uppercase">Please notice!</strong> If you're unsure or not completely positive that you should be editing these options, you should read the <a href="<?php echo admin_url().'admin.php?page=tso_docs'; ?>"><strong>documentation</strong></a> first.</p>
            <p>You can create as many theme options as your project requires and use them how you see fit. When you add an option here, it will be available on the <a href="<?php echo admin_url().'admin.php?page=tso_options'; ?>"><strong>theme options</strong></a> page for use in your theme. To break your theme options page into sections, add a "<strong>heading</strong>" option type and a new navigation menu item will be created.</p>
            <p>All of the theme options can be sorted and rearranged to your liking via <strong>Drag &amp; Drop</strong>. So don't worry about the order in which you create your options. You can always reorder them.</p>
            <table cellspacing="0">
              <thead>
                <tr>
                  <th class="col-title">Title</th>
                  <th class="col-key">Key</th>
                  <th class="col-type">Type</th>
                  <th class="col-edit"><a href="javascript:false;" class="add-option">Add Option</a></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="col-title">Title</th>
                  <th class="col-key">Key</th>
                  <th class="col-type">Type</th>
                  <th class="col-edit"><a href="javascript:false;" class="add-option">Add Option</a></th>
                </tr>
              </tfoot>
              <tbody id="tso-settings" class="dragable">
              <?php 
                $count = 0;
                foreach ( $items as $value ) {
                $count++;
                $heading = ($value->item_type == 'heading') ? true : false; ?>
          			<tr id="option-<?php echo $value->id; ?>" class="<?php echo ($heading) ? 'col-heading ' : ''; ?><?php echo ($count==1) ? 'nodrag nodrop' : ''; ?>">
          		    <td class="col-title"<?php echo ($heading) ? ' colspan="3"' : ''; ?>><?php echo (!$heading) ? '&ndash; ' : ''; ?><?php echo htmlspecialchars_decode( $value->item_title ); ?></td>
          				<td class="col-key<?php echo ($heading) ? ' hide' : ''; ?>"><?php echo htmlspecialchars(stripslashes($value->item_id)); ?></td>
          				<td class="col-type<?php echo ($heading) ? ' hide' : ''; ?>"><?php echo $value->item_type; ?></td>
          				<td class="col-edit">
          				  <a href="javascript:false;" class="edit-inline">Edit</a>
          				  <a href="javascript:false;" class="delete-inline">Delete</a>
          				  <div class="hidden item-data" id="inline_<?php echo $value->id; ?>">
                      <div class="item_title"><?php echo htmlspecialchars_decode( $value->item_title ); ?></div>
                      <div class="item_id"><?php echo $value->item_id; ?></div>
                      <div class="item_type"><?php echo $value->item_type; ?></div>
                      <div class="item_desc"><?php echo esc_html(stripslashes($value->item_desc)); ?></div>
                      <div class="item_options"><?php echo esc_html(stripslashes($value->item_options)); ?></div>
                      <div class="item-no" id="item-<?php echo $value->id; ?>" style="display:none"><?php echo $value->id; ?></div>
                    </div>
     				</td>
          			</tr>
              <?php } ?>
              </tbody>
            </table>
            <table style="display:none">
              <tbody id="tso-settings-edit">
          			<tr id="inline-edit" class="inline-edit-option nodrop nodrag">
          				<td colspan="4">
          				  <div class="option option-title">
          				    <div class="section">
                        <div class="element">
                          <input type="text" name="item_title" class="item_title" value="" />
                        </div>
                        <div class="description">
                          <strong>Title:</strong> Displayed on the Theme Options page.
                        </div>
                      </div>
          				  </div>
          				  <div class="option option-id">
          				    <div class="section">
                        <div class="element">
                          <input type="text" name="item_id" class="item_id" value="" />
                        </div>
                        <div class="description">
                          <strong>Option Key:</strong> Unique alphanumeric key, underscores are acceptable.
                        </div>
                      </div>
          				  </div>
          				  <div class="option option-type">
          				    <div class="section">
                        <div class="element">
                          <div class="select_wrapper">
                            <select name="item_type" class="select item_type">
                            <?php
                            $types = array(
                              'heading'       => 'Heading',
                              'textblock'     => 'Textblock',
                              'input'         => 'Input',
                              'checkbox'      => 'Checkbox',
                              'radio'         => 'Radio',
                              'select'        => 'Select',
                              'textarea'      => 'Textarea',
                              'upload'        => 'Upload',
                              'colorpicker'   => 'Colorpicker',
                              'post'          => 'Post',
                              'posts'         => 'Posts',
                              'page'          => 'Page',
                              'pages'         => 'Pages',
                              'category'      => 'Category',
                              'categories'    => 'Categories',
                              'tag'           => 'Tag',
                              'tags'          => 'Tags',
                              'custom_post'   => 'Custom Post',
                              'custom_posts'  => 'Custom Posts',
                              'taxonomy'  	  => 'Custom Taxonomy',
                              'taxonomies'    => 'Custom Taxonomies',
                              'measurement'   => 'Measurement',
                              'slider'        => 'Slider',
                              'import'		  => 'Import',
                              'export'		  => 'Export',
                            );
                            foreach ( $types as $key => $value ) 
                            {
                              echo '<option value="'.$key.'">'.$value.'</option>';
                            } 
                            ?>
                            </select>
                          </div>
                        </div>
                        <div class="description">
                          <strong>Option Type:</strong> Choose one of the supported option types.
                        </div>
                      </div>
          				  </div>
          				  <div class="option option-desc">
          				    <div class="section">
                        <div class="element">
                          <textarea name="item_desc" class="item_desc" rows="8"></textarea>
                        </div>
                        <div class="description">
                          <strong>Description:</strong> Enter a detailed description of the option for end users to read. However, if the option type is a <strong>Textblock</strong>, enter the text you want to display (HTML is allowed).
                        </div>
                      </div>
          				  </div>
          				  <div class="option option-options">
          				    <div class="section">
                        <div class="element">
                          <input type="text" name="item_options" class="item_options" value="" />
                        </div>
                        <div class="description">
                          <span class="regular"><strong>Options:</strong> Enter a comma separated list of options. For example, you could have "One,Two,Three" or just a single value like "Yes" for a checkbox.</span>
                          <span class="alternative" style="display:none;">&nbsp;</span>
                        </div>
                      </div>
          				  </div>
          				  <?php wp_nonce_field( 'inlineeditnonce', '_ajax_nonce', false ); ?>
          				  <div class="inline-edit-save">
          				    <a href="javascript:return false;" class="cancel button reset">Cancel</a> 
          				    <a href="javascript:return false;" class="save button">Save</a>
          				  </div>
          				</td>
          		  </tr>
          		  <tr id="inline-add">
          		    <td class="col-title"></td>
          				<td class="col-key"></td>
          				<td class="col-type"></td>
          				<td class="col-edit">
          				  <a href="javascript:return false;" class="edit-inline">Edit</a>
          				  <a href="javascript:return false;" class="delete-inline">Delete</a>
          				  <div class="hidden item-data">
                      <div class="item_title"></div>
                      <div class="item_id"></div>
                      <div class="item_type"></div>
                      <div class="item_desc"></div>
                      <div class="item_options"></div>
                    </div>
          				</td>
          		  </tr>
              </tbody>
            </table>
          </form> 
        </div>
        
        <div id="import_export" class="block">
          <form method="post" enctype="multipart/form-data" id="upload-xml">
           <input type="hidden" name="action" value="import" />
           <?php wp_nonce_field( '_theme_options', '_ajax_nonce', false ); ?>
            <div class="option option-upload">
              <h3>Theme Settings Import</h3>
              <div class="section desc-text">
                <p>It's possible that you did all your development on a local server and just need to get your live site in working condition from your own exported settings file. Either way, once you have the proper file in the input field below, click the "<strong>Import</strong>" button.</p>
                <input type="file" name="import" class="file" />				
                <input type="submit" value="<?php _e( 'Import', TS_DOMAIN ) ?>" class="ts-button right" />
              </div>
            </div>
          </form>
          <h2>Export</h2>
	          <form method="post" id="exporter">
	            <div class="option option-input">
	              <h3>Theme Settings Export</h3>
	              <div class="section desc-text">
	                <p>It's possible that you did all your development on a local server and just need to get your live site in working condition with your own exported settings file. Once you have properly created all your theme settings, click the "<strong>Export</strong>" button to download the export file of the current settings.</p>
	                <?php wp_nonce_field( '_theme_options', '_ajax_nonce', false ); ?>
	                <input type="hidden" name="action" value="export" />
	                <input type="submit" value="<?php _e('Export', TS_DOMAIN); ?>" class="export-options ts-button left" />
	              </div>
	            </div>
	          </form>
        </div>
                
		<div id="create-defaults" class="block">
			
			<div class="section desc-text">
			
				<h3>Create Option Default Values</h3>
				
				<p>There are three steps to create your the default values for the theme options:</p>
				
				<p style="padding-bottom:10px"><strong>1. Clear old array:</strong></p>
				<p>Clear the old ts-defaults array by clicking the Button below. This is necessary to avoid overwriting your new settings by the old default values. <strong style="color:red;text-transform:uppercase">Attention!</strong> There is no undo and the array will be deleted directly in the <code>ts-config.php</code>. If you're unsure, make a backup of this file first.</p>
				
				<p style="padding-bottom:10px"><strong>2. Make new settings:</strong></p>
				<p>Go to the <a href="<?php echo admin_url().'admin.php?page=tso_options'; ?>">theme options</a> page and make your new default settings. <strong style="color:red;text-transform:uppercase">Attention!</strong> Don't forget to save the changes.</p>
				
				<p style="padding-bottom:10px"><strong>3. Get new array:</strong></p>
				<p style="padding-bottom:10px">Come back to this page and grab the array with your new default settings. There are two different ways to get the new array of the theme options default values.
				
				<p style="padding-bottom:10px">The easier (recommended) way is to use the autostoring. The default values will directly be written to the file <code>ts-config.php</code>. Make sure this file is writable.</p>
				
				<p style="padding-bottom:10px">The other way is to copy the array from the textbox below and to paste it into <code>ts-config.php</code>. Use this way if the file is not wrtiteable and you're not sure how to do this.</p>
				
				
				<p>With <em>Read default array</em> you can import the current <code>ts_default</code> array (wich is stored in your <code>ts-config.php</code>) into the textbox below, edit the array and save it again.</p>
			
			</div>
			
			<h3>Current Default Settings</h3>
			
			<form method="post" id="create_defaults" style="display:inline; width:125px; float:right">
			
				<p><input type="submit" name="save_defaults" id="save_defaults" value="Save default array" class="ts-button save-defaults" style="width:125px;float:none" /></p>
				<p><input type="submit" name="clear_defaults" id="clear_defaults" value="Clear default array" class="ts-button clear-defaults" style="width:125px;float:none" /></p>
				<p><input type="submit" name="read_defaults" id="read_defaults" value="Read default array" class="ts-button read-defaults" style="width:125px;float:none" /></p>
			
			</form>
			
			<p style="float:left;width:440px">
			
				<?php 
				$defaults = get_option( self::OPTION_FRONTEND );
				
				foreach($defaults as $key => $val )
				{
					if( empty( $defaults[$key] ) ) 
						unset($defaults[$key]);
				}
				
				$e = var_export($defaults, true);
				
				?>
			
				<textarea id="default_array_show" cols="30" rows="20" style="width:100%"><?php echo '$ts_defaults = '.$e.';'; ?></textarea>
				
			</p>        		
		        
		</div>
        
        <br class="clear" />
      </div>
    </div>
    <div class="ts-info-bottom">
      <input type="hidden" name="action" value="save" />
    </div>   
  </div>

</div>
<!-- [END] framework_wrap -->