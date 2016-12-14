<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-设置</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/Css/weui.css"/>
	<link rel="stylesheet" href="../Public/Css/setting.css"/>
	<link rel="stylesheet" href="../Public/Css/common.css"/>
	<!-- 多语言 -->
	<script>
		var lang_flag = 1;
	</script>
</head>
<body>
<div id="app">
	<div id="header">
		<a href="index.html"><</a>
		我的积分
	</div>
	<div id="main">
		<div class="setting_count">
			<img src="../public/img/setting/setting_001.jpg">
			<span class="setting_count_title">(积分总计)</span>
			<span class="setting_count_num">250</span>
		</div>

		<div class="weui-flex setting_tab">
			<div class="weui-flex__item action"><div class="placeholder">全部</div></div>
			<div class="weui-flex__item"><div class="placeholder">收入积分</div></div>
			<div class="weui-flex__item"><div class="placeholder">支出积分</div></div>
		</div>

		<div class="setting_list">
			<ul>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num reduce">-35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
				<li>
					<span class="setting_list_num add">+35</span>
					<span class="setting_list_event">阿郎烧烤单人48元</span>
					<span class="setting_list_time">2016/10/22</span>
				</li>
			</ul>
		</div>
	</div><!--main-->
</div><!--app-->
</body>
<script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script src="../Public/js/language.js"></script>
<script>
	/* 多语言切换 开始*/
	document.write(love[lang_flag]);
	fun();
	/* 多语言切换 结束*/
</script>
</html>