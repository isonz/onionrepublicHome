<?php


class Padd_Theme_Widget_SocialNetwork extends WP_Widget {

	function Padd_Theme_Widget_SocialNetwork() {
		$widget_ops = array(
						'classname' => 'widget_socialnet',
						'description' => PADD_THEME_NAME . ' Theme widget for social networking profile page. To set the username, go to the Social Networking Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_socialnet', PADD_THEME_NAME . ' Social Network Links', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_socialnet';
	}

	function widget($args,$instance) {
		extract($args);
		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		$position = isset($instance['position']) ? $instance['position'] : 'A';
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		}

		padd_theme_widget_socialnet($position);
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}
}

class Padd_Theme_Widget_FBLikeBox extends WP_Widget {

	function __construct() {
		$widget_ops = array(
						'classname' => 'widget_fb_likebox',
						'description' => PADD_THEME_NAME . ' Theme widget for social networking profile page. To set the username, go to the Social Networking Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		parent::__construct(PADD_THEME_SLUG . '_fb_like_box', PADD_THEME_NAME . ' Facebook Like Box', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_fb_like_box';
	}

	function widget($args,$instance) {
		extract($args);
		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Facebook Like Box', PADD_THEME_SLUG) . $after_title . "\n";
		}
		padd_theme_widget_facebook_likebox();
		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}
}

class Padd_Theme_Widget_Ads extends WP_Widget {

	function __construct() {
		$widget_ops = array(
						'classname' => 'widget_ads',
						'description' => PADD_THEME_NAME . ' Theme widget for advertisment. To manage ads, go to the Custom Ads Tab under ' . PADD_THEME_NAME . ' Options.'
					);
		parent::__construct(PADD_THEME_SLUG . '_ads', PADD_THEME_NAME . ' Custom Ads', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_ads';
	}

	function widget($args, $instance) {
		extract($args);
		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		echo $before_widget . "\n";
		padd_theme_widget_ads_area();
		echo $after_widget . "\n";
	}

}

class Padd_Theme_Widget_Tweets extends WP_Widget {

	function __construct() {
		$widget_ops = array(
						'classname' => 'widget_tweets',
						'description' => PADD_THEME_NAME . ' Theme widget for recent tweets.'
					);
		parent::__construct(PADD_THEME_SLUG . '_tweet', PADD_THEME_NAME . ' Tweets', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_tweets';
	}

	function widget($args, $instance) {
		extract($args);
		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Recent Tweets', PADD_THEME_SLUG) . $after_title . "\n";
		}

		echo '<div class="twitter">';
		padd_theme_widget_twitter();
		echo '</div>';

		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}
}

class Padd_Theme_Widget_Recent_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_posts',
			'description' => PADD_THEME_NAME . ' Theme widget for recent projects. Unlike the standard WordPress Recent Posts Widget, this one comes with an excerpt.'
		);
		parent::__construct(PADD_THEME_SLUG . '_recent_posts', PADD_THEME_NAME . ' Recent Posts', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_recent_posts';

		add_action('save_post', array(&$this, 'flush_widget_cache'));
		add_action('deleted_post', array(&$this, 'flush_widget_cache'));
		add_action('switch_theme', array(&$this, 'flush_widget_cache'));
	}

	function widget($args, $instance) {
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
		if (!$number = absint($instance['number'])) {
 			$number = 5;
		}

		$r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ($title) echo $before_title . $title . $after_title; ?>
		<?php $padd_image_def = get_template_directory_uri() . '/styles/images/default-thumbnail.png'; ?>
		<ul class="recent-posts">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li>
			<a class="thumbnail" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
				<?php
					if (has_post_thumbnail()) {
						the_post_thumbnail(Padd_Setup::get_image_name('sidebar'));
					} else {
						echo '<img class="image-thumbnail" alt="Default thumbnail." src="' . $padd_image_def . '" />';
					}
				?>
			</a>
			<h4><a class="title" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if (get_the_title()) the_title(); else the_ID(); ?></a></h4>
			<p class="meta"><?php echo the_time('F j, Y'); ?> - <?php comments_number(__('0 comments', PADD_THEME_SLUG), __('1 comment', PADD_THEME_SLUG), __('% comments', PADD_THEME_SLUG)); ?></p>
			<span class="clear"></span>
		</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if (isset($alloptions['widget_recent_entries']))
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 3;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}

class Padd_Theme_Widget_Page extends WP_Widget {

	function __construct() {
		$widget_ops = array(
						'classname' => 'widget_page',
						'description' => PADD_THEME_NAME . ' Theme widget for displaying page.'
					);
		parent::__construct(PADD_THEME_SLUG . '_page', PADD_THEME_NAME . ' Page', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_page';
	}

	function widget($args, $instance) {
		extract($args);
		echo $before_widget . "\n";

		$page_id = Padd_Option::get('about_us_page_id', 1);
		echo $before_title . get_the_title($page_id) . $after_title . "\n";

		padd_theme_widget_page($page_id);
		echo $after_widget . "\n";
	}

}

class Padd_Theme_Widget_WPP extends WP_Widget {

	function __construct() {
		$widget_ops = array(
						'classname' => 'widget_wpp popular-posts',
						'description' => PADD_THEME_NAME . ' Theme widget for displaying Wordpress Popular Posts.'
					);
		parent::__construct(PADD_THEME_SLUG . '_wpp', PADD_THEME_NAME . ' WPP', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_wpp';
	}

	function widget($args, $instance) {
		extract($args);

		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Popular Posts', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_wpp();

		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: '); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
	<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}


}

class Padd_Theme_Widget_Recent_Comments extends WP_Widget {

	function Padd_Theme_Widget_Recent_Comments() {
		$widget_ops = array(
						'classname' => 'widget_recent_comments',
						'description' => __(sprintf('%s Theme widget for most recent comments, with excerpt.', PADD_THEME_NAME), PADD_THEME_SLUG)
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_recent_comments', PADD_THEME_NAME . ' Recent Comments', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_recent_comments';
	}

	function widget($args, $instance) {
		global $_PADD_WIDGET_JS;
		extract($args);

		$title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		$limit = isset($instance['limit']) ? esc_attr($instance['limit']) : '';

		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Recent Comments', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_recent_comments($limit);

		echo $after_widget . "\n";
	}

	function form($instance) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$limit = isset($instance['limit']) ? esc_attr($instance['most_limit']) : '';
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: '); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit: '); ?></label> <input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" size="3" /></p>
	<?php
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option($this->option_name, $settings);
	}
}



register_widget('Padd_Theme_Widget_SocialNetwork');
register_widget('Padd_Theme_Widget_FBLikeBox');
register_widget('Padd_Theme_Widget_Ads');
register_widget('Padd_Theme_Widget_Tweets');
register_widget('Padd_Theme_Widget_Recent_Posts');
register_widget('Padd_Theme_Widget_Page');
register_widget('Padd_Theme_Widget_WPP');
register_widget('Padd_Theme_Widget_Recent_Comments');