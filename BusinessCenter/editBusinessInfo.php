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
	<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>
	<script src="../Public/js/require.config.js"></script>
	<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script charset='utf-8' src="../Public/js/swiper.min.js"></script>
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
//取出加盟商信息
	function selectBusinessInfo(checkInfo,id){
		var url =HOST+'mobile.php?c=index&a=my_partner';
		$.ajax({
			type: 'post',
			url: url,
			data: {id:sessionUserId,checkInfo:checkInfo,dotype:''},
			dataType:'json'
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
					window.location.href='./Login/login.php';
				}else{
					$('#name').attr("value",result.data.name);
					$('#zu').attr("value",result.data.zu);
					$('#Resumeid').attr("value",result.data.id);
					$('#mobile').attr("value",result.data.mobile);
					$('#desc').attr("value",result.data.desc);
					$('#home').attr("value",result.data.home);
					$('#birthday').attr("value",result.data.birthday);
					$('#email').attr("value",result.data.email);
					$(result.data.img_url).each(function(index, obj) {
						var html = '';
						html += ' <li class="weui-uploader__file" id="fileshow">' +
							'  <img class="deletePicture" data="'+obj.image_id+'"  src="../Public/img/delete-icon-picture.png"/><img src="'+HOST+obj.image_url+'" class="fileshow thumb-img" />'+
							'</li>';
						$("#uploaderFiles").prepend(html);
					});

					//下拉框
					if(eval('(' + result.data.job_year+ ')')!=null){
						$('#job_year').append('<option value="'+eval('(' + result.data.job_year+ ')').id+'" selected="selected">'+eval('(' + result.data.job_year+ ')').name+'</option>');
					}
					if(eval('(' + result.data.education+ ')')!=null){
						$('#education').append('<option value="'+eval('(' + result.data.education+ ')').id+'" selected="selected">'+eval('(' + result.data.education+ ')').name+'</option>');
					}
					if(eval('(' + result.data.wage+ ')')!=null){
						$('#wage').append('<option value="'+eval('(' + result.data.wage+ ')').id+'" selected="selected">'+eval('(' + result.data.wage+ ')').name+'</option>');
					}
					if(eval('(' + result.data.job_type+ ')')!=null){
						$('#job_type').append('<option value="'+result.data.cate_id.cate_id+'" selected="selected">'+result.data.cate_id.cate_name+'</option>');
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
			<form action=""  method="post"  id="addBusinessForm" enctype="multipart/form-data">
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

						<div class="weui_cell">
							<div class="weui_cell_hd"><label class="weui_label font14px">地区</label></div>
							<div class="weui_cell_bd weui_cell_primary font14px">
								<select class="area" name="areaProvince" id="dpProvince">
								</select>
								<select class="area" name="areaCity" id="dpCity">
								</select>
								<select class="area" name="area" id="dpArea">
								</select>
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
								<input class="weui-input" type="text" name="licence" id="licence"  >
							</div>
						</div>

						<div class="weui-cell">
								<div class="weui-cell__bd">
									<div class="weui-uploader">
										<div class="weui-uploader__bd">
											<ul class="weui-uploader__files" id="uploaderFiles">
											</ul>
											<div class="weui-uploader__input-box">
												<input class="weui-uploader__input" name="licence_thumb" id="licence_thumb" type="file" accept="image/*"  />
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

						<div class="weui_cell">
							<div class="weui_cell_hd"><label class="weui_label font14px">经营类别</label></div>
							<div class="weui_cell_bd weui_cell_primary font14px">
								<select class="area" name="cate_id_first" id="partner_cate_first">
								</select>
								<select class="area" name="cate_id_sub" id="partner_cate_sub">
								</select>
								<select class="area" name="cate_id" id="partner_cate_there">
								</select>
							</div>
						</div>
							<div class=" weui-cell-box">
								<textarea class="weui-cell-textarea font14px" name="desc" id="desc" placeholder="备注..."></textarea>
							</div>
							<p class="box-in"></p>
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<div class="weui-uploader">
									<div class="weui-uploader__hd">
										<p class="weui-uploader__title font14px">企业图片</p>
									</div>
									<div class="weui-uploader__bd line">
										<ul class="weui-uploader__files" id="uploaderFiles1">

										</ul>
										<div class="weui-uploader__input-box">
											<input id="thumb" class="weui-uploader__input" name="thumb" type="file" accept="image/*"/>
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
	var licence_thumb='';
	$('#licence_thumb').change(function(event) {
		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
		if (files && files.length > 0) {
			file = files[0];// 获取目前上传的文件
			if(file.size > 1024 * 1024 * 2) {
				alert('图片大小不能超过 2MB!');
				return false;
			}
			var URL = window.URL || window.webkitURL;
			var imgURL = URL.createObjectURL(file);
			var html = '';
			html += ' <li class="weui-uploader__file" id="fileshow">' +
				'  <img class="deletePicture"   src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
				'</li>';
			$("#uploaderFiles").prepend(html);
		}

	});
	var thumb='';
	$('#thumb').change(function(event) {
		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
		if (files && files.length > 0) {
			file = files[0];// 获取目前上传的文件
			if(file.size > 1024 * 1024 * 2) {
				alert('图片大小不能超过 2MB!');
				return false;
			}
			var URL = window.URL || window.webkitURL;
			var imgURL = URL.createObjectURL(file);
			var html = '';
			html += ' <li class="weui-uploader__file" id="fileshow">' +
				'  <img class="deletePicture"   src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
				'</li>';
			$("#uploaderFiles1").prepend(html);
		}

	});
	/* 经营分类 */
	var partner_cate_first = $("#partner_cate_first");
	var partner_cate_sub = $("#partner_cate_sub");
	var partner_cate_there = $("#partner_cate_there");
	//填充一级的数据
	getPartnerType($("#checkInfoPartnerType").val(), 0);
	//给二级绑定事件，触发事件后填充市的数据
	$(partner_cate_first).bind("change keyup", function () {
		var firstId = partner_cate_first.prop("value");
		getPartnerTypeSub($("#checkInfoPartnerType").val(), firstId);
		partner_cate_sub.fadeIn("slow");
		$(".jobCategory-sub-line").fadeIn("slow");
	});
	//给三级绑定事件，触发事件后填充区的数据
	$(partner_cate_sub).bind("change keyup", function () {
		var subId = getCatSub.prop("value");
		getPartnerTypeThere($("#checkInfoPartnerType").val(), subId);
		partner_cate_there.fadeIn("slow");
		$(".jobCategory-there-line").fadeIn("slow");
	});

	/* 城市区三级联动 */
	var dp1 = $("#dpProvince");
	var dp2 = $("#dpCity");
	var dp3 = $("#dpArea");
	//填充省的数据
	loadAreasProvince($("#checkInfoArea").val(), 0);
	//给省绑定事件，触发事件后填充市的数据
	jQuery(dp1).bind("change keyup", function () {
		var provinceID = dp1.prop("value");
		loadAreasCity($("#checkInfoArea").val(), provinceID);
		dp2.fadeIn("slow");
	});
	//给市绑定事件，触发事件后填充区的数据
	jQuery(dp2).bind("change keyup", function () {
		var cityID = dp2.prop("value");
		loadAreasDistrict($("#checkInfoArea").val(), cityID);
		dp3.fadeIn("slow");
	});
/*	//图片浏览器
	$("#licence_thumb").prop("src");
	var pb1 = $.photoBrowser({
		items: [
			"./images/swiper-1.jpg",
			"./images/swiper-2.jpg",
			"./images/swiper-3.jpg"
		]
	});*/
	//提交，最终验证。
	$("#btn-custom-theme").click(function() {
		var url =HOST+'mobile.php?c=index&a=my_partner';
		var formData = new FormData($( "#addBusinessForm" )[0]);
		formData.append('cate_id','1');
		formData.append('area','1');
		formData.append('checkInfo',$( "#checkInfo").val());
		formData.append('id',sessionUserId);
		$.showLoading('正在添加');
		setTimeout(function() {
			$.hideLoading();
		}, 3000)
		$.ajax({
			type: 'post',
			url: url,
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					//window.location.href='./tips.php';
				}
			}
		});
	});
	function getTips(message){
		$(".addbuin_title_info").html(message);
		$("#topTips").fadeIn("slow");
	}
	$(document).on("click", ".deletePicture", function() {
		$(this).parent().remove();
	});
});
</script>
</html>