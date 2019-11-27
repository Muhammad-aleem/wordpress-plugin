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
 
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="alert alert-success">
          <h4>Author</h4>
        </div>
      <div class="panel panel-primary">
  <div class="panel-heading">Add New Authors</div>
  <div class="panel-body"> 
    <form class="form-horizontal" action="javascript:void(0)" id="myfrmauthordata">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Name"> Author Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="authorname" id="authorname" placeholder="Enter Name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Fb Link:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="fblink" id="fblink" placeholder="Enter facebook Url.." required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">About:</label>
    <div class="col-sm-10">
      <textarea name="authorabout" id="authorabout" placeholder="Enter About" class="form-control" ></textarea>
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