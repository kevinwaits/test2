<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\index\sound.html";i:1604885158;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0022)http://tgjy.youxi.com/ -->
<html><!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow">



    <link href="/assets/game/595dfb248edd4e4e.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="https://s0.ssl.qhres.com/static/164aea1df1a4ff48.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../../../public/assets/game/595dfb248edd4e4e.css">

    <style type="text/css">
        /*body{background-color: #222}*/
        .videolist { position:relative; float:left; width:500px; height:300px; margin-right:50px;
            margin-top:15px; margin-bottom:30px; }
        /*.videolist:hover{ cursor: pointer; }*/
        .v1:hover{cursor: pointer}
        .videoed { display:none; width:50px; height:50px; position: absolute; left:45%; top:45%;
            z-index:99; border-radius:100%; }
        .videos{ display:none; border: 1px solid #080808; position:fixed; left:50%; top:50%;
            margin-left:-320px; margin-top:-210px; z-index:100; width:640px; height:360px; }
        .vclose { position:absolute;right:1%; top:1%; border-radius:100%; cursor: pointer; }
        .none{display: none}
        /*.show_down_png{width: 600px; height: 400px;position: absolute;*/
        /*left: 50%; top: 50%;transform: translate(-50%, -50%);    !* 50%为自身尺寸的一半 *!*/
        /*height: 500px;z-index: 500}*/

        .breathe-btn {
            -webkit-animation-name:breathe;
            -webkit-animation-duration:1000ms;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-direction:alternate;
        }

        .breathe-btn_slow {
            -webkit-animation-name:breathe;
            -webkit-animation-duration:1500ms;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-direction:alternate;
        }

        @-webkit-keyframes breathe {
            0% {
                opacity:.2;
                box-shadow:0 1px 2px rgba(255,255,255,0.1);
            }
            100% {
                opacity:1;
                /*border:1px solid rgba(59,235,235,1);*/
                /*box-shadow:0 1px 30px rgba(59,255,255,1);*/
            }
        }


        .up_down {
            -webkit-animation-name:up_down_frames;
            -webkit-animation-duration:800ms;
            -webkit-animation-iteration-count:infinite;
            -webkit-animation-direction:alternate;
        }

        @keyframes up_down_frames{
            0%{
                transform:translate(0,50%) ;
                -webkit-transform:translate(0,50%) ;
                -moz-transform:translate(0,50%) ;
                -ms-transform:translate(0,50%) ;
                -o-transform:translate(0,50%) ;
            }
            100%{
                transform:translate(0,0) ;
                -webkit-transform:translate(0,0) ;
                -moz-transform:translate(0,0) ;
                -ms-transform:translate(0,0) ;
                -o-transform:translate(0,0);
            }


    </style>

</head>

<script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

<script type="text/javascript">
    function browserRedirect() {
        var sUserAgent = navigator.userAgent.toLowerCase();
        var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
        var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
        var bIsMidp = sUserAgent.match(/midp/i) == "midp";
        var bIsUc7 = sUserAgent.match(/rv: 1.2.3.4/i) == "rv: 1.2.3.4";
        var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
        var bIsAndroid = sUserAgent.match(/android/i) == "android";
        var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
        var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

        if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
            window.location.href = '<?php echo url("index/m/index"); ?>';
        } else {

        }
    }
    browserRedirect();
</script>

<body style="position:relative;">




