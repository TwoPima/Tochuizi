/*******
 * 公共js
 * author:马晓成@亿次元科技
 * email:857773627@qq.com
 * ******/
//vip分类获取接口
function getVipList(checkInfo){
	 var urlVip= HOST+'mobile.php?c=index&a=vip_category';
	 $.ajax({
		   type: "POST",
		   url: urlVip,
		   data: {checkInfo:checkInfo},
		   dataType:"json",
		   success: function(result){
			 if (0 == result.status) {
				return false;
			 }else{
				 $.each(result.data, function (index, obj) {
					 var vipCategoryHtml='<div class="weui-flex__item packageCategory"><div class="menu_3_box"><img src="../Public/img/vip/vip-icon-1.png" ><div class="vip_money" value="'+obj.id+'"><p class_id="'+obj.id+'" name="'+obj.name+'" count="'+obj.count+'" price="'+obj.price+'" class="vip_money_line1">'+obj.name+'<p><p class="vip_money_line2">'+obj.count+'次查询</p></div></div><div class="vip_category_action"><img class="vip_category_action_img" src="../Public/img/vip/select.png" ></div></div>';
						$('#vip_category').append(vipCategoryHtml);
		            });
				return false;
			 }
		   }
		}); 
}

//获得省级
	function loadAreasProvince(checkInfo, pid) {
		var urlArea= HOST+'mobile.php?c=index&a=get_area';
		jQuery.ajax({
			type: "POST",
			url: urlArea,
			data: {checkInfo:checkInfo,pid:pid},
			dataType:"json",
			success: function(result){
				if(result.statusCode==0){
					var provinceHtml='<option  value="" selected="selected">无数据</option>';
					$('#dpProvince').append(provinceHtml);
				}
				if(result.statusCode==1){
					var currentAreaId = $("#dpArea").find("option:selected").val();//从数据库中查询出来的
					//有数据的时候去取值
					$.each(result.data, function (index, obj) {
						var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
						$('#dpProvince').append(proviceHtml);
					});
					if (typeof(currentAreaId)=="undefined"||currentAreaId==null){
						
						var data=JSON.parse(sessionStorage.getItem('key_area'));
						if(data==null||data==undefined){
							//定位失败
							var cityHtml='<option  value="" selected="selected">请选择</option>';
							var provinceHtml='<option  value="" selected="selected">请选择</option>';
						}else{
							//定位成功 有数据
							  loadAreasCity($("#checkInfoArea").val(), data.province.id); //加载市
							  loadAreasDistrict($("#checkInfoArea").val(), data.city.id); //加载区
							  $("#dpProvince").find("option").each(function(){
								  //选出当前的值
								  	var optionId = $(this).val();     
							         if( optionId == data.province.id ) {
							        	 $("#dpProvince").val(optionId);
							         }else {
										var provinceHtml='<option selected="selected" value="'+data.province.id+'">'+data.province.name+'</option>';
							         }
							  });
							  $("#dpCity").find("option").each(function(){
								  var optionCityId = $(this).val();     
								  if( optionCityId == data.city.id ) {
									  $("#dpProvince").val(optionCityId);
								  }else {
									  var cityHtml='<option selected="selected" value="'+data.city.id+'">'+data.city.name+'</option>';
								  }
							  });
							  $("#dpCity").fadeIn('show');
							  $("#dpArea").fadeIn("slow");
						}
						$('#dpProvince').append(provinceHtml);
						$('#dpCity').append(cityHtml);
					}
				
				}
				
			}
		});
	}
//获得市级
	function loadAreasCity(checkInfo, pid) {
		var urlArea= HOST+'mobile.php?c=index&a=get_area';
		jQuery.ajax({
			type: "POST",
			url: urlArea,
			data: {checkInfo:checkInfo,pid:pid},
			dataType:"json",
			success: function(result){
				//$('#dpCity').append("<option value='' selected='selected'>请选择</option>");
				$.each(result.data, function (index, obj) {
					var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
					$('#dpCity').append(proviceHtml);
				});
			}
		});
	}
//获得区级
	function loadAreasDistrict(checkInfo, pid) {
		var urlArea= HOST+'mobile.php?c=index&a=get_area';
		jQuery.ajax({
			type: "POST",
			url: urlArea,
			data: {checkInfo:checkInfo,pid:pid},
			dataType:"json",
			success: function(result){
				//$('#dpArea').append("<option value='' selected='selected'>请选择</option>");//定位成功后显示
				$.each(result.data, function (index, obj) {
					var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
					$('#dpArea').append(proviceHtml);
				});
			}
		});
	}
