<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-查看物流</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="../Public/css/weui.min.css"/>
	 <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
	 	<link rel="stylesheet" href="../Public/css/jquery-weui.min.css">
        <link rel="stylesheet" href="../Public/css/center.css"/>
          <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
          <link rel="stylesheet" href="../Public/css/common.css"/>
        <style>
        #ordertrack td {
            vertical-align: top;
        }
        #odlist, #orderstate, #process, #ordertrack, #orderinfo {
            color: #333;
        }
        #mohe-kuaidi_new .mh-icon-new {
            background-position: 0 -58px;
            height: 18px;
            left: -20px;
            margin-left: -41px;
            margin-top: -9px;
            position: absolute;
            top: 1.5em;
            width: 41px;
        }
 
        #mohe-kuaidi_new .mh-icon {
            background: url("http://p9.qhimg.com/d/inn/f2e20611/kuaidi_new.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
        }
 
        h1, h2, h3, h4, h5, h6, input, textarea, select, cite, em, i, b, strong, th {
            font-size: 100%;
            font-style: normal;
        }
 
        #mohe-kuaidi_new .mh-list-wrap .mh-list li.first {
            color: #3eaf0e;
        }
 
        #mohe-kuaidi_new .mh-list-wrap .mh-list li {
            color: #666;
        }
 
        p, form, ol, ul, li, h3, menu {
            list-style: outside none none;
        }
 
        .result .res-list, .result-d .res-d-list {
            font-size: 13px;
            line-height: 20px;
        }
    </style>
