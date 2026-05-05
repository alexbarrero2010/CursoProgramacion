<?php get_header(); ?>

<main class="main contenedor">
	<div class="grid">
		<section class="noticias">
			<h3 class="titulo-seccion"><?php the_archive_title(); ?></h3>

			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
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
					<p class="extracto"><?php the_excerpt(); ?></p>
				</div>
			</a>
			<?php endwhile; else: ?>
				<h3>No hay post por mostrar.</h3>
			<?php endif; wp_reset_postdata(); ?>

			<div class="paginacion">
				<!-- Comprobamos si hay posts antes -->
				<?php if (get_previous_posts_link()) : ?>
					<!-- De ser así agregamos el enlace de anterior -->
					<a href="<?php echo get_previous_posts_page_link(); ?>" class="boton">Anterior</a>
				<?php else : ?>
					<!-- De otra forma agregamos el botón desactivado de anterior -->
					<button class="boton desactivado">Anterior</button>
				<?php endif; ?>

				<!-- Comprobamos si hay posts despues -->
				<?php if (get_next_posts_link()) : ?>
					<!-- De ser así agregamos el enlace de siguiente -->
					<a href="<?php echo get_next_posts_page_link(); ?>" class="boton">Siguiente</a>
				<?php else : ?>
					<!-- De otra forma agregamos el botón desactivado de siguiente -->
					<button class="boton desactivado">Siguiente</button>
				<?php endif; ?>
			</div>

			<?php dynamic_sidebar('after-posts'); ?>
		</section>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>


