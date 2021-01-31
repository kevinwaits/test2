<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/29
 * Time: 15:20
 */

namespace app\index\controller;

use think\Controller;

class Button extends Controller
{
    public function button() {
        return $this->fetch();
    }
}