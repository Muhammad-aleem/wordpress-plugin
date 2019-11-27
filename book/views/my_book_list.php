 <?php
 global $wpdb;
 global $user_ID;

$all_data=$wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM wp_my_book","ORDER by id DESC",""
    ),ARRAY_A
  );
  
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.stydata{
		float: left;
		 width: 32%;
		 border:1px solid gray;
		 padding: 10px;
		 text-align:center;
		 margin-left: 10px;
	}
</style>
<script type="text/javascript"></script>

<body>

</body>
</html>
            <?php if (count($all_data)>0 ) {
              foreach ($all_data as  $value) {
              	?>
              	<div class="col-md-4 stydata">
					<p><img style="width:100px;height: 100px"  src="<?php echo $value['book_image'];?>"></p>
					<p><?php echo $value['name']?></p>
					<p><?php  echo get_author_details($value['author'])['name'] ?></p>
					<p>
						<?php
						if ($user_ID>0) {
							// user are login 
							?>
							<a class="btn btn-success btn_enrol" href="javascriot:void(0)">
								Enrol Now
						</a>
							<?php

						}else{
							// user are not login
							?>
							<a class="btn btn-success" href="<?php echo wp_login_url();?>">Login to Enrol
						</a>
							<?php

						}
						?>
						</p>
		           </div>
			
              	<?php
              		
              	}	
            }
            ?>
     			
			
		</body>
		</html>

