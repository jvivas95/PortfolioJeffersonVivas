<?php  
	$evita_blog_hs		= get_theme_mod('blog_hs','1');
	$blog_title 		= get_theme_mod('blog_title');
	$blog_subtitle	= get_theme_mod('blog_subtitle');
	$blog_description	= get_theme_mod('blog_description'); 
	$blog_display_num	= get_theme_mod('blog_display_num','3'); 
	if($evita_blog_hs=='1'):
?>	
<section class="section-blog blog-one post-section">
		<div class="nt-container">
			<?php if(!empty($blog_title) || !empty($blog_subtitle) || !empty($blog_description)){ ?>
				<div class="section-title full">
				<?php if(!empty($blog_subtitle)){ ?>
						<h5>
							<?php echo wp_kses_post($blog_subtitle); ?>
						</h5>
					<?php } ?>
					<?php if(!empty($blog_title)){ ?>
						<h2>
							<?php echo esc_html($blog_title); ?>
						</h2>
					<?php } ?>
					
					<?php if(!empty($blog_description)){ ?>
						<p>
							<?php echo esc_html($blog_description); ?>
						</p>
					<?php } ?>
				</div>
			<?php } ?>
			
			<div class="nt-columns-area">
				<?php 
					$evita_blog_args = array( 'post_type' => 'post', 'posts_per_page' => $blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
					
					$evita_wp_query = new WP_Query($evita_blog_args);
					if($evita_wp_query)
					{	
					 $post_count=0;
					while($evita_wp_query->have_posts()):$evita_wp_query->the_post();
					
					$category = get_the_category(); 

				?>
					<div class="nt-column-4 nt-sm-column-6">	
						<article class="post-item">
							<?php if ( has_post_thumbnail() ) { ?>
								<figure class="post-image ">
									<a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-hover">
										<?php the_post_thumbnail('medium'); ?>
									</a>
									<div class="post_effect">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</div>				
								</figure>
							<?php } ?>
							<div class="post-content">
								<div class="post-meta">
									<span class="author">
										<img src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ))) ?>" alt="<?php echo esc_attr__('Author Image','evita'); ?>">
										<span>
											<span><?php echo esc_html__('Posted By :','evita'); ?></span>
											<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?> </a>
										</span>
									</span>
									
									<span class="post-date">
										<a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>">  <?php echo esc_html(get_the_date('j')); ?> <span><?php echo esc_html(get_the_date('M')); ?></span></a>
									</span>
								</div>
								
								<?php     
									if ( is_single() ) :
									
									the_title('<h5 class="post-title">', '</h5>' );
									
									else:
									
									the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
									
									endif; 
								
									if(is_single()){
										the_content();
									}else{							
										the_content( 
												sprintf( 
													__( 'Read Blog', 'evita' ), 
													'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
												) 
											);									
									}
								?>
							</div>
						</article>
					</div>
				<?php 
					endwhile; 
					}
					wp_reset_postdata();
				?>	
			</div>
		</div>
	</section>
<?php endif; ?>