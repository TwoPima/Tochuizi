<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-发布求职</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.min.css"/>
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
    <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/addJob.css"/>
	<!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
    <script src="../Public/js/require.config.js"></script>
    <script src="../Public/js/jquery-2.1.4.js"></script>
    <script src="../Public/js/jquery-session.js"></script>
    <script src="../Public/js/jquery-weui.min.js"></script>
    <script src="../Public/js/fastclick.js"></script>
    <script src="../Public/js/common.js"></script>
    <input value="<?php echo md5(date('Ymd')."my_recruit"."tuchuinet");?>"	type="hidden" id="checkInfo"/> <!--t添加信息-->
    <input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>
    <!--do 添加：add，修改：edit，获取：gain -->
    <input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>
   <input value="<?php echo md5(date('Ymd')."get_area"."tuchuinet");?>"	type="hidden" id="checkInfoArea"/>
    <script>
    sessionUserId=$.session.get('userId');
    memberType=$.session.get('idType');
    if(sessionUserId=='undefined'){
        //没有登陆
        $.toptip('您还没有登陆！',2000, 'error');
        window.location.href='../Login/login.php';
    }

$(function(){
	 var dpProvince = $("#dpProvince");
	    var dpCity = $("#dpCity");
	    var dpArea = $("#dpArea");
	    //填充省的数据
	    loadAreasProvince($("#checkInfoArea").val(), 0);
	    //给省绑定事件，触发事件后填充市的数据
	    jQuery(dpProvince).bind("change keyup", function () {
	        var provinceID = dpProvince.prop("value");
	        $("#dpArea").empty();
	        $("#dpCity").empty();
	        loadAreasCity($("#checkInfoArea").val(), provinceID);
	        dpCity.fadeIn("slow");
	    });
	    //给市绑定事件，触发事件后填充区的数据
	    jQuery(dpCity).bind("change keyup", function () {
	        var cityID = dpCity.prop("value");
	        loadAreasDistrict($("#checkInfoArea").val(), cityID);
	        dpArea.fadeIn("slow");
	    });
		
    jobValueTime($("#checkInfoZidian").val());//有效期
    jobDayWages($("#checkInfoZidian").val());//薪资要求
    getBenefit($("#checkInfoZidian").val());//福利
    judgeJobType(memberType,1);//{设计特长，工种类别  ，专业类型 1增加 2是编辑;页面显示}
    JobType($("#checkInfoJobType").val(),memberType);//提取具体类别信息
    //文本框失去焦点后
   $('form :input').blur(function(){
        //验证手机
        if( $(this).is('#mobile') ){
            if(!(/^1(3|4|5|7|8)\d{9}$/.test(this.value))){
                $.toptip('手机号码有误，请重填！', 2000, 'warning');
                return false;
            }
        }
        //验证邮件
        if( $(this).is('#email') ){
            if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                $.toptip('邮箱地址有误，请重填！', 2000, 'warning');
                return false;
            }
        }
    });
    //提交，最终验证。
    $("#btn-custom-theme").click(function() {
        var mobile = $("#mobile").val();
        var title = $("#title").val();
        var bei = $("#desc").val();
        var email = $("#email").val();
        var cate_id=$('#job_type option:selected').val();
        var valuetime=$('#valuetime option:selected').val();
        var wages=$('#wages option:selected').val();
        var area=$('#dpArea option:selected').val();

        var url =HOST+'mobile.php?c=index&a=my_recruit';
        var benefit = $("input:checkbox[name='benefit']:checked").map(function(index,elem) {
			 return $(elem).val();
		 }).get().join(',');//复选框处理
		 if(!(/^1(3|4|5|7|8)\d{9}$/.test($("#mobile").val()))){
			 $.toptip('手机号码有误，请重填！', 2000, 'warning');
			 $(document).scrollTop(0);
			 return false;
		 }
		 if( $("#email").val()=="" || ($("#email").val()!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test($("#email").val()) ) ){
           $.toptip('邮箱地址有误，请重填！', 2000, 'warning');
           $(document).scrollTop(0);
           return false;
         }
		 $.showLoading('正在添加');
			setTimeout(function() {
				$.hideLoading();
		}, 3000)
        $.ajax({
            type: 'post',
            url: url,
            data: {
                mobile:mobile,id:sessionUserId,checkInfo:$("#checkInfo").val(),cate_id:cate_id,
                dotype:'add',title:title,email:email,area:area,wages:wages,valuetime:valuetime,benefit:benefit,
                bei:bei
            },
            dataType: 'json',
            success: function (result) {
                var message=result.message;
                if (result.statusCode=='0'){
                    $.toptip(message,2000, 'error');
                    $(document).scrollTop(0);
                }
                if (result.statusCode=='1'){
              	  $.toast('操作成功');
          			setTimeout(function() {
                        window.location.href='myJob.php';
              		}, 3000)
                }
                  
            },
        });
    });
});
</script>
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title">发布求职</span>
            </a>
        </div>
        <div id="header-right">
        </div>
    </div>
    <div style="clear: both"></div>
    <div id="job_mainpush">
        <form>
            <div class="push_box push_pinfo">
                <div class="weui-cells weui-cells_form" style="margin-top: 0;">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="title"  id="title" placeholder="输入标题">
                    </div>
                     <div class="height1px"></div>
                </div>
                    <div class="weui-cell ">
                        <div class="weui-cell__hd">
                            <label class="weui-label">手机</label>
                        </div>
                        <div class="weui-cell__bd">
                            <input class="weui-input" name="mobile"  id="mobile" type="tel" >
                        </div>
                    </div>
                    <div class="weui-cell ">
                        <div class="weui-cell__hd">
                            <label class="weui-label">邮箱</label>
                        </div>
                        <div class="weui-cell__bd">
                            <input class="weui-input"  name="email"  id="email" type="email" />
                        </div>
                    </div>
                      <div class="weui-cell weui-cell_select weui-cell_select-after" id="skillCate">
                            <div class="weui-cell__hd">
                                <label for="" class="weui-label">工种</label>
                            </div>
                            <div class="weui-cell__bd">
                                <select class="weui-select" name="job_type"  id="job_type" >
                                </select>
                            </div>
                        </div>
                    <div class="weui-cell weui-cell_select weui-cell_select-after" id="designCate" >
                            <div class="weui-cell__hd">
                                <label for="" class="weui-label">设计特长</label>
                            </div>
                            <div class="weui-cell__bd">
                                <select class="weui-select" name="job_type"  id="job_type" >
                                </select>
                            </div>
                        </div>
                    <div class="weui-cell weui-cell_select weui-cell_select-after"  id="professionCate">
                            <div class="weui-cell__hd">
                                <label for="" class="weui-label">专业类别</label>
                            </div>
                            <div class="weui-cell__bd">
                                <select class="weui-select" name="job_type"  id="job_type" >
                                </select>
                            </div>
                        </div>
                </div>
            </div>

            <div class="push_box push_daiyu">
                <div class="weui_cell weui-cell_select weui-cell_select-after">
                    <div class="weui_cell_hd"><label class="weui_label font14px ">期望工作地</label></div>
                    <div class="weui_cell_bd weui_cell_primary font14px custom-select">
                        <select class="area" name="dpProvince" id="dpProvince">
                        </select>
                        <select class="area" name="dpCity" id="dpCity">
                        </select>
                        <select class="area" name="area" id="dpArea">
                        </select>
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">薪资要求:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="wages"  id="wages" >
                        </select>
                    </div>
                </div>
              
                  <div class="weui-cell textarea-cell">
                        <div class="weui-cell__bd">
                           <div class="push_checkbox" id="benefit"><!--多选框-->
              		  		</div>
                        </div>
                  </div>
                    </div>
            <div class="push_box">
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">有效时间:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="valuetime" id="valuetime">
                        </select>
                    </div>
                </div>
            </div>

            <div class="push_box push_beizhu">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">备注</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" name="desc" id="desc" placeholder="可选">
                    </div>
                </div>
            </div>
            <div class="sure_button">
                <a id="btn-custom-theme" class="weui-btn">确&nbsp;&nbsp;定</a>
            </div>
        </form>
    </div><!--main-->
</div><!--app-->
</body>
</html>