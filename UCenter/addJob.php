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
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title">发布职位</span>
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
                    <div class="weui-cell ">
                        <div class="weui-cell__hd">
                            <label class="weui-label">工种</label>
                        </div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" name="job_type"  id="job_type"  type="text"  value="木工">
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
                            <option value="1">180元/天</option>
                            <option value="2">180元/天</option>
                            <option value="3">180元/天</option>
                        </select>
                    </div>
                </div>
                <div class="push_checkbox">
                    <div class="daiyu_checkbox">
                        <label for="one">包食宿</label>
                        <input type="checkbox" name="" id="one">
                    </div>
                    <div class="daiyu_checkbox">
                        <label for="two">工资月结</label>
                        <input type="checkbox" name="" id="two">
                    </div>
                    <div class="daiyu_checkbox">
                        <label for="three">五险一金</label>
                        <input type="checkbox" name="" id="three">
                    </div>
                </div>
            </div>

            <div class="push_box">
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">有效时间:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="select2">
                            <option value="1">三个月</option>
                            <option value="2">四个月</option>
                            <option value="3">五个月</option>
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
                        <input class="weui-input" type="email" placeholder="可选">
                    </div>
                </div>
            </div>
            <div class="sure_button">
                <a href="#" id="btn-custom-theme" class="weui-btn">确定</a>
            </div>

    </div><!--main-->
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."my_recruit"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<!--do 添加：add，修改：edit，获取：gain -->
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
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
					var mobile=$.session.get('mobileSession');
				}
			},
		});
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
</html>