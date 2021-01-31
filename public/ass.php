
<?php

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "yg2";

    // 创建连接
    $conn = new mysqli($servername, $username, $password,$dbname);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM yg_keyset";
    $result = $conn->query($sql);


?>


<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>关键词排名查询系统_异地排名查询 - SEO平台</title>
    <meta name="keywords" content="关键词排名查询,异地排名查询,SEO排名查询">
    <meta name="description" content="爱站网关键词排名查询工具为您提供网站关键词排名查询、异地关键词排名查询，让您快速了解网站关键词全国各地的排名情况，随时随地了解各地排名情况。"></head>
<link rel="stylesheet" href="/static/forjs/css/taskRank.css">
<title>index</title>

<body>

<?php
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()[0]) {
            ?>
<div class="mykeyword">
    <?php echo $row['keywords']; ?>
</div>
<?php
        }
    } else {
        echo "0 结果";
    }
?>


<div class="rankBox">

    <div class="inputBox">
        <h4>异地排名查询</h4>
        <div class="textbox">
            <input type="text" name class="ipt" id="keyword" placeholder="" value="宁波网络推广">
            <input type="text" name class="ipt" id="url" placeholder="" value="www.cnhuashuo.com">
        </div>
        <select id="ssyq" class="ssyq">
            <option value="1">百度移动</option>
            <option value="2" selected="selected">百度PC</option>
            <option value="3">360移动</option>
            <option value="4">360PC</option>
            <option value="5">搜狗移动</option>
            <option value="6">搜狗PC</option>
            <option value="7">神马</option>
        </select>
        <div class="btn query" id>查 询</div>
        <div class="btn" id="pl">批量查询</div>
    </div>
    <div>
        <div class="show_list">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" v-loading="loading">
                <thead>
                <tr>
                    <th height="40" align="center" valign="middle" class="title_bg" style="width: 73px;">编号</th>
                    <th height="40" align="center" valign="middle" class="title_bg">关键词</th>
                    <th height="40" align="center" valign="middle" class="title_bg">网址</th>
                    <th height="40" align="center" valign="middle" class="title_bg">搜索引擎</th>

                    <th height="40" align="center" valign="middle" class="title_bg">北京联通</th>

                    <th height="40" align="center" valign="middle" class="title_bg">东莞电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">杭州电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">上海电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">石家庄电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">济南电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">天津电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">苏州电信</th>

                    <th height="40" align="center" valign="middle" class="title_bg">广州电信</th>
                    <th height="40" align="center" valign="middle" class="title_bg">深圳电信</th>
                </tr>
                </thead>
                <tbody id="tbody">


                </tbody>
            </table>
        </div>
    </div>
    <div class="mock">
        <div class="conent">
            <h3>批量查询</h3>
            <div>
                <div class="col">
                    <label class="lab">搜索引擎：</label>
                    <select id="ssyq" class="ssyq">
                        <option value="1">百度移动</option>
                        <option value="2" selected="selected">百度PC</option>
                        <option value="3">360移动</option>
                        <option value="4">360PC</option>
                        <option value="5">搜狗移动</option>
                        <option value="6">搜狗PC</option>
                        <option value="7">神马</option>
                    </select>
                </div>
                <div class="col">
                    <div class="iptbox">
                        <label class="lab">关键词：</label>
                        <textarea name id="keywords" cols="30" rows="10"></textarea>
                    </div>
                    <div class="iptbox">
                        <label class="lab">网址：</label>
                        <textarea name id="urls" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="footer">
                    <div class="btn query" id>查 询</div>
                    <div class="btn close">取 消</div>
                </div>
            </div>
        </div>
    </div>
    <div id="background" class="background" style="display: none; "></div>
    <div id="progressBar" class="progressBar" style="display: none; ">数据加载中，请稍等...</div>
</div>
<script src="/static/forjs/js/md5.js"></script>
<script src="/static/forjs/js/jquery-1.10.2.min_65682a2.js"></script>
<script src="/static/forjs/js/taskRank.js"></script>
<script>

</script>
</body>
</html>