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
	<input value="<?php echo md5(date('Ymd')."get_order_by_user_by_status"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
	<input value="<?php echo md5(date('Ymd')."order_status"."tuchuinet");?>"	type="hidden" id="order_status"/>
	<script src="../Public/js/require.config.js"></script>
	<script src="../Public/js/jquery-2.1.4.js"></script>
	<script src="../Public/js/jquery-session.js"></script>
	<script src="../Public/js/vue.2.1.0.js"></script>
	<script type="text/javascript" src="../Public/js/vue.min.js"></script>

	<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
	<script>
		$(function(){
			sessionUserId=$.session.get('userId');
			//sessionUserId=sessionStorage.getItem('userId');
			if(sessionUserId==null){
				//没有登陆
				//$.toptip('您还没有登陆！',2000, 'error');
				window.location.href='../Login/login.php';
			}
			//已经登陆

			var demoApp = new Vue({
				el: '#body_box',
				data: {
					num:'',
					demoData:'',
					url:{
						checkInfo:$("#checkInfo").val(),
						user_id:sessionUserId,
						order_status:'0',// 默认：订单状态0代付款 1待收货 2待评价 3退款

					}
				},
				/*初始化，el控制区域，  */
				ready: function() {
					var that = this;
					console.log(that.url);
					that.$http.get(HOST+'index.php?c=order&a=get_order_by_user_by_status',that.url).then(function (response) {
							var res = response.data; //取出的数据
							that.$set('order_status', 0);//
							that.$set('demoData', res.list);  //把数据传给页面
						//console.log(res.list);
							//that.$set('url.start', listdata.length);
						},
						function (response) {
							that.$set('message', '服务器维护，请稍后重试');
						});
				}, //created 结束
				methods: {
					jump_url: function (msg1,msg2){
						window.location.href='editMySupply.php?supply_id='+msg1;
					},
					jump_url_to_delete: function (msg1,msg2){
						//执行删除操作
						var url =HOST+'index.php?c=index&a=order';
						var checkInfoResume=$("#checkInfoResume").val();
						$.ajax({
							type: 'post',
							url: url,
							data: {checkInfo:$("#order_status").val(),id:sessionUserId,},
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

					},
					jump_url_to_pay: function (msg1,msg2){
						window.location.href='pay.php?supply_id='+msg1;
					},
					classdata: function (msg) {
						$('.weui_navbar .weui_bar_item_on').removeClass('weui_bar_item_on');
						var that = this;
						//console.log(that.url);
						that.$set('num', 0);
						switch(msg){
							case '1':
								that.$set('url.order_status', '1');
								$('.weui_navbar .two').addClass('weui_bar_item_on');

								break;
							case '2':
								that.$set('url.order_status', '2');
								$('.weui_navbar .three').addClass('weui_bar_item_on');
								break;
							case '3':
								that.$set('url.order_status', '3');
								$('.weui_navbar .four').addClass('weui_bar_item_on');
								break;
							default:
								that.$set('url.order_status', '0');
								$('.weui_navbar .one').addClass('weui_bar_item_on');
						}
						console.log(that.url);
						that.$http.get(HOST+'index.php?c=order&a=get_order_by_user_by_status',that.url).then(function (response) {
								var res = response.data; //取出的数据
								//console.log(that.url.order_status);
								that.$set('num', that.url.limit);
								that.$set('demoData', res.list);  //把数据传给页面
								//that.$set('url.start', listdata.length);
							},
							function (response) {
								that.$set('message', '服务器维护，请稍后重试');
							});
					}//ajaxdata
				}//method  结束
			});
		});
	</script>
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
				     <div class="weui_navbar_item one weui_bar_item_on" v-on:click="classdata('0')">待付款
				    </div>
				    <div  class="weui_navbar_item two" v-on:click="classdata('1')"> 待收货
				    </div>
				    <div class="weui_navbar_item three" v-on:click="classdata('2')"> 待评价
				    </div>
				    <div class="weui_navbar_item four" v-on:click="classdata('3')">  退款
				    </div>
				  </div>
			  <div class="weui_tab_bd">
			       <div class="weui_panel weui_panel_access">
					  <div class="weui_panel_bd weui-article">
					 <!--待付款-->
						   <template v-if="url.order_status=='0'"><!--判断哪个订单状态-->
							  <template v-for="item in demoData"><!--具体的数据结构写入  -->
									 <div  id="nopay-order" class="weui_tab_bd_item weui_tab_bd_item_active">
												 <div class="order-title">
													 <h2 class="title">
														 <span class="cb disabled float-left"></span>
														 <span class="float-left" id="name">{{item.order_sn}}</span>
														<!--  <span class="jinru float-left"><i class="icon iconfont icon-icon"></i></span>-->
														 <span class="red float-right">待付款</span>
													</h2>
												 </div>
											 <a v-on:click="jump_url(item.product_id,item.url)" class="weui-media-box weui-media-box_appmsg clear">
													<div class="weui-media-box__hd">
														<img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
													</div>
													<div class="weui-media-box__bd">
														<h4 class="weui-media-box__title">{{item.product_name}}</h4>
														<p class="weui-media-box__desc">规格：官方标配</p>
														<h4 class="weui-media-box__title">￥<span id="singel-price">{{item.goods_amount}}</span>&nbsp;&nbsp;
															<span id="singel-number">X1{{item.goods_count}}</span></h4>
													</div>
												</a>
												<div class="order-foot float-right"><!--共<span>1</span>件产品，-->
													合计<span>{{item.pay_price}}</span>元（含运费<span></span>元）</div>
												 <div class="button-sp-area float-right order-del clear">
													 <a v-on:click="jump_url_to_delete(item.order_id,item.url)" class="weui-btn weui-btn_mini weui-btn_default">取消订单</a>
													 <a v-on:click="jump_url_to_pay(item.order_id,item.url)"  class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>
												 </div>
									</div><!--待付款结束-->
							  </template>
							  <template  v-if="url.order_status=='1'><!--判断哪个订单状态-->
								  <template v-for="item in demoData"><!--具体的数据结构写入  -->
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
										 <div class="order-foot float-right">共<span>1</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a href="logistics.html" class="weui-btn weui-btn_mini weui-btn_default">查看物流</a>
											 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default button-pay">确认收货</a>
										 </div>
									 </div>
									  </template>
								</template>
									 <!-- 待评价 -->
							  <template v-if="url.order_status=='2'><!--判断哪个订单状态-->
								  <template v-for="item in demoData"><!--具体的数据结构写入  -->
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
									  </template>
								  </template>
									 <!--退款-->
							  <template v-if="url.order_status=='3'><!--判断哪个订单状态-->
								  <template v-for="item in demoData"><!--具体的数据结构写入  -->
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
										<div class="order-foot float-right">共<span>1</span>件产品，合计<span>23234</span>元（含运费<span>10.00</span>元）</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">取消订单1</a>
											 <a href="pay.html" class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>
										 </div>
										 </div>
									  </template>
								  </template>
						  </div>
		    	</div>
			    </div>
				</div>
		</div>
</div>
</body>
</html>