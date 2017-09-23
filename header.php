<!DOCTYPE html>
<html lang="zh-cmn-Hans">
	<head>
		<meta charset="utf-8">
		<title><?php headTitle(); ?></title>
		<meta http-equiv="x-dns-prefetch-control" content="on">
		<link rel="dns-prefetch" href="http://apps.bdimg.com/">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
		<meta http-equiv="Cache-Control" content="no-transform">
		<meta http-equiv="Cache-Control" content="no-siteapp">
		<meta name="google" value="notranslate">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="<?php headDescription(); ?>">
		<meta name="keywords" content="<?php headKeywords(); ?>">
		<meta name="author" content="兰必钟(Lan Bizhong), https://bizhong.github.io/">
		<meta name="robots" content="index, follow">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="default">
		<meta name="format-detection" content="telephone=no, email=no">
		<meta name="theme-color" content="#e0e0e0">
		<meta name="msapplication-tap-highlight" content="no">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/images/ms-title-144x144.png">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@<?php bloginfo('name'); ?>">
		<meta name="twitter:title" content="<?php headTitle(); ?>">
		<meta name="twitter:description" content="<?php headDescription(); ?>">
		<meta name="twitter:image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
		<meta property="og:url" content="<?php headUrl(); ?>">
		<meta property="og:type" content="website">
		<meta property="og:title" content="<?php headTitle(); ?>">
		<meta property="og:description" content="<?php headDescription(); ?>">
		<meta property="og:image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
		<meta itemprop="name" content="<?php headTitle(); ?>">
		<meta itemprop="description" content="<?php headDescription(); ?>">
		<meta itemprop="image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
		<link rel="fluid-icon" href="<?php bloginfo('template_url'); ?>/images/fluid-icon-512x512.png" title="<?php bloginfo('name'); ?>">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-180x180.png">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
		<link rel="icon" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon-32x32.png">
		<link rel="icon" sizes="192x192" href="<?php bloginfo('template_url'); ?>/images/android-chrome-192x192.png">
		<link rel="icon" sizes="96x96" href="<?php bloginfo('template_url'); ?>/images/favicon-96x96.png">
		<link rel="icon" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicon-16x16.png">
		<link rel="manifest" href="<?php bloginfo('template_url'); ?>/images/manifest.json">
		<link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/images/safari-pinned-tab.svg" color="#000000">
		<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="canonical" href="<?php headUrl(); ?>">
		<!--[if lte IE 9]>
			<script src="http://apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script>
			<script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>

	</head>
	<body id="<?php bodyId(); ?>">
		<!--[if lt IE 8]><p class="upgrade-browser-reminder">经年的执念，放下吧。快搭上升级浏览器的末班车。</p><![endif]-->
<?php if (is_category() || is_single() || is_search() || is_tag()) : ?>
		<header class="global-header" role="banner">
			<div class="header-content">
				<nav class="main-nav" aria-label="Global navigation" role="navigation">
					<?php wp_nav_menu(array('menu' => 'nav', 'depth' => 1)); ?>
					
				</nav>
			</div>
		</header>
		<header id="cat-header" role="banner">
			<div class="header-content">
				<a id="btn-nav" href="javascript:void(0);"><i class="fa fa-navicon"></i></a>
				<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<nav class="cat-nav" aria-label="Local navigation" role="navigation">
					<?php wp_nav_menu(array('menu' => 'cat-nav', 'depth' => 1)); ?>
					
				</nav>
<?php else : ?>
		<header id="header" role="banner"<?php if (is_home()) echo ' style="position: absolute; background: rgba(0, 0, 0, .8);"'; ?>>
			<div class="header-content">
				<a id="btn-nav" href="javascript:void(0);"><i class="fa fa-navicon"></i></a>
				<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				<nav class="nav" aria-label="Global navigation" role="navigation">
					<?php wp_nav_menu(array('menu' => 'nav', 'depth' => 1)); ?>
					
				</nav>
<?php endif; ?>
				<a id="btn-search" href="javascript:void(0);"><i class="fa fa-search"></i></a>
				<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
					<input id="s" name="s" type="text" value="<?php echo wp_specialchars($s, 1); ?>" placeholder="请输入关键字">
					<button class="submit" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</header>
		
