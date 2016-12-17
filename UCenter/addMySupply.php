<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的供求</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/addmysupply.css"/>
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
             <a href="javascript:history.go(-1);" >
                  <i class="icon iconfont icon-xiangzuo"></i>
                    <span class="title">发布供求</span>
             </a>
        </div>
        <div id="header-right"></div>
    </div>
    <div id="main">
        <div class="addEvaluate">
            <form action="" id="addmysupply_form">
                <div class="weui-cells">
                    <div class="weui-uploader">
                        <div class="weui-uploader__bd">
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple />
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="weui-cells">
                <div class="weui-cell weui-cell_select">
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="select1">
                            <option selected value="1">选择分类</option>
                            <option value="2">QQ号</option>
                            <option value="3">Email</option>
                        </select>
                    </div>
                </div>
                <div class="weui-cells weui-cells_form">
                    <div class="weui-cell">
                        <div class="weui-cell__bd">
                            <textarea class="weui-textarea" placeholder="描述备注" rows="3"></textarea>
                            <!-- <div class="weui-textarea-counter"><span>0</span>/200</div>-->
                        </div>
                    </div>
                </div>
            </div>


            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="name">价&nbsp;&nbsp;格：<span></span><span>价格可选</span></p>
                    </div>
                </a>
            </div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="name">联系电话：<span>123123232</span></p>
                    </div>
                </a>
            </div>
            <div class="height20px"></div>
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default " id="btn-custom-theme">按钮</a>
            </div>
            </div>
        </div><!--main-->
    </div><!--app-->
</body>

<input value="<?php echo md5(date('Ymd')."my_supply"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/center.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else {
        var checkInfo = $("#checkInfo").val();
        var id=sessionUserId;
        var dotype='add';
        var url = HOST + 'mobile.php?c=index&a=my_resume';
        $.ajax({
            type: 'post',
            url: url,
            data: {checkInfo: checkInfo, id: sessionUserId},
            dataType: 'json',
            success: function (result) {
                var message = result.message;
                if (result.statusCode === '0') {
                    $.toptip(message, 2000, 'error');
                } else {
                    //数据取回成功
                    var mobile = $.session.get('mobileSession');

                }
            },
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