</head>
<body>
    <style>
        /*#mohe-kuaidi_new ::-webkit-scrollbar {
            width: 10px;
        }
 
        #mohe-kuaidi_new ::-webkit-scrollbar-track-piece {
            background-color: #eee;
        }
 
        #mohe-kuaidi_new ::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border: 1px solid #ccc;
        }*/
 
        #mohe-kuaidi_new .mh-wrap {
            margin: 6px 0;
        }
 
            #mohe-kuaidi_new .mh-wrap a {
                text-decoration: none;
            }
 
                #mohe-kuaidi_new .mh-wrap a:hover {
                    text-decoration: underline;
                }
 
        #mohe-kuaidi_new .mh-form-wrap {
            padding: 5px 15px;
        }
 
            #mohe-kuaidi_new .mh-form-wrap p {
                margin: 10px 0;
            }
 
                #mohe-kuaidi_new .mh-form-wrap p label {
                    margin-right: 10px;
                    vertical-align: middle;
                    padding: 6px 0;
                }
 
                #mohe-kuaidi_new .mh-form-wrap p input, #mohe-kuaidi_new .mh-form-wrap p select {
                    width: 186px;
                    line-height: normal;
                    border: 1px solid #ccc;
                    padding: 6px;
                    box-sizing: border-box;
                    margin: 0;
                }
 
                #mohe-kuaidi_new .mh-form-wrap p button {
                    width: 80px;
                    height: 28px;
                    border: 1px solid #ccc;
                    margin-left: 10px;
                    text-align: center;
                    color: #333;
                    font-family: "Microsoft Yahei";
                    font-size: 14px;
                    cursor: pointer;
                    background: #f7f7f7;
                    background: -moz-linear-gradient(top,#f7f7f7,#ececec);
                    background: -webkit-gradient(linear,left top,left bottom,color-stop(#f7f7f7),color-stop(#ececec));
                    background: -ms-linear-gradient(top,#f7f7f7,#ececec);
                    background: linear-gradient(to bottom,#f7f7f7,#ececec);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7f7f7',endColorstr='#ececec',GradientType=0);
                }
 
                    #mohe-kuaidi_new .mh-form-wrap p button:hover {
                        background: -moz-linear-gradient(top,#ececec,#f7f7f7);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#ececec),color-stop(#f7f7f7));
                        background: -ms-linear-gradient(top,#ececec,#f7f7f7);
                        background: linear-gradient(to bottom,#ececec,#f7f7f7);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ececec',endColorstr='#f7f7f7',GradientType=0);
                    }
 
                    #mohe-kuaidi_new .mh-form-wrap p button:active {
                        background: -moz-linear-gradient(top,#f3f3f3,#fff);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
                        background: -ms-linear-gradient(top,#f3f3f3,#fff);
                        background: linear-gradient(to bottom,#f3f3f3,#fff);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
                    }
 
            #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button {
                position: relative;
                color: transparent;
                pointer-events: none;
            }
 
                #mohe-kuaidi_new .mh-form-wrap form.mh-loading p button::after {
                    background: url(http://p1.qhimg.com/d/inn/1b1cc057/loading_s.gif) no-repeat center;
                    content: '';
                    display: inline-block;
                    width: 4em;
                    height: 20px;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    margin-left: -2em;
                    margin-top: -10px;
                }
 
            #mohe-kuaidi_new .mh-form-wrap .mh-error {
                display: none;
                color: #c00;
            }
 
                #mohe-kuaidi_new .mh-form-wrap .mh-error label {
                    visibility: hidden;
                }
 
        #mohe-kuaidi_new .mh-list-wrap {
            max-height: 0;
            _height: 0;
            --overflow: hidden;
        }
 
            #mohe-kuaidi_new .mh-list-wrap.mh-unfold {
                max-height: 281px;
                _height: 281px;
            }
 
            #mohe-kuaidi_new .mh-list-wrap .mh-list {
                border-top: 1px solid #eee;
                margin: 0 15px;
                padding: 15px 0;
            }
 
                #mohe-kuaidi_new .mh-list-wrap .mh-list ul {
                    max-height: 255px;
                    _height: 255px;
                    padding-left: 75px;
                    padding-right: 20px;
                    --overflow: auto;
                    height: 626px;
                }
 
                #mohe-kuaidi_new .mh-list-wrap .mh-list li {
                    position: relative;
                    border-bottom: 1px solid #f5f5f5;
                    margin-bottom: 8px;
                    padding-bottom: 8px;
                    color: #666;
                }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first {
                        color: #3eaf0e;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li p {
                        line-height: 20px;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li .before {
                        position: absolute;
                        left: -13px;
                        top: 2.2em;
                        height: 82%;
                        width: 0;
                        border-left: 2px solid #ddd;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li .after {
                        position: absolute;
                        left: -16px;
                        top: 1.2em;
                        width: 8px;
                        height: 8px;
                        background: #ddd;
                        border-radius: 6px;
                    }
 
                    #mohe-kuaidi_new .mh-list-wrap .mh-list li.first .after {
                        background: #3eaf0e;
                    }
 
        #mohe-kuaidi_new .mh-kd-wrap {
            position: relative;
            border-top: 1px solid #eee;
            padding: 15px;
            padding-bottom: 25px;
            background: #fafafa;
        }
 
            #mohe-kuaidi_new .mh-kd-wrap li {
                display: none;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap li.mh-selected {
                    display: block;
                }
 
            #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap {
                float: left;
                width: 50px;
                height: 50px;
                margin-right: 10px;
                overflow: hidden;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-img-wrap img {
                    width: 50px;
                }
 
            #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap {
                font-size: 13px;
                margin-left: 60px;
            }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap p {
                    margin-bottom: 8px;
                }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-name {
                    font-family: "Microsoft Yahei";
                    font-size: 14px;
                }
 
                #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a {
                    text-decoration: none;
                    margin-right: 10px;
                    padding: 2px 10px;
                    border: 1px solid #ccc;
                    color: #333;
                }
 
                    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:hover {
                        background: white;
                    }
 
                    #mohe-kuaidi_new .mh-kd-wrap .mh-info-wrap .mh-info-link a:active {
                        background: -moz-linear-gradient(top,#f3f3f3,#fff);
                        background: -webkit-gradient(linear,left top,left bottom,color-stop(#f3f3f3),color-stop(#fff));
                        background: -ms-linear-gradient(top,#f3f3f3,#fff);
                        background: linear-gradient(to bottom,#f3f3f3,#fff);
                        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f3f3',endColorstr='#ffffff',GradientType=0);
                    }
 
        #mohe-kuaidi_new .mh-slogan {
            position: absolute;
            right: 20px;
            bottom: 0;
            cursor: pointer;
        }
 
        #mohe-kuaidi_new .mh-slogan-hover {
            color: #3eaf0e;
        }
 
        #mohe-kuaidi_new .mh-slogan span {
            vertical-align: middle;
        }
 
        #mohe-kuaidi_new .mh-qrcode-wrap {
            position: absolute;
            right: 0;
            bottom: -1px;
            width: 96px;
            margin-right: -110px;
            border: 1px solid #d6d6d6;
            color: #999;
            padding: 6px;
            box-shadow: 0 1px 1px #efefef;
        }
 
        #mohe-kuaidi_new .mh-icon {
            background: url(http://p9.qhimg.com/d/inn/f2e20611/kuaidi_new.png) no-repeat 0 0;
        }
 
        #mohe-kuaidi_new .mh-icon-qr {
            background-position: 0 -17px;
            display: inline-block;
            *zoom: 1;
            width: 13px;
            height: 13px;
            vertical-align: middle;
            margin-left: 10px;
        }
 
        #mohe-kuaidi_new .mh-slogan-hover .mh-icon-qr {
            background-position: 0 0;
        }
 
        #mohe-kuaidi_new .mh-icon-t {
            position: absolute;
            left: -9px;
            bottom: 14px;
            width: 10px;
            height: 16px;
            background-position: 0 -34px;
            background-color: white;
        }
 
        #mohe-kuaidi_new .mh-icon-new {
            position: absolute;
            left: -20px;
            top: 1.5em;
            width: 41px;
            height: 18px;
            margin-left: -41px;
            margin-top: -9px;
            background-position: 0 -58px;
        }
 
        #mohe-kuaidi_new .mh-wrap .mb-search {
            text-decoration: underline;
            margin-left: 20px;
        }
 
            #mohe-kuaidi_new .mh-wrap .mb-search .mh-new {
                display: inline-block;
                width: 21px;
                height: 9px;
                margin: -1px 0 0 3px;
                background: url(http://p0.qhimg.com/t01a3bd62f6db66463c.png) no-repeat;
            }
 
        #mohe-kuaidi_new .mh-identcode {
            border-top: 1px solid #f5f5f5;
            padding: 10px 15px;
            display: none;
        }
 
            #mohe-kuaidi_new .mh-identcode .mh-img-wrap {
                float: left;
                width: 54px;
                height: 54px;
                padding: 6px;
                border: 1px solid #ccc;
                overflow: hidden;
            }
 
                #mohe-kuaidi_new .mh-identcode .mh-img-wrap img {
                    width: 54px;
                }
 
            #mohe-kuaidi_new .mh-identcode .mh-img-tip {
                margin-left: 78px;
            }
 
            #mohe-kuaidi_new .mh-identcode .mh-tip-txt {
                font-size: 13px;
                line-height: 38px;
                color: #666;
            }
 
            #mohe-kuaidi_new .mh-identcode .mh-btn-install {
                text-decoration: none;
                margin-right: 10px;
                padding: 2px 10px;
                border: 1px solid #ccc;
                color: #333;
            }
 
                #mohe-kuaidi_new .mh-identcode .mh-btn-install:hover {
                    text-decoration: none;
                }
    </style>
