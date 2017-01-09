<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-设置</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	<link rel="stylesheet" href="../Public/css/setting.css"/>
	<link rel="stylesheet" href="../Public/css/common.css"/>
</head>
<body>
<div id="app">
	<div id="header">
		<a href="index.html"><</a>
		我的积分
	</div>
	<div id="main">
		<div class="setting_count">
			<img src="../public/img/setting/setting_001.jpg">
			<span class="setting_count_title">(积分总计)</span>
			<span class="setting_count_num">250</span>
		</div>

		<div class="weui-flex setting_tab">
			<div class="weui-flex__item action"><div class="placeholder">全部</div></div>
			<div class="weui-flex__item"><div class="placeholder">收入积分</div></div>
			<div class="weui-flex__item"><div class="placeholder">支出积分</div></div>
		</div>

		<div class="setting_list">
			<ul>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num reduce">-35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
			</ul>
		</div>
	</div><!--main-->
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>  
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>  
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/vue.2.1.0.js"></script>
<script src="../Public/js/center.js"></script>
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
</script></html>