<?php get_header(); ?>
	<section class="content">
		<main class="main">
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">

						</div>
					</div>
				</div>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</main><!-- .main -->
	</section><!-- .content -->
<?php get_footer(); ?>