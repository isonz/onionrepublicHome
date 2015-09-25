<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ie6.js" ></script>
<script type="text/javascript">
DD_belatedPNG.fix('*');
</script>
<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="生活方式 &raquo; Feed" href="/feed/" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php if (defined("IS_MOBILE")):?>
<link rel='stylesheet' id='twentytwelve'  href='<?php echo get_template_directory_uri(); ?>/phoneabout.css' type='text/css' media='all' />
<?php else: ?>
<link rel='stylesheet' id='twentytwelve'  href='<?php echo get_template_directory_uri(); ?>/style.css?ver=3.8.1' type='text/css' media='all' />
<?php endif ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-mobile.detect.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/default.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/iebug.js"></script>
</head>
<body>
<div id="top_line_black"></div>
<div id="top_line_red"></div>
<div id="container">
<!--header area-->
<div id="header">
    <div id="logo">
  	<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="Onion" alt="Onion" /></a>
  </div>
  <!-- end logo -->
<div id="cart">
  <div id="search_dashed">
  <a href="/wp-admin"><img src="<?php echo get_template_directory_uri(); ?>/images/logoin_btn.png" /></a>
  <div id="search">
    <div class="button-search"></div>
    <input type="text" name="search" placeholder="Search" value="">
  </div>
  </div>
  <!-- end search -->
</div>
  <div id="top_date_area"><div><?php echo date('d . M . Y'); ?></div></div>
  <!-- end date -->
</div>
<!--header area end-->

<!--menu area-->
<div id="menus">
  <div id="menu_dashed">
  <div id="menu">
  <ul class="clearfix">
  	<li><a href="/" class="active">HOME</a></li>
    <li><a href="/about">ABOUT ONION</a></li>
    <li><a href="/products">PRODUCTS</a></li>
	<li><a href="/contact">CONTACT US</a></li>
   </ul>
  </div>
  </div>
</div>
<!--menu area end-->
<div id="notification"></div>
	



<div id="home_content">
	<div id="XDCategoryGroupsBlocksbox">
    	<div class="XDCategoryGroupsBlocks autoSpacing">
        	<a href="/skincar"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/skin/1.png" alt="SKINCARE"></a>
        	<div id="XD_xiewen"><h2><a href="/skincare">SKINCARE </a></h2></div>
		</div>
        <div class="XDCategoryGroupsBlocks autoSpacing">
            <a href="/babyproducts"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/baby/1.png" alt="BABY PRODUCTS"></a>
            <div id="XD_xiewen"><h2><a href="/babyproducts">BABY PRODUCTS </a></h2></div>
		</div>
        <div class="XDCategoryGroupsBlocks autoSpacing">
            <a href="/wines"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/wines/1.png" alt="WINES"></a>
            <div id="XD_xiewen"><h2><a href="/wines">WINES </a></h2></div>
		</div>
        <div class="XDCategoryGroupsBlocks autoSpacing">
            <a href="/juices"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/1.png" alt="JUICES"></a>
            <div id="XD_xiewen"><h2><a href="/juices">JUICES </a></h2></div>
		</div>
        <div class="XDCategoryGroupsBlocks autoSpacing">
            <a href="/juices"><img src="<?php echo get_template_directory_uri(); ?>/images/pic/juices/2.png" alt="JUICES"></a>
            <div id="XD_xiewen"><h2><a href="/juices">JUICES </a></h2></div>
		</div>
	</div>
	
	<div id="home_about">
		<div class="about_word">
			<div class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/min-logo.png" /></div>
			Onion Republic International Limited is a trading company based on Hong Kong. Having the unique condition, Hong Kong is playing an important role to be a hub between east and west. Therefore, it makes the circumstance best for devloping international trading.  Embrace this advantage, Onion team have deveolped wide and broad channels which from Southeast Asia to Australia, middle east to Europe. Providing lots variety of goods with quality is our mission. Speculating the market trend in order to fullfill our client’s need is our responsibility. Being profession, passion and effectiveness, Onion republic team is ready for any challenging. 
		</div>
	</div>
</div>






