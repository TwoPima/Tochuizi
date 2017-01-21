<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-订单中心</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <link rel="stylesheet" href="../Public/css/center.css"/>
        	<link rel="stylesheet" href="../Public/css/addvip.css"/>
</head>
<body>
	<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">选择支付方式</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
		<div id="submitOrder">

				<div class="vip_box ">

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
			<form  name=alipayment action='' method=post target="_blank">
				<input type="hidden" name="returnUrl" id="returnUrl" value="">
				<input type="hidden" name="orderId" id="orderId" value="">
				<input type="hidden" name="payType" id="payType" value="">
				<input type="hidden" name="openid" id="openid" value="">
				<input type="hidden" name="orderType" id="orderType" value="">

				<div class="height20px"></div>
				<div class="button-sp-area">
					<a href="javascript:;" class="weui-btn weui-btn_plain-default "id="btn-custom-theme">提&nbsp;&nbsp;&nbsp;&nbsp;交</a>
				</div>
			</form>
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
/*
* <form id="payForm" action="http://zszypay.91lds.com/zszy-pay/trade/payApply" method="post">
 <input type="hidden" name="returnUrl" id="returnUrl" value="">
 <input type="hidden" name="orderId" id="orderId" value="">
 <input type="hidden" name="payType" id="payType" value="">
 <input type="hidden" name="openid" id="openid" value="">
 <input type="hidden" name="orderType" id="orderType" value="">
 </form>


 //支付宝
 function aliPay(orderId, orderType) {
 $("#orderId").val(orderId);
 $("#payType").val("3"); //支付宝wap支付    //   3   支付类型
 $("#openid").val("");
 $("#orderType").val(orderType); //支付
 $("#payForm").submit();
 }
 //微信
 function wxPay(orderId, orderType) {
 var openid = $.cookie('openid');
 if(openid == null || openid == "" || openid == undefined || openid == "null") {
 var href = document.location.href;
 var strs = href.substring(href.lastIndexOf("/") + 1, href.length);
 window.location.href='http://blog.163.com/w_yue1314/blog/index.html?' + strs;
 }
 $("#orderId").val(orderId);
 $("#payType").val("1"); //微信wap支付
 $("#openid").val(openid);
 $("#orderType").val(orderType); //支付
 $("#payForm").submit();
 }*/
</script>
</html>