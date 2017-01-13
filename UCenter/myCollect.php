<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>个人主页-我的收藏</title>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
<!--jquery WEUI  -->
<link rel="stylesheet" href="../Public/css/weui.min.css">
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
						<div class="weui-flex__item one action"  v-on:click="classdata('0')" >
							<div class="placeholder">
								店铺
							</div>
						</div>
						<div class="weui-flex__item two"  v-on:click="classdata('1')">
							<div class="placeholder">商品</div>
						</div>
						<div class="weui-flex__item three"  v-on:click="classdata('2')">
							<div class="placeholder">供求</div>
						</div>
					</div>
			</div>
			<template v-if="is_nodata==1">
				<div id="wrapper">
					<div id="scroller">
						<template v-for="item in demoData">
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
					<div class="weui-loadmore upload" style="display: none">
						<i class="weui-loading"></i>
						<span class="weui-loadmore__tips">正在加载</span>
					</div>
				</div>
			</template>
			<template v-if="is_nodata == 0">
				<div class="nodata">
					<img src="../Public/img/no-info.png">
					<p>收藏夹空空如也</p>
				</div>
			</template>
		</div>
	</div>
<input value="<?php echo md5(date('Ymd')."favorite_list"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."add_favorite"."tuchuinet");?>"	type="hidden" id="checkInfoAddFavorite"/>
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
	var checkInfo=$("#checkInfo").val();

	var demoApp = new Vue({
		el: '#app',
		data: {
			demoData:'',
			is_refresh:'0',
			is_scroll:1,
			is_nodata:'1',
			message:'',
			url:{
				checkInfo:checkInfo,
				id:sessionUserId,
				type:0, //type 1:商品，2：供求,0：店铺
				start:0,
				limit:10
			},
		},
		ready: function() {
			var that = this;
			that.$set('is_refresh', '0');
			that.$set('is_scroll', '1');
			that.$http.get(HOST+'mobile.php?c=index&a=favorite_list',that.url).then(function (response) {
					var res = response.data; //取出的数据
					if(res.statusCode==1){
						that.$set('is_nodata', '1');
						var listdata=res.data;
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
							that.myScroll.on('scroll',is_upload);
							that.myScroll.on('scrollEnd',scrollaction);
						})
					}else{
						that.$set('is_nodata', '0');
						that.$set('message', '暂无数据');
					}
				},
				function (response) {
					that.$set('is_nodata', '0');
					that.$set('message', '网络繁忙，请稍后重试');
				});
			/*判断是否加载 */
			function is_upload(){
				if (this.y>50){
					$('.upload').css('display','block');
					that.$set('is_refresh', '1');
				}else{
					$('.upload').css('display','none');
				}
			}
			function scrollaction(){
				if (that.is_refresh=='1'  || -(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
					if( that.is_refresh == 1){
						that.$set('demoData', '');
						that.$set('url.start',0);
						that.$set('is_scroll',1);
					}
					if (that.is_scroll=='1'){
						that.$http.get(HOST+'mobile.php?c=index&a=favorite_list',that.url).then(function (response) {
							var res = response.data;
							var listdata=res.data;
							if (that.is_refresh == 1){
								that.$set('demoData', listdata);  //把数据传给页面
								that.$set('url.start', listdata.length);
								Vue.nextTick(function () {
									that.$set('is_refresh', '0');
									that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
								});
							}else{
								if(res.statusCode=='1'){
									that.url.start+=listdata.length;
									//这个for循环是更新vue渲染列表的数据
									for (var i = 0; i < listdata.length; i++) {
										that.demoData.push(listdata[i]);
									}
									Vue.nextTick(function () {
										that.$set('is_refresh', '0');
										that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
									});
								}else{
									that.$set('is_scroll', '0');
								}
							}
						}, function (response) {
							that.$set('is_scroll', '0');
						});
					}
				}
			}
		},
		//created 结束
		methods: {
			jump_url: function (msg1,msg2){
				//window.location.href='editMySupply.php';
			},
			classdata: function (msg) {
				$('.sipply_nav .action').removeClass('action');
				var _self = this;
				_self.$set('url.start', 0);
				_self.$set('demoData', '');
				switch(msg){
					case '1':
						_self.$set('url.type', '1');
						$('.sipply_nav .two').addClass('action');
						break;
					case '2':
						_self.$set('url.type', '2');
						$('.sipply_nav .three').addClass('action');
						break;
					default:
						$('.sipply_nav .one').addClass('action');
						_self.$set('url.is_true', '0');
				}
				_self.$http.get(HOST+'mobile.php?c=index&a=favorite_list',_self.url).then(function (response) {
						_self.myScroll.destroy(); //把滑动注销掉
						var res = response.data; //取出的数据
						if(res.statusCode==1){
							_self.$set('is_nodata', '1');
							var listdata=res.data;
							_self.$set('demoData', listdata);  //把数据传给页面
							_self.$set('url.start', listdata.length);
							Vue.nextTick(function () {
								//初始化滚动插件
								_self.myScroll = new IScroll('#wrapper', {
									mouseWheel: true,
									wheelAction: 'zoom',
									click: true,
									scrollX: false,
									scrollY: true,
									probeType: 3,
								});
								//滚动监听
								_self.myScroll.on('scroll',is_upload2);
								_self.myScroll.on('scrollEnd',scrollaction2);
							})
						}else{
							_self.$set('is_nodata', '0');
							_self.$set('message', '暂无数据');
						}
					},
					function (response) {
						_self.$set('is_nodata', '0');
						_self.$set('message', '网络繁忙，请稍后重试');
					});
				function is_upload2(){
					if (this.y>50){
						$('.upload').css('display','block');
						_self.$set('is_refresh', '1');
					}else{
						$('.upload').css('display','none');
					}
				}
				function scrollaction2(){
					if (_self.is_refresh=='1'  || -(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
						if( _self.is_refresh == 1){
							_self.$set('demoData', '');
							_self.$set('url.start',0);
							_self.$set('is_scroll',1);
						}
						if (_self.is_scroll=='1'){
							_self.$http.get(HOST+'mobile.php?c=index&a=favorite_list',_self.url).then(function (response) {
								var res = response.data;
								if(res.statusCode=='1'){
									var listdata=res.data;
									if (_self.is_refresh == 1){
										_self.$set('demoData', listdata);  //把数据传给页面
										_self.$set('url.start', listdata.length);
										Vue.nextTick(function () {
											_self.$set('is_refresh', '0');
											_self.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
										});
									}else{
										if(res.statusCode=='1'){
											_self.url.start+=listdata.length;
											//这个for循环是更新vue渲染列表的数据
											for (var i = 0; i < listdata.length; i++) {
												_self.demoData.push(listdata[i]);
											}
											Vue.nextTick(function () {
												_self.$set('is_refresh', '0');
												_self.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
											});
										}else{
											_self.$set('is_scroll', '0');
										}
									}
								}else{
									_self.$set('is_scroll', '0');
								}
							}, function (response) {
								_self.$set('is_scroll', '0');
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