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
	<input value="<?php echo md5(date('Ymd')."recruit_job"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<input value="<?php echo md5(date('Ymd')."recruit_cat"."tuchuinet");?>"	type="hidden" id="checkInfoRecruitCat"/>  
<!--招聘分类接口 -->
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
 <script src="../Public/js/jquery-weui.min.js"></script>
 <script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		window.location.href='../Login/login.php';
	}
	//已经登陆
	//写入基本信息
	$("#memberType").html($.session.get('typeMember'));
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
	//JobType($("#checkInfoJobType").val(),memberTypeCateId);//工种类别
	getEduction($("#checkInfoZidian").val());//学历
	getRecruitCat($("#checkInfoRecruitCat").val(),0);//招聘分类 三级
	getRecruitCountCat($("#checkInfoRecruitCat").val(),0);//招聘人数分类
	jobDayWages($("#checkInfoZidian").val());//薪资要求
});
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex=$("input[name='sex']:checked").val();
		var name = $("#name").val();
		var mobile = $("#mobile").val();
		var desc = $("#desc").val();
		var home = $("#home").val();
		var birthday = $("#birthday").val();
		var cate_id=$('#job_type option:selected').val();
		var education=$('#education option:selected').val();
		var job_year = $("#job_year").val();
		var checkInfo = $("#checkInfo").val();
       	var url =HOST+'mobile.php?c=index&a=my_resume';
        if(mobile==""|| name==""){
       		$.toptip('手机号姓名均不能为空！', 200, 'warning');
       	    return false; 
       	 }
		 $.ajax({
			type: 'post',
			url: url,
			data: {mobile:mobile,cate_id:cate_id,recruit_id:recruit_id,education:education,job_year:job_year,id:sessionUserId,dotype:'edit',desc:desc,home:home,birthday:birthday,name:name,checkInfo:checkInfo,sex:sex},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toast(message, "cancel");
				}else{
					//$.toast("操作成功");
					//window.location.href='myJob.php';
				}
			},
		});
});
</script>
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
								<input class="weui-input" name="title" id="title"type="text" placeholder="职位名称" />
							</div>
						</div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="cate_id" id="cate_id">
					        <option selected="" value="0">请选择职位类别</option>
					        <option  value="1">技工</option>
					        <option value="2">木工</option>
					        <option value="3">家装木工</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="education" id="education">
					        <option selected="" value="0">学历要求</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="job_year">
					        <option selected="" value="0">工作年限</option>
					      </select>
					    </div>
					  </div>
					 <div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="count" id="count">
					        <option selected="" value="0">招聘人数</option>
					      </select>
					    </div>
					  </div>
						<div class="weui_cells weui_cells_form">
						  <div class="weui_cell">
						    <div class="weui_cell_bd weui_cell_primary">
						      <textarea class="weui_textarea" name="desc" id="desc"  placeholder="填写任职要求" rows="3"></textarea>
						     <!--  <div class="weui_textarea_counter"><span>0</span>/200</div> -->
						    </div>
						  </div>
						</div>
						<div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="wages" id="wages">
					        <option selected="" value="0">选择工资待遇</option>
					      </select>
					    </div>
					  </div>
					<!-- <div class="weui-cells weui-cells_checkbox">
					     <div class="push_checkbox">
					     <div class="weui_cell_hd"><label class="weui_label jobPosition">职位福利</label></div>
		                    <div id="benefit">
		                    <!-- <div class="daiyu_checkbox">
		                        <label for="one">包食宿</label>
		                        <input type="checkbox" name="benefit" id="one">
		                    </div> 
		                    </div>
		                </div>
					</div> -->
					<div class="weui-cells weui-cells_checkbox" id="benefit">
                </div>
						<div class="weui_cell weui_cell_select">
					    <div class="weui_cell_bd weui_cell_primary">
					      <select class="weui_select" name="area" id="area">
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
						      <input class="weui_input" type="tel" name="mobile" id="mobile"placeholder="请输入联系电话">
						    </div>
						  </div>
					   <div class="weui_cell">
						    <div class="weui_cell_hd"><label class="weui_label">联系人</label></div>
						    <div class="weui_cell_bd weui_cell_primary">
						      <input class="weui_input" type="text"name="contact" id="contact" placeholder="请输入联系人">
						    </div>
						  </div>
					<div class="weui_cells weui_cells_form">
						  <div class="weui_cell">
						    <div class="weui_cell_bd weui_cell_primary">
						      <textarea class="weui_textarea" placeholder="介绍项目(可选)" rows="3" name="intro" id="intro"></textarea>
						    </div>
						  </div>
						</div>
							<p class="box-in"></p>
					</div>
				</div>
			</form>
			<div class="addbuin_form_button">
				<a  id="btn-custom-theme" class="weui-btn weui-btn_warn">发&nbsp;&nbsp;&nbsp;&nbsp;布</a>
			</div>
		</div>
	</div>
</body>
</html>