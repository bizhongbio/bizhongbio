<?php
// 完整的 WordPress 头部清理代码
// remove_action('wp_head', 'wp_enqueue_scripts', 1);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// remove_action('wp_head', 'locale_stylesheet');
remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
// remove_action('wp_head', 'noindex', 1);
// remove_action('wp_head', 'wp_print_styles', 8);
// remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_footer', 'wp_print_footer_scripts');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
add_action('widgets_init', 'my_remove_recent_comments_style');

function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets[ 'WP_Widget_Recent_Comments' ], 'recent_comments_style'));
}

// 移除 WordPress 4.2 网站自动加载的 Emoji 脚本
function disable_emojis() {
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

function disable_emojis_tinymce($plugins) {
  if (is_array($plugins)) {
    return array_diff($plugins, array('wpemoji'));
  } else {
    return array();
  }
}

// 启用控制面板 sidebar 侧边栏功能
if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'before_widget' => '',
    'alter_widget' => '',
    'before_title' => '<div class="sidebar">',
    'after_title' => '</div>'
  ));
}

// 恢复 WordPress 3.5 控制面板友情链接管理功能
add_filter('pre_option_link_manager_enabled', '__return_true');

// 启用控制面板特色图片功能
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails', array('post', 'page'));
  set_post_thumbnail_size('full');// 完整尺寸
}

// 自定义设置网站标题 title
function headTitle() {
  echo is_home() ? get_bloginfo('name') . ' - ' . get_bloginfo('description') : wp_title('|', false, 'right') . get_bloginfo('name') . ' - ' . get_bloginfo('description');
}

// 自定义设置网站描述 description
function headDescription() {
  if (is_single()) {// 文章页面
    $description = '';
    $description1 = get_post_meta($post->ID, 'description', true);
    $description2 = str_replace('\n', '', mb_strimwidth(strip_tags($post->post_content), 0, 200, '...', 'utf-8'));
    $description = $description1 ? $description1 : $description2;
    echo $description;
  } else {
    if (is_home()) {// 首页
      echo '双鱼bizhongbio，是专注于分享web前端开发技术的个人博客。磨砺，聚变。没有伞的孩子，必须努力奔跑。';
    } else if (is_category()) {// 分类目录页面
      if (is_category('web')) {
        echo '双鱼bizhongbio 前端包含 HTML，CSS，JavaScript，HTML5，CSS3，jQuery 等前端开发技术。';
      } else if (is_category('back')) {
        echo '双鱼bizhongbio 后端包含 PHP，WordPress，NodeJS 等后端开发技术。';
      } else if (is_category('mobile')) {
        echo '双鱼bizhongbio 移动包含 iOS，Android 等移动开发技术。';
      } else if (is_category('design')) {
        echo '双鱼bizhongbio 设计包含交互设计，视觉设计，网页设计，UX设计，UI设计等。';
      } else if (is_category('other')) {
        echo '双鱼bizhongbio 其它';
      }
    } else if (is_page()) {// 自定义页面
      if (is_page('project')) {
        echo '双鱼bizhongbio 项目：激发灵感，为梦编织。指尖的每次碰撞，为项目增光添彩。';
      } else if (is_page('work')) {
        echo '双鱼bizhongbio 作品（个人作品集）：沉浸其中，点燃自己心中的创意之火。';
      } else if (is_page('video')) {
        echo '双鱼bizhongbio 视频：我是证人、港囧、左耳、分手大师。';
      } else if (is_page('about')) {
        echo '双鱼bizhongbio 关于';
      }
    } else {
      echo '双鱼bizhongbio，是专注于分享web前端开发技术的个人博客。磨砺，聚变。没有伞的孩子，必须努力奔跑。';
    }
  }
}

