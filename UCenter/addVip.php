<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-成为VIP</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../Public/css/weui.min.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
            <link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/addvip.css"/>
	<input value="<?php echo md5(date('Ymd')."vip_category"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."vip_recharge"."tuchuinet");?>"	type="hidden" id="checkInfoRecharge"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
	<script type="text/javascript">
		sessionUserId=$.session.get('userId');
			if(sessionUserId==null){
				//没有登陆
				$.toptip('您还没有登陆！',2000, 'error');
				window.location.href='../Login/login.php';
			}
			//已经登陆
			  //文本框失去焦点后
			   $('form :input').blur(function(){
			        //验证手机
			        if( $(this).is('#mobile') ){
			       	 if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){ 
			                $.toptip('手机号码有误，请重填！', 2000, 'warning');
			                return false; 
			            } 
			      }
			});
				//提取分类列表
				getVipList($("#checkInfo").val());
	</script>
</head>
<body >
<div id="vip-app">
			<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">VIP特权</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<div class="vip_box top">
		<div class="vip_box_logo">
			<img src="../Public/img/vip/vipTop.png" alt="">
		</div>
		<div  class="weui-flex menu_4">
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/resume.png" >
				<p>简历查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/supply.png" >
				<p>供求查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/zizhi.png" >
				<p>资质查阅</p>
			</div>
			<div class="weui-flex__item menu_4_box">
				<img src="../Public/img/vip/zhaobiao.png" >
				<p>招标查阅</p>
			</div>
		</div>
	</div>
	<div class="vip_box buy_box">
		<div class="weui-panel menu_order">
			<div class="weui-cell ">
				<div class="weui-cell__hd"><img src="../Public/img/vip/vip-icon.png" alt="" style="width:20px;margin-right:5px;display:block"></div>
				<div class="weui-cell__bd">
					<p>vip充值</p>
				</div>
			</div>
		</div>
		<div  class="weui-flex buy_vip" id="vip_category">
			<!-- <div class="weui-flex__item">
				<div class="menu_3_box">
					<img src="../Public/img/vip/vip-icon-1.png" >
					<div class="vip_money vip-category" >
					</div>
					<div class="vip_action">
						<img class="vip_action_img" src="../Public/img/vip/select.png" >
					</div>
				</div>
			</div> -->
			<div class="weui-flex__item packageCategory">
				<div class="menu_3_box">
					<img src="../Public/img/vip/vip-icon-1.png" >
					<div class="vip_money">
						<p class="vip_money_line1"><span id="price">100</span>元</p>
						<p class="vip_money_line2"><span id="count">120</span>次查询</p>
					</div>
				</div>
				<div class="vip_category_action">
						<img class="vip_category_action_img" src="../Public/img/vip/select.png" >
				</div>
			</div> 
		</div>
		<div class="input_vip">
			<input type="text" name="price-count" id="price-count"   placeholder="点击输入自定义金额,1元/次">
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
	<div class="vip_button">
		<a  class="weui-btn" id="btn-custom-theme">下一步</a>
	</div>
</div>
</body>
<script>

	$(function(){
		$('.zhifu-method').click(function(){
				 $(this).siblings().children(".vip_action").css("visibility","hidden");
		  		$(this).children(".vip_action").css("visibility","visible");  
		  		$(this).children(".menu_2_box").attr("id","selectMethod");  
		}); 
    	//套餐类型
		$(document).on("click", ".packageCategory", function() {
			 $(this).siblings().children(".vip_category_action").css("visibility","hidden");
	  		$(this).children(".vip_category_action").css("visibility","visible");  
	  		$(this).children(".menu_3_box").attr("id","selectClassId");  
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