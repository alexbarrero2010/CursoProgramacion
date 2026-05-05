<?php get_header(); ?>

<main class="main contenedor">
	<?php
		// Obtenemos la página actual, si es 1 mostramos las noticias destacadas de otra forma no.
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if($paged === 1):
	?>

	<section class="noticias-principales">
		<!-- LOOP THE WORDPRESS -->
		<?php // if (have_posts()) : while(have_posts()) : the_post(); ?>
			<!-- MI POST -->
		<?php // endwhile; else: ?>
			<!-- NO HAY POSTS -->
		<?php // endif; wp_reset_postdata(); ?>
		<!-- FIN DEL LOOP THE WORDPRESS -->

		<?php
			// Creamos un query para obtener solo los post con la etiqueta de 'noticias-destacadas'.
			$noticia_principal = new WP_Query(array(
				'tag' => 'noticia-principal',
				'posts_per_page' => 1,
			));

			if ($noticia_principal->have_posts()) : while($noticia_principal->have_posts()) : $noticia_principal->the_post(); 
		?>
			<a href="<?php the_permalink();?>" class="principal">
				<div class="thumb"><?php the_post_thumbnail(); ?></div>
				<div class="info">
					<h4 class="titulo"><?php the_title(); ?></h4>
					<div class="meta">
						<p class="categoria">
							<?php
							// Obtenemos un arreglo de categorías
							$categorias = get_the_category();
							// Mostramos la primer categoría
							echo $categorias[0]->name;
							?>
						</p>
						<span class="fecha"><?php the_date(); ?></span>
					</div>
					<div class="extracto"><?php the_excerpt(); ?></div>
				</div>
			</a>
		<?php endwhile; else: ?>
			<h3>No hay post por mostrar.</h3>
		<?php
			endif; // Cerramos el if
			// Reiniciamos el loop para poder usarlo más adelante.
			wp_reset_postdata(); 
		?>
		<div class="noticias-destacadas">
			<?php
				// Creamos un query para obtener solo los post con la etiqueta de 'noticias-destacadas'.
				$noticias_destacadas = new WP_Query( array(
					'tag' => 'noticias-destacadas',
					'posts_per_page' => 4,
				) );

				if ($noticias_destacadas->have_posts()) : while($noticias_destacadas->have_posts()) : $noticias_destacadas->the_post(); 
			?>
			<a href="<?php the_permalink();?>" class="card">
				<div class="thumb"><?php the_post_thumbnail(); ?></div>
				<div class="info">
					<h4 class="titulo"><?php the_title() ?></h4>
					<div class="meta">
						<p class="categoria">
							<?php
							// Obtenemos un arreglo de categorías
							$categorias = get_the_category();
							// Mostramos la primer categoría
							echo $categorias[0]->name;
							?>
						</p>
						<span class="fecha"><?php the_date() ?></span>
					</div>
				</div>
			</a>
			<?php endwhile; else: ?>
				<h3>No hay post por mostrar.</h3>
			<?php
				endif; // Cerramos el if
				// Reiniciamos el loop para poder usarlo más adelante.
				wp_reset_postdata(); 
			?>
		</div>
	</section>

	<?php endif; ?>

	<div class="grid">
		<section class="noticias">
			<h3 class="titulo-seccion">Últimas noticias</h3>

			<?php
				// Obtenemos la información de la etiquta 'noticias-destacadas'
				$noticias_destacadas_tag_info = get_term_by('slug', 'noticias-destacadas', 'post_tag');
				$noticia_principal_tag_info = get_term_by('slug', 'noticia-principal', 'post_tag');
				
				// Obtenemos su tag_id
				// Primero comprobamos que exista la etiqueta, si existe guardamos el term_id, de otra forma guardamos null.
				// Esto lo hacemos para que si no existe la etiqueta en wordpress no se rompa el código en la consulta personalizada.
				$noticias_destacadas_id = ($noticias_destacadas_tag_info ? $noticias_destacadas_tag_info->term_id : null ) ;
				$noticia_principal_id = ($noticia_principal_tag_info ? $noticia_principal_tag_info->term_id : null );

				// Creamos un query para obtener solo los post con la etiqueta de 'noticias-destacadas'.
				$ultimas_noticias = new WP_Query( array(
					// Filtramos obtener los posts que no tengan la tag de noticias-destacadas y noticia-principal
					'tag__not_in' => array($noticias_destacadas_id, $noticia_principal_id),
					'posts_per_page' => 4,
					'paged' => $paged
				));

				if ($ultimas_noticias->have_posts()) : while($ultimas_noticias->have_posts()) : $ultimas_noticias->the_post(); 
			?>
			<a href="<?php the_permalink();?>" class="card">
				<div class="thumb"><?php the_post_thumbnail(); ?></div>
				<div class="info">
					<h4 class="titulo"><?php the_title(); ?></h4>
					<div class="meta">
						<p class="categoria">
							<?php
							// Obtenemos un arreglo de categorías
							$categorias = get_the_category();
							$cuenta = 0;

								// Comprobamos que haya categorías
								if (!empty($categorias)) {
									// Recorremos el arreglo de categorías
									foreach ( $categorias as $categoria ) {
										// Por cada categoría obtenemos el nombre de la categoría y lo sanitizamos.
										echo esc_html( $categoria->name );
										// Aumentamos la cuenta.
										$cuenta++;
										// Si la cuenta es menor que el número de categorías concatena un símbolo.
										if($cuenta < count($categorias)){
											echo ' • ';
										}
									}
								}
							?>
						</p>
						<span class="fecha"><?php echo get_the_date(); ?></span>
					</div>
					<div class="extracto"><?php the_excerpt(); ?></div>
				</div>
			</a>
			<?php endwhile; else: ?>
				<h3>No hay post por mostrar.</h3>
			<?php
				endif; // Cerramos el if
				// Reiniciamos el loop para poder usarlo más adelante.
				wp_reset_postdata();
			?>

			<div class="paginacion">
				<!-- Comprobamos si hay posts antes -->
				<?php if (get_previous_posts_link(null, $ultimas_noticias->max_num_pages)) : ?>
					<!-- De ser así agregamos el enlace de anterior -->
					<a href="<?php echo get_previous_posts_page_link($ultimas_noticias->max_num_pages); ?>" class="boton">Anterior</a>
				<?php else : ?>
					<!-- De otra forma agregamos el botón desactivado de anterior -->
					<button class="boton desactivado">Anterior</button>
				<?php endif; ?>

				<!-- Comprobamos si hay posts despues -->
				<?php if (get_next_posts_link(null, $ultimas_noticias->max_num_pages)) : ?>
					<!-- De ser así agregamos el enlace de siguiente -->
					<a href="<?php echo get_next_posts_page_link(null, $ultimas_noticias->max_num_pages); ?>" class="boton">Siguiente</a>
				<?php else : ?>
					<!-- De otra forma agregamos el botón desactivado de siguiente -->
					<button class="boton desactivado">Siguiente</button>
				<?php endif; ?>
			</div>

			<!-- <div class="anuncios">
				<a href="#" class="anuncio">
					<img src="<?php echo get_theme_file_uri('assets/img/banner.png'); ?>" alt="" />
					<p class="leyenda">Publicidad</p>
				</a>
			</div> -->

			<?php dynamic_sidebar('after-posts'); ?>
		</section>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>

