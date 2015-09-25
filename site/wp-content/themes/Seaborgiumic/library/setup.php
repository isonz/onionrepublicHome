<?php

Padd_Setup::instantiate();

Padd_Setup::add_post_thumbail_support('post');
Padd_Setup::add_nav_menu('primary', __('Main Menu'  , PADD_THEME_SLUG));
Padd_Setup::add_image_size('slideshow', 940, 360);
Padd_Setup::add_image_size('entry'    , 220, 140);
Padd_Setup::add_image_size('archive'  ,  80,  80);
Padd_Setup::add_image_size('sidebar'  ,  70,  70);

function padd_theme_init_enqueue() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/scripts/js.php?c=1', array('jquery'));
	wp_enqueue_script('share-facebook', 'http://static.ak.fbcdn.net/connect.php/js/FB.Share', NULL, NULL, true);
	wp_enqueue_script('share-twitter' , 'http://platform.twitter.com/widgets.js', NULL, NULL, true);
}

function padd_theme_init_widgets() {
	register_sidebar(array(
		'name' => __('Sidebar', PADD_THEME_SLUG),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="box widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 1', PADD_THEME_SLUG),
		'description' => __('Footer widget at the first column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title"',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 2', PADD_THEME_SLUG),
	    'description' => __('Footer widget at the second column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __('Footer 3', PADD_THEME_SLUG),
		'description' => __('Footer widget at the third column.', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}

function padd_theme_init_queue_js() {
	if (!is_admin()){
		if ( is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}
	}
}

add_action('after_setup_theme', array('Padd_Setup', 'perform'));
add_action('init', 'padd_theme_init_enqueue');
add_action('widgets_init', 'padd_theme_init_widgets');

add_action('wp_print_scripts', 'padd_theme_init_queue_js');

add_action('wp_head' , 'padd_theme_head_favicon');
add_action('wp_head' , 'padd_theme_head_tracker');

add_filter('body_class'         , 'padd_theme_blog_element_class');
add_filter('body_class'         , 'padd_theme_browser_body_class');
add_filter('excerpt_length'     , 'padd_theme_hook_excerpt_loop_length');
add_filter('excerpt_more'       , 'padd_theme_hook_excerpt_loop_more');
add_filter('get_comments_number', 'padd_theme_hook_count_comments',0);
