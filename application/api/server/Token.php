<?php

namespace app\api\server;

class Token
{
    public static function generateToken()
    {
        //由32个字符组成一组随机字符串
        $randchar = getRandChar(32);
        //三组字符串
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $salt = config('secure.token_salt');

        return md5($randchar.$timestamp.$salt);
    }
}
