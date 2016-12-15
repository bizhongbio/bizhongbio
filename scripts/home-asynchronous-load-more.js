$(document).ready(function(){
    // 首页ajax翻页
    if(!$(".load-more a").length){
        $(".load-more").remove();// 判断是否含有下一页
    }
    // 是否正在加载
    var onloading = false;
    $(".main").on("click",".load-more a",function(){
        if(onloading){
            return false;
        }else{
            $.ajax({
                type: "get",
                url: $(this).attr("href"),
                beforeSend: function(xhr){
                    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                    $(".load-more").find("a").text("正在加载");
                    onloading = true;
                },
                error: function(request){
                    console.log(request.responseText);
                },
                statusCode: {
                     404: function(){
                         console.log("404");
                     }
                },
                success: function(data){
                    // 获取文章所在的DOM及下一页链接
                    var result = $(data).find(".articles .article");
                    var nextHref = $(data).find(".load-more a").attr("href");
                    // 渐显新内容
                    $(".load-more").before(result.fadeIn(400));       
                    $(".load-more").find("a").text("加载更多");
                    if(nextHref != undefined){
                        $(".load-more a").attr("href", nextHref);
                    }else{// 若没有链接，即为最后一页，则移除导航
                        $(".load-more").remove();
                    }
                    onloading = false;
                }
            });
        }
        return false;
    });
});