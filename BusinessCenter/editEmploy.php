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
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/business.css"/>
	<input value="<?php echo md5(date('Ymd')."recruit_job"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<input value="<?php echo md5(date('Ymd')."recruit_cat"."tuchuinet");?>"	type="hidden" id="checkInfoRecruitCat"/>  
<!--招聘分类接口 -->
<input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>  
<input value="<?php echo $_GET['recruit_id'];?>"	type="hidden" id="recruit_id"/>
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
	//查询信息
	selectMyResumeInfo(sessionUserId,$("#checkInfo").val(),$("#recruit_id").val());//查询简历信息
	function selectMyResumeInfo(id,checkInfo){	 //查询
		var url =HOST+'mobile.php?c=index&a=my_resume';
		$.ajax({
			type: 'post',
			url: url,
			data: {id:sessionUserId,checkInfo:checkInfo,dotype:'gain'},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
					window.location.href='./Login/login.php';
				}else{
					$('#name').attr("value",result.data.name);

					$('#zu').attr("value",result.data.zu);
					$('#Resumeid').attr("value",result.data.id);
					$('#mobile').attr("value",result.data.mobile);
					$('#desc').attr("value",result.data.desc);
					$('#home').attr("value",result.data.home);
					$('#birthday').attr("value",result.data.birthday);
					$('#email').attr("value",result.data.email);
					$(result.data.img_url).each(function(index, obj) {
						var html = '';
						html += ' <li class="weui-uploader__file" id="fileshow">' +
							'  <img class="deletePicture" data="'+obj.image_id+'"  src="../Public/img/delete-icon-picture.png"/><img src="'+HOST+obj.image_url+'" class="fileshow thumb-img" />'+
							'</li>';
						$("#uploaderFiles").prepend(html);
					});
					//单选
					if(result.data.sex=='1'){
						$(":radio[name=sex][value=1]").prop("checked","true");//指定value的选项为选中项
					}
					if(result.data.sex=='0'){
						$(":radio[name=sex][value=0]").prop("checked","true");//指定value的选项为选中项
					}
					if(result.data.she_type=='1'){
						$(":radio[name=she_type][value=1]").prop("checked","true");//指定value的选项为选中项
					}
					if(result.data.she_type=='0'){
						$(":radio[name=she_type][value=0]").prop("checked","true");//指定value的选项为选中项
					}
					//下拉框
					if(eval('(' + result.data.job_year+ ')')!=null){
						$('#job_year').append('<option value="'+eval('(' + result.data.job_year+ ')').id+'" selected="selected">'+eval('(' + result.data.job_year+ ')').name+'</option>');
					}
					if(eval('(' + result.data.education+ ')')!=null){
						$('#education').append('<option value="'+eval('(' + result.data.education+ ')').id+'" selected="selected">'+eval('(' + result.data.education+ ')').name+'</option>');
					}
					if(eval('(' + result.data.wage+ ')')!=null){
						$('#wage').append('<option value="'+eval('(' + result.data.wage+ ')').id+'" selected="selected">'+eval('(' + result.data.wage+ ')').name+'</option>');
					}
					if(eval('(' + result.data.job_type+ ')')!=null){
						$('#job_type').append('<option value="'+result.data.cate_id.cate_id+'" selected="selected">'+result.data.cate_id.cate_name+'</option>');
					}
					if(eval('(' + result.data.area+')')!=null){
						//用三级id查询前面2级并显示出来 商品1 文章2 加盟商3 招聘4 5简历 6供求 7地区
						initialieSelectValue($("#find_category").val(),eval('(' + result.data.area+')'),7);
						dpCity.fadeIn("slow");
						dpArea.fadeIn("slow");
					}

				}
			}
		});

	}
	//初始化数据库的值 cate_id三级id
	function  initialieSelectValue(checkInfo,cate_id,moudle){
		$.ajax({
			type: 'post',
			url: HOST+'mobile.php?c=allcategory&a=find_category',
			data: {checkInfo:checkInfo,moudle:moudle,cate_id:cate_id},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode=='0'){
					//当前位置定位信息发过去

				}else{
					//数据取回成功
					dataJson=eval('(' + result.data+')');
					var proviceHtml='<option selected="selected" value="'+dataJson.top.id+'">'+dataJson.top.name+'</option>';
					var cityHtml='<option selected="selected" value="'+dataJson.two.id+'">'+dataJson.two.name+'</option>';
					var areaHtml='<option selected="selected" value="'+dataJson.id+'">'+dataJson.name+'</option>';
					$('#dpProvince').append(proviceHtml);
					$('#dpCity').append(cityHtml);
					$('#dpArea').append(areaHtml);
				}
			}
		});
	}
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
	 //提交，最终验证。
	 $("#btn-custom-theme").click(function() {
			var title = $("#title").val();
			var mobile = $("#mobile").val();
			var desc = $("#desc").val();
			var home = $("#home").val();
			var birthday = $("#birthday").val();
			var cate_id=$('#job_type option:selected').val();
			var education=$('#education option:selected').val();
			var job_year = $("#job_year").val();
			var checkInfo = $("#checkInfo").val();
	       	var url =HOST+'mobile.php?c=index&a=recruit_job';
	       	benefitArr=[];
	       	benefit=$("input[name=benefit]").val();
   			$.each(benefit,function(index,obj){
   				 benefitArr.push(obj);
   			});
   			console.log(benefitArr);
	        if(mobile==""|| name==""){
	       		$.toptip('手机号姓名均不能为空！', 200, 'warning');
	       	    return false; 
	       	 }
			 $.ajax({
				type: 'post',
				url: url,
				data: {
					mobile:mobile,cate_id:cate_id,recruit_id:recruit_id,education:education,
					job_year:job_year,id:sessionUserId,dotype:'edit',desc:desc,home:home,birthday:birthday,
					name:name,checkInfo:checkInfo,sex:sex
					},
				dataType: 'json',
				success: function (result) {
					var message=result.message;
					if (result.statusCode==='0'){
						$.toast(message, "cancel");
					}else{
						//$.toast("操作成功");
						//window.location.href='myJob.php';
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
	                  	    <span class="title">发布招聘</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
	<!--内容页面  -->
	<div id="addbuin-main clear">
		<div class="addbuin_form" >
			<form action=""  method="post"  enctype="multipart/form-data">
				<div class="addbuin_form_jichu">
					<div class="weui-cells weui-cells_form">
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<input class="weui-input" name="title" id="title"type="text" placeholder="职位名称" />
							</div>
						</div>
					 <div class="weui_cell">
					    <div class="weui_cell_hd"><label class="weui_label">职位类别</label></div>
					    <div class="weui_cell_bd weui_cell_primary">
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
                        <select class="weui-select" name="wage"  id="wage" >
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
					    <div class="weui_cell_bd weui_cell_primary">
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
			</form>
			<div class="addbuin_form_button">
				<a  id="btn-custom-theme" class="weui-btn weui-btn_warn">发&nbsp;&nbsp;&nbsp;&nbsp;布</a>
			</div>
		</div>
	</div>
</body>
<script>
$(function(){
	/* 招聘分类 */
	var getCat = $("#getRecruitCat"); 
	var getCatSub = $("#getRecruitCatSub"); 
	var getCatThere = $("#getRecruitCatThere"); 
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
	/* 城市区三级联动 */
		 var dp1 = $("#dpProvince"); 
		var dp2 = $("#dpCity"); 
		var dp3 = $("#dpArea"); 
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
});
</script>
</html>