<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-关于土锤网</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" type="text/css"  href="../Public/css/weui.min.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/center.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="../Public/css/login.css"/>
         <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
</head>
<body id="reg">
   <div class="body-back"><img class="back-img" alt="" src="../Public//img/login/reg-bc.png">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">关于土锤网注册协议</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
		<!--内容页面  -->
		<div class="about-content clear">
				<article class="weui-article">
		    <section>
		        <section>
		            <p>
					              西周建都于镐（今西安市西）其统治中心在陕西关
					中，故其以北地区，包括内蒙河套，宁夏全境及陕
					西、山西北部称为朔方。
					春秋时期，今固原地区为乌氏戎所居，今银南地区
					以盐池为中心是朐衍戎的势力范围。
					战国时期，秦惠文王攻取乌戎地，置乌氏县（今固
					原县南泾水北岸）辖今固原地区。之后又在盐池县
					境设立朐衍县、辖今银南地区。
					秦昭襄王三十五年（公元前272年）后，两县划归
					北郡管辖，这是宁夏地区有行政设置之始。
					秦朝时宁夏为北地郡，郡治在甘肃宁县。并在此地
					修建了秦长城和秦渠，引黄河水灌溉农田。[1] 
					汉朝属朔方史部。西汉时将北地郡治往今甘肃环民
					东汉将安定郡治移至今甘肃镇原县，将北地区郡治
					移至今吴忠市利通区西南。
					十六国时期，为匈奴铁佛部首领赫连勃勃所建大夏
					国的领土。[1] 
		            </p>
		        </section>
		    </section>
		</article>
		</div>
	</div>
</body>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<script>
$(function(){
	 $.ajax({
			type: 'post',
			url: url,
			data: {checkInfo:checkInfo},
			dataType: 'json',
			success: function (result) {
				var message=result.message;
				var tips=result.message;
				if (result.statusCode=='0'){
					$.toptip(tips,2000, 'error');
				}else{
					$.toptip(tips,2000, 'success');
					window.location.href='login.php';
				} 
			}
		});
});
</script>
</html>