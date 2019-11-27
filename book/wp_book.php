<?php
/*
Plugin Name: My Book
Plugin URI: https:custon.com
Description: Just another custom form plugin. Simple but flexible.
Author: Aleem
Author URI: https://custon.wordpress.com/
Text Domain: custom plugin

Version: 5.1.1
*/
if (!defined("ABSPATH")) 
exit;
// constants
define("PLUGIN_DIR_PATH",Plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());
define("PLUGIN_VERSION","2.0");

// add_filter("the_content", "testing_filter_hooks");
// function testing_filter_hooks($content) {
//   return $content."helloooooooooo there";
// }

// function testing_action_hooks() {
//   echo '<tr class="record_row_1">
//                 <td>1</td>
//                 <td>Aleem asssssssssssssssssssssssssssssdf</td>
//                 <td>Aleem sdsds</td>
//                 <td>akeee</td>
//                 <td><img style="width: 80px;height: 80px" src="http://localhost/plugin/wordpress/wp-content/uploads/2019/07/s7.jpg"></td>
//                 <td>2019-07-20 09:49:39</td>
//                 <td><a href="javascript:void(0)" class="btn btn-danger delbook" data-id="1"> Delete</a></td>
//                 <td><a href="admin.php?page=edit_book&amp;edit=1" class="btn btn-info">Edit</a></td>

//                     </tr>';
// }
// add_action('our_custom_hook','testing_action_hooks');



// this is a varibale PLUGIN_DIR_PATH to store the value
// echo PLUGIN_DIR_PATH.",".PLUGIN_URL;
// die();

  function my_custom_plugin(){
    add_menu_page(
    	"my book",// page title
    	"Book",// menu title
    	"manage_options",// admin level 
    	"book-list",// page slug parent slug
    	"add_new_function",// call back function
    	"dashicons-book-alt",// icons url
    	30//position
    );

    add_submenu_page(
      "book-list",   // parent sluug
      "book-submenu",       // page title
      "My Book",         // menu title
      "manage_options",    // user level
      "book-list",        // submenu  page slug 
      "add_new_function"   // its call back function
    );
    
    add_submenu_page(
      "book-list",   // parent sluug
      "Book list",       // page title
      "Book list",         // menu title
      "manage_options",    // user level
      "listbook",        // submenu  page slug 
      "add_all_pages"   // its call back function
    );
     add_submenu_page( // Edit section
      "book-list",   // parent sluug
      "",       // page title
      "",         // menu title
      "manage_options",    // user level
      "edit_book",        // submenu  page slug 
      "add_edit_book_fun"   // its call back function
    );
     // new section
       add_submenu_page(
      "book-list",   // parent sluug
      "Add Author",       // page title
      "Add Authors",         // menu title
      "manage_options",    // user level
      "author_url",        // submenu  page slug 
      "author_callback_function"   // its call back function
    );
        add_submenu_page(
      "book-list",   // parent sluug
      "Manage Author",       // page title
      "Manage Author",         // menu title
      "manage_options",    // user level
      "manage_author_url",        // submenu  page slug 
      "manag_author_callback_function"   // its call back function
    );
       add_submenu_page(
      "book-list",   // parent sluug
      "Add Student",       // page title
      "Add Student",         // menu title
      "manage_options",    // user level
      "student_url",        // submenu  page slug 
      "student_callback_function"   // its call back function
    );
       add_submenu_page(
      "book-list",   // parent sluug
      "Manage Student",       // page title
      "Manage Student",         // menu title
      "manage_options",    // user level
      "manage_student_url",        // submenu  page slug 
      "manage_student_callback_function"   // its call back function
    ); 
        add_submenu_page(
      "book-list",   // parent sluug
      "Course Tracker",       // page title
      "Course Tracker",         // menu title
      "manage_options",    // user level
      "Course_Tracker_url",        // submenu  page slug 
      "Course_Tracker_callback_function"   // its call back function
    ); 
     // end section

  }

