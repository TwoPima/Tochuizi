<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-发布评价</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.min.css"/>
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
      <link rel="stylesheet" href="../Public/css/common.css"/>

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
	                        <p id="name">宁夏亿次元科技有限公司</p>
	                    </div>
	                    <div class="weui-cell__ft"></div>
	                </a>
	                <div class="weui-cells weui-cells_form">
	                    <div class="weui-cell">
	                        <div class="weui-cell__bd">
	                            <textarea class="weui-textarea" placeholder="评论描述" rows="3"></textarea>
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
<script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script type="text/javascript" src="../Public/plugins/raty-2.5.2/demo/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
$(function() {
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
});

</script>
</html>