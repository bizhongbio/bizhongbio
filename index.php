<?php get_header(); ?>
    <main class="main" role="main">
      <section id="articles">
        <div class="articles clearfix">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?><article class="article">
            <figure>
              <a href="<?php the_permalink(); ?>">
                <?php post_thumbnail(); ?>

              </a>
              <figcaption>
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <span><i class="fa fa-calendar-check-o"></i><?php the_time('Y.m.d'); ?><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?><i class="fa fa-commenting"></i><?php comments_popup_link('0', '1', '%'); ?></span>
              </figcaption>
            </figure>
          </article>
          <?php endwhile; ?><div class="load-more">
            <?php next_posts_link('加载更多', 0); ?>

          </div>
          <?php else : ?><article class="article">
            <figure>
              <img src="<?php bloginfo('template_url'); ?>/images/default.jpg" alt="抱歉">
              <figcaption>
                <h2>抱歉</h2>
                <span>还没有与此相关的文章。</span>
              </figcaption>
            </figure>
          </article>
          <?php endif; ?>
        </div>
      </section>
    </main>
<?php get_footer(); ?>