add_action('admin_menu','my_custom_plugin');
       function add_edit_book_fun(){
        include_once PLUGIN_DIR_PATH."/views/book_edit.php"; 
       }
         function add_new_function(){
          include_once PLUGIN_DIR_PATH."/views/add_new.php"; 
         }
           function add_all_pages(){
             include_once PLUGIN_DIR_PATH."/views/all_page.php";
           }
             function author_callback_function(){
              include_once PLUGIN_DIR_PATH."/views/author.php";
             }
              function manag_author_callback_function(){
                include_once PLUGIN_DIR_PATH."/views/manage_author.php";
              }
               function student_callback_function(){
               include_once PLUGIN_DIR_PATH."/views/student.php";
               }
                function manage_student_callback_function(){
                  include_once PLUGIN_DIR_PATH."/views/manage_student.php";
                }
                 function Course_Tracker_callback_function(){
                  include_once PLUGIN_DIR_PATH."/views/course_tracker.php";
                 }


 function custom_plugin_public_book_file(){
  //  to use this file to specific place 
  $slug=""; // this is a predefine variable
  $page_includes=array("frontendpage","book-list","listbook","author_url","manage_author_url","student_url","manage_student_url","Course_Tracker_url");// this is a menu slug
  $currenttpage=$_GET['page']; // this is a current page to open our webbro

  if (empty($currenttpage)) {
    $actual_link="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URl]";
    
    if (preg_match("/my_book/",$actual_link)) {
      $currenttpage="frontendpage";
    }
  }
  if (in_array($currenttpage,$page_includes)) {

      wp_enqueue_style('min.css',PLUGIN_URL.'/book/public/css/bootstrap.min.css',"");
      wp_enqueue_style('autoFill',PLUGIN_URL.'/book/public/css/autoFill.dataTables.min.css'                                                                              ,"");
      wp_enqueue_style('dataTables',PLUGIN_URL.'/book/public/css/jquery.dataTables.min.css','');
      wp_enqueue_style('notifyBar',PLUGIN_URL.'/book/public/css/jquery.notifyBar.css','');
      wp_enqueue_style('style',PLUGIN_URL.'/book/public/css/style.css','');
    // js
      wp_enqueue_script('bootstrap.min.js',PLUGIN_URL.'/book/public/js/bootstrap.min.js','',true);
      wp_enqueue_script('validator.min',PLUGIN_URL.'/book/public/js/jquery.validate.min.js','',true);
      wp_enqueue_script('notifyBar',PLUGIN_URL.'/book/public/js/jquery.notifyBar.js','',true);
      wp_enqueue_script('dataTables',PLUGIN_URL.'/book/public/js/jquery.dataTables.min.js','',true);
      wp_enqueue_script('script.js',PLUGIN_URL.'/book/public/js/script.js','',true);
   
      wp_enqueue_script('ajax.js',PLUGIN_URL.'/book/public/js/my-ajax-script.js','',true);
      wp_enqueue_script("jquery");
      wp_localize_script( 'ajax-script','my_ajax_object', array( 'ajax_url'=> admin_url( 'admin-ajax.php' ) ) );   
  }
// end
 
 }
 add_action("admin_init","custom_plugin_public_book_file");
// delete table 
function Delete_table_in_database(){
   global  $wpdb ;
   $wpdb->query(" DROP table if exists wp_my_book");
    $wpdb->query(" DROP table if exists wp_my_student");
     $wpdb->query(" DROP table if exists wp_my_authors");
      $wpdb->query(" DROP table if exists wp_my_enrol");
   // delete the page in database 
   // step:1 get the id of page
   // step:2 delete the page from database
  $the_post_id=get_option('custom_plugin_page_id'); // get the id
  if (!empty($the_post_id)) {
     wp_delete_post($the_post_id,true);
   }
   if (get_role("book_user_key")) {
     remove_role("book_user_key");
   }
   // delete page
   if(!empty(get_option("my_book_page_id"))){
    $page_id=get_option("my_book_page_id");
     wp_delete_post($page_id,true); //wp_post table
     delete_option("my_book_page_id");// wp_options table
   }
}
register_deactivation_hook(__FILE__,'Delete_table_in_database');

