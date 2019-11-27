
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

  <script type="text/javascript">
    $(function(){
      $("#forpost").validate({
        submitHandler:function(){

         
          var post_data=$("forpost").serialize()+"&action=custom_plugin_library_post&param=post_form_data";


          
        jQuery.post(my_ajax_object.ajax_url,post_data,function(response){
          // var data=$.parseJSON(response);
          // console.log(data);

          console.log("name"+response.txtname+"email"+response.txtemail);
        });

      }
    });
      });


  </script>
  <style type="text/css">
    .error{
      color: red;
    }
  </style>
</head>
<body>
  <?php
   global $wpdb;
   // {$wpdb->insert,$wpdb->update,$wpdb->delete }
   //  step:1
   // $wpdb->insert(
   // 	"wp_custom_plugin",
   // 	array(
   // 		"name"=>"online web ",
   // 		"email"=>"online web.gmail.com",
   // 		"phone"=>"1232323445677",
   // 	)
   // );
   // step:2
   // $wpdb->query("INSERT INTO wp_custom_plugin(name,email,phone) values('hhh','aleem121@gmail.com','32344556655556') ");
   // $wpdb->query(
   // 	  $wpdb->prepare("INSERT INTO wp_custom_plugin(name,email,phone) values('%s','%s','%s')","Irtaza","mian.aleemIrtaza1414@gmail.com",'23423454345456456')
   	  // varchar type(%s)
   	  //integer type(%d)
   // );
   // update data
   // step :1
    // $wpdb->update(
    // 	"wp_custom_plugin",
    // 	array(
    // 		"email"=>"Aleem@pakistan.com"
    // 	),
    // 	array(
    // 		"id"=>1
    // 	)
    // );
    // step :2 to update data
     // $wpdb->query(
   	 //  $wpdb->prepare("Update wp_custom_plugin set  email='%s' where id =%d ","pakistan1212@gmail.com",6 )
   	  // varchar type(%s)
   	  //integer type(%d)
   // );

   // delete ---Step:1
   // $wpdb->delete(
   // 	"wp_custom_plugin",
   // 	array("id"=>3)
   // ); // step:2
   // $wpdb->query(
   // 	  $wpdb->prepare("delete from wp_custom_plugin  where id =%d ",5 )
   	
   // );

   ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
 
  <form action="#" id="forpostdata">
     <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="txtname" placeholder="Enter Name" name="txtname" required>
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="txtemail" placeholder="Enter email" name="txtemail" required>
    </div>
     <div class="form-group">
      <label for="email">Phone:</label>
      <input type="text" class="form-control" id="txtphone" placeholder="Enter phone" name="txtphone" required>
    </div>
   
    
    <button type="submit" id="btnsubmit" class="btn btn-default">Submit</button>
  </form>
  </div>
  </div>
</div>

</body>
</html>