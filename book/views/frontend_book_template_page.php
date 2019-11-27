<?php

/*
Template Name:front end page layout


*/
get_header();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  	jQuery(document).on('click','.btn_enrol',function(){
        console.log("Enrol Successfully");	
       
      });
  </script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-success" style="background-color:#d3f582;!important ">
				<h3>Online web </h3>
			</div>
			<?php
			echo do_shortcode("[book_page]");
			?>
		</div>
	</div>
</div>
</body>
</html>


<?php
get_footer();


?>