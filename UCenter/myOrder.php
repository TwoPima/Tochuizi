<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-订单中心</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.min.css"/>
	<link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
</head>
<body>
<div id="app">
	<div id="topback-header">
		<div id="header-left">
			 <a href="javascript:history.go(-1);" >
				  <i class="icon iconfont icon-xiangzuo"></i>
					<span class="title">我的订单</span>
			 </a>
		</div>
		<div id="header-right"></div>
	</div>
	<div class="myOrder clear" id="body_box">
		 <div class="weui_tab">
			<div class="weui_navbar">
				<div class="weui_navbar_item one weui_bar_item_on" v-on:click="classdata('1')">待付款</div>
				<div  class="weui_navbar_item two" v-on:click="classdata('3')"> 待收货</div>
				<div class="weui_navbar_item three" v-on:click="classdata('4')"> 待评价</div>
				<div class="weui_navbar_item four" v-on:click="classdata('5')">  退款</div>
			</div>
			<div class="weui_tab_bd">
				<div class="weui_panel weui_panel_access">
					<div class="weui_panel_bd weui-article">
						<template v-if="dataNull==1"><!--是否有订单信息-->
					 <!--待付款-->
						   <template   v-if="url.status=='1'"><!--判断哪个订单状态-->
							  <template v-for="item in demoData"><!--具体的数据结构写入 -->
								 <div  id="nopay-order" class="weui_tab_bd_item weui_tab_bd_item_active">
										 <div class="order-title">
											 <h2 class="title">
												<!-- <span class="cb disabled float-left"></span>-->
												 <span class="float-left" id="name">{{item.store_name}}</span>
												  <span class="jinru float-left"><i class="icon iconfont icon-icon"></i></span>
												 <span class="red float-right">待付款</span>
											</h2>
										 </div>
										 <a v-on:click="jump_url(item.product_id,item.url)" class="weui-media-box weui-media-box_appmsg clear">
												<div class="weui-media-box__hd">
													<img class="weui-media-box__thumb" src="{{item.img_url|addUrl}}" alt="">
												</div>
												<div class="weui-media-box__bd">
													<h4 class="weui-media-box__title">{{item.product_name}}</h4>
													<p class="weui-media-box__desc">规格：{{item.product_spec}}</p>
													<h4 class="weui-media-box__title">￥<span id="singel-price">{{item.goods_amount}}</span>&nbsp;&nbsp;
														<span id="singel-number">X{{item.goods_count}}</span></h4>
												</div>
											</a>
											<div class="order-foot float-right"><!--共<span>1</span>件产品，-->
												合计<span>{{item.order_amount}}</span>元（含运费<span>10</span>元）
											</div>
											 <div class="button-sp-area float-right order-del clear">
												 <a v-on:click="jump_url_to_delete(item.order_id,item.url)" class="weui-btn weui-btn_mini weui-btn_default">取消订单</a>
												 <a v-on:click="jump_url_to_pay(item.order_id,item.url)"  class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>
											 </div>
									</div><!--待付款结束-->
							  </template>
						   </template>
						  	<template  v-if="url.status=='3'"><!--判断哪个订单状态-->
								  <template v-for="item in demoData"><!--具体的数据结构写入  -->
									 <div  id="noget-order" class="weui_tab_bd_item weui_tab_bd_item_active">
											 <div class="order-title">
													 <h2 class="title">
													<!--  <span class="cb disabled float-left"></span>-->
														 <span class="float-left" id="name">{{item.store_name}}</span>
														  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
														  <span class="red float-right">交易成功</span>
													 </h2>
											 </div>
											 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
												 <div class="weui-media-box__hd">
													 <img class="weui-media-box__thumb" src="{{item.img_url|addUrl}}" alt="">
												 </div>
												 <div class="weui-media-box__bd">
													 <h4 class="weui-media-box__title">{{item.product_name}}</h4>
													<p class="weui-media-box__desc">规格：{{item.product_spec}}</p>
													 <h4 class="weui-media-box__title">
														 ￥<span id="singel-price">{{item.goods_amount}}</span>&nbsp;&nbsp;
														 <span id="singel-number">X{{item.goods_count}}</span></h4>
												</div>
											 </a>
											 <div class="order-foot float-right">
												 合计<span>{{item.order_amount}}</span>元（含运费<span>10</span>元）
											 </div>
											 <div class="button-sp-area float-right order-del clear">
												 <a v-on:click="jump_url_to_logistics(item.order_id)" class="weui-btn weui-btn_mini weui-btn_default">查看物流</a>
												 <a v-on:click="jump_url_to_status(item.order_id)" class="weui-btn weui-btn_mini weui-btn_default button-pay">确认收货</a>
											 </div>
									     </div>
									  </template>
							</template>
							 <!-- 待评价 -->
						  	<template  v-if="url.status=='4'">  <!--判断哪个订单状态-->
								  <template v-for="item in demoData">
									  <div  id="noevaluation-order" class="weui_tab_bd_item weui_tab_bd_item_active">
										 <div class="order-title">
											 <h2 class="title">
											<!--	<span class="cb disabled float-left"></span>-->
												 <span class="float-left" id="name">{{item.store_name}}</span>
												  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
												  <span class="red float-right">交易成功</span></h2>
										 </div>
										 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
											 <div class="weui-media-box__hd">
												 <img class="weui-media-box__thumb" src="{{item.img_url|addUrl}}" alt="">
											 </div>
											 <div class="weui-media-box__bd">
												 <h4 class="weui-media-box__title">{{item.product_name}}</h4>
												 <p class="weui-media-box__desc">规格:{{item.product_spec}}</p>
												<h4 class="weui-media-box__title">
													￥<span id="singel-price">{{item.goods_amount}}</span>&nbsp;&nbsp;
													<span id="singel-number">X{{item.goods_count}}</span>
												</h4>
											</div>
										 </a>
										<div class="order-foot float-right">
											合计<span>{{item.order_amount}}</span>元（含运费<span>10</span>元）
										</div>
										 <div class="button-sp-area float-right order-del clear">
											 <a v-on:click="jump_url_to_del(item.order_id)" class="weui-btn weui-btn_mini weui-btn_default">删除订单</a>
											 <a v-on:click="jump_url_to_add_evaluate(item.order_id)"class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;评价&nbsp;</a>
										 </div>
									 </div>
								  </template>
						  	</template>
									 <!--退款-->
						  	<template  v-if="url.order_status=='5'"><!--判断哪个订单状态-->
								  <template v-for="item in demoData"><!--具体的数据结构写入  -->
									 <div id="drawback-order" class="weui_tab_bd_item weui_tab_bd_item_active">
										 <div class="order-title">
										 <h2 class="title">
											<!--  <span class="cb disabled float-left"></span>-->
											 <span class="float-left" id="name">{{item.store_name}}</span>
											  <span class="jinru float-left"><i class="icon iconfont icon-icon "></i></span>
											 <span class="red float-right">退款成功</span>
										</h2>
									 </div>
										 <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
											 <div class="weui-media-box__hd">
												 <img class="weui-media-box__thumb" src="{{item.img_url|addurl}}" alt="">
											 </div>
											 <div class="weui-media-box__bd">
												 <h4 class="weui-media-box__title">{{item.product_name}}</h4>
												<p class="weui-media-box__desc">规格:{{item.product_spec}}</p>
												<h4 class="weui-media-box__title">
													￥<span id="singel-price">{{item.goods_amount}}</span>&nbsp;&nbsp;
													<span id="singel-number">X{{item.goods_count}}</span>
												</h4>
											</div>
										 </a>
										<div class="order-foot float-right">
											合计<span>{{item.order_amount}}</span>元（含运费<span>10</span>元）
										</div>
										 <div class="button-sp-area float-right order-del clear">
											<!-- <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_default">取消订单1</a>
											 <a href="pay.html" class="weui-btn weui-btn_mini weui-btn_default button-pay">&nbsp;付款&nbsp;</a>-->
										 </div>
										 </div>
								  </template>
								</template>
							</template>
							<template v-if="dataNull==2">
								<div class="nodata">
									<img src="../Public/img/no-info.png">
									<div class="height20px"></div>
									<p>暂时还没有订单评价数据！</p>
								</div>
							</template>
						  </div>
					</div>
				</div>
			</div>
	</div>
