<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-求职简历</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/setting.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianli.css"/>
      <link rel="stylesheet" type="text/css" href="../Public/font/iconfont.css">
    <!-- 多语言 -->
    <script>
        var lang_flag = 1;
    </script>
</head>
<body>
<div id="app">
    <div id="topback-header">
        <div id="header-left">
            <a href="javascript:history.go(-1);" >
                <i class="icon iconfont icon-xiangzuo"></i>
                <span class="title">我的供求</span>
            </a>
        </div>
        <div id="header-right">
            <a href="addMySupply.html"><span>+</span></a>
        </div>
    </div>
    <div style="clear: both"></div>
    <div id="job_main">
        <div class="job_top">
            <img class="job_top_people" src="../Public/img/myjob/dengpao.jpg" alt="">
            <div class="job_top_info">
                <p>清先完善你的简历</p>
                <p>点亮你的身份</p>
            </div>
            <img class="job_top_edit" src="../Public/img/myjob/edit.jpg" alt="">
        </div>
        <div class="job_noinfo">
            <img src="../Public/img/myjob/no_info.jpg" >
            <p>您还没有发不过求职</p>
        </div>





    </div><!--main-->
</div><!--app-->
</body>
<script src="../Public/js/zepto.js"></script>
<script src="../Public/js/vue.js"></script>
<script src="../Public/js/center.js"></script>
<script src="../Public/js/language.js"></script>
<script>
    /* 多语言切换 开始*/
    document.write(love[lang_flag]);
    fun();
    /* 多语言切换 结束*/
</script>
</html>