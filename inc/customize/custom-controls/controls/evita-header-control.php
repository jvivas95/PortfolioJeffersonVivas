<?php
class Evita_Header_Customize_Control extends WP_Customize_Control {
	public $type = 'header_type';

		   function render_content()
		   
		   {
		    echo '<h3>' .  __( 'Select Header', 'evita' ) . '</h3>';
			  $name = '_customize-header-radio-' . $this->id; 
			  foreach($this->choices as $key => $value ) {
				?>
				   <label>
					<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
					<img <?php if($this->value() == $key){ echo 'class="header_type"'; } ?> src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/customize/assets/images/header/evita-header-<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
					</label>
					
				<?php
			  } ?>
			  <script>
				jQuery(document).ready(function($) {
					$("#customize-control-header_type label img").click(function(){
						$("#customize-control-header_type label img").removeClass("header_type");
						$(this).addClass("header_type");
					});
				});
			  </script>
			  <?php
		   }

	}