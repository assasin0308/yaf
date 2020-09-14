<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/12 0012
 * Time: 18:53
 */

namespace tool;
class Http{
    public static function getHost(){
        return $_SERVER['HTTP_HOST'].'local';
    }
}