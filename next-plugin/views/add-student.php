<?php

global $wpdb;
$msg='';
$action=isset($_GET['action'])? trim($_GET['action']) :"";
$id= isset($_GET['id'])?intval($_GET['id']):"";
$row_detailes= $wpdb->get_row(
	$wpdb->prepare(
		"SELECT * From wp_next_plugin WHERE id= %d",$id
	),ARRAY_A
);
// print_r($row_detailes);


if (isset($_POST['btnsubmit'])) {
	$action=isset($_GET['action'])? trim($_GET['action']) :"";
    $id= isset($_GET['id'])?intval($_GET['id']):"";
    if (!empty($action)) {
    	$wpdb->update("wp_next_plugin",array(
    		"name"=>$_POST['textname'],
            "email"=>$_POST['email']


		    	),array(
		    		"id"=>$id
		    	));
    	$msg="From data update successfully ";
    	
    }else{
    		$wpdb->insert("wp_next_plugin",array(
    "name"=>$_POST['textname'],
    "email"=>$_POST['email']
	));
	if ($wpdb->insert_id >0) {
		$msg="From data successfully saved";
	}else{
		$msg="Failed  save data";
	}

    }


	

	
}
?>
<?php echo $msg;?>
 
<form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?page=add-student-plugin-slug<?php if(!empty($action)){ echo '&action=edit&id='.$id;}?>">
	<p>
		<label  for="">Name</label>
		<input type="text" name="textname" placeholder="Enter Name" value="<?php echo $row_detailes['name']?$row_detailes['name']:''?>">
	</p>
	<p>
		<label  for="">Email</label>
		<input type="email" name="email" placeholder="Enter Email" value="<?php echo $row_detailes['email']?$row_detailes['email']:"";?>">
	</p>
	<!-- <p>
		<label  for="">Image</label>
		<input type="file" name="studentimage">
	</p> -->
	<p>
		<button style="margin-left: 40px" type="submit" name="btnsubmit">Submit</button>
	</p>
</form>