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
<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
	<script src="../Public/js/jquery-2.1.4.js"></script>
	<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/plugins/touchWipe/touchWipe.js"></script>
<!--	<script type="text/javascript">
		var myScroll;
		function loaded () {
			myScroll = new IScroll('#wrapper',{
				preventDefault:false,

				momentum: false,
				snap: true,
				snapSpeed: 400,
				keyBindings: true,
			});
		}
	</script>-->
	<style>
		html,body{
			height: 100%;
		}
		#main{
		/*	position: fixed;
			width: 100%;
			top:48px;
			bottom: 0;*/
		}
		.sipply_nav{
			margin-top: 15px;
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
		#wrapper {
			position: fixed;
			width:100%;
			top:222px;
			bottom: 0;
			background: #dedede;
			overflow: hidden;
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
		#scroller {
			position: absolute;
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
	</style>
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
		<h2 class="supply_number float-left">512<span>个帖子</span></h2>
		<p class="supply-right float-right">
			被阅览<span class="supply_see_num">123441</span>次
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
	</div>
</div>
</div>
<input value="<?php echo md5(date('Ymd')."supply_list"."tuchuinet");?>"	type="hidden" id="supply_list"/>
<script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script src="../Public/js/iscroll.js"></script>
<script>
	var checkInfo=$('#supply_list').val();
	var sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
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
					that.myScroll.on('scrollEnd',scrollaction);//滚动监听,1000
				})
			}, 
			function (response) {
				that.$set('message', '服务器维护，请稍后重试');
			});
			/*再次加载  */
			function scrollaction(){
				if(that.url.start  <  that.total_tie){
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
				/*var msg_url = msg2.indexOf('&m=Index&a=content&');
				if(msg_url == -1){
					this.$http(this.local_url+'/index.php?g=Wap&m=Index&a=jump_url&id='+msg1).then(function (response) {
						return true;
					});
				}*/
				alert('跳转url');
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
						console.log('选择第er个');
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
						console.log(that.url);
						console.log(that.total_hits);
						console.log(that.total_tie);
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
	/*
	 * 描述：html5苹果手机向左滑动删除特效
	 */
	window.addEventListener('load',function(){
	     var initX;        //触摸位置
	    var moveX;        //滑动时的位置
	     var X = 0;        //移动距离
	    var objX = 0;    //目标对象位置
	    window.addEventListener('touchstart',function(event){
	         event.preventDefault();
	        var obj = event.target.parentNode;
	       // alert(obj.className);
	         if(obj.className == "list-data"||obj.className == "weui_panel_ft"){
	            initX = event.targetTouches[0].pageX;
	             objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
	         }
	       if( objX == 0){
	            window.addEventListener('touchmove',function(event) {
	                 event.preventDefault();
	                var obj = event.target.parentNode;
	                if (obj.className == "weui_media_box weui_media_text"||obj.className == "weui_panel_ft") {
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
	                 event.preventDefault();
	                var obj = event.target.parentNode;
	                 if (obj.className == "list-data"||obj.className == "weui_panel_ft") {
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
	        event.preventDefault();
	        var obj = event.target.parentNode;
	        if(obj.className == "list-data"||obj.className == "weui_panel_ft"){
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
	  function confirmDelete(id,name){
	 alert(id);
	 $.confirm({
		  title: '确认删除',
		  text: name,
		  onOK: function () {
		    //点击确认
			    delData(id,$("#checkInfoAddress").val());
		  },
		  onCancel: function () {
			  return false;
		  }
		});/* 
	  	$.Dialog.confirmBox('温馨提示','确认删除？',{rightCallback:function(){
	  		$.Dialog.loading();
	  		$.get(url,function(res){
	  			  setTimeout(function(){
	  				 location.reload();	
	  			},1500);  	
	  	    });
		}}); */
	  }
	//删除
 function  delData(id,checkInfo){
 	var url =HOST+'mobile.php?c=index&a=my_address';
	 alert(id);
 	 $.ajax({
 			type: 'post',
 			url: url,
 			data: {checkInfo:checkInfo,id:sessionUserId,dotype:'del',adr_id:id},
 			dataType: 'json',
 			success: function (result) {
 				var message=result.message;
 				var tips=result.message;
 				if (result.statusCode=='0'){
 					$.toast("删除错误，请重试", "cancel");
 				}else{
 					//$.toast("删除成功");
 					 setTimeout(function(){
 		  				 location.reload();	
 		  			},1500); 
 				} 
 			}
 		});
 }
	</script>
</script>
</body>
</html>