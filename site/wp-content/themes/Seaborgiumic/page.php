<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
		<?php the_post(); ?>
		<?php get_template_part('loop', 'singular'); ?>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>