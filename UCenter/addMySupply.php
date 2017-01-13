<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的供求</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.min.css"/>
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
    <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    	<link rel="stylesheet" type="text/css" href="../Public/font/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/addmysupply.css"/>
    <style>

    </style>
</head>
<body>
<div id="addmysupply_form">
    <div id="topback-header">
        <div id="header-left">
             <a href="javascript:history.go(-1);" >
                  <i class="icon iconfont icon-xiangzuo"></i>
                    <span class="title">发布供求</span>
             </a>
        </div>
        <div id="header-right"></div>
    </div>
    <div id="main">
        <form action="" method="post"  id="supplyForm" enctype="multipart/form-data">
            <div class="main_box">
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text" name='title' id="title" placeholder="这里是标题...">
                        </div>
                    </div>
                </div>

                <div class="weui-uploader__bd margin_fix">
                    <ul class="weui-uploader__files" id="uploaderFiles">
                    </ul>
                    <div class="weui-uploader__input-box">
                        <input class="weui-uploader__input file" name="image_url1" id="image_url"  type="file" accept="image/*" >
                    </div>
                    <div class="weui-uploader__input-box">
                        <input class="weui-uploader__input file" name="image_url2" id="image_url" type="file" accept="image/*" >
                    </div>
                    <div class="weui-uploader__input-box">
                        <input class="weui-uploader__input file" name="image_url3" id="image_url" type="file" accept="image/*" >
                    </div>
                    <div class="weui-uploader__input-box">
                        <input class="weui-uploader__input file" name="image_url4" id="image_url"  type="file" accept="image/*" >
                    </div>
                    <div class="weui-uploader__input-box">
                        <input class="weui-uploader__input file" name="image_url5" id="image_url"  type="file" accept="image/*" >
                    </div>
                </div>
            </div>
            <div class="main_box">
                          <div class="weui_cell">
                            <div class="weui_cell_hd"><label class="weui_label font14px">选择分类</label></div>
                            <div class="weui_cell_bd weui_cell_primary font14px">
                              <select class="supplyCate font14px" name="firstMenu" id="firstMenu">
                              </select>
                              <select class="supplyCate font14px" name="subMenu" id="subMenu">
                              </select>
                              <select class="supplyCate font14px" name="cate_id" id="thereMenu">
                              </select>
                            </div>
                          </div>
                    <div class="weui_cell">
                            <div class="weui_cell_hd"><label class="weui_label font14px">地区</label></div>
                            <div class="weui_cell_bd weui_cell_primary font14px">
                              <select class="area" name="dpProvince" id="dpProvince">
                              </select>
                              <select class="area" name="dpCity" id="dpCity">
                              </select>
                              <select class="area" name="area" id="dpArea">
                              </select>
                            </div>
                          </div>
                <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <textarea name="desc" id="desc" class="weui-textarea" placeholder="描述备注" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_box jiage">
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">供应类型:</label></div>
                        <div class="weui-cell__bd">
                            <label for="gongying">
                                供应<input id="gongying" type="radio" value="0" checked name="is_true" >
                            </label>
                            <label for="qiugou">
                                求购<input id="qiugou" type="radio" value="1" name="is_true" >
                            </label>
                        </div>
                    </div>
                </div>
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">价<span style="visibility:hidden;">价格</span>格:</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text"  id="price"  name="price" placeholder="价格面议">
                        </div>
                    </div>
                </div>
                <div class="weui-cells">
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">联系电话:</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" name="mobile"  id="mobile" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <a  class="weui-btn weui-btn_plain-default" id="btn-custom-theme">确认发布</a>
            </div>
        </form>
        </div>
    </div>
</body>
<input value="<?php echo md5(date('Ymd')."my_supply"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."supply_cat"."tuchuinet");?>"	type="hidden" id="supply_cat"/>
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
 <script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		window.location.href='../Login/login.php';
	}
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
		var firstID = dp1.prop("value");
        $("#subMenu").empty();
        $("#thereMenu").empty();
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
        $("#dpArea").empty();
        $("#dpCity").empty();
        loadAreasCity($("#checkInfoArea").val(), provinceID);
        dpCity.fadeIn("slow");
    });
    //给市绑定事件，触发事件后填充区的数据
    jQuery(dpCity).bind("change keyup", function () {
        var cityID = dpCity.prop("value");
        loadAreasDistrict($("#checkInfoArea").val(), cityID);
        dpArea.fadeIn("slow");
    });
        $('.file').change(function(event) {
                var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
                if (files && files.length > 0) {
                    file = files[0];// 获取目前上传的文件
                    var URL = window.URL || window.webkitURL;
                    var imgURL = URL.createObjectURL(file);
                    var html = '';
                    html += ' <li class="weui-uploader__file" id="fileshow">' +
                        '  <img class="deletePicture"   src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
                        '</li>';
                    $("#uploaderFiles").prepend(html);$(this).parent().remove();
                }

    	});
        //提交，最终验证。btn-custom-theme
        $("#btn-custom-theme").click(function() {
            var formData = new FormData($( "#supplyForm" )[0]);
            formData.append('checkInfo',$( "#checkInfo").val());
            formData.append('id',sessionUserId);
            formData.append('dotype','add');
			 if(!(/^1(3|4|5|7|8)\d{9}$/.test($("#mobile").val()))){
				 $.toptip('手机号码有误，请重填！', 2000, 'warning');
				 $(document).scrollTop(0);
				 return false;
			 }
            $.showLoading('正在添加');
            setTimeout(function() {
                $.hideLoading();
            }, 3000)
            $.ajax({
                type: 'post',
                url:HOST+'mobile.php?c=index&a=my_supply',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    var message=eval('(' + result+ ')').message;
                    if (eval('(' + result+ ')').statusCode=='0'){
                        $.toptip(message,2000, 'error');
                        $(document).scrollTop(0);
                    }
                    if (eval('(' + result+ ')').statusCode=='1'){
                        $.toast("操作成功");
                        window.location.href = 'mySupply.php';
                    }
                }
            });
       });
});
	$(document).on("click", ".deletePicture", function() {
			$(this).parent().remove();
		});
</script>
</html>
</div>
</div>
</div>

