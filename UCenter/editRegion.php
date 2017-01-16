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
	<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>

<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<input value="<?php echo $_GET['adr_id'];?>"	type="hidden" id="adr_id"/>
	<input value="<?php echo md5(date('Ymd')."find_category"."tuchuinet");?>"	type="hidden" id="find_category"/>
<script>
	$(function(){
		var  checkInfo = $("#checkInfo").val();
		var  adr_id = $("#adr_id").val();
		 $.ajax({
			type: 'post',
			url: HOST+'mobile.php?c=index&a=my_address',
			data: {id:$.session.get('userId'),adr_id:adr_id,checkInfo:checkInfo,dotype:'gain'},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					$('#address').attr("value",result.data.address);
					$('#name').attr("value",result.data.name);
					$('#mobile').attr("value",result.data.mobile);
					$('#code').attr("value",result.data.code);
					//单选
					if(result.data.is_yes=='1'){
						$(":radio[name=is_yes][value=1]").prop("checked","true");//指定value的选项为选中项
					}
					//下拉框
					if(eval('(' + result.data.area+')')!=null){
						//用三级id查询前面2级并显示出来 商品1 文章2 加盟商3 招聘4 5简历 6供求 7地区
						initialieSelectValue($("#find_category").val(),eval('(' + result.data.area+')'),7);
						dpCity.fadeIn("slow");
						dpArea.fadeIn("slow");
					}
				}
			}
		});
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
			//提交，最终验证。
		 $("#saveInfo").click(function() {
				var is_yes=$("input[name=is_yes]:checked").val();
				var  checkInfo = $("#checkInfo").val();
				var  name = $("#name").val();
				var  adr_id = $("#adr_id").val();
				var  mobile = $("#mobile").val();
			    var area=$('#dpArea option:selected').val();
				var  address = $("#address").val();
				var  code = $("#code").val();
				 if(!(/^1(3|4|5|7|8)\d{9}$/.test($("#mobile").val()))){
					 $.toptip('手机号码有误，请重填！', 2000, 'warning');
					 return false;
				 }
		       	var url =HOST+'mobile.php?c=index&a=my_address';
				 $.ajax({
					type: 'post',
					url: url,
					data: {
						id:$.session.get('userId'),adr_id:adr_id,name:name,
						address:address,area:area,
						mobile:mobile,code:code,is_yes:is_yes,checkInfo:checkInfo,dotype:'edit'},
					dataType: 'json',
					success: function (result) {
						var message=result.message;
						if (result.statusCode=='0'){
							$.toast(message);
						}
						if (result.statusCode=='1'){
							setTimeout(window.location.href='region.php',8000)
						}
					}
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
	                  	    <span class="title">编辑地址</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a id="saveInfo"><span>保存</span></a>
                </div>
		</div>
	<div id="main clear">
		<div class="page addRegion">
			<div class="weui-cells weui-cells_form region-form">
			    <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">联系人姓名：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" name="name" id="name" placeholder=""/>
			        </div>
 			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">手机号码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="tel" name="mobile" id="mobile" placeholder="请输入手机号">
			        </div>
			    </div>
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">邮政编码：</label>
			        </div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text"  name="code" id="code" placeholder="请输入邮政编码">
			        </div>
			    </div>
				<div class="weui_cell weui-cell_select weui-cell_select-after">
					<div class="weui_cell_hd"><label class="weui_label font14px">收货地区</label></div>
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
					<div class="weui-cell__hd"><label class="weui-label ">详细地址：</label></div>
					<div class="weui-cell__bd">
						<input class="weui-input" type="text" name="address" id="address" placeholder="输入详细地址"/>
					</div>
				</div>
				<div class="weui-cell weui-cells_radio">
					<div class="weui-cell__hd"><label class="weui-label font14px">默认</label></div>
					<div class="weui-cell__bd sex">
						<p class="float-left font14px "><span>否</span>&nbsp;&nbsp;&nbsp;<input type="radio" checked='checked'  value="0" name="is_yes" id="is_yes"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
						<p class="font14px"><span>是</span>&nbsp;&nbsp;&nbsp;<input type="radio" name="is_yes" value="1" id="is_yes"  ></p>
					</div>
				</div>
			</div>
	</div><!--main-->
</div><!--app-->
</body>
</html>