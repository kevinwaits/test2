<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/25
 * Time: 9:55
 */

namespace app\index\controller;

use think\Console;
use think\Controller;
use think\Db;

class Guanggao extends Controller
{

    public function handle() {

        $data = $this->request->param("url");
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_URL, $data);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0);                      // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源

        //如果出现中文乱码使用下面代码
//        $re = iconv("gb2312", "utf-8",$re);


        dump(mb_detect_encoding($re));


        //      三次处理提取 div span p 里的内容
        preg_match_all("/<div((\w|\W)*?)<\/div>/", $re, $match1);
        preg_match_all("/<span((\w|\W)*?)<\/span>/", $re, $match2);
        preg_match_all("/<p(\w|\W)*?<\/p>/", $re, $match3);
        //      三次处理提取 div span p 里的内容

        $arr= array_merge_recursive($match1[0],$match2[0],$match3[0]);

        //去掉文字中的换行,空格等
        function myTrim($str)
        {
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            return str_replace($search, $replace, $str);
        }

        //去掉文字中的换行,空格等
        for($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = myTrim($arr[$i]);
            $arr[$i] = strip_tags($arr[$i]);
        }
        //去掉文字中的换行,空格等

        // 建立新数组,有效的str放进去,等着分配
        $newarr = [];
        for($i=0;$i<count($arr);$i++)
        {
            if(strlen($arr[$i])>40){
//                $newarr[] = $arr[$i];
                $newarr[$i]["str"] = trim($arr[$i]);
                $newarr[$i]["myclass"] = "s".$i;
            }
        }
        // 建立新数组,有效的str放进去,等着分配

        $this->assign("link", $newarr);
        return $this->fetch();
    }

    public function show() {
        return $this->fetch();
    }

    public function handle2() {

        $data = $this->request->param("url");
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_URL, $data);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0); // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源

        //如果出现中文乱码使用下面代码
//        $re = iconv("gb2312", "utf-8",$re);

        $x='/<.*?>(.*?)<\/.*?>/';
        /*        $x='/<[^a].*?>(.*?)<\/a>/';*/
        /*        $x='/<[^a^button].*?>(.*?)<\/.*?>/';*/
        /*        $x='/(<[^a].*?>(.*?)<\/a><[^button].*?>(.*?)<\/button><.*?>(.*?)<\/.*?>)/';*/
        preg_match_all($x,$re,$mymatch);
        $arr=$mymatch[0];

        function myTrim($str)
        {
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            return str_replace($search, $replace, $str);
        }

        //去掉文字中的换行,空格等
        for($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = myTrim($arr[$i]);
            $arr[$i] = strip_tags($arr[$i]);
        }
        //去掉文字中的换行,空格等

        // 建立新数组,有效的str放进去,等着分配
        $newarr = [];
        for($i=0;$i<count($arr);$i++)
        {
            if(strlen($arr[$i])>40){
//                $newarr[] = $arr[$i];
                $newarr[$i]["str"] = trim($arr[$i]);
                $newarr[$i]["myclass"] = "s".$i;
            }
        }
        // 建立新数组,有效的str放进去,等着分配

        $this->assign("link", $newarr);
        return $this->fetch();
    }

    public function handle3() {

//        $data = $this->request->param("url");
        $data="https://www.baidu.com/s?ie=utf-8&f=8&rsv_bp=1&rsv_idx=1&tn=baidu&wd=%E9%A9%AC%E5%85%8B%E6%9D%AF&fenlei=256&oq=%25E7%2594%25B5%25E7%2584%258A%25E6%259C%25BA&rsv_pq=dab44ac100024064&rsv_t=7008LzxDGHQYgUFHxohsYsXXofoEFSifgVJkq0IvfuEIZ96cxSXrtLd7brE&rqlang=cn&rsv_enter=1&rsv_dl=tb&rsv_btype=i&inputT=4912&rsv_sug3=29&rsv_sug1=28&rsv_sug7=101&bs=%E7%94%B5%E7%84%8A%E6%9C%BA";
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_URL, $data);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0);                      // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源
        dump($re);

        //如果出现中文乱码使用下面代码
