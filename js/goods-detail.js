
/*
 * 商品详情页
 * @author sandy
 */

var APINAME = {
	getProductById : "goods_detail"
};

var API = {
	getProductById : HOST + "mobile.php?c=searchlist&a=goods_detail"
};

console.log(util.getParamByKey('title'));
$("#partic").html(util.getParamByKey('title'));

	function switchdata(e,status) {
		var $that = $(e.currentTarget);
        $that.addClass('weui_bar_item_on').siblings('.weui_bar_item_on').removeClass('weui_bar_item_on');
        goodsDetailVue.$set('gooddetailStatus', status);
     }

var events = {

};

events.switchdata = switchdata;
events.selectSizeShow = function (e) {
	console.log(e);
	if ($('standard').hasClass('display-none')) {
		$('standard').removeClass('.display-none');
	} else {
		$('standard').addClass('.display-none')
	}
}

var goodsDetailVue = new Vue({
    el: '.good-detail',
    data: {
    		imgHost: HOST,
        goodsDetail: [],
        gooddetailStatus:1
    },
    methods: {
    		switchdata: events.switchdata,
    		selectSizeShow: events.selectSizeShow
    },
    ready: function(){
		getProductDetail(util.getParamByKey('good_id'), 1, 10);
    }
});

function getProductDetail (goodsId, start, limit) {
	$.ajax({
		type:"get",
		url: API.getProductById,
		data: {
			checkInfo : tool.getCheckInfo(APINAME.getProductById),
			goods_id : goodsId,
			Start : start,
			limit : limit
		},
        dataType: "json",
        jsonp:"callback",
		async:true,
		success:function (data) {
			effects.loadingRemove(".main");
			$(goodsDetailVue.$el).removeClass("display-none");
			if(data.statusCode) {
				console.log(data.data);
                goodsDetailVue.$set("goodsDetail", data.data);
           	} else {
           		effects.toast(data.message);
           	}
		},
		error: function (data) {
        		effects.loadingRemove(".main");
            effects.toast("未知错误");
        }
	});
}

/////////////////////////////////////////////////////////////////////////////////////////////////
