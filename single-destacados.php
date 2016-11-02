<?php 
					$query = new WP_Query(array(
						'post_type' => 'post',
						'posts_per_page' => '3'
					));

				if( $query->have_posts() ) : ?>
					<h3>Puedes leer los articulos mas Recientes:</h3>				
			<?php	while( $query->have_posts() ): $query->the_post();?>
						<div class="col-xs-12 col-md-4">
							<div class="item__post__page">
								<a href="<?php the_permalink(); ?>" target="_blank">
									<?php the_post_thumbnail($size = 'related') ?>
									<?php the_title(); ?>
								</a>
							</div>
						</div>
						
			<?php   endwhile;	
				endif;	?>
			<?php wp_reset_postdata();?>