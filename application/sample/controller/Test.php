<?php
namespace app\sample\controller;

class Test
{
    public function hello ($id,$name) {
        echo $id;
        echo '|';
        echo $name;
    }
}