/**
 * Created by Administrator on 2017/1/6.
 */
/**
 * Created by Administrator on 2016/12/26.
 */
//********供求全局接口变量***********
var APINAME = {
    getSupplyDemand: "hr_recruit_list", //招聘列表
    getArea: "hr_job_list", //求职列表
    getclassify:'recruit_cat',//招聘分类
};
var API = {
    getSupplyDemand: HOST + "mobile.php?c=searchlist&a=hr_recruit_list", //招聘列表
    getArea: HOST + "mobile.php?c=searchlist&a=hr_job_list" ,//求职列表
    getclassify: HOST +'mobile.php?c=index&a=recruit_cat',//招聘分类
};
//    *********接口*********
//    ******求职*******
//

$(document).ready(function(){
    var limit=10;
    var start=1;
    $.ajax({
        type: "POST",
        url:API.getArea,
        data: {checkInfo:tool.getCheckInfo(APINAME.getArea),start:start,limit:limit,},
        dataType: "json",
        jsonp:"callback",
        //success:comm_success,
        success:function (data) {
            //console.log(Date.now().toString());
            //return data;
            var data = data['data'];
            var d=new Date();
            console.log(data);
            $.each(data, function(i) {
                var c=new Date();
                c.getYear();
                //console.log(c.toLocaleString());
                var q=data[i].birthday;
                //console.log(q);
                var r=c.toLocaleString()-q;
                //console.log(r);
                var a=0;
                var b=data[i].sex;
                function sex(data){
                    if(a==b){
                        return "男"
                    }else{
                        return "女"
                    }
                }
                var ul_content='<a href="manpower.html">'
                    +'<div class="experience">'
                    +"<img src='" + HOST + data[i].avatar+"'alt=''/>"
                    + '<ul>'
                    + '<li class="bar-placer">'
                    +data[i].title
                    +'</li>'
                    +'<li class="accountant">'
                    +data[i].name +'&nbsp;&nbsp;|&nbsp;&nbsp;'
                    +data[i].area+'&nbsp;&nbsp;|&nbsp;&nbsp;'
                    +data[i].cate_name
                    +'</li>'
                    +'<li class="undergo">'
                    +data[i].birthday +'&nbsp;&nbsp;|&nbsp;&nbsp;'
                    +sex()
                    +data[i].sex.substr(1,1) +'&nbsp;&nbsp;|&nbsp;&nbsp;'
                    +data[i].education.substr(18,2)
                    +' &nbsp;&nbsp;|&nbsp;&nbsp;' +data[i].job_year
                    +"年工作经验"
                    +' </li>'
                    +'</ul>'
                    +'</div>'
                    +'<span>' + d.toLocaleString() + data[i].update_time.substr(18,2)
                    +'</span>'
                    +'</a>'
                $(".work-experience").append(ul_content);
            })
        },
    });
});

//*********招聘信息*****
$(document).ready(function(){
    var start=1;
    var limit=10;
    $.ajax({
        type: "POST",
        url:API.getSupplyDemand,
        data: {checkInfo:tool.getCheckInfo(APINAME.getSupplyDemand),limit:limit,start:start,},
        dataType: "json",
        jsonp:"callback",
        //:comm_success,
        success: function (data) {
            //console.log(Date.now().toString());
            //return data;
            var data = data['data'];
            console.log(data);
            //接收数据
            $.each(data, function(i){
                //*****招聘******
                var content='<a href="Recruitment-particulars.html">'
                    +'<ul class="supply-message">'
                    +'<li class="apple">'+data[i].name
                    +'</li>'
                    +'<li class="location">'
                    +'<img src="images/apply-for-a-post/five-pointed-star.png" alt="">'
                    +'</li>'
                    +'<li class="machinery">'
                    +data[i].area+ '&nbsp;&nbsp; | &nbsp;&nbsp; '+data[i].cate_name
                    +'</li>'
                    +'<li class="element-hour">'+data[i].name
                    +'<span>'+data[i].update_time+'</span>'
                +'</li>'
                +'</ul>'+'</a>'
                $(".type-of-work").append(content);
                $(".weui-loadmore").css("display","none");
            });
        },
    });
});

//******分类*********
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

