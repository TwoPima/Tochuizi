<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-地址管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
     <!--jquery WEUI  -->
        <link rel="stylesheet" href="../Public/css/weui.css">
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
   <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
   <link rel="stylesheet" href="../Public/css/center.css"/>
     <link rel="stylesheet" href="../Public/css/common.css"/>
     <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<script>
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
		//已经登陆 去服务器比对sessionid
		var url =HOST+'mobile.php?c=index&a=login';
		var checkInfoArea=$("#checkInfoArea").val();
		getAreaList(checkInfoArea,'0');
		/*  $.ajax({
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
					} 
				}
			}); */
</script>
</head>
<body>
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">新增地址</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href=""><span>保存</span></a>
                </div>
		</div>
	<div id="main clear">
		<div class="page addRegion">
			<div class="weui-cells weui-cells_form region-form">
			    <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">联系人姓名：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" pattern="" placeholder=""/>
			        </div>
<!-- 			        <div class="weui_cell weui_cell_warn">
						</div>
 -->			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">手机号码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="tel" placeholder="请输入手机号">
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">邮政编码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="tel" pattern="[0-6]*"  placeholder="请输入邮政编码">
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">所在地区：</label>
			        </div>
			        <div class="weui-cell__bd">
			          <input class="weui-input" type="text" id='city-picker' value="宁夏回族自治区 银川市 金凤区" >
			        </div>
			    </div>
				     <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">详细地址：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" pattern="" placeholder="输入详细地址"/>
			        </div>
			    </div>
			</div>
			</div>
	</div><!--main-->
</div><!--app-->
</body>
<script type="text/javascript" src="../Public/js/city-picker.js" charset="utf-8"></script>
<script>
	$("#city-picker").cityPicker({
	  title: "请选择收货地址"
	});
</script>
</html>