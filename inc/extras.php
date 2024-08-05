<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package evita
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function evita_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	return $classes;
}
add_filter( 'body_class', 'evita_body_classes' );

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('evita_str_replace_assoc')) {

    /**
     * evita_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function evita_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Evita Navigation
if ( ! function_exists( 'evita_primary_navigation' ) ) :
function evita_primary_navigation() {
	wp_nav_menu( 
		array(  
			'theme_location' => 'primary_menu',
			'container'  => '',
			'menu_class' => 'menu-wrap',
			'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
			'walker' => new WP_Bootstrap_Navwalker()
			 ) 
		);
	} 
endif;
add_action( 'evita_primary_navigation', 'evita_primary_navigation' );


// Evita Navigation Search
if ( ! function_exists( 'evita_navigation_search' ) ) :
function evita_navigation_search() {
	$evita_hide_show_search 	= get_theme_mod( 'hide_show_search','1'); 
	if($evita_hide_show_search=='1'):	
?>
<li class="search-button">
	<!-- Quik search -->
	<div class="header-search-normal">
		<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'evita' ); ?>">
			<input type="search" class="search-field header-search-field" placeholder="<?php esc_attr_e( 'Search', 'evita' ); ?>" name="s" id="popfocus" value="" autofocus="">
			<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<!-- / -->
</li>
<?php  endif;
	} 
endif;
add_action( 'evita_navigation_search', 'evita_navigation_search' );


// Evita Logo
if ( ! function_exists( 'evita_logo_content' ) ) :
function evita_logo_content() {
    if(has_custom_logo())
    {	
        the_custom_logo();
    } 
                                
    $evita_site_title = get_bloginfo( 'name');
    if ($evita_site_title) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <h4 class="site-title">
                <?php echo esc_html($evita_site_title);  ?>
            </h4>	
        </a>
    <?php endif; ?>
    <?php
    $evita_site_desc = get_bloginfo( 'description');
    if ($evita_site_desc) : ?>
        <p class="site-description"><?php echo esc_html($evita_site_desc); ?></p>
    <?php endif;
	} 
endif;
add_action( 'evita_logo_content', 'evita_logo_content' );


/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_evita_dismissed_notice_handler', 'evita_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function evita_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function evita_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="evita-getting-started-notice clearfix">
                    <div class="evita-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'evita' ); ?>" />
                    </div><!-- /.evita-theme-screenshot -->
                    <div class="evita-theme-notice-content">
                        <h2 class="evita-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'evita' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <?php
                            $theme = wp_get_theme();
                            $theme_name = esc_html($theme->get('Name'));
                            $get_started_text = esc_html__('Get started with %s', 'evita');
                            ?>

                            <a class="evita-btn-get-started button button-primary button-hero evita-button-padding" href="#" data-name="" data-slug="">
                                <?php printf('%s', sprintf($get_started_text, $theme_name)); ?>
                            </a>
                            <span class="evita-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                'or %1$sCustomize theme%2$s</a></span>',
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.evita-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'evita_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'evita_admin_install_plugin' );

function evita_admin_install_plugin() {
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/clever-fox' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'clever-fox' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'clever-fox/clever-fox.php' );
    }
}		


