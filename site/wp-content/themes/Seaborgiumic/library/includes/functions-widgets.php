<?php

/**
 * Renders the list of social networking websites.
 */
function padd_theme_widget_socialnet() {
	global $_PADD_SOCIALNET;
?>
	<ul class="socialnet">
	<?php foreach ($_PADD_SOCIALNET as $k => $v) : ?>
		<?php
			$url = '';
			$v->username = Padd_Option::get('sn_username_' . $k);
			if ('facebook' == $k) {
				$fburl = Padd_Option::get('sn_username_facebook');
				if (!padd_theme_check_facebook_url($fburl) && !empty($fburl)) {
					$v->username = $fburl;
					$url = (string) $v;
				} else if (!empty($fburl)) {
					$url = $fburl;
				}
			} else if ('rss' == $k) {
				if (empty($v->username)) {
					$url = get_bloginfo('rss2_url');
				} else {
					$url = (string) $v;
				}
			} else {
				$url = (string) $v;
			}
		?>
		<?php if (!empty($v->username) || $k == 'rss') : ?>
		<li class="<?php echo $k; ?>">
			<a href="<?php echo $url; ?>" class="icon-<?php echo $k; ?>" title="<?php echo $v->network; ?>"><?php echo $v->short_desc; ?></a>
		</li>
		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
<?php
}

/**
 * Renders the content of the page.
 */
function padd_theme_widget_page($pid) {
	wp_reset_query();
	query_posts('page_id=' . $pid);
	the_post();
	the_content();
}

/**
 * Renders the twitter widget.
 */
function padd_theme_widget_twitter() {
	global $_PADD_SOCIALNET;
	$_PADD_SOCIALNET['twitter']->username = (Padd_Option::get('sn_username_twitter'));
	$padd_sb_twitter = Padd_Option::get('sn_username_twitter');
	$twitter = new Padd_Twitter($padd_sb_twitter, 2, true);
	$twitter->show_tweets();
	if (false) :
	?>
	<p class="follow"><a href="'<?php echo $_PADD_SOCIALNET['twitter']; ?>'"><?php echo __('Follow us on Twitter', PADD_THEME_SLUG); ?></a></p>
	<?php
	endif;
}

/**
 * Renders the banner advertisement
 */
function padd_theme_widget_banner() {
	$ad = Padd_Option::get('ads_728090_1');
	echo stripslashes($ad);
}

function padd_theme_widget_ads_area() {
	echo '<div class="ads-area">';
	for ($i=1;$i<=4;$i++) {
		$ad = Padd_Option::get('ads_125125_' . $i,'');
		echo '<div class="ads-wrap ads-',  $i, '"><div class="ads">', stripslashes($ad), '</div></div>';
	}
	echo '<div class="clear"></div>';
	echo '</div>';
}

/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors() {
	echo '<div class="ads-area clear-fix">';
	$ad = Padd_Option::get('ads_300250_1');
	echo stripslashes($ad);
	echo '</div>';
}

/**
 * Renders the Facebook Like Box.
 *
 * @paran string $id Facebook numerical ID
 * @param int $w Width of the box
 * @param int $h Height of the box
 * @param int $conn Number of connections
 * @param int $stream News feed streaming. 1 to enable, 0 to disable. The default value is 0.
 * @param int $header Like Box header. 1 to show, 0 to hide. The default value is 0.
 */
function padd_theme_widget_facebook_likebox($w=300,$h=260,$conn=10,$stream=0,$header=0) {
	global $_PADD_SOCIALNET;
	$fburl = Padd_Option::get('sn_username_facebook');
	if (!padd_theme_check_facebook_url($fburl)) {
		$_PADD_SOCIALNET['facebook']->username = $fburl;
		$fburl = (string) $_PADD_SOCIALNET['facebook'];
	}
?>
<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($fburl); ?>&amp;width=<?php echo $w; ?>&amp;connections=<?php echo $conn; ?>&amp;stream=<?php echo $stream == 1 ? 'true' : 'false'; ?>&amp;header=<?php echo $header == 1 ? 'true' : 'false'; ?>&amp;height=<?php echo $h; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $w; ?>px; height:<?php echo $h; ?>px;"></iframe>
<?php
}


/**
 * Render the popular posts.
 */
function padd_theme_widget_wpp() {
	if (function_exists('get_mostpopular')) :
		get_mostpopular('pages=0&stats_comments=1&range=all&limit=5&thumbnail_selection=usergenerated&thumbnail_width=71&thumbnail_height=71&do_pattern=1&pattern_form={image}{title}{stats}');
	elseif (function_exists('wpp_get_mostpopular')) :
		wpp_get_mostpopular('pages=0&stats_comments=1&range=all&limit=5&thumbnail_selection=usergenerated&thumbnail_width=71&thumbnail_height=71&do_pattern=1&pattern_form={image}{title}{stats}');
	else :
	?>
		<p>Please install the <a href="http://wordpress.org/extend/plugins/wordpress-popular-posts/">Wordpress Popular Posts plugin</a>.</p>
	<?php
	endif;
}

