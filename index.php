<?php get_header(); ?>
    <main class="main" role="main">
        <article id="hero-slides">
            <section class="slide slide-intro">
                <a class="slide-link" href="javascript:void(0);">
                    <div class="slide-content">
                        <div class="slide-info">
                            <h2></h2>
                            <h3>没有伞的孩子，必须努力奔跑。</h3>
                        </div>
                    </div>
                </a>
            </section>
            <section class="slide slide-project">
                <a class="slide-link" href="javascript:void(0);">
                    <div class="slide-content">
                        <div class="slide-info">
                            <h2></h2>
                            <h3>激发灵感，为梦编织。<br>指尖的每次碰撞，为项目增光添彩。</h3>
                        </div>
                    </div>
                </a>
            </section>
            <section class="slide slide-work">
                <a class="slide-link" href="javascript:void(0);">
                    <div class="slide-content">
                        <div class="slide-info">
                            <h2>个人作品集</h2>
                            <h3>沉浸其中，点燃自己心中的创意之火。</h3>
                        </div>
                    </div>
                </a>
            </section>
            <section class="slide slide-video">
                <a class="slide-link" href="javascript:void(0);">
                    <div class="slide-content">
                        <div class="slide-info">
                            <h2>观看视频</h2>
                            <h3>我是证人 港囧 左耳 分手大师</h3>
                        </div>
                    </div>
                </a>
            </section>
            <nav class="slides-nav">
                <a href="#intro" class="current"></a>
                <a href="#project"></a>
                <a href="#work"></a>
                <a href="#video"></a>
            </nav>
        </article> -->
        <section id="articles">
            <div class="articles">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?><article class="article">
                    <figure>
                        <a href="<?php the_permalink(); ?>">
                            <?php post_thumbnail(); ?>

                        </a>
                        <figcaption>
                            <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                            <span><i class="fa fa-calendar-check-o"></i><?php the_time('Y.m.d'); ?> <i class="fa fa-eye"></i><?php echo getPostViews(get_the_ID()); ?> <i class="fa fa-commenting"></i><?php comments_popup_link("0", "1", "%"); ?></span>
                        </figcaption>
                    </figure>
                </article>
                <?php endwhile; ?><div class="load-more">
                    <?php next_posts_link('加载更多', 0); ?>

                </div>
                <?php else: ?><article class="article">
                    <figure>
                        <img src="<?php bloginfo('template_url'); ?>/images/sorry.jpg" alt="">
                        <figcaption>
                            <h1>对不起</h1>
                            <span>还没有与此相关的内容</span>
                        </figcaption>
                    </figure>
                </article>
                <?php endif; ?><section class="clear"></section>
            </div>
        </section>
    </main>
<?php get_footer(); ?>