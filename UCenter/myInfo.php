<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>个人中心-基本信息修改</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
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
                        <a><img src="../Public/img/index/index_headimg2.jpg" alt="">
                        <input class="weui_uploader_input" id="uploadphoto" type="file" onchange="" style="display:none" name="avatar"accept="image/jpg,image/jpeg,image/png,image/gif" multiple="">
                        </a>
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
                               	<p class=""><span>女</span><input type="radio" name="sex" value="1" id="sexWoman" checked="checked"></p>
                           </div>
                   </div>
                       <div class="weui-cell weui-cell_select weui-cell_select-after">
                           <div class="weui-cell__hd">
                               <label for="" class="weui-label">收货地址</label>
                           </div>
                             <a href="region.php">
                           <div class="weui-cell__bd">
                               <select class="weui-select" required name="select2">
                                   <option value="1">宁夏银川市金凤区</option>
                               </select>
                           </div>
                           </a>
                       </div>
                      </form>
		</div>
		<div class="height20px" ></div>
                    <div class="height20px" ></div>
          	   <a href="" id="btn-custom-theme" class="weui-btn weui-btn_default" >保&nbsp;&nbsp;&nbsp;存</a>
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."edit_self"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."headpic"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/vue.js"></script>
<script type='text/javascript' src='../Public/plugins/uploadImg/LocalResizeIMG.js'></script>
<script type='text/javascript' src='../Public/plugins/uploadImg/mobileBUGFix.mini.js'></script>
<script src="../Public/js/center.js"></script>
<script>
$(document).ready(function(e) {
	 var urlHeadImg= HOST+'mobile.php?c=index&a=headpic';
	 //avatar=$("avatar").src();
	 checkInfoHeadImg=$("checkInfoHeadImg").val();
   $('#uploadphoto').localResizeIMG({
      width: 400,
      quality: 1,
      success: function (result) {  
		  var submitData={
				base64_string:result.clearBase64, 
			}; 
		$.ajax({
		   type: "POST",
		   url: "upload.php",
		   data: submitData,
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				alert(data.content);
				return false;
			 }else{
				alert(data.content);
				var attstr= '<img src="'+data.url+'">'; 
				$(".imglist").append(attstr);
				return false;
			 }
		   }, 
			complete :function(XMLHttpRequest, textStatus){
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){ //上传失败 
			   alert(XMLHttpRequest.status);
			   alert(XMLHttpRequest.readyState);
			   alert(textStatus);
			}
		}); 
      }
  });

}); 
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else{
		//已经登陆
  	var checkInfo = $("#checkInfo").val();
  	var url =HOST+'mobile.php?c=index&a=edit_self';
	/*  $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,id:sessionUserId},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					//数据取回成功
					var mobile=$.session.get('mobileSession');
					new Vue({
						  el: '#mobile',
						  data: {
						   mobile: mobile
						  }
						})
				}
			}
		}); */
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
}
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex = $("#sex").val();
		var nickname = $("#nickname").val();
		var sex=$("input[name='sex':checked").val();
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
					$.toptip(message,2000, 'error');
				}else{
					$.toptip(message,2000, 'success');
					window.location.href='./UCenter/index.php';
				}
			},
		});
  });
});
</script>
</html>