// 自定义设置网站关键字 keywords
function headKeywords() {
  if (is_single()) {// 文章页面
    $keywords = '';
    if ($keywords == '') {
      $tags = wp_get_post_tags($post->ID);
      foreach ($tags as $tag) {
        $keywords = $keywords . $tag->name . ',';
      }
      $keywords = rtrim($keywords, ',');
    }
    echo $keywords;
  } else {
    if (is_home()) {// 首页
      echo '双鱼,双鱼bizhongbio,兰必钟,bizhong,bizhongbio';
    } else if (is_category()) {// 分类目录页面
      if (is_category('web')) {
        echo 'web,前端,双鱼前端,双鱼bizhongbio前端,bizhongbio前端';
      } else if (is_category('back')) {
        echo 'back,后端,双鱼后端,双鱼bizhongbio后端,bizhongbio后端';
      } else if (is_category('mobile')) {
        echo 'mobile,移动,双鱼移动,双鱼bizhongbio移动,bizhongbio移动';
      } else if (is_category('design')) {
        echo 'design,设计,双鱼设计,双鱼bizhongbio设计,bizhongbio设计';
      } else if (is_category('other')) {
        echo 'other,其它,双鱼其它,双鱼bizhongbio其它,bizhongbio其它';
      }
    } else if (is_page()) {// 自定义页面
      if (is_page('project')) {
        echo 'project,项目,双鱼项目,双鱼bizhongbio项目,bizhongbio项目';
      } else if (is_page('work')) {
        echo 'work,作品,双鱼作品,双鱼bizhongbio作品,bizhongbio作品,个人作品集';
      } else if (is_page('video')) {
        echo 'video,视频,双鱼视频,双鱼bizhongbio视频,bizhongbio视频';
      } else if (is_page('about')) {
        echo 'about,关于,双鱼关于,双鱼bizhongbio关于,bizhongbio关于';
      }
    } else if (is_tag()) {// 标签页面
      echo single_tag_title();
    } else {
      echo '双鱼,双鱼bizhongbio,兰必钟,bizhong,bizhongbio';
    }
  }
}

// 自定义设置网站 URL
function headUrl($output = '') {
  if (is_home()) {// 首页
    $output = home_url();
  } else if (is_category()) {// 分类目录页面
    global $cat;
    $output = get_category_link($cat);
  } else if (is_page() || is_single()) {// 自定义页面或文章页面 is_singular()
    $output = get_permalink();
  } else if (is_search()) {// 搜索页面
    $output = get_search_link();
  } else if (is_tag()) {// 标签页面
    global $tag_id;
    $output = get_tag_link($tag_id);
  } else if (is_404()) {// 404页面
    $output = home_url() . '/404';
  }

  if ($output != '') {
    echo $output;
  } else {
    echo home_url();
  }
}

// 自定义设置网站 body id
function bodyId() {
  if (is_home()) {// 首页
    echo 'home';
  } else if (is_category()) {// 分类目录页面
    echo 'category';
  } else if (is_page()) {// 自定义页面
    echo 'page-' . get_page($post_id)->post_name;
  } else if (is_single()) {// 文章页面
    echo 'single';
  } else if (is_archive()) {// 文章归档页面
    echo 'archive';
  } else if (is_search()) {// 搜索页面
    echo 'search';
  } else if (is_tag()) {// 标签页面
    echo 'tag';
  } else if (is_404()) {// 404页面
    echo '404';
  } else if (is_feed()) {// 订阅页面
    echo 'feed';
  }
}

// 移除导航菜单多余 class
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item', 'current-post-ancestor', 'current-menu-ancestor', 'current-menu-parent')) : '';
}

// 自定义设置页面分页文章数
function custom_posts_per_page($query) {
  if (is_home()) {// 首页
    $query->set('posts_per_page', 24);
  } else if (is_category()) {// 分类目录页面
    $query->set('posts_per_page', 16);
  } else if (is_search()) {// 搜索页面
    $query->set('posts_per_page', -1);// 不分页
  }
}

add_action('pre_get_posts', 'custom_posts_per_page');

