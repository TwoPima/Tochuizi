<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>商铺管理中心-首页</title>
         <link rel="stylesheet" type="text/css" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" type="text/css"  href="../Public/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/common.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
         <input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfoLogin"/>  
<input value="<?php echo md5(date('Ymd')."my_partner"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."partner_cat"."tuchuinet");?>"	type="hidden" id="checkInfoPartnerType"/>  <!--加盟商类别  -->
<input value="<?php echo md5(date('Ymd')."pic_partner"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/>  
<input value="<?php echo md5(date('Ymd')."last_comment"."tuchuinet");?>"	type="hidden" id="last_comment"/> <!-- 最新评价 -->
<input value="<?php echo md5(date('Ymd')."get_order_by_user_by_status"."tuchuinet");?>"	type="hidden" id="get_order_by_user_by_status"/> <!-- 最新评价 -->
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script>
sessionUserId=$.session.get('userId');
if(sessionUserId==null){
	//没有登陆
	$.toptip('您还没有登陆！',2000, 'error');
	window.location.href='../Login/login.php';
}
	//已经登陆
var checkInfoLogin = $("#checkInfoLogin").val();
var url =HOST+'mobile.php?c=index&a=login';
  $.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoLogin,id:sessionUserId},
		dataType: 'json',
		success: function (result) {
			var message=result.message;
			if (result.statusCode==='0'){
				$.toptip('登陆超时请重新登陆！',2000, 'warning');
				window.location.href='../Login/login.php';
			}
		}
	});
//取出商铺信息
$.ajax({
	type: 'post',
	url: HOST+'mobile.php?c=index&a=my_partner',
	data: {checkInfo:$("#checkInfo").val(),id:sessionUserId,dotype:''},
	dataType: 'json',
	success: function (result) {
			$("#company_name").html(result.data.name);
			$("#company_address").html(result.data.address);
			$("#mobile").html(result.data.mobile);
		$("#avatar").attr("src",HOST+result.data.avatar);//头像;
	}
});
	$(function(){
		//等待发货
		var waitGetGoods = new Vue({
			el: '#wait-fahuo',
			data: {
				goodsList : '',//取回的数据
				//传递数据
				ToDataStatusAuth:{
					checkInfo:$("#get_order_by_user_by_status").val(),
					user_id:sessionUserId,
					order_status:'1'//订单状态0代付款 1待收货 2待评价 3退款
				}
			},
			ready: function() {
				var that = this;
				that.$http.get(HOST+'index.php?c=order&a=get_order_by_user_by_status',that.ToDataStatusAuth).then(function (response) {
					var res = response.data; //取出的数据
					that.$set('goodsList', res.list);  //把数据传给页面
				});
			},//created 结束
			methods: {
				nameSearch: function () {

				}
			}
		})
		//取出信息
		new Vue({
			el: '#app',
			data: {
				listCommentData: {},
				ToDataAuth:{
					checkInfo:$("#last_comment").val(),
					id:sessionUserId,
				}
			},
			/*初始化，el控制区域，  */
			ready: function() {
				var that = this;
				that.$http.get(HOST+'mobile.php?c=index&a=last_comment',that.ToDataAuth).then(function (response) {
					var res = response.data.data; //取出的数据
					console.log(res);
					//	window.location.href='noEvaluate.php';
					that.$set('listData', res);  //把数据传给页面
				});
			},//created 结束
			methods: {
				jump_url: function (msg1){
					window.location.href='index.php?goods_id='+msg1;
				}
			}
		});
	});
