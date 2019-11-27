<?php 
global $wpdb;

$all_book=$wpdb->get_results(
    $wpdb->prepare(
        "SELECT book.id,book.name,book.author,book.about,book.book_image,book.created_at,author.name FROM wp_my_book book, wp_my_authors author where book.author=author.id ORDER BY book.id DESC",""
    ),ARRAY_A
  );

// print_r($all_book);

?>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script type="text/javascript">
       jQuery(document).ready(function() {
      jQuery('#mybook').DataTable();
   } );
  </script>
 
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-10">
     <!--  <div class="alert  alert-info">
        <h2>Error</h2>
      </div> -->
    <div class="panel panel-primary">
  <div class="panel-heading">List Book
<input type="text" name="search" class="searched__text"> <button class="search__click">Search</button>
  </div>
  <div class="panel-body"> 
     <table id="mybook" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Author</th>
                <th>About</th>
                <th>Iamge</th>
                <th>Created At</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php 

          
// do_action("our_custom_hook");  this is a action hook da_action
            if(count($all_book)>0){
                $s=1;
                foreach ($all_book as $key => $value ) {
                    ?>
                     <tr class="record_row_<?php echo $value['id'];?>">
                <td><?php echo  $s++;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['about'];?></td>
                <td><img style="width: 80px;height: 80px"  src="<?php echo $value['book_image'];?>"></td>
                <td><?php echo $value['created_at'];?></td>
                <td><a  href="javascript:void(0)" class="btn btn-danger delbook"data-id="<?php echo $value['id'];?>"> Delete</a></td>
                <td><a   href="admin.php?page=edit_book&edit=<?php echo $value['id'];?>" class="btn btn-info">Edit</a></td>

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
