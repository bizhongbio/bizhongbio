# Bizhongbio

**Author**: Lan Bizhong  
**Version**: 2.1.3  
**License**: GNU General Public License v2 or later  
**License URI**: http://www.gnu.org/licenses/gpl-2.0.html  
**Tags**: blog, one-column, two-columns, left-sidebar, custom-header, custom-menu, featured-images, flexible-header, full-width-template, microformats, threaded-comments

## 简介

Bizhongbio 是一个免费、简约、响应式的 WordPress 博客主题。

![首页](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/screenshot_home-slides.png)

## 环境准备

### [WordPress 新手入门指南](https://www.wpdaxue.com/tutorials/start/)

WordPress 新手入门指南，包括 WordPress 简介、安装、后台功能介绍以及基础设置等，帮助新手朋友快速了解 WordPress。

### [WordPress 本地环境搭建](http://jingyan.baidu.com/article/90bc8fc82098def653640c88.html)

> [XAMPP](https://www.apachefriends.org/zh_cn/index.html)  
> [WordPress](https://cn.wordpress.org/)

## 后台设置

### 分类目录

_文章 -> 分类目录_

添加分类目录，形如：

![分类目录](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/edit-tags_category.png)

### 菜单

_外观 -> 菜单_

添加主菜单（菜单名称：**nav**），形如：

![主菜单](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/nav-menus_nav.png)

添加文章分类目录菜单（菜单名称：**cat-nav**），形如：

![文章分类目录菜单](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/nav-menus_cat-nav.png)

**注意**：主菜单名称必须为“nav”，文章分类目录菜单名称必须为“cat-nav”。

### 安装插件

_插件 -> 安装插件_

- Crayon Syntax Highlighter（代码高亮）
- Baidu Sitemap Generator（百度网站地图）
- Google XML Sitemaps（Google 网站地图）

### 常规

_设置 -> 常规_

添加站点标题、副标题、WordPress 地址（URL）、站点地址（URL）、电子邮件地址，形如：

![常规](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/options-general.png)

### 撰写

_设置 -> 撰写_

更新服务中添加以下服务 URL：

```
http://rpc.pingomatic.com/
http://ping.baidu.com/ping/RPC2
http://blog.youdao.com/ping/RPC2
http://www.feedsky.com/api/RPC2
http://blog.iask.com/RPC2
http://www.zhuaxia.com/rpc/server.php
http://www.xianguo.com/xmlrpc/ping.php
http://ping.blog.qikoo.com/rpc2.php
```

### 多媒体

_设置 -> 多媒体_

![多媒体](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/options-media.png)

### 固定链接

_设置 -> 固定链接_

建议勾选“自定义结构”，设置为 `/%postname%.html`（文章别名） 或 `/%category%/%postname%.html`（分类名/文章别名）。

### Baidu-Sitemap

_设置 -> Baidu-Sitemap_

教程：[WordPress 百度网站地图生成插件：Baidu Sitemap Generator](https://www.wpdaxue.com/baidu-sitemap-generator.html)

### Crayon

_设置 -> Crayon_

教程：[WordPress 代码高亮最强插件 Crayon Syntax Highlighter](http://www.511yj.com/wordpress-crayon-syntax.html)

### XML-Sitemap

_设置 -> XML-Sitemap_

教程：[WordPress GoogLe 网站地图生成插件：Google XML Sitemaps](https://www.wpdaxue.com/google-xml-sitemaps.html)

## 常见问题解答

### 我该如何修改网站描述（`<meta name="description" content="⋯⋯">`）？

> 找到模版函数（functions.php）文件，在第 76～112 行修改。

### 我该如何修改网站关键字（`<meta name="keywords" content="⋯⋯">`）？

> 找到模版函数（functions.php）文件，在第 115～157 行修改。

### 我该如何修改侧边栏的 GitHub 地址？

> 找到边栏（sidebar.php）文件，在第 4 行修改。

### 我该如何修改关于页面的标题、段落、图片和社交媒体？

> 找到关于页面模板（about.php）文件，在第 9～25 行修改。

### 我该如何添加底部的友情链接？

> 找到主题页脚（footer.php）文件，在第 6 行添加。

### 我该如何优化 Crayon Syntax Highlighter 插件（按需加载）？

> [WordPress 高亮插件：Crayon Syntax Highlighter 加载优化](https://zhangge.net/4834.html)
> 按照教程，找到模版函数（functions.php）文件，在第 278～287 行替换按需加载 Crayon Syntax Highlighter 插件函数。

### 我在撰写新文章时需要注意什么？

> 特色图片，默认尺寸：414 x 414（正方形尺寸）。

以上还不能解答您的问题或您有建议的话，提交一个 [issue](https://github.com/bizhongbio/bizhongbio/issues) 给我！

## 版本说明

### 2.1.3

_2017-9-23_

- 使用百度静态资源公共库加载 Font Awesome、jQuery、HTML5 Shiv、Respond.js
- 修改首页文章、相关文章样式
- 修改特色图片默认大小（`full` => `414, 414, false`）
- 修改发送邮件模板，即 comment_mail_notify 函数
- 移除按需加载 Crayon Syntax Highlighter 插件函数
- 更新图片 screenshot.jpg、default.jpg

### 2.1.2

_2017-9-18_

- 修复已知问题，历史评论无法显示、关于页面模板图片地址错误等
- 修改样式，统一间距、推荐文章超出部分显示省略号等
- 修改百度分享

### 2.1.1

_2017-9-17_

- 修改样式，整合样式
- 修复 box-shadow 显示问题
- 404 页面响应式
- 文案统一

### 2.1.0

_2017-9-15_

- 新增 headDescription（网站描述）、headKeywords（关键字）、headUrl（URL）函数
- 代码统一缩进 2 个空格

### 2.0.9

_2017-9-12_

- 修改样式、蒙层显示与隐藏规则
- 新增未压缩的 style.css
- 整合 .js 文件

### 2.0.8

_2017-9-9_

- 修改关于页面模板标题、段落、图片
- 新增 fluid-icon、apple-touch-icon、icon、manifest、mask-icon 属性
- 新增主题出处声明
- PHP 代码统一用 `'`、空格

### 2.0.7

_2017-1-5_

- 修改版权信息，删除“版权所有 ”

### 2.0.6

_2017-1-4_

- 新增 LICENSE 文件、主题信息

### 2.0.5

_2016-12-27_

- 修改网站标题，改用站点标题 `bloginfo('name')`

### 2.0.4

_2016-12-26_

- 移除 font-awesome 文件夹下的 less 和 scss 子文件夹

### 2.0.3

_2016-12-25_

- 移除多余注释
- 修改关于页面模板段落文字、图片地址、社交媒体 `title`

### 2.0.2

_2016-12-23_

- 新增社交媒体 `meta`（Twitter Cards、Open Graph 和 Schema.org）

### 2.0.1

_2016-12-22_

- 修改引用外部脚本文件地址、友情链接地址、主题地址、GitHub 链接 `title`
- 重命名文件夹（scripts => js）
- 更新 [jQuery](http://jquery.com/download/) 版本到 v3.1.1
- 更新 [Respond.js](https://github.com/scottjehl/Respond) 版本到 v1.4.2
- 更新 [HTML5 Shiv](https://github.com/aFarkas/html5shiv) 版本到 v3.7.3
- 更新 [Font Awesome](http://fontawesome.io/) 版本到 v4.7.0
- 移除图片 bizhongbio.png

### 2.0.0

_2016-12-15_

- 初始发布（开源 Bizhongbio 主题）

## 赞赏

如果 Bizhongbio 主题对您有帮助，欢迎 Star 或打赏 ￥6.66（记得“添加留言”）。您的支持将鼓励我继续更新！

![微信支付](https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/weixin_pay.png)