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
</head>
<body >
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
		<div class="mySupply">
		<div class="weui_tab">
				  <div class="weui_navbar">
				    <a href="#all" class="weui_navbar_item weui_bar_item_on">全部
				    </a>
				    <a href="#supply" class="weui_navbar_item">供应
				    </a>
				    <a href="#need" class="weui_navbar_item">求购
				    </a>
				  </div>
			  <div class="weui_tab_bd">
			       <div class="weui_panel weui_panel_access">
					  <div class="weui_panel_bd">
					  <!--  <div class="weui_panel">
								  <div class="weui_panel_bd"> -->
			  				  <div id="all" class="weui_tab_bd_item weui_tab_bd_item_active">
			  					  <div class="weui_panel">
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
								  </div>
								  </div>
								</div>
			 
			 					   <div id="supply" class="weui_tab_bd_item">
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
			    
			    				  <div id="need" class="weui_tab_bd_item">
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
				</div>
			</div>
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
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/plugins/touchWipe/touchWipe.js"></script>
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
</script>
</html>