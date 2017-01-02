<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-求职简历</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/setting.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianli.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <script src="../Public/js/require.config.js"></script>
    <script src="../Public/js/jquery-2.1.4.js"></script>
    <script src="../Public/js/jquery-session.js"></script>
    <script src="../Public/js/fastclick.js"></script>
    <script src="../Public/js/common.js"></script>
    <script src="../Public/js/jquery-weui.min.js"></script>
    <script type="text/javascript" src="../Public/js/vue.min.js"></script>
    <script type="text/javascript" src="../Public/js/vue-resource.js"></script>
    <input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfoResume"/>
    <input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfologin"/>
    <input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>
    <script>
        $(function(){
            sessionUserId=$.session.get('userId');
            if(sessionUserId==null){
                //没有登陆
                $.toast("您还没有登陆！", "cancel");
                setTimeout(window.location.href='../Login/login.php',2000);
            }
            //已经登陆
            selectMyResumeInfo(sessionUserId,$("#checkInfoResume").val());//查询简历信息
            $("#judgeMemberResumeType").click(function(){
                jumlResumeType($.session.get('idType'),'2');
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
                        console.log(result.data.id_type);
                        $.session.set('idType',result.data.id_type);
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
                	<a href="addJob.php"><img alt="" src="../Public/img/business/addEmploy.png"></a>
                </div>
		</div>
    <div style="clear: both"></div>
    <div id="job_main">
        <div class="job_top">
            <img class="job_top_people" src="../Public/img/myjob/dengpao.jpg" alt="">
            <div class="job_top_info">
                <p>清先完善你的简历</p>
                <p>点亮你的身份</p>
            </div>
            <a  id="judgeMemberResumeType">  <img class="job_top_edit" src="../Public/img/myjob/edit.jpg" alt=""></a>
        </div>
        <div class="job_noinfo">
            <img src="../Public/img/no-info.png " >
            <p>您还没有发不过求职</p>
        </div>
    </div><!--main-->
</div><!--app-->
</body>
</html>