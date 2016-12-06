var validate = {
        require: function(elem, errmsg){
            elem = $(elem);
            elem.on("change", function(){
                var value = this.value;
                alert("value:"+value);
                var tipCon = $(this).parents("td").find("span");
                alert("tipCon:"+tipCon.length);
                if(value == ""){
                    tipCon.html(errmsg);
                }else{
                    tipCon.html("");
                }
            });
        },
        phone: function(elem, errmsg){
            elem = $(elem);
            var tipCon = elem.parent().find("span");
            elem.on("change", function(){
                var value = $.trim(this.value);
                if(!/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57]|17[0-9])[0-9]{8}$/.test(value)){
                    tipCon.html(errmsg);
                }else{
                    tipCon.html("");
                }
            });
        },
        email: function(elem, errmsg){
            elem = $(elem);
            var tipCon = elem.parent().find("span");
            elem.on("change", function(){
                var value = $.trim(this.value);
                if(!/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/.test(value)){
                    tipCon.html(errmsg);
                }else{
                    tipCon.html("");
                }
            });
        },
        compare: function(elem1, elem2, errmsg){
            elem1 = $(elem1);
            elem2 = $(elem2);
            var tipCon = elem2.parent().find("span");
            elem2.on("change", function(){
                var value1 = $.trim(elem1[0].value);
                var value2 = $.trim(this.value);
                if(value1 !== value2){
                    tipCon.html(errmsg);
                }else{
                    tipCon.html("");
                }
            });
        }
    };
//验证
(function(){
    //验证必填字段
    var requireArr = [
        {
        id: "user",
        errmsg: "姓名不能为空"
        },
        {
            id: "company",
            errmsg: "公司名称不能为空"
        },
        {
            id: "area",
            errmsg: "国家/地区不能为空"
        }
    ];
    $.each(requireArr, function(i, obj){
        validate.require("#"+obj.id, obj.errmsg);
    });
    validate.phone("#phone", "手机号码格式不正确");
    validate.email("#email", "电子邮箱格式不正确");
    validate.compare("#email", "#email-c", "两次邮箱不一致");
});
