<?php

define('PADD_THEME_NAME'  , 'Seaborgiumic');
define('PADD_THEME_VERS'  , '1.2');
define('PADD_THEME_SLUG'  , 'seaborgiumic');
define('PADD_DS'          , DIRECTORY_SEPARATOR);
define('PADD_NS'          , 'padd');
define('PADD_FW'          , '6.0');

define('PADD_ROOT_PATH', get_template_directory() . PADD_DS);
define('PADD_LIBR_PATH', PADD_ROOT_PATH . 'library'  . PADD_DS);
define('PADD_INCL_PATH', PADD_LIBR_PATH . 'includes' . PADD_DS);

require ABSPATH . 'wp-includes' . PADD_DS . 'class-feed.php';
require ABSPATH . 'wp-includes' . PADD_DS . 'class-simplepie.php';

require PADD_INCL_PATH . 'class-option.php';
require PADD_INCL_PATH . 'class-walkers.php';
require PADD_INCL_PATH . 'class-socialnetwork.php';
require PADD_INCL_PATH . 'class-socialbookmark.php';
require PADD_INCL_PATH . 'class-twitter.php';
require PADD_INCL_PATH . 'class-pagination.php';
require PADD_INCL_PATH . 'class-adminpanel.php';
require PADD_INCL_PATH . 'class-input.php';
require PADD_INCL_PATH . 'class-widgets.php';
require PADD_INCL_PATH . 'class-setup.php';
require PADD_INCL_PATH . 'functions.php';
require PADD_INCL_PATH . 'functions-widgets.php';
require PADD_INCL_PATH . 'hooks.php';

require PADD_LIBR_PATH . PADD_DS . 'admin' . PADD_DS . 'options-functions.php';

require PADD_LIBR_PATH . 'defaults.php';
require PADD_LIBR_PATH . 'setup.php';
require PADD_LIBR_PATH . 'prelude.php';