<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\wangzhua\show.html";i:1602222024;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <br>

    <form role="form" action="<?php echo url('index/Wangzhua/handle'); ?>"  name="myform" method="post">
        <input class="col-lg-8 offset-2" name="url"> <br> <br>
        <button class="btn btn-danger offset-2 " type="submit">提交</button>
    </form>

</body>
</html>