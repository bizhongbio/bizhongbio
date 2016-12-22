<aside class="sidebar">
                <article class="promos">
                    <a href="https://github.com/bizhong" title="bizhong (Bizhong Lan) · GitHub" target="_blank"><i class="fa fa-github"></i> GitHub</a>
                </article>
                <section class="recommended-posts">
                    <h2>推荐文章</h2>
                    <ul>
                    <?php $args = array('post_password' => '','post_status' => 'publish','orderby' => 'comment_count','showposts' => 16);
                    $query_posts = new WP_Query();$query_posts->query($args);
                    while( $query_posts->have_posts() ){ $query_posts->the_post(); ?>

                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo mb_strimwidth(get_the_title(),0,20,'…'); ?></a>
                        <span><?php comments_popup_link("评论0", "评论1", "评论%"); ?></span>
                    </li><?php }wp_reset_query();?>
                </section>
                <section class="recent-comments">
                    <h2>近期评论</h2>
                    <?php recent_comments(); ?>
                </section>
                <section class="friendly-link">
                    <h2>友情链接</h2>
                    <ul>
                        <!-- 在这里添加友情链接 -->
                        <li><a href="https://bizhongbio.github.io/" title="双鱼bizhongbio - 渡人渡己，前端开发技术博客" target="_blank">双鱼bizhongbio</a></li>
                    </ul>
                </section>
            </aside>