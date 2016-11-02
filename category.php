<?php 
get_header();
?>

<div class="container">
	<div class="row">
	<?php
		if( have_posts() ) :
			$categoria_seleccionada = get_the_category();

			foreach( $categoria_seleccionada as $category) {
				$categoria_name = $category->cat_name . ' '; 
			} ?>
			
				
				
				<div class="col-md-12 categorias__contenido">
					<div class="row">

					<div class="col-md-12">
						<h2>CATEGORIA / <?php echo $categoria_name; ?></h2>
					</div>
					
			<?php
			while( have_posts() ): the_post();?>

					<div class="col-md-6">
						<div class="categorias__item__2">
							<div class="destaca-categorias">
								<?php the_post_thumbnail($size = 'category-size') ?>
							</div>
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>
							<a class="btns" href="<?php the_permalink(); ?>">Leer Mas.</a><br>
						</div>
					</div>	


	<?php 	endwhile;?>
				</div>
				</div>
	<?php endif;?>
	
	</div>
</div>

<?php		 
get_footer();
?>