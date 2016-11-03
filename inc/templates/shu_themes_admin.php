
<?php settings_errors(); ?>
<form action="options.php" method="post">
	<?php 
		settings_fields( 'shutheme-setting-group' );
		do_settings_sections( 'Shu Theme Opciones' );
		submit_button();
	?>
</form>