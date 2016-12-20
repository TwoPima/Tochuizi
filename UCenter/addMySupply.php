<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-我的供求</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
    <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/addmysupply.css"/>
    <style>
        #imging{
            height:100%;
        }
        #imging li{
            width:50px;
            height:50px;
        }
        #imging li img{
            width:50px;
            height:50px;
        }
    </style>
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
                <input type="text" name="title" placeholder="这里是标题"><br>

                <ul id="imging">

                </ul><br>
                <div id="cate"></div><br>

                <textarea name="desc" id="" cols="30" rows="10"></textarea><br>
                <input type="radio"  name="is_true" checked value="1">供应
                <input type="radio" name="is_true" value="1">求购<br>
                价格<input type="text" name="price"><br>
                联系电话：<input type="text" name="mobile"><br>
                选择文件<input type="file" class="file" name="image_url" id="file" multiple size="80"/>

               <!-- <input type="button" value="上传图片" onclick="imgSave()"/><br/>
                <canvas id="canvas" width="400" height="300"></canvas>-->
                <!--
                <p>
                    <label>请选择一个文件：</label>
                    <input type="file" id="file"/>
                    <input type="button" value="读取图像" onclick = "readPicture()" id="btnReadPicture"/>
                </p>
                <div id="result"></div>-->
             <!--   <p>
                    <label>请选择一个文件：</label>
                    <input type="file" id="file" />
                    <input type="button" value="读取图像" onclick = "readAsDataURL()"/>
                    <input type="button" value="读取二进制数据" onclick = "readAsBinaryString()"/>
                    <input type="button" value="读取文本文件" onclick = "readAsText()"/>
                </p>
                <div id="result"></div>


                选择文件<input type="file" id="file" multiple size="80"/>
                <input type="button" onclick="ShowFileName();" value="文件上传"/>
                文件字节长度:<span id="size"></span><br/>
                文件类型:<span id="type"></span>-->

              <!--  <div class="weui-cells">
                    <div class="weui-uploader">
                        <div class="weui-uploader__bd">
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple />
                            </div>
                        </div>
                    </div>
                </div>-->
            </form>



            <div class="height20px"></div>
            <div class="button-sp-area">
                <a href="javascript:;" class="weui-btn weui-btn_plain-default " id="btn-custom-theme">按钮</a>
            </div>
            </div>
        </div><!--main-->
    </div><!--app-->
</body>

