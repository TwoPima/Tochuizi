<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人主页-我的收藏</title>
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
        <!--jquery WEUI  -->
        <link rel="stylesheet" href="../Public/css/weui.css">
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
   <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
   <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
   <link rel="stylesheet" href="../Public/css/center.css"/>
     <link rel="stylesheet" href="../Public/css/common.css"/>
 <input value="<?php echo md5(date('Ymd')."favorite_list"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
 <input value="<?php echo md5(date('Ymd')."dd_favorite"."tuchuinet");?>"	type="hidden" id="checkInfoAddFavorite"/>
 <input value="<?php echo md5(date('Ymd')."sum_count"."tuchuinet");?>"	type="hidden" id="sum_count"/>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/require.config.js"></script>
 <script src="../Public/js/jquery-weui.min.js"></script>
 <script src="../Public/js/fastclick.js"></script>
  <script src="../Public/js/common.js"></script>
<!-- 拓展插件 -->
<script src="../Public/js/jquery-session.js"></script>
  <script type="text/javascript" src="../Public/plugins/raty-2.5.2/lib/jquery.raty.min.js"></script>
<script>
	 sessionUserId=$.session.get('userId');
	mobile=$.session.get('mobileSession');
	if(sessionUserId==null){
		//没有登陆  
		window.location.href='../Login/login.php';
	}
    //已经登陆 去服务器比对sessionid
	 getSupplyCollectNumber($('#sum_count').val(),sessionUserId);//获取统计合计
    var url =HOST+'mobile.php?c=index&a=favorite_list';
    var checkInfo=$("#checkInfo").val();
    listCollect(sessionUserId,1,checkInfo,0,10);//type 1:商品，2：供求,0：店铺
   // listCollect(sessionUserId,2,checkInfo,0,10);//type 1:商品，2：供求,0:店铺
    listCollect(sessionUserId,0,checkInfo,0,10);//type 1:商品，2：供求,0:店铺
  	function listCollect(id,type,checkInfo,start,limit){
 		 var url =HOST+'mobile.php?c=index&a=favorite_list';
 		 $.ajax({
      		type: 'post',
      		url: url,
      		data: {checkInfo:checkInfo,id:sessionUserId,limit:limit,start:start,type:type},
      		dataType: 'json',
      		success: function (result) {
      			var message=result.message;
      			console.log(message);
      			if (result.statusCode=='0'){
      				//$.toptip(tips,2000, 'error');
      			}else{
      				//数据取回成功
     				 $.each(result.data, function (index,obj) {
    					 var one='<div class="weui_media_hd" style=" border-radius:50%; overflow:hidden;"><a data-id="" href="javascript:void(0);"><img class="weui_media_appmsg_thumb" src="" alt=""></a></div><div class="weui_media_bd"><h4 class="weui_media_title">'+obj.name+'</h4><p class="weui_media_desc" id="shop-ratyStar" data-score="4"></p><p class="weui_media_desc fujin"><span><i class="icon iconfont icon-fujin1"></i></span><span>'+obj.area+'</span><span><100米</span></p></div>';
    					$('#collect-html-content').append(one);
    		            });
      			} 
      		}
      	}); 
  	}
</script>
</head>
<body >
<div id="app">
		<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的收藏</span>
	               	 </a>
 				</div>
                <div id="header-right">
                	<a href=""><span></span></a>
                </div>
		</div>
		<!-- 主体 -->
		<div class="collect">
				<div class="collect_count">
					<p class="float-left">
						<img src="../Public/img/collect/collect-icon.png">
						</p>
					<h2 class="count_number float-left"></h2>
					<p class="count-left">
						商铺<span class="shop_num"></span>家,
						商品<span class="product_num"></span>件,
						供求<span class="supply_num"></span>条,
					</p>
				</div>
		    <div class="weui_tab">
				  <div class="weui_navbar">
				    <a href="#shop" class="weui_navbar_item weui_bar_item_on">店铺
				    </a>
				    <a href="#product" class="weui_navbar_item">商品
				    </a>
				    <a href="#supply" class="weui_navbar_item">供求
				    </a>
				  </div>
			  <div class="weui_tab_bd">
			       <div class="weui_panel weui_panel_access">
					  <div class="weui_panel_bd">
			  		  <div id="shop" class="weui_tab_bd_item weui_tab_bd_item_active">
					    <div class="weui_media_box weui_media_appmsg" id="collect-html-content">
					      
					    </div>
					  </div>
			    <div id="product" class="weui_tab_bd_item">
			      <div class="weui_media_box weui_media_appmsg" id="collect-html-content">
					      <div class="weui_media_hd" style=" border-radius:50%; overflow:hidden;">
					        <a><img class="weui_media_appmsg_thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
					        </a>
					      </div>
					      <div class="weui_media_bd">
					        <h4 class="weui_media_title">银川市东二环昆仑钢材市场2</h4>
					        <p class="weui_media_desc" id="product-ratyStar" data-score="4"></p>
					        <p class="weui_media_desc fujin"><span><i class="icon iconfont icon-fujin1"></i></span><span>宁夏银川金凤区</span><span><100米</span></p>
					      </div>
				      </div>
			    </div>
			    <div id="supply" class="weui_tab_bd_item">
			      <div class="weui_media_box weui_media_appmsg" id="collect-html-content">
					     <div class="weui_media_hd" style=" border-radius:50%; overflow:hidden;">
					        <a id="img-thumb"data-id=""><img class="weui_media_appmsg_thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
					        </a>
					      </div>
					      <div class="weui_media_bd">
					        <h4 class="weui_media_title">银川市东二环昆仑钢材市场3</h4>
					        <p class="weui_media_desc" id="supply-ratyStar" data-score="4"></p>
					        <p class="weui_media_desc fujin"><span><i class="icon iconfont icon-fujin1"></i></span><span>宁夏银川金凤区</span><span><100米</span></p>
					      </div>
					</div>
			    </div>
			  </div>
		    	</div>
			    </div>
				</div>
   		 </div>
</div>
</body>
<script type="text/javascript">
$(function() {
    $.fn.raty.defaults.path = '../Public/plugins/raty-2.5.2/lib/img';
    $('#shop-ratyStar').raty({ 
    	  score: function() { 
    	    return $(this).attr('data-score'); 
    	  } 
    	}); 
    $('#product-ratyStar').raty({ 
    	  score: function() { 
    	    return $(this).attr('data-score'); 
    	  } 
    	}); 
    $('#supply-ratyStar').raty({ 
    	  score: function() { 
    	    return $(this).attr('data-score'); 
    	  } 
    	}); 
});
var checkInfoAddFavorite=$("#checkInfoAddFavorite").val();
$("#shop-ratyStar").click(function(){
	var read_id=$("#img-thumb").attr(data-id);
	addCollect(sessionUserId,checkInfoAddFavorite,type,read_id);
});
$("#product-ratyStar").click(function(){
});
//添加收藏
function addCollect(id,checkInfo,type,read_id){
	
}
</script>
</html>