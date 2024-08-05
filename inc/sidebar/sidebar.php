<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package evita
 */
function evita_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'evita' ),
		'id' => 'evita-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'evita' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'evita' ),
		'id' => 'evita-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'evita' ),
		'before_widget' => '<div class="nt-column-3 mb-xl-0 mb-4"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'evita_widgets_init' );
?>