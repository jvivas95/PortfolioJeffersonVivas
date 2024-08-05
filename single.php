<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evita
 */

get_header();
?>
<section class="section-blog blog-one white blog_default blog_single">
		<div class="nt-container">
            <div class="nt-columns-area justify-content-center ">
					<div class="col-lg-8 col-md-12 wow slideInLeft">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); 
							$categories = get_the_category();
						?>
						<article class="post-item active ">
							<?php if ( has_post_thumbnail() ) { ?>
								<figure class="post-image ">
									<a href="<?php echo esc_url(get_the_permalink()); ?>" class="post-hover">
										<?php the_post_thumbnail('large'); ?>
									</a>
									<div class="post_effect">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</div>				
								</figure>
							<?php } ?>
							
							<?php get_template_part('template-parts/content/content','sticky'); ?>
							
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
									the_title('<h3 class="post-title">', '</h3>' );
									the_content();
								?>
							</div>
						</article>
					<?php endwhile; ?>
					<?php endif; ?>
					<?php comments_template( '', true ); // show comments  ?>
                </div>
				<?php  get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
