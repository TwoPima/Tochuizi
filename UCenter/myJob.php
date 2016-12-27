<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的求职</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/myjob.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <script src="../Public/js/require.config.js"></script>
    <script src="../Public/js/jquery-2.1.4.js"></script>
    <script src="../Public/js/jquery-session.js"></script>
    <script src="../Public/js/fastclick.js"></script>
    <script src="../Public/js/common.js"></script>
    <script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>  
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfologin"/>  
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<script>
var memeberTypeResume='';//定义取出角色id
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		$.toast("您还没有登陆！", "cancel");
		setTimeout(window.location.href='../Login/login.php',2000);
	}
	//已经登陆
  	selectMyResumeInfo(sessionUserId,$("#checkInfoResume").val());//查询简历信息
  	memberType($("#checkInfologin").val(),sessionUserId);//取出的是id 跳转
  	$("#judgeMemberResumeType").click(function(){
  		jumlResumeType(memeberTypeResume,'2');
  	 });
});
 function selectMyResumeInfo(id,checkInfo){
		 //查询
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
						typeMember=$.session.get('typeMember');
						 var jobDetailHtml='<p>'+result.data.name+'&nbsp;'+result.data.mobile+'</p><p>'+typeMember+'>'+result.data.cate_id.cate_name+'</p>';
							$('.job_top_info').append(jobDetailHtml);
					}
				},
			});
	 
 }
</script>
</head>
<body>
<div id="app">
 	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的求职</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a id="judgeMemberResumeType"><img alt="" src="../Public/img/business/addEmploy.png"></a>
                	<!--个人用户增加简历  会员用户增加职位  -->
                </div>
		</div>
	<div class="clear"></div>
    <div id="job_main">
            <div class="job_top">
                <img class="job_top_people" src="../Public/img/myjob/people.jpg" alt="">
                <div class="job_top_info">
                </div>
               <a href="editJobResume.php"><img class="job_top_edit" src="../Public/img/myjob/edit.jpg" alt=""></a> 
            </div>
            <div class="box_bg"></div>
        <div class="weui-cells">
	             <a class="weui-cell weui-cell_access" href="addJob.php">
	                <div class="weui-cell__bd" style="vertical-align:middle; font-size: 16px;">诚求一个好工作</div>
	                <div class="weui-cell__ft" style="font-size: 0">
	                    <span style="vertical-align:middle; font-size: 14px;">5天以前</span>
	                    <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
	                </div>
                </a>
        </div>
        <div class="weui-cells">
           <a class="weui-cell weui-cell_access" href="addJobResume.php">
                <div class="weui-cell__bd" style="vertical-align:middle; font-size: 16px;">专业版和普通版区别，专业版收费</div>
                <div class="weui-cell__ft" style="font-size: 0">
                    <span style="vertical-align:middle; font-size: 14px;">5天以前</span>
                    <span class="weui-badge weui-badge_dot" style="margin-left: 5px;margin-right: 5px;"></span>
                </div>
                </a>
        </div>
    </div><!--main-->
</div><!--app-->
</body>
</html>