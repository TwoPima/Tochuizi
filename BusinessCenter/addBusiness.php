<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-加盟商入驻</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	 <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/business.css"/>
</head>
<body>
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">申请加盟</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<!--内容页面  -->
	<div id="box-main">
		<div class="addbu_logo">
			<img src="../Public/img/business/logo.png" >
		</div>
		<div class="addbu_text">
			史上最浅显易懂的Git教程！
			为什么要编写这个教程？因为我在学习Git的过程中，买过书，也在网上Google了一堆Git相关的文章和教程，但令人失望的是，这些教程不是难得令人发指，就是简单得一笔带过，或者，只支离破碎地介绍Git的某几个命令，还有直接从Git手册粘贴帮助文档的，总之，初学者很难找到一个由浅入深，学完后能立刻上手的Git教程。
			既然号称史上最浅显易懂的Git教程，那这个教程有什么让你怦然心动的特点呢？
			首先，本教程绝对面向初学者，没有接触过版本控制概念的读者也可以轻松入门，不必担心起步难度；
			其次，本教程实用性超强，边学边练，一点也不觉得枯燥。而且，你所学的Git命令是“充分且必要”的，掌握了这些东西，你就可以通过Git轻松地完成你的工作。
			文字+图片还看不明白？有视频！！！
			本教程只会让你成为Git用户，不会让你成为Git专家。很多Git命令只有那些专家才明白（事实上我也不明白，因为我不是Git专家），但我保证这些命令可能你一辈子都不会用到。既然Git是一个工具，就没必要把时间浪费在那些“高级”但几乎永远不会用到的命令上。一旦你真的非用不可了，到时候再自行Google或者请教专家也未迟。
			如果你是一个开发人员，想用上这个世界上目前最先进的分布式版本控制系统，那么，赶快开始学习吧！
		</div>
		<div class="addbu_button">
			<a href="addBusinessInfo.php" id="btn-custom-theme" class="weui-btn">下一步</a>
		</div>
	</div>
</body>
<input value="<?php echo md5(date('Ymd')."my_partner"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
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
	 var urlHeadImg= HOST+'mobile.php?c=index&a=my_partner';
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
});
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
			data: {dotype:add,name:name,id:sessionUserId,nickname:nickname,checkInfo:checkInfo,sex:sex},
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
</script>
</html>