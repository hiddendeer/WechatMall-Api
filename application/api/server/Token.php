<?php

namespace app\api\server;

class Token
{
    public static function generateToken()
    {
        //由32个字符组成一组随机字符串
        $randchar = getRandChar(32);
    }
}
