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
						<h4>Sigueme en:</h4>

						<?php 

							//Obtenemos el ID del usuario actual
							$user_id = get_current_user_id();

							//Todos los meta fields
							$user_meta = get_user_meta( $user_id );

							//Obtenidos de forma individual
							$twitter = get_user_meta( $user_id, 'twitter', true );
							$facebook = get_user_meta( $user_id, 'facebook', true );
							$instagram = get_user_meta( $user_id, 'instagram', true );							
						?>

						<ul>
							<li>
								<a href="http://<?php echo esc_attr( $twitter ); ?>"  target="_blank"><span class="dashicons dashicons-twitter"></span>Twitter</a></p>
							</li>
							<li>
								<a href="http://<?php echo esc_attr( $facebook ); ?>"  target="_blank"><span class="dashicons dashicons-twitter"></span>Facebook</a></p>
							</li>
							<li>
								<a href="http://<?php echo esc_attr( $instagram ); ?>"  target="_blank"><span class="dashicons dashicons-twitter"></span>Instagram</a></p>
							</li>
						</ul>

				<?php
					endwhile;
				 ?>
			</div>
		</div>
	</div>
</section>

<section id="categorias">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
					query_posts(array(
						'showposts' => '4',

					));
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="col-md-3">
							<div class="categorias__item">
								<h3><?php the_category(' , ' ); ?></h3>
							</div>
						</div>
						
					<!-- post -->
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php

get_footer();
