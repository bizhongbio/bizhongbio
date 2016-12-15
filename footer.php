    <footer class="footer" role="contentinfo">
        <div class="footer-content">
<?php if(is_home() || is_404()){ ?>
            <aside class="link">
                <h2>友情链接</h2>
                <ul>
                    <!-- 在这里添加友情链接 -->
                    <li><a href="http://www.bizhongbio.com/" title="双鱼bizhongbio - 渡人渡己，前端开发技术博客" target="_blank">双鱼bizhongbio</a></li>
                </ul>
                <div class="clear"></div>
            </aside>
<?php } ?>
            <section class="copyright">
                <p>版权所有 &copy; <?php echo date('Y') ?> <a href="https://github.com/bizhong/wordpress-theme-bizhongbio" target="_blank">Bizhongbio</a> <a href="<?php bloginfo('url'); ?>/sitemap.html" target="_blank">网站地图</a></p>
            </section>
        </div>
        <a id="go-top" href="javascript:scroll(0,0);"><i class="fa fa-long-arrow-up"></i></a>
    </footer>
    <script src="<?php bloginfo('template_url'); ?>/scripts/bizhongbio.js"></script>
<?php if(is_home()) { ?>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.11.3.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/home-asynchronous-load-more.js"></script>
<?php }if(is_category()) { ?>
    <script src="<?php bloginfo('template_url'); ?>/scripts/jquery-1.11.3.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/scripts/category-asynchronous-load-more.js"></script>
<?php }if(is_single()) { ?>
    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php } wp_footer(); ?>
</body>
</html>