<div class="area_1">

    <div class="zhezhao none" style="position: absolute;top: 0;bottom: 0;left:0;right: 0;width: 100%;height: 100%;z-index: 100;
        background-color: rgba(20,20,0,0.5)"></div>

    <div class="wrap" style="z-index:5;">

        <a href="javascript:;" class="pa btn_1 btn_gcyy" style="top:685px">
            <!--<strong>立即预约</strong>-->
            <img src="/assets/img/breath_no_layer.png">
            <img src="/assets/img/breath_layer.png" class="breathe-btn" style="position:relative;bottom:128px;right:25px">
        </a>
        <span class="pa go_area2 up_down"
              style="background-image:url('/assets/img/show_down_png.png');left:50%;top:780px;
              margin-left:-40px;width:80px;height:90px;cursor:pointer;background-repeat:no-repeat"></span>
        <span class="pa btn_play showPlayer" pvurl="/assets/game/video.mp4"
              style="background:url(https://p0.ssl.qhimg.com/t0106a5a085970b0d0d.gif)"></span>
        <div class="pa shareIcon">
            <a href="https://weibo.com/u/6363387223?is_all=1" class="ico_blog" target="_blank"></a>
            <a href="javascript:void(0)" class="ico_qq" data-code="qqscan"></a>
            <a href="javascript:void(0)" class="ico_wx" data-code="wxscan"></a>
            <a href="https://tieba.baidu.com/f?kw=%E9%80%9A%E6%84%9F%E7%BA%AA%E5%85%83%E6%89%8B%E6%B8%B8&amp;ie=utf-8"
               class="ico_bd" target="_blank"></a>
            <a href="https://www.taptap.com/app/70054" class="ico_tap" target="_blank"></a>
            <a href="https://www.biligame.com/detail/?id=101990&amp;sourceFrom=1112" class="ico_bili"
               target="_blank"></a>
            <a href="https://www.3839.com/a/94435.htm" class="ico_hykb" target="_blank"></a>
            <span class="sound bgm"><img src="/assets/game/wave.gif" alt=""></span>
            <img src="/assets/game/t01b343fa584552a42f.png" class="pa scancode wxscan" width="200">
            <span class="pa scancode qqscan"><img src="/assets/game/t017a1636369d16476b.png" alt="Q群号：193689379"
                                                  width="200"><br><span style="color:#fff;">Q群号：193689379</span></span>
        </div>
    </div>



    <!--<img src="/assets/game/index_jpg.jpg" style="width:1920px;" class="show_down_png" />-->

</div>

<!--<img src="/assets/img/show_down_png.png" style="position: absolute;top: 752px;left: 50%;transform: translate(-50%, -50%);z-index: 1000">-->



</div>





<div style="width: 100%;height: 30px;background-color: #14162D"></div>



<style>.area_4 .cur .intro {
    height: 290px
}</style>
<div class="pr area_4">
    <div class="pa world_bg">
        <div class="pa bg1"></div>
        <div class="pa bg2"></div>
        <div class="pa bg3"></div>
        <div class="pa bg4 cur"></div>
    </div>
    <div class="wrap">
        <ul class="floatG">
            <li class="world_1">
                <div class="pa cardbg"></div>
                <span class="pr num num_1"></span>
                <p class="pr tag"><img src="/assets/game/world_tag_1.png" alt=""></p>
                <div class="pr intro">
                    <p style="text-align:justify">在很远的未来，小行星撞击地球导致毁灭性打击，幸存的人类被迫转入地下生活，组建了新的秩序——联合议会。联合议会在P.T.H.财团的帮助下，通过基因强化实现了人类重返地面，开启了新时代。</p>
                </div>
                <span class="pr mark"></span>
            </li>
            <li class="world_2">
                <div class="pa cardbg"></div>
                <span class="pr num num_2"></span>
                <p class="pr tag"><img src="/assets/game/world_tag_2.png" alt=""></p>
                <div class="pr intro">
                    <p style="text-align:justify">在人类重返地面第10年，部分被强化的人类发生变异，引起恐慌。一个名为“克洛托教团”的神秘组织公开指责联合议会的基因强化造成变异发生，并散布各种流言，使联合议会区域内不断爆发抗议。</p>
                </div>
                <span class="pr mark"></span>
            </li>
            <li class="world_3">
                <div class="pa cardbg"></div>
                <span class="pr num num_3"></span>
                <p class="pr tag"><img src="/assets/game/world_tag_3.png" alt=""></p>
                <div class="pr intro">
                    <p style="text-align:justify">抗议最终变成一场大暴动，“基因危机”爆发。危机初期，
                        克洛托教团利用拥有强大战斗力量的“通感者”占据上风；但当联合议会授权民间武装以及获得P.T.H.财团的支持后，局势开始发生改变</p>
                </div>
                <span class="pr mark"></span>
            </li>
            <li class="world_4">
                <div class="pa cardbg"></div>
                <span class="pr num num_4"></span>
                <p class="pr tag"><img src="/assets/game/world_tag_4.png" alt=""></p>
                <div class="pr intro">
                    <p style="text-align:justify">
                        最终，联合议会击溃了克洛托教团，获得战争胜利。“通感者”和残余教团成员藏匿暗中，试图重新积蓄力量；P.T.H.财团因支持联合议会而名利双收，更将势力向联合议会权力中心扩张；联合议会则秘密接纳愿意效忠的“通感者”建立培训营，试图训练出类似“通感者”的新战力。
                    </p>
                </div>
                <span class="pr mark"></span>
            </li>
        </ul>
    </div>
