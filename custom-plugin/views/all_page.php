
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

 
 <style type="text/css">
 	.error{
 		color: red
 	}
 </style>
 <?php wp_enqueue_media();?>
</head>
<body>
	<?php echo do_shortcode("[custom-plugin]");?>






<div class="container">
 
  <form action="#" id="forpostallpage">
     <div class="form-group">
      <label for="email">Full Name :</label>
      <input type="text" class="form-control" required="" id="txtallname" placeholder="Enter Name" name="txtallname" >
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"required="" id="txtallemail" placeholder="Enter email" name="txtallemail" >
    </div>
      <div class="form-group">
      <label for="email">uplode:</label>
      <input type="button" class="form-control"id="btnimage"  name="txtallimage" value="Uplode image" >
      <img src="" id="getimage" style="width: 100px;height: 100px">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>