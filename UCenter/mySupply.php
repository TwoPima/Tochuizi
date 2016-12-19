<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-我的供求</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css">
	<link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<script src="../Public/js/jquery-2.1.4.js"></script>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>
<input value="<?php echo md5(date('Ymd')."supply_list"."tuchuinet");?>"	type="hidden" id="supply_all"/>
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>
<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/plugins/touchWipe/touchWipe.js"></script>
	<script src="../Public/js/iscroll.js"></script>
	<script type="text/javascript">
		var myScroll;
		function loaded () {
			myScroll = new IScroll('#wrapper',{
				preventDefault:false,
				scrollX: true,
				scrollY: false,
				momentum: false,
				snap: true,
				snapSpeed: 400,
				keyBindings: true,
			});
		}
	</script>
	<style>
		html,body{
			height: 100%;
		}
		#main{
		/*	position: fixed;
			width: 100%;
			top:48px;
			bottom: 0;*/
		}
		.sipply_nav{
			margin-top: 15px;
			background: #fff;
			font-size: 16px;
			text-align: center;
		}
		.sipply_nav .weui-flex__item{
			padding:13px 0;
		}
		.action{
			border-bottom:3px solid red;
		}
		#wrapper {
			position: fixed;
			width:100%;
			top:222px;
			bottom: 0;
			background: #dedede;
			overflow: hidden;
			/* Prevent native touch events on Windows */
			-ms-touch-action: none;
			/* Prevent the callout on tap-hold and text selection */
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			/* Prevent text resize on orientation change, useful for web-apps */
			-webkit-text-size-adjust: none;
			-moz-text-size-adjust: none;
			-ms-text-size-adjust: none;
			-o-text-size-adjust: none;
			text-size-adjust: none;
		}
		#scroller {
			position: absolute;
			width:100%;
			/* Prevent elements to be highlighted on tap */
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			/* Put the scroller into the HW Compositing layer right from the start */
			-webkit-transform: translateZ(0);
			-moz-transform: translateZ(0);
			-ms-transform: translateZ(0);
			-o-transform: translateZ(0);
			transform: translateZ(0);
		}
	</style>
</head>
<body onload="loaded()">
<div id="topback-header">
	<div id="header-left">
		 <a href="index.php">
			  <i class="icon iconfont icon-xiangzuo"></i>
				<span class="title">我的供求</span>
		 </a>
	</div>
	<div id="header-right">
		<a href="addMySupply.php"><span>发布供求</span></a>
	</div>
</div>
<!--内容页面  -->
<div id="main">
	<div class="supply_count">
		<p class="float-left">
			<img src="../Public/img/supply/supply-icon.png">
		</p>
		<h2 class="supply_number float-left">512<span>个帖子</span></h2>
		<p class="supply-right float-right">
			被阅览<span class="supply_see_num">123441</span>次
		</p>
	</div>
	<div class="sipply_nav">
		<div class="weui-flex ">
			<div class="weui-flex__item action">
				<div class="placeholder">全部</div>
			</div>
			<div class="weui-flex__item">
				<div class="placeholder">供应</div>
			</div>
			<div class="weui-flex__item">
				<div class="placeholder">求购</div>
			</div>
		</div>
	</div>
	<div id="wrapper">
		<div id="scroller">
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
			<div class="weui_panel">
				<a class="weui_panel_ft">
					<div class="weui_media_box weui_media_text">
						<p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
						<ul class="weui_media_info">
							<li class="weui_media_info_meta">昨天发布
							</li>
							<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
						</ul>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
</div>
</body>
<script>
$(function(){
	var sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else{
		//已经登陆
	var checkInfo = $("#supply_all").val();
	var is_true ='';
	var	start = 0;
	var	limit = 5;
  	var url =HOST+'mobile.php?c=index&a=supply_list';
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,is_true:'',start:'',limit:'',id:sessionUserId},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					//数据取回成功
					var mobile=$.session.get('mobileSession');

				}
			},
		 	error:{

			}
		});
	}
});
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex = $("#sex").val();
		var nickname = $("#nickname").val();
		var sex=$("input[name='sex':checked").val();
       	var url =HOST+'mobile.php?c=index&a=my_resume';
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
			}
		});
});
</script>
</html>