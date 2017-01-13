//var holdPosition = 0;
//var mySwiper = new Swiper('.swiper-container',{
//    slidesPerView:'auto',
//    mode:'vertical',
//    watchActiveIndex: true,
//    onTouchStart: function() {
//        holdPosition = 0;
//    },
//    onResistanceBefore: function(s, pos){
//        holdPosition = pos;
//    },
//    onTouchEnd: function(){
//        if (holdPosition>50) {
//            mySwiper.setWrapperTranslate(0,50,0)
//            mySwiper.params.onlyExternal=true
//            $('.preloader').addClass('visible');
//            loadNewSlides();
//        }
//    }
//})
//var slideNumber = 0;
//function loadNewSlides(){
//    setTimeout(function(){
//        //Prepend new slide
//        // var colors = ['red','blue','green','orange','pink'];
//        //var color = colors[Math.floor(Math.random()*colors.length)];
//        //mySwiper.prependSlide('<div class="title">sucaijiayuan.com '+slideNumber+'</div>', 'swiper-slide '+color+'-slide');
//        //Release interactions and set wrapper
//        //mySwiper.setWrapperTranslate(0,0,0)
//        //mySwiper.params.onlyExternal=false;
//        //Update active slide
//        //mySwiper.updateActiveSlide(0)
//        //Hide loader
//        $('.preloader').removeClass('visible');
//    },1000)
//    window.location.reload();
//}
var scroll = document.querySelector('.scroll');
var outerScroller = document.querySelector('.outerScroller');
var touchStart = 0;
var touchDis = 0;
outerScroller.addEventListener('touchstart', function(event) {
    var touch = event.targetTouches[0];
    // 把元素放在手指所在的位置
    touchStart = touch.pageY;
    //   console.log(touchStart);
}, false);
outerScroller.addEventListener('touchmove', function(event) {
    var touch = event.targetTouches[0];
    // console.log(touch.pageY + 'px');
    scroll.style.top = scroll.offsetTop + touch.pageY-touchStart + 'px';
    // console.log(scroll.style.top);
    touchStart = touch.pageY;
    touchDis = touch.pageY-touchStart;
}, false);
outerScroller.addEventListener('touchend', function(event) {
    touchStart = 0;
    var top = scroll.offsetTop;
    //console.log(top);
    if(top>70)refresh();
    if(top>0){
        var time = setInterval(function(){
            scroll.style.top = scroll.offsetTop -1+'px';
            if(scroll.offsetTop<=60 &&  scroll.offsetTop!=60)clearInterval(time);
        },1)
    }
}, false);
function refresh(){
    //for(var i = 10;i>0;i--)
    //{
    //     var node = document.createElement("li");
    //   node.innerHTML = "I'm new";
    //scroll.insertBefore(node,scroll.firstChild);
    //}
    window.location.reload();
}