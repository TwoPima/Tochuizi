<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-发布求职</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/addJob.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <input value="<?php echo md5(date('Ymd')."my_recruit"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
    <input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<!--do 添加：add，修改：edit，获取：gain -->
	<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
	<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>  
	<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/common.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
		//已经登陆
  	var checkInfo = $("#checkInfo").val();
  	var url =HOST+'mobile.php?c=index&a=my_resume';
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo,id:sessionUserId},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					//数据取回成功
					memberTypeCateId=result.data.cate_id;
					alert(memberTypeCateId);
				}
			},
		});
		jobValueTime($("#checkInfoZidian").val());//有效期
		jobDayWages($("#checkInfoZidian").val());//薪资要求
		getBenefit($("#checkInfoZidian").val());//薪资要求
		//memberType($("#checkInfoResume").val(),sessionUserId);//身份角色
		//var memberTypeCateId=memberType($("#checkInfoJobType").val(),sessionUserId);//工种类别
		JobType($("#checkInfoJobType").val(),memberTypeCateId);//身份角色
		
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
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex = $("#sex").val();
		var nickname = $("#nickname").val();
		var sex=$("input[name='sex':checked").val();
       	var url =HOST+'mobile.php?c=index&a=my_resume';
        if(mobile==""|| nickname==""){
       		$.toptip('手机号昵称均不能为空！', 200, 'warning');
       	    return false; 
       	 }
		 $.ajax({
			type: 'post',
			url: url,
			data: {mobile:mobile,id:sessionUserId,nickname:nickname,checkInfo:checkInfo,sex:sex},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					$.toptip(message,2000, 'success');
					window.location.href='./UCenter/index.php';
				}
			},
		});
});
</script>
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title">发布求职</span>
            </a>
        </div>
        <div id="header-right">
        </div>
    </div>
    <div style="clear: both"></div>
    <div id="job_mainpush">
            <div class="push_box push_pinfo">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="title"  id="title" placeholder="输入标题">
                    </div>
                     <div class="height1px"></div>
                </div>
               
                <div class="weui-cells weui-cells_form" style="margin-top: 0;">
                    <div class="weui-cell ">
                        <div class="weui-cell__hd">
                            <label class="weui-label">手机</label>
                        </div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" name="mobile"  id="mobile" type="tel" >
                        </div>
                    </div>
                    <div class="weui-cell ">
                        <div class="weui-cell__hd">
                            <label class="weui-label">邮箱</label>
                        </div>
                        <div class="weui-cell__bd">
                            <input class="weui-input"  name="email"  id="email" type="email" >
                        </div>
                    </div>
                      <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">工种</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="job_type"  id="job_type" >
                        </select>
                    </div>
                </div>
                </div>
            </div>

            <div class="push_box push_daiyu">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">期望工作地:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" name="area"  id="area"  type="text" >
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">日薪要求:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="wages"  id="wages" >
                        </select>
                    </div>
                </div>
                <div class="height1px"></div>
                <div class="push_checkbox" id="benefit">
                </div>
            </div>

            <div class="push_box">
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">有效时间:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="valuetime" id="valuetime">
                        </select>
                    </div>
                </div>
            </div>

            <div class="push_box push_beizhu">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">备注</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" placeholder="可选">
                    </div>
                </div>
            </div>
            <div class="sure_button">
                <a href="#" id="btn-custom-theme" class="weui-btn">确定</a>
            </div>

    </div><!--main-->
</div><!--app-->
</body>
</html>