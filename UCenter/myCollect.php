<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>个人主页-我的收藏</title>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<!--jquery WEUI  -->
<link rel="stylesheet" href="../Public/css/weui.css">
<link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
<link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
<link rel="stylesheet" href="../Public/css/center.css"/>
<link rel="stylesheet" href="../Public/css/common.css"/>
	<style>
		.sipply_nav{
			padding: 0 10px;
			background: #fff;
			font-size: 16px;
			text-align: center;
		}
		.sipply_nav .weui-flex__item{
			padding:13px 0;
		}
		.action{
			border-bottom:3px solid red;
		}
		.nodata img{
			width:20%;
			display: block;
			padding-top:50px;
			padding-bottom:10px;
			margin : 0 auto;
		}
		.nodata p{
			color: #676566;
			font-size: 14px;
			text-align: center;
		}
		#wrapper {
			position: fixed;
			width:100%;
			top:220px;
			bottom: 0;
			background: #F3F3F3;
			overflow: hidden;
			z-index: 999;
			/* Prevent native touch events on Windows */
			-ms-touch-action: none;
			/* Prevent the callout on tap-hold and text selection */
			-webkit-touch-callout: none;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			/* Prevent text resize on orientation change, useful for web-apps */
			-webkit-text-size-adjust: none;
			-moz-text-size-adjust: none;
			-ms-text-size-adjust: none;
			-o-text-size-adjust: none;
			text-size-adjust: none;
		}
		.weui-loadmore{
			display: none;
			position: absolute;
			left:0;
			width: 100%;
			z-index: 1000;
			text-align: center;
		}
		.weui-loadmore2{
			display: none;
			position: absolute;
			left:0;
			bottom: 0;
			width: 100%;
			text-align: center;
			z-index: 1000;
		}

		#scroller {
			z-index: 9999;
			position: absolute;
			background: #f1f1f1;
			width:100%;
			/* Prevent elements to be highlighted on tap */
			-webkit-tap-highlight-color: rgba(0,0,0,0);
			/* Put the scroller into the HW Compositing layer right from the start */
			-webkit-transform: translateZ(0);
			-moz-transform: translateZ(0);
			-ms-transform: translateZ(0);
			-o-transform: translateZ(0);
			transform: translateZ(0);
		}
		.weui-media-box__desc{
			-webkit-line-clamp:1;
		}
		.weui-media-box__thumb{
			-webkit-border-radius:50%;
			-moz-border-radius:50%;
			border-radius:50%;
		}
		.weui-mask_transparent{
			background-color: rgba(0,0,0,0.5);
			filter:alpha(opacity=50);
			-moz-opacity:0.5;
			-khtml-opacity: 0.5;
			opacity: 0.5;
		}
	</style>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<!-- 拓展插件 -->
<script src="../Public/js/jquery-session.js"></script>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
</head>
<body id="app">
	<div id="topback-header">
		<div id="header-left">
			 <a href="javascript:history.go(-1);" >
				  <i class="icon iconfont icon-xiangzuo"></i>
					<span class="title">我的收藏</span>
			 </a>
		</div>
		<div id="header-right">
			<a href=""><span></span></a>
		</div>
	</div>
	<div class="collect">
		<div class="collect_count">
			<p class="float-left">
				<img src="../Public/img/collect/collect-icon.png">
				</p>
			<h2 class="count_number float-left"></h2>
			<p class="count-left">
				商铺<span class="shop_num"></span>家,
				商品<span class="product_num"></span>件,
				供求<span class="supply_num"></span>条,
			</p>
		</div>
		<div class="weui_tab">
			<div class="sipply_nav">
					<div class="weui-flex">
						<div class="weui-flex__item one action"  v-on:click="classdata('')" >
							<div class="placeholder">
								店铺
							</div>
						</div>
						<div class="weui-flex__item two"  v-on:click="classdata('0')">
							<div class="placeholder">商品</div>
						</div>
						<div class="weui-flex__item three"  v-on:click="classdata('1')">
							<div class="placeholder">供求</div>
						</div>
					</div>
			</div>
			<template v-if="showtype==1">
				<div id="wrapper">
					<div id="scroller">
						<template v-for="item in demoData"><!--三层  -->
							<div class="weui_panel">
								<div class="list-data">
									<a v-on:click="jump_url(item.id,item.url)"  class="weui-media-box weui-media-box_appmsg">
										<div class="weui-media-box__hd">
											<img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
										</div>
										<div class="weui-media-box__bd">
											<h4 class="weui-media-box__title">标题一</h4>
											<p class="weui-media-box__desc">*****</p>
											<p class="weui-media-box__desc">宁夏银川自治区  >100米</p>
										</div>
									</a>
								</div>
							</div>
						</template>
					</div>
					<!--上下两种加载方式-->
					<div class="weui-loadmore">
						<i class="weui-loading"></i>
						<span class="weui-loadmore__tips">正在加载</span>
					</div>
					<div class="weui-loadmore2">
						<span class="weui-loadmore__tips">{{message}}</span>
					</div>
					<!--上下两种加载方式-->
				</div>
			</template>
			<template v-if="showtype == 2">
				<div class="nodata">
					<img src="../Public/img/no-info.png">
					<p>收藏夹空空如也</p>
				</div>
			</template>
		</div>
	</div>

	<!-- loading toast -->
	<div id="loadingToast" style="display: none;">
		<div class="weui-mask_transparent"></div>
		<div class="weui-toast">
			<i class="weui-loading weui-icon_toast"></i>
			<p class="weui-toast__content">数据加载中</p>
		</div>
	</div>
