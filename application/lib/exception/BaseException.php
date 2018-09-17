<?php

namespace app\lib\exception;

class BaseException
{
    //HTTP 状态码 404,200
    public $code = 400;

    //错误具体信息
    public $msg = '参数错误';

    //自定义的错误码
    public $errorCode = 10000;
}