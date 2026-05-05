<?php get_header(); ?>

<main class="main contenedor">
	<div class="grid">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
			<article class="articulo">
				<!-- <div class="thumb">
					<img src="<?php echo get_theme_file_uri('assets/img/0.png'); ?>" alt="" />
				</div> -->
				<div class="thumb"><?php the_post_thumbnail(); ?></div>
				<h1 class="titulo"><?php the_title(); ?></h1>
				<div class="meta">
					<div class="categorias"> <?php the_category();?> </div>
					<span class="fecha"><?php echo get_the_date(); ?></span>
				</div>
				<div class="texto">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; else: ?>
			<!-- NO HAY POSTS -->
		<?php endif; ?>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>


