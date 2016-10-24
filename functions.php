<?php
	
add_theme_support( 'post-thumbnails' );
	
// Register custom navigation walker
    require_once('wp_bootstrap_navwalker.php');

/**
 * Enqueue scripts and styles.
 */
function shu_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', array( ), false, 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array( ), false, 'all' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), false, 'all' );
	wp_enqueue_style( 'font-oxygen', 'https://fonts.googleapis.com/css?family=Oxygen|Raleway', $deps = array(), $ver = null, $media = null );

}
add_action( 'wp_enqueue_scripts', 'shu_scripts' );


// add_action( 'wp_enqueue_scripts', 'fuente_d_google' );
// function fuente_d_google() {
//     wp_enqueue_style( $handle = 'fuente_d_google', $src = 'https://fonts.googleapis.com/css?family=Oxygen', $deps = array(), $ver = null, $media = null );
// }



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


// Register Custom Post Type
function Acerca_de_mi() {

	$labels = array(
		'name'                  => _x( 'Acerca de mi', 'Post Type General Name', 'acercademi' ),
		'singular_name'         => _x( 'acerca de mi', 'Post Type Singular Name', 'acercademi' ),
		'menu_name'             => __( 'Acerca de Mi', 'acercademi' ),
		'name_admin_bar'        => __( 'Acerca de Mi', 'acercademi' ),
		'archives'              => __( 'Item Archives', 'acercademi' ),
		'parent_item_colon'     => __( 'Parent Item:', 'acercademi' ),
		'all_items'             => __( 'All Items', 'acercademi' ),
		'add_new_item'          => __( 'Add New Item', 'acercademi' ),
		'add_new'               => __( 'Crear Acerca de Mi', 'acercademi' ),
		'new_item'              => __( 'New Item', 'acercademi' ),
		'edit_item'             => __( 'Edit Item', 'acercademi' ),
		'update_item'           => __( 'Update Item', 'acercademi' ),
		'view_item'             => __( 'View Item', 'acercademi' ),
		'search_items'          => __( 'Search Item', 'acercademi' ),
		'not_found'             => __( 'Not found', 'acercademi' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'acercademi' ),
		'featured_image'        => __( 'Featured Image', 'acercademi' ),
		'set_featured_image'    => __( 'Imagen destacada', 'acercademi' ),
		'remove_featured_image' => __( 'Remove featured image', 'acercademi' ),
		'use_featured_image'    => __( 'Use as featured image', 'acercademi' ),
		'insert_into_item'      => __( 'Insert into item', 'acercademi' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'acercademi' ),
		'items_list'            => __( 'Items list', 'acercademi' ),
		'items_list_navigation' => __( 'Items list navigation', 'acercademi' ),
		'filter_items_list'     => __( 'Filter items list', 'acercademi' ),
	);
	$args = array(
		'label'                 => __( 'acerca de mi', 'acercademi' ),
		'description'           => __( 'Configuración Requerida para el home del blog', 'acercademi' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'acercademi', $args );

}
add_action( 'init', 'Acerca_de_mi', 0 );


add_filter('user_contactmethods','metodos_de_contacto');
function metodos_de_contacto( $contactmethods ) {

    $contactmethods['twitter'] = __('Twitter', 'textdomain');
    $contactmethods['facebook'] = __('Facebook', 'textdomain');
    $contactmethods['instagram'] = __('Instagram', 'textdomain');
    $contactmethods['linkedin'] = __('Linkedin', 'textdomain');

    return $contactmethods;

}