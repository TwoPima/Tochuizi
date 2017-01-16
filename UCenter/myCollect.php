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
									<a   class="weui-media-box weui-media-box_appmsg">
										<div class="weui-media-box__hd">
											<img class="weui-media-box__thumb" src="{{item.avatar|addUrl}}" alt="">
										</div>
										<div class="weui-media-box__bd">
											<h4 class="weui-media-box__title">{{item.title}}{{item.store_name}}</h4>
											<p class="weui-media-box__desc">
												<template v-for = "n in item.miao_star">
            										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
            									</template>
            									<template v-for = "n in item.miao_star_none">
            										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-off.png" alt="1" title="poor">&nbsp;</span>
            									</template>
            									<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
            									<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
											</p>
											<p class="weui-media-box__desc">宁夏银川自治区  ><span>{{item.disdance|}}</span>100米</p>
										</div>
										<div style="line-height:90px;"class="del-btn">
    										<span onClick="confirmDelete({{item.id}});" >删除</span>
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
<input value="<?php echo md5(date('Ymd')."del_list"."tuchuinet");?>"	type="hidden" id="del_list"/>
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
						for(var x in res.data){
							res.data[x]['fuwu_star_none']= 5-parseInt(res.data[x]['fuwu_star']);
							res.data[x]['liu_star_none']= 5-parseInt(res.data[x]['liu_star']);
							res.data[x]['miao_star_none']= 5-parseInt(res.data[x]['miao_star']);
							res.data[x]['miao_star']=parseInt(res.data[x]['miao_star']);
							res.data[x]['liu_star']=parseInt(res.data[x]['liu_star']);
							res.data[x]['fuwu_star']=parseInt(res.data[x]['fuwu_star']) ;
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
						_self.$set('url.type', '0');
				}
				_self.$http.get(HOST+'mobile.php?c=index&a=favorite_list',_self.url).then(function (response) {
						if(_self.myScroll){
							_self.myScroll.destroy(); //把滑动注销掉
						}
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
	Vue.filter('addUrl', function (value) {
		return HOST+value;
	});
	Vue.filter('distance', function (lat1,lng1,lat2,lng2) {
		getFlatternDistance(lat1,lng1,lat2,lng2);
		return HOST+value;
	});
	/** 
     * approx distance between two points on earth ellipsoid 
     * @param {Object} lat1 
     * @param {Object} lng1 
     * @param {Object} lat2 
     * @param {Object} lng2 
     */  
    function getFlatternDistance(lat1,lng1,lat2,lng2){  
        var f = getRad((lat1 + lat2)/2);  
        var g = getRad((lat1 - lat2)/2);  
        var l = getRad((lng1 - lng2)/2);  
          
        var sg = Math.sin(g);  
        var sl = Math.sin(l);  
        var sf = Math.sin(f);  
          
        var s,c,w,r,d,h1,h2;  
        var a = EARTH_RADIUS;  
        var fl = 1/298.257;  
          
        sg = sg*sg;  
        sl = sl*sl;  
        sf = sf*sf;  
          
        s = sg*(1-sl) + (1-sf)*sl;  
        c = (1-sg)*(1-sl) + sf*sl;  
          
        w = Math.atan(Math.sqrt(s/c));  
        r = Math.sqrt(s*c)/w;  
        d = 2*w*a;  
        h1 = (3*r -1)/2/c;  
        h2 = (3*r +1)/2/s;  
          
        return d*(1 + fl*(h1*sf*(1-sg) - h2*(1-sf)*sg));  
    }  
</script>
<script type="text/javascript">
if ('addEventListener' in document) {
	document.addEventListener('DOMContentLoaded', function() {
		FastClick.attach(document.body);
	}, false);
}
//如果你想使用jquery
$(function() {
	FastClick.attach(document.body);
});
/*
 * 描述：html5苹果手机向左滑动删除特效
 */
window.addEventListener('load',function(){
	var initX;        //触摸位置
	var moveX;        //滑动时的位置
	var X = 0;        //移动距离
	var objX = 0;    //目标对象位置
	window.addEventListener('touchstart',function(event){
		//event.preventDefault();
		var obj = event.target.parentNode;
		console.log(obj.className);
		if(obj.className == "list-data"||obj.className == "weui-cell weui-cell_access"){
			initX = event.targetTouches[0].pageX;
			objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
		}
		if( objX == 0){
			window.addEventListener('touchmove',function(event) {
				//event.preventDefault();
				var obj = event.target.parentNode;
				if (obj.className == "list-data"||obj.className == "weui-cell weui-cell_access") {
					moveX = event.targetTouches[0].pageX;
					X = moveX - initX;
					if (X >= 0) {
						obj.style.WebkitTransform = "translateX(" + 0 + "px)";
					}
					else if (X < 0) {
						var l = Math.abs(X);
						obj.style.WebkitTransform = "translateX(" + -l + "px)";
						if(l>80){
							l=80;
							obj.style.WebkitTransform = "translateX(" + -l + "px)";
						}
					}
				}
			});
		}
		else if(objX<0){
			window.addEventListener('touchmove',function(event) {
				//event.preventDefault();
				var obj = event.target.parentNode;
				if (obj.className == "list-data"||obj.className == "weui-cell weui-cell_access") {
					moveX = event.targetTouches[0].pageX;
					X = moveX - initX;
					if (X >= 0) {
						var r = -80 + Math.abs(X);
						obj.style.WebkitTransform = "translateX(" + r + "px)";
						if(r>0){
							r=0;
							obj.style.WebkitTransform = "translateX(" + r + "px)";
						}
					}
					else {     //向左滑动
						obj.style.WebkitTransform = "translateX(" + -80 + "px)";
					}
				}
			});
		}

	})
	window.addEventListener('touchend',function(event){
		//event.preventDefault();
		var obj = event.target.parentNode;
		if(obj.className == "list-data"||obj.className == "weui-cell weui-cell_access"){
			objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
			if(objX>-40){
				obj.style.WebkitTransform = "translateX(" + 0 + "px)";
				objX = 0;
			}else{
				obj.style.WebkitTransform = "translateX(" + -80 + "px)";
				objX = -80;
			}
		}
	})
})
function confirmDelete(id){
	delete_supply_recuirt_job($("#del_list").val(),sessionUserId,id,'5');
}
</script>
</body>
</html>