<?php
function evita_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'evita'),
		) 
	);
	

	//Footer Documentation Link
	class WP_footer_type_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>How to add Footer Type section :</h3>
			<p>Customizer > Footer Type Section <br><br> <a href="#" style="background-color:#4bffa5; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Footer Doc Link // 
	$wp_customize->add_setting( 
		'footer_type_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_footer_type_Customize_Control($wp_customize,
	'footer_type_doc_link' , 
		array(
			'label'          => __( 'Footer Type Documentation Link', 'evita' ),
			'section'        => 'footer_type',
			'type'           => 'radio',
			'description'    => __( 'Footer Type Documentation Link', 'evita' ), 
		) 
	) );
	
	if ( class_exists( 'Evita_Customize_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'evita_footer_type', array(
				'sanitize_callback' => 'evita_sanitize_select',
				'default' => 'footer-1',
				'priority'  => 8,
			)
		);

		$wp_customize->add_control(
			new Evita_Customize_Control_Radio_Image(
				$wp_customize, 'evita_footer_type', array(
					'label'     => esc_html__( 'Footer Layout', 'evita' ),
					'section'   => 'footer_type',
					'choices'   => array(
						'footer-1' => array(
							'url' => apply_filters( 'square', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/footer-1.png' )),
						),
						'footer-2' => array(
							'url' => apply_filters( 'circle', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/footer-2.png' )),
						),
						'footer-3' => array(
							'url' => apply_filters( 'circle', esc_url(trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/images/footer-3.png' )),
						)
					),
				)
			)
		);
	}
	
	/*=========================================
	Footer Above
	=========================================*/	
	$wp_customize->add_section(
        'footer_above',
        array(
            'title' 		=> __('Footer Above','evita'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	
	//Above Footer Documentation Link
	class WP_footer_above_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>How to use above footer section :</h3>
			<p>Footer > Above Footer <br><br> <a href="#" style="background-color:#4bffa5; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Above Footer Doc Link // 
	$wp_customize->add_setting( 
		'footer_above_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_footer_above_Customize_Control($wp_customize,
	'footer_above_doc_link' , 
		array(
			'label'          => __( 'Footer Above Documentation Link', 'evita' ),
			'section'        => 'footer_above',
			'type'           => 'radio',
			'description'    => __( 'Sidebar Documentation Link', 'evita' ), 
		) 
	) );
	
	// hide/show
	$wp_customize->add_setting( 
		'hs_above_footer' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_checkbox',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_above_footer', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'evita' ),
			'section'     => 'footer_above',
			'type'        => 'checkbox'
		) 
	);	
	
	// Get In Touch Title
	$wp_customize->add_setting(
    	'footer_get_in_touch_title',
    	array(
			// 'default' 			=> __('Call Us Now','evita'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_get_in_touch_title',
		array(
		    'label'   		=> __('Get In Touch Title','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// Get In Touch Link
	$wp_customize->add_setting(
    	'footer_get_in_touch_number',
    	array(
			// 'default' 			=> '+12 345 678 90',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_get_in_touch_number',
		array(
		    'label'   		=> __('Get In Touch Number','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'footer_get_in_touch_icon',
    	array(
	        // 'default' => 'fa-phone',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Evita_Icon_Picker_Control($wp_customize, 
		'footer_get_in_touch_icon',
		array(
		    'label'   		=> __('Icon','evita'),
		    'section' 		=> 'footer_above',
			'iconset' => 'fa',
			
		))  
	);
	
	
	// Email Title
	$wp_customize->add_setting(
    	'footer_email_title',
    	array(
			// 'default' 			=> __('Email','evita'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_email_title',
		array(
		    'label'   		=> __('Email Title','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// Email Description
	$wp_customize->add_setting(
    	'footer_email',
    	array(
			// 'default' 			=> 'example@gmail.com',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_email',
		array(
		    'label'   		=> __('Email','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'footer_email_icon',
    	array(
	        // 'default'	 		=> 'fa-envelope',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' 		=> 'edit_theme_options',
			'priority' 			=> 4,
		)
	);	

	$wp_customize->add_control(new Evita_Icon_Picker_Control($wp_customize, 
		'footer_email_icon',
		array(
		    'label'   		=> __('Email Icon','evita'),
		    'section' 		=> 'footer_above',
			'iconset' 		=> 'fa',
			
		))  
	);
	
	
	
	// Get In Touch Title
	$wp_customize->add_setting(
    	'footer_address_title',
    	array(
			// 'default' 			=> __('Location','evita'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_address_title',
		array(
		    'label'   		=> __('Address Title','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// Get In Touch Link
	$wp_customize->add_setting(
    	'footer_address',
    	array(
			// 'default' 			=> 'St Klida Main Road',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'footer_address',
		array(
		    'label'   		=> __('Location','evita'),
		    'section'		=> 'footer_above',
			'type' 			=> 'text',
		)  
	);	
	
	// icon // 
	$wp_customize->add_setting(
    	'footer_address_icon',
    	array(
	        // 'default' => 'fa-map-marker',
			'sanitize_callback' => 'sanitize_text_field',
			'capability' => 'edit_theme_options',
			'priority' => 4,
		)
	);	

	$wp_customize->add_control(new Evita_Icon_Picker_Control($wp_customize, 
		'footer_address_icon',
		array(
		    'label'   		=> __('Icon','evita'),
		    'section' 		=> 'footer_above',
			'iconset' => 'fa',
			
		))  
	);
	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','evita'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	//Above Footer Documentation Link
	class WP_footer_copy_Section_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>How to Add footer copy Section :</h3>
			<p>Footer > Footer Copy Section <br><br> <a href="#" style="background-color:#4bffa5; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Above Footer Doc Link // 
	$wp_customize->add_setting( 
		'footer_copy_Section_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_footer_copy_Section_Customize_Control($wp_customize,
	'footer_copy_Section_doc_link' , 
		array(
			'label'          => __( 'Footer Above Documentation Link', 'evita' ),
			'section'        => 'footer_copy_Section',
			'type'           => 'radio',
			'description'    => __( 'footer copy Section Documentation Link', 'evita' ), 
		) 
	) );
	
	// footer third text // 
	$evita_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'evita' );
	$wp_customize->add_setting(
    	'footer_third_custom',
    	array(
			'default' => $evita_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'evita_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_third_custom',
		array(
		    'label'   		=> __('Copyright Text','evita'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 9,
		)  
	);	
	
	
	// Footer Background // 
	$wp_customize->add_section(
        'footer_background',
        array(
            'title' 		=> __('Footer Background','evita'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );

	
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','evita'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );
	
	//Above Footer Documentation Link
	class WP_footer_background_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3>How to Add footer background Section :</h3>
			<p>Footer > Footer Background <br><br> <a href="#" style="background-color:#4bffa5; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;">Click Here</a></p>
			
		<?php
	   }
	}
	
	// Above Footer Doc Link // 
	$wp_customize->add_setting( 
		'footer_background_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_footer_background_Customize_Control($wp_customize,
	'footer_background_doc_link' , 
		array(
			'label'          => __( 'Footer Background Documentation Link', 'evita' ),
			'section'        => 'footer_background',
			'type'           => 'radio',
			'description'    => __( 'footer background Documentation Link', 'evita' ), 
		) 
	) );
	
	//  Color
	$wp_customize->add_setting(
	'footer_bg_color', 
	array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '#132243'
    ));
	
	$wp_customize->add_control( 
		new WP_Customize_Color_Control
		($wp_customize, 
			'footer_bg_color', 
			array(
				'label'      => __( 'Background Color', 'evita' ),
				'section'    => 'footer_background',
			) 
		) 
	);
	
	$wp_customize->add_section(
        'footer_newsletter',
        array(
            'title' 		=> __('Footer Newsletter','evita'),
			'panel'  		=> 'footer_section',
			'priority'      => 2,
		)
    );
	
	
}
add_action( 'customize_register', 'evita_footer' );
// Footer selective refresh
function evita_footer_partials( $wp_customize ){	
	//footer_above_content 
	$wp_customize->selective_refresh->add_partial( 'footer_above_content', array(
		'selector'            => '.footer-above .av-columns-area',
	) );
	
	// footer_third_custom
	$wp_customize->selective_refresh->add_partial( 'footer_third_custom', array(
		'selector'            => '.footer-copyright .copyright-text',
		'settings'            => 'footer_third_custom',
		'render_callback'  => 'evita_footer_third_custom_render_callback',
	) );
	
	//footer_widget_middle_content
	$wp_customize->selective_refresh->add_partial( 'footer_widget_middle_content', array(
		'selector'            => '.footer-main .footer-info-overwrap',
		'settings'            => 'footer_widget_middle_content',
		'render_callback'  => 'evita_footer_widget_middle_content_render_callback',
	) );
	
	//footer_get_in_touch_title
	$wp_customize->selective_refresh->add_partial( 'footer_get_in_touch_title', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area.number a span.text',
		'settings'            => 'footer_get_in_touch_title',
		'render_callback'  => 'evita_footer_get_in_touch_title_render_callback',
	) );
	
	
	//footer_get_in_touch_number
	$wp_customize->selective_refresh->add_partial( 'footer_get_in_touch_number', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area.number a span.title',
		'settings'            => 'footer_get_in_touch_number',
		'render_callback'  => 'evita_footer_get_in_touch_number_render_callback',
	) );
	
	
	//footer_email_title
	$wp_customize->selective_refresh->add_partial( 'footer_email_title', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area a.email span.text',
		'settings'            => 'footer_email_title',
		'render_callback'  => 'evita_footer_email_title_render_callback',
	) );
	
	//footer_email
	$wp_customize->selective_refresh->add_partial( 'footer_email', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area a.email span.title',
		'settings'            => 'footer_email',
		'render_callback'  => 'evita_footer_email_render_callback',
	) );	
	
	//footer_address_title
	$wp_customize->selective_refresh->add_partial( 'footer_address_title', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area a.address span.text',
		'settings'            => 'footer_address_title',
		'render_callback'  => 'evita_footer_address_title_render_callback',
	) );
	
	//footer_address
	$wp_customize->selective_refresh->add_partial( 'footer_address', array(
		'selector'            => '.section-footer .footer-middle .widget-contact .contact-area a.address span.title',
		'settings'            => 'footer_address',
		'render_callback'  => 'evita_footer_address_render_callback',
	) );
	
	
	}

add_action( 'customize_register', 'evita_footer_partials' );


// copyright_content
function evita_footer_third_custom_render_callback() {
	return get_theme_mod( 'footer_third_custom' );
}

// footer_widget_middle_content
function evita_footer_widget_middle_content_render_callback() {
	return get_theme_mod( 'footer_widget_middle_content' );
}