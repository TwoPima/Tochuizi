<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>忘记密码</title>
     <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
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
	                  	    <span class="title">找回密码</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
			<div class="weui_cells weui_cells_form login-form clear">
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/mobile.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="tel" name="mobile" id="mobile" placeholder="请输入手机号">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/code.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="tel"name="code" id="code" placeholder="请输入验证码">
				    </div>
				    <div class="weui-cell__ft">
			            <a href="javascript:;" class="weui-vcode-btn">获取验证码</a>
			        </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="password" id="password"placeholder="设置密码">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="repassword" id="repassword" placeholder="重复密码">
				    </div>
				  </div>
				</div>
					<div class="height20px"></div> 
			  <a href="" id="btn-custom-theme" class="weui-btn weui_btn_primary ">找回密码</a> 
			  </div>
    </body>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script type="text/javascript" src="../Public/js/login/code.js"></script>
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
        	 if (this.value.length > 16 || this.value.length < 6)
          	  {
          	    $.toptip('密码长度应该在 6-16 位', 2000, 'warning');
          	    return false;
          	  }
         }
         //验证重复密码
         if( $(this).is('#repassword') ){
          	  if (this.value!== $("#password").val())
          	  {
          	    $.toptip('前后密码不一致！', 2000, 'warning');
          	    return false;
          	  }
         }
    });
  $("#btn-custom-theme").click(function() {
        	var mobile = $("#mobile").val();
        	var password = $("#password").val();
        	var code = $("#code").val();
        	var checkInfo = $("#checkInfo").val();
        	var url =HOST+'mobile.php?c=index&a=register';
           if(mobile==""|| password==""){//判断两个均不为空（其他判断规则在其输入时已经判断） 
        		$.toptip('手机号密码均不能为空！', 2000, 'warning');
        	    return false; 
        	 } 
			 $.ajax({
				type: 'post',
				url: url,
				data: {mobile:mobile,password:password,code:code,checkInfo:checkInfo},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					var tips=result.message;
					if (result.statusCode=='0'){
						$.toptip(tips,2000, 'error');
					}else{
						$.toptip(tips,2000, 'success');
						window.location.href='login.php';
					} 
				}
			});
   });
});
</script>
</html>