<?php 
	$hdr_nav_btn_label			= get_theme_mod('hdr_nav_btn_label');
	$hdr_nav_btn_link			= get_theme_mod('hdr_nav_btn_link');	
	$hide_show_btn				= get_theme_mod('hide_show_btn','1');	
?>
<?php
if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-header" id="custom-header" rel="home">
		<img src="<?php echo esc_url(get_header_image()); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr(get_bloginfo( 'title' )); ?>">
	</a>
<?php endif; ?>
<!--===// Start: Header-one
	=================================-->
	<header id="header-section" class="header header-one transparent">
		<div class="navigator-wrapper">
			<!--===// Start: Mobile Toggle
			=================================-->
			<div class="theme-mobile-nav <?php echo esc_attr(evita_sticky_menu()); ?>">
				<div class="nt-container">
					<div class="nt-columns-area">
						<div class="nt-column-12">
							<div class="theme-mobile-menu">
								<div class="mobile-logo">
									<div class="logo">
										<?php do_action('evita_logo_content'); ?>
									</div>
								</div>
								<div class="menu-toggle-wrap">
									<div class="mobile-menu-right"></div>
									<div class="hamburger-menu">
										<button type="button" class="menu-toggle">
											<span class="top-bun"></span>
											<span class="meat"></span>
											<span class="bottom-bun"></span>
										</button>
									</div>
								</div>
								<div id="mobile-m" class="mobile-menu">
									<button type="button" class="header-close-menu close-style"></button>
								</div>
								<div class="headtop-mobi d-none">
									<button type="button" class="header-above-toggle"><span></span></button>
								</div>
								<div id="mob-h-top" class="mobi-head-top d-none"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--===// End: Mobile Toggle
			=================================-->

			<!--===// Start: Navigation
			=================================-->
			<div class="nav-area d-none d-lg-block <?php echo esc_attr(evita_sticky_menu()); ?>">
				<div class="navbar-area">
					<div class="nt-container">
						<div class="nt-columns-area">
							<div class="nt-column-2 my-auto">
								<div class="logo">
									<?php do_action('evita_logo_content'); ?>
								</div>
							</div>
							<div class="nt-column-10 my-auto">
								<div class="theme-menu">
									<nav class="menubar">
										<?php do_action('evita_primary_navigation');	?>
									</nav>
									
									<?php if(!empty($hdr_nav_btn_label) && ($hide_show_btn=='1')){ ?>
										<div class="menu-right">
											<ul class="header-wrap-right">
												<li class="nt-button-area">
													<a href="<?php echo esc_html($hdr_nav_btn_link); ?>" target="_blank" class="nt-btn nt-btn-primary nt-btn-effect-1">
														<?php echo esc_html($hdr_nav_btn_label); ?>
													</a>
												</li>
											</ul>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--===// End:  Navigation
			=================================-->
		</div>
	</header>
	<!--===// end: Header-one
	=================================-->
<?php	
	if ( !is_page_template( 'templates/template-homepage.php' )) {
		evita_breadcrumbs_style();  
	}	
?>