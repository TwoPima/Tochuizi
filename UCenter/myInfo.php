<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>个人中心-基本信息修改</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
</head>
<body>
<div id="app">
<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">基本资料</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
    
		<div id="myInfo">
		<form id="myInfoForm" action="" method="post">
            <div class="info-head">
                    <div class="head_img ">
                 	   <div id="queue"></div>
                        <a id="headImg" href="uploadHead.php">
                        	<img id="avatar" src="../Public/img/index/index_headimg2.jpg" alt="">
                        </a>
                      <!--   <input class="weui_uploader_input" id="uploadPhoto" type="file" onclick="uploadImage()"  name="avatar"accept="image/jpg,image/jpeg,image/png,image/gif" multiple="true"></div> -->
                      
                    </div>
            </div>
                    <div class="weui-cell">
                        <div class="weui-cell__hd"><label class="weui-label">称呼</label></div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" type="text" id="nickname" name="nickname" placeholder="请输入称呼" required />
                        </div>
                    </div>
                     <div class="weui_cell">
				    <div class="weui_cell_hd"><label class="weui-label">手机号</label></div>
				    <div class="weui_cell_bd">
				      <input class="weui_input" type="tel" id="mobile" name="mobile" placeholder="请输入手机号" required >
				    </div>
				  </div>
                   <div class="weui-cell weui-cells_radio">
                       <div class="weui-cell__hd"><label class="weui-label">性别</label></div>
                           <div class="weui-cell__bd sex">
                               	<p class="float-left"><span>男</span><input type="radio"  value="0" name="sex" id="sexMan"></p>
                               	<p class=""><span>女</span><input type="radio" name="sex" value="1" id="sexWoman" checked='checked' ></p>
                           </div>
                   </div>
                        <div class="weui_cell  weui-cell_select weui-cell_select-after">
					    <div class="weui_cell_hd"><label class="weui_label">收货地址</label></div>
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="area" name="cate_id" id="dpProvince">
					      </select>
					     <!--  <span class="">&nbsp;|</span> -->
					      <select class="area" name="cate_id" id="dpCity">
					      </select>
					      <select class="area" name="cate_id" id="dpArea">
					      </select>
					      <select class="area" name="address" id="address">
					      <option id="addressDetail"></option>
					      </select>
					    </div>
					  </div>
                      </form>
		</div>
		<div class="height20px" ></div>
                    <div class="height20px" ></div>
          	   <a  id="btn-custom-theme" class="weui-btn weui-btn_default" >保&nbsp;&nbsp;&nbsp;存</a>
</div><!--app-->
  <div id="upload"></div>
</body>
<input value="<?php echo md5(date('Ymd')."edit_self"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."headpic"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/>  
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfoLogin"/>  
<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfoMyAddress"/>  
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
 <script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
 <script src="../Public/js/common.js"></script>
<script type="text/javascript">
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
	//已经登陆
  	selectMyInfo(sessionUserId,$("#checkInfoLogin").val());//查询信息
  	var dp1 = $("#dpProvince"); 
	var dp2 = $("#dpCity"); 
	var dp3 = $("#dpArea"); 
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
	getAddressArea($("#checkInfoMyAddress").val(),sessionUserId);//填充默认 收货地区
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
//文本框失去焦点后
$('form :input').blur(function(){
     //验证手机
     if( $(this).is('#mobile') ){
    	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
             $.toptip('手机号码有误，请重填！', 2000, 'warning');
             return false; 
         } 
   }
});

 function selectMyInfo(id,checkInfo){
		 //查询
		var url =HOST+'mobile.php?c=index&a=login';
		 $.ajax({
				type: 'post',
				url: url,
				data: {id:sessionUserId,checkInfo:checkInfo},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					if (result.statusCode==='0'){
						$.toptip(message,2000, 'error');
						window.location.href='./Login/login.php';
					}else{
						var sex=result.data.sex;
						//var localSex=$("input[name='sex'][checked]").val();
						if(sex=='1'){
							$(":radio[name=sex][value=1]").attr("checked","true");//指定value的选项为选中项
						}
						if(sex=='0'){
							$(":radio[name=sex][value=0]").attr("checked","true");//指定value的选项为选中项
						}
						$('#nickname').attr("value",result.data.nickname);
						$("#mobile").attr("value",result.data.mobile);
						if(result.data.avatar==null){
    					}else{
    						$("#avatar").attr("src",result.data.avatar);//头像
    					}
					}
				},
			});
	 
 }
//提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var nickname = $("#nickname").val();
		var mobile = $("#mobile").val();
		var checkInfo = $("#checkInfo").val();
		var sex=$("input[name='sex']:checked").val();
      	var url =HOST+'mobile.php?c=index&a=edit_self';
        if(mobile==""|| nickname==""){
       		$.toptip('手机号昵称均不能为空！', 200, 'warning');
       	    return false; 
       	 }
        $.ajax({
			type: 'post',
			url: url,
			data: {mobile:mobile,id:sessionUserId,nickname:nickname,checkInfo:checkInfo,sex:sex},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toast(message);
				}else{
					$.toast(message);
				}
				window.location.reload();//刷新当前页面
			}
		});
  });
</script>
</html>