<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-加盟商入驻</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../Public/css/weui.css">
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfoLogin"/>  
<input value="<?php echo md5(date('Ymd')."my_partner"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."partner_cat"."tuchuinet");?>"	type="hidden" id="checkInfoPartnerType"/>  <!--加盟商类别  -->
<input value="<?php echo md5(date('Ymd')."pic_partner"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/>  
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoHeadImg"/> <!-- 删除公司照片 --> 
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script>
sessionUserId=$.session.get('userId');
if(sessionUserId==null){
	//没有登陆
	$.toptip('您还没有登陆！',2000, 'error');
	window.location.href='../Login/login.php';
}else{
	//已经登陆
var checkInfoLogin = $("#checkInfoLogin").val();
var url =HOST+'mobile.php?c=index&a=login';
  $.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoLogin,id:sessionUserId},
		dataType: 'json',
		success: function (result) {
			var message=result.message;
			if (result.statusCode==='0'){
				$.toptip('登陆超时请重新登陆！',2000, 'warning');
				window.location.href='../Login/login.php';
			}
		}
	}); 
}
</script>
</head>
<body>
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">申请加盟</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<!--内容页面  -->
	<div id="addbuin-main" class="clear">
    		<div class="addbuin_title" id="topTips">
    			<div class="addbuin_title_img ">
    				<img src="../Public/img/warnning.png" class="" alt="">
    			</div>
    			<div class="addbuin_title_info"></div>
    		</div>		
		<div class="addbuin_form clear" >
			<form action="">
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<div class="weui-cell">
							<div class="weui-cell__hd"><label class="weui-label">公司名称</label></div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="name" id="name"/>
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">地址</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="address" id="address">
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">所在地区</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" name="area" id="area" >
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">电话</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="tel" name="mobile" id="mobile" >
							</div>
						</div>

						<div class="weui-cell">
							<div class="weui-cell__hd">
								<label class="weui-label">营业执照号</label>
							</div>
							<div class="weui-cell__bd">
								<input class="weui-input" type="text"name="licence" id="licence"  >
							</div>
						</div>

						<div class="weui-cell">
								<div class="weui-cell__bd">
									<div class="weui-uploader">
										<div class="weui-uploader__bd">
											<ul class="weui-uploader__files" id="uploaderFiles">
												<li class="weui-uploader__file" style="display: none"></li>
											<!--	<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">
														<i class="weui-icon-warn"></i>
													</div>
												</li>-->
												<!--<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">50%</div>
												</li>-->
											</ul>
											<div class="weui-uploader__input-box">
												<input id="uploaderInput" class="weui-uploader__input" name="licence_thumb" id="licence_thumb" type="file" accept="image/*" multiple />
											</div>
											<div class="weui-uploader__input-box_title">
												点击查看营业执照图片 <br>
												图片保证清晰
											</div>
										</div>
									</div>
								</div>
							</div><!--upload end-->
							<p class="box-in"></p>
							<div class="weui_cell weui_cell_select">
                                <div class="weui_cell_bd weui_cell_primary">
                                  <select class="weui_select" name="partner_cate" id="partner_cate">
                                    <option class="partner_cate_option" id="" selected="" value="0">经营类别:</option>
                                  </select>
                                </div>
                              </div>
                            
							<div class=" weui-cell-box">
								<textarea class="weui-cell-textarea" name="desc" id="desc"placeholder="备注..."></textarea>
							</div>
							<p class="box-in"></p>
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<div class="weui-uploader">
									<div class="weui-uploader__hd">
										<p class="weui-uploader__title">企业图片</p>
									</div>
									<div class="weui-uploader__bd line">
										<ul class="weui-uploader__files" id="uploaderFiles1">
											<li class="weui-uploader__file" style="display: none"></li>
											<!--	<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
													<div class="weui-uploader__file-content">
														<i class="weui-icon-warn"></i>
													</div>
												</li>-->
											<!--<li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
                                                <div class="weui-uploader__file-content">50%</div>
                                            </li>-->
										</ul>
										<div class="weui-uploader__input-box">
											<input id="uploaderInput1" class="weui-uploader__input" type="file" accept="image/*" multiple />
										</div>
									</div>
								</div>
							</div>
						</div><!--upload end-->
					</div>
				</div>
			</form>
			<div class="addbuin_form_button">
				<a id="btn-custom-theme" class="weui-btn">申请加盟</a>
			</div>

		</div>
	</div>
</body>
<script type="text/javascript">
$(function(){
	getPartnerType($("#checkInfoPartnerType").val());
	 //文本框失去焦点后
	   $('form :input').blur(function(){
	        //验证手机
	        if( $(this).is('#mobile') ){
	       	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
	                getTips('手机号码有误，请重填！');
	                return false; 
	            } 
	      	}
	        //验证名称
	        if( $(this).is('#name') ){
	       	 if(this==""||this.length<6){ 
	       		 getTips('名称非法！');
	                return false; 
	            } 
	      	}
	        //验证营业执照编号
	        if( $(this).is('#licence') ){
	       	 if(this==""){ 
	                //$.toptip('手机号码有误，请重填！', 2000, 'warning');
		       	  getTips('执照编号非法！');
	                return false; 
	            } 
	      	}
	        //验证address
	        if( $(this).is('#address') ){
	       	 if(this==""){ 
		       	  getTips('地址非法！');
	                return false; 
	            } 
	      	}
		});
});
//提交，最终验证。
$("#btn-custom-theme").click(function() {
		var area = $("#area").val();
		var mobile = $("#mobile").val();
		var name = $("#name").val();
		var nickname = $("#nickname").val();
		var desc = $("#desc").val();
		var licence = $("#licence").val();
		//var licence_thumb = $("#licence_thumb").val();
		var licence_thumb = '23423432.jpg';
		var cate_id = $("#partner_cate").val();//经营类别
      	var url =HOST+'mobile.php?c=index&a=my_partner';
      	var checkInfo = $("#checkInfo").val();
       if(mobile==""|| name==""){
    	   getTips('手机号码或者昵称不能为空！');
      	    return false; 
      	 }
		 $.ajax({
			type: 'post',
			url: url,
			data: {dotype:'add',name:name,cate_id:cate_id,mobile:mobile,desc:desc,licence_thumb:licence_thumb,id:sessionUserId,licence:licence,checkInfo:checkInfo,area:area},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					window.location.href='./tips.php';
				}
			},
		});
});
function getTips(message){
	$(".addbuin_title_info").html(message);
	$("#topTips").fadeIn("slow");
}
</script>
</html>