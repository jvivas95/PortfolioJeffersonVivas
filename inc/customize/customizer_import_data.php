<?php
class evita_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof evita_import_dummy_data ) ) {
			self::$instance = new evita_import_dummy_data;
			self::$instance->evita_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function evita_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'evita_import_customize_scripts' ), 0 );

	}
	
	

	public function evita_import_customize_scripts() {

	wp_enqueue_script( 'evita-import-customizer-js', get_template_directory_uri() . '/assets/js/evita-import-customizer.js', array( 'customize-controls' ) );
	}
}

$evita_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
evita_import_dummy_data::init( apply_filters( 'evita_import_customizer', $evita_import_customizers ) );