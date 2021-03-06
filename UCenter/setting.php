<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-设置</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../Public/css/weui.min.css"/>
        <link rel="stylesheet" href="../Public/css/weui.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
        <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
        <script src="../Public/js/require.config.js"></script>
        <script src="../Public/js/jquery-2.1.4.js"></script>
        <script src="../Public/js/jquery-weui.min.js"></script>
        <script src="../Public/js/jquery-session.js"></script>
	<script src="../Public/js/common.js"></script>
</head>
<body>
<div id="app">
	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">设置</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<div id="main" class="setting">
		<div class="weui-cells">
		    <div class="weui-cell"  id="password">
		         <a href="password.php" >
		         <div class="weui-cell__bd">
		           <p>更改密码</p>
		        </div>
		        </a>
		    </div>
		    <div class="weui-cell" id="about">
		     <a href="about.php">
		        <div class="weui-cell__bd">
		            <p>关于土锤</p>
		        </div>
		        </a>
		    </div>
		    <div class="weui-cell" id="feedback">
		     <a href="feedback.php">
		        <div class="weui-cell__bd">
		            <p>意见反馈</p>
		        </div>
		        </a>
		    </div>
		</div>
		<div class="height20px"></div>
		<div class="height20px"></div>
		<div class="height20px"></div>
		<div class="height20px"></div>
		<div class="height20px"></div>
		<div class="button-sp-area">
		    <a  onclick='deleteItem();' class="weui-btn weui-btn_plain-primary" id="btn-custom-theme">退出登录</a>
		</div>
		<div class="height20px"></div>
	</div><!--main-->
</div><!--app-->
</body>
<script>
	$(function(){
		$("#password").click(function(){
			window.location.href="password.php";
		});
		$("#about").click(function(){
			window.location.href="about.php";
		});
		$("#feedback").click(function(){
			window.location.href="feedback.php";
		});
	});
function deleteItem(){
//  localStorage.removeItem('userinfo');
	 $.session.clear();
	 //   $.session.remove('key');
  	localStorage.clear();
  	sessionStorage.clear(); 
 	window.location.href="../Login/login.php";
}
</script>
</html>