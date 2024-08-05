<?php 
// Creating the widget
	class evita_contact_feature extends WP_Widget {
	 
	function __construct() {
		parent::__construct('contact_widget', // Base ID
		__('Contact Widget','evita'), // Widget Name
			array(
				'classname' => 'evita_contact_feature',
				'description' => __('Contact Widget Area','evita'),
			)
		);		
	 }
	 
	 public function widget($args,$instance) {
	 echo $args['before_widget']; ?>
			
			<aside class="widget widget-contact">
				<?php if(!empty($instance['contact_widget_title'])){ ?>
					<h4 class="widget-title">
						<?php echo wp_kses_post($instance['contact_widget_title']); ?>
					</h4>
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_address'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-map-marker"></i>	
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_address']); ?>
							</span>
						</a>
					</div>
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_call'])){ ?>					
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-phone"></i>	
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_call']); ?>
							</span>
						</a>
					</div>
					
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_email'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-envelope"></i>	
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_email']); ?>
							</span>
						</a>
					</div>
				<?php } ?>			
				
				<?php if(!empty($instance['contact_widget_office_timing'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-clock-o"></i>
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_office_timing']); ?>
							</span>
						</a>
					</div>
				<?php } ?>
			</aside>	
			
	<?php
	echo $args['after_widget'];
	}
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'contact_widget_title' ])){
			$contact_widget_title = $instance[ 'contact_widget_title' ];
		}
		else {
			$contact_widget_title = '';
		}
		
		if ( isset( $instance[ 'contact_widget_call' ])){
			$contact_widget_call = $instance[ 'contact_widget_call' ];
		}
		else {
			$contact_widget_call = '';
		}
		if ( isset( $instance[ 'contact_widget_email' ])){
			$contact_widget_email = $instance[ 'contact_widget_email' ];
		}
		else {
			$contact_widget_email = '';
		}
	
		if ( isset( $instance[ 'contact_widget_address' ])){
			$contact_widget_address = $instance[ 'contact_widget_address' ];
		}
		else {
			$contact_widget_address = '';
		}
		
		if ( isset( $instance[ 'contact_widget_office_timing' ])){
			$contact_widget_office_timing = $instance[ 'contact_widget_office_timing' ];
		}
		else {
			$contact_widget_office_timing = '';
		}
		
	?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_title' ); ?>"><?php _e( 'Title','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_title' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_title' ); ?>" type="text" value="<?php if($contact_widget_title) echo esc_html( $contact_widget_title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_call' ); ?>"><?php _e( 'Phone Number','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_call' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_call' ); ?>" type="text" value="<?php if($contact_widget_call) echo esc_html( $contact_widget_call ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_email' ); ?>"><?php _e( 'Email Address','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_email' ); ?>" type="text" value="<?php if($contact_widget_email) echo esc_html( $contact_widget_email ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_address' ); ?>"><?php _e( 'Office Address','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_address' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_address' ); ?>" type="text" value="<?php if($contact_widget_address) echo esc_html( $contact_widget_address ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_office_timing' ); ?>"><?php _e( 'Office Timing','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_office_timing' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_office_timing' ); ?>" type="text" value="<?php if($contact_widget_office_timing) echo esc_html( $contact_widget_office_timing ); ?>" />
		</p>
	
	<?php
    }
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['contact_widget_title'] = ( ! empty( $new_instance['contact_widget_title'] ) ) ? sanitize_text_field( $new_instance['contact_widget_title'] ) : '';
		
		$instance['contact_widget_call'] = ( ! empty( $new_instance['contact_widget_call'] ) ) ? sanitize_text_field( $new_instance['contact_widget_call'] ) : '+12 345 678 90';
		
		$instance['contact_widget_email'] = ( ! empty( $new_instance['contact_widget_email'] ) ) ? sanitize_text_field( $new_instance['contact_widget_email'] ) : 'email@company.com';
		
		$instance['contact_widget_address'] = ( ! empty( $new_instance['contact_widget_address'] ) ) ? sanitize_text_field( $new_instance['contact_widget_address'] ) : __('50 Wallstreet,USA','evita');
		
		$instance['contact_widget_office_timing'] = ( ! empty( $new_instance['contact_widget_office_timing'] ) ) ? sanitize_text_field( $new_instance['contact_widget_office_timing'] ) : __('Mon - Fri 09:00Am To 10:00Pm','evita');
		
		return $instance;
	}
}


