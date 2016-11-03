<?php 
	
	/*************Panel de opciones *****************/


function shutheme_add_admin_page(){
	//añado pagina a menu wp
	add_menu_page( 'Shu Theme Opciones', 'ShuTheme', 'manage_options', 'mager_shu', 'shu_theme_create_page', 'dashicons-admin-plugins', 110 );

	//Añade las subpaginas
	add_submenu_page( 'mager_shu', 'Shu Theme Opciones' , 'Opciones' , 'manage_options' , 'mager_shu', 'shu_theme_create_page' );

	add_submenu_page( 'mager_shu', 'Shu Opciones css' , 'Personalizar css ' ,'manage_options' , 'shutheme_css', 'shutheme_opciones_page' );


	//Activate Custom Settings
	add_action('admin_init','shu_custom_settings');

	function shu_custom_settings(){
		//Se registran los elementos
		register_setting( 'shutheme-setting-group' , 'first_name' );
		register_setting( 'shutheme-setting-group' , 'last_name' );
		register_setting( 'shutheme-setting-group' , 'twitter_handler' , 'sanitize_shu_twitter_handler');


		//añado seccion
		add_settings_section( 'shu-settings-options', 'Shu Options', 'shu_bar_options', 'Shu Theme Opciones' );

		//añado campos
		add_settings_field( 'sidebar-name', 'Full Name', 'shu_sidebar_name' , 'Shu Theme Opciones','shu-settings-options' );
		add_settings_field( 'sidebar-twitter', 'Twitter handler', 'shu_twitter_handler' , 'Shu Theme Opciones','shu-settings-options' );

		

	}

	function shu_bar_options(){
		echo "personalize sus opciones";
	}

	function shu_sidebar_name(){
		$first_name = esc_attr( get_option('first_name') );
		$last_name = esc_attr( get_option('last_name') );
		echo '<input type="text" name="first_name" value="' .  $first_name . '" placeholder="Ingresa tu nombre" /> <input type="text" name="last_name" value="' .  $last_name . '" placeholder="Ingresa tu apellido" />';
	}

	function shu_twitter_handler(){
		$twitter_handler = esc_attr( get_option('twitter_handler') );
		echo '<input type="text" name="twitter_handler" value="' . $twitter_handler . '" placeholder="Tu usuario de Twitter" />  <p class="description">Ingresa tu usuario de twitter sin el @</p>';
	}

	//Satinizacion twitter handler
	function sanitize_shu_twitter_handler( $input ){
		$output = sanitize_text_field( $input );
		$output = str_replace('@', '', $output);
		return $output;
	}

	

}
add_action('admin_menu','shutheme_add_admin_page');


function shu_theme_create_page(){
	//funcion que genera la page
	require_once( get_template_directory() . '/inc/templates/shu_themes_admin.php');
	
}

function shutheme_opciones_page(){
	//funcion que genera la page
	// echo '<h1>Shu Theme Css Opciones';
}

?>

