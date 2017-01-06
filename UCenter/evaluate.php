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
	 $.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
	    $('.description-raty').raty({
	    	  score: function() {
	    	    return $(this).attr('data-score');
	    	  }
	    	});
	    $('.logistic-raty').raty({
	    	  score: function() {
	    	    return $(this).attr('data-score');
	    	  }
	    	});
	    $('.server-raty').raty({
	    	  score: function() {
	    	    return $(this).attr('data-score');
	    	  }
	    	});
	//取出信息
	new Vue({
		el: '#app',
		data: {
			listData: {},
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
				//	console.log(res);
//	window.location.href='noEvaluate.php';

				that.$set('listData', res.data);  //把数据传给页面
				$('.description-raty').raty({
					score: function() {
						return $(this).attr('data-score');
					}
				});
			});
		},//created 结束
		methods: {
			jump_url: function (msg1){
				window.location.href='index.php?goods_id='+msg1;
			}
		}
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
            <div class="weui-panel">
				<template v-for="item in listData "><!--三层  -->
					<a class="weui-cell weui-cell_access"  v-on:click="jump_url(item.goods_id)">
						<div class="weui-cell__bd"><p id="company_name">{{item.goods_title}}{{item.goods_id}}  <span id="price" class="red">{{item.price}}元</span></p></div>
						<div class="weui-cell__ft"></div></a><div class="height1px"></div>
					<article class="weui-article"><section><p id="evaluate-content">{{item.desc}}</p>
							</section><section>
							<p id="description">描述评级：<span class="description-raty" data-score="{{item.miao_star}}"></span></p>
							<p id="logistic">物流评级：<span class="logistic-raty" data-score="{{item.liu_star}}" ></span></p>
							<p id="server">服务评级：<span class="server-raty" data-score="{{item.fuwu_star}}"></span></p> </section>
						<section id="content-img" ><p><img src="../Public/img/test1.png" alt=""><img src="../Public/img/test1.png" alt=""></p></section>
						 <section><p id="article-date" class="float-right">{{item.add_time}}</p></section> </article>
				</template>
					<!--	<p id="description">描述评级：<span class="description-raty" data-score="3"></span></p>
						<p id="logistic">物流评级：<span class="logistic-raty" data-score="4" ></span></p>
						<p id="server">服务评级：<span class="server-raty" data-score="{{item.fuwu_star}}"></span></p> </section>-->
            </div>
            </div>
        </div><!--main-->
    </div><!--app-->
</body>
</html>