// Creating the widget
	class evita_about_widget extends WP_Widget {
	 
	function __construct() {
		parent::__construct('about_widget', // Base ID
		__('About Widget','evita'), // Widget Name
			array(
				'classname' => 'evita_about_widget',
				'description' => __('About Widget Area','evita'),
			)
		);		
	 }
	 
	 public function widget($args,$instance) {
	 echo $args['before_widget']; ?>
	 
			<aside class="widget widget_text">
				<div class="textwidget">
					<?php if(!empty($instance['about_widget_logo'])){ ?>
						<div class="footer-logo">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url($instance['about_widget_logo']); ?>" alt="<?php echo esc_attr__('Logo Image','evita') ?>">
							</a>
						</div>
					<?php } ?>
					
					<?php if(!empty($instance['about_widget_content'])){ ?>
						<p>
							<?php echo esc_html($instance['about_widget_content']); ?>
						</p>
					<?php } ?>
					
				</div>
			</aside>
			<aside class="widget widget_social_widget">
				<ul>
					<?php if(!empty($instance[ 'about_widget_facebook_link' ])){ ?>
						<li><a href="<?php echo esc_url($instance[ 'about_widget_facebook_link' ]); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
					<?php } ?>
					
					<?php if(!empty($instance[ 'about_widget_twitter_link' ])){ ?>
						<li><a href="<?php echo esc_url($instance[ 'about_widget_twitter_link' ]); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
					<?php } ?>	
						
					<?php if(!empty($instance[ 'about_widget_instagram_link' ])){ ?>
						<li><a href="<?php echo esc_url($instance[ 'about_widget_instagram_link' ]); ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
					<?php } ?>
					
					<?php if(!empty($instance[ 'about_widget_linkedin_link' ])){ ?>
						<li><a href="<?php echo esc_url($instance[ 'about_widget_linkedin_link' ]); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
					<?php } ?>
					
					<?php if(!empty($instance[ 'about_widget_youtube_link' ])){ ?>
						<li><a href="<?php echo esc_url($instance[ 'about_widget_youtube_link' ]); ?>" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
					<?php } ?>
				</ul>
			</aside>
	<?php
	echo $args['after_widget'];
	}
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'about_widget_logo' ])){
			$about_widget_logo = $instance[ 'about_widget_logo' ];
		}
		else {
			$about_widget_logo = '';
		}
		
		if ( isset( $instance[ 'about_widget_content' ])){
			$about_widget_content = $instance[ 'about_widget_content' ];
		}
		else {
			$about_widget_content = '';
		}
		
		if ( isset( $instance[ 'about_widget_facebook_link' ])){
			$about_widget_facebook_link = $instance[ 'about_widget_facebook_link' ];
		}
		else {
			$about_widget_facebook_link = '';
		}
		if ( isset( $instance[ 'about_widget_twitter_link' ])){
			$about_widget_twitter_link = $instance[ 'about_widget_twitter_link' ];
		}
		else {
			$about_widget_twitter_link = '';
		}
	
		if ( isset( $instance[ 'about_widget_instagram_link' ])){
			$about_widget_instagram_link = $instance[ 'about_widget_instagram_link' ];
		}
		else {
			$about_widget_instagram_link = '';
		}
		
		if ( isset( $instance[ 'about_widget_linkedin_link' ])){
			$about_widget_linkedin_link = $instance[ 'about_widget_linkedin_link' ];
		}
		else {
			$about_widget_linkedin_link = '';
		}
		
		if ( isset( $instance[ 'about_widget_youtube_link' ])){
			$about_widget_youtube_link = $instance[ 'about_widget_youtube_link' ];
		}
		else {
			$about_widget_youtube_link = '';
		}
		
	?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_logo' ); ?>"><?php _e( 'Logo Url','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_logo' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_logo' ); ?>" type="text" value="<?php if($about_widget_logo) echo esc_html( $about_widget_logo ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_content' ); ?>"><?php _e( 'Content','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_content' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_content' ); ?>" type="text" value="<?php if($about_widget_content) echo esc_html( $about_widget_content ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_facebook_link' ); ?>"><?php _e( 'Facebook Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_facebook_link' ); ?>" type="text" value="<?php if($about_widget_facebook_link) echo esc_html( $about_widget_facebook_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_twitter_link' ); ?>"><?php _e( 'Twitter Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_twitter_link' ); ?>" type="text" value="<?php if($about_widget_twitter_link) echo esc_html( $about_widget_twitter_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_instagram_link' ); ?>"><?php _e( 'Instagram Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_instagram_link' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_instagram_link' ); ?>" type="text" value="<?php if($about_widget_instagram_link) echo esc_html( $about_widget_instagram_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_linkedin_link' ); ?>"><?php _e( 'Linkedin Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_linkedin_link' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_linkedin_link' ); ?>" type="text" value="<?php if($about_widget_linkedin_link) echo esc_html( $about_widget_linkedin_link ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'about_widget_youtube_link' ); ?>"><?php _e( 'YouTube Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'about_widget_youtube_link' ); ?>" name="<?php echo $this->get_field_name( 'about_widget_youtube_link' ); ?>" type="text" value="<?php if($about_widget_youtube_link) echo esc_html( $about_widget_youtube_link ); ?>" />
		</p>
	
	<?php
    }
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['about_widget_logo'] = ( ! empty( $new_instance['about_widget_logo'] ) ) ? sanitize_text_field( $new_instance['about_widget_logo'] ) : get_template_directory_url().'assets/images/logo.png';
		
		$instance['about_widget_content'] = ( ! empty( $new_instance['about_widget_content'] ) ) ? sanitize_text_field( $new_instance['about_widget_content'] ) : __('There are many variations of that passages of Lorem Ipsum that a available.','evita');
		
		$instance['about_widget_facebook_link'] = ( ! empty( $new_instance['about_widget_facebook_link'] ) ) ? sanitize_text_field( $new_instance['about_widget_facebook_link'] ) : '#';
		
		$instance['about_widget_twitter_link'] = ( ! empty( $new_instance['about_widget_twitter_link'] ) ) ? sanitize_text_field( $new_instance['about_widget_twitter_link'] ) : '#';
		
		$instance['about_widget_instagram_link'] = ( ! empty( $new_instance['about_widget_instagram_link'] ) ) ? sanitize_text_field( $new_instance['about_widget_instagram_link'] ) : '#';
		
		$instance['about_widget_linkedin_link'] = ( ! empty( $new_instance['about_widget_linkedin_link'] ) ) ? sanitize_text_field( $new_instance['about_widget_linkedin_link'] ) : '#';
		
		$instance['about_widget_youtube_link'] = ( ! empty( $new_instance['about_widget_youtube_link'] ) ) ? sanitize_text_field( $new_instance['about_widget_youtube_link'] ) : '#';
		
		return $instance;
	}
}
	
