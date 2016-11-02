<?php 
get_header();
?>

<div class="section" id="articulo">
	<div class="container">
		<div class="row">
			<div class="col-md-12 articulo__contenido">
			 	<?php while ( have_posts() ) : the_post(); ?>
			 	<!-- post -->
			 			<?php the_post_thumbnail($size = 'custom-size') ?>
			 		<div class="articulo__contenido__cabecera">
			 			<h2><?php the_title(); ?></h2>
			 			<h3><?php the_date(); ?></h3>
			 			<h4><?php the_category(' , ' ); ?></h4>
			 			<p><?php the_content(); ?></p>

			 			<?php 
			 				$enlaceA = get_permalink();
			 				$tituloA = get_the_title();

			 				//Traigo el usuario de twitter, facebook del post type acerca de mi
			 				$query = new WP_Query(array(
			 					'post_type' => 'acercademi',
			 				));

			 				if( $query->have_posts() ) : $query->the_post(); 

					 			$twitter = get_field('twitter');
					 							 			
					 		endif;
					 		wp_reset_postdata(); 

			 				
			 				$twitterButton = 'https://twitter.com/intent/tweet?text=' . $tituloA . '- &amp;url=' . $enlaceA . '&amp;via=' . $twitter;
			 				$facebookButton = 'https://www.facebook.com/sharer/sharer.php?u=' . $enlaceA;
			 				
			 				
			 			?>
							
						<div class="shareThis">
							<div class="row">
								<div class="col-md-4 col-md-offset-4">
									<h3>Compartir en:</h3>								
									<ul>
										<li><a href="<?php echo $twitterButton; ?>" target="_blank"><span class="dashicons dashicons-twitter"></span></a></li>
										<li><a href="<?php echo $facebookButton; ?>" target="_blank"><span class="dashicons dashicons-facebook-alt"></span></a></li>
									</ul>
								</div>							
							</div>
						</div>
			 			


			 		</div>
			 	<?php endwhile; ?>	
			 				 	
			</div>

			<div class="col-md-12 comentarios">
				<?php comments_template(); ?> 
			</div>
		</div>
	</div>
</div>





<?php 
get_footer();
?>