<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\phpstudy_pro\WWW\testjq\public/../application/index\view\test\js.html";i:1603786109;}*/ ?>


<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no,
        minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
</head>

<body>
    <input type="checkbox" checked><span>aa</span>
    <input type="checkbox" value="8888"><span>bb</span>
    <input type="checkbox" checked><span>cc</span>
    <input type="checkbox"><span>dd</span>
    <input type="checkbox" checked><span>ee</span>

    <div class="a">a</div>
    <div class="a">b</div>
    <div class="a">c</div>
    <div class="a">d</div>

    <!--<form id="d_form">-->
    <!--<div class="layui-input-block">-->
        <!--<select name="city" lay-verify="required">-->
            <!--<option value="">888888</option>-->
            <!--<option value="0">北京</option>-->
            <!--<option value="1">上海</option>-->
            <!--<option value="2">广州</option>-->
            <!--<option value="3">深圳</option>-->
            <!--<option value="4">杭州</option>-->
        <!--</select>-->
    <!--</div>-->
    <!--</form>-->

<!--<button class="save">提交</button>-->

</body>

<script src="/static/js/js.js"></script>

<script>

        $(".save").click(function () {
                d_ajax();
            });
        function d_ajax() {
        //      alert("d_ajax_button");      //首先测试 d_ajax是否能启动
                alert($("#d_form").serialize());    //再次测试 d_ajax 里的 表单的序列化是否能正确
            }

    // let sum=(a,b)=>{
    //     return a+b;
    // }

    // let brr=crr.filter((value,index,arr)=> {
    //     return arr.indexOf(value)==index;
    // })

    // let btns = document.querySelectorAll('.a');
    // console.log(btns)
    //
    // console.log(sum(1,2))
    //
    // let crr = $(".a")
    // let drr = Array.from(crr)
    // console.log(crr)
    // console.log(drr)

    // let arr = [1,2,3,4,5,6,7,8,1,2,3]
    //
    // let brr=arr.filter((value,index,arr)=> {
    //     return value > 2
    // })
    //
    // console.log(brr)

    // const user = [
    //     { name: "李四", js: 20 },
    //     { name: "马六", js: 30 },
    //     { name: "张三", js: 40 }
    // ];
    //
    // const resust = user.every((value,index,arr)=> {
    //     return value.js>30
    // })
    //
    // let res = user.every((a,x,r)=>{
    //     return true
    // })
    //
    // let ress = user.some((a,x,r)=>{
    //     return false
    // })

    // let lessons = [
    //         { name: "李四", js: 20 },
    //         { name: "马六", js: 30 },
    //         { name: "张三", js: 40 }
    // ];
    //
    // let arr = lessons.map((a,b,c)=>{
    //     if(a.js>30){
    //         return a
    //     }else{
    //         return ""
    //     }
    // })
    //
    // console.log(arr)

    // let arr = [1,2,3,4,5,3,2,4,5,6,7]
    // let brr = arr.reduce((x,a,b,c)=>{
    //     if(2 in x){}
    //     return x
    // })
    // console.log(brr)

    // var str = 'asfadewqqfh';
    // var obj = str.split('').reduce((item,cart,x,y) => {
    //     //三元运算符
    //     item[cart] ? item[cart] ++ : item[cart] = 1
    //     return item
    // },{})
    // console.table(obj)//以上结果输出为a: 2 d: 1 e: 1 f: 2 h: 1 q: 2 s: 1 w: 1

        // var arr = [[0, 1], [2, 3], [4, 5]]
        // var newArr = arr.reduce((pre, cur) => {
        //     return pre.concat(cur)
        // })
        // console.log(newArr)

    // let arr = [1,2,3,4,5,3,2,4,5,6,7]
    let arr = ["a","b","c","d","e","f"]
    let brr = arr.reduce((x,a,b,c)=>{
        return x+a
    })
    console.log(brr)


    var names = ['Alice', 'Bob', 'Tiff', 'Alice'];
    var nameNum = names.reduce((pre, cur) => {
        if (cur in pre) {
            pre[cur]++
        } else {
            pre[cur] = 1
        }
        return pre
    },{})
    console.log(nameNum )


</script>

</html>

