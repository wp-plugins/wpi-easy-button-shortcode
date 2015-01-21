<?php
/**
 * Plugin Name: WPi Easy Button Shortcode
 * Plugin URI: http://wooprali.prali.in/plugins/wpi-easy-button-shortcode
 * Description: Create buttons anywhere in wordpress using button shortcode [wpi_easy_button] 
 * Version: 1.0.0
 * Author: wooprali
 * Author URI: http://wooprali.in
 * Text Domain: wooprali
 * Domain Path: /locale/
 * Network: true
 * License: GPL2
 */
defined('ABSPATH') or die("No script kiddies please!");
if ( !defined('WPIEB_URL' ) ) {
	define( 'WPIEB_URL', plugin_dir_url( __FILE__ ) ); 
}
class WPiEasyButtonShortcode{
	public function __construct(){	
		add_shortcode("wpi_easy_button",array($this, "easy_button"));
		add_action("wp_enqueue_scripts", array($this, "wp_enqueue_scripts"));
	}
	public function wp_enqueue_scripts(){
		wp_enqueue_style("wpi_easy_button", WPIEB_URL."style.css",array(),NULL, NULL);
	}
	public function easy_button($atts, $content=""){
		$default=array("text"=>"Button", "link"=>"#");
		$atts=shortcode_atts($default, $atts, "wpi_easy_button");
		return "<a class='wpi_easy_button' href='{$atts['link']}'>{$atts['text']}</a>";
	}
}
$wpi_easy_button_shortcode=new WPiEasyButtonShortcode;
?>