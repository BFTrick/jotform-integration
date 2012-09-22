<?php
/*
Plugin Name: JotForm Integration
Plugin URI: https://github.com/BFTrick/jotform-integration
Description: Integrate JotForm forms with your WordPress-powered site.
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com
Version: 1.1.2
License: GPL2
*/



/*----------------------------------------
/ jotform output
----------------------------------------*/

function jotform_init_func( $atts ){
	//this function handles the output for both the widget and the shortcode

	//extract elements out of array & set defaults
	extract( shortcode_atts( array(
		'id' => '-1'
	), $atts ) );

	if($id==-1){
		return "<p style='color: red;'>JotForm Integration Error - missing form ID.</p>";
	}

	//get plugin options
	$options = get_option('jotform_options');

	//create query string
	$queryString = "";
	if(!$options['cache_form']){
		$queryString = rand();
	}

	//print script
	return "<script type='text/javascript' src='http://form.jotform.us/jsform/".$id."?".$queryString."'></script>";
}



/*----------------------------------------
/ jotform widget
----------------------------------------*/

class JotformWidget extends WP_Widget
{
	function JotformWidget()
	{
		//setting up the basic information for the widget

		$widget_ops = array('classname' => 'JotformWidget', 'description' => 'Displays a Jotform form' );
		$this->WP_Widget('JotformWidget', 'JotForm', $widget_ops);
	}

	function form($instance)
	{
		//this function handles the widget form in the WordPress backend

		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
		$form_id = $instance['form_id'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('form_id'); ?>">Form ID: <input class="widefat" id="<?php echo $this->get_field_id('form_id'); ?>" name="<?php echo $this->get_field_name('form_id'); ?>" type="text" value="<?php echo attribute_escape($form_id); ?>" /></label></p>
		<?php
	}

	function update($new_instance, $old_instance)
	{
		//this funciton handles the updating of the data after the widget has been manipulated in the WordPress backend

		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['form_id'] = strip_tags($new_instance['form_id']);

		return $instance;
	}

	function widget($args, $instance)
	{
		//this function handles all of the front end display of the widget

		extract($args, EXTR_SKIP);

		$form_id = $instance['form_id'];

		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

		//print the title
		if (!empty($title))
		{
			echo $before_title . $title . $after_title;;
		}

		//call the main jotform function to handle the output
		$output = jotform_init_func(array("id"=>$form_id));
		echo $output;

		echo $after_widget;
	}

}
add_action( 'widgets_init', create_function('', 'return register_widget("JotformWidget");') );



/*----------------------------------------
/ jotform shortcode
----------------------------------------*/

//add the shortcode
add_shortcode( 'jotform', 'jotform_init_func' );


/* add the admin options page & options */


// add the admin options page
add_action('admin_menu', 'jotform_admin_add_page');
function jotform_admin_add_page() {
	add_options_page('JotForm Integration Page', 'JotForm Integration', 'manage_options', 'jotform', 'jotform_options_page');
}//jotform_admin_add_page

// display the admin options page
function jotform_options_page() {
	?>
	<div>
		<h2>JotForm Settings</h2>
		<p>Options relating to the JotForm Integratin Plugin.</p>
		<form action="options.php" method="post">
			<?php settings_fields('jotform_options'); ?>
			<?php do_settings_sections('jotform'); ?>
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
		</form>
	</div>
	<?php
}//jotform_options_page

// add the admin settings and such
add_action('admin_init', 'jotform_admin_init');
function jotform_admin_init(){
	register_setting( 'jotform_options', 'jotform_options', 'jotform_options_validate' );
	add_settings_section('jotform_main', 'Main Settings', 'jotform_section_text', 'jotform');
	add_settings_field('jotform_cache_form', 'Cache forms:', 'jotform_setting_string', 'jotform', 'jotform_main');
}//jotform_admin_init

function jotform_section_text() {
	//this plugin is so small that we don't need a description. I'll keep this stub here in case that ever changes
	//echo '<p>Main description of this section here.</p>';
}//jotform_section_text

function jotform_setting_string() {
	$options = get_option('jotform_options');
	echo "<p><input id='jotform_cache_form' name='jotform_options[cache_form]' size='40' type='checkbox' value='1' ".( $options['cache_form']==1 ? "checked='checked'" : "")."/></p>";
}//jotform_setting_string

// validate our options
function jotform_options_validate($input) {
	$newinput['cache_form'] = trim($input['cache_form']);
	if($newinput['cache_form'] != 1) {
		$newinput['cache_form'] = 0;
	}//if
	return $newinput;
}//jotform_options_validate 


