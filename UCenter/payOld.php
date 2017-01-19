<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-订单中心</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
        	<link rel="stylesheet" href="../Public/css/addvip.css"/>
</head>
<body >
	<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">提交订单</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
		<div id="submitOrder">
			<div class="order-content">
				<div class="weui_cells">
				
				  <div class="weui_cell">
				    <div class="weui_cell_bd weui_cell_primary">
				      <p>银川兴庆区海上国际3吨</p>
				    </div>
				    <div class="weui_cell_ft">
				 	     <span class="price"><span id="key">￥1200</span><span id="val">x1</span></span>
				 	     <span  class="freight"><span id="key">运费</span><span id="val">￥10</span></span>
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_bd weui_cell_primary">
				      <p>银川兴庆区海上国际3吨</p>
				    </div>
				    <div class="weui_cell_ft">
				 	     <span class="price"><span id="key">￥1200</span><span id="val">x1</span></span>
				 	     <span  class="freight"><span id="key">运费</span><span id="val">￥10</span></span>
				    </div>
				  </div>
				  <div class="weui_cell">
				    <div class="weui_cell_bd weui_cell_primary">
				      <p>银川兴庆区海上国际3吨</p>
				    </div>
				    <div class="weui_cell_ft">
				 	     <span class="price"><span id="key">￥1200</span><span id="val">x1</span></span>
				 	     <span  class="freight"><span id="key">运费</span><span id="val">￥10</span></span>
				    </div>
				  </div>
				    <div class="weui_panel_ft count"><span class="key float-left">合计支付</span><span class="val float-right">￥2333.00</span></div>
				</div>
			</div>
				<div class="vip_box ">
		<div class="weui-panel menu_order">
			<div class="weui-cell ">
				<div class="weui-cell__hd"><img src="../Public/img/vip/vip009.jpg" alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui-cell__bd">
					<p>选择支付方式</p>
				</div>
			</div>
		</div>
		<div  class="weui-flex zhifu_vip">

			<div class="weui-flex__item zhifu-method" >
				<div class="menu_2_box" >
					<img src="../Public/img/vip/zhifubao.png" >
					<div class="vip_money" id="weixin" value="2">
						<p class="vip_money_line1" >支付宝</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
			<div class="weui-flex__item zhifu-method" >
				<div class="menu_2_box">
					<img src="../Public/img/vip/weixin.png" >
					<div class="vip_money"  id="weixin" value="1">
						<p class="vip_money_line1"  >微信支付</p>
					</div>
				</div>
				<div class="vip_action">
					<img class="vip_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div>
		</div>
	</div>
			<div class="height20px"></div>
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default "id="btn-custom-theme">提&nbsp;&nbsp;&nbsp;&nbsp;交</a>
            </div>
		</div>
	</div>
</body>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script type="text/javascript">
$(function(){
	$('.zhifu-method').click(function(){
			 $(this).siblings().children(".vip_action").css("visibility","hidden");
	  		$(this).children(".vip_action").css("visibility","visible");  
	  		$(this).children(".menu_2_box").attr("id","selectMethod");  
	}); 
	//提交，最终验证。
	$("#btn-custom-theme").click(function() {
			var method=$("#selectMethod").children(".vip_money").attr("value");//支付方式
			var class_id=$("#selectClassId").children(".vip_money").attr("value");//套餐类别
			var checkInfoRecharge = $("#checkInfoRecharge").val();
		/*	if ($("#price-count").val()&&$("#price-count").val()){
				$.toast("自定义支付和选择套餐只能选择一个！", "cancel");
			}
			if($("#price-count").val()!==null){
				price=$("#price-count").val();
			}
			if($("#price-count").val()!==null){
				price=$("#price-count").val();
			}*/
			var price = $("#price-count").val();
			var vip_count = $("#price-count").val();//充值次数
			var url =HOST+'mobile.php?c=index&a=vip_recharge';
	       if(method==""|| class_id==""){
	    	  	 $.toast("支付方式和套餐均不能为空！", "cancel");
	      	    return false; 
	      	 }
	       $.ajax({
				type: 'post',
				url: url,
				data: {
    				checkInfo:checkInfoRecharge,price:price,vip_count:vip_count,
    				id:sessionUserId,method:method,class_id:class_id},
				dataType: 'json',
				success: function (result) {
    				
				}
		  }); 
	});
});

</script>
</html>