//获取选中城市单个信息
	function getSingelProvice(checkInfo,pid){
		var urlArea= HOST+'mobile.php?c=index&a=get_area';
		$.ajax({
			type: "POST",
			url: urlArea,
			data: {checkInfo:checkInfo,pid:pid},
			dataType:"json",
			success: function(result){
				$.each(result.data, function (index, obj) {
					var proviceHtml=' <div class="picker-item"id="provice" code="'+obj.id+'">'+obj.name+'</div>';
					$('.col-province').find(".picker-items-col-wrapper").append(proviceHtml);
				});
				return false;
			}
		});
	}
//获取默认收货地址详细 区级
	function getAddressArea(checkInfo,userid){
		var url =HOST+'mobile.php?c=index&a=my_address';
		$.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,id:userid,dotype:'gain'},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				var tips=result.message;
				if (result.statusCode=='0'){
					$.toptip(tips,2000, 'error');
				}else{
					//数据取回成功
					$("#address").append(result.address);
				}
			}
		});
	}
//提取经营类别 一级
function getPartnerType(checkInfo,pid){
	var urlArea= HOST+'mobile.php?c=index&a=partner_cat';
	jQuery.ajax({
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,pid:pid},
		dataType:"json",
		success: function(result){
			$('#partner_cate_first').append("<option value='' selected='selected'>请选择</option>");
			$.each(result.data, function (index, obj) {
				var firstHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
				$('#partner_cate_first').append(firstHtml);
			});

		}
	});
}
//获得二级经营分类
function getPartnerTypeSub(checkInfo, pid) {
	var urlArea= HOST+'mobile.php?c=index&a=partner_cat';
	jQuery.ajax({
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,pid:pid},
		dataType:"json",
		success: function(result){
			$('#partner_cate_sub').append("<option value='' selected='selected'>请选择</option>");
			$.each(result.data, function (index, obj) {
				var subHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
				$('#partner_cate_sub').append(subHtml);
			});
		}
	});
}
//获得三级经营分类
function getPartnerTypeThere(checkInfo, pid) {
	var urlArea = HOST + 'mobile.php?c=index&a=partner_cat';
	jQuery.ajax({
		type: "POST",
		url: urlArea,
		data: {checkInfo: checkInfo, pid: pid},
		dataType: "json",
		success: function (result) {
			$('#partner_cate_there').append("<option value='' selected='selected'>请选择</option>");
			$.each(result.data, function (index, obj) {
				var thereHtml = '<option value="' + obj.cate_id + '">' + obj.cate_name + '</option>';
				$('#partner_cate_there').append(thereHtml);
			});
		}
	});
}
//字典接口
/*
 学历id：18
薪资要求：19
有效期：21
福利要求:20
 */
