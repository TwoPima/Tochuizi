/**
 * Created by Administrator on 2016/12/26.
 */
var APINAME = {
    getProject: "design_list", //设计师列表
    getArea: "design_need" //获取地址信息
};
var API = {
    getProject: HOST + "mobile.php?c=searchlist&a=design_list", //设计师列表
    getArea: HOST + "mobile.php?c=searchlist&a=design_need" //获取地址信息
};
    //    *********接口*********
//    ******设计师******
$(document).ready(function(){
    var start=1;
    var limit=10;
    $.ajax({
        type: "POST",
        url:API.getProject,
        data: {checkInfo:tool.getCheckInfo(APINAME.getProject),start:start,limit:limit},
        dataType: "json",
        jsonp:"callback",
        success:comm_success,
        error: function (data) {
            console.log(Date.now().toString());
             return data;
        },
    });
});
//将返回的数据添加到 列表里显示出来；
function comm_success(data){
//    $("#info").html("<div>页面加载中.....</div>");//提示信息
//        var area_id="宁夏";
    //list是否为空  这里判断有问题待改进
    if(data.list!=""&& data.list!="null"){
        var dataList = data["data"];
        console.log(dataList);
        //接收数据
        $.each(dataList, function(i){
            var ul_content=
            '<div class="stylist-head">'
            +'<a href="project-particulars.html" style="color: #000">'
                +'<img class="stylist-head-portrait" src="'+HOST+ dataList[i].avatar +'" alt=""/>'
                +'<div class="appropriate">'+dataList[i].name+'</div>'
                +'<div class="fine">'+dataList[i].desc
                +"</div>"
                +'<div class="plum">'
                +'<span class="plane">'+dataList[i].id_type
                +'</span>'
                +'<span class="site">'
                +'<img src="images/project/supply.png" alt=""/>'
                +dataList[i].area+'</span>'
                +'</div>'
                +'</a>'
                +'</div>'
            $(".stylist").append(ul_content);
            $(".weui-loadmore").css("display","none");
        });
//            $("#info").html("<li>解析完成</li>");//提示信息
    }else{
        $(".stylist").html("<li>未找到商品信息!</li>");//提示信息
    }
    $("#info").css("display","none");
}
//********设计需求*************
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
                var ul_content = '<div class="stylist-head">'
                    +'<a href="project-particulars.html" style="color: #000">'
                    +'<img class="stylist-head-portrait" src="'+HOST+ dataList[i].avatar +'" alt=""/>'
                    +'<div class="appropriate">'+dataList[i].desc+'</div>'
                    +'<div class="fine">'+dataList[i].desc
                    +"</div>"
                    +'<div class="plum">'
                    +'<span class="plane">'+dataList[i].is_partner
                    +'</span>'
                    +'<span class="site">'
                    +'<img src="images/project/supply.png" alt=""/>'
                    +dataList[i].area+'</span>'
                    +'</div>'
                    +'</a>'
                    +'</div>'
                $(".stylist1").append(ul_content);
            })
            $('.supply>span').click(function (){
                $(".stylist1").hide();
            })
            $('.ask-buy>span').click(function (){
                $(".stylist1").show();
            })
        },
    });
});