<div id="tso-wrap" class="wrap">
	
	<div id="header">
	
		<?php if(empty($settings['ts_options_logo'])) { ?>		
	
		<h1><a href="http://themeshift.com" target="_blank">ThemeShift</a></h1>
		
		<?php if( true === TSO_DEV_MODE ){ // Dev-Mode ?>
		<div class="version">
		  <?php echo self::VERSION; ?>
		</div>
		<?php } ?>		
		
		<span class="theme"><?php echo TS_THEME. ' '. TS_VERSION; ?></span>
		
		<?php } else { ?>
		
		<div id="custom-logo"><img src="<?php echo $settings['ts_options_logo'] ?>" alt="" /></div>
		
		<?php } ?>
		
	</div>
  
  	<div id="content-wrap">
  	                   
  	  <form method="post" id="the-theme-options">
  	    
  	    <div class="ts-info-top">
  	    
  	    	<?php if(empty($settings['ts_options_links'][0])) { ?>
  	    	<ul>
  			    <li><a class="ts-options-help" href="http://themeshift.com/faq/" target="_blank"><?php _e('Basic Questions', TS_DOMAIN); ?></a></li>
  			    <li><a class="ts-options-general" href="http://themeshift.com/docs/" target="_blank"><?php _e('General Usage', TS_DOMAIN); ?></a></li>
  			    <li><a class="ts-options-docs" href="http://themeshift.com/<?php echo TS_DOMAIN; ?>/docs/" target="_blank"><?php _e('Theme Docs', TS_DOMAIN); ?></a></li>
  			    <li><a class="ts-options-forums" href="http://themeshift.com/forum/<?php echo TS_DOMAIN; ?>/" target="_blank"><?php _e('Forum', TS_DOMAIN); ?></a></li>
  			</ul>
  			<?php } ?>
  	
  	      <input type="submit" value="<?php _e('Save Changes'); ?>" class="button save-options" name="submit"/>
  	      
  	    </div>
  	
		<?php
  			$div = '<div class="ajax-message">';
  			if(	isset( $message ) ) { str_replace( '">', ' show">', $div ); }	
  			echo $div;
  	      
  			if ( isset( $message ) )
  			{
  				echo $message;
  			}
		?>	
  	
  	    </div>
  	    
  	    
  	    <div id="content">
  	    
  	      <div id="options_tabs"<?php if( false === TSO_DEV_MODE ) { ?> class="ts-dev-mode-off"<?php } ?>>
  	      
  	        <ul class="options_tabs">
  	        
  	          <?php
  	          foreach ( $items as $value ) 
  	          { 
  	
  	          if ( $value->item_type == 'heading' ) 
  	            {
  	            	echo '<li><a href="#option_'.$value->item_id.'" class="tab-'.$value->item_id.'">' . __(htmlspecialchars_decode( $value->item_title ), TS_DOMAIN).'</a><span></span></li>';
  	            } 
  	          } 
  			?>
  	        </ul>
  	       
  	          <?php
  	          // set count        
  	          $count = 0;
  	          // loop options & load corresponding function
  	 
  	          foreach ( $items as $value ) 
  	          {
  	          
  	            $count++;
  	
  	            if ( $value->item_type == 'upload' ) 
  	            {
  	              $int = $post_id;
  	            }
  	            else if ( $value->item_type == 'textarea' )
  	            {
  	              $int = ( is_numeric( trim( $value->item_options ) ) ) ? trim( $value->item_options ) : 8;
  	            }
  	            else
  	            {
  	              $int = $count;
  	            }
  	
  	            call_user_func_array( array( $this, '_'.$value->item_type ), array( $value, $settings, $int ) );
  	            
  	          }
  	          // close heading
  	          echo '</div>';
  	          ?>
  	          
  	        <br class="clear" />
  	        
  	      </div>
  	
  	    </div>
  	
  	    <div class="ts-info-bottom">
  	    
  	      <input type="submit" value="<?php _e('Reset Options', TS_DOMAIN); ?>" class="button reset" name="reset"/>
  	      <input type="submit" value="<?php _e('Save Changes'); ?>" class="button save-options" name="submit"/>
  	      
  	    </div>
  	    
  	    <?php wp_nonce_field( '_theme_options', '_ajax_nonce', false ); ?>
  	    
  	  </form>
  	
  	</div>

</div>
<!-- end tso-wrap -->