function padd_recent_comments($limit=3, $w=57) {
	$limit = !empty($limit) ? $limit : 3;
	$comments = get_comments('status=approve&number=' . $limit);
	if ($comments) {
		echo '<ul class="recent-comments">';
		foreach ($comments as $comment) :
			echo '<li>';
			echo get_avatar($comment, 70);
			echo '<div class="comm">';
			echo '<p class="meta"><a title="', esc_attr(get_the_title($comment->comment_post_ID)),'"href="', get_permalink($comment->comment_post_ID) ,'">', sprintf(__('%1$s on %2$s', PADD_THEME_SLUG), get_comment_author($comment->comment_ID), get_the_title($comment->comment_post_ID)), '</a></p>';
			echo '<p class="content">';
			comment_excerpt($comment->comment_ID);
			echo '</p>';
			echo '</div>';
			echo '</li>';
		endforeach;
		echo '</ul>';
	} else {
		echo '<p>', __('There are no comments in all entries.', THEMECREDIBLE_THEME_SLUG), '</p>';
	}
}


/**
 * Renders the recent posts, optionally with dates.
 *
 * @global WP_DB $wpdb
 * @global string $wp_locale
 * @param array|string $args
 * @return string
 */
function padd_theme_widget_recent_posts($args = '') {
	global $wpdb, $wp_locale;

	$defaults = array(
		'limit' => '3',
		'format' => 'html', 'before' => '',
		'after' => '', 'show_post_count' => false,
		'echo' => 1, 'show_date' => true, 'date_format' => 'F j, Y'
	);

	$r = wp_parse_args($args,$defaults);
	extract($r, EXTR_SKIP);

	if ('' == $type) {
		$type = 'monthly';
	}

	if ('' != $limit) {
		$limit = absint($limit);
		$limit = ' LIMIT ' . $limit;
	}

	$where = apply_filters('getarchives_where',"WHERE post_type = 'post' AND post_status = 'publish'",$r);
	$join = apply_filters('getarchives_join',"", $r);

	$output = '';

	$orderby = "post_date DESC ";
	$query = "SELECT * FROM $wpdb->posts $join $where ORDER BY $orderby $limit";
	$key = md5($query);
	$cache = wp_cache_get('padd_recent_posts','general');
	if (!isset($cache[ $key ])) {
		$arcresults = $wpdb->get_results($query);
		$cache[$key] = $arcresults;
		wp_cache_set('padd_recent_posts',$cache,'general');
	} else {
		$arcresults = $cache[$key];
	}
	if ($arcresults) {
		add_filter('excerpt_length', 'padd_theme_hook_excerpt_recent_posts_length');
		foreach ((array) $arcresults as $arcresult) {
			if ($arcresult->post_date != '0000-00-00 00:00:00' ) {
				$url = get_permalink($arcresult);
				$arc_title = $arcresult->post_title;
				if ($arc_title) {
					$text = strip_tags(apply_filters('the_title', $arc_title));
				} else {
					$text = $arcresult->ID;
				}
				$img = trim(get_the_post_thumbnail($arcresult->ID, PADD_THEME_SLUG . '-thumbnail-recent-posts'));
				$def = get_template_directory_uri() . '/images/thumbnail-recent-posts.png';
				if (empty($img)) {
					$img = '<img src="' . $def . '" title="Thumbnail" alt="Thumbnail" />';
				}
				$output .= '<li>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Permalink to ' . $text . '" class="thumbnail">' . $img . '</a>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Permalink to ' . $text . '" class="post-title">' . $text . '</a> ';
				$output .= '<span class="content">';
				$output .= get_the_excerpt();
				$output .= '</span>';
				$output .= '<span class="read-more"><a href="' . get_permalink($arcresult->ID) . '" title="Permalink to ' . $text . '" class="read-more">' . __('Read More', PADD_THEME_SLUG) . '</a></span>';
				$output .= '<div class="clear"></div>';
				$output .= '</li>';
			}
		}
		remove_filter('excerpt_length', 'padd_theme_hook_excerpt_recent_posts_length');
	}

	if ($echo) {
		echo $output;
	} else {
		return $output;
	}
}

function padd_theme_widget_search_feeds() {
	global $_PADD_SOCIALNET;
	get_search_form();

	$twitter    = Padd_Option::get('sn_username_twitter');
	$feedburner = Padd_Option::get('sn_username_feedburner');

	if (!empty($twitter) || !empty($feedburner))
	?>
	<ul class="feedcount">
		<?php
			if (!empty($twitter)) :
				$twitter = new Padd_Twitter($twitter, 5, true);
		?>
		<li class="twitter">
			<?php
				$z = '<span class="count">0</span> <span class="unit">' . __('Followers', PADD_THEME_SLUG) . '</span>';
				$s = '<span class="count">1</span> <span class="unit">' . __('Follower', PADD_THEME_SLUG) . '</span>';
				$p = '<span class="count">%s</span> <span class="unit">' . __('Followers', PADD_THEME_SLUG) . '</span>';
				echo $twitter->get_followers_count_words($z, $s, $p);
			?>
		</li>
		<?php endif; ?>
		<?php
			if (!empty($feedburner)) :
				$count = padd_theme_feedburner_count($feedburner)
		?>
		<li class="feedburner">
			<span class="count"><?php echo $count; ?></span> <span class="unit"><?php _e('Subscribers', PADD_THEME_SLUG)  ?></span>
		</li>
		<?php endif; ?>
	</ul>
	<?php
}

