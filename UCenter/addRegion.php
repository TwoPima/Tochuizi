<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-地址管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
     <!--jquery WEUI  -->
        <link rel="stylesheet" href="../Public/css/weui.css">
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
   <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
   <link rel="stylesheet" href="../Public/css/center.css"/>
     <link rel="stylesheet" href="../Public/css/common.css"/>
     <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/js/city-picker.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<style>
#dpCity,#dpArea{ display:none; position:relative;} 
</style>
<script>
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
		//已经登陆 去服务器比对sessionid
		var url =HOST+'mobile.php?c=index&a=login';
		//getAreaListProvice($("#checkInfoArea").val(),'0');//省级
	$(function(){
		var dp1 = $("#dpProvince"); 
		var dp2 = $("#dpCity"); 
		var dp3 = $("#dpArea"); 
		//提交，最终验证。
		 $("#saveInfo").click(function() {
				var is_yes=$("input[name=is_yes]:checked").val();
				var  checkInfo = $("#checkInfo").val();
				var  name = $("#name").val();
				var  mobile = $("#mobile").val();
				var  area = dp1.val()+dp2.val()+dp3.val();//是id还是name
				alert(area)
				var  address = $("#address").val();
				var  code = $("#code").val();
		       	var url =HOST+'mobile.php?c=index&a=my_address';
				 $.ajax({
					type: 'post',
					url: url,
					data: {id:sessionUserId,adr_id:'1232',name:name,address:address,area:area,mobile:mobile,code:code,is_yes:is_yes,checkInfo:checkInfo,dotype:'add'},
					dataType: 'json',
					success: function (result) {
						var message=result.message;
						if (result.statusCode=='0'){
							$.toptip(message,2000, 'error');
						}else{
							$.toast(message);
							 setTimeout(window.location.href='region.php',8000)
							//window.location.href='addJobResume.php';
						}
					}
				});
		});
	
		//填充省的数据 
		loadAreasProvince($("#checkInfoArea").val(), 0); 
		//给省绑定事件，触发事件后填充市的数据 
		jQuery(dp1).bind("change keyup", function () { 
    		var provinceID = dp1.prop("value"); 
    		loadAreasCity($("#checkInfoArea").val(), provinceID); 
    		dp2.fadeIn("slow"); 
		}); 
		//给市绑定事件，触发事件后填充区的数据 
		jQuery(dp2).bind("change keyup", function () { 
    		var cityID = dp2.prop("value"); 
    		loadAreasDistrict($("#checkInfoArea").val(), cityID); 
    		dp3.fadeIn("slow"); 
    		}); 
		}); 
		//获得省级
		function loadAreasProvince(checkInfo, pid) { 
			 var urlArea= HOST+'mobile.php?c=index&a=get_area';
    		jQuery.ajax({ 
        	   type: "POST",
        	   url: urlArea,
        	   data: {checkInfo:checkInfo,pid:pid},
        	   dataType:"json",
        	   success: function(result){
        		   $('#dpProvince').append("<option value='' selected='selected'>请选择</option>"); 
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
</script>
</head>
<body>
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">新增地址</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a id="saveInfo"><span>保存</span></a>
                </div>
		</div>
	<div id="main clear">
		<div class="page addRegion">
			<div class="weui-cells weui-cells_form region-form">
			    <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">联系人姓名：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" name="name" id="name" placeholder=""/>
			        </div>
<!-- 			        <div class="weui_cell weui_cell_warn">
						</div>
 -->			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">手机号码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="tel" name="mobile" id="mobile" placeholder="请输入手机号">
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">邮政编码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text"  name="code" id="code" placeholder="请输入邮政编码">
			        </div>
			    </div>
			      <div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label">工作地区</label></div>
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="area" name="cate_id" id="dpProvince">
					      </select>
					     <!--  <span class="">&nbsp;|</span> -->
					      <select class=" area" name="cate_id" id="dpCity">
					      </select>
					      <select class=" area" name="cate_id" id="dpArea">
					      </select>
					    </div>
					  </div>
				     <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">详细地址：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" name="address" id="address" placeholder="输入详细地址"/>
			        </div>
			    </div>
			     <div class="weui-cell weui-cells_radio">
                       <div class="weui-cell__hd"><label class="weui-label">默认</label></div>
                           <div class="weui-cell__bd sex">
                               	<p class="float-left"><span>否</span>&nbsp;&nbsp;&nbsp;<input type="radio"  value="0" name="is_yes" id="is_yes"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                               	<p class=""><span>是</span>&nbsp;&nbsp;&nbsp;<input type="radio" name="is_yes" value="1" id="is_yes" checked='checked' ></p>
                           </div>
                   </div>
			</div>
			</div>
	</div><!--main-->
</div><!--app-->
</body>
</html>