<?php get_header(); ?>
    <main class="main" role="main">
      <div class="content clearfix">
        <section class="posts clearfix">
          <div class="headline">
            <h2>标签：<?php single_tag_title(); ?></h2>
          </div>
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?><article class="post">
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a><span><?php the_time('Y.m.d'); ?></span></h2>
            <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250, '...'); ?><a href="<?php the_permalink(); ?>">阅读全文</a></p>
            <span><i class="fa fa-bookmark"></i><?php the_tags('', ', ', ''); ?></span>
            <span><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
            <span><i class="fa fa-commenting"></i><?php comments_popup_link('0', '1', '%'); ?></span>
          </article>
          <?php endwhile; ?><?php else : ?><article class="post">
            <h2>抱歉</h2>
            <p>还没有与“<?php single_tag_title(); ?>”相关的文章。</p>
          </article>
          <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
      </div>
    </main>
<?php get_footer(); ?>