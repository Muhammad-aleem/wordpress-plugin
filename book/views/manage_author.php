<?php
global $wpdb;

$all_authors=$wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM wp_my_authors","ORDER by id DESC",""
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
				  <div class="panel-heading">Manage Authors</div>
				  <div class="panel-body">
				  	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            	<th>Sr no</th>
                <th>Name</th>
                <th>Fb link</th>
                <th>About</th>
                <th>Created_at</th>
                <th>Actiuon</th>
             
            </tr>
        </thead>
        <tbody>
            
           
            <?php 
// do_action("our_custom_hook");  this is a action hook da_action
            if(count($all_authors)>0){
                $s=1;
                foreach ($all_authors as $value ) {
                    ?>   
                <td><?php echo  $s++;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['fb_link'];?></td>
                <td><?php echo $value['about'];?></td>
                <td><?php echo $value['created_at'];?></td>
                <td><a  href="javascript:void(0)" class="btn btn-danger delbook"data-id="<?php echo $value['id'];?>"> Delete</a></td>
                
                    </tr>
                    <?php
                }
            }?>
           
         
    </table>
				  	
				  </div> 

				  
				  </div>
			</div>
		</div>
	</div>

</body>
</html>
