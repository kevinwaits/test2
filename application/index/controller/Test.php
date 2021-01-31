<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/16
 * Time: 11:05
 */

namespace app\index\controller;

use think\Controller;

class Test extends Controller
{
    public function toast() {
        return $this->fetch();
    }

    public function js() {
        return $this->fetch();
    }

    public function testrun() {
        return $this->fetch();
    }

    public function get_aj() {
        $data = $this->request->post("");
        dump($data);
        dump($data["a"]);
    }

    public function forfeng() {
            return $this->fetch();
    }

    public function ddd() {
        $mystr = '<div class=\"clt2\">
                    <div class=\"son\"><b>84</b><p>今日访问</p></div>
                    <div class=\"son\"> <b></b><p>昨日访问</p></div>
                    <div class=\"son\"> <b><script>document.write(Number()+Number()+Number()+Number()+Number()+Number(84)+Number())</script></b><p>一周访问</p></div>
                    <div class=\"son\"> <b><script>document.write(parseInt((Number()+Number()+Number()+Number()+Number()+Number(84)+Number())*4.2))</script></b><p>本月流量</p></div>
                </div>';

        $newstr='document.write(Number()+Number()+Number()+Number()+Number()+Number(84)+Number())</script></b><p>一周访问</p></div>';

        $pre =  '/<b>(.*?)<\/b>/s';
        $px = '/(Number((.*?))+Number((.*?))+Number((.*?))+Number((.*?))+Number((.*?))+Number((.*?))+Number((.*?)))/s';
        preg_match_all($px,$newstr,$mymatch);
        dump($mymatch);
    }

    public function shipin() {
        return $this->fetch();
    }

    public function shipin2() {
        return $this->fetch();
    }

    public function a() {


        $data = "https://news.163.com/20/1028/15/FQ1MQKT90001899O.html?clickfrom=w_yw";
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
        dump($re);
        exit;

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

    public function product() {
            return $this->fetch();
    }



}