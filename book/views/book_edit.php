
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
<!--   <meta http-equiv="refresh" content="10"/> this is a autorelode in few time -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  

 
 <style type="text/css">
 	.error{
 		color: red
 	}
 </style>

</head>
<body>
    <?php wp_enqueue_media();?>
    <?php
    $book_id=isset($_GET['edit'])? intval($_GET['edit']):0;
    global $wpdb;
    $book_detailes=$wpdb->get_row(
      $wpdb->prepare(
        "SELECT * FROM wp_my_book","WHERE id=%d",$book_id
      ),ARRAY_A
    );
    print_r($book_detailes);



    ?>
  <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="alert alert-success">
        <h4>Edit</h4>
      </div>
      <div class="panel panel-primary">
  <div class="panel-heading">Update Book</div>
  <div class="panel-body"> 
    <form class="form-horizontal" action="javascript:void(0)" id="myfrmeditdata">
      <input type="hidden" name="book_id" value="<?php echo isset($_GET['edit'])?intval($_GET['edit']):0; ?>">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Name" value="<?PHP echo $book_detailes['name'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Author:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtauthor" id="txtauthor" placeholder="Enter Author.." value="<?PHP echo $book_detailes['author'];?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">About:</label>
    <div class="col-sm-10">
      <textarea  name="txtabout" id="txtabout" placeholder="Enter About" class="form-control" ><?php echo $book_detailes['about'];?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Image:</label>
    <div class="col-sm-10">
      <input type="button" class="btn btn-info" value="Uplode Book Image" id="btnimage">
      <span id="showimage">
        <img src="<?php echo $book_detailes['book_image'];?>" style="height: 80px;width: 80px">
      </span>
      <input type="hidden" id="imagename" name="imagename" value="<?php echo $book_detailes['book_image'];?>">
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
</body>
</html>