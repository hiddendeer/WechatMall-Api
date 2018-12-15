<?php

namespace app\lib\exception;

class TokenException extends BaseException
{
    public $code = 401;

    public $msg = 'Token已过期或者无效';
    
    public $errCode = 10001;
}