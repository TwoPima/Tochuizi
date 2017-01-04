<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-上传工作风采</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="../Public/css/weui.css"/>
	    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianliinfo.css"/>
	<link rel="stylesheet" type="text/css" href="../../css/webuploader.css" />

</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title" id="memberType">图片上传</span>
            </a>
        </div>
        <div id="header-right">
        </div>
    </div>
    <div id="jianliinfo" class="clear">
		<form  name="uploadForm" id="uploadForm" enctype="multipart/form-data" method="post">
			<div class="info_box">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd" style="border-bottom: 1px solid #EFEFEF;margin-bottom: 10px;">
                            <p class="weui-uploader__title font14px">作品案例</p>
                        </div>
                         <div class="weui-uploader__bd margin_fix">
			                <ul class="weui-uploader__files" id="uploaderFiles">
			                </ul>
			                <div class="weui-uploader__input-box">
								<input class="weui-uploader__input file"  name="image_url" id="image_url1" type="file" accept="image/*" >
								<input class="weui-uploader__input file"  name="image_url" id="image_url2" type="file" accept="image/*" >
								<input class="weui-uploader__input file" name="image_url" id="image_url3" type="file" accept="image/*" >
								<input class="weui-uploader__input file" name="image_url" id="image_url4" type="file" accept="image/*" >
								<input class="weui-uploader__input file"  name="image_url" id="image_url5" type="file" accept="image/*" >
								<input  name="checkInfo" value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>
								<input  name="id" id="userId" type="hidden"  >
			                </div>
			            </div>
                    </div>
                </div>
            </div>
        </div>
		</form>
        <div class="add_button">
            <a  class="weui-btn weui-btn_default" id="btn-custom-theme">保存</a>
        </div>

    </div><!--main-->
</div><!--app-->
</body>
<input value=""	type="hidden" id="Resumeid"/>  
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>  

<!--添加工作风采  -->
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>  
<!--删除工作风采  -->

 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/plugins/uploadImg/jquery.uploadifive.js" type="text/javascript"></script>
 <script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script type="text/javascript" src="../../dist/webuploader.js"></script>
<script type="text/javascript" src="./upload.js"></script>
<!--引入CSS--> <link rel="stylesheet" type="text/css" href="../Public/plugins/uploadImg/webuploader.css"> <!--引入JS-->
<script type="text/javascript" src="../Public/plugins/uploadImg/webuploader.js"></script> <!--SWF在初始化的时候指定，在后面将展示-->
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		window.location.href='../Login/login.php';
	}
	$("#userId").attr("value",sessionUserId);
//var url =HOST+'mobile.php?c=index&a=add_picture';

	 //提交，最终验证。
	 $("#btn-custom-theme").click(function() {
			 $.ajax({
				type: 'post',
				url: url,
				data: {
					mobile:mobile,cate_id:cate_id,she_type:she_type,area:area,email:email,
					education:education,job_year:job_year,id:sessionUserId,dotype:'edit',desc:desc,
					home:home,birthday:birthday,name:name,checkInfo:checkInfo,sex:sex,wage:wage,zu:zu
					},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					if (result.statusCode==='0'){
						$.toast(message, "cancel");
					}else{
						$.toast("操作成功！");
						window.location.href='myJob.php';
					}
				},
			});
	});
});
$(document).on("click", ".deletePicture", function() {
	$(this).parent().remove();
});
</script>
</html>