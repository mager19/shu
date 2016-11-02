<?php
/**
 * The main template file.
 *
 */

get_header(); ?>

<section id="cabecera">
	<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 info">
				<?php 
					$args = array( 'post_type' => 'acercademi', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>
						<?php the_post_thumbnail(array(150, 150)); ?>
						<h2>Hola, Soy <strong><?php the_title(); ?></strong></h2>
						<h3><?php the_field('profesion'); ?></h3>
						
						<?php 
							//Variables para traer los campos de las redes sociales.
							$twitter = get_field('twitter');
							$facebook = get_field('facebook');
							$instagram = get_field('instagram');
							$youtube = get_field('youtube');

							if ($twitter || $facebook || $instagram || $youtube ) :?>
								<h4>Sigueme en:</h4>

								<ul>
									<?php 
									if ( $twitter ) :?>

										<li>
											<a href="http://twitter.com/<?php echo esc_attr( $twitter ); ?>"  target="_blank">
												<img class="icon-item" src="<?php echo get_template_directory_uri();?>/img/twitter.svg " alt="">
											</a>
										</li>
									<?php endif;
									
									if ( $facebook ) :?>

										<li>
											<a href="http://facebook.com/<?php echo esc_attr( $facebook ); ?>"  target="_blank">
												<img class="icon-item" src="<?php echo get_template_directory_uri();?>/img/facebook.svg " alt="">
											</a>
										</li>
									<?php endif;
									
									if ( $instagram ) :?>

										<li>
											<a href="http://instagram.com/<?php echo esc_attr( $instagram ); ?>"  target="_blank">
												<img class="icon-item" src="<?php echo get_template_directory_uri();?>/img/instagram.svg " alt="">
											</a>
										</li>

									<?php endif;
									
									if ( $youtube ) :?>
									<li>
										<a href="http://youtube.com/<?php echo esc_attr( $youtube ); ?>"  target="_blank">
											<img class="icon-item" src="<?php echo get_template_directory_uri();?>/img/youtube.svg " alt="">
										</a>
									</li>
									<?php endif;?>
								</ul>

						<?php endif;?>

				<?php
					endwhile;
				 ?>

				 <?php wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<section id="categorias">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php

					$taxonomy = 'category';
					$terms = get_terms($taxonomy);

					if ($terms) {
							echo '<ul>';
							$i = 0;
							foreach($terms as $term) {
								$i++;
								$mi = get_field('imagen_categorias', $term->taxonomy . '_' . $term->term_id);
						   		$imageThumbURL = $mi['sizes']['medium'];
						   		
								if ($i <= 4) {						?>					 		 
							 		<div class="col-xs-6 col-md-3">
										<div class="categorias__item">
											
											<a href="<?php echo get_term_link($term->slug, $taxonomy) ?>">
												<h2><?php echo $term->name; ?></h2>
												<img src="<?php echo $imageThumbURL;?>" alt="<?php echo $imageAlt; ?>">
											</a>
										</div>
									</div>	

					<?php		
								}					
								
							}

						}

				?>
			</div>
		</div>
	</div>
</section>

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
								
								<div class="col-md-9 posts__item__info--left">
									<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
									<p><?php the_excerpt(); ?></p>
									<a class="btns" href="<?php the_permalink(); ?>">Leer Mas.</a><br>
								</div>

								<div class="col-md-3 posts__item__info--right">
									<?php the_category(' , ' ); ?><br>
									<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
								</div>

							</div>
						
					</div>


					<!-- post -->
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					
					<?php endif; ?>

					<div class="posts-nav text-center">
			
						<?php next_posts_link('&larr; Previos'); ?>
						<span class="spacer"></span>
						<?php previous_posts_link('Recientes &rarr;'); ?>
					</div>
				
								
			</div>
		</div>
	</div>
</section>


<?php

get_footer();
