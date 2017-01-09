<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-订单中心</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
</head>
<body >
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">货单管理</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href=""></a>
                </div>
		</div>
		<div class="order-list clear">
			<div class="weui_tab">
					  <div class="weui_navbar">
					    <a href="#tab1" class="weui_navbar_item weui_bar_item_on">
					       <p class="">未发货</p>
					    </a>
					    <a href="#tab2" class="weui_navbar_item">
					      <p class="">已发货</p>
					    </a>
					  </div>
						  <div class="weui_tab_bd">
						    <div class="weui_panel weui_panel_access">
							  <div class="weui_panel_bd weui-article">
							   <div id="tab1" class="weui_tab_bd_item weui_tab_bd_item_active">
							   		<div class="tab-content">
								        <div class="weui-media-box weui-media-box_text">
								          <h5 class="weui-media-box__title">订单号：1232255555</h5>
								            <p class="weui-media-box__desc">各种网站建设开发 <span id="guige">规格套餐: <span>官方标配套餐</span></span></p>
								            <p class="weui-media-box__desc order-time"><span>1</span>小时前下单</p>
								         </div>
									</div>
								</div>
							    <div id="tab2" class="weui_tab_bd_item">
							    	<div class="tab-content">
								        <div class="weui-media-box weui-media-box_text">
								          <h5 class="weui-media-box__title">订单号：1232sd5</h5>
								            <p class="weui-media-box__desc">各种网站建设开发 <span id="guige">规格套餐: <span>官方标配套餐</span></span></p>
								            <p class="weui-media-box__desc order-time"><span>1</span>小时前下单</p>
								         </div>
									</div>
							</div>
							</div>
							</div>
				    </div>
				  </div>
			</div>
		</div>
</body>
  <script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.2.1.0.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script>
 	var datademo={
 		name:'mps',
 	} 
	var vue = new Vue({
			el:'#app',
			data:datademo,
	})
	jQuery(document).ready(function(){
		$('#default').betterCheckbox();
		$('#default-dis').betterCheckbox();
		$('#default-dis').betterCheckbox('disable');

		$('#a').betterCheckbox({boxClass: 'ab', tickClass: 'at', tickInnerHTML: "x"});
		$('#a-dis').betterCheckbox({boxClass: 'ab', tickClass: 'at', tickInnerHTML: "x"});
		$('#a-dis').betterCheckbox('disable');

		$('#b').betterCheckbox({boxClass: 'bb', tickClass: 'bt', tickInnerHTML: "approved"});
		$('#b-dis').betterCheckbox({boxClass: 'bb', tickClass: 'bt', tickInnerHTML: "approved"});
		$('#b-dis').betterCheckbox('disable');

		$('#c').betterCheckbox({boxClass: 'cb', tickClass: 'ct'});
		$('#c-dis').betterCheckbox({boxClass: 'cb', tickClass: 'ct'});
		$('#c-dis').betterCheckbox('disable');

		$('#d').betterCheckbox({boxClass: 'db', tickClass: 'dt'});
		$('#d-dis').betterCheckbox({boxClass: 'db', tickClass: 'dt'});
		$('#d-dis').betterCheckbox('disable');

		$('#e').betterCheckbox({boxClass: 'eb', tickClass: 'et', tickInnerHTML: "✓"});
		$('#e-dis').betterCheckbox({boxClass: 'eb', tickClass: 'et', tickInnerHTML: "✓"});
		$('#e-dis').betterCheckbox('disable');

		$('#f').betterCheckbox({boxClass: 'fb', tickClass: 'ft', tickInnerHTML: "✔"});
		$('#f-dis').betterCheckbox({boxClass: 'fb', tickClass: 'ft', tickInnerHTML: "✔"});
		$('#f-dis').betterCheckbox('disable');
	});
</script>
</html>