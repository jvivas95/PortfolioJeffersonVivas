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
						<div class="nt-column-6 nt-sm-column-6">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
						<?php endwhile; ?>			
					</div>

					<?php else: ?>
						<?php get_template_part('template-parts/content/content','none'); ?>
					<?php endif; ?>
				</div>
			<?php  get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
