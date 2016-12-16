<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-加盟商入驻</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" type="text/css" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" type="text/css"  href="../Public/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">

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
	<div id="addbuin-main" class="clear">
		<div class="addbuin_title">
			<div class="addbuin_title_img ">
				<img src="../Public/img/warnning.png" class="" alt="">
			</div>
			<div class="addbuin_title_info">
				公司名称是必须要填写的
			</div>
		</div>

		<div class="addbuin_form" >
			<form action="">
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<div class="weui-cell">
							<div class="weui-cell__hd"><label class="weui-label">公司名称</label></div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="name" id="name"/>
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">地址</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="address" id="address">
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">所在地区</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="area" id="area" >
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">电话</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="tel" name="mobile" id="mobile" >
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">营业执照号</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text"name="licence" id="licence"  >
							</div>
						</div>

						<div class="weui-cell">
								<div class="weui-cell__bd">
									<div class="weui-uploader">
										<div class="weui-uploader__bd">
											<ul class="weui-uploader__files" id="uploaderFiles">
												<li class="weui-uploader__file" style="display: none"></li>
											<!--	<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">
														<i class="weui-icon-warn"></i>
													</div>
												</li>-->
												<!--<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">50%</div>
												</li>-->
											</ul>
											<div class="weui-uploader__input-box">
												<input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple />
											</div>
											<div class="weui-uploader__input-box_title">
												点击查看营业执照图片 <br>
												图片保证清晰
											</div>
										</div>
									</div>
								</div>
							</div><!--upload end-->
							<p class="box-in"></p>
							<div class="weui-cell weui-cell_access">
								<div class="weui-cell__bd">
									<span style="vertical-align: middle">经营类别:</span>
								</div>
								<div class="weui-cell__ft"></div>
							</div>
							<div class="weui-cell-box">
								<textarea class="weui-cell-textarea" name="desc" id="desc"placeholder="备注..."></textarea>
							</div>
							<p class="box-in"></p>
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<div class="weui-uploader">
									<div class="weui-uploader__hd">
										<p class="weui-uploader__title">企业图片</p>
									</div>
									<div class="weui-uploader__bd line">
										<ul class="weui-uploader__files" id="uploaderFiles1">
											<li class="weui-uploader__file" style="display: none"></li>
											<!--	<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">
														<i class="weui-icon-warn"></i>
													</div>
												</li>-->
											<!--<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
                                                <div class="weui-uploader__file-content">50%</div>
                                            </li>-->
										</ul>
										<div class="weui-uploader__input-box">
											<input id="uploaderInput1" class="weui-uploader__input" type="file" accept="image/*" multiple />
										</div>
									</div>
								</div>
							</div>
						</div><!--upload end-->
					</div>
				</div>
			</form>
			<div class="addbuin_form_button">
				<a href="addBusinessInfo.php"id="btn-custom-theme" class="weui-btn">申请加盟</a>
			</div>

		</div>
	</div>
</body>

<input value="<?php echo md5(date('Ymd')."my_partner"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."pic_partner"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/>  
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/> <!-- 删除公司照片 --> 
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