</div>

<div class="area_5" style="display:none;">
    <div class="wrap">
        <div class="floatL equ">
            <div class="pr num">
                <ol class="floatG">
                    <li class="cur">01</li>
                    <li>02</li>
                    <li>03</li>
                    <li>04</li>
                    <li>05</li>
                </ol>
                <i></i>
            </div>
            <ul class="floatG point">
                <li class="cur"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="floatL pr pic">
            <ul class="pa floatG">
                <li><img src="/assets/game/world_2.jpg" alt="" width="100%" height="100%"></li>
                <li><img src="/assets/game/world_3.jpg" alt="" width="100%" height="100%"></li>
                <li><img src="/assets/game/world_4.jpg" alt="" width="100%" height="100%"></li>
                <li><img src="/assets/game/world_1.jpg" alt="" width="100%" height="100%"></li>
            </ul>
        </div>
        <span class="pa ico_arrow ico_arrow_left"></span>
        <span class="pa ico_arrow ico_arrow_right"></span>
    </div>

    <div class="alignC healthTip">
        <p>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活</p>
        <p>本游戏适合16岁以上的玩家进入</p>
    </div>
</div>

<div class="alignC healthTip">
    <p>抵制不良游戏，拒绝盗版游戏。注意自我保护，谨防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活</p>
    <p>本游戏适合16岁以上的玩家进入</p>
</div>

<div class="alignC footer">
    <p>
        <span>杭州猫步网络科技有限公司</span>
        <span>技术支持：猫步游戏</span>
        <span>浙ICP备17007273号</span>
        <span>浙网文【2017】2491-113号</span>
    </p>
</div>

<div class="winBox winYy">
    <span class="closeWin"></span>
    <div class="winCon yyTable">
        <div class="title"><img src="/assets/game/title_gcyy.png" alt=""></div>
        <div class="sys">
            <img src="/assets/game/sys_and.png" alt="" data-usys="android">
            <img src="/assets/game/sys_ios.png" alt="" data-usys="ios">
        </div>
        <div class="yyPhone" >
            <p class="yyPhone_num">
                <label>
                    <span>请输入手机号</span>
                    <input type="text" name="" value="" id="orderPhone">
                </label>
            </p>
            <p class="yyPhone_code">
                <label>
                    <span>请输入验证码</span>
                    <input type="text" class="cus_code" id="orderPhoneCheck">
                    <input type="button"
                           style="padding: 1px;display: inline-block;width:160px;"
                           id="getCheckCode"
                           class="get_code" value="获取验证码">
                </label>
            </p>
        </div>
        <a href="javascript:;" class="btn_1" id="orderSubmit"><strong>立即预约</strong></a>
        <p class="yyError"></p>
    </div>
    <div class="winCon yySuccess" style="display:none;">
        <br><br>
        <div class="title"><img src="/assets/game/title_gxn.png" alt=""></div>
        <div style="text-align:center;padding:50px 0 70px;"><img src="/assets/game/title_yycg.png" alt=""></div>
        <a href="javascript:;" class="btn_1 closeWin yyClose"><strong>确定</strong></a>
    </div>
</div>

<div class="bgmbox" style="display:none;">
    <audio id="bgm" preload="auto" loop="" autoplay="" type="audio/mp3"
           src="https://p0.yx-s.com/d/jlzj/bgm.mp3"></audio>
</div>

<div class="weixin_layer" style="width:100%;height:100%;background:rgba(0,0,0,.5);position:absolute;top:0;left:0;z-index:10;display:none;">
    <img src="/assets/game/t01b343fa584552a42f.png" class="pa scancode wxscan" width="400" style="left: 600px; display:none;top:29%;z-index:20;" ID="wxscan">
</div>

<script src="/assets/game/8336e91ab0ebe637.js"></script><!--jquery-1.9.1-->
<script src="/assets/game/template-web.js"></script>

