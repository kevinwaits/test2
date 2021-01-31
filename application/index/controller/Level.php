<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/23
 * Time: 14:52
 */

namespace app\index\controller;

use think\Controller;

class Level extends Controller
{
    public function index() {
        return $this->fetch();
    }

    public function myswi() {
        return $this->fetch();
    }

    public function single() {
            return $this->fetch();
    }
}