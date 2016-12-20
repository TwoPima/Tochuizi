<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的评价</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
<link rel="stylesheet" href="../Public/css/common.css"/>
<input value="<?php echo md5(date('Ymd')."comment_list"."tuchuinet");?>"	type="hidden" id="checkInfoComment"/>  
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
   var checkInfoComment = $("#checkInfoComment").val();
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfoComment,id:sessionUserId,start:start,limit:limit},
			dataType: 'json',
			success: function (result) {
				//查询当前会员类型  没有默认第一个  有直接跳转到  
				var message=result.message;
				if (result.statusCode==='0'){
					
				}else{
					//查询信息
					
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
        <div class="evaluate">
            <div class="weui-panel">
                <a class="weui-cell weui-cell_access" href="">
                    <div class="weui-cell__bd">
                        <p>宁夏亿次元科技网站销售 <span id="price" class="red">44元</span></p>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <div class="height1px"></div>
                <article class="weui-article">
                <section>
                    <p id="evaluate-content">
                                              新能源“空铁”项目总设计师、中科院院士翟婉明告诉
                                                澎湃新闻（www.thepaper.cn），此前德国和日本虽
                                                然已经拥有“空铁”相关技术，但其动力采用高压电网
                                                ，而中国研制的首列新能源“空铁”，创造性地用锂电
                    </p>
                </section>
                    <section>
                        <p id="description">描述评级：<span id="description-raty" data-score="3"></span></p>
                        <p id="logistic">物流评级：<span id="logistic-raty"data-score="4" ></span></p>
                        <p id="server">服务评级：<span id="server-raty" data-score="5"></span></p>
                        </section>
                    <section id="content-img" >
                        <p>
                            <img src="../Public/img/test1.png" alt="">
                            <img src="../Public/img/test1.png" alt="">
                        </p>
                        </section>
                        <section>
                         <p id="article-date" class="float-right">2016-11-23</p>
                         </section>
                </article>
            </div>
            <div class="weui-panel">
                <a class="weui-cell weui-cell_access" href="">
                    <div class="weui-cell__bd">
                        <p>宁夏亿次元科技网站销售 <span id="price" class="red">44元</span></p>
                    </div>
                    <div class="weui-cell__ft"></div>
                </a>
                <div class="height1px"></div>
                <article class="weui-article">
                <section>
                    <p id="evaluate-content">
                                              新能源“空铁”项目总设计师、中科院院士翟婉明告诉
                                                澎湃新闻（www.thepaper.cn），此前德国和日本虽
                                                然已经拥有“空铁”相关技术，但其动力采用高压电网
                                                ，而中国研制的首列新能源“空铁”，创造性地用锂电
                    </p>
                </section>
                    <section>
                        <p id="description">描述评级：<span id="description-raty" data-score="3"></span></p>
                        <p id="logistic">物流评级：<span id="logistic-raty"data-score="4" ></span></p>
                        <p id="server">服务评级：<span id="server-raty" data-score="5"></span></p>
                        </section>
                    <section id="content-img" >
                        <p>
                            <img src="../Public/img/test1.png" alt="">
                            <img src="../Public/img/test1.png" alt="">
                        </p>
                        </section>
                        <section>
                         <p id="article-date" class="float-right">2016-11-23</p>
                         </section>
                </article>
            </div>
            </div>
        </div><!--main-->
    </div><!--app-->
</body>
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