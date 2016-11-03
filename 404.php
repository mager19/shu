<?php 


	get_header();
?>


<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 contenido__404">
				<h2>404</h2>
				<img src="<?php echo get_template_directory_uri();?>/img/facepalm.jpg" alt="">		
				<h1>Upps Algo hicimos mal, lo sentimos, pero: </h1>		

				<?php get_template_part('single', 'destacados') ?>				
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>