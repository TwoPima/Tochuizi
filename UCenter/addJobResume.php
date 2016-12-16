<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-求职简历</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/setting.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianliinfo.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title">技工</span>
            </a>
        </div>
        <div id="header-right">
            <a href="addMySupply.php"><span></span></a>
        </div>
    </div>
    <div style="clear: both"></div>
    <div id="jianliinfo">
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
                        <label class="weui-label">性别:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="" id="" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">出生年份:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">最高学历:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">工作年限:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">籍贯:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
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
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">邮箱:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cell weui-cell_select">
                <div class="weui-cell__bd">
                    <select class="weui-select" name="select1">
                        <option selected="" value="1">工种类别</option>
                        <option value="2">QQ号</option>
                        <option value="3">Email</option>
                    </select>
                </div>
            </div>
            <div class="weui-cells weui-cells_form" style="margin-top:0px;">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="求职宣言..." rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd" style="border-bottom: 1px solid #EFEFEF;margin-bottom: 10px;">
                            <p class="weui-uploader__title">工作风采</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add_button">
            <a href="#" id="btn-custom-theme" class="weui-btn weui-btn_default">保存</a>
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
<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else{
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
					new Vue({
						  el: '#mobile',
						  data: {
						   mobile: mobile
						  }
						})
				}
			}
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