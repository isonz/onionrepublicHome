<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
			<?php the_post(); ?>
			<div class="page-header">
				<h1 class="page-title">
					<?php if (is_day()) : ?>
					<?php echo sprintf(__('Daily Archives: %s', PADD_THEME_SLUG), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
					<?php echo sprintf(__('Monthly Archives: %s', PADD_THEME_SLUG), get_the_date(__('F Y', PADD_THEME_SLUG))); ?>
					<?php elseif (is_year()) : ?>
					<?php echo sprintf(__('Yearly Archives: %s', PADD_THEME_SLUG), get_the_date(__('Y', PADD_THEME_SLUG))); ?>
					<?php elseif (is_author()) : ?>
					<?php echo sprintf(__('Posts by %s', PADD_THEME_SLUG), get_the_author()); ?>
					<?php elseif (is_category()) : ?>
					<?php echo sprintf(__('Posts under %s Category', PADD_THEME_SLUG), single_cat_title('',false)); ?>
					<?php elseif (is_tag()) : ?>
					<?php echo sprintf(__('Posts Tagged  &#8216;%s &#8217;', PADD_THEME_SLUG), single_tag_title('',false)); ?>
					<?php else : ?>
					<?php echo __('Blog Archives', PADD_THEME_SLUG)?>
					<?php endif; ?>
				</h1>
			</div>
			<?php rewind_posts(); ?>

	<?php if (have_posts()) : ?>

		<?php
			add_filter('the_excerpt', 'padd_theme_hook_excerpt_loop');
			add_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length');
		?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('loop', 'index'); ?>
		<?php endwhile; ?>
		<?php
			remove_filter('the_excerpt', 'padd_theme_hook_excerpt_loop');
			remove_filter('excerpt_length', 'padd_theme_hook_excerpt_loop_length');
		?>
		<div class="clear"></div>
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