 <?php
/*
Plugin Name: Phone Plugin
Plugin URI: https:custon.com
Description: Just another custom form plugin. Simple but flexible
this is a phone directory plugin created by M.Aleem.
Author: Aleem
Author URI: https://custon.wordpress.com/
Text Domain: custom plugin
Version: 5.1.1
*/
// ========plugin  secourity===== 
if (!defined("ABSPATH"))
  exit;
// ======End
// ======= Define plugin Path======
define("PLUGIN_DIR_PATH_phone", Plugin_dir_path(__FILE__));
define("PLUGIN_URL_phone", plugins_url());
// ======= End==========
//  =====Oop Class======
if (class_exists(phone_directory)) { }
class phone_directory
{
  public function __construct()
  { // this section define the Action Hook
    add_action('admin_menu', array($this, "Crt_menu_page"));
    add_action("admin_init", array($this, "custom_plugin_public_phone_file"));
    add_action("init", array($this, "custom_plugin_public_phone_file"));
    add_action("wp_ajax_my_phone_action", array($this, "my_phone_ajax_handler_function")); // ajax handler
    add_action("wp_ajax_my_seaarh_action", array($this, "my_search_ajax_handler_function")); // ajax handler
    add_action("wp_ajax_my_sort_action", array($this, "my_short_ajax_handler_function")); // ajax handler

  }

  //  ======= Menu Pages======
  public function Crt_menu_page()
  {
    add_menu_page(
      "MY_phone_dir", // page title
      "Phone", // menu title
      "manage_options", // admin level 
      "Phone_dir-slug", // page slug parent slug
      array($this, "phone_dir_call_fun"), // call back function
      "dashicons-phone", // icons url
      30
    );
    add_submenu_page(
      "Phone_dir-slug",   // parent sluug
      "book-submenu",       // page title
      "My Phone",         // menu title
      "manage_options",    // user level
      "Phone_dir-slug",        // submenu  page slug 
      array($this, "phone_dir_call_fun")   // its call back function
    );
    add_submenu_page( // Edit section
      "Phone_dir-slug",   // parent sluug
      "",       // page title
      "",         // menu title
      "manage_options",    // user level
      "edit_phone",        // submenu  page slug 
      array($this, "add_edit_phone_fun")   // its call back function
    );
    //   ======= Menu page callback fun =====

    // ========== End callback=====  
  }

