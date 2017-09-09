<?php get_header(); ?>
    <main class="main" role="main">
        <div class="content">
            <section class="posts">
                <div class="headline">
                    <h2><?php global $wp_query;echo '共搜索到 '.'<strong>'.$wp_query->found_posts.'</strong> 篇与“'.wp_specialchars($s,1).'”相关的文章'; ?></h2>
                </div>
                <?php $posts = query_posts($query_string . '&orderby=date'); ?><?php if(have_posts()) : while(have_posts()) : the_post(); ?><article class="post">
                    <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a><span><?php the_time('Y.m.d'); ?></span></h2>
                    <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250, '...'); ?><a href="<?php the_permalink(); ?>">阅读全文</a></p>
                    <span><i class="fa fa-bookmark"></i><?php the_tags('', ', ', ''); ?></span>
                    <span><i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
                    <span><i class="fa fa-commenting"></i><?php comments_popup_link('0', '1', '%'); ?></span>
                </article>
                <?php endwhile; ?><?php else: ?><article class="post">
                    <h2>对不起</h2>
                    <span>还没有与“<?php echo wp_specialchars($s, 1); ?>”相关的文章</span>
                </article>
                <?php endif; ?><section class="clear"></section>
            </section>
            <?php get_sidebar(); ?>
            <section class="clear"></section>
        </div>
    </main>
<?php get_footer(); ?>