$(function() {
  switch ($(document.body).attr('id')) {// 页面名称
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
    $('#searchform').fadeIn(300);
    $('#s').focus();

    // 判断页面是否存在蒙层元素 存在，显示；否则创建
    if ($('#mask').length > 0) {
      $('#mask').fadeIn(300);
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
      $('#mask').fadeOut(150);
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

  // 返回顶部按钮显示与隐藏 滚动条滚动 600 像素以上，返回顶部按钮出现；否则隐藏
  $(window).on('scroll', function() {
    if ($(this).scrollTop() > 600) {
      $('#go-top').fadeIn(300);
    } else {
      $('#go-top').fadeOut(150);
    }
  });

  // 返回顶部 点击返回顶部按钮
  $('#go-top').on('click', function(event) {
    $('body, html').animate({'scrollTop': '0'}, 600);
    event.preventDefault();
  });

  // ------------------------------------------------------------------ 首页

  // 首页处理主函数
  // - 加载下一页 点击加载更多按钮
  function handleHome() {
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
            var result = $(data).find('.articles .article'),
                nextHref = $(data).find('.load-more a').attr('href');

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
            var result = $(data).find('.posts .post'),
                nextHref = $(data).find('.load-more a').attr('href');

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