<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/24
 * Time: 13:05
 */

namespace app\index\controller;


use think\Controller;

class Curl extends Controller
{
        public function index() {
            //设定一个url>>>
            $url='https://baijiahao.baidu.com/s?id=1678676052381360324&wfr=spider&for=pc';
//        设定一个url^^^^^^^^^^^
//            包装参数>>>>
            $a = "aaa";
            $b = "bbb";
            $c= "ccc";
            $data=array('a'=>$a,'b'=>$b,'c'=>$c);
            $data_str=http_build_query($data);

            //包装参数^^^^^^^^^^
//        以上都是一样的
//        下面是3中情况,1_直接file_get_contents($url),2_curl_get , 3_curl_post

//        1_直接 file_get_contents
//        注意这里的url加了参数
//            $url_get="http://op.juhe.cn/onebox/weather/query?".$data_str;
//            $res= file_get_contents($url_get);
//            dump($res);
//        1_^^^^^^^^^^^

//        2_curl_get  >>>>>>>>
//        注意这里的url也是加了参数
//            $url_get="https://baijiahao.baidu.com/s?id=1678676052381360324&wfr=spider&for=pc";
//            $curl = curl_init();
//            curl_setopt($curl, CURLOPT_URL, $url_get);
//            curl_setopt($curl, CURLOPT_HEADER, 1);        //设置头文件的信息作为数据流输出
//            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//设置获取的信息以文件流的形式返回，而不是直接输出
//            $data = curl_exec($curl);                     //执行命令
//            curl_close($curl);                            //关闭URL请求
//            dump($data);
//        2_curl_get ^^^^^^^^^^^^

//        3_curl_post
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8',
                'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            $result = curl_exec($ch);
            dump($result);
//        3_curl_post_^^^^^^^^^^^
        }

        public function curl() {
            $url="https://news.online.sh.cn/news/gb/content/2020-09/24/content_9647520_4.htm";
            //1.初始化curl
            $ch=curl_init($url);//第一步，我们通过函数curl_init()创建一个新的curl会话
//2.设置传输选项（向服务器端发送请求）

//curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//3.执行curl请求（接收服务器端发送的数据）
            $output=curl_exec($ch);
//4.关闭curl
            curl_close($ch);

//匹配标题            <div class="title_txtbox">第一章 惊蛰</div>
//            preg_match_all("/<div class=\"title_txtbox\">(.*?)<\/div>/", $output, $title);
//匹配p标签段落内容    <p>二月二，龙抬头。</p>
//            preg_match_all("/<p>(.*?)<\/p>/", $output, $match);
//.  是任意字符 可以匹配任何单个字符，
//.*？  表示匹配任意字符到下一个符合条件的字符
//            $a=$match[0];
//            echo implode( ' ',$a);
            dump($output);
        }

        public function curl2() {
            $url = "https://sports.online.sh.cn/content/2020-09/23/content_9646451.htm";
//            $url = "https://www.jb51.net";
            $contents = file_get_contents($url);
            //如果出现中文乱码使用下面代码
            $getcontent = iconv("gb2312", "utf-8",$contents);
//            preg_match_all("/<p>(.*?)<\/p>/", $getcontent, $match);
//            dump($match);
//        echo $getcontent;
            dump($getcontent);
//            dump($contents);
//            echo $contents;
        }

        public function cul() {
            $str = "4、&ldquo;耸肩&rdquo;这估计是一个表示无可奈何、不知道等意思的身体语言。但是，你不知 道耸肩这个动作还是一个活动肩周的好方法。你可以坐着，也可以直立站立，双手自然下垂，然后两边肩胛骨用力向上缩颈，每次3-5秒，中等速度，一共做3 次。这样不仅活动了双臂的血液流动，还保持了双肩的平衡，是一种塑形的好方法。";
            echo str_replace("查找目标词","最终保留","母词汇(可以变量)");
        }