<script type="text/javascript">
    function newAjaxFun(e, t) {
        var n = e.api + e.game_short + "/channel_id/" + t + "/page/" + e.page + "/cnt/" + e.cnt;
        $.ajax({
            url: n, dataType: "jsonp", jsonp: "jcb", success: function (e) {
                if (!(e.data.list && e.data.list.length > 0)) {
                    $("#newList").html('<p class="loading-p">\u8be5\u5217\u8868\u4e3a\u7a7a\uff0c\u5c0f\u7f16\u6b63\u5728\u7f16\u5199\u4e2d...</p>');
                    return;
                }
                var t = template("temNewsList", e);
                $("#newList").html(t);
                var n = e.data.list[0].pub_time.split(" ")[0], r = n.split("-");
                n = r[1] + "/" + r[2];
                var i = '<span class="tag">\u5934\u6761</span><a href=./text.html?id=' + e.data.list[0].id + ' target="_blank"><span class="title">' + e.data.list[0].title + '</span><span class="date">' + n + "</span></a>";
                $(".indexNews_top").html(i)
            }, error: function () {
                $("#newList").html('<p class="loading-p">\u672a\u83b7\u53d6\u5230\u6570\u636e\uff0c\u8bf7\u5237\u65b0\u91cd\u8bd5...</p>')
            }
        })
    }

    function for_lunbo() {
        $.ajax({
            url: focusConf.api + focusConf.game_short + "/property/3/page/1/cnt/5", dataType: "jsonp", jsonp: "jcb"
        }).done(function (e) {
            e.errno === 0 ? e.data.list.length > 0 ? render_lunbo(e.data.list) : console.log("\u6570\u636e\u4e0d\u5b58\u5728") : console.log(e.errmsg + "(" + e.errno + ")")
        }).fail(function () {
            console.log("error")
        })
    }

    var cids = ["2", "8", "7"],
        gameConfig = {game_short: "jlzj_1", api: "http://api.mgamer.cn/zone/list/domain/", page: 1, cnt: 4};
    newAjaxFun(gameConfig), $(".tabTag").on("click", "span", function () {
        if ($(this).hasClass("cur")) return !1;
        $(this).addClass("cur").siblings("span").removeClass("cur");
        var e = $(this).data("cids");
        newAjaxFun(gameConfig, e)
    });
    var focusConf = {game_short: "jlzj_1", api: "http://api.mgamer.cn/zone/list/domain/"}, orderInfo = {
        sys: "", phone: "", code: "", cd: !0, getPhoneNumer: function () {
            var e = /^0?1[3|4|5|6|7|8][0-9]\d{8}$/;
            this.phone = $("#orderPhone").val();
            if (!this.phone || this.phone == null) return $(".yyError").html("\u8bf7\u8f93\u5165\u624b\u673a\u53f7"), !1;
            if (!e.test(this.phone)) return $(".yyError").html("\u8bf7\u8f93\u5165\u6b63\u786e\u7684\u624b\u673a\u53f7"), this.phone = "", !1
        },

        // 发送验证码
        getCheckCode: function () {
            $(".yyError").empty();
            if (!this.sys) return $(".yyError").html("\u8bf7\u9009\u62e9\u624b\u673a\u7cfb\u7edf"), !1;
            this.getPhoneNumer();
            if (this.phone && this.sys) {

                var send_data={};
                send_data.phone=this.phone;
                send_data.sys=this.sys;

                $.post("<?php echo url('index/index/get_aj'); ?>", send_data, function (from_return)
                {
                    if (from_return.status == "200") {
                        $(".yyError").html("验证码已发送,请注意接收");
                        $('#orderPhoneCheck').focus();
                        // >>>>倒计时代码
                        var code = $("#getCheckCode");
                        code.removeClass('get_code').attr("disabled", true)
                        code.css("opacity", "0.7");
                        var time = 60;
                        var set = setInterval(function () {
                            code.val("(" + --time + ")秒后重新获取");
                        }, 1000);
                        setTimeout(function () {
                            code.attr("disabled", false).val("重新获取验证码").css("opacity", "1");
                            clearInterval(set);
                        }, time*1000);
                        // <<<<倒计时代码
                    }else if(from_return.status == "300"){
                        $(".yyError").html("你已经成功预约,无需重复操作");
                    }else if(from_return.status == "400"){
                        $(".yyError").html("请选择正确的系统");
                    }else if(from_return.status == "500"){
                        $(".yyError").html("手机号无效");
                    }
                });


            }
        },

        // 验证验证码
        refer: function () {
            $(".yyError").empty();
            if (!this.sys) return $(".yyError").html("\u8bf7\u9009\u62e9\u624b\u673a\u7cfb\u7edf"), !1;
            this.getPhoneNumer();
            if (this.phone && this.sys) {

                var send_data={};
                send_data.phone=this.phone;
                send_data.cus_code = $('.cus_code').val();
                $.post("<?php echo url('index/index/confirm_code'); ?>", send_data, function (from_return)
                {
                    if (from_return.status == "200") {
                        $(".yyError").html("预约成功");
                        $(".yySuccess").css("display","block")
                        $(".yyTable").css("display","none")
                    }
                    if (from_return.status == "300") {
                        $(".yyError").html("验证码错误");
                    }
                });
            }
        },

    };
    $(".winYy .sys img").on("click", function () {
        $(this).addClass("cur").siblings("img").removeClass("cur"), orderInfo.sys = $(this).data("usys")
    }), $("body").on("click", "#getCheckCode", function () {
        orderInfo.getCheckCode()
    }), $("body").on("click", "#orderSubmit", function () {
        orderInfo.refer()
    }), $("body").on("click", ".winYy .closeWin", function () {
        orderInfo.init()
    }),
        $(".closeWin").click(function () {
            window.location.reload();
        });
