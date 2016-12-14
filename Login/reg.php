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
				      <input class="weui_input" type="text" name="mobile" id="mobile"  value="" placeholder="请输入手机号">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/code.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="text" name="code" value="" placeholder="请输入验证码">
				    </div>
				    <div class="weui-cell__ft">
			            <a href="javascript:;" id="getCodeBtn" name="getCodeBtn" class="weui-vcode-btn">获取验证码</a>
			        </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="password" value="" placeholder="设置密码">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" name="repassword" id="repassword" value="" placeholder="重复密码">
				    </div>
				  </div>
				</div>
				</form>
					<div class="height20px"></div> 
			  <a  id="btn-custom-theme" class="weui-btn weui_btn_primary ">注&nbsp;&nbsp;&nbsp;册</a> 
	 			<div for="weuiAgree" class="weui-agree">
			    <input id="weuiAgree" type="checkbox" name="weuiAgree" class="weui-agree__checkbox">
			    <span class="weui-agree__text">
			         我已阅读并同意<a href="regAgreement.html" class="regAgreement">《土锤网用户协议》</a>
			    </span>
			    </div>
			    </div>
    </body>
<input value="<?php echo md5(date('Ymd')."register"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script src="../Public/js/require.config.js"></script>
 <script src="../Public/js/zepto.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script type="text/javascript" src="../Public/js/login/code.js"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script type="text/javascript">
$(function(){
    /*
    *思路大概是先为每一个required添加必填的标记，用each()方法来实现。
    *在each()方法中先是创建一个元素。然后通过append()方法将创建的元素加入到父元素后面。
    *这里面的this用的很精髓，每一次的this都对应着相应的input元素，然后获取相应的父元素。
    *然后为input元素添加失去焦点事件。然后进行用户名、邮件的验证。
    *这里用了一个判断is()，如果是用户名，做相应的处理，如果是邮件做相应的验证。
    *在jQuery框架中，也可以适当的穿插一写原汁原味的javascript代码。比如验证用户名中就有this.value，和this.value.length。对内容进行判断。
    *然后进行的是邮件的验证，貌似用到了正则表达式。
    *然后为input元素添加keyup事件与focus事件。就是在keyup时也要做一下验证，调用blur事件就行了。用triggerHandler()触发器，触发相应的事件。
    *最后提交表单时做统一验证
    *做好整体与细节的处理
    */
    //如果是必填的，则加红星标识.
    $("form :input.required").each(function(){
        var $required = $("<strong class='high'> *</strong>"); //创建元素
        $(this).parent().append($required); //然后将它追加到文档中
    });
     //文本框失去焦点后
    $('form :input').blur(function(){
         var $parent = $(this).parent();
         $parent.find(".formtips").remove();
         //验证用户名
         if( $(this).is('#username') ){
                if( this.value=="" || this.value.length < 6 ){
                    var errorMsg = '请输入至少6位的用户名.';
                    $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
                }else{
                    var okMsg = '输入正确.';
                    $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
                }
         }
         //验证邮件
         if( $(this).is('#email') ){
            if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                  var errorMsg = '请输入正确的E-Mail地址.';
                  $parent.append('<span class="formtips onError">'+errorMsg+'</span>');
            }else{
                  var okMsg = '输入正确.';
                  $parent.append('<span class="formtips onSuccess">'+okMsg+'</span>');
            }
         }
    }).keyup(function(){
       $(this).triggerHandler("blur");
    }).focus(function(){
         $(this).triggerHandler("blur");
    });//end blur

    
    //提交，最终验证。
     $('#send').click(function(){
            $("form :input.required").trigger('blur');
            var numError = $('form .onError').length;
            if(numError){
                return false;
            } 
            alert("注册成功,密码已发到你的邮箱,请查收.");
     });

    //重置
     $('#res').click(function(){
            $(".formtips").remove(); 
     });
})
//]]>
$("#btn-custom-theme").click(function() {
	var userIp = returnCitySN["cip"];
	var mobile = $("#mobile").val();
	var password = $("#password").val();
	var repassword = $("#repassword").val();
	var weuiAgree = $("#weuiAgree").val();
	var checkInfo = $("#checkInfo").val();
	var url =HOST+'mobile.php?c=index&a=register';
	checkPhone(mobile);
	//checkPhone(password);
	 if(mobile==""|| password==""){//判断两个均不为空（其他判断规则在其输入时已经判断） 
		$.toptip('手机号密码均不能为空！', 200, 'warning');
	    return false; 
	 }
	  if(weuiAgree==''){
		  $.toptip('必须同意本网站的注册协议！', 200, 'warning');
		   return false;  
	  }
	  
				/* $.ajax({
					type: 'post',
					url: url,
					data: {mobile:mobile,password:password,ip:userIp,ip:userIp,ip:userIp,code:code,checkInfo:checkInfo},
					dataType: 'json',
					success: function (result) {
						var dataObj=eval("("+result+")");
						if (dataObj.status==='fail'){
							$.toptip('登陆失败',2000, 'error');
						}else{
							$.toptip('成功登陆',2000, 'success');
							window.location.href='http://www.baidu.com';
						}
					},
				}); */
});
function checkPhone(){ 
    var mobile = document.getElementById('mobile').value;
    if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){ 
        $.toptip('手机号码有误，请重填！', 2000, 'warning');
        return false; 
    } 
}
function checkPassword(){ 
	var pwd = document.getElementById('password').value;
	var repwd = document.getElementById('repassword').value;
	  if (pwd.length > 16 || pwd.length < 6)
	  {
	    $.toptip('密码长度应该在 6-16 位', 2000, 'warning');
	    return false;
	  }
	  if (pwd.length == repassword.length)
	  {
	    $.toptip('前后密码不一致！', 2000, 'warning');
	    return false;
	  }
	  alert('sdf');
	  return true;
}
	</script>
</html>