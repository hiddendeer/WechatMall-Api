<?php

namespace app\lib\exception;

class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '指定的商品不存在，请检查参数';
    public $errorCode = 50000;
}