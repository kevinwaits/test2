<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\test\shipin2.html";i:1603861999;}*/ ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">-->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

    </style>
</head>
<body>
<div class="video">
    <div class="container" style="margin-top: 100px">

        <div class="videolist" vpath="v1.jpg" ipath="">
            <div class="vtit">视频一</div>
            <img src="v1.jpg" width="200px" height="100px" style="border: 1px solid red" class="v1"/>
            <div class="vtime">2018-06-22</div>
        </div>

        <div class="videos"></div>


        <a href="#5F">锚点5</a>
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <div style="height: 800px;width: 1px">1</div>
        <a name="5F">1111111</a>


    </div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
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
        $('.videos').html("<video id=\"video\" poster='"+img+"' style='width: 640px' src='/static/video/baideng.mp4' " +
            "preload=\"auto\" controls=\"controls\" autoplay=\"autoplay\"></video>" +
            "<img "+"onClick=\"close1()\" class=\"vclose\" src=\"/static/image/ico_checkon.svg\" width=\"25\" height=\"25\"/>");
        $('.videos').show();
    });
    // });

    function close1(){
        var v = document.getElementById('video');//获取视频节点
        $('.videos').hide();//点击关闭按钮关闭暂停视频
        v.pause();
        $('.videos').html();
    }

</script>
</body>
</html>