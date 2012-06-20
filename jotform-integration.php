<?php
/*
Plugin Name: JotForm Integration
Plugin URI: https://github.com/BFTrick/jotform-integration
Description: Integrate JotForm forms with your WordPress-powered site.
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com
Version: 1.0
License: GPL2
*/


/*----------------------------------------
/ display jotform
----------------------------------------*/

function jotform_init_func( $atts ){
	//this function returns the jotform code

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

//add the shortcode
add_shortcode( 'jotform', 'jotform_init_func' );



/*----------------------------------------
/ add the admin options page & options
----------------------------------------*/

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


