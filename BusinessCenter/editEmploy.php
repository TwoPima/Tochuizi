<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>卖家中心-编辑招聘</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
	<link rel="stylesheet" href="../Public/css/common.css"/>
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/business.css"/>

<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<input value="<?php echo md5(date('Ymd')."recruit_cat"."tuchuinet");?>"	type="hidden" id="checkInfoRecruitCat"/>  
<!--招聘分类接口 -->
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>
	<input value="<?php echo md5(date('Ymd')."find_category"."tuchuinet");?>"	type="hidden" id="find_category"/>
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
	/* 招聘分类 */
	var getCat = $("#getRecruitCat");
	var getCatSub = $("#getRecruitCatSub");
	var getCatThere = $("#getRecruitCatThere");
	/* 城市区三级联动 */
	var dp1 = $("#dpProvince");
	var dp2 = $("#dpCity");
	var dp3 = $("#dpArea");
	//查询信息
	selectMyResumeInfo(sessionUserId,$("#checkInfo").val(),$("#recruit_id").val());//查询简历信息

	function selectMyResumeInfo(id,checkInfo,recruit_id){	 //查询
		var url =HOST+'mobile.php?c=index&a=recruit_job';
		$.ajax({
			type: 'post',
			url: url,
			data: {id:id,checkInfo:checkInfo,dotype:'gain',recruit_id:recruit_id},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
					window.location.href='./Login/login.php';
				}else{
					$('#title').attr("value",result.data.title);
					$('#mobile').attr("value",result.data.mobile);
					$('#intro').html(result.data.intro);
					$('#desc').html(result.data.desc);
					$('#contact').attr("value",result.data.contact);
					//下拉框
					if(eval('(' + result.data.job_year+ ')')!=null){
						$('#job_year').append('<option value="'+eval('(' + result.data.job_year+ ')').id+'" selected="selected">'+eval('(' + result.data.job_year+ ')').name+'</option>');
					}
					if(eval('(' + result.data.education+ ')')!=null){
						$('#education').append('<option value="'+eval('(' + result.data.education+ ')').id+'" selected="selected">'+eval('(' + result.data.education+ ')').name+'</option>');
					}
					if(eval('(' + result.data.wages+ ')')!=null){
						$('#wages').append('<option value="'+eval('(' + result.data.wages+ ')').id+'" selected="selected">'+eval('(' + result.data.wages+ ')').name+'</option>');
					}
				     var benefit=eval('(' + result.data.benefit+ ')');//获取到的checkbox 的值
				     if(benefit!==null){
				    	 $.each(benefit, function (index, obj) {
	                    	 $.each($("[name='benefit']:checkbox"), function (index, obj1) {
	                        	 console.log(obj1.value);
	                    		 if(obj.id==obj1.value){
	                        		 $("#"+obj1.id).prop('checked','true');
								}
	                    	 });
						}); 
				     }
                    
					//有效期
					valtime=eval('(' + result.data.valuetime+ ')');
					if(valtime!=null){
						$('#valuetime').append('<option value="'+eval('(' +valtime.id+ ')')+'" selected="selected">'+valtime.name+'</option>');
					}
					//职位类别
					if(result.data.cate_id!=null){
						//用三级id查询前面2级并显示出来 商品1 文章2 加盟商3 招聘4 5简历 6供求 7地区
						initialieSelectValue($("#find_category").val(),result.data.cate_id,4);
						getCatSub.fadeIn("slow");
						getCatThere.fadeIn("slow");
					}
					//招聘人数
					count=eval('(' + result.data.count+ ')');
					if(count!=null){
						$('#count').append('<option value="'+count.id+'" selected="selected">'+count.name+'</option>');
					}
					if(eval('(' + result.data.area+')')!=null){
						//用三级id查询前面2级并显示出来 商品1 文章2 加盟商3 招聘4 5简历 6供求 7地区
						initialieSelectValue($("#find_category").val(),eval('(' + result.data.area+')'),7);
						dp2.fadeIn("slow");
						dp3.fadeIn("slow");
					}

				}
			}
		});

	}
	//填充一级的数据
	getRecruitCat($("#checkInfoRecruitCat").val(), 0);
	//给二级绑定事件，触发事件后填充市的数据
	$(getCat).bind("change keyup", function () {
		var firstId = getCat.prop("value");
		getRecruitCatSub($("#checkInfoRecruitCat").val(), firstId);
		getCatSub.fadeIn("slow");
		$(".jobCategory-sub-line").fadeIn("slow");
	});
	//给三级绑定事件，触发事件后填充区的数据
	$(getCatSub).bind("change keyup", function () {
		var subId = getCatSub.prop("value");
		getRecruitCatThere($("#checkInfoRecruitCat").val(), subId);
		getCatThere.fadeIn("slow");
		$(".jobCategory-there-line").fadeIn("slow");
	});
	getEduction($("#checkInfoZidian").val());//学历
	getJobYear($("#checkInfoZidian").val());//工作年限
	getRecruitCountPeople($("#checkInfoZidian").val(),24);//招聘人数分类
	jobDayWages($("#checkInfoZidian").val());//薪资要求
	getBenefit($("#checkInfoZidian").val()); //福利
	jobValueTime($("#checkInfoZidian").val());//有效期
	//填充省的数据
	loadAreasProvince($("#checkInfoArea").val(), 0);
	//给省绑定事件，触发事件后填充市的数据
	jQuery(dp1).bind("change keyup", function () {
		var provinceID = dp1.prop("value");
		loadAreasCity($("#checkInfoArea").val(), provinceID);
		dp2.fadeIn("slow");
	});
	//给市绑定事件，触发事件后填充区的数据
	jQuery(dp2).bind("change keyup", function () {
		var cityID = dp2.prop("value");
		loadAreasDistrict($("#checkInfoArea").val(), cityID);
		dp3.fadeIn("slow");
	});
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
		 $("#btn-custom-theme").click(function() {
			 var formData = new FormData($( "#edit-employ-form" )[0]);
			 formData.append('id',sessionUserId);
			 formData.append('dotype','edit');
			 benefit = $("input:checkbox[name='benefit']:checked").map(function(index,elem) {
				 return $(elem).val();
			 }).get().join(',');//复选框处理
			 formData.append('benefit',benefit);
			 if(!(/^1(3|4|5|7|8)\d{9}$/.test($("#mobile").val()))){
				 $.toptip('手机号码有误，请重填！', 2000, 'warning');
				 return false;
			 }
			 $.showLoading('正在修改');
			 setTimeout(function() {
				 $.hideLoading();
			 }, 3000)
			 $.ajax({
				 type: "POST",
				 url:HOST+'mobile.php?c=index&a=recruit_job',
				 data: formData,
				 cache: false,
				 contentType: false,
				 processData: false,
				 async: false,
				 error: function(request) {
					 $.toast("添加失败，请检查网络后重试", "cancel");
				 },
				 success: function(result) {
					 var message=eval('(' + result+ ')').message;
					 if (eval('(' + result+ ')').statusCode=='0'){
						 $.toast(message, "cancel");
						 $(document).scrollTop(0);
					 }
					 if (eval('(' + result+ ')').statusCode=='1'){
						 $.toast(result.message);
						 setTimeout(function() {
		                        window.location.href='employ.php';
		                    }, 3000)
					 }
				 }
			 });
		 });
}); 
</script>
</head>
<body>
	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">编辑招聘</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<!--内容页面  -->
	<div id="addbuin-main clear">
		<div class="addbuin_form" >
			<form action=""  method="post"  id="edit-employ-form" enctype="multipart/form-data">
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<input class="weui-input" name="title" id="title"type="text" placeholder="职位名称" />
							</div>
						</div>
					 <div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label">职位类别</label></div>
					    <div class="weui_cell_bd weui_cell_primary custom-select">
					      <select class="jobCategory font14px" name="getRecruitCat" id="getRecruitCat">
					      </select>
					      <select class=" jobCategory font14px" name="getRecruitCatSub" id="getRecruitCatSub">
					      </select>
					      <select class=" jobCategory font14px" name="cate_id" id="getRecruitCatThere">
					      </select>
					    </div>
					  </div>
					  <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">最高学历</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="education"  id="education" >
                        </select>
                    </div>
                </div>
					<div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label font14px">工作年限</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="job_year"  id="job_year" >
                        </select>
                    </div>
                </div>
						<div class="weui-cell weui-cell_select weui-cell_select-after">
							<div class="weui-cell__hd">
								<label for="" class="weui-label">有效时间:</label>
							</div>
							<div class="weui-cell__bd">
								<select class="weui-select" name="valuetime" id="valuetime">
								</select>
							</div>
						</div>
					  <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label font14px">招聘人数</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="count"  id="count" >
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
					   <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label font14px">工资待遇</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="wages"  id="wages" >
                        </select>
                    </div>
                </div>
					  <div class="height1px"></div>
					 <div class="weui-cells weui-cells_checkbox" >
					     <div class="push_checkbox">
					     <div class="weui_cell_hd"><label class="weui_label jobPosition">职位福利</label></div>
		                    <div id="benefit">
		                    </div>
		                </div>
					</div>
					   <div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label">工作地区</label></div>
					    <div class="weui_cell_bd weui_cell_primary custom-select">
					      <select class="area" name="dpProvince" id="dpProvince">
					      </select>
					      <select class="area" name="dpCity" id="dpCity">
					      </select>
					      <select class=" area" name="area" id="dpArea">
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
				<input value="<?php echo $_GET['recruit_id'];?>" name="recruit_id" type="hidden" id="recruit_id"/>
				<input value="<?php echo md5(date('Ymd')."recruit_job"."tuchuinet");?>" name="checkInfo"	type="hidden" id="checkInfo"/>
			</form>
			<div class="addbuin_form_button">
				<a  id="btn-custom-theme" class="weui-btn weui-btn_warn">发&nbsp;&nbsp;&nbsp;&nbsp;布</a>
			</div>
		</div>
	</div>
</body>
</html>