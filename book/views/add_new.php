<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
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
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="alert alert-success">
          <h4>Add Book</h4>
        </div>
      <div class="panel panel-primary">
  <div class="panel-heading">Add New Book</div>
  <div class="panel-body"> 
    <form class="form-horizontal" action="javascript:void(0)" id="myfrmdata">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Name">Book Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txtname" id="txtname" placeholder="Enter Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Author:</label>
    <div class="col-sm-10">
      <select name="txtauthor" id="txtauthor" class="form-control">
        <option value="-1">---Choose Authors---- </option>
        <?php
        global $wpdb;
        $all_authors=$wpdb->get_results(
       $wpdb->prepare(
        "SELECT * FROM wp_my_authors","ORDER by id DESC",""
       )
    );
         foreach ($all_authors as $index=>$value) {
           ?>
           <option value="<?php echo  $value->id;?>"><?php echo $value->name;?></option>
           <?php
         }
        ?>
       </select>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">About:</label>
    <div class="col-sm-10">
      <textarea name="txtabout" id="txtabout" placeholder="Enter About" class="form-control" ></textarea>
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
    <div class="col-sm-offset-2 col-sm-10">
      <button  type="submit" id="btnsubmit"class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  </div>
  </div>
    </div>
  </div>
</body>
</html>