// 自定义设置缩略图
function post_thumbnail() {
  global $post;
  if (has_post_thumbnail()) {// 有特色图片则取特色图片
    $domsxe = simplexml_load_string(get_the_post_thumbnail());
    $thumbnailsrc = $domsxe->attributes()->src;
    echo '<img src="' . $thumbnailsrc . '" alt="' . trim(strip_tags($post->post_title)) . '">';
  } else {
    $first_img = '';
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $post->post_content, $matches, PREG_PATTERN_ORDER);
    $first_img = $matches[1][0];// 没有设置特色图片则取文章第一张图片
    if (empty($first_img)) {// 既没有设置特色图片、文章内又没有图片，则取默认图像
      $first_img = get_bloginfo('template_url') . '/images/sorry.jpg';
    }
    echo '<img src="' . $first_img . '" alt="' . trim(strip_tags($post->post_title)) . '">';
  }
}

// 获取文章点击浏览次数
function getPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return '0';
  }
  return $count;
}

// 设置文章点击浏览次数
function setPostViews($postID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if ($count == '') {
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
  } else {
    $count++;
    update_post_meta($postID, $count_key, $count);
  }
}

// 文章内容的 URL 自动生成超链接
add_filter('the_content', 'make_clickable');

// 按需加载 Crayon Syntax Highlighter 插件
function Crayon_Resources($content) {
  $pre = "/(crayon-|<\/pre>)/i";
  if (preg_match_all($pre, $content, $matches) && is_single()) {
    $content .= '<link rel="stylesheet" id="crayon-css" href="' . site_url() . '/wp-content/plugins/crayon-syntax-highlighter/css/min/crayon.min.css?ver=2.7.1" type="text/css" media="all"><link rel="stylesheet" id="crayon-theme-familiar-css" href="' . site_url() . '/wp-content/plugins/crayon-syntax-highlighter/themes/familiar/familiar.css?ver=2.7.1" type="text/css" media="all"><link rel="stylesheet" id="crayon-font-monaco-css" href="' . site_url() . '/wp-content/plugins/crayon-syntax-highlighter/fonts/monaco.css?ver=2.7.1" type="text/css" media="all"><script type="text/javascript" src="' . site_url() . '/wp-includes/js/jquery/jquery.js?ver=1.11.1"></script><script type="text/javascript" src="' . site_url() . '/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1"></script><script type="text/javascript">/* <![CDATA[ */var CrayonSyntaxSettings = {"version":"2.7.1","is_admin":"0","ajaxurl":"http:\/\/www.bizhongbio.com\/wp-admin\/admin-ajax.php","prefix":"crayon-","setting":"crayon-setting","selected":"crayon-setting-selected","changed":"crayon-setting-changed","special":"crayon-setting-special","orig_value":"data-orig-value","debug":""};var CrayonSyntaxStrings = {"copy":"\u4f7f\u7528 %s \u590d\u5236\uff0c\u4f7f\u7528 %s \u7c98\u8d34\u3002","minimize":"\u70b9\u51fb\u5c55\u5f00\u4ee3\u7801"};/* ]]> */</script><script type="text/javascript" src="' . site_url() . '/wp-content/plugins/crayon-syntax-highlighter/js/min/crayon.min.js?ver=2.7.1"></script>';
  }
  return $content;
}

add_filter('the_content', 'Crayon_Resources');


// 上一篇，下一篇文章链接
function articleAdjacent() {
  $categories = get_the_category();
  $categoryIDS = array();
  foreach ($categories as $category) {
    array_push($categoryIDS, $category->term_id);
  }
  $categoryIDS = implode(',', $categoryIDS);
  if (get_previous_post($categoryIDS)) {
    previous_post_link('上一篇: %link', '%title', true);
    echo '<br/>';
  } else {
    echo '<p>这一刻，一只鱼已经游到下游了。</p>';
  }
  if (get_next_post($categoryIDS)) {
    next_post_link('下一篇: %link', '%title', true);
    echo '<br/>';
  } else {
    echo '<p>这一刻，另一只鱼已经游到上游了。</p>';
  }
}

