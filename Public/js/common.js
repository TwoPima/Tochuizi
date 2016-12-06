/*******
 * 公共js
 * author:马晓成
 * ******/
/*******手机端a链接点击无反应问题解决-fastclick.js******/
//如果你使用原生js开发则进行如下声明即可。
if ('addEventListener' in document) {      
    document.addEventListener('DOMContentLoaded', function() {  
    FastClick.attach(document.body);  
}, false);  
}
//如果你想使用jquery
$(function() {  
    FastClick.attach(document.body);  
});