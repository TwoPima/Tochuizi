<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
	<input value="<?php echo md5(date('Ymd')."my_bill"."tuchuinet");?>"	type="hidden" id="my_bill"/>
	<script src="../Public/js/require.config.js"></script>
	<script src="../Public/js/jquery-2.1.4.js"></script>
	<script src="../Public/js/jquery-session.js"></script>
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
			var demoApp = new Vue({
				el: '#app',
				data: {
					num:'',
					demoData:'',
					dataNull:'',
					url:{
						checkInfo:$("#my_bill").val(),
						id:sessionUserId,
						status:'2',// 默认：未发货：2	已发货：3
					}
				},
				/*初始化，el控制区域，  */
				ready: function() {
					var that = this;
					console.log(that.url);
					that.$http.get(HOST+'mobile.php?c=index&a=my_bill',that.url).then(function (response) {
							var res = response.data; //取出的数据
							if (res.statusCode==0){
								that.$set('dataNull', 2);
							}
							if (res.statusCode==1){
								that.$set('dataNull', 1);
								that.$set('status', 2);//
								that.$set('demoData', res.data);  //把数据传给页面
							}
						},
						function (response) {
							that.$set('message', '服务器维护，请稍后重试');
						});
				}, //created 结束
				methods: {
					jump_url: function (msg1,msg2){
						//window.location.href='editMySupply.php?supply_id='+msg1;
					},
					classdata: function (msg) {
						$('.weui_navbar .weui_bar_item_on').removeClass('weui_bar_item_on');
						var that = this;
						that.$set('num', 0);
						switch(msg){
							case '3':
								that.$set('url.status', '3');
								$('.weui_navbar .there').addClass('weui_bar_item_on');
								break;
							default://2 未发货
								that.$set('url.status', '2');
								$('.weui_navbar .two').addClass('weui_bar_item_on');
						}
						that.$http.get(HOST+'mobile.php?c=index&a=my_bill',that.url).then(function (response) {
								var res = response.data; //取出的数据
								if (res.statusCode==0){
									that.$set('dataNull', 2);
								}
								if (res.statusCode==1) {
									that.$set('num', that.url.limit);
									that.$set('demoData', res.data);  //把数据传给页面
								}
						},
						function (response) {
							that.$set('message', '服务器维护，请稍后重试');
						});
					}//ajaxdata
				}//method  结束
			});
			Vue.filter('time', function (value) {
				return goodTime(value);
			});
			/*时间处理*/
			function goodTime(str){
				var now = Date.parse( new Date() ).toString();
				now = now.substr(0,10);
				var oldTime = str,
					difference = now - oldTime,
					result='',
					minute = 1000 * 60,
					hour = minute * 60,
					day = hour * 24,
					halfamonth = day * 15,
					month = day * 30,
					year = month * 12,

					_year = difference/year,
					_month =difference/month,
					_week =difference/(7*day),
					_day =difference/day,
					_hour =difference/hour,
					_min =difference/minute;
				if(_year>=1) {result= "下单于 " + ~~(_year) + " 年前"}
				else if(_month>=1) {result= "下单于 " + ~~(_month) + " 个月前"}
				else if(_week>=1) {result= "下单于 " + ~~(_week) + " 周前"}
				else if(_day>=1) {result= "下单于 " + ~~(_day) +" 天前"}
				else if(_hour>=1) {result= "下单于 " + ~~(_hour) +" 个小时前"}
				else if(_min>=1) {result= "下单于 " + ~~(_min) +" 分钟前"}
				else result="刚刚下单";
				return result;
			}
		});
	</script>
</head>
<body >
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">货单管理</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href=""></a>
                </div>
		</div>
		<div class="order-list clear">
			<div class="weui_tab">
					  <div class="weui_navbar">
					    <a class="weui_navbar_item two weui_bar_item_on"  v-on:click="classdata('2')">
					       <p class="">未发货</p>
					    </a>
					    <a  class="weui_navbar_item there"  v-on:click="classdata('3')">
					      <p class="">已发货</p>
					    </a>
					  </div>
						  <div class="weui_tab_bd">
						    <div class="weui_panel weui_panel_access">
							  <div class="weui_panel_bd">
								  <template  v-if="dataNull==1">
									  <template   v-if="url.status=='2'"><!--判断哪个订单状态-->
										  <template v-for="item in demoData"><!--具体的数据结构写入 -->
											   <div id="tab1" class="">
													<div class="tab-content">
														<div class="weui-media-box weui-media-box_text">
														  <h5 class="weui-media-box__title">订单号：{{item.order_sn}}</h5>
															<p class="weui-media-box__desc">{{item.product_name}}
																<span id="guige">规格套餐: <span>官方标配套餐</span></span>
															</p>
															<p class="weui-media-box__desc order-time"><span>{{item.pay_time|time}}</span></p>
														 </div>
													</div>
												</div>
											  </template>
										  </template>
									  <template   v-if="url.status=='3'"><!--判断哪个订单状态-->
										  <template v-for="item in demoData"><!--具体的数据结构写入 -->
												<div id="tab2" class="">
													<div class="tab-content">
														<div class="weui-media-box weui-media-box_text">
															<h5 class="weui-media-box__title">订单号：{{item.order_sn}}</h5>
															<p class="weui-media-box__desc">{{item.product_name}}
																<span id="guige">规格套餐: <span>官方标配套餐</span></span>
															</p>
															<p class="weui-media-box__desc order-time"><span>{{item.pay_time|time}}</span></p>
														</div>
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
</body>
</html>