// 文章显示评论
function showComments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>
  <li class="comment" id="li-comment-<?php comment_ID(); ?>">
    <div class="author-face"><?php echo mb_substr(ucfirst(get_comment_author($comment_ID)), 0, 1, 'utf-8'); ?></div>
    <div class="comment-content" id="comment-<?php comment_ID(); ?>">
      <?php printf(get_comment_author_link()); ?>

      <span class="comment-meta"><?php echo get_comment_time('Y.m.d H:i'); ?></span>
      <?php edit_comment_link('修改'); ?>
      
      <div class="comment-text">
        <?php if ($comment->comment_approved == '0') : ?>
        <span>你发表的评论正在审核中！</span>
        <?php endif; ?><?php comment_text(); ?>
      </div>
    </div>
    <?php
}

// 用户回复评论邮件通知给网友（勾选“回复时邮件通知我”）
function comment_mail_notify($comment_id) {
  $admin_notify = '1';// admin：要不要收回复通知（'1' = 要；'0' = 不要）
  $admin_email = get_bloginfo('admin_email');// $admin_email：可改为你指定的 email
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  global $wpdb;
  if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '') {
    $wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
  }
  if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1')) {
    $wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify = '1' WHERE comment_ID = '$comment_id'");
  }
  $notify = $parent_id ? get_comment($parent_id)->comment_mail_notify : '0';
  $spam_confirmed = $comment->comment_approved;
  if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
    $wp_email = 'no-reply@' . preg_replace('#^www.#', '', strtolower($_SERVER['SERVER_NAME']));// email 发出点，no-reply 可改为可用的 email
    $to = trim(get_comment($parent_id)->comment_author_email);
    $subject = '[' . get_option('blogname') . '] 你在《' . get_the_title($comment->comment_post_ID) . '》的评论有了新回复';
    $message = '<div style="width:100%;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",sans-serif;background:#f2f2f2;">
      <div style="margin:0 auto;padding:16px;width:80%;background:#fff;">
        <div style="font-size:16px;line-height:1.5;color:#333;">
          <p>' . trim(get_comment($parent_id)->comment_author) . '，你好！你在《' . get_the_title($comment->comment_post_ID) . '》的评论有了新回复：</p>
          <p>你的评论：<span style="color:#666;">'
          . trim(get_comment($parent_id)->comment_content) . '</span></p>
          <p>' . trim($comment->comment_author) . '给你的回复：<span style="color:#666;">' . trim($comment->comment_content) . '</span></p>
        </div>
        <div style="margin-top:64px;font-size:12px;line-height:1.5;color:#999;">
          <p>此信为系统邮件，请不要直接回复。</p>
          <p>&copy; ' . date('Y') . bloginfo('name') . '</p>
        </div>
      </div>
    </div>';
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail($to, $subject, $message, $headers);
  }
}

add_action('comment_post', 'comment_mail_notify');

// 文章评论自动加勾选栏
function add_checkbox() {
  echo '<input id="comment_mail_notify" name="comment_mail_notify" type="checkbox" value="comment_mail_notify" checked><label for="comment_mail_notify">回复时邮件通知我</label>';
}

add_action('comment_form', 'add_checkbox');

// 侧边栏显示近期评论
function recent_comments($no_comments = 10, $comment_len = 88) {
  $comments_query = new WP_Comment_Query();
  $comments = $comments_query->query(array('number' => $no_comments, 'status' => 'approve'));
  $comm = '';
  if ($comments) : foreach ($comments as $comment) :
    $comm .= '<li>' . '<div class="comment-author">' . mb_substr(ucfirst(get_comment_author($comment->comment_ID)), 0, 1, 'utf-8') . '</div>';
    $comm .= '<div class="comment-main">' . '<a href="' . get_comment_link($comment->comment_ID) . '">';
    $comm .= get_comment_author($comment->comment_ID) . '</a>';
    $comm .= '<p>' . mb_strimwidth(strip_tags(apply_filters('get_comment_text', $comment->comment_content)), 0, $comment_len, "…" ) . '</p></div></li>';
  endforeach; else :
    $comm .= '还没有近期评论。';
  endif;
  echo $comm;
}
?>