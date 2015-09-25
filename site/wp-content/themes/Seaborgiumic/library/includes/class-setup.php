<?php

class Padd_Setup {

	private $thumbnail_support;

	private $menus;

	private $image_sizes;

	private static $instance;

	private function __construct() {
		$this->thumbnail_support = array();
		$this->menus = array();
		$this->image_sizes = array();
	}

	public static function instantiate() {
		if (!isset(self::$instance)) {
			self::$instance = new Padd_Setup();
		}
		return self::$instance;
	}

	public static function add_post_thumbail_support($post_type) {
		self::$instance->thumbnail_support[] = $post_type;
	}

	public static function add_nav_menu($slug, $name) {
		self::$instance->menus[$slug] = $name;
	}

	public static function add_image_size($name, $width, $height, $crop=true) {
		self::$instance->image_sizes[$name] = array(
		    'width'  => $width,
		    'height' => $height,
		    'crop'   => $crop
		);
	}

	public static function get_image_name($name) {
		return PADD_THEME_SLUG . '-' . $name;
	}

	public static function get_image_size($name, $param) {
		return self::$instance->image_sizes[$name][$param];
	}

	public static function perform() {

		if (count(self::$instance->thumbnail_support) > 0) {
			add_theme_support('post-thumbnails', self::$instance->thumbnail_support);
		}

		load_theme_textdomain(PADD_THEME_SLUG, PADD_ROOT_PATH . PADD_DS . 'languages');

		if (count(self::$instance->menus) > 0) {
			register_nav_menus(self::$instance->menus);
		}

		if (count(self::$instance->image_sizes) > 0) {
			foreach (self::$instance->image_sizes as $k => $v) {
				add_image_size(PADD_THEME_SLUG . '-' . $k, $v['width'], $v['height'], $v['crop']);
			}
		}

	}

}