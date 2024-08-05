<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<section class="post-section av-py-default">
	<div class="nt-container">
		<div class="nt-columns-area wow fadeInUp">
			<div class="nt-column-12  wow fadeInUp">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

