<?php

require '../../../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

include '../../js/jquery.minicolor.js';
echo "\n\n\n";

?>
function padd_admintabs_init() {
	if (!jQuery("#padd-admin-tabs").length) {
		return;
	}

	var jQversion = undefined == jQuery.ui ? [0,0,0] : undefined == jQuery.ui.version ? [0,1,0] : jQuery.ui.version.split('.');
	switch(true) {
		case jQversion[0] >= 1 && jQversion[1] >= 7:
			jQuery("#padd-admin-tabs").tabs();
			break;
		default:
			jQuery("#padd-admin-tabs > ul").tabs();
	}
}

jQuery(document).ready(function() {
	padd_admintabs_init();

	if (jQuery('#sitename_mode').val() == '0') {
		jQuery('#tr-sitename_logo_url').hide();
	}

	jQuery('#sitename_mode').change(function () {
		if (jQuery('#sitename_mode').val() == '1') {
			jQuery('#tr-sitename_logo_url').fadeIn(1000);
		} else {
			jQuery('#tr-sitename_logo_url').fadeOut(1000);
		}
	});

	<?php $ids = array('cat_id', 'cat_limit', 'effect', 'slide_wait', 'slide_speed'); ?>

	if (!jQuery('#slideshow_enable').is(':checked')) {
		<?php foreach ($ids as $id) : ?>
		jQuery('#tr-slideshow_<?php echo $id; ?>').hide();
		<?php endforeach; ?>
	}

	jQuery('#slideshow_enable').click(function () {
		if (jQuery('#slideshow_enable').is(':checked')) {
			<?php foreach ($ids as $id) : ?>
			jQuery('#tr-slideshow_<?php echo $id; ?>').fadeIn(1000);
			<?php endforeach; ?>
		} else {
			<?php foreach ($ids as $id) : ?>
			jQuery('#tr-slideshow_<?php echo $id; ?>').fadeOut(1000);
			<?php endforeach; ?>
		}
	});

	jQuery("input.colorpicker").miniColors();

	jQuery('button[value="reset"]').live({
		click: function() {
			return confirm('<?php echo __('Are you sure that you reset all the theme settings? If you do, this will lose your current settings and revert back to default settings!', PADD_THEME_SLUG); ?>');
		}
	});

});

<?php

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	$out = ob_get_clean();
}


$compress = (isset($_GET['c']) && $_GET['c']);
$force_gzip = ($compress && 'gzip' == $_GET['c']);
$expires_offset = 31536000;

header('Content-Type: application/x-javascript; charset=UTF-8');
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