/*
Theme Name: Bizhongbio
Theme URI: https://github.com/bizhongbio/bizhongbio
Author: Bizhong Lan
Author URI: https://bizhong.github.io/
Description: Bizhongbio is a free, minimalistic, and responsive WordPress Blog Theme.
Version: 2.0.2
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: one-column, two-columns, left-sidebar, accessibility-ready, custom-header, custom-menu, featured-images, flexible-header, microformats, threaded-comments, blog
Text Domain: bizhongbio

This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
*/
$(function() {
    var pageName = $(document.body).attr('id');// 页面名称
    
    switch(pageName) {
        case 'home':// 首页
            handleHome();
            break;
        case 'category':// 分类目录页面
            handleCategory();
        case 'single':// 文章页面
        case 'search':// 搜索页面
        case 'tag':// 标签页面
            catHeaderFixed();
            break;
        default:// 其它
            console.log('Bizhongbio is a free, minimalistic, and responsive WordPress Blog Theme.');
    }

    // ------------------------------------------------------------------ 公共

    // 导航菜单显示与隐藏 手机端点击汉堡菜单按钮
    $('#btn-nav').on('click', function() {
        $('#header, #cat-header').toggleClass('show-nav');
        $('#btn-search').toggle();
        if ($('#header, #cat-header').hasClass('show-nav')) {
            $('#btn-nav i').removeClass('fa-navicon').addClass('fa-remove');
            $('body, html').on('touchmove', function(event) {
                event.preventDefault();
            });
        } else {
            $('#btn-nav i').removeClass('fa-remove').addClass('fa-navicon');
            $('body, html').off('touchmove');
        }
    });

    // 搜索框显示与隐藏 手机、平板端点击搜索按钮
    $('#btn-search').on('click', function() {
        $('#searchform').show();
        $('#s').focus();

        // 判断页面是否存在蒙层元素 存在，显示；否则创建
        if ($('#mask').length > 0) {
            $('#mask').show();
        } else {
            $('<div id="mask"></div>').appendTo('body');
        }
        $('body, html').on('touchmove', function(event) {
            event.preventDefault();
        });

        // 隐藏搜索框 点击蒙层
        $('#mask').on('click', function() {
            $('#searchform').css('display', '');
            $('#s').blur();
            $('#mask').hide();
            $('body, html').off('touchmove');
        });
    });

    // 分类目录头部固定 滚动条滚动全局头部高度以上，分类目录头部固定；否则不固定
    function catHeaderFixed() {
        var globalHeaderHeight = $('.global-header').height();
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > globalHeaderHeight) {
                $('#cat-header').addClass('cat-header-fixed');
            } else {
                $('#cat-header').removeClass('cat-header-fixed');
            }
        });
    }

    // 返回顶部按钮显示与隐藏 滚动条滚动600像素以上，返回顶部按钮出现；否则隐藏
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 600) {
            $('#go-top').fadeIn(300);
        } else {
            $('#go-top').fadeOut(300);
        }
    });

    // 返回顶部 点击返回顶部按钮
    $('#go-top').on('click', function(event) {
        $('body, html').animate({'scrollTop': '0'}, 600);
        event.preventDefault();
    });

    // ------------------------------------------------------------------ 首页

    // 首页处理主函数
    // - 轮播图（切换方式：自动、点击轮播图导航菜单、按下键盘左右方向键、触屏设备左右滑动）
    // - 加载下一页 点击加载更多按钮
    function handleHome() {
        var len = $('#hero-slides .slide').length,// 轮播图张数
            slideIndex = 1,// 当前轮播图索引
            timer = null,// 定时器
            startPosition = {},// 开始位置
            endPosition = {},// 结束位置
            isScrolling = -1, // 判断是水平滚动还是垂直滚动
            onloading = false;// 是否正在加载

        // 切换轮播图
        function slidesAnimation() {
            $('#hero-slides .slide').each(function(i) {
                $(this).eq(slideIndex).css('left', '0%').end().not(slideIndex).css('left', (-(slideIndex - i) * 100) + '%');
                $('.slides-nav a').eq(slideIndex).addClass('current').siblings().removeClass('current');
            });
            slideIndex >= len - 1 ? slideIndex = 0 : slideIndex++;
        }

        // 切换轮播图 自动
        timer = setInterval(slidesAnimation, 6000);

        // 切换轮播图 点击轮播图导航菜单
        $('.slides-nav a').each(function() {
            $(this).on('click', function(event) {
                clearInterval(timer);
                slideIndex = $(this).index();
                slidesAnimation();
                event.preventDefault();
            });
        });

        // 切换轮播图 按下键盘左右方向键
        $(document).on('keydown', function(event) {
            switch(event.keyCode) {
                case 37:// 左方向键
                    clearInterval(timer);
                    slideIndex >= 2 ? slideIndex -= 2 : slideIndex += 2;
                    slidesAnimation();
                    break;
                case 39:// 右方向键
                    clearInterval(timer);
                    slidesAnimation();
                    break;
            }
        });

        // 切换轮播图 触屏设备左右滑动
        // - 滑动开始
        $('#hero-slides').on('touchstart', function(event) {
            var touch = event.targetTouches[0];
            startPosition = {
                x: touch.pageX,
                y: touch.pageY
            };
        });

        // - 滑动
        $('#hero-slides').on('touchmove', function(event) {
            if (event.targetTouches.length === 1) {
                var touch = event.targetTouches[0];
                endPosition = {
                    x: touch.pageX - startPosition.x,
                    y: touch.pageY - startPosition.y
                };
                isScrolling = Math.abs(endPosition.x) > Math.abs(endPosition.y) ? 0 : 1;// 0：水平滚动，1：垂直滚动
                if (isScrolling === 0) {// 水平滚动
                    event.preventDefault();
                }
            }
        });

        // - 滑动释放
        $('#hero-slides').on('touchend', function(event) {
            if (isScrolling === 0) {// 水平滚动
                if (endPosition.x > 10) {// 右滑
                    clearInterval(timer);
                    slideIndex >= 2 ? slideIndex -= 2 : slideIndex += 2;
                    slidesAnimation();
                } else if (endPosition.x < -10) {// 左滑
                    clearInterval(timer);
                    slidesAnimation();
                }
            }
        });

        // 判断是否含有下一页
        if (!$('.load-more a').length) {
            $('.load-more').remove();
        }
    
        // 加载下一页 点击加载更多按钮
        $('.main').on('click', '.load-more a', function() {
            if (onloading) {
                return false;
            } else {
                $.ajax({
                    type: 'get',
                    url: $(this).attr('href'),
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        $('.load-more').find('a').text('正在加载');
                        onloading = true;
                    },
                    error: function(request) {
                        console.log(request.responseText);
                    },
                    statusCode: {
                        404: function() {
                            console.log('404');
                        }
                    },
                    success: function(data) {
                        // 获取文章所在的 DOM 及下一页链接
                        var result = $(data).find('.articles .article');
                        var nextHref = $(data).find('.load-more a').attr('href');

                        // 渐显新内容
                        $('.load-more').before(result.fadeIn(400));
                        $('.load-more').find('a').text('加载更多');
                        if (nextHref != undefined) {
                            $('.load-more a').attr('href', nextHref);
                        } else {// 若没有链接，即为最后一页
                            $('.load-more').remove();
                        }
                        onloading = false;
                    }
                });
            }
            return false;
        });
    }

    // ------------------------------------------------------------------ 分类目录页面

    // 分类目录页面处理主函数
    // - 自动加载更多 滚动条接近页面底部
    function handleCategory() {
        var onloading = false;// 是否正在加载

        // 判断是否含有下一页
        if (!$('.load-more a').length) {
            $('.load-more').remove();
        }

        // 加载下一页 点击加载更多按钮
        $('.main').on('click', '.load-more a', function() {
            if (onloading) {
                return false;
            } else {
                $.ajax({
                    type: 'get',
                    url: $(this).attr('href'),
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        $('.load-more i').show();
                        onloading = true;
                    },
                    error: function(request) {
                        console.log(request.responseText);
                    },
                    statusCode: {
                        404: function() {
                            console.log('404');
                        }
                    },
                    success: function(data) {
                        // 获取文章所在的 DOM 及下一页链接
                        var result = $(data).find('.posts .post');
                        var nextHref = $(data).find('.load-more a').attr('href');

                        // 渐显新内容
                        $('.load-more').before(result.fadeIn(400));
                        $('.load-more i').hide();
                        if (nextHref != undefined) {
                            $('.load-more a').attr('href', nextHref);
                        } else {// 若没有链接，即为最后一页
                            $('.load-more').remove();
                        }
                        onloading = false;
                    }
                });
            }
            return false;
        });

        // 自动加载更多 滚动条接近页面底部
        $(window).on('scroll', function() {
            var windowHeight = $(this).height(),
                documentHeight = $(document).height(),
                footerHeight = $('.footer').height();

            if ($(document).scrollTop() + windowHeight > documentHeight - footerHeight) {
                if (onloading) {
                    return false;
                } else {// 自动触发点击加载下一页
                    $('.load-more a').click();
                }
            }
        });
    }
});