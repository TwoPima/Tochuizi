<form  id="myform" method="get" action="http://tcw.huikenet.com/mobile.php?c=index&a=login" >
	   <input class="weui_input" type="tel" id="mobile" v-model="mobile" name="mobile" placeholder="请输入手机号" required>
	    <input class="weui_input" type="password" name="password" v-model="password" id="password" placeholder="请输入密码" required>
	   <input value="<?php echo md5(date('Ymd')."login"."tuchuinet");?>"	name="checkInfo" type="hidden" id="checkInfo"/>  
	   <input type="submit" id="submit" value="提交"/>
</form>
<script src="../Public/js/zepto.js"></script>
<script type="text/javascript">
   /*  $(function() {
        $('#submit').click(function() {
            $.ajax({
               //url: 'http://tcw.huikenet.com/mobile.php?c=index&a=login',
                url: 'test.php',
                type: 'post',
                dataType:'json',
                data: $("#myform").serializeArray(),
                success: function(msg) {
                    alert(msg);
                }
            });
        });
    }); */
</script>
<?php
        /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
      /*   $result="";
        $result['error']   = 1;
        $result['message'] = '对不起，您没有登录或者您未选择匿名购物！';
        echo json_encode($result);
 */
?>