</script>
    </head>
    <body id="app">
			<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">商铺管理中心</span>
	               	 </a>
 				</div>
                <div id="header-right">
                <!--	<a href="addBusinessInfo.php"><i class="icon iconfont icon-shezhi"></i></a>-->
                </div>
		</div>
			<section id="shopIndex">
				<div class="weui-panel weui-panel_access">
				    <div class="weui-panel__bd">
				        <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
				            <div class="weui-media-box__hd">
				                <img class="weui-media-box__thumb" id="avatar" style="height: 60px;width: 60px;" alt="">
				            </div>
				            <div class="weui-media-box__bd">
				              <!--   <h4 class="weui-media-box__title"></h4> -->
				                <p id="company_name" class="weui-media-box__desc margin-bottom-10px"></p>
				                <p id="company_address" class="weui-media-box__desc margin-bottom-10px"></p>
				                <p id="mobile" class="weui-media-box__desc"></p>
				            </div>
				        </a>
				    </div>
				</div>
			</section>
			<section class="navSecond">
			<div class="weui-tab">
			    <div class="weui-tabbar">
			        <a href="javascript:;" class="weui-tabbar__item" id="shop-index">
			             <div><img src="../Public/img/business/index.png" alt="" class="weui-tabbar__icon"></div>
			           	 <p class="weui-tabbar__label">店铺首页</p>
			        </a>
			        <a href="orderList.php" class="weui-tabbar__item" id="order">
  <div><img src="../Public/img/business/order.png" alt="" class="weui-tabbar__icon"></div>
			            <p class="weui-tabbar__label">货单管理</p>
			        </a>
			        <a href="employ.php" class="weui-tabbar__item" id="job">
			           <div><img src="../Public/img/business/job.png" alt="" class="weui-tabbar__icon"></div>
			            <p class="weui-tabbar__label">招聘管理</p>
			        </a>
			        <a href="cash.php" class="weui-tabbar__item margin-bottom-10px" id="cash">
  					<div class=""><img src="../Public/img/business/cash.png" alt="" class="weui-tabbar__icon"></div>
			            <p class="weui-tabbar__label">提现管理</p>
			        </a>
			    </div>
			</div>
			</section>
			<!--第三部分  -->
			<section id="wait-fahuo">
				<div class="weui-panel weui-panel_access">
				    <div class="weui-panel__hd big-title">
				   		 <img alt="" src="../Public/img/business/NoFahuo.png"><h3 class="title">待发货</h3>
				    </div>
					<template v-for="item in goodsList "><!--三层  -->
						<div class="weui-panel__bd clear">
							<div class="weui-media-box weui-media-box_text">
							  <h5 class="weui-media-box__title">订单号：{{item.order_sn}}</h5>
								<p class="weui-media-box__desc">{{item.product_name}} <span id="guige">规格套餐: <span>官方标配套餐</span></span></p>
								<p class="weui-media-box__desc order-time"><span>{{item.1order_create_time}}</span>小时前下单</p>
							</div>
						</div>
					</template>
				</div>
			</section>
			<!--第四部分  -->
			<section id="waitJudge">
				<div class="weui-panel weui-panel_access">
					<div class="weui-panel__hd big-title"><img alt="" src="../Public/img/business/newjudge.png"><h3 class="title">最新评价</h3></div>
						<template v-for="item in listCommentData "><!--三层  -->
							<div>
								<div class="weui-cell">
									<div class="weui-cell__hd">
										<div class="thumb-img">
											<img src="{{HOST+item.avatar}}" alt="" >
										</div>
										<div  class="description">
											<p class="name">{{item.}}</p>
											<p id="ratyStar" data-score="4"></p>
										</div>
									</div>
									<div class="weui-cell__ft time">2016-16-23</div>
								</div>
								<div class="weui-article">
									<p>{{item.desc}}</p>
									<p>
										<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg=="" alt="">
										<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg=="" alt="">
									</p>
								</div>
							</div>
					</template>
					<div>
						<div class="weui-cell">
							<div class="weui-cell__hd">
								<div class="thumb-img">
									<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="" >
								</div>
								<div  class="description">
									<p class="name">亿次元科技</p>
									<p id="ratyStar" data-score="4"></p>
								</div>
							</div>
							<div class="weui-cell__ft time">2016-16-23</div>
						</div>
						<div class="weui-article">
							<p>其实我也是个老客户了，这个店我也光顾很多次了，整体的感觉还是比较可以的。</p>
							<p>
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg=="" alt="">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg=="" alt="">
							</p>
						</div>
					</div>
				</div>
			</section>
			
    </body>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/demo/js/jquery.min.js"></script>
 <script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
$(function() {
    $.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
    $('#ratyStar').raty({ 
    	  score: function() { 
    	    return $(this).attr('data-score'); 
    	  } 
    	}); 
});
</script>
</html>