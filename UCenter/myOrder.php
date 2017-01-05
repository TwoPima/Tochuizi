<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-订单中心</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
</head>
<body >
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的订单</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
			<div class="myOrder clear" id="body_box">
			 <div class="weui_tab">
				  <div class="weui_navbar">
				     <div class="weui_navbar_item weui_bar_item_on" v-on:click="classdata('0')">待付款
				    </div>
				    <div  class="weui_navbar_item" v-on:click="classdata('1')"> 待收货
				    </div>
				    <div class="weui_navbar_item" v-on:click="classdata('2')"> 待评价
				    </div>
				    <div class="weui_navbar_item" v-on:click="classdata('3')">  退款
				    </div>
				  </div>
			  <div class="weui_tab_bd">
			       <div class="weui_panel weui_panel_access">
					  <div class="weui_panel_bd weui-article">
					 <!--待付款-->
									 <div  id="nopay-order" class="weui_tab_bd_item weui_tab_bd_item_active">
												 <div class="order-title">
													 <h2 class="title">
														 <span class="cb disabled float-left"></span>
														 <span class="float-left" id="name">宁夏亿次元科技有限公司</span>
														  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
														 <span class="red float-right">待付款</span>
													</h2>
												 </div>
												<a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg clear">
													<div class="weui-media-box__hd">
														<img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
													</div>
													<div class="weui-media-box__bd">
														<h4 class="weui-media-box__title">银川兴庆区糊上国际</h4>
														<p class="weui-media-box__desc">规格：官方标配</p>
														<h4 class="weui-media-box__title">￥<span id="singel-price">120.00</span>&nbsp;&nbsp;<span id="singel-number">X1</span></h4>
													</div>
												</a>
												<div class="order-foot float-right">共<span>2</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
												 <div class="button-sp-area float-right order-del clear">
													 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">取消订单</a>
													 <a href="pay.html" class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>
												 </div>
									</div><!--待付款结束-->
									 <div  id="noget-order" class="weui_tab_bd_item">
										 <div class="order-title">
												 <h2 class="title">
												  <span class="cb disabled float-left"></span>
													 <span class="float-left" id="name">宁夏亿次元科技有限公司</span>
													  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
													  <span class="red float-right">交易成功</span>
												 </h2>
										 </div>
										 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
											 <div class="weui-media-box__hd">
												 <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
											 </div>
											 <div class="weui-media-box__bd">
												 <h4 class="weui-media-box__title">银川兴庆区糊上国际</h4>
												<p class="weui-media-box__desc">规格：官方标配</p>
												<h4 class="weui-media-box__title">￥<span id="singel-price">120.00</span>&nbsp;&nbsp;<span id="singel-number">X1</span></h4>
											</div>
										 </a>
										 <div class="order-foot float-right">共<span>2</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a href="logistics.html" class="weui-btn weui-btn_mini weui-btn_default">查看物流</a>
											 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default button-pay">确认收货</a>
										 </div>
									 </div>
									 <!-- 待评价 -->
									 <div  id="noevaluation-order" class="weui_tab_bd_item">
										 <div class="order-title">
											 <h2 class="title">
												<span class="cb disabled float-left"></span>
												 <span class="float-left" id="name">宁夏亿次元科技有限公司</span>
												  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
												  <span class="red float-right">交易成功</span></h2>
										 </div>
										 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
											 <div class="weui-media-box__hd">
												 <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
											 </div>
											 <div class="weui-media-box__bd">
												 <h4 class="weui-media-box__title">银川兴庆区糊上国际</h4>
												 <p class="weui-media-box__desc">规格：官方标配</p>
												<h4 class="weui-media-box__title">￥<span id="singel-price">120.00</span>&nbsp;&nbsp;<span id="singel-number">X1</span></h4>
											</div>
										 </a>
										<div class="order-foot float-right">共<span>2</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">删除订单</a>
											 <a href="addEvaluate.html" class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;评价&nbsp;</a>
										 </div>
									 </div>
									 <!--退款-->
									  
									 <div id="drawback-order" class="weui_tab_bd_item">
										 <div class="order-title">
										 <h2 class="title">
											  <span class="cb disabled float-left"></span>
											 <span class="float-left" id="name">宁夏亿次元科技有限公司</span>
											  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
											 <span class="red float-right">待付款</span>
										</h2>
									 </div>
										 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
											 <div class="weui-media-box__hd">
												 <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
											 </div>
											 <div class="weui-media-box__bd">
												 <h4 class="weui-media-box__title">银川兴庆区糊上国际</h4>
												<p class="weui-media-box__desc">规格：官方标配</p>
												<h4 class="weui-media-box__title">￥<span id="singel-price">120.00</span>&nbsp;&nbsp;<span id="singel-number">X1</span></h4>
											</div>
										 </a>
										<div class="order-foot float-right">共<span>2</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">取消订单</a>
											 <a href="pay.html" class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>
										 </div>
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
<script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
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
					
				}
			}
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
		});
	var demoApp = new Vue({
		el: '#body_box',
		data: {
			num:'',
			demoData:'',
			total_tie:'',
			total_hits:'',
			url:{
				checkInfo:checkInfo,
				id:sessionUserId,
				is_true:'',
				start:0,
				limit:10
			}
		},/*初始化，el控制区域，  */
		ready: function() {
			var that = this;
			that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
					var res = response.data; //取出的数据
					var listdata=[];
					for(x  in res.data){
						/*console.log(x);
						 console.log(res.data[x]);*/
						if (typeof (res.data[x]) == 'object'){
							listdata[x]=res.data[x];
						}
					}
					that.$set('demoData', listdata);  //把数据传给页面
					that.$set('url.start', listdata.length);

					Vue.nextTick(function () {
						//初始化滚动插件
						that.myScroll = new IScroll('#wrapper', {
							mouseWheel: true,
							wheelAction: 'zoom',
							click: true,
							scrollX: false,
							scrollY: true,
							probeType: 3,
						});
						//滚动监听
						that.myScroll.on('scrollEnd',function(){
							alert('123');
						});//滚动监听,1000
					})
				},
				function (response) {
					that.$set('message', '服务器维护，请稍后重试');
				});
			/*再次加载  */
			function scrollaction(){
				alert('123');
				if(1){
					console.log(this.y);
					if (-(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
						console.log(that.url);
						that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
							var res = response.data;
							var listdata=[];
							for(x  in res.data){
								console.log(typeof (res.data[x]));
								if (typeof (res.data[x]) == 'object'){
									listdata[x]=res.data[x];
								}
							}
							this.url.start+=listdata.length;
							//这个for循环是更新vue渲染列表的数据
							for (var i = 0; i < listdata.length; i++) {
								that.demoData.push(listdata[i]);
							}
							console.log(that.demoData);
							Vue.nextTick(function () {
								that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
							});
						}, function (response) {
							//取消加载效果
							that.$set('message', '服务器维护，请稍后重试');
						});
					}

				}
			}
		}, //created 结束
		methods: {
			jump_url: function (msg1,msg2){
				window.location.href='editMySupply.php?supply_id='+msg1;
			},
			classdata: function (msg) {
				$('.sipply_nav .action').removeClass('action');
				var that = this;
				that.$set('num', 0);
				that.$set('url.start', 0);
				that.$set('total_tie',0);
				that.$set('total_hits', 0);
				switch(msg){
					case '':
						that.$set('url.is_true', '');
						$('.sipply_nav .one').addClass('action');
						break;
					case '0':
						that.$set('url.is_true', 0);
						$('.sipply_nav .two').addClass('action');
						break;
					case '1':
						that.$set('url.is_true', 1);
						$('.sipply_nav .three').addClass('action');
						break;
					default:
						$('.sipply_nav .one').addClass('action');
						that.$set('url.is_true', '');
				}
				that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
						var res = response.data; //取出的数据
						var listdata=[];
						for(x  in res.data){
							if (typeof (res.data[x]) == 'object'){
								listdata[x]=res.data[x];
							}
							if (x == 'total_tie'){
								that.$set('total_tie', res.data['total_tie']);
							}
							if (x == 'total_hits'){
								that.$set('total_hits', res.data['total_hits']);
							}
						}
						that.$set('num', that.url.limit);
						that.$set('demoData', listdata);  //把数据传给页面
						that.$set('url.start', listdata.length);
						Vue.nextTick(function () {
							//初始化滚动插件
							that.myScroll = new IScroll('#wrapper', {
								mouseWheel: true,
								wheelAction: 'zoom',
								click: true,
								scrollX: false,
								scrollY: true,
							});
							//滚动监听
							that.myScroll.on('scrollEnd',scrollaction1);//滚动监听,1000
						})
					},
					function (response) {
						that.$set('message', '服务器维护，请稍后重试');
					});
				/*再次加载  */
				function scrollaction1(){
					if( that.url.start >=  that.num ){
						if (-(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
							console.log(that.url);
							that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
								var res = response.data;
								var listdata=[];
								for(x  in res.data){
									if (typeof (res.data[x]) == 'object'){
										listdata[x]=res.data[x];
									}
								}
								this.url.start+=listdata.length;
								//这个for循环是更新vue渲染列表的数据
								for (var i = 0; i < listdata.length; i++) {
									that.demoData.push(listdata[i]);
								}
								console.log(that.demoData);
								Vue.nextTick(function () {
									that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
								});
							}, function (response) {
								//取消加载效果
								that.$set('message', '服务器维护，请稍后重试');
							});
						}
					}
				}
			}//ajaxdata
		}//method  结束
	});


});
</script>
</html>