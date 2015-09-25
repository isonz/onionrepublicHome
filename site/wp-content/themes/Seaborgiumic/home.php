<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
	
	<div class="page-header">
		<h1 class="page-title"><?php _e('Latest News', PADD_THEME_SLUG); ?></h1>
	</div>

	<?php if (have_posts()) : ?>

		<?php add_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length'); ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop', 'index'); ?>
		<?php endwhile; ?>
		<?php remove_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length'); ?>
		<?php Padd_PageNavigation::render(); ?>

	<?php else : ?>

		<div id="post-0" class="post no-results not-found entry">
			<div class="entry-header">
				<h2 class="entry-title"><?php _e('Nothing Found', PADD_THEME_SLUG); ?></h2>
			</div><!-- .entry-header -->
			<div class="entry-content">
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', PADD_THEME_SLUG); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-0 -->

	<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>