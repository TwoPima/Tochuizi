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
<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfoAddress"/>  
<script>
	sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}else{
		//已经登陆 去服务器比对sessionid
		
		var url =HOST+'mobile.php?c=index&a=my_address';
		 $.ajax({
				type: 'post',
				url: url,
				data: {checkInfo:$("#checkInfoAddress").val(),id:sessionUserId,dotype:''},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					var tips=result.message;
					if (result.statusCode=='0'){
						$.toptip(tips,2000, 'error');
					}else{
						//数据取回成功
						   $.each(result.data, function (index, obj) {
    					var addressHtml='<div class="weui-cell"><div class="weui-cell__bd region-main"><p class="region-title"><span id="name">'+obj.name+'</span> <span id="tel">'+obj.mobile+'</span></p><p class="region-content clear">'+obj.area+obj.address+'</p></div><div class="weui-cell__bd region-right-icon"><a href="editRegion.php?adr_id='+obj.id+'"><p class="region-right"><img alt="" src="../Public/img/edit.png"></p></a></div></div>';
   						 $(".weui-cells").append(addressHtml);
						   });
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