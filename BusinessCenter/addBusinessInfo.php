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
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<form action=""  method="post"  id="addBusinessForm" enctype="multipart/form-data">
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
							<div class="weui_cell weui-cell_select weui-cell_select-after">
								<div class="weui_cell_hd"><label class="weui_label font14px">地区</label></div>
								<div class="weui_cell_bd weui_cell_primary font14px custom-select">
									<select class="area" name="dpProvince" id="dpProvince">
									</select>
									<select class="area" name="dpCity" id="dpCity">
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
							<div class="weui_cell_bd weui_cell_primary font14px custom-select">
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
						</form>
						<form  action=""  method="post"  id="addBusinessImageForm" enctype="multipart/form-data">
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
											<input id="thumb" class="weui-uploader__input" name="thumb[]" multiple type="file" accept="image/*"/>
										</div>
									</div>
								</div>
							</div>
						</div><!--upload end-->
							<input value="<?php echo md5(date('Ymd')."pic_partner"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>
							<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/> <!-- 删除公司照片 -->
						</form>
					</div>
				</div>

			<div class="addbuin_form_button">
				<a id="btn-custom-theme" class="weui-btn">申请加盟</a>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
$(function(){
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
		var subId = partner_cate_sub.prop("value");
		getPartnerTypeThere($("#checkInfoPartnerType").val(), subId);
		partner_cate_there.fadeIn("slow");
		$(".jobCategory-there-line").fadeIn("slow");
	});

	/* 城市区三级联动 */
	var dpProvince = $("#dpProvince");
	var dpCity = $("#dpCity");
	var dpArea = $("#dpArea");
	//填充省的数据
	loadAreasProvince($("#checkInfoArea").val(), 0);
	//给省绑定事件，触发事件后填充市的数据
	jQuery(dpProvince).bind("change keyup", function () {
		var provinceID = dpProvince.prop("value");
		$("#dpArea").empty();
		$("#dpCity").empty();
		loadAreasCity($("#checkInfoArea").val(), provinceID);
		dpCity.fadeIn("slow");
	});
	//给市绑定事件，触发事件后填充区的数据
	jQuery(dpCity).bind("change keyup", function () {
		var cityID = dpCity.prop("value");
		loadAreasDistrict($("#checkInfoArea").val(), cityID);
		dpArea.fadeIn("slow");
	});
	 //文本框失去焦点后
	   $('form :input').blur(function(){
	        //验证手机
	        if( $(this).is('#mobile') ){
	       	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
	                getTips('手机号码有误，请重填！');
				 $(document).scrollTop(0);
	                return false; 
	            } 
	      	}
	        //验证名称
	        if( $(this).is('#name') ){
	       	 if(this==""||this.length<6){ 
	       		 getTips('名称非法！');
				 $(document).scrollTop(0);
	                return false; 
	            } 
	      	}
	        //验证营业执照编号
	        if( $(this).is('#licence') ){
	       	 if(this==""){ 
	                //$.toptip('手机号码有误，请重填！', 2000, 'warning');
		       	  getTips('执照编号非法！');
				 $(document).scrollTop(0);
	                return false; 
	            } 
	      	}
	        //验证address
	        if( $(this).is('#address') ){
	       	 if(this==""){ 
		       	  getTips('地址非法！');
				 $(document).scrollTop(0);
	                return false; 
	            } 
	      	}
		});
	var licence_thumb='';
	$('#licence_thumb').change(function(event) {
		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
		if (files && files.length > 0) {
			file = files[0];// 获取目前上传的文件
			var count_li = $("#uploaderFiles").children().length;
			if(count_li >= '2'){
				$("#uploaderInput").css('display','none');
				$.toast("只能上传一张照片！", "cancel");
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
	$('#thumb').change(function(event) {
		var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
		imgPathArr=[];
		if (files && files.length > 0) {
			file = files[0];// 获取目前上传的文件
			var count_li = $("#uploaderFiles1").children().length;
			if(count_li >= '5'){
				$("#uploaderInput").css('display','none');
				$.toast("不能超过五张图片！", "cancel");
				return false;
			}
			$(files).each(function(index, obj) {
					imgPathArr.push(obj);
					// 通过这个 file 对象生成一个可用的图像 URL
					// 获取 window 的 URL 工具
					var URL = window.URL || window.webkitURL;
					// 通过 file 生成目标 url
					var imgURL = URL.createObjectURL(obj);
					// 用这个 URL 产生一个 <img> 将其显示出来
					var html = '';
					html += ' <li class="weui-uploader__file" id="fileshow">' +
						'  <img class="deletePicture" data="1"  src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
						'</li>';
					$("#uploaderFiles1").prepend(html);
					// 使用下面这句可以在内存中释放对此 url 的伺服，跑了之后那个 URL 就无效了
					// URL.revokeObjectURL(imgURL);
			});
			var url =HOST+'mobile.php?c=index&a=pic_partner';
			var formData = new FormData($( "#addBusinessImageForm" )[0]);
			formData.append('checkInfo',$( "#checkInfoAddImg").val());
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
					var message=eval('(' + result+ ')').message;
					if (eval('(' + result+ ')').statusCode=='0'){
						$.toast(message, "cancel");
						$(document).scrollTop(0);
					}
					if (eval('(' + result+ ')').statusCode=='1'){
						var html = '';
						html += ' <li class="weui-uploader__file" id="fileshow">' +
							'  <img class="deletePicture"  data-mainkey="'+result.data.id+'" data-userid="'+result.data.partner_id+'" src="../Public/img/delete-icon-picture.png"/><img src="'+HOST+thumb+'" class="fileshow thumb-img" />'+
							'</li>';
						$("#uploaderFiles1").prepend(html);
					}
				}
			});
		}
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
		formData.append('dotype','add');
		formData.append('checkInfo',$( "#checkInfo").val());
		formData.append('id',sessionUserId);
		if(!(/^1(3|4|5|7|8)\d{9}$/.test($("#mobile").val()))){
			getTips('手机号码有误，请重填！');
			$(document).scrollTop(0);
			return false;
		}
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
				var message=eval('(' + result+ ')').message;
				if (eval('(' + result+ ')').statusCode=='0'){
					getTips(message);
					$(document).scrollTop(0);
				}
				if (eval('(' + result+ ')').statusCode=='1'){
					setTimeout(function() {
						$.toast("操作成功");
						window.location.href='editBusinessInfo.php';
					}, 3000)
				}
			}
		});
	});
	$(document).on("click", ".deletePicture", function() {
		var url =HOST+'mobile.php?c=index&a=del_picture';
		$.showLoading('正在删除');
		setTimeout(function() {
			$.hideLoading();
		}, 3000)
		$.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:$("#checkInfoDelImg").val(),id:$(this).attr("data-mainkey"),partner_id:$(this).attr("data-userid")},
			dataType:'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode=='0'){
					$.toast("message", "cancel");
				}
				if (result.statusCode=='1'){
					$(this).parent().remove();
				}
			}
		});

	});
});
//自定义提醒方式
function getTips(message){
	$(".addbuin_title_info").html(message);
	$("#topTips").fadeIn("slow");
	setTimeout(function () {
		$("#topTips").fadeOut("slow");
	}, 3000)
}
</script>
</html>