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
  <div class="panel-heading">Add New Student</div>
  <div class="panel-body"> 
    <form class="form-horizontal" action="javascript:void(0)" id="myfrmstudentdata">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Name"> Student Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="studentname" id="studentname" placeholder="Enter Name" required >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Student Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="studentemail" id="studentemail" placeholder="Enter Email.." required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="username">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username.." required>
    </div>
  </div>
 
   <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="userpassword" id="userpassword" placeholder="Enter Password.." required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="password">Confirm Password:</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Enter Confirm Password.." required>
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