<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\test\toast.html";i:1602829332;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>


<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>

<link href="/static/jq_toast/css/jquery.toast.css" rel="stylesheet">
<script src="/static/jq_toast/js/jquery.toast.js"></script>

<body>

<div class="s" onclick="addToast()">addToast</div>

</body>

<script>
    function addToast(){
        $.toast({
            heading: 'this is heading?!',
            text:  [
                'Fork the repository',
                'Improve/extend the functionality',
                'Create a pull request',
                '<a href="https:www.baidu.com">本页调整百度</a>',
            ],//可以是单个文件,也可以是数组
            icon: 'warning',//'info','warning','error','success'
            showHideTransition: 'fade', // fade, slide or plain
            allowToastClose: false, // Boolean value true or false
            hideAfter: 3000, // 自动关闭时间
            stack: 5, // 最多堆积几个
            // bottom-left or bottom-right or bottom-center or top-left or top-right
            // top-center or mid-center or an object representing the left, right, top, bottom values
            position: 'mid-center',
            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: false,  // Whether to show loader or not. True by default
            bgColor: '#FF1356',  // Background color of the toast loader
            beforeShow: function () {}, // will be triggered before the toast is shown
            afterShown: function () {}, // will be triggered after the toat has been shown
            beforeHide: function () {}, // will be triggered before the toast gets hidden
            afterHidden: function () {}  // will be triggered after the toast has been hidden
        })
    }
</script>

</html>


