<?php

require '../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

if (file_exists('fonts.css')) {
	include 'fonts.css';
}

include 'base.css';
include 'required.css';
include 'layout.css';
include 'header.css';
include 'navigation.css';
include 'slideshow.css';
include 'content.css';
include 'content-comments.css';
include 'pagination.css';
include 'sidebar.css';
include 'sidebar-footer.css';
include 'footer.css';

?>

<?php $sitename = Padd_Option::get('sitename_mode','1'); ?>
/** Branding **/
<?php if ('0' == $sitename) : ?>
#branding #site-title {
	display: block;
	margin: 0;
	padding: 0;
}
#branding #site-title a {
	display: block;
	margin: 0;
	padding: 0 10px;
	color: #868686;
	font: 800 40px/91px 'Open Sans', sans-serif;
	text-shadow: 0 1px 0 rgba(0,0,0,.40);
	text-decoration: none;
}
#branding #site-title a:hover {
	text-decoration: none;
}
#branding #site-description {
	display: none;

<?php else : ?>
<?php
	$image_url = Padd_Option::get('sitename_logo_url');
	$image_dir = Padd_Option::get('sitename_logo_dir');
	$val = getimagesize($image_dir);
?>
#branding #site-title {
	display: block;
	margin: 0;
	padding: 0;
}
#branding #site-title a {
	display: block;
	margin: 0;
	padding: 0;
	width: <?php echo $val[0]; ?>px;
	height: <?php echo $val[1]; ?>px;
	text-indent: -99999px;
	background: transparent url('<?php echo $image_url; ?>') left center no-repeat;
}
#branding #site-description {
	display: none;
}
<?php endif; ?>

<?php
if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	$out = ob_get_clean();
}

$compress = (isset($_GET['c']) && $_GET['c']);
$force_gzip = ($compress && 'gzip' == $_GET['c']);
$expires_offset = 31536000;

header('Content-Type: text/css');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");

if ( $compress && ! ini_get('zlib.output_compression') && 'ob_gzhandler' != ini_get('output_handler') && isset($_SERVER['HTTP_ACCEPT_ENCODING']) ) {
	header('Vary: Accept-Encoding'); // Handle proxies
	if ( false !== strpos( strtolower($_SERVER['HTTP_ACCEPT_ENCODING']), 'deflate') && function_exists('gzdeflate') && ! $force_gzip ) {
		header('Content-Encoding: deflate');
		$out = gzdeflate( $out, 3 );
	} elseif ( false !== strpos( strtolower($_SERVER['HTTP_ACCEPT_ENCODING']), 'gzip') && function_exists('gzencode') ) {
		header('Content-Encoding: gzip');
		$out = gzencode( $out, 3 );
	}
}

echo $out;
