<?php

$_PADD_THEME_OPTIONS = array();

function padd_theme_admin_init_options() {
	global $_PADD_THEME_OPTIONS, $_PADD_SOCIALNET, $_PADD_SOCIALNET_B;

	/* General Start */
	$panel = new Padd_AdminPanel(
		'general',
		__('General Options', PADD_THEME_SLUG),
		__('General', PADD_THEME_SLUG),
		sprintf(__('General options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	$panel->add_field(new Padd_Input_Textfield(
		'favicon_url',
		__('Favicon URL', PADD_THEME_SLUG),
		'',
		'',
		__('The URL where your favicon is located. Must start with <code>http://</code> or <code>https://</code>.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Dropdown(
		'sitename_mode',
		__('Site Name Mode', PADD_THEME_SLUG),
		'',
		'',
		__('What do you want to do in the site name? If you have a personal or company logo, choose the <strong>Image</strong> mode, otherwise, go for the </strong>Plain Text</strong> mode.', PADD_THEME_SLUG),
		array(
			'0' => __('Plain Text', PADD_THEME_SLUG),
			'1' => __('Image', PADD_THEME_SLUG)
		)
	));
	$panel->add_field(new Padd_Input_Textfield(
		'sitename_logo_url',
		__('Logo URL', PADD_THEME_SLUG),
		'',
		'',
		__('The URL where your logo is located. Must start with <code>http://</code> or <code>https://</code>. The height of the image should be 86 pixels.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Dropdown(
		'featured_categories',
		__('Featured Categories', PADD_THEME_SLUG),
		'',
		'',
		__('Pick categories if you want to show this on the home page.', PADD_THEME_SLUG),
		'wp_categories', true
	));
	$panel->add_field(new Padd_Input_Checkbox(
		'social_bookmarks_enable',
		__('Enable Social Bookmarks', PADD_THEME_SLUG),
		'',
		'',
		__('Tick this box to enable the social bookmarks in posts.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Checkbox(
		'show_trackbacks',
		__('Show Trackbacks', PADD_THEME_SLUG),
		'',
		'',
		__('Tick this box to render the trackbacks.', PADD_THEME_SLUG)
	));

	$_PADD_THEME_OPTIONS['general'] = $panel;
	/* General End */


	/* Tracker Start */
	$panel = new Padd_AdminPanel(
		   'tracker',
		   __('Page Tracker Options', PADD_THEME_SLUG),
		   __('Page Tracker', PADD_THEME_SLUG),
		   sprintf(__('Page tracker options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	$panel->add_field(new Padd_Input_Textarea(
		'tracker_head',
		__('Tracker Code 1', PADD_THEME_SLUG),
		'',
		'',
		__('A tracker code to be placed inside the <code>&lt;head&gt;</code> tag.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Textarea(
		'tracker_body',
		__('Tracker Code 2', PADD_THEME_SLUG),
		'',
		'',
		__('A tracker code to be placed just before the closing <code>&lt;body&gt;</code> tag.', PADD_THEME_SLUG)
	));

	$_PADD_THEME_OPTIONS['tracker'] = $panel;
	/* Tracker End */


	/* Slideshow Start */
	$panel = new Padd_AdminPanel(
		   'slideshow',
		   __('Slideshow Options', PADD_THEME_SLUG),
		   __('Slideshow', PADD_THEME_SLUG),
		   sprintf(__('Slideshow options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	$panel->add_field(new Padd_Input_Checkbox(
		'slideshow_enable',
		__('Enable Slideshow', PADD_THEME_SLUG),
		'',
		'',
		__('Tick this box to enable the slideshow.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Dropdown(
		'slideshow_cat_id',
		__('Designated Slideshow Category', PADD_THEME_SLUG),
		'',
		'',
		__('The category you want to assign for slideshow. The content is located just below the main menu.', PADD_THEME_SLUG),
		'wp_categories'
	));
	$panel->add_field(new Padd_Input_Dropdown(
		'slideshow_cat_limit',
		__('Number of Slides', PADD_THEME_SLUG),
		'',
		'',
		__('The number of slides in a slideshow at a time. The value should be at least 2 or more slides.', PADD_THEME_SLUG),
		array(
			'2' => __('2', PADD_THEME_SLUG),
			'3' => __('3', PADD_THEME_SLUG),
			'4' => __('4', PADD_THEME_SLUG),
			'5' => __('5', PADD_THEME_SLUG),
			'6' => __('6', PADD_THEME_SLUG),
			'7' => __('7', PADD_THEME_SLUG),
			'8' => __('8', PADD_THEME_SLUG),
		     '9' => __('9', PADD_THEME_SLUG),
		)
	));
	$panel->add_field(new Padd_Input_Dropdown(
		'slideshow_effect',
		__('Slideshow Effect', PADD_THEME_SLUG),
		'',
		'',
		__('Effect to be shown during the transition of slides.', PADD_THEME_SLUG),
		array(
			'none'       => __('None', PADD_THEME_SLUG),
			'fade'       => __('Fade', PADD_THEME_SLUG),
			'growX'      => __('Grow', PADD_THEME_SLUG),
			'scrollHorz' => __('Horizontal Scroll', PADD_THEME_SLUG),
			'scrollVert' => __('Vertical Scroll', PADD_THEME_SLUG),
			'cover'      => __('Cover', PADD_THEME_SLUG),
			'uncover'    => __('Uncover', PADD_THEME_SLUG),
			'wipe'       => __('Wipe', PADD_THEME_SLUG)
		)
	));
	$panel->add_field(new Padd_Input_Textfield(
		'slideshow_slide_wait',
		__('Slide Duration', PADD_THEME_SLUG),
		'',
		'',
		__('Number of seconds to wait for the slide show to transition.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Textfield(
		'slideshow_slide_speed',
		__('Slide Scroll Speed', PADD_THEME_SLUG),
		'',
		'',
		__('Number of milliseconds for the transition of the slide show.', PADD_THEME_SLUG)
	));

	$_PADD_THEME_OPTIONS['slideshow'] = $panel;
	/* Slideshow End */


	/* Social Networking Start */
	$panel = new Padd_AdminPanel(
		   'socialnet',
		   __('Social Networking Options', PADD_THEME_SLUG),
		   __('Social Networking', PADD_THEME_SLUG),
		   sprintf(__('Social networking options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	foreach ($_PADD_SOCIALNET as $k => $socialnet) {
		$panel->add_field(new Padd_Input_Textfield(
			'sn_username_' .  $k,
			$socialnet->input_title,
			'',
			'',
			$socialnet->input_desc
		));
	}

	$_PADD_THEME_OPTIONS['socialnet'] = $panel;
	/* Social Networking End */


	/* Page Navigation Start */
	$panel = new Padd_AdminPanel(
		   'pagenav',
		   __('Page Navigation Options', PADD_THEME_SLUG),
		   __('Page Navigation', PADD_THEME_SLUG),
		   sprintf(__('Page navigation (as some call it pagination) options for %s theme to work.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	$panel->add_field(new Padd_Input_Textfield(
		'pgn_pages_to_show',
		__('Number of Pages to Show', PADD_THEME_SLUG),
		'',
		'',
		__('The number of pages to show in the page navigation at a time.', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Textfield(
		'pgn_larger_page_numbers',
		__('Number of Large Page Numbers to Show', PADD_THEME_SLUG),
		'',
		'',
		__('Larger page numbers are in additional to the default page numbers. It is useful for authors who is paginating through many posts.<br />For example, page navigation will display: Pages 1, 2, 3, 4, 5, 10, 20, 30, 40, 50.<br />Enter 0 to disable. ', PADD_THEME_SLUG)
	));
	$panel->add_field(new Padd_Input_Textfield(
		'pgn_larger_page_numbers_multiple',
		__('Show Larger Page Numbers in Multiples of', PADD_THEME_SLUG),
		'',
		'',
		__('If mutiple is in 5, it will show: 5, 10, 15, 20, 25. If mutiple is in 10, it will show: 10, 20, 30, 40, 50.', PADD_THEME_SLUG)
	));

	$_PADD_THEME_OPTIONS['pagenav'] = $panel;
	/* Page Navigation End */


	/* Advertisment Start  */
	$panel = new Padd_AdminPanel(
		   'ads',
		   __('Advertisements', PADD_THEME_SLUG),
		   __('Advertisements', PADD_THEME_SLUG),
		   sprintf(__('Advertisement placments for %s theme.', PADD_THEME_SLUG), PADD_THEME_NAME)
	);

	for ($i=1;$i<=4;$i++) {
		$panel->add_field(new Padd_Input_Textarea(
			'ads_125125_' . $i,
			sprintf(__('Sidebar Ad Space %s (125 &times; 125)', PADD_THEME_SLUG), $i),
			'',
			'',
			__('Link/Image advertisement code at the sidebar section. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG)
		));
	}

	/*$panel->add_field(new Padd_Input_Textarea(
		'ads_300250_1',
		__('Sidebar Ad Space (300 &times; 250)', PADD_THEME_SLUG),
		'',
		'',
		__('Link/Image advertisement code at the sidebar section. It can be an HTML code, Google Adsense code or something else.', PADD_THEME_SLUG)
	));*/

	$_PADD_THEME_OPTIONS['ads'] = $panel;
	/* Advertisement End */

}

/**
 * A function that will save the options.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_admin_add() {
	global $_PADD_THEME_OPTIONS;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) {
		$action = isset($_POST['action']) ? $_POST['action'] : 'general';
		if ($action == 'reset') {
			padd_theme_options_reset();
			header("Location: themes.php?page=options-functions.php&reset=true#padd-admin-tab-general");
			break;
		} else {
			$fields = $_PADD_THEME_OPTIONS[$_POST['action']]->get_field_names();
			foreach ($fields as $field) {
				if (isset($_REQUEST[$field])) {
					if ('sitename_logo_url' == $field) {
						$result = padd_theme_image_sideload($_REQUEST[$field]);;
						Padd_Option::set('sitename_logo_url', $_REQUEST[$field]);
						Padd_Option::set('sitename_logo_dir', $result['file']);
					} else {
						Padd_Option::set($field, $_REQUEST[$field]);
					}
				} else {
					Padd_Option::set($field,'');
				}
			}

			Padd_Option::update();
			header("Location: themes.php?page=options-functions.php&saved=true#padd-admin-tab-" . $_POST['action']);
			break;
		}

	}

	add_theme_page(sprintf(__('%s Options', PADD_THEME_SLUG), PADD_THEME_NAME), sprintf(__('%s Options', PADD_THEME_SLUG), PADD_THEME_NAME), 'edit_theme_options', basename(__FILE__), 'padd_theme_admin');
}

/**
 * Enqueue scripts and styles.
 */
function padd_theme_admin_init_enqueue() {
	if (is_admin() && isset($_GET['page']) && $_GET['page'] == 'options-functions.php') {
		wp_enqueue_style('theme-spec', get_template_directory_uri() . '/library/admin/styles/style.css');

		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('theme-spec',  get_template_directory_uri() . '/library/admin/scripts/js.php?c=1');
	}
}

/**
 * Renders the user interface for custom theme settings.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_admin() {
	global $_PADD_THEME_OPTIONS;

	if (isset($_REQUEST['saved'])) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('%s options saved.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';
	if (isset($_REQUEST['reset'])) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('%s options reset.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';

	require PADD_LIBR_PATH . 'admin' . PADD_DS . 'options-ui.php';
}

add_action('init'      , 'padd_theme_admin_init_options');
add_action('init'      , 'padd_theme_admin_init_enqueue');
add_action('admin_menu', 'padd_theme_admin_add');