/**
 * Register Post Categories widget
 *
 */
class evita_author_widget extends WP_Widget{
	
	function __construct() {
		parent::__construct(
			'evita_author_widget', // Base ID
			__('Evita : Author Widget','evita'), // Name
			array( 'description' => __('Author widget', 'evita' ), ) // Args
		);
	}
	
	public function widget( $args , $instance ) {
		
			echo $args['before_widget'];
			
			$author_widget_title 	= isset($instance['author_widget_title']) ? $instance['author_widget_title'] : '';
			$selected_author_id 	= isset($instance['selected_author_id']) ? $instance['selected_author_id'] : 0;
			$author_image_hs 		= isset($instance['author_image_hs']) ? $instance['author_image_hs'] : 1;
			$author_nickname_hs 	= isset($instance['author_nickname_hs']) ? $instance['author_nickname_hs'] : 1;
			$author_first_name_hs 	= isset($instance['author_first_name_hs']) ? $instance['author_first_name_hs'] : 1;
			$author_last_name_hs 	= isset($instance['author_last_name_hs']) ? $instance['author_last_name_hs'] : 1;
			$author_designation_hs 	= isset($instance['author_designation_hs']) ? $instance['author_designation_hs'] : 1;
			$author_description_hs 	= isset($instance['author_description_hs']) ? $instance['author_description_hs'] : 1;
			$author_social_hs 		= isset($instance['author_social_hs']) ? $instance['author_social_hs'] : 1;
			
			
			if(($instance['selected_author_id']) !=null) {
			?>
			<?php 
				$user = (isset($_GET['author_name'])) ? get_user_by('id', $selected_author_id) : get_userdata(intval($selected_author_id));
				
			?>
				<aside class="widget widget_text">
					<?php if(!empty($instance['author_widget_title'])){ ?>
						<h5 class="widget-title">
							<?php echo esc_html($instance['author_widget_title']); ?>
						</h5>
					<?php } ?>
					
					<div class="textwidget">
						<?php if($author_image_hs == '1'): ?>
							<p>
								<img src="<?php echo get_avatar_url($user->ID, 200); ?>" alt="<?php echo esc_attr__('Image','evita'); ?>" class="rounde-img">
							</p>
						<?php endif; ?>						
						
						<h6><span class="primary_color"><?php echo esc_html__('Hi!','evita'); ?></span> <?php echo esc_html__(" I'm",'evita'); ?>
							<?php 				
								if($author_first_name_hs == '1'): echo $user->first_name; endif;
								if($author_last_name_hs == '1'): echo ' '.$user->last_name; endif;
								if($author_nickname_hs == '1'): echo ' '.$user->user_nicename; endif;
							?>
						</h6>
						
						<h5>
							<?php if($author_designation_hs == '1'): echo $user->designation; endif; ?>
						</h5>			
						<p>
							<?php if($author_description_hs == '1'): echo $user->description; endif; ?>
						</p>
						
						<aside class="widget widget_social_widget">
							<ul>
								<?php $facebook_profile = $user->facebook_profile; 
									if ( $facebook_profile && $facebook_profile != '' ): ?>
									<li><a href="<?php echo esc_url($facebook_profile); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>
									
								<?php $twitter_profile = $user->twitter_profile;
								if ( $twitter_profile && $twitter_profile != '' ): ?>
									<li><a href="<?php echo esc_url($twitter_profile); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>
								
								<?php $instagram_profile = $user->instagram_profile;
								if ( $instagram_profile && $instagram_profile != '' ): ?>
									<li><a href="<?php echo esc_url($instagram_profile); ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
								<?php endif; ?>
								
									
								<?php $pinterest_profile = $user->pinterest_profile;
								if ( $pinterest_profile && $pinterest_profile != '' ): ?>
									<li><a href="<?php echo esc_url($pinterest_profile); ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
								<?php endif; ?>
								
								<?php $linkedin_profile = $user->linkedin_profile; 
								if ( $linkedin_profile && $linkedin_profile != '' ): ?>
									<li><a href="<?php echo esc_url($linkedin_profile); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
								<?php endif; ?>
								
								<?php $skype_profile = $user->skype_profile;
								if ( $skype_profile && $skype_profile != '' ): ?>
									<li><a href="<?php echo esc_url($skype_profile); ?>" class="skype"><i class="fa fa-skype"></i></a></li>
								<?php endif; ?>
							</ul>
						</aside>
					</div>
				</aside>
			<?php 

			}			
		echo $args['after_widget'];
	}
	
