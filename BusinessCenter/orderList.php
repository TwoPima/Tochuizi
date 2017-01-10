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
	<input value="<?php echo md5(date('Ymd')."my_bill"."tuchuinet");?>"	type="hidden" id="my_bill"/>
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
			var demoApp = new Vue({
				el: '#app',
				data: {
					num:'',
					demoData:'',
					url:{
						checkInfo:$("#checkInfo").val(),
						user_id:sessionUserId,
						status:'2',// 默认：未发货：2	已发货：3
						store_id:$.session.get('partnerId')
					}
				},
				/*初始化，el控制区域，  */
				ready: function() {
					var that = this;
					console.log(that.url);
					that.$http.get(HOST+'index.php?c=order&a=my_bill',that.url).then(function (response) {
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
					    <a href="#tab1" class="weui_navbar_item weui_bar_item_on">
					       <p class="">未发货</p>
					    </a>
					    <a href="#tab2" class="weui_navbar_item">
					      <p class="">已发货</p>
					    </a>
					  </div>
						  <div class="weui_tab_bd">
						    <div class="weui_panel weui_panel_access">
							  <div class="weui_panel_bd weui-article">
							   <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
							   		<div class="tab-content">
								        <div class="weui-media-box weui-media-box_text">
								          <h5 class="weui-media-box__title">订单号：1232255555</h5>
								            <p class="weui-media-box__desc">各种网站建设开发 <span id="guige">规格套餐: <span>官方标配套餐</span></span></p>
								            <p class="weui-media-box__desc order-time"><span>1</span>小时前下单</p>
								         </div>
									</div>
								</div>
							    <div id="tab2" class="weui_tab_bd_item">
							    	<div class="tab-content">
								        <div class="weui-media-box weui-media-box_text">
								          <h5 class="weui-media-box__title">订单号：1232sd5</h5>
								            <p class="weui-media-box__desc">各种网站建设开发 <span id="guige">规格套餐: <span>官方标配套餐</span></span></p>
								            <p class="weui-media-box__desc order-time"><span>1</span>小时前下单</p>
								         </div>
									</div>
							</div>
							</div>
							</div>
				    </div>
				  </div>
			</div>
		</div>
</body>
</html>