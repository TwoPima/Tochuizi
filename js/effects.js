/*
 * 过渡动画
 * @author sandy
 */
var effects = {};
    //toast 提示
    effects.toast = function(message){
        $(".toast").remove();

        $('<div class="toast">'+message+'</div>').appendTo("body");

        setTimeout(function(){
            $(".toast").remove();
        }, 2000);
    };

    //过渡动画
    effects.loading = function (selector) {
        var tpl = '<div class="loader-inner ball-pulse" style="text-align: center;"><div></div><div></div><div></div></div>';
        $(selector).prepend(tpl);
    };

    //清除过渡动画
    effects.loadingRemove = function (selector) {
        $(selector).find(".loader-inner").remove();
    };