//        $re = iconv("gb2312", "utf-8",$re);


        $x='/<.*?>(.*?)<\/.*?>/';
        /*        $x='/<[^a].*?>(.*?)<\/a>/';*/
        /*        $x='/<[^a^button].*?>(.*?)<\/.*?>/';*/
        /*        $x='/(<[^a].*?>(.*?)<\/a><[^button].*?>(.*?)<\/button><.*?>(.*?)<\/.*?>)/';*/
        preg_match_all($x,$re,$mymatch);
        $arr=$mymatch[0];
        dump($arr);

        function myTrim($str)
        {
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            return str_replace($search, $replace, $str);
        }

        //去掉文字中的换行,空格等
        for($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = myTrim($arr[$i]);
            $arr[$i] = strip_tags($arr[$i]);
        }
        //去掉文字中的换行,空格等

        // 建立新数组,有效的str放进去,等着分配
        $newarr = [];
        for($i=0;$i<count($arr);$i++)
        {
            if(strlen($arr[$i])>40){
//                $newarr[] = $arr[$i];
                $newarr[$i]["str"] = trim($arr[$i]);
                $newarr[$i]["myclass"] = "s".$i;
            }
        }
        // 建立新数组,有效的str放进去,等着分配

//        $this->assign("link", $newarr);
//        return $this->fetch();

    }

    public function testtime() {
        return $this->fetch();
    }

    public function testdate() {
            return $this->fetch();
    }

    public function yuanshi() {
        $data="https://wenku.baidu.com/view/15df9739bdeb19e8b8f67c1cfad6195f312be898.html?fr=aladdin664466&ind=1#";
        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_URL, $data);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0);                      // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源



        //如果出现中文乱码使用下面代码
//        $re = iconv("gb2312", "utf-8",$re);





        //      三次处理提取 div span p 里的内容
        preg_match_all("/<div((\w|\W)*?)<\/div>/", $re, $match1);
        preg_match_all("/<span((\w|\W)*?)<\/span>/", $re, $match2);
        preg_match_all("/<p(\w|\W)*?<\/p>/", $re, $match3);
        //      三次处理提取 div span p 里的内容

        $arr= array_merge_recursive($match1[0],$match2[0],$match3[0]);

        dump($arr);exit;

        //去掉文字中的换行,空格等
        function myTrim($str)
        {
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            return str_replace($search, $replace, $str);
        }

        //去掉文字中的换行,空格等
        for($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = myTrim($arr[$i]);
            $arr[$i] = strip_tags($arr[$i]);
        }
        //去掉文字中的换行,空格等

        // 建立新数组,有效的str放进去,等着分配
        $newarr = [];

        for($i=0;$i<count($arr);$i++)
        {
            if(strlen($arr[$i])>40){
//                $newarr[] = $arr[$i];
                $newarr[$i]["str"] = trim($arr[$i]);
                $newarr[$i]["myclass"] = "s".$i;
            }
        }
        // 建立新数组,有效的str放进去,等着分配

        $this->assign("link", $newarr);
        return $this->fetch();
    }

    public function handle4() {
        $data="https://wenku.baidu.com/view/15df9739bdeb19e8b8f67c1cfad6195f312be898.html?fr=aladdin664466&ind=1#";



        $ch = curl_init();//初始化
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_URL, $data);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0); // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源

        //如果出现中文乱码使用下面代码
        $wcharset = preg_match("/<meta.+?charset=[^\w]?([-\w]+)/i",$re,$temp) ? strtolower($temp[1]):"";

        if($wcharset=="gb2312"){
            $re = iconv("GBK", "utf-8",$re);
        }


        $x='/<.*?>(.*?)<\/.*?>/';
        preg_match_all($x,$re,$mymatch);
        $arr=$mymatch;

        halt($arr);
        function myTrim($str)
        {
            $search = array(" ","　","\n","\r","\t");
            $replace = array("","","","","");
            return str_replace($search, $replace, $str);
        }
        //去掉文字中的换行,空格等
        for($i=0;$i<count($arr);$i++)
        {
            $arr[$i] = myTrim($arr[$i]);
            $arr[$i] = strip_tags($arr[$i]);
        }
        //去掉文字中的换行,空格等
        // 建立新数组,有效的str放进去,等着分配
        $newarr = [];
        for($i=0;$i<count($arr);$i++)
        {
            if(strlen($arr[$i])>40){
//                $newarr[] = $arr[$i];
                $newarr[$i]["str"] = trim($arr[$i]);
                $newarr[$i]["myclass"] = "s".$i;
            }
        }
        // 建立新数组,有效的str放进去,等着分配

