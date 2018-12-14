<?php

namespace app\lib\exception;

class WeChatException extends BaseException
{
    public $code = 400;

    public $msg = '微信接口调用错误';
    
    public $errCode = 999;

}