		public function form( $instance ) {
			$instance['author_widget_title'] = isset($instance['author_widget_title']) ? $instance['author_widget_title'] : '';
			$instance['selected_author_id'] = isset($instance['selected_author_id']) ? $instance['selected_author_id'] : '';
			$instance['author_nickname_hs'] = isset($instance['author_nickname_hs']) ? $instance['author_nickname_hs'] : '1';
			$instance['author_image_hs'] = isset($instance['author_image_hs']) ? $instance['author_image_hs'] : '1';
			$instance['author_first_name_hs'] = isset($instance['author_first_name_hs']) ? $instance['author_first_name_hs'] : '1';
			$instance['author_last_name_hs'] = isset($instance['author_last_name_hs']) ? $instance['author_last_name_hs'] : '1';
			$instance['author_designation_hs'] = isset($instance['author_designation_hs']) ? $instance['author_designation_hs'] : '1';
			$instance['author_description_hs'] = isset($instance['author_description_hs']) ? $instance['author_description_hs'] : '1';
			$instance['author_social_hs'] = isset($instance['author_social_hs']) ? $instance['author_social_hs'] : '1';
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'author_widget_title' ); ?>"><?php _e( 'Title','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'author_widget_title' ); ?>" name="<?php echo $this->get_field_name( 'author_widget_title' ); ?>" type="text" value="<?php if($instance['author_widget_title']){ echo esc_html( $instance['author_widget_title'] ); } ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'selected_author_id' ); ?>"><?php _e('Select Author','evita'); ?></label> 
			<select class="widefat" id="<?php echo $this->get_field_id( 'selected_author_id' ); ?>" name="<?php echo $this->get_field_name( 'selected_author_id' ); ?>">
				<option value>--<?php echo __('Select','evita'); ?>--</option>
				<?php
					$selected_author_id = $instance['selected_author_id'];
					$users = get_users();
					foreach ($users as $user) { 
						$option = '<option value="' . $user->ID . '" ';
						$option .= ( $user->ID == $selected_author_id  ) ? 'selected="selected"' : '';
						$option .= '>';
						$option .= $user->nickname;
						$option .= '</option>';
						echo $option;
					}
				?>	
			</select>
			<br/>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_image_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_image_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_image_hs' ); ?>" value="<?php if($instance[ 'author_image_hs' ]) echo esc_html( $instance[ 'author_image_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_image_hs' ); ?>"><?php _e( 'Hide/show Image ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_nickname_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_nickname_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_nickname_hs' ); ?>" value="<?php if($instance[ 'author_nickname_hs' ]) echo esc_html( $instance[ 'author_nickname_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_nickname_hs' ); ?>"><?php _e( 'Hide/show Nickname ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_first_name_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_first_name_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_first_name_hs' ); ?>" value="<?php if($instance[ 'author_first_name_hs' ]) echo esc_html( $instance[ 'author_first_name_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_first_name_hs' ); ?>"><?php _e( 'Hide/show First Name ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_last_name_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_last_name_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_last_name_hs' ); ?>" value="<?php if($instance[ 'author_last_name_hs' ]) echo esc_html( $instance[ 'author_last_name_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_last_name_hs' ); ?>"><?php _e( 'Hide/show Last Name ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_designation_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_designation_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_designation_hs' ); ?>" value="<?php if($instance[ 'author_designation_hs' ]) echo esc_html( $instance[ 'author_designation_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_designation_hs' ); ?>"><?php _e( 'Hide/show Designation ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_description_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_description_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_description_hs' ); ?>" value="<?php if($instance[ 'author_description_hs' ]) echo esc_html( $instance[ 'author_description_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_description_hs' ); ?>"><?php _e( 'Hide/show Description ?','evita' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'author_social_hs' ], '1' ); ?> id="<?php echo $this->get_field_id( 'author_social_hs' ); ?>" name="<?php echo $this->get_field_name( 'author_social_hs' ); ?>" value="<?php if($instance[ 'author_social_hs' ]) echo esc_html( $instance[ 'author_social_hs' ] ); ?>"/> 
			<label for="<?php echo $this->get_field_id( 'author_social_hs' ); ?>"><?php _e( 'Hide/show Social Icon ?','evita' ); ?></label>
		</p>

