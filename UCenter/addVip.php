<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-成为VIP</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Public/css/weui.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/addvip.css"/>
</head>
<body >
<div id="vip-app">
			<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">VIP特权</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<div class="vip_box top">
		<div class="vip_box_logo">
			<img src="../Public/img/vip/vipTop.png" alt="">
		</div>
		<div  class="weui-flex menu_4">
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/resume.png" >
				<p>简历查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/supply.png" >
				<p>供求查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/zizhi.png" >
				<p>资质查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/zhaobiao.png" >
				<p>招标查阅</p>
			</div>
		</div>
	</div>
	<div class="vip_box buy_box">
		<div class="weui-panel menu_order">
			<div class="weui-cell ">
				<div class="weui-cell__hd"><img src="../Public/img/vip/vip-icon.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui-cell__bd">
					<p>vip充值</p>
				</div>
			</div>
		</div>
		<div  class="weui-flex buy_vip">
			<div class="weui-flex__item">
				<div class="menu_3_box">
					<img src="../Public/img/vip/vip-icon-1.png" >
					<div class="vip_money">
						<p class="vip_money_line1">100元</p>
						<p class="vip_money_line2">120次查询</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>

			<div class="weui-flex__item  ">
				<div class="menu_3_box">
					<img src="../Public/img/vip/vip-icon-1.png" >
					<div class="vip_money">
						<p class="vip_money_line1">300元</p>
						<p class="vip_money_line2">120次查询</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
			<div class="weui-flex__item ">
				<div class="menu_3_box">
					<img src="../Public/img/vip/vip-icon-1.png" >
					<div class="vip_money">
						<p class="vip_money_line1">500元</p>
						<p class="vip_money_line2">120次查询</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
		</div>
		<div class="input_vip">
			<input type="text" placeholder="点击输入自定义金额,1元/次">
		</div>
	</div>
	<div class="vip_box ">
		<div class="weui-panel menu_order">
			<div class="weui-cell ">
				<div class="weui-cell__hd"><img src="../Public/img/vip/vip009.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui-cell__bd">
					<p>选择支付方式</p>
				</div>
			</div>
		</div>
		<div  class="weui-flex zhifu_vip">

			<div class="weui-flex__item ">
				<div class="menu_2_box">
					<img src="../Public/img/vip/zhifubao.png" >
					<div class="vip_money">
						<p class="vip_money_line1">支付宝</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
			<div class="weui-flex__item ">
				<div class="menu_2_box">
					<img src="../Public/img/vip/weixin.png" >
					<div class="vip_money">
						<p class="vip_money_line1">微信支付</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
		</div>
	</div>
	<div class="vip_button">
		<a  class="weui-btn weui-btn_warn" id="btn-custom-theme">下一步</a>
	</div>
</div>
</body>
<input value="<?php echo md5(date('Ymd')."vip_recharge"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>  
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/common.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else{
		//已经登陆
  	var checkInfo = $("#checkInfo").val();
  	var url =HOST+'mobile.php?c=index&a=my_resume';
	 $.ajax({
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
			},
		});
	  //文本框失去焦点后
	   $('form :input').blur(function(){
	        //验证手机
	        if( $(this).is('#mobile') ){
	       	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
	                $.toptip('手机号码有误，请重填！', 2000, 'warning');
	                return false; 
	            } 
	      }
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
			},
		});
});
</script>
</html>