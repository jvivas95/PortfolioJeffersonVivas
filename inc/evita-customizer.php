<?php
/**
 * Evita Theme Customizer.
 *
 * @package Evita
 */

 if ( ! class_exists( 'Evita_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Evita_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'evita_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'evita_customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'evita_customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'evita_customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function evita_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';
			
			/**
			 * Helper files
			 */
			require EVITA_PARENT_INC_DIR . '/customize/customizer-controls.php';
			require EVITA_PARENT_INC_DIR . '/sanitization.php';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function evita_customize_preview_js() {
			wp_enqueue_script( 'evita-customizer',get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function evita_customizer_script() {
			 wp_enqueue_script( 'evita-customizer-section', get_template_directory_uri() . '/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function evita_customizer_settings() {
			 require EVITA_PARENT_INC_DIR . '/customize/evita-header.php';
			 require EVITA_PARENT_INC_DIR . '/customize/evita-blog.php';
			 require EVITA_PARENT_INC_DIR . '/customize/evita-footer.php';
			 require EVITA_PARENT_INC_DIR . '/customize/evita-general.php';
			 require EVITA_PARENT_INC_DIR . '/customize/evita-premium.php';
			 require EVITA_PARENT_INC_DIR . '/customize/customizer_recommended_plugin.php';
			 require EVITA_PARENT_INC_DIR . '/customize/customizer_import_data.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Evita_Customizer::get_instance();