//学历数据提取
function getEduction(checkInfoZidian){
	id='18';
	var url =HOST+'mobile.php?c=index&a=zidian';
	  $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoZidian,zidian_id:id},
			dataType: 'json',
			success: function (result) {
				 $.each(result.data, function (index, obj) {
					 var partnerCateHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
					$('#education').append(partnerCateHtml);
		            });
				return false;
			}
	  }); 
}
//选中的学历
function getSingelEduction(checkInfoZidian,id){
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
				var partnerCateHtml=' <option selected value="'+result.data.id+'">'+result.data.name+'</option>';
				$('#education').append(partnerCateHtml);
		}
	}); 
}
//福利要求
function getBenefit(checkInfoZidian){
	id='20';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index,obj) {
				var getBenefitHtml=' <div class="daiyu_checkbox"><label for="one">'+obj.name+'</label><input type="checkbox" name="benefit" id="benefit'+obj.id+'" value="'+obj.id+'"></div>';
				$('#benefit').append(getBenefitHtml);
			});
			return false;
		}
	}); 
}
//有效工作时间
function jobValueTime(checkInfoZidian){
	id='21';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#valuetime').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//日薪要求
function jobDayWages(checkInfoZidian){
	id='19';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#wages').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//工作年限 22
function getJobYear(checkInfoZidian){
	id='22';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#job_year').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//队伍资质 26
function getTroopsAptitude(checkInfoZidian){
	id='26';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#dui_type').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//队伍人数  23
function getTroopsCount(checkInfoZidian){
	id='23';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#peo_count').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//专业类型  25
function getZhuanYeType(checkInfoZidian){
	id='25';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#zhuan_type').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//设计特长  27
function getDesignSkillType(checkInfoZidian){
	id='27';
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfoZidian,zidian_id:id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#design_skill').append(jobTimeHtml);
			});
			return false;
		}
	}); 
}
//身份角色 取出的是id
/*function memberType(checkInfo,sessionUserId){
  	var url =HOST+'mobile.php?c=index&a=login';
	 $.ajax({
			type: 'post',
			url: url,
			dataType: 'json',
			data: {checkInfo:checkInfo,id:sessionUserId},
			success: function () {
				var memeberTypeResume=result.data.idtype;
				//查询当前会员类型  没有默认第一个  有直接跳转到  
				var message=result.message;
				if (result.statusCode==='0'){
					//不存在去注册页面
					window.location.href='memberType.php';
				}else{
					
				}
			}
		});
}*/
//根据角色id 去跳转编辑简历 url type=2为编辑  1为add
function jumlResumeType(id,type){
	if(type=='1'){
		switch (id) {
	    case ("2"):
	    	window.location.href='addJobDesignResume.php';//设计师
	        break;
	    case ("3"):
	    	window.location.href='addJobHeadmanResume.php';//组长
	        break;
	    case ("4"):
	    	window.location.href='addJobHeadmanResume.php';//管理人
	        break;
	    default:
	    	window.location.href='addJobSkillResume.php';//技工
		}
	}else{
		switch (id) {
	    case ("2"):
	    	window.location.href='editJobDesignResume.php';//设计师
	        break;
	    case ("3"):
	    	window.location.href='editJobHeadmanResume.php';//组长
	        break;
	    case ("4"):
	    	window.location.href='editJobMenageResume.php';//管理人
	        break;
	    default:
	    	window.location.href='editJobSkillResume.php';//技工
	}
  }
}//根据角色id 去提取增加职位和编辑职位的类别
function judgeJobType(id,type){
	if(type=='1'){
		switch (id) {
	    case ("2")://设计师
			$("#skillCate").remove();//技工
			$("#professionCate").remove();//管理人 组长
	        break;
	    case ("3")://组长
			$("#skillCate").remove();//技工
			$("#designCate").remove();//设计师
	        break;
	    case ("4")://管理人
			$("#skillCate").remove();//技工
			$("#designCate").remove();//设计师
	        break;
	    default://技工
			$("#professionCate").remove();//管理人 组长
			$("#designCate").remove();//设计师
		}
	}else{
		switch (id) {
			case ("2")://设计师
				$("#skillCate").remove();//技工
				$("#professionCate").remove();//管理人 组长
				break;
			case ("3")://组长
				$("#skillCate").remove();//技工
				$("#designCate").remove();//设计师
				break;
			case ("4")://管理人
				$("#skillCate").remove();//技工
				$("#designCate").remove();//设计师
				break;
			default://技工
				$("#professionCate").remove();//管理人 组长
				$("#designCate").remove();//设计师
		}
  }
}
//根据角色id 取汉字角色名称
function getMemberType(idtype){
	switch (idtype) {
    case ("2"):
        var typeMember='设计师';
        break;
    case ("3"):
   	 var typeMember='组长';
        break;
    case ("4"):
   	 var typeMember='管理人';
        break;
    default:
   	 var typeMember='技工';
	}
    return  typeMember;
}
//招聘人数分类 24
function getRecruitCountPeople(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=zidian';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,zidian_id:cate_id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#count').append(jobTimeHtml);
			});
			return false;
		}
	});
}
/*//工种类别 设计特长-一级菜单
function loadJobFirstCate(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=job_type';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,cate_id:cate_id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#firstMenu').append(jobTimeHtml);
			});
			return false;
		}
	});
}
//工种类别 设计特长-二级菜单
function loadJobSubCate(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=job_type';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,cate_id:cate_id},
		dataType: 'json',
		success: function (result) {
			  $('#subMenu').append("<option value='' selected='selected'>请选择</option>"); 
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#subMenu').append(jobTimeHtml);
			});
			return false;
		}
	});
}*/
//角色类别  {设计特长，工种类别  ，专业类型}
function JobType(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=job_type';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,cate_id:cate_id},
		dataType: 'json',
		success: function (result) {
			$.each(result.data, function (index, obj) {
				var jobTimeHtml=' <option class="" value="'+obj.id+'">'+obj.name+'</option>';
				$('#job_type').append(jobTimeHtml);
			});
			return false;
		}
	});
}
//工种选中类别
function JobSingelType(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=job_type';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,cate_id:cate_id},
		dataType: 'json',
		success: function (result) {
				var jobTimeHtml=' <option selected value="'+result.data.id+'">'+result.data.name+'</option>';
				$('#job_type').append(jobTimeHtml);
		}
	});
}
//上传多张图片--增加供求图片--
function uploadMultImg(checkInfo,id,imgUrl){
	console.log(imgUrl);
	var url =HOST+'mobile.php?c=index&a=add_picture';
	 $("#image_url").uploadify({
          'uploader': 'uploadify.swf',
          'script': 'UploadHandler.php',                
          'folder': 'UploadFile',
          'queueID': 'fileQueue',
          'auto': true,
          'multi': true
      });
	  $.ajax({
			type: 'post',
			url: url,
			traditional:true,//必须设成 true  
			data: {checkInfo:checkInfo,id:id,image_url:imgUrl},
			dataType: 'json',
			success: function (result) {
			}
	  }); 
}
//获得一级招聘分类
function getRecruitCat(checkInfo,pid){
	 var urlArea= HOST+'mobile.php?c=index&a=recruit_cat';
	jQuery.ajax({ 
	   type: "POST",
	   url: urlArea,
	   data: {checkInfo:checkInfo,pid:pid},
	   dataType:"json",
	   success: function(result){
		   $('#getRecruitCat').append("<option value='' selected='selected'>请选择</option>"); 
  		 $.each(result.data, function (index, obj) {
			   var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
			   $('#getRecruitCat').append(proviceHtml);
		  	 });
	   }
	}); 
} 
//获得二级招聘分类
function getRecruitCatSub(checkInfo, pid) { 
	 var urlArea= HOST+'mobile.php?c=index&a=recruit_cat';
	jQuery.ajax({ 
	   type: "POST",
	   url: urlArea,
	   data: {checkInfo:checkInfo,pid:pid},
	   dataType:"json",
	   success: function(result){
		   $('#getRecruitCatSub').append("<option value='' selected='selected'>请选择</option>"); 
  		 $.each(result.data, function (index, obj) {
			   var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
			   $('#getRecruitCatSub').append(proviceHtml);
		  	 });
	   }
	}); 
} 
//获得三级招聘分类
function getRecruitCatThere(checkInfo, pid) { 
	 var urlArea= HOST+'mobile.php?c=index&a=recruit_cat';
	jQuery.ajax({ 
	   type: "POST",
	   url: urlArea,
	   data: {checkInfo:checkInfo,pid:pid},
	   dataType:"json",
	   success: function(result){
		   $('#getRecruitCatThere').append("<option value='' selected='selected'>请选择</option>");
  		 $.each(result.data, function (index, obj) {
			   var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
			   $('#getRecruitCatThere').append(proviceHtml);
		  	 });
	   }
	}); 
}
//获得一级供求分类
function loadSupplyFirstCate(checkInfo,pid){
	var urlArea= HOST+'mobile.php?c=index&a=supply_cat';
	jQuery.ajax({ 
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,pid:pid},
		dataType:"json",
		success: function(result){
			$('#firstMenu').append("<option value='' selected='selected'>请选择</option>"); 
			$.each(result.data, function (index, obj) {
				var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
				$('#firstMenu').append(proviceHtml);
			});
		}
	}); 
} 
//获得二级供求分类
function loadSupplySubCate(checkInfo, pid) { 
	var urlArea= HOST+'mobile.php?c=index&a=supply_cat';
	jQuery.ajax({ 
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,pid:pid},
		dataType:"json",
		success: function(result){
			if (result.statusCode=='0'){
				var proviceHtml='<option value="">无分类</option>';
			}else{
				$('#subMenu').append("<option value='' selected='selected'>请选择</option>");
				$.each(result.data, function (index, obj) {
					var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
					$('#subMenu').append(proviceHtml);
				});
			}
		}
	}); 
} 
//获得三级供求分类
function loadSupplyThereCate(checkInfo, pid) { 
	var urlArea= HOST+'mobile.php?c=index&a=supply_cat';
	jQuery.ajax({ 
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,pid:pid},
		dataType:"json",
		success: function(result){
			if (result.statusCode=='0'){
				var proviceHtml='<option value="">无分类</option>';
				$('#thereMenu').append(proviceHtml);
			}else{
				$('#thereMenu').append("<option value='' selected='selected'>请选择</option>");
				$.each(result.data, function (index, obj) {
					var proviceHtml='<option value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
					$('#thereMenu').append(proviceHtml);
				});
			}

		}
	}); 
}
//获取供求和收藏统计代码
function getSupplyCollectNumber(checkInfo,id){
	var urlArea= HOST+'mobile.php?c=index&a=sum_count';
	jQuery.ajax({ 
		type: "POST",
		url: urlArea,
		data: {checkInfo:checkInfo,id:id},
		dataType:"json",
		success: function(result){
			if(result.statusCode=='1'){
				//供求
				$(".supply_number_count").html(result.data.total_tie);//帖子总数
				$(".supply_see_num").html(result.data.total_hits);//总浏览数
				//收藏
				$(".count_number").html(result.data.total_count);//收藏总数
				$(".product_num").html(result.data.total_procount);//商品收藏总数
				$(".supply_num").html(result.data.total_gqcount);//供求收藏总数
				$(".shop_num").html(result.data.total_stcount);//店铺收藏总数
			}
			if(result.statusCode=='0'){
				varHtml='0';
				//供求
				$(".supply_number_count").html(varHtml);//帖子总数
				$(".supply_see_num").html(varHtml);//总浏览数
				//收藏
				$(".count_number").html(varHtml);//收藏总数
				$(".product_num").html(varHtml);//商品收藏总数
				$(".supply_num").html(varHtml);//供求收藏总数
				$(".shop_num").html(varHtml);//店铺收藏总数
			}
			
		}
	}); 
}
/*
删除操作
 id： 用户id
 list_id：列表id
 model_id：供求信息：1  招聘信息：2   求职信息：3  取消订单4 5收藏
 model:a的值
 */
