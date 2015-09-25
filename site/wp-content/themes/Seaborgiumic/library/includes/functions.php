<?php

/**
 * Add favicon in head tag.
 */
function padd_theme_head_favicon() {
	$icon = Padd_Option::get('favicon_url','');
	if (!empty($icon)) {
		echo '<link rel="shortcut icon" href="' . $icon . '" />' . "\n";
		echo '<link rel="icon" href="' . $icon . '" />' . "\n";
	}
}

/**
 * Add tracker before the body end tag.
 */
function padd_theme_head_tracker() {
	$tracker = Padd_Option::get('tracker_body','');
	if (!empty($tracker)) {
		echo stripslashes($tracker);
	}
}

/**
 * Checks if the value of the Facebook field is URL or username.
 *
 * @param <type> $string
 * @return boolean
 */
function padd_theme_check_facebook_url($string) {
	$url = false;
	if ('http://' == substr($string, 0, 7)) {
		$url = true;
	}
	return $url;
}

/**
 * Trim the title.
 *
 * @param int $length Number of letters.
 * @param string $after Ellipsis by default.
 */
function padd_theme_trim_title($length, $after='...') {
	$title = get_the_title();
	if (strlen($title) > $length) {
		$title = substr($title, 0, $length);
		echo $title . $after;
	} else {
		echo $title;
	}
}

function padd_theme_trim($text, $length, $after='...') {
	if (strlen($text) > $length) {
		$text = substr($text, 0, $length);
		echo $text . $after;
	} else {
		echo $text;
	}
}

function padd_theme_share_button() {
?>
<ul>
	<li class="facebook"><a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>"><?php echo __('Share', PADD_THEME_SLUG); ?></a></li>
	<li class="twitter"><a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink());?>&amp;count=horizontal" class="twitter-share-button">Twitter</a></li>
</ul>
<?php
}

/**
 * Renders the list of comments.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-box">
			<div class="comment-interior append-clear">
				<div class="comment-author append-clear">
					<div class="comment-avatar"><?php echo get_avatar($comment,'33'); ?></div>
					<div class="comment-meta">
						<span class="author"><?php echo sprintf(__('%s says:', PADD_THEME_SLUG), get_comment_author_link()); ?></span>
						<span class="time"><?php echo get_comment_date(Padd_Option::get('date_format')); ?></span>
					</div>
				</div>
				<div class="comment-details">
					<div class="comment-details-interior">
						<?php comment_text(); ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-notice"><?php _e('My comment is awaiting moderation.', PADD_THEME_SLUG) ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="comment-actions clear">
					<?php edit_comment_link(__('Edit', PADD_THEME_SLUG),'<span class="edit">','</span> | ') ?>
					<?php comment_reply_link(array('respond_id' => 'reply', 'add_below' => 'comment' , 'depth' => $depth, 'max_depth' => $args['max_depth'])) ; ?>
				</div>
			</div>
		</div>
	<?php
}

/**
 * Render the list of trackbacks.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="pings-<?php comment_ID() ?>">
		<?php comment_author_link(); ?>
	<?php
}

/**
 * Renders the featured posts in home page.
 */
function padd_theme_post_slideshow($exclude=array()) {
	wp_reset_query();
	$featured = Padd_Option::get('slideshow_cat_id');
	$count = Padd_Option::get('slideshow_cat_limit');
	query_posts('showposts=' . $count . '&cat=' . $featured);
	$padd_image_def_large = get_template_directory_uri() . '/styles/images/default-slideshow.png';
	add_filter('excerpt_length', 'padd_theme_hook_excerpt_slideshow_length');
	add_filter('excerpt_more'  , 'padd_theme_hook_excerpt_slideshow_more');
?>
<div id="slideshow-box">
	<div class="list">
	<?php while (have_posts()) : the_post(); ?>
		<div class="item">
			<div class="image">
				<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), the_title_attribute('echo=0')); ?>">
				<?php
					$exclude[] = get_the_ID();
					if (has_post_thumbnail()) {
						the_post_thumbnail(Padd_Setup::get_image_name('slideshow'), array('title' => the_title_attribute('echo=0')));
					} else {
						echo '<img class="thumbnail" src="' . $padd_image_def_large . '" />';
					}
				?>
				</a>
			</div>
			<div class="meta">
				<h3><a title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php
	remove_filter('the_category', 'padd_theme_category_filter_slideshow');
	remove_filter('excerpt_length', 'padd_theme_hook_excerpt_slideshow_length');
	remove_filter('excerpt_more'  , 'padd_theme_hook_excerpt_slideshow_more');
	wp_reset_query();
	return $exclude;
}

/**
 * Renders the featured posts in home page.
 */
