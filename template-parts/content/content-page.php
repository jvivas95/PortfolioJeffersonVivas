<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evita
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item active'); ?>>
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
			?> 
			<?php 
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