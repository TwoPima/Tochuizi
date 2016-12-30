<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-我的供求</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css">
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
	<script src="../Public/js/fastclick.js"></script>
	<script src="../Public/js/common.js"></script>
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
	<div id="wrapper">
		<div id="scroller">

			<template v-for="item in demoData"><!--三层  -->
					<div class="weui_panel">
					<div class="list-data">
						<a  v-on:click="jump_url(item.id,item.url)" >
							<div class="weui_media_box weui_media_text">
								<p class="weui_media_desc">{{item.title}}</p>
								<ul class="weui_media_info">
									<li class="weui_media_info_meta">{{item."1482378345"}}
									</li>
									<li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>{{item.hits}}</span></li>
								</ul>
							</div>
							<div style="line-height:67px;"class="del-btn"><a onClick="confirmDelete('+obj.id+');" >删除</a></div>
						</a>
						</div>
					</div>
			</template>
		</div>
		<div class="weui-loadmore">
			<i class="weui-loading"></i>
			<span class="weui-loadmore__tips">正在加载</span>
		</div>
	</div>
</div>
</div>
<input value="<?php echo md5(date('Ymd')."supply_list"."tuchuinet");?>"	type="hidden" id="supply_list"/>
<input value="<?php echo md5(date('Ymd')."sum_count"."tuchuinet");?>"	type="hidden" id="sum_count"/>
<script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script src="../Public/js/iscroll.js"></script>
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
				window.location.href='editMySupply.php';
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

	</script>
</body>
</html>