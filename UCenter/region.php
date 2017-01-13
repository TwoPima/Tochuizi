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
	<script src="../Public/js/jquery-weui.min.js"></script>
	<script type="text/javascript" src="../Public/js/vue.min.js"></script>
	<script type="text/javascript" src="../Public/js/vue-resource.js"></script>
	<script src="../Public/js/fastclick.js"></script>
	<script src="../Public/js/common.js"></script>
	<input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
	<input value="<?php echo md5(date('Ymd')."my_address"."tuchuinet");?>"	type="hidden" id="checkInfoAddress"/>
	<input value="<?php echo md5(date('Ymd')."find_category"."tuchuinet");?>"	type="hidden" id="find_category"/>
	<script>
	sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
	$(function(){
	//已经登陆 去服务器比对sessionid
	new Vue({
		el: '#app',
		data: {
			listData: {},
			myAddress:'',
			dataNull:'',
			url:{
				checkInfo:$("#checkInfoAddress").val(),
				id:sessionUserId,
				dotype:''
			}
		},
		/*初始化，el控制区域，  */
		ready: function() {
			var that = this;
			that.$http.get(HOST+'mobile.php?c=index&a=my_address',that.url).then(function (response) {
				var res = response.data; //取出的数据
				//如果数据为空
				if (res.statusCode==0){
					that.$set('dataNull', 2);
				}
				//如果数据不为空
				if(res.statusCode==1) {
					that.$set('dataNull', 1);
					that.$set('listData', res.data);  //把数据传给页面
				}
			});
		},//created 结束
		methods: {
			jump_url: function (msg1){
				window.location.href='editRegion.php?adr_id='+msg1;
			}
		}
	});
	Vue.filter('detailAddress', function (value) {
		var a;
		$.ajax({
			type: 'post',
			url: HOST+'mobile.php?c=allcategory&a=find_category',
			data: {checkInfo:$("#find_category").val(),moudle:'7',cate_id:value},
			dataType: 'json',
			asyn:false,
			success: function (result) {
				if (result.statusCode=='0'){
					//没有地址
				}
				if (result.statusCode=='1'){
					dataJson=eval('(' + result.data+')');
					myAddress=dataJson.top.name+dataJson.two.name+dataJson.name;
					a=myAddress;
					console.log(myAddress);
				}
			}

		});
		return a;
	});
	});
 function confirmDelete(id,name){
	 $.confirm({
		  title: '确认删除',
		  text: name,
		  onOK: function () {
			  delData(id,$("#checkInfoAddress").val());
		  },
		  onCancel: function () {
			  return false;
		  }
		});
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
				<template v-if="dataNull==1">
					<template v-for="item in listData ">
						<div class="weui-cell" v-on:click="jump_url(item.id)">
							<div class="weui-cell__bd region-main">
								<p class="region-title">
									<span id="name">{{item.name}}</span>
									<span id="tel">{{item.mobile}}</span>
								</p>
								<p class="region-content clear">{{item.area|detailAddress}}{{item.address}}</p>
							</div>
							<div class="weui-cell__bd">
								<a>
									<p  style="width:100px;float: right;"class="region-right">
										<img alt="" src="../Public/img/edit.png">
									</p>
								</a>
							</div>
							<div style="line-height:58px;"class="del-btn">
								<a onClick="confirmDelete({{item.id}});" >删除</a>
							</div>
						</div>
					</template>
				</template>
				<template v-if="dataNull==2">
					<div class="nodata">
						<img src="../Public/img/no-info.png">
						<div class="height20px"></div>
						<p>暂时还没有地址数据！</p>
						<div class="height20px"></div>
					</div>
				</template>
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
if ('addEventListener' in document) {
  document.addEventListener('DOMContentLoaded', function() {  
  FastClick.attach(document.body);  
}, false);  
}
//如果你想使用jquery
$(function() {
  FastClick.attach(document.body);  
});
</script>
</html>