<!--<input value="--><?php //echo md5(date('Ymd')."favorite_list"."tuchuinet");?><!--"	type="hidden" id="checkInfo"/>-->
<input value="<?php echo md5(date('Ymd')."supply_list"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."dd_favorite"."tuchuinet");?>"	type="hidden" id="checkInfoAddFavorite"/>
<input value="<?php echo md5(date('Ymd')."sum_count"."tuchuinet");?>"	type="hidden" id="sum_count"/>
<script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script type="text/javascript" src="../Public/js/iscroll-probe.js"></script>
<script>
	sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆
		window.location.href='../Login/login.php';
	}
    //已经登陆 去服务器比对sessionid
	 getSupplyCollectNumber($('#sum_count').val(),sessionUserId);//获取统计合计
//	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	var checkInfo=$("#checkInfo").val();
	var demoApp = new Vue({
		el: '#app',
		data: {//checkInfo:checkInfo,id:sessionUserId,limit:limit,start:start,type:type
			num:'',
			demoData:'',
			showtype:'',
			isPulled:0,
			isscrollaction:false,
			isalldata:false,
			message:'正在加载',
			url:{
				checkInfo:checkInfo,
				id:sessionUserId,
//				type:2, //type 1:商品，2：供求,0：店铺
				is_ture:2, //type 1:商品，2：供求,0：店铺
				start:0,
				limit:10
			}
		},/*初始化，el控制区域，  */
		ready: function() {
			var that = this;
//			that.$http.get(HOST+'mobile.php?c=index&a=favorite_list',that.url).then(function (response) {
			that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
					var res = response.data; //取出的数据
					//如果数据为空
					if (res.statusCode==0){
						that.$set('showtype', 2);
					}
					//如果数据不为空
					if(res.statusCode==1){
						that.$set('showtype', 1);
						that.$set('demoData', res.data);  //把数据传给页面
						that.$set('url.start', res.data.length);
						if(res.data.length<10){
							that.$set('isalldata', true);
							that.$set('message', '数据加载完成');
							$('.weui-loadmore2').css('display','block');
						}else{
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
								that.myScroll.on('scroll',is_scroll_action);//滚动监听,1000
								that.myScroll.on('scrollEnd',scrollaction);//滚动监听,1000
							})
						}
					}
				},
				function (response) {
					$('#loadingToast').css('display','none');
					that.$set('message', '服务器维护，请稍后重试');
					$('.weui-loadmore2').css('display','block');
				});
			/*判断是否加载 */
			function is_scroll_action() {
				if((this.y)>50){
					$('.weui-loadmore').css('display','block');
					//确定下拉刷新可以开始
					that.$set('isPulled', 1);
					return;
				}
				if( this.y < 50 && this.y > 0 ){
					$('.weui-loadmore').css('display','none');
					return;
				}
				//有数据
				if(that.isalldata == false){
					if ( (-(this.y) + $('#wrapper').height())-( $('#scroller').height() )>= 50 ) {
						$('.weui-loadmore2').css('display','block');
						that.$set('isPulled', 2);
						that.$set('isscrollaction',true);
					}
					if((-(this.y) + $('#wrapper').height())-( $('#scroller').height() ) <50 && (-(this.y) + $('#wrapper').height())-( $('#scroller').height() ) >0 ){
						$('.weui-loadmore2').css('display','none');
					}
					return;
				}
				if (that.isalldata == true){
					that.$set('isPulled', 0);
					that.$set('isscrollaction',false);
					return;
				}
			}
			function scrollaction(){
				if (that.isPulled==1){
						//重新拉取数据，重新渲染列表
						$('#loadingToast').css('display','block');
						that.$set('isalldata', false);
						that.$set('message', '正在加载');
						that.$set('url.start', 0);//从0开始
						that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
								var res = response.data; //取出的数据
								//如果数据为空
								if (res.statusCode==0){
									that.$set('showtype', 2);
									/*that.$set('isalldata', true);
									that.$set('message', '数据加载完成');*/
								}
								//如果数据不为空
								if(res.statusCode==1){
									that.$set('showtype', 1);
									that.$set('demoData', res.data);  //把数据传给页面
									that.$set('url.start', res.data.length);
									if(res.data.length<10){
										that.$set('isalldata', true);
										that.$set('message', '数据加载完成');
										$('.weui-loadmore2').css('display','block');
									}
									Vue.nextTick(function () {
										that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
										that.$set('isPulled', 0);
										$('#loadingToast').css('display','none');
									});
								}
							},function (response) {
								that.$set('isPulled', 0);
								that.$set('message', '服务器维护，请稍后重试');
								$('#loadingToast').css('display','none');
							});
				}
				if (that.isPulled==2){
					if( that.isscrollaction = true ){
						that.$set('isscrollaction',false);
						$('#loadingToast').css('display','block');
						that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
							var res = response.data;
							if (res.statusCode==0){
								that.$set('isalldata', true);
								that.$set('message', '数据加载完成');
								$('.weui-loadmore2').css('display','block');
							}
							if (res.statusCode!=0){
								var listdata=res.data;
								this.url.start+=listdata.length;
								if (listdata.length<10){
									that.$set('isalldata', true);
									that.$set('message', '数据加载完成');
									$('.weui-loadmore2').css('display','block');
								}
								//这个for循环是更新vue渲染列表的数据
								for (var i = 0; i < listdata.length; i++) {
									that.demoData.push(listdata[i]);
								}
								Vue.nextTick(function () {
									that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
								});
							}
							$('#loadingToast').css('display','none');
							that.$set('isPulled', 0);
							that.$set('isscrollaction',true);
						}, function (response) {
							that.$set('isPulled', 0);
							$('#loadingToast').css('display','none');
							that.$set('message', '服务器维护，请稍后重试');
							$('.weui-loadmore2').css('display','block');
							that.$set('isscrollaction',true);
						});
					}
				}
			}
		},
		//created 结束
		methods: {
			jump_url: function (msg1,msg2){
				window.location.href='editMySupply.php';
			},
			classdata: function (msg) {
				$('.sipply_nav .action').removeClass('action');
				var that = this;
				that.$set('url.start', 0);
				that.$set('message','正在加载');
				that.$set('isalldata',false);
				that.$set('isPulled',0);
				that.$set('isscrollaction',false);
				switch(msg){
					case '':
						that.$set('url.is_ture', '');
						$('.sipply_nav .one').addClass('action');
						break;
					case '0':
						that.$set('url.is_ture', 0);
						$('.sipply_nav .two').addClass('action');
						break;
					case '1':
						that.$set('url.is_ture', 1);
						$('.sipply_nav .three').addClass('action');
						break;
					default:
						$('.sipply_nav .one').addClass('action');
						that.$set('url.is_true', '');
				}
				$('#loadingToast').css('display','block');
				that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
						var res = response.data; //取出的数据
						//如果数据为空
						if (res.statusCode==0){
							that.$set('showtype', 2);
						}
						//如果数据不为空
						if(res.statusCode==1){
							that.$set('showtype', 1);
							that.$set('demoData', res.data);  //把数据传给页面
							that.$set('url.start', res.data.length);
							if(res.data.length<10){
								that.$set('isalldata', true);
								that.$set('message', '数据加载完成');
								$('.weui-loadmore2').css('display','block');
							}else{
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
									that.myScroll.on('scroll',is_scroll_action);//滚动监听,1000
									that.myScroll.on('scrollEnd',scrollaction);//滚动监听,1000
								})

							}
						}
						$('#loadingToast').css('display','none');
					},
					function (response) {
						$('#loadingToast').css('display','none');
						that.$set('message', '服务器维护，请稍后重试');
						$('.weui-loadmore2').css('display','block');

					});
				function is_scroll_action() {
					if((this.y)>50){
						$('.weui-loadmore').css('display','block');
						//确定下拉刷新可以开始
						that.$set('isPulled', 1);
						return;
					}
					if( this.y < 50 && this.y > 0 ){
						$('.weui-loadmore').css('display','none');
						return;
					}
					//有数据
					if(that.isalldata == false){
						if ( (-(this.y) + $('#wrapper').height())-( $('#scroller').height() )>= 50 ) {
							$('.weui-loadmore2').css('display','block');
							that.$set('isPulled', 2);
							that.$set('isscrollaction',true);
						}
						if((-(this.y) + $('#wrapper').height())-( $('#scroller').height() ) <50 && (-(this.y) + $('#wrapper').height())-( $('#scroller').height() ) >0 ){
							$('.weui-loadmore2').css('display','none');
						}
						return;
					}
					if (that.isalldata == true){
						that.$set('isPulled', 0);
						that.$set('isscrollaction',false);
						return;
					}
				}
				function scrollaction(){
					if (that.isPulled==1){
						//重新拉取数据，重新渲染列表
						$('#loadingToast').css('display','block');
						that.$set('isalldata', false);
						that.$set('message', '正在加载');
						that.$set('url.start', 0);//从0开始
						that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
							var res = response.data; //取出的数据
							//如果数据为空
							if (res.statusCode==0){
								that.$set('showtype', 2);
								/*that.$set('isalldata', true);
								 that.$set('message', '数据加载完成');*/
							}
							//如果数据不为空
							if(res.statusCode==1){
								that.$set('showtype', 1);
								that.$set('demoData', res.data);  //把数据传给页面
								that.$set('url.start', res.data.length);
								if(res.data.length<10){
									that.$set('isalldata', true);
									that.$set('message', '数据加载完成');
									$('.weui-loadmore2').css('display','block');
								}
								Vue.nextTick(function () {
									that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
									that.$set('isPulled', 0);
									$('#loadingToast').css('display','none');
								});
							}
						},function (response) {
							that.$set('isPulled', 0);
							that.$set('message', '服务器维护，请稍后重试');
							$('#loadingToast').css('display','none');
						});
					}
					if (that.isPulled==2){
						if( that.isscrollaction = true ){
							that.$set('isscrollaction',false);
							$('#loadingToast').css('display','block');
							that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
								var res = response.data;
								if (res.statusCode==0){
									that.$set('isalldata', true);
									that.$set('message', '数据加载完成');
									$('.weui-loadmore2').css('display','block');
								}
								if (res.statusCode!=0){
									var listdata=res.data;
									this.url.start+=listdata.length;
									if (listdata.length<10){
										that.$set('isalldata', true);
										that.$set('message', '数据加载完成');
										$('.weui-loadmore2').css('display','block');
									}
									//这个for循环是更新vue渲染列表的数据
									for (var i = 0; i < listdata.length; i++) {
										that.demoData.push(listdata[i]);
									}
									Vue.nextTick(function () {
										that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
									});
								}
								$('#loadingToast').css('display','none');
								that.$set('isPulled', 0);
								that.$set('isscrollaction',true);
							}, function (response) {
								that.$set('isPulled', 0);
								$('#loadingToast').css('display','none');
								that.$set('message', '服务器维护，请稍后重试');
								$('.weui-loadmore2').css('display','block');
								that.$set('isscrollaction',true);
							});
						}
					}
				}
			}//ajaxdata
		}//method  结束
	});
</script>
<script type="text/javascript">
$(function() {
    $.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
    $('#shop-ratyStar').raty({
    	  score: function() {
    	    return $(this).attr('data-score');
    	  }
    	});
    $('#product-ratyStar').raty({
    	  score: function() {
    	    return $(this).attr('data-score');
    	  }
    	});
    $('#supply-ratyStar').raty({
    	  score: function() {
    	    return $(this).attr('data-score');
    	  }
    	});
});
var checkInfoAddFavorite=$("#checkInfoAddFavorite").val();
$("#shop-ratyStar").click(function(){
	var read_id=$("#img-thumb").attr(data-id);
	addCollect(sessionUserId,checkInfoAddFavorite,type,read_id);
});
$("#product-ratyStar").click(function(){
});
//添加收藏
function addCollect(id,checkInfo,type,read_id){

}
</script>
</body>
</html>