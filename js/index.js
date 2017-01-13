/**
 * Created by bjwsl-001 on 2016/8/18.
 * jd index
 */
var APINAME = {
	getAddBanner: "ad_index", //首页轮播图
    getAllPproducts: "recom_goods_list" //首页商品列表
};
var API = {
	getAddBanner: HOST + "mobile.php?c=searchlist&a=ad_index", //首页轮播图
    getAllPproducts: HOST + "mobile.php?c=searchlist&a=recom_goods_list", //首页商品列表
};

var spoint={x:0,y:0}
var bspoint={x:0,y:0}
var ping=0;//第几张图
var pingw=360;//屏幕宽度
var pich=150;//图片高度
var totalpics=0;// 图片数量
var timer=null;//定时器
function goLeft(){
    ping++;
var lu=$(".banner .inner ul li:eq("+ping+") img").attr("data-lazy");
    $(".banner .inner ul li:eq("+ping+") img").attr("src",lu);
    if(ping>2*totalpics-1){
        ping=totalpics-1;
        $(".banner .inner").css({"left":-pingw*ping+"px"})
        ping++; }
    $(".banner .inner").animate({"left":-pingw*ping+"px"},800);
    $(".ctrl ul li").removeClass("active")
    .eq(ping%totalpics).addClass("active")//焦点
}
function init(){
    pingw=$(window).width();
    if(pingw>=640){ pingw=640;}
    var h=(pingw/360)*pich
    $(".banner,.banner .inner ul li").css({width:pingw+"px",height:h+"px"})
    $(".banner .inner").css("left",-pingw*ping+"px")
}
//初始化页面
function initAddBanner(){

timer=window.setInterval(function(){ goLeft();  },4000);

totalpics=$(".banner .inner ul li").length;
    var zz=$(".banner .inner ul li").clone();
    $(".banner .inner ul").append(zz);
    init();
    $(window).resize(function(){
        init();
    });
    $(".banner").on("touchstart",function(e){
        clearInterval(timer)
        if(ping==2*totalpics-1){
            ping=totalpics-1;
            $(".banner .inner").css("left",-pingw*ping+"px")
        }else if(ping==0){
            ping=totalpics;
            $(".banner .inner").css("left",-pingw*ping+"px")
        }
        spoint.x= e.originalEvent.changedTouches[0].clientX;
        bspoint.x=parseInt($(".banner .inner").css("left"));
        e.preventDefault()
    })
    $(".banner").on("touchmove",function(e){
        var b= e.originalEvent.changedTouches[0].clientX;
        var off=b-spoint.x;
        $(".banner .inner").css("left",bspoint.x+off+"px")
    })
    $(".banner").on("touchend",function(e){
        timer= setInterval(function(){ goLeft(); },4000)
        var b= e.originalEvent.changedTouches[0].clientX;// spoint.x
        var off=b-spoint.x;//差值>0
        if(off>=100){//往右
            ping--//0  3//ping<=0&&(ping=0)
        }else if(off<=-100){//往左
            ping++
        }else{ }
 var lu=$(".banner .inner ul li:eq("+ping+") img").attr("data-lazy")
 $(".banner .inner ul li:eq("+ping+") img").attr("src",lu);

        $(".banner .ctrl ul li").removeClass("active").eq(ping%totalpics).addClass("active")
        $(".banner .inner").animate({"left":-pingw*ping+"px"},800)
    })
    $(".classes1").click(function(){
        $(".classes2>a").show();
        $(".classes2>a").attr("class","classes1>a");
    });
    $(".classes2").click(function(){
        $(".classes1>a").attr("店铺");
        $(".classes2>a").attr("商品");
        $(".classes2>a").hide();
    });

}
// 轮播图
var urlstr = location.href;
var urlstatus=false;
$(".bottom_menu a").each(function () {
    if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
        $(this).addClass('current'); urlstatus = true;
    } else {
        $(this).removeClass('current');
    }
});
if (!urlstatus) {$("#menu a").eq(0).addClass('cur'); }

var hasNext = true,page_index = 1;
var goodListVue = new Vue({
    el: '#goodList',
    data: {
    		imgHost: HOST,
        goodList: [],
        hasNext: hasNext,
        isLoading: true
    },
    methods:{
        loadMore: loadMore
    },
    ready: function(){
        $(this.$el).removeClass("display-none");
        locations.getlocaltionArea(function(area) {
            if (area) {
                getData(area.city.id);
                $("#location").html(area.city.name);
            } else {
                getData(1);
                $("#location").html("全国");
            }
        });
    }
});
var addListVue = new Vue ({
	el: '.banner',
	data: {
		imgHost: HOST,
		imgList:[],
	},
	ready: function () {
		getAddImgArray();
	}
});

function loadMore(){
    goodListVue.$set("isLoading", true);
    hasNext && getData(1);
   }

// 获取首页推荐数据
function getData(pid) {
    jQuery.ajax({
        type: "GET",
        url: API.getAllPproducts,
        data: {
        		checkInfo:tool.getCheckInfo(APINAME.getAllPproducts),
        		area_id:1,
        		page_size: 5,
        		page_index: page_index
        },
        dataType: "json",
        jsonp:"callback",
        success:function(data){
            effects.loadingRemove(".goods");
            goodListVue.$set("isLoading", false);
            if(data.statusCode) {
                goodListVue.$set("goodList", goodListVue.$get("goodList").concat(data.data));
                if(data.data.length < 2) {
                    hasNext = false;
                    goodListVue.$set("hasNext", false);
                } else {
                    page_index++;
                }
           } else {
              effects.toast(data.message);
           }
        },
        error: function (data) {
            effects.loadingRemove(".goods");
            effects.toast("未知错误");
        }
    });
}
function getAddImgArray () {
	jQuery.ajax({
		type: "GET",
		url: API.getAddBanner,
		data: {
			checkInfo: tool.getCheckInfo(APINAME.getAddBanner)
		},
		dataType: "json",
		jsonp:"callback",
		success: function (data) {
			addListVue.$set("addList", data.data);
			totalpics = data.data.lenth;
			initAddBanner();
		}
	});
}