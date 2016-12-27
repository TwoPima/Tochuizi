/*******
 * 公共js
 * author:马晓成@亿次元科技
 * email:857773627@qq.com
 * ******/
/*
 * 用搜狐地址库
 *   ip: returnCitySN["cip"]
            国家：remote_ip_info.country
             省份：remote_ip_info.province
             城市：remote_ip_info.city
            区域：remote_ip_info.district
             其他：remote_ip_info.desc
      ISP：+remote_ip_info.isp
             分类：remote_ip_info.type
     $.session.get(nowPositionProvince)
 */
function getNowPosition(){
	 $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(){  
         if (remote_ip_info.ret == '1'){  
        	 var nowPositionProvince=$.session.set('nowPositionProvince',remote_ip_info.province);
        	 var nowPositionCity=$.session.set('nowPositionCity', remote_ip_info.city);//$.session.get(nowPositionCity)
        	 var info={"provice":nowPositionProvince,"city":nowPositionCity};
        	  return info;
         } else {   
        	 return('错误', '没有找到匹配的 IP 地址信息！');   
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
		   nowPositionProvince=$.session.get("nowPositionProvince");
		   var selectHtml='<option value="" selected="selected">'+nowPositionProvince+'</option>';
		   $('#dpProvince').append(selectHtml); 
  		 $.each(result.data, function (index, obj) {
			   var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
			   $('#dpProvince').append(proviceHtml);
		  	 });
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
		   nowPositionCity=$.session.get("nowPositionCity");
		   var selectHtml='<option value="" selected="selected">'+nowPositionCity+'</option>';
		   $('#dpCity').append(selectHtml); 
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
		   $('#dpArea').append("<option value='' selected='selected'>请选择</option>"); 
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
  	var url =HOST+'mobile.php?c=index&a=login';
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,id:sessionUserId},
			dataType: 'json',
			success: function (result) {
				//查询当前会员类型  没有默认第一个  有直接跳转到  
				var message=result.message;
				if (result.statusCode==='0'){
					//不存在去注册页面
					window.location.href='memberType.php';
				}else{
					var memberType=result.data.idtype;
					return memberType;
				}
			}
		});
}
/* 会员类别 */
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
//招聘人数分类
function getRecruitCountCat(checkInfo,cate_id){
	var url =HOST+'mobile.php?c=index&a=job_type';
	/*$.ajax({
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
	});*/
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
	  $.ajax({
			type: 'post',
			url: url,
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
			   var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
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
			   var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
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
		   $('#dpArea').append("<option value='' selected='selected'>请选择</option>"); 
  		 $.each(result.data, function (index, obj) {
			   var proviceHtml='<option value="'+obj.id+'">'+obj.name+'</option>';
			   $('#dpArea').append(proviceHtml);
		  	 });
	   }
	}); 
}
/*******手机端a链接点击无反应问题解决-fastclick.js******/
//如果你使用原生js开发则进行如下声明即可。
if ('addEventListener' in document) {      
  document.addEventListener('DOMContentLoaded', function() {  
  FastClick.attach(document.body);  
}, false);  
}
//如果你想使用jquery
$(function() {  
  FastClick.attach(document.body);  
});
