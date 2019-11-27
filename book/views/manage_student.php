<?php
 global $wpdb;
 $all_student=$wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM wp_my_student","ORDER by id DESC",""
    ),ARRAY_A
  );
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		 jQuery(document).ready(function() {
      jQuery('#example').DataTable();
   } );
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="panel panel-primary">
				  <div class="panel-heading">Manage Studen</div>
				  <div class="panel-body">
				  	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            	<th>Sr no</th>
            	<th>Name</th>
                <th>Email</th>
                <th>username</th>
                <th>Created_at</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
             <?php
                if (count($all_student) > 0) {
                    $i=1;
                    foreach ($all_student as $value) {
                        $userdetails=get_userdata($value['user_login_id']);
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo $value['email'];?></td>
                            <td><?php echo  $$value['user_login']; ?></td>

                            <td><?php echo $value['created_at'];?></td>
                            <td>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        <?php
                      
                    }
                }

            ?>
            
         
    </table>
				  	
				  </div> 

				  
				  </div>
			</div>
		</div>
	</div>

</body>
</html>
