<?php
namespace app\sample\controller;

use think\Request;
class Test
{
    public function hello () {
        /* 获取请求参数，不会限定post、get等 */
        //获取?后面的get参数
        // $all1 = Request::instance()->get();
        //获取post传的参数
        // $all2 = Request::instance()->post(); 
        //获取所有参数
        // $all3 = Request::instance()->param();
        //获取路径参数
        // $all4 = Request::instance()->route();
        // dump($all2);
        //获取单个参数
        // $id = Request::instance()->param('id');
        // $name = Request::instance()->param('name');
        // $age = Request::instance()->param('age');
        // echo $id;
        // echo '|';
        // echo $name;
        // echo '|';
        // echo $age;
    }
}