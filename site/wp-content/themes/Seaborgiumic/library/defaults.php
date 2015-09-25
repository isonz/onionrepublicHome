<?php

$_PADD_SOCIALNET = array(
    'twitter'    => new Padd_SocialNetwork(
		'Twitter',
		'http://www.twitter.com/%u%',
		__('Follow me on Twitter', PADD_THEME_SLUG),
		__('Twitter Username', PADD_THEME_SLUG),
		__('Your <a href="http://twitter.com">Twitter</a> user name. You may leave it blank if you don\'t have one but we recommend to <a href="http://twitter.com/signup">create an account</a>.', PADD_THEME_SLUG)
	),
    'facebook'   => new Padd_SocialNetwork(
		'Facebook' ,
		'http://www.facebook.com/%u%' ,
		__('Add me on Facebook', PADD_THEME_SLUG),
		__('Facebook Username or URL', PADD_THEME_SLUG),
		__('Your <a href="http://www.facebook.com">Facebook</a> username. Please note that user name <em>does not mean</em> your e-mail address. <a href="http://www.facebook.com/help.php?page=897">Read the Q&amp;A</a> for more info. Works on FB Pages only.', PADD_THEME_SLUG)
	),
    'rss'  => new Padd_SocialNetwork(
		'RSS',
		'%u%',
		__('RSS', PADD_THEME_SLUG),
		__('RSS URL', PADD_THEME_SLUG),
		__('Your RSS URL. Leave it blank if you want to use the default WordPress RSS URL.', PADD_THEME_SLUG)
	),
);

$_PADD_SOCIALBMK = array(
	'delicious' => new Padd_SocialBookmark('Delicious','http://delicious.com/post?url=%url%&amp;title=%title%&amp;notes=%excerpt%'),
	'digg' => new Padd_SocialBookmark('Digg','http://digg.com/submit?phase=2&amp;url=%url%&amp;title=%title%&amp;bodytext=%excerpt%'),
	'newsvine' => new Padd_SocialBookmark('Newsvine','http://www.newsvine.com/_tools/seed&amp;save?u=%url%&amp;h=%title%'),
	'rss' => new Padd_SocialBookmark('RSS',get_bloginfo('rss2_url')),
	'stumbleupon' => new Padd_SocialBookmark('StumbleUpon','http://www.stumbleupon.com/post?url=%url%&amp;title=%title%'),
	'technorati' => new Padd_SocialBookmark('Technorati','http://technorati.com/faves?add=%url%'),
);

Padd_Option::instantiate();

/**
 * Resets the default theme options. Use with caution.
 */
function padd_theme_options_reset() {
	global $_PADD_SOCIALNET;

	// Core
	Padd_Option::set('installed','1');

	// General
	Padd_Option::set('favicon_url'            , '');
	Padd_Option::set('sitename_mode'          , '1');
	Padd_Option::set('sitename_logo_url'      , get_template_directory_uri() . '/styles/images/site-title.png');
	Padd_Option::set('sitename_logo_dir'      , get_template_directory()     . '/styles/images/site-title.png');
	Padd_Option::set('social_bookmarks_enable', '1');
	Padd_Option::set('share_button_enable'    , '1');
	Padd_Option::set('show_trackbacks'        , '1');

	// Tracker
	Padd_Option::set('tracker_head', '');
	Padd_Option::set('tracker_body', '');

	// Slideshow
	Padd_Option::set('slideshow_enable'     , '1');
	Padd_Option::set('slideshow_cat_id'     , '1');
	Padd_Option::set('slideshow_cat_limit'  , '3');
	Padd_Option::set('slideshow_effect'     , 'fade');
	Padd_Option::set('slideshow_slide_wait' , '5');
	Padd_Option::set('slideshow_slide_speed', '1000');

	// Social Networking
	foreach ($_PADD_SOCIALNET as $k => $v) {
		if ($k == 'rss') {
			Padd_Option::set('sn_username_rss', '');
		} else if ($k == 'linkedin') {
			Padd_Option::set('sn_username_linkedin', ''); // Like it does exists. LQL.
		} else {
			Padd_Option::set('sn_username_' . $k, 'paddsolutions');
		}
	}

	// Page Navigation
	Padd_Option::set('pgn_pages_to_show','5');
	Padd_Option::set('pgn_larger_page_numbers','0');
	Padd_Option::set('pgn_larger_page_numbers_multiple','10');

	// Advertisements
	Padd_Option::set('ads_468060_1','<a href="http://themecredible.com/" target="_blank"><img alt="Advertisement" src="' . get_template_directory_uri() . '/styles/images/advertisement-468x060.png" /></a>');
	for ($i=1;$i<=4;$i++) {
		Padd_Option::set('ads_125125_' . $i,'<a href="http://themecredible.com/" target="_blank"><img alt="Advertisement" src="' . get_template_directory_uri() . '/styles/images/advertisement-125x125.png" /></a>');
	}

	Padd_Option::update();
}

$installed = Padd_Option::get('installed','0');
$installed = ('0' === $installed) ? false : true;

if (!$installed) {
	padd_theme_options_reset();
}
$padd_twitter = new Padd_Twitter(Padd_Option::get('sn_username_twitter'), 3, true);