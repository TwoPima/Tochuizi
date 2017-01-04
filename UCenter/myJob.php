<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的求职</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/myjob.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <script src="../Public/js/require.config.js"></script>
    <script src="../Public/js/jquery-2.1.4.js"></script>
    <script src="../Public/js/jquery-session.js"></script>
    <script src="../Public/js/fastclick.js"></script>
    <script src="../Public/js/common.js"></script>
    <script src="../Public/js/jquery-weui.min.js"></script>
    <script type="text/javascript" src="../Public/js/vue.min.js"></script>
<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>  
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfologin"/>
<input value="<?php echo md5(date('Ymd')."recruit_list"."tuchuinet");?>"	type="hidden" id="checkInfoRecruit"/>
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>
<script>
$(function(){
	sessionUserId=$.session.get('userId');

	if(sessionUserId==null){
		//没有登陆
		$.toast("您还没有登陆！", "cancel");
		setTimeout(window.location.href='../Login/login.php',2000);
	}
	//已经登陆
  	selectMyResumeInfo(sessionUserId,$("#checkInfoResume").val());//查询简历信息
  	$("#judgeMemberResumeType").click(function(){
  		jumlResumeType($.session.get('idType'),'2');
  	 });
	//取出我的工作信息
	new Vue({
		el: '#app',
		data: {
			listJob: {},
			url:{
				checkInfo:$("#checkInfoRecruit").val(),
				id:sessionUserId,
				dotype:'gain'
			}
		},
		/*初始化，el控制区域，  */
		ready: function() {
			var that = this;
			that.$http.get(HOST+'mobile.php?c=index&a=recruit_list',that.url).then(function (response) {
				var res = response.data; //取出的数据
			//	console.log(res);
				//$.session.get('userId');
				var timestamp = (new Date()).valueOf();
				if (parseInt(timestamp) / (1000 * 60 * 60 * 24) >= '5'){
					var  dataTime='5天前';
				}else{
					var  dataTime='5天后';
				}

				that.$set('listJob', res.data);  //把数据传给页面
				 Vue.nextTick(function () {
				 })
			});
		},//created 结束
		methods: {
			jump_url: function (msg1){
				console.log(msg1);
				window.location.href='editJob.php?recruit_id='+msg1;

			}
		}
	});
});
 function selectMyResumeInfo(id,checkInfo){
		 //查询
		var url =HOST+'mobile.php?c=index&a=my_resume';
		 $.ajax({
				type: 'post',
				url: url,
				data: {id:sessionUserId,checkInfo:checkInfo,dotype:'gain'},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					if (result.statusCode==='0'){
						$.toptip(message,2000, 'error');
						window.location.href='./Login/login.php';
					}else{
						$.session.set('idType',result.data.id_type);
						typeMember=$.session.get('typeMember');
						 var jobDetailHtml='<p>'+result.data.name+'&nbsp;'+result.data.mobile+'</p><p>'+typeMember+'>'+result.data.cate_id.cate_name+'</p>';
							$('.job_top_info').append(jobDetailHtml);
					}
				},
			});
	 
 }
(function($) {
	$.extend({
		myTime: {
			/**
			 * 当前时间戳
			 * @return <int>        unix时间戳(秒)
			 */
			CurTime: function(){
				return Date.parse(new Date())/1000;
			},
			/**
			 * 日期 转换为 Unix时间戳
			 * @param <string> 2014-01-01 20:20:20  日期格式
			 * @return <int>        unix时间戳(秒)
			 * @return {number}
			 */
			DateToUnix: function(string) {
				var f = string.split(' ', 2);
				var d = (f[0] ? f[0] : '').split('-', 3);
				var t = (f[1] ? f[1] : '').split(':', 3);
				return (new Date(
						parseInt(d[0], 10) || null,
						(parseInt(d[1], 10) || 1) - 1,
						parseInt(d[2], 10) || null,
						parseInt(t[0], 10) || null,
						parseInt(t[1], 10) || null,
						parseInt(t[2], 10) || null
					)).getTime() / 1000;
			},
			/**
			 * 时间戳转换日期
			 * @param <int> unixTime    待时间戳(秒)
			 * @param <bool> isFull    返回完整时间(Y-m-d 或者 Y-m-d H:i:s)
			 * @param <int>  timeZone   时区
			 */
			UnixToDate: function(unixTime, isFull, timeZone) {
				if (typeof (timeZone) == 'number')
				{
					unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
				}
				var time = new Date(unixTime * 1000);
				var ymdhis = "";
				ymdhis += time.getUTCFullYear() + "-";
				ymdhis += (time.getUTCMonth()+1) + "-";
				ymdhis += time.getUTCDate();
				if (isFull === true)
				{
					ymdhis += " " + time.getUTCHours() + ":";
					ymdhis += time.getUTCMinutes() + ":";
					ymdhis += time.getUTCSeconds();
				}
				return ymdhis;
			}
		}
	});
})(jQuery);
</script>
</head>
<body>
<div id="app">
 	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的求职</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href="addJob.php"><img alt="" src="../Public/img/business/addEmploy.png"></a>
                	<!--个人用户增加简历  会员用户增加职位  -->
                </div>
		</div>
	<div class="clear"></div>
    <div id="job_main">
            <div class="job_top">
                <img class="job_top_people" src="../Public/img/myjob/people.jpg" alt="">
                <div class="job_top_info">
                </div>
               <a  id="judgeMemberResumeType"><img class="job_top_edit" src="../Public/img/myjob/edit.jpg" alt=""></a> 
            </div>
            <div class="box_bg"></div>

        <div class="weui-cells">
			<template v-for="item in listJob "><!--三层  -->
	             <a class="weui-cell weui-cell_access"   v-on:click="jump_url(item.id)">
	                <div class="weui-cell__bd" style="vertical-align:middle; font-size: 16px;">{{item.title}}</div>
	                <div class="weui-cell__ft" style="font-size: 0">
	                    <span style="vertical-align:middle; font-size: 14px;">{{item.dateTime}}</span>
	                    <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
	                </div>
					 <div style="line-height:67px;"class="del-btn"><a onClick="confirmDelete(item.id);" >删除</a></div>
                </a>
			</template>
        </div>
        <!--<div class="weui-cells">
           <a class="weui-cell weui-cell_access" href="addJobResume.php">
                <div class="weui-cell__bd" style="vertical-align:middle; font-size: 16px;">专业版和普通版区别，专业版收费</div>
                <div class="weui-cell__ft" style="font-size: 0">
                    <span style="vertical-align:middle; font-size: 14px;">5天以前</span>
                    <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
                </div>
                </a>
        </div>-->
    </div><!--main-->
</div><!--app-->
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
			event.preventDefault();
			var obj = event.target.parentNode;
		//	alert(obj.className);
			if(obj.className == "weui-cell_access"||obj.className == "weui-cell__bd"){
				initX = event.targetTouches[0].pageX;
				objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
			}
			if( objX == 0){
				window.addEventListener('touchmove',function(event) {
					event.preventDefault();
					var obj = event.target.parentNode;
					if (obj.className == "weui-cell_access"||obj.className == "weui-cell__bd") {
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
					if (obj.className == "weui-cell_access"||obj.className == "weui-cell__bd") {
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
			if(obj.className == "weui-cell_access"||obj.className == "weui-cell__bd"){
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
</script>
</html>