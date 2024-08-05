<?php 	
$footer_get_in_touch_title	= get_theme_mod('footer_get_in_touch_title');
$footer_get_in_touch_number	= get_theme_mod('footer_get_in_touch_number');
$footer_get_in_touch_icon	= get_theme_mod('footer_get_in_touch_icon', '');
$footer_email_title			= get_theme_mod('footer_email_title');
$footer_email				= get_theme_mod('footer_email');
$footer_email_icon			= get_theme_mod('footer_email_icon', '');
$footer_address_title		= get_theme_mod('footer_address_title');
$footer_address				= get_theme_mod('footer_address');
$footer_address_icon		= get_theme_mod('footer_address_icon', '');
$hs_above_footer			= get_theme_mod('hs_above_footer', '1');
$footer_bg_color			= get_theme_mod('footer_bg_color');
?>
<footer class="section-footer" id="footer_one" >
	
	<?php if ( is_active_sidebar( 'evita-footer-widget-area' ) ) { ?>
		<div class="footer-inner ptb-80">
			<div class="nt-container">
				<div class="nt-columns-area">
					<?php  dynamic_sidebar( 'evita-footer-widget-area' ); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="nt-container">
			<?php if($hs_above_footer=='1' && (!empty($footer_get_in_touch_icon) || !empty($footer_get_in_touch_title) || !empty($footer_get_in_touch_number) || !empty($footer_email_icon) || !empty($footer_email_title) || !empty($footer_email) || !empty($footer_address_icon) || !empty($footer_address_title) || !empty($footer_address))){ ?>
				<div class="footer-middle">
					<div class="row">
					<?php if(!empty($footer_get_in_touch_icon) || !empty($footer_get_in_touch_title) || !empty($footer_get_in_touch_number)){ ?>
						<div class="nt-column-4 nt-sm-column-6">
							<aside class="widget widget-contact">
								<div class="contact-area number">
									<?php if(!empty($footer_get_in_touch_icon)){ ?>
										<div class="contact-icon"><svg viewBox="0 0 256 256">
												<path
													d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
												</path>
											</svg><i class="fa <?php echo esc_attr($footer_get_in_touch_icon);?>"></i>
										</div>
									<?php } ?>
									
									<a href="tel:<?php echo esc_attr($footer_get_in_touch_number);?>" class="contact-info">
										<?php if(!empty($footer_get_in_touch_title)){ ?>
											<span class="text"><?php echo esc_html($footer_get_in_touch_title);?></span>
										<?php } ?>
										
										<?php if(!empty($footer_get_in_touch_number)){ ?>
											<span class="title"><?php echo esc_html($footer_get_in_touch_number);?></span>
										<?php } ?>									
									</a>
								</div>
							</aside>
						</div>
					<?php } ?>
					<?php if(!empty($footer_email_icon) || !empty($footer_email_title) || !empty($footer_email)) { ?>
						<div class="nt-column-4 nt-sm-column-6">
							<aside class="widget widget-contact">
								<div class="contact-area">
									<?php if(!empty($footer_email_icon)){ ?>
										<div class="contact-icon"><svg viewBox="0 0 256 256">
												<path
													d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
												</path>
											</svg><i class="fa <?php echo esc_attr($footer_email_icon);?>"></i>
										</div>
									<?php } ?>
									
									<a href="tel:7097597570" class="contact-info email">
										<?php if(!empty($footer_email_title)){ ?>
											<span class="text "> <?php echo esc_html($footer_email_title);?></span>
										<?php } ?>
										
										<?php if(!empty($footer_email)){ ?>
											<span class="title "><?php echo esc_html($footer_email);?></span>
										<?php } ?>
									</a>
								</div>
							</aside>
						</div>
					<?php } ?>
					<?php if(!empty($footer_address_icon) || !empty($footer_address_title) || !empty($footer_address)){ ?>
						<div class="nt-column-4 nt-sm-column-6">
							<aside class="widget widget-contact">
								<div class="contact-area">
									<?php if(!empty($footer_address_icon)){ ?>
										<div class="contact-icon"><svg viewBox="0 0 256 256">
												<path
													d="M219.87305,66.73828l-84-47.478a16.08654,16.08654,0,0,0-15.7461,0l-84,47.47852A16.0255,16.0255,0,0,0,28,80.668V175.332a16.02688,16.02688,0,0,0,8.127,13.92969l84,47.478a16.08782,16.08782,0,0,0,15.7461,0l84-47.47852A16.0255,16.0255,0,0,0,228,175.332V80.668A16.02688,16.02688,0,0,0,219.87305,66.73828Z">
												</path>
											</svg><i class="fa <?php echo esc_attr($footer_address_icon);?>"></i>
										</div>
									<?php } ?>
									
									<a href="#" class="contact-info address">
										<?php if(!empty($footer_address_title)){ ?>
											<span class="text "><?php echo esc_html($footer_address_title);?></span>
										<?php } ?>
										
										<?php if(!empty($footer_address)){ ?>
											<span class="title "><?php echo esc_html($footer_address);?></span>
										<?php } ?>
									</a>
								</div>
							</aside>
						</div>
					<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php 
		$footer_copyright = get_theme_mod('footer_copyright','Copyright &copy; [current_year] [site_title] | Powered by [theme_author]');
	?>
	<div class="footer-copyright">
		<div class="nt-container">
			<div class="nt-columns-area">
				<div class="nt-xs-column-12 nt-md-column-6 textt-center">
					<?php if(!empty($footer_copyright)): ?>
						<div class="widget-left">  
							<?php 	
								$evita_copyright_allowed_tags = array(
									'[current_year]' => date_i18n('Y', current_time( 'timestamp' )),
									'[site_title]'   => '<a href="'. esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a>',
									'[theme_author]' => sprintf(__('<a href="https://www.nayrathemes.com/">%s</a>', 'evita'), esc_html__('Nayra Themes', 'evita')),
								);
							?>   
							<div class="copyright-text">
								<?php
									echo apply_filters('evita_footer_copyright', wp_kses_post(evita_str_replace_assoc($evita_copyright_allowed_tags, $footer_copyright)));
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>
				
				<div class="nt-xs-column-12 nt-md-column-6 textt-center">
					<div class="widget-right text-nt-right">
						<aside class="widget widget-nav-menu">
							<div class="menu-pages-container">
								<?php 
									wp_nav_menu( 
										array(  
											'theme_location' => 'footer_menu',
											'container'  => '',
											'menu_class' => 'menu',
											'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
											'walker' => new WP_Bootstrap_Navwalker()
											 ) 
										);
								?>  
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

 <!-- ScrollUp -->
 <?php 
		$hs_scroller 	= get_theme_mod('hs_scroller','1');	
		if($hs_scroller == '1') :
	?>
	<!-- ======== Back to Top =====- -->
	<button type="button" class="scrollingUp scrolling-btn" aria-label="scrollingUp">
		<span class='slider'></span>
	</button>
    <!-- ======== End ======== -->
	<?php endif; ?>

<?php 
	
wp_footer(); ?>
</body>
</html>