        public function curl3() {
                $url = "https://www.lehuan.cn/jzzs/298.html";
                $url = "http://www.ishoran.com/zjbj/570.html";
//                $url = "https://post.smzdm.com/p/769592/";
                $ch = curl_init();//初始化
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
                curl_setopt ($ch, CURLOPT_URL, $url);// 设置要抓取的页面地址
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);// 抓取结果直接返回（如果为0，则直接输出内容到页面）
                curl_setopt($ch, CURLOPT_HEADER, 0);                      // 不需要页面的HTTP头
                curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
                $re = curl_exec($ch);//执行
                curl_close($ch);//释放资源

//                preg_match_all("[\u4e00-\u9fa5]", $re, $match);
//                preg_match_all("/<body>(.*?)<\/body>/", $re, $match);
//.  是任意字符 可以匹配任何单个字符，
//.*？  表示匹配任意字符到下一个符合条件的字符
//            $a=$match[0];
//            echo implode( ' ',$a);
//                dump($match);
//            preg_match_all( '/[\x{4e00}-\x{9fa5}]+/u', $re, $matches);
//            preg_match_all( '/[\x80-\xff]{2,}/', $re, $matches);

//            .*[\u4E00-\u9FA5]+.*

            preg_match_all("/(?<=>).*?(?=<)/", $re, $match);
            dump($match);

//                dump($re);
//                return mb_convert_encoding($re, 'utf-8', 'GBK,UTF-8,ASCII');//设置语言

        }

        public function zhengze() {
            $str="
            <title>4档升降设计，多角度可调，华日又出多功能“床宅”单品！保护颈椎 多功能置物～_电脑桌_什么值得买</title>
        <meta name=\"keywords\" content=\"电脑桌、家居家装小值君\"/>
    <meta name=\"description\" content=\"周末的闲暇时光，只想宅在床上放空自己，架上心爱的小桌板，开启属于“床宅”的慢生活，边追剧边购物，在床上享受属于自己的每一分钟。4档升降设计 多重切换\"/>
    
    <meta name=\"applicable-device\" content=\"pc\">
    <meta property=\"og:type\" content=\"article\" />
    <meta property=\"og:url\" content=\"https://post.smzdm.com/p/andl5vkp/\" />
    <meta property=\"og:title\" content=\"4档升降设计，多角度可调，华日又出多功能“床宅”单品！保护颈椎 多功能置物～_电脑桌_什么值得买\" />
    <meta property=\"og:image\" content=\"https://a.zdmimg.com/202006/03/5ed7a62de3c9c8134.gif_fo742.jpg\" />
    <meta property=\"og:description\" content=\"周末的闲暇时光，只想宅在床上放空自己，架上心爱的小桌板，开启属于“床宅”的慢生活，边追剧边购物，在床上享受属于自己的每一分钟。4档升降设计 多重切换\" />
    <meta name=\"weibo:webpage:create_at\" content=\"\" />
    <meta name=\"weibo:webpage:update_at\" content=\"\" />
    <meta name=\"mobile-agent\" content=\"format=html5;url=https://post.m.smzdm.com/p/andl5vkp/\" />
    <link rel=\"canonical\" href=\"https://post.smzdm.com/p/andl5vkp/\"/>
                <meta property=\"og:author\" content=\"家居家装小值君\" />
                <meta property=\"og:release_date\" content=\"2020-06-03 21:44:36\"/>
                <meta property=\"og:bbs:replay\" content=\"33\"/>
        <!--meta add-->
            <meta property=\"article:published_time\" content=\"2020-06-03T21:44:36+08:00\" />
        <meta property=\"article:author\" content=\"家居家装小值君\"/>
        <meta property=\"article:published_first\" content=\"什么值得买, https://post.smzdm.com/p/andl5vkp/\" />";

            preg_match_all( '/[\x{4e00}-\x{9fa5}]+/u', $str, $matches);
            dump($matches);


        }

}