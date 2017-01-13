/**
 * Created by Administrator on 2016/12/26.
 */
//********供求全局接口变量***********
var APINAME = {
    getSupplyDemand: "my_supply", //获取供求资料
    getArea: "search_supply", //供求列表
    getclassify:'supply_cat',//供求分类
};
var API = {
    getSupplyDemand: HOST + "mobile.php?c=index&a=my_supply", //获取供求资料
    getArea: HOST + "mobile.php?c=searchlist&a=search_supply" ,//供求列表
    getclassify: HOST +"mobile.php?c=index&a=supply_cat",//供求分类
};
    //    *********接口*********
//    ******求购*******
$(document).ready(function(){
    var newDate = new Date();
    var start=1;
    var limit=10;
    var is_true=1;
    $.ajax({
        type: "POST",
        url:API.getArea,
        data: {checkInfo:tool.getCheckInfo(APINAME.getArea),start:start,limit:limit,is_true:is_true},
        dataType: "json",
        jsonp:"callback",
        //success:comm_success,
        success:function (data) {
            //console.log(Date.now().toString());
            //return data;
            var dataList = data['data'];
            console.log(dataList);
            $.each(dataList, function(i) {
                var ul_content = '<div class="supply-demand-rolled-steel">'
                    + '<a href="supply-demand-particulars.html">'
                    + '<div class="supply-demand-rolled">'
                    + "<img src='" + HOST + dataList[i].img_url + " ' alt=''/>"
                    + "<ul>"
                    + "<li class='second-ring'>" + dataList[i].title
                    + "</li>"
                    + "<li class='water-storage'>" + dataList[i].desc + "</li>"
                    + "<li class='star'>"
                    + "<img src='images/supply-demand/five-stars.png' alt=''/>"
                    + "</li>"
                    + "<li class='limited-company'>" + dataList[i].name
                    + "</li>" + "</ul>" + "</div>"
                    + '<div class="orientation">'
                    + '<img src="images/supply-demand/coordinate.png" alt=""/>'
                    + '<span class=" district">'
                    + dataList[i].area + '</span>'
                    + '<span class="meter">' + "<100米"
                    + '</span>' + '</div>' + '</a>' + '</div>'
                $(".mountains1").append(ul_content);
            })
        },
    });
});

//*********供求信息*****
$(document).ready(function(){
    var newDate = new Date();
    var start=1;
    //var limit=10;
    var limit=10;
    var is_true=0;
    $.ajax({
        type: "POST",
        url:API.getArea,
        data: {checkInfo:tool.getCheckInfo(APINAME.getArea),start:start,limit:limit,is_true:is_true},
        dataType: "json",
        jsonp:"callback",
        //:comm_success,
        success: function (data) {
            //console.log(Date.now().toString());
            //return data;
            var dataList = data['data'];
            console.log(dataList);
            //接收数据
            $.each(dataList, function(i){
                //*****供求******
                var content='<div class="supply-demand-rolled-steel">'
                    +'<a href="supply-demand-particulars.html">'
                    +'<div class="supply-demand-rolled">'
                    +"<img src='"+HOST+dataList[i].img_url +" ' alt=''/>"
                    +"<ul>"
                    +"<li class='second-ring'>"+dataList[i].title
                    +"</li>"
                    +"<li class='water-storage'>"+dataList[i].name+"</li>"
                    +"<li class='star'>"
                    +"<img src='images/supply-demand/five-stars.png' alt=''/>"
                    +"</li>"
                    +"<li class='limited-company'>"+dataList[i].partner_id
                    +"</li>"+"</ul>"+"</div>"
                    +'<div class="orientation">'
                    +'<img src="images/supply-demand/coordinate.png" alt=""/>'
                    +'<span class=" district">'
                    +dataList[i].area+'</span>'+'<span class="meter">'+"<100米"
                    +'</span>'+'</div>'+'</a>'+'</div>'
                $(".mountains").append(content);
                $(".weui-loadmore").css("display","none");
            });
        },
    });
});
//将返回的数据添加到 列表里显示出来；
    $ ('.ask-buy a').click (function ()
    {
        $ ('.supply a').css ("border-bottom","none");
        $('.ask-buy a').css ("border-bottom","5px solid #E27100");
        $ ('.mountains1').show();
        $ ('.wood').show ();
    })
