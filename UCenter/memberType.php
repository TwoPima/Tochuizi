<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-点亮我的身份</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
	  <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	  <link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/dianliang.css"/>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>  
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfoBasicInfo"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/common.js"></script>
<script>
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		window.location.href='../Login/login.php';
	}
	$(function(){
	 $(".weui-cells_radio").click(function(){
	 		 $(this).siblings().children(":radio[name=typeMember]").prop('checked',false);
	  		$(this).children(":radio[name=typeMember]").prop('checked',true); 
	});
	//提交，最终验证。
		 $("#btn-custom-theme").click(function() {
				var id_type=$("input[name='typeMember']:checked").val();
				var  checkInfoMemberType = $("#checkInfoMemberType").val();
		       	var url =HOST+'mobile.php?c=index&a=my_idtype';
				 $.ajax({
					type: 'post',
					url: url,
					data: {id:sessionUserId,id_type:id_type,checkInfo:checkInfoMemberType},
					dataType: 'json',
					success: function (result) {
						var message=result.message;
						if (result.statusCode==='0'){
							$.toptip(message,2000, 'error');
							window.location.href='myJob.php';
						}else{
							$.toast(message);
							 setTimeout(window.location.href='noMyJob.php',8000)
							//window.location.href='addJobResume.php';
						}
					},
				});
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
	                  	    <span class="title">点亮我的需求</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<div id="main">
		<div class="page">
			<div class="weui-panel menu_order">
				<a class="weui-cell weui-cell_access">
					<div class="weui-cell__hd"><img src="../Public/img/index/index_001.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
					<div class="weui-cell__bd">
						<p>选择类型</p>
					</div>
				</a>
			</div>
			<div  class="weui-flex menu_4">
				<div class="weui-flex__item menu_4_box" data-number="1" id="jishu">
					<img src="../Public/img/memberType/jigong.png" >
					 <div class="weui-cells_radio">
                        <p id="test">我是技工</p>
                        <input type="radio" name="typeMember" class="weui-check"  value="1">
                        <span class="weui-icon-checked"></span>
                    </div>
				</div>
				<div class="weui-flex__item menu_4_box">
					<img src="../Public/img/memberType/design.png" data-number="2" id="designer" >
					<div class="weui-cells_radio">
                        <p>设计师</p>
                        <input type="radio" name="typeMember" class="weui-check"  checked="checked" value="2">
                        <span class="weui-icon-checked"></span>
                    </div>
				</div>
				<div class="weui-flex__item menu_4_box" data-number="3" id="zuzhang">
					<img src="../Public/img/memberType/zuzhang.png" >
					<div class="weui-cells_radio">
                        <p>组长</p>
                        <input type="radio" name="typeMember" class="weui-check"  value="3">
                        <span class="weui-icon-checked"></span>
                    </div>
				</div>
				<div class="weui-flex__item menu_4_box" data-number="4" id="manage">
					<img src="../Public/img/memberType/manage.png" >
					<div class="weui-cells_radio">
                        <p>管理人</p>
                        <input type="radio"  class="weui-check" name="typeMember" value="4">
                        <span class="weui-icon-checked"></span>
                    </div>
				</div>
			</div>
			<div class="dianliang_button">
				<a class="weui-btn weui-btn_default" id="btn-custom-theme">下一步</a>
			</div>
		</div>
	</div><!--main-->
</div><!--app-->
</body>
</html>