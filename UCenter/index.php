<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" type="text/css" href="../Public/font/Font-Awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../Public/css/center.css"/>
</head>
<body>
<div id="app">
	<div id="header" class="loginStatus">
		<a href="myInfo.php" class="header-a-1">
		<div class="head_img float-left">
			<img src="../Public/img/index/index_headimg2.jpg" alt="">
		</div>
		<div class="head_title" id="">
			<p><span id="nickname">{{nickname}}</span></p>
			<p><span id="mobile">{{mobile}}</span> </p>
			<p><span id="typeMember">{{typeMember}}</span> </p>
		</div>
		<!-- <div class="head_title" id="noLogin">
			<p>请登录 </p>
		</div> -->
		</a>
		<a href="memberType.php"class="header-a-2">
		<div class="head_job">
			<img src="../Public/img/index/headright.png" alt="">
			<p>设计师</p>
		</div>
		</a>
	</div>
	<!-- 未登录状态 -->
	<div id="header" class="nologin">
		<a href="../login.php" class="header-a-1">
		<div class="head_img float-left">
			<img src="../Public/img/index/index_headimg2.jpg" alt="">
		</div>
		<div class="head_title" id="">
			<p>请登录</p>
		</div>
		<!-- <div class="head_title" id="noLogin">
			<p>请登录 </p>
		</div> -->
		</a>
		<a href="memberType.php"class="header-a-2">
		<div class="head_job">
			<img src="../Public/img/index/headright.png" alt="">
			<p>点亮身份</p>
		</div>
		</a>
	</div>
	<div id="main">
		<div class="page">
			<div class="weui-panel menu_order">
				<a class="weui-cell weui-cell_access" href="myOrder.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_001.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>我的订单</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>
			<div  class="weui-flex menu_4">
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/nopay.png" >
					<p>待付款</p>
					<span class="icon_num  icon_num_float">3</span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/noget.png" >
					<p>待收货</p>
					<span class="icon_num  icon_num_float">3</span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/pingjia.png" >
					<p>待评价</p>
					<span class="icon_num  icon_num_float">3</span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/tuihuo.png" >
					<p>退货</p>
					<span class="icon_num  icon_num_float">3</span>
				</div>
				</a>
			</div>
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="mySupply.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/index_002.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的供求</p>
						</div>
						<div class="weui-cell__ft"><span class="icon_num">3</span></div>
					</a>
			</div>
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="myJob.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/job-icon.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的求职</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>
		<!-- 	<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="region.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/location.png" alt="" style="width:15px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>地址管理</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div> -->
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="myCollect.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/index_003.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的收藏</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>

			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="evaluate.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/index_004.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的评价</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>

			<!-- <div class="weui-panel">
				<a class="weui-cell weui-cell_access" href="notice.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_005.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>消息通知</p>
					</div>
					<div class="weui-cell__ft"><span class="icon_num">3</span></div>
				</a>
			</div> -->

			<div class="weui-panel">
				<a class="weui-cell weui-cell_access" href="../BusinessCenter/addBusiness.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_006.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>加盟商入驻申请</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>
			<div class="weui-panel">
				<a class="weui-cell weui-cell_access" href="../BusinessCenter/index.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_006.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>卖家中心</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>

			<div class="weui-panel">
				<a class="weui-cell weui-cell_access" href="addVip.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_007.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>成为VIP</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>
			<div class="weui-panel">
				<a class="weui-cell weui-cell_access" href="setting.php">
					<div class="weui-cell__hd"><img src="../Public/img/index/setting-icon.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>设置</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>
		</div>
	</div><!--main-->
	<div class="height20px"></div>
	<div class="height20px"></div>
	<div class="height20px"></div>
	<div class="bottom_menu">
		<a class="home" id="home" href="../index.php">
			  <i class="fa fa-home" aria-hidden="true"></i><span>首页</span>
		</a>
		<a class="cart" id="cart" href="../supply-demand.php">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i><span>供求</span>
		</a>
		<a class="center" id="center" style="color: #BF6E09" href="index.php">
			<i class="fa fa-user" aria-hidden="true"></i><span>我</span>
			</a>
	</div><!--bottom_menu  -->
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$(".nologin").show(); 
		$(".loginStatus").hide(); 
	}else{
		//已经登陆
		$(".nologin").hide(); 
		$(".loginStatus").show(); 
		
		var url =HOST+'mobile.php?c=index&a=login';
		var checkInfo=$("checkInfo").val();
		 $.ajax({
				type: 'post',
				url: url,
				data: {checkInfo:checkInfo,id:sessionUserId},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					var tips=result.message;
					if (result.statusCode=='0'){
						$.toptip(tips,2000, 'error');
					}else{
						//数据取回成功
					var mobile=$.session.get('mobileSession');
					new Vue({
						  el: '#mobile',
						  data: {
						   mobile: mobile
						  }
						/*   el: '#nickname',
						  data: {
							  nickname: nickname
						  }
						  el: '#typeMember',
						  data: {
							  typeMember: typeMember
						  } */
						})
					} 
				}
			});
	}
	
});
</script>
</html>