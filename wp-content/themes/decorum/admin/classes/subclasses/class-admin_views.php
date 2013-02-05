<?php
/**
 * ThemeShift Options Admin_Views
 * Methods used by the AJAX script in options.php
 *
 * @package WordPress
 * @subpackage ThemeShift Options
 * @since 0.1.0
 * @author Ralf Albert
 */

class Admin_Views extends TSO_Core
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
	 * Page Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _page( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( '_select', $value->item_title );
		
			?>
			<div class="select_wrapper">
				<select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
			<?php
			$pages = &get_pages();
			if ( $pages )
			{
				echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
					foreach ( $pages as $page ) 
					{
						$selected = '';
						if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $page->ID ) 
						{ 
							$selected = ' selected="selected"'; 
						}
						echo '<option value="'.$page->ID.'"'.$selected.'>'.$page->post_title.'</option>';
					}
			} 
			else 
			{
				echo '<option value="0">&ndash; ' . __('No pages available', TS_DOMAIN) . '</option>';
			}
			?>
				</select>
			</div>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Pages Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _pages( $value, $settings, $int ) 
	{ 
		// Verwendung von _checkbox da in _get_header _ zu - umgewandelt wird
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );
	
			// loop through pages
			  $pages = &get_pages();
			if ( $pages )
			{
			  $count = 0;
			  foreach ( $pages as $page ) 
			  {
				$checked = '';
				if ( in_array( $page->ID, $ch_values ) ) 
				{ 
				  $checked = ' checked="checked"'; 
				}
				echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$page->ID.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$page->post_title.'</label></div>';
				$count++;
				}
			}
			else
			{
			  echo '<p style="white-space:nowrap">&ndash; ' . __('No pages available', TS_DOMAIN) . '</p>';
			}
	
		echo $this->_get_footer( $value->item_desc );
	}
	
	/**
	 * Post Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _post( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( '_select', $value->item_title );
	
			?>
	<div class="select_wrapper">
	  <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
	  <?php
		$posts = &get_posts( array( 'numberposts' => -1, 'orderby' => 'date' ) );
		if ( $posts )
		{
		echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
		foreach ( $posts as $post ) 
		{
		  $selected = '';
			if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $post->ID ) 
			{ 
			$selected = ' selected="selected"'; 
		  }
			echo '<option value="'.$post->ID.'"'.$selected.'>'.$post->post_title.'</option>';
		}
	  } 
	  else 
	  {
		echo '<option value="0">&ndash; ' . __('No posts available', TS_DOMAIN) . '</option>';
	  }
	  ?>
	  </select>
	</div>
	<?php
			
		echo $this->_get_footer( $value->item_desc );
	}
	
	/**
	 * Posts Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _posts( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );		
	
		// loop through posts
			  $posts = &get_posts( array( 'numberposts' => -1, 'orderby' => 'date' ) );
			if ( $posts )
			{
			  $count = 0;
			  foreach ( $posts as $post ) 
			  {
				$checked = '';
				if ( in_array( $post->ID, $ch_values ) ) 
				{ 
				  $checked = ' checked="checked"'; 
				}
				echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$post->ID.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$post->post_title.'</label></div>';
				$count++;
				}
			}
			else
			{
			  echo '<p style="white-space:nowrap">&ndash; ' . __('No posts available', TS_DOMAIN) . '</p>';
			}
		
		echo $this->_get_footer( $value->item_desc );
	}
	
	/**
	 * Tag Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _tag( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( '_select', $value->item_title );
	
			?>
	<div class="select_wrapper">
	  <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
	  <?php
		$tags = &get_tags( array( 'hide_empty' => false ) );
		if ( $tags )
		{
		echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
		foreach ( $tags as $tag ) 
		{
		  $selected = '';
			if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $tag->term_id ) 
			{ 
			$selected = ' selected="selected"'; 
		  }
			echo '<option value="'.$tag->term_id.'"'.$selected.'>'.$tag->name.'</option>';
		}
	  } 
	  else 
	  {
		echo '<option value="0">&ndash; ' . __('No tags available', TS_DOMAIN) . '</option>';
	  }
	  ?>
	  </select>
	</div>
	<?php
			
		echo $this->_get_footer( $value->item_desc );
	}
	
	/**
	 * Tags Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _tags( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );		
	
			// loop through tags
			  $tags = &get_tags( array( 'hide_empty' => false ) );
			if ( $tags )
			{
			  $count = 0;
			  foreach ( $tags as $tag ) 
			  {
				$checked = '';
				if ( in_array( $tag->term_id, $ch_values ) ) 
				{ 
				  $checked = ' checked="checked"'; 
				}
				echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$tag->term_id.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$tag->name.'</label></div>';
				$count++;
				}
			}
			else
			{
			  echo '<p style="white-space:nowrap">&ndash; ' . __('No tags available', TS_DOMAIN) . '</p>';
			}
	
		echo $this->_get_footer( $value->item_desc );
	
	}
	
	/**
	 * Custom Post Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _custom_post( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_select', $value->item_title );
			?>
	        <div class="select_wrapper">
	          <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
	          <?php
	       		$posts = &get_posts( array( 'post_type' => trim($value->item_options), 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
	       		if ( $posts )
	       		{
	            echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
	            foreach ( $posts as $post ) 
	            {
	              $selected = '';
	    	        if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $post->ID ) 
	    	        { 
	                $selected = ' selected="selected"'; 
	              }
	            	echo '<option value="'.$post->ID.'"'.$selected.'>'.$post->post_title.'</option>';
	            }
	          } 
	          else 
	          {
	            echo '<option value="0">&ndash; ' . __('No custom posts available', TS_DOMAIN) . '</option>';
	          }
	          ?>
	          </select>
	        </div>
			<?php
		
		echo $this->_get_footer( $value->item_desc );		
	}

	/**
	 * Custom Posts Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _custom_posts( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );		
		
	        // loop through tags
		      $posts = &get_posts( array( 'post_type' => $value->item_options, 'numberposts' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
	       	if ( $posts )
	       	{
	       	  $count = 0;
	  	      foreach ( $posts as $post ) 
	  	      {
	            $checked = '';
	  	        if ( in_array( $post->ID, $ch_values ) ) 
	  	        { 
	              $checked = ' checked="checked"'; 
	            }
	  	        echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$post->ID.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$post->post_title.'</label></div>';
	  	        $count++;
	       		}
	       	}
	       	else
	       	{
	       	  echo '<p style="white-space:nowrap">&ndash; ' . __('No custom posts available', TS_DOMAIN) . '</p>';
	       	}
		echo $this->_get_footer( $value->item_desc );
	}
	
	/**
	 * Custom Taxonomy Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _taxonomy( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_select', $value->item_title );
			?>
	        <div class="select_wrapper">
	          <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
	          <?php
	          	$taxonomies = explode(",", $value->item_options);
	       		$terms = &get_terms($taxonomies, array('orderby' => 'name', 'hide_empty' => 0));
	       		if ( $terms )
	       		{
	            echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
	            foreach ( $terms as $term ) 
	            {
	              $selected = '';
	    	        if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $term->taxonomy.','.$term->slug ) 
	    	        { 
	                $selected = ' selected="selected"'; 
	              }
	            	echo '<option value="'.$term->taxonomy.','.$term->slug.'"'.$selected.'>'.$term->name.'</option>';
	            }
	          } 
	          else 
	          {
	            echo '<option value="0">&ndash; ' . __('No taxonomies available', TS_DOMAIN) . '</option>';
	          }
	          ?>
	          </select>
	        </div>
			<?php
		
		echo $this->_get_footer( $value->item_desc );		
	}
	
	/**
	 * Custom Taxonomies Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */	
	public function _taxonomies( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $term->taxonomy.','.$term->slug );		
		
	        // loop through $terms
		    $taxonomies = explode(",", $value->item_options);
	       	$terms = &get_terms($taxonomies, array('orderby' => 'name', 'hide_empty' => 0));
	       	if ( $terms )
	       	{
	       	  $count = 0;
	  	      foreach ( $terms as $term ) 
	  	      {
	            $checked = '';
	  	        if ( in_array( $term->term_id, $ch_values ) ) 
	  	        { 
	              $checked = ' checked="checked"'; 
	            }
	  	        echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$term->taxonomy.','.$term->slug.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$term->name.'</label></div>';
	  	        $count++;
	       		}
	       	}
	       	else
	       	{
	       	  echo '<p style="white-space:nowrap">&ndash; ' . __('No taxonomies available', TS_DOMAIN) . '</p>';
	       	}
	
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Category Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _category( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_select', $value->item_title );
			
			?>
	        <div class="select_wrapper">
	          <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
	          <?php
	       		$categories = &get_categories( array( 'hide_empty' => false ) );
	       		if ( $categories )
	       		{
	       	    echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
	            foreach ($categories as $category) 
	            {
	              $selected = '';
	    	        if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] == $category->term_id ) 
	    	        { 
	                $selected = ' selected="selected"'; 
	              }
	            	echo '<option value="'.$category->term_id.'"'.$selected.'>'.$category->name.'</option>';
	            }
	          }
	          else
	          {
	            echo '<option value="0">&ndash; ' . __('No categories available', TS_DOMAIN) . '</option>';
	          }
	          ?>
	          </select>
	        </div>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Categories Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _categories( $value, $settings, $int ) 
	{
		echo $this->_get_header( '_checkbox', __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );		
		
	        // loop through tags
		      $categories = &get_categories( array( 'hide_empty' => false ) );
	       	if ( $categories )
	       	{
	       	  $count = 0;
	  	      foreach ( $categories as $category ) 
	  	      {
	            $checked = '';
	  	        if ( in_array( $category->term_id, $ch_values ) ) 
	  	        { 
	              $checked = ' checked="checked"'; 
	            }
	  	        echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.$category->term_id.'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.$category->name.'</label></div>';
	  	        $count++;
	       		}
	       	}
	       	else
	       	{
	       	  echo '<p style="white-space:nowrap">&ndash; ' . __('No categories available', TS_DOMAIN) . '</p>';
	       	}
	
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Radio Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _radio( $value, $settings, $int ) 
	{ 
		echo $this->_get_header( __FUNCTION__, $value->item_title );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );

			$count = 0;
			// loop through options array
			  foreach ( explode( ',', $value->item_options ) as $option ) 
			  {
			  $checked = '';
				if ( in_array( trim( $option ), $ch_values ) ) 
				{ 
				$checked = ' checked="checked"'; 
			  }
				echo '<div class="input_wrap"><input name="'.$value->item_id.'" id="'.$value->item_id.'_'.$count.'" type="radio" value="'.trim( $option ).'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.trim( $option ).'</label></div>';
				$count++;
				}

		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Input Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _input( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			
			?>
			<input type="text" name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" value="<?php if ( isset($settings[$value->item_id]) ) { echo htmlspecialchars( stripslashes( $settings[$value->item_id] ), ENT_QUOTES); } ?>" />
			<?php
		
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Select Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _select( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			
			$options_array = explode( ',', $value->item_options ); ?>
			<div class="select_wrapper">
			  <select name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" class="select">
			  <?php
			  echo '<option value="">' . __('Please select', TS_DOMAIN) . '&hellip;</option>';
			  foreach ( $options_array as $option ) 
			  {
				$selected = '';
				if ( $settings[$value->item_id] == trim( $option ) ) 
				{ 
				  $selected = ' selected="selected"'; 
				}
				echo '<option'.$selected.'>'.trim( $option ).'</option>';
				} 
			  ?>
			  </select>
			</div>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Checkbox Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _checkbox( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, __( $value->item_title, TS_DOMAIN ) );
		$ch_values = $this->_check_for_settings_item_value( $settings, $value->item_id );		

			$count = 0;
			// loop through options array
			  foreach ( explode( ',', $value->item_options ) as $option ) 
			  {
			  $checked = '';
				if ( in_array( trim( $option ), $ch_values ) ) 
				{ 
				$checked = ' checked="checked"'; 
			  }
				echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.trim( $option ).'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.__( trim( $option ), TS_DOMAIN ).'</label></div>';
				$count++;
				}
			
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Textarea Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _textarea( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			?>
			<textarea name="<?php echo $value->item_id; ?>" rows="<?php echo $int; ?>"><?php 
			  if ( isset( $settings[$value->item_id] ) ) 
				echo stripslashes($settings[$value->item_id]);
			  ?></textarea>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Text Block Option
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _textblock( $value, $settings, $int ) 
	{ 
	?>
	  <div class="option option-textblock">
		<h3 class="text-title"><?php echo __( htmlspecialchars_decode( $value->item_title ) ,TS_DOMAIN ); ?></h3>
		<div class="section">
		  <div class="text_block">
			<?php echo __( htmlspecialchars_decode( $value->item_desc ) ,TS_DOMAIN ); ?>
		  </div>
		</div>
	  </div>
	<?php
	}
	
	/**
	 * Heading Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _heading( $value, $settings, $int ) 
	{
	  echo ( $int > 1 ) ? '</div>' : false;
	  echo '<div id="option_' . $value->item_id . '" class="block">';
	  echo '<h2>' . htmlspecialchars_decode( $value->item_title ) . '</h2>';
	  echo '<input type="hidden" name="' . $value->item_id . '" value="' . htmlspecialchars_decode( $value->item_title ) . '" />';
	}

	/**
	 * Image Slider Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _slider( $value, $settings, $int ) 
	{ 
		echo $this->_get_header(__FUNCTION__, $value->item_title );
	
			$count = 0;
			?>
			
	<p><?php _e( htmlspecialchars_decode( $value->item_desc ), TS_DOMAIN ) ?></p>
	
	<ul class="ui-sortable ts-slider-wrap">
	<?php
	if ( !empty( $settings[$value->item_id] ) ) {
	  foreach( $settings[$value->item_id] as $image ) { ?>
	<li><?php $this->slider_view( $value->item_id, $image, $count ); ?></li><?php 
		$count++;
	  }
	} 
	?>
	</ul>
	<a href="javascript:return false;" id="<?php echo $value->item_id; ?>" class="button-framework light add-slide"><?php _e('Add slide', TS_DOMAIN); ?></a>
	<?php 
		
		$value->item_desc = '';
		echo $this->_get_footer( $value->item_desc );
		
	}
	
	/**
	 * Image Slider HTML
	 *
	 * @since 0.1.0
	 * @access public
	 * @param string $id
	 * @param array $image
	 * @param int $count
	 * @return string
	 */
	public function _slider_view( $id, $image, $count ){
		$this->slider_view( $id, $image, $count );
	}
	
	public function slider_view( $id, $image, $count ) 
	{
	  // required fileds
	  $requred_fields = array(
	    array(
	      'name'  => 'order',
	      'type'  => 'hidden',
	      'label' => '',
	      'class' => 'ts-slider-order'
	    ),
	    array(
	      'name'  => 'title',
	      'type'  => 'text',
	      'label' => __('Title', TS_DOMAIN),
	      'class' => 'ts-slider-title'
	    )
	  );
	  
	  // optional fields
	  $image_slider_fields = array(
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
	  
	  // filter the optional fields
	  $image_slider_fields = apply_filters( 'image_slider_fields', $image_slider_fields );
	  
	  // merge required & optional  arrays
	  $image_slider_fields = array_merge( $requred_fields, $image_slider_fields );
	  ?>
	  <div id="ts-slider-editor_<?php echo $count; ?>" class="ts-slider">
	    <div class="open">
	      <?php echo empty( $image['title'] ) ? "Slide " . ($count + 1) : stripslashes($image['title']); ?>
	    </div>
	    <a href="javascript:return false;" class="edit"><?php _e('Edit', TS_DOMAIN); ?></a>
	    <a href="javascript:return false;" class="trash remove-slide"><?php _e('Delete', TS_DOMAIN); ?></a>
	    <div class="ts-slider-body">
	      <?php
	      foreach( $image_slider_fields as $field ) {
	        if ( $field['type'] == 'text' ) {
	          echo '
	          <p>
	            <label>'.$field['label'].'</label>
	            <input type="text" name="'.$id.'['.$count.']['.$field['name'].']" value="'.( isset( $image[$field['name']] ) ? stripslashes($image[$field['name']]) : '' ).'" class="'.$field['class'].'" />
	          </p>';
	        } else if ( $field['type'] == 'textarea' ) {
	          echo '
	          <p>
	            <label>'.$field['label'].'</label>
	            <textarea name="'.$id.'['.$count.']['.$field['name'].']" rows="6" class="'.$field['class'].'">'.( isset( $image[$field['name']] ) ? stripslashes($image[$field['name']]) : '' ).'</textarea>
	          </p>';
	        } else if ( $field['type'] == 'hidden' ) {
	          echo '<input type="hidden" name="'.$id.'['.$count.']['.$field['name'].']" value="'.( isset( $image[$field['name']] ) ? stripslashes($image[$field['name']]) : '' ).'" class="'.$field['class'].'" />';
	        }
	      }
	      ?>
	    </div>
	  </div>
	  <?php
	}

	/**
	 * Measurement Option
	 *
	 * @access public
	 * @since 1.1.2
	 * @contributors valendesigns & youngmicroserf
	 *
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 *
	 * @return string
	 */
	public function _measurement( $value, $settings, $int ) {
	  echo $this->_get_header( __FUNCTION__, $value->item_title );
	
	  	if ( isset( $settings[$value->item_id] ) )
	          $measurement = $settings[$value->item_id]; ?>
	        <input type="text" name="<?php echo $value->item_id; ?>[0]" value="<?php if ( isset( $measurement[0] ) ) { echo htmlspecialchars( stripslashes( $measurement[0] ), ENT_QUOTES); } ?>" class="measurement" />
	
	        <div class="select_wrapper measurement">
	          <select name="<?php echo $value->item_id; ?>[1]" class="select">
	            <?php
	            echo '<option value="">&nbsp;-- </option>';
	            $units = array(
	              'px' => 'px',
	              // '%'  => '%',
	              'em' => 'em',
	              // 'pt' => 'pt'
	            );
	            // filter the unit types
	            $units = apply_filters( 'measurement_unit_types', $units );
	            foreach ( $units as $unit ) {
	              if ( isset( $measurement[1] ) && $measurement[1] == trim( $unit ) ) { 
	                $selected = ' selected="selected"'; 
	              } else {
	                $selected = '';
	              }
	              echo '<option'.$selected.' value="'.trim( $unit ).'">&nbsp;'.trim( $unit ).'</option>';
	            } 
	            ?>
	          </select>
	        </div>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}	

	/**
	 * ColorPicker Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _colorpicker( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			?>
	        <script type="text/javascript">
	        jQuery(document).ready(function($) {  
	          $('#<?php echo $value->item_id; ?>').ColorPicker({
	            onSubmit: function(hsb, hex, rgb) {
	            	$('#<?php echo $value->item_id; ?>').val('#'+hex);
	            },
	            onBeforeShow: function () {
	            	$(this).ColorPickerSetColor(this.value);
	            	return false;
	            },
	            onChange: function (hsb, hex, rgb) {
	            	$('#cp_<?php echo $value->item_id; ?> div').css({'backgroundColor':'#'+hex, 'backgroundImage': 'none', 'borderColor':'#'+hex});
	            	$('#cp_<?php echo $value->item_id; ?>').prev('input').attr('value', '#'+hex);
	            }
	          })	
	          .bind('keyup', function(){
	            $(this).ColorPickerSetColor(this.value);
	          });
	        });
	        </script>
	        <input type="text" name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" value="<?php echo ( isset( $settings[$value->item_id] ) ) ? stripslashes( $settings[$value->item_id] ) : ''; ?>" class="cp_input" />
	        <div id="cp_<?php echo $value->item_id; ?>" class="cp_box">
	          <div style="background-color:<?php echo ( isset ($settings[$value->item_id] ) ) ? $settings[$value->item_id] : '#ffffff'; ?>;<?php if ( isset( $settings[$value->item_id] ) ) { echo 'background-image:none;border-color:' . $settings[$value->item_id] . ';'; } ?>"> 
	          </div>
	        </div> 
	        <small><?php _e('Click text box to open color picker', TS_DOMAIN); ?></small>
			<?php
			
		echo $this->_get_footer( $value->item_desc );
	}	
	
	/**
	 * Upload Option
	 *
	 * @since 0.1.0
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _upload( $value, $settings, $int ) {
		echo $this->_get_header( __FUNCTION__, $value->item_title );
		
			?>
			
			<div class="screenshot" id="<?php echo $value->item_id; ?>_image">
	          <?php 
	          if ( isset( $settings[$value->item_id] ) && $settings[$value->item_id] != '' ) 
	          { 
	            $remove = '<a href="javascript:return false;" class="remove">Remove</a>';
	            $image = preg_match( '/(^.*\.jpg|jpeg|png|gif|ico*)/i', $settings[$value->item_id] );
	            if ( $image ) 
	            {
	              echo '<div class="image"><img src="'.$settings[$value->item_id].'" alt="" />'.$remove.'</div>';
	            } 
	            else 
	            {
	              $parts = explode( "/", $settings[$value->item_id] );
	              for( $i = 0; $i < sizeof($parts); ++$i ) 
	              {
	                $title = $parts[$i];
	              }
	              echo '<div class="no_image"><a href="'.$settings[$value->item_id].'">'.$title.'</a>'.$remove.'</div>';
	            }
	          }
	          ?>
	        </div>
			
	        <input type="text" name="<?php echo $value->item_id; ?>" id="<?php echo $value->item_id; ?>" value="<?php if ( isset( $settings[$value->item_id] ) ) { echo $settings[$value->item_id]; } ?>" class="upload<?php if ( isset( $settings[$value->item_id] ) ) { echo ' has-file'; } ?>" />
	        <input id="upload_<?php echo $value->item_id; ?>" class="upload_button" type="button" value="Upload" rel="<?php echo $int; ?>" />
	        
			<?php
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Export data for Endusers Option
	 *
	 * @since 0.2.3
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _export( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			$settings['ThemeShiftVersion'] = self::VERSION;
			$data = base64_encode( serialize( $settings ) );
			?>
				<textarea name="user_export" id="user_export" cols="20" rows="10" readonly><?php echo $data; ?></textarea>
			<?php
		
		echo $this->_get_footer( $value->item_desc );
	}

	/**
	 * Import data for Endusers Option
	 *
	 * @since 0.2.3
	 * @access public
	 * @param array $value
	 * @param array $settings
	 * @param int $int
	 * @return string
	 */
	public function _import( $value, $settings, $int ) 
	{
		echo $this->_get_header( __FUNCTION__, $value->item_title );
			
			?>
				<textarea name="user_import" id="user_import" cols="20" rows="10"></textarea>
				<input type="submit" name="user-import" id="user-import" value="Import" class="ts-button right user-import" />
			<?php
		
		echo $this->_get_footer( $value->item_desc );
	}


/* ----- private functions --- internal use only ! ----- */
	/**
	 * outputs the html-head used function
	 * 
	 * @since 0.1.0
	 * @access public
	 * @param string $class CSS-Klasse; Entspricht dem Funktionsnamen
	 * @param string $item_title Ueberschrift des Abschnittes
	 * @return string HTML
	 */
	public function _get_header( $class, $item_title )
	{
		$class = str_replace('_', '-', $class);
	
		return '<div class="option option'.$class.'">
		<h3>'. __( htmlspecialchars_decode( $item_title ), TS_DOMAIN ) .'</h3>
		<div class="section">
		  <div class="element">';
	
	}
	
	/**
	 * outputs the html-foot used functions
	 *
	 * @since 0.1.0
	 * @access public
	 * @param string $item_desc Beschreibung des Abschnittes
	 * @return string HTML
	 */
	public function _get_footer( $item_desc )
	{
		return '</div><!-- close div-element -->
		  <div class="description">
			'. __( htmlspecialchars_decode( $item_desc ), TS_DOMAIN ) .'
		  </div><!-- close div-description -->
		</div><!-- close div section -->
	  </div><!-- close div-option option-$class -->';
	
	}

	/**
	 * 
	 * checks if $item_id is present in array $settings
	 * 
	 * @since 0.1.0
	 * @access public
	 * @param array $settings
	 * @param mixed $item_id
	 * @return array $ch_values Array mit den aus $settings ausgelesenen Werten
	 */
	public function _check_for_settings_item_value( $settings, $item_id )
	{
		// check for settings item value 
		  if ( isset( $settings[$item_id] ) ) {
		  $ch_values = (array) $settings[$item_id];
		} else {
		  $ch_values = array();
		}
		
		return $ch_values;
	
	}
} //end class
