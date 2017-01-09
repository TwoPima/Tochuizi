/**
 * Created by mxc on 2017/1/6.
 * 亿次元科技@晓成
 * email：857773627@qq.com
 */

$(function(){
var dp1 = $("#firstMenu");
var dp2 = $("#subMenu");
var dp3 = $("#thereMenu");
var dpProvince = $("#dpProvince");
var dpCity = $("#dpCity");
var dpArea = $("#dpArea");
imgPathArr=[];
//填充一级数据
loadSupplyFirstCate($("#supply_cat").val(), 0);
//给一级绑定事件，触发事件后填充二级的数据
jQuery(dp1).bind("change keyup", function () {
    var firstID = dp1.prop("value"); //$("input").attr("value","");
    dp2.prop("value","");dp3.prop("value","");
    loadSupplySubCate($("#supply_cat").val(), firstID);
    dp2.fadeIn("slow");
});
//给二级绑定事件，触发事件后填充三级的数据
jQuery(dp2).bind("change keyup", function () {
    var subID = dp2.prop("value");
    loadSupplyThereCate($("#supply_cat").val(), subID);
    dp3.fadeIn("slow");
});
//填充省的数据
loadAreasProvince($("#checkInfoArea").val(), 0);
//给省绑定事件，触发事件后填充市的数据
jQuery(dpProvince).bind("change keyup", function () {
    var provinceID = dpProvince.prop("value");
    loadAreasCity($("#checkInfoArea").val(), provinceID);
    dpCity.fadeIn("slow");
});
//给市绑定事件，触发事件后填充区的数据
jQuery(dpCity).bind("change keyup", function () {
    var cityID = dpCity.prop("value");
    loadAreasDistrict($("#checkInfoArea").val(), cityID);
    dpArea.fadeIn("slow");
});
    /*
$(document).ready(function() {
    //第一先判断是否存在数据库的值 thereId  没有提取当前判别位置的省份name 其他隐藏
    var currentAreaId = 0;//当前提取id
    var currentTypeId = 0;//
    var nowPositionProvince="宁夏";//当前位置省份
    var secondItemChooseContent = "";//
    var thirdItemChooseContent = "";//当前提取id
    var countCurrentSelectItem = 0;//当前提取id

    $("#firstItemChoose").change(function() {
        currentAreaId = $(this).find("option:selected").attr("areaid");
        $(data).each(function() {
            if (this.areaid == currentAreaId) {
                secondItemChooseContent += '<option typeid="' + this.typeid + '">' + this.typeName + '</option>';
            }
        });
        if (secondItemChooseContent != "") {
            $("#secondItemChoose").html(secondItemChooseContent);
            $("#secondItemChoose").removeAttr("disabled");
            secondItemChooseContent = "";
        }
    });

    $("#secondItemChoose").change(function() {
        currentTypeId = $(this).find("option:selected").attr("typeid");
        $(dataForTirdSelect).each(function() {
            if (this.typeid == currentTypeId) {
                thirdItemChooseContent += '<option typeid="' + this.itemid + '">' + this.itemName + '</option>';
            }
        });
        if (thirdItemChooseContent != "") {
            $("#thirdItemChoose").html(thirdItemChooseContent);
            $("#thirdItemChoose").removeAttr("disabled");
            //                    $("#thirdItemChoose option").mouseover(function() {
            //                        //获取详细说明 JSON 并显示在相应的 Div 上，预览之
            //                        previewClickedItem($(this));
            //                    });
            thirdItemChooseContent = "";
        }
    });
    $("#thirdItemChoose").change(function() {
        if ($("#thirdItemChoose").find("option:selected").length > 0) {
            previewClickedItem($(thirdItemChoose.options[thirdItemChoose.selectedIndex]));
        }
    });

    $("#selectedItems").change(function() {
        if ($("#selectedItems").find("option:selected").length > 0) {
            previewClickedItem($(selectedItems.options[selectedItems.selectedIndex]));
        }
    });

    $("#delChosenItems").click(function() {
        $("#selectedItems").find("option:selected").each(function() {
            $(this).remove();
            //还要恢复相应选项
        });
    });
    function previewClickedItem(optionObj) {
        $("#previewItemPannel").text("预览" + optionObj.text());
    }

    $("#addItemBtn").click(function() {
        var selectedItems = $("#thirdItemChoose").find("option:selected");
        var selectedItemsList = $("#selectedItems");

        if (selectedItems.length > 0) {
            if (countCurrentSelectItem == 0) {
                selectedItemsList.html("");
            }
            selectedItems.each(function() {
                selectedItemsList.append('<option itemid="' + $(this).attr("itemid") + '">' + $(this).html() + '</option>');
                $(this).remove();
                //还要记录下次也不要出现
                countCurrentSelectItem += 1;
            });
            selectedItemsList.removeAttr("disabled");
        }
    });*/


    /*
     * 用搜狐地址库
     *   ip: returnCitySN["cip"]
     国家：remote_ip_info.country
     省份：remote_ip_info.province
     城市：remote_ip_info.city
     区域：remote_ip_info.district
     其他：remote_ip_info.desc
     ISP：+remote_ip_info.isp
     分类：remote_ip_info.type
     $.session.get(nowPositionProvince)
     */
    function getNowPosition(){
        $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(){
            if (remote_ip_info.ret == '1'){
                var nowPositionProvince=$.session.set('nowPositionProvince',remote_ip_info.province);
                var nowPositionCity=$.session.set('nowPositionCity', remote_ip_info.city);//$.session.get(nowPositionCity)
                var info={"provice":nowPositionProvince,"city":nowPositionCity};
                return info;
            } else {
                return('错误', '没有找到匹配的 IP 地址信息！');
            }
        });
    }
//获得省级
    function loadAreasProvince(checkInfo, pid) {
        var urlArea= HOST+'mobile.php?c=index&a=get_area';
        jQuery.ajax({
            type: "POST",
            url: urlArea,
            data: {checkInfo:checkInfo,pid:pid},
            dataType:"json",
            success: function(result){
                currentAreaId = $("#dpArea").find("option:selected").val();//从数据库中查询出来的
                if (currentAreaId==null){
                    //数据库不存在第三级地区 给定当前位置的localStorage.setItem("key","value");
                    nowPositionProvince=localStorage.setItem("nowPositionProvince");
                    var selectHtml='<option value="" selected="selected">'+nowPositionProvince+'</option>';
                }else{
                    //存在进行比对

                }
                //有数据的时候去取值
                $('#dpProvince').append(selectHtml);
                $.each(result.data, function (index, obj) {
                    var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
                    $('#dpProvince').append(proviceHtml);
                });
            }
        });
    }
//获得市级
    function loadAreasCity(checkInfo, pid) {
        var urlArea= HOST+'mobile.php?c=index&a=get_area';
        jQuery.ajax({
            type: "POST",
            url: urlArea,
            data: {checkInfo:checkInfo,pid:pid},
            dataType:"json",
            success: function(result){
                // nowPositionCity=$.session.get("nowPositionCity");
                // var selectHtml='<option value="" selected="selected">'+nowPositionCity+'</option>';
               /* var pid = $("#province").find('option:selected').val();
                if(pid!='0'){

                }*/
                $('#dpCity').append("<option value='' selected='selected'>请选择</option>");
                $.each(result.data, function (index, obj) {
                    var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
                    $('#dpCity').append(proviceHtml);
                });
            }
        });
    }
//获得区级
    function loadAreasDistrict(checkInfo, pid) {
        var urlArea= HOST+'mobile.php?c=index&a=get_area';
        jQuery.ajax({
            type: "POST",
            url: urlArea,
            data: {checkInfo:checkInfo,pid:pid},
            dataType:"json",
            success: function(result){
                $('#dpArea').append("<option value='' selected='selected'>请选择</option>");
                $.each(result.data, function (index, obj) {
                    var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
                    $('#dpArea').append(proviceHtml);
                });
            }
        });
    }
//获取选中城市单个信息
    function getSingelProvice(checkInfo,pid){
        var urlArea= HOST+'mobile.php?c=index&a=get_area';
        $.ajax({
            type: "POST",
            url: urlArea,
            data: {checkInfo:checkInfo,pid:pid},
            dataType:"json",
            success: function(result){
                $.each(result.data, function (index, obj) {
                    var proviceHtml=' <div class="picker-item"id="provice" code="'+obj.id+'">'+obj.name+'</div>';
                    $('.col-province').find(".picker-items-col-wrapper").append(proviceHtml);
                });
                return false;
            }
        });
    }
//获取默认收货地址详细 区级
    function getAddressArea(checkInfo,userid){
        var url =HOST+'mobile.php?c=index&a=my_address';
        $.ajax({
            type: 'post',
            url: url,
            data: {checkInfo:checkInfo,id:userid,dotype:'gain'},
            dataType: 'json',
            success: function (result) {
                var message=result.message;
                var tips=result.message;
                if (result.statusCode=='0'){
                    $.toptip(tips,2000, 'error');
                }else{
                    //数据取回成功
                    $("#address").append(result.address);
                }
            }
        });
    }
});
