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

class Wangzhua extends Controller
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

}