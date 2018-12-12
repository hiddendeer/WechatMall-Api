<?php

/* 令牌验证 */

namespace app\api\controller\v1;

use app\api\server\UserToken;
use app\api\validate\TokenGet;

class Token
{

    public function getToken($code = '')
    {
        (new TokenGet())->gocheck();
        $ut = new UserToken();
        $token = $ut->get($code);
        return $token;
    }
}
