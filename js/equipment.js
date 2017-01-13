/**
 * Created by Administrator on 2016/12/23.
 */
//    **************
//$ (function ()
//{
//    $ ('.all .angle img').click (function ()
//    {
//        $ ('.masking').show ();
//        $('.project-classify').show ();
//        $('.project-downtown').hide ();
//    })
//})
////********接口全局变量********
var APINAME = {
    getEquipment: "get_all_products_by_area_cate_issale", //设备材料列表
    //getArea: "get_area" //获取地址信息
};
var API = {
    getEquipment: HOST + "index.php?c=MallGoods&a=get_all_products_by_area_cate_issale",//设备材料列表
    getArea: HOST + "mobile.php?c=index&a=get_area" //获取地址信息
};
//*****************
$ (function ()
{
    $ ('.all .classify').click (function ()
    {
        $ ('.masking').show ();
        $('.project-classify').show ();
        $('.project-downtown').hide ();
    })
})
////*************************
$ (function ()
{
    $ ('.project-classify .home-decoration a').click (function ()
    {
        $ ('.masking').show ();
        $('.equipment-material').show ();
    })
})
//************************
    $ ('.equipment-decorate a').click (function ()
    {
        $ ('.masking').show ();
        $('.equipment-machine').show ();
    })

//********************
$ (function ()
{
//    $ ('.equipment-splice a').click (function ()
//    {
//        $ ('.masking').hide ();
//        $('.equipment-material').hide ();
//        $('.project-classify').hide ();
//        $('.equipment-machine').hide ();
//    })
})

//    ************
$ (function ()
{
    $ ('.city .corner img').click (function ()
    {
        $ ('.masking').show ();
        $('.project-downtown').show ();
        $('.project-classify').hide ();
        $('.equipment-machine').hide ();
        $('.equipment-material').hide ();
    })
})
//    ************
$ (function ()
{
    $ ('.city .downtown').click (function ()
    {
        $ ('.masking').show ();
        $('.project-downtown').show ();
        $('.project-classify').hide ();
        $('.equipment-machine').hide ();
        $('.equipment-material').hide ();
    })
})
//*******地区************
$('.project-downtown li a').click(function () {
    var alist = $('.project-downtown li a');
    for (var i = 0; i < alist.length; i++) {
        $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
    }
    $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
    $(".masking,.project-downtown").hide();
})
//****************
//    $ (function ()
//    {
//        $ ('.project-downtown .home-decoration a').click (function ()
//        {
//            $ ('.masking').hide ();
//            $('.project-downtown').hide ();
//        })
//    });
$ (function ()
{
    $ ('.masking').click (function ()
    {
        $ ('.masking').hide ();
        $('.project-downtown').hide ();
        $('.project-classify').hide ();
        $('.equipment-material').hide ();
        $('.equipment-machine').hide ();
    })
});
//    *********接口*********
//    *************
$(document).ready(function() {
    var area_id=1;
    var Is_sale=0;
//  var url ="http://tcw.huikenet.com/index.php?c=goods&a=get_all_goods&checkInfo";
    $.ajax({
        type: "POST",
        url:API.getEquipment ,
        data: {checkInfo:tool.getCheckInfo(APINAME.getEquipment),area_id:area_id,Is_sale:Is_sale},
        dataType: "json",
        jsonp:"callback",
        success:comm_success,
    });
});
//将返回的数据添加到 列表里显示出来；
function comm_success(data) {
//    var j= statusCode;
    //list是否为空  这里判断有问题待改进
    if (data.list != "" && data.list != "null") {
        var dataList = data["list"];
        console.log(dataList);
        //接收数据
        $.each(dataList, function (i) {
            var content1 =
                "<li>" + "<a href='#'>" + dataList[i].is_sale + "</a>" + "</li>"
                + "<li>" + "<a href='#'>" + dataList[i].is_sale + "</a>" + "</li>"
                + "<li class='equipment-decorate'>" + "<a href='#'>"
                + dataList[i].is_sale + "</a>" + "</li>"

            var content2 =
                "<li>" + "<a href='#'>" + dataList[i].is_sale + "</a>" + "</li>"
                + "<li>" + "<a href='#'>" + dataList[i].is_sale + "</a>" + "</li>"
                + "<li class='equipment-splice'>" + "<a href='#'>"
                + dataList[i].is_sale + "</a>" + "</li>"
            $(".equipment-machine").append(content2);
            $(".equipment-material").append(content1);

        });
    } else {
        $("#goods_detail").html("<li>未找到商品信息!</li>");//提示信息
    }
    $('.equipment-decorate a').click(function () {
        $('.masking').show();
        $('.equipment-machine').show();
    })

    $("#info").css("display", "none");
    $ (function ()
    {
                   $('.project-classify li a').click(function () {
                var alist = $('.project-classify li a');
                for (var i = 0; i <alist.length; i++) {
                    $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
                }
                $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
                       $(".equipment-material").show();
        })
        //**************分类二***********
        $('.equipment-material li a').click(function () {
            var alist = $('.equipment-material li a');
            for (var i = 0; i <alist.length; i++) {
                $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
            }
            $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
            $(".equipment-machine").show();
        })
        //*******分类三*******
        $('.equipment-machine li a').click(function () {
            var alist = $('.equipment-machine li a');
            for (var i = 0; i <alist.length; i++) {
                $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
            }
            $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
            $("ul,.masking").hide();
        })
    })


}
//************************
var hasNext = true,page_index = 1;
var goodListVue = new Vue({
    el: '#goodList',
    data: {
        goodList: [],
        hasNext: hasNext,
        isLoading: true
    },
    methods:{
        loadMore: loadMore
    },
    ready: function(){
        $(this.$el).removeClass("display-none");
        locations.getlocaltionArea(function(area) {
            if (area) {
                getData(area.city.id);
                $("#location").html(area.city.name);
            } else {
                getData(1);
                $("#location").html("全国");
            }
        });

//              var area = locations.getAreaFromSession();
//                if (city) {
//          $("#location").html(area.city.name);
//          getData(area.city.id);
//          return;
//        }
//              getNowPosition(function(address){
//            // address里面的参数自己查看，省市区都有，自己获取
//            if (address != null) {
//              $("#location").html(address.city);
//              locations.getAreaId(address, function(cityId){
//                getData(cityId);
//              });
//          }
//          });
    }
});
function loadMore(){
    goodListVue.$set("isLoading", true);
    hasNext && getData(1);
}

// 获取首页推荐数据
function getData(pid){
    jQuery.ajax({
        type: "GET",
        url: API.getEquipment,
        data: {checkInfo:tool.getCheckInfo(APINAME.getEquipment),area_id:1,page_size: 5, page_index: page_index},
        dataType: "json",
        jsonp:"callback",
        success:function(data){
            effects.loadingRemove(".goods");
            goodListVue.$set("isLoading", false);
            if(data.statusCode) {
                goodListVue.$set("goodList", goodListVue.$get("goodList").concat(data.list));
                if(data.list.length < 2) {
                    hasNext = false;
                    goodListVue.$set("hasNext", false);
                } else {
                    page_index++;
                }
            } else {
                effects.toast(data.message);
            }
        },
        error: function (data) {
            effects.loadingRemove(".goods");
            effects.toast("未知错误");
        }
    });
}