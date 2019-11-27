// <?php

// 			wp_enqueue_style('bootstrap.min_file ',PLUGIN_URL.'/custom-plugin/assets/css/bootstrap.min.css');
// 			wp_enqueue_style('line-icons_file ',PLUGIN_URL.'/custom-plugin/assets/fonts/line-icons.css');


// 			wp_enqueue_style('slicknav_file ',PLUGIN_URL.'/custom-plugin/assets/css/slicknav.css');
// 			wp_enqueue_style('color-switcher_file ',PLUGIN_URL.'/custom-plugin/assets/css/color-switcher.css');
// 			wp_enqueue_style('animate_file ',PLUGIN_URL.'/custom-plugin/assets/css/animate.css');
// 			wp_enqueue_style('owl.carousel_file ',PLUGIN_URL.'/custom-plugin/assets/css/owl.carousel.css');
// 			wp_enqueue_style('css/main_file ',PLUGIN_URL.'/custom-plugin/assets/css/main.css');
// 			wp_enqueue_style('responsive.cssfile ',PLUGIN_URL.'/custom-plugin/assets/css/responsive.css');
// 		//  javascript parts


// 	       wp_enqueue_script( 'bootstrap/js file', PLUGIN_URL.'/custom-plugin/assets/js/jquery-min.js', array(), '1.1', true );
	
		
// 		   wp_enqueue_script( 'popper.min file',PLUGIN_URL .'/custom-plugin/assets/js/popper.min.js', array(), '1.1', true );

// 		   wp_enqueue_script( 'bootstrap.min file', PLUGIN_URL .'/custom-plugin/assets/js/bootstrap.min.js', array(), '1.1', true );
// 			wp_enqueue_script( 'color-switcher file', PLUGIN_URL .'/custom-plugin/assets/js/color-switcher.js', array(), '1.1', true );

// 			wp_enqueue_script( 'jquery.counterup.min file', PLUGIN_URL .'/custom-plugin/assets/js/jquery.counterup.min.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/waypoints.min file', PLUGIN_URL .'/custom-plugin/assets/js/waypoints.min.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/wow file', PLUGIN_URL.'/custom-plugin/assets/js/wow.js', array(), '1.1', true );

// 			wp_enqueue_script( 'js/owl.carousel file',PLUGIN_URL .'/custom-plugin/assets/js/owl.carousel.min.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/jquery_file', PLUGIN_URL .'/custom-plugin/assets/js/jquery.slicknav.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/main_file', PLUGIN_URL .'/custom-plugin/assets/js/main.js', array(), '1.1', true );

// 			wp_enqueue_script( 'js/form-validator_file', PLUGIN_URL.'/custom-plugin/assets/js/form-validator.min.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/contact_file', PLUGIN_URL.'/custom-plugin/assets/js/contact-form-script.min.js', array(), '1.1', true );

// 			wp_enqueue_script( 'assets/js/summernote_file', PLUGIN_URL .'/custom-plugin/assets/js/summernote.js', array(), '1.1', true );

			// -------------jquery files---------

			
			// wp_enqueue_script( 'ajax-script', PLUGIN_URL . '/custom-plugin/assets/js/my-ajax-script.js', array('jquery') ,true);

	// -------------end jquery files---------

			// this is a only java files

			// wp_enqueue_script( 'javafile', PLUGIN_URL.'/assets/js/script.js', array(), '1.1', false );


			// wp_enqueue_script('javafile',PLUGIN_URL.'/custom-plugin/assets/js/script.js', PLUGIN_VERSION,true);



		// 		$object_array=array(
		// 			"Name"=>"Taleem.com",
		// 			"Author"=>"Muhammad Aleem",
		// 			"ajaxurl"=>admin_url('admin-ajax')

		// 		);

		// 	wp_localize_script("javafile","ajaxurl",admin_url('admin-ajax.php'));


  // function js_cord(){
  // 	
  // 	  add_action("wp_head","js_cord");




 //  	  function my_enqueue() {
	
 //   wp_enqueue_script( 'ajax-script', PLUGIN_URL . '/custom-plugin/assets/js/my-ajax-script.js', array('jquery') );
 //   wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 // }
 // add_action( 'init', 'my_enqueue' 

// wp_authors
CREATE TABLE `wp_authors` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `fb_link` text,
 `about` text,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
// student

wp_student
CREATE TABLE `wp_student` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) DEFAULT NULL,
 `email` varchar(255) DEFAULT NULL,
 `user_login_id` int(11) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
// =====enrol
wp_enrol
CREATE TABLE `wp_enrol` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `student_id` int(11) NOT NULL,
 `book_id` int(11) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
// ==========
 $sql2="
     `".wp_authors_table()."` (
             `id` int(11) NOT NULL AUTO_INCREMENT,
             `name` varchar(255) DEFAULT NULL,
             `fb_link` text,
             `about` text,
             `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
             PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
             dbDelta($sql2);
              $sql3="
              `".wp_student_table()."` (
                     `id` int(11) NOT NULL AUTO_INCREMENT,
                     `name` varchar(255) DEFAULT NULL,
                     `email` varchar(255) DEFAULT NULL,
                     `user_login_id` int(11) DEFAULT NULL,
                     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                     PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
                    dbDelta($sql3);
                        $sql4="
                             `".wp_enrol_table()."` (
                               `id` int(11) NOT NULL AUTO_INCREMENT,
                               `student_id` int(11) NOT NULL,
                               `book_id` int(11) NOT NULL,
                               `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                PRIMARY KEY (`id`)
                            ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
                            dbDelta($sql4);
                            // ++++++++++++++=


                               function wp_authors_table(){
       global  $wpdb ;
       return $wpdb->prefix."wp_authors";
   
      }
           function wp_student_table(){
         global  $wpdb ;
         return $wpdb->prefix."wp_student";
     
        }
             function wp_enrol_table(){
             global  $wpdb ;
             return $wpdb->prefix."wp_enrol";
         
            }
            // ====================


            $wpdb->query(" DROP table if exists wp_authors");
   $wpdb->query(" DROP table if exists wp_student");
   $wpdb->query(" DROP table if exists wp_enrol");
   // delete the page in database 