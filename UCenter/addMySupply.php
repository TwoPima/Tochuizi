<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的供求</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
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
    <form action="" method="post"  enctype="multipart/form-data">
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
                    <input class="weui-uploader__input file" multiple="true" name="image_url[]" id="image_url" type="file" accept="image/*" >
                </div>
            </div>
        </div>
        <div class="main_box">
          			  <div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label font14px">选择分类</label></div>
					    <div class="weui_cell_bd weui_cell_primary font14px">
					      <select class="supplyCate" name="cate_id" id="firstMenu">
					      </select>
					      <select class="supplyCate" name="cate_id" id="subMenu">
					      </select>
					      <select class="supplyCate" name="cate_id" id="thereMenu">
					      </select>
					    </div>
					  </div>
				<div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label font14px">地区</label></div>
					    <div class="weui_cell_bd weui_cell_primary font14px">
					      <select class="area" name="area" id="dpProvince">
					      </select>
					      <select class="area" name="area" id="dpCity">
					      </select>
					      <select class="area" name="area" id="dpArea">
					      </select>
					    </div>
					  </div> 
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea name="desc" id="desc" class="weui-textarea" placeholder="描述备注" rows="5"></textarea>
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
                        <input class="weui-input" type="text"  name="price"  name="price" placeholder="价格面议">
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
		dpCity.prop("value","");dpArea.prop("value","");
		loadAreasCity($("#checkInfoArea").val(), provinceID); 
		dpCity.fadeIn("slow"); 
	}); 
	//给市绑定事件，触发事件后填充区的数据 
	jQuery(dpCity).bind("change keyup", function () { 
		var cityID = dpCity.prop("value"); 
		loadAreasDistrict($("#checkInfoArea").val(), cityID); 
		dpArea.fadeIn("slow"); 
	});  
        $('#image_url').change(function(event) {
    		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象	
    		if (files && files.length > 0) {
    			file = files[0];// 获取目前上传的文件
    			if(file.size > 1024 * 1024 * 2) {
    				alert('图片大小不能超过 2MB!');
    				return false;
    			}
    			imgPathArr=[];
 			   $(files).each(function(index, obj) {
  				  var count_li = $("#uploaderFiles").children().length;
	                if(count_li >= '5'){
	                    $("#uploaderInput").css('display','none');
	                  	 $.toast("不能超过五张图片！", "cancel");
	                  	 return false;
	                }
	                imgPathArr.push(obj);
	    			// 通过这个 file 对象生成一个可用的图像 URL
	    			// 获取 window 的 URL 工具
	    			var URL = window.URL || window.webkitURL;
	    			// 通过 file 生成目标 url
	    			var imgURL = URL.createObjectURL(obj);
	    			// 用这个 URL 产生一个 <img> 将其显示出来
	                  var html = '';
	    				 html += ' <li class="weui-uploader__file" id="fileshow">' +
	    	             '  <img class="deletePicture" data="'+obj+'"  src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
	    	             '</li>';
	    	              $("#uploaderFiles").prepend(html);
	    			// 使用下面这句可以在内存中释放对此 url 的伺服，跑了之后那个 URL 就无效了
	    			// URL.revokeObjectURL(imgURL);
		      	});
    		}
    	});
        //提交，最终验证。btn-custom-theme
        $("#btn-custom-theme").click(function() {
               sessionUserId=$.session.get('userId');
               var url =HOST+'mobile.php?c=index&a=my_supply';
               var checkInfo = $("#checkInfo").val();
               var title = $("input[name=title]").val();
               var cate_id = $("#thereMenu").val();
               var area=$('#dpArea option:selected').val();
               var is_true=$("input[name=is_true]:checked").val();
               var price = $("input[name=price]").val();
               var mobile = $("input[name=mobile]").val();
               var desc = $("textarea[name=desc]").val();
               var zu = $("input[name=zu]").val();
               var image_url = imgPathArr;
             if(mobile==""|| title==""){
              		alert('手机号标题均不能为空！', 200, 'warning');
              	    return false; 
               }
       		 $.ajax({
       			type: 'post',
       			url: url,
       			traditional:true,//必须设成 true  
       			data: {
                       id:sessionUserId,
                       checkInfo:checkInfo,
                       dotype:'edit',
                       title:title,
                       cate_id:cate_id,
                       is_true:is_true,
                       price:price,
                       mobile:mobile,
                       desc:desc,
                       zu:zu,
                       image_url:image_url,
                       area:area
                   },
       			dataType: 'json',
       			success: function (result) {
                       console.log(result);
       				/*var message=result.message;
       				if (result.statusCode==='0'){
       					$.toptip(message,2000, 'error');
       				}else{
       					$.toptip(message,2000, 'success');
       					window.location.href='./UCenter/index.php';
       				}*/
       			},
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

