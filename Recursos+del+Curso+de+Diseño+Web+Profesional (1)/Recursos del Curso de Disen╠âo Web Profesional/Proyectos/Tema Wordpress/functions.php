<?php

// Registrar menús de navegacíon
register_nav_menus( array(
	'menu-header' => 'Menu Header',
	'menu-footer-1' => 'Menu Footer 1',
	'menu-footer-2' => 'Menu Footer 2'
));

// Agregamos el soporte para thumbnails.
// Sin esta función no nos aparecera la opción para subir thumbnails en el editor.
add_theme_support( 'post-thumbnails' );


register_sidebar(array(
	'name' => 'sidebar',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'after-posts',
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
));

?>

