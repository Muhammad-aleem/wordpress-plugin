<?php
/*
Plugin Name: Next Plugin
Plugin URI: http://wordpress.org/plugins/
Description: This is not just a plugin, 
Author: Aleem
Version: 1.7.1
Author URI: http://ma.tt/
*/

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
//  give the path
function Wp_next_menu_fun(){
	add_menu_page('Next Plugin','Next plugin',"manage_options",'next-plugin',"wp_callback_function");
	add_submenu_page("next-plugin","List Student","List students","manage_options","next-plugin","Wp_next_menu_fun");
	add_submenu_page("next-plugin","Add Student","Add students","manage_options","add-student-plugin-slug","Wp_next_add_callback_fun");
	add_submenu_page("next-plugin","Add text","Add text","manage_options","add-text","Wp_next_add_callback_function11111");

}
add_action('admin_menu','Wp_next_menu_fun');
function wp_callback_function(){
	include_once NEXT_PLUGIN_DIR_PATH.'/views/list-student.php';

}
function Wp_next_add_callback_fun(){
	
	include_once NEXT_PLUGIN_DIR_PATH.'/views/add-student.php';
	
}
function Wp_next_add_callback_function11111(){
	include_once NEXT_PLUGIN_DIR_PATH.'/views/test.php';
 
}
function bootstrap_java_file(){

	wp_enqueue_style('bootstrap.min_file_plugin ',NEXT_PLUGIN_DIR_PATH.'assets/css/bootstrap.min.css');
	wp_enqueue_style('line-icons_file ',get_template_directory_uri().'/assets/fonts/line-icons.css');

	wp_enqueue_script( 'assets/js/summernote_file', get_template_directory_uri() .'assets/js/summernote.js','jquery', array(), '1.1', true );
}
add_action("wp_enqueue_scripts","bootstrap_java_file");

?>