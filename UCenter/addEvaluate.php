<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-发布评价</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
      <link rel="stylesheet" href="../Public/css/common.css"/>
<input value="<?php echo md5(date('Ymd')."add_comment"."tuchuinet");?>"	type="hidden" id="add_comment"/>
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/demo/js/jquery.min.js"></script>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
	//sessionUserId=$.session.get('userId');
	sessionUserId='18';
	if(sessionUserId==null){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
$(function(){
	$('.file').change(function(event) {
		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
		if (files && files.length > 0) {
			file = files[0];// 获取目前上传的文件
			var URL = window.URL || window.webkitURL;
			var imgURL = URL.createObjectURL(file);
			var html = '';
			html += ' <li class="weui-uploader__file" id="fileshow">' +
				'  <img class="deletePicture"   src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
				'</li>';
			$("#uploaderFiles").prepend(html);
			$(this).parent().remove();
		}
	});

	//收藏启动
	$.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
	$('#description-raty').raty({
		score: function() {
			return $(this).attr('data-score');
		}
	});
	$('#logistic-raty').raty({
		score: function() {
			liu_star=$(this).attr('data-score');
			return $(this).attr('data-score');
		}
	});
	$('#server-raty').raty({
		score: function() {
			return $(this).attr('data-score');
		}
	});
	$("#btn-custom-theme").click(function() {
		var formData = new FormData($( "#addEvaluateForm" )[0]);
		formData.append('checkInfo',$( "#add_comment").val());
		formData.append('id',sessionUserId);
		formData.append('dotype','add');
		formData.append('miao_star',$('#description-raty').find('input').val());
		formData.append('liu_star',$('#logistic-raty').find('input').val());
		formData.append('fuwu_star',$('#server-raty').find('input').val());
		$.showLoading('正在添加');
		setTimeout(function() {
			$.hideLoading();
		}, 3000)
		$.ajax({
			type: 'post',
			url:HOST+'mobile.php?c=index&a=add_comment',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function (result) {
				var message=eval('(' + result+ ')').message;
				if (eval('(' + result+ ')').statusCode=='0'){
					$.toptip(message,2000, 'error');
					$(document).scrollTop(0);
				}
				if (eval('(' + result+ ')').statusCode=='1'){
					$.toast("操作成功");
					window.location.href = 'evaluate.php';
				}
			}
		});
	});
});
	$(document).on("click", ".deletePicture", function() {
		$(this).parent().remove();
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
        <div class="addEvaluate">
			<form action="" method="post"  id="addEvaluateForm" enctype="multipart/form-data">
	            <div class="weui-cells">
	                <a class="weui-cell weui-cell_access" href="javascript:;">
	                    <div class="weui-cell__bd">
	                        <p id="good_name"><?php echo $_GET['good_title'];?></p>
							<input name="order_id" value="<?php echo $_GET['order_id'];?>" type="hidden"/>
							<input name="goods_id" value="<?php echo $_GET['goods_id'];?>" type="hidden"/>
	                    </div>
	                    <div class="weui-cell__ft"></div>
	                </a>
	                <div class="weui-cells weui-cells_form">
	                    <div class="weui-cell">
	                        <div class="weui-cell__bd">
	                            <textarea class="weui-textarea" name="desc" id="desc" placeholder="评论描述" rows="3"></textarea>
	                        </div>
	                    </div>
	                </div>
	            </div>
                <div class="weui-uploader">
                        <div class="weui-cells">
							<div class="weui-uploader__bd margin_fix">
								<ul class="weui-uploader__files" id="uploaderFiles">
								</ul>
								<div class="weui-uploader__input-box">
									<input class="weui-uploader__input file" name="image_url1" id="image_url1" type="file" accept="image/*" >
								</div>
								<div class="weui-uploader__input-box">
									<input class="weui-uploader__input file" name="image_url2" id="image_url2" type="file" accept="image/*" >
								</div>
								<div class="weui-uploader__input-box">
									<input class="weui-uploader__input file" name="image_url3" id="image_url3" type="file" accept="image/*" >
								</div>
								<div class="weui-uploader__input-box">
									<input class="weui-uploader__input file" name="image_url4" id="image_url4" type="file" accept="image/*" >
								</div>
								<div class="weui-uploader__input-box">
									<input class="weui-uploader__input file" name="image_url5" id="image_url5" type="file" accept="image/*" >
								</div>
							</div>
                    </div>
            </div>

            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="description">描述评级：<span id="description-raty" data-score="3"></span></p>
                    </div>
                </a>
            </div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                       <p id="logistic">物流评级：<span id="logistic-raty"data-score="4" ></span></p>
                    </div>
                </a>
            </div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="server">服务评级：<span id="server-raty" data-score="5"></span></p>
                    </div>
                </a>
            </div>
            <div class="height20px"></div>
            <div class="button-sp-area">
                <a  class="weui-btn weui-btn_plain-default "id="btn-custom-theme">按钮</a>
            </div>
			</form>
          </div>
    </div><!--main-->
</div><!--app-->
</body>
</html>