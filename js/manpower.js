/**
 * Created by Administrator on 2016/12/27.
 */
//******接口全局变量*******
var APINAME = {
    getManpower: "hr_job_cat", //简历列表
    //getArea: "get_area" //获取地址信息
};
var API = {
    getManpower: HOST + "mobile.php?c=searchlist&a=hr_job_cat", //简历列表
    //getArea: HOST + "mobile.php?c=index&a=get_area" //获取地址信息
};
    //    *********接口*********
//    *************
$(document).ready(function(){
    var start=1;
    var limit=1;
    $.ajax({
        type: "POST",
        url:API.getManpower,
        data: {checkInfo:tool.getCheckInfo(APINAME.getManpower),start:start,limit:limit},
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
