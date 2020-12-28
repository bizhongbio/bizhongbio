<?php
  // 不让恶意用户直接打开评论文件
  if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('请不要直接加载评论文件。');
  }
?>
<div class="comments">
  <a name="comments"></a>
  <h2>历史评论</h2>
  <ol class="commentslist">
  <?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
    <li class="prompt"><p>输入密码再查看评论内容。</p></li>
  <?php } else if (!comments_open()) { ?>
    <li class="prompt"><p>评论功能已经关闭，不能发表评论。</p></li>
  <?php } else if (!have_comments()) { ?>
    <li class="prompt"><p>还没有任何评论，你来说两句吧。</p></li>
  <?php } else { wp_list_comments('type=comment&callback=showComments'); } ?>
  </ol>
  <?php if (!comments_open()) : elseif (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><a href="<?php echo wp_login_url(get_permalink()); ?>">登录</a>再发表评论。</p>
  <?php else : ?>
</div>
<div class="respond">
  <a name="respond"></a>
  <h2>发表评论</h2>
  <form class="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <?php if (!is_user_logged_in()) : ?><input id="author" name="author" type="text" tabindex="1" value="<?php echo $comment_author; ?>" placeholder="昵称（必填）">
    <input id="email" name="email" type="text" tabindex="2" value="<?php echo $comment_author_email; ?>" placeholder="邮箱（必填）">
    <input id="url" name="url" type="text" tabindex="3" value="<?php echo $comment_author_url; ?>" placeholder="网站">
    <?php else : ?><p>你已经以 <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> 账号登录，<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出当前账号">退出当前账号</a>。</p>
    <?php endif; ?><textarea id="comment" name="comment" tabindex="4" placeholder="说点什么吧"></textarea>
    <input id="commentsubmit" name="submit" type="submit" value="发表评论">
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>

  </form>
  <?php endif; ?>

</div>