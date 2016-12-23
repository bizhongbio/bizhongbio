<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8">
    <title><?php echo is_home() ? get_bloginfo('name') . ' - ' . get_bloginfo('description') : wp_title('|', false, 'right') . get_bloginfo('name') . ' - ' . get_bloginfo('description'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta name="google" value="notranslate">
<?php if(is_page('video') || is_404()){ ?>
    <meta name="viewport" content="width=1040">
<?php }else{ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<?php } ?>
    <meta name="description" content="<?php if(is_single()){$description = '';$description1 = get_post_meta($post->ID, 'description', true);$description2 = str_replace('\n', '', mb_strimwidth(strip_tags($post->post_content), 0, 200, '…', 'utf-8'));$description = $description1 ? $description1 : $description2;echo $description;}else{description();}?>">
    <meta name="keywords" content="<?php if(is_single()){$keywords = '';if($keywords == ''){$tags = wp_get_post_tags($post->ID);foreach($tags as $tag){$keywords = $keywords . $tag->name . ',';}$keywords = rtrim($keywords, ',');}echo $keywords;}else{keywords();} ?>">
    <meta name="author" content="兰必钟（Bizhong Lan）, https://bizhong.github.io/">
    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no, email=no">
    <meta name="theme-color" content="#e0e0e0">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="msapplication-TileColor" content="#fff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@<?php bloginfo('name'); ?>">
    <meta name="twitter:title" content="<?php echo is_home() ? get_bloginfo('name') : trim(wp_title('', false)); ?>">
    <meta name="twitter:description" content="<?php if(is_single()){$description = '';$description1 = get_post_meta($post->ID, 'description', true);$description2 = str_replace('\n','',mb_strimwidth(strip_tags($post->post_content), 0, 200, '…', 'utf-8'));$description = $description1 ? $description1 : $description2;echo $description;}else{description();}?>">
    <meta name="twitter:image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:url" content="<?php ogUrl(); ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo is_home() ? get_bloginfo('name') : trim(wp_title('', false)); ?>">
    <meta property="og:description" content="<?php if(is_single()){$description = '';$description1 = get_post_meta($post->ID, 'description', true);$description2 = str_replace('\n','',mb_strimwidth(strip_tags($post->post_content), 0, 200, '…', 'utf-8'));$description = $description1 ? $description1 : $description2;echo $description;}else{description();}?>">
    <meta property="og:image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
    <meta itemprop="name" content="<?php echo is_home() ? get_bloginfo('name') : trim(wp_title('', false)); ?>">
    <meta itemprop="description" content="<?php if(is_single()){$description = '';$description1 = get_post_meta($post->ID, 'description', true);$description2 = str_replace('\n','',mb_strimwidth(strip_tags($post->post_content), 0, 200, '…', 'utf-8'));$description = $description1 ? $description1 : $description2;echo $description;}else{description();}?>">
    <meta itemprop="image" content="<?php bloginfo('template_url'); ?>/screenshot.jpg">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png"> 
    <link rel="stylesheet" href="<?php bloginfo('template_url')?>/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <!--[if lte IE 9]>
        <script src="<?php bloginfo('template_url')?>/js/lib/html5shiv.min.js"></script>
        <script src="<?php bloginfo('template_url')?>/js/lib/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

</head>
<body id="<?php dynamicBodyID(); ?>">
    <!--[if lt IE 8]><p id="upgrade-browser-reminder">经年的执念，放下吧。快搭上升级浏览器的末班车。</p><![endif]-->
<?php if(is_category() || is_search() || is_tag() || is_single()){ ?>
    <header class="global-header" role="banner">
        <div class="header-content">
            <nav class="main-nav" aria-label="Global navigation" role="navigation">
                <?php wp_nav_menu(array('menu' => 'nav','depth' => 1)); ?>

            </nav>
        </div>
    </header>
    <header id="cat-header" role="banner">
        <div class="header-content">
            <a id="btn-nav" href="javascript:void(0);"><i class="fa fa-navicon"></i></a>
<?php if(is_single()){ ?>
            <div class="logo"><a href="<?php bloginfo('url'); ?>">双鱼bizhongbio</a></div>
<?php }else{ ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>">双鱼bizhongbio</a></h1>
<?php } ?>
            <nav class="cat-nav" aria-label="Local navigation" role="navigation">
                <?php wp_nav_menu(array('menu' => 'cat-nav','depth' => 1)); ?>

            </nav>
            <a id="btn-search" href="javascript:void(0);"><i class="fa fa-search"></i></a>
            <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                <input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="请输入关键字" />
                <button type="submit" class="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </header>
<?php }else{ ?>
    <header id="header" role="banner"<?php if(is_home()){echo ' style="position: absolute;background: rgba(0,0,0,.8);"';} ?>>
        <div class="header-content">
            <a id="btn-nav" href="javascript:void(0);"><i class="fa fa-navicon"></i></a>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>">双鱼bizhongbio</a></h1>
            <nav class="nav" aria-label="Global navigation" role="navigation">
                <?php if(is_home() || is_page()){wp_nav_menu(array('menu' => 'nav','depth' => 1));}else{wp_nav_menu(array('menu' => 'cat-nav','depth' => 1));}; ?>

            </nav>
            <a id="btn-search" href="javascript:void(0);"><i class="fa fa-search"></i></a>
            <form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
                <input id="s" name="s" type="text" value="<?php echo wp_specialchars($s, 1); ?>" placeholder="请输入关键字" />
                <button class="submit" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </header>
<?php } ?>
