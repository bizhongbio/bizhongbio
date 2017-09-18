<?php get_header(); ?>
    <main class="main" role="main">
      <div class="content clearfix">
        <?php while (have_posts()) : the_post(); ?><article id="article">
          <section class="article-header">
            <h1><?php the_title(); ?></h1>
            <span><i class="fa fa-calendar-check-o"></i><?php the_time('Y.m.d H:i'); ?></span>
            <span><i class="fa fa-user-secret"></i><?php the_author(); ?></span>
            <span><i class="fa fa-bookmark"></i><?php the_tags('', ', ', ''); ?></span>
            <span><i class="fa fa-eye"></i><?php setPostViews(get_the_ID()); ?><?php echo getPostViews(get_the_ID()); ?></span>
            <span><i class="fa fa-commenting"></i><?php comments_popup_link('0', '1', '%'); ?></span>
          </section>
          <section class="article-content">
            <?php the_content(); ?>
          </section>
          <section class="article-copyright">
            <p>感谢你的阅读，本文版权归 <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> 所有，转载请注明出处。<br>注明出处格式：本文转载自：<?php bloginfo('name'); ?>（<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_permalink(); ?></a>）</p>
          </section>
          <section class="article-adjacent">
            <?php echo articleAdjacent(); ?>

          </section>
          <section class="article-share clearfix">
            <h2>分享到</h2>
            <div class="bdsharebuttonbox">
              <a class="bds_tsina" data-cmd="tsina" href="#" title="分享到新浪微博"></a>
              <a class="bds_weixin" data-cmd="weixin" href="#" title="分享到微信"></a>
              <a class="bds_qzone" data-cmd="qzone" href="#" title="分享到QQ空间"></a>
              <a class="bds_copy" data-cmd="copy" href="#" title="分享到复制网址"></a>
              <a class="bds_more" data-cmd="more" href="#"></a>
              <a class="bds_count"></a>
            </div>
            <!-- 网址生成二维码图片 -->
            <!-- <img src="http://qr.liantu.com/api.php?w=200text=<?php the_permalink(); ?>" alt="<?php the_title(); ?>"/> -->
          </section>
          <section class="article-related">
            <h2>相关文章</h2>
            <ul class="related-articles clearfix">
            <?php
              $post_num = 4;
              $exclude_id = $post->ID;
              $posttags = get_the_tags(); $i = 0;
              if ($posttags) {
                $tags = '';
                foreach ($posttags as $tag) $tags .= $tag->term_id . ',';
                $args = array(
                  'post_status' => 'publish',
                  'tag__in' => explode(',', $tags),
                  'post__not_in' => explode(',', $exclude_id),
                  'caller_get_posts' => 1,
                  'orderby' => 'comment_date',
                  'posts_per_page' => $post_num
                );
                query_posts($args);
                while (have_posts()) { the_post();
            ?>

              <li class="related-article">
                <figure>
                  <a href="<?php the_permalink(); ?>" target="_blank"><?php post_thumbnail(); ?></a>
                  <figcaption>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                  </figcaption>
                </figure>
              </li>
            <?php
                  $exclude_id .= ',' . $post->ID;
                  $i++;
                }
                wp_reset_query();
              }
              if ($i == 0) {
                echo '<p>还没有相关文章。</p>';
              }
            ?>
            </ul>
          </section>
          <section class="article-comment">
            <?php comments_template(); ?>

          </section>
        </article>
        <?php endwhile; ?>
        <?php get_sidebar(); ?>
        
      </div>
    </main>
<?php get_footer(); ?>