function padd_theme_post_featured($exclude=array()) {
	wp_reset_query();
//	$featured = Padd_Option::get('featured_cat_id');
	$count    = 4;
	query_posts('showposts=' . $count . '&ignore_sticky_posts=1');
	$padd_image_def_large = get_template_directory_uri() . '/images/default-featured.png';
	add_filter('excerpt_length', 'padd_theme_hook_excerpt_featured_length');
	add_filter('excerpt_more'  , 'padd_theme_hook_excerpt_featured_more');
?>
<div id="featured-box">
	<div class="list">
	<?php while (have_posts()) : the_post(); ?>
		<?php $custom = get_post_custom(); ?>
		<div class="item">
			<div class="image">
				<a href="<?php the_permalink(); ?>" title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), the_title_attribute('echo=0')); ?>">
				<?php
					$exclude[] = get_the_ID();
					if (has_post_thumbnail()) {
						the_post_thumbnail(Padd_Setup::get_image_name('entry'), array('title' => the_title_attribute('echo=0')));
					} else {
						echo '<img class="thumbnail" src="' . $padd_image_def_large . '" />';
					}
				?>
				</a>
			</div>
			<div class="meta">
				<h3><a title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), the_title_attribute('echo=0')); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="datecat">
					<?php the_time(__('F j, Y', PADD_THEME_SLUG)); ?>
				</p>
				<?php the_excerpt(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	<?php
		remove_filter('excerpt_length', 'padd_theme_hook_excerpt_featured_length');
		remove_filter('excerpt_more'  , 'padd_theme_hook_excerpt_featured_more');
		rewind_posts();
	?>
	</div>
	<div class="clear"></div>
</div>
<?php
	remove_filter('the_category', 'padd_theme_category_filter_slideshow');
	wp_reset_query();
	return $exclude;
}

/**
 * Same as the function in <code>wp_dropdown_categories</code> but with multiple selection capability.
 *
 * @param string $args
 * @return type
 */
function padd_dropdown_categories($args = '') {
	$defaults = array(
		'show_option_all' => '', 'show_option_none' => '',
		'orderby' => 'id', 'order' => 'ASC',
		'show_last_update' => 0, 'show_count' => 0,
		'hide_empty' => 1, 'child_of' => 0,
		'exclude' => '', 'echo' => 1,
		'selected' => 0, 'hierarchical' => 0,
		'name' => 'cat', 'id' => '',
		'class' => 'postform', 'depth' => 0,
		'tab_index' => 0, 'taxonomy' => 'category',
		'hide_if_empty' => false, 'multiple' => false
	);

	$defaults['selected'] = (is_category()) ? get_query_var('cat') : 0;

	// Back compat.
	if (isset($args['type']) && 'link' == $args['type']) {
		_deprecated_argument(__FUNCTION__, '3.0', '');
		$args['taxonomy'] = 'link_category';
	}

	$r = wp_parse_args($args, $defaults);

	if (!isset($r['pad_counts']) && $r['show_count'] && $r['hierarchical']) {
		$r['pad_counts'] = true;
	}

	$r['include_last_update_time'] = $r['show_last_update'];
	extract($r);

	$tab_index_attribute = '';
	if ((int) $tab_index > 0)
		$tab_index_attribute = " tabindex=\"$tab_index\"";

	$categories = get_terms($taxonomy, $r);
	$name = esc_attr($name);
	$class = esc_attr($class);
	$id = $id ? esc_attr($id) : $name;

	if (! $r['hide_if_empty'] || ! empty($categories)) {
		if ($r['multiple']) {
			$multiple = "multiple='multiple' size='10'";
			$class = 'postform multiple';
			$name .= '[]';
		} else {
			$multiple = '';
			$class = esc_attr($class);
		}
		$output = "<select name='$name' id='$id' class='$class' $tab_index_attribute $multiple>\n";
	}
	else {
		$output = '';
	}

	if (empty($categories) && ! $r['hide_if_empty'] && !empty($show_option_none)) {
		$show_option_none = apply_filters('list_cats', $show_option_none);
		$output .= "\t<option value='-1' selected='selected'>$show_option_none</option>\n";
	}

	if (! empty($categories)) {

		if ($show_option_all) {
			$show_option_all = apply_filters('list_cats', $show_option_all);
			$selected = ('0' === strval($r['selected'])) ? " selected='selected'" : '';
			$output .= "\t<option value='0'$selected>$show_option_all</option>\n";
		}

		if ($show_option_none) {
			$show_option_none = apply_filters('list_cats', $show_option_none);
			$selected = ('-1' === strval($r['selected'])) ? " selected='selected'" : '';
			$output .= "\t<option value='-1'$selected>$show_option_none</option>\n";
		}

		if ($hierarchical) {
			$depth = $r['depth'];  // Walk the full depth.
		} else {
			$depth = -1; // Flat.
		}

		$output .= padd_walk_category_dropdown_tree($categories, $depth, $r);
	}
	if (! $r['hide_if_empty'] || ! empty($categories))
		$output .= "</select>\n";


	$output = apply_filters('wp_dropdown_cats', $output);

	if ($echo) {
		echo $output;
	}

	return $output;
}

