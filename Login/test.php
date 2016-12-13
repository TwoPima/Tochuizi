<?php
header("Content-type:application/json");
if ($_POST['mobile']=='123'){
    $result['success']   = 1;
    $result['message'] = '陈宫';
}else{
    $result['error']   = 0;
    $result['message'] = '对不起，您没有登录或者您未选择匿名购物！';
}
  exit(json_encode($result));
?>