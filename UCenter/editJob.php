<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-编辑求职</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/weui.min.0.4.3.css"/>
    <link rel="stylesheet" href="../Public/css/jquery-weui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/center.css"/>
    <link rel="stylesheet" href="../Public/css/addJob.css"/>
    <input value="<?php echo md5(date('Ymd')."my_recruit"."tuchuinet");?>"	type="hidden" id="checkInfo"/> <!--t添加信息-->
    <input value="<?php echo md5(date('Ymd')."zidian"."tuchuinet");?>"	type="hidden" id="checkInfoZidian"/>  
<!--do 添加：add，修改：edit，获取：gain -->
	<input value="<?php echo md5(date('Ymd')."job_type"."tuchuinet");?>"	type="hidden" id="checkInfoJobType"/>
    <input value="<?php echo $_GET['recruit_id'];?>"	type="hidden" id="recruit_id"/>
    <!--分类id（技工：1，设计师：2，组长：3，管理人：4）  -->
    <script src="../Public/js/require.config.js"></script>
    <script src="../Public/js/jquery-2.1.4.js"></script>
    <script src="../Public/js/jquery-session.js"></script>
    <script src="../Public/js/fastclick.js"></script>
    <script src="../Public/js/common.js"></script>
    <script src="../Public/js/jquery-weui.min.js"></script>
<script>
    sessionUserId=$.session.get('userId');
    memberType=$.session.get('idType');
    recruit_id=$("#recruit_id").val();
    if(sessionUserId=='undefined'){
        //没有登陆
        $.toptip('您还没有登陆！',2000, 'error');
        window.location.href='../Login/login.php';
    }

$(function(){
    selectMyRecuitInfo(recruit_id);//具体信息
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
    //提取具体信息
   function  selectMyRecuitInfo(recruit_id){
        var url =HOST+'mobile.php?c=index&a=my_recruit';
        $.ajax({
            type: 'post',
            url: url,
            data: {
               recruit_id:recruit_id,checkInfo:$("#checkInfo").val(),dotype:'gain',id:sessionUserId
            },
            dataType: 'json',
            success: function (result) {
                var message=result.message;
                if (result.statusCode==='0'){
                    $.toptip(message,2000, 'error');
                    window.location.href='myJob.php';
                }else{
                    //$.toptip(message,2000, 'success');
                    $('#title').attr("value",result.data.title);
                    $('#mobile').attr("value",result.data.mobile);
                    $('#desc').attr("value",result.data.bei);
                  //  $('#desc').html(result.data.bei);
                    $('#area').attr("value",result.data.area);
                    $('#email').attr("value",result.data.email);
                    //下拉框
                   /* if(eval('(' + result.data.job_year+ ')')!=null){
                        $('#job_year').append('<option value="'+eval('(' + result.data.job_year+ ')').id+'" selected="selected">'+eval('(' + result.data.job_year+ ')').name+'</option>');
                    }*/
                    if(eval('(' + result.data.valuetime+ ')')!=null){
                        $('#education').append('<option value="'+eval('(' + result.data.valuetime+ ')').id+'" selected="selected">'+eval('(' + result.data.valuetime+ ')').name+'</option>');
                    }
                    if(eval('(' + result.data.wages+ ')')!=null){
                        $('#wage').append('<option value="'+eval('(' + result.data.wages+ ')').id+'" selected="selected">'+eval('(' + result.data.wages+ ')').name+'</option>');
                    }
                    if(eval('(' + result.data.job_type+ ')')!=null){
                        $('#job_type').append('<option value="'+result.data.cate_id.cate_id+'" selected="selected">'+result.data.cate_id.cate_name+'</option>');
                    }

                }
            }
        });
    }
    //提交，最终验证。
    $("#btn-custom-theme").click(function() {
        var mobile = $("#mobile").val();
        var title = $("#title").val();
        var bei = $("#desc").val();
        var email = $("#email").val();
        var cate_id=$('#job_type option:selected').val();
        var valuetime=$('#valuetime option:selected').val();
        var wages=$('#wage option:selected').val();
        //var area=$('#dpArea option:selected').val();
        var area='1';

        var url =HOST+'mobile.php?c=index&a=my_recruit';
        var benefitArray =[];
        $('input[name="benefit"]:checked').each(function(){
            console.log($(this).val());
            benefitArray.push($(this).val());
        });
        console.log(benefitArray);
        if(mobile==""|| title==""){
            $.toptip('手机号标题均不能为空！', 200, 'warning');
            return false;
        }
        $.ajax({
            type: 'post',
            url: url,
            data: {
                mobile:mobile,id:sessionUserId,recruit_id:recruit_id,checkInfo:$("#checkInfo").val(),cate_id:cate_id,
                dotype:'edit',title:title,email:email,area:area,wages:wages,valuetime:valuetime,benefit:benefitArray,
                bei:bei
            },
            dataType: 'json',
            success: function (result) {
                var message=result.message;
                if (result.statusCode==='0'){
                    $.toptip(message,2000, 'error');
                }else{
                    $.toptip(message,2000, 'success');
                    window.location.href='myJob.php';
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
                <span class="title">编辑求职</span>
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
                            <input class="weui-input"  name="email"  id="email" type="email" >
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
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">期望工作地:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" name="area"  id="area"  type="text" >
                    </div>
                </div>
                <div class="weui-cell weui-cell_select weui-cell_select-after">
                    <div class="weui-cell__hd">
                        <label for="" class="weui-label">薪资要求:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <select class="weui-select" name="wage"  id="wage" >
                        </select>
                    </div>
                </div>
                <div class="height1px"></div>
                <div class="push_checkbox" id="benefit"><!--多选框-->
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