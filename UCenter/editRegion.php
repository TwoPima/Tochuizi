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
<script src="../Public/js/city-picker.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<input value="<?php echo $_GET['adr_id'];?>"	type="hidden" id="adr_id"/>  
<script>
	$(function(){
		var  checkInfo = $("#checkInfo").val();
		var  adr_id = $("#adr_id").val();
			var url =HOST+'mobile.php?c=index&a=my_address';
			getAreaListProvice($("#checkInfoArea").val(),'0');//省级
		 $.ajax({
			type: 'post',
			url: url,
			data: {id:$.session.get('userId'),adr_id:adr_id,checkInfo:checkInfo,dotype:''},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					var is_yes=$("input[name=is_yes]:checked").html();
					var  checkInfo = $("#checkInfo").val();
					var  name = $("#name").val();
					var  adr_id = $("#adr_id").val();
					var  mobile = $("#mobile").val();
					var  area = $("#area").val();
					var  address = $("#address").val();
					var  code = $("#code").val();
				}
			}
		});
			//提交，最终验证。
		 $("#saveInfo").click(function() {
				var is_yes=$("input[name=is_yes]:checked").val();
				var  checkInfo = $("#checkInfo").val();
				var  name = $("#name").val();
				var  adr_id = $("#adr_id").val();
				var  mobile = $("#mobile").val();
				var  area = $("#area").val();
				var  address = $("#address").val();
				var  code = $("#code").val();
		       	var url =HOST+'mobile.php?c=index&a=my_address';
				 $.ajax({
					type: 'post',
					url: url,
					data: {id:$.session.get('userId'),adr_id:adr_id,name:name,address:address,area:area,mobile:mobile,code:code,is_yes:is_yes,checkInfo:checkInfo,dotype:'edit'},
					dataType: 'json',
					success: function (result) {
						var message=result.message;
						if (result.statusCode==='0'){
							$.toptip(message,2000, 'error');
						}else{
							$.toast(message);
							 setTimeout(window.location.href='region.php',8000)
							//window.location.href='addJobResume.php';
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
<!-- 			        <div class="weui_cell weui_cell_warn">
						</div>
 -->			    </div>
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
			    <div class="weui-cell">
			        <div class="weui-cell__hd">
			            <label class="weui-label">所在地区：</label>
			        </div>
			        <div class="weui-cell__bd">
			          <input class="weui-input" type="text" name="area" id='area' value="宁夏回族自治区 银川市 金凤区" >
			        </div>
			    </div>
				     <div class="weui-cell">
			        <div class="weui-cell__hd"><label class="weui-label">详细地址：</label></div>
			        <div class="weui-cell__bd">
			            <input class="weui-input" type="text" name="address" id="address" placeholder="输入详细地址"/>
			        </div>
			    </div>
			     <div class="weui-cell weui-cells_radio">
                       <div class="weui-cell__hd"><label class="weui-label">默认</label></div>
                           <div class="weui-cell__bd sex">
                               	<p class="float-left"><span>否</span>&nbsp;&nbsp;&nbsp;<input type="radio"  value="0" name="is_yes" id="is_yes"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                               	<p class=""><span>是</span>&nbsp;&nbsp;&nbsp;<input type="radio" name="is_yes" value="1" id="is_yes" checked='checked' ></p>
                           </div>
                   </div>
			</div>
			</div>
			<!-- 12 -->
			<div class="weui-picker-container">
				<div class="weui-picker-modal picker-columns city-picker weui-picker-modal-visible">
				<div class="toolbar">
			          <div class="toolbar-inner">          
			          	 <a href="javascript:;" class="picker-button close-picker">完成</a> 
			             <h1 class="title">请选择收货地址</h1> 
			          </div> 
				     </div>
				     <div class="picker-modal-inner picker-items">
				    	 <div class="picker-items-col  col-province">
				    	 <div class="picker-items-col-wrapper">
    				    	 <div class="picker-item" data-picker-value="640105">西夏区</div>
				     	</div>
				     	</div>
				     	<div class="picker-items-col  col-city">
    				     	<div class="picker-items-col-wrapper" style="transform: translate3d(0px, 92px, 0px); transition-duration: 0ms;">
    				     	<div class="picker-item picker-selected" data-picker-value="640100">银川市</div>
    				     	<div class="picker-item" data-picker-value="640200">石嘴山市</div>
    				     	</div>
				     	</div>
				     	<div class="picker-items-col  col-district">
    				     	<div class="picker-items-col-wrapper" style="transform: translate3d(0px, 28px, 0px); transition-duration: 0ms;">
    				     	<div class="picker-item" data-picker-value="640104">兴庆区</div>
    				     	<div class="picker-item" data-picker-value="640105">西夏区</div>
    				     	<div class="picker-item picker-selected" data-picker-value="640106">金凤区</div>
    				     	<div class="picker-item" data-picker-value="640121">永宁县</div>
    				     	<div class="picker-item" data-picker-value="640122">贺兰县</div>
    				     	<div class="picker-item" data-picker-value="640181">灵武市</div>
    				     	</div>
				     	</div>
			<!-- 12 -->
	</div><!--main-->
</div><!--app-->
</body>
<script>

	$("#adr_id").click(function(){
		$(".weui-picker-container").show();			
		});
</script>
</html>