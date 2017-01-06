<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>设置-意见反馈</title>
         <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
    </head>
    <body id="login">
    <div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">意见反馈</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
			<div class="weui_cells weui_cells_form login-form clear">
				<div class="weui-cell">
					<div class="weui-cell__bd">
						<input class="weui-input" type="text"  name="title" id="title" placeholder="请输入标题">
					</div>
					</div>
			<div class="weui_cells_title"></div>
				<div class="weui_cells weui_cells_form">
				  <div class="weui_cell">
				    <div class="weui_cell_bd weui_cell_primary">
				      <textarea class="weui_textarea" id="desc" name="desc" placeholder="请输入内容" rows="3"></textarea>
				    </div>
				  </div>
				</div>
				</div>
				<div class="height20px"></div>
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default "id="btn-custom-theme">提&nbsp;&nbsp;&nbsp;&nbsp;交</a>
            </div>
    </body>
<input value="<?php echo md5(date('Ymd')."add_fankui"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toast("您还没有登陆！", "forbidden");
		window.location.href='../Login/login.php';
	}
	//提交，最终验证。
	$("#btn-custom-theme").click(function() {
		var url =HOST+'mobile.php?c=index&a=add_fankui';
		if($("#title").val()==""|| $("#desc").val()==""){
			$.toast("标题和内容不能为空！", "forbidden");
			return false;
		}
		$.ajax({
			type: 'post',
			url: url,
			data: {
				id:sessionUserId,title:$("#title").val(),desc:$("#desc").val(),
				checkInfo:$("#checkInfo").val()},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toast(message, "forbidden");
				}else{
					$.toast(message);
					window.location.href='./UCenter/index.php';
				}
			}
		});
	});
});
</script>
</html>