<?php 
$evita_hs_breadcrumb		= get_theme_mod('hs_breadcrumb','1');
$evita_bg_element_enable	= get_theme_mod('breadcrumb_bg_element_enable','1');
$breadcrumb_btn_label		= get_theme_mod('breadcrumb_btn_label');
$breadcrumb_btn_link		= get_theme_mod('breadcrumb_btn_link');

	
if($evita_hs_breadcrumb == '1') {	
?>
<!-- =================== Breadcrumb Section =================-->

<section id="breadcrumb-section" class="breadcrumb-section breadcrumb-animation" style="<?php echo ($evita_bg_element_enable) ? 'background-image: url(' . esc_url(get_template_directory_uri() . '/assets/images/element/net-wave.png') . ')' : ''; ?>">
        <div class="nt-container">
            <div class="nt-columns-area">
                <div class="nt-column-12">
                        <div class="breadcrumb-area">
                            <div class="breadcrumb-left">
                                	
									<h1 class="breadcrumb-heading">
										<?php 
											if ( is_home() || is_front_page()):

												echo esc_html__('Blog','evita');
										
											elseif ( is_day() ) : 
											
												printf( __( 'Daily Archives: %s', 'evita' ), get_the_date() );
											
											elseif ( is_month() ) :
											
												printf( __( 'Monthly Archives: %s', 'evita' ), (get_the_date( 'F Y' ) ));
												
											elseif ( is_year() ) :
											
												printf( __( 'Yearly Archives: %s', 'evita' ), (get_the_date( 'Y' ) ) );
												
											elseif ( is_category() ) :
											
												printf( __( 'Category Archives: %s', 'evita' ), (single_cat_title( '', false ) ));

											elseif ( is_tag() ) :
											
												printf( __( 'Tag Archives: %s', 'evita' ), (single_tag_title( '', false ) ));
												
											elseif ( is_404() ) :

												printf( __( 'Error 404', 'evita' ));
												
											elseif ( is_author() ) :
											
												printf( __( 'Author: %s', 'evita' ), (get_the_author( '', false ) ));		
											
											elseif ( is_tax( 'portfolio_categories' ) ) :

												printf( __( 'Portfolio Categories: %s', 'evita' ), (single_term_title( '', false ) ));	
												
											elseif ( is_tax( 'pricing_categories' ) ) :

												printf( __( 'Pricing Categories: %s', 'evita' ), (single_term_title( '', false ) ));	
												
											elseif ( class_exists( 'woocommerce' ) ) : 
												
												if ( is_shop() ) {
													woocommerce_page_title();
												}
												
												elseif ( is_cart() ) {
													the_title();
												}
												
												elseif ( is_checkout() ) {
													the_title();
												}
												
												else {
													wp_title('');
												}
											else :
													the_title();
													
											endif;
												
										?>
									</h1>
								
								
									<ol class="breadcrumb-list">
										<?php if (function_exists('evita_breadcrumbs')) evita_breadcrumbs();?>
									</ol>
                            </div>
							
							<?php if(!empty($breadcrumb_btn_label)){ ?>
								<a href="<?php echo esc_url($breadcrumb_btn_link); ?>" class="main-btn"><?php echo esc_html($breadcrumb_btn_label); ?> <i class="fa fa-user"></i></a>
							<?php } ?>							
							<div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== End =========================== -->
<?php } ?>