<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>个人中心-头像上传</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
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
	                  	    <span class="title">头像上传</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
		<div id="myInfo">
		<form id="myInfoForm" action="" method="post" enctype="multipart/form-data">
                <div class="info-head">
                        <div class="head_img ">
                            <a id="headImg">
                        	    <img id="img-thumb" src="../Public/img/index/index_headimg2.jpg" alt="">
                            </a>
                            <input name="name" type="hidden"/>
                            <input name="id" id="userid" type="hidden"/>
                            <input value="<?php echo md5(date('Ymd')."headpic"."tuchuinet");?>"	type="hidden" name="checkInfo" id="checkInfo"/>  
                       	   <input class="weui_uploader_input" id="avatar" type="file"  name="avatar">
                        </div>
               	 </div>
            </form>
		</div>
		<div class="height20px" ></div>
                    <div class="height20px" ></div>
          	   <a  id="btn-custom-theme" onclick="uploadImage()" type="submit"  class="weui-btn weui-btn_default" >点击上传</a>
</div><!--app-->
</body>

<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfoLogin"/>  
 <script src="../Public/js/require.config.js"></script>
 <script src="../Public/js/common.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<!-- 上传头像| -->
<script type="text/javascript">
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
	//已经登陆
	$("#userid").val(sessionUserId);
  	selectMyInfo(sessionUserId,$("#checkInfoLogin").val());//查询信息
  	
});
$(function() {
	$("#avatar").click(function () {
	//$("#upload").click();  //隐藏了input:file样式后，点击头像就可以本地上传
    	$("#avatar").on("change",function(){
    	var objUrl = getObjectURL(this.files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
    	if (objUrl) {
    	 $("#img-thumb").attr("src", objUrl) ; //将图片路径存入src中，显示出图片
    	}
    	});
	});
});
	//建立一个可以去到file的url
	function getObjectURL(file) {
    	var url = null ;
    	if (window.createObjectURL!=undefined) { // basic
    	url = window.createObjectURL(file) ;
    	} else if (window.URL!=undefined) { // mozilla(firefox)
    	url = window.URL.createObjectURL(file) ;
    	} else if (window.webkitURL!=undefined) { // webkit or chrome
    	url = window.webkitURL.createObjectURL(file) ;
    	}
    	return url ;
	}
function uploadImage() {
    //判断是否有选择上传文件
        var imgPath = $("#avatar").val();
        if (imgPath == "") {
            $.toast("请选择上传图片！", "forbidden");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
        && strExtension != 'png' && strExtension != 'bmp') {
            $.toast("必须选择图片", "forbidden");
            return;
        }
       var url =HOST+'mobile.php?c=index&a=headpic';
       var formData = new FormData($( "#myInfoForm" )[0]);  
        $.ajax({
                type: "POST",
                url:url,
                data: formData,  
                async: false,  
                cache: false,  
                contentType: false,  
                processData: false, 
                //data:$('#myInfoForm').serialize(),
                async: false,
                error: function(request) {
               	 $.toast("上传失败，请检查网络后重试", "cancel");
                },
                success: function(result) {
                    if(result.data.id==null){
                        
                    }else{
                    	window.location.href='index.php';
                    }
                	
                }
            });
    }
 function selectMyInfo(id,checkInfo){
		 //查询
		var url =HOST+'mobile.php?c=index&a=login';
		 $.ajax({
				type: 'post',
				url: url,
				data: {id:sessionUserId,checkInfo:checkInfo},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					if (result.statusCode==='0'){
						 $.toast(message, "cancel");
						window.location.href='./Login/login.php';
					}else{
						$("#avatar").attr("src",result.data.avatar);//头像
						
					}
				},
			});
	 
 }
</script>
</html>