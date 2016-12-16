<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-地址管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../Public/css/weui.min.css"/>
        <link rel="stylesheet" href="../Public/css/weui.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
</head>
<body>
<div id="app">
	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">地址管理</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href="addRegion.php"><span>新增</span></a>
                </div>
		</div>
		<div class="region">
			<div class="weui-cells">
			    <div class="weui-cell">
			        <div class="weui-cell__bd region-main">
			            <p class="region-title"><span id="name">马晓成</span> <span id="tel">15909581102</span></p>
			            <p class="region-content clear">宁夏银川市文昌北街明实楼A617</p>
			        </div>
			         <div class="weui-cell__bd region-right-icon">
			           <a href="addRegion.php?id=edit"><p class="region-right"><img alt="" src="../Public/img/edit.png"></p></a>
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__bd region-main">
			            <p class="region-title"><span id="name">马晓成</span> <span id="tel">15909581102</span></p>
			            <p class="region-content clear">宁夏银川市文昌北街明实楼A617</p>
			        </div>
			         <div class="weui-cell__bd region-right-icon">
			           <a href="addRegion.php?id=edit"><p class="region-right"><img alt="" src="../Public/img/edit.png"></p></a>
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__bd region-main">
			            <p class="region-title"><span id="name">马晓成</span> <span id="tel">15909581102</span></p>
			            <p class="region-content clear">宁夏银川市文昌北街明实楼A617</p>
			        </div>
			         <div class="weui-cell__bd region-right-icon">
			           <a href="addRegion.php?id=edit"><p class="region-right"><img alt="" src="../Public/img/edit.png"></p></a>
			        </div>
			    </div>
			</div>
</div><!--app-->
</body>
<script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script type="text/javascript" src="../Public/js/city-picker.js" charset="utf-8"></script>
<script>
	$("#city-picker").cityPicker({
	  title: "请选择收货地址"
	});
</script>
</html>