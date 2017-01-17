<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>卖家中心-招聘管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
	     <link rel="stylesheet" href="../Public/css/center.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
	<script src="../Public/js/require.config.js"></script>
	<script src="../Public/js/jquery-2.1.4.js"></script>
	<script src="../Public/js/jquery-weui.min.js"></script>
	<script src="../Public/js/jquery-session.js"></script>
	<script type="text/javascript" src="../Public/js/vue.min.js"></script>
	<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
	<script src="../Public/js/common.js"></script>
	<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfologin"/>
	<input value="<?php echo md5(date('Ymd')."recruit_job_list"."tuchuinet");?>"	type="hidden" id="recruit_job_list"/>
	<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>
	<input value="<?php echo md5(date('Ymd')."del_list"."tuchuinet");?>"	type="hidden" id="del_list"/>
	<script>
		$(function(){
			sessionUserId=$.session.get('userId');
			if(sessionUserId==null){
				//没有登陆
				$.toast("您还没有登陆！", "cancel");
				setTimeout(window.location.href='../Login/login.php',2000);
			}
			//取出我的招聘信息
			new Vue({
				el: '#app',
				data: {
					listJob: {},
					dataNull:'',
					url:{
						checkInfo:$("#recruit_job_list").val(),
						id:sessionUserId,
					}
				},
				/*初始化，el控制区域，  */
				ready: function() {
					var that = this;
					that.$http.get(HOST+'mobile.php?c=index&a=recruit_job_list',that.url).then(function (response) {
						var res = response.data; //取出的数据
						//如果数据为空
						if (res.statusCode==0){
							that.$set('dataNull', 2);
						}
						//如果数据不为空
						if(res.statusCode==1) {
							that.$set('dataNull', 1);
							that.$set('listJob', res.data);  //把数据传给页面
						}
					});
				},//created 结束
				methods: {
					jump_url: function (msg1){
						window.location.href='editEmploy.php?recruit_id='+msg1;
					}
				}
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
				//now = now.substr(0,10);
				now = now/1000;
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
				if(_year>=1) {result= ~~(_year) + " 年前"}
				else if(_month>=1) {result=  ~~(_month) + " 个月前"}
				else if(_week>=1) {result= ~~(_week) + " 周前"}
				else if(_day>=1) {result= ~~(_day) +" 天前"}
				else if(_hour>=1) {result= ~~(_hour) +" 个小时前"}
				else if(_min>=1) {result= ~~(_min) +" 分钟前"}
				else result="刚刚发表";
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
	                  	    <span class="title">我的招聘</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href="addEmploy.php" id="addEmploy"><img alt="" src="../Public/img/business/addEmploy.png"></a>
                </div>
		</div>
		<div class="employ">

				<template v-if="dataNull==2">
					<div class="nodata clear">
						<img class="display:inline;" src="../Public/img/no-info.png">
						<div class="height20px"></div>
						<p>暂时还没有招聘信息！</p>
					</div>
				</template>

				<template v-if="dataNull==1">
					<div class="weui-cells">
					<template v-for="item in listJob "><!--三层  -->
						<div class="weui-cell weui-cell_access"  >
							<div v-on:click="jump_url(item.id)"  class="weui-cell__bd " style="color: #666;" >{{item.title|replaceString}}</div>
							<div class="weui-cell__ft font14px" >
								<span style="vertical-align:middle; font-size: 13px;margin-right: 13px;">{{item.update_time|time}}</span>
							</div>
							<div style="line-height:42px;"class="del-btn"><span onClick="confirmDelete({{item.id}});" >删除</span></div>
						</div>
					  </template>
					</div>
				</template>

		</div>
	</div>
</body>
<script>
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

			var href=document.getElementsByTagName('a');
			for(var i=0;i<href.length;i++){
				href[i].ontouchend=function(){
					window.location.href=this.getAttribute("href");
				}
			};


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
		 $.confirm({
			  title: '确认删除',
			  //text: name,
			  onOK: function () {
				  delete_supply_recuirt_job($("#del_list").val(),sessionUserId,id,'2');
			  },
			  onCancel: function () {
				  return false;
			  }
			});
	}
</script>
</html>