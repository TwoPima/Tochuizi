<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-发布评价</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
      <link rel="stylesheet" href="../Public/css/common.css"/>
<input value="<?php echo md5(date('Ymd')."add_comment"."tuchuinet");?>"	type="hidden" id="checkInfoAddComment"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script>
	sessionUserId=$.session.get('userId');
	if(sessionUserId==null){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}
	//已经登陆  取会员类别
  	var url =HOST+'mobile.php?c=index&a=comment_list';
   var checkInfoAddComment = $("#checkInfoAddComment").val();
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoAddComment,goods_id:goods_id,id:sessionUserId,desc:desc,miao_star:miao_star,liu_star:liu_star,fuwu_star:fuwu_star,image_url:image_url},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				if (result.statusCode==='0'){
					
				}else{
					//返回成功信息
					$.toast(message);
				}
			}
		});
</script>
</head>
<body>
<div id="app">
	<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的评价</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
    <div id="main">
        <div class="addEvaluate">
	            <div class="weui-cells">
	                <a class="weui-cell weui-cell_access" href="javascript:;">
	                    <div class="weui-cell__bd">
	                        <p id="good_name">宁夏亿次元科技有限公司</p>
	                    </div>
	                    <div class="weui-cell__ft"></div>
	                </a>
	                <div class="weui-cells weui-cells_form">
	                    <div class="weui-cell">
	                        <div class="weui-cell__bd">
	                            <textarea class="weui-textarea" name="desc" placeholder="评论描述" rows="3"></textarea>
	                           <!-- <div class="weui-textarea-counter"><span>0</span>/200</div>-->
	                        </div>
	                    </div>
	                </div>
	            </div>
                <div class="weui-uploader">
                        <div class="weui-cells">
                       <!-- <p class="weui-uploader__title">图片上传</p>
                        <div class="weui-uploader__info">0/2</div>-->
                        <a class="weui-cell weui-cell_access" href="javascript:;">
                            <div class="weui-cell__bd">
                                <p id="name">晒图</p>
                            </div>
                            <div class="weui-cell__ft"></div>
                        </a>

                            <div class="weui-uploader__bd">
                                <ul class="weui-uploader__files" id="uploaderFiles">
                                    <li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
                                        <div class="weui-uploader__file-content">
                                            <i class="weui-icon-warn"></i>
                                        </div>
                                    </li>
                                   <!-- <li class="weui-uploader__file weui-uploader__file_status" style="background-image:url(./images/pic_160.png)">
                                          <div class="weui-uploader__file-content">50%</div>
                                      </li>-->
                                </ul>
                                <div class="weui-uploader__input-box">
                                    <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple />
                                </div>
                            </div>
                    </div>
            </div>

            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="description">描述评级：<span id="description-raty" data-score="3"></span></p>
                    </div>
                </a>
            </div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                       <p id="logistic">物流评级：<span id="logistic-raty"data-score="4" ></span></p>
                    </div>
                </a>
            </div>
            <div class="weui-cells">
                <a class="weui-cell weui-cell_access" href="javascript:;">
                    <div class="weui-cell__bd">
                        <p id="server">服务评级：<span id="server-raty" data-score="5"></span></p>
                    </div>
                </a>
            </div>
            <div class="height20px"></div>
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default "id="btn-custom-theme">按钮</a>
            </div>
          </div>
    </div><!--main-->
</div><!--app-->
</body>
<input value="<?php echo md5(date('Ymd')."edit_self"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
 <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/vue.2.1.0.js"></script>
<script src="../Public/js/center.js"></script>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/demo/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		//没有登陆
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else{
		//已经登陆
		//收藏启动
		 $.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
		    $('#description-raty').raty({ 
		    	  score: function() { 
		    	    return $(this).attr('data-score'); 
		    	  } 
		    	}); 
		    $('#logistic-raty').raty({ 
		    	  score: function() { 
		    	    return $(this).attr('data-score'); 
		    	  } 
		    	}); 
		    $('#server-raty').raty({ 
		    	  score: function() { 
		    	    return $(this).attr('data-score'); 
		    	  } 
		    	}); 
	    	
  	var checkInfo = $("#checkInfo").val();
  	var url =HOST+'mobile.php?c=index&a=edit_self';
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
						/*   el: '#nickname',
						  data: {
							  nickname: nickname
						  }
						  el: '#typeMember',
						  data: {
							  typeMember: typeMember
						  } */
						})
				}
			},
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
	}
});
 //提交，最终验证。
 $("#btn-custom-theme").click(function() {
		var sex = $("#sex").val();
		var nickname = $("#nickname").val();
		var sex=$("input[name='sex':checked").val();
       	var url =HOST+'mobile.php?c=index&a=edit_self';
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
});
</script>
</html>