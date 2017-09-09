<?php
/*
Template Name:关于
*/
?>
<?php get_header(); ?>
    <main class="main" role="main">
        <div class="content">
            <section class="about">
                <h2><?php bloginfo('name'); ?></h2>
                <p><?php bloginfo('description'); ?></p>
                <div class="aboutme">
                    <img src="<?php bloginfo('url'); ?>/images/aboutme-logo.svg" alt="<?php bloginfo('name'); ?>">
                </div>
                <div class="social">
                    <a href="https://github.com/bizhong" title="bizhong (Bizhong Lan) · GitHub" target="_blank"><i class="fa fa-github"></i></a>
                    <a href="https://www.behance.net/bizhong" title="Bizhong Lan on Behance" target="_blank"><i class="fa fa-behance"></i></a>
                    <a href="http://weibo.com/bizhongbio" title="兰必钟的微博" target="_blank"><i class="fa fa-weibo"></i></a>
                    <a href="mailto:bizhongbio@outlook.com" title="Email Me" target="_blank"><i class="fa fa-envelope-o"></i></a>
                </div>
            </section>
        </div>
    </main>
<?php get_footer(); ?>