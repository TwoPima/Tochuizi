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
	<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
	<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>

<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>
<input value="<?php echo md5(date('Ymd')."my_partner"."tuchuinet");?>"	type="hidden" id="my_partner"/>
<script>
/* if(!window.sessionStorage.login){
    // go to login page
}
 localStorage.setItem("key","value");//以“key”为名称存储一个值“value”
 localStorage.getItem("key");//获取名称为“key”的值
 删除localStorage中存储信息的方法：
 localStorage.removeItem("key");//删除名称为“key”的信息。
 localStorage.clear();​//清空localStorage中所有信息
*/
/*if(window.localStorage){
	alert("浏览器支持localStorage");
}else{
	alert("浏览器暂不支持localStorage");
}
if(window.sessionStorage){
	alert("浏览器支持sessionStorage");
}else{
	alert("浏览器暂不支持sessionStorage");
}*/
	 sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
/*	sessionUserId=sessionStorage.getItem('userId');
	mobile=sessionStorage.getItem('mobileSession');*/
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
		//已经登陆 去服务器比对sessionid
		var url =HOST+'mobile.php?c=index&a=login';
		var checkInfo=$("#checkInfo").val();
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
						//判断是否进入店铺中心
						if(result.data.is_partner=='0'){
							$("#BusinessCenter").hide();
						}else{
							$("#addBusiness").hide();
						}
    					var mobile=$.session.get('mobileSession');
						$("#mobile").html(mobile);
    					if(eval('(' + result.data.idtype+ ')')==null){
    						$("#typeMember").html('点亮身份');
							$("#header-a-2").attr("href","memberType.php");
    					}else{
    						var typeMember=getMemberType(result.data.idtype);
    						$("#typeMember").html(typeMember);
    						$.session.set('typeMember', typeMember); 
    						$.session.set('idType', result.data.idtype);
    					}
    					var is_vip=result.data.is_vip;
    					if(is_vip=='0'){
    						$("#vipType").html('普通用户');
        				}else{
    						$("#vipType").html('认证用户');
        				}

        				$.session.set('isVip', is_vip); 
    					if(result.data.nickname==null){
    						$("#nickname").html('昵称');
        				}else{
    						$("#nickname").html(result.data.nickname);
        				}
    					if(result.data.avatar==null){
    						
    					}else{
    						$("#avatar").attr("src",HOST+result.data.avatar);//头像
    					}
						//数据取回成功
						if (result.data.count1!=='0'){
							$("#wait_pay").addClass("icon_num").html(result.data.count1);
						}
						if (result.data.count3!=='0'){
							$("#wait_get_goods").addClass("icon_num").html(result.data.count3);
						}
						if (result.data.count4!=='0'){
							$("#wait_evaluate").addClass("icon_num").html(result.data.count4);
						}
						if (result.data.count5!=='0'){
							$("#back_goods").addClass("icon_num").html(result.data.count5);
						}
    					
					} 
				}
			});
</script>
</head>
<body>
<div id="app">
	<div id="header" class="loginStatus">
		<a href="myInfo.php" class="header-a-1">
			<div class="head_img float-left">
				<img id="avatar" src="" alt="">
			</div>
			<div class="head_title" id="">
				<p><span id="nickname"></span></p>
				<p><span id="mobile"></span> </p>
				<p><span id="vipType"></span> </p>
			</div>
		</a>
		<a class="header-a-2" id="header-a-2">
		<div class="head_job">
			<img src="../Public/img/index/headright.png" alt="">
			<p><span id="typeMember"></span></p>
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
					<span id="wait_pay" class="  icon_num_float"></span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/noget.png" >
					<p>待收货</p>
					<span  id="wait_get_goods" class="icon_num_float"></span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/pingjia.png" >
					<p>待评价</p>
					<span  id="wait_evaluate" class=" icon_num_float"></span>
				</div>
				</a>
				<a href="myOrder.php">
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/index/tuihuo.png" >
					<p>退货</p>
					<span  id="back_goods"  class="icon_num_float"></span>
				</div>
				</a>
			</div>
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="mySupply.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/index_002.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的供求</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" id="judgeJob">
						<div class="weui-cell__hd"><img src="../Public/img/index/job-icon.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>我的求职</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>
			<div class="weui-panel">
					<a class="weui-cell weui-cell_access" href="region.php">
						<div class="weui-cell__hd"><img src="../Public/img/index/location.png" alt="" style="width:15px;margin-right:5px;display:block"></div>
						<div class="weui-cell__bd">
							<p>地址管理</p>
						</div>
						<div class="weui-cell__ft"></div>
					</a>
			</div>
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

			<div class="weui-panel" id="addBusiness">
				<a class="weui-cell weui-cell_access">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_006.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>加盟商入驻申请</p>
					</div>
					<div class="weui-cell__ft"></div>
				</a>
			</div>
			<div class="weui-panel" id="BusinessCenter">
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
		<a class="home" id="home" href="../index.html">
			  <i class="fa fa-home" aria-hidden="true"></i><span>首页</span>
		</a>
		<a class="cart" id="cart" href="../supply-demand.html">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i><span>供求</span>
		</a>
		<a class="center" id="center" style="color: #BF6E09" href="index.php">
			<i class="fa fa-user" aria-hidden="true"></i><span>我</span>
			</a>
	</div><!--bottom_menu  -->
</div><!--app-->
</body>
<script type="text/javascript">
$(function(){
			//查询简历是否存在
			$("#judgeJob").click(function(){
				if($.session.get('idType')==null){
					$.toast("请先点亮身份！", "forbidden");
					 setTimeout(window.location.href='memberType.php',8000)
				}else{
					var url =HOST+'mobile.php?c=index&a=my_resume';
					var checkInfoResume=$("#checkInfoResume").val();
					 $.ajax({
							type: 'post',
							url: url,
							data: {checkInfo:checkInfoResume,id:sessionUserId,dotype:'gain'},
							dataType: 'json',
							success: function (result) {
								var name=result.data.name;
								if(name==null){
									window.location.href='noMyJob.php';
								}else{
									window.location.href='myJob.php';
								}
							} 
						});
				}
			});
	//查询商铺中心的状态 status1 待审核 2驳回 3审核通过
			$("#addBusiness").click(function(){
					 $.ajax({
							type: 'post',
							url: HOST+'mobile.php?c=index&a=my_partner',
							data: {checkInfo:$("#my_partner").val(),id:sessionUserId,dotype:''},
							dataType: 'json',
							success: function (result) {
								if(result.statusCode=="0"){
									window.location.href='../BusinessCenter/addBusiness.php';
								}
								if(result.statusCode=="1"){
									window.location.href='../BusinessCenter/editBusinessInfo.php';
								}
							}
						});

			});
			
});

</script>
</html>