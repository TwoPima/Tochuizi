<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-地址管理</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Public/css/weui.css">
	<link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
	<link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
	<link rel="stylesheet" href="../Public/css/center.css"/>
	<link rel="stylesheet" href="../Public/css/common.css"/>
          <script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script src="../Public/js/fastclick.js"></script>
<script src="../Public/js/common.js"></script>
<script src="../Public/js/jquery-weui.min.js"></script>
<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfoAddress"/>  
<script>
	sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
//已经登陆 去服务器比对sessionid
var url =HOST+'mobile.php?c=index&a=my_address';
 $.ajax({
		type: 'post',
		url: url,
		data: {checkInfo:$("#checkInfoAddress").val(),id:sessionUserId,dotype:''},
		dataType: 'json',
		success: function (result) {
			var message=result.message;
			var tips=result.message;
			if (result.statusCode=='0'){
				$.toptip(tips,2000, 'error');
			}else{
				//数据取回成功
				   $.each(result.data, function (index, obj) {
				var addressHtml='<div class="weui-cell"><div class="weui-cell__bd region-main"><p class="region-title"><span id="name">'+obj.name+'</span> <span id="tel">'+obj.mobile+'</span></p><p class="region-content clear">'+obj.area+obj.address+'</p></div><div class="weui-cell__bd region-right-icon"><a href="editRegion.php?adr_id='+obj.id+'"><p class="region-right"><img alt="" src="../Public/img/edit.png"></p></a></div><div style="line-height:67px;"class="del-btn"><a onClick="confirmDelete('+obj.id+');" >删除</a></div></div>';
				 $(".weui-cells").append(addressHtml);
				   });
			} 
		}
	});
 function confirmDelete(id,name){
	 alert(id);
	 $.confirm({
		  title: '确认删除',
		  text: name,
		  onOK: function () {
		    //点击确认
			    delData(id,$("#checkInfoAddress").val());
		  },
		  onCancel: function () {
			  return false;
		  }
		});/* 
	  	$.Dialog.confirmBox('温馨提示','确认删除？',{rightCallback:function(){
	  		$.Dialog.loading();
	  		$.get(url,function(res){
	  			  setTimeout(function(){
	  				 location.reload();	
	  			},1500);  	
	  	    });
		}}); */
	  }
	//删除
 function  delData(id,checkInfo){
 	var url =HOST+'mobile.php?c=index&a=my_address';
	 alert(id);
 	 $.ajax({
 			type: 'post',
 			url: url,
 			data: {checkInfo:checkInfo,id:sessionUserId,dotype:'del',adr_id:id},
 			dataType: 'json',
 			success: function (result) {
 				var message=result.message;
 				var tips=result.message;
 				if (result.statusCode=='0'){
 					$.toast("删除错误，请重试", "cancel");
 				}else{
 					//$.toast("删除成功");
 					 setTimeout(function(){
 		  				 location.reload();	
 		  			},1500); 
 				} 
 			}
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
	                  	    <span class="title">地址管理</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href="addRegion.php"><span>新增</span></a>
                </div>
		</div>
		<div class="region">
			<div class="weui-cells">
			
			</div>
</div><!--app-->
</body>
<script>
/*
 * 描述：html5苹果手机向左滑动删除特效
 */
window.addEventListener('load',function(){
     var initX;        //触摸位置
    var moveX;        //滑动时的位置
     var X = 0;        //移动距离
    var objX = 0;    //目标对象位置
    window.addEventListener('touchstart',function(event){
         event.preventDefault();
        var obj = event.target.parentNode;
        //alert(obj.className);
         if(obj.className == "weui-cell"||obj.className == "weui-cell__bd"){
            initX = event.targetTouches[0].pageX;
             objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
         }
       if( objX == 0){
            window.addEventListener('touchmove',function(event) {
                 event.preventDefault();
                var obj = event.target.parentNode;
                if (obj.className == "weui-cell"||obj.className == "weui-cell__bd") {
                    moveX = event.targetTouches[0].pageX;
                     X = moveX - initX;
                    if (X >= 0) {
                         obj.style.WebkitTransform = "translateX(" + 0 + "px)";
                   }
                    else if (X < 0) {
                        var l = Math.abs(X);
                         obj.style.WebkitTransform = "translateX(" + -l + "px)";
                        if(l>80){
                            l=80;
                           obj.style.WebkitTransform = "translateX(" + -l + "px)";
                        }
                     }
                 }
             });
        }
        else if(objX<0){
          window.addEventListener('touchmove',function(event) {
                 event.preventDefault();
                var obj = event.target.parentNode;
                 if (obj.className == "weui-cell"||obj.className == "weui-cell__bd") {
                     moveX = event.targetTouches[0].pageX;
                    X = moveX - initX;
                     if (X >= 0) {
                         var r = -80 + Math.abs(X);
                         obj.style.WebkitTransform = "translateX(" + r + "px)";
                        if(r>0){
                             r=0;
                             obj.style.WebkitTransform = "translateX(" + r + "px)";
                         }
                     }
                     else {     //向左滑动
                        obj.style.WebkitTransform = "translateX(" + -80 + "px)";
                     }
                }
            });
        }

    })
     window.addEventListener('touchend',function(event){
        event.preventDefault();
        var obj = event.target.parentNode;
        if(obj.className == "weui-cell"||obj.className == "weui-cell__bd"){
             objX =(obj.style.WebkitTransform.replace(/translateX\(/g,"").replace(/px\)/g,""))*1;
             if(objX>-40){
                obj.style.WebkitTransform = "translateX(" + 0 + "px)";
                 objX = 0;
            }else{
                 obj.style.WebkitTransform = "translateX(" + -80 + "px)";
                objX = -80;
             }
         }
      })
 })
</script>
</html>