</script>

<script src="/assets/game/a3546cd64ecade1f.js"></script><!--focus-->
<script src="/assets/game/82743bb436a75d9a.js"></script><!--win-->
<script>function pic_move(e) {
    $(".area_5 .equ li").removeClass("cur"), $(".area_5 .equ ol li").eq(e).addClass("cur"), $(".area_5 .equ ul li").eq(e).addClass("cur"), $(".area_5 .equ .num i").stop(0).animate({left: e * 69 + "px"}, 100), $(".area_5 .pic ul").stop(0).animate({left: e * -714 + "px"}, 300)
}

$(window).bind("scroll", function (e) {
    $(document).scrollTop() > 100 ? $(".siteNav").addClass("siteNav_bg") : $(".siteNav").removeClass("siteNav_bg")
}), $(".siteNav_nav span").on("click", function () {
    var e = $(this).data("area");
    $("html, body").stop().animate({scrollTop: $("." + e).offset().top - 80}, 300)
}), $(".go_area2").on("click", function () {
    $("html, body").stop().animate({scrollTop: $(".area_2").offset().top - 80}, 300)
});
var pro_num = 0;
$(".proTag li").on("click", function () {
    pro_num = $(this).index(), $(this).addClass("cur").siblings("li").removeClass("cur"), $(".proSlider").stop(0).animate({left: pro_num * -1168 + "px"}, 500)
}), $(".area_3 .ico_arrow_left").on("click", function () {
    pro_num == 0 ? pro_num = 3 : pro_num--, $(".proSlider").stop(0).animate({left: pro_num * -1168 + "px"}, 500), $(".proTag li").eq(pro_num).addClass("cur").siblings("li").removeClass("cur")
}), $(".area_3 .ico_arrow_right").on("click", function () {
    pro_num == 3 ? pro_num = 0 : pro_num++, $(".proSlider").stop(0).animate({left: pro_num * -1168 + "px"}, 500), $(".proTag li").eq(pro_num).addClass("cur").siblings("li").removeClass("cur")
});
var world_num = 0;
$(".area_4 li").on("mouseover", function () {
    world_num = $(this).index(), $(".world_bg div").eq(world_num).addClass("cur").siblings("div").removeClass("cur")
}).on("click", function () {
    $(this).addClass("cur").siblings("li").removeClass("cur")
}), $(".area_4 .mark").on("click", function (e) {
    $(this).parent("li").removeClass("cur"), e.stopPropagation()
});
var pic_num = 0;
$(".area_5 .equ li").on("click", function () {
    pic_num = $(this).index(), pic_move(pic_num)
}), $(".area_5 .ico_arrow_left").on("click", function () {
    pic_num == 0 ? pic_num = 4 : pic_num--, pic_move(pic_num)
}), $(".area_5 .ico_arrow_right").on("click", function () {
    pic_num == 4 ? pic_num = 0 : pic_num++, pic_move(pic_num)
});

