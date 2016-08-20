<?php get_header(); ?>
	<section class="content">
		<main class="main">
			<?php if( !is_front_page() ): ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(''); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
				<?php the_content(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</main><!-- .main -->
	</section><!-- .content -->
<?php get_footer(); ?>