/**
 * Walk the category dropdown tree.
 *
 * @return type
 */
function padd_walk_category_dropdown_tree() {
	$args = func_get_args();
	// the user's options are the third parameter
	if (empty($args[2]['walker']) || !is_a($args[2]['walker'], 'Walker'))
		$walker = new Padd_Walker_CategoryDropdown;
	else
		$walker = $args[2]['walker'];

	return call_user_func_array(array(&$walker, 'walk'), $args);
}

/**
 * Show featured category items.
 *
 * @param int $cat_id Category ID.
 * @param string $position Addition to classname for position of entry (float left or right).
 */
function padd_featured_categories_items($cat_id) {
	global $post;
	$tmp_post = $post;
	$limit = 3;
	$category = get_category($cat_id);
	$fcat_posts = get_posts('numberposts=' . $limit . '&category=' . $cat_id);
	$count = count($fcat_posts);
	$padd_image_def = get_template_directory_uri() . '/styles/images/default-thumbnail.png';
	$flag = 1;
?>
<div id="tab-<?php echo $cat_id; ?>" class="box box-featured-category box-featured-category-<?php echo $cat_id; ?>">
	<h3 class="page-header"><?php echo sprintf(__('%s', PADD_THEME_SLUG), $category->name); ?></h3>
	<?php if ($count > 0) : ?>
	<?php foreach ($fcat_posts as $post) : ?>
		<div class="item item-<?php echo $flag; ?>">
			<div class="image">
				<a href="<?php echo get_permalink($post->ID); ?>" title="<?php printf(__('Permanent Link to %s', PADD_THEME_SLUG), the_title_attribute('echo=0')); ?>">
				<?php
					$exclude[] = get_the_ID();
					if (has_post_thumbnail()) {
						the_post_thumbnail(Padd_Setup::get_image_name('archive'), array('title' => the_title_attribute('echo=0')));
					} else {
						echo '<img class="thumbnail" src="' . $padd_image_def . '" />';
					}
				?>
				</a>
			</div>
			<div class="title">
				<h4><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<p class="date"><?php the_time(__('F j, Y', PADD_THEME_SLUG)); ?></p>
			</div>
			<div class="clear"></div>
		</div>
	<?php $flag++; ?>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
<?php
	$post = $tmp_post;
}

function padd_get_excerpt_by_id($post_or_id, $excerpt_length = 20, $excerpt_more = '...') {
	if (is_object($post_or_id)) {
		$postObj = $post_or_id;
	} else {
		$postObj = get_post($post_or_id);
	}
	$raw_excerpt = $text = $postObj->post_excerpt;
	if ('' == $text) {
		$text = $postObj->post_content;

		$text = strip_shortcodes($text);

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$text = padd_trim_text($text,$excerpt_length,$excerpt_more);
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

function padd_trim_text($text, $length, $after_text = '...') {
	$words = preg_split("/[\n\r\t ]+/", $text, $length + 1, PREG_SPLIT_NO_EMPTY);
	if (count($words) > $length) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $after_text;
	} else {
		$text = implode(' ', $words);
	}
	return $text;
}

/**
 * Renders the excerpt of the page.
 */
function padd_theme_pagebox_special($pid,$class,$col) {
?>
<div class="widget widget_special widget_special_<?php echo $class; ?>">
	<?php
		wp_reset_query();
		add_filter('excerpt_length','padd_theme_hook_excerpt_pages_length');
		query_posts('page_id=' . $pid);
		the_post();
		$padd_image_def = get_template_directory_uri() . '/styles/images/thumbnail-column-' . $col . '.png';
		$padd_image_deg = get_template_directory() . '/styles/images/thumbnail-column-' . $col . '.png';
		$style = '';
		if (has_post_thumbnail()) {
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id);
			$style = 'style="background-image: url(\'' . $image_url[1] . '\'); padding-left: ' . ($image[0] + 10) . 'px; "';
		} else {
			$sizes = getimagesize($padd_image_deg);
			$style = 'style="background-image: url(\'' . $padd_image_def . '\'); padding-left: ' . ($sizes[0] + 10) . 'px; "';
		}
	?>
	<h3 class="title" <?php echo $style; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p><?php echo wp_trim_excerpt(''); ?></p>
	<?php
		remove_filter('excerpt_length','padd_theme_hook_excerpt_pages_length');
		wp_reset_query();
	?>
</div>
<?php
}

