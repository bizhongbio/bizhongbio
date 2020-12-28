<aside class="sidebar">
          <article class="promos">
            <!-- 在这里修改 GitHub 地址 -->
            <a href="" title="GitHub" target="_blank"><i class="fa fa-github"></i> GitHub</a>
          </article>
          <section class="recommended-posts">
            <h2>推荐文章</h2>
            <ul>
            <?php
              $args = array('post_password' => '', 'post_status' => 'publish', 'orderby' => 'comment_count', 'showposts' => 16);
              $query_posts = new WP_Query();
              $query_posts->query($args);
              while ($query_posts->have_posts()) : $query_posts->the_post();
            ?>
            
              <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_query(); ?>

            </ul>
          </section>
          <section class="recent-comments">
            <h2>近期评论</h2>
            <?php recent_comments(); ?>

          </section>
        </aside>