var bgmplay = {
    bgmid: null, live: !0, html: null, music: "https://p0.yx-s.com/d/jlzj/bgm.mp3", mplay: function () {
        bgmplay.bgmid.pause(), bgmplay.live = !1, $(".bgm img").hide()
    }, mstop: function () {
        bgmplay.bgmid.play(), bgmplay.live = !0, $(".bgm img").show()
    }, func: function () {
        document.createElement("audio").canPlayType ? bgmplay.html = '<audio id="bgm" preload="auto" loop autoplay type="audio/mp3" src="' + bgmplay.music + '"></audio>' : bgmplay.html = '<embed id="bgm" src="' + bgmplay.music + '" autostart="true" loop="true" width="0" height="0">', $(".bgmbox").append(bgmplay.html), bgmplay.bgmid = document.getElementById("bgm"), $(".bgm").on("click", function () {
            bgmplay.bgmid.paused ? bgmplay.mstop() : bgmplay.mplay()
        })
    }
};

bgmplay.func(), $(".showPlayer").on("click", function () {
    bgmplay.bgmid.paused || bgmplay.mplay()
}), $(".shareIcon a").on("mouseover", function () {
    var e = $(this).data("code");
    e && $("." + e).css("left", $(this).get(0).offsetLeft + "px").show()
}).on("mouseout", function () {
    $(".shareIcon .scancode").hide()
});
var yywin = {
    selector: ".winYy", closeCallback: function () {
    }
};
$("body").on("click", ".btn_gcyy", yywin, openWin);

<!--var bgv = document.createElement("video");-->
<!--canPlayVideoTag == 1 && (bgv.src = "/assets/game/index.mp4", bgv.width = 1920, bgv.controles = !1, bgv.autoplay = !0, bgv.loop = !0, bgv.muted = !0, $(".bgv").append(bgv))</script>-->


<script>
    $(function () {
        // 点击新闻
        $('.news').click(function () {
            // alert($(this).data('cids'));
            var category_id = $(this).data('cids');
            $(this).siblings().removeClass('cur');
            $(this).addClass('cur');

            // 发送ajax获取新闻数据
            $.ajax(
                {
                    url: "<?php echo url('index/index/getNews'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {category_id: category_id},
                    success: function (res) {
                        console.log(res);

                        // 替换html
                        var html = "<ul>";
                        for (var i = 0; i < res.length; i++) {
                            var id = res[i].id;
                            var cid = res[i].category_id;
                            var href = "/index/index/newsview/id/" + id + "/cid/" + cid + ".html";
                            html += "<li><i></i><a href='" + href + "' target='_blank'>【" + res[i].name + "】" + res[i].title + "</a></li>";
                        }
                        html += "</ul>";

                        $('#newList').html(html);
                    }
                });
        })

        $('.weixin').click(function(){
            $('#wxscan').show();
            $('.weixin_layer').show();
        })

        $('.weixin_layer').click(function(){
            $('#wxscan').hide();
            $('.weixin_layer').hide();
        })

        $('.weixin').mouseover(function(){
            $('#wxscan_small').show();
        })
        $('.weixin').mouseout(function(){
            $('#wxscan_small').hide();
        })

    })

</script>

<script>
    // $('.videolist').each(function(){ //遍历视频列表
    //     $(this).hover(function(){ //鼠标移上来后显示播放按钮
    //         $(this).find('.videoed').show();
    //     },function(){
    //         $(this).find('.videoed').hide();
    //     });
    $(".v1").click(function(){ //这个视频被点击后执行
        var img = $(this).attr('vpath');//获取视频预览图
        var video = $(this).attr('ipath');//获取视频路径
        $('.videos').html("<video id=\"video\" poster='"+img+"' style='width: 640px' src='/assets/game/video.mp4' " +
            "preload=\"auto\" controls=\"controls\" autoplay=\"autoplay\"></video>" +
            "<img "+"onClick=\"close1()\" class=\"vclose\" src=\"assets/img/show_xx.png\" width=\"25\" height=\"25\"/>");
        $('.videos').show();
        $(".zhezhao").removeClass("none")
    });
    // });

    function close1(){
        var v = document.getElementById('video');//获取视频节点
        $('.videos').hide();//点击关闭按钮关闭暂停视频
        v.pause();
        $('.videos').html();
        $(".zhezhao").addClass("none")
    }

</script>


</body>
</html>