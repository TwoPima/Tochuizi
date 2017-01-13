/**
 * Created by Administrator on 2016/12/28.
 */
//var checkInfo=$('#supply_list').val();
//var sessionUserId=$.session.get('userId');
//if(sessionUserId=='undefined'){
//    $.toptip('您还没有登陆！',2000, 'error');
//    window.location.href='../Login/login.php';
//}
var demoApp = new Vue({
    el: '#body_box',
    data: {
        num:'',
        demoData:'',
        total_tie:'',
        total_hits:'',
        url:{
            checkInfo:checkInfo,
            id:sessionUserId,
            is_true:'',
            start:0,
            limit:10
        }
    },/*初始化，el控制区域，  */
    ready: function() {
        var that = this;
        that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
                var res = response.data; //取出的数据
                var listdata=[];
                for(x  in res.data){
                    if (typeof (res.data[x]) == 'object'){
                        listdata[x]=res.data[x];
                    }
                    if (x == 'total_tie'){
                        that.$set('total_tie', res.data['total_tie']);
                    }
                    if (x == 'total_hits'){
                        that.$set('total_hits', res.data['total_hits']);
                    }
                }
                that.$set('demoData', listdata);  //把数据传给页面
                that.$set('url.start', listdata.length);

                Vue.nextTick(function () {
                    //初始化滚动插件
                    that.myScroll = new IScroll('#wrapper', {
                        mouseWheel: true,
                        wheelAction: 'zoom',
                        click: true,
                        scrollX: false,
                        scrollY: true,
                    });
                    //滚动监听
                    that.myScroll.on('scrollEnd',scrollaction);//滚动监听,1000
                })
            },
            function (response) {
                that.$set('message', '服务器维护，请稍后重试');
            });
        /*再次加载  */
        function scrollaction(){
            if(that.url.start  <  that.total_tie){
                if (-(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
                    console.log(that.url);
                    that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
                        var res = response.data;
                        var listdata=[];
                        for(x  in res.data){
                            console.log(typeof (res.data[x]));
                            if (typeof (res.data[x]) == 'object'){
                                listdata[x]=res.data[x];
                            }
                        }
                        this.url.start+=listdata.length;
                        //这个for循环是更新vue渲染列表的数据
                        for (var i = 0; i < listdata.length; i++) {
                            that.demoData.push(listdata[i]);
                        }
                        console.log(that.demoData);
                        Vue.nextTick(function () {
                            that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
                        });
                    }, function (response) {
                        //取消加载效果
                        that.$set('message', '服务器维护，请稍后重试');
                    });
                }
            }
        }
    }, //created 结束
    methods: {
        jump_url: function (msg1,msg2){
            /*var msg_url = msg2.indexOf('&m=Index&a=content&');
             if(msg_url == -1){
             this.$http(this.local_url+'/index.php?g=Wap&m=Index&a=jump_url&id='+msg1).then(function (response) {
             return true;
             });
             }*/
            alert('跳转url');
        },
        classdata: function (msg) {
            $('.sipply_nav .action').removeClass('action');
            var that = this;
            that.$set('num', 0);
            that.$set('url.start', 0);
            that.$set('total_tie',0);
            that.$set('total_hits', 0);
            switch(msg){
                case '':
                    that.$set('url.is_true', '');
                    $('.sipply_nav .one').addClass('action');
                    break;
                case '0':
                    that.$set('url.is_true', 0);
                    $('.sipply_nav .two').addClass('action');
                    break;
                case '1':
                    that.$set('url.is_true', 1);
                    $('.sipply_nav .three').addClass('action');
                    break;
                default:
                    $('.sipply_nav .one').addClass('action');
                    that.$set('url.is_true', '');
            }
            that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
                    var res = response.data; //取出的数据
                    var listdata=[];
                    for(x  in res.data){
                        if (typeof (res.data[x]) == 'object'){
                            listdata[x]=res.data[x];
                        }
                        if (x == 'total_tie'){
                            that.$set('total_tie', res.data['total_tie']);
                        }
                        if (x == 'total_hits'){
                            that.$set('total_hits', res.data['total_hits']);
                        }
                    }
                    that.$set('num', that.url.limit);
                    that.$set('demoData', listdata);  //把数据传给页面
                    that.$set('url.start', listdata.length);
                    Vue.nextTick(function () {
                        //初始化滚动插件
                        that.myScroll = new IScroll('#wrapper', {
                            mouseWheel: true,
                            wheelAction: 'zoom',
                            click: true,
                            scrollX: false,
                            scrollY: true,
                        });
                        //滚动监听
                        that.myScroll.on('scrollEnd',scrollaction1);//滚动监听,1000
                    })
                },
                function (response) {
                    that.$set('message', '服务器维护，请稍后重试');
                });
            /*再次加载  */
            function scrollaction1(){
                if( that.url.start >=  that.num ){
                    if (-(this.y) + $('#wrapper').height()>= $('#scroller').height()) {
                        console.log(that.url);
                        that.$http.get(HOST+'mobile.php?c=index&a=supply_list',that.url).then(function (response) {
                            var res = response.data;
                            var listdata=[];
                            for(x  in res.data){
                                if (typeof (res.data[x]) == 'object'){
                                    listdata[x]=res.data[x];
                                }
                            }
                            this.url.start+=listdata.length;
                            //这个for循环是更新vue渲染列表的数据
                            for (var i = 0; i < listdata.length; i++) {
                                that.demoData.push(listdata[i]);
                            }
                            console.log(that.demoData);
                            Vue.nextTick(function () {
                                that.myScroll.refresh();// 用iScroll自带的方法更新一下myScroll实例更新一下scroller的高度
                            });
                        }, function (response) {
                            //取消加载效果
                            that.$set('message', '服务器维护，请稍后重试');
                        });
                    }
                }
            }
        }//ajaxdata
    }//method  结束
});