<?php
/*
Plugin Name: Morgage Widget
Version: 1
*/
 
 
class MorgageWidget extends WP_Widget
{
  function MorgageWidget()
  {
    $widget_ops = array('classname' => 'MorgageWidget', 'description' => 'Displays a morgage simulator' );
    $this->WP_Widget('MorgageWidget', 'Morgage', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE STARTS HERE
?>

<?php the_post(); ?>
<?php 
		$principal = get_post_custom_values('_price');
?> 

		<script type="text/javascript" src="<?php echo plugins_url('js/jquery-1.3.2.min.js', __FILE__ ); ?>"></script>
		<script type="text/javascript" src="<?php echo plugins_url('js/jquery-ui-1.7.2.custom.min.js', __FILE__ ); ?>"></script>
		<script type="text/javascript" src="<?php echo plugins_url('js/jquery.utils.lite.js', __FILE__ ); ?>"></script>
		<script type="text/javascript" src="<?php echo plugins_url('js/i18n/mcalc.fr.js', __FILE__ ); ?>"></script>
		<script type="text/javascript" src="<?php echo plugins_url('js/jquery.mcalc.js', __FILE__ ); ?>"></script>
        <div id="mcalc"></div>
        
			<script type="text/javascript">
			$(function(){
			var opt = {'principal': '<?php echo($principal[0]); ?>'};
			
			$('#mcalc').mcalc($.extend({
			}, opt));
			});
			</script >
<?php    
    // WIDGET CODE ENDS HERE
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("MorgageWidget");') );?>