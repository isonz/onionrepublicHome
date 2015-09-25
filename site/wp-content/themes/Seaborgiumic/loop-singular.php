<?php
	$title = the_title_attribute('echo=0');
	$title = !empty($title) ? $title : __('(untitled)', PADD_THEME_SLUG);
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<div class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), $title); ?>">
				<?php
					$title = get_the_title();
					if (!empty($title)) {
						echo $title;
					} else {
						_e('(untitled)', PADD_THEME_SLUG);
					}
				?>
			</a>
		</h1>
		<?php if (!is_page()) : ?>
		<p class="meta">
			<span class="author-time">
				<?php echo __('by ', PADD_THEME_SLUG); the_author(); ?>, 
				<?php the_time(__('F j, Y', PADD_THEME_SLUG)); ?>
			</span>
			<span class="comment-cat">
				<span class="category">
				<?php the_category(', '); ?>
				</span>
				<a class="comments" href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?></a>
			</span>
		</p>
		<?php endif; ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<div class="clear"></div>
		<?php wp_link_pages(array('before' => '<p class="pages"><strong>' . __('Pages:', PADD_THEME_SLUG). '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	</div>
	<?php if (function_exists('wp_gdsr_render_review')) : ?>
	<div class="entry-rating"><?php wp_gdsr_render_review() ?></div>
	<?php endif; ?>
</div>

