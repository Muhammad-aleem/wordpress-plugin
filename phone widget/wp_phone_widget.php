<?php
/*
Plugin Name: Phone widget
Plugin URI: https:custon.com
Description: Just another custom form plugin. Simple but flexible
this is a phone directory plugin created by M.Aleem.
Author: Aleem
Author URI: https://custon.wordpress.com/
Text Domain: custom plugin
Version: 5.1.1
*/
if (!class_exists('myCustomwidget')) {
			class myCustomwidget extends wp_widget{
		public function __construct(){
				parent::wp_widget(false,"widgets plugin");
			}

			public function form($instance){
				if(!empty($instance)){
						$title=$instance['title'];
				}else{
					$title='';
					
				}
				?>
					<p>
						<label for="<?php echo $this->get_field_id( 'title' ); ?>">Phone title:</label>
						<input  type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"  name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title;?>">
					</p>
				<?php
			
			}
			public function update($new_instance, $old_instance){
				// this is a updata section
				$instance =$old_instance;
				$instance['title'] =$new_instance['title'];
				
				return $instance;

			}
			public function widget($args, $instance){
				 
        global $wpdb;
         $all_phone=$wpdb->get_results(
         $wpdb->prepare(
        "SELECT * FROM wp_my_phone LIMIT 3","ORDER by id DESC",""
                    ),ARRAY_A
                    );     
				// this is a front end section

				echo $args['before_widget'] ; // <aside>
				echo $args['before_title']; // <h2>
				echo $instance['title'];
			    ?>
			     <table>
			     	<tr>
				     	<th>Name</th>
				     	<th>phone</th>
				     	<th>image</th>
			     	</tr>
			     	
			     	<?php
			     	foreach ($all_phone as  $value) {
			     		?>
			     		<tr>
			     		<td><?php echo $value['phone']?></td>
			     		<td><?php echo $value['name']?></td>
			     		 <td><img style="width: 80px;height: 80px"  src="<?php echo $value['image'];?>"></td>
			     		 </tr>



			     		<?php
			     	}
			     	?>
			     </table>
			    <?php
				
			    echo $args['after_title'];  //</h2>
				
				echo $args['after_widget'];//</aside>
			}
		}
		function register_widget_area(){
			register_widget('myCustomwidget');
		}
		add_action('widgets_init','register_widget_area');
		}
?>