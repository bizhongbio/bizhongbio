<?php
/*
Template Name: 关于
*/
?>
<?php get_header(); ?>
    <main class="main" role="main">
      <div class="content">
        <section class="about">
          <!-- 在这里修改标题，默认显示站点标题 -->
          <h2><?php bloginfo('name'); ?></h2>
          <!-- 在这里修改段落，默认显示站点副标题 -->
          <p><?php bloginfo('description'); ?></p>
          <!-- 在这里修改图片，尺寸：240 x 240（一倍图）或 480 x 480（二倍图） -->
          <div class="avatar">
            <img src="<?php bloginfo('template_url'); ?>/images/about-avatar.svg" alt="<?php bloginfo('name'); ?>">
          </div>
          <!-- 在这里修改社交媒体 -->
          <div class="social">
            <a href="" title="GitHub" target="_blank"><i class="fa fa-github"></i></a>
            <a href="" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
            <a href="" title="微博" target="_blank"><i class="fa fa-weibo"></i></a>
            <a href="mailto:" title="Email Me" target="_blank"><i class="fa fa-envelope-o"></i></a>
          </div>
        </section>
      </div>
    </main>
<?php get_footer(); ?>