//        查询默认tdk
        $info= Db::table('yg_seo_yg')->where("page", "通知公告")->find();

//        查询默认tdk
        $this->assign([
            "link" => $newarr,
            "info" => $info
        ]);
        return $this->fetch();
    }

    public function handle5() {

        $str='<div class="reader-txt-layer" style="z-index:2"><div class="ie-fix"><p class="reader-word-layer reader-word-s1-1" style="width:1341px;height:219px;line-height:219px;top:1278px;left:1429px;z-index:119;false">最新广告法禁用词</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:1278px;left:2770px;z-index:121;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:1773px;left:1429px;z-index:122;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:1773px;left:1596px;z-index:123;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-3" style="width:1000px;height:219px;line-height:219px;top:1773px;left:1764px;z-index:124;false">与“最”有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:1773px;left:2762px;z-index:126;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:2268px;left:1429px;z-index:127;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:2268px;left:1596px;z-index:128;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-4" style="width:6171px;height:219px;line-height:219px;top:2268px;left:1764px;z-index:130;false">最、最佳、最具、最爱、最赚、最优、最优秀、最好、最大、最大程度、最高、最高</p><p class="reader-word-layer reader-word-s1-5" style="width:6506px;height:219px;line-height:219px;top:2764px;left:1429px;z-index:132;false">级、最高档、最奢侈、最低、最低级、最低价、最底、最便宜、时尚最低价、最流行、最</p><p class="reader-word-layer reader-word-s1-5" style="width:6506px;height:219px;line-height:219px;top:3259px;left:1429px;z-index:134;false">受欢迎、最时尚、最聚拢、最符合、最舒适、最先、最先进、最先进科学、最先进加工工</p><p class="reader-word-layer reader-word-s1-5" style="width:4671px;height:219px;line-height:219px;top:3754px;left:1429px;z-index:135;false">艺、最先享受、最后、最后一波、最新、最新科技、最新科学。</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:3754px;left:6098px;z-index:137;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:4250px;left:1429px;z-index:138;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:4250px;left:1596px;z-index:139;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-3" style="width:1000px;height:219px;line-height:219px;top:4250px;left:1764px;z-index:140;false">与“一”有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:4250px;left:2762px;z-index:142;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:4745px;left:1429px;z-index:143;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:4745px;left:1596px;z-index:144;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-6" style="width:5170px;height:219px;line-height:219px;top:4745px;left:1764px;z-index:145;false">第一、中国第一、全网第一、销量第一、排名第一、唯一、第一品牌、</p><p class="reader-word-layer reader-word-s1-2" style="width:410px;height:219px;line-height:219px;top:4745px;left:6933px;z-index:146;letter-spacing:-0.21000000000000002px;false">NO.1</p><p class="reader-word-layer reader-word-s1-2" style="width:167px;height:219px;line-height:219px;top:4745px;left:7343px;z-index:148;">、</p><p class="reader-word-layer reader-word-s1-2" style="width:471px;height:219px;line-height:219px;top:5241px;left:1429px;z-index:149;letter-spacing:-0.59px;false">TOP.1</p><p class="reader-word-layer reader-word-s1-7" style="width:3501px;height:219px;line-height:219px;top:5241px;left:1901px;z-index:150;false">、独一无二、全国第一、一流、一天、仅此一次</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:5241px;left:5403px;z-index:151;">(</p><p class="reader-word-layer reader-word-s1-2" style="width:333px;height:219px;line-height:219px;top:5241px;left:5458px;z-index:152;letter-spacing:-1.7999999999999998px;false">一款</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:5241px;left:5792px;z-index:153;">)</p><p class="reader-word-layer reader-word-s1-9" style="width:1333px;height:219px;line-height:219px;top:5241px;left:5847px;z-index:154;false">、最后一波、全国</p><p class="reader-word-layer reader-word-s1-2" style="width:108px;height:219px;line-height:219px;top:5241px;left:7223px;z-index:155;">X</p><p class="reader-word-layer reader-word-s1-7" style="width:501px;height:219px;line-height:219px;top:5241px;left:7371px;z-index:157;false">大品牌</p><p class="reader-word-layer reader-word-s1-2" style="width:502px;height:219px;line-height:219px;top:5736px;left:1429px;z-index:158;false">之一。</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:5736px;left:1930px;z-index:160;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:6231px;left:1429px;z-index:161;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:6231px;left:1596px;z-index:162;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-10" style="width:501px;height:219px;line-height:219px;top:6231px;left:1764px;z-index:163;false">与“级</p><p class="reader-word-layer reader-word-s1-1" style="width:79px;height:219px;line-height:219px;top:6231px;left:2263px;z-index:164;">/</p><p class="reader-word-layer reader-word-s1-12" style="width:668px;height:219px;line-height:219px;top:6231px;left:2341px;z-index:165;false">极”有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:6231px;left:3008px;z-index:167;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:6726px;left:1429px;z-index:168;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:6726px;left:1596px;z-index:169;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-7" style="width:501px;height:219px;line-height:219px;top:6726px;left:1764px;z-index:170;false">国家级</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:6726px;left:2265px;z-index:171;">(</p><p class="reader-word-layer reader-word-s1-2" style="width:1503px;height:219px;line-height:219px;top:6726px;left:2318px;z-index:172;letter-spacing:-0.65px;false">相关单位颁发的除外</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:6726px;left:3822px;z-index:173;">)</p><p class="reader-word-layer reader-word-s1-13" style="width:3503px;height:219px;line-height:219px;top:6726px;left:3875px;z-index:174;false">、国家级产品、全球级、宇宙级、世界级、顶级</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:6726px;left:7379px;z-index:175;">(</p><p class="reader-word-layer reader-word-s1-14" style="width:333px;height:219px;line-height:219px;top:6726px;left:7434px;z-index:176;false">顶尖</p><p class="reader-word-layer reader-word-s1-2" style="width:71px;height:219px;line-height:219px;top:6726px;left:7768px;z-index:177;">/</p><p class="reader-word-layer reader-word-s1-2" style="width:167px;height:219px;line-height:219px;top:6726px;left:7838px;z-index:179;">尖</p><p class="reader-word-layer reader-word-s1-2" style="width:167px;height:219px;line-height:219px;top:7222px;left:1429px;z-index:180;">端</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:7222px;left:1596px;z-index:181;">)</p><p class="reader-word-layer reader-word-s1-6" style="width:2669px;height:219px;line-height:219px;top:7222px;left:1651px;z-index:182;false">、顶级工艺、顶级享受、极品、极佳</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:7222px;left:4321px;z-index:183;">(</p><p class="reader-word-layer reader-word-s1-14" style="width:333px;height:219px;line-height:219px;top:7222px;left:4376px;z-index:184;false">绝佳</p><p class="reader-word-layer reader-word-s1-2" style="width:71px;height:219px;line-height:219px;top:7222px;left:4710px;z-index:185;">/</p><p class="reader-word-layer reader-word-s1-2" style="width:335px;height:219px;line-height:219px;top:7222px;left:4780px;z-index:186;false">绝对</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:7222px;left:5115px;z-index:187;">)</p><p class="reader-word-layer reader-word-s1-15" style="width:1169px;height:219px;line-height:219px;top:7222px;left:5169px;z-index:188;false">、终极、极致。</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:7222px;left:6336px;z-index:190;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:7717px;left:1429px;z-index:191;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:7717px;left:1596px;z-index:192;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-10" style="width:501px;height:219px;line-height:219px;top:7717px;left:1764px;z-index:193;false">与“首</p><p class="reader-word-layer reader-word-s1-1" style="width:79px;height:219px;line-height:219px;top:7717px;left:2263px;z-index:194;">/</p><p class="reader-word-layer reader-word-s1-1" style="width:167px;height:219px;line-height:219px;top:7717px;left:2341px;z-index:195;">家</p><p class="reader-word-layer reader-word-s1-1" style="width:79px;height:219px;line-height:219px;top:7717px;left:2509px;z-index:196;">/</p><p class="reader-word-layer reader-word-s1-12" style="width:668px;height:219px;line-height:219px;top:7717px;left:2587px;z-index:197;false">国”有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:7717px;left:3254px;z-index:199;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:8213px;left:1429px;z-index:200;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:8213px;left:1596px;z-index:201;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-4" style="width:6171px;height:219px;line-height:219px;top:8213px;left:1764px;z-index:203;false">首个、首选、独家、独家配方、全国首发、首款、全国销量冠军、国家级产品、国家</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:8708px;left:1429px;z-index:204;">(</p><p class="reader-word-layer reader-word-s1-15" style="width:668px;height:219px;line-height:219px;top:8708px;left:1484px;z-index:205;false">国家免检</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:8708px;left:2152px;z-index:206;">)</p><p class="reader-word-layer reader-word-s1-6" style="width:3002px;height:219px;line-height:219px;top:8708px;left:2208px;z-index:207;false">、国家领导人、填补国内空白、中国驰名</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:8708px;left:5211px;z-index:208;">(</p><p class="reader-word-layer reader-word-s1-15" style="width:668px;height:219px;line-height:219px;top:8708px;left:5264px;z-index:209;false">驰名商标</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:8708px;left:5933px;z-index:210;">)</p><p class="reader-word-layer reader-word-s1-9" style="width:1000px;height:219px;line-height:219px;top:8708px;left:5988px;z-index:211;false">、国际品质。</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:8708px;left:6987px;z-index:213;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:9203px;left:1429px;z-index:214;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:9203px;left:1596px;z-index:215;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-10" style="width:834px;height:219px;line-height:219px;top:9203px;left:1764px;z-index:216;false">与品牌有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:9203px;left:2596px;z-index:218;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:9698px;left:1429px;z-index:219;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:9698px;left:1596px;z-index:220;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-7" style="width:2168px;height:219px;line-height:219px;top:9698px;left:1764px;z-index:221;false">王牌、领袖品牌、世界领先、</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:9698px;left:3932px;z-index:222;">(</p><p class="reader-word-layer reader-word-s1-14" style="width:333px;height:219px;line-height:219px;top:9698px;left:3987px;z-index:223;false">遥遥</p><p class="reader-word-layer reader-word-s1-2" style="width:55px;height:219px;line-height:219px;top:9698px;left:4321px;z-index:224;">)</p><p class="reader-word-layer reader-word-s1-13" style="width:3503px;height:219px;line-height:219px;top:9698px;left:4376px;z-index:226;false">领先、领导者、缔造者、创领品牌、领先上市、</p><p class="reader-word-layer reader-word-s1-5" style="width:6506px;height:219px;line-height:219px;top:10194px;left:1429px;z-index:228;false">巨星、著名、掌门人、至尊、巅峰、奢侈、优秀、资深、领袖、之王、王者、冠军。与虚</p><p class="reader-word-layer reader-word-s1-2" style="width:502px;height:219px;line-height:219px;top:10690px;left:1429px;z-index:229;false">假有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:10690px;left:1930px;z-index:230;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-7" style="width:4835px;height:219px;line-height:219px;top:10690px;left:2013px;z-index:231;false">史无前例、前无古人、永久、万能、祖传、特效、无敌、纯天然、</p><p class="reader-word-layer reader-word-s1-2" style="width:444px;height:219px;line-height:219px;top:10690px;left:6847px;z-index:232;letter-spacing:0.1px;false">100%</p><p class="reader-word-layer reader-word-s1-2" style="width:666px;height:219px;line-height:219px;top:10690px;left:7291px;z-index:234;letter-spacing:-1.1600000000000001px;false">、高档、</p><p class="reader-word-layer reader-word-s1-2" style="width:2002px;height:219px;line-height:219px;top:11185px;left:1429px;z-index:235;letter-spacing:-0.79px;false">正品、真皮、超赚、精准。</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:11185px;left:3431px;z-index:237;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:11680px;left:1429px;z-index:238;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:11680px;left:1596px;z-index:239;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s1-10" style="width:834px;height:219px;line-height:219px;top:11680px;left:1764px;z-index:240;false">与虚假有关</p><p class="reader-word-layer reader-word-s1-2" style="width:49px;height:219px;line-height:219px;top:11680px;left:2596px;z-index:241;font-family:simsun;"> 
</p></div></div></div></div></div></div><div class="hx-warp"><div id="wkad21"><div class="fc-parallax-scrolling">              <div class="fc-parallax-scrolling-wrapper" style="top: 0px">                                                <div class="fc-parallax-scrolling-text">                         <div class="fc-parallax-scrolling-text-inner">                             <div class="fc-parallax-scrolling-title fc-parallax-scrolling-text-line">                                 网站优化-认准网赢战车，用效果说话，无排名不收费                             </div>                             <div class="fc-parallax-scrolling-content">                                 <div class="fc-parallax-scrolling-content-left">                                     <p class="fc-parallax-scrolling-content-inner">                                         <span class="fc-parallax-scrolling-tag">广告</span>                                         <span class="fc-parallax-scrolling-sub fc-parallax-scrolling-text-line">网站优化-认准网赢战车，专业SE0优化公司，用效果说话，无排名不收费!10万家中</span>                                         <span class="fc-parallax-scrolling-bogus">查看详情 &gt;</span>                                     </p>                                 </div>                             </div>                         </div>                     </div>                     <div class="fc-parallax-scrolling-image">                         <ul>                             <li>                                 <div style="background-image: url(http://ns-strategy.cdn.bcebos.com/ns-strategy/upload/applvyou/part-001092-67.jpg)"></div>                             </li>                             <li class="fc-parallax-scrolling-second-image">                                 <div style="background-image: url(http://ns-strategy.cdn.bcebos.com/ns-strategy/upload/applvyou/part-001035-242.jpg)"></div>                             </li>                             <li>                                 <div style="background-image: url(http://ns-strategy.cdn.bcebos.com/ns-strategy/upload/applvyou/part-004754-1413.jpg)"></div>                             </li>                         </ul>                     </div>                 </a>                      </div>      </div> </div><a class="ad-logo"></a></div><div class="reader-page " id="pageNo-2" data-page-no="2" data-mate-width="892.979" data-mate-height="1262.879" data-scale="0.7070978296416364" style="height: 1336.45px; opacity: 1;" data-render="1"><div class="reader-parent-2b59e4862cc58bd63186bd71 reader-parent " style="position:relative;top:0;left:0;-webkit-transform:scale(1.00);-webkit-transform-origin:left top;"><div class="reader-wrap2b59e4862cc58bd63186bd71" style="position:absolute;top:0;left:0;width:100%;height:100%;"><div class="reader-main-2b59e4862cc58bd63186bd71" style="position:relative;top:0;left:0;width:100%;height:100%;"><div class="reader-pic-layer" style="z-index:1"><div class="ie-fix"><div class="reader-pic-item" style="background-image: url(https://wkbjcloudbos.bdimg.com/v1/docconvert5459/wk/1b2a6c04b52352468d859755eae466c4/0.png?responseContentType=image%2Fpng&amp;responseCacheControl=max-age%3D3888000&amp;responseExpires=Thu%2C%2026%20Nov%202020%2013%3A58%3A13%20%2B0800&amp;authorization=bce-auth-v1%2Ffa1126e91489401fa7cc85045ce7179e%2F2020-10-12T05%3A58%3A13Z%2F3600%2Fhost%2F26f9a2c6bd01fa3d911e2cf3a8709d1e81d719c844764a1d2578ddf1dd57b497&amp;x-bce-range=424-847&amp;token=eyJ0eXAiOiJKSVQiLCJ2ZXIiOiIxLjAiLCJhbGciOiJIUzI1NiIsImV4cCI6MTYwMjQ4NTg5MywidXJpIjp0cnVlLCJwYXJhbXMiOlsicmVzcG9uc2VDb250ZW50VHlwZSIsInJlc3BvbnNlQ2FjaGVDb250cm9sIiwicmVzcG9uc2VFeHBpcmVzIiwieC1iY2UtcmFuZ2UiXX0%3D.VrEdGrBMNMWjEccSds41%2F2Z8e7dQCGCzH0vzseOS5us%3D.1602485893);background-position:0px 0px;width:630px;height:1031px;z-index:94;left:158.06010000000003px;top:143.29175px;opacity:1;-webkit-transform: scale(1.0583,1.0583);position:absolute;overflow:hidden;"></div></div></div><div class="reader-txt-layer" style="z-index:2"><div class="ie-fix"><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1278px;left:1429px;z-index:95;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1278px;left:1596px;z-index:96;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:4861px;height:219px;line-height:219px;top:1278px;left:1764px;z-index:97;false">史无前例、前无古人、永久、万能、祖传、特效、无敌、纯天然、</p><p class="reader-word-layer reader-word-s2-0" style="width:446px;height:219px;line-height:219px;top:1278px;left:6626px;z-index:98;letter-spacing:0.77px;false">100%</p><p class="reader-word-layer reader-word-s2-0" style="width:167px;height:219px;line-height:219px;top:1278px;left:7072px;z-index:99;">。</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1278px;left:7240px;z-index:101;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1773px;left:1429px;z-index:102;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1773px;left:1596px;z-index:103;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-4" style="width:834px;height:219px;line-height:219px;top:1773px;left:1764px;z-index:104;false">与欺诈有关</p><p class="reader-word-layer reader-word-s2-3" style="width:49px;height:219px;line-height:219px;top:1773px;left:2596px;z-index:105;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-4" style="width:1167px;height:219px;line-height:219px;top:1773px;left:2680px;z-index:106;false">涉嫌欺诈消费者</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:1773px;left:3846px;z-index:108;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:2268px;left:1429px;z-index:109;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:2268px;left:1596px;z-index:110;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-7" style="width:6171px;height:219px;line-height:219px;top:2268px;left:1764px;z-index:112;false">点击领奖、恭喜获奖、全民免单、点击有惊喜、点击获取、点击转身、点击试穿、点</p><p class="reader-word-layer reader-word-s2-0" style="width:6506px;height:219px;line-height:219px;top:2764px;left:1429px;z-index:114;letter-spacing:-0.77px;false">击翻转、领取奖品涉嫌诱导消费者秒杀、抢爆、再不抢就没了、不会更便宜了、错过就没</p><p class="reader-word-layer reader-word-s2-8" style="width:2170px;height:219px;line-height:219px;top:3259px;left:1429px;z-index:115;false">机会了、万人疯抢、全民疯抢</p><p class="reader-word-layer reader-word-s2-0" style="width:71px;height:219px;line-height:219px;top:3259px;left:3597px;z-index:116;">/</p><p class="reader-word-layer reader-word-s2-0" style="width:666px;height:219px;line-height:219px;top:3259px;left:3669px;z-index:117;letter-spacing:-1.1600000000000001px;false">抢购、卖</p><p class="reader-word-layer reader-word-s2-0" style="width:71px;height:219px;line-height:219px;top:3259px;left:4336px;z-index:118;">/</p><p class="reader-word-layer reader-word-s2-9" style="width:501px;height:219px;line-height:219px;top:3259px;left:4406px;z-index:119;false">抢疯了</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:3259px;left:4906px;z-index:121;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:3754px;left:1429px;z-index:122;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:3754px;left:1596px;z-index:123;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-4" style="width:834px;height:219px;line-height:219px;top:3754px;left:1764px;z-index:124;false">与时间有关</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:3754px;left:2596px;z-index:126;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:4250px;left:1429px;z-index:127;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:4250px;left:1596px;z-index:128;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-10" style="width:1333px;height:219px;line-height:219px;top:4250px;left:1764px;z-index:129;false">限时必须具体时间</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:4250px;left:3098px;z-index:130;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:4837px;height:219px;line-height:219px;top:4250px;left:3180px;z-index:132;letter-spacing:-0.8px;false">今日、今天、几天几夜、倒计时、趁现在、就、仅限、周末、周年</p><p class="reader-word-layer reader-word-s2-8" style="width:4172px;height:219px;line-height:219px;top:4745px;left:1429px;z-index:133;false">庆、特惠趴、购物大趴、闪购、品牌团、精品团、单品团</p><p class="reader-word-layer reader-word-s2-0" style="width:55px;height:219px;line-height:219px;top:4745px;left:5601px;z-index:134;">(</p><p class="reader-word-layer reader-word-s2-9" style="width:1167px;height:219px;line-height:219px;top:4745px;left:5654px;z-index:135;false">必须有活动日期</p><p class="reader-word-layer reader-word-s2-0" style="width:55px;height:219px;line-height:219px;top:4745px;left:6823px;z-index:136;">)</p><p class="reader-word-layer reader-word-s2-11" style="width:1002px;height:219px;line-height:219px;top:4745px;left:6878px;z-index:138;false">严禁使用随时</p><p class="reader-word-layer reader-word-s2-8" style="width:2170px;height:219px;line-height:219px;top:5241px;left:1429px;z-index:139;false">结束、随时涨价、马上降价。</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:5241px;left:3597px;z-index:141;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:5736px;left:1429px;z-index:142;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:5736px;left:1596px;z-index:143;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-4" style="width:834px;height:219px;line-height:219px;top:5736px;left:1764px;z-index:144;false">与权威有关</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:5736px;left:2596px;z-index:146;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:6231px;left:1429px;z-index:147;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:6231px;left:1596px;z-index:148;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-7" style="width:6171px;height:219px;line-height:219px;top:6231px;left:1764px;z-index:150;false">老字号、中国驰名商标、特供、专供、专家推荐、质量免检、无需国家质量检测、免</p><p class="reader-word-layer reader-word-s2-9" style="width:834px;height:219px;line-height:219px;top:6726px;left:1429px;z-index:151;false">抽检、国家</p><p class="reader-word-layer reader-word-s2-0" style="width:214px;height:219px;line-height:219px;top:6726px;left:2305px;z-index:152;letter-spacing:-1.36px;false">XX</p><p class="reader-word-layer reader-word-s2-10" style="width:1333px;height:219px;line-height:219px;top:6726px;left:2562px;z-index:153;false">领导人推荐、国家</p><p class="reader-word-layer reader-word-s2-0" style="width:216px;height:219px;line-height:219px;top:6726px;left:3936px;z-index:154;letter-spacing:0.42999999999999994px;false">XX</p><p class="reader-word-layer reader-word-s2-12" style="width:2002px;height:219px;line-height:219px;top:6726px;left:4193px;z-index:155;false">机关推荐、使用人民币图样</p><p class="reader-word-layer reader-word-s2-0" style="width:55px;height:219px;line-height:219px;top:6726px;left:6195px;z-index:156;">(</p><p class="reader-word-layer reader-word-s2-11" style="width:1002px;height:219px;line-height:219px;top:6726px;left:6249px;z-index:157;false">央行批准除外</p><p class="reader-word-layer reader-word-s2-0" style="width:102px;height:219px;line-height:219px;top:6726px;left:7251px;z-index:159;letter-spacing:-2.5px;false">) 
</p><p class="reader-word-layer reader-word-s2-0" style="width:6173px;height:219px;line-height:219px;top:7222px;left:1762px;z-index:161;letter-spacing:-0.76px;false">这些新广告法禁用词在以后的网络营销推广上肯定用的上，而且现在国家也在打击一</p><p class="reader-word-layer reader-word-s2-12" style="width:2002px;height:219px;line-height:219px;top:7717px;left:1429px;z-index:162;false">些违法事情。且懂且珍惜。</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:7717px;left:3431px;z-index:164;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:8213px;left:1762px;z-index:166;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-13" style="width:952px;height:249px;line-height:249px;top:8693px;left:1762px;z-index:167;false">最新广告法</p><p class="reader-word-layer reader-word-s2-13" style="width:56px;height:249px;line-height:249px;top:8693px;left:2714px;z-index:169;font-family:simsun;"> 
</p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:9203px;left:1429px;z-index:170;font-family:simsun;"> </p><p class="reader-word-layer reader-word-s2-0" style="width:49px;height:219px;line-height:219px;top:9203px;left:1596px;z-index:171;font-family:simsun;"> </p>';

        $px='/<p.*?>(.*?)<\/p>/s';
        preg_match_all($px,$str,$mymatch);
        dump($mymatch[1]);

    }


}