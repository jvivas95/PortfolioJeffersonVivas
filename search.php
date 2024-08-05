<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package evita
 */

get_header();
?>
<section class="section-blog blog-one white blog_default">
	<div class="nt-container">
		<div class="nt-columns-area">
				<div class="col-lg-8 col-md-12 wow slideInLeft">				
					<?php 
						$evita_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$evita_paged );	
					?>
					<div class="nt-columns-area">
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ) : the_post(); 
						?>
						<div class="nt-column-<?php echo esc_attr($inner_col_class); ?> nt-sm-column-6">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
						<?php endwhile; ?>			
					</div>
					<div class="nt-columns-area">
						<?php else: ?>
							<div class="nt-column-12 nt-sm-column-6">
								<?php get_template_part('template-parts/content/content','none'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
