<?php 
get_header();
?>

<section id="posts">
	<div class="container">
		<div class="row">
			<div class="col-md-12 posts">
				
					<?php 
						// query_posts(array('post_per_page' => '6',  'paged' => get_query_var('paged')));
						if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<div class="row posts__item">
								<?php the_post_thumbnail($size = 'custom-size') ?>
							<div class="posts__item__info">
								
								<div class="col-md-12 posts__item__info--left">
									<h3><?php the_title(); ?></h3>
									<p><?php the_content(); ?></p>
									
								</div>
							</div>
						
					</div>


					<!-- post -->
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					
					<?php endif; ?>
			</div>

			<div class="col-md-12 posts_related">
				<?php 
					get_template_part('single','destacados');
				?>
			</div>

		</div>
	</div>
</section>


<?php get_footer(); ?>