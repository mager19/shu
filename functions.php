<?php
	
add_theme_support( 'post-thumbnails' );


/**
 * Enqueue scripts and styles.
 */
function shu_scripts() {
	wp_enqueue_style( 'shu-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), false, 'all' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), false, 'all' );

}
add_action( 'wp_enqueue_scripts', 'shu_scripts' );


// function wp1030_registar_widgets_areas() {
	
	
// 	register_sidebar(array(
// 		'name' => 'Zona izquierda de widgets',
// 		'id' => 'sidebar_izq',
// 		'before_widget' => '<div id="%1$s" class="widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3>',
// 		'after_title' => '</h3>'
// 	));
	
// 	register_sidebar(array(
// 		'name' => 'Zona central de widgets',
// 		'id' => 'sidebar_cen',
// 		'before_widget' => '<div id="%1$s" class="widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3>',
// 		'after_title' => '</h3>'
// 	));
	
// 	register_sidebar(array(
// 		'name' => 'Zona derecha de widgets',
// 		'id' => 'sidebar_der',
// 		'before_widget' => '<div id="%1$s" class="widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3>',
// 		'after_title' => '</h3>'
// 	));
	
	
// }
// add_action('widgets_init', 'wp1030_registar_widgets_areas');





function wp1030_registrar_menus() {
	
	
	register_nav_menus(array(
		'menu-principal' => 'Menú principal'
	));
	
	
}
add_action('init', 'wp1030_registrar_menus');

























