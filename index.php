<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package evita
 */

get_header(); 
?>
<section class="section-blog blog-one white blog_default">
	<div class="nt-container">
		<div class="nt-columns-area">	
				<div class="nt-column-8">				
					<?php 
						$evita_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$evita_paged );	
					?>
					<div class="nt-columns-area">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post();  ?>
						<div class="nt-column-12 nt-sm-column-6">
							<?php get_template_part('template-parts/content/content','page'); ?>
						</div>
						<?php endwhile; ?>
					<?php endif; ?>		
					</div>
						<!-- Pagination -->
							<?php								
							// Previous/next page navigation.
							the_posts_pagination( array(
							'prev_text'          => ' <i class="fa fa-chevron-left"></i>',
							'next_text'          => '<i class="fa fa-chevron-right"></i>',
							) ); ?>
					<!-- Pagination -->	
					
					<?php //endif; ?>
				</div>
				<?php  get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>