<?php

/**
 * Exclude the featured category name from the list.
 *
 * @param type $thelist
 * @param type $separator
 * @return type
 */
function padd_theme_category_filter_slideshow($thelist, $separator=', ') {
	$featured = Padd_Option::get('slideshow_cat_id');
	$exclude = get_cat_name($featured);
	$cats = explode($separator, $thelist);
	$newlist = array();
	foreach ($cats as $cat) {
		$catname = trim(strip_tags($cat));
		if ($catname != $exclude) {
			$newlist[] = $cat;
		}
	}
	return implode($separator, $newlist);
}

function padd_theme_hook_excerpt_slideshow_length($length) {
	return 20;
}

function padd_theme_hook_excerpt_slideshow_more($more) {
	return '&hellip;';
}

function padd_theme_hook_excerpt_featured_length($length) {
	return 15;
}

function padd_theme_hook_excerpt_featured_more($more) {
	return '&hellip;';
}

function padd_theme_hook_excerpt_loop($text) {
	return $text;
}

/**
 * Sets the excerpt length in the loop.
 */
function padd_theme_hook_excerpt_loop_length($length) {
	return 55;
}

/**
 * Renders the "More" string of excerpt in the loop.
 */
function padd_theme_hook_excerpt_loop_more($more) {
	global $post;
	return '&hellip; <a title="' . sprintf(__('Permanent Link to %s', PADD_THEME_SLUG), $post->title) . '" href="' . get_permalink() .'">' . __('Read More &raquo;', PADD_THEME_SLUG) . '</a>';
}

/**
 * Customize excerpt for Social Bookmarking
 */
function padd_theme_hook_excerpt_bookmark($text) {
	return strip_tags($text);
}

/**
 * Removes the "More" string in excerpt for Social Bookmarking.
 */
function padd_theme_hook_excerpt_bookmark_more() {
	return '...';
}

/**
 * Sets the excerpt length for pages.
 */
function padd_theme_hook_excerpt_pages_length($length) {
	return 40;
}

/**
 * Sets the excerpt length for pages.
 */
function padd_theme_hook_excerpt_pages_more() {
	return '...';
}

function padd_theme_hook_excerpt_recent_posts_length() {
	return 15;
}

/**
 * Count comments.
 */
function padd_theme_hook_count_comments($count) {
	if (!is_admin()) {
		global $id;
		$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}

