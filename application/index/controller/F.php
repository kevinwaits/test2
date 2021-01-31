<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/24
 * Time: 14:09
 */

namespace app\index\controller;

use think\Controller;

class F extends Controller
{
    public function usecurl() {
        //调用例子
        date_default_timezone_set('PRC');
        error_reporting(E_ALL^E_NOTICE);
        $url = 'http://bang.dangdang.com/books/newhotsales/01.00.00.00.00.00-recent7-0-0-1-1';
        //这个 $arr 就是需要取的数据集合了。
        $arr = GetArr($url);
        dump($arr);
    }

//正则
    function GetUl($class){return "/<ul class=\"$class\">(.*?)<\/ul>/is";}
    function GetDiv($class){return "/<div class=\"$class\".*?>.*?<\/div>/ism";}
    function GetA(){return '/<a href=\"(.*?)\".*?>(.*?)<\/a>/i';}
    function GetImgSrc(){return '/<img.+src=\"?(.+\.(jpg|gif|bmp|bnp|png))\"?.+>/i';}
    function GetImgTitle(){return '/<img.*title\=[\"|\'](.*)[\"|\'].*>/i';}
    function GetImgAttr($attr = ''){return '/<\s*img\s+[^>]*?'.$attr.'\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i';}
    function GetSpan($class=''){
        if($class == '')
            return '/<span>(.*?)<\/span>/i';
        else
            return "/<span class=\"$class\">(.*?)<\/span>/i";
    }

//详情
    function GetDetail_Info($detail_info,$k){
        $arr = explode('：',$detail_info[$k]);
        return strip_tags($arr[1]);
    }

    function GetTrimText($text){
        $text = substr($text,strpos($text,'&#10;')+5);
        $text = trim($text,'“');
        $text = trim($text,'”');
        $text = trim($text,'(');
        $text = trim($text,')');
        $text = trim($text,'（');
        return trim($text,'）');
    }
//curl
    function Re($url = ''){
        $ch = curl_init();//初始化
        curl_setopt ($ch, CURLOPT_URL, $url);// 设置要抓取的页面地址
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
        curl_setopt($ch, CURLOPT_HEADER, 0);                      // 不需要页面的HTTP头
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $re = curl_exec($ch);//执行
        curl_close($ch);//释放资源
        return mb_convert_encoding($re, 'utf-8', 'GBK,UTF-8,ASCII');//设置语言
    }
//列表页获取信息
    function GetList($url=''){
        //正则
        $a = GetA();
        preg_match_all(GetUl('bang_list clearfix bang_list_mode'),Re($url),$r,PREG_SET_ORDER );
        $arr = explode('<li>',$r[0][1]);unset($arr[0]);//去空
// $k从1开始
        foreach ($arr as $k=>$v){

            $array = $arr[$k];

            preg_match(GetDiv('pic'),$array,$img_div);//图片 img [1]
            preg_match($a,$img_div[0],$img_div);//详情链接 src [1]
            $detail = $img_div[1];

            preg_match(GetImgSrc(),$img_div[0],$img);//图片 img [1]
            $img = $img[1];

            preg_match(GetImgTitle(),$img_div[0],$title);//书名 title [1]
            $title = $title[1];

            preg_match_all(GetDiv('publisher_info'),$array,$author_div);//作者 div
            preg_match($a,$author_div[0][0],$author);//作者名 [2]
            $author = $author[2];

            preg_match($a,$author_div[0][1],$publish);//出版社 [2]
            $publish = $publish[2];

            preg_match(GetSpan(),$author_div[0][1],$publish_time);//出版社时间 [1]
            $publish_time = date('Y年m月d日',strtotime($publish_time[1]));

            preg_match_all(GetDiv('price'),$array,$price_div);//价格 div
            preg_match(GetSpan('price_n'),$price_div[0][0],$price_n);//现价 [1]
            $new_price = htmlspecialchars_decode($price_n[1]);

            preg_match(GetSpan('price_r'),$price_div[0][0],$price_r);//原价 [1]
            $old_price = htmlspecialchars_decode($price_r[1]);

            preg_match(GetSpan('price_s'),$price_div[0][0],$price_s);//折扣 [1]
            $price_avg = $price_s[1];

            //信息存储
            $abc[] = array(
                //书名
                'title'=>$title,
                //详情链接
                'detail'=>$detail,
                //作者
                'author'=>$author,
                //出版社
                'publish'=>$publish,
                //出版时间
                'publish_time'=>$publish_time,
                //原价
                'old_price'=>$old_price,
                //现价
                'new_price'=>$new_price,
                //折扣
                'price_avg'=>$price_avg,
                //图片
                'img'=>$img,
            );
        }

        return $abc;
    }
//获取最终采集结果
    function GetArr($url=''){
        $arr = GetList($url);
        foreach ($arr as $k=>$v){
            $detail_html = Re($arr[$k]['detail']);
            //书籍详情
            $img_detail = GetDiv('pic');
            preg_match_all($img_detail,$detail_html,$img);
            preg_match(GetImgAttr('alt'),$img[0][0],$detail_text);
            //详情板块
            $detail_class_t_box_left = GetUl('key clearfix');
            preg_match($detail_class_t_box_left,$detail_html,$detail);
            $detail_info = explode('<li>',$detail[1]);unset($detail_info[0]);
//信息存储
            $arr[$k]['ban'] = GetDetail_Info($detail_info,1);//版次
            $arr[$k]['page'] = GetDetail_Info($detail_info,2);//页数
            $arr[$k]['byte'] = GetDetail_Info($detail_info,3);//字数
            $arr[$k]['kai'] = GetDetail_Info($detail_info,5);//开本
            $arr[$k]['zhi'] = GetDetail_Info($detail_info,6);//纸张
            $arr[$k]['bao'] = GetDetail_Info($detail_info,7);//包装规格
            $arr[$k]['is_tao'] = GetDetail_Info($detail_info,8);//是否套装
            $arr[$k]['ISBN'] = trim(GetDetail_Info($detail_info,9),'所属分类');//ISBN
            //书籍详情
            $arr[$k]['detail'] = GetTrimText($detail_text[2]);
            //NULL
            $arr[$k]['ban'] == '' ? $arr[$k]['ban'] = 1:$arr[$k]['ban']=$arr[$k]['ban'];
            $arr[$k]['page'] == '' ? $arr[$k]['page'] = '暂无数据':$arr[$k]['page']=$arr[$k]['page'];
            $arr[$k]['byte'] == '' ? $arr[$k]['byte'] = '暂无数据':$arr[$k]['byte']=$arr[$k]['byte'];
        }
        return $arr;
    }
}