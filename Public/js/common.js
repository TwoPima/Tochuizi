/*******
 * 公共js
 * author:马晓成
 * ******/
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
//获取地址api
function getAreaList(checkInfo){
	 var urlArea= HOST+'mobile.php?c=index&a=get_area';
	 $.ajax({
		   type: "POST",
		   url: urlArea,
		   data: {checkInfo:checkInfo},
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
function manyZidianType(checkInfoZidian,id){
	var url =HOST+'mobile.php?c=index&a=zidian';
	  $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoZidian,zidian_id:id},
			dataType: 'json',
			success: function (result) {
				var id=result.data.id;
				var name=result.data.name;
			}
	  }); 
	  return name
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
