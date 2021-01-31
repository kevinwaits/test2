<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/21
 * Time: 9:29
 */

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Kevin extends Controller
{
    public function k() {
        return $this->fetch();
    }

    public function k2() {
        return $this->fetch();
    }

    public function k2_rec() {
        $data = $this->request->post("");
        dump($data);

    }

    public function k3() {
        $mystr = "kevin,waits,is,great,and,you,will,be";
        $this->assign("link", $mystr);
        return $this->fetch();
    }

    public function k4() {
        $mystr = "kevin,waits,is,great,and,you,will,be";
        //        字符串变数组
                $arr = explode(",", $mystr);
//                dump($arr);
//                dump(array_rand($arr,2));
//        $x =$arr[array_rand($arr,2)[0]];
//        $y =$arr[array_rand($arr,2)[1]];
//        dump($x);
//        dump($y);
        $this->assign("link", $arr);
        return $this->fetch();
    }

    public function k4_get() {
        $data  = $this->request->param("");
        dump($data);
    }

    public function k5() {
        return $this->fetch();
    }

    public function k5_get() {
        $data= $this->request->param("");
        dump($data);
    }
}