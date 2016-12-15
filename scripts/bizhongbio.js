function main(){
    var $ = function(id){
        return document.getElementById(id);
    };

    var onoscroll = $("home") || $("category") || $("page") ||$("single") || $("archive") || $("search") || $("tag") || $("404") || $("feed"),
        oBody = document.body || document.getElementsByTagName('body')[0],
        oHeader = $('header') || $('cat-header'),
        oHeaderW = oHeader.getElementsByTagName('div')[0].offsetWidth,
        oNav = $('btn-nav'),
        oMenuNav = oHeader.getElementsByTagName('ul')[0] || $('menu-cat-nav'),
        oShowNav = true,
        oSearch = $('btn-search'),
        oSearchform = $('searchform'),
        oSearchInput = $('s'),
        oGoTop = $('go-top'),
        screenWidth = document.documentElement.clientWidth || document.body.clientWidth,
        screenHeight = document.documentElement.clientHeight || document.body.clientHeight;

    var addEvent = function(obj,event,fn){
        if(obj.addEventListener){
            obj.addEventListener(event,fn,false);
        }else if(obj.attachEvent){
            obj.attachEvent('on'+event,fn);
        }
    };

    //首页图片轮播
    var slides = function(){
        var oPerNum = oSlideIndex,
            oNextNum = len - 1 - oSlideIndex;
        oSlideAll[oSlideIndex].style.left = '0%';
        for(var i = 0; i < oPerNum; i++){
            oSlideAll[i].style.left = (-(oPerNum - i) * 100) + '%';
        }
        for(var j = oSlideIndex + 1; j < len; j++){
            oSlideAll[j].style.left = ((j - oSlideIndex) * 100) + '%';
        }
        for(var k = 0; k < items; k++){
            if(k == oSlideIndex){
                oSlidesNavAll[k].className = 'current';
            }else{
                oSlidesNavAll[k].removeAttribute('class');
            }
        }
        oSlideIndex >= len - 1 ? oSlideIndex = 0 : oSlideIndex++;
    };

    if($('home')){
        var oSlides = $('hero-slides'),
            oSlideAll = oSlides.getElementsByTagName('section'),
            len = oSlideAll.length,
            oSlidesNav = oSlides.getElementsByTagName('nav')[0],
            oSlidesNavAll = oSlidesNav.getElementsByTagName('a'),
            items = oSlidesNavAll.length,
            oSlideIndex = 1,
            timer = setInterval(slides, 6000);
        oSlides.onmouseover = function(){// 鼠标移入时触发
            clearInterval(timer);
        };
        oSlides.onmouseout = function(){// 鼠标移出时触发
            timer = setInterval(slides,6000);
        };
        for(var i = 0; i < items; i++){
            oSlidesNavAll[i].index = i;
            oSlidesNavAll[i].onclick = function(e){// 点击切换
                clearInterval(timer);
                oSlideIndex = this.index;
                slides();
                stopDefault(e);
            };
        }
        document.onkeydown = function(event){// 按键盘左右键时触发
            var e = event || window.event || arguments.callee.caller.arguments[0];
            if(e && e.keyCode == 37){// 键盘左键
                clearInterval(timer);
                oSlideIndex >= 2 ? oSlideIndex -= 2 : oSlideIndex += 2;
                slides();
            }
            if(e && e.keyCode == 39){// 键盘右键
                clearInterval(timer);
                slides();
            }
        };
        // 移动端左右滑动事件
    }

    // 搜索框的显示与隐藏
    var showSearch = function(){
        if(screenWidth <= 1023){
            oSearchform.style.cssText = 'display:block;';
            oSearchInput.style.width = (oHeaderW - 32) + 'px';
            oSearchInput.focus();
            var oMask = document.createElement('div');
            oMask.id = 'mask';
            oBody.appendChild(oMask);
            oSearchInput.onclick = function(e){
                cancelBubble(e);
            };
            $('mask').onclick = function(){
                oSearchform.style.cssText = '';
                oSearchInput.style.width = 'auto';
                oSearchInput.blur();
                oBody.removeChild(oMask);
            };
        }
    };

    // 阻止元素默认行为
    var stopDefault = function(e){
        if(e && e.preventDefault){// 非IE
            e.preventDefault();
        }else{// IE
            window.event.returnValue = false;
        }
        return false;
    };

    // 阻止冒泡事件
    var cancelBubble = function(e){
        if(e && e.stopPropagation){// 非IE
            e.stopPropagation();
        }else{// IE
            window.event.cancelBubble = true;
        }
        return false;
    };

    // 导航的显示与隐藏
    var showNav = function(){
        if(screenWidth <= 767){
            var oNavIcon = oNav.getElementsByTagName('i')[0];
            if(oShowNav){
                oMenuNav.style.height = '321px';
                oNavIcon.className = 'fa fa-remove';
                oSearch.style.display = 'none';
                if($('menu-cat-nav')){
                    $('menu-cat-nav').style.top = '48px';
                }
                var oMask = document.createElement('div');
                oMask.id = 'mask';
                oBody.appendChild(oMask);
                oShowNav = false;
                $('mask').onclick = function(){
                    oMenuNav.style.height = '0px';
                    oNavIcon.className = 'fa fa-navicon';
                    oSearch.style.cssText = '';
                    oBody.removeChild(oMask);
                    oShowNav = true;
                };
            }else{
                oMenuNav.style.height = '0px';
                oNavIcon.className = 'fa fa-navicon';
                oSearch.style.cssText = '';
                oBody.removeChild($('mask'));
                oShowNav = true;
            }
        }
    };

    // 滚动特效
    var scrollEvevt = function(){
        var scrollHeight = document.documentElement.scrollTop || document.body.scrollTop;
        // 返回顶部
        if(scrollHeight >= 900){
            oGoTop.style.display = 'block';
        }else{
            oGoTop.style.display = 'none';
        }
        if($('category') || $('tag') || $('search') || $('single')){
            var oMenuCatNav = $('menu-cat-nav');
            if(scrollHeight >= 32){
                oHeader.className = 'cat-header-fixed';
                oMenuCatNav.style.top = '48px';
            }else{
                oHeader.className = 'cat-header';
                oMenuCatNav.style.top = '80px';
            }
        }
    };

    addEvent(oSearch,'click',function(){
        showSearch();
    });

    addEvent(oNav,'click',function(){
        showNav();
    });

    addEvent(window,'scroll',function(){
        scrollEvevt();
    });

    addEvent(window,'resize',function(){
        screenWidth = document.documentElement.clientWidth || document.body.clientWidth;
        screenHeight = document.documentElement.clientHeight || document.body.clientHeight;
        oHeaderW = oHeader.getElementsByTagName('div')[0].offsetWidth;
        scrollEvevt();
    });
}

document.addEventListener('DOMContentLoaded', main, false);