function my_book_crt_table(){
   global  $wpdb ;
   return $wpdb->prefix."my_book";

}
function my_student_table(){
   global  $wpdb ;
   return $wpdb->prefix."my_student";

} 
function my_authors_table(){
   global  $wpdb ;
   return $wpdb->prefix."my_authors";

}
    function my_enrol_table(){
   global  $wpdb ;
   return $wpdb->prefix."my_enrol";

}
  function auto_my_book_table(){
    global  $wpdb ; // this is a variable

   require_once(ABSPATH.'wp-admin/includes/upgrade.php'); 
   $sql="
    CREATE TABLE `".my_book_crt_table()."` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `name` varchar(255) DEFAULT NULL,
     `author` varchar(255) DEFAULT NULL,
     `about` text,
     `book_image` text,
     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
 dbDelta($sql);


  }
  register_activation_hook(__FILE__,'auto_my_book_table');
  // =========================Create table=======
  function My_authors_tables(){
    global  $wpdb ; // this is a variable

   require_once(ABSPATH.'wp-admin/includes/upgrade.php'); 
   $sql="
 CREATE TABLE `".my_student_table()."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `user_login_id` int(11) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
   dbDelta($sql);
   $sql2="
CREATE TABLE `".my_authors_table()."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `fb_link` text,
 `about` text,
 `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
dbDelta($sql2);
$sql3="
CREATE TABLE `".my_enrol_table()."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `student_id` int(11) NOT NULL,
 `book_id` int(11) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
";
dbDelta($sql3);
// user role

    add_role("book_user_key","My book user",array(
      "read"=>true
       ));
    // ===dynamic page create code===
    // Create post object
        $my_post = array(
          'post_title'    =>"Book page",
          'post_content'  => "[book_page]",// This is a shortcode 
          'post_status'   => 'publish',
          "post_type"     =>"page",
          "post_name"     =>"my_book"
        );
 
// Insert the post into the database
      $book_id=wp_insert_post( $my_post );
      add_option("my_book_page_id",$book_id);
    // ===End dynamic page create code===
  }
  register_activation_hook(__FILE__,'My_authors_tables');
  // =========================End Create table=======
  // =================short code function 
    function My_short_code_function(){
    include_once PLUGIN_DIR_PATH."/views/my_book_list.php";

  }
  add_shortcode("book_page","My_short_code_function");

  // ===============ene

  add_action("wp_ajax_my_book_action","my_book_ajax_handler"); // ajax handler
  function my_book_ajax_handler(){
    global $wpdb;
    if ($_REQUEST['param']=="save_book"){
     $wpdb->insert(my_book_crt_table(),array(
      "name"=>$_REQUEST['txtname'],
      "author"=>$_REQUEST['txtauthor'],
      "about"=>$_REQUEST['txtabout'],
      "book_image"=>$_REQUEST['imagename']
     )); 
    }elseif($_REQUEST['param']=="save_author"){
       $wpdb->insert(my_authors_table(),array(
      "name"=>$_REQUEST['authorname'],
      "fb_link"=>$_REQUEST['fblink'],
      "about"=>$_REQUEST['authorabout'],
      
     ));  
    }elseif($_REQUEST['param']=="save_student"){
      // create user
      $usrt_id=$student_id=wp_create_user($_REQUEST['username'],$_REQUEST['userpassword'],$_REQUEST['studentemail']);
      $user= new wp_user($student_id);
       $user->set_role("book_user_key");
      $wpdb->insert(my_student_table(),array(
      "name"=>$_REQUEST['studentname'],
      "email"=>$_REQUEST['studentemail'],
      "user_login_id"=>$usrt_id
      
     ));
    }
    elseif ($_REQUEST['param']=="edit_book") {
     $wpdb->update(my_book_crt_table(),array(
      "name"=>$_REQUEST['txtname'],
      "author"=>$_REQUEST['txtauthor'],
      "about"=>$_REQUEST['txtabout'],
      "book_image"=>$_REQUEST['imagename']
    ),array(
      "id"=>$_REQUEST['book_id']
    ));
     
    }elseif($_REQUEST['param']=="delete_book"){
      $wpdb->delete("wp_my_book",array(
         "id"=>$_REQUEST['id'] 
      ));


    }
    wp_die();
  }

   add_filter("page_template","my_cutom_template_page");
   function my_cutom_template_page($page_template){
    global $post;
    $page_slug=$post->post_name; // crunt post slug book page slug
    if ($page_slug=="my_book") {
        $page_template=PLUGIN_DIR_PATH."/views/frontend_book_template_page.php";
      
    }
      return $page_template;
   }
  function get_author_details($author_id){ // id to change name
    global $wpdb;
    $authors_detailes=$wpdb->get_row(
    $wpdb->prepare(
        "SELECT * FROM wp_my_authors","WHERE id= %d",$author_id
    ),ARRAY_A

  );
    return $authors_detailes;
  }

    function custom_login_role_filter($redirect_to,$request,$user){
     global $user;
     if (isset($user->roles) && is_array($user->roles)) {
      if (in_array("book_user_key",$user->roles)) {
        return $redirect_to=site_url()."/my_book";
         //site_url to redirect [http://localhost/plugin/wordpress]my_book is full url
      }else{ 
        return $redirect_to;
      }
     }
    }
    add_filter("login_redirect","custom_login_role_filter",10,3);
     function custom_logout_role_filter(){
      wp_redirect(site_url()."/my_book");
      exit();

     }
     add_filter("wp_logout","custom_logout_role_filter");






?>