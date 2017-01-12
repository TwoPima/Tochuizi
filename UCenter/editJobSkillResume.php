<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-求职简历</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" href="../Public/css/weui.css"/>
	    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianliinfo.css"/>
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title" id="memberType">技工</span>
            </a>
        </div>
        <div id="header-right">
            <a href="addMySupply.php"><span></span></a>
        </div>
    </div>
        <form>
    <div id="jianliinfo" class="clear">
        <div class="info_box">
            <div class="weui-cells weui-cells_form" style="margin-top: 10px;">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">姓名:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="name" id="name">
                    </div>
                </div>
                   <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">民族:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="zu" id="zu">
                    </div>
                </div>
                 <div class="weui-cell weui-cells_radio">
                       <div class="weui-cell__hd"><label class="weui-label">性别</label></div>
                           <div class="weui-cell__bd sex">
                               	<p class="float-left font14px"><span>男</span><input type="radio"  value="0" name="sex" id="sexMan"></p>
                               	<p class="font14px"><span>女</span><input type="radio" name="sex" value="1" id="sexWoman" checked='checked' ></p>
                           </div>
                   </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">出生年份:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" name="birthday"  data-toggle='date' id="birthday" type="text" >
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
                        <label for="" class="weui-label">工作年限</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="job_year"  id="job_year" >
                        </select>
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">籍贯:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="home" id="home" >
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cells weui-cells_form" style="margin-top: 10px;">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">手机:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="mobile" id="mobile">
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">邮箱:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" id="email" name="email">
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
        <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">薪资要求</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="wages"  id="wages" >
                        </select>
                    </div>
                </div>
            <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">工种类别</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="cate_id"  id="job_type" >
                        </select>
                    </div>
                </div>
            <div class="weui-cells weui-cells_form" style="margin-top:0px;">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" id="desc" name="desc" placeholder="求职宣言..." rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <form  name="uploadForm" id="uploadForm" enctype="multipart/form-data" method="post">
            <div class="info_box">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <div class="weui-uploader">
                            <div class="weui-uploader__hd" style="border-bottom: 1px solid #EFEFEF;margin-bottom: 10px;">
                                <p class="weui-uploader__title font14px">工作风采</p>
                            </div>
                            <div class="weui-uploader__bd margin_fix">
                                <ul class="weui-uploader__files" id="uploaderFiles">
                                </ul>
                                <div class="weui-uploader__input-box">
                                    <input class="weui-uploader__input file"  name="image_url" id="image_url" type="file" accept="image/*" >
                                    <input  name="checkInfo" value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>
                                    <input  name="id" id="userId" type="hidden"  >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="add_button">
            <a  class="weui-btn weui-btn_default" id="btn-custom-theme">保存</a>
        </div>

    </div><!--main-->
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>  
<!--添加工作风采  -->
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>  
<!--删除工作风采  -->
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>
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
	//已经登陆
    var dpProvince = $("#dpProvince");
    var dpCity = $("#dpCity");
    var dpArea = $("#dpArea");
    //填充省的数据
    loadAreasProvince($("#checkInfoArea").val(), 0);
    //给省绑定事件，触发事件后填充市的数据
    jQuery(dpProvince).bind("change keyup", function () {
        var provinceID = dpProvince.prop("value");
        $("#dpArea").empty();
        $("#dpCity").empty();
        loadAreasCity($("#checkInfoArea").val(), provinceID);
        dpCity.fadeIn("slow");
    });
    //给市绑定事件，触发事件后填充区的数据
    jQuery(dpCity).bind("change keyup", function () {
        var cityID = dpCity.prop("value");
        loadAreasDistrict($("#checkInfoArea").val(), cityID);
        dpArea.fadeIn("slow");
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
        //验证邮件
        if( $(this).is('#email') ){
           if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
        	   $.toptip('邮箱地址有误，请重填！', 2000, 'warning');
               return false; 
           }
        }
	});
	$("#birthday").calendar();//日历
    selectMyResumeInfo(sessionUserId,$("#checkInfoResume").val());//查询简历信息
	getEduction($("#checkInfoZidian").val());//学历
	getJobYear($("#checkInfoZidian").val());//工作年限
	jobDayWages($("#checkInfoZidian").val());//薪资
	JobType($("#checkInfoJobType").val(),$.session.get('idType'));//工种类别
});
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
                if(eval('(' + result.data.wages+ ')')!=null){
                    $('#wages').append('<option value="'+eval('(' + result.data.wages+ ')').id+'" selected="selected">'+eval('(' + result.data.wages+ ')').name+'</option>');
                }
                if(eval('(' + result.data.job_type+ ')')!=null){
                    $('#job_type').append('<option value="'+result.data.cate_id.cate_id+'" selected="selected">'+result.data.cate_id.cate_name+'</option>');
                }

            }
        }
    });

}
//点击input 转换成预览图
$('#image_url').change(function(event) {
    var files = event.target.files, file;	// 根据这个 <input> 获取文件的 HTML5 js 对象
    if (files && files.length > 0) {
        file = files[0];// 获取目前上传的文件
      /*  if(file.size > 1024 * 1024 * 2) {
            alert('图片大小不能超过 2MB!');
            return false;
        }*/
        var URL = window.URL || window.webkitURL;
        var imgURL = URL.createObjectURL(file);
        var html = '';
        html += ' <li class="weui-uploader__file" id="fileshow">' +
            '  <img class="deletePicture" src="../Public/img/delete-icon-picture.png"/><img src="'+imgURL+'" class="fileshow thumb-img" />'+
            '</li>';
        $("#uploaderFiles").prepend(html);
        uploadImage();
    }
});
function uploadImage() {
    var url =HOST+'mobile.php?c=index&a=add_picture';
    var formData = new FormData($( "#uploadForm" )[0]);
    $.showLoading('正在上传');
    setTimeout(function() {
        $.hideLoading();
    }, 3000)
    $.ajax({
        type: "POST",
        url:url,
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        error: function(request) {
            $.toast("上传失败，请检查网络后重试", "cancel");
        },
        success: function(result) {
            if(result.statusCode=='0'){
                $.toast("上传失败，请检查网络后重试", "cancel");
            }else{
               // window.location.reload();//刷新当前页面.
            }

        }
    });
}
$(document).on("click", ".deletePicture", function() {
    var url =HOST+'mobile.php?c=index&a=del_picture';
    $.ajax({
        type: 'post',
        url: url,
        data: {
            checkInfo:$("#checkInfoDelImg").val(),image_id:$(this).attr('data'),id:sessionUserId
        },
        dataType: 'json',
        success: function (result) {
            var message=result.message;
            if (result.statusCode==='0'){
                $.toast(message, "cancel");
            }else{
                $.toast("操作成功！");
                window.location.reload();//刷新当前页面.
                //window.location.href='myJob.php';
            }
        }
    });
});
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex=$("input[name='sex']:checked").val();
		var name = $("#name").val();
		var zu = $("#zu").val();
		var mobile = $("#mobile").val();
		var desc = $("#desc").val();
		var home = $("#home").val();
		var email = $("#email").val();
		var birthday = $("#birthday").val();
		var cate_id=$('#job_type option:selected').val();
		var education=$('#education option:selected').val();
		var job_year = $("#job_year").val();
		var checkInfo = $("#checkInfo").val();
       	var url =HOST+'mobile.php?c=index&a=my_resume';
        if(mobile==""|| name==""){
            $.toast('手机号姓名均不能为空！', "cancel");
       	    return false; 
       	 }
         //验证手机
         if(!(/^1(3|4|5|7|8)\d{9}$/.test(mobile))){
             $.toast('手机号码有误，请重填！', "cancel");
             return false;
         }
         //验证邮件
         if( email=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(email) ) ){
             $.toast('邮箱地址有误，请重填！', "cancel");
             return false;
         }
		 $.ajax({
			type: 'post',
			url: url,
			data: {
                mobile:mobile,cate_id:cate_id,zu:zu,education:education,job_year:job_year,
                id:sessionUserId,dotype:'edit',desc:desc,home:home,birthday:birthday,name:name,
                checkInfo:checkInfo,sex:sex,email:email
            },
			dataType: 'json',
			success: function (result) {
				var tips=result.message;
				if (result.statusCode=='0'){
					$.toast(tips, "cancel");
				}
                if (result.statusCode=='1'){
                    setTimeout(function() {
                        $.toast("操作成功");
                        window.location.href='myJob.php';
                    }, 3000)
				}
			},
		});
});
</script>
</html>