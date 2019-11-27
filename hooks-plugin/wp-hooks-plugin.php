<?php
/*
Plugin Name: hooks-plugin
Plugin URI: http://wordpress.org/plugins/
Description: This is not just a plugin, 
Author: Aleem
Version: 1.7.1
Author URI: http://ma.tt/
*/



function Wp_hooks_init(){
	 register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
        )
    );

}
add_action('init','Wp_hooks_init');

//  this is a admin bar

    function admin_bar_menu_page($wp_admin_bar){
   $arrg=array(
   	  "id"=>"Google_id",
   	  "title"=>"Google",
   	  "href"=>"https://www.google.com",
   	  "meta"=>array(
   	  	"class"=>"google_calss",
   	  	"target"=>"_blank"
   	  )
   );
    $wp_admin_bar->add_node($arrg);
    
    $youtube=array(
    	"id"=>"youtube_id",
   	  "title"=>"youtube",
   	  "href"=>"https://www.youtube.com",
   	  "parent"=>"Google_id",
   	  
   	  "meta"=>array(
   	  	"target"=>"_blank"
   	  )

);






    $wp_admin_bar->add_node($youtube);

    }
    add_action("admin_bar_menu","admin_bar_menu_page",999);
    // end this is a admin bar

    // admin notices
    function wp_admin_notices_name(){
  ?>
  <div class="notice notice-error is-dismissible" >
  	<p>
  		this is a error message of admin panal
  	</p>
  </div> 

  <?php

    }
  //  add_action("admin_notices","wp_admin_notices_name");
    // end admin notices

      // login-form   
  		function login_form_fun(){
  			$textname=isset($_POST['input'])? $_POST['input']:'';
  			?>
  			<p>
  				<label for="txtname">Name</label>
  				<input type="text" name="input" size="25"/ value="<?php echo $textname;?>">
  			</p>
  			<?php

  		}
  		//add_action('login_form',"login_form_fun");
  		
  		function owt_extra_fieldes_error_message(){
  			GLOBAL $error;

  			if (empty($_POST['input'])) {
  				$error="Name fieldes should nat be empty ";

  			}

  		}
  		//add_action("login_head","owt_extra_fieldes_error_message");

    // end login from
  		// wp_login
  		function Wp_login_function(){


  		}
  		add_action("wp_login","Wp_login_function");
  		// end wp_login

    ?>