function delete_supply_recuirt_job(checkInfo,id,list_id,model_id){
	var url =HOST+'mobile.php?c=index&a=del_list';
	$.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:checkInfo,id:id,list_id:list_id,model_id:model_id},
		dataType: 'json',
		success: function (result) {
				var message=result.message;
				if (result.statusCode=='0'){
					$.toast("删除错误，请重试", "cancel");
				}
				if (result.statusCode=='1'){
					$.toast("删除成功");
					 setTimeout(function(){
		  				 window.location.reload();	
		  			},1500); 
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
			}
			if (result.statusCode=='1'){
				dataJson=eval('(' + result.data+')');
				//地区
				if (moudle=='7'){
					$("#dpArea").empty();
					$("#dpCity").empty();//清除定位信息
					var proviceHtml='<option selected="selected" value="'+dataJson.top.id+'">'+dataJson.top.name+'</option>';
					var cityHtml='<option selected="selected" value="'+dataJson.two.id+'">'+dataJson.two.name+'</option>';
					var areaHtml='<option selected="selected" value="'+dataJson.id+'">'+dataJson.name+'</option>';
					$('#dpProvince').append(proviceHtml);
					$('#dpCity').append(cityHtml);
					$('#dpArea').append(areaHtml);
				}
				//招聘4
				if (moudle=='4'){
					var proviceHtml='<option selected="selected" value="'+dataJson.top.id+'">'+dataJson.top.name+'</option>';
					var cityHtml='<option selected="selected" value="'+dataJson.two.id+'">'+dataJson.two.name+'</option>';
					var areaHtml='<option selected="selected" value="'+dataJson.id+'">'+dataJson.name+'</option>';
					$('#partner_cate_first').append(proviceHtml);
					$('#partner_cate_sub').append(cityHtml);
					$('#partner_cate_there').append(areaHtml);
				}
				//加盟商分类
				if (moudle=='3') {
					var proviceHtml1='<option selected="selected" value="'+dataJson.top.cate_id+'">'+dataJson.top.cate_name+'</option>';
					var cityHtml1='<option selected="selected" value="'+dataJson.two.cate_id+'">'+dataJson.two.cate_name+'</option>';
					var areaHtml1='<option selected="selected" value="'+dataJson.cate_id+'">'+dataJson.cate_name+'</option>';
					$('#partner_cate_first').append(proviceHtml1);
					$('#partner_cate_sub').append(cityHtml1);
					$('#partner_cate_there').append(areaHtml1);
				}
				//供求分类
				if (moudle=='6') {
					var proviceHtml1='<option selected="selected" value="'+dataJson.top.cate_id+'">'+dataJson.top.cate_name+'</option>';
					var cityHtml1='<option selected="selected" value="'+dataJson.two.cate_id+'">'+dataJson.two.cate_name+'</option>';
					var areaHtml1='<option selected="selected" value="'+dataJson.cate_id+'">'+dataJson.cate_name+'</option>';
					$("#firstMenu").append(proviceHtml1);
					$("#subMenu").append(cityHtml1);
					$("#thereMenu").append(areaHtml1);
				}
			}
		}
	});
}
/*******手机端a链接点击无反应问题解决-fastclick.js******/
//如果你使用原生js开发则进行如下声明即可。
/*
if ('addEventListener' in document) {
  document.addEventListener('DOMContentLoaded', function() {  
  FastClick.attach(document.body);  
}, false);  
}
//如果你想使用jquery
$(function() {
  FastClick.attach(document.body);  
});
*/
