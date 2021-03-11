<?php class CustomLogoWidget extends WP_Widget
{
    function CustomLogoWidget(){
		$widget_ops = array('description' => 'Displays Logo, Copyright and Additional Information');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false,$name='ET Custom Logo Widget',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$logoImagePath = empty($instance['logoImagePath']) ? '' : $instance['logoImagePath'];
		$copyrightInfo = empty($instance['copyrightInfo']) ? '' : $instance['copyrightInfo'];
		$imagePath = empty($instance['imagePath']) ? '' : $instance['imagePath'];
		$textInfo = empty($instance['textInfo']) ? '' : $instance['textInfo'];
		$readMoreUrl = empty($instance['readMoreUrl']) ? '' : $instance['readMoreUrl'];
		$readMoreText = empty($instance['readMoreText']) ? '' : $instance['readMoreText'];

		echo $before_widget;
?>	
<p id="footer-logo"><img alt="" src="<?php echo esc_url($logoImagePath); ?>" /><span><?php echo esc_html($copyrightInfo); ?></span></p>
<div class="thumb">
	<img class="item-image" alt="" src="<?php echo et_new_thumb_resize( et_multisite_thumbnail($imagePath), 56, 56, '', true ); ?>" />
	<span class="overlay"></span>
</div>
<p><?php echo $textInfo; ?></p>
<a class="readmore" href="<?php echo esc_url($readMoreUrl); ?>"><span><?php echo esc_html($readMoreText); ?></span></a>

<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['logoImagePath'] = stripslashes($new_instance['logoImagePath']);
		$instance['copyrightInfo'] = stripslashes($new_instance['copyrightInfo']);
		$instance['imagePath'] = stripslashes($new_instance['imagePath']);
		$instance['textInfo'] = stripslashes($new_instance['textInfo']);
		$instance['readMoreUrl'] = stripslashes($new_instance['readMoreUrl']);
		$instance['readMoreText'] = stripslashes($new_instance['readMoreText']);

		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('logoImagePath'=>'', 'copyrightInfo'=>'', 'imagePath'=>'', 'textInfo'=>'', 'readMoreUrl'=>'', 'readMoreText'=>'') );

		$logoImagePath = $instance['logoImagePath'];
		$copyrightInfo = $instance['copyrightInfo'];
		$imagePath = $instance['imagePath'];
		$textInfo = $instance['textInfo'];
		$readMoreUrl = $instance['readMoreUrl'];
		$readMoreText = $instance['readMoreText'];

		# Logo Image
		echo '<p><label for="' . $this->get_field_id('logoImagePath') . '">' . 'Logo Image URL (109x33px):' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('logoImagePath') . '" name="' . $this->get_field_name('logoImagePath') . '" >'. esc_url($logoImagePath) .'</textarea></p>';
		# Copyright
		echo '<p><label for="' . $this->get_field_id('copyrightInfo') . '">' . 'Copyright Text:' . '</label><input class="widefat" id="' . $this->get_field_id('copyrightInfo') . '" name="' . $this->get_field_name('copyrightInfo') . '" type="text" value="' . esc_attr($copyrightInfo) . '" /></p>';
		# Thumbnail Image URL
		echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Thumbnail Image URL:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. esc_url($imagePath) .'</textarea></p>';
		# Text
		echo '<p><label for="' . $this->get_field_id('textInfo') . '">' . 'Text:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('textInfo') . '" name="' . $this->get_field_name('textInfo') . '" >'. esc_textarea($textInfo) .'</textarea></p>';
		# Read More Link Text
		echo '<p><label for="' . $this->get_field_id('readMoreText') . '">' . 'Read More Link Text:' . '</label><input class="widefat" id="' . $this->get_field_id('readMoreText') . '" name="' . $this->get_field_name('readMoreText') . '" type="text" value="' . esc_attr($readMoreText) . '" /></p>';
		# Read More URL
		echo '<p><label for="' . $this->get_field_id('readMoreUrl') . '">' . 'Read More URL:' . '</label><input class="widefat" id="' . $this->get_field_id('readMoreUrl') . '" name="' . $this->get_field_name('readMoreUrl') . '" type="text" value="' . esc_url($readMoreUrl) . '" /></p>';
	}

}// end CustomLogoWidget class

function CustomLogoWidgetInit() {
  register_widget('CustomLogoWidget');
}

add_action('widgets_init', 'CustomLogoWidgetInit');

?>