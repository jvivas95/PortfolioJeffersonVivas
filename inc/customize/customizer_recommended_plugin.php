<?php
/* Notifications in customizer */
require get_template_directory() . '/inc/customizer-notify/evita-customizer-notify.php';
$evita_config_customizer = array(
	'recommended_plugins'       => array(
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'evita')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'evita' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'evita' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'evita' ),
	'activate_button_label'     => esc_html__( 'Activate', 'evita' ),
	'evita_deactivate_button_label'   => esc_html__( 'Deactivate', 'evita' ),
);
Evita_Customizer_Notify::init( apply_filters( 'evita_customizer_notify_array', $evita_config_customizer ) );
?>