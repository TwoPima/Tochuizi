<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>卖家中心-发布招聘</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/business.css"/>
</head>
<body>
	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">发布招聘</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<!--内容页面  -->
	<div id="addbuin-main clear">
		<div class="addbuin_form" >
			<form action="">
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<input class="weui-input" type="text" placeholder="职位名称" />
							</div>
						</div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">请选择职位类别</option>
					        <option  value="1">技工</option>
					        <option value="2">木工</option>
					        <option value="3">家装木工</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">学历要求</option>
					        <option value="1">高中</option>
					        <option value="2">大学本科</option>
					        <option value="3">本科以上</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">工作年限</option>
					        <option value="1">高中</option>
					        <option value="2">大学本科</option>
					        <option value="3">本科以上</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">招聘人数</option>
					        <option value="1">高中</option>
					        <option value="2">大学本科</option>
					        <option value="3">本科以上</option>
					      </select>
					    </div>
					  </div>
						<div class="weui_cells weui_cells_form">
						  <div class="weui_cell">
						    <div class="weui_cell_bd weui_cell_primary">
						      <textarea class="weui_textarea" placeholder="填写任职要求" rows="3"></textarea>
						      <div class="weui_textarea_counter"><span>0</span>/200</div>
						    </div>
						  </div>
						</div>
						<div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">选择工资待遇</option>
					        <option value="1">高中</option>
					        <option value="2">大学本科</option>
					        <option value="3">本科以上</option>
					      </select>
					    </div>
					  </div>
					  <div class="weui-cells weui-cells_checkbox">
					     <div class="push_checkbox">
					     <div class="weui_cell_hd"><label class="weui_label jobPosition">职位福利</label></div>
		                    <div class="daiyu_checkbox">
		                        <label for="one">包食宿</label>
		                        <input type="checkbox" name="" id="one">
		                    </div>
		                    <div class="daiyu_checkbox">
		                        <label for="two">工资月结</label>
		                        <input type="checkbox" name="" id="two">
		                    </div>
		                    <div class="daiyu_checkbox">
		                        <label for="three">五险一金</label>
		                        <input type="checkbox" name="" id="three">
		                    </div>
		                </div>
					</div>
						<div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="select1">
					        <option selected="" value="0">选择工作地区</option>
					        <option value="1">高中</option>
					        <option value="2">大学本科</option>
					        <option value="3">本科以上</option>
					      </select>
					    </div>
					  </div>
					   <div class="weui_cell">
						    <div class="weui_cell_hd"><label class="weui_label">联系电话</label></div>
						    <div class="weui_cell_bd weui_cell_primary">
						      <input class="weui_input" type="tel" placeholder="请输入联系电话">
						    </div>
						  </div>
					   <div class="weui_cell">
						    <div class="weui_cell_hd"><label class="weui_label">联系人</label></div>
						    <div class="weui_cell_bd weui_cell_primary">
						      <input class="weui_input" type="text" placeholder="请输入联系人">
						    </div>
						  </div>
					<div class="weui_cells weui_cells_form">
						  <div class="weui_cell">
						    <div class="weui_cell_bd weui_cell_primary">
						      <textarea class="weui_textarea" placeholder="介绍项目(可选)" rows="3"></textarea>
						      <div class="weui_textarea_counter"><span>0</span>/200</div>
						    </div>
						  </div>
						</div>
							<p class="box-in"></p>
					</div>
				</div>
			</form>
			<div class="addbuin_form_button">
				<a href="addBusinessInfo.html"  id="btn-custom-theme" class="weui-btn weui-btn_warn">发&nbsp;&nbsp;&nbsp;&nbsp;布</a>
			</div>
		</div>
	</div>
</body>
 <script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
</html>