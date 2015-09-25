<?php

require '../../../../wp-load.php';

$out = '';

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start();
}

include '../library/js/jquery.superfish.js';
echo "\n\n\n";
include '../library/js/jquery.cycle.js';
echo "\n\n\n";
?>

function padd_toggle(classname,value) {
	jQuery(classname).focus(function() {
		if (value == jQuery(classname).val()) {
			jQuery(this).val('');
		}
	});
	jQuery(classname).blur(function() {
		if ('' == jQuery(classname).val()) {
			jQuery(this).val(value);
		}
	});
}


function padd_create_slideshow() {
	jQuery('div#slideshow-box').append('<a class="dir-button dir-button-l" id="jqc-prev" href="#"></a>');
	jQuery('div#slideshow-box').append('<a class="dir-button dir-button-r" id="jqc-next" href="#"></a>');
	len = jQuery('div#slideshow-box .item').length;
	jQuery('div#slideshow-box .dir-button-l').css('z-index', len + 2);
	jQuery('div#slideshow-box .dir-button-r').css('z-index', len + 3);
	jQuery('div#slideshow-controller').css('z-index', len + 4);
	jQuery('div#slideshow-box div.list').cycle({
		fx                : '<?php echo Padd_Option::get('slideshow_effect', 'fade'); ?>',
		speed             : <?php echo Padd_Option::get('slideshow_slide_speed', '1000'); ?>,
		timeout           : <?php echo Padd_Option::get('slideshow_slide_wait','3') * 1000; ?>,
		cleartypeNoBg     : true,
		activePagerClass  : 'jqc-active',
		pager             : '#jqc-pages',
		prev              : '#jqc-prev',
		next              : '#jqc-next',
		pause             : true
 	});
}

jQuery(document).ready(function() {
	jQuery.noConflict();

	jQuery('#menubar .menu > ul').superfish({
		autoArrows: false,
		hoverClass: 'hover',
		speed     : 500,
		delay     : 0,
		animation : {
			opacity: 'show',
			height : 'show'
		}
	});

	padd_create_slideshow();
	

	jQuery('input#s').val('<?php echo __('Enter your search here...', PADD_THEME_SLUG); ?>');
	padd_toggle('input#s','<?php echo __('Enter your search here...', PADD_THEME_SLUG); ?>');
	jQuery('div.search form').click(function () {
		jQuery('input#s').focus();
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
