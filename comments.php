<?php
    //不让恶意用户直接打开评论文件
    if(isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
        die('请不要直接加载此页。谢谢！（Please do not load this page directly. Thanks!）');
    }
?>
<div class="comments">
    <a name="comments"></a>
    <h2><?php comments_number('暂无评论', '1条评论', '%条评论');?></h2>
    <ol class="commentslist">
    <?php
        if(!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password){
        //如果有一个密码,它不匹配（if there's a password and it doesn't match the cookie）
    ?>
    <li class="prompt"><p>请输入密码再查看评论内容。</p></li>
    <?php
        }else if(!comments_open()){
    ?>
    <li class="prompt"><p>评论功能已经关闭！</p></li>
    <?php
        }else if(!have_comments()){
    ?>
    <li class="prompt"><p>还没有任何评论，你来说两句吧。</p></li>
    <?php
        }else{wp_list_comments('type=comment&callback=showComments');}
    ?>
    </ol>
    <?php
        //如果注册和登录不了（If registration required and not logged in.）
        if(!comments_open()) : elseif(get_option('comment_registration') && !is_user_logged_in()) :
    ?>
    <p>你必须 <a href="<?php echo wp_login_url(get_permalink()); ?>">登录</a> 才能发表评论.</p>
    <?php else: ?>
</div>
<div class="respond">
    <a name="respond"></a>
    <h2>发表评论</h2>
    <form class="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
        <?php if(!is_user_logged_in()): ?><input id="author" type="text" name="author" tabindex="1"value="<?php echo $comment_author; ?>" placeholder="姓名（必填）" />
        <input id="email" type="text" name="email" tabindex="2" value="<?php echo $comment_author_email; ?>" placeholder="Email（必填）" />
        <input id="url" type="text" name="url" tabindex="3" value="<?php echo $comment_author_url; ?>" placeholder="网站" />
        <?php else: ?><p>您已登录：<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出</a></p>
        <?php endif; ?><textarea id="comment" name="comment" tabindex="4" placeholder="说点什么吧" ></textarea>
        <input id="commentsubmit" type="submit" name="submit" value="发表评论" />
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>

    </form>
    <?php endif; ?>

</div>