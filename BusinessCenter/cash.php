<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>卖家中心-提现管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/css/business.css"/>
</head>
<body >
<div id="app">
 		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">结算</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
		<div class="cash clear">
		<div class="weui_panel">
		  <div class="weui_panel_bd">
		    <div class="weui_media_box weui_media_small_appmsg">
		      <div class="weui_cells weui_cells_access">
		          <div class="weui_cell_hd float-left">
		          	<i class="icon iconfont icon-shangchengxitongtubiaozitihuayuanwenjian62-copy"></i>
		          </div>
		          <div class="weui_cell_bd weui_cell_primary float-left">
		            <p class="float-left"><span id="price">5000.00</span>元</p>
		            <p class="clear">待提现</p>
		          </div>
		          <span class="float-right">
			          	<a class="weui_btn weui_btn_mini weui_btn_default" href="cashSubmit.php"> 
			          		提&nbsp;&nbsp;现
			          	</a>
		          </span>
		      </div>
		    </div>
		  </div>
		</div>
		</div>
		<div class="jieSuanStatus">
		<div class="weui_panel weui_panel_access">
		  <div class="weui_panel_hd"><h3>待结算（担保交易）</h3></div>
			  <div class="weui_panel_bd">
			    <div class="weui_media_box weui_media_text jieSuan-left float-left">
			      <h4 class="weui_media_title">挖掘机租用</h4>
			      <p class="weui_media_desc">订单号：<span id="orderNum">1231232</span></p>
			      <p class="weui_media_desc">订单日期：<span id="orderDate">2016-11-25</span></p>
			      <p class="weui_media_desc">订单状态：<span id="orderStatus">已经发货</span></p>
			    </div>
			    <div class="weui_media_text jieSuan-right float-right">
			    	<p><span>+100</span>元</p>
			    </div>
		  	</div>
		  	</div>
		</div>
	</div>
</body>
  <script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script>
 	

</script>
</html>