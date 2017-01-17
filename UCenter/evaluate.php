<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的评价</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
<link rel="stylesheet" href="../Public/css/common.css"/>
<input value="<?php echo md5(date('Ymd')."comment_list"."tuchuinet");?>"	type="hidden" id="checkInfoComment"/>  
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
	<script type="text/javascript" src="../Public/js/vue.min.js"></script>
	<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
  <script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
	//已经登陆
	//取出信息
	new Vue({
		el: '#app',
		data: {
			listData: {},
			dataNull:'',
			url:{
				checkInfo:$("#checkInfoComment").val(),
				id:sessionUserId,
			}
		},
		/*初始化，el控制区域，  */
		ready: function() {
			var that = this;
			that.$http.get(HOST+'mobile.php?c=index&a=comment_list',that.url).then(function (response) {
				var res = response.data; //取出的数据
				//如果数据为空
				if (res.statusCode==0){
					that.$set('dataNull', 2);
				}
				//如果数据不为空
				if(res.statusCode==1) {
					that.$set('dataNull', 1);
					for(var x in res.data){
						res.data[x]['fuwu_star_none']= 5-parseInt(res.data[x]['fuwu_star']);
						res.data[x]['liu_star_none']= 5-parseInt(res.data[x]['liu_star']);
						res.data[x]['miao_star_none']= 5-parseInt(res.data[x]['miao_star']);
						res.data[x]['miao_star']=parseInt(res.data[x]['miao_star']);
						res.data[x]['liu_star']=parseInt(res.data[x]['liu_star']);
						res.data[x]['fuwu_star']=parseInt(res.data[x]['fuwu_star']) ;
					}
					that.$set('listData', res.data);  
				}
			});
		},//created 结束
		methods: {
			jump_url: function (msg1){
				window.location.href='../goods-details.html?goods_id='+msg1;
			}
		}
	});
	Vue.filter('addUrl', function (value) {
		return HOST+value;
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
	Vue.filter('yearMouthDay', function (value) {
		//var format = 1403058804;
		var value = value*1000;//转换为13位的
		var newDate = new Date(value);
		Date.prototype.format = function(format) {
			var date = {
				"M+": this.getMonth() + 1,
				"d+": this.getDate(),
				"h+": this.getHours(),
				"m+": this.getMinutes(),
				"s+": this.getSeconds(),
				"q+": Math.floor((this.getMonth() + 3) / 3),
				"S+": this.getMilliseconds()
			};
			if (/(y+)/i.test(format)) {
				format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
			}
			for (var k in date) {
				if (new RegExp("(" + k + ")").test(format)) {
					format = format.replace(RegExp.$1, RegExp.$1.length == 1
						? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
				}
			}
			return format;
		}
		return newDate.format('yyyy-MM-dd');
	});
});
</script>
</head>
<body>
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的评价</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
    <div id="main">
        <div class="evaluate">
			<template v-if="dataNull==2">
				<div class="nodata">
					<img src="../Public/img/no-info.png">
					<div class="height20px"></div>
					<p>暂时还没有订单评价数据！</p>
				</div>
			</template>
			<template v-if="dataNull==1">
				<template v-for="item in listData "><!--三层  -->
					<div class="weui-panel">
					<a class="weui-cell weui-cell_access clear"  v-on:click="jump_url(item.goods_id)">
						<div class="weui-cell__bd"><p id="company_name">{{item.goods_name|14|replaceString}} <span id="price" class="red">{{item.price}}元</span></p></div>
						<div class="weui-cell__ft"></div>
					</a>
					<div class="height1px"></div>
					<article class="weui-article"><section><p id="evaluate-content">{{item.desc}}</p>
							</section><section>
							<p id="description">描述评级：
								<span class="description-raty">
									<template v-for = "n in item.miao_star">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
									</template>
									<template v-for = "n in item.miao_star_none">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-off.png" alt="1" title="poor">&nbsp;</span>
									</template>
								</span>
							</p>
							<p id="logistic">物流评级：
								<span class="logistic-raty" >
									<template v-for = "n in item.liu_star">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
									</template>
									<template v-for = "n in item.liu_star_none">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-off.png" alt="1" title="poor">&nbsp;</span>
									</template>
								</span>
							</p>
							<p id="server">服务评级：
								<span class="server-raty" >
									<template v-for = "n in item.fuwu_star">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-on.png" alt="1" title="poor">&nbsp;</span>
									</template>
									<template v-for = "n in item.fuwu_star_none">
										<span><img src="../Public/plugins/raty-2.5.2/lib/img/star-off.png" alt="1" title="poor">&nbsp;</span>
									</template>
								</span>
							</p>
						</section>
						<section id="content-img" >
							<p>
								<template v-for="img_url in item.img_url">
									<img src="{{img_url.image_url|addUrl}}" alt="">
								</template>
							</p>
						</section>
						 <section><p id="article-date" class="float-right">{{item.add_time|yearMouthDay}}</p></section>
					</article>
					</div>
				</template>
			</template>
            </div>
        </div><!--main-->
    </div><!--app-->
</body>
</html>