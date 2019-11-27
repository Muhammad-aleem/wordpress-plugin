<?php


  $getparam= isset($_REQUEST['param'])?$_REQUEST['param']:"";

  global   $wpdb;
  // if (!empty($getparam)) {
  //   if ($getparam=="get_message") {
  //   	echo json_encode(array(
  //         "name"=>"online web create",
  //          "author"=>"Aleem"

  //   	));
  //   	die;
  //   }
  // }

  // if ($getparam=="post_form_data") {
  //    print_r($_REQUEST);
  //    die; 
  // }
  if (!empty($getparam)) {

 if ($getparam=="savedata") {
    $name=isset($_REQUEST['txtname'])? $_REQUEST['name']:"";
     $email=isset($_REQUEST['txtemail'])? $_REQUEST['email']:"";
     $phone=isset($_REQUEST['txtphone'])? $_REQUEST['phone']:"";
     $wpdb->insert("wp_custom_plugin", array(
    "name"=>$name,
    "email"=>$email,
    "phone"=>$phone
     ));
     echo json_encode(array("status"=>1,"msg"=>"data saved"));

  }

}

?>
