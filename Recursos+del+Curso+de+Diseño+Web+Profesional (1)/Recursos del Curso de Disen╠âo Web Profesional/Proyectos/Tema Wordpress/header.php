<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>
		<?php if (is_home()){
			// Si estamos en la pagina de Inicio obtenemos el nombre del Blog
			echo get_bloginfo('name');
		} else if (is_single()){
			// Si es un post mostramos el titulo
			echo the_title();
		} else {
			// De otra forma obtenemos el titulo del post
			echo get_bloginfo('name');
		}?>
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo get_theme_file_uri('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo get_theme_file_uri('css/estilos.css');?>">
	<!-- Carga los estilos CSS del single en la página de single.php -->
	<?php if (is_single() || is_page()){ ?>
		<link rel="stylesheet" href="<?php echo get_theme_file_uri('css/single.css');?>">
	<?php }?>
	<script src="<?php echo get_theme_file_uri('main.js');?>" defer></script>
	<?php wp_head(); ?>
	</head>
	<body>
		<header class="header">
			<div class="logo">
				<a href="<?php bloginfo('url'); ?>">
					<img src="<?php echo get_theme_file_uri('assets/logo.svg'); ?>" alt="Logo de Vision" />
				</a>

				<button class="btn-menu" id="btn-menu">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icono" viewBox="0 0 16 16">
						<path
							fill-rule="evenodd"
							d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
						/>
					</svg>
					<span>Categorías</span>
				</button>
			</div>
			<div class="contenedor-navbar" id="contenedor-navbar">
				<?php wp_nav_menu(array(
					'container' => false,
					'menu_class' => 'navbar',
					'theme_location' => 'menu-header'
				));	?>
			</div>
		</header>
