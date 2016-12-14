<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-我的供求</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="../Public/css/weui.css">
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
     <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
   <link rel="stylesheet" href="../Public/css/center.css"/>
     <link rel="stylesheet" href="../Public/css/common.css"/>
</head>
<body >
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="index.php">
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的供求</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href="addMySupply.php"><span>发布供求</span></a>
                </div>
		</div>
		<!--内容页面  -->
		<div id="main">
				<div class="supply_count">
					<p class="float-left">
						<img src="../Public/img/supply/supply-icon.png">
						</p>
					<h2 class="supply_number float-left">512<span>个帖子</span></h2>
					<p class="supply-right float-right">
						被阅览<span class="supply_see_num">123441</span>次
					</p>
				</div>
		<div class="mySupply">
		<div class="weui_tab">
				  <div class="weui_navbar">
				    <a href="#all" class="weui_navbar_item weui_bar_item_on">全部
				    </a>
				    <a href="#supply" class="weui_navbar_item">供应
				    </a>
				    <a href="#need" class="weui_navbar_item">求购
				    </a>
				  </div>
			  <div class="weui_tab_bd">
			       <div class="weui_panel weui_panel_access">
					  <div class="weui_panel_bd">
					  <!--  <div class="weui_panel">
								  <div class="weui_panel_bd"> -->
			  				  <div id="all" class="weui_tab_bd_item weui_tab_bd_item_active">
			  					  <div class="weui_panel">
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
			  					  <div class="list-data">
								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
									      <div class="del-btn">删除</div>
								      </a>
								      </div>
								  </div>
								  </div>
								</div>
			 
			 					   <div id="supply" class="weui_tab_bd_item">
			 					     <div class="weui_panel">
			    						<a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
								      </a>
				 				   </div>
				 				   </div>
			    
			    				  <div id="need" class="weui_tab_bd_item">
			    				    <div class="weui_panel">
			   								    <a class="weui_panel_ft">
									    <div class="weui_media_box weui_media_text">
									      <p class="weui_media_desc">淘宝装修是亿次元科技的一项业务</p>
									      <ul class="weui_media_info">
									        <li class="weui_media_info_meta">昨天发布
									        </li>
									        <li class="weui_media_info_meta weui_media_info_meta_extra">查阅次数:&nbsp;&nbsp;<span>23434</span></li>
									      </ul>
									    </div>
								      </a>
								      </div>
			    </div>
			    
			  </div>
		    	</div>
			    </div>
				</div>
			</div>
</body>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/plugins/touchWipe/touchWipe.js"></script>
<script type="text/javascript">
/* vue 循环
<div class="bio-slide" v-for="item in items">   
    <img v-bind:src="item.image">
</div>
*/
</script>
</html>