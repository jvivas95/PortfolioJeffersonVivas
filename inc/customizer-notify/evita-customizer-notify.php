<?php

class Evita_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $evita_deactivate_button_label;
	
	
	private $config;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Evita_Customizer_Notify ) ) {
			self::$instance = new Evita_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $evita_customizer_notify_recommended_plugins;
		global $evita_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $evita_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$evita_customizer_notify_recommended_plugins = array();
		$evita_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$evita_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$evita_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$evita_deactivate_button_label = isset( $this->config['evita_deactivate_button_label'] ) ? $this->config['evita_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'evita_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'evita_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'evita_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'evita_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function evita_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'evita-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/evita-customizer-notify.css', array());

		wp_enqueue_style( 'evita-plugin-install' );
		wp_enqueue_script( 'evita-plugin-install' );
		wp_add_inline_script( 'evita-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'evita-updates' );

		wp_enqueue_script( 'evita-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/evita-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'evita-customizer-notify-js', 'EvitaCustomizercompanionObject', array(
				'evita_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'evita_template_directory' => esc_url(get_template_directory_uri()),
				'evita_base_path'          => esc_url(admin_url()),
				'evita_activating_string'  => __( 'Activating', 'evita' ),
			)
		);

	}

	
	public function evita_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/inc/customizer-notify/evita-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Evita_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Evita_Customizer_Notify_Section(
				$wp_customize,
				'Evita-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function evita_customizer_notify_dismiss_recommended_action_callback() {

		global $evita_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'evita_customizer_notify_show' ) ) {

				$evita_customizer_notify_show_recommended_actions = get_theme_mod( 'evita_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$evita_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$evita_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($evita_customizer_notify_show_recommended_actions);
				
			} else {
				$evita_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $evita_customizer_notify_recommended_actions ) ) {
					foreach ( $evita_customizer_notify_recommended_actions as $evita_lite_customizer_notify_recommended_action ) {
						if ( $evita_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$evita_customizer_notify_show_recommended_actions[ $evita_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$evita_customizer_notify_show_recommended_actions[ $evita_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($evita_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function evita_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$evita_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'evita_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$evita_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$evita_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($evita_customizer_notify_show_recommended_actions);
		}
		die(); 
	}

}
