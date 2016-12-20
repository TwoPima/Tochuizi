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
          <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script>
	sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}else{
		//已经登陆 去服务器比对sessionid
		var url =HOST+'mobile.php?c=index&a=login';
		var checkInfo=$("#checkInfo").val();
		 $.ajax({
				type: 'post',
				url: url,
				data: {checkInfo:checkInfo,id:sessionUserId},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					var tips=result.message;
					if (result.statusCode=='0'){
						$.toptip(tips,2000, 'error');
					}else{
						//数据取回成功
    					var mobile=$.session.get('mobileSession');
    					var typeMember=getMemberType(result.data.idtype);
    					var nickname=result.data.nickname;
    					$("#mobile").html(mobile);
    					$("#nickname").html(nickname);
    					$("#typeMember").html(typeMember);
					} 
				}
			});
	}
</script>
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
<script type="text/javascript" src="../Public/js/city-picker.js" charset="utf-8"></script>
<script>
	$("#city-picker").cityPicker({
	  title: "请选择收货地址"
	});
</script>
</html>