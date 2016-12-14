<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>登陆</title>
       <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
	   <link rel="stylesheet" href="../Public/css/common.css"/>
	   <link rel="stylesheet" href="../Public/css/center.css"/>
	   <link rel="stylesheet" href="../Public/css/login.css"/>
    </head>
    <body >
	<div id="login">
   <div class="body-back"><img class="back-img" alt="" src="../Public/img/login/login-bc.png">
    <div class="login-content">
		<div class="weui-row ">
		  <div class="weui-col-95 logo">
		  	<a href="login.php"><img alt="" src="../Public/img/login/logo.png" height="" width=""></a>
		  </div>
		</div>		
		<form action="http://tcw.huikenet.com/mobile.php?c=index&a=login" >
		<div class="weui-row ">
		  <div class="weui-col-95">  
				<div class="weui_cells weui_cells_form login-form">
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/mobile.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="tel" id="mobile" v-model="mobile" name="mobile" placeholder="请输入手机号" required>
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="password" v-model="password" id="password" placeholder="请输入密码" required>
				    </div>
				  </div>
				</div>
				</div>
				</div>
				</form>
	<div class="height20px"></div> 
		<div class="weui-row ">
		  <div class="weui-col-95">  
		  <a id="btn-custom-theme" class="weui-btn weui_btn_primary ">登&nbsp;&nbsp;&nbsp;陆</a>
		  </div>
		  </div>
		  	<div class="height20px"></div>
		<div class="weui-row reg-forgetpassword">
		  <div class="weui-col-50">  
		     <a href="reg.php" class="">注册</a>
		  </div>
		  <div class="weui-col-50">  
		    <a href="forgetPassword.php" class="">忘记密码</a> 
		  </div>
		  </div>
		  </div>
		  </div>
	</div>
</body>
	 <input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
 <script src="../Public/js/require.config.js"></script>
 <script src="../Public/js/zepto.js"></script> 
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script>
    $("#mobile").blur(function(){
    	var mobile = $("#mobile").val();
    	if(mobile==""|| password==""){
        	//判断两个均不为空（其他判断规则在其输入时已经判断） 
			$.toptip('手机号密码均不能为空！', 2000, 'warning');
		    return false; 
		  }
    	checkPhone(mobile);
    });
	$("#btn-custom-theme").click(function() {
		var userIp = returnCitySN["cip"];
		var mobile = $("#mobile").val();
		var password = $("#password").val();
		var checkInfo=$("#checkInfo").val();
		var url =HOST+'mobile.php?c=index&a=login';
		  if(mobile==""|| password==""){//判断两个均不为空（其他判断规则在其输入时已经判断） 
				$.toptip('手机号密码均不能为空！', 2000, 'warning');
			    return false; 
			  }else{
			$.ajax({
				type: 'post',
				url: url,
				data: {mobile:mobile,password:password,ip:userIp,checkInfo:checkInfo},
				dataType: 'json',
				success: function (data) {
					//var member = eval('(' + data + ')');
					var tips=data.message;
					if (data.statusCode=='0'){
						$.toptip(tips,2000, 'error');
					}else{
						$.toptip(tips,2000, 'success');
						window.location.href='./UCenter/index.php';
					} 
				}
				/*  error: function(XMLHttpRequest,textStatus,errorThrown) {
					 alert(XMLHttpRequest.status);
					 alert(XMLHttpRequest.readyState);
					 alert(textStatus);
					   },
				 complete: function(XMLHttpRequest,textStatus) {
					 this; // 调用本次AJAX请求时传递的options参数
					   }  */
			});
		}
	});
	function checkPhone(){ 
	    var mobile = document.getElementById('mobile').value;
	    if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){ 
	        $.toptip('手机号码有误，请重填！', 2000, 'warning');
	        return false; 
	    } 
	}
</script>
<!-- 
/* 使用session存储，确定用户是否登录，从而确定页面跳转至哪个页面。
html中，相应的a标签中，写onclick="infoJumpTo"等就可以了。
判断本地有无customerID */
/* var word=1;

$(".groupselect").on("change",function(){
	var ob = $(this);
	var gid=ob.val();
	var mosque_id = ob.parent().find('.group').attr('val');
	$.get("{:U('update')}?ajax=yes&id="+id+"&gid="+gid,function(data){
		var text = ob.find("option:selected").text();
		ob.parent().find(".group").removeClass('hide').php(text);
		ob.addClass('hide');
	 });
})
function jumpTo(p, url) { 
	   var customerId=sessionStorage.customerId; 
	   if (customerId == undefined) { 
	     p.attr("href", "page/Login/login.php"); 
	<span style="white-space:pre">  </span>} else { 
	      p.attr("href", url); 
	    } 
	} 
	 function infoJumpTo() { 
	   var $info = $("#info"); 
	   jumpTo($info, "http://localhost/page/AmountAscension/amountAscension.php"); 
	} 
	 function starJumpTo() { 
	   var $star = $("#star"); 
	   jumpTo($star, "http://localhost/page/MyAccount/myAccount.php"); 
	 }
	 function confirm(){ 
		  var tel=$tel.val();//获取页面中登录名和密码 
		  var pwd=$pwd.val(); 
		  if(tel==""|| pwd==""){//判断两个均不为空（其他判断规则在其输入时已经判断） 
		    alert("手机号密码均不能为空！") 
		    return false; 
		  }else{
			  //以上均符合要求，则调用登录esb接口 
		     $.ajax({ 
		       url:config.baseServerUrl + '/account/login',//相对应的esb接口地址
		       type:'post',  
		       data:{mobile:tel,password:pwd},//向服务器（接口）传递的参数
		       success:function(data){//服务器（接口）返回来的数据
		         if(data.success){//如果返回来的信息说明提交的信息为正确的 
		           var customerId = data.attr.customerInfo.id;//将数据中用户信息的ID赋值给变量 
		           sessionStorage.customerId = customerId;//将变量存储到本地sessionStorage中，并且value为customerID 
		           window.location.href='http://localhost/index.php';//正确登录后页面跳转至 
		         }else{//如果返回来的信息说明提供的信息为错误的 
		           if(tel != data.tel){//判断是用户名还是密码错误，提示相应信息 
		             alert(data.message); 
		             $tel.val(""); 
		             $pwd.val(""); 
		             return false; 
		            } 
		            if(pwd != data.pwd){ 
		             alert(data.message); 
		             $pwd.val(""); 
		             return false; 
		            } 
		         } 
		       } 
		    }) 
		  } 
		} */
	 /* enter 登陆 */
	 //判断是否敲击了Enter键 
/* $(document).keyup(function(event){ 
    if(event.keyCode ==13){ 
      $("#login").trigger("click"); 
    } 
}); */
</script>-->
</html>