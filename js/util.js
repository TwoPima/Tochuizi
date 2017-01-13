 /*
  * url 相关的工具类
  */
 var util = {};
    /**
     * url中？后面所有数据转换成k-v对象
     * @returns {{}}
     * @private
     */
    var _getParams = function(){
        var paramString = window.location.search.slice(1);
        var paramArr = paramString.split('&');
        var obj = {};
        paramArr.forEach(function(item){
            var key = item.split('=')[0];
            var value = decodeURIComponent(item.split('=')[1]);
            obj[key] = value;
        });
        return obj;
    };

    /**
     * 从url中获取值
     * @param key
     */
    util.getParamByKey = function(key){
        return _getParams()[key];
    };

    /**
     * url跳转时生成？及其后面的参数
     * @param obj
     * @returns {string}
     */
    util.genParamUri = function(obj){
        var uri = "?";
        var arrParam = [];
        for (var key in obj){
            arrParam.push(key+"="+encodeURIComponent(obj[key]));
        }
        uri += arrParam.join("&");
        return uri;
    };

    /**
     * 日期post时不加下划线
     * @param date
     * @returns {*} 不带下划线的日期
     */
    util.date4send = function(date){
        try{
            return date.replace('-', '');
        } catch(e){
            return date;
        }
    };

    /**
     * 日期显示在页面上加下划线
     * @param date
     * @returns {*} 带下划线的日期
     */
    util.date4show = function(date){
        try {
            var formmatDate = date.replace('-', '');
            var newDate = formmatDate.slice(0,4)+"-"+formmatDate.slice(4);
            return newDate;

        } catch (e){
            return date;
        }
    };

    /**
     * set value to cookie and sessionStorage
     * @param key
     * @param value
     */
    util.storeSet = function(key, value){
        var exptime = 30*60*1000,
            exp = new Date();

        exp.setTime(exp.getTime() + exptime); //过期时间30min

        //设置cookies
        (function setCookie(key,value){
            document.cookie = key + "=" + value + ";path=/;expires=" + exp;
            document.cookie = key + "exp=" + exp.getTime() + ";path=/;expires=" + exp;
        })(key, value);

        window.sessionStorage.setItem(key + 'exp', exp.getTime());
        window.sessionStorage.setItem(key, value);
    };

    util.localSet = function(key, value){
        window.localStorage.setItem(key, value);
    };

    util.sessionSet = function(key, value){
        window.sessionStorage.setItem(key, value);
    };

    //读取cookies
    function getCookie(name){
        var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

        if(arr=document.cookie.match(reg))

            return arr[2];
        else
            return null;
    }
    /**
     * get value from cookie or sessionStorage
     * @param key
     * @returns {*}
     */
    util.storeGet = function(key){
        var exp = getCookie(name+"exp") || window.sessionStorage.getItem(key+"exp");

        if(!exp || (new Date()).getTime() - exp > 0) {
            util.storeDel(key);
            util.storeDel(key+"exp");
            return null;
        }

        var localValue = window.sessionStorage.getItem(key);
        return localValue || getCookie(key);
    };

    util.localGet = function(key){
        return window.localStorage.getItem(key);
    };

    util.sessionGet = function(key){
        return window.sessionStorage.getItem(key);
    };
    /**
     * delete value from cookie and localstorage
     * @param key
     */
    util.storeDel = function(key){
        //删除cookies
        function delCookie(name){
            var exp = new Date();
            exp.setTime(exp.getTime() - 1);
            var cval=getCookie(name);
            if(cval!=null)
                document.cookie= name + "="+cval+";expires="+exp.toGMTString();
        }

        delCookie(key);
        delCookie(key + "exp");

        window.sessionStorage.removeItem(key);
        window.sessionStorage.removeItem(key + "exp");
    };

    util.localDel = function(key){
        window.localStorage.removeItem(key);
    };

    util.sessionDel = function(key){
        window.sessionStorage.removeItem(key);
        window.sessionStorage.removeItem(key + "exp");
    };

    /**
     * 通用ajax方法
     * option中增加auth字段,若API需要登录时，设为true
     * 增加authAuto，登录会有额外的信息true
     * @param options
     */
    util.ajax = function(options){
        var applyOption = {
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=utf-8",
            error: function(){
                effects.hmalert({
                    body: "服务器繁忙，请稍后再试..."
                });
            }
        };

        for (var option in options){
            if(option != "auth"){
                applyOption[option] = options[option];
            }
        }

        if(applyOption.data) {
            applyOption.data['login_type'] = 5;
        } else {
            applyOption.data = {login_type:5};
        }

        if (options.auth && typeof(options.auth) == 'boolean'){
            var session = util.storeGet("session_id");
            if(session && typeof(session) == 'string'){
                applyOption.data['session_id'] = session;
            } else if(!options.authAuto){ //登录不登录都可以调用，但一些操作必要登录
                effects.hmalert({
                    body: "请先登录",
                    ok: function(){
                        location.href = PATH + "passport/login.html";
                    }
                });
                return;
            }
        }

        $.ajax(applyOption);
    };

    util.addError = function(msg){
        $(".errors").empty().css("display", "block");
        $(".errors-extra").html("<label class='error'>"+msg+"</label>");
    };

    util.removeError = function(){
        $(".errors-extra").empty();
    };

    util.checkIsMobile = function(value){
        var mobile = /^((((13|15|17|18)[0-9]{1}))+\d{8})$/;
        return mobile.test(value);
    };

    //时间格式化
    util.dateFormat = function(timestamp){
        var date = new Date(timestamp),
            month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1,
            day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate();
        return month + "-" + day;
    };

    //时间格式化 for vue
    util.dateMixin = function(){
        return {
            methods: {
                dateFormat: util.dateFormat,
                dateFormatX: function(timestamp){
                    var date = new Date(timestamp);
                    return date.toISOString().slice(0, 16).replace("T", " ");
                },
                dateFormatHM: function(timestamp){
                    var date = new Date(timestamp),
                        month = date.getMonth() + 1 < 10 ? "0" + (date.getMonth() + 1) : date.getMonth() + 1,
                        day = date.getDate() < 10 ? "0" + date.getDate() : date.getDate(),
                        hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours(),
                        minute = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
                    return month + "-" + day + " " + hour + ":" + minute;
                }
            }
        };
    };
