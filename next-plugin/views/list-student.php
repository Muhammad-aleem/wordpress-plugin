<?php
  global $wpdb;
  $all_students=$wpdb->get_results(
  	$wpdb->prepare(
  		"SELECT * FROM wp_next_plugin ",""
  	),ARRAY_A
  );

  $action=isset($_GET['action'])? trim($_GET['action']) :"";
    $id= isset($_GET['id'])?intval($_GET['id']):"";
    if (!empty($action) && $action=="delete" ) {
    	$row_exists=$wpdb->get_row(
    		$wpdb->prepare(
    			"SELECT * FROM wp_next_plugin WHERE id=%d",$id
    		)
    	);
    	if (count($row_exists)> 0) {
    		$wpdb->delete("wp_next_plugin",array(
    			"id"=>$id
    		));
    		?>
    		<script type="text/javascript">
    			location.href="<?php echo site_url()?>/wp-admin/admin.php?page=next-plugin";
    		</script>
    		<?php
    		
    	}
    }

 if (count($all_students) > 0 ) {
 	?>
 	<table cellpadding="10px" border="1">
 		<tr>
 			<th>Sr No</th>
 			<th>Name</th>
 			<th>Email</th>
 			<th colspan="2">Action</th>

 		</tr>
 	<?php
 	$count=1;
 	foreach ($all_students as $index=> $student) {
 		?>
 		<tr>
 			<td><?php echo $count++;?></td>
 			<td><?php echo $student['name']?></td>
 			<td><?php echo $student['email']?></td>
 		    <td><a href="admin.php?page=next-plugin&id=<?php echo $student['id'];?>&action=delete" onclick="return confirm('Are you sure want to Delete ?')">Delete</a></td>
 		    <th><a href="admin.php?page=add-student-plugin-slug&action=edit&id=<?php echo $student['id'];?>">Edit</a></th>

 		</tr>
 	<?php
 	}
 	?>
 	</table>
 	<?php
 	
 }
?>