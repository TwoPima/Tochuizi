/**
 * Created by Administrator on 2017/1/5.
 */
//******接口全局变量*******
var APINAME = {
    getAllPproducts: "get_order_detail_by_order_no", //简历列表
    //getArea: "get_area" //获取地址信息
};
var API = {
    getAllPproducts: HOST + "index.php?c=order&a=get_order_detail_by_order_no", //简历列表
    //getArea: HOST + "mobile.php?c=index&a=get_area" //获取地址信息
};
//    *********接口*********
//    *************
$(document).ready(function(){
    var newDate = new Date();
    var Order_on=10;
    $.ajax({
        type: "POST",
        url:API.getAllPproducts,
        data: {checkInfo:CheckInfo(APINAME.getAllPproducts),Order_on:Order_on,},
        dataType: "json",
        jsonp:"callback",
        success:function (data) {
            var dataList = data["list"];
            //接收数据
            $.each(dataList, function(i){
                var ul_content=
                    $("#goods_detail").append(ul_content);
            });
        },
    });
});
//将返回的数据添加到 列表里显示出来；