  public function phone_dir_call_fun()
  {
    // include_once PLUGIN_DIR_PATH_phone."/views/add_phone.php"; 
    ?>
<!--model -->
<?php
    $phone_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
    global $wpdb;
    $phone_detail = $wpdb->get_row(
      $wpdb->prepare(
        "SELECT * FROM wp_my_phone",
        "WHERE id = %d ",
        $phone_id
      ),
      ARRAY_A
    );
    ?>

<div class="container firstcontainer">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg bntsty" data-toggle="modal" data-target="#myModal">Add Phone</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

          <div class="alert alert-success">
            <h4>Add Phone </h4>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">Add New Phone</div>
            <div class="panel-body">
              <form class="form-horizontal" action="javascript:void(0)" id="myfrmphonedata">
                <input type="hidden" name="phone_id" value="<?php echo isset($_GET['edit']) ? intval($_GET['edit']) : 0; ?>">
                <?php wp_enqueue_media(); ?>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Name">Name:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name--" value="<?php echo $phone_detail['name']; ?>" required>
                    <span id="errmsg" class="text-danger font-weight-bold"></span>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Image:</label>
                  <div class="col-sm-10">
                    <input type="button" class="btn btn-info" value="Uplode Book Image" id="btnimage">
                    <span id="showimage"></span>
                    <input type="hidden" id="imagename" name="imagename">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Image:</label>
                  <div class="col-sm-10">
                    <input type="button" class="btn btn-info" value="Uplode Book Image" id="btnimage">
                    <span id="showimage">
                      <img src="<?php echo $phone_detail['image']; ?>" style="height: 80px;width: 80px">
                    </span>
                    <input type="hidden" id="imagename" name="imagename" value="<?php echo $phone_detail['image']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Name">Phone Number:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Enter Phone" required autocomplete="off">
                    <span id="errmsg" class="text-danger font-weight-bold"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id="btnsubmit" class="btn btn-default clsbtn">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <!-- table -->
  <?php
      global $wpdb;
      $all_phone = $wpdb->get_results(
        $wpdb->prepare(
          "SELECT * FROM wp_my_phone",
          "ORDER by id DESC",
          ""
        ),
        ARRAY_A
      );
      ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-danger">
          <div class="panel-heading">Phone List
            <input type="text" name="search_bar" id="search_bar" class="form-control col-md-2" placeholder="search">
          </div>
          <div class="col-xs-6" style="margin-top: 2px;">
            <input class="form-control" name="searcharea" id="clicksearch" type="text" placeholder="search here">
          </div>
          <div class="col-xs-6" style="margin-top:2px;padding-left:3px ">
            <input type="button" value="search" class="btn btn-success clickbtn">
          </div>

          <div class="panel-body">
            <table class="table table-striped" id="tableseac">
              <thead>
                <tr>
                  <th cope="col"><a class="dec" id="id" href="#">#</a></th>
                  <th cope="col"><a class="dec" id="phoen" href="#">phone</a></th>
                  <th cope="col"><a class="dec" id="name" href="#">name</a></th>
                  <th scope="col">image</th>
                  <th cope="col"><a class="dec" id="create" href="#">Created_at</a></th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $content = '';

                    if (count($all_phone) > 0) {
                      $s = 1;
                      foreach ($all_phone as  $value) {

                        $content .= '<tr class="record_row_' . $value['id'] . '">
                        <td>' .  $s++ . '</td>
                        <td>' . $value["phone"] . '</td>
                        <td>' . $value['name'] . '</td>
                        <td>' . '.<img style="width: 80px;height: 80px"  src="' . $value['image'] . '">' . '</td>
                        <td>' . $value['created_at'] . '</td>
                        <td><a  id="delphone" href="javascript:void(0)" class="btn btn-danger delbook" data-id="' . $value['id'] . '"> Delete</a></td>
                        <td><a  data-toggle="modal" data-target="#editid" href="admin.php?page=edit_phone&edit=' . $value['id'] . '" class="btn btn-info"><i><b>Edit</b></i></a></td>
                      </tr>';
                      }
                      echo $content;
                    }
                    ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
    public function add_edit_phone_fun()
    {
      // include_once PLUGIN_DIR_PATH_phone."/views/edit_phone.php"; 
      ?>
  <?php wp_enqueue_media(); ?>
  <?php
      $phone_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;
      global $wpdb;
      $phone_detail = $wpdb->get_row(
        $wpdb->prepare(
          "SELECT * FROM wp_my_phone",
          "WHERE id = %d ",
          $phone_id
        ),
        ARRAY_A
      );
      ?>
  <div class="row">
    <div class="col-md-10">
      <div class="alert alert-success">
        <h4>Edit</h4>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">Update Book</div>
        <div class="panel-body">
          <form class="form-horizontal" action="javascript:void(0)" id="myfrmeditphonedata">
            <input type="hidden" name="phone_id" value="<?php echo isset($_GET['edit']) ? intval($_GET['edit']) : 0; ?>">
            <div class="form-group">
              <label class="control-label col-sm-2" for="Name">Name:</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $phone_detail['name']; ?>" class="form-control" name="name" placeholder="Enter Name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Image:</label>
              <div class="col-sm-10">
                <input type="button" class="btn btn-info" value="Uplode Book Image" id="btnimage">
                <span id="showimage">
                  <img src="<?php echo $phone_detail['image']; ?>" style="height: 80px;width: 80px">
                </span>
                <input type="hidden" id="imagename" name="imagename" value="<?php echo $phone_detail['image']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="Name">Phoen:</label>
              <div class="col-sm-10">
                <input type="text" value="<?php echo $phone_detail['phone']; ?>" class="form-control" name="inputPhone" placeholder="Enter Phone">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php
    }
    // ======== End Pages=======
    // ================= Java&css File========
    public function custom_plugin_public_phone_file()
    {
      wp_enqueue_style('min.css', PLUGIN_URL_phone . '/wp_phone_directory/css/bootstrap.min.css', "");
      wp_enqueue_style('autoFill', PLUGIN_URL_phone . '/wp_phone_directory/css/autoFill.dataTables.min.css', "");
      wp_enqueue_style('dataTables', PLUGIN_URL_phone . '/wp_phone_directory/css/jquery.dataTables.min.css', '');
      wp_enqueue_style('notifyBar', PLUGIN_URL_phone . '/wp_phone_directory/css/jquery.notifyBar.css', '');
      wp_enqueue_style('style', PLUGIN_URL_phone . '/wp_phone_directory/css/style.css', '');
      // // js
      //   wp_enqueue_script('jquery.min',PLUGIN_URL_phone.'/wp_phone_directory/js/jquery.min.js','',false);
      wp_enqueue_script("jquery");
      wp_enqueue_script('bootstrap.min.js', PLUGIN_URL_phone . '/wp_phone_directory/js/bootstrap.min.js', '', true);
      wp_enqueue_script('validator.min', PLUGIN_URL_phone . '/wp_phone_directory/js/jquery.validate.min.js', '', true);
      wp_enqueue_script('notifyBar', PLUGIN_URL_phone . '/wp_phone_directory/js/jquery.notifyBar.js', '', true);
      wp_enqueue_script('dataTables', PLUGIN_URL_phone . '/wp_phone_directory/js/jquery.dataTables.min.js', '', true);


      //         wp_enqueue_script('script.js',PLUGIN_URL_phone.'/wp_phone_directory/js/script.js','',true);

      //         // wp_enqueue_script('ajax.js',PLUGIN_URL_phone.'/wp_phone_directory/js/my-ajax-script.js','',true);

      //         wp_localize_script( 'ajax-script','my_ajax_object', array( 'ajax_url'=> admin_url( 'admin-ajax.php' ) ) ); 

      //         // wp_enqueue_script( 'my-ajax-request', plugin_dir_url( __FILE__ ) . 'js/ajax.js' );
      //         // ==========
      //  // =================
      // wp_register_script( 'script.js',PLUGIN_URL_phone.'/wp_phone_directory/js/script.js','jquery',true );
      // wp_enqueue_script('script.js',PLUGIN_URL_phone.'/wp_phone_directory/js/script.js','',true);
      // wp_localize_script( 'script.js','my_ajax_object', array( 'ajax_url'=> admin_url( 'admin-ajax.php' ) ) ); 
      // ===========
      // =============================================================
      // Register the script
      wp_register_script('script_registering', PLUGIN_URL_phone . '/wp_phone_directory/js/script.js');
      wp_localize_script('script_registering', 'my_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
      wp_enqueue_script('script_registering');
    }
    // ================= jave&css End=================
    // ========== Ajax HAndler ========
    function my_search_ajax_handler_function()
    {
      $searchTerm = $_REQUEST['searchedText'];
      global $wpdb;
      $all_phone = $wpdb->get_results(
        "SELECT * FROM wp_my_phone WHERE name like '%" . $searchTerm . "%'",
        ARRAY_A
      );
      $content = '';
      foreach ($all_phone as  $value) {

        $content .= '<tr class="record_row_' . $value['id'] . '">
        <td>' . $value["id"] . '</td>
        <td>' . $value["phone"] . '</td>
        <td>' . $value['name'] . '</td>
        <td>' . '.<img style="width: 80px;height: 80px"  src="' . $value['image'] . '">' . '</td>
        <td>' . $value['created_at'] . '</td>
        <td><a  id="delphone" href="javascript:void(0)" class="btn btn-danger delbook" data-id="' . $value['id'] . '"> Delete</a></td>
        <td><a  data-toggle="modal" data-target="#editid" href="admin.php?page=edit_phone&edit=' . $value['id'] . '" class="btn btn-info"><i><b>Edit</b></i></a></td>
      </tr>';
      }
      echo $content;
      wp_die();
    }
    function my_short_ajax_handler_function()
    {
      $colom_name = $_REQUEST['order'];
      global $wpdb;
      $all_phone = $wpdb->get_results(

        "SELECT * FROM wp_my_phone  ORDER BY ".$colom_name." DESC",
        ARRAY_A
      );
      // SELECT * FROM wp_my_phone WHERE name like '%" . $searchTerm . "%'",
      //   ARRAY_A
      // );
      $content = '';
      foreach ($all_phone as  $value) {

        $content .= '<tr class="record_row_' . $value['id'] . '">
        <td>' . $value["id"] . '</td>
        <td>' . $value["phone"] . '</td>
        <td>' . $value['name'] . '</td>
        <td>' . '.<img style="width: 80px;height: 80px"  src="' . $value['image'] . '">' . '</td>
        <td>' . $value['created_at'] . '</td>
        <td><a  id="delphone" href="javascript:void(0)" class="btn btn-danger delbook" data-id="' . $value['id'] . '"> Delete</a></td>
        <td><a  data-toggle="modal" data-target="#editid" href="admin.php?page=edit_phone&edit=' . $value['id'] . '" class="btn btn-info"><i><b>Edit</b></i></a></td>
      </tr>';
      }
      echo $content;
      wp_die();
    }

    function my_phone_ajax_handler_function()
    {
      global $wpdb;
      $content = '';
      if ($_REQUEST['param'] == "save_phoneData") {
        $wpdb->insert(wp_my_phone(), array(
          "phone" => $_REQUEST['inputPhone'],
          "name" => $_REQUEST['name'],
          "image" => $_REQUEST['imagename'],
        ));
        $lastid = $wpdb->insert_id;
        echo $content .= '<tr class="record_row_' . $lastid . '">
                        <td>' . $_REQUEST['id'] . '</td>
                        <td>' . $_REQUEST['inputPhone'] . '</td>
                        <td>' . $_REQUEST['name'] . '</td>
                        <td>' . '.<img style="width: 80px;height: 80px"  src="' . $_REQUEST['imagename'] . '">' . '</td>
                        <td>' . $_REQUEST['created_at'] . '</td>
                        <td><a  id="delphone" href="javascript:void(0)" class="btn btn-danger delbook" data-id="' . $lastid . '"> Delete</a></td>
                        <td><a  data-toggle="modal" data-target="#editid" href="admin.php?page=edit_phone&edit=' . $lastid . '" class="btn btn-info"><i><b>Edit</b></i></a></td>
                      </tr>';
      } elseif ($_REQUEST['param'] == "delete_phone") {
        $wpdb->delete("wp_my_phone", array(
          "id" => $_REQUEST['id']
        ));
      } elseif ($_REQUEST['param'] == "edit_phone") {
        $wpdb->update(wp_my_phone(), array(
          "name" => $_REQUEST['name'],
          "phone" => $_REQUEST['inputPhone'],
          "image" => $_REQUEST['imagename']
        ), array(
          "id" => $_REQUEST['phone_id']
        ));
      }
      wp_die();
    }
  }

  // ========== End ajax
  function My_short_phone_function()
  {
    // include_once PLUGIN_DIR_PATH_phone."/views/list_phone.php";

    ?>
  <!--model -->

  <div class="container firstcontainer">
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg bntsty" data-toggle="modal" data-target="#myModal">Add Phone</button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">

            <div class="alert alert-success">
              <h4>Add Phone </h4>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">Add New Phone</div>
              <div class="panel-body">
                <form class="form-horizontal" action="javascript:void(0)" id="myfrmphonedata">
                  <?php wp_enqueue_media(); ?>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="Name">Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name--" required>
                      <span id="errmsg" class="text-danger font-weight-bold"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Image:</label>
                    <div class="col-sm-10">
                      <input type="button" class="btn btn-info" value="Uplode Book Image" id="btnimage">
                      <span id="showimage"></span>
                      <input type="hidden" id="imagename" name="imagename">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="Name">Phone Number:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputPhone" id="inputPhone" placeholder="Enter Phone" required autocomplete="off">
                      <span id="errmsg" class="text-danger font-weight-bold"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" id="btnsubmit" class="btn btn-default clsbtn">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br><br>
    <!-- table -->
    <?php
      global $wpdb;
      $all_phone = $wpdb->get_results(
        $wpdb->prepare(
          "SELECT * FROM wp_my_phone",
          "ORDER by id DESC",
          ""
        ),
        ARRAY_A
      );
      ?>

    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="panel panel-danger">
            <div class="panel-heading">Phone List
              <input type="text" name="search_bar" id="search_bar" class="form-control col-md-2" placeholder="search">
            </div>
            <div class="col-xs-6" style="margin-top: 2px;">
              <input class="form-control" id="clicksearch" type="text" placeholder="search here">
            </div>
            <div class="col-xs-6" style="margin-top:2px;padding-left:3px ">
              <input type="button" name="" value="search" class="btn btn-success clickbtn">
            </div>

            <div class="panel-body">
              <table class="table table-striped" id="tableseac">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Phone</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">Created_at</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $content = '';

                    if (count($all_phone) > 0) {
                      $s = 1;
                      foreach ($all_phone as  $value) {

                        $content .= '<tr class="record_row_' . $value['id'] . '">
                        <td>' . $value["id"] . '</td>
                        <td>' . $value["phone"] . '</td>
                        <td>' . $value['name'] . '</td>
                        <td>' . '.<img style="width: 80px;height: 80px"  src="' . $value['image'] . '">' . '</td>
                        <td>' . $value['created_at'] . '</td>
                        <td><a  id="delphone" href="javascript:void(0)" class="btn btn-danger delbook" data-id="' . $value['id'] . '"> Delete</a></td>
                        <td><a  data-toggle="modal" data-target="#editid" href="admin.php?page=edit_phone&edit=' . $value['id'] . '" class="btn btn-info"><i><b>Edit</b></i></a></td>
                      </tr>';
                      }
                      echo $content;
                    }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php

    }
    add_shortcode("phone_page", "My_short_phone_function");
    // ===============ene
    new phone_directory;
    // ====== End Oop Class
    // ======= plugin activation  create table=======
    register_activation_hook(__FILE__, 'database_auto_table');
    register_deactivation_hook(__FILE__, 'Delete_database_auto_table');

    // ======= EnD plugin activation  create table=======
    //  ============= Activation Database table =======
    function wp_my_phone()
    {
      global  $wpdb;
      return $wpdb->prefix . "my_phone";
    }
    function database_auto_table()
    {
      global  $wpdb; // this is a variable
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      $sql = "
              CREATE TABLE `" . wp_my_phone() . "` (
               `id` int(11) NOT NULL AUTO_INCREMENT,
               `phone` varchar(255) DEFAULT NULL,
               `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
               `name` varchar(222) NOT NULL,
               `image` varchar(222) NOT NULL,
               PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
      dbDelta($sql);
      // ===dynamic page create code===
      // Create post object
      $my_post = array(
        'post_title'    => "phone page",
        'post_content'  => "[phone_page]", // This is a shortcode 
        'post_status'   => 'publish',
        "post_type"     => "page",
        "post_name"     => "my_phone"
      );
      // Insert the post into the database
      $phone_id = wp_insert_post($my_post);
      add_option("my_phone_page_id", $phone_id);
      // ===End dynamic page create code===
    }
    //  ============= end  Activation Database table =======
    // =============  Deactivation Delete Database table =====
    function Delete_database_auto_table()
    {
      global  $wpdb;
      $wpdb->query(" DROP table if exists wp_my_phone");

      // delete the page in database 
      // step:1 get the id of page
      // step:2 delete the page from database
      $the_post_id = get_option('custom_plugin_page_id'); // get the id
      if (!empty($the_post_id)) {
        wp_delete_post($the_post_id, true);
      }
      if (get_role("book_user_key")) {
        remove_role("book_user_key");
      }
      // delete page
      if (!empty(get_option("my_phone_page_id"))) {
        $page_id = get_option("my_phone_page_id");
        wp_delete_post($page_id, true); //wp_post table
        delete_option("my_phone_page_id"); // wp_options table
      }
    }
// ============= End Deactivation Delete Database table ====
// ===========================================================================
