/*******
 * 公共js
 * author:马晓成
 * ******/
//获取地址api
function getAreaList(checkInfo,pid){
	 var urlArea= HOST+'mobile.php?c=index&a=get_area';
	 $.ajax({
		   type: "POST",
		   url: urlArea,
		   data: {checkInfo:checkInfo,pid:pid},
		   dataType:"json",
		   success: function(data){
			 if (0 == data.status) {
				 alert(data.id);
					alert(data.name);
				return false;
			 }else{
				alert(data.content);
				var attstr= '<img src="'+data.url+'">'; 
				$(".imglist").append(attstr);
				return false;
			 }
		   }
		}); 
}
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
					 var one='<p class_id="'+obj.id+'" name="'+obj.name+'" count="'+obj.count+'" price="'+obj.price+'" class="vip_money_line1">'+obj.name+'<p><p class="vip_money_line2">'+obj.count+'次查询</p>';
						$('#vip_category').append(one);
		            });
				return false;
			 }
		   }
		}); 
}
//提取经营类别
function getPartnerType(checkInfoPartnerType){
	var url =HOST+'mobile.php?c=index&a=partner_cat';
	  $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoPartnerType},
			dataType: 'json',
			success: function (result) {
				 $.each(result.data, function (index, obj) {
					 var partnerCateHtml=' <option class="partner_cate_option" value="'+obj.cate_id+'">'+obj.cate_name+'</option>';
					$('#partner_cate').append(partnerCateHtml);
		            });
				return false;
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
				var getBenefitHtml=' <div class="daiyu_checkbox"><label for="one">'+obj.name+'</label><input type="checkbox" name="banefit" id="'+obj.id+'" value="'+obj.name+'"></div>';
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
//身份角色
function memberType(checkInfo,sessionUserId){
  	var url =HOST+'mobile.php?c=index&a=my_resume';
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,id:sessionUserId},
			dataType: 'json',
			success: function (result) {
				//查询当前会员类型  没有默认第一个  有直接跳转到  
				var message=result.message;
				if (result.statusCode==='0'){
					//不存在简历  创建简历
					window.location.href='addJobResume.php';
				}else{
					var memberType=result.data.cate_id;
					return memberType;
				}
			}
		});
}
//工种类别
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
//上传多张图片
function uploadMultImg(add_picture,id){
	var url =HOST+'mobile.php?c=index&a=add_picture';
	  $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoZidian,id:id,image_url:image_url},
			dataType: 'json',
			success: function (result) {
				var id=result.data.id;
				var name=result.data.name;
			}
	  }); 
}
