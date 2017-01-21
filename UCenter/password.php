<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>设置-修改密码</title>
         <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
    </head>
    <body id="login">
    <div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">修改密码</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
				<div class="weui_cells weui_cells_form login-form clear">
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="old_password" id="old_password"placeholder="原来密码">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="new_password" id="new_password"placeholder="设置新密码">
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
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default "id="btn-custom-theme">提&nbsp;&nbsp;&nbsp;&nbsp;交</a>
            </div>
    </body>
<input value="<?php echo md5(date('Ymd')."password"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script type="text/javascript">
$(function(){
		sessionUserId=$.session.get('userId');
    	if(sessionUserId==null){
    		//没有登陆
    		$.toptip('您还没有登陆！',2000, 'error');
    		window.location.href='../Login/login.php';
    	}
	  //文本框失去焦点后
	   $('input').blur(function(){
			 //验证密码
	         if( $(this).is('#new_password') ){
	        	 if (this.value.length > 16 || this.value.length < 6)
	          	  {
	          	    $.toptip('密码长度应该在 6-16 位', 2000, 'warning');
	          	    return false;
	          	  }
	         }
	         //验证重复密码
	         if( $(this).is('#new_password') ){
	          	  if (this.value!== $("#repassword").val())
	          	  {
	          	    $.toptip('前后密码不一致！', 2000, 'warning');
	          	    return false;
	          	  }
	         }
	});
});
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var new_password = $("#new_password").val();
		var old_password = $("#old_password").val();
		var checkInfo = $("#checkInfo").val();
       	var url =HOST+'mobile.php?c=index&a=password';
        if(new_password==""||old_password==""){
       		$.toptip('新旧密码不能为空！', 2000, 'warning');
       	    return false; 
       	 }
        //验证密码
		 if (new_password.length > 16 || new_password.length < 6)
  	  {
  	    $.toptip('密码长度应该在 6-16 位', 2000, 'warning');
  	    return false;
  	  }
         if($("#repassword").val()!== new_password){
      	   $.toptip('前后密码不一致！', 2000, 'warning');
      	    return false; 
      	 } 
		 $.ajax({
			type: 'post',
			url: url,
			data: {id:sessionUserId,new_password:new_password,old_password:old_password,checkInfo:checkInfo},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode=='0'){
					$.toast(message, "forbidden");
					 return false;
				}else{
					$.toast('修改成功，请用新密码重新登陆！');
					setTimeout(function() {
						window.location.href='../Login/login.php';
					}, 3000)
				}
			},
		});
  });
</script>
</html>