/**
 * Renders the featured posts in home page.
 */
function padd_theme_featured_projects() {
	$featured = Padd_Option::get('featured_cat_id', 1);
	$count = Padd_Option::get('featured_cat_limit', 8);
	query_posts('showposts=' . $count . '&cat=' . $featured);
?>
<?php if (!have_posts()) : ?>
<p><?php echo __('There are no projects.', PADD_THEME_SLUG); ?></p></div>
<?php else : ?>
	<?php
		$thumbnail_type = Padd_Setup::get_image_name('featured');
		$padd_image_def = get_template_directory_uri() . '/styles/images/default-featured.png';
		$s = 1;
	?>
	<div id="featured-list" class="clear-fix">
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<div id="entry-<?php the_ID(); ?>" class="post post-<?php echo $s; ?>">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail($thumbnail_type);
					} else {
						echo '<img class="image-thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
					}
				?>
			</a>
		</div>
		<?php
			if ($s == 4) {
				$s = 1;
			} else {
				$s++;
			}
		?>
	<?php endwhile; ?>
		<div class="clear"></div>
	</div>
<?php endif;

wp_reset_query();
}

/**
 * Set the body classes by browser.
 *
 * @global type $is_lynx
 * @global type $is_gecko
 * @global type $is_IE
 * @global type $is_opera
 * @global type $is_NS4
 * @global type $is_safari
 * @global type $is_chrome
 * @global type $is_iphone
 * @param type $classes
 * @return string
 */
function padd_theme_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if ($is_lynx) {
		$classes[] = 'lynx';
	} else if ($is_gecko) {
		$classes[] = 'gecko';
	} else if ($is_opera) {
		$classes[] = 'opera';
     } else if ($is_NS4) {
		$classes[] = 'ns4';
	} else if ($is_safari) {
		$classes[] = 'safari';
	} else if ($is_chrome) {
		$classes[] = 'chrome';
	} else if ($is_IE) {
		$classes[] = 'ie';
	} else {
		$classes[] = 'unknown';
	}

	if ($is_iphone) {
		$classes[] = 'iphone';
	}

	return $classes;
}

/**
 * Additional body class for blog elements.
 *
 * @param string $classes
 * @return string
 */
function padd_theme_blog_element_class($classes) {

	if (is_singular() || is_404()) {
		$classes[] = 'singular';
	}

	if (is_archive() || is_search()) {
		$classes[] = 'grouped';
	}

	return $classes;

}

function padd_theme_image_sideload($url) {
	$tmp = download_url($url);
	$file_array = array();
	$matches = array();

	preg_match('/[^\?]+\.(jpg|JPG|jpe|JPE|jpeg|JPEG|gif|GIF|png|PNG)/', $url, $matches);
	$file_array['name'] = basename($matches[0]);
	$file_array['tmp_name'] = $tmp;

	// do the validation and storage stuff
	$result = wp_handle_sideload($file_array, array('test_form' => false));

	return $result;
}

function padd_theme_feedburner_count($username) {
	$data = Padd_Option::get('data_feedburner','');
	$data = unserialize($data);
	$next = Padd_Option::get('data_feedburner_next','0000-00-00 00:00:00');
	$curr = date('Y-m-d H:i:s');

	if (empty($data) || $curr > $next) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=' . $username);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$d = curl_exec($ch);
		if ($d) {
			$next = date('Y-m-d H:i:s', time() + 900);
			Padd_Option::set('data_feedburner', serialize($d));
			Padd_Option::set('data_feedburner_next', $next);
			Padd_Option::update();
			$data = $d;
		}
		curl_close($ch);
	}

	$status  = strpos($data, '<rsp stat="ok">');
	if (is_int($status)) {
		$matches = array();
		preg_match('/circulation="(.*)"/isU', $data, $matches);
		return $matches[1];
	} else {
		return 0;
	}
}

/*
Plugin Name: Nice Search
Version: 0.3
Plugin URI: http://txfx.net/wordpress-plugins/nice-search/
Description: Redirects ?s=query searches to /search/query, and converts %20 to +
Author: Mark Jaquith
Author URI: http://coveredwebservices.com/
*/
if (!function_exists('cws_nice_search_redirect')) :
	function cws_nice_search_redirect() {
		if (is_search() && strpos($_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false) {
			wp_redirect(home_url('/search/' . str_replace(array(' ', '%20'),  array('+', '+'), get_query_var('s'))));
			exit();
		}
	}
	add_action('template_redirect', 'cws_nice_search_redirect');
endif;