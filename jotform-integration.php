<?php
/*
Plugin Name: JotForm Integration
Plugin URI: http://www.patrickrauland.com
Description: Integrate JotForm forms with your WordPress-powered site.
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com
Version: 1.0
License: GPL2
*/


function jotform_func( $atts ){
	//this function returns the jotform code

	//extract elements out of array & set defaults
	extract( shortcode_atts( array(
		'id' => '-1'
	), $atts ) );

	if($id==-1){
		return "<p style='color: red;'>JotForm Integration Error.";
	}

	//print script
	return "<script type='text/javascript' src='http://form.jotform.us/jsform/".$id."'></script>";
}

//add the shortcode
add_shortcode( 'jotform', 'jotform_func' );