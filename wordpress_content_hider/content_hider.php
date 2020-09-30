<?php
/**
 * @package content_hider
 */
/*
Plugin Name: Content Hider
Plugin URI: https://github.com/damiultimate/content_hider
Description: Hide or reveal contents based on screen size. Hide or reveal based on mobile, tablet or desktop
Version: 1.0
Author: Damiultimate
Author URI: https://github.com/damiultimate
License: GPLv2 or later
Text Domain: content_hider
*/


function ContentHide($atts, $content = null){

	$value=shortcode_atts(array(
		'mobile' => 'false',
		'tablet' => 'false',
		'desktop' => 'false',
		'type'	=>'span'	
	), $atts);

	if(esc_attr($value['mobile']) == 'false'){
		$mobile='mobile_class_content_hide1';
	}
	else{
		$mobile='mobile_class_content_show1';
	}

	if(esc_attr($value['tablet']) == 'false'){
		$tablet='tablet_class_content_hide1';
	}
	else{
		$tablet='tablet_class_content_show1';
	}

	if(esc_attr($value['desktop']) == 'false'){
		$desktop='desktop_class_content_hide1';
	}
	else{
		$desktop='desktop_class_content_show1';
	}

if(esc_attr($value['type']) == 'span'){
	$message="<span class=\"$mobile $tablet $desktop\">$content</span>";

}else{
	$message="<div class=\"$mobile $tablet $desktop\">$content</div>";
}
	return $message;
}

function addstyle(){
	wp_enqueue_style('cssfile',plugin_dir_url(__FILE__).'style.css');
}

add_action('wp_enqueue_scripts','addstyle');
add_shortcode('contenthide','ContentHide');