		<?php  ?>
        </select>
	<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['author_widget_title'] 	= ( ! empty( $new_instance['author_widget_title'] ) ) ? $new_instance['author_widget_title'] : '';
		$instance['selected_author_id'] 	= ( ! empty( $new_instance['selected_author_id'] ) ) ? $new_instance['selected_author_id'] : '';
		$instance['author_image_hs'] 		= isset( $new_instance['author_image_hs'] ) ? 1 : false;
		$instance['author_nickname_hs'] 	= isset( $new_instance['author_nickname_hs'] ) ? 1 : false;
		$instance['author_first_name_hs'] 	= isset( $new_instance['author_first_name_hs'] ) ? 1 : false;
		$instance['author_last_name_hs'] 	= isset( $new_instance['author_last_name_hs'] ) ? 1 : false;
		$instance['author_designation_hs'] 	= isset( $new_instance['author_designation_hs'] ) ? 1 : false;
		$instance['author_description_hs'] 	= isset( $new_instance['author_description_hs'] ) ? 1 : false;
		$instance['author_social_hs'] 		= isset( $new_instance['author_social_hs'] ) ? 1 : false;
		
		return $instance;
	}
}
		

// Creating the widget
	class evita_about_contact extends WP_Widget {
	 
	function __construct() {
		parent::__construct('about_contact_widget', // Base ID
		__('About Contact Widget','evita'), // Widget Name
			array(
				'classname' => 'evita_about_contact',
				'description' => __('Contact Widget Area','evita'),
			)
		);		
	 }
	 
	 public function widget($args,$instance) { ?>
	 
	<?php echo $args['before_widget']; ?>
	 
			<aside class="widget widget_text">
				<div class="textwidget">
					<?php if(!empty($instance['contact_widget_logo'])){ ?>
						<div class="footer-logo">
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url($instance['contact_widget_logo']); ?>" alt="<?php echo esc_attr__('Logo Image','evita') ?>">
							</a>
						</div>
					<?php } ?>
					
					<?php if(!empty($instance['contact_widget_content'])){ ?>
						<p>
							<?php echo esc_html($instance['contact_widget_content']); ?>
						</p>
					<?php } ?>					
				</div>
			</aside>
			
			<aside class="widget widget-contact">
				<?php if(!empty($instance['contact_widget_address'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-location-arrow"></i>	
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_address']); ?>
							</span>
						</a>
					</div>
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_call'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-phone"></i>	
						</div>							
						
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_call']); ?>
							</span>
						</a>
					</div>
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_email'])){ ?>
					<div class="contact-area">
						<div class="contact-icon">
							<i class="fa fa-envelope"></i>	
						</div>
						<a href="#" class="contact-info">
							<span class="text">
								<?php echo esc_html($instance['contact_widget_email']); ?>
							</span>
						</a>
					</div>
				<?php } ?>
				
				<?php if(!empty($instance['contact_widget_btn_lbl'])){ ?>
					<a href="<?php echo esc_attr($instance['contact_widget_btn_link']); ?>" class="main-btn"><?php echo esc_html($instance['contact_widget_btn_lbl']); ?> <i class="fa fa-arrow-right"></i></a>
				<?php } ?>
			</aside>
			
	<?php
	echo $args['after_widget'];
	}
	// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'contact_widget_logo' ])){
			$contact_widget_logo = $instance[ 'contact_widget_logo' ];
		}
		else {
			$contact_widget_logo = get_template_directory_uri().'/assets/images/logo.png';
		}
		
		if ( isset( $instance[ 'contact_widget_content' ])){
			$contact_widget_content = $instance[ 'contact_widget_content' ];
		}
		else {
			$contact_widget_content = 'There are many variations of dummy passages of Lorem Ipsum a available';
		}
		
		if ( isset( $instance[ 'contact_widget_call' ])){
			$contact_widget_call = $instance[ 'contact_widget_call' ];
		}
		else {
			$contact_widget_call = '+12 345 678 90';
		}
		if ( isset( $instance[ 'contact_widget_email' ])){
			$contact_widget_email = $instance[ 'contact_widget_email' ];
		}
		else {
			$contact_widget_email = 'support@example.com';
		}
	
		if ( isset( $instance[ 'contact_widget_address' ])){
			$contact_widget_address = $instance[ 'contact_widget_address' ];
		}
		else {
			$contact_widget_address = '380, St Klida Road 38th Str NY,10018';
		}
		
		if ( isset( $instance[ 'contact_widget_btn_lbl' ])){
			$contact_widget_btn_lbl = $instance[ 'contact_widget_btn_lbl' ];
		}
		else {
			$contact_widget_btn_lbl = 'Contact Us';
		}
		
		if ( isset( $instance[ 'contact_widget_btn_link' ])){
			$contact_widget_btn_link = $instance[ 'contact_widget_btn_link' ];
		}
		else {
			$contact_widget_btn_link = '#';
		}
	?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_logo' ); ?>"><?php _e( 'Logo Url','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_logo' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_logo' ); ?>" type="text" value="<?php if($contact_widget_logo) echo esc_html( $contact_widget_logo ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_content' ); ?>"><?php _e( 'Content','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_content' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_content' ); ?>" type="text" value="<?php if($contact_widget_content) echo esc_html( $contact_widget_content ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_address' ); ?>"><?php _e( 'Office Address','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_address' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_address' ); ?>" type="text" value="<?php if($contact_widget_address) echo esc_html( $contact_widget_address ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_call' ); ?>"><?php _e( 'Phone Number','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_call' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_call' ); ?>" type="text" value="<?php if($contact_widget_call) echo esc_html( $contact_widget_call ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_email' ); ?>"><?php _e( 'Email Address','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_email' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_email' ); ?>" type="text" value="<?php if($contact_widget_email) echo esc_html( $contact_widget_email ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_btn_lbl' ); ?>"><?php _e( 'Button Label','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_btn_lbl' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_btn_lbl' ); ?>" type="text" value="<?php if($contact_widget_btn_lbl) echo esc_html( $contact_widget_btn_lbl ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'contact_widget_btn_link' ); ?>"><?php _e( 'Button Link','evita' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'contact_widget_btn_link' ); ?>" name="<?php echo $this->get_field_name( 'contact_widget_btn_link' ); ?>" type="text" value="<?php if($contact_widget_btn_link) echo esc_html( $contact_widget_btn_link ); ?>" />
		</p>
		
		
	
	<?php
    }
	     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	
	$instance = array();
		$instance['contact_widget_logo'] = ( ! empty( $new_instance['contact_widget_logo'] ) ) ? sanitize_text_field( $new_instance['contact_widget_logo'] ) : get_template_directory_url().'assets/images/cta-logo.png';
		
		$instance['contact_widget_content'] = ( ! empty( $new_instance['contact_widget_content'] ) ) ? sanitize_text_field( $new_instance['contact_widget_content'] ) : __('There are many variations of that passages of Lorem Ipsum that a available.','evita');
		
		$instance['contact_widget_call'] = ( ! empty( $new_instance['contact_widget_call'] ) ) ? sanitize_text_field( $new_instance['contact_widget_call'] ) : '70 975 975 70';
		
		$instance['contact_widget_email'] = ( ! empty( $new_instance['contact_widget_email'] ) ) ? sanitize_text_field( $new_instance['contact_widget_email'] ) : 'email@company.com';
		
		$instance['contact_widget_address'] = ( ! empty( $new_instance['contact_widget_address'] ) ) ? sanitize_text_field( $new_instance['contact_widget_address'] ) : __('50 Wallstreet,USA','evita');
		$instance['contact_widget_btn_lbl'] = ( ! empty( $new_instance['contact_widget_btn_lbl'] ) ) ? sanitize_text_field( $new_instance['contact_widget_btn_lbl'] ) : __('Contact Us','evita');
		$instance['contact_widget_btn_link'] = ( ! empty( $new_instance['contact_widget_btn_link'] ) ) ? sanitize_text_field( $new_instance['contact_widget_btn_link'] ) : __('#','evita');
		
		return $instance;
	}
}		
	
function register_evita_widgets() {
	register_widget( 'evita_author_widget' );
	register_widget( 'evita_contact_feature' );
	register_widget( 'evita_about_widget' );
	register_widget( 'evita_about_contact' );
}	
add_action( 'widgets_init', 'register_evita_widgets' );
?>