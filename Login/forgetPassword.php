<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>忘记密码</title>
     <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/login.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
        <script>
/**
 * 全局变量
 */
var SITE_URL  = '<php> echo SITE_URL;</php>';
var UPLOAD_URL= '<php> echo UPLOAD_URL;</php>';
var THEME_URL = '__THEME__';
var APPNAME   = '<php> echo APP_NAME;</php>';
var MID       = '<php> echo $mid;</php>';
var UID       = '<php> echo $uid;</php>';
var initNums  =  '<php> echo $initNums;</php>';
var SYS_VERSION = '<php> echo $site["sys_version"];</php>';
var _CITY = '{:session("init_city")}';
var ISWAP = 1;
var USER_UN_SETTING = '{$unsetting}';
// js语言变量
var LANG = new Array();
</script>
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
				      <input class="weui_input" type="tel" placeholder="请输入手机号">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/code.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="tel" placeholder="请输入验证码">
				    </div>
				    <div class="weui-cell__ft">
			            <a href="javascript:;" class="weui-vcode-btn">获取验证码</a>
			        </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" placeholder="设置密码">
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_hd"><img src="../Public/img/login/password.png"></div>
				    <div class="weui_cell_bd weui_cell_primary">
				      <input class="weui_input" type="password" placeholder="重复密码">
				    </div>
				  </div>
				</div>
					<div class="height20px"></div> 
			  <a href="" id="btn-custom-theme" class="weui-btn weui_btn_primary ">找回密码</a> 
			  </div>
    </body>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
</html>