<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人主页-求职简历</title>
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Public/css/weui.css"/>
    <link rel="stylesheet" href="../Public/css/common.css"/>
    <link rel="stylesheet" href="../Public/css/setting.css"/>
    <link rel="stylesheet" href="../Public/css/myjob_jianliinfo.css"/>
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
                <span class="title">技工</span>
            </a>
        </div>
        <div id="header-right">
            <a href="addMySupply.html"><span></span></a>
        </div>
    </div>
    <div style="clear: both"></div>
    <div id="jianliinfo">
        <div class="info_box">
            <div class="weui-cells weui-cells_form" style="margin-top: 10px;">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">姓名:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">性别:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">出生年份:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">最高学历:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">工作年限:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">籍贯:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cells weui-cells_form" style="margin-top: 10px;">
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">手机:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
                <div class="weui-cell ">
                    <div class="weui-cell__hd">
                        <label class="weui-label">邮箱:</label>
                    </div>
                    <div class="weui-cell__bd">
                        <input class="weui-input" type="text" >
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cell weui-cell_select">
                <div class="weui-cell__bd">
                    <select class="weui-select" name="select1">
                        <option selected="" value="1">工种类别</option>
                        <option value="2">QQ号</option>
                        <option value="3">Email</option>
                    </select>
                </div>
            </div>
            <div class="weui-cells weui-cells_form" style="margin-top:0px;">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea class="weui-textarea" placeholder="求职宣言..." rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="info_box">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <div class="weui-uploader">
                        <div class="weui-uploader__hd" style="border-bottom: 1px solid #EFEFEF;margin-bottom: 10px;">
                            <p class="weui-uploader__title">工作风采</p>
                        </div>
                        <div class="weui-uploader__bd">
                            <div class="weui-uploader__input-box">
                                <input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="add_button">
            <a href="#" id="btn-custom-theme" class="weui-btn">保存</a>
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