</head>
<body>
<div id="app">
<div id="topback-header">
 				<div id="header-left">
	 				 <a href="javascript:history.go(-1);" >
	                      <i class="icon iconfont icon-xiangzuo"></i>
	                  	    <span class="title">我的订单</span>
	               	 </a>
 				</div>
                <div id="header-right">
                </div>
		</div>
    <div id="main">
        <div class="logistics">
            <div class="weui-panel weui-panel_access">
            <!--    <div class="weui-panel__hd">图文组合列表</div>-->
                <div class="weui-panel__bd">
                    <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAeFBMVEUAwAD///+U5ZTc9twOww7G8MYwzDCH4YcfyR9x23Hw+/DY9dhm2WZG0kbT9NP0/PTL8sux7LFe115T1VM+zz7i+OIXxhes6qxr2mvA8MCe6J6M4oz6/frr+us5zjn2/fa67rqB4IF13XWn6ad83nxa1loqyirn+eccHxx4AAAC/klEQVRo3u2W2ZKiQBBF8wpCNSCyLwri7v//4bRIFVXoTBBB+DAReV5sG6lTXDITiGEYhmEYhmEYhmEYhmEY5v9i5fsZGRx9PyGDne8f6K9cfd+mKXe1yNG/0CcqYE86AkBMBh66f20deBc7wA/1WFiTwvSEpBMA2JJOBsSLxe/4QEEaJRrASP8EVF8Q74GbmevKg0saa0B8QbwBdjRyADYxIhqxAZ++IKYtciPXLQVG+imw+oo4Bu56rjEJ4GYsvPmKOAB+xlz7L5aevqUXuePWVhvWJ4eWiwUQ67mK51qPj4dFDMlRLBZTqF3SDvmr4BwtkECu5gHWPkmDfQh02WLxXuvbvC8ku8F57GsI5e0CmUwLz1kq3kD17R1In5816rGvQ5VMk5FEtIiWislTffuDpl/k/PzscdQsv8r9qWq4LRWX6tQYtTxvI3XyrwdyQxChXioOngH3dLgOFjk0all56XRi/wDFQrGQU3Os5t0wJu1GNtNKHdPqYaGYQuRDfbfDf26AGLYSyGS3ZAK4S8XuoAlxGSdYMKwqZKM9XJMtyqXi7HX/CiAZS6d8bSVUz5J36mEMFDTlAFQzxOT1dzLRljjB6+++ejFqka+mXIe6F59mw22OuOw1F4T6lg/9VjL1rLDoI9Xzl1MSYDNHnPQnt3D1EE7PrXjye/3pVpr1Z45hMUdcACc5NVQI0bOdS1WA0wuz73e7/5TNqBPhQXPEFGJNV2zNqWI7QKBd2Gn6AiBko02zuAOXeWIXjV0jNqdKegaE/kJQ6Bfs4aju04lMLkA2T5wBSYPKDGF3RKhFYEa6A1L1LG2yacmsaZ6YPOSAMKNsO+N5dNTfkc5Aqe26uxHpx7ZirvgCwJpWq/lmX1hA7LyabQ34tt5RiJKXSwQ+0KU0V5xg+hZrd4Bn1n4EID+WkQdgLfRNtvil9SPfwy+WQ7PFBWQz6dGWZBLkeJFXZGCfLUjCgGgqXo5TuSu3cugdcTv/HjqnBTEMwzAMwzAMwzAMwzAMw/zf/AFbXiOA6frlMAAAAABJRU5ErkJggg==" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">物流状态：<span class="goal">正在发往重庆</span></h4>
                            <p class="weui-media-box__desc">承运来源：<span class="">韵达物流</span></p>
                            <p class="weui-media-box__desc">运单编号：<span class="">88888888</span></p>
                            <p class="weui-media-box__desc">官方电话：<span class="">15909581102</span></p>
                        </div>
                    </a>
                </div>
        </div>
            <div class="weui-panel weui-panel_access">
            <div class="weui-panel__hd">物流跟踪</div>
                <div class="weui-panel__bd">
                <!--     <div class="weui-media-box weui-media-box_text">
                        <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                        <p class="weui-media-box__desc">2016-11-22</p>
                    </div>
                    <div class="weui-media-box weui-media-box_text">
                        <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                        <p class="weui-media-box__desc">2016-11-22</p>
                    </div>
                    <div class="weui-media-box weui-media-box_text">
                        <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                        <p class="weui-media-box__desc">2016-11-22</p>
                    </div>
                    <div class="weui-media-box weui-media-box_text">
                        <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                        <p class="weui-media-box__desc">2016-11-22</p>
                    </div> -->
      <div data-mohe-type="kuaidi_new" class="g-mohe " id="mohe-kuaidi_new">
        <div id="mohe-kuaidi_new_nucom">
            <div class="mohe-wrap mh-wrap">
                <div class="mh-cont mh-list-wrap mh-unfold">
                    <div class="mh-list">
                        <ul>
                            <li class="first">
                                <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                        		<p class="weui-media-box__desc">2016-11-22</p>
                                <span class="before"></span>
                                <span class="after"></span>
                                <i class="mh-icon mh-icon-new"></i>
                            </li>
                            <li>
                                <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                      			  <p class="weui-media-box__desc">2016-11-22</p>
                                <span class="before"></span>
                                <span class="after"></span>
                            </li>
                            <li>
                                <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                      			  <p class="weui-media-box__desc">2016-11-22</p>
                                <span class="before"></span>
                                <span class="after"></span>
                            </li>
                            <li>
                                <p class="weui-media-box__desc">[上海市]山海庄中心 <span>已经发货</span></p>
                      			  <p class="weui-media-box__desc">2016-11-22</p>
                                <span class="before"></span>
                                <span class="after"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <!-- jieshu  -->
                </div>
        </div>
        </div>
    </div><!--main-->
</div><!--app-->
</body><input value="<?php echo md5(date('Ymd')."my_resume"."tuchuinet");?>"	type="hidden" id="checkInfo"/>  
<input value="<?php echo md5(date('Ymd')."add_picture"."tuchuinet");?>"	type="hidden" id="checkInfoAddImg"/>  
<input value="<?php echo md5(date('Ymd')."del_picture"."tuchuinet");?>"	type="hidden" id="checkInfoDelImg"/>  
<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>  
<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
<input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<!--学历id：18 薪资要求：19  有效期：21 福利要求:20  -->
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
});
</script>
</html>