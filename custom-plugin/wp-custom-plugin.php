<?php
/*
Plugin Name: Custom Plugin
Plugin URI: https:custon.com
Description: Just another custom form plugin. Simple but flexible.
Author: Aleem
Author URI: https://custon.wordpress.com/
Text Domain: custom plugin

Version: 5.1.1
*/

// constants
define("PLUGIN_DIR_PATH",Plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());
define("PLUGIN_VERSION","2.0");

// this is a varibale PLUGIN_DIR_PATH to store the value
// echo PLUGIN_DIR_PATH.",".PLUGIN_URL;
// die();

  function my_custom_plugin(){
    add_menu_page(
    	"custom plugin",// page title
    	"custom plugin",// menu title
    	"manage_options",// admin level 
    	"custom_plugin",// page slug parent slug
    	"add_new_function",// call back function
    	"dashicons-dashboard",// icons url
    	11//position
    );

    add_submenu_page(
      "custom_plugin",   // parent sluug
      "submenu",       // page title
      "add_New",         // menu title
      "manage_options",    // user level
      "custom_plugin",        // submenu  page slug 
      "add_new_function"   // its call back function
    );
    
    add_submenu_page(
      "custom_plugin",   // parent sluug
      "All Pages",       // page title
      "Add_page",         // menu title
      "manage_options",    // user level
      "All_pages",        // submenu  page slug 
      "add_all_pages"   // its call back function
    );
// add_submenu_page(
//   "custom_plugin",
//     "submenu",
//     "add_new",
//     "manage_options",
//    "plugin_int",
//    "add_new_function"
// );
   
  }

add_action('admin_menu','my_custom_plugin');
// this is call back function
// function custom_admin_view(){

// echo "<h1>hello every one </h1>";
// }
 function add_new_function(){
  // add_action("admin_init","custom_plugin_public");
  // echo'aasd';
  // custom_plugin_public();
  include_once PLUGIN_DIR_PATH."/views/add_new.php"; 
 }

  function add_all_pages(){
   include_once PLUGIN_DIR_PATH."/views/all_page.php";
 }
 function custom_plugin_public(){
  // include the css and js file
  
  wp_enqueue_style('plugin-style',PLUGIN_URL.'/custom-plugin/public/css/bootstrap.min.css', PLUGIN_VERSION);
   wp_enqueue_script('java.js',PLUGIN_URL.'/custom-plugin/public/js/script.js', PLUGIN_VERSION,true);
 // -----------------------------------
  
  wp_enqueue_script( 'ajax-script', PLUGIN_URL . '/custom-plugin/public/js/my-ajax-script.js', array('jquery') );

    wp_enqueue_script( 'jquery', PLUGIN_URL . '/custom-plugin/public/js/script.js', array('jquery') );
   wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url'=> admin_url( 'admin-ajax.php' ) ) );
   

  
 }

// ajax action 
 add_action("wp_ajax_custon_ajax_req","my_custon_ajax_req_fun");
   function my_custon_ajax_req_fun(){
    echo json_encode($_REQUEST);
      wp_die();

   }

 add_action( 'wp_ajax_custom_plugin', 'my_ajax_custom_plugin' );
 function my_ajax_custom_plugin(){
  print_r($_REQUEST);
      wp_die();
 }


add_action("admin_init","custom_plugin_public");

 if (isset($_REQUEST['action'])) // itg set the action param is set or not
     {
      switch($_REQUEST['action']){ // if ste pass to switch method to match case
          case "custom_plugin_library_post":
          add_action("admin_init","ajax_callback_function"); //mach case
          function ajax_callback_function()// this is a function
          {
            global $wpdb;
           include_once PLUGIN_DIR_PATH."/library/custom_plugin_library.php";  // ajax handler file within libraary folder
          }
          break;
      }
    
    }

//  create a table in data base//

function custom_plugin_table(){
  global  $wpdb ; // this is a variable

   require_once(ABSPATH.'wp-admin/includes/upgrade.php'); // this is a file path

   if (count($wpdb->get_var('SHOW TABLES LIKES "wp_custom_plugin"'))==0) {// ya check krta hai hai k jo hum table bna rhay hai wo phlay to nhi bna huva hai
    $sql_query_to_create_table="  
CREATE TABLE `wp_custom_plugin` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(150) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `phone` varchar(150) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1"; // sql create table query
     dbDelta($sql_query_to_create_table);
   
   }

}
register_activation_hook(__FILE__,'custom_plugin_table');

// End create a table in data base//
// delete table 

function Delete_table_in_database(){
   global  $wpdb ;
   $wpdb->query(" DROP table if exists  wp_custom_plugin");
   // delete the page in database 
   // step:1 get the id of page
   // step:2 delete the page from database
  $the_post_id=get_option('custom_plugin_page_id'); // get the id
  if (!empty($the_post_id)) {
     wp_delete_post($the_post_id,true);

  }

}
register_deactivation_hook(__FILE__,'Delete_table_in_database');

// register_uninstall_hook ya plugin ko delete krnay pa table ko database say delete krday ge 
// register_deactivation_hook  ya  plugin ko  deactivate krnay pa table ko delete kr day ge  

// -------------------------------------------------------------------------------

// create a page when the plugoin are activate
//jub hum plugin activate kray gay tu ya page khud ba khud bna jay ga 
// function create_page(){
//   $page= array();
//   $page['post_title']="online page";
//   $page['post_content']=" learning ptatform for wp";
//   $page['post_status']="publish";
//   $page['post_slug']="online page";
//   $page['post_type']="page";

//   $post_id=wp_insert_post($page);

//   add_option('custom_plugin_page_id',$post_id);


// }
// register_activation_hook(__FILE__,'create_page');
// End create a page when the plugoin are activate


// 
  add_shortcode("custom-plugin","clasbacs_function");
  function clasbacs_function(){
    echo " hello evary one";
  }


  add_shortcode("custom-plugin-shortcode","shortcode_clasbacs_function");
  function shortcode_clasbacs_function($params){
      $values=shortcode_atts(// default values of params
        array(
          "name"=>"Aleem",
          "author"=>"ALeem web"
        ),
        $params, // dynamic params coming shortcode
        "custom-plugin-shortcode" //optional parameter
      );
      echo "Name:".$values['name']."And author:".$values['author'];

  }
  add_shortcode("tag-base","call_back_function");
    function call_back_function($params,$content){
      echo "<h1>".$content."</h1>";

    }


?>