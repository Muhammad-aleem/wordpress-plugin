<?php
/*
Plugin Name: custom widgets plugin
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin
Author: Aleem
Version: 1.7.1
*/

		if (!class_exists('myCustomwidget')) {
			class myCustomwidget extends wp_widget{
		public function __construct(){
				parent::wp_widget(false,"widgets plugin");
			}

			public function form($instance){
				if(!empty($instance)){
					$title=$instance['title'];
					$description=$instance['description'];
					$type=$instance['type'];
				}else{
					$title='';
					$description='';
					$type='';
				}
				?>
				<p>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
					<input  type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"  name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title;?>">
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('description');?>">Discription:</label>
					<textarea  id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description');?>" ><?php echo 
					$description
					
					?></textarea>
				</p>
				<p>
					<label for="<?php echo $this->get_field_id('type');?>">Select Playlist</label>
					<select id="<?php echo $this->get_field_id('type');?>" name="<?php echo $this->get_field_name('type');?>">
						<option value="select">Select</option>
						<?php
						$widgetdata=['Aleem','Azeem','haider'];
						foreach ($widgetdata as  $data) {
							$selected='';
							if ($data==$type) {
								$selected='selected';
							}
							
							?>
							 <option value="<?php echo $data ?>"<?php echo $selected ;?>><?php echo $data?></option>
							<?php
						}

						?>
						
						
					</select>
				
				<?php
			}
			public function update($new_instance, $old_instance){
				$instance =$old_instance;
				$instance['title'] =$new_instance['title'];
				$instance['description'] =$new_instance['description'];
					$instance['type'] =$new_instance['type'];
				
				return $instance;

			}
			public function widget($args, $instance){
				echo $args['before_widget'] ; // <aside>
				echo $args['before_title']; // <h2>
				echo $instance['title'];
			    echo $args['after_title'];   //</h2>
				echo $instance['description'];
				echo '<p>'.$instance['type'].'</p>';
				echo $args['after_widget'];//</aside>


			}
		}
		function register_widget_area(){
			register_widget('myCustomwidget');
		}
		add_action('widgets_init','register_widget_area');

		}

?>