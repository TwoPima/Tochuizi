<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-我的供求</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.min.css">
	<link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/mysupply.css"/>
	<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
	<script src="../Public/js/jquery-2.1.4.js"></script>
	<script src="../Public/js/require.config.js"></script>
	<script src="../Public/js/jquery-session.js"></script>
	<script src="../Public/js/jquery-weui.min.js"></script>
<!--	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>-->
	<script type="text/javascript" src="../Public/js/vue.min.js"></script>
	<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
	<script src="../Public/js/iscroll-probe.js"></script>
	<script src="../Public/js/fastclick.js"></script>
	<script src="../Public/js/common.js"></script>
	<script type="text/javascript">
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
	         if(obj.className == "weui-cell weui-cell_access"||obj.className == "weui-cell__bd"){
	            initX = event.targetTouches[0].pageX;
	             objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
	         }
	       if( objX == 0){
	            window.addEventListener('touchmove',function(event) {
	                 //event.preventDefault();
	                var obj = event.target.parentNode;
	                if (obj.className == "weui-cell weui-cell_access"||obj.className == "weui-cell__bd") {
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
	                // event.preventDefault();
	                var obj = event.target.parentNode;
	                 if (obj.className == "weui-cell weui-cell_access"||obj.className == "weui-cell__bd") {
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
	        //event.preventDefault(); 阻止点击事件
	        var obj = event.target.parentNode;
	        if(obj.className == "weui-cell weui-cell_access"||obj.className == "weui-cell__bd"){
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
// 加上后苹果手机点击不动
/*if ('addEventListener' in document) {
	  document.addEventListener('DOMContentLoaded', function() {  
	  FastClick.attach(document.body);  
	}, false);  
	}
	//如果你想使用jquery
	$(function() {
	  FastClick.attach(document.body);  
	});*/
		$(document).on("click", ".deletePicture", function() {
				$(this).parent().remove();
			});
	</script>
</head>
<body id="body_box" >
	<div id="topback-header">
		<div id="header-left">
			 <a href="index.php">
				  <i class="icon iconfont icon-xiangzuo"></i>
					<span class="title">我的供求</span>
			 </a>
		</div>
		<div id="header-right">
			<a href="addMySupply.php"><span>发布供求</span></a>
		</div>
	</div>
<!--内容页面  -->
<div id="main">
	<div class="supply_count">
		<p class="float-left">
			<img src="../Public/img/supply/supply-icon.png">
		</p>
		<h2 class="supply_number float-left"><span class="supply_number_count"></span><span>个帖子</span></h2>
		<p class="supply-right float-right">
			被阅览<span class="supply_see_num"></span>次
		</p>
	</div>
	<div class="sipply_nav">
		<div class="weui-flex">
			<div class="weui-flex__item one action"  v-on:click="classdata('')" >
				<div class="placeholder">
					全部
				</div>
			</div>
			<div class="weui-flex__item two"  v-on:click="classdata('0')">
				<div class="placeholder">供应</div>
			</div>
			<div class="weui-flex__item three"  v-on:click="classdata('1')">
				<div class="placeholder">求购</div>
			</div>
		</div>
	</div>
	<template v-if="is_nodata == '1'">
		<div id="wrapper">
			<div id="scroller">
				<template v-for="item in demoData" >
					<div class="weui_panel">
						<div class="list-data"  style="padding: 0px 0px;">
									<a  class="weui-cell weui-cell_access">
    									<div  v-on:click="jump_url(item.id)" attr_id="{{item.id}}" class="weui_media_box weui_media_text" style="width:100%;">
        									<h4 class="weui-media-box__title" >{{item.title|replaceString}}</h4>
        									<ul class="weui_media_info">
        										<li class="weui_media_info_meta">
        											{{item.update_time|time}}
        										</li>
        										<li class="weui_media_info_meta weui_media_info_meta_extra">
        											查阅次数:&nbsp;&nbsp;
        											<span>{{item.hits}}</span>
        										</li>
        									</ul>
        									 <img class="jiantou" src="../Public/img/supply/jiantou.png" >
    									</div>
    									<div style="line-height:113px;"class="del-btn">
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
	<template v-else>
		<div class="nodata">
			<img src="../Public/img/no-info.png">
			<p>收藏夹空空如也</p>
		</div>
	</template>
</div>
<input value="<?php echo md5(date('Ymd')."supply_list"."tuchuinet");?>"	type="hidden" id="supply_list"/>
<input value="<?php echo md5(date('Ymd')."sum_count"."tuchuinet");?>"	type="hidden" id="sum_count"/>
<input value="<?php echo md5(date('Ymd')."del_list"."tuchuinet");?>"	type="hidden" id="del_list"/>
<script>
	var checkInfo=$('#supply_list').val();
	var sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		window.location.href='../Login/login.php';
	}
	getSupplyCollectNumber($('#sum_count').val(),sessionUserId);//获取统计合计
	var demoApp = new Vue({
		el: '#body_box',
		data: {
			demoData:'',
			is_refresh:'0',
			is_scroll:1,
			is_nodata:'1',
			message:'',
			url:{
				checkInfo:checkInfo,
				id:sessionUserId,
				is_true:'',
				start:0,
				limit:10
			}
		},
		ready: function() { 
			var that = this;
			that.$set('is_refresh', '0');
			that.$set('is_scroll', '1');
			that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
				var res = response.data; //取出的数据
				if(res.statusCode==1){
					that.$set('is_nodata', '1');
					var listdata=res.data;
					that.$set('demoData', listdata);  //把数据传给页面
					that.$set('url.start', listdata.length);
					Vue.nextTick(function () {
						//初始化滚动插件
						that.myScroll = new IScroll('#wrapper', {
							//为true就是阻止事件冒泡,所以onclick没用
							//preventDefault为false这行就是解决onclick失效问题
							preventDefault:false,
							mouseWheel: true,
							wheelAction: 'zoom',
							click: true,
							scrollX: false,
							scrollY: true,
							probeType: 3,
							tap: true,
							preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ },  //（这个后面加|A,因为iscroll阻止了A的默认事件）
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
							that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
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
		}, //created 结束
		methods: {
			jump_url: function (msg1){
				window.location.href='editMySupply.php?supply_id='+msg1;
			},
			classdata: function (msg) {
				$('.sipply_nav .action').removeClass('action');
				var _self = this;
				_self.$set('url.start', 0);
				_self.$set('demoData', '');
				switch(msg){
					case '':
						_self.$set('url.is_true', '');
						$('.sipply_nav .one').addClass('action');
					break;
					case '0':
						_self.$set('url.is_true', 0);
						$('.sipply_nav .two').addClass('action');
					break;
					case '1':
						_self.$set('url.is_true', 1);
						$('.sipply_nav .three').addClass('action');
					break;
					default:
						$('.sipply_nav .one').addClass('action');
						_self.$set('url.is_true', '');
				}
				_self.$http.get(HOST+'mobile.php?c=index&a=supply_list',_self.url).then(function (response) {
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
									preventDefault:false,
									mouseWheel: true,
									wheelAction: 'zoom',
									click: true,
									tap: true,
									preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT|A)$/ },  //（这个后面加|A,因为iscroll阻止了A的默认事件）
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
							_self.$http.get(HOST+'mobile.php?c=index&a=supply_list',_self.url).then(function (response) {
								var res = response.data;
								console.log(res);
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
	Vue.filter('time', function (value) {
		return goodTime(value);
	});
	/*截取字符串*/
	Vue.filter('replaceString', function (value) {
		if(value==null){
			text='';
		}else{
			if(value.length<14){
				text=value;
			}else{
				var text=value.substring(0,14)+"...";
			}
		}
		return text;
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
		if(_year>=1) {result=  ~~(_year) + " 年前"}
		else if(_month>=1) {result=  ~~(_month) + " 个月前"}
		else if(_week>=1) {result=  ~~(_week) + " 周前"}
		else if(_day>=1) {result=  ~~(_day) +" 天前"}
		else if(_hour>=1) {result=  ~~(_hour) +" 个小时前"}
		else if(_min>=1) {result=  ~~(_min) +" 分钟前"}
		else result="刚刚";
		return result;
	}
	function confirmDelete(id){
		delete_supply_recuirt_job($("#del_list").val(),sessionUserId,id,'1');
	}
	</script>
</body>
</html>