$(document).ready(function(){
    var supply_id=10;
    var dotype="gain";
    $.ajax({
        type: "POST",
        url:API.getSupplyDemand,
        data: {checkInfo:tool.getCheckInfo(APINAME.getSupplyDemand),dotype:dotype,supply_id:supply_id},
        dataType: "json",
        jsonp:"callback",
        //:comm_success,
        success: function (data) {

        },
    });
});
//********一级分类*****
$(document).ready(function(){
    var pid=0;
    $.ajax({
        type: "POST",
        url:API.getclassify,
        data: {checkInfo:tool.getCheckInfo(APINAME.getclassify),pid:pid},
        dataType: "json",
        jsonp:"callback",
        //:comm_success,
        success: function (data) {
            //console.log(Date.now().toString());
            //return data;
            var dataList = data['data'];
            console.log(dataList);
            //接收数据
            $.each(dataList, function(i){
                var s =dataList[i].cate_id;
                console.log(s);
                //*****供求******
                var content='<li class="classify1">'
                    +'<a>'+dataList[i].cate_name
                    +'</a>'+'</li>'
                    + '</ul>'
                $(".project-classify").append(content);
                //*********二级分类*******
                $(document).ready(function(){
                    var pid=s;
                    $.ajax({
                        type: "POST",
                        url:API.getclassify,
                        data: {checkInfo:tool.getCheckInfo(APINAME.getclassify),pid:pid},
                        dataType: "json",
                        jsonp:"callback",
                        //:comm_success,
                        success: function (data) {
                            var dataList = data['data'];
                            console.log(dataList);
                            $.each(dataList, function(i) {
                                var s = dataList[i].cate_id;
                                var n =dataList[i].cate_id;
                                console.log(s);
                                var content ='<li class="classify2">'
                                    +'<a>' + dataList[i].cate_name
                                    + '</a>'+'</li>'
                                //************
                                $(".equipment-material").append(content);
                                //********三级分类*********
                                $(document).ready(function(){
                                    var pid=n;
                                    $.ajax({
                                        type: "POST",
                                        url:API.getclassify,
                                        data: {checkInfo:tool.getCheckInfo(APINAME.getclassify),pid:pid},
                                        dataType: "json",
                                        jsonp:"callback",
                                        //:comm_success,
                                        success: function (data) {
                                            var dataList = data['data'];
                                            $.each(dataList, function(i) {
                                                var content ='<li class="classify3">'
                                                    +'<a>' + dataList[i].cate_name
                                                    + '</a>'+'</li>'
                                                $(".equipment-machine").append(content);
                                            });
                                            //*******分类三*******
                                            $('.equipment-machine li a').click(function () {
                                                var alist = $('.equipment-machine li a');
                                                for (var i = 0; i <alist.length; i++) {
                                                    $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
                                                }
                                                $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
                                                $(" .project-classify,.equipment-material,.equipment-machine,.masking").hide();

                                            })
                                        },
                                    });
                                });

                            });
                            //**************分类二***********
                            $('.equipment-material li a').click(function () {
                                var alist = $('.equipment-material li a');
                                for (var i = 0; i <alist.length; i++) {
                                    $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
                                }
                                $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
                                $(".equipment-machine").show();
                            })
                        },
                    });
                });
            });
            $ (function ()
            {
                //**********分类一**************
                $('.project-classify li a').click(function () {
                    var alist = $('.project-classify li a');
                    for (var i = 0; i <alist.length; i++) {
                        $(alist[i]).css({"border-bottom": "3px solid #FFF", "color": "#000"});
                    }
                    $(this).css({"border-bottom": "3px solid #D16814", "color": "#D16814"})
                    $(".equipment-material").show();
                })
            })
        },
    });
});
$(function (){
    $(".classify").click(function (){
        $(".project-classify").show();
        $(".project-downtown").hide();
        $(".masking").show();
    })
    $(".masking").click(function (){
        $(".project-classify,.equipment-material,.equipment-machine,.masking,.masking").hide();
    })
    $(".downtown").click(function (){
        $(".project-downtown").show();
        $(".project-classify").hide();
        $(".masking").show();
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

