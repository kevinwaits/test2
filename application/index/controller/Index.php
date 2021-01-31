<?php
namespace app\index\controller;

use app\extra\Dog;
use app\extra\Mysitemap;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function database() {
        $data = Db::table('name')->where("id", ">", 0)->select();

        for($i=0;$i<count($data);$i++)
        {
            echo substr_count($data[$i]["name"],'/') .'<br>';
            Db::table('name')->where("id",$data[$i]["id"])->update(["count"=>substr_count($data[$i]["name"],'/')]);

        }
    }

    public function handle() {
        $data = Db::table('name')->where("id", ">", 0)->select();
    }

    public function index()
    {
        return $this->fetch();
    }

    public function single() {
        return $this->fetch();
    }

    public function myswitch() {
            return $this->fetch();
    }

    public function myswitch_one() {

            $shuzu=["a"=>1,"switch_1"=>1];

            $this->assign("link", $shuzu);

            return $this->fetch();
    }

    public function t_view() {
        $arr=array();
        $a=1;
            for($i=0;$i<6;$i++)
            {
                    $arr[$i]['name']=$a;
                    $arr[$i]['age']=$a;
                    $arr[$i]['pass']=$a;
                    $a=$a+1;
            }
//            dump($arr);
        $this->assign("link", $arr);
            return $this->fetch();
    }

    public function lizi() {
        return $this->fetch();
    }

    public function lei() {
        $sitemap = new Mysitemap("http://cdn.yg1st.com");

        $sitemap->addItem('/', '1.0', 'daily', 'Today');
        $sitemap->addItem('/hr.php', '0.8', 'monthly', time());
        $sitemap->addItem('/index.php', '1.0', 'daily', 'Jun 25');
        $sitemap->addItem('/about.php', '0.8', 'monthly', '2017-06-26');

        $sitemap->addItem('/hr2.php', '1.0', 'daily',
            time())->addItem('/index2.php', '1.0', 'daily', 'Today')->
        addItem('/about2.php', '0.8', 'monthly', 'Jun 25');
        $sitemap->setXmlFile("/sitemap");
        $sitemap->endSitemap();
    }

    public function read_all() {
        $this->list_file("static");

    }

    function list_file($date){
        $temp=scandir($date);
        //遍历文件夹
        foreach($temp as $v){
            $a=$date.'/'.$v;
            if(is_dir($a)){//如果是文件夹则执行

                if($v=='.' || $v=='..'){//判断是否为系统隐藏的文件.和..  如果是则跳过否则就继续往下走，防止无限循环再这里。
                    continue;
                }
//                echo "<font color='red'>$a</font>","<br/>"; //把文件夹红名输出

                $this->list_file($a);//因为是文件夹所以再次调用自己这个函数，把这个文件夹下的文件遍历出来

            }else{
                Db::table('name')->insert(["name"=>$a]);
                echo $a."<br/>";
            }
        }

    }

    function list_file_backup($date){

        $temp=scandir($date);
        //遍历文件夹
        foreach($temp as $v){
            $a=$date.'/'.$v;
            if(is_dir($a)){//如果是文件夹则执行

                if($v=='.' || $v=='..'){//判断是否为系统隐藏的文件.和..  如果是则跳过否则就继续往下走，防止无限循环再这里。
                    continue;
                }
//                echo "<font color='red'>$a</font>","<br/>"; //把文件夹红名输出

                $this->list_file($a);//因为是文件夹所以再次调用自己这个函数，把这个文件夹下的文件遍历出来

            }else{
                echo $a."<br/>";
            }
        }

    }

    public function x() {
        return $this->fetch();
    }

    public function testlay() {
        return $this->fetch();
    }

    public function sound() {
        return $this->fetch();
    }

    public function demo() {
            return $this->fetch();
    }

}
