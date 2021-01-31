<?php

//file_get_contents("http://x.testjq.com/index/test/toast")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>
    .x{background-color: red}
</style>
<body>

<div class="box">
    <div class="a">aaaaaaaaa</div>
</div>

</body>

<script src="https://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>

<script>
    var myDate = new Date;
    var year = myDate.getFullYear(); //获取当前年
    var mon = myDate.getMonth() + 1; //获取当前月
    var date = myDate.getDate(); //获取当前日
    var h = myDate.getHours();//获取当前小时数(0-23)
    var m = myDate.getMinutes();//获取当前分钟数(0-59)
    var s = myDate.getSeconds();//获取当前秒
    // $(".a").after('<div class="a">ddddd'+h+"/"+m+"/"+s+'</div>')
    location.href = "index/test/toast"
</script>

</html>