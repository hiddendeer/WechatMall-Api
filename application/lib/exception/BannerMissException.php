<?php

namespace app\lib\exception;

class BannerMissException 
{
    public $code = 404;
    public $msg = '请求Banner参数错误';
    public $errorCode = 40000;

}