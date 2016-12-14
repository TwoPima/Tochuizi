<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>注册</title>
     <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/login.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    </head>
    <body id="reg">
     <div class="body-back"><img class="back-img" alt="" src="../Public/img/login/reg-bc.png">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">注册</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
    	<form>
			<div class="weui_cells weui_cells_form login-form clear">
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/mobile.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="text" name="mobile"  id="mobile" placeholder="请输入手机号">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/code.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="text" name="code" id="code"  placeholder="请输入验证码">
				    </div>
				    <div class="weui-cell__ft">
			            <a href="javascript:;" id="getCodeBtn" name="getCodeBtn" class="weui-vcode-btn">获取验证码</a>
			        </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" id="password" name="password" require placeholder="设置密码">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="repassword" id="repassword" placeholder="重复密码">
				    </div>
				  </div>
				</div>
				</form>
					<div class="height20px"></div> 
				  <a  id="btn-custom-theme" class="weui-btn weui_btn_primary ">注&nbsp;&nbsp;&nbsp;册</a> 
	 			<div for="weuiAgree" class="weui-agree">
			    <input id="weuiAgree" type="checkbox" name="weuiAgree" class="weui-agree__checkbox">
			    <span class="weui-agree__text">
			      	   我已阅读并同意<a href="regAgreement.php" id="regAgreement" class="regAgreement">《土锤网用户协议》</a>
			    </span>
			    </div>
			    </div>
    </body>
<input value="<?php echo md5(date('Ymd')."register"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script src="../Public/js/require.config.js"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="../Public/js/login/code.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>

<script type="text/javascript">
$(function(){
     //文本框失去焦点后
    $('form :input').blur(function(){
         //验证手机
         if( $(this).is('#mobile') ){
        	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
                 $.toptip('手机号码有误，请重填！', 2000, 'warning');
                 return false; 
             } 
         }
         //验证密码
         if( $(this).is('#password') ){
        	 if (this.length > 16 || this.length < 6)
          	  {
          	    $.toptip('密码长度应该在 6-16 位', 2000, 'warning');
          	    return false;
          	  }
         }
         //验证重复密码
         if( $(this).is('#repassword') ){
          	  if (this.length == $("#password").length)
          	  {
          	    $.toptip('前后密码不一致！', 2000, 'warning');
          	    return false;
          	  }
         }
       /*   //验证邮件
         if( $(this).is('#email') ){
            if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                  var errorMsg = '请输入正确的E-Mail地址.';
                  $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                  var okMsg = '输入正确.';
                  $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
         } */
    }).keyup(function(){
       $(this).triggerHandler("blur");
    }).focus(function(){
       $(this).triggerHandler("blur");
 });//end blur
  //提交，最终验证。
  $("#btn-custom-theme").click(function() {
            var userIp = returnCitySN["cip"];
        	var mobile = $("#mobile").val();
        	var password = $("#password").val();
        	var repassword = $("#repassword").val();
        	var weuiAgree = $("#weuiAgree").val();
        	var checkInfo = $("#checkInfo").val();
        	var url =HOST+'mobile.php?c=index&a=register';
            if(mobile==""|| password==""){//判断两个均不为空（其他判断规则在其输入时已经判断） 
        		$.toptip('手机号密码均不能为空！', 200, 'warning');
        	    return false; 
        	 }
        	  if(weuiAgree==''){
        		  $.toptip('必须同意本网站的注册协议！', 200, 'warning');
        		   return false;  
        	  }
			 $.ajax({
				type: 'post',
				url: url,
				data: {mobile:mobile,password:password,ip:userIp,code:code,checkInfo:checkInfo},
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
})
</script>
</html>