<input value="<?php echo md5(date('Ymd')."my_supply"."tuchuinet");?>"	type="hidden" id="checkInfo"/>
<input value="<?php echo md5(date('Ymd')."supply_cat"."tuchuinet");?>"	type="hidden" id="supply_cat"/>
<script src="../Public/js/require.config.js"></script>
<script src="../Public/js/jquery-2.1.4.js"></script>
<script src="../Public/js/jquery-session.js"></script>
<script>
    var open=0;
    /*图片上传无刷新预览*/
    window.onload = function(){
        var i = 1;
        // 选择图片
        document.getElementsByClassName('file')[0].onchange = function(){
            var count_li = $("#imging").children().length;
            if(count_li == '5'){
                $("#file").css('display','none');
            }
            compress(event, function(base64Img){
                $('#test'+i).attr('src',base64Img);
                $('#testinput'+i).val(base64Img);
                i++;
                return;
//                $('#test'+i).attr('src', '{pigcms::STATICS}/voteimg/img/upimg_loading.gif');
              /* $.ajax({
                    'url' : "/index.php?g=Wap&m=Custom&a=ajaxImgUpload&id={pigcms:$url_param['id']}&token={pigcms:$url_param['token']}&wecha_id={pigcms:$url_param['wecha_id']}",
                    'type' : 'post',
                    'data' : {'base64Img' : base64Img},
                    'success' : function(ret){
                        //拿到php传过来的图片地址
                        console.log(ret.img);
                        $('#test'+i).attr('src',ret.img);
                        $('#testinput'+i).val(ret.img);
                        i++;
                        return;
                    }
                });*/
            });

        }
        function compress(event, callback){
            var file = event.currentTarget.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = '';
                html += '<li class="imgaeshow'+i+' imgaeshow"><input type="hidden" id="testinput'+i+'" name="testinput[]"><p class="showimg'+i+' showimg" id="showimg'+i+'"><img src="" id="test'+i+'"><img src="" id="testnone'+i+'"><span class="upload_delete" title="删除" style="display: block;" onclick="upload_delete(this)"></span></p></li>';
                /*  html += '<li class="imgaeshow'+i+' imgaeshow">' +
                    '<input type="hidden" id="testinput'+i+'" name="testinput[]">' +
                    '<p class="showimg'+i+' showimg" id="showimg'+i+'">' +
                    '<img src="" id="test'+i+'">'+
                    '<img src="" id="testnone'+i+'">' +
                    '<span class="upload_delete" title="删除" style="display: block;" onclick="upload_delete(this)">' +
                    '</span></p></li>';*/
                $("#imging").prepend(html);
                console.log(html);
                var image = $('#testnone'+i);
                image.on('load', function () {
                    var square = 700;
                    var canvas = document.createElement('canvas');
                    if(this.width > square) {
                        canvas.width = square;
                        canvas.height = Math.round(square * this.height / this.width);
                    } else {
                        canvas.height = this.height;
                        canvas.width = this.width;
                    }
                    var context = canvas.getContext('2d');
                    context.clearRect(0, 0, square, square);
                    var imageWidth = canvas.width;
                    var imageHeight = canvas.height;
                    var offsetX = 0;
                    var offsetY = 0;
                    if (this.width > square) {
                        offsetX = - Math.round((imageWidth - square) / 2);
                    }
                    context.drawImage(this, offsetX, offsetY, imageWidth, imageHeight);
                    var data = canvas.toDataURL('image/jpeg');
                    console.log(e.target.result);
                    callback(e.target.result);
                });
                image.hidden = true;
                image.attr('src', e.target.result);
                image.css('display','none');
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<script>

</script>
<script>
$(function(){
	sessionUserId=$.session.get('userId');
	if(sessionUserId=='undefined'){
		$.toptip('您还没有登陆！',2000, 'error');
		window.location.href='../Login/login.php';
	}else {
        var supply_cat = $("#supply_cat").val();
        var id=sessionUserId;

        var url = HOST + 'mobile.php?c=index&a=supply_cat';
        $.ajax({
            type: 'post',
            url: url,
            data: {checkInfo:supply_cat},
            dataType: 'json',
            success: function (result) {
                if (result.statusCode === '0') {
                    $.toptip(message, 2000, 'error');
                } else {
                    console.log(result);
                    console.log(result.data);
                    var cate_num = result.data.length;
                    var cate = result.data;
                    var html='';
                    for(var i=0;i<cate_num;i++){
                        html+='<input type="radio" name="cate_id" value="'+cate[i]['cate_id']+'">'+cate[i]['cate_name'];
                    }
                    $('#cate').html(html);
                    open=1;
                    var message = result.message;
                    //数据取回成功
                    console.log(message);
                    var mobile = $.session.get('mobileSession');

                }
            },
        });
    }
});
 //提交，最终验证。btn-custom-theme
 $("#btn-custom-theme").click(function() {
        sessionUserId=$.session.get('userId');
        var id_session=sessionUserId;
        var url =HOST+'mobile.php?c=index&a=my_supply';
        var checkInfo = $("#checkInfo").val();
        var title = $("input[name=title]").val();
        var cate_id = $("input[name=cate_id]").val();
        var is_true = $("input[name=is_true]").val();
        var price = $("input[name=price]").val();
        var mobile = $("input[name=mobile]").val();
        var desc = $("textarea[name=desc]").val();
        var image_url = $("input[name=image_url]").val();
   /*     if(mobile==""|| nickname==""){
       		$.toptip('手机号昵称均不能为空！', 200, 'warning');
       	    return false; 
       	 }*/
		 $.ajax({
			type: 'post',
			url: url,
			data: {
                id_ad:id_session,
                checkInfo:checkInfo,
                supply_id:'',
                dotype:'add',
                title:title,
                cate_id:cate_id,
                is_true:is_true,
                price:price,
                mobile:mobile,
                desc:desc,
                image_url:image_url
            },
			dataType: 'json',
			success: function (result) {
                alert('123');
                console.log(result);
				/*var message=result.message;
				if (result.statusCode==='0'){
					$.toptip(message,2000, 'error');
				}else{
					$.toptip(message,2000, 'success');
					window.location.href='./UCenter/index.php';
				}*/
			},
		});
});
</script>
</html>
<!--
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
                            <div class="weui-textarea-counter"><span>0</span>/200</div>-->

<!--</div>
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
-->