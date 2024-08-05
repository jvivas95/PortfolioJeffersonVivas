<?php
function evita_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'evita'),
		) 
	);
	
	/*=========================================
	Evita Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','evita'),
			'panel'  		=> 'header_section',
		)
    );
	
	/*=========================================
	Header Navigation
	=========================================*/	
	$wp_customize->add_section(
        'header_navigation',
        array(
        	'priority'      => 4,
            'title' 		=> __('Header Navigation','evita'),
			'panel'  		=> 'header_section',
		)
    );
	//Header Navigation Documentation Link
	class WP_header_navigation_section_Customize_Control extends WP_Customize_Control {
		public $type = 'new_menu';
	
		   function render_content()
		   
		   {
		   ?>
				<h3>How to Use Header Navigation section :</h3>
				<p>Customizer > Header Navigation <br><br> <a href="#" style="background-color:#4bffa5; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
				
			<?php
		   }
		}
		
		// Header Navigation Doc Link // 
		$wp_customize->add_setting( 
			'header_navigation_doc_link' , 
				array(
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			) 
		);
	
		$wp_customize->add_control(new WP_header_navigation_section_Customize_Control($wp_customize,
		'header_navigation_doc_link' , 
			array(
				'label'          => __( 'Header Navigation Documentation Link', 'evita' ),
				'section'        => 'header_navigation',
				'type'           => 'radio',
				'description'    => __( 'Header Navigation Documentation Link', 'evita' ), 
			) 
		) );

	// Button
	$wp_customize->add_setting(
		'hdr_nav_btn'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_text',
			'priority' => 3,
		)
	);

	$wp_customize->add_control(
	'hdr_nav_btn',
		array(
			'type' => 'hidden',
			'label' => __('Button','evita'),
			'section' => 'header_navigation',
		)
	);
	
	$wp_customize->add_setting( 
		'hide_show_btn' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_checkbox',
			'priority' => 4,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_btn', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'evita' ),
			'section'     => 'header_navigation',
			'type'        => 'checkbox'
		) 
	);	
	
	// title // 
	$wp_customize->add_setting(
    	'hdr_nav_btn_label',
    	array(
	        
			'sanitize_callback' => 'evita_sanitize_text',
			'transport'         => $selective_refresh,
			'capability' => 'edit_theme_options',
			'priority' => 5,
		)
	);	

	$wp_customize->add_control( 
		'hdr_nav_btn_label',
		array(
		    'label'   		=> __('Button Label','evita'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	// Link // 
	$wp_customize->add_setting(
    	'hdr_nav_btn_link',
    	array(
			'sanitize_callback' => 'evita_sanitize_url',
			'capability' => 'edit_theme_options',
			'priority' => 6,
		)
	);	

	$wp_customize->add_control( 
		'hdr_nav_btn_link',
		array(
		    'label'   		=> __('Button Link','evita'),
		    'section' 		=> 'header_navigation',
			'type'		 =>	'text'
		)  
	);
	
	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','evita'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','evita'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'evita' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	
}
add_action( 'customize_register', 'evita_header_settings' );