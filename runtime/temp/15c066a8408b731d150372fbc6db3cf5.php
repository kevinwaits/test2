<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\wangzhua\handle.html";i:1601434966;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="/static/css/kevin_main.css" rel="stylesheet" />
</head>

<style>
    body {
        font: 14px/150% microsoft yahei,tahoma;
    }
    .clear {
        clear: both
    }
    .RadioStyle input {
        display: none
    }
    .RadioStyle label {
        border: 1px solid #CCC;
        color: #666;
        padding: 2px 10px 2px 5px;
        line-height: 28px;
        min-width: 80px;
        text-align: center;
        float: left;
        margin: 2px;
        border-radius: 4px
    }
    .RadioStyle input:checked + label {
        background: url(/static/image/ico_checkon.svg) no-repeat right bottom;
        border: 1px solid #00a4ff;
        background-size: 21px 21px;
        color: #00a4ff
    }
    .RadioStyle input:disabled + label {
        opacity: 0.7;
    }
</style>

<body class="item_box">

        <div class=" d-flex a-center flex-row j-between x">
            <div class="RadioStyle">
                <div class="Block PaddingL">

                    <input type="checkbox" id="_for_label" class="mycheckbox bor_blue"
                           data-checkbox="" checked/>
                    <label for="_for_label">使用</label>

                    <button class="btn btn-danger" onclick="" id="" >拆分</button>

                    <textarea type="text"  cols="200" class="mytextarea "
                              data-textarea=""
                              name="_name">样板div
                    </textarea>

                </div>
            </div>
        </div>

        <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?>
        <div class="<?php echo $one['myclass']; ?>_div d-flex a-center flex-row j-between ">
            <div class="RadioStyle">
                <div class="Block PaddingL">

                    <input type="checkbox" id="<?php echo $one['myclass']; ?>_for_label" class="mycheckbox bor_blue"
                           data-checkbox="<?php echo $one['myclass']; ?>" checked/>
                    <label for="<?php echo $one['myclass']; ?>_for_label">女</label>

                    <button class="btn btn-danger" onclick="split_btn(this)" id="<?php echo $one['myclass']; ?>" >拆分</button>

                    <textarea type="text"  cols="200" class="mytextarea <?php echo $one['myclass']; ?>"
                              data-textarea="<?php echo $one['myclass']; ?>" name="<?php echo $one['myclass']; ?>_name"><?php echo $one['str']; ?>
                    </textarea>

                </div>
            </div>
        </div>

        <?php endforeach; endif; else: echo "" ;endif; ?>
                <!--&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->
                <!-- 按钮触发模态框 -->
                <button class=" btn-primary btn-lg make_art " data-toggle="modal" data-target="#myModal">
                    生成随机文章
                </button>
                 模态框（Modal）
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <h2 class="modal-title make_art" id="myModalLabel">
                                    点击再次排序
                                </h2>
                                <button type="button" class="close close-lg" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>

                            </div>
                            <div class="modal-body">

                                <div id="preview_div"></div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                </button>
                                <button type="button" class="btn btn-primary">
                                    提交更改
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
                <!--&#45;&#45;&#45;&#45;&#45;&#45;&#45;&;&#45;&#45#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->

        <!--<button class="make_art">立即生成</button>-->
                <!--<div id="preview_div"></div>-->

        <div class="insert_flag">insert_flag</div>

</body>

<script src="/static/js/js.js"></script>
<script src="/static/bootstrap/js/bootstrap.js"></script>
<script src="/static/js/cookie.js"></script>

<script>
            $(".mytextarea").each(function(){
                $(this).attr("rows",$(this).val().length/60)
            });

            // $(".btn").click(function () {
            //     var x = $(this).attr("id")
            //     str_for_split = $("."+x).val();
            //     arr = str_for_split.split("。");
            //     // arr = str_for_split.split(".");
            //     arr = arr.filter(s => $.trim(s).length > 0);
            //     arr = arr.reverse()
            //     console.log(arr)
            //     for(i=0;i<arr.length;i++){
            //         $(".item_box").clone().appendTo("."+x+"_insert")
            //     }
            //     // $("."+x+"_div").remove()
            // });

            function split_btn(x){
                console.log($(x).next().val())
                arr = $(x).next().val().split("。");
                arr = arr.filter(s => $.trim(s).length > 0);
                arr = arr.reverse()
                console.log(arr)

                for(i=0;i<arr.length;i++){
                    $(".item_box").children('.x').clone().appendTo(".insert_flag")
                }
            }

            console.log(1111);

            $(".make_art").click(function () {

                $(".preview_item").remove()

                var preview_arr= new Array()
                preview_arr=[]

                // 循环处理,push进去
                $(".mycheckbox").each(function(){
                    if($(this).is(':checked')){
                        preview_arr.push($("[data-textarea="+$(this).attr("data-checkbox")+"]").val())
                    }
                });
                // 循环处理,push进去

                preview_arr.sort(function(){return Math.random()>0.5?-1:1;});

                for(i=0;i<preview_arr.length;i++){
                        $("#preview_div").after('<div class="preview_item">'+preview_arr[i]+'</div>');
                    }

            });

</script>

</html>