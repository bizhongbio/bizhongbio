# Bizhongbio

Bizhongbio 是一个免费、简约、响应式的 WordPress 博客主题。

> Bizhongbio is a free, minimalistic, and responsive WordPress Blog Theme.

### 文档目录

- [后台设置](#后台设置)
- [手动修改](#手动修改)
- [更新记录](#更新记录)
- [版权信息](#版权信息)

## 后台设置

### 文章

- 分类目录

添加新分类目录，为导航菜单做准备。

### 外观

- 菜单

添加一级菜单（主菜单，菜单名：`nav`），形如：

![一级菜单][1]

添加二级菜单（文章分类目录菜单，菜单名：`cat-nav`），形如：

![二级菜单][2]

### 插件

- 安装插件

搜索安装以下插件：

- [x] Baidu Sitemap Generator
- [x] Crayon Syntax Highlighter
- [x] Google XML Sitemaps

### 设置

- 常规

填写以下信息：

> * 站点标题
> * 副标题
> * WordPress 地址（URL）
> * 站点地址（URL）
> * 电子邮件地址

- 撰写

将以下服务 URL 加入更新服务中：

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
- 多媒体

![多媒体][3]

- 固定链接

“固定连接设置”中，可以为您的永久链接和存档建立自定义 URL 结构。我选择的是“自定义结构”，填写：`/%postname%.html`。

- Baidu-Sitemap

![Baidu Sitemap Generator][4]

- Crayon

![Crayon Syntax Highlighter][5]

- XML-Sitemap

![Google XML Sitemaps][6]

## 手动修改

打开项目文件手动修改（或直接登录后台，点击“外观”下的“编辑”）：

- 关于

在**关于页面模板** `about.php` 文件中第**9~25**行修改即可。

- 友情链接

在**主题页脚** `footer.php` 文件中第**6**行添加即可。

- GitHub 地址

- 在**边栏** `sidebar.php` 文件中第**3**行修改即可。

- 网站描述（description）

- 在 **模版函数** `functions.php` 文件中第**76~112**行修改即可。

- 网站关键字（keywords）

- 在 **模版函数** `functions.php` 文件中第**115~157**行修改即可。

- 按需加载 Crayon Syntax Highlighter 插件

**插件版本、主题设置不同等原因需要做相应修改！**

- 在**模版函数** `functions.php` 文件中第**279~285**行修改即可。

## 更新记录

- 2.0.3 更新代码，代码统一缩进2个空格 [2017-09-15]
- 2.0.2 修复 Bug，整合 JS 文件（统一用 jQuery） [2017-09-12]
- 2.0.1 修复 Bug，更新主题图标，增加主题声明 [2017-09-09]
- 2.0.0 开源 Bizhongbio 主题 [2016-12-15]

## 版权信息

© 2016 Bizhongbio. Power by WordPress, Made by Bizhong Lan.

  [1]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/nav-menus-nav.png
  [2]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/nav-menus-cat-nav.png
  [3]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/options-media.png
  [4]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/baidu-sitemap.png
  [5]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/crayon-syntax-highlighter.png
  [6]: https://github.com/bizhongbio/resources/blob/master/images/bizhongbio/google-xml-sitemaps.png