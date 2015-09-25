<?php
	$title = the_title_attribute('echo=0');
	$title = !empty($title) ? $title : __('(untitled)', PADD_THEME_SLUG);
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), $title); ?>">
			<?php
				$padd_image_def = get_template_directory_uri() . '/styles/images/default-archive.png';
				if (has_post_thumbnail()) {
					the_post_thumbnail(Padd_Setup::get_image_name('entry'));
				} else {
					echo '<img class="image-thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
				}
			?>
		</a>
	</div>
	<div class="entry-header">
		<h2 class="entry-title">
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
		</h2>
		<?php $type = get_post_type(); ?>
		<?php if ('post' == $type) : ?>
		<p class="meta">
			<span class="date"><?php the_time(__('F j, Y', PADD_THEME_SLUG)); ?></span>
			<span class="no-display"> | </span>
			<a class="comments" href="<?php comments_link(); ?>"><?php comments_number(__('No comments yet', PADD_THEME_SLUG), __('1 Comment', PADD_THEME_SLUG), __('% Comments', PADD_THEME_SLUG)) ?></a>
		</p>
		<?php endif; ?>
	</div>
	<div class="entry-excerpt">
		<?php the_excerpt();?>
	</div>
	<div class="clear"></div>
</div>