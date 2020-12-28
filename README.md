# Bizhongbio

**Author**: LAN Bizhong  
**Version**: 2.1.5  
**License**: GNU General Public License v2 or later  
**License URI**: http://www.gnu.org/licenses/gpl-2.0.html  
**Tags**: blog, one-column, two-columns, left-sidebar, custom-header, custom-menu, featured-images, flexible-header, full-width-template, microformats, threaded-comments

## 简单介绍

Bizhongbio 是一个免费、简约、响应式的 WordPress 博客主题。

- [无图片轮播版](https://github.com/bizhongbio/bizhongbio/tree/master)（master 分支）

![无图片轮播版首页](/_images/screenshot_home.png)

- [图片轮播版](https://github.com/bizhongbio/bizhongbio/tree/develop)（develop 分支）

![图片轮播版首页](/_images/screenshot_home-slides.png)

## 环境准备

### [WordPress 新手入门指南](https://www.wpdaxue.com/tutorials/start/)

WordPress 新手入门指南（包括 WordPress 简介、安装、后台功能介绍以及基础设置等），帮助新手朋友快速了解 WordPress。

### [WordPress 本地环境搭建](http://jingyan.baidu.com/article/90bc8fc82098def653640c88.html)

> [XAMPP](https://www.apachefriends.org/zh_cn/index.html)  
> [WordPress](https://cn.wordpress.org/)

### 主题下载

- [无图片轮播版](https://github.com/bizhongbio/bizhongbio/archive/master.zip)
- [图片轮播版](https://github.com/bizhongbio/bizhongbio/archive/develop.zip)

## 后台设置

### 分类目录（不支持多层级）

_文章 ▸ 分类目录_

添加分类目录，形如：

![分类目录](/_images/edit-tags_category.png)

### 菜单（不支持多层级）

_外观 ▸ 菜单_

添加主菜单（菜单名称：**nav**），形如：

![主菜单](/_images/nav-menus_nav.png)

添加文章分类目录菜单（菜单名称：**cat-nav**），形如：

![文章分类目录菜单](/_images/nav-menus_cat-nav.png)

**注意**：主菜单名称必须为“nav”，文章分类目录菜单名称必须为“cat-nav”。

### 安装插件

_插件 ▸ 安装插件_

- 代码高亮：Crayon Syntax Highlighter
- 百度网站地图：Baidu Sitemap Generator
- Google 网站地图：Google XML Sitemaps

### 常规

_设置 ▸ 常规_

添加站点标题、副标题、WordPress 地址（URL）、站点地址（URL）和电子邮件地址，形如：

![常规](/_images/options-general.png)

### 撰写

_设置 ▸ 撰写_

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

_设置 ▸ 多媒体_

![多媒体](/_images/options-media.png)

### 固定链接

_设置 ▸ 固定链接_

建议勾选“自定义结构”，设置为 `/%postname%.html`（文章别名）或 `/%category%/%postname%.html`（分类名/文章别名）。

### Baidu-Sitemap

_设置 ▸ Baidu-Sitemap_

教程：[WordPress 百度网站地图生成插件：Baidu Sitemap Generator](https://www.wpdaxue.com/baidu-sitemap-generator.html)

### Crayon

_设置 ▸ Crayon_

教程：[WordPress 代码高亮最强插件 Crayon Syntax Highlighter](http://www.511yj.com/wordpress-crayon-syntax.html)

### XML-Sitemap

_设置 ▸ XML-Sitemap_

教程：[WordPress GoogLe 网站地图生成插件：Google XML Sitemaps](https://www.wpdaxue.com/google-xml-sitemaps.html)

## 问题解答

### 如何修改网站描述（`<meta name="description" content="⋯⋯">`）？

> 找到模版函数（functions.php）文件，在第 76～102 行修改。

### 如何修改网站关键字（`<meta name="keywords" content="⋯⋯">`）？

> 找到模版函数（functions.php）文件，在第 105～137 行修改。

### 如何修改侧边栏的 GitHub 地址？

> 找到边栏（sidebar.php）文件，在第 4 行修改。

### 如何修改关于页面的标题、段落、图片和社交媒体？

> 找到关于页面模板（about.php）文件，在第 9～25 行修改。

### 如何添加底部的友情链接？

> 找到主题页脚（footer.php）文件，在第 6 行添加。

### 如何优化 Crayon Syntax Highlighter 插件（按需加载）？

> [WordPress 高亮插件：Crayon Syntax Highlighter 加载优化](https://zhangge.net/4834.html)  
> 按照教程，找到模版函数（functions.php）文件，在第 258～267 行替换按需加载 Crayon Syntax Highlighter 插件函数。

### 撰写文章时需要注意什么？

> 固定链接，建议命名：英文文章标题；  
> 特色图片，默认正方形尺寸：414 x 414；  
> 富文本编辑器，不要使用：插入“More”标签（`<!--more-->`）、一级标题（`<h1>`）、五级标题（`<h5>`）、六级标题（`<h6>`）和预格式化（`<pre>`）。

还有其它问题？提交一个 [issue](https://github.com/bizhongbio/bizhongbio/issues/new)。