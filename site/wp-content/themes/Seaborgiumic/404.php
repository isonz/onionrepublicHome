<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
		<div id="post-0" class="page page-404 entry">
			<div class="entry-header">
				<h2 class="entry-title"><?php _e('Not Found', PADD_THEME_SLUG); ?></h2>
			</div>
			<div class="entry-content clear-fix">
				<p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', PADD_THEME_SLUG); ?></p>
			</div>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>