</div>
<input value="<?php echo md5(date('Ymd')."my_order"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."order_status"."tuchuinet");?>"	type="hidden" id="order_status"/>
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<!--<script src="../Public/js/vue.2.1.0.js"></script>-->
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
				dataNull:'',//判断是否为空 1不为空
				url:{
					checkInfo:$("#checkInfo").val(),
					id:sessionUserId,
					status:'1',// 待付款：1 待收货：3	待评价：4	退款：5
				}
			},
			/*初始化，el控制区域，  */
			ready: function() {
				var that = this;
				that.$http.get(HOST+'mobile.php?c=index&a=my_order',that.url).then(function (response) {
						var res = response.data; //取出的数据
					//如果数据为空
					if (res.statusCode==0){
						that.$set('dataNull', 2);
					}
					//如果数据不为空
					if(res.statusCode==1) {
						that.$set('dataNull', 1);
						that.$set('url.status', 1);//
						that.$set('demoData', res.data);  //把数据传给页面
					}
					},
					function (response) {
						that.$set('message', '服务器维护，请稍后重试');
					});
			}, //created 结束
			methods: {
				jump_url: function (msg1,msg2){
					window.location.href='editMySupply.php?supply_id='+msg1;
				},
				//去支付
				jump_url_to_pay: function (msg1){
					window.location.href='pay.php?order_id='+msg1;
				},
				//物流
				jump_url_to_logistics: function (msg1){
					window.location.href='logistics.php?order_id='+msg1;
				},
				// 确认收货
				jump_url_to_status: function (msg1,msg2){
				},
				//取消订单
				jump_url_to_del: function (msg1,msg2){
					//执行删除操作
					var url =HOST+'mobile.php?c=index&a=del_order';
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
				//增加评价
				jump_url_to_add_evaluate: function (msg1,msg2){

				},
				classdata: function (msg) {
					$('.weui_navbar .weui_bar_item_on').removeClass('weui_bar_item_on');
					var that = this;
					switch(msg){
						case '3':
							that.$set('url.status', '3');
							$('.weui_navbar .two').addClass('weui_bar_item_on');
							break;
						case '4':
							that.$set('url.status', '4');
							$('.weui_navbar .three').addClass('weui_bar_item_on');
							break;
						case '5':
							that.$set('url.status', '5');
							$('.weui_navbar .four').addClass('weui_bar_item_on');
							break;
						default:
							that.$set('url.status', '1');
							$('.weui_navbar .one').addClass('weui_bar_item_on');
					}
					that.$http.get(HOST+'mobile.php?c=index&a=my_order',that.url).then(function (response) {
							var res = response.data; //取出的数据
							//如果数据为空
							if (res.statusCode==0){
								that.$set('dataNull', 2);
							}
							//如果数据不为空
							if(res.statusCode==1) {
								that.$set('dataNull',1);
								that.$set('demoData', res.data);  //把数据传给页面
							}
						},
						function (response) {
							that.$set('message', '服务器维护，请稍后重试');
						});
				}//ajaxdata
			}//method  结束
		});
		Vue.filter('addUrl', function (value) {
			return HOST+value;
		});

	});
</script>
</body>
</html>