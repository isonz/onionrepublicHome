<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">
		<?php the_post(); ?>

		<?php get_template_part('loop', 'singular'); ?>

		<?php $desc = get_the_author_meta('description'); ?>
		<?php if (!empty($desc)) :?>
		<div class="entry-box entry-box-about-author">
			<div class="entry-box-header">
				<h2 class="entry-box-title">About the Author</h2>
			</div>
			<div class="entry-box-interior clear-fix">
				<?php echo get_avatar(get_the_author_meta('email'),53) ?>
				<p><?php echo $desc; ?></p>
			</div>
		</div>
		<?php endif; ?>

		<?php if ('1' == Padd_Option::get('social_bookmarks_enable','')) : ?>
		<div class="entry-box entry-box-share">
			<div class="entry-box-header">
				<h2 class="entry-box-title"><?php echo __('Share Our Posts', PADD_THEME_SLUG); ?></h2>
			</div>
			<?php
				remove_filter('excerpt_more','padd_theme_hook_excerpt_index_more');
				add_filter('get_the_excerpt','padd_theme_hook_excerpt_bookmark');
				add_filter('excerpt_more','padd_theme_hook_excerpt_bookmark_more');
				$padd_sb_url = urlencode(get_permalink());
				$padd_sb_title = urlencode(get_the_title());
				$padd_sb_notes = urlencode(get_the_excerpt());
				$padd_img_path = get_template_directory_uri() . '/styles/images/icon-bm-32-%s.png';
			?>
			<div class="entry-box-interior clear-fix">
				<ul>
				<?php
					global $_PADD_SOCIALBMK;
					foreach ($_PADD_SOCIALBMK as $k => $psb) {
						$psb->ref_url = $padd_sb_url;
						$psb->title = $padd_sb_title;
						$psb->excerpt = $padd_sb_notes;
						$psb->content = '<img alt="' . $psb->network . '" src="' . sprintf($padd_img_path, $k) . '" />';
						echo '<li>' . $psb . '</li>';
					}
				?>
				</ul>
			</div>
		</div>
		<?php endif; ?>

		<?php comments_template('', true); ?>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>